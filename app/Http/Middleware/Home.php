<?php
namespace App\Http\Middleware;
use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Route,URL,Auth;
class Home
{

    public function handle($request, Closure $next, $guard = null)
    {
        if(Config::get('web.web_status') == 0) {
            echo "网站暂时关闭";die;
        }
        return $next($request);
    }
}
