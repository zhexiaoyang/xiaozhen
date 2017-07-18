<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use CategoryRepository;
use App\Http\Requests;
use App\Http\Requests\CategoryRequest;
use Illuminate\Support\Facades\Redis;

class CategoryController extends CommonController
{

    public function index()
    {
        $list = Category::withoutGlobalScope('status')->paginate(12);
        return view("admin.category.index",['list' => $list]);
    }

    public function create()
    {
        return view("admin.category.create");
    }

    public function store(CategoryRequest $request)
    {
        $result = CategoryRepository::store($request);
        if(!$result) {
//            Toastr::error('新权限添加失败!');
            return redirect('admin/category/create');
        } else {
//            Toastr::success('新权限添加成功!');
            return redirect('admin/category');
        }
    }

    public function edit($id)
    {
        $category = CategoryRepository::edit($id);
        if (!$category)
        {
            abort(404);
        }
        return view("admin.category.edit",['category'=>$category]);
    }

    public function update(CategoryRequest $request,$id)
    {
        $result = CategoryRepository::update($request,$id);
        if(!$result) {
//            Toastr::error('新权限添加失败!');
            return redirect('admin/category/create');
        } else {
//            Toastr::success('新权限添加成功!');
            return redirect('admin/category');
        }
    }
}
