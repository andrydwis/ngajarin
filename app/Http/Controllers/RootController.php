<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Models\User;

class RootController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //
        $admin = User::role('admin')->get()->pluck('id')->toArray();

        $data = [
            'recent_courses' => Course::whereIn('created_by', $admin)->where('publish_status', 'published')->latest()->limit(6)->get(),
            'popular_courses' => Course::whereIn('created_by', $admin)->where('publish_status', 'published')->withCount('users')->orderBy('users_count', 'desc')->limit(3)->get()
        ];

        return view('welcome', $data);
    }
}
