<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="{{route('verify-certificate.store')}}" method="POST">
        @csrf
        <label for="nomor_seri">Nomor seri</label>
        <input type="text" name="nomor_seri" value="{{old('nomor_seri')}}">
        <button type="submit">verif</button>
    </form>
</body>

</html>