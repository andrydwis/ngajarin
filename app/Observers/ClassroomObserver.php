<?php

namespace App\Observers;

use App\Models\Classroom;
use App\Models\ClassroomMember;
use Illuminate\Support\Facades\Auth;

class ClassroomObserver
{
    /**
     * Handle the Classroom "created" event.
     *
     * @param  \App\Models\Classroom  $classroom
     * @return void
     */
    public function created(Classroom $classroom)
    {
        //
        $classroomMember = new ClassroomMember();
        $classroomMember->classroom_id = $classroom->id;
        $classroomMember->user_id = Auth::user()->id;
        $classroomMember->save();
    }

    /**
     * Handle the Classroom "updated" event.
     *
     * @param  \App\Models\Classroom  $classroom
     * @return void
     */
    public function updated(Classroom $classroom)
    {
        //
    }

    /**
     * Handle the Classroom "deleted" event.
     *
     * @param  \App\Models\Classroom  $classroom
     * @return void
     */
    public function deleted(Classroom $classroom)
    {
        //
    }

    /**
     * Handle the Classroom "restored" event.
     *
     * @param  \App\Models\Classroom  $classroom
     * @return void
     */
    public function restored(Classroom $classroom)
    {
        //
    }

    /**
     * Handle the Classroom "force deleted" event.
     *
     * @param  \App\Models\Classroom  $classroom
     * @return void
     */
    public function forceDeleted(Classroom $classroom)
    {
        //
    }
}
