@extends('layouts.mentor.app')
@section('content')
<div class="w-full p-5 mx-auto mt-20 lg:mx-0 md:w-auto lg:w-4/6 xl:w-3/4">
    <div>
        <div class="card">
            <div class="flex justify-between card-header">
                <h6 class="text-base font-bold md:text-xl">
                    <span class="hidden sm:inline">Daftar Mahasiswa Course </span> {{$course->title}}
                </h6>
            </div>
            <div class="card-body">
                <div class="container mb-4">
                    <div class="">
                        <div id="nilaiOverview"></div>
                    </div>
                  
                    <h3>Nilai mahasiswa <span class="font-bold"> {{$user->name}} </span> </h3>

                    <h1>List Submission</h1>
                    @php
                    $sum = 0;
                    @endphp

                    @foreach($course->submissions as $submission)

                    {{$submission->title}} - {{$submission->score($user)}}<br>

                    @php
                    $sum += $submission->score($user);
                    @endphp

                    @endforeach

                    <h1>Rata-rata nilai : {{round(($sum/$submissionUser), 2)}}</h1>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<?php
foreach ($course->submissions as $submission) {
    $json_decoded = json_decode($submission);
    // iki Nilai iso tak hapus ben gak dadi objek
    $arrayNilai[] = array('Nilai' => $submission->score($user));
}
echo $submission->score($user);
?>

@section('customCSS')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.23/datatables.min.css" />
@endsection

@section('customJS')
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.23/datatables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#datatables').DataTable({
            "language": {
                "url": "https://cdn.datatables.net/plug-ins/1.10.22/i18n/Indonesian.json"
            }
        });
    });

    // APEX Charts
    var options = function(type, height, numbers, color) {
        return {
            chart: {
                height: height,
                width: '100%',
                type: type,
                sparkline: {
                    enabled: true
                },
                toolbar: {
                    show: true,
                },
            },
            grid: {
                show: true,
                padding: {
                    top: 0,
                    right: 0,
                    bottom: 0,
                    left: 0
                }
            },
            dataLabels: {
                enabled: true
            },
            legend: {
                show: true,
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
            yaxis: {
                show: false,
            },
            xaxis: {
                show: false,
                labels: {
                    show: false,
                },
                axisBorder: {
                    show: false,
                },
                tooltip: {
                    enabled: false,
                }
            },

        };
    }

    //  Nilai Overview
    let isiArrayTest = <?php echo json_encode($arrayNilai) ?>.map(nilai => nilai.Nilai);

    console.log(isiArrayTest);

    var nilaiOverview = document.getElementById('nilaiOverview');
    var nilaiOverviewChart = new ApexCharts(nilaiOverview, options('bar', '50%', isiArrayTest, '#6366F1'));
    nilaiOverviewChart.render();
    // end Nilai Overview
</script>
@endsection