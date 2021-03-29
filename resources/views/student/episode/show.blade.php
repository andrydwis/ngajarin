@extends('layouts.student.app-new')
@section('content')
<section class="bg-gray-100">

    <div class="w-full shadow-lg bg-gradient-to-b from-primary to-primary-lighter">
        <div class="flex items-center mx-auto">
            <div class="w-full h-[75vh]">
                <iframe class="w-full h-full mx-auto" src="https://www.youtube.com/embed/J0Wy359NJPM" frameborder="0" allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 gap-5 px-5 pt-10 pb-20 space lg:gap-10 lg:px-20 md:grid-cols-3">

        <div class="mb-5 md:col-span-2">
            <div class="shadow-xl card">
                <div class="card-header">
                    <h6 class="h6">Deskripsi</h6>
                </div>

                <div class="prose card-body">
                    <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam accusantium quasi accusamus quibusdam architecto tempora exercitationem eos cumque nostrum. Impedit dolorum earum, ipsum quos nisi perferendis temporibus asperiores amet ex.
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Est qui impedit voluptatem. Enim temporibus earum tenetur autem excepturi. Maiores odio aut ab vel ratione culpa. Saepe voluptas totam dignissimos quo!
                    </p>

                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat, optio harum. Dolores error, reiciendis quam debitis fuga non aspernatur ipsa ex illo. Officiis totam reprehenderit eligendi ad excepturi voluptatum magni! Lorem ipsum dolor, sit amet consectetur adipisicing elit. Incidunt magni adipisci voluptatum ullam animi, velit nulla numquam, cum voluptatibus recusandae autem natus quos id. Ad soluta explicabo ipsam placeat accusantium.
                    </p>

                </div>

            </div>

            <div class="mt-10 shadow-xl card">
                <div class="card-header">
                    <h6 class="h6">Lampiran</h6>
                </div>

                <div class="flex justify-center mx-auto prose card-body">
                    
                        <button>
                            <div class="grid w-56 h-40 text-gray-600 bg-gray-100 border-2 border-gray-200 hover:bg-gray-50 place-items-center hover:text-gray-400 ">
                                <div class="grid gap-1">
                                    <i class="text-4xl fas fa-file"></i>
                                    <span class="text-sm text-gray-400">Klik untuk mengunduh</span>
                                </div>
                            </div>
                        </button>
                    
                </div>

            </div>
        </div>



        <div class="md:col-span-1">
            <div class="shadow-xl card">
                <div class="card-header">
                    <h6 class="h6">List Episode</h6>
                </div>

                <div class="prose card-body">
                    <ol>
                        <li>Pengenalan</li>
                        <li>Pengenalan</li>
                        <li>Pengenalan</li>
                        <li>Pengenalan</li>
                    </ol>

                </div>

            </div>

            <div class="mt-10 shadow-xl card">
                <div class="card-header">
                    <h6 class="h6">List Submission</h6>
                </div>
                <div class="prose card-body">

                    <ol>
                        <li>Pengenalan</li>
                        <li>Pengenalan</li>
                        <li>Pengenalan</li>
                        <li>Pengenalan</li>
                    </ol>

                </div>
            </div>
        </div>
    </div>


</section>
@endsection

@section('customCSS')
@endsection

@section('customJS')

@endsection