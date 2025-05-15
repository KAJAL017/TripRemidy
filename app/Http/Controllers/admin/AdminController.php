<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function login()
    {
        return view('admin.auth.login');
    }
    public function loginProcess(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $admin = DB::table('admin')->where('email', $request->email)->first();

        if ($admin && $request->password == $admin->password) {
            session(['user_id' => $admin->id, 'user_email' => $admin->email]);
            return response()->json([
                'status' => true,
                'message' => 'Login successful!',
                'redirect_url' => route('admin.dashboard')
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Invalid email or password.'
            ]);
        }
    }
}
