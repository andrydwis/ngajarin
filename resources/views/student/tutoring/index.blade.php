@extends('layouts.student.app-new')
@section('content')

<div class="flex justify-center">

    <div class="flex flex-col max-w-5xl py-5 md:flex-row md:mx-5 ">

        <div class="w-full my-5" x-data="{ tab : 'tutoring' }">

            <!-- page title -->
            <div class="flex flex-col items-start justify-center w-full md:flex-row">

                <div @click="tab = 'tutoring'" class="flex items-center p-5 duration-300 cursor-pointer hover:bg-gray-100 rounded-xl">
                    <div class="flex items-center justify-center w-10 h-10 rounded-2xl" :class="{'text-indigo-700 bg-indigo-100' : tab === 'tutoring', 'text-gray-400' : tab != 'tutoring'}">
                        <i class="text-xl fas fa-users"></i>
                    </div>
                    <div class="ml-2 text-2xl font-bold" :class="{ 'text-gray-400' : tab != 'tutoring'}">Tutoring</div>
                </div>

                <div @click="tab = 'request'" class="flex items-center p-5 mt-3 duration-300 cursor-pointer hover:bg-gray-100 rounded-xl md:mt-0">
                    <div class="flex items-center justify-center w-10 h-10 rounded-2xl" :class="{'text-indigo-700 bg-indigo-100' : tab === 'request', 'text-gray-400' : tab != 'request'}">
                        <i class="text-xl fas fa-check"></i>
                    </div>
                    <div class="ml-2 text-2xl font-bold" :class="{ 'text-gray-400' : tab != 'request'}">Request Diterima</div>
                </div>
            </div>
            <!-- end of page title -->

            <div x-cloak x-show="tab === 'tutoring'">
                <p class="mt-5 mb-10 text-base text-center text-gray-500 md:text-base">
                    Pilih Mentor untuk mendampingi sesi tutoring kamu
                </p>
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
                                            <span>{{round($rate, 1)}} dari {{$sum}} ulasan</span>
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

            <div x-cloak x-show="tab === 'request'">
                <p class="mt-5 mb-10 text-base text-center text-gray-500 md:text-base">
                    List mentor yang menerima request tutoring anda
                </p>
                <div class="flex flex-wrap">
                    @foreach($recents as $recent)
                    <!-- perhitungan rata-rata -->
                    @php
                    $rate = $recent->reviews->avg('rate');
                    $sum = $recent->reviews->count();
                    @endphp
                    <div class="w-full px-4 mb-4 lg:min-w-[490px] lg:w-1/2 ">

                        <div class="flex items-center justify-between gap-1 transition-all bg-gray-100 border border-gray-100 cursor-pointer md:gap-3 bg-opacity-30 md:hover:bg-gray-100 rounded-xl">

                            <div class="flex items-center gap-2 pl-3 my-4 md:gap-4 md:pl-6">
                                <div class="flex flex-shrink-0 w-12 h-12 md:h-14 md:w-14">
                                    <img src="{{$recent->detail->photo ?? 'https://ui-avatars.com/api/?background=random&name='.$recent->name}}" class="w-full h-full">
                                </div>
                                <div class="flex flex-col flex-1 text-xs md:text-base md:flex-initial">
                                    <span class="w-full line-clamp-1">{{$recent->name}}</span>
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
                                </div>
                            </div>

                            <div class="flex border-l">
                                <a href="{{route('student.tutoring.create', $recent->id)}}">
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
</div>

@endsection