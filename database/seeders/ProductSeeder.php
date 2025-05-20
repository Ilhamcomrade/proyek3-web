<?php

// database/seeders/ProductSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [

              //makanan
            ['name' => 'Etong ', 'category' => 'makanan', 'price' => 70000, 'image' => 'Etong.jpg'],
            ['name' => 'Abangan', 'category' => 'makanan', 'price' => 70000, 'image' => 'Abangan.jpg'],
            ['name' => 'Alamkao', 'category' => 'makanan', 'price' => 80000, 'image' => 'Alamkao.jpg'],
            ['name' => 'Kakap Bakar', 'category' => 'makanan', 'price' => 100000, 'image' => 'Kakap Bakar.png'],
            ['name' => 'Kakap Saus Tiram ', 'category' => 'makanan', 'price' => 100000, 'image' => 'Kakap Saus Tiram.png'],
            ['name' => 'Bawal ', 'category' => 'makanan', 'price' => 100000, 'image' => 'Bawal.png'],
            ['name' => 'Udang Bakar', 'category' => 'makanan', 'price' => 95000, 'image' => 'Udang Bakar.png'],
            ['name' => 'Udang Saus Tiram ', 'category' => 'makanan', 'price' => 70000, 'image' => 'Udang Saus Tiram.jpg'],
            ['name' => 'Udang Asam Manis ', 'category' => 'makanan', 'price' => 70000, 'image' => 'Udang Asam Manis.png'],
            ['name' => 'Udang Saus Padang ', 'category' => 'makanan', 'price' => 70000, 'image' => 'Udang Saus Padang.png'],
            ['name' => 'Cumi Bakar ', 'category' => 'makanan', 'price' => 90000, 'image' => 'Cumi Bakar.jpg'],
            ['name' => 'Cumi Saus Tiram ', 'category' => 'makanan', 'price' => 60000, 'image' => 'Cumi Saus Tiram.jpg'],
            ['name' => 'Cumi Asam Manis ', 'category' => 'makanan', 'price' => 60000, 'image' => 'Cumi Asam Manis.png'],
            ['name' => 'Cumi Saus Padang ', 'category' => 'makanan', 'price' => 60000, 'image' => 'Cumi Saus Padang.png'],
            ['name' => 'Udang Crispy', 'category' => 'makanan', 'price' => 65000, 'image' => 'Udang Crispy.png'],
            ['name' => 'Cumi Crispy ', 'category' => 'makanan', 'price' => 80000, 'image' => 'Cumi Crispy.png'],
            ['name' => 'Cah Kangkung ', 'category' => 'makanan', 'price' => 7000, 'image' => 'Cah Kangkung.jpg'],
            ['name' => 'Karedok ', 'category' => 'makanan', 'price' => 10000, 'image' => 'Karedok.jpg'],
            ['name' => 'Ayam Bakar ', 'category' => 'makanan', 'price' => 25000, 'image' => 'Ayam Bakar.jpg'],
            ['name' => 'Ayam Goreng', 'category' => 'makanan', 'price' => 25000, 'image' => 'Ayam Goreng.jpg'],
            ['name' => 'Sayur Asem ', 'category' => 'makanan', 'price' => 25000, 'image' => 'Sayur Asem.jpg'],
            ['name' => 'Kepiting Saus Padang Telur ', 'category' => 'makanan', 'price' => 90000, 'image' => 'Kepiting Saus Padang Telur.jpg'],
            ['name' => 'Kepiting Saus Padang Biasa ', 'category' => 'makanan', 'price' => 75000, 'image' => 'Kepiting Saus Padang Biasa.jpg'],
            ['name' => 'Kepiting Saus Tiram Telur ', 'category' => 'makanan', 'price' => 90000, 'image' => 'Kepiting Saus Tiram Telur.jpg'],
            ['name' => 'Kepiting Saus Tiram Biasa ', 'category' => 'makanan', 'price' => 75000, 'image' => 'Kepiting Saus Tiram Biasa.jpg'],
            ['name' => 'Kepiting Saus Manis Telur ', 'category' => 'makanan', 'price' => 90000, 'image' => 'Kepiting Saus Manis Telur.jpg'],
            ['name' => 'Kepiting Saus Manis Biasa ', 'category' => 'makanan', 'price' => 75000, 'image' => 'Kepiting Saus Manis Biasa.jpg'],
            ['name' => 'Rajungan Saus Tiram ', 'category' => 'makanan', 'price' => 100000, 'image' => 'Rajungan Saus Tiram.jpg'],
            ['name' => 'Rajungan Asam Manis ', 'category' => 'makanan', 'price' => 100000, 'image' => 'Rajungan Asam Manis.jpg'],
            ['name' => 'Ikan Gombyang ', 'category' => 'makanan', 'price' => 10000, 'image' => 'Ikan Gombyang.jpg'],
            ['name' => 'Kerang Simping ', 'category' => 'makanan', 'price' => 30000, 'image' => 'Kerang Simping.png'],
            ['name' => 'Kerang Dara ', 'category' => 'makanan', 'price' => 30000, 'image' => 'Kerang Dara.png'],
            ['name' => 'Cah Toge ', 'category' => 'makanan', 'price' => 80000, 'image' => 'Cah Toge.jpg'],
            ['name' => 'Talang - Talang ', 'category' => 'makanan', 'price' => 80000, 'image' => 'Talang - Talang.jpg'],

            //minuman
            ['name' => 'Teh Manis Panas', 'category' => 'minuman', 'price' => 4000, 'image' => 'Teh Manis Panas.png'],
            ['name' => 'Jeruk Anget', 'category' => 'minuman', 'price' => 6000, 'image' => 'Jeruk Anget.png'],
            ['name' => 'Es Teh Manis', 'category' => 'minuman', 'price' => 5000, 'image' => 'Es Teh Manis.png'],
            ['name' => 'Es Teh Tawar', 'category' => 'minuman', 'price' => 3000, 'image' => 'Es Teh Tawar.png'],
            ['name' => 'Teh Pucuk', 'category' => 'minuman', 'price' => 5000, 'image' => 'Teh Pucuk.jpg'],
            ['name' => 'Es Teh Manis Teko', 'category' => 'minuman', 'price' => 15000, 'image' => 'Es Teh Manis Teko.jpg'],
            ['name' => 'Teh Manis Panas Teko', 'category' => 'minuman', 'price' => 10000, 'image' => 'Teh Manis Panas Teko.jpg'],
            ['name' => 'Air Mineral', 'category' => 'minuman', 'price' => 5000, 'image' => 'Air Mineral.jpg'],
            ['name' => 'Es Jeruk', 'category' => 'minuman', 'price' => 7000, 'image' => 'Es Jeruk.png'],
            ['name' => 'Es Kelapa Komplit', 'category' => 'minuman', 'price' => 15000, 'image' => 'Es Kelapa Komplit.jpg'],
            ['name' => 'Kelapa Murni', 'category' => 'minuman', 'price' => 12000, 'image' => 'Kelapa Murni.jpg'],
            ['name' => 'Jus Alpukat', 'category' => 'minuman', 'price' => 10000, 'image' => 'Jus Alpukat.jpg'],
            ['name' => 'Es Teh Botol', 'category' => 'minuman', 'price' => 7000, 'image' => 'Es Teh Botol.jpg'],
            ['name' => 'Teh Botol', 'category' => 'minuman', 'price' => 7000, 'image' => 'Teh botol.jpg'],
            
            //snack
            ['name' => 'Qtela', 'category' => 'snack', 'price' => 3000, 'image' => 'Qtela.jpg'],
            ['name' => 'Taro', 'category' => 'snack', 'price' => 2000, 'image' => 'Taro.jpg'],
            ['name' => 'Nabati', 'category' => 'snack', 'price' => 3000, 'image' => 'Nabati.jpg'],
            ['name' => 'Kerupuk Lembang', 'category' => 'snack', 'price' => 5000, 'image' => 'Kerupuk Lembang.jpg'],
            ['name' => 'Kerupuk Kulit', 'category' => 'snack', 'price' => 2000, 'image' => 'Kerupuk Kulit.jpg'],
            ['name' => 'Lays', 'category' => 'snack', 'price' => 3000, 'image' => 'Lays.jpg'],
            ['name' => 'Kacang Kulit', 'category' => 'snack', 'price' => 3000, 'image' => 'Kacang Kulit.jpg'],
            ['name' => 'Kacang Koro', 'category' => 'snack', 'price' => 3000, 'image' => 'Kacang Koro.jpg'],

            //kopi
            ['name' => 'Good Day Freeze', 'category' => 'kopi', 'price' => 3000, 'image' => 'Good Day Freeze.jpg'],
            ['name' => 'Kopi Luwak', 'category' => 'kopi', 'price' => 3000, 'image' => 'Kopi Luwak.jpg'],
            ['name' => 'Kopi Good Day', 'category' => 'kopi', 'price' => 3000, 'image' => 'Kopi Good Day.jpg'],
            ['name' => 'Kopi ABC', 'category' => 'kopi', 'price' => 3000, 'image' => 'Kopi ABC.jpg'],
            ['name' => 'Kopi Indocafe', 'category' => 'kopi', 'price' => 3000, 'image' => 'Kopi Indocafe.jpg'],
            ['name' => 'Kopi Kapal Api', 'category' => 'kopi', 'price' => 3000, 'image' => 'Kopi Kapal Api.jpg'],

        ];

        foreach ($products as $data) {
            $category = Category::firstOrCreate(['name' => $data['category']]);

            Product::create([
                'name' => $data['name'],
                'price' => $data['price'],
                'stock' => true,
                'image_url' => $data['image'],
                'category_id' => $category->id,
            ]);
        }
    }
}
