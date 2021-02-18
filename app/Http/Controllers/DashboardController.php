<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        return view('admin.dashboard.index');
    }

    public function mentor()
    {
        return view('mentor.dashboard.index');
    }

    public function student()
    {
        return view('student.dashboard.index');
    }
}
