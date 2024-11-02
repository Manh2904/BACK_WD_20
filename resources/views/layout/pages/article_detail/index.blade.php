@extends('layout.home-page')
@section('content')
<div class="breadCrumbBox">
    <div class=" container">
        <ul>
            <li class="home">
                <a href="/" title="Trang chủ"><i class="fa fa-home" aria-hidden="true"></i>Trang chủ</a>
            </li>
            <li>
                <a href="{{ route('get.blog.home') }}" title="Tin tức">Tin tức</a>
            </li>

            <li>
                <a href="javascript:;" title="{{ $article->a_name }}"> {{$article->a_name }}</a>
            </li>

        </ul>
    </div>
</div>
<div class="masterPage news">
    <div class="pageDetail">
        <div class="container">
            <div class="pageWhite">
                <h1 class="pageTitle">
                    <span>{{ $article->a_name }}</span>
                </h1>

                <div class="commonTool">
                    <span class="date">
                        <i class="fa fa-calendar"></i> {{ $article->created_at; }}
                    </span>
                    <span class="view">
                        <i class="fa fa-eye"></i> {{ $article->a_view }} lượt xem
                    </span>
                </div>
                {{ $article->a_description}}
                <div class="noidung TextSize">
                {!! $article->a_content !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
