<!-- footer -->
<footer class="w-full text-gray-100 @if(Route::currentRouteNamed('dashboard.student')) bg-gray-700 @else bg-primary @endif">
    <div class="container flex flex-col items-center px-8 py-8 mx-auto max-w-7xl md:flex-row">
        <a href="#_" class="text-xl font-black leading-none text-gray-200 select-none">
            Ngajar<span class="text-white">.in</span>
        </a>
        <p class="mt-4 text-sm text-center text-gray-100 sm:ml-4 sm:pl-4 sm:border-l sm:border-gray-200 sm:mt-0 md:text-left">
            ©2021 - Ngajarin <br> Andry Dwi S. | Muhammad Ihya F. B.
        </p>
        <span class="inline-flex flex-wrap justify-center mt-4 space-x-5 sm:ml-auto sm:mt-0 sm:justify-start">

            <a href="{{ route('verify-certificate.index') }}" class="text-gray-200 hover:text-gray-500">
                <span class="">Validasi Sertifikat</span>
            </a>

        </span>
    </div>
</footer>
<!-- footer -->