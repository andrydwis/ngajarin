@extends('layouts.admin.app')
@section('content')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header"></div>
            <div class="card-body">
                @if(session()->has('status'))
                <p class="text-success">{{session()->get('status')}}</p>
                @endif
                <p class="text-success">Selamat datang di indomaret selamat berbelanja, hehe :v</p>
                <form action="{{route('verification.send')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Kirim Ulang Email Verifikasi</button>
                    </div>
                </form>
                <form action="{{route('logout')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <button type="submit" class="btn btn-danger">Logout</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection