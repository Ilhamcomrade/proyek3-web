<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('YourAppName')->plainTextToken; // Buat token

            return response()->json([
                'success' => true,
                'user' => $user,
                'token' => $token, // Kirim token ke frontend
                'message' => 'Login berhasil',
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Email atau password salah',
        ], 401);
    }

        /**
         * Store a newly created resource in storage.
         */
        public function store(Request $request)
        {
            try {
                $validated = $request->validate([
                    'name' => 'required|string|max:255',
                    'email' => 'required|string|email|max:255|unique:users',
                    'password' => 'required|string|min:8|confirmed',
                ]);

                $validated['password'] = bcrypt($validated['password']);

                $user = User::create($validated);

                return response()->json([
                    'message' => 'User berhasil terdaftar',
                    'user' => $user,
                ], 201);

            } catch (\Throwable $e) {
                return response()->json([
                    'message' => 'Error: ' . $e->getMessage(),
                ], 500);
            }
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return User::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json([
            'message' => 'Logout berhasil'
        ]);
    }
}
