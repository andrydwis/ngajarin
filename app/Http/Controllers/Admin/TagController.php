<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class TagController extends Controller
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
            'tags' => Tag::get(),
        ];

        return view('admin.tag.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.tag.create');
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
            'nama' => ['required', 'string'],
            'icon' => ['image']
        ]);

        $tag = new Tag();
        $tag->name = $request->nama;
        $tag->slug = Str::slug($request->nama);
        $tag->icon = $request->file('icon')->store('tag');
        $tag->save();

        Alert::success('Tag berhasil ditambahkan');

        return redirect()->route('admin.tag.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        //
        $data = [
            'tag' => $tag,
        ];

        return view('admin.tag.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {
        //
        $request->validate([
            'nama' => ['required', 'string'],
            'icon' => ['image']
        ]);

        Storage::delete($tag->icon);
        $tag->name = $request->nama;
        $tag->slug = Str::slug($request->nama);
        $tag->icon = $request->file('icon')->store('tag');
        $tag->save();

        Alert::success('Tag berhasil diupdate');

        return redirect()->route('admin.tag.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        //
        Storage::delete($tag->icon);
        $tag->delete();

        Alert::success('Tag berhasil dihapus');

        return redirect()->route('admin.tag.index');
    }
}
