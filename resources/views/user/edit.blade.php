@extends('layout.user')
@section('profile')

    <div class="lzd-playground-right">
        <div class="breadcrumb"><a>Chỉnh sửa</a></div>
        <div id="container" class="container">
            <form action="" method="post">
                @csrf
                <div class="edit-profile">
                    <div class="edit-profile-bd">
                        <div class="edit-profile-item">
                            <h3 class="edit-profile-item-title">Họ tên</h3>
                            <div class="edit-profile-item-info">
                                <div class="mod-input floating edit-profile-input-name mod-input-name">
                                    <input type="text" name="name" id="name" placeholder="Họ Tên"
                                           value="{{ Auth::user()->name }}"><b></b>
                                </div>
                            </div>
                        </div>
                        <div class="edit-profile-item">
                            <h3 class="edit-profile-item-title">
                                <span>Địa chỉ email</span>
                                <div class="mod-input floating  edit-profile-item-value"><input type="text" readonly
                                                                                                name="email"
                                                                                                placeholder="Email"
                                                                                                value="{{ Auth::user()->email }}">
                                </div>
                        </div>
                        <div class="edit-profile-item">
                            <h3 class="edit-profile-item-title">
                                <span>Số điện thoại</span>
                                <div class="mod-input floating  edit-profile-item-value"><input type="text" name="phone"
                                                                                                placeholder="Số điện thoại"
                                                                                                value="{{ Auth::user()->phone }}">
                                </div>
                        </div>
                        <div class="change-foot-inner">
                            <button type="submit" class="next-btn next-btn-primary next-btn-large">Lưu thay đổi</button>
                        </div>
                    </div>
                </div>
        </div>
    </div>
    </div>
    </div>
@stop