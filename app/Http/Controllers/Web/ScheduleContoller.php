<?php

namespace App\Http\Controllers\Web;

use App\Models\Schedule;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ScheduleContoller extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $schedules = Schedule::orderBy('created_at', 'desc')->paginate(10);
            return view('pages.web.schedule.list', compact('schedules'));
        }
        return view('pages.web.schedule.main');
    }
}
