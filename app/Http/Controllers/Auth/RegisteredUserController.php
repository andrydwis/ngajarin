<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Carbon\Carbon;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use RealRashid\SweetAlert\Facades\Alert;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {

        $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')],
            'telepon' => ['required', 'numeric', Rule::unique('users', 'phone')],
            'password' => ['required', 'string', 'confirmed', 'min:8']
        ]);

        $user = User::create([
            'name' => $request->nama,
            'email' => $request->email,
            'phone' => $request->telepon,
            'password' => Hash::make($request->password),
            'email_verified_at' => Carbon::now()
        ]);

        $user->assignRole('student');

        event(new Registered($user));

        Alert::success('Email verifikasi telah dikirim ke email anda');

        return redirect()->route('login');
    }
}
