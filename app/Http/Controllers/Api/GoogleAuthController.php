<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
