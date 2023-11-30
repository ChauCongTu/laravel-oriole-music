<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function show($name = null) {
        $teachers = Teacher::all();
        $teacher = Teacher::findName($name);
        return view('teacher', compact('teachers', 'teacher'));
    }
}
