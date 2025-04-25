<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index(Request $request)
    {
        // Ambil kategori dari request, default 'makanan'
        $kategori = $request->get('kategori', 'makanan');

        // Ambil keyword pencarian (jika ada)
        $search = $request->get('search');

        // Query awal berdasarkan kategori
        $query = Menu::where('kategori', $kategori);

        // Jika ada pencarian, tambahkan kondisi LIKE
        if ($search) {
            $query->where('nama', 'like', "%{$search}%");
        }

        // Ambil hasil akhir dari query
        $menus = $query->get();

        // Kirim ke view
        return view('menu.index', compact('menus', 'kategori', 'search'));
    }
}
