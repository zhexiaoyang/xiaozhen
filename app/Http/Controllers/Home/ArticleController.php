<?php

namespace App\Http\Controllers\Home;

use App\Events\SnycSolrArticleEvent;
use App\Models\Article;

class ArticleController extends CommonController
{
    public function show($id=0)
    {
        if ($id)
        {
            $article = Article::statusEq1()->find($id);
            if (!empty($article))
            {
                Article::where("id",$id)->increment("view");
                event(new SnycSolrArticleEvent($id));
            }else{
                // 未找到
                abort(404);
            }
        }else{
            // 参数错误
            abort(404);
        }
        return view('home.article.show')->with(compact(['article','category']));
    }
}
