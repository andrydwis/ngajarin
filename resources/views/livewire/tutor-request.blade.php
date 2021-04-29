<div>
    @if(!$schedule_now)
    <form action="{{route('student.tutoring.store', ['user' => $user->id])}}" method="POST">
        @csrf
        <div class="flex flex-wrap items-center gap-2">
            <div class="w-full md:flex-1" x-data="{ isOpen : false }">
                <label>Tanggal</label>
                <div class="flex gap-2">
                    <button class="m-0 mt-[10px] form-input md:text-base " @click="isOpen = true" type="button">
                        <i class="text-xs leading-none fas fa-chevron-down"></i>
                    </button>
                    <input type="date" name="tanggal" class="w-full cursor-not-allowed form-input" value="{{old('tanggal') ?? $date_selected ?? ''}}" readonly>
                </div>
                <div x-cloak x-show.transition.origin.top="isOpen" @click.away="isOpen = false" class="w-full py-2 text-right text-gray-500 bg-white rounded shadow-md md:text-left md:absolute md:w-auto max-h-[250px] overflow-y-scroll">
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
                    <input type="time" class="block w-full form-input" name="jam_mulai" min="{{ $min ?? '' }}" max="{{ $max ?? '' }}" value="{{old('jam_mulai')}}" @if(!$min){{'disabled'}}@endif>
                </div>

                <div class="w-1/2">
                    <label for="jam_akhir">jam akhir</label>
                    <input type="time" class="block w-full form-input" name="jam_akhir" min="{{ $min ?? '' }}" max="{{ $max ?? '' }}" value="{{old('jam_akhir')}}" @if(!$min){{'disabled'}}@endif>
                </div>
            </div>

        </div>

        <div class="flex gap-2">
            @error('tanggal')
            <div class="block alert alert-error">
                {{$message}}
            </div>
            @enderror
            @error('jam_mulai')
            <div class="block alert alert-error">
                {{$message}}
            </div>
            @enderror
            @error('jam_akhir')
            <div class="block alert alert-error">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="w-full mt-5">
            <label for="detail">Detail</label>
            <textarea name="detail" class="block w-full form-textarea" rows="3" placeholder="Tulis detail tambahan untuk mentor">{{old('detail')}}</textarea>
        </div>

        @error('detail')
        <div class="block alert alert-error">
            {{$message}}
        </div>
        @enderror

        <div class="flex justify-end w-full mt-5">
            <button type="submit" class="mt-0 btn btn-primary md:text-sm">Kirim</button>
        </div>
    </form>
    @else
    @php
    $start = \Carbon\Carbon::parse($schedule_now->date.' '.$schedule_now->hour_start);
    $end = \Carbon\Carbon::parse($schedule_now->date.' '.$schedule_now->hour_end);
    @endphp

    <div class="">
        @if($start->isFuture())
        <div class="flex flex-col items-center gap-4 p-8 mb-5 prose text-white normal-case rounded-lg md:gap-10 md:flex-row bg-primary-lighter">
            <div>
                <i class="text-2xl text-white md:ml-5 md:text-5xl fas fa-exclamation-circle"></i>
            </div>
            <div class="text-sm text-center md:text-left md:text-lg">
                <span>Sesi Tutoring anda akan dimulai pada: </span>
                <div id="countdown_start" class="mt-2 text-2xl"></div>
            </div>
        </div>
        @endif
        @if(!$start->isFuture() && $end->isFuture())
        <div class="flex flex-col items-center gap-4 p-8 mb-5 prose text-white normal-case rounded-lg md:gap-10 md:flex-row bg-success-lighter">
            <div>
                <i class="text-2xl text-white md:ml-5 md:text-5xl fas fa-check-circle"></i>
            </div>
            <div class="text-sm text-center md:text-left md:text-lg">
                <span>Sesi Tutoring anda sedang berjalan,</span> <br>
                <span>Sisa waktu :</span>
                <div id="countdown_end" class="mt-2 text-2xl"></div>
            </div>
        </div>
        @endif
    </div>
    @endif

    @if($review_form)
    <div class="p-8 mb-5 prose normal-case rounded-lg bg-primary-lighter">
        <form action="{{route('student.review.store')}}" method="POST" x-data="{ openTooltip : false}">
            @csrf

            <div class="block text-center text-white">
                <h6 class="h6">Sesi tutoring telah Selesai!</h6>
                <span>Tulis pendapatmu mengenai mentor kamu hari ini</span>
            </div>
            <input type="hidden" name="mentor_id" value="{{$user->id}}">

            <div class="flex justify-center w-full gap-2 mt-10 text-2xl text-gray-100 mb-14 md:text-4xl" x-data="rating()" x-init="checkRating()">

                <div class="flex flex-col-reverse">
                    <input type="radio" id="star1" name="rate" value="1" @if(old('rate')==1 ){{'checked'}}@endif required />
                    <label @click="setRating(1)" for="star1" class="fill-current rate hover:text-yellow-300">
                        <i class="fas fa-star"></i>
                    </label>
                </div>
                <div class="flex flex-col-reverse">
                    <input type="radio" id="star2" name="rate" value="2" @if(old('rate')==2 ){{'checked'}}@endif />
                    <label @click="setRating(2)" for="star2" class="fill-current rate hover:text-yellow-300">
                        <i class="fas fa-star"></i>
                    </label>
                </div>
                <div class="flex flex-col-reverse">
                    <input type="radio" id="star3" name="rate" value="3" @if(old('rate')==3 ){{'checked'}}@endif />
                    <label @click="setRating(3)" for="star3" class="fill-current rate hover:text-yellow-300">
                        <i class="fas fa-star"></i>
                    </label>
                </div>
                <div class="flex flex-col-reverse">
                    <input type="radio" id="star4" name="rate" value="4" @if(old('rate')==4 ){{'checked'}}@endif />
                    <label @click="setRating(4)" for="star4" class="fill-current rate hover:text-yellow-300">
                        <i class="fas fa-star"></i>
                    </label>
                </div>
                <div class="flex flex-col-reverse">
                    <input type="radio" id="star5" name="rate" value="5" @if(old('rate')==5 ){{'checked'}}@endif />
                    <label @click="setRating(5)" for="star5" class="fill-current rate hover:text-yellow-300">
                        <i class="fas fa-star"></i>
                    </label>
                </div>
            </div>
            <div>
                <textarea name="pesan" class="block w-full form-textarea" rows="3" placeholder="Ulasan mengenai mentor.." required>{{old('pesan')}}</textarea>
            </div>
            <div class="flex justify-end w-full mt-5">
                <button type="submit" class="w-full m-0 font-semibold bg-white btn text-primary hover:bg-opacity-75 md:text-sm">Kirim</button>
            </div>
        </form>

    </div>
    @endif


