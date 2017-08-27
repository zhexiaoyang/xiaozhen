<?php
namespace App\Providers;
use App\Models\Article;
use App\Models\Nav;
use Illuminate\Support\ServiceProvider;
use PermissionRepository;
use Auth,Route;
class FrontServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*', function ($view) {
            //共享菜单数据
            $navs = Nav::statusEq1()->orderBy('sort','desc')->get()->toArray();
            $new_articles = Article::statusEq1()->select('id','cid','img_url','title','description','created_at','view')->orderBy('created_at','desc')->limit(8)->get();
            $rec_articles = Article::statusEq1()->select('id','cid','img_url','title','description','created_at','view')->where('is_rec','=',1)->orderBy('sort','desc')->orderBy('created_at','desc')->limit(8)->get();
            $view->with(compact(['navs','new_articles','rec_articles']));
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
    }
}
