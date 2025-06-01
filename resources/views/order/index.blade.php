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

@section('content')
<div class="container py-4">
      <div class="text-center mb-4">
        <h2 class="fw-bold">Ringkasan Pesanan</h2>
    </div>

    <!-- Informasi Pelanggan -->
    <div class="card mb-4 shadow-sm">
        <div class="card-header bg-primary text-white">
            Data Pelanggan
        </div>
        <div class="card-body">
            <p><strong>Nama:</strong> {{ $order->customer->name }}</p>
            <p><strong>Nomor Meja:</strong> {{ $order->customer->table_number }}</p>
            <p><strong>Jumlah Pelanggan:</strong> {{ $order->customer->number_customers }}</p>
        </div>
    </div>

    <!-- Daftar Menu Dipesan -->
    <div class="card shadow-sm mb-4">
        <div class="card-header bg-success text-white">
            Menu yang Telah Dipesan
        </div>
        <div class="card-body p-0">
            <table class="table table-bordered mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Nama Menu</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @php $total = 0; @endphp
                    @foreach ($order->orderItems as $item)
                        @php
                            $subtotal = $item->quantity * $item->product->price;
                            $total += $subtotal;
                        @endphp
                        <tr>
                            <td>{{ $item->product->name }}</td>
                            <td>Rp {{ number_format($item->product->price, 0, ',', '.') }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>Rp {{ number_format($subtotal, 0, ',', '.') }}</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr class="table-secondary">
                        <th colspan="3" class="text-end">Total</th>
                        <th>Rp {{ number_format($total, 0, ',', '.') }}</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

    <!-- Status Pesanan -->
<div class="my-3 text-center">
    <div class="p-2 rounded-pill bg-light border border-primary d-inline-block">
        <strong>Status Pesanan Anda:</strong> 
        <span class="text-primary">{{ ucfirst($order->status) }}</span>
    </div>
</div>

<!-- Tombol Bayar Sekarang -->
<div class="d-flex justify-content-center mb-5">
    @if ($order->status === 'pending')
        <a href="#" class="btn btn-primary btn-lg">Bayar Sekarang</a>
    @else
        <button class="btn btn-success" disabled>Sudah Dibayar</button>
    @endif
</div>

</div>
@endsection
