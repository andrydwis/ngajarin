@extends('layouts.mentor.app')
@section('content')

<!-- strat content -->
<div class="flex-1 p-6 mt-20 bg-gray-100">

    <!-- welcome section -->
    <div class="text-white duration-300 border-green-400 shadow-md bg-success-lighter hover:bg-success card mb-5">
        <div class="grid md:flex md:flex-row card-body">
            <!-- image -->
            <div class="items-center justify-center hidden w-40 h-40 md:flex img-wrapper">
                <img src="{{url('/img/happy.svg')}}" alt="img title">
            </div>
            <!-- end image -->
            <!-- info -->
            <div class="py-2 ml-0 md:ml-10">
                <h3 class="h3">Selamat datang, {{auth()->user()->name}} !</h3>
            </div>
            <!-- end info -->
        </div>
    </div>
    <!-- end welcome section -->

    <!-- General Report -->
    <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-4 md:grid-flow-col">


        <!-- card -->
        <div class="report-card">
            <div class="card">
                <div class="grid flex-col md:flex card-body">
                    <!-- top -->
                    <div class="flex flex-row items-center justify-between">
                        <div class="text-indigo-700 h6 fas fa-diagnoses"></div>
                    </div>
                    <!-- end top -->
                    <!-- bottom -->
                    <div class="mt-8">
                        <h1 class="h5 num-4">{{$submissions}}</h1>
                        <p>Submission Belum Direview</p>
                    </div>
                    <!-- end bottom -->
                </div>
            </div>
            <div class="p-1 mx-4 bg-white border border-t-0 rounded rounded-t-none footer"></div>
        </div>
        <!-- end card -->


        <!-- card -->
        <div class="report-card">
            <div class="card">
                <div class="flex flex-col card-body">
                    <!-- top -->
                    <div class="flex flex-row items-center justify-between">
                        <div class="text-red-700 h6 fas fa-building"></div>
                    </div>
                    <!-- end top -->
                    <!-- bottom -->
                    <div class="mt-8">
                        <h1 class="h5 num-4">{{$classes}}</h1>
                        <p>Kelas yang Anda Buat</p>
                    </div>
                    <!-- end bottom -->
                </div>
            </div>
            <div class="p-1 mx-4 bg-white border border-t-0 rounded rounded-t-none footer"></div>
        </div>
        <!-- end card -->


        <!-- card -->
        <div class="report-card">
            <div class="card">
                <div class="flex flex-col card-body">
                    <!-- top -->
                    <div class="flex flex-row items-center justify-between">
                        <div class="text-yellow-600 h6 fas fa-play-circle"></div>
                    </div>
                    <!-- end top -->
                    <!-- bottom -->
                    <div class="mt-8">
                        <h1 class="h5 num-4">{{$courses}}</h1>
                        <p>Course yang Anda Buat</p>
                    </div>
                    <!-- end bottom -->
                </div>
            </div>
            <div class="p-1 mx-4 bg-white border border-t-0 rounded rounded-t-none footer"></div>
        </div>
        <!-- end card -->


        <!-- card -->
        <div class="report-card">
            <div class="card">
                <div class="flex flex-col card-body">
                    <!-- top -->
                    <div class="flex flex-row items-center justify-between">
                        <div class="text-green-700 h6 fas fa-clipboard-list"></div>
                    </div>
                    <!-- end top -->
                    <!-- bottom -->
                    <div class="mt-8">
                        <h1 class="h5 num-4">{{$tutorings}}</h1>
                        <p>Request Tutorial Pending</p>
                    </div>
                    <!-- end bottom -->
                </div>
            </div>
            <div class="p-1 mx-4 bg-white border border-t-0 rounded rounded-t-none footer"></div>
        </div>
        <!-- end card -->


    </div>
    <!-- End General Report -->

    <!-- Stat Overview -->
    <div class="mt-6 card">
        <!-- header -->
        <div class="flex flex-row justify-between card-header">
            <h1 class="h6">Statistik Tutoring Anda</h1>
        </div>
        <!-- end header -->
        <!-- body -->
        <div class="card-body">
            @if($charts->isNotEmpty())
            @php
            foreach ($charts as $chart){
            $arrayJumlah[] = array('Jumlah' => $chart->amount);
            $arrayTanggal[] = array('Tanggal' => \Carbon\Carbon::parse($chart->date)->isoFormat('dddd, D MMMM Y'));
            }
            @endphp
            <div class="mt-2 mb-5 border-b">
                <div id="tutoringStat"></div>
            </div>
            @else
            <div class="flex flex-col justify-center items-center">
                <img src="{{asset('img/empty.svg')}}" alt="" class="w-[500px] h-[250px]">
                <h3 class="h3 text-indigo-500 mt-5">Data tutoring kosong</h3>
            </div>
            @endif
        </div>
        <!-- end body -->
    </div>
    <!-- end Stat Overview -->
</div>
<!-- end content -->

@endsection

@section('customJS')
@if($charts->isNotEmpty())
<script>
    // APEX Charts setting
    var apexOptions = function(type, height, numbers, numbers2, color) {
        return {
            chart: {
                height: height,
                width: '100%',
                type: type,
                toolbar: {
                    show: true,
                },
            },

            series: [{
                name: "Nilai ",
                data: numbers
            }],
            fill: {
                colors: [color],
            },
            stroke: {
                colors: [color],
                width: 3
            },

            xaxis: {
                categories: numbers2,
            },

        };
    }

    //  Nilai Overview
    let jumlah = <?php echo json_encode($arrayJumlah) ?>.map(jumlah => jumlah.Jumlah);
    let tanggal = <?php echo json_encode($arrayTanggal) ?>.map(tanggal => tanggal.Tanggal);

    var tutoringStat = document.getElementById('tutoringStat');
    var chart = new ApexCharts(tutoringStat, apexOptions('bar', '150%', jumlah, tanggal, '#6366F1'));
    chart.render();
    // end Nilai Overview
</script>
@endif
@endsection