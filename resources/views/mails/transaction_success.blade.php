<div style="width: 100%;max-width: 600px;margin:0 auto">
    <div style="height: 55px;background: #3a2615;padding: 10px">
        <div style="width: 100%">
            <a href="https://watchex.herokuapp.com/">
                <img style="height: 55px"
                     src="https://www.dangquangwatch.vn/upload/slideshow/1787736165_bannerweb148.jpg">
                <img style="height: 55px"
                     src="https://www.dangquangwatch.vn/upload/slideshow/1787736165_bannerweb148.jpg">
            </a>
        </div>
    </div>
    <div style="background: white;padding: 15px;border:1px solid #dedede;">
        <h2 style="margin:10px 0;border-bottom: 1px solid #dedede;padding-bottom: 10px;">Danh sách sản phẩm bạn đã
            mua</h2>
        <div>
            @foreach($shopping as $key => $item)
                <div style="border-bottom: 1px solid #dedede;padding-bottom: 10px;padding-top: 10px;">
                    <div class="" style="width: 15%;float: left;">
                        <a href="{{ route('get.product.detail',Str::slug($item->name).'-'.$item->id )}}">
                            <img style="max-width:100%;width:80px;height:100px;object-fit: contain;"
                                 src="{{ $item->options->image }}">
                        </a>
                    </div>
                    <div style="width: 80%;float: right;">
                        <h4 style="margin:10px 0">{{ $item->name }}</h4>
                        <p style="margin: 4px 0;font-size: 14px;">Giá <span>{{  number_format($item->price,0,',','.') }} đ</span>
                        </p>
                        @if ($item->options->price_old)
                            <p style="margin: 4px 0;font-size: 14px;">
                                <span style="text-decoration: line-through;">{{  number_format(number_price($item->options->price_old),0,',','.') }} đ</span>
                                <span class="sale">- {{ $item->options->sale }} %</span>
                            </p>
                        @endif
                    </div>
                    <div style="clear: both;"></div>
                </div>
            @endforeach
            <h2>Tổng tiền : <b>{{ Cart::subtotal(0) }}đ</b></h2>
        </div>
        <div>
            <p>Đây là email tự động xin vui không không trả lời vào email này</p>
            <p>Tra cứu thông tin đơn hàng tại đây <a href="{{ route('get.user.orders', ['status' => 0]) }}"> tại đây</a>
            </p>
        </div>
    </div>
    <div style="background: #f4f5f5;box-sizing: border-box;padding: 15px">
        <p style="margin:2px 0;color: #333">Email : admin@support.com</p>
        <p style="margin:2px 0;color: #333">Phone : 0879428091</p>
    </div>
</div>
