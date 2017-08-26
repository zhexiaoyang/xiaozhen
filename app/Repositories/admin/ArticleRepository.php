<?php
namespace App\Repositories\admin;
use App\Events\SnycSolrArticleEvent;
use App\Http\Requests\Request;
use App\Models\Article;
use App\Models\Category;

class ArticleRepository
{

    public function topArticleSelect($pid = 0)
    {
        $data = Category::statusEq1()->select('name','id','pid')->get()->toArray();
        $select = '<select class="form-control" name="cid">';
//        $select .= '<option value="0">顶级分类</option>';
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
            $node_id = Article::select('id','pid')->where('name',$name)->first()->toArray();
        }
        return $node_id;
    }

    public function store($request)
    {
        $permission = new Article;
        $data = $request->all();
        if ($permission->fill($data)->save()) {
            event(new SnycSolrArticleEvent($permission->id));
            return true;
        }
        return false;
    }

    public function edit($id)
    {
        $permission = Article::find($id);
        return $permission;
    }

    public function update($request,$id)
    {
        $permission = Article::find($id);
        if ($permission) {
            if ($permission->fill($request->all())->save()) {
                event(new SnycSolrArticleEvent($id));
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
        $permissions = Article::status1()->select(['id','pid','name','display_name','icon'])->orderBy('sort','desc')->get()->toArray();
        $permissions_tree = $this->getTree($permissions);
        return $permissions_tree;
    }

}