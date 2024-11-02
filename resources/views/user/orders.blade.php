@extends('layout.user')
@section('profile')
    <div class="lzd-playground-right">
        <div class="breadcrumb">
            <a class="first " href="//my.lazada.vn/customer/order/index/">Đơn hàng của tôi</a>
        </div>
        <div id="container" class="container">
            <div class="order-list">
                <div class="order-list-tabs">
                    <a href="{{ route('get.user.orders', ['status' => 0]) }}"><span
                                class="order-tab-item @if($status == 0 ) order-tab-item-active @endif">Tất cả({{ $allTransaction}})</span></a>
                    <a href="{{ route('get.user.orders', ['status' => 1]) }}"><span
                                class="order-tab-item @if($status == 1 ) order-tab-item-active @endif">Tiếp nhận({{ $defaultTransaction}})</span></a>
                    <a href="{{ route('get.user.orders', ['status' => 2]) }}"><span
                                class="order-tab-item @if($status == 2 ) order-tab-item-active @endif">Đang vận chuyển({{ $processTransaction}})</span></a>
                    <a href="{{ route('get.user.orders', ['status' => 3]) }}"><span
                                class="order-tab-item @if($status == 3 ) order-tab-item-active @endif">Đã bàn giao({{ $successTransaction}})</span></a>
                    <a href="{{ route('get.user.orders', ['status' => -1]) }}"><span
                                class="order-tab-item @if($status == -1 ) order-tab-item-active @endif">Đã hủy({{ $deletedTransaction}})</span></a>
                </div>
            </div>
            <div class="orders">
                @if(!count($transaction))
                    <div class="order-list">
                        <div class="orders"></div>
                        <div class="order-no-data">
                            <div class="order-no-data-text">Không có đơn hàng</div>
                            <div class="order-no-data-btn"><a href="/" class="order-no-data-btn-text">TIẾP TỤC MUA
                                    SẮM</a></div>
                        </div>
                    </div>
                @endif
                @foreach($transaction as $key => $list)
                    @if($key == 0 &&  isset($transaction[$key+1]) && $transaction[$key]->trans_id  === $transaction[$key+1]->trans_id || isset($transaction[$key-1]) && $transaction[$key]->trans_id  !== $transaction[$key-1]->trans_id || !isset($transaction[$key+1]) || $key == 0)
                        <div class="order">
                            <div class="order-info">
                                <div class="pull-left">
                                    <div class="info-order-left-text">Đơn hàng <a
                                                class="{{ route('get.product.detail',$list->pro_slug.'-'.$list->pro_id)}}">
                                            #{{ $list->trans_id }} </a></div>
                                    <p class="text info desc">Đặt lúc {{ $list->time}} </p>
                                </div>
                            </div>
                            @endif
                            <div class="order-item">
                                <div class="item-pic"><a
                                            href="{{ route('get.product.detail',$list->pro_slug.'-'.$list->pro_id)}}"><img
                                                src="{{  pare_url_file($list->pro_avatar)}}"
                                                style="object-fit: contain;"></a></div>
                                <div class="item-main item-main-mini">
                                    <div class="text title item-title">{{ $list->pro_name }}</div>
                                    <p class="text desc"></p>
                                    <p class="text desc bold"></p>
                                </div>
                                <div class="item-quantity"><span class="text desc info multiply">Qty:</span><span
                                            class="text">&nbsp;{{ $list->od_qty }}</span></div>
                                <div class="label label-primary">
                                    <p class="capsule
                        @if( $list->tst_status == 2) default @endif
                        @if( $list->tst_status == 3) success @endif
                        @if( $list->tst_status == -1) error @endif
                        ">{{ $list->getStatus($list->tst_status)['name'] }}</p>
                                </div>
                            </div>
                            @if($key == 0 && isset($transaction[$key+1])  && $transaction[$key]->trans_id  != $transaction[$key+1]->trans_id || isset($transaction[$key+1]) && $transaction[$key]->trans_id  !== $transaction[$key+1]->trans_id|| !isset($transaction[$key+1])  || $key == 0)
                        </div>
                    @endif
                @endforeach
            </div>
            <div class="box-footer">
                {!! $transaction->appends(request()->query())->links() !!}
            </div>
        </div>
    </div>
    </div>
    </div>
@stop
