<!-- start navbar -->
<div class="flex flex-row flex-wrap justify-between p-5 bg-white border-b border-gray-200 md:fixed md:w-full md:top-0 md:z-50 md:shadow-sm">
    <button class="flex flex-none text-gray-900" @click="isOpen4 = true">
        <i class="inline-block text-2xl  fas fa-book-open"></i>
        <strong class="flex-1 mx-2 capitalize">ngajar.in</strong>
    </button>

    <!-- navbar content -->
    <div class="flex flex-row-reverse items-center">

        <!-- profile -->
        <div class="relative dropdown md:static" x-data="{ isOpen : false }">

            <button class="flex flex-wrap items-center menu-btn focus:outline-none focus:shadow-outline" @click="isOpen = true">
                <div class="w-8 h-8 overflow-hidden rounded-full">
                    <img class="object-cover w-full h-full" src="img/user.svg">
                </div>

                <div class="flex ml-2 capitalize ">
                    <h1 class="p-0 m-0 text-sm font-semibold leading-none text-gray-800">Admin</h1>
                    <i class="hidden ml-2 text-xs leading-none md:block fad fa-chevron-down"></i>
                </div>
            </button>

            <button class="fixed top-0 left-0 z-10 hidden w-full h-full menu-overflow"></button>

            <div x-show="isOpen" @click.away="isOpen = false" class="absolute right-0 z-20 w-40 py-2 mt-5 text-gray-500 bg-white rounded shadow-md menu animated faster">

                <!-- item -->
                <a class="block px-4 py-2 text-sm font-medium tracking-wide capitalize transition-all duration-300 ease-in-out bg-white hover:bg-gray-200 hover:text-gray-900" href="#">
                    <i class="mr-1 text-xs fad fa-user-edit"></i>
                    edit my profile
                </a>
                <!-- end item -->

                <!-- item -->
                <a class="block px-4 py-2 text-sm font-medium tracking-wide capitalize transition-all duration-300 ease-in-out bg-white hover:bg-gray-200 hover:text-gray-900" href="#">
                    <i class="mr-1 text-xs fad fa-inbox-in"></i>
                    my inbox
                </a>
                <!-- end item -->

                <!-- item -->
                <a class="block px-4 py-2 text-sm font-medium tracking-wide capitalize transition-all duration-300 ease-in-out bg-white hover:bg-gray-200 hover:text-gray-900" href="#">
                    <i class="mr-1 text-xs fad fa-badge-check"></i>
                    tasks
                </a>
                <!-- end item -->

                <!-- item -->
                <a class="block px-4 py-2 text-sm font-medium tracking-wide capitalize transition-all duration-300 ease-in-out bg-white hover:bg-gray-200 hover:text-gray-900" href="#">
                    <i class="mr-1 text-xs fad fa-comment-alt-dots"></i>
                    chats
                </a>
                <!-- end item -->

                <hr>

                <!-- item -->
                <a class="block px-4 py-2 text-sm font-medium tracking-wide capitalize transition-all duration-300 ease-in-out bg-white hover:bg-gray-200 hover:text-gray-900" href="#">
                    <i class="mr-1 text-xs fad fa-user-times"></i>
                    log out
                </a>
                <!-- end item -->

            </div>
        </div>
        <!-- end profile -->

        
        <!-- dropdown notif & chat -->
        <div class="hidden md:flex">
            <!-- notif -->
            <div class="relative mr-5 dropdown md:static" x-data="{ isOpen2 : false }">

                <button class="p-0 m-0 text-gray-500 transition-all duration-300 ease-in-out menu-btn hover:text-gray-900 focus:text-gray-900 focus:outline-none" @click="isOpen2 = true">
                    <i class="fad fa-bells"></i>
                </button>

                <button class="fixed top-0 left-0 z-10 hidden w-full h-full menu-overflow"></button>

                <div x-show="isOpen2" @click.away="isOpen2 = false" class="absolute right-0 z-20 py-2 mt-5 bg-white rounded shadow-md menu md:right-0 md:w-full w-84 animated faster">
                    <!-- top -->
                    <div class="flex flex-row items-center justify-between px-4 py-2 text-sm font-semibold capitalize">
                        <h1>notifications</h1>
                        <div class="px-1 text-xs text-green-500 bg-green-100 border border-green-200 rounded">
                            <strong>5</strong>
                        </div>
                    </div>
                    <hr>
                    <!-- end top -->

                    <!-- body -->

                    <!-- item -->
                    <a class="flex flex-row items-center justify-start block px-4 py-4 text-sm font-medium tracking-wide capitalize transition-all duration-300 ease-in-out bg-white hover:bg-gray-200" href="#">

                        <div class="px-3 py-2 mr-3 bg-gray-100 border border-gray-300 rounded">
                            <i class="text-sm fad fa-birthday-cake"></i>
                        </div>

                        <div class="flex flex-1 flex-rowbg-green-100">
                            <div class="flex-1">
                                <h1 class="text-sm font-semibold">poll..</h1>
                                <p class="text-xs text-gray-500">text here also</p>
                            </div>
                            <div class="text-xs text-right text-gray-500">
                                <p>4 min ago</p>
                            </div>
                        </div>

                    </a>
                    <hr>
                    <!-- end item -->

                    <!-- item -->
                    <a class="flex flex-row items-center justify-start block px-4 py-4 text-sm font-medium tracking-wide capitalize transition-all duration-300 ease-in-out bg-white hover:bg-gray-200" href="#">

                        <div class="px-3 py-2 mr-3 bg-gray-100 border border-gray-300 rounded">
                            <i class="text-sm fad fa-user-circle"></i>
                        </div>

                        <div class="flex flex-1 flex-rowbg-green-100">
                            <div class="flex-1">
                                <h1 class="text-sm font-semibold">mohamed..</h1>
                                <p class="text-xs text-gray-500">text here also</p>
                            </div>
                            <div class="text-xs text-right text-gray-500">
                                <p>78 min ago</p>
                            </div>
                        </div>

                    </a>
                    <hr>
                    <!-- end item -->

                    <!-- item -->
                    <a class="flex flex-row items-center justify-start block px-4 py-4 text-sm font-medium tracking-wide capitalize transition-all duration-300 ease-in-out bg-white hover:bg-gray-200" href="#">

                        <div class="px-3 py-2 mr-3 bg-gray-100 border border-gray-300 rounded">
                            <i class="text-sm fad fa-images"></i>
                        </div>

                        <div class="flex flex-1 flex-rowbg-green-100">
                            <div class="flex-1">
                                <h1 class="text-sm font-semibold">new imag..</h1>
                                <p class="text-xs text-gray-500">text here also</p>
                            </div>
                            <div class="text-xs text-right text-gray-500">
                                <p>65 min ago</p>
                            </div>
                        </div>

                    </a>
                    <hr>
                    <!-- end item -->

                    <!-- item -->
                    <a class="flex flex-row items-center justify-start block px-4 py-4 text-sm font-medium tracking-wide capitalize transition-all duration-300 ease-in-out bg-white hover:bg-gray-200" href="#">

                        <div class="px-3 py-2 mr-3 bg-gray-100 border border-gray-300 rounded">
                            <i class="text-sm fad fa-alarm-exclamation"></i>
                        </div>

                        <div class="flex flex-1 flex-rowbg-green-100">
                            <div class="flex-1">
                                <h1 class="text-sm font-semibold">time is up..</h1>
                                <p class="text-xs text-gray-500">text here also</p>
                            </div>
                            <div class="text-xs text-right text-gray-500">
                                <p>1 min ago</p>
                            </div>
                        </div>

                    </a>
                    <!-- end item -->


                    <!-- end body -->

                    <!-- bottom -->
                    <hr>
                    <div class="px-4 py-2 mt-2">
                        <a href="#" class="block p-1 text-xs text-center uppercase transition-all duration-500 ease-in-out border border-gray-300 rounded hover:text-green-500">
                            view all
                        </a>
                    </div>
                    <!-- end bottom -->
                </div>
            </div>
            <!-- end notif -->

            <!-- chat -->
            <div class="relative mr-5 dropdown md:static" x-data="{ isOpen3 : false }">

                <button @click="isOpen3 = true" class="p-0 m-0 text-gray-500 transition-all duration-300 ease-in-out menu-btn hover:text-gray-900 focus:text-gray-900 focus:outline-none">
                    <i class="fad fa-comments"></i>
                </button>

                <button class="fixed top-0 left-0 z-10 hidden w-full h-full menu-overflow"></button>

                <div x-show="isOpen3" @click.away="isOpen3 = false" class="absolute right-0 z-20 py-2 mt-5 bg-white rounded shadow-md menu md:w-full md:right-0 w-84 animated faster">
                    <!-- top -->
                    <div class="flex flex-row items-center justify-between px-4 py-2 text-sm font-semibold capitalize">
                        <h1>messages</h1>
                        <div class="px-1 text-xs text-green-500 bg-green-100 border border-green-200 rounded">
                            <strong>3</strong>
                        </div>
                    </div>
                    <hr>
                    <!-- end top -->

                    <!-- body -->

                    <!-- item -->
                    <a class="flex flex-row items-center justify-start block px-4 py-4 text-sm font-medium tracking-wide capitalize transition-all duration-300 ease-in-out bg-white hover:bg-gray-200" href="#">

                        <div class="w-10 h-10 mr-3 overflow-hidden bg-gray-100 border border-gray-300 rounded-full">
                            <img class="object-cover w-full h-full" src="img/user1.jpg" alt="">
                        </div>

                        <div class="flex flex-1 flex-rowbg-green-100">
                            <div class="flex-1">
                                <h1 class="text-sm font-semibold">mohamed said</h1>
                                <p class="text-xs text-gray-500">yeah i know</p>
                            </div>
                            <div class="text-xs text-right text-gray-500">
                                <p>4 min ago</p>
                            </div>
                        </div>

                    </a>
                    <hr>
                    <!-- end item -->

                    <!-- item -->
                    <a class="flex flex-row items-center justify-start block px-4 py-4 text-sm font-medium tracking-wide capitalize transition-all duration-300 ease-in-out bg-white hover:bg-gray-200" href="#">

                        <div class="w-10 h-10 mr-3 overflow-hidden bg-gray-100 border border-gray-300 rounded-full">
                            <img class="object-cover w-full h-full" src="img/user2.jpg" alt="">
                        </div>

                        <div class="flex flex-1 flex-rowbg-green-100">
                            <div class="flex-1">
                                <h1 class="text-sm font-semibold">sull goldmen</h1>
                                <p class="text-xs text-gray-500">for sure</p>
                            </div>
                            <div class="text-xs text-right text-gray-500">
                                <p>1 day ago</p>
                            </div>
                        </div>

                    </a>
                    <hr>
                    <!-- end item -->

                    <!-- item -->
                    <a class="flex flex-row items-center justify-start block px-4 py-4 text-sm font-medium tracking-wide capitalize transition-all duration-300 ease-in-out bg-white hover:bg-gray-200" href="#">

                        <div class="w-10 h-10 mr-3 overflow-hidden bg-gray-100 border border-gray-300 rounded-full">
                            <img class="object-cover w-full h-full" src="img/user3.jpg" alt="">
                        </div>

                        <div class="flex flex-1 flex-rowbg-green-100">
                            <div class="flex-1">
                                <h1 class="text-sm font-semibold">mick</h1>
                                <p class="text-xs text-gray-500">is typing ....</p>
                            </div>
                            <div class="text-xs text-right text-gray-500">
                                <p>31 feb</p>
                            </div>
                        </div>

                    </a>
                    <!-- end item -->


                    <!-- end body -->

                    <!-- bottom -->
                    <hr>
                    <div class="px-4 py-2 mt-2">
                        <a href="#" class="block p-1 text-xs text-center uppercase transition-all duration-500 ease-in-out border border-gray-300 rounded hover:text-green-500">
                            view all
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