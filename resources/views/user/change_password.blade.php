@extends('layout.user')
@section('profile')
    <div class="lzd-playground-right">
        <div class="breadcrumb"><a>Thay đổi mật khẩu</a></div>
        <div id="container" class="container">
            <div>
                <form action="" method="post">
                    @csrf
                    <div class="mod-layout">
                        <div class="mod-layout-main">
                            <div class="change">
                                <div class="change-form">
                                    <div class="mod-input mod-input-password mod-input-password">
                                        <labe>Mật khẩu hiện tại</label><input type="password" name="old_password  "
                                                                              placeholder="Vui lòng nhập mật khẩu hiện tại của bạn"
                                                                              data-meta="Field"
                                                                              value=""><b></b><span></span>
                                            <div class="mod-input-password-icon"></div>
                                    </div>
                                    <div class="mod-input mod-input-password mod-input-newPassword">
                                        <label>Mật khẩu mới</label><input name="password" type="password"
                                                                          placeholder="Tối thiểu 6 kí tự bao gồm cả chữ và số"
                                                                          data-meta="Field"
                                                                          value=""><b></b><span></span>
                                        <div class="mod-input-password-icon"></div>
                                    </div>
                                    <div class="mod-input mod-input-password mod-input-re-newPassword">
                                        <label>Nhập lại mật khẩu của bạn</label><input name="re_password"
                                                                                       type="password"
                                                                                       placeholder="Nhập lại mật khẩu của bạn"
                                                                                       data-meta="Field"
                                                                                       value=""><b></b><span></span>
                                        <div class="mod-input-password-icon"></div>
                                    </div>
                                </div>
                                <div class="change-foot">
                                    <div class="change-foot-inner">
                                        <button type="submit" class="next-btn next-btn-primary next-btn-large">Lưu thay
                                            đổi
                                        </button>
                                    </div>
                                </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
@stop