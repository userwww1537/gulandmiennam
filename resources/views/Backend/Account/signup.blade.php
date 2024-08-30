@section('title', 'Đăng ký tài khoản - Gulandmiennam.pro.vn')
@section('description', 'Đăng ký tài khoản trên Gulandmiennam.pro.vn để sử dụng các dịch vụ mua bán, cho thuê bất động sản, tìm kiếm khách hàng, giới thiệu thành viên.')
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
    <link rel="stylesheet" href="{{ asset('Assets/Css/Account/signup.css') }}">
@extends('Systems.base')
@section('content')
    <div class="sdb-content-picker">
        <div class="container">
            <div class="form-card">
                <div class="row">
                    <div class="hd2">
                        <h3>ĐĂNG KÝ THÀNH VIÊN </h3>
                        <p>Nếu đã là thành viên vui lòng
                            <a href="{{ route('signin') }}" class="login-button">Đăng Nhập</a>
                        </p>
                    </div>
                </div>
                <hr>
                <form action="{{ route('process-signup') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="form-label">Bạn đăng ký với tư cách là
                            <span class="text-red">(*)</span></label>
                        <div class="form-option-wrap">
                            <div class="row">
    
                                <div class="col-auto">
                                    <label class="custom-control custom-radio">
                                        <input type="radio" checked="" value="3" class="custom-control-input"
                                            name="register_type">
                                        <div class="custom-control-label" value="4">
                                            <b>Khách hàng</b>
                                        </div>
                                    </label>
                                </div>
                                <div class="col-auto">
                                    <label class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" value="1" name="register_type">
                                        <div class="custom-control-label"><b>Chủ nhà ,đất</b></div>
                                    </label>
                                </div>
                                <div class="col-auto">
                                    <label class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" value="2" name="register_type">
                                        <div class="custom-control-label"><b>Môi giới</b></div>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Ảnh đại diện </label>
                        <label class="c-avt-upload">
                            <input name="image" id="AvatarInputUpload" type="file" class="c-avt-upload__input d-none">
                            <i class="c-avt-upload__icon mdi mdi-plus"></i>
                            <div id="PreviewAvatar" class="c-avt-upload__img">
                                <img src="" id="register-image">
                            </div>
                        </label>
                        @error('image')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label">Số điện thoại <span class="h-color-red">(*)</span></label>
                        <input type="text" class="form-control" name="phone" value="{{ (isset($params['phone'])) ? $params['phone'] : '' }}" >
                        @error('phone')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label">Họ tên <span class="h-color-red">(*)</span></label>
                        <input type="text" class="form-control" name="fullName" value="{{ (isset($params['fullName'])) ? $params['fullName'] : '' }}" >
                        @error('fullName')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-row">
                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-label">Tỉnh / Thành phố </label>
                                <select class="form-control select2-input select2-hidden-accessible" 
                                    name="province_id" id="province_id" tabindex="-1" aria-hidden="true"
                                    data-select2-id="select2-data-province_id">
                                    <option selected="" disabled="" data-select2-id="select2-data-353-sd06">- Chọn -
                                    </option>
                                    <option value="1">Thành Phố Hồ Chí Minh</option>
                                </select>
                                @error('province_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-label">Quận / Huyện </label>
                                <select class="form-control select2-input select2-hidden-accessible" name="district_id"
                                     id="district_id" tabindex="-1" aria-hidden="true"
                                    data-select2-id="select2-data-district_id">
                                    <option selected="" disabled="" data-select2-id="select2-data-355-4ov1">- Chọn -
                                    </option>
                                </select>
                                @error('district_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-label">Phường / Xã </label>
                                <select class="form-control select2-input select2-hidden-accessible" name="ward_id"
                                     id="ward_id" tabindex="-1" aria-hidden="true"
                                    data-select2-id="select2-data-ward_id">
                                    <option selected="" disabled="" data-select2-id="select2-data-355-4ov1">- Chọn -
                                    </option>
                                </select>
                                @error('ward_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-label">Địa chỉ nhà </label>
                                <input type="text" class="form-control" name="address" value="{{ (isset($params['address'])) ? $params['address'] : '' }}" placeholder="123 Lê Thánh Tôn">
                            </div>
                            @error('address')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Số điện thoại người giới thiệu (Không bắt buộc)</label>
                        <input type="text" class="form-control" name="affilate_phone" id="refer_phone" value="{{ (isset($params['affilate_phone'])) ? $params['affilate_phone'] : '0345123856' }}">
                        @error('affilate_phone')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label">Mật khẩu của bạn ( đặt MK dễ nhớ để đăng nhập) <span
                                class="h-color-red">(*)</span></label>
                        <input type="password" class="form-control" name="password">
                        @error('password')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label">Nhập lại mật khẩu <span class="h-color-red">(*)</span></label>
                        <input type="password" class="form-control" name="password_confirmation">
                        @error('password_confirmation')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <hr>
                    <div class="form-group">
                        <div class="form-sm-txt">Khi đăng ký làm thành viên, bạn sẽ đồng ý với Điều khoản, Chính sách và Quy
                            định của Guland.</div>
                    </div>
                    <div class="form-submit-group">
                        <button type="submit" class="btn btn-primary btn-block" id="btn-register">Đăng ký</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $('#province_id').change(function() {
            var province_id = $(this).val();
            $.ajax({
                url: "{{ route('fetch.get-district') }}",
                type: "post",
                data: {
                    "_token": "{{ csrf_token() }}",
                    city_id: province_id
                },
                success: function(data) {
                    for (var i = 0; i < data.length; i++) {
                        $('#district_id').append('<option value="' + data[i].DistrictID + '">' + data[i].DistrictName +
                            '</option>');
                    }
                }
            });
        });

        $('#district_id').change(function() {
            $('#ward_id').empty();
            var district_id = $(this).val();
            $.ajax({
                url: "{{ route('fetch.get-ward') }}",
                type: "post",
                data: {
                    "_token": "{{ csrf_token() }}",
                    district_id: district_id
                },
                success: function(data) {
                    for (var i = 0; i < data.length; i++) {
                        $('#ward_id').append('<option value="' + data[i].WardID + '">' + data[i].WardName +
                            '</option>');
                    }
                }
            });
        });
    </script>
    
    <script>
        document.getElementById('AvatarInputUpload').addEventListener('change', function() {
            $('.c-avt-upload__img').css('visibility', 'visible');
            var file = this.files[0];
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('register-image').src = e.target.result;
            };
            reader.readAsDataURL(file);
        });
    </script>
@endsection