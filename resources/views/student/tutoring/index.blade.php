<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    @foreach($mentors as $mentor)
    @php
    $rate = $mentor->reviews->avg('rate');
    $sum = $mentor->reviews->count();
    @endphp
    <img src="{{$mentor->detail->photo ?? 'https://ui-avatars.com/api/?background=random&name='.$mentor->name}}" alt="">
    <p>{{$mentor->name}}</p>

    @if($rate)
    <p>rate : {{$rate}} dari {{$sum}} ulasan</p>
    @endif
    @endforeach
</body>

</html>