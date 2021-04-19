<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="{{route('mentor.schedule.store')}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="hari">Hari</label>
            <br>
            <p>senin</p>
            <input type="radio" name="hari" value="senin" @if(old('hari')=='senin'){{'checked'}}@endif>
            <p>selasa</p>
            <input type="radio" name="hari" value="selasa" @if(old('hari')=='selasa'){{'checked'}}@endif>
            <p>rabu</p>
            <input type="radio" name="hari" value="rabu" @if(old('hari')=='rabu'){{'checked'}}@endif>
            <p>kamis</p>
            <input type="radio" name="hari" value="kamis" @if(old('hari')=='kamis'){{'checked'}}@endif>
            <p>jumat</p>
            <input type="radio" name="hari" value="jumat" @if(old('hari')=='jumat'){{'checked'}}@endif>
            <p>sabtu</p>
            <input type="radio" name="hari" value="sabtu" @if(old('hari')=='sabtu'){{'checked'}}@endif>
            <p>minggu</p>
            <input type="radio" name="hari" value="minggu" @if(old('hari')=='minggu'){{'checked'}}@endif>
        </div>
        <div class="form-group">
            <label for="jam_mulai">Jam Mulai</label>
            <input type="time" name="jam_mulai" value="{{old('jam_mulai')}}">
        </div>
        <div class="form-group">
            <label for="jam_akhir">Jam Akhir</label>
            <input type="time" name="jam_akhir" value="{{old('jam_akhir')}}">
        </div>
        <button type="submit">Simpan</button>
    </form>
</body>

</html>