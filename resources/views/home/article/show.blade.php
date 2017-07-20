@extends('layouts.home')
@section('title')
    <title>{{isset($article['title'])?$article['title'].'-':''}}{{Config::get('web.web_title')}}</title>
    {{--@if($article)--}}
{{--        <title>{{$article->art_title}}-{{Config::get('web.web_title')}}</title>--}}
{{--        <meta name="keywords" content="{{$article->art_tag}}" />--}}
{{--        <meta name="description" content="{{$article->art_description}}">--}}
    {{--@endif--}}
    <link rel="stylesheet" href="{{asset('vendor/editormd/css/editormd.css')}}"/>
    <link rel="stylesheet" href="{{asset('vendor/editormd/css/editormd.preview.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/editormd/css/customer.css')}}">
@endsection
@section('content')
    <!--position start-->
    <div class="position">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <i class="home_icon"></i><a href="{{url('/')}}">首页</a>&rsaquo;
                    @if($category)
                        <a href="{{url('/cate/'.$category->id)}}.html">{{$category->name}}</a>
                    {{--@else--}}
                        {{--<a href="{{url('/cate/')}}">全部分类</a>--}}
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!--position end-->
    <!--content start-->
    @if($article)
        <div class="content_wrap">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 main_ct">
                        <header class="detail_hd">
                            <h1 class="detail_tt">{{$article['title']}}</h1>
                            <div class="detail_info">
                                <span>更新 {{$article['created_at']}} </span>
{{--                                <span>标签：{{$article->art_tag}} </span>--}}
                                <span>看过({{$article['view']}})</span>
                            </div>
                        </header>
                        <article  class="detail_ct">
                            <div id="wordsView">
                                <textarea style="display:none;" name="editormd-markdown-doc">{!!$article['content']!!}</textarea>
                            </div>
                        </article >
                        <div class="bdsharebuttonbox share">
                            <span>分享 :</span>
                            <a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a>
                            <a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a>
                            <a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a>
                            <a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a>
                            <a href="#" class="bds_sqq" data-cmd="sqq" title="分享到QQ好友"></a>
                        </div>
                        @parent
                    </div>
                </div>
            </div>
        </div>
    @endif
    <!--content end-->
@endsection
@section('bottom')
    <script src="{{asset('vendor/editormd/js/editormd.js')}}"></script>
    <script src="{{asset('vendor/editormd/lib/marked.min.js')}}"></script>
    <script src="{{asset('vendor/editormd/lib/prettify.min.js')}}"></script>
    <script src="{{asset('vendor/editormd/lib/raphael.min.js')}}"></script>
    <script src="{{asset('vendor/editormd/lib/underscore.min.js')}}"></script>
    <script src="{{asset('vendor/editormd/lib/sequence-diagram.min.js')}}"></script>
    <script src="{{asset('vendor/editormd/lib/flowchart.min.js')}}"></script>
    <script src="{{asset('vendor/editormd/lib/jquery.flowchart.min.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            var wordsView;
            wordsView = editormd.markdownToHTML("wordsView", {
                htmlDecode      : "style,script,iframe",  // you can filter tags decode
                emoji           : true,
                taskList        : true,
                tex             : true,  // 默认不解析
                flowChart       : true,  // 默认不解析
                sequenceDiagram : true,  // 默认不解析
            });

        })
    </script>

    <script type="text/javascript">
        //列表展开 ul展开
        showList();
        function showList(){
            var oList = document.querySelector("#messageList ul");
            var iHeight = 0;
            var aLi = oList.children;
            for(var i=0;i<aLi.length;i++){
                iHeight += aLi[i].offsetHeight;
                aLi[i].off = true;
            }
            oList.style.height = iHeight+'px';
            oList.addEventListener('webkitTransitionEnd',end,false);
            function end(){
                this.removeEventListener('webkitTransitionEnd',end,false);
                showLi();
                window.onresize = window.onscroll = function(){
                    showLi();
                }
            }

        }
        //列表展开 li 展开
        function showLi(){
            var oList = document.querySelector("#messageList ul");
            var aLi = oList.children;
            var iTop = document.body.scrollTop+document.documentElement.clientHeight;
            var iTime = 0;
            for(var i=0;i<aLi.length;i++){
                if(getTop(aLi[i])<iTop && aLi[i].off){
                    aLi[i].off = false;
                    openLi(aLi[i],iTime);
                    iTime += 300;
                }
            }
        }
        function openLi(obj,iTime){
            var oBox = obj.children[0];
            var oReply = oBox.children[oBox.children.length-1];
            oBox.addEventListener('webkitTransitionEnd',end,false);
            setTimeout(function(){
                oBox.style.webkitTransform = 'rotateY(0deg)';
                oBox.style.opacity = 1;
            },iTime);
            function end(){
                this.removeEventListener('webkitTransitionEnd',end,false);
                oReply.style.webkitTransform = 'rotateX(0deg)';
                oReply.style.opacity = 1;
            }
        }
        //获取li 的位置
        function getTop(obj){
            var iTop = 0;
            while(obj){
                iTop += obj.offsetTop;
                obj = obj.offsetParent;
            }
            return iTop;
        }
    </script>
@endsection