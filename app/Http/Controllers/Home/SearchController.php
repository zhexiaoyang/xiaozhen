<?php

namespace App\Http\Controllers\Home;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;

class SearchController extends CommonController
{
    public function show(\Illuminate\Http\Request $request)
    {
        $key = $request->input('key');
        $articles = [];
        if (!empty($key))
        {
//            $articles = Article::statusEq1()->select('id','img_url','title','description','created_at','view')->where('title', 'like', '%'.$key.'%')->orderBy('created_at','desc')->paginate(9);
            $perPage = 3;
            if ($request->has('page')) {
                $current_page = $request->input('page');
                $current_page = $current_page <= 0 ? 1 :$current_page;
            } else {
                $current_page = 1;
            }
            $options = array('hostname' => 'localhost','wt' => 'json','path' => '/solr/blog',"port"=>"8983");
            $client = new \SolrClient($options);
            $query = new \SolrQuery();
            $query->setParam("q",$key);
            $query->setStart(($current_page-1) * $perPage);
            $query->setRows($perPage);
            $query->setParam("df","article_keywords");
            //根据需求，标题匹配60，标签匹配40
//            $query->setParam("qf","article_title^60 article_content^40");
            $query->setParam("sort","id desc");
            $query->setHighlight (true);
            $query->setParam("hl.fl","article_title,article_content");
            $query->setHighlightSimplePre("<em style='color:red'>");
            $query->setHighlightSimplePost("</em>");
            $resp = $client->query($query);
            $result = $resp->getResponse();
            $responseHeader = $resp->getResponse()->responseHeader;
            $highlighting = $resp->getResponse()->highlighting;
            $docs = $resp->getResponse()->response['docs'];
            $total = $resp->getResponse()->response->numFound;
            if (!empty($docs))
            {
                foreach ($docs as $k => $item) {
                    $articles[$k]['id'] = $item->id;
                    $articles[$k]['img_url'] = $item->img_url;
                    $articles[$k]['category_name'] = $item->category_name;
                    $articles[$k]['created_at'] = date("Y-m-d H:i:s",strtotime($item->created_at));
                    $articles[$k]['title'] = isset($highlighting[$item['id']]->article_title[0])?$highlighting[$item['id']]->article_title[0]:$item->article_title;
//                    $articles[$key]['description'] = isset($highlighting[$item['id']]->article_description[0])?$highlighting[$item['id']]->article_description[0]:$item->article_description;
                    $articles[$k]['content'] = isset($highlighting[$item['id']]->article_content[0])?$highlighting[$item['id']]->article_content[0]:$item->article_content;
                }
            }
            $paginator =new LengthAwarePaginator($articles, $total, $perPage, $current_page, [
                'path' => Paginator::resolveCurrentPath().'?key='.$key,
                'pageName' => 'page',
            ]);
        }
        $categorys = Category::statusEq1()->select('id','name')->get()->toArray();
        return view('home.search.show')->with(compact(['articles','key','categorys','paginator']));
    }
}
