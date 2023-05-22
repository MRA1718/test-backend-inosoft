<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function __invoke(Request $request)
    {
        request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'min:5']
        ]);

        if(!$token = auth()->attempt($request->only('email', 'password'))) {
            return response()->json(['error' => 'Unauthorized'], 401);;
        }

        return response()->json(compact('token'));
    }
}