</div>

@section('customCSS')
<style>
    input,
    textarea {
        margin-top: 10px;
    }

    input[type="radio"] {
        opacity: 0;
        cursor: none;
        height: 0;
        width: 0;
        margin-top: -10px;
    }
</style>
@endsection

@section('customJS')
<script src="{{asset('js/countdown.js')}}"></script>
<script type="text/javascript">
    function checkRating() {
        const radioButton = document.querySelectorAll('input[name="rate"]');
        let rating;
        for (const rb of radioButton) {
            if (rb.checked) {
                rating = rb.value - 1;
                // udah dapet inputan

                let labelRating = document.querySelectorAll('label[class~="rate"]');

                for (i = rating; i != -1; i--) {
                    labelRating[i].classList.add("text-yellow-300")
                }

                break;
            }
        }
    }

    window.rating = function(){

        return {
            setRating(inputanRating) {
                const rating = inputanRating - 1;

                let labelRating = document.querySelectorAll('label[class~="rate"]');

                // clear style
                for (const label of labelRating) {
                    label.classList.remove("text-yellow-300")
                }

                // apply style
                for (i = rating; i != -1; i--) {
                    labelRating[i].classList.add("text-yellow-300")
                }

            }
        }
    }

    @if($schedule_now)
    @if($start->isFuture())
    $("#countdown_start")
        .countdown("{{$start}}", function(event) {
            $(this).text(
                event.strftime('%H:%M:%S')
            );
        })
        .on('finish.countdown', function(event) {
            location.reload();
        });
    @endif
    @if(!$start->isFuture() && $end->isFuture())
    $("#countdown_end")
        .countdown("{{$end}}", function(event) {
            $(this).text(
                event.strftime('%H:%M:%S')
            );
        })
        .on('finish.countdown', function(event) {
            Livewire.emit('show', '{{$schedule_now->id}}');
        });
    @endif
    @endif
</script>
@endsection