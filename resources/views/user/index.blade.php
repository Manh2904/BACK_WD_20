@extends('layout.user')
@section('profile')

    <div class="lzd-playground-right">
        <div class="breadcrumb">
            <a class="first " href="#">Quản lý tài khoản</a>
            <b>{{ session('status')}}</b>
        </div>
        <div id="cover" class="container" style="background: #eff0f">
            <div id="cover" class="container" style="background: #eff0f">
                <div class="dashboard">
                    <div class="dashboard-profile">
                        <div class="dashboard-mod-title">Thông tin cá nhân<span>|</span>
                            <a href="{{ route('get.user.edit') }}">Chỉnh sửa</a>
                        </div>
                        <div class="dashboard-info">
                            <div class="dashboard-info-item">{{ Auth::user()->name}}</div>
                            <div class="dashboard-info-item">{{ Auth::user()->gmail }}</div>
                            <div class="dashboard-info-item last">
                            </div>
                        </div>
                    </div>
                    <div class="dashboard-address">
                        <div class="dashboard-address-item shipping">
                            <div class="dashboard-mod-title">Sổ địa chỉ <span>|</span>
                                <a href="{{ route('get.user.address') }}">Chỉnh sửa</a>
                            </div>
                            <div class="dashboard-address-default">Địa chỉ nhận hàng mặc định</div>
                            @if(isset(Auth::user()->location))
                                <div class="dashboard-address-username">{{ Auth::user()->user}}</div>
                                <div class="dashboard-address-detail">{{ Auth::user()->location }}</div>
                                <div class="dashboard-address-detail">{{ Auth::user()->address}}</div>
                                <div class="dashboard-address-phone">{{ isset(Auth::user()->address)? Auth::user()->phone: ""}}</div>
                            @else
                                <img src="{{ asset('view/img/location.jpg')}}" style="width:60px ">
                            @endif
                        </div>
                        <div class="dashboard-address-item billing">
                            <div class="dashboard-mod-title">Sổ địa chỉ <span>|</span> <a href="/address#/book">Chỉnh
                                    sửa</a></div>
                            <div class="dashboard-address-default">Địa chỉ thanh toán mặc định</div>
                            <div class="dashboard-address-username">{{ Auth::user()->user}}</div>
                            <div class="dashboard-address-detail">{{ Auth::user()->location }}</div>
                            <div class="dashboard-address-detail">{{ Auth::user()->address}}</div>
                            <div class="dashboard-address-phone">{{ Auth::user()->phone}}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </html>
@stop