@extends('layout.user')
@section('profile')

    <link rel="stylesheet" href="//laz-g-cdn.alicdn.com/lzdfe/checkout/1.3.17/pages/wishlist/index.css">
    <div class="lzd-playground-right">
        <div class="breadcrumb">
            <a class="first " href="#">Danh sách yêu thích ({{ count($products)}})</a>
        </div>
        <div id="container" class="container">
            <div class="wishlist-container">
                    <div>
                        <div class="wishlist-mod">
                            <div class="shops">
                                @foreach($products as $list)
                                    <div class="shop-items">
                                        <div class="mod-main">
                                            <div class="wishlist-item">
                                                <div class="info">
                                                    <div class="pic"><a
                                                                href=" {{ route('get.category.detail',$list->id)}}"
                                                                target="_blank" rel="noopener noreferrer"><img
                                                                    src="{{ $list->pro_avatar }}" width="80" height="80"
                                                                    style="object-fit:contain"></a></div>
                                                    <div><a class="title"
                                                            href="{{ route('get.category.detail',$list->id)}}">{{ $list->pro_name }}</a>
                                                    </div>
                                                </div>
                                                <div class="price">
                                                    @if($list->pro_sale)
                                                        <div class="currPrice">
                                                            ₫ {{ number_format($list->pro_price,$list->pro_sale )}}</div>
                                                        <div class="originPrice"><span
                                                                    class="origin-price-value">₫ {{ number_format($list->pro_price,0) }}</span><span
                                                                    class="promotion">-{{ $list->pro_sale}}%</span>
                                                        </div>
                                                    @else
                                                        <div class="currPrice">
                                                            ₫ {{ number_format($list->pro_price,0)}}</div>

                                                    @endif
                                                </div>
                                                <div class="right-oper" style="padding: 5px;margin-left: 100px;">
                                                    <a href="{{ route('ajax_get.user.favourite', $list->id) }}">
                                                        <i class="fa fa-heart red" style="font-size:25px"></i>
                                                    </a>
                                                </div>
                                                <div class="right-oper">
                                                    <a class="muangay" href="{{ route('get.shopping.add',$list->id) }}">
                                                    <img src="//laz-img-cdn.alicdn.com/tfs/TB1iUYumfDH8KJjy1XcXXcpdXXa-144-64.png"
                                                            width="72" height="32">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@stop
