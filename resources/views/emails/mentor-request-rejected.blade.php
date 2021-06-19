@component('mail::message')
# Hai {{$name}}!

Mohon maaf permintaan request mentor kamu harus kami tolak,
karena kamu masih belum memenuhi kriteria kami untuk menjadi mentor.
Coba lagi lain kali ya!<br>

Terimakasih,<br>
{{ config('app.name') }}
@endcomponent
