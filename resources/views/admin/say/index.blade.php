@extends('layouts.admin')
@section("content")
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="index.php">主页</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span>说说管理</span>
            </li>
        </ul>
    </div>
    <h1 class="page-title"> 说说列表 </h1>
    <div class="page-title">
        <a class="btn btn-success" href="{{url('admin/say/create')}}">添加说说</a>
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
                <th width="15%"> 图片 </th>
                <th width="10%"> 标题 </th>
                <th width="25%"> 内容 </th>
                <th width="5%"> 是否推荐 </th>
                <th width="5%"> 排序  </th>
                <th width="5%"> 状态 </th>
                <th width="10%"> 创建时间</th>
                <th width="10%"> 修改时间 </th>
                <th width="10%"> 操作 </th>
            </tr>
            </thead>
            <tbody>
                @foreach ($list as $say)
                    <tr>
                        <td> {{$say->id}} </td>
                        <td>
                            <div class="list-thumb">
                                <a href="javascript:;">
                                    <img onclick="show_pic('{{$say->img_url}}')" width="150px" src="{{$say->img_url}}">
                                </a>
                            </div>
                        </td>
                        <td> {{$say->title}} </td>
                        <td> {{$say->content}} </td>
                        <td> {!! trans('status.front_show.'.$say->status) !!} </td>
                        <td> {{$say->sort}} </td>
                        <td> {!! trans('status.status.'.$say->status) !!} </td>
                        <td> {{substr($say->created_at,0,10)}} </td>
                        <td> {{substr($say->updated_at,0,10)}} </td>
                        <td>
                            <a class="btn btn-xs green" href="{{url("admin/say/".$say->id."/edit")}}">编辑</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $list->links()}}
    </div>
@endsection
@section('js')
    <script src="{{asset('/vendor/layer/layer.js')}}" type="text/javascript"></script>
    <script type="text/javascript">
        function show_pic(url) {
            layer.open({
                type: 2,
                title: '查看大图',
                shadeClose: true,
                shade: false,
                maxmin: true, //开启最大化最小化按钮
                area: ['893px', '600px'],
                content: url
            });
        }
    </script>
@endsection