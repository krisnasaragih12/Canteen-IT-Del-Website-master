<?php

namespace App\Http\Controllers\Web;

use App\Models\Report;
use App\Models\Allergy;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class AllergyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $report = Report::where('user_id', auth()->user()->id)->first();
            return view('pages.web.allergy.list', compact('report'));
        }
        return view('pages.web.allergy.main');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $allergies = Allergy::all();
        return view('pages.web.allergy.input', ['data' => new Report, 'allergies' => $allergies]);
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
            'allergy_id' => 'required',
        ]);

        if ($validators->fails()) {
            $errors = $validators->errors();
            if ($errors->has('allergy_id')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('allergy_id')
                ]);
            }
        }

        $report = new Report;
        $report->user_id = auth()->user()->id;
        $report->allergy_id = $request->allergy_id;
        if ($request->has('file')) {
            $request->file('file')->storeAs('public/allergies', $request->file('file')->getClientOriginalName());
            $report->file = $request->file('file')->getClientOriginalName();
        }
        $report->save();

        return response()->json([
            'alert' => 'success',
            'message' => 'Alergi berhasil ditambahkan',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function show(Report $report)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $allergies = Allergy::all();
        $report = Report::find($id);
        return view('pages.web.allergy.input', ['data' => $report, 'allergies' => $allergies]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $report = Report::find($id);
        $validators = Validator::make($request->all(), [
            'allergy_id' => 'required',
        ]);

        if ($validators->fails()) {
            $errors = $validators->errors();
            if ($errors->has('allergy_id')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('allergy_id')
                ]);
            }
        }

        $report->allergy_id = $request->allergy_id;
        if ($request->has('file')) {
            $request->file('file')->storeAs('public/allergies', $request->file('file')->getClientOriginalName());
            $report->file = $request->file('file')->getClientOriginalName();
        }
        $report->update();

        return response()->json([
            'alert' => 'success',
            'message' => 'Alergi berhasil diubah',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function destroy(Report $report)
    {
        if ($report->file) {
            unlink(public_path('storage/allergies/' . $report->file));
        }
        $report->delete();

        return response()->json([
            'alert' => 'success',
            'message' => 'Alergi berhasil dihapus',
        ]);
    }
}
