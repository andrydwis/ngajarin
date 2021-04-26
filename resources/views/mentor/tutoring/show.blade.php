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
        <div class="py-4 prose card-body ">

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

            <hr class="my-10">

            <div class="flex justify-end">

                @if($tutoring->status == 'menunggu')
                <form action="{{route('mentor.tutoring.update', ['tutoring' => $tutoring])}}" method="POST">
                    @csrf
                    @method('PATCH')
                    <select name="status" class="form-select">
                        <option value="">Pilih Aksi</option>
                        <option value="diterima">terima</option>
                        <option value="ditolak">tolak</option>
                    </select>
                    <button type="submit" class="px-20 mt-5 text-base md:mt-0 btn btn-primary">proses</button>
                </form>
                @endif
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