<?php

namespace App\Http\Controllers\Web;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Suggest;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $comments = Comment::where('parent_id', null)->orderBy('created_at', 'desc')->paginate(10);
            return view('pages.web.comment.list', compact('comments'));
        }
        return view('pages.web.comment.main');
    }

    public function create()
    {
        return view('pages.web.comment.input', ['data' => new Comment]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'comment' => 'max:255',
            'suggest' => 'max:255',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('comment')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('comment'),
                ]);
            } elseif ($errors->has('suggest')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('suggest'),
                ]);
            }
        }

        if ($request->comment == null && $request->suggest == null) {
            return response()->json([
                'alert' => 'error',
                'message' => 'Please fill in the form',
            ]);
        } elseif ($request->comment == null) {
            $suggest = new Suggest();
            $suggest->user_id = auth()->user()->id;
            $suggest->content = $request->suggest;
            $suggest->save();
            return response()->json([
                'alert' => 'success',
                'message' => 'Suggest has been added',
            ]);
        } elseif ($request->suggest == null) {
            $comment = new Comment();
            $comment->user_id = auth()->user()->id;
            $comment->content = $request->comment;
            $comment->save();
            return response()->json([
                'alert' => 'success',
                'message' => 'Comment has been added',
            ]);
        } else {
            $comment = new Comment;
            $comment->content = $request->comment;
            $comment->user_id = auth()->user()->id;
            $comment->save();
            $suggset = new Suggest;
            $suggset->content = $request->suggest;
            $suggset->user_id = auth()->user()->id;
            $suggset->save();
            return response()->json([
                'alert' => 'success',
                'message' => 'Comment and Suggest has been added',
            ]);
        }
    }

    public function destroy_comment($id)
    {
        $comment = Comment::find($id);
        $comment->delete();
        return response()->json([
            'alert' => 'success',
            'message' => 'Comment has been deleted',
        ]);
    }

    public function destroy_suggest($id)
    {
        $suggest = Suggest::find($id);
        $suggest->delete();
        return response()->json([
            'alert' => 'success',
            'message' => 'Suggest has been deleted',
        ]);
    }
}
