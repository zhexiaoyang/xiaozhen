<?php

namespace App\Http\Controllers\Admin;

use App\Jobs\SendReminderEmail;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends CommonController
{
    use AuthenticatesAndRegistersUsers;

    protected $redirectTo = '/admin';
    protected $guard = 'admin';
    protected $username = 'name';
    protected $redirectAfterLogout = '/admin/login';

    public function __construct()
    {
        $this->middleware('guest:admin', ['except' => 'logout']);
    }

    public function showLoginForm()
    {
        return view('admin.login.index');
    }

    protected function authenticated($request, $admin)
    {
//        dd($this->dispatch(new SendReminderEmail($admin)));
        $this->dispatch(new SendReminderEmail($admin));
        return redirect()->intended($this->redirectPath());
    }

    protected function validateLogin(Request $request)
    {
        $this->validate($request, [
            'captcha' => 'bail|required|captcha',
            'name' => 'required',
            'password' => 'required',
        ],[
            'captcha.required' => '验证码必须填写',
            'captcha.captcha' => '验证码错误',
            'name.required' => '用户名必须填写',
            'password.required' => '密码必须填写',
        ]);
    }
}
