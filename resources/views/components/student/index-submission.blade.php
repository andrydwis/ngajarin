<div class="duration-100 hover:border-l-4 border-primary-lighter">
    <div id="wrapper_dropdown" class="flex w-full p-4 border-b hover:bg-gray-50">
        <div class="flex items-center gap-4">
            <a href="{{route('mentor.course.submission.show', [$course, $slug])}}">
                <div class="grid border border-gray-500 rounded-full w-9 h-9 md:w-12 md:h-12 place-items-center">
                    <i class="text-xs text-gray-500 md:text-2xl fas fa-clipboard-list"></i>
                </div>
            </a>
            <div class="flex flex-col">
                <!-- //iki ki -->
                {{$sub->unlocked()}}
                <!-- iki ki -->
                <a href="{{route('mentor.course.submission.show', [$course, $slug])}}">
                    <span class="inline text-xs font-semibold text-gray-800 sm:hidden md:font-bold md:text-base">
                        {{ Str::limit($title, $limit = 16) }}
                    </span>
                    <span class="hidden text-sm font-semibold text-gray-800 sm:inline md:font-bold md:text-base">
                        {{ $title }}
                    </span>
                </a>

                <span class="text-xs text-gray-600 md:text-sm">Submission {{ $submission }} </span>
            </div>
        </div>
    </div>
</div>