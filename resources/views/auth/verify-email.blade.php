@extends('layouts.guest.app')
@section('content')
<div class="w-full min-h-screen px-8 py-10 bg-gray-100 md:py-16 xl:px-8">
    <div class="max-w-5xl mx-auto mt-3 mb-5">
        <div class="w-full mx-auto md:w-1/2 card">
            <div class="text-center card-header h6">Verifikasi Email</div>
            <div class="text-center card-body">
                @if(session()->has('status'))
                <p class="text-success">{{session()->get('status')}}</p>
                @endif
                <p class="my-5 text-success-darker">Mohon lakukan Verifikasi melalui tautan yang dikirim melalui email anda terlebih dahulu</p>

                <div class="flex flex-col justify-center lg:flex-row">
                    <form action="{{route('verification.send')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <button type="submit" class="text-base btn btn-primary">Kirim Ulang Email Verifikasi</button>
                        </div>
                    </form>
                    <form action="{{route('logout')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <button type="submit" class="text-base btn btn-danger">Logout</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection