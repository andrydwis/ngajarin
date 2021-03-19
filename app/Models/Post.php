<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'content',
        'created_by'
    ];

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'post_tag');
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function reacts()
    {
        return $this->hasMany(PostReact::class);
    }

    public function likes()
    {
        return $this->where('id', $this->id)->with('reacts')->first()->reacts()->where('type', 'like')->get()->pluck('user_id')->toArray();
    }

    public function dislikes()
    {
        return $this->where('id', $this->id)->with('reacts')->first()->reacts()->where('type', 'dislike')->get()->pluck('user_id')->toArray();
    }
}
