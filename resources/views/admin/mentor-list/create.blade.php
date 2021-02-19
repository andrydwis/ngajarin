@extends('layouts.admin.app')
@section('content')
<div class="w-full p-5 mt-20 md:w-auto lg:w-4/6 xl:w-3/4">

    <div class="card">
        <div class="card-header">
            <h6 class="h6">Tambahkan Mentor Baru</h6>
        </div>
        <div class="card-body">
            <form action="{{route('admin.mentor-list.store')}}" method="post">
                @csrf
                <div class="grid grid-cols-1 gap-0 md:gap-6 sm:grid-cols-2">
                    <div>
                        <label for="nama">Nama</label>
                        <input type="text" id="nama" name="nama" class="form-input py-2 mt-2 block w-full @error('nama') is-invalid @enderror" value="{{old('nama')}}">
                        @error('nama')
                        <div class="mt-5 alert alert-error">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div>
                        <label for="email">Email</label>
                        <input id="email" type="email" name="email" class="form-input py-2 mt-2 block w-full @error('email') is-invalid @enderror" value="{{old('email')}}">
                        @error('email')
                        <div class="mt-5 alert alert-error">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="col-span-1 sm:col-span-2">
                        <label for="telepon">Telepon</label>
                        <input id="telepon" type="number" name="telepon" class="form-input py-2 mt-2 block w-full @error('telepon') is-invalid @enderror" value="{{old('telepon')}}">
                        @error('telepon')
                        <div class="mt-5 alert alert-error">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div>
                        <label for="password">Password</label>
                        <input id="password" type="password" name="password" class="form-input py-2 mt-2 block w-full @error('password') is-invalid @enderror" value="">
                        @error('password')
                        <div class="mt-5 alert alert-error">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div>
                        <label for="password_confirmation">Password Konfirmasi</label>
                        <input id="password_confirmation" type="password" name="password_confirmation" class="form-input py-2 mt-2 block w-full @error('password_confirmation') is-invalid @enderror" value="">
                        @error('password_confirmation')
                        <div class="mt-5 alert alert-error">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="flex justify-end gap-2 py-5">
                    <a href="{{route('admin.mentor-list.index')}}" class="btn-bs-secondary">
                        Kembali
                    </a>
                    <button type="submit" class="btn-bs-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection