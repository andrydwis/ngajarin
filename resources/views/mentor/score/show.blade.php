<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Course {{$course->title}}</h1>
    <h3>Nilai mahasiswa {{$user->name}}</h3>

    <h1>List Submission</h1>
    @php
    $sum = 0;
    $total = $course->submissions->count();
    @endphp

    @foreach($course->submissions as $submission)
    
    {{$submission->title}} - {{$submission->score($user)}}<br>
    
    @php
    $sum += $submission->score($user);
    @endphp

    @endforeach

    <h1>Rata-rata nilai : {{$sum/$total}}</h1>
</body>

</html>