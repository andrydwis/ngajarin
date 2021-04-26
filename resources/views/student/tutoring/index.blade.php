@extends('layouts.student.app-new')
@section('content')

<div class="flex justify-center">

    <div class="flex flex-col max-w-5xl py-5 md:flex-row md:mx-5 ">


        <div class="w-full mt-10 mb-5">
            <h6 class="mb-10 text-base font-bold text-center text-gray-700 md:text-xl">
                Pilih Mentor untuk mendampingi sesi tutoring kamu
            </h6>
            <!-- card mentor list -->
            <div class="flex flex-wrap">
                @foreach($mentors as $mentor)
                <!-- perhitungan rata-rata -->
                @php
                $rate = $mentor->reviews->avg('rate');
                $sum = $mentor->reviews->count();
                @endphp

                <div class="w-full px-4 mb-4 lg:min-w-[490px] lg:w-1/2 ">

                    <div class="flex items-center justify-between gap-1 transition-all bg-gray-100 border border-gray-100 cursor-pointer md:gap-3 bg-opacity-30 md:hover:bg-gray-100 rounded-xl">

                        <div class="flex items-center gap-2 pl-3 my-4 md:gap-4 md:pl-6">
                            <div class="flex flex-shrink-0 w-12 h-12 md:h-14 md:w-14">
                                <img src="{{$mentor->detail->photo ?? 'https://ui-avatars.com/api/?background=random&name='.$mentor->name}}" class="w-full h-full">
                            </div>
                            <div class="flex flex-col flex-1 text-xs md:text-base md:flex-initial">
                                <span class="w-full line-clamp-1">{{$mentor->name}}</span>
                                <div class="flex">
                                    <i class="mr-1 text-xs text-opacity-70 text-primary-lighter md:text-sm fas fa-star"></i>
                                    <span class="text-primary-lighter">
                                        @if($rate)
                                        <span>{{round($rate, 1)}} / {{$sum}} ulasan</span>
                                        @else
                                        <span> - </span>
                                        @endif
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="flex border-l">
                            <a href="{{route('student.tutoring.create', $mentor->id)}}">
                                <button class="border-none rounded-full md:text-sm btn btn-outline-primary hover:border hover:bg-primary-lighter text-primary ">
                                    <span class="hidden md:flex">Request</span>
                                    <i class="flex text-xs fill-current md:hidden md:text-sm fas fa-chevron-right"></i>
                                </button>
                            </a>
                        </div>

                    </div>

                </div>

             @endforeach

            </div>

        </div>
    </div>
</div>

@endsection