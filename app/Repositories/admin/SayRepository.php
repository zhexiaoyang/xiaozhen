<?php
namespace App\Repositories\admin;
use App\Http\Requests\Request;
use App\Models\Say;

class SayRepository
{
    public function store($request)
    {
        $permission = new Say;
        $data = $request->all();
        if ($permission->fill($data)->save()) {
            return true;
        }
        return false;
    }

    public function edit($id)
    {
        $permission = Say::find($id);
        return $permission;
    }

    public function update($request,$id)
    {
        $permission = Say::find($id);
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

    public function getAll()
    {
        $permissions = Say::status1()->select(['id','pid','name','display_name','icon'])->orderBy('sort','desc')->get()->toArray();
        $permissions_tree = $this->getTree($permissions);
        return $permissions_tree;
    }

}