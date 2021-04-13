<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @foreach($tutorings as $tutoring)
    {{$tutoring->student->name}} <br>
    {{\Carbon\Carbon::parse($tutoring->date)->isoFormat('dddd, D MMMM Y')}} <br>
    {{$tutoring->hour_start}} <br>
    {{$tutoring->hour_end}} <br>
    {{$tutoring->detail}} <br>
    {{$tutoring->status}}
    <a href="{{route('mentor.tutoring.show', ['tutoring' =>$tutoring])}}">detail</a>
    @endforeach
</body>
</html>