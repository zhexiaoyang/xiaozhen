@extends('layouts.admin')
@section("content")
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="index.php">主页</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span>角色管理</span>
            </li>
        </ul>
    </div>
    <h1 class="page-title"> 角色列表
        <small>后台角色列表</small>
    </h1>
    <div class="page-title">
        <a class="btn btn-success" href="{{url('admin/role/create')}}">添加角色</a>
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
                <th width="5%"> 排序 </th>
                <th width="5%"> 状态 </th>
                <th width="15%"> 创建时间</th>
                <th width="15%"> 修改时间 </th>
                <th width="10%"> 操作 </th>
            </tr>
            </thead>
            <tbody>
                @foreach ($list as $role)
                    <tr>
                        <td> {{$role->id}} </td>
                        <td> {{$role->name}} </td>
                        <td> {{$role->display_name}} </td>
                        <td> {{$role->descrip}} </td>
                        <td> {{$role->sort}} </td>
                        <td> {!! trans('status.status.'.$role->status) !!} </td>
                        <td> {{$role->created_at}} </td>
                        <td> {{$role->updated_at}} </td>
                        <td>
                            <a class="btn btn-xs blue" href="{{url("admin/role/".$role->id."/edit")}}">编辑</a>
                            <a class="btn btn-xs blue" href="{{url("admin/role/".$role->id."/permissions")}}">分配权限</a>
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