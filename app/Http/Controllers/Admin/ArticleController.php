<?php

namespace App\Http\Controllers\Admin;

use App\Models\Article;
use ArticleRepository;
use App\Http\Requests;
use App\Http\Requests\ArticleRequest;

class ArticleController extends CommonController
{

    public function index()
    {
        $list = Article::orderBy('id','desc')->paginate(12);
        return view("admin.article.index",['list' => $list]);
    }

    public function create()
    {
        return view("admin.article.create");
    }

    public function store(ArticleRequest $request)
    {
        $result = ArticleRepository::store($request);
        if(!$result) {
//            Toastr::error('新权限添加失败!');
            return redirect('admin/article/create');
        } else {
//            Toastr::success('新权限添加成功!');
            return redirect('admin/article');
        }
    }

    public function edit($id)
    {
        $article = ArticleRepository::edit($id);
        if (!$article)
        {
            abort(404);
        }
        return view("admin.article.edit",['article'=>$article]);
    }

    public function update(ArticleRequest $request,$id)
    {
        $result = ArticleRepository::update($request,$id);
        if(!$result) {
//            Toastr::error('新权限添加失败!');
            return redirect('admin/article/create');
        } else {
//            Toastr::success('新权限添加成功!');
            return redirect('admin/article');
        }
    }
}
