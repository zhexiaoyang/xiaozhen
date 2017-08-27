@extends('layouts.home')
@section('title')
    <title>{{isset($article['title'])?$article['title'].'-':''}}{{Config::get('web.web_title')}}</title>
    <meta name="keywords" content="个人博客,张振个人博客,小振个人博客,张振" />
    <meta name="description" content="{{isset($article['title'])?$article['title'].'-':''}}{{Config::get('web.web_title')}}" />
    <link rel="stylesheet" href="{{asset('vendor/editormd/css/editormd.css')}}"/>
    <link rel="stylesheet" href="{{asset('vendor/editormd/css/editormd.preview.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/editormd/css/customer.css')}}">
    <link rel="stylesheet" href="{{asset('home/assets/css/share.css')}}">
@endsection
@section('content')
    <!--position start-->
    <div class="position">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <i class="home_icon"></i><a href="{{url('/')}}">首页</a>&rsaquo;
                    @if($article->category)
                        <a href="{{url('/cate/'.$article->category->id)}}.html">{{$article->category->name}}</a>
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
                            <div id="Share" style="display:block;">
                                <ul>
                                    <li title="分享到QQ空间"><a href="javascript:void(0)" class="share1"></a><span></span></li>
                                    <li title="分享到新浪微博"><a href="javascript:void(0)" class="share2"></a><span></span></li>
                                    <li title="分享到人人网"><a href="javascript:void(0)" class="share3"></a><span></span></li>
                                    <li title="分享到朋友网"><a href="javascript:void(0)" class="share4"></a><span></span></li>
                                    <li title="分享到腾讯微博"><a href="javascript:void(0)" class="share5"></a><span></span></li>
                                    <li title="分享到开心网"><a href="javascript:void(0)" class="share6"></a><span></span></li>
                                </ul>
                            </div>
                        </div>
                        @parent
                        {{--<div class="widget">--}}
                            {{--<h2 class="widget_tt"><strong>留言板</strong></h2>--}}
                            {{--<div class="comment">--}}
                                {{--<textarea name="message"  placeholder="扯淡、吐槽、表扬、鼓励……想说啥就说啥！" class="message"></textarea>--}}
                                {{--<button class="message_btn btn btn-default ">发表留言</button>--}}
                            {{--</div>--}}
                            {{--<section id="message">--}}
                                {{--<h2 class="widget_tt"><strong>留言详情</strong></h2>--}}
                                {{--<aside class="messageList" id="messageList">--}}
                                    {{--<ul>--}}
                                        {{--<li>--}}
                                            {{--<section class="listbox">--}}
                                                {{--<a href="" class="userimg"><img src="img/mysql.jpg" /></a>--}}
                                                {{--<i class="arrows_icon"></i>--}}
                                                {{--<article class="listitem">--}}
                                                    {{--<header class="messagehd"><i class="triangle_icon"></i><a href="" class="username">zhangmeiming</a><time class="time">[2016-06-13 11:08:56]</time></header>--}}
                                                    {{--<p class="messagecon">你好  怎么查看自己的VIP是不是到期了呢，现在续VIP  怎么计算费用呢</p>--}}
                                                {{--</article>--}}
                                                {{--<article class="listitem reply">--}}
                                                    {{--<header class="messagehd"><i class="triangle_icon"></i>回复楼上 <a href="" class="username">zhangmeiming</a><time>[2016-06-13 11:08:56]</time></header>--}}
                                                    {{--<p class="messagecon">你好  怎么查看自己的VIP是不是到期了呢，现在续VIP  怎么计算费用呢</p>--}}
                                                {{--</article>--}}
                                            {{--</section>--}}
                                        {{--</li>--}}
                                        {{--<li>--}}
                                            {{--<section class="listbox">--}}
                                                {{--<a href="" class="userimg"><img src="img/mysql.jpg" /></a>--}}
                                                {{--<i class="arrows_icon"></i>--}}
                                                {{--<article class="listitem">--}}
                                                    {{--<header class="messagehd"><i class="triangle_icon"></i><a href="" class="username">zhangmeiming</a><time class="time">[2016-06-13 11:08:56]</time></header>--}}
                                                    {{--<p class="messagecon">你好  怎么查看自己的VIP是不是到期了呢，现在续VIP  怎么查看自己的VIP是不是到期了呢怎么查看自己的VIP是不是到期了呢怎么查看自己的VIP是不是到期了呢</p>--}}
                                                {{--</article>--}}
                                            {{--</section>--}}
                                        {{--</li>--}}
                                    {{--</ul>--}}
                                {{--</aside>--}}
                            {{--</section>--}}
                        {{--</div>--}}
                    </div>
                </div>
            </div>
        </div>
    @endif
    <!--content end-->
@endsection
@section('bottom')
    <script src="{{asset('home/assets/js/share.js')}}"></script>
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