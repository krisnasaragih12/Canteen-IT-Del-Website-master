<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Request as RequestModel;
use App\Models\Permission;

class RequestController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $keywords = $request->get('keywords');
            //$requestsModel = RequestModel::orderBy('id', 'desc')->paginate(15);
            $requestsModel = RequestModel::join('permissions', 'requests.permission_id', '=', 'permissions.id')
                ->select('requests.*', 'permissions.name as permission_name')
                ->where('permissions.name', 'like', '%' . $keywords . '%')
                ->orderBy('requests.id', 'desc')
                ->paginate(10);
            return view('pages.admin.request.list', compact('requestsModel'));
            // $keywords = $request->get('keywords');
            // $requestsModel = RequestModel::join('permissions', 'requests.permission_id', '=', 'permissions.id')
            //     ->select('requests.*', 'permissions.name as permission_name')
            //     ->where('permissions.name', 'like', '%' . $keywords . '%')
            //     ->where('requests.created_at', '>=', \Carbon\Carbon::now()->subDays(1))
            //     ->orderBy('requests.id', 'desc')
            //     ->paginate(10);
            // return view('pages.admin.request.list', compact('requestsModel'));
        }
        $requestsModel = RequestModel::all();
        return view('pages.admin.request.main', compact('requestsModel'));
    }

    public function approve($id)
    {
        $request = RequestModel::find($id);
        $request->status = 'approved';
        $request->save();

        return response()->json([
            'alert' => 'success',
            'message' => 'Request berhasil diapprove',
        ]);
    }

    public function reject($id)
    {
        $request = RequestModel::find($id);
        $request->status = 'rejected';
        $request->save();

        return response()->json([
            'alert' => 'success',
            'message' => 'Request berhasil direject',
        ]);
    }
}
