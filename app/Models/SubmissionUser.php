<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubmissionUser extends Model
{
    use HasFactory;

    protected $fillable = [
        'submission_id',
        'user_id',
        'file',
        'score',
        'note',
        'status',
    ];
}
