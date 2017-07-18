<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Http\Requests\UserPostRequest;
use App\Http\Requests\UserUpdatePostRequest;
use App\Models\Role;
use RoleRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class AdminController extends CommonController
{

    public function index()
    {
        $list = Admin::withoutGlobalScope('status')->paginate(12);
        return view("admin.admin.index",['list' => $list]);
    }

    public function create()
    {
        $roles_data = RoleRepository::getAll();
        return view("admin.admin.create",['roles_data'=>$roles_data]);
    }

    public function store(UserPostRequest $request)
    {
        $admin = new Admin;
        $status = $admin->create_user($request);
        $info = Admin::where('name','=',$request->name)->first();
        $roles = $request->input('roles', []);
        if (!empty($roles) && $info){
            $info->roles()->sync($roles);
        }
        return redirect('admin/admin');
    }

    public function edit($id)
    {
        $roles_data = RoleRepository::getAll();
        $admin = Admin::withoutGlobalScope('status')->where('status','>=',0)->find($id);
        if (!$admin)
        {
            abort(404);
        }
        $admin_role = RoleRepository::roleAdmins($id);

        return view("admin.admin.edit",['admin'=>$admin,'roles_data'=>$roles_data,'admin_role'=>$admin_role]);
    }

    public function update(UserPostRequest $request)
    {
        $admin = new Admin;
        $_status = $admin->update_user($request);
        if (!$_status)
        {
            return back()->with('error_update_user','更新失败，稍后再试！');
        }
        $info = Admin::where('name','=',$request->name)->first();
        $roles = $request->input('roles', []);
        if ($info){
            $info->roles()->sync($roles);
        }
        return redirect('admin/admin');
    }
}
