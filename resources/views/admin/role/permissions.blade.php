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
    <h1 class="page-title"> 编辑[{{$role->display_name}}]权限 </h1>
    <form action="" method="post" id="role-permissions-form">
        {{csrf_field()}}
        <input type="hidden" name="id" value="{{$role->id}}">
        @foreach($permissions as $permission)
        <div class="panel-body panel-body-nopadding">
            <div class="top-permissions col-sm-3">
                <label>
                    <input type="checkbox" name="permissions[]" value="{{$permission['id']}}" {{ in_array($permission['id'],$rolePermissions) ? 'checked':'' }} class="top-permission-checkbox"/>
                    {{$permission['display_name']}}
                </label>
            </div>
            @if(!empty($permission['node']))
                @foreach($permission['node'] as $node)
                    <div class="mid-permissions col-md-11 col-md-offset-1">
                        <div class="col-sm-3">
                            <label>
                                <input type="checkbox" name="permissions[]" value="{{$node['id']}}" {{ in_array($node['id'],$rolePermissions) ? 'checked':'' }} class="mid-permission-checkbox"/>
                                {{$node['display_name']}}
                            </label>
                        </div>
                        @if(!empty($node['node']))
                            @foreach($node['node'] as $node2)
                                <div class="sub-permissions col-md-11 col-md-offset-1">
                                    <div class="col-sm-3">
                                        <label>
                                            <input type="checkbox" name="permissions[]" value="{{$node2['id']}}" {{ in_array($node2['id'],$rolePermissions) ? 'checked':'' }} class="sub-permission-checkbox"/>
                                            {{$node2['display_name']}}
                                        </label>
                                    </div>
                                    @if(!empty($node2['node']))
                                        @foreach($node2['node'] as $node3)
                                            <div class="col-sm-3">
                                                <label>
                                                    <input type="checkbox" name="permissions[]" value="{{$node3['id']}}" {{ in_array($node3['id'],$rolePermissions) ? 'checked':'' }} class="sub-permission-checkbox"/>{{$node3['display_name']}}
                                                </label>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            @endforeach
                        @endif
                    </div>
                @endforeach
            @endif
        </div>
        @endforeach
        <div class="form-actions">
            <div class="row">
                <div class="col-md-12">
                    <button type="submit" class="btn green">保存</button>
                    <button type="reset" class="btn default">重置</button>
                </div>
            </div>
        </div>
    </form>
@endsection

@section('js')
{{--    <script src="{{asset('backend/plugins/jquery-validation/js/jquery.validate.min.js')}}" type="text/javascript"></script>--}}
{{--    <script src="{{asset('backend/plugins/jquery-validation/js/additional-methods.min.js')}}" type="text/javascript"></script>--}}
{{--    <script src="{{asset('backend/pages/scripts/form-validation-md.min.js')}}" type="text/javascript"></script>--}}
<script src="http://localhost:8000/js/ajax.js"></script>
<script>
    $(".display-sub-permission-toggle").toggle(function () {
        $(this).children('span').removeClass('glyphicon-minus').addClass('glyphicon-plus')
                .parents('.top-permission').next('.sub-permissions').hide();
    }, function () {
        $(this).children('span').removeClass('glyphicon-plus').addClass('glyphicon-minus')
                .parents('.top-permission').next('.sub-permissions').show();
    });

    $(".top-permission-checkbox").change(function () {
        $(this).parents('.top-permissions').next('.mid-permissions').find('input').prop('checked', $(this).prop('checked'));
        $(this).parents('.top-permissions').next('.sub-permissions').find('input').prop('checked', $(this).prop('checked'));
    });

    $(".mid-permission-checkbox").change(function () {
        if ($(this).prop('checked')) {
            $(this).parents('.mid-permissions').prev('.top-permissions').find('.top-permission-checkbox').prop('checked', true);
            $(this).parents('.mid-permissions').find('.sub-permissions').find('input').prop('checked', $(this).prop('checked'));
        }else{
            $(this).parents('.mid-permissions').find('.sub-permissions').find('input').prop('checked', $(this).prop('checked'));
        }
    });

    $(".sub-permission-checkbox").change(function () {
        if ($(this).prop('checked')) {
            $(this).parents('.mid-permissions').find('.mid-permission-checkbox').prop('checked', true);
            $(this).parents('.mid-permissions').prev('.top-permissions').find('.top-permission-checkbox').prop('checked', true);
        }
    });
</script>
@endsection