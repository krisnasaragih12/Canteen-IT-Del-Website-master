<?php

namespace App\Http\Controllers\Admin;

use App\Models\Announcement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;

class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $keywords = $request->get('keywords');
            //$announcements = Announcement::with('category')->orderBy('id', 'desc')->paginate(10);
            $announcements = Announcement::join('categories', 'categories.id', '=', 'announcements.category_id')
                ->select('announcements.*', 'categories.name as category_name')
                ->where('announcements.title', 'like', '%' . $keywords . '%')
                ->orWhere('announcements.content', 'like', '%' . $keywords . '%')
                ->orWhere('categories.name', 'like', '%' . $keywords . '%')
                ->orderBy('announcements.id', 'desc')
                ->paginate(10);
            return view('pages.admin.announcements.list', compact('announcements'));
        }
        return view('pages.admin.announcements.main');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('pages.admin.announcements.input', ['data' => new Announcement, 'categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validators = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'content' => 'required',
            'category_id' => 'required',
        ]);

        if ($validators->fails()) {
            $errors = $validators->errors();
            if ($errors->has('title')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('title')
                ]);
            } else if ($errors->has('content')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('content')
                ]);
            } else if ($errors->has('category_id')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('category_id')
                ]);
            }
        }
        $announcement = new Announcement;

        if ($request->hasFile('file')) {
            $request->file('file')->storeAs('public/announcements', $request->file('file')->getClientOriginalName());
            $announcement->file = $request->file('file')->getClientOriginalName();
        }


        $announcement->title = $request->title;
        $announcement->content = $request->content;
        $announcement->category_id = $request->category_id;
        $announcement->save();

        return response()->json([
            'alert' => 'success',
            'message' => 'Announcement berhasil ditambahkan',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function show(Announcement $announcement)
    {
        return view('pages.admin.announcements.list', compact('announcement'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function edit(Announcement $announcement)
    {
        $categories = Category::all();
        return view('pages.admin.announcements.input', ['data' => $announcement, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Announcement $announcement)
    {
        $validators = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'content' => 'required',
            'category_id' => 'required',
        ]);

        if ($validators->fails()) {
            $errors = $validators->errors();
            if ($errors->has('title')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('title')
                ]);
            } else if ($errors->has('content')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('content')
                ]);
            } else if ($errors->has('category_id')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('category_id')
                ]);
            }
        }

        if ($request->hasFile('file')) {
            $request->file('file')->storeAs('public/announcements', $request->file('file')->getClientOriginalName());
            $announcement->file = $request->file('file')->getClientOriginalName();
        }
        $announcement->title = $request->title;
        $announcement->content = $request->content;
        $announcement->category_id = $request->category_id;
        $announcement->update();

        return response()->json([
            'alert' => 'success',
            'message' => 'Announcement berhasil diupdate',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Announcement $announcement)
    {

        $file = public_path('storage/announcements/' . $announcement->file);
        if (file_exists($file)) {
            unlink($file);
        }
        $announcement->delete();
        return response()->json([
            'alert' => 'success',
            'message' => 'Announcement berhasil dihapus',
        ]);
    }
}
