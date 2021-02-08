<?php

namespace App\Http\Controllers\Mentor;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ClassroomCourseController extends Controller
{
    //
    public function index(Classroom $classroom)
    {
        $data = [
            'classroom' => $classroom->with('courses')->first(),
            'courses' => Course::whereIn('created_by', User::role(['admin', 'mentor'])->get()->pluck('id')->toArray())->get(),
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
