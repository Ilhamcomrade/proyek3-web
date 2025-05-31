@forelse ($products as $product)
    <div class="col-md-3 mb-4">
        <div class="card h-100">
            <img src="{{ asset('image/' . $product->image_url) }}" class="card-img-top" alt="{{ $product->name }}">
            <div class="card-body d-flex flex-column">
                <h5 class="card-title">{{ $product->name }}</h5>
                <p class="card-text">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                <button class="btn btn-dark mt-auto btn-pesan" data-product-id="{{ $product->id }}">
                    PESAN
                </button>
            </div>
        </div>
    </div>
@empty
    <div class="col-12">
        <p class="text-muted">Produk tidak ditemukan.</p>
    </div>
@endforelse