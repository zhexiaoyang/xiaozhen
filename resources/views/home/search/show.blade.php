@extends('layouts.home')
@section('title')
    <title>{{isset($key)?$key.'-':''}}{{Config::get('web.web_title')}}</title>
@endsection
@section('content')
    <!--position start-->
    <div class="position">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <i class="home_icon"></i><a href="{{asset('/')}}">首页</a>&rsaquo;<span>{{$key}}</span>
                </div>
            </div>
        </div>
    </div>
    <!--position end-->
    <!--content start-->
    <div class="content_wrap mt20">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-md-8 main_ct">
                    <div class="row">
                        @if(!empty($articles))
                        @foreach($articles as $art)
                                <article class="col-md-12 citem3">
                                    <div class="col-md-4">
                                        <a href="{{url('/'.$art['id'])}}.html" class="item_img"><img src="{{asset($art['img_url'])}}"/></a>
                                    </div>
                                    <div class="col-md-8">
                                        <header  class="item_tt">
                                            <a href="{{url('/'.$art['id'])}}.html">
                                                @if($art['category_name'])
                                                <span class="tag">
                                                    {{$art['category_name']}}
                                                    <i class="arrow"></i>
                                                </span>
                                                @endif
                                                {!! $art['title'] !!}
                                            </a>
                                        </header>
                                        <div class="item_info">
                                            <span class="time">更新 {{$art['created_at']}}</span>
                                            <span class="view_number">{{$art['view']}}人看过</span>
                                        </div>
                                        <p class="item_desc te2">{!! $art['content'] !!}</p>
                                    </div>
                                </article>
                        @endforeach
                        <nav class="text-center" style="clear: both;">
{{--                            {{ $articles->appends(['key' => $key])->links()}}--}}
                            {{ $paginator->links()}}
                        </nav>
                        @endif
                    </div>
                </div>
                <aside class="col-sm-4 col-md-4 sidebar">
                    <div class="widget">
                        <h2 class="widget_tt">标签云</h2>
                        <div class="tag_cloud">
                            @foreach($categorys as $category)
                                <a href="{{url('/cate/'.$category['id'])}}.html">{{$category['name']}}</a>
                            @endforeach
                        </div>
                    </div>
                    @parent
                </aside>
            </div>
        </div>
        <!--content end-->
@endsection