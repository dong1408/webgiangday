<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function show(){
        return view('admin.course.show');
    }

    public function add(){
        return view('admin.course.add');
    }
}
