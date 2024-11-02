@extends('layout.home-page')
@section('content')
<title>{{ $product->pro_name}}</title>
<div class="breadCrumbBox">
    <div class=" container">
        <ul>
            <li class="home">
                <a href="/" title="Trang chủ"><i class="fa fa-home" aria-hidden="true"></i>Trang chủ</a>
            </li>
            <li>
                <a href="{{ route('get.category.list', $product->category->c_slug).'-'.$product->pro_category }}" title="{{ $product->category->c_name}}">{{ $product->category->c_name}}</a>
            </li>
            <li>
                <a href="javascript:;" title="{{ $product->pro_name}}">{{ $product->pro_name}}</a>
            </li>
        </ul>
    </div>
</div>
<div class="masterPage">
    <div class="container">
        <div class="productDetail">
            <div class="shortInfo">
                <div class="productPicture">
                    <div class="contentPicture">
                        <div class="groupItem owl-carousel owlCarousel1mb">
                            <div class="itemBox">
                                <div class="khungAnh">
                                    <a class="khungAnhCrop" href="https://aobongda.net/pic/Product/canva_8084_HasThumb.webp" data-fancybox="album" title="{{ $product->pro_name}}">
                                    <img alt="{{ $product->pro_name}}" class=" lazyloaded" src="{{ $product->pro_avatar }}">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="quickInfo">
                    <h1 class="title">
                        {{ $product->pro_name}}
                    </h1>
                    <div class="price_sp">
                        <span class="sale">
                        <span class="numb cc4161c">{{ number_price($product->pro_price,$product->pro_sale)}}đ</span>
                        @if($product->pro_sale > 0)
                        <span class="numb cc4161c"
                            style="text-decoration: line-through;padding-left: 20px;">{{ number_format($product->pro_price,0,',','.')}}đ</span>
                        @endif</span>
                        <div style="position:relative"><i
                                class="fa fa-eye"></i>&nbsp; {{ $product->pro_view }}
                        <a href="javascript:;" data-href="{{ route('ajax_get.user.favourite', $product->id) }}"
                           class="{{ !Auth::id() ? 'js-login' :''}} js-add-favourite">
                           <i
                                    class="{{ !$user_favourite ?'fa fa-heart-o' : 'fa fa-heart red' }}"></i></a>&nbsp;<div
                                class="favourite"
                                style="position: absolute;bottom: 0;margin-left: 60px;"> {{ $product->pro_favourite }}</div>
                    </div>
                    </div>
                    <div class="kichCo type1">
                        <p>
                            <span>Kích cỡ :&nbsp</span>
                            @foreach($size as $key => $item)
                            <span class="sku-variable-name @if($key == 37) active @endif" title="{{ $key }}">
                                <span class="sku-variable-name-text">{{ $item }}</span>
                            </span>
                            @endforeach
                        </p>
                    </div>
                    <div class="buy">
                        <a href="{{ route('get.shopping.add',[
            'type'=> 1,
            'id'=> $product->id,
            'kichco'=> 37
            ]) }}"
            data-id="{{ $product->id }}" class="muangay" title="Mua ngay">
                        <span class="text1">Mua ngay</span> <i class="fa fa-cart-plus"></i>
                        </a>
                    </div>
                    <div class="mess_tuvan">
                        <a class="mess" target="_blank" href="https://www.messenger.com/t/1847033885584162/?messaging_source=source%3Apages%3Amessage_shortlink&amp;source_id=1441792&amp;recurring_notification=0" title="Nhắn tin ngay">Nhắn tin ngay</a>
                        <div class="tuvan">
                            <span>Tư vấn mua hàng</span>
                            <a href="tel:123.456.879" title="Tư vấn mua hàng">123.456.879</a> -
                            <a href="tel:123.456.879" title="Tư vấn mua hàng">123.456.879</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="fullInfo">
                <ul class="tab">
                    <li class="active">
                        <a class="aTab aTab1" data-tab="tab1" href="javascript:void(0);" title="Thông tin chi tiết">Thông tin chi tiết</a>
                    </li>
                </ul>
                <div class="tabContent tab1 active">
                    <div class="noidung">
                        <h2 style="text-align:center"><strong>{{ $product->pro_name}}</strong></h2>
                        {!! $product->pro_content !!}
                    </div>
                </div>
                <div class="commonCuoiChiTietTin">
                    <div class="left">
                        <a class="prevDBT" href="javascript:history.go(-1)"><i class="fa fa-chevron-left" aria-hidden="true"></i> Về trang trước</a>
                        <a target="_blank" href="https://mail.google.com/mail/u/0/?fs=1&amp;to&amp;su={{ $product->pro_name}}&amp;body=https://aobongda.net/ao-bong-da-doi-tuyen-bo-dao-nha-den-loang-2024-2025&amp;ui=2&amp;tf=cm" class="email"><i class="fa fa-envelope" aria-hidden="true"></i> Gửi email</a>
                        <a href="javascript:window.print()" class="print"><i class="fa fa-print" aria-hidden="true"></i> In trang</a>
                    </div>
                    <div class="right">
                        <div class="fbPlugin">
                            <div class="fb-like" data-href="" data-layout="button_count" data-action="like" data-size="small" data-show-faces="true" data-share="false"></div>
                            <div class="fb-share-button" data-href="" data-layout="button_count" data-size="small" data-mobile-iframe="true"><a target="_blank" href="" class="fb-xfbml-parse-ignore"></a></div>
                        </div>
                        <div class="shareSocial">
                            <div class="addthis_sharing_toolbox"></div>
                            <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-549cfbb03cd40d94" async="async"></script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="baiVietOther lienQuan">
            <div class="header">
                <div class="title"><span>Sản phẩm liên quan</span></div>
                <a class="more" href="{{ route('get.category.list', $product->category->c_slug).'-'.$product->pro_category }}" title="Xem tất cả">
                Xem tất cả
                </a>
            </div>
            <div class='slide_BanChay list_sp'>
                @if (isset($productSuggest))
                @foreach($productSuggest as $product)
                @include('layout.component.product_item',['product'=>$product])
                @endforeach
                @endif
            </div>
        </div>
    </div>
