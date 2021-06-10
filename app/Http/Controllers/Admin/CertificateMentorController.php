<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\MentorCertificate;
use App\Models\CertificateMentor;
use App\Models\User;
use ConvertApi\ConvertApi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use PhpOffice\PhpWord\TemplateProcessor;
use RealRashid\SweetAlert\Facades\Alert;

class CertificateMentorController extends Controller
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
    public function store(Request $request, User $user)
    {
        //
        \PhpOffice\PhpWord\Settings::setPdfRendererPath('../vendor/dompdf/dompdf');
        \PhpOffice\PhpWord\Settings::setPdfRendererName('DomPDF');
        \PhpOffice\PhpWord\Style\Section::ORIENTATION_LANDSCAPE;

        $check = CertificateMentor::where('user_id', $user->id)->first();

        if ($check) {
            $templateProcessor = new TemplateProcessor(public_path('template/templatementor.docx'));

            $templateProcessor->setValue('name', $user->name);
            $templateProcessor->setValue('created_at', $check->created_at->format('d-m-Y'));
            $templateProcessor->setValue('serial_number', $check->serial_number);

            $path = public_path('certificate/certificatementor.docx');
            $templateProcessor->saveAs($path);

            $upload = new \ConvertApi\FileUpload($path);

            ConvertApi::setApiSecret('ERhEamUQp0JuFdtg');
            $result = ConvertApi::convert(
                'pdf',
                [
                    'File' => $upload,
                ]
            );
            $result->getFile()->save(public_path('certificate/certificatementor.pdf'));

            sleep(3);

            $certificate = public_path('certificate/certificatementor.pdf');

            Mail::to($user)->send(new MentorCertificate($user, $certificate));
        } else {
            $serial_number = 'Ngajar.in-' . Str::random(10);
            $certificateMentor = new CertificateMentor;
            $certificateMentor->user_id = $user->id;
            $certificateMentor->serial_number = $serial_number;
            $certificateMentor->save();

            $templateProcessor = new TemplateProcessor(public_path('template/templatementor.docx'));

            $templateProcessor->setValue('name', $user->name);
            $templateProcessor->setValue('created_at', $certificateMentor->created_at->format('d-m-Y'));
            $templateProcessor->setValue('serial_number', $certificateMentor->serial_number);

            $path = public_path('certificate/certificatementor.docx');
            $templateProcessor->saveAs($path);

            $upload = new \ConvertApi\FileUpload($path);

            ConvertApi::setApiSecret('ERhEamUQp0JuFdtg');
            $result = ConvertApi::convert(
                'pdf',
                [
                    'File' => $upload,
                ]
            );
            $result->getFile()->save(public_path('certificate/certificatementor.pdf'));

            sleep(3);

            $certificate = public_path('certificate/certificatementor.pdf');

            Mail::to($user)->send(new MentorCertificate($user, $certificate));
        }

        Alert::success('Sertifikat berhasil dikirim');

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CertificateMentor  $certificateMentor
     * @return \Illuminate\Http\Response
     */
    public function show(CertificateMentor $certificateMentor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CertificateMentor  $certificateMentor
     * @return \Illuminate\Http\Response
     */
    public function edit(CertificateMentor $certificateMentor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CertificateMentor  $certificateMentor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CertificateMentor $certificateMentor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CertificateMentor  $certificateMentor
     * @return \Illuminate\Http\Response
     */
    public function destroy(CertificateMentor $certificateMentor)
    {
        //
    }
}
