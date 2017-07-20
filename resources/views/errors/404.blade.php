@extends('layouts.home')
@section('title')
    <title>{{isset($category)?$category.'-':''}}{{Config::get('web.web_title')}}</title>
    <link rel="stylesheet" href="{{asset('/home/assets/css/404.css')}}">
@endsection
@section('content')
    <div class="main">
        <div class="error-page">
            <h1>404<br>ERROR</h1>
        </div>
    </div>
@endsection