<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
        $data = [
            'user' => $user,
            'courses' => $user->courses,
            'classrooms' => $user->members
        ];

        return view('admin.student-list.show', $data);
    }
}
