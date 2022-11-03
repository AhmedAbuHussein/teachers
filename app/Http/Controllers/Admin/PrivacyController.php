<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Privacy;
use Illuminate\Http\Request;

class PrivacyController extends Controller
{
    public function index()
    {
        $items = Privacy::get();
        return view('admin.privacy.index', compact('items'));
    }

    public function create()
    {
        return view('admin.privacy.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            "title"=> 'required|string',
            "text"=> "required|string",
        ]);
        $data = $request->only(['title', 'text']);
        Privacy::create($data);

        return redirect()->route('dashboard.privacy.index')->with([
            "message"=> "تم اضافة العنصر بنجاح",
            'icon'=> "success",
        ]);
    }

    public function edit(Privacy $privacy)
    {
        return view('admin.privacy.edit', compact('privacy'));
    }

    public function update(Request $request, Privacy $privacy)
    {
        $request->validate([
            "title"=> 'required|string',
            "text"=> "required|string",
        ]);
        $data = $request->only(['title', 'text']);
        $privacy->update($data);

        return redirect()->route('dashboard.privacy.index')->with([
            "message"=> "تم تعديل العنصر بنجاح",
            'icon'=> "success",
        ]);
    }

    public function destroy(Privacy $privacy)
    {
        $privacy->delete();
        return redirect()->route('dashboard.privacy.index')->with([
            "message"=> "تم حذف العنصر بنجاح",
            'icon'=> "success",
        ]);
    }
}
