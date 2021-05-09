<?php

namespace App\Http\Controllers;

use App\Models\CertificateUser;
use App\Models\Classroom;
use App\Models\ClassroomMember;
use App\Models\Course;
use App\Models\Post;
use App\Models\Submission;
use App\Models\SubmissionUser;
use Illuminate\Support\Facades\Auth;
use App\Models\Tutoring;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $user = Auth::user();
        if ($user->getRoleNames()->first() == 'admin') {
            return redirect()->route('dashboard.admin');
        } elseif ($user->getRoleNames()->first() == 'mentor') {
            return redirect()->route('dashboard.mentor');
        } else if ($user->getRoleNames()->first() == 'student') {
            return redirect()->route('dashboard.student');
        }
    }

    public function admin()
    {
        $data = [
            'tutorings' => Tutoring::where('status', 'selesai')->get()->count(),
            'posts' => Post::get()->count(),
            'mentors' => User::role('mentor')->get()->count(),
            'students' => User::role('student')->get()->count(),
            'charts' => Tutoring::where('status', 'selesai')->select('date', DB::raw('count(*) as amount'))->groupBy('date')->get()
        ];

        return view('admin.dashboard.index', $data);
    }

    public function mentor()
    {
        $course = Course::where('created_by', Auth::user()->id)->get()->pluck('id');
        $submission = Submission::whereIn('course_id', $course)->get()->pluck('id');
        $submissionUser = SubmissionUser::whereIn('submission_id', $submission)->where('status', 'dalam review')->get()->count();

        $data = [
            'submissions' => $submissionUser,
            'classes' => ClassroomMember::where('user_id', Auth::user()->id)->get()->count(),
            'courses' => Course::where('created_by', Auth::user()->id)->get()->count(),
            'tutorings' => Tutoring::where('mentor_id', Auth::user()->id)->where('status', 'menunggu')->get()->count(),
            'charts' => Tutoring::where('mentor_id', Auth::user()->id)->where('status', 'selesai')->select('date', DB::raw('count(*) as amount'))->groupBy('date')->get()
        ];

        return view('mentor.dashboard.index', $data);
    }

    public function student()
    {
        $courseUser = DB::table('course_user')
                    ->where('user_id', Auth::user()->id)
                    ->get()->pluck('course_id')->toArray();
        $courses = Course::whereIn('id', $courseUser)->with('submissions')->limit(3)->get();

        $classUser = DB::table('classroom_members')
                    ->where('user_id', Auth::user()->id)
                    ->get()->pluck('classroom_id')->toArray();
        $classrooms = Classroom::whereIn('id', $classUser)->limit(3)->get();

        $certificates = CertificateUser::where('user_id', Auth::user()->id)->with('certificate.course')->get();

        $tutorings = Tutoring::where('student_id', Auth::user()->id)->where('status', 'diterima')->orderBy('date', 'desc')->with('mentor.detail')->get();

        $data = [
            'user' => User::with('detail')->find(Auth::user()->id),
            'courses' => $courses,
            'classrooms' => $classrooms,
            'certificates' => $certificates,
            'tutorings' => $tutorings
        ];

        return view('student.dashboard.index', $data);
    }
}
