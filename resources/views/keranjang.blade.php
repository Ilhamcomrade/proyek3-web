@extends('layouts.app')

@section('content')

<div class="header">
    <div class="text-center">
        <img src="{{ asset('image/logo.png') }}" alt="Logo" width="150" class="mb-3 rounded-circle">
        <h1 style="font-size: 1.8rem;">Rumah Makan WATI</h1>
        <p style="font-size: 1.2rem;">
            Dusun Terungtum, Desa Patimban<br>
            Kecamatan Pusakanagara<br>
            Kabupaten Subang, Jawa Barat
        </p>
    </div>
</div>

<div class="container mt-5">
    <div class="text-center mb-4">
        <h2 class="fw-bold">Keranjang Pesanan</h2>
    </div>

    @if($orderItems->isEmpty())
        <p class="text-center text-muted">Belum ada pesanan dalam keranjang.</p>
    @else
        @foreach($orderItems as $item)
            <div class="card mb-4 shadow-sm order-item-card" data-item-id="{{ $item->id }}" data-item-price="{{ $item->product->price }}">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-md-5">
                            <h5 class="fw-semibold">{{ $item->product->name }}</h5>
                            <form class="quantity-form">
                                @csrf
                                @method('PUT')
                                <div class="d-flex align-items-center gap-2 mt-2">
                                    <button type="button" class="btn btn-sm btn-danger text-white btn-minus">−</button>
                                    <input type="number" name="quantity" value="{{ $item->quantity }}" min="1" 
                                           class="form-control form-control-sm w-auto text-center quantity-input">
                                    <button type="button" class="btn btn-sm btn-success text-white btn-plus">+</button>
                                </div>
                            </form>
                            <small class="text-muted d-block mt-2">
                                Rp {{ number_format($item->product->price, 0, ',', '.') }} / item
                            </small>
                        </div>

                        <div class="col-md-4"></div>

                        <div class="col-md-3 text-end">
                            <div class="d-flex justify-content-end align-items-center gap-2">
                                <span class="badge fs-6 py-2 px-3 item-total" style="background-color: #0077B6; color: white;">
                                    Rp {{ number_format($item->product->price * $item->quantity, 0, ',', '.') }}
                                </span>

                                <button type="button" class="btn btn-danger text-white px-2 py-1 btn-delete">Hapus</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        <div class="card mb-4 shadow-sm">
            <div class="card-body d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Total Harga Keseluruhan:</h5>
                <span class="badge fs-5 py-2 px-3 total-amount" style="background-color: #007A33; color: white;">
                    Rp {{ number_format($total, 0, ',', '.') }}
                </span>
            </div>
        </div>
    @endif

    @if(!$orderItems->isEmpty())
    <form action="{{ route('customers.store') }}" method="POST">
        @csrf
        <input type="hidden" name="customer_id" value="{{ $orderIdTerbaru }}">

        <div class="card p-4 bg-white shadow-sm mb-3">
            <div class="mb-3">
                <input type="text" name="name" class="form-control" placeholder="Nama" required>
            </div>
            <div class="mb-3">
                <input type="text" name="table_number" class="form-control" placeholder="Nomor Meja" required>
            </div>
            <div class="mb-3">
                <input type="number" name="number_customers" class="form-control" placeholder="Jumlah Pelanggan" required>
            </div>
        </div>

        <div class="d-flex justify-content-center mb-5">
            <button type="submit" class="btn btn-success btn-lg">
                Pesan Sekarang
            </button>
        </div>
    </form>
    @endif
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Format number to Rupiah
        function formatRupiah(amount) {
            return 'Rp ' + amount.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        }

        // Handle minus button click
        document.querySelectorAll('.btn-minus').forEach(btn => {
            btn.addEventListener('click', function() {
                const card = this.closest('.order-item-card');
                const input = card.querySelector('.quantity-input');
                const newQuantity = parseInt(input.value) - 1;
                
                if (newQuantity === 0) {
                    // Automatically remove when quantity reaches 0
                    removeItem(card);
                } else if (newQuantity > 0) {
                    input.value = newQuantity;
                    updateItemTotal(card, newQuantity);
                    updateQuantityOnServer(card, newQuantity);
                }
            });
        });

        // Handle plus button click
        document.querySelectorAll('.btn-plus').forEach(btn => {
            btn.addEventListener('click', function() {
                const card = this.closest('.order-item-card');
                const input = card.querySelector('.quantity-input');
                const newQuantity = parseInt(input.value) + 1;
                
                input.value = newQuantity;
                updateItemTotal(card, newQuantity);
                updateQuantityOnServer(card, newQuantity);
            });
        });

        // Handle delete button click
        document.querySelectorAll('.btn-delete').forEach(btn => {
            btn.addEventListener('click', function() {
                removeItem(this.closest('.order-item-card'));
            });
        });

        // Update item total display
        function updateItemTotal(card, quantity) {
            const price = parseInt(card.dataset.itemPrice);
            const total = price * quantity;
            card.querySelector('.item-total').textContent = formatRupiah(total);
            updateGrandTotal();
        }

        // Remove item completely
        function removeItem(card) {
            const itemId = card.dataset.itemId;
            const token = document.querySelector('meta[name="csrf-token"]').content;
            
            fetch(`/order-items/${itemId}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': token,
                    'X-Requested-With': 'XMLHttpRequest'
                },
                body: JSON.stringify({
                    _method: 'DELETE'
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    card.remove();
                    updateGrandTotal();
                    
                    if (data.keranjang_count !== undefined) {
                        updateCartBadge(data.keranjang_count);
                    }
                    
                    if (document.querySelectorAll('.order-item-card').length === 0) {
                        window.location.reload();
                    }
                }
            })
            .catch(error => console.error('Error:', error));
        }

        // Update quantity on server
        function updateQuantityOnServer(card, quantity) {
            const itemId = card.dataset.itemId;
            const token = document.querySelector('meta[name="csrf-token"]').content;
            
            fetch(`/order-items/${itemId}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': token,
                    'X-Requested-With': 'XMLHttpRequest'
                },
                body: JSON.stringify({
                    quantity: quantity,
                    _method: 'PUT'
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success && data.keranjang_count !== undefined) {
                    updateCartBadge(data.keranjang_count);
                }
            })
            .catch(error => console.error('Error:', error));
        }

        // Update grand total
        function updateGrandTotal() {
            let grandTotal = 0;
            document.querySelectorAll('.order-item-card').forEach(card => {
                const price = parseInt(card.dataset.itemPrice);
                const quantity = parseInt(card.querySelector('.quantity-input').value);
                grandTotal += price * quantity;
            });
            
            document.querySelector('.total-amount').textContent = formatRupiah(grandTotal);
        }

        // Update cart badge
        function updateCartBadge(count) {
            const cartBadge = document.querySelector('.cart-count');
            if (cartBadge) {
                cartBadge.textContent = count;
                cartBadge.style.display = count > 0 ? 'block' : 'none';
            }
        }
    });
</script>

@endsection