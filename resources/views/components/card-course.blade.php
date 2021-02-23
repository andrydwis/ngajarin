<!-- start card -->
<div class="w-full px-2 py-4 report-card md:w-1/2 2xl:w-1/3">
    <div class="h-full px-5 pt-8 pb-5 bg-white border border-gray-200 rounded-md shadow card ">
        <!-- card -->
        <div class="flex flex-col">
            <!-- bagian atas -->
            <div class="flex justify-end text-gray-400 " x-data="{detailOpen : false}">
                <button @click="detailOpen = true" class="focus:outline-none hover:text-gray-800">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z"></path>
                    </svg>
                </button>

                <div x-cloak x-show.transition.origin.top="detailOpen" @click.away="detailOpen = false" class="absolute z-50 w-40 py-2 mt-5 ml-10 text-left text-gray-500 bg-white border border-gray-300 rounded shadow-md">
                    <!-- item -->
                    @role('admin')
                    <a href="{{route('admin.course.show', $courseId)}}" class="block px-4 py-2 text-sm font-medium tracking-wide capitalize transition-all duration-300 ease-in-out bg-white hover:bg-gray-200 hover:text-gray-900">
                        <i class="mr-1 text-xs fas fa-info"></i>
                        Detail
                    </a>
                    @else
                    <a href="{{route('mentor.course.show', $courseId)}}" class="block px-4 py-2 text-sm font-medium tracking-wide capitalize transition-all duration-300 ease-in-out bg-white hover:bg-gray-200 hover:text-gray-900">
                        <i class="mr-1 text-xs fas fa-info"></i>
                        Detail
                    </a>
                    @endrole
                    <!-- end item -->

                    <!-- item -->
                    @role('admin')
                    <a href="{{route('admin.course.edit', $courseId)}}" class="block px-4 py-2 text-sm font-medium tracking-wide capitalize transition-all duration-300 ease-in-out bg-white hover:bg-gray-200 hover:text-gray-900" href="#">
                        <i class="mr-1 text-xs fas fa-edit"></i>
                        Edit
                    </a>
                    @else
                    <a href="{{route('mentor.course.edit', $courseId)}}" class="block px-4 py-2 text-sm font-medium tracking-wide capitalize transition-all duration-300 ease-in-out bg-white hover:bg-gray-200 hover:text-gray-900" href="#">
                        <i class="mr-1 text-xs fas fa-edit"></i>
                        Edit
                    </a>
                    @endrole
                    <!-- end item -->

                    <!-- item -->
                    @role('admin')
                    <a href="{{route('admin.course.episode.index', $courseId)}}" class="block px-4 py-2 text-sm font-medium tracking-wide capitalize transition-all duration-300 ease-in-out bg-white hover:bg-gray-200 hover:text-gray-900" href="#">
                        <i class="mr-1 text-xs fas fa-photo-video"></i>
                        Episode
                    </a>
                    @else
                    <a href="{{route('mentor.course.episode.index', $courseId)}}" class="block px-4 py-2 text-sm font-medium tracking-wide capitalize transition-all duration-300 ease-in-out bg-white hover:bg-gray-200 hover:text-gray-900" href="#">
                        <i class="mr-1 text-xs fas fa-photo-video"></i>
                        Episode
                    </a>
                    @endrole
                    <!-- end item -->

                    <!-- item -->
                    <!-- form di hidden -->
                    <div x-data>
                        @role('admin')
                        <form action="{{route('admin.course.destroy', $courseId)}}" method="post" class="hidden">
                            @else
                            <form action="{{route('mentor.course.destroy', $courseId)}}" method="post" class="hidden">
                                @endrole
                                @csrf
                                @method('DELETE')
                                <button id="{{ $title }}" type="submit">
                                    Hapus
                                </button>

                            </form>

                            <a href="#" @click.prevent="$('#{{ $title }}').click();" class="block px-4 py-2 text-sm font-medium tracking-wide capitalize transition-all duration-300 ease-in-out bg-white hover:bg-gray-200 hover:text-gray-900">
                                <i class="mr-1 text-xs fas fa-trash"></i>
                                Hapus
                            </a>
                    </div>
                    <!-- end item -->
                </div>

            </div>
            <div class="flex flex-col items-center md:flex-row md:items-start">

                @if($thumbnail)
                <img src=" {{$thumbnail}} " alt="missing img" class="object-cover w-20 h-20 rounded-full" />
                @else
                <img src="https://i.stack.imgur.com/y9DpT.jpg" alt="missing img" class="object-cover w-20 h-20 border rounded-full" />
                @endif

                <div class="flex flex-col items-start pl-5">
                    <h3 class="text-xl font-semibold hover:text-blue-600">
                        <a href="{{route('admin.course.edit', $courseId)}}">{{ $title }}</a>
                    </h3>

                    <span class="text-sm tracking-tight text-gray-500"> {{ $level }} </span>
                    <div class="flex flex-wrap gap-1 mt-1">
                        @foreach($tags as $tag)
                        <span class="px-2 py-1 text-xs tracking-tight text-gray-100 bg-blue-400 rounded-full"> {{ $tag->name }} </span>
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- end of bagian atas -->

            <!-- bagian bawah -->
            <div class="flex pt-5">

                <!-- kiri -->

                <div class="flex items-center justify-center flex-1 gap-1 px-1 text-gray-700 border-r-2 md:-ml-6 hover:text-blue-600">
                    <!-- link masih disabled -->
                    <a href="{{-- route('admin.course.episode', $courseId) --}}">
                        <div class="mr-2 ">
                            <i class="text-4xl md:text-5xl fab fa-youtube"></i>
                        </div>
                    </a>
                    <div class="flex flex-col items-start">
                        <h3 class="text-xl font-bold md:text-2xl xl:text-3xl">31</h3>
                        <span class="text-xs tracking-tight text-gray-500 md:text-sm"><span class="hidden sm:inline">Total</span> Episode</span>
                    </div>

                </div>


                <!-- kanan -->
                <div class="flex items-center justify-center flex-1 gap-1 px-1 text-gray-700">
                    <div class="mr-2 ">
                        <i class="text-4xl md:text-5xl fas fa-clipboard"></i>
                    </div>
                    <div class="flex flex-col items-start">
                        <h3 class="text-xl font-bold md:text-2xl xl:text-3xl">11</h3>
                        <span class="text-xs tracking-tight text-gray-500 md:text-sm"> Submission</span>
                    </div>
                </div>

            </div>
            <!-- end of bagian bawah -->
        </div>
        <!-- end of card -->
    </div>
</div>
<!-- end card -->