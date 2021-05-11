<!-- navbar -->
<nav class="sticky top-0 z-30 flex items-center flex-shrink-0 w-full h-16 duration-200 select-none md:h-20 md:relative 
@if(Route::currentRouteNamed('dashboard.student')) bg-gray-700 @else bg-primary @endif">
    <div class="relative flex flex-wrap items-center justify-between w-full h-full mx-auto font-medium">

        <a href="/" class="pl-6 pr-4 md:pl-4 md:py-0">
            <span class="p-1 text-xl font-black leading-none text-white select-none">
                Ngajar<span class="text-gray-100">.in</span>
            </span>
        </a>

        <!-- navigation menu -->
        <div class="relative flex items-center h-full p-0 text-sm md:w-3/4 lg:text-base">

            <div class="flex items-center w-full h-full">

                <div class="items-center justify-center hidden w-2/3 h-full text-indigo-100 md:flex">
                    @php
                    $border = Route::currentRouteNamed('dashboard.student') ? "border-gray-700" : "border-primary";
                    @endphp


                    @if (Route::has('login'))
                    @auth
                    <a href="{{ url('/dashboard') }}" class="h-full border-b-4 hover:border-white
                    {{ Route::currentRouteNamed('dashboard.student') ? 'border-gray-700' : 'border-primary' }}">
                        <div class="flex items-center h-full px-4 mx-2 font-semibold hover:text-white lg:mx-3">
                            Dashboard
                        </div>
                    </a>
                    @else
                    @if (Route::has('register'))
                    <a href="/" class="h-full border-b-4 border-primary hover:border-white">
                        <div class="flex items-center h-full px-4 mx-2 font-semibold hover:text-white lg:mx-3">
                            Home
                        </div>
                    </a>
                    @endif
                    @endauth
                    @endif

                    <a href="{{ route('student.course.index') }}" class="h-full border-b-4 hover:border-white
                     {{ Route::currentRouteNamed('student.course.index') ? 'border-white text-white' : $border }}">
                        <div class="flex items-center h-full px-4 mx-2 font-semibold hover:text-white lg:mx-3">
                            Course
                        </div>
                    </a>

                    <a href="{{ route('user.post.index') }}" class="h-full border-b-4 hover:border-white
                     {{ Route::currentRouteNamed('user.post.index') ? 'border-white text-white' : $border }}">
                        <div class="flex items-center h-full px-4 mx-2 font-semibold hover:text-white lg:mx-3">
                            Forum
                        </div>
                    </a>

                    <a href="{{ route('student.tutoring.index')}}" class="h-full border-b-4 hover:border-white
                     {{ Route::currentRouteNamed('student.tutoring.index') ? 'border-white text-white' : $border }}">
                        <div class="flex items-center h-full px-4 mx-2 font-semibold hover:text-white lg:mx-3">
                            Tutoring
                        </div>
                    </a>

                </div>


                <div class="flex items-center justify-end mt-3 md:w-1/3 ">

                    
                    @if(Route::currentRouteNamed('user.chat.show'))
                    <div class="flex mb-2 ml-4 bg-primary-lighter rounded-xl" x-data>
                        <button @click="toggleLight()" type="button" class="flex items-center justify-center flex-shrink-0 px-4 py-2 text-white focus:outline-none rounded-xl">
                            <i class="w-4 h-4 fas fa-sun"></i>
                        </button>
                        <button @click="toggleDark()" type="button" class="flex items-center justify-center flex-shrink-0 px-4 py-2 text-white focus:outline-none rounded-xl">
                            <i class="w-4 h-4 fas fa-moon"></i>
                        </button>
                    </div>
                    @endif

                    @if (Route::has('login'))
                    @auth
                    
                    <!-- notif -->
                    <div class="flex mb-3">
                        <x-student-notifications />
                    </div>
                    <!-- end of notif -->

                    <!-- profile -->
                    <div class="relative mb-3 mr-5 md:static" x-data="{ isOpen : false }">

                        <button class="flex flex-wrap items-center text-gray-100 menu-btn focus:outline-none focus:shadow-outline" @click="isOpen = true">
                            <div class="w-8 h-8 overflow-hidden rounded-full">
                                <!-- <img class="object-cover w-full h-full" src="img/user.svg"> -->
                                <i class="text-2xl fill-current fas fa-user-circle"></i>
                            </div>

                            <div class="flex ml-1 capitalize ">
                                <h1 class="inline p-0 m-0 font-semibold leading-none lg:hidden">
                                    {{ Str::words(auth()->user()->name, 1, '') }}
                                </h1>
                                <h1 class="hidden p-0 m-0 font-semibold leading-none lg:inline">
                                    {{ Str::words(auth()->user()->name, 2, '') }}
                                </h1>
                                <i class="block ml-2 text-sm leading-none fas fa-chevron-down"></i>
                            </div>
                        </button>


                        <div x-cloak x-show.transition.origin.top="isOpen" @click.away="isOpen = false" class="fixed right-0 z-20 w-full py-2 text-right text-gray-500 rounded shadow-md md:text-left md:absolute md:w-40 @if(Route::currentRouteNamed('dashboard.student')) bg-gray-100 @else bg-white @endif">

                            <!-- item -->
                            <a href="{{ url('/dashboard') }}" class="block px-4 py-2 text-sm font-medium tracking-wide capitalize transition-all duration-300 ease-in-out md:hidden hover:bg-gray-200 hover:text-gray-900">
                                <i class="mr-1 text-xs fas fa-chart-pie"></i>
                                Dashboard
                            </a>
                            <!-- end item -->

                            <!-- item -->
                            <a href="{{ route('student.course.index') }}" class="block px-4 py-2 text-sm font-medium tracking-wide capitalize transition-all duration-300 ease-in-out md:hidden hover:bg-gray-200 hover:text-gray-900">
                                <i class="mr-1 text-xs fas fa-folder-plus"></i>
                                Cari Course
                            </a>
                            <!-- end item -->

                            <!-- item -->
                            <a href="{{ route('user.post.index') }}" class="block px-4 py-2 text-sm font-medium tracking-wide capitalize transition-all duration-300 ease-in-out md:hidden hover:bg-gray-200 hover:text-gray-900">
                                <i class="mr-1 text-xs fas fa-comments"></i>
                                Forum
                            </a>
                            <!-- end item -->

                            <!-- item -->
                            <a href="{{ route('student.tutoring.index')}}" class="block px-4 py-2 text-sm font-medium tracking-wide capitalize transition-all duration-300 ease-in-out md:hidden hover:bg-gray-200 hover:text-gray-900">
                                <i class="mr-1 text-xs fas fa-calendar-check"></i>
                                Tutoring
                            </a>
                            <!-- end item -->


                            <!-- item -->
                            <a href="{{route('user.profile.show')}}" class="block px-4 py-2 text-sm font-medium tracking-wide capitalize transition-all duration-300 ease-in-out hover:bg-gray-200 hover:text-gray-900">
                                <i class="mr-1 text-xs fas fa-user-edit"></i>
                                Profile
                            </a>
                            <!-- end item -->

                            <hr>

                            <div x-data="{modalLogout : false}">
                                <!-- item -->
                                <a @click="modalLogout = !modalLogout" class="block px-4 py-2 text-sm font-medium tracking-wide capitalize transition-all duration-300 ease-in-out hover:bg-gray-200 hover:text-gray-900" href="#">
                                    <i class="mr-1 text-xs fas fa-user-times"></i>
                                    Logout
                                </a>
                                <!-- end item -->

                                @auth
                                <!-- Modal-->
                                <div @click.away="modalLogout = !modalLogout" x-cloak x-show.transition.duration.300.opacity="modalLogout" class="fixed top-0 left-0 flex items-center justify-center w-full h-full">

                                    <!-- overlay -->
                                    <div class="absolute z-10 w-full h-full bg-gray-900 opacity-50">
                                    </div>
                                    <!-- overlay -->

                                    <div class="fixed z-50 flex flex-col w-full px-4 mx-auto mt-10 bg-white border rounded-lg py-7 lg:w-2/6 md:w-1/2 md:ml-auto md:mt-0">

                                        <div class="px-4 text-left">
                                            <!--Title-->
                                            <div class="flex items-center justify-between pb-3">
                                                <p class="text-2xl font-bold text-gray-600">Yakin ingin keluar?</p>
                                                <button class="z-50" @click="modalLogout = !modalLogout">
                                                    <i class="fas fa-times hover:text-red-500"></i>
                                                </button>
                                            </div>
                                            <hr>
                                            <!--Body-->
                                            <p class="py-4 ">tekan tombol "Logout" dibawah apabila anda ingin mengakhiri sesi anda</p>

                                            <!--Footer-->
                                            <div class="flex justify-end pt-8">
                                                <form action="{{route('logout')}}" method="post">
                                                    <div class="flex gap-2">
                                                        @csrf
                                                        <button class="text-base btn hover:bg-indigo-100" @click.prevent="modalLogout = !modalLogout">Batal</button>

                                                        <button type="submit" class="text-base btn btn-danger bg-danger-lighter hover:bg-opacity-80">Logout</button>
                                                    </div>
                                                </form>
                                            </div>

                                        </div>
                                    </div>


                                </div>
                                @endauth
                            </div>


                        </div>
                    </div>
                    <!-- end profile -->

                    @else


                    @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="inline-flex mt-0 mr-0 text-base bg-white border border-white rounded-full text-primary btn hover:bg-primary hover:text-white">Daftar <span class="hidden ml-2 xl:inline">Sekarang</span> </a>
                    @endif

                    <a href="{{ route('login') }}" class="inline-flex mt-0 text-base text-white border-white rounded-full btn hover:underline">Masuk</a>

                    @endauth
                    @endif
                </div>
            </div>

        </div>
        <!-- end of navigation menu -->

    </div>
</nav>
<!-- end of navbar -->