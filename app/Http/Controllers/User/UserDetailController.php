<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
    public function show(UserDetail $userDetail)
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
    public function edit(UserDetail $userDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserDetail  $userDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserDetail $userDetail)
    {
        //
        $check = UserDetail::where('user_id', Auth::user()->id)->first();
        if($check){
            $check->photo = $request->foto;
            $check->biodata = $request->biodata;
            $check->alamat = $request->alamat;
            $check->facebook = $request->facebook;
            $check->twitter = $request->twitter;
            $check->instagram = $request->instagram;
            $check->github = $request->github;
            $check->linkedin = $request->linkedin;
            $check->save();

            Alert::success('Profile berhasil diupdate');

            return redirect()->route('user.profile.show');
        }else{
            $detail = new UserDetail();
            $detail->photo = $request->foto;
            $detail->biodata = $request->biodata;
            $detail->alamat = $request->alamat;
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
