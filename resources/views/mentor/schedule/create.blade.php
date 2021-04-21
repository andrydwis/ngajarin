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
                                <label for="senin" class="ml-0 border cursor-pointer btn" @click="inputHari('senin')" :class="{ 'btn-outline-primary' : !isSenin() , 'btn-primary' : isSenin() }">senin</label>

                                <input type="radio" name="hari"  id="senin" value="senin" @if(old('hari')=='senin' ){{'checked'}}@endif>
                            </div>

                            <div>
                                <label for="selasa" class="border cursor-pointer btn" @click="inputHari('selasa')" :class="{ 'btn-outline-primary' : !isSelasa(), 'btn-primary' : isSelasa() }">selasa</label>

                                <input type="radio" name="hari"  id="selasa" value="selasa" @if(old('hari')=='selasa' ){{'checked'}}@endif>
                            </div>

                            <div>
                                <label for="rabu" class="border cursor-pointer btn" @click="inputHari('rabu')" :class="{ 'btn-outline-primary' : !isRabu(), 'btn-primary' : isRabu() }">rabu</label>

                                <input type="radio" name="hari"  id="rabu" value="rabu" @if(old('hari')=='rabu' ){{'checked'}}@endif>
                            </div>

                            <div>
                                <label for="kamis" class="border cursor-pointer btn" @click="inputHari('kamis')" :class="{ 'btn-outline-primary' : !isKamis(), 'btn-primary' : isKamis() }">Kamis</label>

                                <input type="radio" name="hari"  id="kamis" value="kamis" @if(old('hari')=='kamis' ){{'checked'}}@endif>
                            </div>

                            <div>
                                <label for="jumat" class="border cursor-pointer btn" @click="inputHari('jumat')" :class="{ 'btn-outline-primary' : !isJumat(), 'btn-primary' : isJumat() }">Jumat</label>

                                <input type="radio" name="hari"  id="jumat" value="jumat" @if(old('hari')=='jumat' ){{'checked'}}@endif>
                            </div>

                            <div>
                                <label for="sabtu" class="border cursor-pointer btn" @click="inputHari('sabtu')" :class="{ 'btn-outline-primary' : !isSabtu(), 'btn-primary' : isSabtu() }">Sabtu</label>

                                <input type="radio" name="hari"  id="sabtu" value="sabtu" @if(old('hari')=='sabtu' ){{'checked'}}@endif>
                            </div>

                            <div>
                                <label for="minggu" class="border cursor-pointer btn" @click="inputHari('minggu')" :class="{ 'btn-outline-primary' : !isMinggu(), 'btn-primary' : isMinggu() }">Minggu</label>

                                <input type="radio" name="hari"  id="minggu" value="minggu" @if(old('hari')=='minggu' ){{'checked'}}@endif>
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

                    <div class="flex justify-center pt-5">
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

    #list-hari > div {
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
            isSenin() {
                return this.hari === "senin"
            },
            isSelasa() {
                return this.hari === "selasa"
            },
            isRabu() {
                return this.hari === "rabu"
            },
            isKamis() {
                return this.hari === "kamis"
            },
            isJumat() {
                return this.hari === "jumat"
            },
            isSabtu() {
                return this.hari === "sabtu"
            },
            isMinggu() {
                return this.hari === "minggu"
            },
        }
    }
</script>
@endsection