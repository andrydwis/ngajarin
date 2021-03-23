<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Submission extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_id',
        'title',
        'slug',
        'task',
        'file',
        'deadline'
    ];

    public function unlocked(){
        $check = SubmissionUser::where('submission_id', $this->id)->where('user_id', Auth::user()->id)->latest()->first();
        if($check){
            return $check->status;
        }else{
            return 'belum mengumpulkan';
        }
    }

    public function submissionUsers()
    {
        return $this->hasMany(SubmissionUser::class);
    }
}
