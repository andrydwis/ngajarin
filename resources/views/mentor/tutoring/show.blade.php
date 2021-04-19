<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    {{$tutoring->student->name}} <br>
    {{\Carbon\Carbon::parse($tutoring->date)->isoFormat('dddd, D MMMM Y')}} <br>
    {{$tutoring->hour_start}} <br>
    {{$tutoring->hour_end}} <br>
    {{$tutoring->detail}} <br>
    {{$tutoring->status}} <br>

    @if($tutoring->status == 'menunggu')
    proses tutoring <br>
    <form action="{{route('mentor.tutoring.update', ['tutoring' => $tutoring])}}" method="POST">
        @csrf
        @method('PATCH')
        <select name="status">
            <option value="">pilih salah satu</option>
            <option value="diterima">terima</option>
            <option value="ditolak">tolak</option>
        </select>
        <button type="submit">proses</button>
    </form>
    @endif
</body>

</html>