<?php

namespace App\Http\Controllers\Web;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $user = auth()->user();
            return view('pages.web.profile.list', compact('user'));
        }
        return view('pages.web.profile.main');
    }

    public function edit(User $user)
    {
        return view('pages.web.profile.input', ['data' => auth()->user()]);
    }

    public function update(Request $request)
    {
        //dd($request->all());
        $user = User::find(auth()->user()->id);
        $validators = Validator::make($request->all(), [
            'name' => 'required|max:255,min:3|unique:users,name,' . $user->id,
            'nim' => 'required|max:255,min:3|unique:users,nim,' . $user->id,
            'prodi' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'phone' => 'required|digits:12|unique:users,phone,' . $user->id,
            'dormitory' => 'required|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        if ($validators->fails()) {
            $errors = $validators->errors();
            if ($errors->has('image')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('image')
                ]);
            } elseif ($errors->has('name')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('name')
                ]);
            } elseif ($errors->has('nim')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('nim')
                ]);
            } elseif ($errors->has('prodi')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('prodi')
                ]);
            } elseif ($errors->has('email')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('email')
                ]);
            } elseif ($errors->has('phone')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('phone')
                ]);
            } elseif ($errors->has('dormitory')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('dormitory')
                ]);
            }
        }

        if ($request->hasFile('image')) {
            $request->file('image')
                ->move(public_path('public/profiles'), $request->file('image')->getClientOriginalName());
            $user->image = $request->file('image')->getClientOriginalName();
        }

        $user->name = $request->name;
        $user->nim = $request->nim;
        $user->prodi = $request->prodi;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->dormitory = $request->dormitory;
        $user->update();

        return response()->json([
            'alert' => 'success',
            'message' => 'Profile berhasil diperbarui',
        ]);
    }
}
