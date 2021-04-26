@extends('layouts.student.app-new')
@section('content')

<div class="flex justify-center bg-gray-50">

    <a href="{{route('user.post.index')}}" class="fixed z-20 inline lg:hidden left-4 bottom-4">
        <button class="w-16 h-16 text-white duration-300 rounded-full focus:outline-none bg-primary-lighter hover:bg-primary">
            <i class="text-xl fill-current fas fa-chevron-left"></i>
        </button>
    </a>

    <div class="grid grid-cols-1 gap-5 px-5 pt-10 pb-20 space lg:gap-10 lg:px-20 lg:grid-cols-3">
        <div class="mb-5 md:col-span-2">

            <div class="shadow-xl card">
                <div class="card-header">
                    <h6 class="h6">Review Mentor</h6>
                </div>

                <div class="card-body">
                    <!-- bio -->
                    <div class="flex col-span-1 gap-2">
                        <div class="flex-grow-0 flex-shrink-0 w-14 h-14 md:w-20 md:h-20">
                            <img src="{{$user->detail->photo ?? 'https://ui-avatars.com/api/?background=random&name='.$user->name}}" class="rounded-xl">
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
                                    <span>{{round($rate, 1)}} dari {{$sum}} ulasan</span>
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

                </div>

            </div>

            <div class="mt-10 shadow-xl card">
                <div class="card-header">
                    <h6 class="h6">
                        Form Request Tutoring
                    </h6>
                </div>
                <div class="card-body">
                    <!-- input waktu -->
                    <div class="grid col-span-1 gap-5 mt-5">
                        @livewire('tutor-request', ['user' => $user, 'dates' => $dates])
                    </div>
                    <!-- end of input waktu -->
                </div>
            </div>

        </div>


        <div class=" md:col-span-1">

            <div class="w-full md:sticky md:top-10">
                <div class="shadow-xl card lg:w-[340px] ">
                    <div class="card-header">
                        <h6 class="h6">Jadwal Mentor</h6>
                    </div>
                    <div class="card-body">
                        <ul class="-mt-5 text-gray-700 ">
                            @forelse($schedules as $schedule)
                            <li class="p-3 text-sm border-b md:text-base">
                                <div class="flex justify-between">
                                    <div>{{$schedule->dayTrans()}}</div>
                                    <div class="">
                                        {{Str::limit($schedule->hour_start, 5, '')}} -
                                        {{Str::limit($schedule->hour_end, 5, '')}}
                                    </div>
                                </div>
                            </li>
                            @empty
                            <span>Mentor ini belum mengatur jadwal tutoring</span>
                            @endforelse
                        </ul>
                    </div>
                </div>

                <div class="mt-10 shadow-xl card lg:w-[340px]">
                    <div class="card-header">
                        <h6 class="h6">Riwayat</h6>
                    </div>
                    <div class="card-body">
                        <ul class="-mt-5 text-gray-700 ">
                            @foreach($tutorings as $tutoring)
                            <li class="p-3 text-sm border-b md:text-base">
                                @if($tutoring->status=='menunggu')
                                <div x-data="{ isOpen : false }">
                                    <div class="flex items-center justify-between">
                                        <div>
                                            {{\Carbon\Carbon::parse($tutoring->date)->isoFormat('D MMMM Y')}}
                                        </div>
                                        <button @click="isOpen = !isOpen" type="button" class="flex items-center px-3 py-2 mt-0 text-white capitalize focus:outline-none bg-primary-lighter alert">
                                            {{$tutoring->status}}
                                            <i class="ml-2 text-xs duration-300 fas fa-chevron-down" :class="{'transform rotate-180' : isOpen}"></i>
                                        </button>
                                    </div>
                                    <div x-cloak x-show.transition.duration.300ms="isOpen">
                                        <div class="flex justify-between pb-3 font-semibold border-b mt-7">
                                            <div>
                                                {{\Carbon\Carbon::parse($tutoring->date)->isoFormat('dddd')}}
                                            </div>
                                            <div>
                                                {{Str::limit($tutoring->hour_start, 5, '')}} -
                                                {{Str::limit($tutoring->hour_end, 5, '')}}
                                            </div>
                                        </div>
                                        <form action="{{route('student.tutoring.destroy', ['user' => $user, 'tutoring' => $tutoring])}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <div class="mt-5">
                                                <button type="submit" class="w-full btn btn-outline-danger md:text-sm">Batalkan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                @elseif($tutoring->status=='diterima')
                                <div x-data="{ isOpen : false }">
                                    <div class="flex items-center justify-between">
                                        <div>
                                            {{\Carbon\Carbon::parse($tutoring->date)->isoFormat('D MMMM Y')}}
                                        </div>
                                        <button @click="isOpen = !isOpen" type="button" class="flex items-center px-3 py-2 mt-0 text-white capitalize focus:outline-none bg-success-lighter alert">
                                            {{$tutoring->status}}
                                            <i class="ml-2 text-xs duration-300 fas fa-chevron-down" :class="{'transform rotate-180' : isOpen}"></i>
                                        </button>
                                    </div>
                                    <div x-cloak x-show.transition.duration.300ms="isOpen">
                                        <div class="flex justify-between pb-3 font-semibold border-b mt-7">
                                            <div>
                                                {{\Carbon\Carbon::parse($tutoring->date)->isoFormat('dddd')}}
                                            </div>
                                            <div>
                                                {{Str::limit($tutoring->hour_start, 5, '')}} -
                                                {{Str::limit($tutoring->hour_end, 5, '')}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @elseif($tutoring->status=='ditolak')
                                <div x-data="{ isOpen : false }">
                                    <div class="flex items-center justify-between">
                                        <div>
                                            {{\Carbon\Carbon::parse($tutoring->date)->isoFormat('D MMMM Y')}}
                                        </div>
                                        <button @click="isOpen = !isOpen" type="button" class="flex items-center px-3 py-2 mt-0 text-white capitalize focus:outline-none bg-danger-lighter alert">
                                            {{$tutoring->status}}
                                            <i class="ml-2 text-xs duration-300 fas fa-chevron-down" :class="{'transform rotate-180' : isOpen}"></i>
                                        </button>
                                    </div>
                                    <div x-cloak x-show.transition.duration.300ms="isOpen">
                                        <div class="flex justify-between pb-3 font-semibold border-b mt-7">
                                            <div>
                                                {{\Carbon\Carbon::parse($tutoring->date)->isoFormat('dddd')}}
                                            </div>
                                            <div>
                                                {{Str::limit($tutoring->hour_start, 5, '')}} -
                                                {{Str::limit($tutoring->hour_end, 5, '')}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @elseif($tutoring->status=='selesai')
                                <div x-data="{ isOpen : false }">
                                    <div class="flex items-center justify-between">
                                        <div>
                                            {{\Carbon\Carbon::parse($tutoring->date)->isoFormat('D MMMM Y')}}
                                        </div>
                                        <button @click="isOpen = !isOpen" type="button" class="flex items-center px-3 py-2 mt-0 text-white capitalize focus:outline-none bg-primary-lighter alert">
                                            {{$tutoring->status}}
                                            <i class="ml-2 text-xs duration-300 fas fa-chevron-down" :class="{'transform rotate-180' : isOpen}"></i>
                                        </button>
                                    </div>
                                    <div x-cloak x-show.transition.duration.300ms="isOpen">
                                        <div class="flex justify-between pb-3 font-semibold border-b mt-7">
                                            <div>
                                                {{\Carbon\Carbon::parse($tutoring->date)->isoFormat('dddd')}}
                                            </div>
                                            <div>
                                                {{Str::limit($tutoring->hour_start, 5, '')}} -
                                                {{Str::limit($tutoring->hour_end, 5, '')}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection