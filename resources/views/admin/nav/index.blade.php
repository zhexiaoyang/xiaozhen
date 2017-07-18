@extends('layouts.admin')
@section("content")
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="index.php">主页</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span>导航管理</span>
            </li>
        </ul>
    </div>
    <h1 class="page-title"> 导航列表 </h1>
    <div class="page-title">
        <a class="btn btn-success" href="{{url('admin/nav/create')}}">添加导航</a>
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
                <th width="15%"> 地址 </th>
                <th width="5%"> 排序  </th>
                <th width="5%"> 状态 </th>
                <th width="10%"> 创建时间</th>
                <th width="10%"> 修改时间 </th>
                <th width="10%"> 操作 </th>
            </tr>
            </thead>
            <tbody>
                @foreach ($list as $nav)
                    <tr>
                        <td> {{$nav->id}} </td>
                        <td> {{$nav->name}} </td>
                        <td> {{$nav->title}} </td>
                        <td> {{$nav->url}} </td>
                        <td> {{$nav->sort}} </td>
                        <td> {!! trans('status.status.'.$nav->status) !!} </td>
                        <td> {{$nav->created_at}} </td>
                        <td> {{$nav->updated_at}} </td>
                        <td>
                            <a class="btn btn-xs green" href="{{url("admin/nav/".$nav->id."/edit")}}">编辑</a>
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