@extends('layout.home-page')
@section('content')
<div class='slideBox'>
    <div class='groupItem owl-carousel owlCarousel1'>
        <div class='item'>
            <div class='khungAnh'>
                <div class='khungAnhCrop'>
                    <a href="javascript:;" target='' title=''>
                    <img alt="" class="pcBox" src="{{ asset('view/img/1200_7388_HasThumb_Thumb.webp') }}" />
                    <img alt="" class="mbBox" src="{{ asset('view/img/390_6021_HasThumb_Thumb.webp') }}" />
                    </a>
                </div>
            </div>
        </div>
        <div class='item'>
            <div class='khungAnh'>
                <div class='khungAnhCrop'>
                    <a href='javascript:;' target='_blank' title='Quần Áo Bóng Đá Trẻ Em'>
                    <img alt="Quần Áo Bóng Đá Trẻ Em" class="pcBox" src="{{ asset('view/img/ao-bong-da-tre-em_6995_7098_HasThumb_Thumb.webp') }}" />
                    <img alt="Quần Áo Bóng Đá Trẻ Em" class="mbBox" src="{{ asset('view/img/ao-bong-da-tre-em_6995_6856_HasThumb_Thumb.webp') }}" />
                    </a>
                </div>
            </div>
        </div>
        <div class='item'>
            <div class='khungAnh'>
                <div class='khungAnhCrop'>
                    <a href='javascript:;' target='_blank' title='Quả Bóng Đá Động Lực'>
                    <img alt="Quả Bóng Đá Động Lực" class="pcBox" src="{{ asset('view/img/qua-bong-da-dong-luc_5523_7493_HasThumb_Thumb.webp') }}" />
                    <img alt="Quả Bóng Đá Động Lực" class="mbBox" src="{{ asset('view/img/qua-bong-da-dong-luc_5523_9692_HasThumb_Thumb.webp') }}" />
                    </a>
                </div>
            </div>
        </div>
        <div class='item'>
            <div class='khungAnh'>
                <div class='khungAnhCrop'>
                    <a href='javascript:;' target='_blank' title='Tuyển sỉ thể thao'>
                    <img alt="Tuyển sỉ thể thao" class="pcBox" src="{{ asset('view/img/1200x432_7972_HasThumb_Thumb.webp') }}" />
                    <img alt="Tuyển sỉ thể thao" class="mbBox" src="{{ asset('view/img/390x139_7009_HasThumb_Thumb.png') }}" />
                    </a>
                </div>
            </div>
        </div>
        <div class='item'>
            <div class='khungAnh'>
                <div class='khungAnhCrop'>
                    <a href='javascript:;' target='' title='Đặt Đội'>
                    <img alt="Đặt Đội" class="pcBox" src="{{ asset('view/img/untitled-design-1_9940_HasThumb_Thumb.webp') }}" />
                    <img alt="Đặt Đội" class="mbBox" src="{{ asset('view/img/untitled-design-1_4170_HasThumb_Thumb.webp') }}" />
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="spBanChay">
    <div class="container">
        <div class="big_tt"><span class="title">Sản phẩm bán chạy</span></div>
        <div class='slide_BanChay list_sp'>
            @if (isset($productsWatch))
            @foreach($productsWatch as $product)
            @include('layout.component.product_item',['product'=>$product])
            @endforeach
            @endif
        </div>
    </div>
</div>
<div>
<div class='productHome'>
    <div class='container'>
        <div class='header'>
            <h2 class='title'>
                <a href="{{ route('get.category.list', $listProduct1[0]->category->c_slug).'-'.$listProduct1[0]->pro_category }}" title="{{ $listProduct1[0]->category->c_name}}">
                {{ $listProduct1[0]->category->c_name}}
                </a>
            </h2>
            <a class='viewAll' href="{{ route('get.category.list', $listProduct1[0]->category->c_slug).'-'.$listProduct1[0]->pro_category }}" title='Xem tất cả'>Xem tất cả <i class='fa fa-angle-right'></i></a>
        </div>
        <div class='groupItem'>
            <div class='itemBox first'>
                <div class='khungAnh'>
                    <a class='khungAnhCrop' href="{{ route('get.category.list', $listProduct1[0]->category->c_slug).'-'.$listProduct1[0]->pro_category }}" title="{{ $listProduct1[0]->category->c_name}}">
                    <img alt="{{ $listProduct1[0]->category->c_name}}" class="lazyload" src="{{ asset('view/img/496-2_6009_HasThumb_Thumb.png') }}" />
                    </a>
                </div>
            </div>
            @if (isset($listProduct1))
            @foreach($listProduct1 as $product)
            @include('layout.component.product_item',['product'=>$product])
            @endforeach
            @endif
        </div>
    </div>
