<?php

namespace App\Http\Controllers\Mentor;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class ClassroomCourseController extends Controller
{
    //
    public function index(Classroom $classroom)
    {
        $data = [
            'classroom' => $classroom,
            'courses' => Course::where('created_by', Auth::user()->id)->get(),
        ];

        return view('mentor.classroom.course', $data);
    }

    public function store(Classroom $classroom, Request $request)
    {
        $request->validate([
            'course' => ['required']
        ]);

        $classroom->courses()->syncWithoutDetaching($request->course);

        Alert::success('Course berhasil ditambahkan ke kelas');

        return redirect()->route('mentor.classroom-course.index', ['classroom' => $classroom->id]);
    }

    public function destroy(Classroom $classroom, Request $request)
    {
        $classroom->courses()->detach($request->course);

        Alert::success('Course berhasil dihapus dari kelas');

        return redirect()->route('mentor.classroom-course.index', ['classroom' => $classroom->id]);
    }
}
