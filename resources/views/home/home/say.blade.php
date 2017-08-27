@extends('layouts.home')
@section('title')
<title>嘚吧嘚-{{Config::get('web.web_title')}}</title>
<meta name="keywords" content="个人博客,张振个人博客,小振个人博客,张振" />
<meta name="description" content="{{isset($article['title'])?$article['title'].'-':''}}{{Config::get('web.web_title')}}" />
<link rel="stylesheet" type="text/css" href="{{asset('/home/assets/css/say.css')}}"/>
@endsection
@section('content')
    <div class="position">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <i class="home_icon"></i><a href="/">首页</a>&rsaquo;
                    <span>嘚吧嘚</span>
                </div>
            </div>
        </div>
    </div>
    <div class="xysay">
        <div class="portlet light portlet-fit bg-inverse ">
            <div class="portlet-body" style="width: 60%;margin: 0 auto;">
                <div class="timeline  white-bg ">
                    @foreach($says as $say)
                    <div class="timeline-item">
                        <div class="timeline-badge">
                            <img class="timeline-badge-userpic" src="{{$say['img_url']}}">
                        </div>
                        <div class="timeline-body">
                            <div class="timeline-body-arrow"> </div>
                            <div class="timeline-body-head">
                                <div class="timeline-body-head-caption">
                                    <a href="javascript:;" class="timeline-body-title font-blue-madison">{{$say['title']}}</a>
                                    <span class="timeline-body-time font-grey-cascade">{{$say['created_at']}}</span>
                                </div>
                                <div class="timeline-body-head-actions"> </div>
                            </div>
                            <div class="timeline-body-content">
							<span class="font-grey-cascade">
							<p>{{$say['content']}}</p>
							</span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