</div>
<div class='productHome'>
    <div class='container'>
        <div class='header'>
            <h2 class='title'>
                <a href="{{ route('get.category.list', $listProduct2[0]->category->c_slug).'-'.$listProduct2[0]->pro_category }}" title="{{ $listProduct2[0]->category->c_name}}">
                {{ $listProduct2[0]->category->c_name}}
                </a>
            </h2>
            <a class='viewAll' href="{{ route('get.category.list', $listProduct2[0]->category->c_slug).'-'.$listProduct2[0]->pro_category }}" title='Xem tất cả'>Xem tất cả <i class='fa fa-angle-right'></i></a>
        </div>
        <div class='groupItem'>
            <div class='itemBox first'>
                <div class='khungAnh'>
                    <a class='khungAnhCrop' href="{{ route('get.category.list', $listProduct2[0]->category->c_slug).'-'.$listProduct2[0]->pro_category }}" title="{{ $listProduct2[0]->category->c_name}}">
                    <img alt="{{ $listProduct2[0]->category->c_name}}" class="lazyload" src="{{ asset('view/img/z5891779370356_160a94456d626e576a763e47be4b4913_7744_HasThumb_Thumb.jpg') }}" />
                    </a>
                </div>
            </div>
            @if (isset($listProduct2))
            @foreach($listProduct2 as $product)
            @include('layout.component.product_item',['product'=>$product])
            @endforeach
            @endif
        </div>
    </div>
</div>
<div class='productHome'>
    <div class='container'>
        <div class='header'>
            <h2 class='title'>
                <a href="{{ route('get.category.list', $listProduct3[0]->category->c_slug).'-'.$listProduct3[0]->pro_category }}" title="{{ $listProduct3[0]->category->c_name}}">
                {{ $listProduct3[0]->category->c_name}}
                </a>
            </h2>
            <a class='viewAll' href="{{ route('get.category.list', $listProduct3[0]->category->c_slug).'-'.$listProduct3[0]->pro_category }}" title='Xem tất cả'>Xem tất cả <i class='fa fa-angle-right'></i></a>
        </div>
        <div class='groupItem'>
            <div class='itemBox first'>
                <div class='khungAnh'>
                    <a class='khungAnhCrop' href="{{ route('get.category.list', $listProduct3[0]->category->c_slug).'-'.$listProduct3[0]->pro_category }}" title="{{ $listProduct3[0]->category->c_name}}">
                    <img alt="{{ $listProduct3[0]->category->c_name}}" class="lazyload" src="{{ asset('view/img/z5941426311806_680a38fe45ebe22b679fbc651ff34cbd_4548_HasThumb_Thumb.jpg') }}" />
                    </a>
                </div>
            </div>
            @if (isset($listProduct3))
            @foreach($listProduct3 as $product)
            @include('layout.component.product_item',['product'=>$product])
            @endforeach
            @endif
        </div>
    </div>
