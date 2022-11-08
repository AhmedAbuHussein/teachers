<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Material;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    public function index($level, $course)
    {
        $items = Material::where('course_id', $course)->get();
        return view('library.material.index', compact('items'));
    }

    public function show($level, Course $course)
    {
        return view('library.material.show', compact('course'));
    }
}
