<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Request as RequestModel;
use Illuminate\Support\Facades\Validator;

class RequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $requestsModel = RequestModel::where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->paginate(10);
            return view('pages.web.requests.list', compact('requestsModel'));
        }
        return view('pages.web.requests.main');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::all();
        return view('pages.web.requests.input', ['requestsModel' => new RequestModel, 'permissions' => $permissions]);
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
            'permission_id' => 'required',
            'description' => 'required',
        ]);

        if ($validators->fails()) {
            $errors = $validators->errors();
            if ($errors->has('permission_id')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('permission_id')
                ]);
            } else if ($errors->has('description')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('description')
                ]);
            }
        }

        $requestModel = new RequestModel;
        if ($request->hasFile('file')) {
            $request->file('file')->storeAs('public/requests', $request->file('file')->getClientOriginalName());
            $requestModel->file = $request->file('file')->getClientOriginalName();
        }
        $requestModel->user_id = auth()->user()->id;
        $requestModel->description = $request->description;
        $requestModel->permission_id = $request->permission_id;
        $requestModel->save();

        return response()->json([
            'alert' => 'success',
            'message' => 'Request berhasil dikirim.',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $permissions = Permission::all();
        $requestsModel = RequestModel::find($id);
        return view('pages.web.requests.input', ['requestsModel' => $requestsModel, 'permissions' => $permissions]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $requestModel = RequestModel::find($id);
        $validators = Validator::make($request->all(), [
            'description' => 'required',
            'permission_id' => 'required',
        ]);

        if ($validators->fails()) {
            $errors = $validators->errors();
            if ($errors->has('description')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('description')
                ]);
            } else if ($errors->has('permission_id')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('permission_id')
                ]);
            }
        }

        if ($request->hasFile('file')) {
            $request->file('file')->storeAs('public/requests', $request->file('file')->getClientOriginalName());
            $requestModel->file = $request->file('file')->getClientOriginalName();
        }

        $requestModel->description = $request->description;
        $requestModel->permission_id = $request->permission_id;
        $requestModel->update();

        return response()->json([
            'alert' => 'success',
            'message' => 'Request berhasil diperbarui.',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $requestModel = RequestModel::find($id);
        // if ($requestModel->file) {
        //     unlink(storage_path('public/requests/' . $requestModel->file));
        // }
        $file = public_path('public/requests/' . $requestModel->file);
        if (file_exists($file)) {
            unlink($file);
        }
        $requestModel->delete();
        return response()->json([
            'alert' => 'success',
            'message' => 'Request berhasil dihapus.',
        ]);
    }
}
