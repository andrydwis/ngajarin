@extends('layouts.admin.app-new')
@section('content')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header"></div>
            <div class="card-body">
                @if(session()->has('status'))
                <p class="text-success">{{session()->get('status')}}</p>
                @endif
                <form action="{{route('password.email')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{old('email')}}">
                        @error('email')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Kirim Token Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection