<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $kategori = $request->get('kategori');
        $search = $request->get('search');

        $query = Product::query();

        if ($search) {
            $query->where('name', 'like', "%{$search}%");
        }

        if (!$search && $kategori) {
            $query->whereHas('category', function ($q) use ($kategori) {
                $q->where('name', $kategori);
            });
        }

        if (!$search && !$kategori) {
            $kategori = 'makanan';
            $query->whereHas('category', function ($q) use ($kategori) {
                $q->where('name', $kategori);
            });
        }

        $products = $query->with('category')->get();

        if ($search && $products->count() > 0) {
            $kategoriUnik = $products->pluck('category.name')->unique();

            $kategori = $kategoriUnik->count() === 1 ? $kategoriUnik->first() : null;
        }

        return response()->json([
            'products' => $products,
            'kategori' => $kategori,
            'search' => $search,
        ]);
    }

    public function filter(Request $request)
    {
        $kategori = $request->input('kategori');
        $search = $request->input('search');

        $query = Product::query();

        if ($kategori) {
            $query->whereHas('category', function ($q) use ($kategori) {
                $q->where('name', $kategori);
            });
        }

        if ($search) {
            $query->where('name', 'like', "%{$search}%");
        }

        $products = $query->with('category')->get();

        if ($request->ajax()) {
            return response()->json([
                'html' => view('partials.product_items', compact('products'))->render()
            ]);
        }

        return response()->json([
            'products' => $products,
            'kategori' => $kategori,
            'search' => $search,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'stock' => 'required|boolean',
            'category_id' => 'required|exists:categories,id',
        ]);

        $product = Product::create($validated);
        return response()->json($product, 201);
    }

    public function show($id)
    {
        $product = Product::with('category')->findOrFail($id);
        return response()->json($product);
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->update($request->all());
        return response()->json($product);
    }

    public function destroy($id)
    {
        Product::destroy($id);
        return response()->json(null, 204);
    }
}