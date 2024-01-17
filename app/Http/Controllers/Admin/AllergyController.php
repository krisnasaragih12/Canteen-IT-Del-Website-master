<?php

namespace App\Http\Controllers\Admin;

use App\Models\Report;
use App\Models\Allergy;
use PDF;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class AllergyController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $keywords = $request->get('keywords');
            $report = Report::join('allergies', 'reports.allergy_id', '=', 'allergies.id')
                ->select('reports.*', 'allergies.name as allergy_name')
                ->where('allergies.name', 'like', '%' . $keywords . '%')
                ->orderBy('reports.created_at', 'desc')
                ->paginate(15);
            return view('pages.admin.allergy.list', compact('report'));
        }
        $report = Report::all();
        return view('pages.admin.allergy.main', compact('report'));
    }

    public function destroy($id)
    {
        $report = Report::find($id);
        $file = public_path('storage/allergies/' . $report->file);
        if (file_exists($file)) {
            unlink($file);
        }
        $report->delete();
        return response()->json([
            'alert' => 'success',
            'message' => 'Data alergi mahasiswa berhasil dihapus',
        ]);
    }

    public function pdf()
    {
        $report = Report::orderBy('created_at', 'desc')->get();
        $pdf = PDF::loadView('pages.admin.allergy.pdf', ['report' => $report]);
        return $pdf->stream();
    }
}
