<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthController extends Controller
{
   public function register(RegisterRequest $request)
   {
       User::create([
          'email' => $request->email,
          'password' => bcrypt($request->password),
          'name' => $request->name,
       ]);

       return response()->json([
           'success' => true,
       ], 201);
   }

   public function login(LoginRequest $request)
   {
    $user = User::where('email', $request->email)->first();
    if (!$user || !Hash::check($request->password, $user->password)) {
        return response()->json([
            'message' => 'Invalid data',
            'errors' => [
                'email' => ['Invalid data'],
            ]
        ], 422);
    }
    $token = Str::random(36);
    $user->api_token = $token;
    $user->save();

    return response()->json([
        'token' => $token,
    ]);
   }
}
