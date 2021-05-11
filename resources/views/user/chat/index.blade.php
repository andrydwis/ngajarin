@extends('layouts.user.app')
@section('content')
<div class="max-w-5xl mx-auto">
    <div class="flex flex-col w-full px-4 py-8 bg-white sm:px-10">

        <!-- page title -->
        <div class="flex flex-row items-center justify-center w-full h-12">
            <div class="flex items-center justify-center w-10 h-10 text-indigo-700 bg-gray-100 rounded-2xl">
                <i class="text-2xl far fa-comment-dots"></i>
            </div>
            <div class="ml-2 text-2xl font-bold">Percakapan</div>
        </div>
        <!-- end of page title -->


        <!-- bio -->
        <div class="flex flex-col items-center w-full px-4 py-6 mt-4 bg-gray-100 border border-gray-200 rounded-lg">
            <div class="overflow-hidden border rounded-full md:w-20 md:h-20 w-14 h-14">
                <img src="{{$user->detail->photo ?? 'https://ui-avatars.com/api/?background=random&name='.$user->name}}" class="object-cover w-full h-full">
            </div>
            <div class="mt-2 text-sm font-semibold">{{$user->name}}</div>
            <a href="{{route('user.profile.show')}}" class="text-sm font-semibold text-gray-500 hover:text-primary">Profil Saya</a>
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
                        @if($conversation->userOne->id == auth()->user()->id)
                        <div class="flex items-center justify-center w-10 h-10">
                            <img src="{{$conversation->userOne->detail->photo ?? 'https://ui-avatars.com/api/?background=random&name='.$conversation->userOne->name}}" alt="missing_img" class="rounded-full">
                        </div>
                        @else
                        <div class="flex items-center justify-center w-10 h-10">
                            <img src="{{$mentor->detail->photo ?? 'https://ui-avatars.com/api/?background=random&name='.$conversation->userOne->name}}" alt="missing_img" class="rounded-full">
                        </div>
                        @endif
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

        </div>
    </div>
</div>

@endsection