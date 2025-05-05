<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class OrderItemController extends Controller
{
    public function index()
    {
        return OrderItem::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'order_id' => 'required|exists:orders,id',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer',
            'price' => 'required|numeric',
        ]);

        $orderItem = OrderItem::create($validated);

        return response()->json($orderItem, 201);
    }

    public function show($id)
    {
        return OrderItem::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $orderItem = OrderItem::findOrFail($id);

        $validated = $request->validate([
            'order_id' => 'sometimes|exists:orders,id',
            'product_id' => 'sometimes|exists:products,id',
            'quantity' => 'sometimes|integer',
            'price' => 'sometimes|numeric',
        ]);

        $orderItem->update($validated);

        return response()->json($orderItem);
    }

    public function destroy($id)
    {
        OrderItem::destroy($id);

        return response()->json(['message' => 'Order item deleted successfully.']);
    }
}
