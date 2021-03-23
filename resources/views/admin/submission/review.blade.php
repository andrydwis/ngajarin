<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>JUmlah submission yang perlu direview</h1>
    <p>{{$submissionUsersPending->count()}}</p>
    @foreach($submissionUsersPending->take(3) as $submissionUserPending)
    <p>sub dari {{$submissionUserPending->user->name}}</p>
    <p>status ; {{$submissionUserPending->status}}</p>
    @endforeach
    <p><a href="{{route('admin.course.submission.review-pending', ['course' => $course, 'submission' => $submission])}}">Detail</a></p>

    <h1>JUmlah submission yang diterima</h1>
    <p>{{$submissionUsersAccepted->count()}}</p>
    @foreach($submissionUsersAccepted->take(3) as $submissionUserAccepted)
    <p>sub dari {{$submissionUserAccepted->user->name}}</p>
    <p>status ; {{$submissionUserAccepted->status}}</p>
    @endforeach
    <p><a href="{{route('admin.course.submission.review-accepted', ['course' => $course, 'submission' => $submission])}}">Detail</a></p>

    <h1>JUmlah submission yang ditolak</h1>
    <p>{{$submissionUsersRejected->count()}}</p>
    @foreach($submissionUsersRejected->take(3) as $submissionUserRejected)
    <p>sub dari {{$submissionUserRejected->user->name}}</p>
    <p>status ; {{$submissionUserRejected->status}}</p>
    @endforeach
    <p><a href="{{route('admin.course.submission.review-rejected', ['course' => $course, 'submission' => $submission])}}">Detail</a></p>

</body>
</html>