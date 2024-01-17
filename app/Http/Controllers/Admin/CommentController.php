<?php

namespace App\Http\Controllers\Admin;

use App\Models\Comment;
use App\Models\Suggest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $comments = Comment::where('parent_id', NULL)->orderBy('created_at', 'desc')->get();
            $suggests = Suggest::orderBy('created_at', 'desc')->get();
            return view('pages.admin.comment.list', compact('comments', 'suggests'));
        }
        return view('pages.admin.comment.main');
    }

    public function reply(Request $request, Comment $comment)
    {
        $validators = Validator::make($request->all(), [
            'content' => 'required',
        ]);

        if ($validators->fails()) {
            $errors = $validators->errors();
            if ($errors->has('content')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('content')
                ]);
            }
        }

        $reply = new Comment;
        $reply->parent_id = $comment->id;
        $reply->user_id = $request->user()->id;
        $reply->content = $request->content;
        $reply->save();

        return response()->json([
            'alert' => 'success',
            'message' => 'Comment berhasil di balas',
        ]);
    }

    public function destroy(Comment $comment)
    {
        //dd($comment);
        $comment->delete();
        return response()->json([
            'alert' => 'success',
            'message' => 'Comment berhasil di hapus',
        ]);
    }
}
