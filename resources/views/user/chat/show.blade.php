@extends('layouts.user.app')
@section('content')
<div class="flex flex-col h-screen overflow-hidden">
    <div class="flex antialiased text-gray-800">
        <a href="{{ Route::currentRouteNamed('user.chat.index') }}">
            <button class="fixed z-50 w-14 h-14 text-white duration-300 rounded-full lg:hidden left-5 bottom-[15%] focus:outline-none bg-primary-lighter hover:bg-primary">
                <i class="text-base fill-current fas fa-chevron-left"></i>
            </button>
        </a>
        <div class="flex flex-row w-full overflow-x-hidden">
            <!-- left section -->
            <div class="z-40 flex-col flex-shrink-0 hidden w-64 py-8 pl-6 pr-2 bg-white lg:flex">

                <div class="flex flex-col">

                    <div class="flex flex-row items-center gap-4 text-xs md:text-base">
                        <span class="font-bold">Sedang Mengobrol dengan</span>
                    </div>

                    <?php
                    $nama_user;
                    if ($conversation->userOne->id == auth()->user()->id) {
                        $nama_user = $conversation->userTwo->name;
                    } else {
                        $nama_user = $conversation->userOne->name;
                    }
                    ?>

                    <div class="flex flex-col items-center w-full px-4 py-6 mt-4 border border-gray-100 rounded-lg bg-gray-100 bg-opacity-30 md:hover:bg-gray-100">
                        <div class="w-20 h-20 overflow-hidden border rounded-full">
                            <img src="https://ui-avatars.com/api/?background=random&name={{$nama_user}}" alt="gambar" class="w-full h-full" />
                        </div>
                        <div class="mt-2 text-sm font-semibold">
                            <span class="text-sm font-semibold">{{$nama_user}}</span>
                        </div>
                    </div>

                </div>

                <!-- semua chat -->
                <div class="flex flex-col mt-8">

                    <div class="flex flex-row items-center gap-4 text-xs md:text-base">
                        <span class="font-bold">Semua Percakapan</span>
                    </div>

                    <div class="flex flex-col mt-4 -mx-2 space-y-1 h-[30vh] overflow-y-scroll">

                        @foreach($conversations as $conversation)

                        @php
                        $latest = $conversation->replies->last()
                        @endphp

                        <a href="{{route('user.chat.show', ['conversation' => $conversation])}}" class="flex flex-row items-center p-4 bg-gray-100 border border-gray-100 md:flex-row bg-opacity-30 md:hover:bg-gray-100 rounded-xl">
                            @if($conversation->userOne->id == auth()->user()->id)
                            <div class="flex items-center justify-center w-10 h-10">
                                <img src="{{ $conversation->userTwo->detail->photo ??'https://ui-avatars.com/api/?background=random&name='.$conversation->userTwo->name}}" alt="missing_img" class="rounded-full">
                            </div>
                            @else
                            <div class="flex items-center justify-center w-10 h-10">
                                <img src="{{ $conversation->userOne->detail->photo ??'https://ui-avatars.com/api/?background=random&name='.$conversation->userOne->name}}" alt="missing_img" class="rounded-full">
                            </div>
                            @endif
                            <div class="flex flex-col items-start justify-start ml-4">

                                @if($conversation->userOne->id == auth()->user()->id)
                                <span class="text-sm font-semibold">{{$conversation->userTwo->name}}</span>
                                @else
                                <span class="text-sm font-semibold">{{$conversation->userOne->name}}</span>
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