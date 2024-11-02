@extends('layout.user')
@section('profile')
    <div class="lzd-playground-right">
        <div class="breadcrumb">
        </div>
        <div id="container" class="container">
            <div id="root_1" class="page-root">
                <div id="cancelSuccess_100" class="cancel-success">
                    <div class="header"><span
                                class="lazada lazada-Progressbar-Success lazada-icon undefine"></span><span
                                class="title">Hủy đơn hàng thành công</span></div>
                    <div class="items">
                        <span class="list-title">Sản phẩm bị hủy</span>
                        <div class="item-list">
                            <div class="order-item">
                                <div class="item-pic"><img
                                            src="https://vn-live.slatic.net/p/f5c6158106ce4f423e32b9a1ca296b2c.png">
                                </div>
                                <div class="item-main item-main-mini">
                                    <div>
                                        <div class="text title item-title">[Có video] Điện thoại LG G6 HÀN 1Sim- 2 Sim
                                            mới (32GB/ram 4Gb) fullbox. Màn hình góc rộng chống nước + cảm biến vân tay
                                            Qualcomm Snapdragon 821 4 nhân 64-bit màn hình IPS LCD, 5.7", Quad HD (2K)
                                            ..bảo hành 1 năm
                                        </div>
                                        <p class="text desc"></p>
                                        <p class="text desc bold"></p>
                                    </div>
                                </div>
                                <div class="item-quantity"><span><span class="text desc info multiply">Qty:</span><span
                                                class="text">&nbsp;1</span></span></div>
                                <div class="item-info"></div>
                                <div class="clear"></div>
                            </div>
                            <div class="order-item">
                                <div class="item-pic"><img
                                            src="https://my-live-02.slatic.net/p/52c36083be3f6b3145b014e4548309b9.jpg">
                                </div>
                                <div class="item-main item-main-mini">
                                    <div>
                                        <div class="text title item-title">Tai nghe bluetooth từ tính kebeteme, tai nghe
                                            thể thao chống nước, Tích hợp micro, tai nghe trong tai rảnh tay, chống ồn
                                            cho điện thoại thông minh Android và IOS
                                        </div>
                                        <p class="text desc"></p>
                                        <p class="text desc bold"></p>
                                    </div>
                                </div>
                                <div class="item-quantity"><span><span class="text desc info multiply">Qty:</span><span
                                                class="text">&nbsp;2</span></span></div>
                                <div class="item-info"></div>
                                <div class="clear"></div>
                            </div>
                            <div class="order-item">
                                <div class="item-pic"><img
                                            src="https://vn-live.slatic.net/p/3a3e79d4d8a2f4ab4d64140501103b04.jpg">
                                </div>
                                <div class="item-main item-main-mini">
                                    <div>
                                        <div class="text title item-title">Bộ Đồ Nỉ Thu Đông Nam Áo Hoodies 98 Kết Hợp
                                            Quần Jogger Trẻ Trung Thời Trang 4MENHCM SET NAM 9000076
                                        </div>
                                        <p class="text desc"></p>
                                        <p class="text desc bold"></p>
                                    </div>
                                </div>
                                <div class="item-quantity"><span><span class="text desc info multiply">Qty:</span><span
                                                class="text">&nbsp;1</span></span></div>
                                <div class="item-info"></div>
                                <div class="clear"></div>
                            </div>
                            <div class="order-item">
                                <div class="item-pic"><img
                                            src="https://vn-live.slatic.net/p/63d6ee6fc547c263af3c3dc71aeab83c.jpg">
                                </div>
                                <div class="item-main item-main-mini">
                                    <div>
                                        <div class="text title item-title">[FREESHIP] Sạc dự phòng Xiaomi Redmi
                                            20.000mAh l Sạc nhanh Max 18W l Input: Micro USB &amp; Type-C / Output:
                                            USB-A x2 l HÀNG CHÍNH HÃNG
                                        </div>
                                        <p class="text desc"></p>
                                        <p class="text desc bold"></p>
                                    </div>
                                </div>
                                <div class="item-quantity"><span><span class="text desc info multiply">Qty:</span><span
                                                class="text">&nbsp;1</span></span></div>
                                <div class="item-info"></div>
                                <div class="clear"></div>
                            </div>
                        </div>
                    </div>
                    <div class="bottom"><span class="desc">Để xem lại đơn hàng đã huỷ</span><a
                                href="{{ route('get.user.cancellation_orders') }}"
                                class="next-btn next-btn-primary next-btn-large button">XEM CHI TIẾT HỦY ĐƠN HÀNG</a>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </div>
@stop