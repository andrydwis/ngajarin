<?php

namespace App\Http\Controllers\Mentor;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;

class ScoreController extends Controller
{
    //
    public function index(Course $course)
    {
        $data = [
            'course' => $course
        ];

        return view('mentor.score.index', $data);
    }

    public function show(Course $course, User $user)
    {
        $data = [
            'course' => $course,
            'user' => $user
        ];

        return view('mentor.score.show', $data);
    }
}
