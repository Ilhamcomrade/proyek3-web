<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        return Payment::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'order_id' => 'required|exists:orders,id',
            'payment_method' => 'required|string',
            'amount_paid' => 'required|numeric',
            'payment_status' => 'required|string',
        ]);

        $payment = Payment::create($validated);

        return response()->json($payment, 201);
    }

    public function show($id)
    {
        return Payment::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $payment = Payment::findOrFail($id);

        $validated = $request->validate([
            'order_id' => 'sometimes|exists:orders,id',
            'payment_method' => 'sometimes|string',
            'amount_paid' => 'sometimes|numeric',
            'payment_status' => 'sometimes|string',
        ]);

        $payment->update($validated);

        return response()->json($payment);
    }

    public function destroy($id)
    {
        Payment::destroy($id);

        return response()->json(['message' => 'Payment deleted successfully.']);
    }
}