</div>
</div>
</div>
@endsection
@push('js')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    $(function () {
        $('.js-add-favourite').click(function (event) {
            event.preventDefault();
            let $this = $(this);
            let URL = $this.data('href');
            if (URL) {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    method: "POST",
                    url: URL
                }).done(function (result) {
                    if (result.status == 1) {
                        $('.js-add-favourite i').removeClass('fa-heart-o');
                        $('.js-add-favourite i').addClass('fa-heart');
                        $('.js-add-favourite i').addClass('red');
                    } else if (result.status == 2) {
                        $('.js-add-favourite i').removeClass('fa-heart');
                        $('.js-add-favourite i').removeClass('red');
                        $('.js-add-favourite i').addClass('fa-heart-o');

                    }
                    $this.parents('h1').find('.favourite').text(result.count);

                })
            }
        });

        let $item = $("#ratings i");
        let arrTextRating = {
            1: "Rất tồi tệ",
            2: "Tồi tệ",
            3: "Tốt",
            4: "Xuất sắc",
            5: "Tuyệt vời"
        };
        $item.mouseover(function () {
            let $this = $(this);
            let $i = $this.attr('data-i');
            $("#review_value").val($i);
            $item.removeClass('r-active');
            $item.each(function (key, value) {
                if (key + 1 <= $i) {
                    $(this).addClass('r-active');
                }
            })
            $("#review_text").addClass('review_text');
            $("#review_text").text(arrTextRating[$i]);
        });
        $(".js-process-view").click(function (event) {
            event.preventDefault();
            let URL = $(this).parents('form').attr('action');
            $.ajax({
                method: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: URL,
                data: $('.form-question').serialize()
            }).done(function (result) {
                $('.form-question')[0].reset();
                console.log(result.html);
                if (result.html) {
                    $(".review_list").prepend(result.html);
                    $(".review_list_personal").prepend(result.personal);
                }
                swal(result.messages, "", "success");
            })
        });


        $("body").on('click', '.pagination a', function (event) {
            event.preventDefault();

            $('li').removeClass('active');
            $(this).parent('li').addClass('active');
            let URL = $(this).attr('href');
            var myurl = URL;
            var page = URL.split('page=')[1];

            getRatingList(page);
        });

        function getRatingList(page) {
            $.ajax({
                type: "GET",
                url: '?page=' + page
            })
                .success(function (results) {
                    $(".review_list_personal").html(results.html);
                });
        }
    })
</script>
@endpush
