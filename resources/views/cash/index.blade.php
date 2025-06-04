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

<div class="container mt-4 mb-5">
    <div class="card shadow rounded-4 overflow-hidden">
        <div class="card-body px-4 py-5">

            <div class="text-center mb-4">
                <img src="{{ asset('image/Centang.png') }}" alt="Berhasil" width="150" class="mb-3">
                <h4 class="fw-bold">Pesanan Anda Berhasil Dibuat</h4>
            </div>

            <!-- Informasi Pelanggan -->
            <div class="mb-4">
                <p><strong>Nama:</strong> {{ $order->customer->name }}</p>
                <p><strong>Nomor Meja:</strong> {{ $order->customer->table_number }}</p>
                <p><strong>Jumlah Pelanggan:</strong> {{ $order->customer->number_customers }}</p>
            </div>

            <!-- Tabel Ringkasan Pesanan -->
            <div class="table-responsive">
                <table class="table table-bordered mt-3">
                    <thead class="table-secondary">
                        <tr>
                            <th>Menu</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($order->orderItems as $item)
                            <tr>
                                <td>{{ $item->product->name }}</td>
                                <td>Rp {{ number_format($item->price, 0, ',', '.') }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>Rp {{ number_format($item->price * $item->quantity, 0, ',', '.') }}</td>
                            </tr>
                        @endforeach
                        <tr class="fw-bold">
                            <td colspan="3" class="text-end">Total:</td>
                            <td>Rp {{ number_format($order->total_amount, 0, ',', '.') }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Catatan -->
            <div class="text-center mt-4">
                <h4>Berikan pesanan ini kepada kasir untuk menyelesaikan pembayaran.</h4>
            </div>

        </div>
    </div>
</div>
@endsection
