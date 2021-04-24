<div>
    <form action="{{route('student.tutoring.store', ['user' => $user->id])}}" method="POST">
        @csrf
        <div class="flex flex-wrap items-center gap-2">
            <div class="w-full md:flex-1" x-data="{ isOpen : false }">
                <label>Tanggal</label>
                <div class="flex gap-2">
                    <button class="m-0 form-input md:text-base " @click="isOpen = true" type="button">
                        <i class="text-xs leading-none fas fa-chevron-down"></i>
                    </button>
                    <input type="date" name="tanggal" class="w-full cursor-not-allowed form-input" value="{{old('tanggal') ?? $date_selected ?? ''}}" readonly>
                </div>
                <div x-cloak x-show.transition.origin.top="isOpen" @click.away="isOpen = false" class="w-full py-2 text-right text-gray-500 bg-white rounded shadow-md md:text-left md:absolute md:w-52">
                    @foreach($dates as $date => $id)
                    <!-- item -->
                    <button class="block px-4 py-2 text-sm font-medium tracking-wide capitalize transition-all duration-300 ease-in-out bg-white hover:bg-gray-200 hover:text-gray-900" wire:click="getSchedule('{{ $date }}', {{ $id }})" type="button">
                        {{\Carbon\Carbon::parse($date)->isoFormat('dddd, D MMMM Y')}}
                    </button>
                    <!-- end item -->
                    @endforeach
                    <hr>
                </div>
            </div>
            <div class="flex flex-wrap gap-2 xs:flex-nowrap md:flex-1">
                <div class="w-1/2">
                    <label for="jam_mulai">jam mulai</label>
                    <input type="time" class="block w-full disabled:cursor-not-allowed form-input" name="jam_mulai" min="{{ $min ?? '' }}" max="{{ $max ?? '' }}" value="{{old('jam_mulai')}}" @if(!$min){{'disabled'}}@endif>
                </div>

                <div class="w-1/2">
                    <label for="jam_akhir">jam akhir</label>
                    <input type="time" class="block w-full disabled:cursor-not-allowed form-input" name="jam_akhir" min="{{ $min ?? '' }}" max="{{ $max ?? '' }}" value="{{old('jam_akhir')}}" @if(!$min){{'disabled'}}@endif>
                </div>
            </div>
        </div>
        <div class="w-full">
            <label for="detail">Detail</label>
            <textarea name="detail" class="block w-full form-textarea" placeholder="Tulis detail tambahan untuk mentor">{{old('detail')}}</textarea>
        </div>
        <div class="flex justify-end w-full">
            <button type="submit" class="mt-0 btn btn-primary md:text-sm">Kirim</button>
        </div>
    </form>
</div>