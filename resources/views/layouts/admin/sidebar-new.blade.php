    <!-- start sidebar -->
    <div x-data="{isOpen4 : true}">
        <button @click="isOpen4 = !isOpen4" class="fixed z-30 inline-block duration-300 bg-gray-600 rounded-full lg:hidden left-5 w-14 h-14 hover:bg-blue-400 bottom-5">
            <i class="text-white fas fa-chevron-right"></i>
        </button>

        <div :class="{'hidden' : isOpen4}" @click.away="isOpen4 = !isOpen4" id="sideBar" class="fixed top-0 left-0 z-40 flex-col flex-wrap flex-none w-64 h-screen p-6 mt-0 bg-white border-r border-gray-200 lg:relative md:pt-4 md:top-12 lg:flex">

            <!-- sidebar content -->
            <div class="flex flex-col pt-7">

                <!-- sidebar toggle -->
                <div class="block mb-4 text-right lg:hidden">
                    <button @click="isOpen4 = !isOpen4">
                        <i class="text-lg fad fa-times-circle"></i>
                    </button>
                </div>
                <!-- end sidebar toggle -->

                <p class="mb-4 text-xs tracking-wider text-gray-600 uppercase">homes</p>

                <!-- link -->
                <a href="./index.html" class="mb-3 text-sm font-medium capitalize transition duration-500 ease-in-out hover:text-green-600">
                    <i class="mr-2 text-xs fad fa-chart-pie"></i>
                    Dashboard
                </a>
                <!-- end link -->

                <p class="mt-4 mb-4 text-xs tracking-wider text-gray-600 uppercase">apps</p>

                <!-- link -->
                <a href="./email.html" class="mb-3 text-sm font-medium capitalize transition duration-500 ease-in-out hover:text-green-600">
                    <i class="mr-2 text-xs fad fa-envelope-open-text"></i>
                    Menu
                </a>
                <!-- end link -->

                <p class="mt-4 mb-4 text-xs tracking-wider text-gray-600 uppercase">UI Elements</p>

                <!-- link -->
                <a href="./typography.html" class="mb-3 text-sm font-medium capitalize transition duration-500 ease-in-out hover:text-green-600">
                    <i class="mr-2 text-xs fad fa-text"></i>
                    Menu
                </a>
                <!-- end link -->

                <!-- link -->
                <a href="./alert.html" class="mb-3 text-sm font-medium capitalize transition duration-500 ease-in-out hover:text-green-600">
                    <i class="mr-2 text-xs fad fa-whistle"></i>
                    Menu
                </a>
                <!-- end link -->


                <!-- link -->
                <a href="./buttons.html" class="mb-3 text-sm font-medium capitalize transition duration-500 ease-in-out hover:text-green-600">
                    <i class="mr-2 text-xs fad fa-cricket"></i>
                    Menu
                </a>
                <!-- end link -->

            </div>
            <!-- end sidebar content -->

        </div>
    </div>
    <!-- end sidbar -->