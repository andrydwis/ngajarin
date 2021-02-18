<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Submission;
use Carbon\Carbon;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class SubmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Course $course)
    {
        //
        $data = [
            'course' => $course,
            'submission' => Submission::where('course_id', $course->id)->get(),
        ];

        return view('admin.submission.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Course $course)
    {
        //
        $data = [
            'course' => $course,
        ];

        return view('admin.submission.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Course $course, Request $request)
    {
        //
        $request->validate([
            'tugas' => ['required', 'string'],
            'deadline' => ['required', 'after:' . Carbon::now()]
        ]);

        $submission = new Submission();
        $submission->course_id = $course->id;
        $submission->task = $submission->tugas;
        $submission->file = $request->berkas;
        $submission->deadline = $request->deadline;
        $submission->save();

        Alert::success('Submission berhasil dibuat');

        return redirect()->route('admin.submission.index', ['course' => $course]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Submission  $submission
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course, Submission $submission)
    {
        //
        $data = [
            'course' => $course,
            'submission' => $submission
        ];

        return view('admin.submission.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Submission  $submission
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course, Submission $submission)
    {
        //
        $data = [
            'course' => $course,
            'submission' => $submission
        ];

        return view('admin.submission.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Submission  $submission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course, Submission $submission)
    {
        //
        $request->validate([
            'tugas' => ['required', 'string'],
            'deadline' => ['required']
        ]);

        $submission->course_id = $course->id;
        $submission->task = $submission->tugas;
        $submission->file = $request->berkas;
        $submission->deadline = $request->deadline;
        $submission->save();

        Alert::success('Submission berhasil diupdate');

        return redirect()->route('admin.submission.index', ['course' => $course]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Submission  $submission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course, Submission $submission)
    {
        //
        $submission->delete();

        Alert::success('Submission berhasil dihapus');

        return redirect()->route('admin.submission.index', ['course' => $course]);
    }
}
