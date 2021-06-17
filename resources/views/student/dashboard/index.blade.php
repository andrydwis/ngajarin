@extends('layouts.student.app-new')
@section('content')

<section class="min-h-screen bg-gray-100" style="overflow-x: hidden">
    <div id="header_profile" class="relative md:w-[110%] w-full md:left-[-5%] bg-gray-700 pt-10 pb-14 md:pb-24 md:rounded-bl-[50%] md:rounded-br-[50%]">

        <div class="px-10">
            <div class="flex flex-col items-center w-full max-w-3xl gap-10 p-10 mx-auto text-center text-gray-100 md:text-left rounded-xl md:flex-row">
                <div class="flex-grow-0 flex-shrink-0 overflow-hidden rounded-full w-28 h-28">
                    @if($user->detail)
                    @if(!$user->detail->photo)
                    <img src="https://ui-avatars.com/api/?background=random&name={{$user->name}}" class="w-full">
                    @else
                    <img src="{{$user->detail->photo}}" class="w-full">
                    @endif
                    @else
                    <img src="https://ui-avatars.com/api/?background=random&name={{$user->name}}" class="object-cover w-full">
                    @endif
                </div>
                <div class="flex flex-col justify-center flex-1 h-full gap-1 font-semibold">
                    <h6 class="text-2xl">{{$user->name}}</h6>
                    <h6 class="text-xl normal-case">{{$user->email}}</h6>
                    <div class="flex flex-col md:flex-row">
                        <a href="{{route('user.chat.index')}}">
                            <button class="ml-0 text-base font-bold text-white border border-white hover:bg-white hover:text-gray-700 btn">Chat</button>
                        </a>
                        <a href="{{route('user.profile.show')}}">
                            <button class="text-base font-bold text-white border border-transparent btn hover:border-white">Profil</button>
                        </a>

                    </div>
                    <!-- <div class="flex justify-center gap-2 text-3xl text-gray-200 md:justify-start">
                        <a href="">
                            <i class=" fab fa-github-square hover:text-white"></i>
                        </a>
                        <a href="">
                            <i class=" fab fa-linkedin hover:text-white"></i>
                        </a>
                        <a href="">
                            <i class=" fab fa-facebook-square hover:text-white"></i>
                        </a>
                        <a href="">
                            <i class=" fab fa-twitter-square hover:text-white"></i>
                        </a>
                        <a href="">
                            <i class=" fab fa-instagram-square hover:text-white"></i>
                        </a>

                    </div> -->
                </div>
            </div>
        </div>

    </div>

    <div class="relative w-full max-w-[800px] gap-10 px-10 mx-auto -mt-16 text-gray-700 md:flex-row ">
        <div class="flex flex-col items-center justify-between px-10 py-5 bg-gray-800 shadow-md md:flex-row rounded-xl">
            <h6 class="text-lg font-semibold text-center text-gray-300 normal-case md:text-left">Upgrade skill kamu dengan course terbaru dari kami!</h6>
            <a href="{{route('student.course.index')}}">
                <button class="text-base font-semibold btn btn-primary ">Semua Course</button>
            </a>
        </div>

        <div class="grid grid-cols-1 gap-5 mt-10 md:grid-cols-2">

            <div class="flex flex-col gap-5">
                <!-- lanjutkan course -->
                <div class="flex flex-col gap-4 px-8 py-5 bg-white shadow-md rounded-xl">
                    <h6 class="text-gray-800 h6">Lanjutkan Course</h6>

                    <div>
                        @forelse($courses as $course)
                        <!-- items -->
                        <a href="{{route('student.course.show', ['course' => $course])}}" class="mb-1 duration-100">
                            <div class="flex w-full px-1 py-4 rounded-lg hover:bg-gray-100">
                                <div class="flex items-center gap-2">
                                    <div>
                                        <div class="grid w-10 h-10 overflow-hidden bg-gray-700 rounded-full md:w-14 md:h-14 place-items-center">
                                            <img src="{{$course->thumbnail}}" class="object-cover w-full h-full " alt="missing img">
                                        </div>
                                    </div>
                                    <div class="flex flex-col">
                                        <span class="text-xs font-bold text-gray-800 md:text-base line-clamp-1">
                                            {{$course->title}}
                                        </span>

                                        <div class="flex text-xs text-gray-600 md:text-sm line-clamp-1">
                                            <span class="mr-2">
                                                @php
                                                $finished = 0;
                                                foreach($course->submissions as $submission){
                                                if($submission->finished()){
                                                $finished += 1;
                                                }
                                                }
                                                @endphp
                                                {{$finished}} / {{$course->submissions->count()}} Progress Submission
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <!-- items -->
                        @empty
                        <div class="flex w-full px-1 py-4 rounded-lg hover:bg-gray-100">
                            <span class="font-semibold">belum tergabung di kursus manapun</span>
                        </div>
                        @endforelse
                    </div>

                    <a href="{{route('student.course-list.index')}}">
                        <div>
                            <button class="w-full text-base font-semibold border-opacity-50 border-none btn btn-outline-primary border-primary-lighter hover:bg-primary-lighter">Lihat Semua</button>
                        </div>
                    </a>

                </div>
                <!-- end of lanjutkan course -->

                <!-- sertifikat saya -->
                <div class="flex flex-col gap-4 px-8 py-5 bg-white shadow-md rounded-xl">
                    <h6 class="text-gray-800 h6">Sertifikat Saya</h6>

                    <div>
                        @forelse($certificates as $certificate)
                        <!-- items -->
                        <a href="{{route('student.course.show', ['course' => $course])}}" class="mb-1 duration-100">
                            <div class="flex w-full px-1 py-4 rounded-lg hover:bg-gray-100">
                                <div class="flex items-center gap-2">
                                    <div>
                                        <div class="grid w-10 h-10 overflow-hidden border rounded-full md:w-14 md:h-14 place-items-center">
                                            <img src="{{$certificate->certificate->course->thumbnail}}" class="object-cover w-full h-full" alt="missing img">
                                        </div>
                                    </div>
                                    <div class="flex flex-col">
                                        <span class="text-xs font-bold text-gray-800 md:text-base line-clamp-1">
                                            Sertifikat {{$certificate->certificate->course->title}}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <!-- items -->
                        @empty
                        <div class="flex w-full px-1 py-4 rounded-lg hover:bg-gray-100">
                            <span class="font-semibold">selesaikan course untuk mendapat sertifikat</span>
                        </div>
                        @endforelse
                    </div>
                </div>
                <!-- end of sertifikat saya -->

            </div>

            <div class="flex flex-col gap-5">
                <!-- kelas saya -->
                <div class="flex flex-col gap-4 px-8 py-5 bg-white shadow-md rounded-xl">
                    <h6 class="text-gray-800 h6">Kelas Saya</h6>

                    <div>
                        @forelse($classrooms as $classroom)
                        <!-- items -->
                        <a href="{{route('student.classroom-course.index', ['classroom' => $classroom])}}" class="mb-1 duration-100">
                            <div class="flex w-full px-1 py-4 rounded-lg hover:bg-gray-100">
                                <div class="flex items-center gap-2">
                                    <div>
                                        <div class="grid w-10 h-10 overflow-hidden border rounded-full md:w-14 md:h-14 place-items-center">
                                            <img src="https://ui-avatars.com/api/?background=random&name={{$classroom->name}}" class="w-full h-full" alt="missing img">
                                        </div>
                                    </div>
                                    <div class="flex flex-col ml-2">
                                        <span class="text-xs font-bold text-gray-800 md:text-base line-clamp-1">
                                            Kelas {{$classroom->name}}
                                        </span>

                                        <a href="{{route('student.classroom-course.index', ['classroom' => $classroom])}}">
                                            <div class="flex text-xs text-gray-600 md:text-sm line-clamp-1">
                                                <span class="mr-2">
                                                    kunjungi kelas
                                                </span>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <!-- items -->
                        @empty
                        <div class="flex w-full px-1 py-4 rounded-lg hover:bg-gray-100">
                            <span class="font-semibold">belum terdaftar di kelas manapun</span>
                        </div>
                        @endforelse
                    </div>

                    <a href="{{route('student.classroom.index')}}">
                        <div>
                            <button class="w-full text-base font-semibold border-opacity-50 border-none btn btn-outline-primary border-primary-lighter hover:bg-primary-lighter">Lihat Kelas</button>
                        </div>
                    </a>

                </div>
                <!-- end of kelas saya -->

                <!-- tutoring saya -->
                <div class="flex flex-col gap-4 px-8 py-5 bg-white shadow-md rounded-xl">
                    <h6 class="text-gray-800 h6">Jadwal Tutoring Saya</h6>

                    <div>
                        @forelse($tutorings as $tutoring)
                        <!-- items -->
                        <a href="{{route('student.tutoring.create', ['user' => $tutoring->mentor_id])}}" class="mb-1 duration-100">
                            <div class="flex w-full px-1 py-4 rounded-lg hover:bg-gray-100">
                                <div class="flex items-center gap-2">
                                    <div>
                                        <div class="grid w-10 h-10 overflow-hidden border rounded-full md:w-14 md:h-14 place-items-center">
                                            <img src="{{$tutoring->mentor->detail->photo ?? 'https://ui-avatars.com/api/?background=random&name=' . $tutoring->mentor->name}}" class="w-full h-full" alt="missing img">
                                        </div>
                                    </div>
                                    <div class="flex flex-col">
                                        <span class="text-xs font-bold text-gray-800 md:text-base line-clamp-1">
                                            {{$tutoring->mentor->name}}
                                        </span>
                                        <div class="flex text-xs text-gray-600 md:text-sm line-clamp-1">
                                            <span class="mr-2">
                                                {{\Carbon\Carbon::parse($tutoring->date.' '.$tutoring->hour_start)->diffForHumans()}}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <!-- items -->
                        @empty
                        <div class="flex w-full px-1 py-4 rounded-lg hover:bg-gray-100">
                            <span class="font-semibold">belum ada jadwal tutoring</span>
                        </div>
                        @endforelse
                    </div>
                </div>
                <!-- end of tutoring saya -->
            </div>
        </div>

        <div class="flex flex-col items-center justify-between px-5 py-5 my-10 bg-white shadow-md md:px-10 md:flex-row rounded-xl" x-data="{ isOpen : false }">
            <h6 class="text-lg font-semibold text-gray-600 normal-case">Ingin berkontribusi sebagai mentor?</h6>
            <a href="#" @click.prevent="isOpen = !isOpen">
                <button class="text-base font-semibold border btn btn-outline-success bg-success bg-opacity-5">
                    <i class="mr-1 fas fa-comments"></i>
                    Pengajuan Mentor
                </button>
            </a>

            <div x-cloak x-show.transition.duration.300ms.opacity="isOpen" class="fixed inset-0 z-50 flex items-center justify-center w-full h-full">

                <!-- overlay -->
                <div class="absolute z-10 w-full h-full bg-gray-900 opacity-50">
                </div>
                <!-- overlay -->

                <div class="fixed z-20 flex flex-col w-5/6 mx-auto mt-10 bg-white border rounded-lg lg:w-2/6 md:w-1/2 md:mt-0 card">

                    <div>
                        <!-- body -->
                        <div class="flex items-center justify-between card-header">
                            <h6 class="h6">Form Pengajuan Mentor</h6>
                            <button class="focus:outline-none">
                                <i class="text-gray-400 fas fa-times hover:text-gray-600" @click="isOpen = !isOpen"></i>
                            </button>
                        </div>
                        <div class="card-body">
                            <form action="" method="post">
                                <div class="grid gap-6">
                                    <div>
                                        <label for="email">Email</label>
                                        <input type="text" name="email" id="email" placeholder="Masukkan Email" class="block w-full py-2 mt-2 form-input @error('...') is-invalid @enderror" value="{{old('...')}}">

                                        @error('...')
                                        <div class="alert alert-error">
                                            {{$message}}
                                        </div>
                                        @enderror

                                    </div>
                                    <div>
                                        <label for="...">...</label>
                                        <textarea name="..." id="..." rows="5" placeholder="..." class="form-input py-2 mt-2 block w-full @error('...') is-invalid @enderror" value="{{old('...')}}"></textarea>

                                        @error('...')
                                        <div class="alert alert-error">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="flex justify-end">
                                        <button class="text-base border-none btn btn-outline-primary" @click.prevent="isOpen = !isOpen">Batal</button>
                                        <button class="mx-0 text-base btn btn-primary" type="submit">Simpan</button>
                                    </div>

                                </div>
                            </form>
                        </div>

                        <!-- body -->
                    </div>
                </div>
            </div>

        </div>

        <div class="flex flex-col items-center justify-between px-5 py-5 my-10 bg-gray-700 shadow-md md:px-10 md:flex-row rounded-xl">
            <h6 class="text-lg font-semibold text-gray-300 normal-case">Butuh bantuan atau menemukan bug?</h6>
            @livewire('chat-admin')
        </div>

    </div>

</section>

@endsection

@section('customCSS')
<style>
    @media (min-width: 640px) {
        #header_profile {
            background: url({{asset('img/patternpad.svg')
        }
    }

    )
    }
    }
</style>
@endsection