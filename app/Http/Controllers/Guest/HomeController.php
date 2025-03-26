<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $a = 10;
        $b = 20;
        return view('user.home.main');
        // return view('user.home.nhathuocankhang');
    }

    public function introduction(){
        return view('user.home.introduction');
    }

    public function shop(){
        return view('user.product.main');
    }
}
