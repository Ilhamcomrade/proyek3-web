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
    
        // Jika ada pencarian, tampilkan semua kategori yang cocok
        if ($search) {
            $query->where('nama', 'like', "%{$search}%");
        }
    
        // Jika tidak ada pencarian dan kategori dipilih, filter berdasarkan kategori
        if (!$search && $kategori) {
            $query->where('kategori', $kategori);
        }
    
        // Jika tidak ada pencarian dan tidak ada kategori, default ke kategori 'makanan'
        if (!$search && !$kategori) {
            $kategori = 'makanan';
            $query->where('kategori', 'makanan');
        }
    
        $menus = $query->get();
    
        // Jika ada pencarian, periksa apakah hanya satu kategori ditemukan
        if ($search && $menus->count() > 0) {
            $kategoriUnik = $menus->pluck('kategori')->unique();
    
            if ($kategoriUnik->count() === 1) {
                $kategori = $kategoriUnik->first(); // misalnya hanya 'kopi'
            } else {
                $kategori = null; // campuran kategori
            }
        }
    
        return view('menu.index', compact('menus', 'kategori', 'search'));
    }
    
    public function filter(Request $request)
{
    $kategori = $request->input('kategori');
    $search = $request->input('search');
    
    $query = Menu::query();
    
    if ($kategori) {
        $query->where('kategori', $kategori);
    }
    
    if ($search) {
        $query->where('nama', 'like', '%'.$search.'%');
    }
    
    $menus = $query->get();
    
    if ($request->ajax()) {
        return response()->json([
            'html' => view('partials.menu_items', compact('menus'))->render()
        ]);
    }
    
    return view('menu.index', compact('menus', 'kategori', 'search'));
}

}