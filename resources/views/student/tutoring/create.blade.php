<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <img src="{{$mentor->detail->photo ?? 'https://ui-avatars.com/api/?background=random&name='.$user->name}}" alt="">
    <p>Nama : {{$user->name}}</p>

    @if($user->detail)
    <p>{{$user->detail->biodata}}</p>
    @endif

    @php
    $rate = $user->reviews->avg('rate');
    $sum = $user->reviews->count();
    @endphp

    @if($rate)
    <p>rate : {{$rate}} dari {{$sum}} ulasan</p>
    @endif

    <p>jadwal :</p>
    @forelse($schedules as $schedule)
    <p>{{$schedule->dayTrans()}}, {{$schedule->hour_start}} - {{$schedule->hour_end}}</p>
    @empty
    <p>Mentor ini belum mengatur jadwal tutoring</p>
    @endforelse

    <p>tanggal</p>
    @foreach($dates as $date => $id)
    <button>{{\Carbon\Carbon::parse($date)->isoFormat('dddd, D MMMM Y')}}</button>
    @endforeach
    <br>
    <label for="jam_mulai">jam mulai</label>
    <input type="time" name="jam_mulai">
    <label for="jam_akhir">jam akhir</label>
    <input type="time" name="jam_akhir">
    <br>
    <label for="detail">Detail</label>
    <textarea name="detail" placeholder="Tulis detail tambahan untuk mentor"></textarea>
</body>

</html>