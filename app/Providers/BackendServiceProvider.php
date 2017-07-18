<?php
namespace App\Providers;
use Illuminate\Support\ServiceProvider;
use PermissionRepository;
use Auth,Route;
class BackendServiceProvider extends ServiceProvider
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
            $menus = PermissionRepository::adminLeftMenu();
            $node_id = PermissionRepository::getNodeId(Route::currentRouteName());
            $view->with(compact(['menus','node_id']));
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('PermissionRepository', function($app){
            return new \App\Repositories\admin\PermissionRepository();
        });
        $this->app->singleton('RoleRepository', function($app){
            return new \App\Repositories\admin\RoleRepository();
        });
        $this->app->singleton('CategoryRepository', function($app){
            return new \App\Repositories\admin\CategoryRepository();
        });
        $this->app->singleton('ArticleRepository', function($app){
            return new \App\Repositories\admin\ArticleRepository();
        });
        $this->app->singleton('ConfigRepository', function($app){
            return new \App\Repositories\admin\ConfigRepository();
        });
        $this->app->singleton('SayRepository', function($app){
            return new \App\Repositories\admin\SayRepository();
        });
        $this->app->singleton('NavRepository', function($app){
            return new \App\Repositories\admin\NavRepository();
        });
    }
}
