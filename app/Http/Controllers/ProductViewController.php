<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class ProductViewController extends Controller
{
    public function index()
   {
    // Ambil kategori dengan nama 'makanan'
    $category = Category::where('name', 'makanan')->first();

    if ($category) {
        $products = Product::where('category_id', $category->id)->get();
    } else {
        $products = collect(); // Kosongkan jika kategori tidak ditemukan
    }

    return view('product.index', compact('products'));
}
   public function filter(Request $request)
{
    $query = Product::query();

    if ($request->kategori) {
        $query->whereHas('category', function ($q) use ($request) {
            $q->where('name', $request->kategori);
        });
    }

    if ($request->search) {
        $query->where('name', 'like', '%' . $request->search . '%');
    }

    $products = $query->with('category')->get();

    $html = view('partials.product_items', compact('products'))->render();

    return response()->json(['html' => $html]);
}

}
