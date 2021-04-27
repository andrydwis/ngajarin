<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_id',
        'user_id',
        'serial_number'
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
