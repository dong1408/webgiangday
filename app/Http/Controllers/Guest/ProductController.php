<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $courses = Course::all();
        return view('user.product.main', compact('courses'));
    }
}
