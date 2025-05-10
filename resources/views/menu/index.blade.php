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
                   placeholder="Cari Menu" 
                   style="font-size: 1.2rem; height: 3rem;">
            <button class="btn btn-dark" type="submit" style="height: 3rem;">
                <i class="fas fa-search fa-lg"></i>
            </button>
        </div>
    </form>
    
    <!-- TULISAN DAN IKON Kategori -->
    <div class="text-start px-3 mb-3">
        <h4 class="d-flex align-items-center" id="category-title">
            @if ($kategori == 'makanan')
                <i class="fa-solid fa-utensils text-danger fa-2x"></i>
                <span class="ms-3">Makanan</span>
            @elseif ($kategori == 'minuman')
                <i class="fa-solid fa-whiskey-glass text-danger fa-2x"></i>
                <span class="ms-3">Minuman</span>
            @elseif ($kategori == 'snack')
                <i class="fa-solid fa-cookie text-danger fa-2x"></i>
                <span class="ms-3">Snack</span>
            @elseif ($kategori == 'kopi')
                <i class="fa-solid fa-mug-hot text-danger fa-2x"></i>
                <span class="ms-3">Kopi</span>
            @else
                <i class="fa-solid fa-utensils text-danger fa-2x"></i>
                <span class="ms-3">Makanan</span>
            @endif
        </h4>
    </div>
    

    <!-- List Menu -->
    <div class="row px-3" id="menu-container">
        @include('partials.menu_items', ['menus' => $menus])
    </div>
</div>

<script>
$(document).ready(function() {
    // Variabel untuk menyimpan state
    let currentCategory = '';
    let currentSearch = '';

    // Fungsi untuk memuat menu via AJAX
    function loadMenus() {
        $.ajax({
            url: "{{ route('menu.filter') }}",
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
                $('#menu-container').html('<p class="text-danger">Gagal memuat menu. Silakan coba lagi.</p>');
            }
        });
    }

    // Fungsi untuk mengupdate judul kategori
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

    // Event handler untuk kategori
    $('.kategori-item').click(function() {
        $('.kategori-item').removeClass('active');
        $(this).addClass('active');
        
        currentCategory = $(this).data('kategori');
        currentSearch = '';
        $('#search-input').val('');
        loadMenus();
    });

    // Event handler untuk pencarian
    $('#search-form').submit(function(e) {
        e.preventDefault();
        currentSearch = $('#search-input').val().trim();
        currentCategory = '';
        $('.kategori-item').removeClass('active');
        loadMenus();
    });
});
</script>
@endsection