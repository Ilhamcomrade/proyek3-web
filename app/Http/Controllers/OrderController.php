<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Customer;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Order $order)
    {
        // Load customer dan order items
        $order->load(['customer', 'orderItems.product']);

        return view('order.index', compact('order'));
    }

  public function store(Request $request)
    {
        // 1. Validasi form
        $request->validate([
            'name' => 'required|string',
            'table_number' => 'required|string',
        ]);

        // 2. Simpan data pelanggan
        $customer = Customer::create([
            'name' => $request->name,
            'table_number' => $request->table_number,
        ]);

        // 3. Hitung total harga dari order_items berdasarkan customer_id
        $totalAmount = OrderItem::where('customer_id', $customer->id)
            ->sum(\DB::raw('quantity * price'));

        // 4. Simpan order ke tabel orders
        $order = Order::create([
            'customer_id' => $customer->id,
            'status' => 'pending',
            'total_amount' => $totalAmount,
        ]);

        // 5. Redirect atau tampilkan response
        return redirect()->route('order.index', ['order' => $order->id]);
    }

}
