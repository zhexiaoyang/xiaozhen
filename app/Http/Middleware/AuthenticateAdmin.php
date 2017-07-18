<?php
namespace App\Http\Middleware;
use Closure;
use Illuminate\Support\Facades\App;
use Route,URL,Auth;
class AuthenticateAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @param  string|null $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {

        if (Auth::guard('admin')->guest()) {
            if ($request->ajax() || $request->wantsJson()) {
                return response('Unauthorized.', 401);
            } else {
                return redirect()->guest('/admin/login');
            }
        }
        if(Auth::guard('admin')->user()->is_super){
            return $next($request);
        }
        $previousUrl = URL::previous();
        if(!Auth::guard('admin')->user()->may(Route::currentRouteName())) {
            if($request->ajax() && ($request->getMethod() != 'GET')) {
                return response()->json([
                    'status' => -1,
                    'code' => 403,
                    'msg' => '您没有权限执行此操作'
                ]);
            } else {
                abort(403);
//                return response('Unauthorized.', 403);
//                return redirect()->guest('/admin/errors/403');
//                return view('admin.errors.403');
            }
        }
        return $next($request);
    }
}