<?php

namespace App\Listeners;

use App\Events\SnycSolrArticleEvent;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SolrArticleListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  SyncSolrArticleEvent  $event
     * @return void
     */
    public function handle(SnycSolrArticleEvent $event)
    {
        $article = Article::find($event->id);
        if (!empty($article))
        {
//            dd(gmdate('Y-m-d\TH:i:s\Z',strtotime($article->created_at)));
            $category = Category::find($article->cid);
            $options = config('solr.options');
            $options['path'] = config('solr.article_path');
            $client = new \SolrClient($options);
            $client->deleteById($event->id);
            $client->commit();
            $document = new \SolrInputDocument();
            $document->addField('id',$article->id);
            $document->addField('img_url',$article->img_url);
            $document->addField('article_view',$article->view);
            $document->addField('created_at',gmdate('Y-m-d\TH:i:s\Z',strtotime($article->created_at)));
            $document->addField('article_title',$article->title);
            $document->addField('article_content',$article->content);
            $document->addField('article_description',$article->description);
            $document->addField('category_id',$category->id);
            $document->addField('category_name',$category->name);
            $client->addDocument($document);
            $client->commit();
        }
    }
}
