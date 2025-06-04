<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function showCash($orderId)
    {
        $order = Order::with(['customer', 'orderItems.product', 'payment'])->findOrFail($orderId);
        return view('cash.index', compact('order'));
    }

    public function index()
{
    $order = Order::with(['customer', 'orderItems.product'])->latest()->first();

    if (!$order) {
        return redirect('/')->with('error', 'Data pesanan tidak ditemukan.');
    }

    return view('cash.index', compact('order'));
}
}
