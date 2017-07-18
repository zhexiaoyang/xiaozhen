<?php

namespace App\Http\Controllers\Home;

use App\Models\Article;

class ArticleController extends CommonController
{
    public function show($id=0)
    {
        if ($id)
        {
            Article::where("id",$id)->increment("view");
            $article = Article::statusEq1()->find($id);
            if (!empty($artcle))
            {

            }else{
                // 未找到
            }
        }else{
            // 参数错误
        }
        return view('home.article.show')->with(compact(['article']));
    }
}
