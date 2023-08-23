<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function show(int $id, string $slug)
    {
        $course = Course::find($id);
        $rel_courses = Course::where('id', '!=', $id)->orderBy('id', 'DESC')->limit(5)->get();
        return view('courses.show', compact('course', 'rel_courses'));
    }
    public function index()
    {
        $courses = Course::paginate(8);
        return view('courses.index', compact('courses'));
    }
}
