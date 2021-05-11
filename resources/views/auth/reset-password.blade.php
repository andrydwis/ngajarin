@extends('layouts.guest.app')
@section('content')
<div class="w-full min-h-screen px-8 py-10 bg-gray-100 md:py-16 xl:px-8">
    <div class="max-w-5xl mx-auto mt-3 mb-5">
        <div class="w-full mx-auto md:w-1/2 card">
            <div class="card-header h6">Reset Password</div>
            <div class="card-body">
                <form action="{{route('password.update')}}" method="post" class="flex flex-col items-end ">
                    @csrf
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">
                    <div class="grid w-full py-1">
                        <label class="mr-1 text-gray-600" for="email">Email</label>
                        <input id="email" type="email" name="email" class="form-input @error('email') is-invalid @enderror" value="{{old('email')}}">
                        @error('email')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="grid w-full py-1">
                        <label class="mr-1 text-gray-600" for="password">Password</label>
                        <input id="password" type="password" name="password" class="form-input @error('password') is-invalid @enderror" value="">
                        @error('password')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="grid w-full py-1">
                        <label class="mr-1 text-gray-600" for="password_confirmation">Password Konfirmasi</label>
                        <input id="password_confirmation" type="password" name="password_confirmation" class="form-input @error('password_confirmation') is-invalid @enderror" value="">
                        @error('password_confirmation')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button type="submit" class="text-base btn btn-primary">Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection