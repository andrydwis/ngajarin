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
    @foreach($submissionUsersPending as $submissionUserPending)
    <hr>
    <p>sub dari {{$submissionUserPending->user->name}}</p>
    <p>status ; {{$submissionUserPending->status}}</p>
    <form action="{{route('mentor.course.submission.review-process', ['course' => $course->slug, 'submission' => $submission->slug, 'submissionUser' => $submissionUserPending])}}" method="post">
        @csrf
        <input type="number" name="score">
        @error('score')
        {{$message}}
        @enderror
        <textarea name="feedback" id="" cols="30" rows="10"></textarea>
        @error('feedback')
        {{$message}}
        @enderror
        <select name="status" id="">
            <option value="" selected disabled>pilih status</option>
            <option value="diterima">Diterima</option>
            <option value="ditolak">Ditolak</option>
        </select>
        @error('status')
        {{$message}}
        @enderror
        <button type="submit">Review</button>
    </form>
    @endforeach
</body>

</html>