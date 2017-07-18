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
    <h1 class="page-title"> 添加权限
        <small>添加后台权限</small>
    </h1>
    <div class="page-title">
        <a class="btn btn-success" href="{{url('admin/permission')}}">权限列表</a>
    </div>
    <form action="{{url('admin/permission/'.$permission->id)}}" id="form_sample_2" novalidate="novalidate" method="post">
        {{csrf_field()}}
        <input type="hidden"name="_method"value="PUT">
        <input type="hidden" name="id" value="{{$permission->id}}">
        <div class="form-body">
            <div class="form-group form-md-line-input">
                @inject('permissionRepository','App\Repositories\admin\PermissionRepository')
                {!! $permissionRepository->topPermissionSelect($permission->pid) !!}
            </div>
            <div class="form-group form-md-line-input @if($errors->has('name')) has-error @endif">
                <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-envelope"></i>
                </span>
                    <input type="text" class="form-control"  name="name" value="{{$permission->name}}" placeholder="请输入权限名称...">
                    <label for="form_control_1">权限名称<span class="required" aria-required="true">*</span></label>
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
                    <input type="text" class="form-control"  name="display_name" value="{{$permission->display_name}}" placeholder="请输入权限标题...">
                    <label for="form_control_1">权限标题<span class="required" aria-required="true">*</span></label>
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
                    <input type="text" class="form-control"  name="description" value="{{$permission->description}}" placeholder="请输入权限描述...">
                    <label for="form_control_1">权限描述</label>
                    @if($errors->has('description'))
                        <span class="help-block" style="opacity: 1">{{$errors->first('description')}}</span>
                    @endif
                </div>
            </div>
            <div class="form-group form-md-line-input @if($errors->has('icon')) has-error @endif">
                <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-envelope"></i>
                </span>
                    <input type="text" class="form-control"  name="icon" value="{{$permission->icon}}" placeholder="请输入权限图标...">
                    <label for="form_control_1">权限图标<span class="required" aria-required="true">*</span></label>
                    @if($errors->has('icon'))
                        <span class="help-block" style="opacity: 1">{{$errors->first('icon')}}</span>
                    @endif
                </div>
            </div>
            <div class="form-group form-md-line-input @if($errors->has('sort')) has-error @endif">
                <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-envelope"></i>
                </span>
                    <input type="text" class="form-control"  name="sort" value="{{$permission->sort}}" placeholder="请输入权限排序...">
                    <label for="form_control_1">权限排序<span class="required" aria-required="true">*</span></label>
                    @if($errors->has('sort'))
                        <span class="help-block" style="opacity: 1">{{$errors->first('sort')}}</span>
                    @endif
                </div>
            </div>
            <div class="form-group form-md-radios">
                <label>是否为菜单</label>
                <div class="md-radio-inline">
                    <div class="md-radio">
                        <input type="radio" id="radio6" name="is_menu" class="md-radiobtn" value="1" @if($permission->is_menu === 1) checked @endif>
                        <label for="radio6">
                            <span class="inc"></span>
                            <span class="check"></span>
                            <span class="box"></span> 是 </label>
                    </div>
                    <div class="md-radio">
                        <input type="radio" id="radio7" name="is_menu" class="md-radiobtn" value="0" @if($permission->is_menu === 0) checked @endif>
                        <label for="radio7">
                            <span class="inc"></span>
                            <span class="check"></span>
                            <span class="box"></span> 否 </label>
                    </div>
                </div>
            </div>
            <div class="form-group form-md-line-input">
                <select class="form-control" name="status">
                    <option value="1" @if($permission->status === 1) selected @endif>正常</option>
                    <option value="0" @if($permission->status === 0) selected @endif>禁用</option>
                    <option value="-1" @if($permission->status === -1) selected @endif>删除</option>
                </select>
                <label for="form_control_1">状态</label>
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