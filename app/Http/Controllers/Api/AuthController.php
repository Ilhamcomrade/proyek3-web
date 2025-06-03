<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Google_Client;

class GoogleAuthController extends Controller
{
    public function googleLogin(Request $request)
    {
        $idToken = $request->idToken;

        $client = new Google_Client(['client_id' => env('GOOGLE_CLIENT_ID')]);
        $payload = $client->verifyIdToken($idToken);

        if ($payload) {
            $email = $payload['email'];

            $user = User::firstOrCreate(
                ['email' => $email],
                ['name' => $payload['name']]
            );

            $token = $user->createToken('google_token')->plainTextToken;

            return response()->json([
                'access_token' => $token,
                'token_type' => 'Bearer',
                'user' => $user
            ]);
        } else {
            return response()->json(['error' => 'Invalid Google token'], 401);
        }
    }
}

class AuthController extends Controller
{
    public function loginGoogle(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'name' => 'required'
        ]);

        $user = User::firstOrCreate(
            ['email' => $request->email],
            ['name' => $request->name]
        );

        $token = $user->createToken('kasir_kuliner_token')->plainTextToken;

        return response()->json([
            'token' => $token,
            'user' => $user
        ]);
    }
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
                'token' => $token,
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
    public function destroy(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json([
            'message' => 'Logout berhasil'
        ]);
    }
}
