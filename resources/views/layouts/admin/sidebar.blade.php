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

                <a href="{{route('dashboard.admin')}}" class="sidebar-item 
                {{ Route::currentRouteNamed('dashboard.admin') ? 'sidebar-item-active ' : '' }}
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
                <!-- pembatas -->

                <!-- pembatas -->
                <p class="mt-4 mb-3 ml-2 text-sm tracking-wider text-gray-600 uppercase">Mahasiswa</p>

                <a href="{{route('admin.student-list.index')}}" class="sidebar-item 
                {{ Route::currentRouteNamed('admin.student-list.index') ? 'sidebar-item-active ' : '' }}
                ">
                    <i class="ml-4 mr-2 text-sm fas fa-user-friends"></i>
                    Mahasiswa List
                </a>
                <a href="{{route('admin.mentor-request.index')}}" class="sidebar-item 
                {{ Route::currentRouteNamed('admin.mentor-request.index') ? 'sidebar-item-active ' : '' }}
                ">
                    <i class="ml-4 mr-2 text-sm fas fa-user-plus"></i>
                    Mentor Request List
                </a>
                 <!-- pembatas -->

                <!-- pembatas -->
                <p class="mt-4 mb-3 ml-2 text-sm tracking-wider text-gray-600 uppercase">Mentor</p>

                <a href="{{route('admin.mentor-list.index')}}" class="sidebar-item 
                {{ Route::currentRouteNamed('admin.mentor-list.index') ? 'sidebar-item-active ' : '' }}
                ">
                    <i class="ml-4 mr-2 text-sm fas fa-user-friends"></i>
                    Mentor List
                </a>

                <a href="{{route('admin.mentor-list.create')}}" class="sidebar-item 
                {{ Route::currentRouteNamed('admin.mentor-list.create') ? 'sidebar-item-active ' : '' }}
                ">
                    <i class="ml-4 mr-2 text-sm fas fa-user-plus"></i>
                    Tambahkan Mentor
                </a>
                <!-- pembatas -->

                <!-- pembatas -->
                <p class="mt-4 mb-3 ml-2 text-sm tracking-wider text-gray-600 uppercase">Course</p>

                <a href="{{route('admin.tag.index')}}" class="sidebar-item 
                {{ Route::currentRouteNamed('admin.tag.index') ||
                    Route::currentRouteNamed('admin.tag.edit')
                     ? 'sidebar-item-active ' : '' }}
                ">
                    <i class="ml-4 mr-2 text-sm fas fa-tags"></i>
                    Tag List
                </a>

                <a href="{{route('admin.tag.create')}}" class="sidebar-item 
                {{ Route::currentRouteNamed('admin.tag.create') ? 'sidebar-item-active ' : '' }}
                ">
                    <i class="ml-4 mr-2 text-sm fas fa-tag"></i>
                    Tambahkan Tag
                </a>

                <a href="{{route('admin.course.index')}}" class="sidebar-item 
                {{ Route::currentRouteNamed('admin.course.index') ||
                    Route::currentRouteNamed('admin.course.edit') ||
                    Route::currentRouteNamed('admin.course.episode.*') ||
                    Route::currentRouteNamed('admin.course.submission.*') ||
                    Route::currentRouteNamed('admin.course.certificate.*')
                     ? 'sidebar-item-active ' : '' }}
                ">
                    <i class="ml-4 mr-2 text-sm fas fa-folder"></i>
                    Course List
                </a>


                <a href="{{route('admin.course.create')}}" class="sidebar-item 
                {{ Route::currentRouteNamed('admin.course.create') ? 'sidebar-item-active ' : '' }}
                ">
                    <i class="ml-4 mr-2 text-sm fas fa-folder-plus"></i>
                    Tambahkan Course
                </a>


                <!-- pembatas -->


            </div>
            <!-- end sidebar content -->

        </div>
    </div>
    <!-- end sidbar -->