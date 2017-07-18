@extends('layouts.admin')
@section("content")
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="index.php">主页</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span>配置管理</span>
            </li>
        </ul>
    </div>
    <h1 class="page-title"> 配置列表 </h1>
    <div class="page-title">
        <a class="btn btn-success" href="{{url('admin/config/create')}}">添加配置</a>
    </div>
    <div class="portlet box green">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-comments"></i>列表</div>
        </div>
        <div class="portlet-body">
            <div class="table-scrollable">
                <form action="{{url('admin/config/saveConfig')}}" id="form_sample_2" novalidate="novalidate" method="post">
                    {{csrf_field()}}
                    <table class="table table-striped table-hover">
                        <thead class="flip-content">
                        <tr>
                            <th width="5%"> ID </th>
                            <th width="10%"> 名称 </th>
                            <th width="10%"> 标题 </th>
                            <th width="10%"> 类型 </th>
                            <th width="5%"> 排序  </th>
                            <th width="5%"> 状态 </th>
                            <th width="20%"> 内容 </th>
                            <th width="10%"> 创建时间</th>
                            <th width="10%"> 修改时间 </th>
                            <th width="10%"> 操作 </th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($list as $config)
                                <tr>
                                    <td> {{$config->id}} </td>
                                    <td> {{$config->name}} </td>
                                    <td> {{$config->title}} </td>
                                    <td> {{$config->type}} </td>
                                    <td> {{$config->sort}} </td>
                                    <td> {!! trans('status.status.'.$config->status) !!} </td>
                                    <td>
                                        @if($config->type === "input")
                                            <input type="text" name="{{$config->name}}" class="form-control" value="{{$config->content}}">
                                        @elseif ($config->type === "radio")
                                            <div class="md-radio-inline">
                                                <div class="md-radio">
                                                    <input type="radio" id="true" name="{{$config->name}}" class="md-radiobtn" value="1" @if($config->content == 1) checked @endif>
                                                    <label for="true">
                                                        <span class="inc"></span>
                                                        <span class="check"></span>
                                                        <span class="box"></span> 是 </label>
                                                </div>
                                                <div class="md-radio">
                                                    <input type="radio" id="false" name="{{$config->name}}" class="md-radiobtn" value="0" @if($config->content == 0) checked @endif>
                                                    <label for="false">
                                                        <span class="inc"></span>
                                                        <span class="check"></span>
                                                        <span class="box"></span> 否 </label>
                                                </div>
                                            </div>
                                        @elseif ($config->type === "textarea")
                                            <textarea name="{{$config->name}}" class="form-control" rows="3">{{$config->content}}</textarea>
                                        @endif
                                    </td>
                                    <td> {{$config->created_at}} </td>
                                    <td> {{$config->updated_at}} </td>
                                    <td>
                                        <a class="btn btn-xs green" href="{{url("admin/config/".$config->id."/edit")}}">编辑</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                            <div class="col-md-12">
                                <button type="submit" class="btn green">更新</button>
                            </div>
                </form>
            </div>
        </div>
    </div>
    <javascript>

    </javascript>
@endsection