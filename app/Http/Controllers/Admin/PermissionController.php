<?php

namespace App\Http\Controllers\Admin;

use App\Models\Permission;
use PermissionRepository;
use App\Http\Requests;
use App\Http\Requests\PermissionRequest;

class PermissionController extends CommonController
{

    public function index()
    {
        $list = Permission::withoutGlobalScope('status')->paginate(12);
        return view("admin.permission.index",['list' => $list]);
    }

    public function create()
    {
        return view("admin.permission.create");
    }

    public function store(PermissionRequest $request)
    {
        $result = PermissionRepository::store($request);
        if(!$result) {
//            Toastr::error('新权限添加失败!');
            return redirect('admin/permission/create');
        } else {
//            Toastr::success('新权限添加成功!');
            return redirect('admin/permission');
        }
    }

    public function edit($id)
    {
        $permission = PermissionRepository::edit($id);
        if (!$permission)
        {
            abort(404);
        }
        return view("admin.permission.edit",['permission'=>$permission]);
    }

    public function update(PermissionRequest $request,$id)
    {
        $result = PermissionRepository::update($request,$id);
        if(!$result) {
//            Toastr::error('新权限添加失败!');
            return redirect('admin/permission/create');
        } else {
//            Toastr::success('新权限添加成功!');
            return redirect('admin/permission');
        }
    }
}
