<?php

namespace App\Http\Middleware;

use App\Models\ClassroomMember;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class VerifyClass
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $check = ClassroomMember::where('classroom_id', $request->route('classroom')->id)->where('user_id', Auth::user()->id)->first();

        if (!$check) {
            Alert::warning('Anda tidak memiliki akses ke kelas ini');

            return back();
        }

        return $next($request);
    }
}
