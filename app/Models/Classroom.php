<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'year',
        'semester',
        'token',
    ];

    public function members(){
        return $this->hasMany(ClassroomMember::class);
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'classroom_course');
    }
}
