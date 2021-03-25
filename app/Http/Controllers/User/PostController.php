<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use App\Models\PostReact;
use App\Models\Tag;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = [
            'posts' => Post::with('tags', 'comments', 'reacts')->orderBy('created_at', 'desc')->paginate(10),
        ];

        return view('user.post.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data = [
            'tags' => Tag::get(),
        ];

        return view('user.post.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'judul' => ['required', 'string'],
            'konten' => ['required', 'string'],
        ]);

        $post = new Post();
        $post->title = $request->judul;
        $post->slug = Str::slug($request->judul);
        $post->content = $request->konten;
        $post->created_by = Auth::user()->id;
        $post->save();

        if ($request->tag) {
            $post->tags()->sync($request->tag);
        }

        Alert::success('Post berhasil dibuat');

        return redirect()->route('user.post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
        $data = [
            'post' => $post,
            'comments' => Comment::where('post_id', $post->id)->orderBy('created_at', 'desc')->get(),
        ];

        return view('user.post.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
        $check = $post->creator->id == Auth::user()->id;
        if (!$check) {
            Alert::error('Anda tidak memiliki izin untuk mengedit post ini');

            return redirect()->route('user.post.index');
        }
        $data = [
            'post' => $post,
            'tags' => Tag::get(),
        ];

        return view('user.post.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
        $request->validate([
            'judul' => ['required', 'string'],
            'konten' => ['required', 'string'],
        ]);

        $post->title = $request->judul;
        $post->slug = Str::slug($request->judul);
        $post->content = $request->konten;
        $post->created_by = Auth::user()->id;
        $post->save();

        if ($request->tag) {
            $post->tags()->sync($request->tag);
        } else {
            $post->tags()->detach();
        }

        Alert::success('Post berhasil diupdate');

        return redirect()->route('user.post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
        $post->delete();

        Alert::success('Post berhasil dihapus');

        return redirect()->route('user.post.index');
    }

    public function like(Request $request, Post $post)
    {
        $likes = $post->with('reacts')->first()->reacts()->where('post_id', $post->id)->where('type', 'like')->get()->pluck('user_id')->toArray();
        $dislikes = $post->with('reacts')->first()->reacts()->where('post_id', $post->id)->where('type', 'dislike')->get()->pluck('user_id')->toArray();
        $isAlreadyLikes = in_array(Auth::user()->id, $likes);
        $isAlreadyDislikes = in_array(Auth::user()->id, $dislikes);

        if ($isAlreadyLikes) {
            $react = PostReact::where('post_id', $post->id)->where('user_id', Auth::user()->id)->first();
            $react->delete();

            return back();
        } elseif ($isAlreadyDislikes) {
            $react = PostReact::where('post_id', $post->id)->where('user_id', Auth::user()->id)->first();
            $react->delete();

            $react = new PostReact();
            $react->post_id = $post->id;
            $react->user_id = Auth::user()->id;
            $react->type = 'like';
            $react->save();

            return back();
        } else {
            $react = new PostReact();
            $react->post_id = $post->id;
            $react->user_id = Auth::user()->id;
            $react->type = 'like';
            $react->save();

            return back();
        }
    }

    public function dislike(Request $request, Post $post)
    {
        $likes = $post->with('reacts')->first()->reacts()->where('post_id', $post->id)->where('type', 'like')->get()->pluck('user_id')->toArray();
        $dislikes = $post->with('reacts')->first()->reacts()->where('post_id', $post->id)->where('type', 'dislike')->get()->pluck('user_id')->toArray();
        $isAlreadyLikes = in_array(Auth::user()->id, $likes);
        $isAlreadyDislikes = in_array(Auth::user()->id, $dislikes);

        if ($isAlreadyDislikes) {
            $react = PostReact::where('post_id', $post->id)->where('user_id', Auth::user()->id)->first();
            $react->delete();

            return back();
        } elseif ($isAlreadyLikes) {
            $react = PostReact::where('post_id', $post->id)->where('user_id', Auth::user()->id)->first();
            $react->delete();

            $react = new PostReact();
            $react->post_id = $post->id;
            $react->user_id = Auth::user()->id;
            $react->type = 'dislike';
            $react->save();

            return back();
        } else {
            $react = new PostReact();
            $react->post_id = $post->id;
            $react->user_id = Auth::user()->id;
            $react->type = 'dislike';
            $react->save();

            return back();
        }
    }
}
