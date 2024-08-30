@section('title', 'Danh sách nhân viên của ' . Auth::user()->fullName)
@section('description', 'GulandMienNam - Danh sách nhân viên của ' . Auth::user()->fullName)
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
@endsection
@extends('Systems.base')
@section('content')
    <div class="sdb-content">
        <div class="l-sdb-user">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="l-sdb-profile">
                            <div class="l-sdb-profile__wrap">
                                <div class="l-sdb-profile__cnt">
                                    <div class="l-sdb-profile__fsection">
                                        <h3 class="c-table-datatables__tle"> {{ Auth::user()->fullName }} đang quản lý <b
                                                class="tle-num-count cnt">{{ $count }}</b> nhân viên trên Guland Miền
                                            Nam</h3>
                                        <div class="l-sdb-profile__hdr-rgt">
                                            <div class="l-sdb-profile__hdr-atn">
                                                <a href="#Modal__AddRep" class="btn btn-secondary" id="btn-add-item"
                                                    data-toggle="modal"><i
                                                        class="mdi mdi-map-marker-plus-outline mr-2"></i>Thêm</a>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="c-table-datatables">
                                            <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper">
                                                <div class="table-responsive">
                                                    <table
                                                        class="table table-bordered js-datatables table--custom-vtc dataTable"
                                                        id="DataTables_Table_0" role="grid" style="width: 1492px;">
                                                        <thead>
                                                            <tr role="row">
                                                                <th class="th-sdb-data-cdtn-idnu sorting" tabindex="0"
                                                                    aria-controls="DataTables_Table_0" rowspan="1"
                                                                    colspan="1" style="width: 107.4px;"
                                                                    aria-label="Tên: activate to sort column ascending">Tên
                                                                </th>
                                                                <th class="th-sdb-data-cdtn-idnu sorting" tabindex="0"
                                                                    aria-controls="DataTables_Table_0" rowspan="1"
                                                                    colspan="1" style="width: 93.4px;"
                                                                    aria-label="Chức vụ: activate to sort column ascending">
                                                                    Chức vụ</th>
                                                                <th class="th-sdb-data-cdtn-info sorting" tabindex="0"
                                                                    aria-controls="DataTables_Table_0" rowspan="1"
                                                                    colspan="1" style="width: 159.4px;"
                                                                    aria-label="Chi nhánh : activate to sort column ascending">
                                                                    Chi nhánh </th>
                                                                <th class="th-sdb-data-cdtn-idnu sorting" tabindex="0"
                                                                    aria-controls="DataTables_Table_0" rowspan="1"
                                                                    colspan="1" style="width: 143.4px;"
                                                                    aria-label="Nơi ở: activate to sort column ascending">
                                                                    Nơi ở</th>
                                                                <th class="th-sdb-data-atn sorting" tabindex="0"
                                                                    aria-controls="DataTables_Table_0" rowspan="1"
                                                                    colspan="1" style="width: 118.4px;"
                                                                    aria-label="Cấp trên: activate to sort column ascending">
                                                                    Cấp trên</th>
                                                                <th class="th-sdb-data-atn sorting" tabindex="0"
                                                                    aria-controls="DataTables_Table_0" rowspan="1"
                                                                    colspan="1" style="width: 80.4px;"
                                                                    aria-label="Cấp dưới: activate to sort column ascending">
                                                                    Cấp dưới</th>
                                                                <th class="th-sdb-data-atn sorting" tabindex="0"
                                                                    aria-controls="DataTables_Table_0" rowspan="1"
                                                                    colspan="1" style="width: 94.4px;"
                                                                    aria-label="Tin đã đăng: activate to sort column ascending">
                                                                    Tin đã đăng</th>
                                                                <th class="th-sdb-data-atn sorting" tabindex="0"
                                                                    aria-controls="DataTables_Table_0" rowspan="1"
                                                                    colspan="1" style="width: 106.4px;"
                                                                    aria-label="Ngày tham gia: activate to sort column ascending">
                                                                    Ngày tham gia</th>
                                                                <th class="th-sdb-data-atn sorting" tabindex="0"
                                                                    aria-controls="DataTables_Table_0" rowspan="1"
                                                                    colspan="1" style="width: 90.4px;"
                                                                    aria-label="Hành động: activate to sort column ascending">
                                                                    Hành động</th>
                                                            </tr>
                                                        </thead>
                                                        <tfoot>
                                                            <tr>
                                                                <th class="th-sdb-data-cdtn-idnu" rowspan="1"
                                                                    colspan="1"><input type="text"
                                                                        oninput="searchUser(this)" class="form-control"
                                                                        placeholder="Tìm tên hoặc số điện thoại"></th>
                                                                <th class="tf-sdb-data-user select" rowspan="1"
                                                                    colspan="1">
                                                                    <select class="form-control"
                                                                        onchange="searchRole(this)">
                                                                        <option value="-">Vui lòng chọn</option>
                                                                        <option value="1">Học viên/Cộng tác viên</option>
                                                                        <option value="2">Chuyên viên</option>
                                                                        <option value="3">Trưởng nhóm / Trợ lý
                                                                        </option>
                                                                        <option value="4">Trưởng phòng / Trợ lý
                                                                        </option>
                                                                        <option value="5">Giám đốc khu vực / Trợ lý
                                                                        </option>
                                                                        <option value="6">Tổng giám đốc</option>
                                                                        <option value="7">Admin</option>
                                                                    </select>
                                                                </th>
                                                                <th class="tf-sdb-data-user select" rowspan="1"
                                                                    colspan="1">
                                                                    <select class="form-control"
                                                                        onchange="searchArea(this)">
                                                                        <option value="-">Vui lòng chọn</option>
                                                                        @foreach ($area as $key => $value)
                                                                            <option value="{{ $value['areaUserName'] }}">
                                                                                {{ $value['areaUserName'] }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </th>
                                                                <th class="th-sdb-data-cdtn-idnu" rowspan="1"
                                                                    colspan="1"><input type="text" readonly
                                                                        class="form-control" placeholder="Tìm nơi ở"></th>
                                                                <th class="th-sdb-data-atn" rowspan="1"
                                                                    colspan="1"><input type="text"
                                                                        oninput="searchUpper(this)" class="form-control"
                                                                        placeholder="Tìm cấp trên">
                                                                </th>
                                                                <th class="th-sdb-data-atn" rowspan="1"
                                                                    colspan="1"><input type="text" readonly
                                                                        class="form-control" placeholder="Tìm cấp dưới">
                                                                </th>
                                                                <th class="th-sdb-data-atn" rowspan="1"
                                                                    colspan="1"><input type="text" readonly
                                                                        class="form-control"
                                                                        placeholder="Tìm tin đã đăng"></th>
                                                                <th class="th-sdb-data-atn" rowspan="1"
                                                                    colspan="1"><input type="text" readonly
                                                                        class="form-control"
                                                                        placeholder="Tìm ngày tham gia"></th>
                                                                <th class="th-sdb-data-atn" rowspan="1"
                                                                    colspan="1"><input type="text" readonly
                                                                        class="form-control" placeholder="Tìm hành động">
                                                                </th>
                                                            </tr>
                                                        </tfoot>
                                                        <thead>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($staffs as $key => $value)
                                                                <tr role="row" class="odd">
                                                                    <td>
                                                                        <div class="td-sdb-data-user__name">
                                                                            <a href="#edit-select-user" data-id="232376"
                                                                                data-toggle="modal"
                                                                                class="edit-select-user">{{ $value['fullName'] }}</a>
                                                                        </div>
                                                                        <div class="td-sdb-data-user__phone"><a
                                                                                href="tel:0327485737">{{ $value['phone'] }}</a>
                                                                        </div>
                                                                    </td>
                                                                    <td><a href="" data-type="position"
                                                                            data-id="{{ $value['id'] }}"
                                                                            class="edit-select-position"
                                                                            data-toggle="modal">
                                                                            <div class="td-sdb-data-user__name">
                                                                                {{ $value['roleName'] }}
                                                                            </div>
                                                                        </a></td>
                                                                    <td><a href="#edit-select-branch" data-type="branch"
                                                                            data-id="{{ $value['id'] }}"
                                                                            class="edit-select-branch"
                                                                            data-toggle="modal">
                                                                            <div class="td-sdb-data-user__name"
                                                                                style="width: 180px">
                                                                                {{ $value['areaUserName'] }}</div>
                                                                        </a></td>
                                                                    <td>
                                                                        <div style="min-width: 150px">
                                                                            {{ $value['address'] }}</div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="td-sdb-data-user__name">
                                                                            <a href="#edit-select-user"
                                                                                data-id="{{ $value['id'] }}"
                                                                                data-toggle="modal" data-type="manager_id"
                                                                                class="edit-select-upper">{{ $value['captren']['fullName'] }}
                                                                                ({{ $value['captren']['roleName'] }})
                                                                            </a>
                                                                        </div>
                                                                        <div class="td-sdb-data-user__phone"><a
                                                                                href="tel:{{ $value['captren']['phone'] }}">{{ $value['captren']['phone'] }}</a>
                                                                        </div>
                                                                    </td>
                                                                    <td><a target="_blank"
                                                                            href="">{{ $value['capduoi'] }}</a>
                                                                    </td>
                                                                    <td><a
                                                                            href="{{ route('tin-da-dang.id', $value['id']) }}">{{ $value['countProduct'] }}</a>
                                                                    </td>
                                                                    <td>{{ $value['created_at'] }}</td>
                                                                    <td> <a href="{{ route('method.reset-password', $value['id']) }}"
                                                                            onclick="return confirm('Bạn có chắc chắn muốn reset mật khẩu? Mk mới: 123123')"
                                                                            class="btn btn-outline-success btn-reset-password">Reset
                                                                            mk</a>
                                                                        <a href="{{ route('profile', ['phone' => $value['phone']]) }}"
                                                                            class="btn btn-outline-primary">Sửa</a>
                                                                        <a href="{{ route('method.process-lock', $value['id']) }}"\
                                                                            onclick="return confirm('Bạn có chắc chắn muốn {{ ($value['status'] != 'Active') ? 'mở khóa' : 'khóa' }} tài khoản?')"
                                                                            class="btn btn-outline-primary">{{ ($value['status'] != 'Active') ? 'Mở khóa' : 'Khóa' }}</a>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="table-bottom">
                                                    {{ $staffs->links() }}
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

    <div class="modal fade" id="edit-select-position" tabindex="-1" style="padding-right: 17px;" aria-modal="true"
        role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content" id="edit-select-position-content">
                <div class="modal-header">
                    <div class="modal-subtitle"></div>
                    <h5 class="modal-title">
                        Chọn chức vụ
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="form-edit-select-user">
                        <select class="form-control select2-add-property select2-hidden-accessible" id="select-user"
                            name="user_id" data-select2-id="select2-data-select-user" tabindex="-1" aria-hidden="true">
                            <option value="-">Vui lòng chọn</option>
                            <option value="11">Học viên</option>
                            <option value="1">Cộng tác viên</option>
                            <option value="2">Chuyên viên</option>
                            <option value="3">Trợ lý trưởng nhóm</option>
                            <option value="4">Trưởng nhóm</option>
                            <option value="5">Trợ lý trưởng phòng</option>
                            <option value="6">Trưởng phòng</option>
                            <option value="7">Trợ lý giám đốc khu vực</option>
                            <option value="8">Giám đốc khu vực</option>
                            <option value="9">Trợ lý tổng giám đốc</option>
                            <option value="10">Tổng giám đốc</option>
                        </select>

                        <input type="hidden" name="useridrole">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Hủy bỏ</button>
                    <button type="button" class="btn btn-primary" id="btn-save-select-user">Lưu</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="edit-select-area" tabindex="-1" style="padding-right: 17px;" aria-modal="true"
        role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content" id="edit-select-area-content">
                <div class="modal-header">
                    <div class="modal-subtitle"></div>
                    <h5 class="modal-title">
                        Chọn chi nhánh
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="form-edit-select-user-area">
                        <select class="form-control select2-add-property select2-hidden-accessible" id="select-user"
                            name="areaid" data-select2-id="select2-data-select-user" tabindex="-1" aria-hidden="true">
                            <option value="-">Vui lòng chọn</option>
                            @foreach ($area as $key => $value)
                                <option value="{{ $value['AreaUserID'] }}">{{ $value['areaUserName'] }}</option>
                            @endforeach
                        </select>

                        <input type="hidden" name="useridarea">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Hủy bỏ</button>
                    <button type="button" class="btn btn-primary" id="btn-save-select-user-area">Lưu</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="edit-select-upper" tabindex="-1" style="padding-right: 17px;" aria-modal="true"
        role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content" id="edit-select-upper-content">
                <div class="modal-header">
                    <div class="modal-subtitle"></div>
                    <h5 class="modal-title">
                        Chọn cấp trên
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="form-edit-select-user-upper">
                        <select class="form-control select2-add-property select2-hidden-accessible" id="select-user"
                            name="upperid" data-select2-id="select2-data-select-user" tabindex="-1" aria-hidden="true">
                            <option value="-">Vui lòng chọn</option>
                            @foreach ($uppers as $key => $value)
                                <option value="{{ $value['id'] }}">
                                    {{ $value['fullName'] . ' - ' . $value['roleName'] . ' - ' . $value['phone'] }}
                                </option>
                            @endforeach
                        </select>

                        <input type="hidden" name="useridupper">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Hủy bỏ</button>
                    <button type="button" class="btn btn-primary" id="btn-save-select-user-upper">Lưu</button>
                </div>
            </div>
        </div>
    </div>

    <div id="Modal__AddRep" class="modal fade modal--form" tabindex="-1" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" id="rep-content"><button type="button" class="close close-abs"
                    data-dismiss="modal">✕</button>
                <div class="l-modal-form">
                    <div class="l-modal-form__form">
                        <form id="form-add-rep" method="post" action="{{ route('method.add-staff') }}">
                            @csrf
                            <h3 class="form-title"><i class="mdi mdi-account-plus-outline mr-2"></i>Thêm nhân viên </h3>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label"> Chọn thành viên <span
                                                class="text-red">(*)</span></label>
                                        <select
                                            class="form-control select2-add-property select-user select2-hidden-accessible"
                                            name="user_id" tabindex="-1" aria-hidden="true"
                                            data-select2-id="select2-data-263-qa8p" required>

                                            <option value="">Vui lòng chọn</option>
                                            @foreach ($users as $key => $value)
                                                <option value="{{ $value['id'] }}">
                                                    {{ $value['fullName'] . ' - ' . $value['roleName'] . ' - ' . $value['phone'] }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label"> Chọn cấp trên <span class="text-red">(*)</span></label>
                                        <select
                                            class="form-control select2-add-property select-user select2-hidden-accessible"
                                            name="manager_id" tabindex="-1" aria-hidden="true"
                                            data-select2-id="select2-data-265-u9fj" required>
                                            <option value="">Vui lòng chọn</option>

                                            @foreach ($uppers as $key => $value)
                                                <option value="{{ $value['id'] }}">
                                                    {{ $value['fullName'] . ' - ' . $value['roleName'] . ' - ' . $value['phone'] }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label"> Chọn chức danh <span
                                                class="text-red">(*)</span></label>
                                        <select class="form-control select2-add-property select2-hidden-accessible"
                                            name="position" data-select2-id="select2-data-260-ol6z" tabindex="-1"
                                            aria-hidden="true" required>
                                            <option value="">Vui lòng chọn</option>
                                            <option value="11">Học viên</option>
                                            <option value="1">Cộng tác viên</option>
                                            <option value="2">Chuyên viên</option>
                                            <option value="3">Trợ lý trưởng nhóm</option>
                                            <option value="4">Trưởng nhóm</option>
                                            <option value="5">Trợ lý trưởng phòng</option>
                                            <option value="6">Trưởng phòng</option>
                                            <option value="7">Trợ lý giám đốc khu vực</option>
                                            <option value="8">Giám đốc khu vực</option>
                                            <option value="9">Trợ lý tổng giám đốc</option>
                                            <option value="10">Tổng giám đốc</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-section">
                                <div class="form-group form-submit">
                                    <a href="#" class="btn btn-outline-dark" data-dismiss="modal">Hủy bỏ</a>
                                    <button class="btn btn-primary" type="submit" id="btn-save">Hoàn thành</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('js')
    <script>
        var data = @json($all);

        function searchUser(input) {
            var value = $(input).val().toLowerCase();
            var count = 0;

            var html = '';
            if (value == '') {
                let rs = @json($staffs);
                rs.data.forEach(element => {
                    let edit_link = "{{ route('profile', ['phone' => 'phone']) }}";
                    let tindadang_link = "{{ route('tin-da-dang.id', 'id') }}";
                    let lock_link = "{{ route('method.process-lock', 'id') }}";
                    edit_link = edit_link.replace('phone', element.phone);
                    tin_link = tindadang_link.replace('id', element.id);
                    lock_link = lock_link.replace('id', element.id);

                    html += '<tr role="row" class="odd">';
                    html += '<td>';
                    html += '<div class="td-sdb-data-user__name">';
                    html +=
                        '<a href="#edit-select-user" data-id="232376" data-toggle="modal" class="edit-select-user">' +
                        element.fullName + '</a>';
                    html += '</div>';
                    html += '<div class="td-sdb-data-user__phone"><a href="tel:' + element.phone + '">' + element
                        .phone + '</a></div>';
                    html += '</td>';
                    html += '<td><a href="" data-type="position" data-id="' + element.id +
                        '" class="edit-select-position" data-toggle="modal">';
                    html += '<div class="td-sdb-data-user__name">' + element.roleName + '</div>';
                    html += '</a></td>';
                    html += '<td><a href="#edit-select-branch" data-type="branch" data-id="' + element.id +
                        '" class="edit-select-branch" data-toggle="modal">';
                    html += '<div class="td-sdb-data-user__name" style="width: 180px">' + element.areaUserName +
                        '</div>';
                    html += '</a></td>';
                    html += '<td>';
                    html += '<div style="min-width: 150px">' + element.address + '</div>';
                    html += '</td>';
                    html += '<td>';
                    html += '<div class="td-sdb-data-user__name">';
                    html += '<a href="#edit-select-user" data-id="' + element.id +
                        '" data-toggle="modal" data-type="manager_id" class="edit-select-upper">' + element.captren
                        .fullName + ' (' + element.captren.roleName + ')</a>';
                    html += '</div>';
                    html += '<div class="td-sdb-data-user__phone"><a href="tel:0949357111">' + element.captren
                        .phone + '</a></div>';
                    html += '</td>';
                    html += '<td><a target="_blank" href="">' + element.capduoi + '</a></td>';
                    html += '<td><a href="' + tin_link + '">' + element.countProduct + '</a></td>';
                    html += '<td>' + element.created_at + '</td>';
                    html +=
                        '<td> <a href="#" data-id="232376" class="btn btn-outline-success btn-reset-password">Reset mk</a>';
                    html += '<a href="' + edit_link + '" class="btn btn-outline-primary">Sửa</a>';
                    html += '<a href="' + lock_link + '" class="btn btn-outline-primary">' + ((element.status != 'Active') ? 'Mở khóa' : 'Khóa') + '</a>';
                    html += '</td>';
                    html += '</tr>';
                    count++;
                });
                $('.tle-num-count').html(count);

                $('.c-table-datatables tbody').html(html);
                
                $('.edit-select-position').on('click', function(e) {
                    var id = $(this).data('id');
                    $('#form-edit-select-user input[name="useridrole"]').val(id);
                    $('#edit-select-position').modal('show');
                });

                $('.edit-select-branch').on('click', function(e) {
                    var id = $(this).data('id');
                    $('#form-edit-select-user-area input[name="useridarea"]').val(id);
                    $('#edit-select-area').modal('show');
                });

                $('.edit-select-upper').on('click', function(e) {
                    var id = $(this).data('id');
                    $('#form-edit-select-user-upper input[name="useridupper"]').val(id);
                    $('#edit-select-upper').modal('show');
                });
                return;
            }
            data.forEach(element => {
                if (element.fullName.toLowerCase().includes(value) || element.phone.toLowerCase().includes(value)) {
                    let edit_link = "{{ route('profile', ['phone' => 'phone']) }}";
                    let tindadang_link = "{{ route('tin-da-dang.id', 'id') }}";
                    let lock_link = "{{ route('method.process-lock', 'id') }}";
                    edit_link = edit_link.replace('phone', element.phone);
                    tin_link = tindadang_link.replace('id', element.id);
                    lock_link = lock_link.replace('id', element.id);

                    html += '<tr role="row" class="odd">';
                    html += '<td>';
                    html += '<div class="td-sdb-data-user__name">';
                    html +=
                        '<a href="#edit-select-user" data-id="232376" data-toggle="modal" class="edit-select-user">' +
                        element.fullName + '</a>';
                    html += '</div>';
                    html += '<div class="td-sdb-data-user__phone"><a href="tel:' + element.phone + '">' + element
                        .phone + '</a></div>';
                    html += '</td>';
                    html += '<td><a href="" data-type="position" data-id="' + element.id +
                        '" class="edit-select-position" data-toggle="modal">';
                    html += '<div class="td-sdb-data-user__name">' + element.roleName + '</div>';
                    html += '</a></td>';
                    html += '<td><a href="#edit-select-branch" data-type="branch" data-id="' + element.id +
                        '" class="edit-select-branch" data-toggle="modal">';
                    html += '<div class="td-sdb-data-user__name" style="width: 180px">' + element.areaUserName +
                        '</div>';
                    html += '</a></td>';
                    html += '<td>';
                    html += '<div style="min-width: 150px">' + element.address + '</div>';
                    html += '</td>';
                    html += '<td>';
                    html += '<div class="td-sdb-data-user__name">';
                    html += '<a href="#edit-select-user" data-id="' + element.id +
                        '" data-toggle="modal" data-type="manager_id" class="edit-select-upper">' + element.captren
                        .fullName + ' (' + element.captren.roleName + ')</a>';
                    html += '</div>';
                    html += '<div class="td-sdb-data-user__phone"><a href="tel:0949357111">' + element.captren
                        .phone + '</a></div>';
                    html += '</td>';
                    html += '<td><a target="_blank" href="">' + element.capduoi + '</a></td>';
                    html += '<td><a href="' + tin_link + '">' + element.countProduct + '</a></td>';
                    html += '<td>' + element.created_at + '</td>';
                    html +=
                        '<td> <a href="#" data-id="232376" class="btn btn-outline-success btn-reset-password">Reset mk</a>';
                    html += '<a href="' + edit_link + '" class="btn btn-outline-primary">Sửa</a>';
                    html += '<a href="' + lock_link + '" class="btn btn-outline-primary">' + ((element.status != 'Active') ? 'Mở khóa' : 'Khóa') + '</a>';
                    html += '</td>';
                    html += '</tr>';
                    count++;
                }
            });
            $('.tle-num-count').html(count);
            $('.c-table-datatables tbody').html(html);


            $('.edit-select-position').on('click', function(e) {
                var id = $(this).data('id');
                $('#form-edit-select-user input[name="useridrole"]').val(id);
                $('#edit-select-position').modal('show');
            });

            $('.edit-select-branch').on('click', function(e) {
                var id = $(this).data('id');
                $('#form-edit-select-user-area input[name="useridarea"]').val(id);
                $('#edit-select-area').modal('show');
            });

            $('.edit-select-upper').on('click', function(e) {
                var id = $(this).data('id');
                $('#form-edit-select-user-upper input[name="useridupper"]').val(id);
                $('#edit-select-upper').modal('show');
            });
        }

        function searchRole(value) {
            var role = $(value).val();
            var count = 0;
            var html = '';
            if (role == '-') {
                let rs = @json($staffs);
                rs.data.forEach(element => {
                    let edit_link = "{{ route('profile', ['phone' => 'phone']) }}";
                    let tindadang_link = "{{ route('tin-da-dang.id', 'id') }}";
                    let lock_link = "{{ route('method.process-lock', 'id') }}";
                    edit_link = edit_link.replace('phone', element.phone);
                    tin_link = tindadang_link.replace('id', element.id);
                    lock_link = lock_link.replace('id', element.id);

                    html += '<tr role="row" class="odd">';
                    html += '<td>';
                    html += '<div class="td-sdb-data-user__name">';
                    html +=
                        '<a href="#edit-select-user" data-id="232376" data-toggle="modal" class="edit-select-user">' +
                        element.fullName + '</a>';
                    html += '</div>';
                    html += '<div class="td-sdb-data-user__phone"><a href="tel:' + element.phone + '">' + element
                        .phone + '</a></div>';
                    html += '</td>';
                    html += '<td><a href="" data-type="position" data-id="' + element.id +
                        '" class="edit-select-position" data-toggle="modal">';
                    html += '<div class="td-sdb-data-user__name">' + element.roleName + '</div>';
                    html += '</a></td>';
                    html += '<td><a href="#edit-select-branch" data-type="branch" data-id="' + element.id +
                        '" class="edit-select-branch" data-toggle="modal">';
                    html += '<div class="td-sdb-data-user__name" style="width: 180px">' + element.areaUserName +
                        '</div>';
                    html += '</a></td>';
                    html += '<td>';
                    html += '<div style="min-width: 150px">' + element.address + '</div>';
                    html += '</td>';
                    html += '<td>';
                    html += '<div class="td-sdb-data-user__name">';
                    html += '<a href="#edit-select-user" data-id="' + element.id +
                        '" data-toggle="modal" data-type="manager_id" class="edit-select-upper">' + element.captren
                        .fullName + ' (' + element.captren.roleName + ')</a>';
                    html += '</div>';
                    html += '<div class="td-sdb-data-user__phone"><a href="tel:0949357111">' + element.captren
                        .phone + '</a></div>';
                    html += '</td>';
                    html += '<td><a target="_blank" href="">' + element.capduoi + '</a></td>';
                    html += '<td><a href="' + tin_link + '">' + element.countProduct + '</a></td>';
                    html += '<td>' + element.created_at + '</td>';
                    html +=
                        '<td> <a href="#" data-id="232376" class="btn btn-outline-success btn-reset-password">Reset mk</a>';
                    html += '<a href="' + edit_link + '" class="btn btn-outline-primary">Sửa</a>';
                    html += '<a href="' + lock_link + '" class="btn btn-outline-primary">' + ((element.status != 'Active') ? 'Mở khóa' : 'Khóa') + '</a>';
                    html += '</td>';
                    html += '</tr>';
                    count++;
                });
                $('.tle-num-count').html(count);

                $('.c-table-datatables tbody').html(html);
                
                $('.edit-select-position').on('click', function(e) {
                    var id = $(this).data('id');
                    $('#form-edit-select-user input[name="useridrole"]').val(id);
                    $('#edit-select-position').modal('show');
                });

                $('.edit-select-branch').on('click', function(e) {
                    var id = $(this).data('id');
                    $('#form-edit-select-user-area input[name="useridarea"]').val(id);
                    $('#edit-select-area').modal('show');
                });

                $('.edit-select-upper').on('click', function(e) {
                    var id = $(this).data('id');
                    $('#form-edit-select-user-upper input[name="useridupper"]').val(id);
                    $('#edit-select-upper').modal('show');
                });
                return;
            }

            data.forEach(element => {
                if (element.role_search == role) {
                    let edit_link = "{{ route('profile', ['phone' => 'phone']) }}";
                    let tindadang_link = "{{ route('tin-da-dang.id', 'id') }}";
                    let lock_link = "{{ route('method.process-lock', 'id') }}";
                    edit_link = edit_link.replace('phone', element.phone);
                    tin_link = tindadang_link.replace('id', element.id);
                    lock_link = lock_link.replace('id', element.id);

                    html += '<tr role="row" class="odd">';
                    html += '<td>';
                    html += '<div class="td-sdb-data-user__name">';
                    html +=
                        '<a href="#edit-select-user" data-id="232376" data-toggle="modal" class="edit-select-user">' +
                        element.fullName + '</a>';
                    html += '</div>';
                    html += '<div class="td-sdb-data-user__phone"><a href="tel:' + element.phone + '">' + element
                        .phone + '</a></div>';
                    html += '</td>';
                    html += '<td><a href="" data-type="position" data-id="' + element.id +
                        '" class="edit-select-position" data-toggle="modal">';
                    html += '<div class="td-sdb-data-user__name">' + element.roleName + '</div>';
                    html += '</a></td>';
                    html += '<td><a href="#edit-select-branch" data-type="branch" data-id="' + element.id +
                        '" class="edit-select-branch" data-toggle="modal">';
                    html += '<div class="td-sdb-data-user__name" style="width: 180px">' + element.areaUserName +
                        '</div>';
                    html += '</a></td>';
                    html += '<td>';
                    html += '<div style="min-width: 150px">' + element.address + '</div>';
                    html += '</td>';
                    html += '<td>';
                    html += '<div class="td-sdb-data-user__name">';
                    html += '<a href="#edit-select-user" data-id="' + element.id +
                        '" data-toggle="modal" data-type="manager_id" class="edit-select-upper">' + element.captren
                        .fullName + ' (' + element.captren.roleName + ')</a>';
                    html += '</div>';
                    html += '<div class="td-sdb-data-user__phone"><a href="tel:0949357111">' + element.captren
                        .phone + '</a></div>';
                    html += '</td>';
                    html += '<td><a target="_blank" href="">' + element.capduoi + '</a></td>';
                    html += '<td><a href="' + tin_link + '">' + element.countProduct + '</a></td>';
                    html += '<td>' + element.created_at + '</td>';
                    html +=
                        '<td> <a href="#" data-id="232376" class="btn btn-outline-success btn-reset-password">Reset mk</a>';
                    html += '<a href="' + edit_link + '" class="btn btn-outline-primary">Sửa</a>';
                    html += '<a href="' + lock_link + '" class="btn btn-outline-primary">' + ((element.status != 'Active') ? 'Mở khóa' : 'Khóa') + '</a>';
                    html += '</td>';
                    html += '</tr>';
                    count++;
                }
            });
            $('.tle-num-count').html(count);

            $('.c-table-datatables tbody').html(html);


            $('.edit-select-position').on('click', function(e) {
                var id = $(this).data('id');
                $('#form-edit-select-user input[name="useridrole"]').val(id);
                $('#edit-select-position').modal('show');
            });

            $('.edit-select-branch').on('click', function(e) {
                var id = $(this).data('id');
                $('#form-edit-select-user-area input[name="useridarea"]').val(id);
                $('#edit-select-area').modal('show');
            });

            $('.edit-select-upper').on('click', function(e) {
                var id = $(this).data('id');
                $('#form-edit-select-user-upper input[name="useridupper"]').val(id);
                $('#edit-select-upper').modal('show');
            });
        }

        function searchUpper(input) {
            var value = $(input).val().toLowerCase();
            var count = 0;

            var html = '';
            if (value == '') {
                let rs = @json($staffs);
                rs.data.forEach(element => {
                    let edit_link = "{{ route('profile', ['phone' => 'phone']) }}";
                    let tindadang_link = "{{ route('tin-da-dang.id', 'id') }}";
                    let lock_link = "{{ route('method.process-lock', 'id') }}";
                    edit_link = edit_link.replace('phone', element.phone);
                    tin_link = tindadang_link.replace('id', element.id);
                    lock_link = lock_link.replace('id', element.id);

                    html += '<tr role="row" class="odd">';
                    html += '<td>';
                    html += '<div class="td-sdb-data-user__name">';
                    html +=
                        '<a href="#edit-select-user" data-id="232376" data-toggle="modal" class="edit-select-user">' +
                        element.fullName + '</a>';
                    html += '</div>';
                    html += '<div class="td-sdb-data-user__phone"><a href="tel:' + element.phone + '">' + element
                        .phone + '</a></div>';
                    html += '</td>';
                    html += '<td><a href="" data-type="position" data-id="' + element.id +
                        '" class="edit-select-position" data-toggle="modal">';
                    html += '<div class="td-sdb-data-user__name">' + element.roleName + '</div>';
                    html += '</a></td>';
                    html += '<td><a href="#edit-select-branch" data-type="branch" data-id="' + element.id +
                        '" class="edit-select-branch" data-toggle="modal">';
                    html += '<div class="td-sdb-data-user__name" style="width: 180px">' + element.areaUserName +
                        '</div>';
                    html += '</a></td>';
                    html += '<td>';
                    html += '<div style="min-width: 150px">' + element.address + '</div>';
                    html += '</td>';
                    html += '<td>';
                    html += '<div class="td-sdb-data-user__name">';
                    html += '<a href="#edit-select-user" data-id="' + element.id +
                        '" data-toggle="modal" data-type="manager_id" class="edit-select-upper">' + element.captren
                        .fullName + ' (' + element.captren.roleName + ')</a>';
                    html += '</div>';
                    html += '<div class="td-sdb-data-user__phone"><a href="tel:0949357111">' + element.captren
                        .phone + '</a></div>';
                    html += '</td>';
                    html += '<td><a target="_blank" href="">' + element.capduoi + '</a></td>';
                    html += '<td><a href="' + tin_link + '">' + element.countProduct + '</a></td>';
                    html += '<td>' + element.created_at + '</td>';
                    html +=
                        '<td> <a href="#" data-id="232376" class="btn btn-outline-success btn-reset-password">Reset mk</a>';
                    html += '<a href="' + edit_link + '" class="btn btn-outline-primary">Sửa</a>';
                    html += '<a href="' + lock_link + '" class="btn btn-outline-primary">' + ((element.status != 'Active') ? 'Mở khóa' : 'Khóa') + '</a>';
                    html += '</td>';
                    html += '</tr>';
                    count++;
                });
                $('.tle-num-count').html(count);

                $('.c-table-datatables tbody').html(html);
                
                $('.edit-select-position').on('click', function(e) {
                    var id = $(this).data('id');
                    $('#form-edit-select-user input[name="useridrole"]').val(id);
                    $('#edit-select-position').modal('show');
                });

                $('.edit-select-branch').on('click', function(e) {
                    var id = $(this).data('id');
                    $('#form-edit-select-user-area input[name="useridarea"]').val(id);
                    $('#edit-select-area').modal('show');
                });

                $('.edit-select-upper').on('click', function(e) {
                    var id = $(this).data('id');
                    $('#form-edit-select-user-upper input[name="useridupper"]').val(id);
                    $('#edit-select-upper').modal('show');
                });
                return;
            }

            data.forEach(element => {
                if (element.captren.fullName.toLowerCase().includes(value) || element.captren.phone.toLowerCase()
                    .includes(value)) {
                    let edit_link = "{{ route('profile', ['phone' => 'phone']) }}";
                    let tindadang_link = "{{ route('tin-da-dang.id', 'id') }}";
                    let lock_link = "{{ route('method.process-lock', 'id') }}";
                    edit_link = edit_link.replace('phone', element.phone);
                    tin_link = tindadang_link.replace('id', element.id);
                    lock_link = lock_link.replace('id', element.id);

                    html += '<tr role="row" class="odd">';
                    html += '<td>';
                    html += '<div class="td-sdb-data-user__name">';
                    html +=
                        '<a href="#edit-select-user" data-id="232376" data-toggle="modal" class="edit-select-user">' +
                        element.fullName + '</a>';
                    html += '</div>';
                    html += '<div class="td-sdb-data-user__phone"><a href="tel:' + element.phone + '">' + element
                        .phone + '</a></div>';
                    html += '</td>';
                    html += '<td><a href="" data-type="position" data-id="' + element.id +
                        '" class="edit-select-position" data-toggle="modal">';
                    html += '<div class="td-sdb-data-user__name">' + element.roleName + '</div>';
                    html += '</a></td>';
                    html += '<td><a href="#edit-select-branch" data-type="branch" data-id="' + element.id +
                        '" class="edit-select-branch" data-toggle="modal">';
                    html += '<div class="td-sdb-data-user__name" style="width: 180px">' + element.areaUserName +
                        '</div>';
                    html += '</a></td>';
                    html += '<td>';
                    html += '<div style="min-width: 150px">' + element.address + '</div>';
                    html += '</td>';
                    html += '<td>';
                    html += '<div class="td-sdb-data-user__name">';
                    html += '<a href="#edit-select-user" data-id="' + element.id +
                        '" data-toggle="modal" data-type="manager_id" class="edit-select-upper">' + element.captren
                        .fullName + ' (' + element.captren.roleName + ')</a>';
                    html += '</div>';
                    html += '<div class="td-sdb-data-user__phone"><a href="tel:0949357111">' + element.captren
                        .phone + '</a></div>';
                    html += '</td>';
                    html += '<td><a target="_blank" href="">' + element.capduoi + '</a></td>';
                    html += '<td><a href="' + tin_link + '">' + element.countProduct + '</a></td>';
                    html += '<td>' + element.created_at + '</td>';
                    html +=
                        '<td> <a href="#" data-id="232376" class="btn btn-outline-success btn-reset-password">Reset mk</a>';
                    html += '<a href="' + edit_link + '" class="btn btn-outline-primary">Sửa</a>';
                    html += '<a href="' + lock_link + '" class="btn btn-outline-primary">' + ((element.status != 'Active') ? 'Mở khóa' : 'Khóa') + '</a>';
                    html += '</td>';
                    html += '</tr>';
                    count++;
                }
            });
            $('.tle-num-count').html(count);
            $('.c-table-datatables tbody').html(html);

            $('.edit-select-position').on('click', function(e) {
                var id = $(this).data('id');
                $('#form-edit-select-user input[name="useridrole"]').val(id);
                $('#edit-select-position').modal('show');
            });

            $('.edit-select-branch').on('click', function(e) {
                var id = $(this).data('id');
                $('#form-edit-select-user-area input[name="useridarea"]').val(id);
                $('#edit-select-area').modal('show');
            });

            $('.edit-select-upper').on('click', function(e) {
                var id = $(this).data('id');
                $('#form-edit-select-user-upper input[name="useridupper"]').val(id);
                $('#edit-select-upper').modal('show');
            });
        }

        function searchArea(value) {
            var area = $(value).val();
            var count = 0;
            var html = '';
            if (area == '-') {
                let rs = @json($staffs);
                rs.data.forEach(element => {
                    let edit_link = "{{ route('profile', ['phone' => 'phone']) }}";
                    let tindadang_link = "{{ route('tin-da-dang.id', 'id') }}";
                    let lock_link = "{{ route('method.process-lock', 'id') }}";
                    edit_link = edit_link.replace('phone', element.phone);
                    tin_link = tindadang_link.replace('id', element.id);
                    lock_link = lock_link.replace('id', element.id);

                    html += '<tr role="row" class="odd">';
                    html += '<td>';
                    html += '<div class="td-sdb-data-user__name">';
                    html +=
                        '<a href="#edit-select-user" data-id="232376" data-toggle="modal" class="edit-select-user">' +
                        element.fullName + '</a>';
                    html += '</div>';
                    html += '<div class="td-sdb-data-user__phone"><a href="tel:' + element.phone + '">' + element
                        .phone + '</a></div>';
                    html += '</td>';
                    html += '<td><a href="" data-type="position" data-id="' + element.id +
                        '" class="edit-select-position" data-toggle="modal">';
                    html += '<div class="td-sdb-data-user__name">' + element.roleName + '</div>';
                    html += '</a></td>';
                    html += '<td><a href="#edit-select-branch" data-type="branch" data-id="' + element.id +
                        '" class="edit-select-branch" data-toggle="modal">';
                    html += '<div class="td-sdb-data-user__name" style="width: 180px">' + element.areaUserName +
                        '</div>';
                    html += '</a></td>';
                    html += '<td>';
                    html += '<div style="min-width: 150px">' + element.address + '</div>';
                    html += '</td>';
                    html += '<td>';
                    html += '<div class="td-sdb-data-user__name">';
                    html += '<a href="#edit-select-user" data-id="' + element.id +
                        '" data-toggle="modal" data-type="manager_id" class="edit-select-upper">' + element.captren
                        .fullName + ' (' + element.captren.roleName + ')</a>';
                    html += '</div>';
                    html += '<div class="td-sdb-data-user__phone"><a href="tel:0949357111">' + element.captren
                        .phone + '</a></div>';
                    html += '</td>';
                    html += '<td><a target="_blank" href="">' + element.capduoi + '</a></td>';
                    html += '<td><a href="' + tin_link + '">' + element.countProduct + '</a></td>';
                    html += '<td>' + element.created_at + '</td>';
                    html +=
                        '<td> <a href="#" data-id="232376" class="btn btn-outline-success btn-reset-password">Reset mk</a>';
                    html += '<a href="' + edit_link + '" class="btn btn-outline-primary">Sửa</a>';
                    html += '<a href="' + lock_link + '" class="btn btn-outline-primary">' + ((element.status != 'Active') ? 'Mở khóa' : 'Khóa') + '</a>';
                    html += '</td>';
                    html += '</tr>';
                    count++;
                });
                $('.tle-num-count').html(count);

                $('.c-table-datatables tbody').html(html);
                
                $('.edit-select-position').on('click', function(e) {
                    var id = $(this).data('id');
                    $('#form-edit-select-user input[name="useridrole"]').val(id);
                    $('#edit-select-position').modal('show');
                });

                $('.edit-select-branch').on('click', function(e) {
                    var id = $(this).data('id');
                    $('#form-edit-select-user-area input[name="useridarea"]').val(id);
                    $('#edit-select-area').modal('show');
                });

                $('.edit-select-upper').on('click', function(e) {
                    var id = $(this).data('id');
                    $('#form-edit-select-user-upper input[name="useridupper"]').val(id);
                    $('#edit-select-upper').modal('show');
                });
                return;
            }

            data.forEach(element => {
                if (element.areaUserName == area) {
                    let edit_link = "{{ route('profile', ['phone' => 'phone']) }}";
                    let tindadang_link = "{{ route('tin-da-dang.id', 'id') }}";
                    let lock_link = "{{ route('method.process-lock', 'id') }}";
                    edit_link = edit_link.replace('phone', element.phone);
                    tin_link = tindadang_link.replace('id', element.id);
                    lock_link = lock_link.replace('id', element.id);

                    html += '<tr role="row" class="odd">';
                    html += '<td>';
                    html += '<div class="td-sdb-data-user__name">';
                    html +=
                        '<a href="#edit-select-user" data-id="232376" data-toggle="modal" class="edit-select-user">' +
                        element.fullName + '</a>';
                    html += '</div>';
                    html += '<div class="td-sdb-data-user__phone"><a href="tel:' + element.phone + '">' + element
                        .phone + '</a></div>';
                    html += '</td>';
                    html += '<td><a href="" data-type="position" data-id="' + element.id +
                        '" class="edit-select-position" data-toggle="modal">';
                    html += '<div class="td-sdb-data-user__name">' + element.roleName + '</div>';
                    html += '</a></td>';
                    html += '<td><a href="#edit-select-branch" data-type="branch" data-id="' + element.id +
                        '" class="edit-select-branch" data-toggle="modal">';
                    html += '<div class="td-sdb-data-user__name" style="width: 180px">' + element.areaUserName +
                        '</div>';
                    html += '</a></td>';
                    html += '<td>';
                    html += '<div style="min-width: 150px">' + element.address + '</div>';
                    html += '</td>';
                    html += '<td>';
                    html += '<div class="td-sdb-data-user__name">';
                    html += '<a href="#edit-select-user" data-id="' + element.id +
                        '" data-toggle="modal" data-type="manager_id" class="edit-select-upper">' + element.captren
                        .fullName + ' (' + element.captren.roleName + ')</a>';
                    html += '</div>';
                    html += '<div class="td-sdb-data-user__phone"><a href="tel:0949357111">' + element.captren
                        .phone + '</a></div>';
                    html += '</td>';
                    html += '<td><a target="_blank" href="">' + element.capduoi + '</a></td>';
                    html += '<td><a href="' + tin_link + '">' + element.countProduct + '</a></td>';
                    html += '<td>' + element.created_at + '</td>';
                    html +=
                        '<td> <a href="#" data-id="232376" class="btn btn-outline-success btn-reset-password">Reset mk</a>';
                    html += '<a href="' + edit_link + '" class="btn btn-outline-primary">Sửa</a>';
                    html += '<a href="' + lock_link + '" class="btn btn-outline-primary">' + ((element.status != 'Active') ? 'Mở khóa' : 'Khóa') + '</a>';
                    html += '</td>';
                    html += '</tr>';
                    count++;
                }
            });
            $('.tle-num-count').html(count);
            $('.c-table-datatables tbody').html(html);

            $('.edit-select-position').on('click', function(e) {
                var id = $(this).data('id');
                $('#form-edit-select-user input[name="useridrole"]').val(id);
                $('#edit-select-position').modal('show');
            });

            $('.edit-select-branch').on('click', function(e) {
                var id = $(this).data('id');
                $('#form-edit-select-user-area input[name="useridarea"]').val(id);
                $('#edit-select-area').modal('show');
            });

            $('.edit-select-upper').on('click', function(e) {
                var id = $(this).data('id');
                $('#form-edit-select-user-upper input[name="useridupper"]').val(id);
                $('#edit-select-upper').modal('show');
            });
        }

        $('.edit-select-position').on('click', function(e) {
            var id = $(this).data('id');
            $('#form-edit-select-user input[name="useridrole"]').val(id);
            $('#edit-select-position').modal('show');
        });

        $('.edit-select-branch').on('click', function(e) {
            var id = $(this).data('id');
            $('#form-edit-select-user-area input[name="useridarea"]').val(id);
            $('#edit-select-area').modal('show');
        });

        $('.edit-select-upper').on('click', function(e) {
            var id = $(this).data('id');
            $('#form-edit-select-user-upper input[name="useridupper"]').val(id);
            $('#edit-select-upper').modal('show');
        });

        $('#btn-save-select-user').on('click', function() {
            var id = $('#form-edit-select-user input[name="useridrole"]').val();
            var role = $('#form-edit-select-user select[name="user_id"]').val();

            $.ajax({
                url: '{{ route('method.change-role') }}',
                type: 'get',
                data: {
                    _token: '{{ csrf_token() }}',
                    id: id,
                    role: role
                },
                success: function(res) {
                    if (res.status) {
                        $('#edit-select-position').modal('hide');
                        cuteToast({
                            type: "success",
                            message: res.message,
                            timer: 1500
                        }).then(() => {
                            location.reload();
                        });
                        return;
                    }
                    cuteToast({
                        type: "error",
                        message: res.message,
                        timer: 3000
                    });
                },
                error: function(e) {
                    console.log(e);
                }
            });
        });

        $('#btn-save-select-user-area').on('click', function() {
            var id = $('#form-edit-select-user-area input[name="useridarea"]').val();
            var area = $('#form-edit-select-user-area select[name="areaid"]').val();

            $.ajax({
                url: '{{ route('method.change-area') }}',
                type: 'get',
                data: {
                    _token: '{{ csrf_token() }}',
                    id: id,
                    area: area
                },
                success: function(res) {
                    if (res.status) {
                        $('#edit-select-area').modal('hide');
                        cuteToast({
                            type: "success",
                            message: res.message,
                            timer: 1500
                        }).then(() => {
                            location.reload();
                        });
                        return;
                    }
                    cuteToast({
                        type: "error",
                        message: res.message,
                        timer: 3000
                    });
                },
                error: function(e) {
                    console.log(e);
                }
            });
        });

        $('#btn-save-select-user-upper').on('click', function() {
            var id = $('#form-edit-select-user-upper input[name="useridupper"]').val();
            var upper = $('#form-edit-select-user-upper select[name="upperid"]').val();

            $.ajax({
                url: '{{ route('method.change-upper') }}',
                type: 'get',
                data: {
                    _token: '{{ csrf_token() }}',
                    id: id,
                    upper: upper
                },
                success: function(res) {
                    if (res.status) {
                        $('#edit-select-upper').modal('hide');
                        cuteToast({
                            type: "success",
                            message: res.message,
                            timer: 1500
                        }).then(() => {
                            location.reload();
                        });
                        return;
                    }
                    cuteToast({
                        type: "error",
                        message: res.message,
                        timer: 3000
                    });
                },
                error: function(e) {
                    console.log(e);
                }
            });
        });
    </script>
@endsection
