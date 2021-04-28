@extends('layouts.student.app-new')
@section('content')

<div class="flex justify-center bg-gray-50">

    <a href="{{route('user.post.index')}}" class="fixed z-20 inline lg:hidden left-4 bottom-4">
        <button class="w-16 h-16 text-white duration-300 rounded-full focus:outline-none bg-primary-lighter hover:bg-primary">
            <i class="text-xl fill-current fas fa-chevron-left"></i>
        </button>
    </a>


    <div class="grid grid-cols-1 gap-5 px-5 pt-10 pb-20 space lg:gap-10 lg:px-20 lg:grid-cols-3">

        <!-- bagian kiri -->
        <div class="mb-5 md:col-span-2">

            <div class="shadow-md card">
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
                            <span>{{$user->name}}</span>
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

                        </div>
                    </div>
                    <!-- end of bio -->

                </div>

            </div>

            <div class="mt-10 shadow-md card">
                <div class="card-header">
                    <h6 class="h6">
                        Review tentang mentor
                    </h6>
                </div>
                <div class="card-body">

                    <div class="grid col-span-1 gap-5 mt-5">


                        <div class="flex flex-col items-center w-full gap-2">
                            <div>
                                @if($reviews)
                                @foreach($reviews as $review)
                                <div class="flex-grow-0 flex-shrink-0 w-14 h-14 md:w-20 md:h-20">
                                    <img src="{{$review->student->detail->photo ?? 'https://ui-avatars.com/api/?background=random&name=' . $review->student->name}}" class="rounded-xl">
                                </div>
                                <div class="flex flex-col items-center w-full font-semibold prose">
                                    <span>{{$review->student->name}}</span>
                                    <div class="flex justify-center">
                                        @php
                                            $fillStar = $review->rate;
                                            $blankStar = 5-$review->rate
                                        @endphp
                                        @for($i=1; $i<=$fillStar; $i++)
                                        <i class="mr-1 text-xs text-opacity-70 text-primary-lighter md:text-sm fas fa-star"></i>
                                        @endfor
                                        @for($i=1; $i<=$blankStar; $i++)
                                        <i class="mr-1 text-xs text-gray-300 md:text-sm fas fa-star"></i>
                                        @endfor
                                    </div>
                                    <div class="w-3/4 p-5 mt-2 font-normal text-center normal-case resize-none form-textarea">
                                        {{$review->message}}
                                    </div>
                                </div>
                                @endforeach
                                @else
                                <p>Belum ada ulasan</p>
                                @endif
                            </div>
                        </div>

                    </div>

                </div>
            </div>

            <div class="mt-10 shadow-md card">
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

        <!-- bagian kanan -->
        <div class=" md:col-span-1">

            <div class="w-full md:sticky md:top-10">
                <div class="shadow-md card lg:w-[340px] ">
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

                <div class="mt-10 shadow-md card lg:w-[340px]">
                    <div class="card-header">
                        <h6 class="h6">Riwayat</h6>
                    </div>
                    <div class="card-body max-h-[40vh] overflow-y-scroll">
                        <ul class="-mt-5 text-gray-700 ">
                            @foreach($tutorings as $tutoring)
                            <li class="p-3 text-sm border-b md:text-base">
                                @if($tutoring->status=='menunggu')
                                <div x-data="{ isOpen : false }">
                                    <div class="flex items-center justify-between">
                                        <div>
                                            {{\Carbon\Carbon::parse($tutoring->date)->isoFormat('D MMMM Y')}}
                                        </div>
                                        <button @click="isOpen = !isOpen" type="button" class="flex items-center px-3 py-2 mt-0 text-white capitalize bg-gray-500 focus:outline-none alert">
                                            {{$tutoring->status}}
                                            <i class="ml-2 text-xs duration-300 fas fa-chevron-down" :class="{'transform rotate-180' : isOpen}"></i>
                                        </button>
                                    </div>
                                    <div x-cloak x-show.transition.duration.300ms="isOpen">
                                        <div class="flex justify-between pb-3 font-semibold mt-7">
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
                                        <div class="flex justify-between pb-3 font-semibold mt-7">
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
                                        <button @click="isOpen = !isOpen" type="button" class="flex items-center px-3 py-2 mt-0 text-white capitalize bg-red-400 focus:outline-none alert">
                                            {{$tutoring->status}}
                                            <i class="ml-2 text-xs duration-300 fas fa-chevron-down" :class="{'transform rotate-180' : isOpen}"></i>
                                        </button>
                                    </div>
                                    <div x-cloak x-show.transition.duration.300ms="isOpen">
                                        <div class="flex justify-between pb-3 font-semibold mt-7">
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
                                        <div class="flex justify-between pb-3 font-semibold mt-7">
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