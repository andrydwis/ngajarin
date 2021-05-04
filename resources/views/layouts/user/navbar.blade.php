<!-- navbar -->
<nav class="sticky top-0 z-30 flex items-center flex-shrink-0 w-full h-16 duration-200 select-none md:h-20 bg-primary md:relative">
    <div class="relative flex flex-wrap items-center justify-between w-full h-full mx-auto font-medium" x-data="{ openMenu : false }">

        <a href="/" class="pl-6 pr-4 md:pl-4 md:py-0">
            <span class="p-1 text-xl font-black leading-none text-white select-none">
                Ngajar<span class="text-gray-100">.in</span>
            </span>
        </a>

        <!-- navigation menu -->
        <div class="relative items-center hidden w-3/4 h-full p-0 text-sm lg:text-base lg:flex">

            <div class="flex items-center w-full h-full">

                <div class="flex items-center justify-center w-2/3 h-full text-indigo-100">

                    <a href="{{ route('user.post.index') }}" class="h-full border-b-4 hover:border-white
                     {{ Route::currentRouteNamed('user.post.index') ? 'border-white text-white' : 'border-primary' }}">
                        <div class="flex items-center h-full px-4 mx-2 font-semibold hover:text-white lg:mx-3">
                            Forum
                        </div>
                    </a>

                    <a href="{{ route('user.chat.index')}}" class="h-full border-b-4 hover:border-white
                     {{ Route::currentRouteNamed('user.chat.index') ? 'border-white text-white' : 'border-primary' }}">
                        <div class="flex items-center h-full px-4 mx-2 font-semibold hover:text-white lg:mx-3">
                            Chat
                        </div>
                    </a>

                </div>


                <div class="flex items-center justify-end w-1/3 mt-3 ">
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
                    <a href="{{ url('/dashboard') }}" class="inline-flex mt-0 text-base text-white border border-white rounded-full btn hover:bg-white hover:text-primary">
                        Dashboard
                    </a>

                    <form action="{{route('logout')}}" method="post">
                        <div class="flex gap-2">
                            @csrf
                            <button type="submit" class="inline-flex mt-0 text-base text-gray-200 border-white rounded-full btn hover:text-white hover:underline">Keluar</button>
                        </div>
                    </form>

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

        <!-- modal trigger -->
        <div x-show="!openMenu" @click="openMenu = !openMenu" class="absolute right-0 flex flex-col items-end w-10 h-10 p-2 mr-4 text-gray-100 rounded-full cursor-pointer lg:hidden hover:bg-gray-900 hover:bg-opacity-10">

            <svg class="w-6 h-6" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                <path d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>


        </div>
        <!-- end of modal trigger -->

        <!-- mobile menu -->
        <div x-cloak x-show.transition.duration.300ms.opacity="openMenu" class="fixed inset-0 z-40 flex items-center w-full h-full p-3 text-xl bg-gray-900 bg-opacity-50 lg:hidden">

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

                    <a href="{{route('root.index')}}" class="inline-block px-4 py-2 mx-2 font-medium hover:text-indigo-300">Beranda</a>

                    <a href="{{route('user.post.index')}}" class="inline-block px-4 py-2 mx-2 font-medium hover:text-indigo-300">Forum</a>

                    <a href="{{route('user.chat.index')}}" class="inline-block px-4 py-2 mx-2 font-medium hover:text-indigo-300">Chat</a>

                    @auth
                    <a href="{{ url('/dashboard') }}" class="inline-block px-4 py-2 mx-2 font-medium hover:text-indigo-300">
                        Dashboard
                    </a>

                    <form action="{{route('logout')}}" method="post">
                        <div class="flex gap-2">
                            @csrf
                            <button type="submit" class="inline-block px-4 py-2 mx-2 font-medium hover:text-indigo-300">Logout</button>
                        </div>
                    </form>

                    @else
                    <a href="{{ route('login') }}" class="inline-block px-4 py-2 mx-2 font-medium hover:text-indigo-300">Login</a>

                    @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="inline-block px-4 py-2 mx-2 font-medium hover:text-indigo-300">Register</a>
                    @endif

                    @endauth
                    @endif



                </div>

            </div>

        </div>
        <!-- end of mobile menu -->

    </div>
</nav>
<!-- end of navbar -->