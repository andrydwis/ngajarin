<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CertificateUser extends Model
{
    use HasFactory;

    protected $fillable = [
        'certificate_id',
        'user_id',
    ];

    public function certificate()
    {
        return $this->belongsTo(Certificate::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
