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
            //makanan
            ['nama' => 'Etong ', 'kategori' => 'makanan', 'harga' => 70000, 'gambar' => 'Etong.jpg'],
            ['nama' => 'Abangan', 'kategori' => 'makanan', 'harga' => 70000, 'gambar' => 'Abangan.jpg'],
            ['nama' => 'Alamkao', 'kategori' => 'makanan', 'harga' => 80000, 'gambar' => 'Alamkao.jpg'],
            ['nama' => 'Kakap Bakar', 'kategori' => 'makanan', 'harga' => 100000, 'gambar' => 'Kakap Bakar.png'],
            ['nama' => 'Kakap Saus Tiram ', 'kategori' => 'makanan', 'harga' => 100000, 'gambar' => 'Kakap Saus Tiram.png'],
            ['nama' => 'Bawal ', 'kategori' => 'makanan', 'harga' => 100000, 'gambar' => 'Bawal.png'],
            ['nama' => 'Udang Bakar', 'kategori' => 'makanan', 'harga' => 95000, 'gambar' => 'Udang Bakar.png'],
            ['nama' => 'Udang Saus Tiram ', 'kategori' => 'makanan', 'harga' => 70000, 'gambar' => 'Udang Saus Tiram.jpg'],
            ['nama' => 'Udang Asam Manis ', 'kategori' => 'makanan', 'harga' => 70000, 'gambar' => 'Udang Asam Manis.png'],
            ['nama' => 'Udang Saus Padang ', 'kategori' => 'makanan', 'harga' => 70000, 'gambar' => 'Udang Saus Padang.png'],
            ['nama' => 'Cumi Bakar ', 'kategori' => 'makanan', 'harga' => 90000, 'gambar' => 'Cumi Bakar.jpg'],
            ['nama' => 'Cumi Saus Tiram ', 'kategori' => 'makanan', 'harga' => 60000, 'gambar' => 'Cumi Saus Tiram.jpg'],
            ['nama' => 'Cumi Asam Manis ', 'kategori' => 'makanan', 'harga' => 60000, 'gambar' => 'Cumi Asam Manis.png'],
            ['nama' => 'Cumi Saus Padang ', 'kategori' => 'makanan', 'harga' => 60000, 'gambar' => 'Cumi Saus Padang.png'],
            ['nama' => 'Udang Crispy', 'kategori' => 'makanan', 'harga' => 65000, 'gambar' => 'Udang Crispy.png'],
            ['nama' => 'Cumi Crispy ', 'kategori' => 'makanan', 'harga' => 80000, 'gambar' => 'Cumi Crispy.png'],
            ['nama' => 'Cah Kangkung ', 'kategori' => 'makanan', 'harga' => 7000, 'gambar' => 'Cah Kangkung.jpg'],
            ['nama' => 'Karedok ', 'kategori' => 'makanan', 'harga' => 10000, 'gambar' => 'Karedok.jpg'],
            ['nama' => 'Ayam Bakar ', 'kategori' => 'makanan', 'harga' => 25000, 'gambar' => 'Ayam Bakar.jpg'],
            ['nama' => 'Ayam Goreng', 'kategori' => 'makanan', 'harga' => 25000, 'gambar' => 'Ayam Goreng.jpg'],
            ['nama' => 'Sayur Asem ', 'kategori' => 'makanan', 'harga' => 25000, 'gambar' => 'Sayur Asem.jpg'],
            ['nama' => 'Kepiting Saus Padang Telur ', 'kategori' => 'makanan', 'harga' => 90000, 'gambar' => 'Kepiting Saus Padang Telur.jpg'],
            ['nama' => 'Kepiting Saus Padang Biasa ', 'kategori' => 'makanan', 'harga' => 75000, 'gambar' => 'Kepiting Saus Padang Biasa.jpg'],
            ['nama' => 'Kepiting Saus Tiram Telur ', 'kategori' => 'makanan', 'harga' => 90000, 'gambar' => 'Kepiting Saus Tiram Telur.jpg'],
            ['nama' => 'Kepiting Saus Tiram Biasa ', 'kategori' => 'makanan', 'harga' => 75000, 'gambar' => 'Kepiting Saus Tiram Biasa.jpg'],
            ['nama' => 'Kepiting Saus Manis Telur ', 'kategori' => 'makanan', 'harga' => 90000, 'gambar' => 'Kepiting Saus Manis Telur.jpg'],
            ['nama' => 'Kepiting Saus Manis Biasa ', 'kategori' => 'makanan', 'harga' => 75000, 'gambar' => 'Kepiting Saus Manis Biasa.jpg'],
            ['nama' => 'Rajungan Saus Tiram ', 'kategori' => 'makanan', 'harga' => 100000, 'gambar' => 'Rajungan Saus Tiram.jpg'],
            ['nama' => 'Rajungan Asam Manis ', 'kategori' => 'makanan', 'harga' => 100000, 'gambar' => 'Rajungan Asam Manis.jpg'],
            ['nama' => 'Ikan Gombyang ', 'kategori' => 'makanan', 'harga' => 10000, 'gambar' => 'Ikan Gombyang.jpg'],
            ['nama' => 'Kerang Simping ', 'kategori' => 'makanan', 'harga' => 30000, 'gambar' => 'Kerang Simping.png'],
            ['nama' => 'Kerang Dara ', 'kategori' => 'makanan', 'harga' => 30000, 'gambar' => 'Kerang Dara.png'],
            ['nama' => 'Cah Toge ', 'kategori' => 'makanan', 'harga' => 80000, 'gambar' => 'Cah Toge.jpg'],
            ['nama' => 'Talang - Talang ', 'kategori' => 'makanan', 'harga' => 80000, 'gambar' => 'Talang - Talang.jpg'],

            //minuman
            ['nama' => 'Teh Manis Panas', 'kategori' => 'minuman', 'harga' => 4000, 'gambar' => 'Teh Manis Panas.png'],
            ['nama' => 'Jeruk Anget', 'kategori' => 'minuman', 'harga' => 6000, 'gambar' => 'Jeruk Anget.png'],
            ['nama' => 'Es Teh Manis', 'kategori' => 'minuman', 'harga' => 5000, 'gambar' => 'Es Teh Manis.png'],
            ['nama' => 'Es Teh Tawar', 'kategori' => 'minuman', 'harga' => 3000, 'gambar' => 'Es Teh Tawar.png'],
            ['nama' => 'Teh Pucuk', 'kategori' => 'minuman', 'harga' => 5000, 'gambar' => 'Teh Pucuk.jpg'],
            ['nama' => 'Es Teh Manis Teko', 'kategori' => 'minuman', 'harga' => 15000, 'gambar' => 'Es Teh Manis Teko.jpg'],
            ['nama' => 'Teh Manis Panas Teko', 'kategori' => 'minuman', 'harga' => 10000, 'gambar' => 'Teh Manis Panas Teko.jpg'],
            ['nama' => 'Air Mineral', 'kategori' => 'minuman', 'harga' => 5000, 'gambar' => 'Air Mineral.jpg'],
            ['nama' => 'Es Jeruk', 'kategori' => 'minuman', 'harga' => 7000, 'gambar' => 'Es Jeruk.png'],
            ['nama' => 'Es Kelapa Komplit', 'kategori' => 'minuman', 'harga' => 15000, 'gambar' => 'Es Kelapa Komplit.jpg'],
            ['nama' => 'Kelapa Murni', 'kategori' => 'minuman', 'harga' => 12000, 'gambar' => 'Kelapa Murni.jpg'],
            ['nama' => 'Jus Alpukat', 'kategori' => 'minuman', 'harga' => 10000, 'gambar' => 'Jus Alpukat.jpg'],
            ['nama' => 'Es Teh Botol', 'kategori' => 'minuman', 'harga' => 7000, 'gambar' => 'Es Teh Botol.jpg'],
            ['nama' => 'Teh Botol', 'kategori' => 'minuman', 'harga' => 7000, 'gambar' => 'Teh botol.jpg'],
            
            //snack
            ['nama' => 'Qtela', 'kategori' => 'snack', 'harga' => 3000, 'gambar' => 'Qtela.jpg'],
            ['nama' => 'Taro', 'kategori' => 'snack', 'harga' => 2000, 'gambar' => 'Taro.jpg'],
            ['nama' => 'Nabati', 'kategori' => 'snack', 'harga' => 3000, 'gambar' => 'Nabati.jpg'],
            ['nama' => 'Kerupuk Lembang', 'kategori' => 'snack', 'harga' => 5000, 'gambar' => 'Kerupuk Lembang.jpg'],
            ['nama' => 'Kerupuk Kulit', 'kategori' => 'snack', 'harga' => 2000, 'gambar' => 'Kerupuk Kulit.jpg'],
            ['nama' => 'Lays', 'kategori' => 'snack', 'harga' => 3000, 'gambar' => 'Lays.jpg'],
            ['nama' => 'Kacang Kulit', 'kategori' => 'snack', 'harga' => 3000, 'gambar' => 'Kacang Kulit.jpg'],
            ['nama' => 'Kacang Koro', 'kategori' => 'snack', 'harga' => 3000, 'gambar' => 'Kacang Koro.jpg'],

            //kopi
            ['nama' => 'Good Day Freeze', 'kategori' => 'kopi', 'harga' => 3000, 'gambar' => 'Good Day Freeze.jpg'],
            ['nama' => 'Kopi Luwak', 'kategori' => 'kopi', 'harga' => 3000, 'gambar' => 'Kopi Luwak.jpg'],
            ['nama' => 'Kopi Good Day', 'kategori' => 'kopi', 'harga' => 3000, 'gambar' => 'Kopi Good Day.jpg'],
            ['nama' => 'Kopi ABC', 'kategori' => 'kopi', 'harga' => 3000, 'gambar' => 'Kopi ABC.jpg'],
            ['nama' => 'Kopi Indocafe', 'kategori' => 'kopi', 'harga' => 3000, 'gambar' => 'Kopi Indocafe.jpg'],
            ['nama' => 'Kopi Kapal Api', 'kategori' => 'kopi', 'harga' => 3000, 'gambar' => 'Kopi Kapal Api.jpg'],

        ]);
    }
}
