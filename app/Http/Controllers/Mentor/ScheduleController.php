<?php

namespace App\Http\Controllers\Mentor;

use App\Http\Controllers\Controller;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\MessageBag;
use RealRashid\SweetAlert\Facades\Alert;

class ScheduleController extends Controller
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
            'schedules' => Schedule::where('user_id', Auth::user()->id)->get()
        ];

        return view('mentor.schedule.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('mentor.schedule.create');
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
            'hari' => ['required'],
            'jam_mulai' => ['required'],
            'jam_akhir' => ['required', 'after:jam_mulai']
        ]);

        $check = Schedule::where('day', $request->hari)->where('user_id', Auth::user()->id)->first();
        if ($check) {
            Alert::error('Jadwal pada hari itu sudah ada');

            return redirect()->route('mentor.schedule.index');
        }
        $schedule = new Schedule();
        $schedule->user_id = Auth::user()->id;
        $schedule->day = $request->hari;
        $schedule->hour_start = $request->jam_mulai;
        $schedule->hour_end = $request->jam_akhir;
        $schedule->save();

        Alert::success('Jadwal berhasil dibuat');

        return redirect()->route('mentor.schedule.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function show(Schedule $schedule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function edit(Schedule $schedule)
    {
        //
        $data = [
            'schedule' => $schedule
        ];

        return view('mentor.schedule.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Schedule $schedule)
    {
        //
        $request->validate([
            'hari' => ['required'],
            'jam_mulai' => ['required'],
            'jam_akhir' => ['required', 'after:hour_start']
        ]);

        $check = Schedule::where('day', $request->hari)->where('user_id', Auth::user()->id)->where('id', '!=', $schedule->id)->first();
        if ($check) {
            Alert::error('Jadwal pada hari itu sudah ada');

            return redirect()->route('mentor.schedule.edit', ['schedule' => $schedule]);
        }
        $schedule->user_id = Auth::user()->id;
        $schedule->day = $request->hari;
        $schedule->hour_start = $request->jam_mulai;
        $schedule->hour_end = $request->jam_akhir;
        $schedule->save();

        Alert::success('Jadwal berhasil diedit');

        return redirect()->route('mentor.schedule.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function destroy(Schedule $schedule)
    {
        //
        $schedule->delete();

        Alert::success('Jadwal berhasil dihapus');

        return redirect()->route('mentor.schedule.index');
    }
}
