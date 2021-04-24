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
                    <h6 class="h6">Buat Request Tutoring </h6>
                </div>

                <div class="card-body">
                    <!-- bio -->
                    <div class="flex col-span-1 gap-2">
                        <div class="flex-grow-0 flex-shrink-0 w-20 h-20">
                            <img src="{{$mentor->detail->photo ?? 'https://ui-avatars.com/api/?background=random&name='.$user->name}}">
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
                                    <span>{{$rate}} / {{$sum}} ulasan</span>
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
                                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptatem doloribus nam vero magnam exercitationem consequuntur fuga nemo, molestias, saepe deleniti labore minima praesentium eaque reprehenderit cumque, similique inventore assumenda recusandae.
                            </p>
                            @endif


                        </div>
                    </div>
                    <!-- end of bio -->

                    <!-- input waktu -->
                    <div class="grid col-span-1 gap-5 mt-5">


                        <div class="flex flex-wrap items-center gap-2">

                            <div class="w-full md:flex-1" x-data="{ isOpen : false }">
                                <label>Tanggal</label>

                                <div class="flex gap-2">
                                    <button class="m-0 form-input md:text-base " @click="isOpen = true">
                                        <i class="text-xs leading-none fas fa-chevron-down"></i>
                                    </button>
                                    <input type="text" name="" id="" class="w-full cursor-not-allowed form-input" disabled>
                                </div>
                                <div x-cloak x-show.transition.origin.top="isOpen" @click.away="isOpen = false" class="w-full py-2 text-right text-gray-500 bg-white rounded shadow-md md:text-left md:absolute md:w-52">

                                    @foreach($dates as $date => $id)
                                    <!-- item -->
                                    <button class="block px-4 py-2 text-sm font-medium tracking-wide capitalize transition-all duration-300 ease-in-out bg-white hover:bg-gray-200 hover:text-gray-900" href="#">
                                        {{\Carbon\Carbon::parse($date)->isoFormat('dddd, D MMMM Y')}}
                                    </button>
                                    <!-- end item -->
                                    @endforeach
                                    <hr>
                                </div>

                            </div>

                            <div class="flex flex-wrap gap-2 xs:flex-nowrap md:flex-1">
                                <div class="w-1/2">
                                    <label for="jam_mulai">jam mulai</label>
                                    <input type="time" class="block w-full form-input" name="jam_mulai">
                                </div>

                                <div class="w-1/2">
                                    <label for="jam_akhir">jam akhir</label>
                                    <input type="time" class="block w-full form-input" name="jam_akhir">
                                </div>
                            </div>

                        </div>

                        <div class="w-full">
                            <label for="detail">Detail</label>
                            <textarea name="detail" class="block w-full form-textarea" placeholder="Tulis detail tambahan untuk mentor"></textarea>
                        </div>
                        <div class="flex justify-end w-full">
                            <button class="mt-0 btn btn-primary md:text-sm">Kirim</button>
                        </div>
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
                    <h6 class="h6">History</h6>
                </div>
                <div class="prose card-body">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto, laboriosam? Omnis maxime sunt quod nihil repellendus, labore maiores esse delectus porro, voluptas dolorum non nemo assumenda? Sequi voluptatem tempore sit?

                </div>
            </div>
        </div>
    </div>
</div>

@endsection