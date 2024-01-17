<?php

namespace App\Http\Controllers\Web;

use App\Models\Announcement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            // $announcements = Announcement::orderBy('created_at', 'desc')->get();
            $announcements = Announcement::where('category_id', '=', 2)
                ->orWhere('category_id', '=', 1)
                ->orWhere('category_id', '=', 3)
                ->orWhere('category_id', '=', 4)
                ->orderBy('created_at', 'desc')->limit(5)->get();
            return view('pages.web.dashboard.list', compact('announcements'));
        }
        return view('pages.web.dashboard.main');
    }

    public function show($id)
    {
        $announcement = Announcement::findOrFail($id);
        return view('pages.web.dashboard.show', compact('announcement'));
    }
}
