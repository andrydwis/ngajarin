<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\CommentReact;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Post $post)
    {
        //
        $request->validate([
            'komentar' => ['required', 'string'],
        ]);

        $comment = new Comment();
        $comment->post_id = $post->id;
        $comment->content = $request->komentar;
        $comment->created_by = Auth::user()->id;
        $comment->save();

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment, Post $post)
    {
        //
        $comment->delete();

        Alert::success('Komentar berhasil dihapus');

        return redirect()->route('user.post.show', ['post' => $post]);
    }

    public function like(Request $request, Comment $comment)
    {
        $likes = $comment->reacts->where('type', 'like')->pluck('user_id')->toArray();
        $dislikes = $comment->reacts->where('type', 'dislike')->pluck('user_id')->toArray();
        $isAlreadyLikes = in_array(Auth::user()->id, $likes);
        $isAlreadyDislikes = in_array(Auth::user()->id, $dislikes);

        if ($isAlreadyLikes) {
            $react = CommentReact::where('comment_id', $comment->id)->where('user_id', Auth::user()->id)->first();
            $react->delete();

            return back();
        } elseif ($isAlreadyDislikes) {
            $react = CommentReact::where('comment_id', $comment->id)->where('user_id', Auth::user()->id)->first();
            $react->delete();

            $react = new CommentReact();
            $react->comment_id = $comment->id;
            $react->user_id = Auth::user()->id;
            $react->type = 'like';
            $react->save();

            return back();
        } else {
            $react = new CommentReact();
            $react->comment_id = $comment->id;
            $react->user_id = Auth::user()->id;
            $react->type = 'like';
            $react->save();

            return back();
        }
    }

    public function dislike(Request $request, Comment $comment)
    {
        $likes = $comment->reacts->where('type', 'like')->pluck('user_id')->toArray();
        $dislikes = $comment->reacts->where('type', 'dislike')->pluck('user_id')->toArray();
        $isAlreadyLikes = in_array(Auth::user()->id, $likes);
        $isAlreadyDislikes = in_array(Auth::user()->id, $dislikes);

        if ($isAlreadyDislikes) {
            $react = CommentReact::where('comment_id', $comment->id)->where('user_id', Auth::user()->id)->first();
            $react->delete();

            return back();
        } elseif ($isAlreadyLikes) {
            $react = CommentReact::where('comment_id', $comment->id)->where('user_id', Auth::user()->id)->first();
            $react->delete();

            $react = new CommentReact();
            $react->comment_id = $comment->id;
            $react->user_id = Auth::user()->id;
            $react->type = 'dislike';
            $react->save();

            return back();
        } else {
            $react = new CommentReact();
            $react->comment_id = $comment->id;
            $react->user_id = Auth::user()->id;
            $react->type = 'dislike';
            $react->save();

            return back();
        }
    }
}
