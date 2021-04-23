<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'day',
        'hour_start',
        'hour_end'
    ];

    public function dayTrans()
    {
        if ($this->day == 'monday') {
            return 'senin';
        } elseif ($this->day == 'tuesday') {
            return 'selasa';
        } elseif ($this->day == 'wednesday') {
            return 'rabu';
        } elseif ($this->day == 'thursday') {
            return 'kamis';
        } elseif ($this->day == 'friday') {
            return 'jumat';
        } elseif ($this->day == 'saturday') {
            return 'sabtu';
        } elseif ($this->day == 'sunday') {
            return 'minggu';
        }
    }
}
