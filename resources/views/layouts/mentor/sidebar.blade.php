    <!-- start sidebar -->
    <div x-data="{isOpen4 : true}">
        <button @click="isOpen4 = !isOpen4" class="fixed z-30 inline-block duration-300 bg-gray-600 rounded-full lg:hidden left-5 w-14 h-14 hover:bg-blue-400 bottom-5">
            <i class="text-white fas fa-chevron-right"></i>
        </button>

        <div :class="{'hidden' : isOpen4}" @click.away="isOpen4 = !isOpen4" id="sideBar" class="fixed top-0 left-0 z-40 flex-col flex-wrap flex-none w-64 h-full p-6 mt-0 bg-white border-r border-gray-200 lg:relative md:pt-4 md:top-12 lg:flex">

            <!-- sidebar content -->
            <div class="flex flex-col pt-7">

                <!-- sidebar toggle -->
                <div class="block mb-4 text-right lg:hidden">
                    <button @click="isOpen4 = !isOpen4">
                        <i class="text-lg fad fa-times-circle"></i>
                    </button>
                </div>
                <!-- end sidebar toggle -->

                <p class="mb-3 text-sm tracking-wider text-gray-600 uppercase">Beranda</p>


                <a href="/dashboard" class="mb-3 text-sm font-medium capitalize transition duration-200 ease-in-out hover:text-green-600
                {{ Route::currentRouteNamed('dashboard') ? 'text-green-600' : '' }}
                ">
                    <i class="mr-2 text-sm fad fa-chart-pie"></i>
                    Dashboard
                </a>

                <!-- pembatas link -->
                <!-- <p class="mt-4 mb-3 text-sm tracking-wider text-gray-600 uppercase">Mentor</p>

                <a href="/admin/mentor-list" class="mb-3 text-sm font-medium capitalize transition duration-200 ease-in-out hover:text-green-600
                {{ Route::currentRouteNamed('admin.mentor-list.index') ? 'text-green-600' : '' }}
                ">
                    <i class="mr-2 text-sm fad fa-user-friends"></i>
                    Mentor List
                </a>

                <a href="/admin/mentor-list/create" class="mb-3 text-sm font-medium capitalize transition duration-200 ease-in-out hover:text-green-600
                {{ Route::currentRouteNamed('admin.mentor-list.create') ? 'text-green-600' : '' }}
                ">
                    <i class="mr-2 text-sm fad fa-user-plus"></i>
                    Tambahkan Mentor
                </a>

                <!-- pembatas link -->
                <p class="mt-4 mb-3 text-sm tracking-wider text-gray-600 uppercase">Course</p>

                <a href="/admin/tag" class="mb-3 text-sm font-medium capitalize transition duration-200 ease-in-out hover:text-green-600
                {{ Route::currentRouteNamed('admin.tag.index') ||
                     Route::currentRouteNamed('admin.tag.create') ||
                     Route::currentRouteNamed('admin.tag.edit')
                     ? 'text-green-600' : '' }}
                ">
                    <i class="mr-2 text-sm fad fa-tags"></i>
                    Tag List
                </a>

                <a href="/admin/course" class="mb-3 text-sm font-medium capitalize transition duration-200 ease-in-out hover:text-green-600
                {{ Route::currentRouteNamed('admin.course.index') ? 'text-green-600' : '' }}
                ">
                    <i class="mr-2 text-sm fad fa-folders"></i>
                    Course List
                </a>

                <a href="/admin/course/create" class="mb-3 text-sm font-medium capitalize transition duration-200 ease-in-out hover:text-green-600
                {{ Route::currentRouteNamed('admin.course.create') ? 'text-green-600' : '' }}
                ">
                    <i class="mr-2 text-base fad fa-folder-plus"></i>
                    Tambahkan Course
                </a>

            </div> -->
            <!-- end sidebar content -->

        </div>
    </div>
    <!-- end sidbar -->