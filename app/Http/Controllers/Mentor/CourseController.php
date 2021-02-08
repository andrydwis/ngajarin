<?php

namespace App\Http\Controllers\Mentor;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
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
            'courses' => Course::with('creator')->get()
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
        $course->slug = Str::slug($request->judul);
        $course->description = $request->deskripsi;
        $course->level = $request->level;
        $course->created_by = Auth::user()->id;
        $course->save();

        if (!$request->tags) {
            $course->tags()->sync($request->tag);
        }

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
        $course->slug = Str::slug($request->judul);
        $course->description = $request->deskripsi;
        $course->level = $request->level;
        $course->save();

        if (!$request->tags) {
            $course->tags()->sync($request->tag);
        }else{
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
}
