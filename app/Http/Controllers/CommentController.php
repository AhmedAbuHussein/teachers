<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    
    public function store(Request $request, Post $post)
    {
        $request->validate([
            "text"=> "required|string",
        ]);
        
        $post->comments()->create([
            "text"=> $request->text,
            "user_id"=> auth()->id(),
        ]);

        return redirect()->route('posts.show', ['post'=> $post->id])->with([
            "message"=> "تم اضافة العنصر بنجاح",
            'icon'=> "success",
        ]);
    }


    public function destroy($post, Comment $comment)
    {
        if($comment->user_id == auth()->id() || auth()->user()->role == "admin"){
            $comment->delete();
        }
        return response()->json("done");
    }
}
