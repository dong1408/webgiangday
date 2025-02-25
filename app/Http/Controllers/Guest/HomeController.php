<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('user.home.main');
    }

    public function introduction(){
        return view('user.home.introduction');
    }

    public function shop(){
        return view('user.product.main');
    }
}
