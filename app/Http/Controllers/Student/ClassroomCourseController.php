<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use Illuminate\Http\Request;

class ClassroomCourseController extends Controller
{
    //
    public function index(Classroom $classroom)
    {
        $data = [
            'classroom' => $classroom,
        ];

        return view('student.classroom.course', $data);
    }
}
