<?php

namespace App\Http\Controllers\Home;

use App\Models\Article;

class CategoryController extends CommonController
{
    public function show($cid=0)
    {
        $articles = Article::statusEq1()->select('id','img_url','title','description','created_at','view')->orderBy('created_at','desc')->paginate(9);
        return view('home.category.show')->with(compact(['articles']));
    }
}
