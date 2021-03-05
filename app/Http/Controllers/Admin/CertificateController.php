<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Certificate;
use App\Models\Course;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CertificateController extends Controller
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
            'course' => $course->with('certificate')->first(),
        ];

        return view('admin.certificate.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Course $course)
    {
        //
        $check = $course->with('certificate')->first();
        if ($check) {
            Alert::error('Template sertifikat sudah ada');

            return redirect()->route('admin.course.certificate.index', ['course' => $course]);
        }

        $data = [
            'course' => $course->with('certificate')->first(),
        ];

        return view('admin.certificate.create', $data);
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
            'template' => ['required'],
        ]);

        $certificate = new Certificate();
        $certificate->course_id = $course->id;
        $certificate->template = $request->template;
        $certificate->save();

        Alert::success('Sertifikat berhasil ditambahkan');

        return redirect()->route('admin.course.certificate.index', ['course' => $course]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Certificate  $certificate
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course, Certificate $certificate)
    {
        //
        $data = [
            'course' => $course,
            'certificate' => $certificate,
        ];

        return view('admin.certificate.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Certificate  $certificate
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course, Certificate $certificate)
    {
        //
        $data = [
            'course' => $course,
            'certificate' => $certificate,
        ];

        return view('admin.certificate.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Certificate  $certificate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course, Certificate $certificate)
    {
        //
        $request->validate([
            'template' => ['required'],
        ]);

        $certificate->course_id = $course->id;
        $certificate->template = $request->template;
        $certificate->save();

        Alert::success('Sertifikat berhasil diupdate');

        return redirect()->route('admin.course.certificate.index', ['course' => $course]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Certificate  $certificate
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course, Certificate $certificate)
    {
        //
        $certificate->delete();

        Alert::success('Sertifikat berhasil dihapus');

        return redirect()->route('admin.sertifikat.index', ['course' => $course]);
    }
}
