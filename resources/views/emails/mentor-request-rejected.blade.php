@component('mail::message')
# Hai {{$name}}!

Mohon maaf permintaan request mentor kamu harus kami tolak, dikarenakan alasan berikut : <br>
{{$reason}} <br>
Coba lagi lain kali ya!<br>

Terimakasih,<br>
{{ config('app.name') }}
@endcomponent
