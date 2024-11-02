@extends('layout.home-page')
@section('content')
<div class="breadCrumbBox">
    <div class=" container">
        <ul>
            <li class="home">
                <a href="/" title="Trang chủ"><i class="fa fa-home" aria-hidden="true"></i>Trang chủ</a>
            </li>

<li>
    <a href="javascript:void(0);" title="Giỏ hàng">Giỏ hàng</a>
</li>

        </ul>
    </div>
</div>
<form class="masterPage" action="{{ route('post.shopping.pay') }}" method="post">
    @csrf
    <div class="container">
        <div class="gioHangPage">
            <div class="colRight">
                <div class="cartDetail">
                    <div class="title">
                        <span>Đơn hàng của bạn</span>
                    </div>
                    <div class="groupItem" id="TableCart">
                        @foreach($shopping as $key=> $cart)
                        <?php
                            $total += (($cart->price * $cart->qty) * (100 - $cart->options->sale)) / 100;
                        ?>
                            <div class="itemBox">
                                <div class="khungAnh">
                                    <div class="khungAnhCrop">
                                        <img alt="{{ $cart->name}}" src="{{ $cart->options->image }}">
                                    </div>
                                </div>
                                <div class="itemDetail">
                                    <div class="itemTitle">
                                        <span>{{ $cart->name}}(Kích cỡ: {{ isset($cart->options['size']) ? $size[$cart->options['size']] : 'S' }})</span>
                                    </div>
                                    <div class="itemContent">
                                        <div class="itemPrice">
                                        {{ number_price( ($cart->price * (100 - $cart->options->sale)) / 100,0) }}<span>VNĐ</span>
                                        </div>
                                        <div class="sl">
                                            <span>x</span>
                                            <input type="number" class="qty" min="1" value="{{ $cart->qty}}"
                                                data-price="{{$cart->price}}"
                                                data-url="{{ route('ajax_get.shopping.update',$key) }}"
                                                data-id-product="{{$cart->id}}"
                                                       >
                                        </div>
                                        <div class="itemTotal">
                                            <div class="total">
                                           {{ number_price(($cart->price * $cart->qty * (100 - $cart->options->sale)) / 100,0) }}<span>VNĐ</span>
                                            </div>
                                            <a href="{{ route('get.shopping.delete',$key) }}" title="Xóa">Xóa<i class="fa fa-trash" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="totalBox">
                        <div class="text">Tổng cộng</div>
                        <div class="value">
                            <b id="totalPrice">{{ number_price($total,0)  }}<span>VNĐ</span></b>
                        </div>
                    </div>
					<div class="luuYGia" style="padding: 10px 20px;">Giá trên chưa bao gồm phí vận chuyển</div>
                </div>
            </div>
            <div class="colLeft">
                <div class="boxInfo">
                    <div class="thongTinGiaoHang">
                        <div class="title">
                            <span>Thông tin giao hàng</span>
                        </div>
                        <div class="form" id="thongTinGiaoHang">
                            <div class="inputBox w50">
                                <input name="tst_name" value="{{ get_data_user('web','name') }}" type="text" class="required" placeholder="Họ và tên *">
                            </div>
                            <div class="inputBox w50 phone">
                                <input name="tst_phone" value="{{ get_data_user('web','phone') }}" type="text" class="required" placeholder="Điện thoại *">
                            </div>
                            <div class="inputBox w50">
                                <input type="text" name="tst_email" value="{{ get_data_user('web','email') }}" class="required" placeholder="Email *">
                            </div>
                            <div class="inputBox w50 phone">
                                <input type="text" name="tst_address" id="tbDiaChi" class="required" placeholder="Địa chỉ nhận hàng *">
                            </div>
                            <div class="inputBox w100">
                                <textarea name="tst_note" id="tbContent" class="" placeholder="Ghi chú giao hàng"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="phuongThucThanhToan">
                        <div class="title">
                            <span>Phương thức thanh toán</span>
                        </div>
                        <ul class="tab">
                            <li class="active" data-tab="tab1" data-value="1">
                                <div class="pic">
                                    <img src="{{ asset('view/img/freeShip.png') }}" alt="Alternate Text">
                                </div>
                                <div class="itemDetail">
                                    <div class="itemTitle">
                                        <span>Thanh toán khi nhận hàng</span>
                                    </div>
                                    <div class="itemText">
                                        Quý khách sẽ thanh toán bằng tiền mặt khi nhận hàng
                                    </div>
                                </div>
                            </li>
                            <li data-tab="tab2" data-value="2">
                                <div class="pic">
                                    <img src="{{ asset('view/img/iconThanhToan.png') }}" alt="Alternate Text">
                                </div>
                                <div class="itemDetail">
                                    <div class="itemTitle">
                                        <span>Thanh toán chuyển khoản</span>
                                    </div>
                                    <div class="itemText">
                                        Thanh toán chuyển khoản qua số tài khoản ngân hàng
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <input type="hidden" value="1" name="submit" class="type">
                        <div class="tabContent tab1">
                            <div class="noidung">
                                <p>Quý khách sẽ thanh toán bằng tiền mặt khi nhận hàng</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="btnClick">
                    <a href="/" class="tiepTucMua" title="Tiếp tục mua hàng">
                        <span><img src="{{ asset('view/img/muiTen.png') }}" alt="">Tiếp tục mua hàng</span>
                    </a>
                    <button type="submit" style="border:none;background:#000;width: 263px;color:white;line-height: 50px;border-radius: 5px;font:16px/52px SVNG;cursor:pointer">
                        HOÀN TẤT ĐƠN HÀNG
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
