<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Submission;
use App\Models\SubmissionUser;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
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
            'submissions' => Submission::where('course_id', $course->id)->get(),
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
            'judul' => ['required', 'string', Rule::unique('submissions', 'title')],
            'tugas' => ['required', 'string'],
        ]);

        $submission = new Submission();
        $submission->course_id = $course->id;
        $submission->title = $request->judul;
        $submission->slug = Str::slug($request->judul);
        $submission->task = $request->tugas;
        $submission->file = $request->file;

        $submission->save();

        Alert::success('Submission berhasil dibuat');

        return redirect()->route('admin.course.submission.index', ['course' => $course]);
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
            'judul' => ['required', 'string', Rule::unique('submissions', 'title')->ignore($submission)],
            'tugas' => ['required', 'string'],
        ]);

        $submission->course_id = $course->id;
        $submission->title = $request->judul;
        $submission->slug = Str::slug($request->judul);
        $submission->task = $request->tugas;
        $submission->file = $request->file;

        $submission->save();

        Alert::success('Submission berhasil diupdate');

        return redirect()->route('admin.course.submission.index', ['course' => $course]);
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

        return redirect()->route('admin.course.submission.index', ['course' => $course]);
    }

    public function review(Course $course, Submission $submission)
    {
        //
        $data = [
            'course' => $course,
            'submission' => $submission,
            'submissionUsersPending' => $submission->submissionUsers()->where('status', 'dalam review')->with('user')->orderBy('created_at', 'desc')->get(),
            'submissionUsersAccepted' => $submission->submissionUsers()->where('status', 'diterima')->with('user')->orderBy('created_at', 'desc')->get(),
            'submissionUsersRejected' => $submission->submissionUsers()->where('status', 'ditolak')->with('user')->orderBy('created_at', 'desc')->get(),
        ];

        return view('admin.submission.review', $data);
    }

    public function reviewPending(Course $course, Submission $submission)
    {
        //
        $data = [
            'course' => $course,
            'submission' => $submission,
            'submissionUsersPending' => $submission->submissionUsers()->where('status', 'dalam review')->orderBy('created_at', 'desc')->get(),
        ];

        return view('admin.submission.review-pending', $data);
    }

    public function reviewAccepted(Course $course, Submission $submission)
    {
        //
        $data = [
            'course' => $course,
            'submission' => $submission,
            'submissionUsersAccepted' => $submission->submissionUsers()->where('status', 'diterima')->with('user')->orderBy('created_at', 'desc')->get(),
        ];

        return view('admin.submission.review-accepted', $data);
    }

    public function reviewRejected(Course $course, Submission $submission)
    {
        //
        $data = [
            'course' => $course,
            'submission' => $submission,
            'submissionUsersRejected' => $submission->submissionUsers()->where('status', 'ditolak')->with('user')->orderBy('created_at', 'desc')->get(),
        ];

        return view('admin.submission.review-rejected', $data);
    }

    public function reviewProcess(Course $course, Submission $submission, SubmissionUser $submissionUser, Request $request)
    {
        $request->validate([
            'feedback' => ['required'],
            'status' => ['required']
        ]);

        $submissionUser->feedback = $request->feedback;
        $submissionUser->status = $request->status;
        $submissionUser->save();

        Alert::success('Submission berhasil direview');

        if ($request->status == 'diterima') {
            return redirect()->route('admin.course.submission.review-accepted', ['course' => $course->slug, 'submission' => $submission->slug]);
        } elseif ($request->status == 'ditolak') {
            return redirect()->route('admin.course.submission.review-rejected', ['course' => $course->slug, 'submission' => $submission->slug]);
        }
    }
}
