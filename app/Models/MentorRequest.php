<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MentorRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'email',
        'reason'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
