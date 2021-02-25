<div class="pb-2">
    <div id="wrapper_dropdown" class="flex w-full p-3 bg-gray-200 rounded-full hover:bg-gray-300">
        <div class="flex items-center gap-4">

            @if($type == 'video')
            <div class="grid w-8 h-8 bg-gray-500 rounded-full md:w-12 md:h-12 place-items-center">
                <i class="ml-1 text-xs text-gray-200 md:text-xl fas fa-play"></i>
            </div>
            @elseif($type == 'text')
            <div class="grid w-8 h-8 bg-gray-500 rounded-full md:w-12 md:h-12 place-items-center">
                <i class="text-xs text-gray-200 md:text-xl fas fa-list-ul"></i>
            </div>
            @endif

            <div class="flex flex-col">
                <span class="inline text-xs font-semibold text-gray-800 sm:hidden md:font-bold md:text-base">
                    {{ Str::limit($title, $limit = 14) }}
                </span>
                <span class="hidden text-sm font-semibold text-gray-800 sm:inline md:font-bold md:text-base">
                    {{ $title }}
                </span>
                <span class="text-xs text-gray-600 md:text-sm">Episode {{ $episode }} </span>
            </div>
        </div>

        <div class="flex items-center justify-end flex-1" x-data="{ dropdown : false }">
            <button @click="dropdown = !dropdown"  class="mr-5 focus:outline-none">
                <i class="text-sm text-gray-500 md:text-2xl fas fa-ellipsis-h"></i>
            </button>
            {{ $dropdown }}
        </div>
    </div>
</div>