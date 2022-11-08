<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Level;
use Illuminate\Http\Request;

class LibraryController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->q;
        $level = $request->level;

        $items = Course::where('is_active', 1)
        ->when($search , function($query) use ($search) {
            $query->where(function($builder) use($search) {
                $builder->where('title', "LIKE","%$search%")
                ->orWhere('code', 'LIKE', "%$search%")
                ->orWhere('text', 'LIKE', "%$search%");
            });
        })
        ->when($level , function($query) use ($level) {
            $query->where('level_id', $level);
        })
        ->paginate(12);

        $levels = Level::get();
        return view('library.index', compact('levels', 'items'));
    }
}
