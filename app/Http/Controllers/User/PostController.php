<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use App\Models\PostBookmark;
use App\Models\PostReact;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
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
            'posts' => Post::with('tags', 'comments', 'reacts', 'creator.detail')->orderBy('created_at', 'desc')->simplePaginate(7),
            'tags' => Tag::get(),
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
            'judul' => ['required', 'string', Rule::unique(Post::class, 'title')],
            'konten' => ['required', 'string'],
            'tag' => ['required']
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
            'user' => User::with('detail')->find(Auth::user()->id)
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
            'judul' => ['required', 'string', Rule::unique(Post::class, 'title')->ignore($post)],
            'konten' => ['required', 'string'],
            'tag' => ['required']
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
        $likes = $post->reacts->where('type', 'like')->pluck('user_id')->toArray();
        $dislikes = $post->reacts->where('type', 'dislike')->pluck('user_id')->toArray();
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
        $likes = $post->reacts->where('type', 'like')->pluck('user_id')->toArray();
        $dislikes = $post->reacts->where('type', 'dislike')->pluck('user_id')->toArray();
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

    public function bookmark()
    {
        $bookmark = PostBookmark::where('user_id', Auth::user()->id)->get()->pluck('post_id')->toArray();

        $data = [
            'posts' => Post::where('id', $bookmark)->with('tags', 'comments', 'reacts', 'creator.detail')->orderBy('created_at', 'desc')->simplePaginate(7),
            'tags' => Tag::get(),
        ];

        return view('user.post.bookmark', $data);
    }

    public function bookmarkProcess(Request $request, Post $post)
    {
        $check = PostBookmark::where('user_id', Auth::user()->id)->where('post_id', $post->id)->first();

        if (!$check) {
            $bookmark = new PostBookmark();
            $bookmark->user_id = Auth::user()->id;
            $bookmark->post_id = $post->id;
            $bookmark->save();

            Alert::success('Post berhasil disimpan');
        } else {
            $check->delete();

            Alert::success('Post telah dihapus dari daftar penyimpanan anda');
        }

        return back();
    }

    public function myPost()
    {
        $data = [
            'posts' => Post::where('created_by', Auth::user()->id)->with('tags', 'comments', 'reacts', 'creator.detail')->orderBy('created_at', 'desc')->simplePaginate(7),
            'tags' => Tag::get(),
        ];

        return view('user.post.my-post', $data);
    }

    public function search(Request $request)
    {
        if ($request->kategori != 'semua') {
            $category = Tag::where('id', $request->kategori)->first();
            if ($request->keyword) {
                $result = $category->posts->where('title', 'like', '%' . $request->keyword . '%')->pluck('id')->toArray();
            } else {
                $result = $category->posts->pluck('id')->toArray();
            }
        } else {
            if ($request->keyword) {
                $result = Post::where('title', 'like', '%' . $request->keyword . '%')->get()->pluck('id')->toArray();
            } else {
                $result = Post::get()->pluck('id')->toArray();
            }
            
        }

        $data = [
            'posts' => Post::whereIn('id', $result)->simplePaginate(7),
            'tags' => Tag::get(),
            'category' => Tag::find($request->kategori)->name ?? 'Semua',
            'keyword' => $request->keyword
        ];

        return view('user.post.search', $data);
    }
}
