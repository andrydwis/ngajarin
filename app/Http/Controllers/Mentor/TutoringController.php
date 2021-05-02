<?php

namespace App\Http\Controllers\Mentor;

use App\Http\Controllers\Controller;
use App\Models\Schedule;
use App\Models\Tutoring;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class TutoringController extends Controller
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
            'tutorings' => Tutoring::where('mentor_id', Auth::user()->id)->with('student')->orderBy('date', 'desc')->get()
        ];

        return view('mentor.tutoring.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(User $user)
    {
        //

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user)
    {
        //

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tutoring  $tutoring
     * @return \Illuminate\Http\Response
     */
    public function show(Tutoring $tutoring)
    {
        //
        if ($tutoring->mentor_id != Auth::user()->id) {
            return abort(403, 'Unauthorized action.');
        }

        $data = [
            'tutoring' => $tutoring
        ];

        return view('mentor.tutoring.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tutoring  $tutoring
     * @return \Illuminate\Http\Response
     */
    public function edit(Tutoring $tutoring)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tutoring  $tutoring
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tutoring $tutoring)
    {
        //
        $request->validate([
            'status' => ['required']
        ]);

        $isFuture = Carbon::parse($tutoring->date . ' ' . $tutoring->hour_start)->isFuture();
        if ($isFuture) {
            $check = Tutoring::where('date', $tutoring->date)->where('status', 'diterima')->first();
            if ($check && $request->status == 'diterima') {
                if ($tutoring->hour_start >= $check->hour_start && $tutoring->hour_start < $check->hour_end) {
                    session()->flash('message', 'Conflict Request');

                    return redirect()->route('mentor.tutoring.show', ['tutoring' => $tutoring]);
                } elseif ($tutoring->hour_end > $check->hour_start && $tutoring->hour_end <= $check->hour_end) {
                    session()->flash('message', 'Conflict Request');

                    return redirect()->route('mentor.tutoring.show', ['tutoring' => $tutoring]);
                } else {
                    $tutoring->status = $request->status;
                    $tutoring->save();

                    $notifications = User::find(Auth::user()->id)->notifications;

                    foreach ($notifications as $notification) {
                        if ($notification->type == 'App\Notifications\NewTutoringRequest') {
                            $tutoring = Tutoring::find($notification->data['tutoring_id']);

                            $notification->delete();
                        }
                    }

                    Alert::success('Permintaan tutoring berhasil diproses');

                    return redirect()->route('mentor.tutoring.show', ['tutoring' => $tutoring]);
                }
            } else {
                $tutoring->status = $request->status;
                $tutoring->save();

                $notifications = User::find(Auth::user()->id)->notifications;

                foreach ($notifications as $notification) {
                    if ($notification->type == 'App\Notifications\NewTutoringRequest') {
                        $tutoring = Tutoring::find($notification->data['tutoring_id']);

                        $notification->delete();
                    }
                }

                Alert::success('Permintaan tutoring berhasil diproses');

                return redirect()->route('mentor.tutoring.show', ['tutoring' => $tutoring]);
            }
        } else {
            $tutoring->status = 'ditolak';
            $tutoring->save();

            Alert::error('Permintaan tutoring telah kadaluwarsa');

            return redirect()->route('mentor.tutoring.show', ['tutoring' => $tutoring]);
        }
    }

    public function forceAccept(Request $request, Tutoring $tutoring)
    {
        $tutoring->status = 'diterima';
        $tutoring->save();

        Alert::success('Permintaan tutoring berhasil diproses');

        return redirect()->route('mentor.tutoring.show', ['tutoring' => $tutoring]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tutoring  $tutoring
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tutoring $tutoring)
    {
        //
    }
}
