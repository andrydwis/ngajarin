@component('mail::message')
# Hai Sobat Ngajar.in !

Ngajar.in telah membuat kursus baru <b>{{$title}}</b><br>
Yuk belajar bersama, dapatkan ilmunya<br>

# Klik link dibawah untuk menuju ke kursus
@component('mail::button', ['url' => $url])
Lihat
@endcomponent

Terima Kasih,<br>
{{ config('app.name') }}
@endcomponent
