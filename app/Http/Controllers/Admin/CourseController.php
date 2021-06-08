<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\NewCourse;
use App\Models\Certificate;
use App\Models\Course;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use RealRashid\SweetAlert\Facades\Alert;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = [
            'courses' => Course::where('created_by', Auth::user()->id)->with('creator')->get(),
            'coursesRequested' => Course::where('publish_status', 'requested')->with('creator')->get()
        ];

        return view('admin.course.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data = [
            'tags' => Tag::get(),
        ];

        return view('admin.course.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'judul' => ['required', 'string'],
            'deskripsi' => ['required', 'string'],
            'level' => ['required'],
        ]);

        $course = new Course();
        $course->title = $request->judul;
        $course->slug = Str::slug($request->judul) . '-' . Str::random(5);
        $course->description = $request->deskripsi;
        $course->thumbnail = $request->thumbnail;
        $course->level = $request->level;
        $course->created_by = Auth::user()->id;
        $course->save();

        if ($request->tag) {
            $course->tags()->sync($request->tag);
        }

        $certificate = new Certificate();
        $certificate->course_id = $course->id;
        $certificate->save();

        Alert::success('Course berhasil ditambahkan');

        return redirect()->route('admin.course.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        //
        $data = [
            'course' => $course,
            'tags' => Tag::get(),
        ];

        return view('admin.course.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        //
        $data = [
            'course' => $course,
            'tags' => Tag::get(),
        ];

        return view('admin.course.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        //
        $request->validate([
            'judul' => ['required', 'string'],
            'deskripsi' => ['required', 'string'],
            'level' => ['required'],
        ]);

        $course->title = $request->judul;
        $course->slug = Str::slug($request->judul) . '-' . Str::random(5);
        $course->description = $request->deskripsi;
        $course->thumbnail = $request->thumbnail;
        $course->level = $request->level;
        $course->save();

        if ($request->tag) {
            $course->tags()->sync($request->tag);
        } else {
            $course->tags()->detach();
        }

        Alert::success('Course berhasil diupdate');

        return redirect()->route('admin.course.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        //
        $course->delete();

        Alert::success('Course berhasil dihapus');

        return redirect()->route('admin.course.index');
    }

    public function publish(Course $course)
    {
        $course->publish_status = 'published';
        $course->save();

        if ($course->created_by == Auth::user()->id) {
            
            $students = User::role('student')->where('email_verified_at', '!=', null)->get();
            foreach($students as $student){
                Mail::to($student)->send(new NewCourse($course));
            }
        }

        Alert::success('Course berhasil dipublish');

        return redirect()->route('admin.course.index');
    }
}
