@extends('layouts.home')
@section('title')
<title>关于我-{{Config::get('web.web_title')}}</title>
<meta name="keywords" content="小振 关于我" />
<meta name="description" content="小振 关于我">
@endsection
@section('content')
<!--position start-->
<div class="position">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <i class="home_icon"></i><a href="/">首页</a>&rsaquo;
                <span>关于我</span>
            </div>
        </div>
    </div>
</div>
<!--position end-->
<!--about top start-->
<div class="about_top">
    <div class="container">
        <div class="row">
            <div class="col-sm-3 col-md-3">
                <a href="javascript:void(0);" class="active">
                    <span>人生格言</span>
                    <img src="{{asset('/home/assets/img/banner1.jpg')}}" alt="人生格言"/>
                </a>
            </div>
            <div class="col-sm-3 col-md-3">
                <a href="javascript:void(0);">
                    <span>人生阅历</span>
                    <img src="{{asset('/home/assets/img/banner2.jpg')}}" alt="人生阅历"/>
                </a>
            </div>
            <div class="col-sm-3 col-md-3">
                <a href="javascript:void(0);">
                    <span>Just about me</span>
                    <img src="{{asset('/home/assets/img/banner3.jpg')}}" alt="Just about me"/>
                </a>
            </div>
            <div class="col-sm-3 col-md-3">
                <a href="javascript:void(0);">
                    <span>其他</span>
                    <img src="{{asset('/home/assets/img/banner4.jpg')}}" alt="其他"/>
                </a>
            </div>
        </div>
    </div>
    <div class="about_nav"></div>
</div>
<!--about top end-->
<!--content start-->
<div class="content_wrap">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-md-12 about_wrap">
                <div class="about">
                    <div class="widget active">
                        <div class="about_div">
                            <h2 class="widget_tt">人生格言</h2>
                            <div class="about_ct">
                                <p>有一种声音和力量，我被它固有的磁性所着迷。</p>
                                <p>或许不曾闪耀，但庆幸拥有这种美妙气息。</p>
                                <p> 生活的多彩， 不是别人给的定义。</p>
                                <p>那一抹漂亮的蓝，  是实干过后的真实。</p>
                                <p> 往事承载昔日的光辉，记忆还是那样清晰。</p>
                                <p>风雨中当显男儿本色，跌倒后前赴后继。</p>
                                <p>曾经闪耀的光芒，我愿一点点的丢弃。</p>
                                <p>因为普通，才能让生命更加光彩四溢。</p>
                                <p>经历是一本账册， 它记录着你的成长与叛逆。</p>
                                <p>为了宽容和恰到好处，需要谦虚和学习。</p>
                                <p>美好的年华总是有限，把握每一天，争取燃烧出魅力。</p>
                                <p>好好的努力每一天， 总会，有你绽放的那一次。</p>
                                <p>轻松的时刻，要大胆的去卖萌和表现，因为在这个世界上，总会有一个人对你说：“我很看好你。”</p>
                                <p>也许，你无法做到和而不同，那就勇敢的找自己。</p>
                                <p> 世界这么大，精彩那么多，勇敢的去奋斗，潇洒的去充实。</p>
                                <p>心有多远，才能飞多远，你要做自己的经典传奇！</p>
                            </div>
                        </div>
                    </div>
                    <div class="widget">
                        <div class="about_div">
                            <h2 class="widget_tt">人生阅历</h2>
                            <div class="about_ct">
                                <p>1990年03月01日，出生于一个小山村</p>
                                <p>2012年07毕业于大连工业大学</p>
                                <p>而后当了一名电工</p>
                                <p>2013年转行做了一名程序员</p>
                            </div>
                        </div>
                    </div>
                    <div class="widget">
                        <div class="about_div">
                            <h2 class="widget_tt">Just about me</h2>
                            <div class="about_ct">
                                <div class="map">
                                    {{--<p>地址</p>--}}
                                    {{--<p>北京市海淀区中关村苏州街长远天地大厦</p>--}}
                                    {{--<p>10号线苏州街下车即是</p>--}}
                                    <p>联系方式</p>
                                    <p>QQ:358282005</p>
                                    <p>Email:zhangzhenmt@163.com</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="widget">
                        <div class="about_div">
                            <h2 class="widget_tt">其他</h2>
                            <div class="about_ct">
                                <p>域名：www.625buy.com</p>
                                <p>服务器：阿里云服务器</p>
                                <p>程序：PHP</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--content end-->
@endsection
@section('bottom')
<script type="text/javascript">
    $(function(){
        var oAbout = $('.about');
        var oWidget = oAbout.find('.widget');
        var aBtns = $('.about_top a');
        var iZ = oAbout.width()/2;
        var iNow = 0;
        oAbout.css('WebkitTransformOrigin','center center '+iZ+'px');
        oAbout.css('transformOrigin','center center '+iZ+'px');
        aBtns.click(function(){
            aBtns.removeClass('active');
            $(this).addClass('active');
            var index = $(this).index('.about_top a');
            if(iNow == index){
                return;
            }
            tab(iNow,index);
            //iNow 当前显示值  index 是点击值
            iNow = index;
        });
        function tab(iOld,iNow){
            oAbout.css('transition','.5s');
            oAbout.on('transitionend',end);
            if(iOld > iNow){//4 0 向前切换
                oWidget.eq(iNow).addClass('prev');
                oAbout.css({'transform':'rotateY(-90deg)','WebkitTransform':'rotateY(-90deg)'});
            }else{//0 1 向后切换
                oWidget.eq(iNow).addClass('next');
                oAbout.css({'transform':'rotateY(90deg)','WebkitTransform':'rotateY(90deg)'});
            }
            function end(){
                oAbout.off('transitionend',end);
                oAbout.css({'transition':'none','transform':'rotateY(0deg)','WebkitTransform':'rotateY(0deg)'});
                oWidget.eq(iOld).removeClass('active');
                oWidget.eq(iOld).removeClass('prev');
                oWidget.eq(iOld).removeClass('next');
                oWidget.eq(iNow).removeClass('prev');
                oWidget.eq(iNow).removeClass('next');
                oWidget.eq(iNow).addClass('active');
            }
        }
    });
</script>
@endsection