<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\MentorRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use RealRashid\SweetAlert\Facades\Alert;

class MentorRequestController extends Controller
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
        $request->validate([
            'email' => ['required', 'email', Rule::unique('users')],
            'alasan' => ['required']
        ]);

        $mentorRequest = new MentorRequest();
        $mentorRequest->user_id = Auth::user()->id;
        $mentorRequest->email = $request->email;
        $mentorRequest->reason = $request->alasan;
        $mentorRequest->save();

        Alert::success('Permintaan daftar mentor berhasil dikirim, harap tunggu balasan admin');

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MentorRequest  $mentorRequest
     * @return \Illuminate\Http\Response
     */
    public function show(MentorRequest $mentorRequest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MentorRequest  $mentorRequest
     * @return \Illuminate\Http\Response
     */
    public function edit(MentorRequest $mentorRequest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MentorRequest  $mentorRequest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MentorRequest $mentorRequest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MentorRequest  $mentorRequest
     * @return \Illuminate\Http\Response
     */
    public function destroy(MentorRequest $mentorRequest)
    {
        //
    }
}
