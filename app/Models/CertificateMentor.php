<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CertificateMentor extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'serial_number'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
