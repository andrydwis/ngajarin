<div>
    <!-- form accept -->
    <div x-cloak x-show.transition.duration.300ms.opacity="isOpen" class="fixed inset-0 z-50 flex items-center justify-center w-full h-full">

        <!-- overlay -->
        <div class="absolute z-10 w-full h-full bg-gray-900 opacity-50">
        </div>
        <!-- overlay -->

        <div class="fixed z-20 flex flex-col w-5/6 mx-auto mt-10 bg-white border rounded-lg lg:w-2/6 md:w-1/2 md:mt-0 card">

            <div>
                <!-- body -->
                <div class="flex items-center justify-between card-header">
                    <h6 class="h6">Form Pengajuan Mentor</h6>
                    <button class="focus:outline-none">
                        <i class="text-gray-400 fas fa-times hover:text-gray-600" @click="isOpen = !isOpen"></i>
                    </button>
                </div>
                <div class="card-body">

                    <div class="grid gap-6">
                        <div>
                            <label for="alasan">Keterangan</label>
                            <textarea disabled name="alasan" id="alasan" rows="5" class="block w-full py-2 mt-2 form-input">{{$reason}}
                            </textarea>
                        </div>


                        <div>
                            <span>Detail Pencapaian : </span>
                            <a href="#" class="underline text-primary hover:opacity-75">
                                link
                            </a>
                        </div>

                        <div class="flex justify-end">
                            <button class="mr-0 text-base border-none btn btn-outline-primary" @click.prevent="isOpen = !isOpen">Batal</button>
                            <form action="{{$actionAccept}}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-primary md:text-base">Terima</button>
                            </form>
                        </div>

                    </div>

                </div>

                <!-- body -->
            </div>
        </div>
    </div>


    <!-- form reject -->
    <div x-cloak x-show.transition.duration.300ms.opacity="isOpen1" class="fixed inset-0 z-50 flex items-center justify-center w-full h-full">

        <!-- overlay -->
        <div class="absolute z-10 w-full h-full bg-gray-900 opacity-50">
        </div>
        <!-- overlay -->

        <div class="fixed z-20 flex flex-col w-5/6 mx-auto mt-10 bg-white border rounded-lg lg:w-2/6 md:w-1/2 md:mt-0 card">

            <div>
                <!-- body -->
                <div class="flex items-center justify-between card-header">
                    <h6 class="h6">Detail Penolakan Mentor</h6>
                    <button class="focus:outline-none">
                        <i class="text-gray-400 fas fa-times hover:text-gray-600" @click="isOpen1 = !isOpen1"></i>
                    </button>
                </div>
                <div class="card-body">
                    <form action="{{$actionReject}}" method="post">
                        @csrf
                        @method('DELETE')
                        <div class="grid gap-6">
                            <div>
                                <label for="alasan">Alasan Penolakan</label>
                                <textarea name="alasan" id="alasan" rows="5" placeholder="alasan penolakan mentor" class="form-input py-2 mt-2 block w-full @error('alasan') is-invalid @enderror" value="{{old('alasan')}}"></textarea>

                                @error('alasan')
                                <div class="alert alert-error">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>

                            <div class="flex justify-end">
                                <button class="mr-0 text-base border-none btn btn-outline-primary" @click.prevent="isOpen1 = !isOpen1">Batal</button>
                                <button type="submit" class="btn btn-danger md:text-base">Kirim</button>
                            </div>

                        </div>
                    </form>
                </div>

                <!-- body -->
            </div>
        </div>
    </div>
</div>