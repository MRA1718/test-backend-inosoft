<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function __invoke()
    {
        auth()->logout();
        return response()->json([
            'status' => 200,
            'message' => 'Logout successfully'
        ], 200);
    }
}
