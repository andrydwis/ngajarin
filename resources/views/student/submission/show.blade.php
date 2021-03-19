<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    {{$submission->title}} <br>
    {{$submission->task}}
    @if($submission->file)
    <a href="{{$submission->file}}">donlod</a> <br>
    @else
    tidak ada file <br>
    @endif
    <hr>

    @if(!in_array('diterima',$submission_users->pluck('status')->toArray()))
    kirim submission <br>
    <form action="{{route('student.course.submission.store', ['course' => $course, 'submission' => $submission])}}" method="post">
        @csrf
        <label for="file">file</label>
        <input type="text" name="file">
        <button type="submit">submit</button>
    </form>
    <hr>
    @else
    submission anda sudah diterima kok ! <br>
    @endif
   
    submissionku <br>
    @forelse($submission_users as $submission_user)
    {{$submission_user->score}} <br>
    {{$submission_user->feedback}} <br>
    {{$submission_user->status}} <br>
    @if($submission_user->status != 'diterima')
    <form action="{{route('student.course.submission.destroy', ['course' => $course, 'submission' => $submission, 'submissionUser' => $submission_user])}}" method="post">
        @csrf
        @method('DELETE')
        <button type="submit">hapus</button>
    </form>
    <form action="{{route('student.course.submission.update', ['course' => $course, 'submission' => $submission, 'submissionUser' => $submission_user])}}" method="post">
        @csrf
        @method('PATCH')
        <label for="file">file</label>
        <input type="text" name="file">
        <button type="submit">edit</button>
    </form>
    @else
    anda telah menyelesaikan submission ini <br>
    @endif
    <a href="{{$submission_user->file}}">donlod</a> <br>
    @empty
    anda belum mengumpulkan submission ini <br>
    @endforelse
</body>

</html>