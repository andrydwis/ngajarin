@extends('layouts.student.app-new')
@section('content')
<div class="flex flex-col h-screen overflow-hidden">

    @include('layouts.student.navbar-new')


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

                    <div class="flex flex-col items-center w-full px-4 py-6 mt-4 border border-blue-100 rounded-lg bg-blue-50">
                        <div class="w-20 h-20 overflow-hidden border rounded-full">
                            <img src="https://ui-avatars.com/api/?background=random&name={{$nama_user}}" alt="gambar" class="w-full h-full" />
                        </div>
                        <div class="mt-2 text-sm font-semibold">
                            <span class="text-sm font-semibold">{{$nama_user}}</span>
                        </div>
                        <div class="text-xs text-gray-500">Mentor Ngajar.in</div>
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
                            <div class="flex items-center justify-center w-10 h-10">
                                <img src="{{'https://ui-avatars.com/api/?background=random&name=pb'}}" alt="missing_img" class="rounded-full">
                            </div>
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
            <div class="flex flex-col flex-auto p-2 md:p-5">
                <div class="flex flex-col flex-auto flex-shrink-0 py-3 pl-3 pr-3 bg-gray-100 dark:bg-gray-700 md:py-10 md:pl-10 rounded-xl">

                    <!-- list pesan -->
                    <div id="list_chat" class="flex flex-col h-[75vh] md:h-[65vh] mb-4 overflow-y-scroll">
                        <div class="flex flex-col normal-case">

                            @foreach($replies as $reply)

                            @if($reply->user->name == auth()->user()->name)
                            <div class="pr-5 my-1 rounded-lg">
                                <div class="flex flex-row-reverse items-center justify-start">

                                    <div class="relative max-w-lg px-4 py-2 mr-3 text-sm bg-indigo-100 shadow md:text-base rounded-xl">
                                        <div> {{$reply->message}}
                                            <span class="block mt-2 text-xs text-right text-gray-400 ">
                                                {{ \Carbon\Carbon::parse($reply->created_at)->format('h:i A') }}
                                            </span>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            @else
                            <div class="my-1 rounded-lg">
                                <div class="flex flex-row items-center">
                                    <img loading="lazy" alt="gambar" class="flex-shrink-0 object-cover w-12 h-12 mr-3 bg-white rounded-full" src="{{$reply->user->detail->photo ?? 'https://ui-avatars.com/api/?background=random&name='.$reply->user->name}}" />

                                    <div class="relative max-w-lg px-4 py-2 mr-3 text-sm bg-white shadow md:text-base rounded-xl">
                                        <div> {{$reply->message}}
                                            <span class="block mt-2 text-xs text-gray-400">
                                                {{ \Carbon\Carbon::parse($reply->created_at)->format('h:i A') }}
                                            </span>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            @endif

                            @endforeach
                        </div>
                    </div>
                    <!-- list pesan -->

                    <!-- input pesan -->
                    <form action="{{route('user.chat.store', ['conversation' => $conversation])}}" method="POST">
                        @csrf
                        <div class="flex flex-row items-center w-full h-16 px-1 bg-white md:px-4 rounded-xl ">
                            <div class="flex-grow ml-4">
                                <div class="relative w-full">
                                    <input type="text" name="pesan" class="w-full pl-4 border-gray-300 form-input rounded-xl">
                                </div>
                            </div>
                            <div class="ml-4">
                                <button type="submit" class="flex items-center justify-center flex-shrink-0 px-4 py-2 text-white focus:outline-none bg-primary-lighter hover:bg-primary rounded-xl">
                                    <span>Kirim</span>
                                    <i class="w-4 h-4 ml-2 fas fa-paper-plane"></i>
                                </button>
                            </div>

                        </div>
                    </form>
                    <!-- input pesan -->
                </div>
            </div>
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
        console.log('scroll sukses')
    }
    scrollBawah();

    function toggleDark() {
        document.documentElement.classList.add('dark')
        console.log('mode dark')
    }

    function toggleLight() {
        document.documentElement.classList.remove('dark')
        console.log('mode light')
    }
</script>
@endsection