@extends('layouts.student.app')
@section('content')

<!-- strat content -->
<div class="flex-1 p-6 mt-20 bg-gray-100">


    <!-- General Report -->
    <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-4 md:grid-flow-col">


        <!-- card -->
        <div class="report-card">
            <div class="card">
                <div class="grid flex-col md:flex card-body">

                    <!-- top -->
                    <div class="flex flex-row items-center justify-between">
                        <div class="text-primary h6 fas fa-clipboard-list"></div>
                        <span class="text-xs text-white bg-green-400 rounded-full badge">
                            12%
                            <i class="ml-1 fas fa-chevron-up"></i>
                        </span>
                    </div>
                    <!-- end top -->

                    <!-- bottom -->
                    <div class="mt-8">
                        <h1 class="h5 ">21</h1>
                        <p>Submission Dikumpulkan</p>
                    </div>
                    <!-- end bottom -->

                </div>
            </div>
            <div class="p-1 mx-4 bg-white border border-t-0 rounded rounded-t-none footer"></div>
        </div>
        <!-- end card -->


        <!-- card -->
        <div class="report-card">
            <div class="card">
                <div class="flex flex-col card-body">

                    <!-- top -->
                    <div class="flex flex-row items-center justify-between">
                        <div class="text-warning-darker h6 fas fa-comments"></div>
                        <span class="text-xs text-white bg-red-400 rounded-full badge">
                            6%
                            <i class="ml-1 fas fa-chevron-down"></i>
                        </span>
                    </div>
                    <!-- end top -->

                    <!-- bottom -->
                    <div class="mt-8">
                        <h1 class="h5 ">182</h1>
                        <p>Thread Diskusi</p>
                    </div>
                    <!-- end bottom -->

                </div>
            </div>
            <div class="p-1 mx-4 bg-white border border-t-0 rounded rounded-t-none footer"></div>
        </div>
        <!-- end card -->


        <!-- card -->
        <div class="report-card">
            <div class="card">
                <div class="flex flex-col card-body">

                    <!-- top -->
                    <div class="flex flex-row items-center justify-between">
                        <div class="text-primary-lighter h6 fas fa-users"></div>
                        <span class="text-xs text-white bg-green-400 rounded-full badge">
                            72%
                            <i class="ml-1 fas fa-chevron-up"></i>
                        </span>
                    </div>
                    <!-- end top -->

                    <!-- bottom -->
                    <div class="mt-8">
                        <h1 class="h5 ">25</h1>
                        <p>Dosen Terdaftar</p>
                    </div>
                    <!-- end bottom -->

                </div>
            </div>
            <div class="p-1 mx-4 bg-white border border-t-0 rounded rounded-t-none footer"></div>
        </div>
        <!-- end card -->


        <!-- card -->
        <div class="report-card">
            <div class="card">
                <div class="flex flex-col card-body">

                    <!-- top -->
                    <div class="flex flex-row items-center justify-between">
                        <div class="text-success-lighter h6 fas fa-users"></div>
                        <span class="text-xs text-white bg-green-400 rounded-full badge">
                            150%
                            <i class="ml-1 fas fa-chevron-up"></i>
                        </span>
                    </div>
                    <!-- end top -->

                    <!-- bottom -->
                    <div class="mt-8">
                        <h1 class="h5 ">124</h1>
                        <p>Mahasiswa Terdaftar</p>
                    </div>
                    <!-- end bottom -->

                </div>
            </div>
            <div class="p-1 mx-4 bg-white border border-t-0 rounded rounded-t-none footer"></div>
        </div>
        <!-- end card -->


    </div>
    <!-- End General Report -->

    <!-- strat Analytics -->
    <div class="grid grid-cols-1 gap-6 mt-6 md:grid-cols-2 ">

        <!-- update section -->
        <div class="text-white duration-300 border-green-400 shadow-md bg-success-lighter hover:bg-success card">
            <div class="grid md:flex md:flex-row card-body">

                <!-- image -->
                <div class="items-center justify-center hidden w-40 h-40 md:flex img-wrapper">
                    <img src="{{url('/img/happy.svg')}}" alt="img title">
                </div>
                <!-- end image -->

                <!-- info -->
                <div class="py-2 ml-0 md:ml-10">
                    <h1 class="h6">Good Job, User!</h1>
                    <p class="text-xs text-white">Semua Submission telah anda koreksi dalam minggu ini!</p>

                    <ul class="mt-4">
                        <li class="text-xs font-light md:text-sm"><i class="mb-2 mr-2 fas fa-check-double"></i> Finish Dashboard Design</li>
                        <li class="text-xs font-light md:text-sm"><i class="mb-2 mr-2 fas fa-check-double"></i> Fix Issue #74</li>
                        <li class="text-xs font-light md:text-sm"><i class="mr-2 fas fa-check-double"></i> Publish version 1.0.6</li>
                    </ul>
                </div>
                <!-- end info -->

            </div>
        </div>
        <!-- end update section -->

        <!-- carts -->
        <div class="flex flex-col">

            <!-- alert -->
            <div class="mb-6 alert alert-dark">
                Tidak ada notifikasi
            </div>
            <!-- end alert -->

            <!-- charts -->
            <div class="grid h-full grid-cols-1 gap-6 md:grid-cols-2">

                <div class="card">
                    <div class="flex flex-row justify-between px-4 py-3">
                        <h1 class="h6">
                            <span >328</span>
                            <p>Kunjungan Situs</p>
                        </h1>

                        <div class="flex items-center justify-center w-10 h-10 text-green-700 bg-green-200 border border-green-300 rounded-full">
                            <i class="fas fa-eye"></i>
                        </div>
                    </div>
                    <div class="analytics_1"></div>
                </div>

                <div class="card">
                    <div class="flex flex-row justify-between px-4 py-3">
                        <h1 class="h6">
                            <span >210</span>
                            <p>Aktivitas Diskusi</p>
                        </h1>

                        <div class="flex items-center justify-center w-10 h-10 text-indigo-700 bg-indigo-200 border border-indigo-300 rounded-full">
                            <i class="fas fa-comments"></i>
                        </div>
                    </div>
                    <div class="analytics_1"></div>
                </div>

            </div>
            <!-- charts    -->

        </div>
        <!-- end charts -->


    </div>
    <!-- end Analytics -->

    <!-- Sales Overview -->
    <div class="mt-6 card">

        <!-- header -->
        <div class="flex flex-row justify-between card-header">
            <h1 class="h6">Sales Overview</h1>
        </div>
        <!-- end header -->

        <!-- body -->
        <div class="grid grid-cols-1 gap-6 md:grid-cols-2 card-body">

            <div class="p-1 md:p-8">
                <h1 class="h2">5,337</h1>
                <p class="font-medium text-black">Sales this month</p>

                <div class="flex items-center mt-20 mb-2">
                    <div class="px-3 py-1 mr-3 text-green-900 bg-green-200 rounded">
                        <i class="fa fa-caret-up"></i>
                    </div>
                    <p class="text-black"><span class="text-green-400 "></span><span class="text-green-400">% more sales</span> in comparison to last month.</p>
                </div>

                <div class="flex items-center">
                    <div class="px-3 py-1 mr-3 text-red-900 bg-red-200 rounded">
                        <i class="fa fa-caret-down"></i>
                    </div>
                    <p class="text-black"><span class="text-red-400 "></span><span class="text-red-400">% revenue per sale</span> in comparison to last month.</p>
                </div>

                <a href="#" class="mt-6 bg-green-500 btn-shadow">view details</a>

            </div>

            <div >
                <div id="sealsOverview"></div>
            </div>

        </div>
        <!-- end body -->

    </div>
    <!-- end Sales Overview -->

    <!-- start numbers -->
    <div class="grid grid-cols-2 gap-0 md:gap-6 sm:grid-cols-3 xl:grid-cols-5">

        <!-- card -->
        <div class="col-span-2 mt-6 sm:col-span-1 lg:col-span-1 card">
            <div class="flex items-center card-body">

                <div class="px-3 py-2 mr-3 text-white bg-indigo-600 rounded">
                    <i class="fas fa-wallet"></i>
                </div>

                <div class="flex flex-col">
                    <h1 class="font-semibold"><span ></span> Sales</h1>
                    <p class="text-xs"><span ></span> payments</p>
                </div>

            </div>
        </div>
        <!-- end card -->

        <!-- card -->
        <div class="col-span-2 mt-6 lg:col-span-1 sm:col-span-1 card">
            <div class="flex items-center card-body">

                <div class="px-3 py-2 mr-3 text-white bg-green-600 rounded">
                    <i class="fas fa-shopping-cart"></i>
                </div>

                <div class="flex flex-col">
                    <h1 class="font-semibold"><span ></span> Orders</h1>
                    <p class="text-xs"><span ></span> items</p>
                </div>

            </div>
        </div>
        <!-- end card -->

        <!-- card -->
        <div class="col-span-2 mt-6 lg:col-span-1 sm:col-span-1 card">
            <div class="flex items-center card-body">

                <div class="px-3 py-2 mr-3 text-white bg-yellow-600 rounded">
                    <i class="fas fa-blog"></i>
                </div>

                <div class="flex flex-col">
                    <h1 class="font-semibold"><span ></span> posts</h1>
                    <p class="text-xs"><span ></span> active</p>
                </div>

            </div>
        </div>
        <!-- end card -->

        <!-- card -->
        <div class="col-span-2 mt-6 lg:col-span-1 sm:col-span-1 card">
            <div class="flex items-center card-body">

                <div class="px-3 py-2 mr-3 text-white bg-red-600 rounded">
                    <i class="fas fa-comments"></i>
                </div>

                <div class="flex flex-col">
                    <h1 class="font-semibold"><span ></span> comments</h1>
                    <p class="text-xs"><span ></span> approved</p>
                </div>

            </div>
        </div>
        <!-- end card -->

        <!-- card -->
        <div class="col-span-2 mt-6 card lg:col-span-1 sm:col-span-1">
            <div class="flex items-center card-body">

                <div class="px-3 py-2 mr-3 text-white bg-pink-600 rounded">
                    <i class="fas fa-user"></i>
                </div>

                <div class="flex flex-col">
                    <h1 class="font-semibold"><span ></span> memebrs</h1>
                    <p class="text-xs"><span ></span> online</p>
                </div>

            </div>
        </div>
        <!-- end card -->

    </div>
    <!-- end nmbers -->

    <!-- start quick Info -->
    <div class="grid grid-cols-1 gap-6 mt-6 lg:grid-cols-3">


        <!-- Browser Stats -->
        <div class="card">
            <div class="card-header">Browser Stats</div>

            <!-- brawser -->
            <div class="flex flex-row items-center justify-between p-6 text-gray-600 border-b">
                <div class="flex items-center">
                    <i class="mr-4 fab fa-chrome"></i>
                    <h1>google chrome</h1>
                </div>
                <div>
                    <span ></span>%
                </div>
            </div>
            <!-- end brawser -->

            <!-- brawser -->
            <div class="flex flex-row items-center justify-between p-6 text-gray-600 border-b">
                <div class="flex items-center">
                    <i class="mr-4 fab fa-firefox"></i>
                    <h1>firefox</h1>
                </div>
                <div>
                    <span ></span>%
                </div>
            </div>
            <!-- end brawser -->

            <!-- brawser -->
            <div class="flex flex-row items-center justify-between p-6 text-gray-600 border-b">
                <div class="flex items-center">
                    <i class="mr-4 fab fa-internet-explorer"></i>
                    <h1>internet explorer</h1>
                </div>
                <div>
                    <span ></span>%
                </div>
            </div>
            <!-- end brawser -->

            <!-- brawser -->
            <div class="flex flex-row items-center justify-between p-6 text-gray-600 border-b-0">
                <div class="flex items-center">
                    <i class="mr-4 fab fa-safari"></i>
                    <h1>safari</h1>
                </div>
                <div>
                    <span ></span>%
                </div>
            </div>
            <!-- end brawser -->

        </div>
        <!-- end Browser Stats -->

        <!-- Start Recent Sales -->
        <div class="col-span-1 lg:col-span-2 card">
            <div class="card-header">Recent Sales</div>

            <table class="w-full text-left table-auto">
                <thead>
                    <tr>
                        <th class="px-1 py-2 text-sm border-r md:text-base md:px-4"></th>
                        <th class="px-1 py-2 text-sm border-r md:text-base md:px-4">product</th>
                        <th class="px-1 py-2 text-sm border-r md:text-base md:px-4">price</th>
                        <th class="px-1 py-2 text-sm md:text-base md:px-4">date</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600">

                    <tr>
                        <td class="px-1 py-2 text-xs text-center text-green-500 border border-l-0 md:text-base md:px-4"><i class="fas fa-circle"></i></td>
                        <td class="px-1 py-2 text-sm text-center border border-l-0 md:text-left md:text-base md:px-4">Lightning to USB-C Adapter Lightning.</td>
                        <td class="px-1 py-2 text-sm text-center border border-l-0 md:text-left md:text-base md:px-4">$<span ></span></td>
                        <td class="px-1 py-2 text-sm text-center border border-l-0 border-r-0 md:text-left md:text-base md:px-4"><span ></span> minutes ago</td>
                    </tr>
                    <tr>
                        <td class="px-1 py-2 text-xs text-center text-yellow-500 border border-l-0 md:text-base md:px-4"><i class="fas fa-circle"></i></td>
                        <td class="px-1 py-2 text-sm text-center border border-l-0 md:text-left md:text-base md:px-4">Apple iPhone 8.</td>
                        <td class="px-1 py-2 text-sm text-center border border-l-0 md:text-left md:text-base md:px-4">$<span ></span></td>
                        <td class="px-1 py-2 text-sm text-center border border-l-0 border-r-0 md:text-left md:text-base md:px-4"><span ></span> minutes ago</td>
                    </tr>
                    <tr>
                        <td class="px-1 py-2 text-xs text-center text-green-500 border border-l-0 md:text-base md:px-4"><i class="fas fa-circle"></i></td>
                        <td class="px-1 py-2 text-sm text-center border border-l-0 md:text-left md:text-base md:px-4">Apple MacBook Pro.</td>
                        <td class="px-1 py-2 text-sm text-center border border-l-0 md:text-left md:text-base md:px-4">$<span ></span></td>
                        <td class="px-1 py-2 text-sm text-center border border-l-0 border-r-0 md:text-left md:text-base md:px-4"><span ></span> minutes ago</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- End Recent Sales -->


    </div>
    <!-- end quick Info -->


</div>
<!-- end content -->

@endsection