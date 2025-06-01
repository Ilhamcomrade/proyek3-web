<?php

namespace App\Http\Controllers;


use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
  
 public function store(Request $request)
{
    // Simpan data pelanggan baru
    $customer = Customer::create([
        'name' => $request->name,
        'table_number' => $request->table_number,
        'number_customers' => $request->number_customers,
    ]);

    // Update order yang belum memiliki customer_id
    $order = Order::findOrFail($request->order_id);
    $order->customer_id = $customer->id;

    // Hitung ulang total amount berdasarkan item di order tersebut
    $totalAmount = OrderItem::where('order_id', $order->id)
        ->sum(\DB::raw('quantity * price'));
    $order->total_amount = $totalAmount;

    $order->save();

    return redirect()->route('order.index', ['order' => $order->id]);
}




}