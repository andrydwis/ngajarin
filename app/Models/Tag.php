<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = [
       'name',
       'slug',
       'icon'
    ];

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'course_tag');
    }
}
