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

<div class="container-fluid text-center mt-5">

    <!-- Kategori + Keranjang -->
    <div class="d-flex justify-content-center align-items-center flex-wrap kategori-wrapper mb-4 px-3">
        @foreach (['makanan', 'minuman', 'snack', 'kopi'] as $item)
            <a href="javascript:void(0)" 
               class="btn btn-dark text-white kategori-item"
               data-kategori="{{ $item }}"
               style="text-decoration: none;">
               {{ strtoupper($item) }}
            </a>
        @endforeach

        <!-- Keranjang -->
        <div class="cart-wrapper">
            <a href="{{ url('/keranjang') }}" class="btn btn-light">
                <i class="fa-solid fa-cart-plus fa-3x" style="color:rgb(0, 0, 0);"></i>
            </a>
        </div>
    </div>

    <!-- Form Pencarian -->
    <form id="search-form" class="mb-4 px-3">
        <div class="input-group">
            <input type="text" id="search-input" class="form-control form-control-lg" 
                   placeholder="Cari Produk" 
                   style="font-size: 1.2rem; height: 3rem;">
            <button class="btn btn-dark" type="submit" style="height: 3rem;">
                <i class="fas fa-search fa-lg"></i>
            </button>
        </div>
    </form>
    
    <!-- TULISAN DAN IKON Kategori -->
    <div class="text-start px-3 mb-3">
        <h4 class="d-flex align-items-center" id="category-title">
            <i class="fa-solid fa-utensils text-danger fa-2x"></i>
            <span class="ms-3">Makanan</span>
        </h4>
    </div>

    <!-- List Produk -->
    <div class="row px-3" id="menu-container">
        @include('partials.product_items', ['products' => $products])
    </div>
</div>

<script>
$(document).ready(function() {
    let currentCategory = '';
    let currentSearch = '';

    function loadProducts() {
        $.ajax({
            url: "{{ route('product.filter') }}",
            method: "GET",
            data: {
                kategori: currentCategory,
                search: currentSearch
            },
            success: function(response) {
                $('#menu-container').html(response.html);
                updateCategoryTitle();
            },
            error: function() {
                $('#menu-container').html('<p class="text-danger">Gagal memuat produk. Silakan coba lagi.</p>');
            }
        });
    }

    function updateCategoryTitle() {
        let iconClass = 'fa-utensils text-danger';
        let titleText = 'Makanan';

        if (currentCategory === 'makanan') {
            iconClass = 'fa-utensils text-danger';
            titleText = 'Makanan';
        } else if (currentCategory === 'minuman') {
            iconClass = 'fa-whiskey-glass text-danger';
            titleText = 'Minuman';
        } else if (currentCategory === 'snack') {
            iconClass = 'fa-cookie text-danger';
            titleText = 'Snack';
        } else if (currentCategory === 'kopi') {
            iconClass = 'fa-mug-hot text-danger';
            titleText = 'Kopi';
        } else if (currentSearch) {
            iconClass = 'fa-search text-danger';
            titleText = 'Hasil Pencarian';
        }

       $('#category-title').html(`
    <i class="fa-solid ${iconClass} fa-2x"></i>
    <span class="ms-3">${titleText}</span>
`);
    }

    $('.kategori-item').click(function() {
        $('.kategori-item').removeClass('active');
        $(this).addClass('active');
        
        currentCategory = $(this).data('kategori');
        currentSearch = '';
        $('#search-input').val('');
        loadProducts();
    });

    $('#search-form').submit(function(e) {
        e.preventDefault();
        currentSearch = $('#search-input').val().trim();
        currentCategory = '';
        $('.kategori-item').removeClass('active');
        loadProducts();
    });

    // Event untuk tombol PESAN
    $(document).on('click', '.btn-pesan', function () {
        const productId = $(this).data('product-id');
        const customerId = localStorage.getItem('customer_id');

        if (!customerId) {
            alert('Customer ID belum diset.');
            return;
        }

        $.ajax({
            url: '/api/cart/add',
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            contentType: 'application/json',
            data: JSON.stringify({
                customer_id: customerId,
                product_id: productId,
                quantity: 1
            }),
            success: function (res) {
                alert('Produk ditambahkan ke keranjang!');
            },
            error: function (err) {
                console.error(err);
                alert('Terjadi kesalahan saat menambahkan ke keranjang.');
            }
        });
    });
});
</script>
@endsection