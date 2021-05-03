@extends('layouts.student.app-new')
@section('content')
<div class="max-w-5xl mx-auto">
    <div class="flex flex-col w-full px-4 py-8 bg-white sm:px-10">

        <!-- page title -->
        <div class="flex flex-row items-center justify-center w-full h-12">
            <div class="flex items-center justify-center w-10 h-10 text-indigo-700 bg-indigo-100 rounded-2xl">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z">
                    </path>
                </svg>
            </div>
            <div class="ml-2 text-2xl font-bold">Percakapan</div>
        </div>
        <!-- end of page title -->


        <!-- bio -->
        <div class="flex flex-col items-center w-full px-4 py-6 mt-4 bg-indigo-100 border border-gray-200 rounded-lg">
            <div class="overflow-hidden border rounded-full md:w-20 md:h-20 w-14 h-14">
                <img src="{{$mentor->detail->photo ?? 'https://ui-avatars.com/api/?background=random&name=random'}}" class="w-full h-full">
            </div>
            <div class="mt-2 text-sm font-semibold">Nama User</div>
            <div class="text-xs font-semibold text-gray-500">Wordpress Developer</div>
            <a href="#" class="text-xs font-semibold text-gray-500 hover:text-primary">Profil Saya</a>
        </div>
        <!-- end of bio -->

        <div class="flex flex-col mt-8 mb-20">

            <!-- chat baru -->
            <div>
                <div class="flex flex-row items-center gap-4 text-xs md:text-base">
                    <span class="font-bold">Percakapan Anda</span>
                    <span class="flex items-center justify-center w-3 h-3 p-3 text-sm font-semibold bg-indigo-100 rounded-full">
                    {{ $conversations->count() }}
                    </span>
                </div>

                <div class="flex flex-col mt-4 -mx-2 space-y-1">
                    @foreach($conversations as $conversation)

                    @php
                    $latest = $conversation->replies->last()
                    @endphp
                    
                    <a href="{{route('user.chat.show', ['conversation' => $conversation])}}" class="flex flex-row items-center p-4 bg-gray-100 border border-gray-100 md:flex-row bg-opacity-30 md:hover:bg-gray-100 rounded-xl">
                        <div class="flex items-center justify-center w-10 h-10">
                            <img src="{{$mentor->detail->photo ?? 'https://ui-avatars.com/api/?background=random&name=pak_bagas'}}" alt="missing_img" class="rounded-full">
                        </div>
                        <div class="flex flex-col items-start justify-start ml-4">

                            @if($conversation->userOne->id == auth()->user()->id)
                            <span class="text-sm font-semibold">{{$conversation->userTwo->name}}</span>
                            <span class="text-sm text-gray-500 normal-case line-clamp-1">
                                @if($latest)
                                {{$latest->user->name}} : {{$latest->message}}
                                @endif
                            </span>
                            @else
                            <span class="text-sm font-semibold">{{$conversation->userOne->name}}</span>
                            <span class="text-sm text-gray-500 normal-case line-clamp-1">
                                @if($latest)
                                {{$latest->user->name}} : {{$latest->message}}
                                @endif
                            </span>
                            @endif

                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
            <!-- chat baru -->

            <!-- delete me later -->
            <div class="mt-10 mb-4 text-lg font-semibold text-gray-600 normal-case">
                iso misahne chat belum dibaca ambek sng sudah dibaca bakal apik, tapi lek gak knek bagian ngisor iki hapusen ae
            </div>
            <!-- delete me later -->

            <!-- riwayat -->
            <div>
                <div class="flex flex-row items-center gap-4 mt-10 text-xs md:text-base">
                    <span class="font-bold">Riwayat Percakapan</span>
                </div>
                <div class="flex flex-col mt-4 -mx-2 space-y-1 overflow-y-auto">

                    @for($i = 0; $i < 3; $i++) <a href="#" class="flex flex-row items-center p-4 bg-gray-100 border border-gray-100 cursor-pointer md:flex-row bg-opacity-30 md:hover:bg-gray-100 rounded-xl">
                        <div class="flex items-center justify-center w-10 h-10">
                            <img src="{{$mentor->detail->photo ?? 'https://ui-avatars.com/api/?background=random&name=pak_bagas'}}" alt="missing_img" class="rounded-full">
                        </div>
                        <div class="flex flex-col items-start justify-start ml-4">
                            <span class="text-sm font-semibold">Mentor - Pak Bagas</span>
                            <span class="text-sm text-gray-500 normal-case line-clamp-1">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil explicabo rem ea laborum eius aliquam placeat blanditiis, alias quos nisi veritatis corrupti perspiciatis rerum dignissimos inventore, veniam molestiae dolore nesciunt.</span>
                        </div>
                        </a>
                        @endfor
                </div>
            </div>
            <!-- riwayat -->

        </div>
    </div>
</div>

@endsection