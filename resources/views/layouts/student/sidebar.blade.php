    <!-- start sidebar -->
    <div x-data="{isOpen4 : true}">
        <button @click="isOpen4 = !isOpen4" class="fixed z-30 inline-block duration-300 bg-gray-600 rounded-full lg:hidden left-5 w-14 h-14 hover:bg-blue-400 bottom-5">
            <i class="text-white fas fa-chevron-right"></i>
        </button>

        <div :class="{'hidden' : isOpen4}" @click.away="isOpen4 = !isOpen4" id="sideBar" class="fixed top-0 left-0 z-50 flex-col flex-wrap flex-none w-64 min-h-full p-6 mt-0 bg-white border-r border-gray-200 md:z-20 lg:relative md:pt-4 md:top-12 lg:flex">

            <!-- sidebar content -->
            <div class="flex flex-col pt-7">

                <!-- sidebar toggle -->
                <div class="block mb-4 text-right lg:hidden">
                    <button @click="isOpen4 = !isOpen4">
                        <i class="text-lg fas fa-times-circle"></i>
                    </button>
                </div>
                <!-- end sidebar toggle -->


                <!-- pembatas -->
                <p class="mb-3 ml-2 text-sm tracking-wider text-gray-600 uppercase">Beranda</p>

                <a href="{{route('dashboard.student')}}" class="sidebar-item 
                {{ Route::currentRouteNamed('dashboard.student') ? 'sidebar-item-active ' : '' }}
                ">
                    <i class="ml-4 mr-2 text-sm fas fa-chart-pie"></i>
                    Dashboard
                </a>
                <!-- pembatas -->


                <!-- pembatas -->
                <!-- <p class="mt-4 mb-3 ml-2 text-sm tracking-wider text-gray-600 uppercase">Mentor</p> -->

                <a href="{{route('student.classroom.index')}}" class="sidebar-item mt-2 
                {{ Route::currentRouteNamed('student.classroom*') ? 'sidebar-item-active ' : '' }}
                ">
                    <i class="ml-4 mr-2 text-sm fas fa-user-friends"></i>
                    Kelas
                </a>

                <a href="{{route('student.course-list.index')}}" class="sidebar-item my-2
                {{ Route::currentRouteNamed('student.course-list*') ? 'sidebar-item-active ' : '' }}
                ">
                    <i class="ml-4 mr-2 text-sm fas fa-folder"></i>
                    Course Saya
                </a>

                <a href="{{route('student.course.index')}}" class="sidebar-item 
                {{ Route::currentRouteNamed('student.course.index') ? 'sidebar-item-active ' : '' }}
                ">
                    <i class="ml-4 mr-2 text-sm fas fa-folder-plus"></i>
                    Daftar Course
                </a>
                <!-- pembatas -->

            </div>
            <!-- end sidebar content -->

        </div>
    </div>
    <!-- end sidbar -->