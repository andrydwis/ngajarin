<!-- start navbar -->
<div class="fixed top-0 z-40 flex flex-row flex-wrap justify-between w-full p-5 bg-white border-b border-gray-200 shadow-sm">
    <div class="flex flex-none text-primary-lighter">
        <strong class="flex-1 mx-2 capitalize">ngajar.in</strong>
    </div>

    <!-- navbar content -->
    <div class="flex flex-row-reverse items-center">

        <!-- profile -->
        <div class="relative md:static" x-data="{ isOpen : false }">

            <button class="flex flex-wrap items-center menu-btn focus:outline-none focus:shadow-outline" @click="isOpen = true">
                <div class="w-8 h-8 overflow-hidden rounded-full">
                    <!-- <img class="object-cover w-full h-full" src="img/user.svg"> -->
                    <i class="text-2xl fas fa-user-circle text-primary-lighter"></i>
                </div>

                <div class="flex ml-2 capitalize ">
                    <h1 class="p-0 m-0 text-sm font-semibold leading-none text-gray-800">
                        {{auth()->user()->name}}
                    </h1>
                    <i class="block ml-2 text-xs leading-none fas fa-chevron-down"></i>
                </div>
            </button>



            <div x-cloak x-show.transition.origin.top="isOpen" @click.away="isOpen = false" class="fixed right-0 z-20 w-full py-2 text-right text-gray-500 bg-white rounded shadow-md md:text-left md:absolute md:w-40">

                <!-- item -->
                <a class="block px-4 py-2 text-sm font-medium tracking-wide capitalize transition-all duration-300 ease-in-out bg-white hover:bg-gray-200 hover:text-gray-900" href="#">
                    <i class="mr-1 text-xs fas fa-user-edit"></i>
                    Profile
                </a>
                <!-- end item -->

                <!-- item -->
                <a class="block px-4 py-2 text-sm font-medium tracking-wide capitalize transition-all duration-300 ease-in-out bg-white hover:bg-gray-200 hover:text-gray-900" href="#">
                    <i class="mr-1 text-xs fas fa-inbox"></i>
                    Inbox
                </a>
                <!-- end item -->

                <!-- item -->
                <a class="block px-4 py-2 text-sm font-medium tracking-wide capitalize transition-all duration-300 ease-in-out bg-white hover:bg-gray-200 hover:text-gray-900" href="#">
                    <i class="mr-1 text-xs fas fa-cogs"></i>
                    Settings
                </a>
                <!-- end item -->

                <!-- item -->
                <a class="block px-4 py-2 text-sm font-medium tracking-wide capitalize transition-all duration-300 ease-in-out bg-white hover:bg-gray-200 hover:text-gray-900" href="#">
                    <i class="mr-1 text-xs fas fa-list"></i>
                    Activity Log
                </a>
                <!-- end item -->

                <hr>

                <div x-data="{modalLogout : false}">
                    <!-- item -->
                    <a @click="modalLogout = !modalLogout" class="block px-4 py-2 text-sm font-medium tracking-wide capitalize transition-all duration-300 ease-in-out bg-white hover:bg-gray-200 hover:text-gray-900" href="#">
                        <i class="mr-1 text-xs fas fa-user-times"></i>
                        Logout
                    </a>
                    <!-- end item -->

                    @auth
                    <!-- Modal-->
                    <div @click.away="modalLogout = !modalLogout" x-cloak x-show="modalLogout" x-transition:enter="transition duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition duration-300" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed top-0 left-0 flex items-center justify-center w-full h-full">

                        <!-- overlay -->
                        <div class="absolute z-10 w-full h-full bg-gray-900 opacity-50">
                        </div>
                        <!-- overlay -->

                        <div class="fixed z-50 flex flex-col w-full px-4 mx-auto mt-10 bg-white border rounded-lg py-7 lg:w-2/6 md:w-1/2 md:ml-auto md:mt-0">

                            <div class="px-4 text-left">
                                <!--Title-->
                                <div class="flex items-center justify-between pb-3">
                                    <p class="text-2xl font-bold text-gray-600">Ready to Leave?</p>
                                    <button class="z-50" @click="modalLogout = !modalLogout">
                                        <i class="fas fa-times hover:text-red-500"></i>
                                    </button>
                                </div>
                                <hr>
                                <!--Body-->
                                <p class="py-4 ">Select "Logout" below if you are ready to end your current session</p>

                                <!--Footer-->
                                <div class="flex justify-end pt-8">
                                    <form action="{{route('logout')}}" method="post">
                                        <div class="flex gap-2">
                                            @csrf
                                            <button type="submit" class="btn-bs-danger">Logout</button>

                                            <button class="btn-bs-secondary" @click.prevent="modalLogout = !modalLogout">Cancel</button>
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


        <!-- dropdown notif & chat -->
        <div class="flex">
            <!-- notif -->
            <x-admin-notifications/>
            <!-- end notif -->

            <!-- chat HIDDEN-->
            <div class="static hidden mr-2 xs:mr-5 md:relative" x-data="{ isOpen3 : false }">

                <button @click="isOpen3 = true" class="p-0 m-0 text-gray-500 transition-all duration-300 ease-in-out menu-btn hover:text-gray-900 focus:text-gray-900 focus:outline-none">
                    <i class="fas fa-comments"></i>
                </button>

                <!-- <button class="fixed top-0 left-0 z-10 hidden w-full h-full menu-overflow"></button> -->

                <div x-cloak x-show.transition.origin.top="isOpen3" @click.away="isOpen3 = false" class="absolute right-0 z-20 w-full py-2 mt-5 bg-white rounded shadow-md md:w-80 animated">
                    <!-- top -->
                    <div class="flex flex-row items-center justify-between px-4 py-2 text-sm font-semibold capitalize">
                        <h1>Pesan</h1>
                        <div class="px-1 text-xs text-green-500 bg-green-100 border border-green-200 rounded">
                            <strong>3</strong>
                        </div>
                    </div>
                    <hr>
                    <!-- end top -->

                    <!-- body -->
                    @for ($i = 0; $i < 5; $i++) <!-- item -->
                        <a class="flex flex-row items-center justify-start px-4 py-4 text-sm font-medium tracking-wide capitalize transition-all duration-300 ease-in-out bg-white hover:bg-gray-200" href="#">

                            <div class="w-10 h-10 mr-3 overflow-hidden bg-gray-100 border border-gray-300 rounded-full">
                                <img class="object-cover w-full h-full" src="{{url('/img/user1.jpg')}}" alt="">
                            </div>

                            <div class="flex flex-1 flex-rowbg-green-100">
                                <div class="flex-1">
                                    <h1 class="text-sm font-semibold">nama pengirim</h1>
                                    <p class="text-xs text-gray-500">isi pesan</p>
                                </div>
                                <div class="text-xs text-right text-gray-500">
                                    <p>4 min ago</p>
                                </div>
                            </div>

                        </a>
                        <hr>
                        <!-- end item -->
                        @endfor

                        <!-- end body -->

                        <!-- bottom -->
                        <hr>
                        <div class="px-4 py-2 mt-2">
                            <a href="#" class="block p-1 text-xs text-center uppercase transition-all duration-500 ease-in-out border border-gray-300 rounded hover:text-green-500">
                                lihat semua
                            </a>
                        </div>
                        <!-- end bottom -->
                </div>
            </div>
        </div>
        <!-- end chat -->
        <!-- end dropdown notif & chat -->


    </div>
    <!-- end navbar content -->

</div>
<!-- end navbar -->