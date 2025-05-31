<?php

namespace App\Http\Controllers;

use App\Models\OrderItem;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderItemController extends Controller
{
    public function index()
    {
        $currentOrder = Order::whereNull('customer_id')->orderBy('id', 'desc')->first();

        if (!$currentOrder) {
            return view('keranjang', ['orderItems' => collect(), 'total' => 0, 'orderIdTerbaru' => null]);
        }

        $orderItems = OrderItem::with('product')
                    ->where('order_id', $currentOrder->id)
                    ->get();

        $total = $orderItems->sum(fn($item) => $item->price * $item->quantity);

        return view('keranjang', compact('orderItems', 'total'))->with('orderIdTerbaru', $currentOrder->id);
    }

   public function addToKeranjang(Request $request)
{
    DB::beginTransaction();
    try {
        $request->validate(['product_id' => 'required|exists:products,id']);

        $product = Product::findOrFail($request->product_id);

        $currentOrder = Order::whereNull('customer_id')->orderBy('id', 'desc')->first();

        if (!$currentOrder) {
            $nextOrderId = Order::count() + 1;
            $order = Order::create([
                'id' => $nextOrderId,
                'customer_id' => null,
                'status' => 'pending',
                'total_amount' => 0
            ]);
        } else {
            $order = $currentOrder;
        }

        $orderItem = OrderItem::firstOrNew([
            'product_id' => $product->id,
            'order_id' => $order->id
        ]);

        $orderItem->quantity = $orderItem->exists ? $orderItem->quantity + 1 : 1;
        $orderItem->price = $product->price;
        $orderItem->save();

        DB::commit();

        // Hitung total quantity semua item di order ini
        $totalQuantity = OrderItem::where('order_id', $order->id)->sum('quantity');

        return response()->json([
            'success' => true,
            'keranjang_count' => $totalQuantity
        ]);
    } catch (\Exception $e) {
        DB::rollBack();
        return response()->json(['success' => false, 'message' => 'Gagal: '.$e->getMessage()], 500);
    }
}

  public function update(Request $request, $id)
{
    $orderItem = OrderItem::findOrFail($id);
    $orderItem->quantity = $request->quantity;
    $orderId = $orderItem->order_id;

    if ($orderItem->quantity <= 0) {
        $orderItem->delete();
        $deleted = true;
    } else {
        $orderItem->save();
        $deleted = false;
    }

    // Hitung ulang total quantity dan total amount
    $totalQuantity = OrderItem::where('order_id', $orderId)->sum('quantity');
    $totalAmount = OrderItem::where('order_id', $orderId)
                  ->sum(DB::raw('price * quantity'));

    return response()->json([
        'success' => true,
        'deleted' => $deleted,
        'keranjang_count' => $totalQuantity,
        'total_amount' => $totalAmount
    ]);
}


   public function destroy($id)
{
    $orderItem = OrderItem::findOrFail($id);
    $orderId = $orderItem->order_id;
    $orderItem->delete();

    // Hitung ulang total quantity dan total amount
    $totalQuantity = OrderItem::where('order_id', $orderId)->sum('quantity');
    $totalAmount = OrderItem::where('order_id', $orderId)
                  ->sum(DB::raw('price * quantity'));

    return response()->json([
        'success' => true,
        'keranjang_count' => $totalQuantity,
        'total_amount' => $totalAmount
    ]);
}

public function getCartCount()
{
    $count = OrderItem::whereHas('order', fn($query) => $query->whereNull('customer_id'))->sum('quantity');
    return response()->json(['keranjang_count' => $count]);
}


}
