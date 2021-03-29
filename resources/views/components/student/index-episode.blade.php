<div class="duration-100 hover:border-l-4 border-primary-lighter">
    <div id="wrapper_dropdown" class="flex w-full p-4 border-b hover:bg-gray-50">
        <div class="flex items-center gap-4">
            <div>
                <div class="grid w-8 h-8 border border-gray-500 rounded-full md:w-10 md:h-10 place-items-center">

                    @if($submission !=null && $submission->unlocked() != 'diterima')
                    <i class="ml-1 text-xs text-gray-500 md:text-base fas fa-lock"></i>
                    @endif

                    @if($type == 'video')
                    <i class="ml-1 text-xs text-gray-500 md:text-base fas fa-play"></i>
                    @elseif($type == 'text')
                    <i class="text-xs text-gray-500 md:text-base fas fa-list-ul"></i>
                    @endif
                </div>
            </div>
            <div class="flex flex-col">
                @if($submission == null)
                <a href="{{route('student.course.episode.show', ['course' => $course->slug, 'episode' => $slug])}}">
                    <span class="text-xs font-bold text-gray-800 md:text-base">
                        {{ $title }}
                    </span>
                </a>
                @elseif($submission !=null && $submission->unlocked() == 'diterima')
                <a href="{{route('student.course.episode.show', ['course' => $course->slug, 'episode' => $slug])}}">
                    <span class="text-xs font-bold text-gray-800 md:text-base">
                        {{ $title }}
                    </span>
                </a>
                @elseif($submission !=null && $submission->unlocked() != 'diterima')
                <span class="text-xs font-bold text-gray-800 md:text-base">
                    {{ $title }}
                </span>
                @endif

                <div class="flex text-xs text-gray-600 md:text-sm">
                    <span class="inline mr-2 xs:hidden">
                        Eps {{ $episode }}
                    </span>
                    <span class="hidden mr-2 xs:inline">
                        Episode {{ $episode }}
                    </span>

                    @if($submission != null && $submission->unlocked() != 'diterima')
                    <span class="inline pl-2 border-l border-gray-600 sm:hidden">{{ Str::limit($submission->title, $limit = 16) }}</span>
                    <span class="hidden pl-2 border-l border-gray-600 sm:inline"> Syarat : Submission {{ $submission->title }}</span>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>