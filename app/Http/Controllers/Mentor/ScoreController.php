<?php

namespace App\Http\Controllers\Mentor;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\SubmissionUser;
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
            'user' => $user,
            'submissionUser' => SubmissionUser::where('user_id', $user->id)->whereIn('submission_id', $course->submissions->pluck('id')->toArray())->count()
        ];

        return view('mentor.score.show', $data);
    }
}
