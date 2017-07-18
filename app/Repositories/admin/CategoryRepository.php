<?php
namespace App\Repositories\admin;
use App\Http\Requests\Request;
use App\Models\Category;
class CategoryRepository
{

    public function topCategorySelect($pid = 0)
    {
        $data = Category::statusEq1()->get()->toArray();
        $select = '<select class="form-control" name="pid">';
        $select .= '<option value="0">顶级分类</option>';
        $select .= $this->getOption($data, $pid,  '-');
        $select .= '</select><label for="form_control_1">所属分类组</label><span class="help-block">请选择所属组...</span>';
        return $select;
    }

    public function getOption($data, $pid, $prefix='', $disabled='')
    {
        $option = '';
        $prefix .= $prefix;
        $disabled = $disabled;
        if(!empty($data)) {
            foreach ($data as $permission) {
                if($permission['id'] == $pid) {
                    $option .= '<option ' .$disabled . ' value="' . $permission['id'] . '" selected >' . $prefix.$permission['name'] . '</option>';
                    if (isset($permission['node']))
                    {
                        $option .= $this->getOption($permission['node'], $pid , $prefix, 'disabled');
                    }
                } else {
                    $option .= '<option ' . $disabled . ' value="' . $permission['id'] . '">' . $prefix.$permission['name'] . '</option>';
                    if (isset($permission['node']))
                    {
                        $option .= $this->getOption($permission['node'], $pid, $prefix, $disabled);
                    }
                }
            }
        }
        return $option;
    }

    public function adminLeftMenu()
    {
        $menus = Category::status1()->select(['id','pid','name','display_name','icon'])->where('is_menu',1)->orderBy('sort','desc')->get()->toArray();
        $menu_tree = $this->getTree($menus);
        return $menu_tree;
    }

    public function getTree($data, $pid=0)
    {
        $result = [];
        foreach ($data as $k => $v)
        {
            if ($v['pid'] == $pid)
            {
                $_data  = $v;
                $son = $this->getTree($data, $v['id']);
                if (!empty($son))
                {
                    $_data['node'] = $son;
                }
                $result[$v['id']] = $_data;
            }
        }
        return $result;
    }

    public function getNodeId($name)
    {
        $node_id=0;
        if ($name)
        {
            $node_id = Category::select('id','pid')->where('name',$name)->first()->toArray();
        }
        return $node_id;
    }

    public function store($request)
    {
        $permission = new Category;
        $data = $request->all();
        if ($permission->fill($data)->save()) {
            return true;
        }
        return false;
    }

    public function edit($id)
    {
        $permission = Category::withoutGlobalScope('status')->where('status','>=',0)->find($id);
        return $permission;
    }

    public function update($request,$id)
    {
        $permission = Category::find($id);
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
        $permissions = Category::status1()->select(['id','pid','name','display_name','icon'])->orderBy('sort','desc')->get()->toArray();
        $permissions_tree = $this->getTree($permissions);
        return $permissions_tree;
    }

}