<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Customer;
use App\Models\OrderItem;
use App\Models\PaymentMethod;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Order $order)
    {
        // Load customer, orderItems, dan product terkait
        $order->load(['customer', 'orderItems.product']);

        // Ambil semua metode pembayaran untuk pop-up
        $methods = PaymentMethod::all();

        return view('order.index', compact('order', 'methods'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'table_number' => 'required|string',
        ]);

        $customer = Customer::create([
            'name' => $request->name,
            'table_number' => $request->table_number,
        ]);

        $totalAmount = OrderItem::where('customer_id', $customer->id)
            ->sum(\DB::raw('quantity * price'));

        $order = Order::create([
            'customer_id' => $customer->id,
            'status' => 'pending',
            'total_amount' => $totalAmount,
        ]);

        return redirect()->route('order.index', ['order' => $order->id]);
    }
}
