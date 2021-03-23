<!-- navbar -->
<nav class="sticky top-0 z-30 flex items-center w-full h-16 duration-200 select-none md:h-24 bg-primary md:relative">
    <div class="relative flex flex-wrap items-center justify-between w-full h-24 mx-auto font-medium" x-data="{ openMenu : false }">

        <a href="#_" class="py-4 pl-6 pr-4 md:pl-4 md:py-0">
            <span class="p-1 text-xl font-black leading-none text-white select-none">
                Ngajar<span class="text-gray-100">.in</span>
            </span>
        </a>

        <!-- navigation menu -->
        <div class="relative items-center hidden w-3/4 p-0 text-sm lg:text-base md:flex">

            <div class="flex w-full">

                <div class="flex flex-row justify-center w-2/3 text-indigo-100">

                    <a href="#" class="inline-block px-4 py-2 mx-2 font-semibold hover:text-white lg:mx-3">Home</a>

                    <a href="#" class="inline-block px-4 py-2 mx-2 font-semibold hover:text-white lg:mx-3">Course</a>

                    <a href="#" class="inline-block px-4 py-2 mx-2 font-semibold hover:text-white lg:mx-3">Forum</a>

                    <a href="#" class="inline-block px-4 py-2 mx-2 font-semibold hover:text-white lg:mx-3">Tutoring</a>
                </div>


                <div class="flex items-center justify-end w-1/3">
                    @if (Route::has('login'))

                    @auth
                    <a href="{{ url('/dashboard') }}" class="inline-flex px-4 py-2 ml-4 mr-1 text-base font-medium leading-6 text-indigo-600 whitespace-no-wrap duration-150 bg-white border rounded-full hover:border-white hover:text-white hover:bg-primary focus:outline-none">
                        Dashboard
                    </a>
                    @else
                    <a href="{{ route('login') }}" class="w-full pl-0 mr-3 text-indigo-200 hover:text-white lg:mr-5 md:w-auto">Login</a>

                    @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="inline-flex px-4 py-2 ml-4 mr-1 text-base font-medium leading-6 text-indigo-600 whitespace-no-wrap duration-150 bg-white border rounded-full hover:border-white hover:text-white hover:bg-primary focus:outline-none">Register</a>
                    @endif

                    @endauth
                    @endif
                </div>
            </div>

        </div>
        <!-- end of navigation menu -->

        <!-- modal trigger -->
        <div x-show="!openMenu" @click="openMenu = !openMenu" class="absolute right-0 flex flex-col items-end w-10 h-10 p-2 mr-4 text-gray-100 rounded-full cursor-pointer md:hidden hover:bg-gray-900 hover:bg-opacity-10">

            <svg class="w-6 h-6" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                <path d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>


        </div>
        <!-- end of modal trigger -->

        <!-- mobile menu -->
        <div x-cloak x-show.transition.duration.300ms.opacity="openMenu" class="fixed inset-0 z-40 flex items-center w-full h-full p-3 text-xl bg-gray-900 bg-opacity-50 md:hidden">

            <div class="flex-col w-full h-auto py-10 overflow-hidden bg-white rounded-lg select-none text-primary-lighter">
                <div class="flex justify-end w-full px-4">
                    <button @click="openMenu = !openMenu" class="-mt-8 focus:outline-none hover:text-indigo-300">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
                <div class="flex flex-col items-center justify-center w-full h-full text-center ">

                    @if (Route::has('login'))

                    @auth
                    <a href="{{ url('/dashboard') }}" class="inline-block px-4 py-2 mx-2 font-medium hover:text-indigo-300">
                        Dashboard
                    </a>
                    @else
                    <a href="{{ route('login') }}" class="inline-block px-4 py-2 mx-2 font-medium hover:text-indigo-300">Login</a>

                    @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="inline-block px-4 py-2 mx-2 font-medium hover:text-indigo-300">Register</a>
                    @endif

                    @endauth
                    @endif

                    <a href="#" class="inline-block px-4 py-2 mx-2 font-medium hover:text-indigo-300">Home</a>

                    <a href="#" class="inline-block px-4 py-2 mx-2 font-medium hover:text-indigo-300">Course</a>

                    <a href="#" class="inline-block px-4 py-2 mx-2 font-medium hover:text-indigo-300">Forum</a>

                    <a href="#" class="inline-block px-4 py-2 mx-2 font-medium hover:text-indigo-300">Tutoring</a>

                </div>

            </div>

        </div>
        <!-- end of mobile menu -->

    </div>
</nav>
<!-- end of navbar -->