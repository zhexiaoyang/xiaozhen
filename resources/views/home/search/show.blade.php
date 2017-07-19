@extends('layouts.home')
@section('title')
    <title>{{Config::get('web.web_title')}}</title>
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
                            <div class="col-sm-4 col-md-4 citem">
                                <a href="{{url('/'.$art->id)}}.html" class="citem_card">
                                    <div class="item_top">
                                        <img src="{{asset($art->img_url)}}"/>
                                    </div>
                                    <div class="item_bottom">
                                        <h2 class="item_tt">{{$art->title}}</h2>
                                        <p class="item_desc">{{$art->description}}</p>
                                        <div class="item_info">
                                            <span class="time pull-left">更新 {{$art->created_at}}</span>
                                            <span class="view_number pull-right">{{$art->view}}人看过</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                        <nav class="text-center" style="clear: both;">
                            {{ $articles->appends(['key' => $key])->links()}}
                            {{--{!! $artcles->links() !!}--}}
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