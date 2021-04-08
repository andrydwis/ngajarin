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
    <h5>Daftar mahasiswa</h5>
    <ul>
        @foreach($course->users as $user)
        <li>
            {{$user->name}}
            <a href="{{route('mentor.course.score.show', [ 'course' => $course->slug, 'user' => $user ])}}">lihat nilai</a>
        </li>
        @endforeach
    </ul>
</body>

</html>