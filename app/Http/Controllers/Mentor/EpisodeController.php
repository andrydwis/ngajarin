<?php

namespace App\Http\Controllers\Mentor;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Episode;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use RealRashid\SweetAlert\Facades\Alert;

class EpisodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Course $course)
    {
        //
        $data = [
            'course' => $course,
            'episodes' => Episode::where('course_id', $course->id)->get(),
        ];

        return view('mentor.episode.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Course $course)
    {
        //
        $data = [
            'course' => $course,
            'submissions' => $course->submissions
        ];

        return view('mentor.episode.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Course $course, Request $request)
    {
        //
        if ($request->tipe == 'video') {
            $request->validate([
                'judul' => ['required', 'string'],
                'link' => ['required'],
                'deskripsi' => ['required', 'string'],
                'tipe' => ['required'],
            ]);
        } elseif ($request->tipe == 'text') {
            $request->validate([
                'judul' => ['required', 'string'],
                'deskripsi' => ['required', 'string'],
                'tipe' => ['required'],
            ]);
        }

        $episode = new Episode();
        $episode->course_id = $course->id;
        $episode->title = $request->judul;
        $episode->slug = Str::slug($request->judul) . '-' . Str::random(5);
        $episode->description = $request->deskripsi;
        $episode->type = $request->tipe;
        if ($request->tipe == 'video') {
            $episode->link = Str::after($request->link, 'https://youtu.be/');
        } elseif ($request->tipe == 'text') {
            $episode->link = $request->file;
        }
        $episode->unlock_submission = $request->syarat;
        $episode->save();

        Alert::success('Episode berhasil ditambahkan');

        return redirect()->route('mentor.course.episode.index', ['course' => $course]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Episode  $episode
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course, Episode $episode)
    {
        //
        $data = [
            'course' => $course,
            'episode' => $episode
        ];

        return view('mentor.episode.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Episode  $episode
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course, Episode $episode)
    {
        //
        $data = [
            'course' => $course,
            'episode' => $episode,
            'submissions' => $course->submissions
        ];

        return view('mentor.episode.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Episode  $episode
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course, Episode $episode)
    {
        //
        if ($request->tipe == 'video') {
            $request->validate([
                'judul' => ['required', 'string'],
                'link' => ['required'],
                'deskripsi' => ['required', 'string'],
                'tipe' => ['required'],
            ]);
        } elseif ($request->tipe == 'text') {
            $request->validate([
                'judul' => ['required', 'string'],
                'deskripsi' => ['required', 'string'],
                'tipe' => ['required'],
            ]);
        }

        $episode->course_id = $course->id;
        $episode->title = $request->judul;
        $episode->slug = Str::slug($request->judul) . '-' . Str::random(5);
        $episode->description = $request->deskripsi;
        $episode->type = $request->tipe;
        if ($request->tipe == 'video') {
            $episode->link = Str::after($request->link, 'https://youtu.be/');
        } elseif ($request->tipe == 'text') {
            $episode->link = $request->file;
        }
        $episode->unlock_submission = $request->syarat;
        $episode->save();

        Alert::success('Episode berhasil diupdate');

        return redirect()->route('mentor.course.episode.index', ['course' => $course]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Episode  $episode
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course, Episode $episode)
    {
        //
        $episode->delete();

        Alert::success('Episode berhasil dihapus');

        return redirect()->route('mentor.course.episode.index', ['course' => $course]);
    }
}
