<?php

namespace App\Http\Controllers\Supervisor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;

class CommentController extends Controller
{
    public function index()
    {
        $items = Comment::with("post", 'user')->whereHas('post', function($query){
            $query->whereHas('user', function($builder){
                $builder->where('level_id', auth()->user()->level_id);
            });
        })->get();
        return view('supervisor.comments.index', compact('items'));
    }

    public function create()
    {
        $user = auth()->user();
        $posts = Post::whereHas("user", function($query) use($user){
            $query->where('level_id', $user->level_id);
        })->get();
        return view('supervisor.comments.create', compact('posts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            "text"=> 'required|string',
            "post_id"=> 'required|numeric|exists:posts,id',
        ]);
        $data = $request->except(["_token", '_method']);
        $data['user_id'] = auth()->id();
        Comment::create($data);

        return redirect()->route('supervisor.comments.index')->with([
            "message"=> "تم اضافة العنصر بنجاح",
            'icon'=> "success",
        ]);
    }

    public function edit(Comment $comment)
    {
        $user = auth()->user();
        $users = User::where("level_id", auth()->user()->level_id)->get();
        $posts = Post::whereHas("user", function($query) use($user){
            $query->where('level_id', $user->level_id);
        })->get();
        return view('supervisor.comments.edit', compact('comment' ,'posts', 'users'));
    }

    public function update(Request $request, Comment $comment)
    {
       
        $request->validate([
            "text"=> 'required|string',
            "post_id"=> 'required|numeric|exists:posts,id',
        ]);
        $data = $request->except(["_token", '_method']);
        $comment->update($data);

        return redirect()->route('supervisor.comments.index')->with([
            "message"=> "تم تعديل العنصر بنجاح",
            'icon'=> "success",
        ]);
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();
        return redirect()->route('supervisor.comments.index')->with([
            "message"=> "تم حذف العنصر بنجاح",
            'icon'=> "success",
        ]);

    }
}