</div>
<div class='productHome'>
    <div class='container'>
        <div class='header'>
            <h2 class='title'>
                <a href="{{ route('get.category.list', $listProduct4[0]->category->c_slug).'-'.$listProduct4[0]->pro_category }}" title="{{ $listProduct4[0]->category->c_name}}">
                {{ $listProduct4[0]->category->c_name}}
                </a>
            </h2>
            <a class='viewAll' href="{{ route('get.category.list', $listProduct4[0]->category->c_slug).'-'.$listProduct4[0]->pro_category }}" title='Xem tất cả'>Xem tất cả <i class='fa fa-angle-right'></i></a>
        </div>
        <div class='groupItem'>
            <div class='itemBox first'>
                <div class='khungAnh'>
                    <a class='khungAnhCrop' href="{{ route('get.category.list', $listProduct4[0]->category->c_slug).'-'.$listProduct4[0]->pro_category }}" title="{{ $listProduct4[0]->category->c_name}}">
                    <img alt="{{ $listProduct4[0]->category->c_name}}" class="lazyload" src="{{ asset('view/img/z5941426311868_a4df570dca6702a5b66542df7a5e314c_4012_HasThumb_Thumb.jpg') }}" />
                    </a>
                </div>
            </div>
            @if (isset($listProduct4))
            @foreach($listProduct4 as $product)
            @include('layout.component.product_item',['product'=>$product])
            @endforeach
            @endif
            </d>
        </div>
    </div>
    <div class='productHome'>
        <div class='container'>
            <div class='header'>
                <h2 class='title'>
                    <a href="{{ route('get.category.list', $listProduct5[0]->category->c_slug).'-'.$listProduct5[0]->pro_category }}" title="{{ $listProduct5[0]->category->c_name}}">
                    {{ $listProduct5[0]->category->c_name}}
                    </a>
                </h2>
                <a class='viewAll' href="{{ route('get.category.list', $listProduct5[0]->category->c_slug).'-'.$listProduct5[0]->pro_category }}" title='Xem tất cả'>Xem tất cả <i class='fa fa-angle-right'></i></a>
            </div>
            <div class='groupItem'>
                <div class='itemBox first'>
                    <div class='khungAnh'>
                        <a class='khungAnhCrop' href="{{ route('get.category.list', $listProduct5[0]->category->c_slug).'-'.$listProduct5[0]->pro_category }}" title="{{ $listProduct5[0]->category->c_name}}">
                        <img alt="{{ $listProduct5[0]->category->c_name}}" class="lazyload" src="{{ asset('view/img/phu-kien-banner_3145_HasThumb_Thumb.jpg') }}"  />
                        </a>
                    </div>
                </div>
                @if (isset($listProduct5))
                @foreach($listProduct5 as $product)
                @include('layout.component.product_item',['product'=>$product])
                @endforeach
                @endif
            </div>
        </div>
    </div>
    <div class='productHome'>
        <div class='container'>
            <div class='header'>
                <h2 class='title'>
                    <a href="{{ route('get.category.list', $listProduct6[0]->category->c_slug).'-'.$listProduct6[0]->pro_category }}" title="{{ $listProduct6[0]->category->c_name}}">
                    {{ $listProduct6[0]->category->c_name}}
                    </a>
                </h2>
                <a class='viewAll' href="{{ route('get.category.list', $listProduct6[0]->category->c_slug).'-'.$listProduct6[0]->pro_category }}" title='Xem tất cả'>Xem tất cả <i class='fa fa-angle-right'></i></a>
            </div>
            <div class='groupItem'>
                <div class='itemBox first'>
                    <div class='khungAnh'>
                        <a class='khungAnhCrop' href="{{ route('get.category.list', $listProduct6[0]->category->c_slug).'-'.$listProduct6[0]->pro_category }}" title="{{ $listProduct6[0]->category->c_name}}">
                        <img alt="{{ $listProduct6[0]->category->c_name}}" class="lazyload" src="{{ asset('view/img/z5962151258572_a1105d508170dd4b7dea1181b1f1569a_6051_HasThumb_Thumb.jpg') }}" />
                        </a>
                    </div>
                </div>
                @if (isset($listProduct6))
                @foreach($listProduct6 as $product)
                @include('layout.component.product_item',['product'=>$product])
                @endforeach
                @endif
            </div>
        </div>
    </div>
