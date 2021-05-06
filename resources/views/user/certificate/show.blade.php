@extends('layouts.student.app-new')
@section('content')
<section class="p-3 @if(!$certificate) h-screen @endif antialiased bg-primary">

    <div class="container @if($certificate) min-h-[90vh] @endif p-3 mx-auto text-center bg-white rounded">
        <div class="h-full border-none card">
            @if($certificate)
            <div class="grid py-10 text-white rounded bg-primary">
                <h1 class="mb-5 h1">Ngajar.in</h1>
                <div class="font-semibold">diterbitkan :</div>
                <div class="text-lg font-semibold">{{\Carbon\Carbon::parse($certificate->created_at)->isoFormat('dddd, D MMMM Y')}}</div>
            </div>
            <div class="flex flex-col h-full text-gray-800 card-body">

                <div class="font-normal h6">Sertifikat penyelesaian</div>
                <div class="mb-5 font-normal h6">diberikan kepada : </div>
                <div class="mb-5 h4">{{$certificate->user->name}}</div>
                <div class="mb-5 font-normal h6">telah menyelesaikan course : </div>
                <div class="mb-5 h4">{{$certificate->certificate->course->title}}</div>

                <div class="mt-5 text-lg">nomor seri : <span class="h6">{{$serial_number}}</span></div>

            </div>
            @else
            <div class="grid h-full text-gray-800 place-items-center card-body">
                <span class="h6">Sertifikat tidak ditemukan</span> 
            </div>
            @endif
        </div>
    </div>

</section>
@endsection