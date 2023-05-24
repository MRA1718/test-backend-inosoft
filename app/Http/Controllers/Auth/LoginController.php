<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function __invoke(Request $request)
    {
        request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'min:5']
        ]);

        if($token = auth()->attempt($request->only('email', 'password'))) {
            return response()->json([
                'status' => 200,
                'message' => 'Login successfully',
                'data' => compact('token')
            ], 200);
        }

        return response()->json([
            'status' => 401,
            'error' => 'Unauthorized'
        ], 401);
    }
}
