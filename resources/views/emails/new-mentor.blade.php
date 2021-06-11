@component('mail::message')
# Hai {{$name}}

Akun mentor kamu berhasil dibuat.<br>
Berikut detail dari akun kamu.<br>
<br>
Nama : {{$name}} <br>
Email : {{$email}} <br>
Password : {{$password}} <br>

# Klik link dibawah login ke Ngajar.In
@component('mail::button', ['url' => $url])
Login
@endcomponent

# Jangan lupa untuk memverifikasi akun kamu terlebih dahulu.

Terima Kasih,<br>
{{ config('app.name') }}
@endcomponent