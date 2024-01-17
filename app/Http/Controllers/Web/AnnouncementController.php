<?php

namespace App\Http\Controllers\Web;

use App\Models\Announcement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AnnouncementController extends Controller
{
    public function index(Request $request)
    {
        if (request()->ajax()) {
            $keywords = $request->get('keywords');
            $announcements = Announcement::where('title', 'like', '%' . $keywords . '%')->orderBy('created_at', 'desc')->paginate(10);
            return view('pages.web.announcements.list', compact('announcements'));
        }
        return view('pages.web.announcements.main');
    }

    public function show(Announcement $announcement)
    {
        return view('pages.web.announcements.show', compact('announcement'));
    }
}
