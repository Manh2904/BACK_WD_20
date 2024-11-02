@extends('layout.user')
@section('profile')

    <div class="lzd-playground-right">
        <div class="breadcrumb"><a>Chỉnh sửa địa chỉ</a></div>
        <form action="" method="post">
            @csrf
            <div id="container" class="container">
                <div class="update">
                    <div class="mod-address-update">
                        <div>
                            <form>
                                <div class="mod-address-form mod-vn">
                                    <div class="mod-address-form-bd">
                                        <div class="mod-address-form-left">
                                            <div class="mod-input floating mod-input-name">
                                                <label>Tên</label><input type="text" placeholder="Họ Tên"
                                                                         value="{{ Auth::user()->user }}"><b></b><span></span>
                                                <div class="mod-input-close-icon"></div>
                                            </div>
                                            <div class="mod-input floating mod-input-phone">
                                                <label>Số điện thoại</label><input type="number"
                                                                                   placeholder="Xin vui lòng điền số điện thoại của bạn"
                                                                                   value="{{Auth::user()->phone}}"
                                                                                   pattern="[0-9]*"><b></b><span></span>
                                                <div class="mod-input-close-icon"></div>
                                            </div>
                                        </div>
                                        <div class="mod-address-form-right">
                                            <div class="mod-input floating mod-input-detailAddress">
                                                <label>Địa chỉ nhận hàng</label><input type="text" name="location"
                                                                                       placeholder="Vui lòng nhập địa chỉ của bạn"
                                                                                       value="{{ Auth::user()->location }}"><b></b><span></span>
                                                <div class="mod-input-close-icon"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mod-address-form-action"><a href="{{ route('get.user.address')}}"
                                                                            class="next-btn next-btn-normal next-btn-medium mod-address-form-btn-cancel">HUỶ</a>
                                        <button tabindex="7" type="submit"
                                                class="next-btn next-btn-primary next-btn-large mod-address-form-btn">
                                            LƯU
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </div>
@stop