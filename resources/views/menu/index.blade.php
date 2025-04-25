@extends('layouts.app')

@section('content')
<div class="header" style="background-color: #0077B6; color: white; padding: 20px 0; margin: 0;">
    <div class="text-center">
        <img src="{{ asset('image/logo.png') }}" alt="Logo" width="150" class="mb-3 rounded-circle">
        <h1 style="font-size: 1.8rem; color: white;">Rumah Makan WATI</h1>
        <p style="font-size: 1.2rem; color: white;">
            Dusun Terungtum, Desa Patimban<br>
            Kecamatan Pusakanagara<br>
            Kabupaten Subang, Jawa Barat
        </p>
    </div>
</div>

<div class="container-fluid mt-5">

    <!-- Kategori dan Ikon Keranjang -->
    <div class="d-flex justify-content-between align-items-center px-3 my-4">
        <!-- Kategori -->
        <div class="d-flex kategori-wrapper flex-grow-1">
            @foreach (['makanan', 'minuman', 'snack', 'kopi'] as $item)
                <a href="{{ url('/?kategori=' . $item) }}" 
                   class="btn btn-dark kategori-item"
                   style="min-width: 150px; text-align: center;">
                   {{ strtoupper($item) }}
                </a>
            @endforeach
        </div>
        <!-- Ikon Keranjang -->
        <div class="cart-wrapper">
            <a href="{{ url('/keranjang') }}" class="btn btn-light">
                <i class="fa-solid fa-cart-plus fa-3x" style="color:rgb(0, 0, 0);"></i>
            </a>
        </div>
    </div>

    <!-- Form Pencarian -->
    <form method="GET" action="{{ url('/') }}" class="mb-4 px-3">
        <input type="hidden" name="kategori" value="{{ $kategori }}">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Cari Menu" value="{{ $search }}">
            <button class="btn btn-dark" type="submit">
                <i class="fas fa-search fa-lg"></i>
            </button>
        </div>
    </form>

    <!-- List Menu -->
    <div class="row px-3">
        @forelse ($menus as $menu)
            <div class="col-6 col-md-3 mb-4">
                <div class="card shadow-sm h-100">
                    <img src="{{ asset('image/' . $menu->gambar) }}" class="card-img-top" alt="{{ $menu->nama }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $menu->nama }}</h5>
                        <p class="card-text">Rp {{ number_format($menu->harga, 0, ',', '.') }}</p>
                        <button class="btn btn-dark w-100">Pesan</button>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-muted">Tidak ada menu yang ditemukan.</p>
        @endforelse
    </div>
</div>
@endsection
