<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PasswordChangeController extends Controller
{
    //
    public function index()
    {
        return view('auth.change-password');
    }

    public function update(Request $request)
    {
        $user = $request->user();

        if (!Hash::check($request->password_sekarang, $user->password)) {
            $request->validate([
                'password_sekarang' => ['required', 'string', 'min:8'],
                'password' => ['required', 'string', 'confirmed', 'min:8']
            ]);
            return back()->withErrors(['password_sekarang' => 'Password tidak cocok']);
        } else {
            $request->validate([
                'password_sekarang' => ['required', 'string', 'min:8'],
                'password' => ['required', 'string', 'confirmed', 'min:8']
            ]);
        }

        $user->password = Hash::make($request->password);
        $user->save();

        return back();
    }
}
