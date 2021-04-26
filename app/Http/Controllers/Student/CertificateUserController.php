<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Certificate;
use App\Models\CertificateUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpOffice\PhpWord\TemplateProcessor;
use Illuminate\Support\Str;

class CertificateUserController extends Controller
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
    public function store(Request $request, Certificate $certificate)
    {
        //
        \PhpOffice\PhpWord\Settings::setPdfRendererPath('../vendor/dompdf/dompdf');
        \PhpOffice\PhpWord\Settings::setPdfRendererName('DomPDF');

        $check = CertificateUser::where('certificate_id', $certificate->id)->where('user_id', Auth::user()->id)->first();
        if (!$check) {
            $certificateUser = new CertificateUser();
            $certificateUser->certificate_id = $certificate->id;
            $certificateUser->user_id = Auth::user()->id;
            $certificateUser->save();

            $templateProcessor = new TemplateProcessor($certificate->template);
            $templateProcessor->setValue('name', Auth::user()->name);
            $templateProcessor->setValue('course', $certificate->course->title);
            $templateProcessor->setValue('created_at', $certificateUser->created_at);

            $filename = $certificate->course->title . '.docx';
            header("Content-Description: File Transfer");
            header('Content-Disposition: attachment; filename="' . $filename . '"');
            header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
            header('Content-Transfer-Encoding: binary');
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Expires: 0');
            ob_clean();
            $templateProcessor->saveAs('php://output');
            exit;
    
            return back();
        } else {
            // $templateProcessor = new TemplateProcessor($certificate->template);
            $templateProcessor = new TemplateProcessor(public_path('template/template.docx'));
            
            $templateProcessor->setValue('name', Auth::user()->name);
            $templateProcessor->setValue('course', $certificate->course->title);
            $templateProcessor->setValue('created_at', $check->created_at);

            $path = public_path('certificate/certificate.docx');
            $templateProcessor->saveAs($path);

            $temporary = \PhpOffice\PhpWord\IOFactory::load($path);
            $xmlWriter = \PhpOffice\PhpWord\IOFactory::createWriter($temporary, 'PDF');
            $xmlWriter->save(public_path('certificate/certificate.pdf'), TRUE);
            return response()->download(public_path('certificate/certificate.pdf'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CertificateUser  $certificateUser
     * @return \Illuminate\Http\Response
     */
    public function show(CertificateUser $certificateUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CertificateUser  $certificateUser
     * @return \Illuminate\Http\Response
     */
    public function edit(CertificateUser $certificateUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CertificateUser  $certificateUser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CertificateUser $certificateUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CertificateUser  $certificateUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(CertificateUser $certificateUser)
    {
        //
    }
}
