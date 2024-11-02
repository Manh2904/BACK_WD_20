<link rel="stylesheet" type="text/css" media="all"
      href="//laz-g-cdn.alicdn.com/lzdmod/playground-nav/5.0.0/pc/index.css"/>
<link rel="stylesheet" href="//laz-g-cdn.alicdn.com/lzdfe/account/3.4.33/pages/profile-pc/index.css">
<!--$ lzd start --prod -->

<link rel="stylesheet" href="//laz-g-cdn.alicdn.com/lzd/assets/0.0.7/dpl-buyeruikit/2.0.1/next-noreset-1.css">
<link rel="stylesheet" href="//laz-g-cdn.alicdn.com/lzd/assets/0.0.7/dpl-buyeruikit/2.0.1/next-noreset-2.css">
<link rel="stylesheet" href="//laz-g-cdn.alicdn.com/lzdfe/order/2.3.20/pages/order-management/index.css">

<link rel="stylesheet" href="//laz-g-cdn.alicdn.com/lzd/assets/0.0.6/dpl-buyeruikit/2.0.1/next-noreset-1.css">
<link rel="stylesheet"
      href="//laz-g-cdn.alicdn.com/lzd/assets/0.0.6/dpl-buyeruikit/2.0.1/next-noreset-2.css">
<link rel="stylesheet"
      href="//laz-g-cdn.alicdn.com/lzdfe/order/2.3.36/pages/reverse-result/index.css">
<link rel="stylesheet" href="//laz-g-cdn.alicdn.com/lzdfe/account/3.4.33/pages/profile-pc/index.css">

<link rel="stylesheet" href="//laz-g-cdn.alicdn.com/lzdfe/address/3.2.14/lib/next-noreset-1.css">
<link rel="stylesheet" href="//laz-g-cdn.alicdn.com/lzdfe/address/3.2.14/lib/next-noreset-2.css">
<link rel="stylesheet" href="//laz-g-cdn.alicdn.com/lzdfe/address/3.2.14/pages/address-pc/index.css">


<!--$ lzd start --prod -->
<link rel="stylesheet" href="//laz-g-cdn.alicdn.com/lzdfe/account/3.4.33/lib/next-noreset-1.css">
<link rel="stylesheet" href="//laz-g-cdn.alicdn.com/lzdfe/account/3.4.33/lib/next-noreset-2.css">
<link rel="stylesheet" href="//laz-g-cdn.alicdn.com/lzdfe/account/3.4.33/pages/change-password-pc/index.css">

@extends('layout.home-page')
@section('content')
    <style>
        #subiz {
            display: none
        }

        #cover {
            width: 988px;
            min-height: 560px;
            margin: 0 auto 30px;
        }

        .dashboard-profile, .dashboard-address-item.shipping, .dashboard-address-item.billing {
            overflow: hidden
        }
    </style>


    <html>
    <div class="lzd-playground-main">
        <div class="lzd-playground-nav">
            <div class="member-info sub" style="font-size:18px;margin-top:2px">
                <span>Xin chào, </span>
                <span id="lzd_current_logon_user_name">{{ Auth::user()->name}}</span>
            </div>
            <ul class="nav-container">
                <li class="item" id="Manage-My-Account">
                </li>
                <li class="item" id="My-Orders">
                    <li class="@if(\Request::route()->getName() == 'get.user.profile') li_active @endif" id="Returns" class="sub" style="margin-top: 25px">
                        <a href="{{ route('get.user.profile') }}">
                            <span>Thông tin cá nhân</span>
                        </a>
                    </li>
                    <li class="@if(\Request::route()->getName() == 'get.user.orders' && Request('status') == 0) li_active @endif" id="Returns" class="sub">
                        <a href="{{ route('get.user.orders', ['status' => 0]) }}">
                            <span>Đơn hàng của tôi</span>
                        </a>
                        </li>
                </li>
                <li class="@if(\Request::route()->getName() == 'get.user.favourite') li_active @endif" class="item" id="My-Orders"><a href="{{ route('get.user.favourite') }}">
                        <span>Sản phẩm yêu thích</span></a>
                </li>
            </ul>
        </div>
        <html>
    @yield('profile')
@stop
