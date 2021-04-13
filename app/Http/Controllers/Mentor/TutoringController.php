<?php

namespace App\Http\Controllers\Mentor;

use App\Http\Controllers\Controller;
use App\Models\Schedule;
use App\Models\Tutoring;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class TutoringController extends Controller
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
           'tutorings' => Tutoring::where('mentor_id', Auth::user()->id)->with('student')->get()
       ];

       return view('mentor.tutoring.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(User $user)
    {
        //
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user)
    {
        //
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tutoring  $tutoring
     * @return \Illuminate\Http\Response
     */
    public function show(Tutoring $tutoring)
    {
        //
        if($tutoring->mentor_id != Auth::user()->id){
            return abort(403, 'Unauthorized action.');
        }
        
        $data = [
            'tutoring' => $tutoring
        ];

        return view('mentor.tutoring.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tutoring  $tutoring
     * @return \Illuminate\Http\Response
     */
    public function edit(Tutoring $tutoring)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tutoring  $tutoring
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tutoring $tutoring)
    {
        //
        $request->validate([
            'status'=> ['required']
        ]);

        $tutoring->statis = $request->status;
        $tutoring->save();

        Alert::success('Permintaan tutoring berhasil diproses');

        return redirect()->route('mentor.tutoring.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tutoring  $tutoring
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tutoring $tutoring)
    {
        //
    }
}
