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
    <h1 class="page-title"> 添加导航
        <small>添加后台导航</small>
    </h1>
    <div class="page-title">
        <a class="btn btn-success" href="{{url('admin/nav')}}">导航列表</a>
    </div>
    <form action="{{url('admin/nav')}}" id="form_sample_2" novalidate="novalidate" method="post">
        {{csrf_field()}}
        <div class="form-body">
            <div class="form-group form-md-line-input @if($errors->has('name')) has-error @endif">
                <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-envelope"></i>
                </span>
                    <input type="text" class="form-control"  name="name" value="{{old('name')}}" placeholder="请输入导航名称...">
                    <label for="form_control_1">导航名称<span class="required" aria-required="true">*</span></label>
                    @if($errors->has('name'))
                        <span class="help-block" style="opacity: 1">{{$errors->first('name')}}</span>
                    @endif
                </div>
            </div>
            <div class="form-group form-md-line-input @if($errors->has('title')) has-error @endif">
                <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-envelope"></i>
                </span>
                    <input type="text" class="form-control"  name="title" value="{{old('title')}}" placeholder="请输入导航标题...">
                    <label for="form_control_1">导航标题<span class="required" aria-required="true">*</span></label>
                    @if($errors->has('title'))
                        <span class="help-block" style="opacity: 1">{{$errors->first('title')}}</span>
                    @endif
                </div>
            </div>
            <div class="form-group form-md-line-input @if($errors->has('url')) has-error @endif">
                <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-envelope"></i>
                </span>
                    <input type="text" class="form-control"  name="url" value="{{old('url')}}" placeholder="请输入导航地址...">
                    <label for="form_control_1">导航地址<span class="required" aria-required="true">*</span></label>
                    @if($errors->has('url'))
                        <span class="help-block" style="opacity: 1">{{$errors->first('url')}}</span>
                    @endif
                </div>
            </div>
            <div class="form-group form-md-line-input @if($errors->has('sort')) has-error @endif">
                <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-envelope"></i>
                </span>
                    <input type="text" class="form-control"  name="sort" value="{{old('sort',100)}}" placeholder="请输入导航排序...">
                    <label for="form_control_1">导航排序<span class="required" aria-required="true">*</span></label>
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