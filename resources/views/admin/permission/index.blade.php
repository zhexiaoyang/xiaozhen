@extends('layouts.admin')
@section("content")
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="index.php">主页</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span>权限管理</span>
            </li>
        </ul>
    </div>
    <h1 class="page-title"> 权限列表
        <small>后台权限列表</small>
    </h1>
    <div class="page-title">
        <a class="btn btn-success" href="{{url('admin/permission/create')}}">添加权限</a>
    </div>
    <div class="portlet box green">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-comments"></i>列表</div>
        </div>
        <div class="portlet-body">
            <div class="table-scrollable">
                <table class="table table-striped table-hover">
            <thead class="flip-content">
            <tr>
                <th width="5%"> ID </th>
                <th width="15%"> 名称 </th>
                <th width="10%"> 标题 </th>
                <th width="15%"> 描述 </th>
                <th width="10%"> 图标 </th>
                <th width="5%"> 菜单 </th>
                <th width="5%"> 排序  </th>
                <th width="5%"> 状态 </th>
                <th width="10%"> 创建时间</th>
                <th width="10%"> 修改时间 </th>
                <th width="10%"> 操作 </th>
            </tr>
            </thead>
            <tbody>
                @foreach ($list as $permission)
                    <tr>
                        <td> {{$permission->id}} </td>
                        <td> {{$permission->name}} </td>
                        <td> {{$permission->display_name}} </td>
                        <td> {{$permission->descrip}} </td>
                        <td> {{$permission->icon}} </td>
                        <td> {!! trans('status.is_menu.'.$permission->is_menu) !!} </td>
                        <td> {{$permission->sort}} </td>
                        <td> {!! trans('status.status.'.$permission->status) !!} </td>
                        <td> {{!$permission->created_at}} </td>
                        <td> {{$permission->updated_at}} </td>
                        <td>
                            <a class="btn btn-xs green" href="{{url("admin/permission/".$permission->id."/edit")}}">编辑</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $list->links()}}
    </div>
    <javascript>

    </javascript>
@endsection