</div>
<div>
    <div class='newsHome'>
        <div class='container'>
            <div class='bao_tt'>
                <a class='title' href='/tin-tuc' title='Cẩm nang thể thao'>Cẩm nang thể thao</a>
                <a class='viewAll' href='/tin-tuc' title='Xem tất cả'>Xem tất cả <i class='fa fa-angle-right'></i></a>
            </div>
            <div class='tin_home'>
                @foreach($articles as $key => $list)
                @if (!$key)
                <div class='khungAnh'>
                    <a class='khungAnhCrop' href="{{ route('get.blog.detail',$list->a_slug.'-'.$list->id ) }}" title='{{ $list->a_name}}'>
                    <img alt="{{ $list->a_name}}" class="lazyload" src='{{ pare_url_file($list->a_avatar) }}' />
                    <span class='info'>
                    <span class='date'><i class='fa fa-calendar'></i> {{date('d/m/Y', strtotime($list->created_at)); }}</span>
                    <span class='title'>{{ $list->a_name}}</span>
                    </span>
                    </a>
                </div>
                @else
                <div class='khungAnh'>
                    <a class='khungAnhCrop' href="{{ route('get.blog.detail',$list->a_slug.'-'.$list->id ) }}" title='{{ $list->a_name}}'>
                    <img alt="{{ $list->a_name}}" class="lazyload" src="{{ pare_url_file($list->a_avatar) }}" />
                    <span class='info'>
                    <span class='date'><i class='fa fa-calendar'></i> {{date('d/m/Y', strtotime($list->created_at)); }}</span>
                    <span class='title'>{{ $list->a_name}}</span>
                    </span>
                    </a>
                </div>
                @endif
                @endforeach
            </div>
        </div>
    </div>
</div>
<div class="dailyHome">
    <div class="container">
        <div class="bao_tt">
            <span class="title">Hệ thống 11 cửa hàng chúng tôi</span>
        </div>
        <div class='block_dl'>
            <div class='title_dl'>
                <span>HÀ NỘI (10)</span>
            </div>
            <div class='list_dl'>
                <div class='item'>
                    <div class='title'>Showroom 4</div>
                    <div class='desc'>Đường An Hòa, Hà Đông, Hà Nội</div>
                    <div class='phone'>Hotline: 6789.123.456</div>
                </div>
                <div class='item'>
                    <div class='title'>Showroom 6</div>
                    <div class='desc'>Đường Cầu Giấy, Cầu Giấy, Hà Nội</div>
                    <div class='phone'>Hotline: 1234.567.890</div>
                </div>
                <div class='item'>
                    <div class='title'>Showroom 3</div>
                    <div class='desc'>Trâu Qùy , ĐH Nông nghiệp, Gia Lâm, Hà Nội</div>
                    <div class='phone'>Hotline: 1234.567.890</div>
                </div>
                <div class='item'>
                    <div class='title'>Showroom 2</div>
                    <div class='desc'>Phan Bá Vành ( K3 cũ ) , Cầu Diễn , Từ Liêm, Hà Nội</div>
                    <div class='phone'>Hotline: 1234.567.890</div>
                </div>
                <div class='item'>
                    <div class='title'>Showroom 5</div>
                    <div class='desc'>Đường Khương Thượng, Đống Đa, Hà Nội </div>
                    <div class='phone'>Hotline: 6789.123.456</div>
                </div>
                <div class='item'>
                    <div class='title'>Showroom 21</div>
                    <div class='desc'>Chùa Láng, Đống Đa, Hà Nội</div>
                    <div class='phone'>Hotline: 6789.123.456</div>
                </div>
                <div class='item'>
                    <div class='title'>Showroom 19</div>
                    <div class='desc'>Nguyễn Sơn, Long Biên, Hà Nội</div>
                    <div class='phone'>Hotline: 1234.567.890</div>
                </div>
                <div class='item'>
                    <div class='title'>Showroom 18</div>
                    <div class='desc'>Mai Dịch, Cầu Giấy, Hà Nội</div>
                    <div class='phone'>Hotline: 1234.567.890</div>
                </div>
                <div class='item'>
                    <div class='title'>Showroom 8</div>
                    <div class='desc'>Đường Trần Đại Nghĩa, HBT, Hà Nội</div>
                    <div class='phone'>Hotline: 1234.567.890</div>
                </div>
                <div class='item'>
                    <div class='title'>Showroom 7</div>
                    <div class='desc'>Đường Trần Đại Nghĩa, Hai Bà Trưng, Hà Nội</div>
                    <div class='phone'>Hotline: 1234.567.890</div>
                </div>
            </div>
        </div>
        <div class='block_dl'>
            <div class='title_dl'>
                <span>TP. HỒ CHÍ MINH (1)</span>
            </div>
            <div class='list_dl'>
                <div class='item'>
                    <div class='title'>Showroom 11</div>
                    <div class='desc'>Bắc Hải, Phường 6, Quận Tân Bình , TP Hồ Chí Minh</div>
                    <div class='phone'>Hotline: 1234.567.890</div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
