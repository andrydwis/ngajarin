<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\MentorRequestRejected;
use App\Models\MentorRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
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
        $data = [
            'requests' => MentorRequest::with('user')->get()
        ];

        return view('admin.mentor-request.index', $data);
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
    public function destroy(Request $request, MentorRequest $mentorRequest)
    {
        //
        $user = User::find($mentorRequest->user_id);

        $reason = $request->alasan ?? 'Kamu belum memenuhi kriteria sistem kami';

        Alert::success('Permintaan mentor request ditolak');

        Mail::to($user->email)->send(new MentorRequestRejected($user, $reason));

        $mentorRequest->delete();

        return redirect()->route('admin.mentor-request.index');
    }

    public function process(MentorRequest $mentorRequest)
    {
        $user = User::find($mentorRequest->user_id);

        $email = $mentorRequest->email;

        Alert::success('Permintaan mentor request diterima');

        $mentorRequest->delete();

        return redirect('/admin/mentor-list/create?nama=' . $user->name . '&email=' . $email);
    }
}
