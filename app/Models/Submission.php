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

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function unlocked()
    {
        $check = SubmissionUser::where('submission_id', $this->id)->where('user_id', Auth::user()->id)->latest()->first();
        if ($check) {
            return $check->status;
        } else {
            return 'belum mengumpulkan';
        }
    }

    public function finished()
    {
        $check = SubmissionUser::where('submission_id', $this->id)->where('user_id', Auth::user()->id)->where('status', 'diterima')->latest()->first();
        if ($check) {
            return true;
        } else {
            return false;
        }
    }

    public function score(User $user)
    {
        $check = SubmissionUser::where('submission_id', $this->id)->where('user_id', $user->id)->latest()->first();
        if ($check) {
            return $check->score;
        } else {
            return 0;
        }
    }

    public function submissionUsers()
    {
        return $this->hasMany(SubmissionUser::class);
    }
}
