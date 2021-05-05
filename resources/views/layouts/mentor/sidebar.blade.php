    <!-- start sidebar -->
    <div x-data="{isOpen4 : true}">
        <button @click="isOpen4 = !isOpen4" class="fixed z-30 inline-block duration-300 bg-gray-600 rounded-full lg:hidden left-5 w-14 h-14 hover:bg-blue-400 bottom-5">
            <i class="text-white fas fa-chevron-right"></i>
        </button>

        <div :class="{'hidden' : isOpen4}" @click.away="isOpen4 = !isOpen4" id="sideBar" class="fixed top-0 left-0 z-50 flex-col flex-wrap flex-none w-64 min-h-full max-h-[100vh] px-6 mt-0 overflow-auto bg-white border-r border-gray-200 md:z-20 lg:relative md:pt-4 md:top-12 lg:flex">

            <!-- sidebar content -->
            <div class="flex flex-col pt-2 md:pt-7">

                <!-- sidebar toggle -->
                <div class="block mb-4 text-right lg:hidden">
                    <button @click="isOpen4 = !isOpen4">
                        <i class="text-lg fas fa-times-circle"></i>
                    </button>
                </div>
                <!-- end sidebar toggle -->

                <p class="mb-3 text-sm tracking-wider text-gray-600 uppercase">Beranda</p>

                <a href="{{route('dashboard.mentor')}}" class="sidebar-item
                {{ Route::currentRouteNamed('dashboard.mentor') ? 'sidebar-item-active' : '' }}
                ">
                    <i class="ml-4 mr-2 text-sm fas fa-chart-pie"></i>
                    Dashboard
                </a>

                <a href="{{route('user.post.index')}}" class="sidebar-item
                {{ Route::currentRouteNamed('user.post.index') ? 'sidebar-item-active' : '' }}
                ">
                    <i class="ml-4 mr-2 text-sm fas fa-comments"></i>
                    Forum Diskusi
                </a>

                <a href="{{route('user.chat.index')}}" class="sidebar-item
                {{ Route::currentRouteNamed('user.chat.index') ? 'sidebar-item-active' : '' }}
                ">
                    <i class="ml-4 mr-2 text-sm fas fa-comment-dots"></i>
                    Chat
                </a>

                <!-- pembatas link -->
                <p class="mt-4 mb-3 text-sm tracking-wider text-gray-600 uppercase">Course</p>


                <a href="{{route('mentor.course.index')}}" class="sidebar-item
                {{ Route::currentRouteNamed('mentor.course.index') ||
                    Route::currentRouteNamed('mentor.course.show') ||
                    Route::currentRouteNamed('mentor.course.edit') ||
                    Route::currentRouteNamed('mentor.course.episode.*') ||
                    Route::currentRouteNamed('mentor.course.submission.*')

                    ? 'sidebar-item-active' : '' }}
                ">
                    <i class="ml-4 mr-2 text-sm fas fa-folder"></i>
                    Course List
                </a>

                <a href="{{route('mentor.course.create')}}" class="sidebar-item
                {{ Route::currentRouteNamed('mentor.course.create') ? 'sidebar-item-active' : '' }}
                ">
                    <i class="ml-4 mr-2 text-base fas fa-folder-plus"></i>
                    Tambahkan Course
                </a>

                <!-- pembatas link -->
                <p class="mt-4 mb-3 text-sm tracking-wider text-gray-600 uppercase">Ruang Kelas</p>


                <a href="{{route('mentor.classroom.index')}}" class="sidebar-item
                {{ Route::currentRouteNamed('mentor.classroom.index') ||
                    Route::currentRouteNamed('mentor.classroom.edit') ||
                    Route::currentRouteNamed('mentor.classroom-member.*') ||
                    Route::currentRouteNamed('mentor.classroom-course.*')
                    ? 'sidebar-item-active' : '' }}
                ">
                    <i class="ml-4 mr-2 text-sm fas fa-folder"></i>
                    Daftar Ruang Kelas
                </a>

                <a href="{{route('mentor.classroom.create')}}" class="sidebar-item
                {{ Route::currentRouteNamed('mentor.classroom.create') ? 'sidebar-item-active' : '' }}
                ">
                    <i class="ml-4 mr-2 text-base fas fa-folder-plus"></i>
                    Tambahkan Ruang Kelas
                </a>

                <!-- pembatas link -->
                <p class="mt-4 mb-3 text-sm tracking-wider text-gray-600 uppercase">Tutoring</p>

                <a href="{{route('mentor.schedule.index')}}" class="sidebar-item
                {{ Route::currentRouteNamed('mentor.schedule.*')
                ? 'sidebar-item-active' : '' }}
                ">
                    <i class="ml-4 mr-2 text-base fas fa-calendar-day"></i>
                    Atur Jadwal
                </a>

                <a href="{{route('mentor.tutoring.index')}}" class="sidebar-item
                {{ Route::currentRouteNamed('mentor.tutoring.*') ? 'sidebar-item-active' : '' }}
                ">
                    <i class="ml-4 mr-2 text-sm fas fa-calendar-check"></i>
                    Permintaan Tutoring
                </a>


            </div>
            <!-- end sidebar content -->

        </div>
    </div>
    <!-- end sidbar -->