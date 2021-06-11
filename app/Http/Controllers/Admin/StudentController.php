<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SubmissionUser;
use Illuminate\Http\Request;
use App\Models\User;

class StudentController extends Controller
{
    //
    public function index()
    {
        $data = [
            'users' => User::role('student')->where('email_verified_at', '!=', null)->get()
        ];

        return view('admin.student-list.index', $data);
    }

    public function show(User $user)
    {
        $finishedCourses = collect();

        foreach ($user->courses as $course) {
            foreach ($course->submissions as $submission) {
                $finishedSubmission = 0;
                $submissionUser = SubmissionUser::where('submission_id', $submission->id)->where('user_id', $user->id)->first();
                if ($submissionUser && $submissionUser->status == 'diterima') {
                    $finishedSubmission += 1;
                }
                if($course->submissions->count() == $finishedSubmission){
                    $finishedCourses->push($course->title);
                }
            }
        }

        $data = [
            'user' => $user,
            'courses' => $user->courses,
            'finishedCourses' => $finishedCourses,
            'classrooms' => $user->members
        ];

        return view('admin.student-list.show', $data);
    }
}
