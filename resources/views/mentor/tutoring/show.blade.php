@extends('layouts.mentor.app')
@section('content')
<div class="w-full p-5 mt-20 md:w-full lg:w-4/6 xl:w-3/4">

    @if(session('message'))
    <div class="alert alert-danger mb-5">
        <p>Permintaan ini awdwdbkwaw pokok intine tabrakan mbek sing mbok acc dino iki</p>
        <p>yakin gelem nerimo ?</p>
        <button class="btn">batal (iki dismiss no alert e wkwk)</button>
        <form action="{{route('mentor.tutoring.force-accept', ['tutoring' => $tutoring])}}" method="POST">
            @csrf
            @method('PATCH')
            <button type="submit" class="btn">Gass ae lah anjir</button>
        </form>
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