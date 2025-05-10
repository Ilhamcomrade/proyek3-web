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
    <div class="col-12">
        <p class="text-muted">Tidak ada menu yang ditemukan.</p>
    </div>
@endforelse