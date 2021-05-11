@extends('layouts.guest.app')
@section('content')
<div class="w-full min-h-screen px-8 py-10 bg-gray-100 md:py-16 xl:px-8">
    <div class="max-w-5xl mx-auto mt-3 mb-5">
        <div class="w-full mx-auto md:w-1/2 card">
            <div class="card-header h6">Lupa Password</div>
            <div class="card-body">
                @if(session()->has('status'))
                <p class="text-success">{{session()->get('status')}}</p>
                @endif
                <form action="{{route('password.email')}}" method="post" class="flex flex-col items-center md:flex-row">
                    @csrf
                    <div class="flex items-center gap-2">
                        <label for="email">Email</label>
                        <input id="email" type="email" placeholder="Masukkan email akun" name="email" class="form-input @error('email') is-invalid @enderror" value="{{old('email')}}">
                        @error('email')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button type="submit" class="w-full text-base btn btn-primary">Kirim Request</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection