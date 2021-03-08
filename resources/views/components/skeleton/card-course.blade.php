<div class="w-full px-2 py-4 report-card md:w-1/2 2xl:w-1/3">
    <div class="h-full px-5 pt-8 pb-5 bg-white border border-gray-200 rounded-md shadow card ">
        <!-- card -->
        <div class="flex flex-col">
            <!-- bagian atas -->
            <div class="flex justify-end text-gray-400 " x-data="{detailOpen : false}">
                <button @click="detailOpen = true" class="focus:outline-none hover:text-gray-800">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z"></path>
                    </svg>
                </button>


            </div>
            <div class="flex flex-col items-center md:flex-row md:items-start">
                <div>
                    <img class="w-20 h-20 bg-gray-300 rounded-full animate-pulse" />
                </div>
                <div class="flex flex-col items-start pl-5">

                    <h3 class="text-xl font-semibold text-gray-300 bg-gray-300 animate-pulse">
                        <a href="#"> $title </a>
                    </h3>

                    <span class="text-sm text-gray-300 bg-gray-300 animate-pulse"> $level </span>
                    <div class="flex flex-wrap gap-1 mt-1">

                        <span class="px-2 py-1 text-xs tracking-tight text-gray-300 bg-gray-300 animate-pulse"> $tag->name </span>

                    </div>
                </div>
            </div>
            <!-- end of bagian atas -->

            <!-- bagian bawah -->
            <div class="flex pt-5">

                <!-- kiri -->

                <div class="flex items-center justify-center flex-1 gap-1 px-1 text-gray-700 border-r-2 md:-ml-6 hover:text-indigo-600">
                    <!-- link masih disabled -->

                    <a href="#">
                        <div class="mr-2 ">
                            <i class="text-4xl text-gray-300 bg-gray-300 md:text-5xl fab fa-youtube animate-pulse"></i>
                        </div>
                    </a>

                    <div class="flex flex-col items-start">
                        <h3 class="text-xl font-bold text-gray-300 bg-gray-300 md:text-2xl animate-pulse">$episodes</h3>
                        <span class="text-xs tracking-tight text-gray-300 bg-gray-300 animate-pulse md:text-sm"><span class="hidden sm:inline">Total</span> Episode</span>
                    </div>

                </div>


                <!-- kanan -->
                <div class="flex items-center justify-center flex-1 gap-1 px-1 text-gray-700 hover:text-indigo-600">

                    <a href="#">
                        <div class="mr-2 ">
                            <i class="text-4xl text-gray-300 bg-gray-300 animate-pulse fas fa-clipboard"></i>
                        </div>
                    </a>

                    <div class="flex flex-col items-start">
                        <h3 class="text-xl font-bold bg-gray-300 md:text-2xl lg:text-gray-300 animate-pulse"> $submission </h3>
                        <span class="text-xs tracking-tight text-gray-300 bg-gray-300 animate-pulse md:text-sm"> Submission</span>
                    </div>
                </div>

            </div>
            <!-- end of bagian bawah -->
        </div>
        <!-- end of card -->
    </div>
</div>