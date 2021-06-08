<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_id',
        'title',
        'slug',
        'description',
        'type',
        'link',
        'file',
        'unlock_submission'
    ];

    public function submission()
    {
        return $this->belongsTo(Submission::class, 'unlock_submission');
    }
}
