<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        $items = Post::get();
        return view('admin.posts.index', compact('items'));
    }

    public function create()
    {
        $users = User::get();
        return view('admin.posts.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            "title"=> 'required|string',
            "type"=> "required|string|in:text,video,url,image",
            "text"=> "nullable|required_if:type,text|string",
            "url"=> "nullable|required_if:type,url|string",
            "src"=> "nullable|sometimes|required_if:type,video|required_if:type,image",
            "is_active"=> 'required|boolean',
            "user_id"=> 'required|numeric|exists:users,id',
        ]);
        $data = $request->except(["src", "text", "url", "_token", '_method']);
        if(in_array($request->type, ['video',"image"])){
            if($request->hasFile("src")){
                $name = "post_" . time(). "_". Str::random() . ".". $request->file("src")->getClientOriginalExtension();
                Storage::putFileAs("images/", $request->file("src"), $name);
                $data["src"] = "images/$name";
            }
        }else if($request->type == 'url'){
            $data['src'] = $request->url;
        }else{
            $data['src'] = $request->text;
        }
        
        Post::create($data);

        return redirect()->route('dashboard.posts.index')->with([
            "message"=> "تم اضافة العنصر بنجاح",
            'icon'=> "success",
        ]);
    }

    public function edit(Post $post)
    {
        $users = User::get();
        return view('admin.posts.edit', compact('post', 'users'));
    }

    public function update(Request $request, Post $post)
    {
       
        $request->validate([
            "title"=> 'required|string',
            "type"=> "required|string|in:text,video,url,image",
            "text"=> "nullable|required_if:type,text|string",
            "url"=> "nullable|required_if:type,url|string",
            "src"=> "nullable|sometimes|required_if:type,video|required_if:type,image",
            "is_active"=> 'required|boolean',
            "user_id"=> 'required|numeric|exists:users,id',
        ]);
        $data = $request->except(["src","text", "url", "_token", '_method']);
        if(in_array($request->type, ['video',"image"])){
            if($request->hasFile("src")){
                $old = $post->src;
                if($old && array_key_exists($post->type, ['video',"image"])){
                    Storage::delete($old);
                }
                $name = "post_" . time(). "_". Str::random() . ".". $request->file("src")->getClientOriginalExtension();
                Storage::putFileAs("images/", $request->file("src"), $name);
                $data["src"] = "images/$name";
            }
        }else if($request->type == 'url'){
            $old = $post->src;
            if($old && array_key_exists($post->type, ['video',"image"])){
                Storage::delete($old);
            }
            $data['src'] = $request->url;
        }else{
            $old = $post->src;
            if($old && array_key_exists($post->type, ['video',"image"])){
                Storage::delete($old);
            }
            $data['src'] = $request->text;
        }

        $post->update($data);

        return redirect()->route('dashboard.posts.index')->with([
            "message"=> "تم تعديل العنصر بنجاح",
            'icon'=> "success",
        ]);
    }

    public function destroy(Post $post)
    {
        $old = $post->src;
        if($old && array_key_exists($post->type, ['video',"image"])){
            Storage::delete($old);
        }
        $post->delete();
        return redirect()->route('dashboard.posts.index')->with([
            "message"=> "تم حذف العنصر بنجاح",
            'icon'=> "success",
        ]);

    }
}
