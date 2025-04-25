<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    // Nama tabel yang digunakan
    protected $table = 'menus';

    // Field yang boleh diisi (mass assignment)
    protected $fillable = [
        'nama',
        'kategori',
        'harga',
        'gambar',
    ];
}
