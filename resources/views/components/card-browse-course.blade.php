<!-- start card -->
<div class="w-full px-2 py-4 duration-300 transform border border-gray-50 hover:-translate-y-2 md:w-1/2 2xl:w-1/3">
    <div class="h-full px-5 pt-8 pb-5 bg-white rounded-md shadow-xl">
        <!-- card -->
        <div class="flex flex-col">
            <!-- bagian atas -->
            <div class="flex flex-col items-center md:flex-row md:items-start">

                @if($thumbnail)
                <img src=" {{$thumbnail}} " alt="missing img" class="object-cover w-20 h-20 rounded-full" />
                @else
                <img src=" {{ asset('img/missing-course.jpg') }} " alt="missing img" class="object-cover w-20 h-20 border rounded-full" />
                @endif

                <div class="flex flex-col items-start pl-5">
                   {{-- jumlah episode = {{count($episodes)}}
                    jumlah submission = {{count($submissions)}} --}}
                    <h3 class="text-xl font-semibold hover:text-blue-600">
                        <a href="{{route('student.course.show', $slug)}}">{{ $title }}</a>
                    </h3>
                    <span class="text-sm tracking-tight text-gray-500"> {{ $level }} </span>
                    <div class="flex flex-wrap gap-1 mt-1">
                        @foreach($tags as $tag)
                        <span class="px-2 py-1 text-xs tracking-tight text-gray-100 bg-indigo-600 rounded-full"> {{ $tag->name }} </span>
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- end of bagian atas -->

            <!-- bagian bawah -->
            <div class="flex gap-2 pt-5">
                <div class="flex-1">
                    <a href="{{route('student.course.show', $slug)}}">
                        <button class="w-full btn-bs-success">Lihat Course</button>
                    </a>
                </div>
                <div class="flex-1">
                    @auth
                    @if(in_array(auth()->user()->id, $course->users->pluck('id')->toArray()))              
                        <button class="w-full btn-bs-secondary">Sudah Bergabung</button>
                    @else
                    <form action="{{route('student.course-list.store', $slug)}}" method="post">
                        @csrf
                        <button type="submit" class="w-full btn-bs-primary">Join Course</button>
                    </form>
                    @endif
                    @endauth
                    @guest
                    <form action="{{route('student.course-list.store', $slug)}}" method="post">
                        @csrf
                        <button type="submit" class="w-full btn-bs-primary">Join Course</button>
                    </form>
                    @endguest
                </div>
            </div>
            <!-- end of bagian bawah -->
        </div>
        <!-- end of card -->
    </div>
</div>
<!-- end card -->