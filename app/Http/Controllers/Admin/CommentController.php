<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;

class CommentController extends Controller
{
    public function index()
    {
        $items = Comment::with("post", 'user')->get();
        return view('admin.comments.index', compact('items'));
    }

    public function create()
    {
        $users = User::get();
        $posts = Post::get();
        return view('admin.comments.create', compact('users', 'posts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            "text"=> 'required|string',
            "user_id"=> 'required|numeric|exists:users,id',
            "post_id"=> 'required|numeric|exists:posts,id',
        ]);
        $data = $request->except(["_token", '_method']);
        Comment::create($data);

        return redirect()->route('dashboard.comments.index')->with([
            "message"=> "تم اضافة العنصر بنجاح",
            'icon'=> "success",
        ]);
    }

    public function edit(Comment $comment)
    {
        $users = User::get();
        $posts = Post::get();
        return view('admin.comments.edit', compact('comment' ,'posts', 'users'));
    }

    public function update(Request $request, Comment $comment)
    {
       
        $request->validate([
            "text"=> 'required|string',
            "user_id"=> 'required|numeric|exists:users,id',
            "post_id"=> 'required|numeric|exists:posts,id',
        ]);
        $data = $request->except(["_token", '_method']);
        $comment->update($data);

        return redirect()->route('dashboard.comments.index')->with([
            "message"=> "تم تعديل العنصر بنجاح",
            'icon'=> "success",
        ]);
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();
        return redirect()->route('dashboard.comments.index')->with([
            "message"=> "تم حذف العنصر بنجاح",
            'icon'=> "success",
        ]);

    }
}
