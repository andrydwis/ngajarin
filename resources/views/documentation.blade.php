<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

    <style>
        body {
            font-family: 'Nunito';
        }
    </style>
</head>

<body>

    <main class="text-gray-700 mx-auto border">
        <section class="px-8 pt-20 mx-auto lg:px-4 text-center text-lg">
            <h1 class="text-4xl font-bold">Documentation</h1>
            <p>Penggunaan Class dan Component </p>
        </section>

        <!-- Button section -->
        <section class="container px-8 py-20 mx-auto lg:px-4 prose">
            <h2 class="text-center">Button</h2>
            <div class="block md:flex text-center lg:justify-center mt-5">
                <button class="btn btn-primary"> Primary </button>
                <button class="btn btn-success">
                    <svg class="w-6 h-6 inline-block" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    success
                </button>
                <button class="btn btn-warning">
                    <svg class="w-6 h-6 inline-block" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    warning </button>
                <button class="btn btn-danger">
                    <svg class="w-6 h-6 inline-block" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    danger </button>
            </div>

            <div class="block md:flex text-center lg:justify-center mt-5">
                <button class="btn btn-outline-primary"> Primary </button>
                <button class="btn btn-outline-success"> Success </button>
                <button class="btn btn-outline-warning"> Warning </button>
                <button class="btn btn-outline-danger">
                    <svg class="w-6 h-6 inline-block" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                    </svg>
                    Danger </button>
            </div>

            <div class="text-center mt-16">
                <h3>Normal Button : </h3>
                <div class="grid flex-wrap lg:justify-center mt-5">
                    <code class="prettyprint text-left ">
                        {{$button1}}
                    </code>
                    <h4>Hasil : </h4>
                    <div class="flex flex-wrap mx-auto">
                        <button class="btn btn-primary"> Primary </button>
                        <button class="btn btn-success"> success </button>
                        <button class="btn btn-warning"> warning </button>
                    </div>
                </div>
            </div>

            <div class="text-center mt-16">
                <h3>Button With Icon : </h3>
                <div class="flex md:grid flex-wrap lg:justify-center mt-5">
                    <code class="prettyprint">
                        {{$button2}}
                    </code>
                    <h4>contoh isi link svg : </h4>
                    <code class="prettyprint flex flex-wrap md:block">
                        {{$svgNote}}
                        <br>
                        {{$svg}}
                    </code>
                    <div class="mx-auto">
                        <h4>Hasil : </h4>

                        <button class="btn btn-success">
                            <svg class="w-6 h-6 inline-block" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            success
                        </button>

                    </div>
                </div>

                <div class="text-center mt-16">
                    <h3>Outlined Button : </h3>
                    <div class="flex md:grid flex-wrap lg:justify-center mt-5">
                        <code class="prettyprint">
                            {{$button3}}
                        </code>
                        <h4>Hasil : </h4>
                        <div class="flex flex-wrap mx-auto">
                            <button class="btn btn-outline-primary"> Masuk </button>
                            <button class="btn btn-outline-success"> Konfirmasi </button>
                            <button class="btn btn-outline-warning"> Edit </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Card Section -->
        <section class="container px-8 py-10 md:py-20 mx-auto lg:px-4">
            <div class="prose mx-auto">
                <h2 class="text-center">Course Card</h2>
            </div>

            <div class="flex flex-wrap -m-4 justify-center mt-5">
                @for ($i = 0; $i < 2; $i++) <div class="p-4 md:w-1/3">
                    <div class="h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden">
                        <img class="lg:h-48 md:h-36 w-full object-cover object-center" src="https://blog.chrish.me/wp-content/uploads/2020/05/laravelbg.png" alt="blog">

                        <div class="p-6">
                            <h2 class="tracking-widest text-xs font-semibold text-gray-400 mb-1">TAG/KATEGORI</h2>

                            <h1 class="text-lg font-semibold text-gray-900 mb-3">Laravel Fundamental</h1>
                            <p class="leading-relaxed mb-3 prose-sm md:prose">Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto, ut. Sed corrupti rem sapiente quasi, id tempore. Alias sapiente velit et laudantium atque facere iste ullam maiores totam, molestiae reiciendis!</p>
                            <div class="flex flex-wrap">
                                <a href="#" class="text-blue-500 inline-flex items-center md:mb-2 lg:mb-0 hover:text-blue-800 duration-200">
                                    Ambil Kursus
                                    <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M5 12h14"></path>
                                        <path d="M12 5l7 7-7 7"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
            </div>
            @endfor
            </div>
            <div class="prose mx-auto text-center mt-5">
                <h3>Penggunaan : </h3>
                <br>
                <code class="prettyprint mt-10">
                    // otw di update
                </code>
            </div>
        </section>
    </main>



    <!-- syntax highlight buat tag code -->
    <script src="https://cdn.jsdelivr.net/gh/google/code-prettify@master/loader/run_prettify.js?skin=doxy"></script>

</body>

</html>