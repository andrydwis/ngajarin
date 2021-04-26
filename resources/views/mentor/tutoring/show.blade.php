@extends('layouts.mentor.app')
@section('content')
<div x-data="{ dismiss : false}" class="w-full p-5 mt-20 md:w-full lg:w-4/6 xl:w-3/4">

    @if(session('message'))
    <div x-show.transition.duration.300ms="!dismiss" class="flex flex-col items-center gap-4 mb-5 md:gap-10 md:flex-row md:p-8 alert bg-primary-lighter">
        <div>
            <i class="md:ml-5 text-5xl md:text-[4rem] text-white fas fa-exclamation-circle"></i>
        </div>
        <div class="text-sm font-normal prose text-center text-white normal-case md:text-left md:text-lg">

            <span>Anda sudah menerima request tutoring pada jam yang sama, <br class="hidden xl:inline"> apakah anda yakin ingin menerima request ini ?</span>

            <div class="flex justify-center mt-3 md:justify-start">
                <button @click="dismiss = true" class="ml-0 text-white border-none btn btn-outline-primary hover:border md:text-base">Batal</button>
                <form action="{{route('mentor.tutoring.force-accept', ['tutoring' => $tutoring])}}" method="POST">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="ml-0 bg-white btn hover:bg-opacity-90 focus:bg-opacity-75 text-primary-darker md:text-base">Terima</button>
                </form>
            </div>
        </div>
    </div>
    @endif

    <div class="card">
        <div class="flex justify-between card-header">
            <div>
                <h6 class="mb-2 text-lg font-bold md:text-xl">Detail Request</h6>
                <p>
                    Mohon melakukan pengecekan informasi sebelum menerima request tutoring
                </p>
            </div>
        </div>

        <!-- card body -->
        <div class="py-4 card-body">

            <div class="prose">

                <div>
                    <label>Nama </label>
                    <div class="w-full cursor-not-allowed md:w-1/2 form-input">
                        {{$tutoring->student->name}}
                    </div>
                </div>

                <div class="flex flex-wrap items-center gap-2 mt-5">
                    <div class="w-full md:flex-1">
                        <label>Tanggal</label>
                        <div class="w-full cursor-not-allowed form-input">
                            {{\Carbon\Carbon::parse($tutoring->date)->isoFormat('dddd, D MMMM Y')}}
                        </div>
                    </div>

                    <div class="flex flex-wrap w-full gap-2 xs:flex-nowrap md:flex-1">
                        <div class="w-1/2">
                            <label for="jam_mulai">jam mulai</label>
                            <div class="block w-full cursor-not-allowed form-input">
                                {{$tutoring->hour_start}}
                            </div>
                        </div>

                        <div class="w-1/2">
                            <label for="jam_akhir">jam akhir</label>
                            <div class="block w-full cursor-not-allowed form-input">
                                {{$tutoring->hour_end}}
                            </div>
                        </div>
                    </div>

                </div>

                <div class="w-full mt-5">
                    <label for="detail">Detail</label>
                    <textarea name="detail" class="block w-full form-textarea" rows="3" disabled> {{$tutoring->detail}} </textarea>
                </div>

                <div class="mt-5">
                    <label>Status </label>
                    <div class="w-full cursor-not-allowed md:w-1/3 form-input">
                        {{$tutoring->status}}
                    </div>
                </div>

            </div>

            <hr class="my-10">

            <div class="flex flex-col justify-between prose md:flex-row">
                <div>
                    <a href="{{route('mentor.tutoring.index')}}">
                        <button type="button" class="w-full px-10 mt-5 text-base border-none md:w-auto md:mt-0 btn btn-outline-primary hover:border">Kembali</button>
                    </a>
                </div>

                <div class="flex flex-col md:flex-row">
                    @if($tutoring->status == 'menunggu')
                    <form action="{{route('mentor.tutoring.update', ['tutoring' => $tutoring])}}" method="POST">
                        @csrf
                        @method('PATCH')
                        <select name="status" class="form-select" hidden>
                            <option selected value="ditolak">ditolak</option>
                        </select>
                        <button type="submit" class="w-full px-10 mt-2 text-base md:w-auto md:mt-0 btn btn-outline-primary">Tolak</button>
                    </form>
                    @endif

                    @if($tutoring->status == 'menunggu')
                    <form action="{{route('mentor.tutoring.update', ['tutoring' => $tutoring])}}" method="POST">
                        @csrf
                        @method('PATCH')
                        <select name="status" class="form-select" hidden>
                            <option selected value="diterima">diterima</option>
                        </select>
                        <button type="submit" class="w-full px-10 mt-2 text-base md:w-auto md:mt-0 btn btn-primary">Terima</button>
                    </form>
                    @endif
                </div>

            </div>

        </div>
        <!-- end of card body -->
    </div>
</div>
@endsection


@section('customCSS')
<style>
    input,
    textarea,
    .form-input {
        margin-top: 10px !important;
    }
</style>
@endsection