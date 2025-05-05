<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index(Request $request)
{
    $kategori = $request->get('kategori');
    $search = $request->get('search');

    $query = Menu::query();

    if ($search) {
        $query->where('nama', 'like', "%{$search}%");
    }

    if (!$search && $kategori) {
        $query->where('kategori', $kategori);
    }

    $menus = $query->get();

    // Tentukan kategori dari hasil pencarian
    if ($search && $menus->count() > 0) {
        $kategoriUnik = $menus->pluck('kategori')->unique();

        if ($kategoriUnik->count() === 1) {
            $kategori = $kategoriUnik->first(); // misal hanya 'minuman'
        } else {
            $kategori = null; // campuran kategori
        }
    }

    return view('menu.index', compact('menus', 'kategori', 'search'));
}

}
