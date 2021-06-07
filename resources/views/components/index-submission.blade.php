<div class="pb-2">
    <div id="wrapper_dropdown" class="flex w-full p-3 bg-gray-200 rounded-full hover:bg-gray-300">
        <div class="flex items-center gap-4">
            @role('admin')
            <a href="{{route('admin.course.submission.show', [$course, $slug])}}">
                <div class="grid w-8 h-8 bg-gray-500 rounded-full md:w-12 md:h-12 place-items-center">
                    <i class="text-xs text-gray-200 hover:text-gray-400 md:text-xl fas fa-clipboard-list"></i>
                </div>
            </a>
            @else
            <a href="{{route('mentor.course.submission.show', [$course, $slug])}}">
                <div class="grid w-8 h-8 bg-gray-500 rounded-full md:w-12 md:h-12 place-items-center">
                    <i class="text-xs text-gray-200 hover:text-gray-400 md:text-xl fas fa-clipboard-list"></i>
                </div>
            </a>
            @endrole
            <div class="flex flex-col">
                @role('admin')
                <a href="{{route('admin.course.submission.show', [$course, $slug])}}" class="line-clamp-1">
                    <span class="inline text-xs font-semibold text-gray-800 sm:hidden md:font-bold md:text-base">
                        {{ Str::limit($title, $limit = 14) }}
                    </span>
                    <span class="hidden text-sm font-semibold text-gray-800 sm:inline md:font-bold md:text-base">
                        {{ $title }}
                    </span>
                </a>
                @else
                <a href="{{route('mentor.course.submission.show', [$course, $slug])}}" class="line-clamp-1">
                    <span class="inline text-xs font-semibold text-gray-800 sm:hidden md:font-bold md:text-base">
                        {{ Str::limit($title, $limit = 14) }}
                    </span>
                    <span class="hidden text-sm font-semibold text-gray-800 sm:inline md:font-bold md:text-base">
                        {{ $title }}
                    </span>
                </a>
                @endrole
                <span class="text-xs text-gray-600 md:text-sm">Submission {{ $submission }} </span>
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
                <a href="{{route('admin.course.submission.show', [$course, $slug])}}" class="block px-4 py-2 text-sm font-medium tracking-wide capitalize transition-all duration-300 ease-in-out bg-white hover:bg-gray-200 hover:text-gray-900">
                    <i class="mr-1 text-xs fas fa-info"></i>
                    Detail
                </a>
                @else
                <a href="{{route('mentor.course.submission.show', [$course, $slug])}}" class="block px-4 py-2 text-sm font-medium tracking-wide capitalize transition-all duration-300 ease-in-out bg-white hover:bg-gray-200 hover:text-gray-900">
                    <i class="mr-1 text-xs fas fa-info"></i>
                    Detail
                </a>
                @endrole
                <!-- end item -->

                <!-- item -->
                @role('admin')
                <a href="{{route('admin.course.submission.edit', [$course, $slug])}}" class="block px-4 py-2 text-sm font-medium tracking-wide capitalize transition-all duration-300 ease-in-out bg-white hover:bg-gray-200 hover:text-gray-900" href="#">
                    <i class="mr-1 text-xs fas fa-edit"></i>
                    Edit
                </a>
                @else
                <a href="{{route('mentor.course.submission.edit', [$course, $slug])}}" class="block px-4 py-2 text-sm font-medium tracking-wide capitalize transition-all duration-300 ease-in-out bg-white hover:bg-gray-200 hover:text-gray-900" href="#">
                    <i class="mr-1 text-xs fas fa-edit"></i>
                    Edit
                </a>
                @endrole
                <!-- end item -->

                <!-- item -->
                @role('admin')
                <a href="{{route('admin.course.submission.review', [$course, $slug])}}" class="block px-4 py-2 text-sm font-medium tracking-wide capitalize transition-all duration-300 ease-in-out bg-white hover:bg-gray-200 hover:text-gray-900" href="#">
                    <i class="mr-1 text-sm fas fa-clipboard"></i>
                    Review
                </a>
                @else
                <a href="{{route('mentor.course.submission.review', [$course, $slug])}}" class="block px-4 py-2 text-sm font-medium tracking-wide capitalize transition-all duration-300 ease-in-out bg-white hover:bg-gray-200 hover:text-gray-900" href="#">
                    <i class="mr-1 text-sm fas fa-clipboard"></i>
                    Review
                </a>
                @endrole
                <!-- end item -->

                <hr>
                <!-- item -->
                <!-- form di hidden -->
                <div x-data>
                    @role('admin')
                    <form action="{{route('admin.course.submission.destroy', [$course, $slug])}}" method="post" class="hidden">
                        @csrf
                        @method('DELETE')
                        <button id="{{ $slug }}" type="submit">
                            Hapus
                        </button>
                    </form>
                    @else
                    <form action="{{route('mentor.course.submission.destroy', [$course, $slug])}}" method="post" class="hidden">
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