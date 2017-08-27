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
                <p class="banner_text">少走了弯路</p>
                <p class="banner_text">也就错过了风景</p>
                <p class="banner_text">无论如何，感谢经历</p>
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

            <div class="col-sm-8 col-md-8 main_ct">
                <div class="row">
                    <h2 class="article_tt">推荐文章</h2>
                    @if(!empty($rec_articles))
                        @foreach($rec_articles as $art)
                            <article class="col-md-12 citem3">
                                <div class="col-md-4">
                                    <a href="{{url('/'.$art['id'])}}.html" class="item_img"><img src="{{asset($art['img_url'])}}"/></a>
                                </div>
                                <div class="col-md-8">
                                    <header  class="item_tt">
                                        <a href="{{url('/'.$art['id'])}}.html">
                                            @if(isset($art->category->name))
                                                <span class="tag">
                                                    <i class="arrow"></i>
                                                    {{ $art->category->name }}
                                                </span>
                                            @endif
                                            {{$art['title']}}
                                        </a>
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
            <aside class="col-sm-4 col-md-4 sidebar">
                <div class="widget">
                    <h2 class="widget_tt">这个东西叫盼头</h2>
                    <div>
                            <div class="clear">距离春节还有：</div>
                            <div id="day" class="countdown">--</div>
                            <div class="countdown">天</div>
                            <div id="hours" class="countdown">--</div>
                            {{--<div class="countdown">:</div>--}}
                            <div id="minutes" class="countdown">--</div>
                            {{--<div class="countdown">:</div>--}}
                            <div id="seconds" class="countdown">--</div>
                            <div class="clear"></div>
                    </div>
                </div>
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
                <div class="widget">
                    <div class="row">
                        <h2 class="widget_tt">我爱嘚吧嘚</h2>
                        @if(!empty($says))
                            @foreach($says as $say)
                                <div class="col-sm-12 col-md-12 citem2">
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
            </aside>
        </div>
    </div>
    <!--content end-->
@endsection

@section('bottom')
<script src="{{asset('/home/assets/js/countdown.js')}}"></script>
<script>
    // 日 时 分 秒的dom对象
    countDownTime.init('2018/2/12 00:00:00', day, hours, minutes, seconds);
    countDownTime.start();
</script>
@endsection