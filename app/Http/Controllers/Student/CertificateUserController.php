<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Certificate;
use App\Models\CertificateUser;
use ConvertApi\ConvertApi;
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

        \PhpOffice\PhpWord\Style\Section::ORIENTATION_LANDSCAPE;

        $check = CertificateUser::where('certificate_id', $certificate->id)->where('user_id', Auth::user()->id)->first();
        if (!$check) {
            $serial_number = 'Ngajar.in-' . Str::random(10);
            $certificateUser = new CertificateUser();
            $certificateUser->certificate_id = $certificate->id;
            $certificateUser->user_id = Auth::user()->id;
            $certificateUser->serial_number = $serial_number;
            $certificateUser->save();

            $templateProcessor = new TemplateProcessor(public_path('template/template.docx'));

            $templateProcessor->setValue('name', Auth::user()->name);
            $templateProcessor->setValue('course', $certificate->course->title);
            $templateProcessor->setValue('created_at', $certificateUser->created_at);
            $templateProcessor->setValue('serial_number', $certificateUser->serial_number);

            $path = public_path('certificate/certificate.docx');
            $templateProcessor->saveAs($path);

            // $temporary = \PhpOffice\PhpWord\IOFactory::load($path);
            // $xmlWriter = \PhpOffice\PhpWord\IOFactory::createWriter($temporary, 'PDF');
            // $xmlWriter->save(public_path('certificate/certificate.pdf'), TRUE);
            // return response()->download(public_path('certificate/certificate.pdf'));

            ConvertApi::setApiSecret('ERhEamUQp0JuFdtg');
            $result = ConvertApi::convert(
                'pdf',
                [
                    'File' => $path,
                ]
            );
            $result->getFile()->save(public_path('certificate/certificate.pdf'));

            sleep(3);

            $headers =[
                'Content-Description' => 'File Transfer',
                'Content-Type' => 'application/pdf',
            ];

            return response()->download(public_path('certificate/certificate.pdf'), 'sertifikat.pdf', $headers);
        } else {
            $templateProcessor = new TemplateProcessor(public_path('template/template.docx'));

            $templateProcessor->setValue('name', Auth::user()->name);
            $templateProcessor->setValue('course', $certificate->course->title);
            $templateProcessor->setValue('created_at', $check->created_at->format('d-m-Y'));
            $templateProcessor->setValue('serial_number', $check->serial_number);

            $path = public_path('certificate/certificate.docx');
            $templateProcessor->saveAs($path);

            // $temporary = \PhpOffice\PhpWord\IOFactory::load($path);
            // $xmlWriter = \PhpOffice\PhpWord\IOFactory::createWriter($temporary, 'PDF');
            // $xmlWriter->save(public_path('certificate/certificate.pdf'), TRUE);
            // return response()->download(public_path('certificate/certificate.pdf'));

            ConvertApi::setApiSecret('ERhEamUQp0JuFdtg');
            $result = ConvertApi::convert(
                'pdf',
                [
                    'File' => $path,
                ]
            );
            $result->getFile()->save(public_path('certificate/certificate.pdf'));

            sleep(3);

            $headers =[
                'Content-Description' => 'File Transfer',
                'Content-Type' => 'application/pdf',
            ];

            return response()->download(public_path('certificate/certificate.pdf'), 'sertifikat.pdf', $headers);
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
