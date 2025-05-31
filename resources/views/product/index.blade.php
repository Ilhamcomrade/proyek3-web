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
    <div class="sticky-top bg-light" style="z-index:1020; padding-top: 20px;"> {{-- Tambah padding top --}}
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

          <div class="cart-wrapper position-relative ms-3">
    <a href="{{ route('keranjang') }}" class="btn btn-light position-relative">
        <i class="fa-solid fa-cart-shopping fa-3x" style="color: #000000;"></i>
        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger cart-count" style="display: none;">
            0
        </span>
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
    </div>
    
    <!-- Kategori -->
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
    // Jika pencarian kosong dan tidak ada kategori aktif, set default ke 'makanan'
    if (!currentSearch && !currentCategory) {
        currentCategory = 'makanan';
    }

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

    $('#search-input').on('keyup', function() {
    currentSearch = $(this).val().trim();
    currentCategory = '';
    $('.kategori-item').removeClass('active');
    loadProducts();
});

$(document).ready(function() {
    $.get("{{ route('keranjang.add') }}", function(response) {
        $('.cart-count').text(response.keranjang_count);
    });
});

   $(document).on('click', '.btn-pesan', function() {
    const productId = $(this).data('product-id');
    const btn = $(this);
    
    btn.prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> Memproses...');
    
    $.ajax({
        url: "{{ route('keranjang.add') }}",
        method: "POST",
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Accept': 'application/json',
            'Content-Type': 'application/json'
        },
        data: JSON.stringify({ product_id: productId }),
        success: function(response) {
            $('.cart-count').text(response.keranjang_count);
            btn.html('PESAN').prop('disabled', false);
        },
        error: function(xhr) {
            console.error(xhr.responseText);
            btn.html('PESAN').prop('disabled', false);
            alert('Gagal: ' + (xhr.responseJSON?.message || 'Server error'));
        }
    });
});

});

$(document).ready(function() {
    function updateCartCount() {
        $.ajax({
            url: "{{ route('keranjang.count') }}",
            method: "GET",
            success: function(response) {
                const cartCountElement = $('.cart-count');
                if (response.keranjang_count > 0) {
                    cartCountElement.text(response.keranjang_count).show();
                } else {
                    cartCountElement.hide(); // Sembunyikan jika kosong
                }
            },
            error: function() {
                console.error("Gagal memperbarui notifikasi keranjang");
            }
        });
    }

    updateCartCount(); // Jalankan saat halaman pertama kali dimuat

    $(document).on('click', '.btn-pesan, .btn-minus, .btn-plus, .btn-hapus', function() {
        const form = $(this).closest('form');
        $.ajax({
            url: form.attr('action'),
            method: form.attr('method'),
            data: form.serialize(),
            success: function(response) {
                updateCartCount(); // Update ikon keranjang setelah perubahan
            }
        });
    });
});

</script>
@endsection