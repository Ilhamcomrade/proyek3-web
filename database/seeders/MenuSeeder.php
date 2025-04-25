<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Menu;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

     public function run(): void
     {
         Menu::insert([
             
            ['nama' => 'Mie Gacoan Level 1', 'kategori' => 'makanan', 'harga' => 20000, 'gambar' => 'mie-gacoan-level-1.jpg'],
            ['nama' => 'Mie Iblis', 'kategori' => 'makanan', 'harga' => 18000, 'gambar' => 'mie-iblis.jpg'],
            ['nama' => 'Mie Tuyul', 'kategori' => 'makanan', 'harga' => 22000, 'gambar' => 'mie-tuyul.jpg'],
            ['nama' => 'Dimsum Hantu', 'kategori' => 'makanan', 'harga' => 15000, 'gambar' => 'dimsum-hantu.jpg'],

            ['nama' => 'Mie Gacoan Level 1', 'kategori' => 'makanan', 'harga' => 20000, 'gambar' => 'mie-gacoan-level-1.jpg'],
            ['nama' => 'Mie Iblis', 'kategori' => 'makanan', 'harga' => 18000, 'gambar' => 'mie-iblis.jpg'],
            ['nama' => 'Mie Tuyul', 'kategori' => 'makanan', 'harga' => 22000, 'gambar' => 'mie-tuyul.jpg'],
            ['nama' => 'Dimsum Hantu', 'kategori' => 'makanan', 'harga' => 15000, 'gambar' => 'dimsum-hantu.jpg'],

            //['nama' => 'Es Teh Manis', 'kategori' => 'minuman', 'harga' => 4000, 'gambar' => 'es-teh-manis.jpg'],
             //['nama' => 'Es Jeruk', 'kategori' => 'minuman', 'harga' => 5000, 'gambar' => 'es-jeruk.jpg'],
             //['nama' => 'Teh Botol', 'kategori' => 'minuman', 'harga' => 7000, 'gambar' => 'teh-botol.jpg'],
             // Tambahkan menu lainnya...
         ]);
     }
}
