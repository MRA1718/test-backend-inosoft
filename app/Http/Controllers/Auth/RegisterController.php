<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User; 

class RegisterController extends Controller
{
    public function __invoke(Request $request)
    {
        request()->validate([
            'username' => ['required', 'min:3', 'max:25', 'unique:user'],
            'email' => ['required', 'email', 'unique:user'],
            'password' => ['required', 'min:5']
        ]);

        $user = new User();
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return $user;
    }
}
