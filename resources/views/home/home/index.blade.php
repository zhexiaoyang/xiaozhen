@extends('layouts.home')
@section('title')
    <title>{{Config::get('web.web_title')}}</title>
    <meta name="keywords" content="个人博客,张振个人博客,小振个人博客,张振" />
    <meta name="description" content="张振个人博客,小振个人博客。" />
@endsection
@section('content')
    <!--banner start-->
    <div class="container-fluid banner_wrap">
        <div class="banner_bg">
            <div class="row">
                <p class="banner_text">{{Config::get('web.banner_title')}}<i class="music_icon"></i></p>
                <p class="banner_text">我们不停的翻着回忆</p>
                <p class="banner_text">却在于找不到那时的自己</p>
                <p class="banner_text">红尘一梦，不再追寻</p>
                <audio loop id="music" class="music_play">
                    <source src="{{Config::get('web.index_music')}}"></source>
                </audio>
            </div>
            <div class="row">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-3 bannner_show">
                            <a href="/about.html">
                                <div class="banner_img">
                                    <img src="{{asset('/home/assets/img/banner1.jpg')}}" alt="人生格言" />
                                    <p class="img_text">人生格言</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-sm-3 bannner_show">
                            <a href="/about.html">
                                <div class="banner_img">
                                    <img src="{{asset('/home/assets/img/banner2.jpg')}}" alt="人生阅历" />
                                    <p class="img_text">人生阅历</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-sm-3 bannner_show">
                            <a href="/about.html">
                                <div class="banner_img">
                                    <img src="{{asset('/home/assets/img/banner3.jpg')}}" alt="Just about me" />
                                    <p class="img_text">Just about me</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-sm-3 bannner_show">
                            <a href="/about.html">
                                <div class="banner_img">
                                    <img src="{{asset('/home/assets/img/banner4.jpg')}}" alt="其他" />
                                    <p class="img_text">其他</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="banner_bottom">
                    <i class="gobtn"></i>
                    <h2 class="banner_tt"></h2>
                </div>
            </div>
        </div>
    </div>
    <!--banner end-->
    <!--content start-->
    <div class="container ">
        <div class="row">
            <h2 class="article_tt">最新文章</h2>
            @if(!empty($new_articles))
                @foreach($new_articles as $art)
                    <article class="col-md-12 citem3">
                        <div class="col-md-4">
                            <a href="{{url('/'.$art['id'])}}.html" class="item_img"><img src="{{asset($art['img_url'])}}"/></a>
                        </div>
                        <div class="col-md-8">
                            <header  class="item_tt">
                                <a href="{{url('/'.$art['id'])}}.html"><span class="tag">{{isset($art['title'])?$art['title']:''}}<i class="arrow"></i></span>{{$art['title']}}</a>
                            </header>
                            <div class="item_info">
                                <span class="time">更新 {{$art['created_at']}}</span>
                                <span class="view_number">{{$art['view']}}人看过</span>
                            </div>
                            <p class="item_desc te2">{{$art['description']}}</p>
                        </div>
                    </article>
                @endforeach
            @endif
        </div>
    </div>
    <!--个人日记 start-->
    <div class="container">
        <div class="row">
            <h2 class="article_tt">嘚吧嘚</h2>
            @if(!empty($says))
                @foreach($says as $say)
                    <div class="col-sm-4 col-md-4 citem2">
                        <a href="{{url('/say')}}.html" class="citem2_card">
                            <div class="item_top">
                                @if($say['img_url'])
                                    <img class="services-v1-icon-wrap radius-circle" src="{{asset($say['img_url'])}}" alt="">
                                @else
                                    <img class="services-v1-icon-wrap radius-circle" src="{{asset('/home/assets/img/say1.jpg')}}" alt="">
                                @endif
                            </div>
                            <div class="item_bottom">
                                <h2 class="item_tt">{{$say['created_at']}}</h2>
                                <p class="item_desc te2">{{$say['content']}}</p>
                            </div>
                        </a>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
    <!--个人日记 end-->
    <!--content end-->
@endsection
