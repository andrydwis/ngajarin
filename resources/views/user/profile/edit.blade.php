<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST">
        @csrf
        @method('PATCH')
        <input type="text" name="nama" value="{{old('nama') ?? $user->name}}">
        <input type="email" name="email" value="{{old('email') ?? $user->email}}">
        <input type="text" name="telepon" value="{{old('telepon') ?? $user->phone}}">
        <input type="password" name="password">
        <input type="password" name="password_confirmation">
        <br>
        <input type="text" name="foto" value="{{old('foto') ?? $user->detail->photo ?? ''}}">
        <textarea name="biodata">{{old('biodata') ?? $user->detail->biodata ?? ''}}</textarea>
        <input type="text" name="alamat" value="{{old('alamat') ?? $user->detail->address ?? ''}}">
        <input type="text" name="facebook" value="{{old('facebook') ?? $user->detail->facebook ?? ''}}">
        <input type="text" name="twitter" value="{{old('twitter') ?? $user->detail->twitter ?? ''}}">
        <input type="text" name="instagram" value="{{old('instagram') ?? $user->detail->instagram ?? ''}}">
        <input type="text" name="github" value="{{old('github') ?? $user->detail->github ?? ''}}">
        <input type="text" name="linkedin" value="{{old('linkedin') ?? $user->detail->linkedin ?? ''}}">
        <button type="submit">simpan</button>
    </form>
</body>
</html>