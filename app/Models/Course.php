<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'thumbnail',
        'level',
        'created_by',
    ];

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function episodes(){
        return $this->hasMany(Episode::class);
    }

    public function submissions(){
        return $this->hasMany(Submission::class);
    }

    public function tags(){
        return $this->belongsToMany(Tag::class, 'course_tag');
    }

    public function classrooms()
    {
        return $this->belongsToMany(Classroom::class, 'classroom_course');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'course_user');
    }

    public function certificate()
    {
        return $this->hasOne(Certificate::class);
    }
}
