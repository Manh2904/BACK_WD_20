<!DOCTYPE html>
<html class="html" xmlns="http://www.w3.org/1999/xhtml" debug="true" lang="vi">
    <head>
        <meta name="DC.title" content="QUẦN ÁO BÓNG ĐÁ 2024 | QUẦN ÁO ĐÁ BANH 2024 | ĐỒ ĐÁ BANH 2024" />
        <meta name="geo.region" content="VN-HN" />
        <meta name="geo.placename" content="Hanoi" />
        <title>
            QUẦN ÁO BÓNG ĐÁ 2024 | QUẦN ÁO ĐÁ BANH 2024 | ĐỒ ĐÁ BANH 2024
        </title>
        <meta name="MobileOptimized" content="device-width" />
        <meta content="100%" name="viewport" />
        <meta name="keywords" content="Áo bóng đá, ao bong da, áo bóng đá 2024, in áo bóng đá, in ao bong da, áo đá banh, Quần áo đá banh giá rẻ, áo bóng đá 2024 hà nội, áo bóng đá đẹp nhất, Quần áo đá banh giá rẻ, áo bóng đá giá rẻ hà nội" />
        <meta name="description" content="Chúng tôi chuyên Quần áo bóng đá, Quần áo đá banh, Đồ đá banh đẹp nhất 2024. Bao giá RẺ nhất Hà Nội, Tp HCM & toàn quốc." />
        <meta property="og:title" content="QUẦN ÁO BÓNG ĐÁ 2024 | QUẦN ÁO ĐÁ BANH 2024 | ĐỒ ĐÁ BANH 2024" />
        <meta property="og:type" content="article" />
        <meta property="og:description" content="Chúng tôi chuyên Quần áo bóng đá, Quần áo đá banh, Đồ đá banh đẹp nhất 2024. Bao giá RẺ nhất Hà Nội, Tp HCM & toàn quốc." />
        <link rel="alternate" href="domain" hreflang="vi-vn" />
        <link href="{{ asset('view/css/style.css') }}" rel="stylesheet"/>
        <link href="{{ asset('view/js/owl.carousel.min.css') }}" rel="stylesheet"/>
        <link href="{{ asset('view/js/slick/slick.css') }}" rel="stylesheet"/>
        <script src="{{ asset('view/js/jquery-1.9.1.min.js') }}"></script>
        <script src="{{ asset('view/js/slick/slick.js') }}"></script>
        <link rel="stylesheet" href="{{ asset('toastr/toastr.min.css') }}">
        @if(session('toastr'))
        <script>
            var TYPE_MESSAGE = "{{session('toastr.type') }}";
            var MESSAGE = "{{session('toastr.message') }}";

        </script>
        @endif
    </head>
    <body>
    <div class="headerBox">
        <div class="container1">
                <a href='/' target='' title=''>
                <img alt="" class="logoBox" src="{{ asset('view/img/logo.jpg') }}" />
                </a>
            <div class="headerRight">
                <div class="top_head">
                    <div class="top_left">
                        <div class="phone">
                            <i class="fa fa-phone"></i> <span>Hotline: </span>
                            <a href="tel:1234.567.890" title="Hotline">1234.567.890</a> /
                            <a href="tel:6789.123.456" title="Hotline">6789.123.456</a>
                        </div>
                    </div>
                    <div class="top_right">
                        <div class="menuTop">
                            <a href="{{ route('get.blog.home') }}"  title='Tin tức'>
                            Tin tức
                            </a>
                            <div class="searchHeader">
                                <form class="searchHeader" action="{{ $link_search ?? route('get.product.index',['k' => Request::get('k')]) }}" role="search" method="GET">
                                    <input name="k" value="{{ Request::get('k') }}" type="text" placeholder="Từ khoá tìm kiếm" style="display: none;">
                                    <button type="submit" class="seachBtn" title="Tìm kiếm">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                    </button>
                                </form>
                            </div>
                            <a class="gioHang" href="{{ route('get.shopping.index') }}" title="Giỏ hàng">
                            <i class="fa fa-shopping-cart"></i>
                            <span>{{ \Cart::count() }}</span>
                            </a>
                            @if (Auth::check())
                            <a href="javascript:;">Xin chào {{ Auth::user()->name }}</a>
                            <a href="{{ route('get.logout') }}">Đăng xuất </a>
                            @else
                            <a href="{{ route('get.login') }}">Đăng nhập</a>
                            <a href="{{ route('get.register') }}">Đăng ký</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="menuBox" id="menuBox">
        <div class="container">
            <ul class="menuMain">
                @foreach(\App\Models\Category::limit(10)->get() as $category)
                <li class='list mnNews '>
                    <a href="{{ route('get.category.list', $category->c_slug).'-'.$category->id }}" title="{{ $category->c_name }}">
                    {{ $category->c_name }}
                    </a>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
