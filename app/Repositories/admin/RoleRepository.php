<?php
namespace App\Repositories\admin;
use App\Admin;
use App\Http\Requests\Request;
use App\Models\Role;
class RoleRepository
{

    public function store($request)
    {
        $permission = new Role;
        $data = $request->all();
        if ($permission->fill($data)->save()) {
            return true;
        }
        return false;
    }

    public function edit($id)
    {
        $permission = Role::withoutGlobalScope('status')->where('status','>=',0)->find($id);
        return $permission;
    }

    public function update($request,$id)
    {
        $permission = Role::find($id);
        if ($permission) {
            if ($permission->fill($request->all())->save()) {
//                Flash::success(trans('alerts.permissions.updated_success'));
                return true;
            }
//            Flash::error(trans('alerts.permissions.updated_error'));
        }
        return false;

//        abort(404);
    }

    public function rolePermissions($id)
    {
        $perms = [];
        $permissions = Role::find($id)->perms()->get();

        foreach ($permissions as $item) {
            $perms[] = $item->id;
        }

        return $perms;
    }

    public function getAll()
    {
        $role = Role::StatusEq1()->select('id','display_name')->get()->toArray();
        return $role;
    }

    public function roleAdmins($id)
    {
        $perms = [];
        $role = Admin::find($id)->roles()->get();

        foreach ($role as $item) {
            $perms[] = $item->id;
        }

        return $perms;
    }

}