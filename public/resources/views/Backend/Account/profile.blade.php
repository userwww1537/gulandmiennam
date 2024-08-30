@section('title', 'Thông tin cá nhân của ' . $user['fullName'] . ' - Gulandmiennam.pro.vn')
@section('description', 'Thông tin cá nhân của ' . $user['fullName'] . ' - Gulandmiennam.pro.vn')
@section('btn-fixed-menu')
    <a href="{{ route('dang-bai') }}" class="bnav-lnk">
        <div class="bnav-icn">
            <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                <path
                    d="M5,3C3.89,3 3,3.89 3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V12H19V19H5V5H12V3H5M17.78,4C17.61,4 17.43,4.07 17.3,4.2L16.08,5.41L18.58,7.91L19.8,6.7C20.06,6.44 20.06,6 19.8,5.75L18.25,4.2C18.12,4.07 17.95,4 17.78,4M15.37,6.12L8,13.5V16H10.5L17.87,8.62L15.37,6.12Z">
                </path>
            </svg>
        </div>
        <div class="bnav-lbl">Đăng tin</div>
    </a>
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('Assets/Css/Account/signin.css') }}">
    <style>
        #logs-table {
            overflow-y: auto;
        }
    </style>
@endsection
@extends('Systems.base')
@section('content')
    <div class="sdb-content-picker">
        <div class="l-sdb-user">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="l-sdb-profile">
                            <div class="l-sdb-profile__wrap">
                                <div class="l-sdb-profile__hdr">
                                    <p class="l-sdb-profile__hdr-stl" style="margin-bottom: 15px">Chỉnh
                                        sửa thông tin cá nhân, đổi mật
                                        khẩu.</p>
                                </div>
                                <div class="l-sdb-profile__cnt">
                                    <div class="l-sdb-profile__fsection">
                                        <form enctype="multipart/form-data" role="form"
                                            action="{{ route('method.updateProfile') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $user['id'] }}">
                                            <h3 class="profile-fsection-tle"><span>Thông
                                                    tin cá
                                                    nhân</span></h3>
                                            <div class="row">
                                                <div class="col-lg-9">
                                                    <div class="profile-fsection-dta">
                                                        <div class="form-group">
                                                            <label class="form-label">Ảnh
                                                                đại diện
                                                                <span class="text-red">(*)</span></label>
                                                            <label class="c-avt-upload">
                                                                <input id="InputAvatar" type="file" name="image"
                                                                    class="c-avt-upload__input d-none">
                                                                <i class="c-avt-upload__icon mdi mdi-plus"></i>
                                                                <div id="PreviewAvatar" class="c-avt-upload__img active">
                                                                    <img src="{{ asset('Assets/Images/Users/' . $user['avatar']) }}"
                                                                        alt="Image"></div>
                                                            </label>
                                                            @error('image')
                                                                <div class="alert alert-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="form-label">Số
                                                                điện
                                                                thoại
                                                                <span class="text-red">(*)</span></label>
                                                            <input type="text" class="form-control" name="phone"
                                                                value="{{ $user['phone'] }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="form-label">Họ
                                                                tên
                                                                <span class="text-red">(*)</span></label>
                                                            <input type="text" class="form-control" name="fullName"
                                                                value="{{ $user['fullName'] }}">
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="form-label">Địa chỉ cũ</label>
                                                            <input type="text" class="form-control"
                                                                value="{{ $user['address'] != 'N/A' ? $user['address'] : 'Chưa có' }}"
                                                                disabled>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="form-label">Tỉnh / Thành phố </label>
                                                            <select
                                                                class="form-control select2-input select2-hidden-accessible"
                                                                name="province_id" id="province_id" tabindex="-1"
                                                                aria-hidden="true"
                                                                data-select2-id="select2-data-province_id">
                                                                <option selected="" disabled=""
                                                                    data-select2-id="select2-data-353-sd06">- Chọn -
                                                                </option>
                                                                <option value="1">Thành Phố Hồ Chí Minh</option>
                                                            </select>
                                                            @error('province_id')
                                                                <div class="alert alert-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="form-label">Quận / Huyện </label>
                                                            <select
                                                                class="form-control select2-input select2-hidden-accessible"
                                                                name="district_id" id="district_id" tabindex="-1"
                                                                aria-hidden="true"
                                                                data-select2-id="select2-data-district_id">
                                                                <option selected="" disabled=""
                                                                    data-select2-id="select2-data-355-4ov1">- Chọn -
                                                                </option>
                                                            </select>
                                                            @error('district_id')
                                                                <div class="alert alert-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="form-label">Phường / Xã </label>
                                                            <select
                                                                class="form-control select2-input select2-hidden-accessible"
                                                                name="ward_id" id="ward_id" tabindex="-1"
                                                                aria-hidden="true" data-select2-id="select2-data-ward_id">
                                                                <option selected="" disabled=""
                                                                    data-select2-id="select2-data-355-4ov1">- Chọn -
                                                                </option>
                                                            </select>
                                                            @error('ward_id')
                                                                <div class="alert alert-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="form-label">Địa
                                                                chỉ</label>
                                                            <textarea name="address" id rows="2" class="form-control" placeholder="Số nhà, tên đường, phường, xã"></textarea>
                                                        </div>
                                                        <hr>

                                                        <div class="form-group">
                                                            <label class="form-label">Tổng
                                                                giám
                                                                đốc</label>
                                                            <input type="text" class="form-control"
                                                                value="Phùng Văn Khải - 0795829828" disabled>
                                                        </div>
                                                        @if($controller::checkRole($controller::getRole()->MainRole) >= 5)
                                                            <div class="form-group">
                                                                <label class="form-label">Chi
                                                                    nhánh </label>
                                                                <select
                                                                    class="form-control select2-input select2-hidden-accessible"
                                                                    name="area_id" tabindex="-1" aria-hidden="true"
                                                                    data-select2-id="select2-data-area_id">

                                                                    @foreach ($area as $a)
                                                                        @if ($a['AreaUserID'] == $user['AreaUserID'])
                                                                            <option value="{{ $a['AreaUserID'] }}" selected>
                                                                                {{ $a['areaUserName'] }}</option>
                                                                        @else
                                                                            <option value="{{ $a['AreaUserID'] }}">
                                                                                {{ $a['areaUserName'] }}</option>
                                                                        @endif
                                                                    @endforeach
                                                                </select>
                                                                @error('ward_id')
                                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        @endif
                                                        <hr>

                                                        <div class="form-group">
                                                            <label class="form-label">Tên
                                                                người
                                                                giới
                                                                thiệu</label>
                                                            <input type="text" class="form-control"
                                                                value="{{ $affiliate['fullName'] . ' - ' . $affiliate['phone'] }}"
                                                                disabled>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="form-label">Số
                                                                điện
                                                                thoại
                                                                người
                                                                giới
                                                                thiệu</label>
                                                            <input type="text" class="form-control"
                                                                value="{{ $affiliate['phone'] }}" disabled>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="form-label">Cấp trên</label>
                                                            <input type="text" class="form-control"
                                                                value="{{ $upper['fullName'] . ' - ' . $upper['phone'] }}"
                                                                disabled>
                                                        </div>

                                                        <div class="form-submit-group">
                                                            <button class="btn btn-primary btn-lg update-info">Cập
                                                                nhật
                                                                thông
                                                                tin cá
                                                                nhân</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>

                                    </div>
                                    <div class="l-sdb-profile__fsection">
                                        <h3 class="profile-fsection-tle"><span>Thay
                                                đổi mật khẩu</span></h3>
                                        <div class="row">
                                            <div class="col-lg-9">
                                                <div class="profile-fsection-dta">
                                                    <form action="{{ route('method.updatePassword') }}"
                                                        method="post">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{ $user['id'] }}">
                                                        <div class="form-group">
                                                            <label class="form-label">Mật
                                                                khẩu
                                                                hiện tại
                                                                <span class="text-red">(*)</span></label>
                                                            <input type="password" class="form-control" name="password">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="form-label">Mật
                                                                khẩu mới
                                                                <span class="text-red">(*)</span></label>
                                                            <input type="password" class="form-control"
                                                                placeholder="Ít nhất 6 kí tự" name="new_password">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="form-label">Nhập
                                                                lại mật
                                                                khẩu mới
                                                                <span class="text-red">(*)</span></label>
                                                            <input type="password" class="form-control"
                                                                name="retype_password">
                                                        </div>
                                                        <div class="form-submit-group">
                                                            <button class="btn btn-primary btn-lg">Cập
                                                                nhật mật
                                                                khẩu</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="l-sdb-profile__fsection">
                                        <h3 class="profile-fsection-tle"><span>Lịch sử hoạt động</span></h3>
                                        <div class="row">
                                            <div class="col-lg-9">
                                                <div class="profile-fsection-dta">
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered table-hover">
                                                            <thead>
                                                                <tr>
                                                                    <th>STT</th>
                                                                    <th>Thời gian</th>
                                                                    <th>Hoạt động</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="logs-table">
                                                                @foreach ($logs as $key => $log)
                                                                    <tr>
                                                                        <td>{{ $key + 1 }}</td>
                                                                        <td>{{ $controller::convertTimeVietNam($log['created_at']) }}</td>
                                                                        <td>{{ $log['RecordTitle'] }}</td>
                                                                    </tr>
                                                                @endforeach
                                                                <tr>
                                                                    <td colspan="3">
                                                                        <div class="pagination d-flex justify-content-center">
                                                                            {{ $logs->links() }}
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
                        $('#district_id').append('<option value="' + data[i].DistrictID + '">' + data[i]
                            .DistrictName +
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
                        $('#ward_id').append('<option value="' + data[i].WardID + '">' + data[i]
                            .WardName +
                            '</option>');
                    }
                }
            });
        });
    </script>
@endsection
