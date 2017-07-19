<?php

namespace App\Http\Controllers\Home;

use App\Models\Article;
use App\Models\Category;

class SearchController extends CommonController
{
    public function show(\Illuminate\Http\Request $request)
    {
        $key = $request->input('key');
        $articles = [];
        if (!empty($key))
        {
            $articles = Article::statusEq1()->select('id','img_url','title','description','created_at','view')->where('title', 'like', '%'.$key.'%')->orderBy('created_at','desc')->paginate(9);
        }
        $categorys = Category::statusEq1()->select('id','name')->get()->toArray();
        return view('home.search.show')->with(compact(['articles','key','categorys']));
    }
}
