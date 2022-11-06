<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        $items = Post::where("is_active", 1)->withCount("comments")->with('user')->orderBy("created_at", "DESC")->paginate(20);
        return view('posts.index', compact('items'));
    }

    public function store(Request $request)
    {
        $request->validate([
            "title"=> 'required|string',
            "type"=> "required|string|in:text,video,url,image",
            "text"=> "nullable|required_if:type,text|string",
            "url"=> "nullable|required_if:type,url|string",
            "src"=> "nullable|sometimes|required_if:type,video|required_if:type,image",
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
        $data['is_active'] = 1;
        $data['user_id'] = auth()->id();
        Post::create($data);

        return redirect()->route('posts.index')->with([
            "message"=> "تم اضافة العنصر بنجاح",
            'icon'=> "success",
        ]);
    }
}
