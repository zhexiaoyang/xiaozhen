<?php

namespace App\Http\Controllers\Admin;

use App\Models\Config;
use ConfigRepository;
use App\Http\Requests;
use App\Http\Requests\ConfigRequest;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redis;

class ConfigController extends CommonController
{

    public function index()
    {
        $list = Config::withoutGlobalScope('status')->paginate(12);
        return view("admin.config.index",['list' => $list]);
    }

    public function create()
    {
        return view("admin.config.create");
    }

    public function store(ConfigRequest $request)
    {
        $result = ConfigRepository::store($request);
        if(!$result) {
//            Toastr::error('新权限添加失败!');
            return redirect('admin/config/create');
        } else {
//            Toastr::success('新权限添加成功!');
            return redirect('admin/config');
        }
    }

    public function edit($id)
    {
        $config = ConfigRepository::edit($id);
        if (!$config)
        {
            abort(404);
        }
        return view("admin.config.edit",['config'=>$config]);
    }

    public function update(ConfigRequest $request,$id)
    {
        $result = ConfigRepository::update($request,$id);
        if(!$result) {
//            Toastr::error('新权限添加失败!');
            return redirect('admin/config/create');
        } else {
//            Toastr::success('新权限添加成功!');
            return redirect('admin/config');
        }
    }

    public function saveConfig()
    {
        $input = Input::all();
        foreach($input as $k=>$v)
        {
            Config::where('name',$k)->update(['content'=>$v]);
        }
        $config = Config::pluck('content','name')->all();
        $path = base_path().DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.'web.php';
        $str = '<?php return '.var_export($config,true).';';
        file_put_contents($path, $str);
        return back();
    }
}
