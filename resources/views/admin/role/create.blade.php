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
    <h1 class="page-title"> 添加角色
        <small>添加后台角色</small>
    </h1>
    <div class="page-title">
        <a class="btn btn-success" href="{{url('admin/role')}}">角色列表</a>
    </div>
    <form action="{{url('admin/role')}}" id="form_sample_2" novalidate="novalidate" method="post">
        {{csrf_field()}}
        <div class="form-body">
            <div class="form-group form-md-line-input @if($errors->has('name')) has-error @endif">
                <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-envelope"></i>
                </span>
                    <input type="text" class="form-control"  name="name" value="{{old('name')}}" placeholder="请输入角色名称...">
                    <label for="form_control_1">角色名称<span class="required" aria-required="true">*</span></label>
                    @if($errors->has('name'))
                        <span class="help-block" style="opacity: 1">{{$errors->first('name')}}</span>
                    @endif
                </div>
            </div>
            <div class="form-group form-md-line-input @if($errors->has('display_name')) has-error @endif">
                <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-envelope"></i>
                </span>
                    <input type="text" class="form-control"  name="display_name" value="{{old('display_name')}}" placeholder="请输入角色标题...">
                    <label for="form_control_1">显示名称<span class="required" aria-required="true">*</span></label>
                    @if($errors->has('display_name'))
                        <span class="help-block" style="opacity: 1">{{$errors->first('display_name')}}</span>
                    @endif
                </div>
            </div>
            <div class="form-group form-md-line-input @if($errors->has('description')) has-error @endif">
                <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-envelope"></i>
                </span>
                    <input type="text" class="form-control"  name="description" value="{{old('description')}}" placeholder="请输入角色描述...">
                    <label for="form_control_1">角色描述</label>
                    @if($errors->has('description'))
                        <span class="help-block" style="opacity: 1">{{$errors->first('description')}}</span>
                    @endif
                </div>
            </div>
            <div class="form-group form-md-line-input @if($errors->has('sort')) has-error @endif">
                <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-envelope"></i>
                </span>
                    <input type="text" class="form-control"  name="sort" value="{{old('sort',100)}}" placeholder="请输入角色排序...">
                    <label for="form_control_1">角色排序<span class="required" aria-required="true">*</span></label>
                    @if($errors->has('sort'))
                        <span class="help-block" style="opacity: 1">{{$errors->first('sort')}}</span>
                    @endif
                </div>
            </div>
            <div class="form-group form-md-line-input">
                <select class="form-control" name="status">
                    <option value="1" @if(old('status') === 1) selected @endif>正常</option>
                    <option value="0" @if(old('status') === 0) selected @endif>禁用</option>
                    <option value="-1" @if(old('status') === -1) selected @endif>删除</option>
                </select>
                <label for="form_control_1">状态</label>
            </div>
            <div class="form-actions">
            <div class="row">
                <div class="col-md-12">
                    <button type="submit" class="btn green">添加</button>
                    <button type="reset" class="btn default">重置</button>
                </div>
            </div>
        </div>
        </div>
    </form>
@endsection

@section('js')
{{--    <script src="{{asset('backend/plugins/jquery-validation/js/jquery.validate.min.js')}}" type="text/javascript"></script>--}}
{{--    <script src="{{asset('backend/plugins/jquery-validation/js/additional-methods.min.js')}}" type="text/javascript"></script>--}}
{{--    <script src="{{asset('backend/pages/scripts/form-validation-md.min.js')}}" type="text/javascript"></script>--}}
@endsection