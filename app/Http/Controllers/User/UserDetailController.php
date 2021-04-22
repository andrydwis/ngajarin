<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use RealRashid\SweetAlert\Facades\Alert;

class UserDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserDetail  $userDetail
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
        $data = [
            'user' => User::with('detail')->find(Auth::user()->id),
        ];

        return view('user.profile.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserDetail  $userDetail
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        //
        $data = [
            'user' => User::with('detail')->find(Auth::user()->id),
        ];

        return view('user.profile.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserDetail  $userDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $user = User::find(Auth::user()->id);
        if ($request->password) {
            $request->validate([
                'nama' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user)],
                'telepon' => ['required', 'numeric', Rule::unique('users', 'phone')->ignore($user)],
                'password' => ['required', 'string', 'confirmed', 'min:8']
            ]);

            $user->name = $request->nama;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->phone = $request->telepon;
            $user->save();
        } else {
            $request->validate([
                'nama' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user)],
                'telepon' => ['required', 'numeric', Rule::unique('users', 'phone')->ignore($user)],
            ]);

            $user->name = $request->nama;
            $user->email = $request->email;
            $user->phone = $request->telepon;
            $user->save();
        }

        $detail = UserDetail::where('user_id', Auth::user()->id)->first();
        if ($detail) {
            $detail->photo = $request->foto;
            $detail->biodata = $request->biodata;
            $detail->address = $request->alamat;
            $detail->facebook = $request->facebook;
            $detail->twitter = $request->twitter;
            $detail->instagram = $request->instagram;
            $detail->github = $request->github;
            $detail->linkedin = $request->linkedin;
            $detail->save();

            Alert::success('Profile berhasil diupdate');

            return redirect()->route('user.profile.show');
        } else {
            $detail = new UserDetail();
            $detail->user_id = $user->id;
            $detail->photo = $request->foto;
            $detail->biodata = $request->biodata;
            $detail->address = $request->alamat;
            $detail->facebook = $request->facebook;
            $detail->twitter = $request->twitter;
            $detail->instagram = $request->instagram;
            $detail->github = $request->github;
            $detail->linkedin = $request->linkedin;
            $detail->save();

            Alert::success('Profile berhasil diupdate');

            return redirect()->route('user.profile.show');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserDetail  $userDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserDetail $userDetail)
    {
        //
    }
}
