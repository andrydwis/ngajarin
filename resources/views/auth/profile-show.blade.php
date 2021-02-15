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
                <form action="" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{$user->name}}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control" value="{{$user->email}}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="phone">Telepon</label>
                        <input type="number" name="phone" id="phone" class="form-control" value="{{$user->phone}}" readonly>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection