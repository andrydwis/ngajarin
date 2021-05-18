@extends('layouts.user.app')
@section('content')
<div class="flex flex-col min-h-screen mb-4 overflow-auto">
    <div class="flex antialiased text-gray-800">
        
        <div class="flex flex-row w-full overflow-x-hidden">
            <!-- left section -->
            <div class="z-40 flex-col flex-shrink-0 hidden w-64 py-8 pl-6 pr-2 bg-white lg:flex">

                <div class="flex flex-col">

                    <div class="flex flex-row items-center gap-4 text-xs md:text-base">
                        <span class="font-bold">Sedang Mengobrol dengan</span>
                    </div>

                    @php
                    $reciever;
                    if ($conversation->userOne->id == auth()->user()->id) {
                        $reciever = $conversation->userTwo;
                    } else {
                        $reciever = $conversation->userOne;
                    }
                    @endphp

                    <div class="flex flex-col items-center w-full px-4 py-6 mt-4 bg-gray-100 border border-gray-100 rounded-lg bg-opacity-30 md:hover:bg-gray-100">
                        <div class="w-20 h-20 overflow-hidden border rounded-full">
                            <img src="{{$reciever->detail->photo ?? 'https://ui-avatars.com/api/?background=random&name='.$reciever->name}}" alt="gambar" class="w-full h-full" />
                        </div>
                        <div class="mt-2 text-sm font-semibold">
                            <span class="text-sm font-semibold">{{$reciever->name}}</span>
                        </div>
                    </div>

                </div>

                <!-- semua chat -->
                <div class="flex flex-col mt-8">

                    <div class="flex flex-row items-center gap-4 text-xs md:text-base">
                        <span class="font-bold">Semua Percakapan</span>
                    </div>

                    <div class="flex flex-col mt-4 -mx-2 space-y-1 h-[30vh] overflow-y-scroll">

                        @foreach($conversations as $list)

                        @php
                        $latest = $list->replies->last()
                        @endphp

                        <a href="{{route('user.chat.show', ['conversation' => $list])}}" class="flex flex-row items-center p-4 bg-gray-100 border border-gray-100 md:flex-row bg-opacity-30 md:hover:bg-gray-100 rounded-xl">
                            @if($list->userOne->id == auth()->user()->id)
                            <div class="flex items-center justify-center w-10 h-10 overflow-hidden rounded-full">
                                <img src="{{ $list->userTwo->detail->photo ??'https://ui-avatars.com/api/?background=random&name='.$list->userTwo->name}}" alt="missing_img" class="rounded-full">
                            </div>
                            @else
                            <div class="flex items-center justify-center w-10 h-10 overflow-hidden rounded-full">
                                <img src="{{ $list->userOne->detail->photo ??'https://ui-avatars.com/api/?background=random&name='.$list->userOne->name}}" alt="missing_img" class="rounded-full">
                            </div>
                            @endif
                            <div class="flex flex-col items-start justify-start ml-4">

                                @if($list->userOne->id == auth()->user()->id)
                                <span class="text-sm font-semibold">{{$list->userTwo->name}}</span>
                                @else
                                <span class="text-sm font-semibold">{{$list->userOne->name}}</span>
                                @endif

                            </div>
                        </a>
                        @endforeach
                    </div>

                </div>
                <!-- semua chat -->
                <a href="{{route('user.chat.index')}}">
                    <div class="mt-5 text-center border border-transparent text-primary-lighter md:text-base btn hover:border-primary-lighter ">
                        <i class="mr-1 text-sm fill-current fas fa-chevron-left"></i> Kembali
                    </div>
                </a>
            </div>
            <!-- left section -->
            <!-- right section -->
            @livewire('chat-list', ['conversation' => $conversation])
            <!-- right section -->
        </div>
    </div>

</div>
@endsection

@section('customCSS')
<style>
    ::-webkit-scrollbar-thumb {
        background-color: rgb(226, 232, 240);
    }

    ::-webkit-scrollbar-thumb:hover {
        background-color: rgb(203, 213, 225);
    }
</style>
@endsection

@section('customJS')
<script>
    const scrollBawah = function() {
        document.getElementById('list_chat').scrollTop = document.getElementById('list_chat').scrollHeight;
    }
    scrollBawah();

    function toggleDark() {
        document.documentElement.classList.add('dark')
    }

    function toggleLight() {
        document.documentElement.classList.remove('dark')
    }
</script>
@endsection