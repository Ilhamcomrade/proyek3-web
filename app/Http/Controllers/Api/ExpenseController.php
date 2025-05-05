<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Expense;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    public function index()
    {
        $expenses = Expense::with('user')->get();
        return response()->json($expenses);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'description' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'created_by' => 'required|exists:users,id',
        ]);

        $expense = Expense::create($validated);
        return response()->json($expense, 201);
    }

    public function show($id)
    {
        $expense = Expense::with('user')->findOrFail($id);
        return response()->json($expense);
    }

    public function update(Request $request, $id)
    {
        $expense = Expense::findOrFail($id);
        $expense->update($request->all());
        return response()->json($expense);
    }

    public function destroy($id)
    {
        Expense::destroy($id);
        return response()->json(null, 204);
    }
}
