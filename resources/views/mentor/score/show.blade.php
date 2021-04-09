@extends('layouts.mentor.app')
@section('content')
<div class="w-full p-5 mx-auto mt-20 lg:mx-0 md:w-auto lg:w-4/6 xl:w-3/4">
    <div>
        <div class="card">
            <div class="flex justify-between card-header">
                <h6 class="text-base font-bold md:text-xl">
                    <span class="hidden sm:inline">Nilai mahasiswa </span> {{$user->name}}
                </h6>
            </div>
            <div class="card-body">

                <div class="mt-2 mb-5 border-b">
                    <div id="nilaiOverview"></div>
                </div>

                @php
                $sum = 0;
                @endphp

                @foreach($course->submissions as $submission)

                @php
                $sum += $submission->score($user);
                @endphp

                @endforeach

                <!-- kirim data ke bentuk json -->
                @php
                foreach ($course->submissions as $submission) {
                $json_decoded = json_decode($submission);
                $arrayNilai[] = array('Nilai' => $submission->score($user));
                $arraySubmission[] = array('Submission' => $submission->title);
                }
                @endphp

                <h6 class="my-5 text-lg font-bold">Rata-rata nilai : {{round(($sum/$submissionUser), 2)}}</h6>

            </div>
        </div>
    </div>
</div>
@endsection

@section('customCSS')
<style>
    .apexcharts-toolbar {
        transform: scale(1.5);
        margin-top: -18px;
    }
</style>
@endsection

@section('customJS')
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
    let nilai = <?php echo json_encode($arrayNilai) ?>.map(nilai => nilai.Nilai);
    let submission = <?php echo json_encode($arraySubmission) ?>.map(submission => submission.Submission);

    var nilaiOverview = document.getElementById('nilaiOverview');
    var nilaiOverviewChart = new ApexCharts(nilaiOverview, apexOptions('bar', '150%', nilai, submission, '#6366F1'));
    nilaiOverviewChart.render();
    // end Nilai Overview
</script>
@endsection