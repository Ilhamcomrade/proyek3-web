<?php

namespace App\Http\Controllers;


use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
  
   public function store(Request $request)
{
    $request->validate([
        'name' => 'required',
        'table_number' => 'required',
        'number_customers' => 'required|numeric'
    ]);

    // Ambil order terakhir tanpa customer_id (order pelanggan yang sedang memesan)
    $currentOrder = Order::whereNull('customer_id')->orderBy('id', 'desc')->first();

    if (!$currentOrder) {
        return redirect()->back()->with('error', 'Tidak ada pesanan aktif.');
    }

    // Buat customer baru dengan ID yang sama dengan order_id terbaru
    $customer = Customer::create([
        'id' => $currentOrder->id,
        'name' => $request->name,
        'table_number' => $request->table_number,
        'number_customers' => $request->number_customers
    ]);

    // Perbarui order agar memiliki customer_id
    $currentOrder->update([
        'customer_id' => $customer->id
    ]);

    return redirect()->route('keranjang')->with('success', 'Pelanggan berhasil ditambahkan!');
}

}