<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentReact extends Model
{
    use HasFactory;

    protected $fillable = [
        'comment_id',
        'user_id',
        'type',
    ];
}