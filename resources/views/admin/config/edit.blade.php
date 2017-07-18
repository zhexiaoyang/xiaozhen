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
    <h1 class="page-title"> 添加配置
        <small>添加后台配置</small>
    </h1>
    <div class="page-title">
        <a class="btn btn-success" href="{{url('admin/config')}}">配置列表</a>
    </div>
    <form action="{{url('admin/config/'.$config->id)}}" id="form_sample_2" novalidate="novalidate" method="post">
        {{csrf_field()}}
        <input type="hidden"name="_method"value="PUT">
        <input type="hidden" name="id" value="{{$config->id}}">
        <div class="form-body">
            <div class="form-group form-md-line-input @if($errors->has('name')) has-error @endif">
                <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-envelope"></i>
                </span>
                    <input type="text" class="form-control"  name="name" value="{{$config->name}}" placeholder="请输入配置名称...">
                    <label for="form_control_1">配置名称<span class="required" aria-required="true">*</span></label>
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
                    <input type="text" class="form-control"  name="title" value="{{$config->title}}" placeholder="请输入配置标题...">
                    <label for="form_control_1">配置标题<span class="required" aria-required="true">*</span></label>
                    @if($errors->has('title'))
                        <span class="help-block" style="opacity: 1">{{$errors->first('title')}}</span>
                    @endif
                </div>
            </div>>
            <div class="form-group form-md-radios">
                <label>配置类型</label>
                <div class="md-radio-inline">
                    <div class="md-radio">
                        <input type="radio" id="input" name="type" class="md-radiobtn" value="input" @if($config->type === "input") checked @endif>
                        <label for="input">
                            <span class="inc"></span>
                            <span class="check"></span>
                            <span class="box"></span> input </label>
                    </div>
                    <div class="md-radio">
                        <input type="radio" id="radio" name="type" class="md-radiobtn" value="radio" @if($config->type === "radio") checked @endif>
                        <label for="radio">
                            <span class="inc"></span>
                            <span class="check"></span>
                            <span class="box"></span> radio </label>
                    </div>
                    <div class="md-radio">
                        <input type="radio" id="textarea" name="type" class="md-radiobtn" value="textarea" @if($config->type === "textarea") checked @endif>
                        <label for="textarea">
                            <span class="inc"></span>
                            <span class="check"></span>
                            <span class="box"></span> textarea </label>
                    </div>
                </div>
            </div>
            <div class="form-group form-md-line-input @if($errors->has('sort')) has-error @endif">
                <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-envelope"></i>
                </span>
                    <input type="text" class="form-control"  name="sort" value="{{$config->sort}}" placeholder="请输入配置排序...">
                    <label for="form_control_1">配置排序<span class="required" aria-required="true"></span></label>
                    @if($errors->has('sort'))
                        <span class="help-block" style="opacity: 1">{{$errors->first('sort')}}</span>
                    @endif
                </div>
            </div>
            <div class="form-group form-md-line-input">
                <select class="form-control" name="status">
                    <option value="1" @if($config->status === 1) selected @endif>正常</option>
                    <option value="0" @if($config->status === 0) selected @endif>禁用</option>
                    <option value="-1" @if($config->status === -1) selected @endif>删除</option>
                </select>
                <label for="form_control_1">状态</label>
            </div>
            <div class="form-group form-md-line-input @if($errors->has('description')) has-error @endif">
                <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-envelope"></i>
                </span>
                    <textarea class="form-control" name="description" rows="3"></textarea>
                    <label for="form_control_1">配置描述</label>
                    @if($errors->has('description'))
                        <span class="help-block" style="opacity: 1">{{$errors->first('description')}}</span>
                    @endif
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
    {{--    <script src="{{asset('backend/plugins/jquery-validation/js/jquery.validate.min.js')}}" type="text/javascript"></script>--}}
    {{--    <script src="{{asset('backend/plugins/jquery-validation/js/additional-methods.min.js')}}" type="text/javascript"></script>--}}
    {{--    <script src="{{asset('backend/pages/scripts/form-validation-md.min.js')}}" type="text/javascript"></script>--}}
@endsection