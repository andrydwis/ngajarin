<?php

namespace App\Http\Controllers\Mentor;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Models\ClassroomMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class ClassroomMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Classroom $classroom)
    {
        //
        $data = [
            'member' => ClassroomMember::where('classroom_id', $classroom->id)->get(),
            'classroom' => $classroom
        ];

        
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
    public function store($token, Request $request)
    {
        //
        //check token
        $check = Classroom::where('token', $token)->first();

        if($check){
            $classroomMember = new ClassroomMember();
            $classroomMember->classroom_id = $check->id;
            $classroomMember->user_id = Auth::user()->id;
            $classroomMember->save();

            Alert::success('Berhasil bergabung dengan kelas');
        }else{
            Alert::error('Token kelas salah');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ClassroomMember  $classroomMember
     * @return \Illuminate\Http\Response
     */
    public function show(ClassroomMember $classroomMember)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ClassroomMember  $classroomMember
     * @return \Illuminate\Http\Response
     */
    public function edit(ClassroomMember $classroomMember)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ClassroomMember  $classroomMember
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ClassroomMember $classroomMember)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ClassroomMember  $classroomMember
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClassroomMember $classroomMember)
    {
        //
        $classroomMember->delete();

        Alert::success('Anggota kelas berhasil dihapus');
    }
}
