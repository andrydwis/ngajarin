<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Submission;
use App\Models\SubmissionUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class SubmissionUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Course $course, Submission $submission, Request $request)
    {
        //
        $request->validate([
            'file' => ['required']
        ]);

        $submissionUser = new SubmissionUser();
        $submissionUser->submission_id = $submission->id;
        $submissionUser->user_id = Auth::user()->id;
        $submissionUser->file = $request->file;
        $submissionUser->status = 'dalam review';
        $submissionUser->save();

        Alert::success('Submission berhasil disimpan');

        return redirect()->route('student.course.submission.show', ['course' => $course, 'submission' => $submission]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubmissionUser  $submissionUser
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course, Submission $submission)
    {
        //
        $data = [
            'course' => $course,
            'submission' => $submission,
            'submission_user' => SubmissionUser::where('submission_id', $submission->id)->first()
        ];

        return view('student.submission.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubmissionUser  $submissionUser
     * @return \Illuminate\Http\Response
     */
    public function edit(SubmissionUser $submissionUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SubmissionUser  $submissionUser
     * @return \Illuminate\Http\Response
     */
    public function update(Course $course, Submission $submission, SubmissionUser $submissionUser, Request $request)
    {
        //
        $request->validate([
            'file' => ['required']
        ]);

        $submissionUser->file = $request->file;
        $submissionUser->status = 'dalam review';
        $submissionUser->save();

        Alert::success('Submission berhasil diupdate');

        return redirect()->route('student.course.submission.show', ['course' => $course, 'submission' => $submission]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubmissionUser  $submissionUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course, Submission $submission, SubmissionUser $submissionUser)
    {
        //
        $submissionUser->delete();

        Alert::success('Submission berhasil dihapus');

        return redirect()->route('student.course.submission.show', ['course' => $course, 'submission' => $submission]);
    }
}
