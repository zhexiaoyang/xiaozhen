<?php

namespace App\Http\Controllers\Home;

use App\Models\Article;
use App\Models\Category;

class CategoryController extends CommonController
{
    public function show($cid=0)
    {
        if ((int)$cid === 0)
        {
            $category = '全部分类';
            $articles = Article::statusEq1()->select('id','img_url','title','description','created_at','view')->orderBy('created_at','desc')->paginate(9);
        }else{
            $category_info = Category::statusEq1()->select('name')->where('id',$cid)->first();
            if (empty($category_info))
            {
                abort(404);
            }
            $category = isset($category_info->name)?trim($category_info->name):'暂无分类';
            $cids = array_merge([(int)$cid], array_flatten(Category::statusEq1()->select('id')->where(['pid'=>$cid])->get()->toArray()));
            $articles = Article::statusEq1()->select('id','img_url','title','description','created_at','view')->whereIn('cid',$cids)->orderBy('created_at','desc')->paginate(9);
        }
        $categorys = Category::statusEq1()->select('id','name')->get()->toArray();
        return view('home.category.show')->with(compact(['articles','category','categorys']));
    }
}
