@extends('layouts.admin')
@section('css')
    <link href="{{asset('backend/plugins/jquery-multi-select/css/multi-select.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('backend/css/plugins.min.css" rel="stylesheet')}}" type="text/css" />
@endsection
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
    <h1 class="page-title"> 添加管理员
        <small>添加后台管理员</small>
    </h1>
    <div class="page-title">
        <a class="btn btn-success" href="{{url('admin/admin')}}">管理员列表</a>
    </div>
    @if(!empty(session('error_update_user')))
        <div class="alert alert-danger">
            <strong>{{session('error_update_user')}}!</strong>
        </div>
    @endif
    <form action="{{url('admin/admin/'.$admin->id)}}" id="form_sample_2" novalidate="novalidate" method="post">
        {{csrf_field()}}
        <input type="hidden"name="_method"value="PUT">
        <input type="hidden" name="id" value="{{$admin->id}}">
        <div class="form-body">
            <div class="form-group form-md-line-input @if($errors->has('name')) has-error @endif">
                <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-envelope"></i>
                </span>
                    <input type="text" class="form-control"  name="name" value="{{$admin->name}}" placeholder="请输入用户名">
                    <label for="form_control_1">用户名<span class="required" aria-required="true">*</span></label>
                    @if($errors->has('name'))
                        <span class="help-block" style="opacity: 1">{{$errors->first('name')}}</span>
                    @endif
                </div>
            </div>
            <div class="form-group form-md-line-input @if($errors->has('email')) has-error @endif">
                <div class="input-group">
            <span class="input-group-addon">
                <i class="fa fa-envelope"></i>
            </span>
                    <input type="text" class="form-control"  name="email" value="{{$admin->email}}" placeholder="请输入邮箱">
                    <label for="form_control_1">邮箱<span class="required" aria-required="true">*</span></label>
                    @if($errors->has('email'))
                        <span class="help-block" style="opacity: 1">{{$errors->first('email')}}</span>
                    @endif
                </div>
            </div>
            <div class="form-group form-md-line-input">
                <select class="form-control" name="status">
                    <option value="1" @if($admin->status === 1) selected @endif>正常</option>
                    <option value="0" @if($admin->status === 0) selected @endif>禁用</option>
                    <option value="-1" @if($admin->status === -1) selected @endif>删除</option>
                </select>
                <label for="form_control_1">状态</label>
            </div>
            <div class="form-group form-md-radios">
                <label for="form_control_1">分配角色</label>
                <div class="md-radio-inline">
                    <select multiple="multiple" class="multi-select" id="my_multi_select2" name="roles[]" style="width: 1000px">
                        @if (!empty($roles_data))
                            @foreach ($roles_data as $v)
                                <option  value="{{$v['id']}}" {{ in_array($v['id'],$admin_role) ? 'selected':'' }} style="text-indent: 1rem;">{{$v['display_name']}}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>
            <div class="form-actions">
                <div class="row">
                    <div class="col-md-12">
                        <button type="submit" class="btn green">更新</button>
                        <button type="reset" class="btn default">重置</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

@section('js')
    <script src="{{asset('backend/plugins/bootstrap-select/js/bootstrap-select.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('backend/plugins/jquery-multi-select/js/jquery.multi-select.js')}}" type="text/javascript"></script>
    <script src="{{asset('backend/plugins/select2/js/select2.full.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('backend/pages/scripts/components-multi-select.min.js')}}" type="text/javascript"></script>
@endsection