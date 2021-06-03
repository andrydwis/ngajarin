<?php

namespace App\Http\Controllers\Student;

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
            'members' => ClassroomMember::where('classroom_id', $classroom->id)->get(),
            'classroom' => $classroom,
        ];

        return view('student.classroom-member.index', $data);
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
            'token' => ['required'],
        ]);

        //check token
        $check = Classroom::where('token', $request->token)->first();

        if (!$check) {
            Alert::error('Token kelas salah');

            return redirect()->route('student.classroom.index');
        }
        $isAlreadyJoin = ClassroomMember::where('classroom_id', $check->id)->where('user_id', Auth::user()->id)->first();

        if ($isAlreadyJoin) {
            Alert::error('Anda sudah bergabung di kelas ini');

            return redirect()->route('student.classroom.index');
        }
        $classroomMember = new ClassroomMember();
        $classroomMember->classroom_id = $check->id;
        $classroomMember->user_id = Auth::user()->id;
        $classroomMember->save();

        Alert::success('Berhasil bergabung dengan kelas');

        return redirect()->route('student.classroom.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ClassroomMember  $classroomMember
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ClassroomMember  $classroomMember
     * @return \Illuminate\Http\Response
     */
    public function edit()
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
    public function update()
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

        Alert::success('Berhasil keluar dari kelas');

        return back();
    }
}
