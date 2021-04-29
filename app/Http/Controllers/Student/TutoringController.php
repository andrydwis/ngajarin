<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Review;
use App\Models\Schedule;
use App\Models\Tutoring;
use App\Models\User;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
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
            'mentors' => User::role('mentor')->with('reviews.student.detail', 'detail')->get()
        ];

        return view('student.tutoring.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(User $user)
    {
        //
        $startDate = Carbon::now();
        $endDate = Carbon::now()->addDays(30);
        $period = CarbonPeriod::create($startDate, $endDate);
        $schedules = Schedule::where('user_id', $user->id)->get();
        $dates = [];
        $sch = [];

        if ($schedules) {
            foreach ($period as $date) {
                foreach ($schedules as $schedule) {
                    if ($date->is($schedule->day)) {
                        $dates[] = $date->format('Y-m-d');
                        $sch[] = $schedule->id;
                    }
                }
            }
            $dates = array_combine($dates, $sch);
        }

        $data = [
            'user' => $user,
            'schedules' => $schedules,
            'dates' => $dates,
            'reviews' => Review::where('mentor_id', $user->id)->inRandomOrder()->limit(3)->get(),
            'tutorings' => Tutoring::where('mentor_id', $user->id)->where('student_id', Auth::user()->id)->orderBy('created_at', 'desc')->get(),
        ];

        return view('student.tutoring.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(User $user, Request $request)
    {
        //
        $request->validate([
            'tanggal' => ['required', 'date', 'after_or_equal:now()'],
            'jam_mulai' => ['required'],
            'jam_akhir' => ['required', 'after:jam_mulai'],
            'detail' => ['required']
        ]);

        $check = Tutoring::where('mentor_id', $user->id)->where('student_id', Auth::user()->id)->where('status', 'menunggu')->first();
        if (!$check) {
            $tutoring = new Tutoring();
            $tutoring->mentor_id = $user->id;
            $tutoring->student_id = Auth::user()->id;
            $tutoring->date = $request->tanggal;
            $tutoring->hour_start = $request->jam_mulai;
            $tutoring->hour_end = $request->jam_akhir;
            $tutoring->detail = $request->detail;
            $tutoring->status = 'menunggu';
            $tutoring->save();

            Alert::success('Permintaan tutoring berhasil dibuat');

            return redirect()->route('student.tutoring.create', ['user' => $user]);
        } else {
            Alert::error('Permintaan tutoring sudah ada, harap tunggu konfimasi mentor');

            return redirect()->route('student.tutoring.create', ['user' => $user]);
        }
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tutoring  $tutoring
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user, Tutoring $tutoring)
    {
        //
        $tutoring->delete();

        Alert::success('Permintaan tutoring berhasil dibatalkan');

        return redirect()->route('student.tutoring.create', ['user' => $user]);
    }
}
