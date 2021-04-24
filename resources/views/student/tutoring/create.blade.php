@extends('layouts.student.app-new')
@section('content')

<div class="flex justify-center bg-gray-50">

    <a href="{{route('user.post.index')}}" class="fixed z-20 inline lg:hidden left-4 bottom-4">
        <button class="w-16 h-16 text-white duration-300 rounded-full focus:outline-none bg-primary-lighter hover:bg-primary">
            <i class="text-xl fill-current fas fa-chevron-left"></i>
        </button>
    </a>

    <div class="grid grid-cols-1 gap-5 px-5 pt-10 pb-20 space lg:gap-10 lg:px-20 md:grid-cols-3">
        <div class="mb-5 md:col-span-2">
            <div class="shadow-xl card">
                <div class="card-header">
                    <h6 class="h6">Review Mentor</h6>
                </div>

                <div class="card-body">
                    <!-- bio -->
                    <div class="flex col-span-1 gap-2">
                        <div class="flex-grow-0 flex-shrink-0 w-20 h-20">
                            <img src="{{$user->detail->photo ?? 'https://ui-avatars.com/api/?background=random&name='.$user->name}}">
                        </div>
                        <div>
                            <span>Nama : {{$user->name}}</span>
                            <!-- rating -->
                            @php
                            $rate = $user->reviews->avg('rate');
                            $sum = $user->reviews->count();
                            @endphp

                            <div class="flex">
                                <i class="mr-1 text-xs text-opacity-70 text-primary-lighter md:text-sm fas fa-star"></i>
                                <span class="text-primary-lighter">
                                    @if($rate)
                                    <span>{{$rate}} dari {{$sum}} ulasan</span>
                                    @else
                                    <span> - </span>
                                    @endif
                                </span>
                            </div>

                            <!-- bio -->
                            @if($user->detail)
                            <p>{{$user->detail->biodata}}</p>
                            @else
                            <p>
                                Mentor ini belum mengisi biodata
                            </p>
                            @endif

                            <!-- style iki ki -->
                            @foreach($reviews as $review)
                            <p>{{$review->message}}</p>
                            @endforeach
                        </div>
                    </div>
                    <!-- end of bio -->

                    <!-- input waktu -->
                    <div class="grid col-span-1 gap-5 mt-5">
                        @livewire('tutor-request', ['user' => $user, 'dates' => $dates])
                    </div>
                    <!-- end of input waktu -->
                </div>

            </div>
        </div>
        <div class="md:col-span-1">
            <div class="shadow-xl card">
                <div class="card-header">
                    <h6 class="h6">Jadwal Mentor</h6>
                </div>
                <div class="card-body">
                    <div class="flex flex-col">
                        @forelse($schedules as $schedule)
                        <span class="text-sm md:text-base">{{$schedule->dayTrans()}}, {{$schedule->hour_start}} - {{$schedule->hour_end}}</span>
                        @empty
                        <span>Mentor ini belum mengatur jadwal tutoring</span>
                        @endforelse
                    </div>
                </div>
            </div>

            <div class="mt-10 shadow-xl card">
                <div class="card-header">
                    <h6 class="h6">Riwayat</h6>
                </div>
                <div class="prose card-body">
                    <ul>
                        @foreach($tutorings as $tutoring)
                        <li>{{\Carbon\Carbon::parse($tutoring->date)->isoFormat('dddd, D MMMM Y')}} status : {{$tutoring->status}}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection