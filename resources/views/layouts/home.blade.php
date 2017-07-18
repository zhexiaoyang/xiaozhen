<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @yield('title')
    <link rel="icon" href="{{asset('/home/assets/img/favicon.ico')}}" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="{{asset('/home/assets/css/bootstrap.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('/home/assets/css/index.css')}}"/>
    @yield('header')
</head>
<body class="gray">
<header class="hd">
    <nav class="navbar navbar-fixed-top hd_nav">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navsm" aria-expanded="false">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/"><em></em><span>Z</span><span>h</span><span>e</span><span>n</span><span>B</span><span>l</span><span>o</span><span>g</span>
                    <strong>小振博客</strong>
                </a>
            </div>
            <div class="collapse navbar-collapse" id="navsm">
                <form class="navbar-form navbar-right" role="search">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="输入关键词">
                    </div>
                    <button type="submit" class="btn btn-default">搜索</button>
                </form>
                <ul class="nav navbar-nav navbar-right">
                    @foreach($navs as $nav)
                            <li class="active"><a href="{{url($nav['url'])}}">{{$nav['name']}} </a></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </nav>
</header>
<div id="returntop" class="show"></div>
@section('content')
    <div class="widget">
        <h2 class="widget_tt">最新文章</h2>
        <div class="recommend">
            <ul class="recommend_list">
                @foreach($new_articles as $m => $n)
                    <li><a href="{{url('/'.$n['id'])}}.html" class="ellipsis_text"><span>{{$m+1}}</span>{{$n['title']}}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
@show
<!--footer start-->
<footer class="ft">
    <div class="ft_top">
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <dl>
                        <dt>联系方式</dt>
                        <dd>QQ:358282005</dd>
                        <dd>Email:358282005@qq.com</dd>
                    </dl>
                </div>
                <div class="col-sm-8 ft_text">"人生当自勉，学习需坚持。从这一开始，我依旧是我，只是心境在不同。不论今后的路如何，我都在心底默默鼓励自己，坚持不懈，等待那一刻破茧的美丽"</div>
            </div>
        </div>
    </div>
    <div class="ft_bottom">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">Copyright © 2016 imooc.com All Rights Reserved | 京ICP备16031026号-1</div>
            </div>
        </div>
    </div>
</footer>
<!--footer end-->
</body>
</html>
<script src="{{asset('/home/assets/js/jquery-3.0.0.min.js')}}" type="text/javascript" charset="utf-8"></script>
<script src="{{asset('/home/assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('/home/assets/js/index.js')}}" type="text/javascript" charset="utf-8"></script>
@yield('bottom')
