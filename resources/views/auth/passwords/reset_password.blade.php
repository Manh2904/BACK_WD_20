@include('layout.component.header')
<style> .form-control {
        display: block;
        width: 100%;
        height: 34px;
        padding: 6px 12px;
        font-size: 14px;
        line-height: 1.42857143;
        color: #555;
        background-color: #fff;
        background-image: none;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    .container {
        width: 50%;
        margin: 0 auto;
    }

    .btn-danger {
        background-color: #d9534f;
    }

    .btn-primary {
        background-color: #3c8dbc;
    }

    .btn {
        display: inline-block;
        padding: 6px 12px;
        margin-bottom: 0;
        font-size: 14px;
        font-weight: 400;
        line-height: 1.42857143;
        text-align: center;
        white-space: nowrap;
        vertical-align: middle;
        -ms-touch-action: manipulation;
        touch-action: manipulation;
        cursor: pointer;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        background-image: none;
        border: 1px solid transparent;
        border-radius: 4px;
    }

    label {
        font-size: 18px;
        font-weight: 500;
        line-height: 32px;
        color: inherit;
    }

    .red {
        color: red
    }

    .has-error {;
        color: red
    }

    .has-error input {
        border: 1px solid red
    }

    .d-none {
        display: none
    }

    .login {
        width: 70%;
        text-align: center;
        margin: 0 auto;
        color: white !important
    }

    .login h1 {
        font-size: 25px;
        border-bottom: 2px solid black;
        color: black !important
    }

    .btn-blue {
        border-radius: 10px;
        background-color: #3578E5
    }

    .btn-red {
        border-radius: 10px;
        background-color: red
    }
</style>
<div class="container"><br>
    <div class="login">
        <h1 class="  text-center">ĐỔI MẬT KHẨU</h1><br><br> <br> <br>
    </div>
    @if ($errors->first('login'))
        <p class="text-danger">{{$errors->first('login') }}  </p>
    @endif
    <form action="" method="POST" role="form" class="col-md-8">
        @csrf


        <div class="form-group {{ $errors->first('password') ? ' has-error':'' }}">
            <label for="xampleInputEmai1">Mật khẩu <b class="red">(*)</b> </label>
            <input type="password" name="password" class="form-control" id="xampleInputEmai1" autocomplete="off">
            @if ($errors->first('password'))
                <p class="text-danger">{{$errors->first('password') }}  </p>
            @endif
        </div>
        <div class="form-group {{ $errors->first('confirm_password') ? ' has-error':'' }}">
            <label for="xampleInputEmi1">Xác nhận mật khẩu <b class="red">(*)</b> </label>
            <input type="password" name="confirm_password" class="form-control" id="xampleInputEmi1" autocomplete="off">
            @if ($errors->first('confirm_password'))
                <p class="text-danger">{{$errors->first('confirm_password') }}  </p>
            @endif
        </div>
        <br>
        <button type="submit" class="btn btn-primary"> Đổi mật khẩu</button>
        <a href="{{route('get.home') }}" class="btn btn-danger"><i class="fa fa-undo"></i> Quay lại</a>

    </form>
    <br>
</div>
@include('layout.component.footer') 
