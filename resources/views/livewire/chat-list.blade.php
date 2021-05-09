<div class="flex flex-col flex-auto p-2 md:p-5">
    <div class="flex flex-col flex-auto flex-shrink-0 py-3 pl-3 pr-3 bg-gray-100 dark:bg-gray-700 md:py-10 md:pl-10 rounded-xl">

        <!-- list pesan -->
        <div id="list_chat" class="flex flex-col h-[75vh] md:h-[65vh] mb-4 overflow-y-scroll" wire:poll.1000ms>
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

        <div class="flex w-full py-2 md:hidden">
            <a href="{{ Route::currentRouteNamed('user.chat.index') }}">
                <button class="text-base text-white btn btn-outline-primary bg-primary-lighter">
                    <i class="mr-1 fill-current fas fa-chevron-left"></i> Kembali
                </button>
            </a>
        </div>

        <!-- input pesan -->
        <form wire:submit.prevent="send">
            <div class="flex flex-row items-center w-full h-16 px-1 bg-white md:px-4 rounded-xl ">
                <div class="flex-grow ml-4">
                    <div class="relative w-full">
                        <input type="text" class="w-full pl-4 border-gray-300 form-input rounded-xl" wire:model="pesan">
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