<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <a href="{{route('mentor.schedule.create')}}">buat jadwal baru</a>
    <h1>list jadwal tutoring</h1>
    <table>
        <thead>
            <tr>
                <th>no</th>
                <th>Hari</th>
                <th>Jam Mulai</th>
                <th>Jam akhir</th>
                <th>Menu</th>
            </tr>
        </thead>
        <tbody>
            @foreach($schedules as $schedule)
            <tr>
                <td>{{$loop->index+1}}</td>
                <td>{{$schedule->day}}</td>
                <td>{{$schedule->hour_start}}</td>
                <td>{{$schedule->hour_end}}</td>
                <td>
                <a href="{{route('mentor.schedule.edit', ['schedule' => $schedule])}}">edit</a>
                <form action="{{route('mentor.schedule.destroy', ['schedule' => $schedule])}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">hapus</button>
                </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>