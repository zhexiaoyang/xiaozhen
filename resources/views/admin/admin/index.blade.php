@extends('layouts.admin')
@section("content")
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="index.php">主页</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span>用户管理</span>
            </li>
        </ul>
    </div>
    <h1 class="page-title"> 管理员列表
        <small>后台管理员列表</small>
    </h1>
    <div class="page-title">
        <a class="btn btn-success" href="{{url('admin/admin/create')}}">添加管理员</a>
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
                <th width="20%"> 用户名 </th>
                <th width="20%"> 邮箱 </th>
                <th width="10%"> 状态 </th>
                <th width="15%"> 创建时间</th>
                <th width="15%"> 修改时间 </th>
                <th width="15%"> 操作 </th>
            </tr>
            </thead>
            <tbody>
                @foreach ($list as $user)
                    <tr>
                        <td> {{$user->id}} </td>
                        <td> {{$user->name}} </td>
                        <td> {{$user->email}} </td>
                        <td> {!! trans('status.status.'.$user->status) !!} </td>
                        <td> {{$user->created_at}} </td>
                        <td> {{$user->updated_at}} </td>
                        <td>
                            <a class="btn btn-xs blue" href="{{url("admin/admin/".$user->id."/edit")}}">编辑</a>
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