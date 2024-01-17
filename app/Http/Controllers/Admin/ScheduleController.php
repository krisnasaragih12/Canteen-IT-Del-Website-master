<?php

namespace App\Http\Controllers\Admin;

use App\Models\Schedule;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $schedules = Schedule::orderBy('id', 'desc')->get();
            return view('pages.admin.schedule.list', compact('schedules'));
        }
        return view('pages.admin.schedule.main');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.schedule.input', ['schedule' => new Schedule]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validators = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'description' => 'required',
            'file_schedule' => 'required',
            'file_map' => 'required',
        ]);

        if ($validators->fails()) {
            $errors = $validators->errors();
            if ($errors->has('name')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('name')
                ]);
            } else if ($errors->has('description')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('description')
                ]);
            } else if ($errors->has('file_schedule')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('file_schedule')
                ]);
            } else if ($errors->has('file_map')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('file_map')
                ]);
            }
        }

        $schedule = new Schedule;

        $request->file('file_schedule')->storeAs('public/schedule', $request->file('file_schedule')->getClientOriginalName());
        $schedule->file_schedule = $request->file('file_schedule')->getClientOriginalName();

        $request->file('file_map')->storeAs('public/schedule', $request->file('file_map')->getClientOriginalName());
        $schedule->file_map = $request->file('file_map')->getClientOriginalName();

        $schedule->name = $request->name;
        $schedule->description = $request->description;
        $schedule->save();

        return response()->json([
            'alert' => 'success',
            'message' => 'Denah kantin dan jadwal piket berhasil ditambahkan',
        ]);
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
        return view('pages.admin.schedule.input', compact('schedule'));
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
        $validators = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'description' => 'required',
            'file_schedule' => 'required',
            'file_map' => 'required',
        ]);

        if ($validators->fails()) {
            $errors = $validators->errors();
            if ($errors->has('name')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('name')
                ]);
            } else if ($errors->has('description')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('description')
                ]);
            } else if ($errors->has('file_schedule')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('file_schedule')
                ]);
            } else if ($errors->has('file_map')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('file_map')
                ]);
            }
        }

        $request->file('file_schedule')->storeAs('public/schedule', $request->file('file_schedule')->getClientOriginalName());
        $schedule->file_schedule = $request->file('file_schedule')->getClientOriginalName();

        $request->file('file_map')->storeAs('public/schedule', $request->file('file_map')->getClientOriginalName());
        $schedule->file_map = $request->file('file_map')->getClientOriginalName();

        $schedule->name = $request->name;
        $schedule->description = $request->description;
        $schedule->update();

        return response()->json([
            'alert' => 'success',
            'message' => 'Denah kantin dan jadwal piket berhasil diupdate',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function destroy(Schedule $schedule)
    {
        $file_schedule = public_path('storage/schedules/' . $schedule->file_schedule);
        if (file_exists($file_schedule)) {
            unlink($file_schedule);
        }
        $fiel_map = public_path('storage/schedules/' . $schedule->file_map);
        if (file_exists($fiel_map)) {
            unlink($fiel_map);
        }
        $schedule->delete();
        return response()->json([
            'alert' => 'success',
            'message' => 'Denah kantin dan jadwal piket berhasil dihapus',
        ]);
    }
}
