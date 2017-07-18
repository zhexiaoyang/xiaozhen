<?php

namespace App\Http\Controllers\Admin;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use RoleRepository,PermissionRepository;
use App\Http\Requests;
use App\Http\Requests\RoleRequest;

class RoleController extends CommonController
{

    public function index()
    {
        $list = Role::withoutGlobalScope('status')->paginate(12);
        return view("admin.role.index",['list' => $list]);
    }

    public function create()
    {
        return view("admin.role.create");
    }

    public function store(RoleRequest $request)
    {
        $result = RoleRepository::store($request);
        if(!$result) {
//            Toastr::error('新权限添加失败!');
            return redirect('admin/Role/create');
        } else {
//            Toastr::success('新权限添加成功!');
            return redirect('admin/role');
        }
    }

    public function edit($id)
    {
        $role = RoleRepository::edit($id);
        if (!$role)
        {
            abort(404);
        }
        return view("admin.role.edit",['role'=>$role]);
    }

    public function update(RoleRequest $request,$id)
    {
        $result = RoleRepository::update($request,$id);
        if(!$result) {
//            Toastr::error('新权限添加失败!');
            return redirect('admin/role/create');
        } else {
//            Toastr::success('新权限添加成功!');
            return redirect('admin/role');
        }
    }

    public function permissions($id)
    {
        $role = RoleRepository::edit($id);
        if (!$role)
        {
            abort(403);
        }
        $permissions = PermissionRepository::getAll();
        $rolePermissions = RoleRepository::rolePermissions($id);
        return view('admin.role.permissions', compact('role', 'permissions', 'rolePermissions'));
    }

    public function storePermissions($id, Request $request)
    {
        $role = Role::find($id);
        $role->perms()->sync($request->input('permissions', []));
        return redirect('admin/role');
    }
}


