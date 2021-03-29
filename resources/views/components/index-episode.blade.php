<div class="pb-2">
    <div id="wrapper_dropdown" class="flex w-full p-3 bg-gray-200 rounded-full hover:bg-gray-300">
        <div class="flex items-center gap-4">
            <a href="
            @role('admin')
            {{route('admin.course.episode.show', [$course, $slug])}}
            @else
            {{route('mentor.course.episode.show', [$course, $slug])}}
            @endrole
            ">
                <div class="grid w-8 h-8 bg-gray-500 rounded-full md:w-12 md:h-12 place-items-center">
                    @if($type == 'video')
                    <i class="ml-1 text-xs text-gray-200 hover:text-gray-400 md:text-xl fas fa-play"></i>
                    @elseif($type == 'text')
                    <i class="text-xs text-gray-200 hover:text-gray-400 md:text-xl fas fa-list-ul"></i>
                    @endif
                </div>
            </a>
            <div class="flex flex-col">
                <a href="
                @role('admin')
                {{route('admin.course.episode.show', [$course, $slug])}}
                @else
                {{route('mentor.course.episode.show', [$course, $slug])}}
                @endrole
                ">
                    <span class="inline text-xs font-semibold text-gray-800 sm:hidden">
                        {{ Str::limit($title, $limit = 14) }}
                    </span>
                    <span class="hidden text-base font-bold text-gray-800 sm:inline">
                        {{ $title }}
                    </span>
                </a>
                <div class="flex text-xs text-gray-600 md:text-sm">
                    <span class="inline pr-2 mr-2 border-r border-gray-600 xs:hidden">Eps {{ $episode }} </span>
                    <span class="hidden pr-2 mr-2 border-r border-gray-600 xs:inline">Episode {{ $episode }} </span>

                    <!-- fungsi buat cek status pengumpulan -->
                    {{-- $submission->unlocked() --}}
                    <!-- end of fungsi buat cek status pengumpulan -->

                    @if($submission)
                    <span class="inline sm:hidden">{{ Str::limit($submission->title, $limit = 10) }}</span>
                    <span class="hidden sm:inline"> Syarat : Submission {{ $submission->title }}</span>
                    @else
                    <span class="inline xs:hidden"> - </span>
                    <span class="hidden xs:inline"> Tidak ada Syarat </span>
                    @endif
                </div>
            </div>
        </div>

        <div class="flex items-center justify-end flex-1" x-data="{ dropdown : false }">
            <button @click="dropdown = !dropdown" class="mr-5 focus:outline-none">
                <i class="text-sm text-gray-500 md:text-2xl fas fa-ellipsis-h"></i>
            </button>

            <!-- dropdown -->
            <div x-cloak x-show.transition.origin.top="dropdown" @click.away="dropdown = false" class="absolute z-50 w-40 py-2 mt-5 ml-10 text-left text-gray-500 bg-white border border-gray-300 rounded shadow-md">
                <!-- item -->
                @role('admin')
                <a href="{{route('admin.course.episode.show', [$course, $slug])}}" class="block px-4 py-2 text-sm font-medium tracking-wide capitalize transition-all duration-300 ease-in-out bg-white hover:bg-gray-200 hover:text-gray-900">
                    <i class="mr-1 text-xs fas fa-info"></i>
                    Detail
                </a>
                @else
                <a href="{{route('mentor.course.episode.show', [$course, $slug])}}" class="block px-4 py-2 text-sm font-medium tracking-wide capitalize transition-all duration-300 ease-in-out bg-white hover:bg-gray-200 hover:text-gray-900">
                    <i class="mr-1 text-xs fas fa-info"></i>
                    Detail
                </a>
                @endrole
                <!-- end item -->

                <!-- item -->
                @role('admin')
                <a href="{{route('admin.course.episode.edit', [$course, $slug])}}" class="block px-4 py-2 text-sm font-medium tracking-wide capitalize transition-all duration-300 ease-in-out bg-white hover:bg-gray-200 hover:text-gray-900" href="#">
                    <i class="mr-1 text-xs fas fa-edit"></i>
                    Edit
                </a>
                @else
                <a href="{{route('mentor.course.episode.edit', [$course, $slug])}}" class="block px-4 py-2 text-sm font-medium tracking-wide capitalize transition-all duration-300 ease-in-out bg-white hover:bg-gray-200 hover:text-gray-900" href="#">
                    <i class="mr-1 text-xs fas fa-edit"></i>
                    Edit
                </a>
                @endrole
                <!-- end item -->

                <!-- item -->
                <!-- form di hidden -->
                <div x-data>
                    @role('admin')
                    <form action="{{route('admin.course.episode.destroy', [$course, $slug])}}" method="post" class="hidden">
                        @csrf
                        @method('DELETE')
                        <button id="{{ $slug }}" type="submit">
                            Hapus
                        </button>
                    </form>
                    @else
                    <form action="{{route('mentor.course.episode.destroy', [$course, $slug])}}" method="post" class="hidden">
                        @csrf
                        @method('DELETE')
                        <button id="{{ $slug }}" type="submit">
                            Hapus
                        </button>
                    </form>
                    @endrole

                    <a href="#" @click.prevent="$('#{{ $slug }}').click();" class="block px-4 py-2 text-sm font-medium tracking-wide capitalize transition-all duration-300 ease-in-out bg-white hover:bg-gray-200 hover:text-gray-900">
                        <i class="mr-1 text-xs fas fa-trash"></i>
                        Hapus
                    </a>
                </div>
                <!-- end item -->
            </div>
        </div>
    </div>
</div>