@section('title', 'Đăng nhập tài khoản - Gulandmiennam.pro.vn')
@section('description', 'Đăng nhập tài khoản trên Gulandmiennam.pro.vn để sử dụng các dịch vụ mua bán, cho thuê bất động sản, tìm kiếm khách hàng, giới thiệu thành viên.')
@section('btn-fixed-menu')
    <a href="{{ route('dang-bai') }}" class="bnav-lnk">
        <div class="bnav-icn">
            <svg style="width:24px;height:24px"
                viewBox="0 0 24 24">
                <path
                    d="M5,3C3.89,3 3,3.89 3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V12H19V19H5V5H12V3H5M17.78,4C17.61,4 17.43,4.07 17.3,4.2L16.08,5.41L18.58,7.91L19.8,6.7C20.06,6.44 20.06,6 19.8,5.75L18.25,4.2C18.12,4.07 17.95,4 17.78,4M15.37,6.12L8,13.5V16H10.5L17.87,8.62L15.37,6.12Z"></path>
            </svg>
        </div>
        <div class="bnav-lbl">Đăng tin</div>
    </a>
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('Assets/Css/Account/signin.css') }}">
@extends('Systems.base')
@section('content')
    <div class="sdb-content-picker">
        <div class="container">
            <div class="form-card">
                <div class="row">
                    <div class="hd2">
                        <h3>ĐĂNG NHẬP </h3>
                        <p>Nếu chưa là thành viên vui lòng
                            <a href="{{ route('signup') }}" class="login-button">Đăng ký</a>
                        </p>
                    </div>
                </div>
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @elseif (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <hr>
                <form action="{{ route('process-signin') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label class="form-label">Số điện thoại <span class="h-color-red">(*)</span></label>
                        <input type="text" class="form-control" id="phone" name="phone" value="{{ $param }}">
                        @if ($errors->has('phone'))
                            <span class="error text-danger">{{ $errors->first('phone') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="form-label">Mật khẩu của bạn <span class="h-color-red">(*)</span></label>
                        <input type="password" class="form-control" id="password" name="password">
                        @if ($errors->has('password'))
                            <span class="error text-danger">{{ $errors->first('password') }}</span>
                        @endif
                    </div>
                    <div class="form-submit-group">
                        <button type="submit" class="btn btn-primary btn-block" id="btn-login">Đăng Nhập</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection