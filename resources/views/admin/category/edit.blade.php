@extends('layouts.admin')
@section("content")
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="index.php">主页</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span>分类管理</span>
            </li>
        </ul>
    </div>
    <h1 class="page-title"> 添加分类
        <small>添加后台分类</small>
    </h1>
    <div class="page-title">
        <a class="btn btn-success" href="{{url('admin/category')}}">分类列表</a>
    </div>
    <form action="{{url('admin/category/'.$category->id)}}" id="form_sample_2" novalidate="novalidate" method="post">
        {{csrf_field()}}
        <input type="hidden"name="_method"value="PUT">
        <input type="hidden" name="id" value="{{$category->id}}">
        <div class="form-body">
            <div class="form-group form-md-line-input">
                @inject('categoryRepository','App\Repositories\admin\PermissionRepository')
                {!! $categoryRepository->topPermissionSelect($category->pid) !!}
            </div>
            <div class="form-group form-md-line-input @if($errors->has('name')) has-error @endif">
                <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-envelope"></i>
                </span>
                    <input type="text" class="form-control"  name="name" value="{{$category->name}}" placeholder="请输入分类名称...">
                    <label for="form_control_1">分类名称<span class="required" aria-required="true">*</span></label>
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
                    <input type="text" class="form-control"  name="title" value="{{$category->title}}" placeholder="请输入分类标题...">
                    <label for="form_control_1">分类标题<span class="required" aria-required="true">*</span></label>
                    @if($errors->has('title'))
                        <span class="help-block" style="opacity: 1">{{$errors->first('title')}}</span>
                    @endif
                </div>
            </div>
            <div class="form-group form-md-line-input @if($errors->has('description')) has-error @endif">
                <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-envelope"></i>
                </span>
                    <input type="text" class="form-control"  name="description" value="{{$category->description}}" placeholder="请输入分类描述...">
                    <label for="form_control_1">分类描述</label>
                    @if($errors->has('description'))
                        <span class="help-block" style="opacity: 1">{{$errors->first('description')}}</span>
                    @endif
                </div>
            </div>
            <div class="form-group form-md-line-input @if($errors->has('keyword')) has-error @endif">
                <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-envelope"></i>
                </span>
                    <input type="text" class="form-control"  name="keyword" value="{{$category->keyword}}" placeholder="请输入关键字...">
                    <label for="form_control_1">关键字<span class="required" aria-required="true"></span></label>
                    @if($errors->has('keyword'))
                        <span class="help-block" style="opacity: 1">{{$errors->first('keyword')}}</span>
                    @endif
                </div>
            </div>
            <div class="form-group form-md-line-input @if($errors->has('sort')) has-error @endif">
                <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-envelope"></i>
                </span>
                    <input type="text" class="form-control"  name="sort" value="{{$category->sort}}" placeholder="请输入分类排序...">
                    <label for="form_control_1">分类排序<span class="required" aria-required="true"></span></label>
                    @if($errors->has('sort'))
                        <span class="help-block" style="opacity: 1">{{$errors->first('sort')}}</span>
                    @endif
                </div>
            </div>
            <div class="form-group form-md-radios">
                <label>是否首页显示</label>
                <div class="md-radio-inline">
                    <div class="md-radio">
                        <input type="radio" id="radio6" name="front_show" class="md-radiobtn" value="1" @if($category->front_show === 1) checked @endif>
                        <label for="radio6">
                            <span class="inc"></span>
                            <span class="check"></span>
                            <span class="box"></span> 是 </label>
                    </div>
                    <div class="md-radio">
                        <input type="radio" id="radio7" name="front_show" class="md-radiobtn" value="0" @if($category->front_show === 0) checked @endif>
                        <label for="radio7">
                            <span class="inc"></span>
                            <span class="check"></span>
                            <span class="box"></span> 否 </label>
                    </div>
                </div>
            </div>
            <div class="form-group form-md-line-input">
                <select class="form-control" name="status">
                    <option value="1" @if($category->status === 1) selected @endif>正常</option>
                    <option value="0" @if($category->status === 0) selected @endif>禁用</option>
                    <option value="-1" @if($category->status === -1) selected @endif>删除</option>
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