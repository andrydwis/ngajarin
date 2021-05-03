<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use App\Models\Submission;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationHandlerController extends Controller
{
    //
    public function handling(Notification $notification)
    {
        if ($notification->type == 'App\Notifications\NewSubmission') {
            $submission = Submission::find($notification->data['submission_id']);
            $course = $submission->course;

            $notification->read_at = Carbon::now();
            $notification->save();

            return redirect()->route('admin.course.submission.review', ['course' => $course, 'submission' => $submission]);
        }
    }

    public function readAll()
    {
        $user = User::find(Auth::user()->id);

        $user->unreadNotifications->markAsRead();

        return back();
    }

    public function destroy(Notification $notification)
    {
        $notification->delete();

        return back();
    }

    public function destroyAll()
    {
        $user = User::find(Auth::user()->id);

        $user->notifications()->delete();

        return back();
    }
}
