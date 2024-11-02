@extends('layout.home-page')
@section('content')
<div class="breadCrumbBox">
    <div class=" container">
        <ul>
            <li class="home">
                <a href="/" title="Trang chủ"><i class="fa fa-home" aria-hidden="true"></i>Trang chủ</a>
            </li>

<li>
    <a href="javascript:;" title="Tin tức">Tin tức</a>
</li>

        </ul>
    </div>
</div>

<div class="masterPage news">


<div class="blockNews">
    <div class="container">
        <div class="bao_tt">
            <a class="title" href="javascript:;" title=" Tin khuyến mại áo bóng đá"> Tin khuyến mại áo bóng đá</a>
        </div>
        <div class="list_news">

@foreach($article as $list)
<div class="item">
    <div class="khungAnh">
        <a class="khungAnhCrop" href="{{ route('get.blog.detail',$list->a_slug.'-'.$list->id ) }}" title="{{ $list->a_name}}">
            <img alt="{{ $list->a_name}}" class="lazyload" src="{{ pare_url_file($list->a_avatar) }}">
        </a>
    </div>
    <div class="info">
        <div class="date"><i class="fa fa-calendar"></i> {{date('d/m/Y', strtotime($list->created_at)); }}</div>
        <a class="title" href="{{ route('get.blog.detail',$list->a_slug.'-'.$list->id ) }}" title="{{ $list->a_name}}">{{ $list->a_name}}</a>
        <div class="desc"> {{ substr($list->a_description, 0, 50)}} ...</div>
        <a class="viewDetail" href="{{ route('get.blog.detail',$list->a_slug.'-'.$list->id ) }}" title="Đọc tiếp">Đọc tiếp <i class="fa fa-angle-right"></i></a>
    </div>
</div>
@endforeach

        </div>
    </div>
</div>
</div>
@endsection
