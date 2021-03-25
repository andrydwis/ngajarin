<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'content',
        'created_by'
    ];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function reacts()
    {
        return $this->hasMany(CommentReact::class);
    }

    public function likes()
    {
        return CommentReact::where('comment_id', $this->id)->where('type', 'like')->get()->pluck('user_id')->toArray();
    }

    public function dislikes()
    {
        return CommentReact::where('comment_id', $this->id)->where('type', 'dislike')->get()->pluck('user_id')->toArray();
    }
}
