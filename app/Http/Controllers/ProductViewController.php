<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class ProductViewController extends Controller
{
    public function index()
    {
        $products = Product::all();
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
