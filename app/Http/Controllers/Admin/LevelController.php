<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Level;
use Illuminate\Http\Request;

class LevelController extends Controller
{
    public function index()
    {
        $items = Level::withCount("courses")->get();
        return view('admin.levels.index', compact('items'));
    }

    public function create()
    {
        return view('admin.levels.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            "title"=> 'required|string',
            "text"=> 'required|string',
        ]);
        $data = $request->except(["_token", '_method']);
        Level::create($data);

        return redirect()->route('dashboard.levels.index')->with([
            "message"=> "تم اضافة العنصر بنجاح",
            'icon'=> "success",
        ]);
    }

    public function edit(Level $level)
    {
        return view('admin.levels.edit', compact('level'));
    }

    public function update(Request $request, Level $level)
    {
       
        $request->validate([
            "title"=> 'required|string',
            "text"=> 'required|string',
        ]);
        $data = $request->except(["_token", '_method']);
        $level->update($data);

        return redirect()->route('dashboard.levels.index')->with([
            "message"=> "تم تعديل العنصر بنجاح",
            'icon'=> "success",
        ]);
    }

    public function destroy(Level $level)
    {
        $level->delete();
        return redirect()->route('dashboard.levels.index')->with([
            "message"=> "تم حذف العنصر بنجاح",
            'icon'=> "success",
        ]);

    }
}
