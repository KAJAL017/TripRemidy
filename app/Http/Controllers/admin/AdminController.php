<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
// use Illuminate\Container\Attributes\Log;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class AdminController extends Controller
{
    public function login()
    {
        return view('admin.auth.login');
    }
    public function loginProcess(Request $request)
    {
        Log::info('Admin login attempt', [
            'email' => $request->email,
            'ip' => $request->ip(),
        ]);
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
