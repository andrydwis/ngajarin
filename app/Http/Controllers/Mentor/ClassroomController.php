<?php

namespace App\Http\Controllers\mentor;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Models\ClassroomMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class ClassroomController extends Controller
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
            'classrooms' => ClassroomMember::where('user_id', Auth::user()->id)->with('classroom')->get()
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
    public function store(Request $request)
    {
        //
        $request->validate([
            'nama' => ['required'],
            'tahun' => ['required', 'numeric'],
            'semester' => ['required', 'numeric'],
        ]);

        $classroom = new Classroom();
        $classroom->name = $request->nama;
        $classroom->year = $request->tahun;
        $classroom->semester = $request->semester;
        $classroom->token = 'ngajar.in-' . Str::random(5);
        $classroom->save();

        $classroomMember = new ClassroomMember();
        $classroomMember->class_id = $classroom->id;
        $classroomMember->user_id = Auth::user()->id;
        $classroomMember->save();

        Alert::success('Kelas berhasil dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function show(Classroom $classroom)
    {
        //
        $data = [
            'classroom' => $classroom,
        ];
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function edit(Classroom $classroom)
    {
        //
        $data = [
            'classroom' => $classroom,
        ];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Classroom $classroom)
    {
        //
        $request->validate([
            'nama' => ['required'],
            'tahun' => ['required', 'numeric'],
            'semester' => ['required', 'numeric'],
        ]);

        $classroom->name = $request->nama;
        $classroom->year = $request->tahun;
        $classroom->semester = $request->semester;
        $classroom->save();

        Alert::success('Kelas berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function destroy(Classroom $classroom)
    {
        //
        $classroom->delete();

        Alert::success('Kelas berhasil dihapus');
    }
}
