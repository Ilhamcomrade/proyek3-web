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
            <a href="{{ url('/?kategori=' . $item) }}" 
               class="btn btn-dark text-white kategori-item"
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
    <form method="GET" action="{{ url('/') }}" class="mb-4 px-3">
        <input type="hidden" name="kategori" value="{{ $kategori }}">
        <div class="input-group">
            <input type="text" name="search" class="form-control form-control-lg" 
                   placeholder="Cari Menu" value="{{ $search }}" 
                   style="font-size: 1.2rem; height: 3rem;">
            <button class="btn btn-dark" type="submit" style="height: 3rem;">
                <i class="fas fa-search fa-lg"></i>
            </button>
        </div>
    </form>

    <!-- TULISAN DAN IKON Kategori -->
    <div class="text-start px-3 mb-3">
        <h4 class="d-flex align-items-center">
            <!-- Tampilkan ikon sesuai kategori -->
            @if ($kategori == 'makanan')
                <i class="fa-solid fa-utensils text-danger fa-2x"></i>
            @elseif ($kategori == 'minuman')
                <i class="fa-solid fa-whiskey-glass text-danger fa-2x"></i>
            @elseif ($kategori == 'snack')
                <i class="fa-solid fa-cookie text-danger fa-2x"></i>
            @elseif ($kategori == 'kopi')
                <i class="fa-solid fa-mug-hot text-danger fa-2x"></i>
            @else
                <i class="fa-solid fa-list text-secondary fa-2x"></i>
            @endif
            <span class="ms-3">{{ ucfirst($kategori ?? 'Menu') }}</span>
        </h4>
    </div>

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
