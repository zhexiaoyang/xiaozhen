<?php

namespace App\Http\Controllers\Admin;

use App\Models\Nav;
use NavRepository;
use App\Http\Requests;
use App\Http\Requests\NavRequest;

class NavController extends CommonController
{

    public function index()
    {
        $list = Nav::paginate(12);
        return view("admin.nav.index",['list' => $list]);
    }

    public function create()
    {
        return view("admin.nav.create");
    }

    public function store(NavRequest $request)
    {
        $result = NavRepository::store($request);
        if(!$result) {
//            Toastr::error('新权限添加失败!');
            return redirect('admin/nav/create');
        } else {
//            Toastr::success('新权限添加成功!');
            return redirect('admin/nav');
        }
    }

    public function edit($id)
    {
        $nav = NavRepository::edit($id);
        if (!$nav)
        {
            abort(404);
        }
        return view("admin.nav.edit",['nav'=>$nav]);
    }

    public function update(NavRequest $request,$id)
    {
        $result = NavRepository::update($request,$id);
        if(!$result) {
//            Toastr::error('新权限添加失败!');
            return redirect('admin/nav/create');
        } else {
//            Toastr::success('新权限添加成功!');
            return redirect('admin/nav');
        }
    }
}
