<?php

namespace App\Http\Controllers\Home;

use App\Models\Article;
use App\Models\Category;
use App\Models\Nav;
use App\Models\Say;

class HomeController extends CommonController
{
    public function index()
    {
        $says = Say::statusEq1()->limit(3)->orderBy('created_at','desc')->get()->toArray();
        return view('home.home.index')->with(compact(['says']));
    }

    public function about()
    {
        return view('home.home.about');
    }
    public function say()
    {
        $says = Say::statusEq1()->orderBy('created_at','desc')->get()->toArray();
        return view('home.home.say')->with(compact(['says']));
    }
}
