<?php

namespace App\Http\Controllers\Admin;

use App\Models\Say;
use SayRepository;
use App\Http\Requests;
use App\Http\Requests\SayRequest;

class SayController extends CommonController
{

    public function index()
    {
        $list = Say::paginate(12);
        return view("admin.say.index",['list' => $list]);
    }

    public function create()
    {
        return view("admin.say.create");
    }

    public function store(SayRequest $request)
    {
        $result = SayRepository::store($request);
        if(!$result) {
//            Toastr::error('新权限添加失败!');
            return redirect('admin/say/create');
        } else {
//            Toastr::success('新权限添加成功!');
            return redirect('admin/say');
        }
    }

    public function edit($id)
    {
        $say = SayRepository::edit($id);
        if (!$say)
        {
            abort(404);
        }
        return view("admin.say.edit",['say'=>$say]);
    }

    public function update(SayRequest $request,$id)
    {
        $result = SayRepository::update($request,$id);
        if(!$result) {
//            Toastr::error('新权限添加失败!');
            return redirect('admin/say/create');
        } else {
//            Toastr::success('新权限添加成功!');
            return redirect('admin/say');
        }
    }
}
