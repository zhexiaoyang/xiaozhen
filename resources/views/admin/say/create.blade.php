@extends('layouts.admin')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('vendor/uploadify/uploadify.css')}}">
@endsection
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
    <h1 class="page-title"> 添加说说
        <small>添加后台说说</small>
    </h1>
    <div class="page-title">
        <a class="btn btn-success" href="{{url('admin/say')}}">说说列表</a>
    </div>
    <form action="{{url('admin/say')}}" novalidate="novalidate" method="post">
        {{csrf_field()}}
        <div class="form-body">
            <div class="form-group form-md-line-input @if($errors->has('title')) has-error @endif">
                <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-envelope"></i>
                </span>
                    <input type="text" class="form-control"  name="title" value="{{old('title')}}" placeholder="请输入说说标题...">
                    <label for="form_control_1">说说标题<span class="required" aria-required="true">*</span></label>
                    @if($errors->has('title'))
                        <span class="help-block" style="opacity: 1">{{$errors->first('title')}}</span>
                    @endif
                </div>
            </div>
            <div class="form-group form-md-line-input @if($errors->has('img_url')) has-error @endif">
                <div class="input-group">
                    <label for="form_control_1">缩略图</label>
                    <input type="hidden" name="img_url">
                    @if($errors->has('img_url'))
                        <span class="help-block" style="opacity: 1">{{$errors->first('img_url')}}</span>
                    @endif
                </div>
            </div>
            <div class="img_list">
                <input type="file" name="" id="say_pic" />
            </div>
            <div class="form-group form-md-line-input @if($errors->has('sort')) has-error @endif">
                <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-envelope"></i>
                </span>
                    <input type="text" class="form-control"  name="sort" value="{{old('sort',100)}}" placeholder="请输入说说排序...">
                    <label for="form_control_1">说说排序</label>
                    @if($errors->has('sort'))
                        <span class="help-block" style="opacity: 1">{{$errors->first('sort')}}</span>
                    @endif
                </div>
            </div>
            <div class="form-group form-md-radios">
                <label>是否推荐</label>
                <div class="md-radio-inline">
                    <div class="md-radio">
                        <input type="radio" id="radio6" name="is_rec" class="md-radiobtn" value="1">
                        <label for="radio6">
                            <span class="inc"></span>
                            <span class="check"></span>
                            <span class="box"></span> 是 </label>
                    </div>
                    <div class="md-radio">
                        <input type="radio" id="radio7" name="is_rec" class="md-radiobtn" value="0" checked="checked">
                        <label for="radio7">
                            <span class="inc"></span>
                            <span class="check"></span>
                            <span class="box"></span> 否 </label>
                    </div>
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
            <div class="form-group form-md-line-input @if($errors->has('content')) has-error @endif">
                <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-envelope"></i>
                </span>
                    <textarea class="form-control" name="content" rows="3"></textarea>
                    <label for="form_control_1">说说内容</label>
                    @if($errors->has('content'))
                        <span class="help-block" style="opacity: 1">{{$errors->first('content')}}</span>
                    @endif
                </div>
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
    <script src="{{asset('/vendor/uploadify/uploadify.min.js')}}" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#say_pic").uploadify({
                'formData' : {
                    'timestamp' : '{{ time() }}',
                    '_token'    : '{{csrf_token()}}'
                },
                'swf'				: '/vendor/uploadify/uploadify.swf',
                'buttonClass'		: 'add_img',
                'buttonCursor'		: 'hand',
                'buttonText'		: '添加照片',
                'height'			: 125,
                'width'				: 125,
                'fileSizeLimit'		: 10240,
                'method'			: 'post',
                'fileTypeExts'		: '*.jpeg; *.jpg; *.png;',
                'multi'				: true,
                'uploader'			: '{{url("admin/image")}}',
                'onFallback'		:function(){
                    alert("您未安装FLASH控件，无法上传图片！请安装FLASH控件后再试。");
                },
                'onUploadSuccess'	: function(file, data, response) {
                    $(".img_list").find(".error").remove();
                    var data = $.parseJSON(data);
                    if(data.status === 0){
                        var html = '\
								<div class="img_item">\
									<img src="'+data.data.url+'">\
									<input type="hidden" name="img_url" value="'+data.data.url+'">\
									<input type="hidden" name="img_name" value="'+data.data.name+'">\
									<span class="img_main"></span>\
									<span class="img_close" onclick="closeImg(this)"></span>\
									<span class="img_button">'+data.info+'</span>\
								</div>\
								';
                    } else {
                        var html = '\
								<div class="img_item error">\
									<span class="error-txt">'+data.info+'</span>\
									<span class="img_main"></span>\
									<span class="img_close" onclick="closeImg(this)"></span>\
									<span class="img_button">'+data.info+'</span>\
								</div>\
								';
                    }
                    $('.img_list .add_img').css({'background-image':'url("/vendor/uploadify/img/add-img.png")'});
                    $('.uploadify-button-text').html('更新图片');
                    $("#say_pic").uploadify("disable", false)
                    $(".img_item").remove();
                    $("#say_pic").before(html);
                },
                'onUploadError'		: function(file, errorCode, errorMsg, errorString) {
                    console.log(file.name + '上传失败原因:' + errorString);
                },
                'onSelect'	 : function(queueData) {
                    $("#say_pic").uploadify("disable", true)
                    $('.img_list .add_img').css({'background-image':'url("/vendor/uploadify/img/loading.gif")'});
                    $('.uploadify-button-text').html('正在上传');
                }
            })

            @if(old('img_url'))
                var html = '\
                        <div class="img_item">\
                            <img src="{{old('img_url')}}">\
                            <input type="hidden" name="img_url" value="{{old('img_url')}}">\
                            <input type="hidden" name="img_name" value="{{old('img_name')}}">\
                            <span class="img_main"></span>\
                            <span class="img_close" onclick="closeImg(this)"></span>\
                        </div>\
                        ';
                $("#say_pic").before(html);
                $('.uploadify-button-text').html('更新图片');
            @endif
        });

        function closeImg(obj)
        {
            $.ajax()
            $(obj).parent('.img_item').remove();
        }
    </script>

@endsection