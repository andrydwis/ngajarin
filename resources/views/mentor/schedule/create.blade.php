@extends('layouts.mentor.app')
@section('content')
<div class="w-full p-5 mt-20 md:w-auto lg:w-4/6 xl:w-3/4">
    <div class="card">
        <div class="card-header">
            <h6 class="h6">Tambahkan Jadwal Tutoring</h6>
        </div>
        <div class="card-body">
            <form action="{{route('mentor.schedule.store')}}" method="POST">
                @csrf
                <div class="grid gap-8">
                    <div class="grid gap-3">
                        <div>
                            <span>Hari</span>
                        </div>

                        @error('hari')
                        <div class="mt-2 alert alert-error lg:w-3/5">
                            {{$message}}
                        </div>
                        @enderror

                        <div id="list-hari" x-data="hariSelector()" x-init="checkHari()" class="flex flex-wrap gap-1">

                            <div>
                                <label for="monday" class="ml-0 border cursor-pointer btn" @click="inputHari('monday')" :class="{ 'btn-outline-primary' : !isMonday() , 'btn-primary' : isMonday() }">Senin</label>

                                <input type="radio" name="hari" class="hidden" id="monday" value="monday" @if(old('hari')=='monday' ){{'checked'}}@endif>
                            </div>

                            <div>
                                <label for="tuesday" class="border cursor-pointer btn" @click="inputHari('tuesday')" :class="{ 'btn-outline-primary' : !isTuesday(), 'btn-primary' : isTuesday() }">Selasa</label>

                                <input type="radio" name="hari" class="hidden" id="tuesday" value="tuesday" @if(old('hari')=='tuesday' ){{'checked'}}@endif>
                            </div>

                            <div>
                                <label for="wednesday" class="border cursor-pointer btn" @click="inputHari('wednesday')" :class="{ 'btn-outline-primary' : !isWednesday(), 'btn-primary' : isWednesday() }">Rabu</label>

                                <input type="radio" name="hari" class="hidden" id="wednesday" value="wednesday" @if(old('hari')=='wednesday' ){{'checked'}}@endif>
                            </div>

                            <div>
                                <label for="thursday" class="border cursor-pointer btn" @click="inputHari('thursday')" :class="{ 'btn-outline-primary' : !isThursday(), 'btn-primary' : isThursday() }">Kamis</label>

                                <input type="radio" name="hari" class="hidden" id="thursday" value="thursday" @if(old('hari')=='thursday' ){{'checked'}}@endif>
                            </div>

                            <div>
                                <label for="friday" class="border cursor-pointer btn" @click="inputHari('friday')" :class="{ 'btn-outline-primary' : !isFriday(), 'btn-primary' : isFriday() }">Jumat</label>

                                <input type="radio" name="hari" class="hidden" id="friday" value="friday" @if(old('hari')=='friday' ){{'checked'}}@endif>
                            </div>

                            <div>
                                <label for="saturday" class="border cursor-pointer btn" @click="inputHari('saturday')" :class="{ 'btn-outline-primary' : !isSaturday(), 'btn-primary' : isSaturday() }">Sabtu</label>

                                <input type="radio" name="hari" class="hidden" id="saturday" value="saturday" @if(old('hari')=='saturday' ){{'checked'}}@endif>
                            </div>

                            <div>
                                <label for="sunday" class="border cursor-pointer btn" @click="inputHari('sunday')" :class="{ 'btn-outline-primary' : !isSunday(), 'btn-primary' : isSunday() }">Minggu</label>

                                <input type="radio" name="hari" class="hidden" id="sunday" value="sunday" @if(old('hari')=='sunday' ){{'checked'}}@endif>
                            </div>

                        </div>
                    </div>

                    <div class="grid gap-2">
                        <label for="jam_mulai">Jam Mulai</label>
                        <input type="time" class="form-input lg:w-3/5" id="jam_mulai" name="jam_mulai" value="{{old('jam_mulai')}}">
                        @error('jam_mulai')
                        <div class="mt-2 alert alert-error lg:w-3/5">
                            {{$message}}
                        </div>
                        @enderror
                    </div>

                    <div class="grid gap-2">
                        <label for="jam_akhir">Jam Akhir</label>
                        <input type="time" class="form-input lg:w-3/5" id="jam_akhir" name="jam_akhir" value="{{old('jam_akhir')}}">
                        @error('jam_akhir')
                        <div class="mt-2 alert alert-error lg:w-3/5">
                            {{$message}}
                        </div>
                        @enderror
                    </div>

                    <div class="flex justify-end pt-5">
                        <button type="submit" class="w-full md:w-auto btn-bs-primary">Tambahkan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('customCSS')
<style>
    label {
        font-size: 1rem !important;
    }

    .btn {
        margin: 0 0;
    }

    #list-hari>div {
        margin-bottom: 1rem;
    }
</style>
@endsection

@section('customJS')
<script>
    function checkHari() {
        const radioButton = document.querySelectorAll('input[name="hari"]');
        let ambilID;
        for (const rb of radioButton) {
            if (rb.checked) {
                ambilID = rb.value;
                document.querySelector('label[for=' + CSS.escape(ambilID) + ']').classList.add("bg-primary", "text-white");
                break;
            }
        }
    }


    function hariSelector() {

        return {
            hari: 'none',
            inputHari(inputanHari) {
                this.hari = inputanHari;

                // ketika inputHari jalan maka otomatis membersihkan state active di semua label
                let semuaLabel = document.querySelectorAll('label');
                for (const label of semuaLabel) {
                    label.classList.remove("bg-primary", "text-white")
                }

            },
            isMonday() {
                return this.hari === "monday"
            },
            isTuesday() {
                return this.hari === "tuesday"
            },
            isWednesday() {
                return this.hari === "wednesday"
            },
            isThursday() {
                return this.hari === "thursday"
            },
            isFriday() {
                return this.hari === "friday"
            },
            isSaturday() {
                return this.hari === "saturday"
            },
            isSunday() {
                return this.hari === "sunday"
            },
        }
    }
</script>
@endsection