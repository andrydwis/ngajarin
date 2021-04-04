<div x-cloak x-show.transition.duration.300ms.opacity="isOpen" class="fixed inset-0 z-50 flex items-center justify-center w-full h-full">

    <!-- overlay -->
    <div class="absolute z-10 w-full h-full bg-gray-900 opacity-50">
    </div>
    <!-- overlay -->

    <div class="fixed z-20 flex flex-col w-full mx-auto mt-10 bg-white border rounded-lg lg:w-2/6 md:w-1/2 md:ml-auto md:mt-0">

        <div>
            <!-- body -->
            <div class="flex items-center justify-between card-header">
                <h6 class="h6">Review Submission</h6>
                <button class="focus:outline-none">
                    <i class="text-gray-400 fas fa-times hover:text-gray-600" @click="isOpen = !isOpen"></i>
                </button>
            </div>
            <div class="card-body">
                <form action="{{ $action }}" method="post">
                    @csrf
                    <div class="grid gap-6">
                        <div>
                            <label for="score">Nilai</label>
                            <input type="number" name="score" id="score" placeholder="Nilai Submission" class="form-input py-2 mt-2 block w-full @error('score') is-invalid @enderror" value="{{old('score')}}">
                            @error('score')
                            <div class="alert alert-error">
                                {{$message}}
                            </div>
                            @enderror
                        </div>

                        <div>
                            <label for="feedback">Feedback</label>
                            <textarea name="feedback" id="feedback" rows="5" placeholder="Feedback" class="form-input py-2 mt-2 block w-full @error('feedback') is-invalid @enderror" value="{{old('feedback')}}"></textarea>
                            @error('feedback')
                            <div class="alert alert-error">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div>
                            <label for="status">Status</label>
                            <select name="status" id="status" class="form-select py-2 mt-2 block w-full @error('status') is-invalid @enderror"">
                                                                <option value="" selected disabled>Pilih Status</option>
                                                                <option value=" diterima">Diterima</option>
                                <option value="ditolak">Ditolak</option>
                            </select>
                            @error('status')
                            <div class="alert alert-error">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="flex justify-end">
                            <button class="text-base border-none btn btn-outline-primary" @click.prevent="isOpen = !isOpen">Batal</button>
                            <button class="mx-0 text-base btn btn-primary" type="submit">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>

            <!-- body -->
        </div>
    </div>


</div>