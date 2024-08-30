@section('title', 'Tin đã đăng của ' . Auth::user()->fullName)
@section('description', 'GulandMienNam - Tin đã đăng của ' . Auth::user()->fullName)
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
                                                class="tle-num-count cnt">{{ $count }}</b> bất động sản trên Guland Miền Nam</h3>
                                        <hr>
                                        <div class="c-table-datatables">
                                            <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper">
                                                <div class="table-responsive">
                                                    <table
                                                        class="table table-bordered js-datatables table--custom-vtc dataTable"
                                                        id="DataTables_Table_0" role="grid" style="width: 1790px;">
                                                        <thead>
                                                            <tr role="row">
                                                                <th class="th-sdb-data-code sorting" tabindex="0"
                                                                    aria-controls="DataTables_Table_0" rowspan="1"
                                                                    colspan="1"
                                                                    aria-label="Mã BĐS: activate to sort column ascending"
                                                                    style="width: 49.4px;">Mã BĐS</th>
                                                                <th class="th-sdb-data-stts sorting" tabindex="0"
                                                                    aria-controls="DataTables_Table_0" rowspan="1"
                                                                    colspan="1"
                                                                    aria-label="Trạng thái : activate to sort column ascending"
                                                                    style="width: 62.4px;">Trạng thái
                                                                </th>
                                                                <th class="th-sdb-data-ownr sorting" tabindex="0"
                                                                    aria-controls="DataTables_Table_0" rowspan="1"
                                                                    colspan="1"
                                                                    aria-label="Người bán: activate to sort column ascending"
                                                                    style="width: 159.4px;">Người bán</th>
                                                                <th class="th-sdb-data-ownr sorting" tabindex="0"
                                                                    aria-controls="DataTables_Table_0" rowspan="1"
                                                                    colspan="1"
                                                                    aria-label="Người đăng: activate to sort column ascending"
                                                                    style="width: 91.4px;">Người đăng</th>
                                                                <th class="th-sdb-data-acrg sorting" tabindex="0"
                                                                    aria-controls="DataTables_Table_0" rowspan="1"
                                                                    colspan="1"
                                                                    aria-label="Ngang: activate to sort column ascending"
                                                                    style="width: 53.4px;">Ngang</th>
                                                                <th class="th-sdb-data-acrg sorting" tabindex="0"
                                                                    aria-controls="DataTables_Table_0" rowspan="1"
                                                                    colspan="1"
                                                                    aria-label="Dài: activate to sort column ascending"
                                                                    style="width: 70.4px;">Dài</th>
                                                                <th class="th-sdb-data-code sorting" tabindex="0"
                                                                    aria-controls="DataTables_Table_0" rowspan="1"
                                                                    colspan="1"
                                                                    aria-label="Hoa hồng: activate to sort column ascending"
                                                                    style="width: 60.4px;">Giá</th>
                                                                <th class="th-sdb-data-acrg sorting" tabindex="0"
                                                                    aria-controls="DataTables_Table_0" rowspan="1"
                                                                    colspan="1"
                                                                    aria-label="Thông tin: activate to sort column ascending"
                                                                    style="width: 229.4px;">Thông tin</th>
                                                                <th class="th-sdb-data-acrg sorting" tabindex="0"
                                                                    aria-controls="DataTables_Table_0" rowspan="1"
                                                                    colspan="1"
                                                                    aria-label="Quận huyện: activate to sort column ascending"
                                                                    style="width: 73.4px;">Quận huyện</th>
                                                                <th class="th-sdb-data-acrg sorting" tabindex="0"
                                                                    aria-controls="DataTables_Table_0" rowspan="1"
                                                                    colspan="1"
                                                                    aria-label="Phường xã: activate to sort column ascending"
                                                                    style="width: 67.4px;">Phường xã</th>
                                                                <th class="th-sdb-data-stts sorting" tabindex="0"
                                                                    aria-controls="DataTables_Table_0" rowspan="1"
                                                                    colspan="1"
                                                                    aria-label="Ngày cập nhật: activate to sort column ascending"
                                                                    style="width: 89.4px;">Ngày cập nhật</th>
                                                                <th class="th-sdb-data-stts sorting" tabindex="0"
                                                                    aria-controls="DataTables_Table_0" rowspan="1"
                                                                    colspan="1"
                                                                    aria-label="Ngày đăng: activate to sort column ascending"
                                                                    style="width: 67.4px;">Ngày đăng</th>
                                                                <th class="th-sdb-data-stts sorting" tabindex="0"
                                                                    aria-controls="DataTables_Table_0" rowspan="1"
                                                                    colspan="1"
                                                                    aria-label="Khảo sát: activate to sort column ascending"
                                                                    style="width: 54.4px;">Khảo sát</th>
                                                            </tr>
                                                        </thead>
                                                        <tfoot>
                                                            <tr>
                                                                <th class="tf-sdb-data-code" rowspan="1"
                                                                    colspan="1">
                                                                    <input type="text" class="form-control"
                                                                        placeholder="Tìm mã bđs" oninput="searchCode(this)">
                                                                </th>
                                                                <th class="tf-sdb-data-stts select" rowspan="1"
                                                                    colspan="1">
                                                                    <select class="form-control" onchange="searchStatus(this)">
                                                                        <option value="">-</option>
                                                                        <option value="1">Công khai</option>
                                                                        <option value="2">Riêng tư</option>
                                                                        <option value="3">Đã xóa</option>
                                                                        <option value="4">Bị báo cáo</option>
                                                                        <option value="5">Đã bán/thuê</option>
                                                                        <option value="6">Tin hết hạn</option>
                                                                        <option value="7">Dừng bán</option>
                                                                        <option value="8">Vị trí đẹp</option>
                                                                        <option value="9">Sắp trả</option>
                                                                    </select>
                                                                </th>
                                                                <th class="tf-sdb-data-ownr" rowspan="1"
                                                                    colspan="1">
                                                                    <input type="text" class="form-control" oninput="searchOwner(this)" 
                                                                        placeholder="Tìm chủ đất theo số điện thoại">
                                                                </th>
                                                                <th class="tf-sdb-data-ownr" rowspan="1"
                                                                    colspan="1">
                                                                    <input type="text" class="form-control" oninput="searchUser(this)"
                                                                        placeholder="Tìm người đăng theo tên hoặc số điện thoại">
                                                                </th>
                                                                <th class="th-sdb-data-acrg" rowspan="1"
                                                                    colspan="1">
                                                                    <input type="text" class="form-control" oninput="dangPhattrien()" readonly
                                                                        placeholder="Tìm ngang">
                                                                </th>
                                                                <th class="th-sdb-data-acrg" rowspan="1"
                                                                    colspan="1">
                                                                    <input type="text" class="form-control" oninput="dangPhattrien()" readonly
                                                                        placeholder="Tìm dài">
                                                                </th>
                                                                <th class="th-sdb-data-acrg" rowspan="1"
                                                                    colspan="1">
                                                                    <input type="text" class="form-control" oninput="dangPhattrien()" readonly
                                                                        placeholder="Tìm giá">
                                                                </th>
                                                                <th class="th-sdb-data-acrg" rowspan="1"
                                                                    colspan="1">
                                                                    <input type="text" class="form-control" oninput="dangPhattrien()" readonly
                                                                        placeholder="Tìm thông tin">
                                                                </th>
                                                                <th class="th-sdb-data-acrg" rowspan="1"
                                                                    colspan="1">
                                                                    <input type="text" class="form-control" oninput="dangPhattrien()" readonly
                                                                        placeholder="Tìm quận huyện">
                                                                </th>
                                                                <th class="th-sdb-data-acrg" rowspan="1"
                                                                    colspan="1">
                                                                    <input type="text" class="form-control" oninput="dangPhattrien()" readonly
                                                                        placeholder="Tìm phường xã">
                                                                </th>
                                                                <th class="th-sdb-data-stts" rowspan="1"
                                                                    colspan="1">
                                                                    <input type="text" class="form-control" oninput="dangPhattrien()" readonly
                                                                        placeholder="Tìm ngày cập nhật">
                                                                </th>
                                                                <th class="th-sdb-data-stts" rowspan="1"
                                                                    colspan="1">
                                                                    <input type="text" class="form-control" oninput="dangPhattrien()" readonly
                                                                        placeholder="Tìm ngày đăng">
                                                                </th>
                                                                <th class="tf-sdb-data-stts select" rowspan="1"
                                                                    colspan="1">
                                                                    <select class="form-control" onchange="dangPhattrien()">
                                                                        <option value="">-</option>
                                                                        <option value="1">Đã khảo sát</option>
                                                                        <option value="2">Chưa khảo sát</option>
                                                                    </select>
                                                                </th>
                                                            </tr>
                                                        </tfoot>
                                                        <tbody id="addElementFill">
                                                            @foreach($products as $key => $product)
                                                                <tr role="row" class="{{ $key % 2 == 0 ? 'odd' : 'even' }}">
                                                                    <td><a target="_blank"
                                                                            href="{{ route('method.search', ['code' => $product['postCode']]) }}">{{ $product['postCode'] }}</a>
                                                                    </td>
                                                                    <td>{{ $product['PostingStatus'] }}
                                                                    </td>
                                                                    <td>
                                                                        @foreach($product['info'] as $info)
                                                                            <div class="td-sdb-data-ownr__name"
                                                                                style="min-width: 180px">{{ $info['InfoName'] }}({{ $info['TypeData'] }})</div>
                                                                            <div class="td-sdb-data-ownr__phone"><a
                                                                                    href="tel:+84{{ $info['InfoContact'] }}">{{ $info['InfoContact'] }}</a>
                                                                            </div>
                                                                        @endforeach
                                                                        <div><a
                                                                                href="/bds-post-2?is_check=&amp;phone=0914602081">Có {{ $product['countInfo'] }} số liên hệ</a></div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="td-sdb-data-user__name"
                                                                            style="min-width: 180px">
                                                                            <a href="#edit-select-user" data-id="{{ $product['ProductID'] }}"
                                                                                data-toggle="modal" data-type="post_user"
                                                                                class="edit-select-user">{{ $product['nguoidang'] }} ({{ $product['roleNguoidang'] }})</a>
                                                                        </div>
                                                                        <div class="td-sdb-data-user__phone"><a
                                                                                href="tel:0988453743">{{ $product['phoneNguoidang'] }}</a></div>
                                                                    </td>
                                                                    <td>{{ $product['AreaWidth'] }}m</td>
                                                                    <td>{{ $product['AreaHeight'] }}m</td>
                                                                    <td>
                                                                        {{ $controller::convertPriceText($product['price']) }}
                                                                    </td>
                                                                    <td>{!! $product['description'] !!}</td>
                                                                    <td>{{ $product['DistrictName'] }}</td>
                                                                    <td>{{ $product['WardName'] }}</td>
                                                                    <td>{{ $product['updated_at'] }}</td>
                                                                    <td>{{ $product['created_at'] }}</td>
                                                                    <td>{{ (!$product['rating']) ? 'Chưa khảo sát' : $product['rating'] }}</td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="table-bottom">
                                                    {{ $products->links() }}
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
    <div class="modal fade" id="edit-select-user" tabindex="-1" style="display: none; padding-right: 17px;"
        aria-modal="true" role="dialog" data-select2-id="select2-data-edit-select-user">
        <div class="modal-dialog modal-lg" data-select2-id="select2-data-259-8sn8">
            <div class="modal-content" id="edit-select-user-content"
                data-select2-id="select2-data-edit-select-user-content">
                <div class="modal-header">
                    <div class="modal-subtitle"></div>
                    <h5 class="modal-title">
                        Chọn thành viên thừa hưởng
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form id="form-edit-select-user" data-select2-id="select2-data-[object HTMLInputElement]">
                        <select class="form-control select2-add-property select2-hidden-accessible" id="select-user"
                            name="user_id" data-select2-id="select2-data-select-user" tabindex="-1"
                            aria-hidden="true">
                            @foreach($staff as $user)
                                <option value="{{ $user->id }}">{{ $user->fullName }} ({{ $user->roleName }}) - {{ $user->phone }}</option>
                            @endforeach
                        </select>
                        <input type="hidden" name="id" value="">
                        <input type="hidden" name="type" value="">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Hủy bỏ</button>
                    <button type="button" class="btn btn-primary" id="btn-save-select-user">Lưu</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        var data = @json($all);

        function formatPrice(price) {
            price = parseInt(price);
            return price.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.');
        }

        function searchCode(e) {
            var value = parseInt(e.value);
            var addElementFill = $('#addElementFill');
            var count = 0;

            addElementFill.html('');
            if(!value) {
                let value = @json($products);

                value.data.forEach((item, index) => {
                    let updatedAt = new Date(item.updated_at);
                    let createdAt = new Date(item.created_at);
                    let link = `{{ route('method.search', ['code' => '']) }}${item.postCode}`;
                    let updatedDate = `${updatedAt.getDate()}/${updatedAt.getMonth()+1}/${updatedAt.getFullYear()} ${updatedAt.getHours()}:${updatedAt.getMinutes()}:${updatedAt.getSeconds()}`;
                    let createdDate = `${createdAt.getDate()}/${createdAt.getMonth()+1}/${createdAt.getFullYear()} ${createdAt.getHours()}:${createdAt.getMinutes()}:${createdAt.getSeconds()}`;

                    addElementFill.append(`
                        <tr role="row" class="${index % 2 == 0 ? 'odd' : 'even'}">
                            <td><a target="_blank" href="${link}">${item.postCode}</a></td>
                            <td>${item.PostingStatus}</td>
                            <td>`+
                                item.info.map((info) => {
                                    return `
                                        <div class="td-sdb-data-ownr__name" style="min-width: 180px">${info.InfoName}(${info.TypeData})</div>
                                        <div class="td-sdb-data-ownr__phone"><a href="tel:+84${info.InfoContact}">${info.InfoContact}</a></div>
                                    `;
                                }).join('')+
                                `<div><a href="">Có ${item.countInfo} số liên hệ</a></div>
                            </td>
                            <td>
                                <div class="td-sdb-data-user__name" style="min-width: 180px">
                                    <a href="#edit-select-user" data-id="${item.ProductID}" data-toggle="modal" data-type="post_user" class="edit-select-user">${item.nguoidang} (${item.roleNguoidang})</a>
                                </div>
                                <div class="td-sdb-data-user__phone"><a href="tel:+84${item.phoneNguoidang}">${item.phoneNguoidang}</a></div>
                            </td>
                            <td>${item.AreaWidth}m</td>
                            <td>${item.AreaHeight}m</td>
                            <td>${formatPrice(item.price)}</td>
                            <td>${item.description}</td>
                            <td>${item.DistrictName}</td>
                            <td>${item.WardName}</td>
                            <td>${updatedDate}</td>
                            <td>${createdDate}</td>
                            <td>${item.rating}</td>
                        </tr>
                    `);
                });
                $('.cnt').text(data.length);
            
                $(document).on('click', '.edit-select-user', function() {
                    var id = $(this).data('id');
                    var type = $(this).data('type');
                    var formEditSelectUser = $('#form-edit-select-user');
                    formEditSelectUser.find('input[name="id"]').val(id);
                    formEditSelectUser.find('input[name="type"]').val(type);
                });
                return;
            }

            data.forEach((item, index) => {
                let updatedAt = new Date(item.updated_at);
                let createdAt = new Date(item.created_at);
                let link = `{{ route('method.search', ['code' => '']) }}${item.postCode}`;
                let updatedDate = `${updatedAt.getDate()}/${updatedAt.getMonth()+1}/${updatedAt.getFullYear()} ${updatedAt.getHours()}:${updatedAt.getMinutes()}:${updatedAt.getSeconds()}`;
                let createdDate = `${createdAt.getDate()}/${createdAt.getMonth()+1}/${createdAt.getFullYear()} ${createdAt.getHours()}:${createdAt.getMinutes()}:${createdAt.getSeconds()}`;

                if (item.postCode.toString().includes(value.toString())) {
                    count++;
                    addElementFill.append(`
                        <tr role="row" class="${index % 2 == 0 ? 'odd' : 'even'}">
                            <td><a target="_blank" href="${link}">${item.postCode}</a></td>
                            <td>${item.PostingStatus}</td>
                            <td>`+
                                item.info.map((info) => {
                                    return `
                                        <div class="td-sdb-data-ownr__name" style="min-width: 180px">${info.InfoName}(${info.TypeData})</div>
                                        <div class="td-sdb-data-ownr__phone"><a href="tel:+84${info.InfoContact}">${info.InfoContact}</a></div>
                                    `;
                                }).join('')+
                                `<div><a href="">Có ${item.countInfo} số liên hệ</a></div>
                            </td>
                            <td>
                                <div class="td-sdb-data-user__name" style="min-width: 180px">
                                    <a href="#edit-select-user" data-id="${item.ProductID}" data-toggle="modal" data-type="post_user" class="edit-select-user">${item.nguoidang} (${item.roleNguoidang})</a>
                                </div>
                                <div class="td-sdb-data-user__phone"><a href="tel:+84${item.phoneNguoidang}">${item.phoneNguoidang}</a></div>
                            </td>
                            <td>${item.AreaWidth}m</td>
                            <td>${item.AreaHeight}m</td>
                            <td>${formatPrice(item.price)}</td>
                            <td>${item.description}</td>
                            <td>${item.DistrictName}</td>
                            <td>${item.WardName}</td>
                            <td>${updatedDate}</td>
                            <td>${createdDate}</td>
                            <td>${item.rating}</td>
                        </tr>
                    `);
                }
            });
            $('.cnt').text(count);

            $(document).on('click', '.edit-select-user', function() {
                var id = $(this).data('id');
                var type = $(this).data('type');
                var formEditSelectUser = $('#form-edit-select-user');
                formEditSelectUser.find('input[name="id"]').val(id);
                formEditSelectUser.find('input[name="type"]').val(type);
            });
        }

        function searchStatus(e) {
            var value = e.options[e.selectedIndex].text;
            var addElementFill = $('#addElementFill');
            var count = 0;

            count = 0;
            
            addElementFill.html('');
            if(value == '-') {
                let value = @json($products);

                value.data.forEach((item, index) => {
                    let updatedAt = new Date(item.updated_at);
                    let createdAt = new Date(item.created_at);
                    let link = `{{ route('method.search', ['code' => '']) }}${item.postCode}`;
                    let updatedDate = `${updatedAt.getDate()}/${updatedAt.getMonth()+1}/${updatedAt.getFullYear()} ${updatedAt.getHours()}:${updatedAt.getMinutes()}:${updatedAt.getSeconds()}`;
                    let createdDate = `${createdAt.getDate()}/${createdAt.getMonth()+1}/${createdAt.getFullYear()} ${createdAt.getHours()}:${createdAt.getMinutes()}:${createdAt.getSeconds()}`;

                    addElementFill.append(`
                        <tr role="row" class="${index % 2 == 0 ? 'odd' : 'even'}">
                            <td><a target="_blank" href="${link}">${item.postCode}</a></td>
                            <td>${item.PostingStatus}</td>
                            <td>`+
                                item.info.map((info) => {
                                    return `
                                        <div class="td-sdb-data-ownr__name" style="min-width: 180px">${info.InfoName}(${info.TypeData})</div>
                                        <div class="td-sdb-data-ownr__phone"><a href="tel:+84${info.InfoContact}">${info.InfoContact}</a></div>
                                    `;
                                }).join('')+
                                `<div><a href="">Có ${item.countInfo} số liên hệ</a></div>
                            </td>
                            <td>
                                <div class="td-sdb-data-user__name" style="min-width: 180px">
                                    <a href="#edit-select-user" data-id="${item.ProductID}" data-toggle="modal" data-type="post_user" class="edit-select-user">${item.nguoidang} (${item.roleNguoidang})</a>
                                </div>
                                <div class="td-sdb-data-user__phone"><a href="tel:+84${item.phoneNguoidang}">${item.phoneNguoidang}</a></div>
                            </td>
                            <td>${item.AreaWidth}m</td>
                            <td>${item.AreaHeight}m</td>
                            <td>${formatPrice(item.price)}</td>
                            <td>${item.description}</td>
                            <td>${item.DistrictName}</td>
                            <td>${item.WardName}</td>
                            <td>${updatedDate}</td>
                            <td>${createdDate}</td>
                            <td>${item.rating}</td>
                        </tr>
                    `);
                });
                $('.cnt').text(data.length);
            
                $(document).on('click', '.edit-select-user', function() {
                    var id = $(this).data('id');
                    var type = $(this).data('type');
                    var formEditSelectUser = $('#form-edit-select-user');
                    formEditSelectUser.find('input[name="id"]').val(id);
                    formEditSelectUser.find('input[name="type"]').val(type);
                });
                return;
            }

            data.forEach((item, index) => {
                if (item.PostingStatus.toString().includes(value.toString())) {
                    let updatedAt = new Date(item.updated_at);
                    let createdAt = new Date(item.created_at);
                    let link = `{{ route('method.search', ['code' => '']) }}${item.postCode}`;
                    let updatedDate = `${updatedAt.getDate()}/${updatedAt.getMonth()+1}/${updatedAt.getFullYear()} ${updatedAt.getHours()}:${updatedAt.getMinutes()}:${updatedAt.getSeconds()}`;
                    let createdDate = `${createdAt.getDate()}/${createdAt.getMonth()+1}/${createdAt.getFullYear()} ${createdAt.getHours()}:${createdAt.getMinutes()}:${createdAt.getSeconds()}`;
                    count++;
                    addElementFill.append(`
                        <tr role="row" class="${index % 2 == 0 ? 'odd' : 'even'}">
                            <td><a target="_blank" href="${link}">${item.postCode}</a></td>
                            <td>${item.PostingStatus}</td>
                            <td>`+
                                item.info.map((info) => {
                                    return `
                                        <div class="td-sdb-data-ownr__name" style="min-width: 180px">${info.InfoName}(${info.TypeData})</div>
                                        <div class="td-sdb-data-ownr__phone"><a href="tel:+84${info.InfoContact}">${info.InfoContact}</a></div>
                                    `;
                                }).join('')+
                                `<div><a href="">Có ${item.countInfo} số liên hệ</a></div>
                            </td>
                            <td>
                                <div class="td-sdb-data-user__name" style="min-width: 180px">
                                    <a href="#edit-select-user" data-id="${item.ProductID}" data-toggle="modal" data-type="post_user" class="edit-select-user">${item.nguoidang} (${item.roleNguoidang})</a>
                                </div>
                                <div class="td-sdb-data-user__phone"><a href="tel:+84${item.phoneNguoidang}">${item.phoneNguoidang}</a></div>
                            </td>
                            <td>${item.AreaWidth}m</td>
                            <td>${item.AreaHeight}m</td>
                            <td>${formatPrice(item.price)}</td>
                            <td>${item.description}</td>
                            <td>${item.DistrictName}</td>
                            <td>${item.WardName}</td>
                            <td>${updatedDate}</td>
                            <td>${createdDate}</td>
                            <td>${item.rating}</td>
                        </tr>
                    `);
                }
            });
            $('.cnt').text(count);
            
            $(document).on('click', '.edit-select-user', function() {
                var id = $(this).data('id');
                var type = $(this).data('type');
                var formEditSelectUser = $('#form-edit-select-user');
                formEditSelectUser.find('input[name="id"]').val(id);
                formEditSelectUser.find('input[name="type"]').val(type);
            });
        }

        function searchOwner(e) {
            var value = e.value;
            var addElementFill = $('#addElementFill');
            var count = 0;

            count = 0;
            
            addElementFill.html('');
            if(!value) {
                let value = @json($products);

                value.data.forEach((item, index) => {
                    let updatedAt = new Date(item.updated_at);
                    let createdAt = new Date(item.created_at);
                    let link = `{{ route('method.search', ['code' => '']) }}${item.postCode}`;
                    let updatedDate = `${updatedAt.getDate()}/${updatedAt.getMonth()+1}/${updatedAt.getFullYear()} ${updatedAt.getHours()}:${updatedAt.getMinutes()}:${updatedAt.getSeconds()}`;
                    let createdDate = `${createdAt.getDate()}/${createdAt.getMonth()+1}/${createdAt.getFullYear()} ${createdAt.getHours()}:${createdAt.getMinutes()}:${createdAt.getSeconds()}`;

                    addElementFill.append(`
                        <tr role="row" class="${index % 2 == 0 ? 'odd' : 'even'}">
                            <td><a target="_blank" href="${link}">${item.postCode}</a></td>
                            <td>${item.PostingStatus}</td>
                            <td>`+
                                item.info.map((info) => {
                                    return `
                                        <div class="td-sdb-data-ownr__name" style="min-width: 180px">${info.InfoName}(${info.TypeData})</div>
                                        <div class="td-sdb-data-ownr__phone"><a href="tel:+84${info.InfoContact}">${info.InfoContact}</a></div>
                                    `;
                                }).join('')+
                                `<div><a href="">Có ${item.countInfo} số liên hệ</a></div>
                            </td>
                            <td>
                                <div class="td-sdb-data-user__name" style="min-width: 180px">
                                    <a href="#edit-select-user" data-id="${item.ProductID}" data-toggle="modal" data-type="post_user" class="edit-select-user">${item.nguoidang} (${item.roleNguoidang})</a>
                                </div>
                                <div class="td-sdb-data-user__phone"><a href="tel:+84${item.phoneNguoidang}">${item.phoneNguoidang}</a></div>
                            </td>
                            <td>${item.AreaWidth}m</td>
                            <td>${item.AreaHeight}m</td>
                            <td>${formatPrice(item.price)}</td>
                            <td>${item.description}</td>
                            <td>${item.DistrictName}</td>
                            <td>${item.WardName}</td>
                            <td>${updatedDate}</td>
                            <td>${createdDate}</td>
                            <td>${item.rating}</td>
                        </tr>
                    `);
                });
                $('.cnt').text(data.length);
            
                $(document).on('click', '.edit-select-user', function() {
                    var id = $(this).data('id');
                    var type = $(this).data('type');
                    var formEditSelectUser = $('#form-edit-select-user');
                    formEditSelectUser.find('input[name="id"]').val(id);
                    formEditSelectUser.find('input[name="type"]').val(type);
                });
                return;
            }

            data.forEach((item, index) => {
                if (item.info) {
                    item.info.forEach((info) => {
                        if (info.InfoContact.toString().includes(value.toString())) {
                            let updatedAt = new Date(item.updated_at);
                            let createdAt = new Date(item.created_at);
                            let link = `{{ route('method.search', ['code' => '']) }}${item.postCode}`;
                            let updatedDate = `${updatedAt.getDate()}/${updatedAt.getMonth()+1}/${updatedAt.getFullYear()} ${updatedAt.getHours()}:${updatedAt.getMinutes()}:${updatedAt.getSeconds()}`;
                            let createdDate = `${createdAt.getDate()}/${createdAt.getMonth()+1}/${createdAt.getFullYear()} ${createdAt.getHours()}:${createdAt.getMinutes()}:${createdAt.getSeconds()}`;
                            count++;
                            addElementFill.append(`
                                <tr role="row" class="${index % 2 == 0 ? 'odd' : 'even'}">
                                    <td><a target="_blank" href="${link}">${item.postCode}</a></td>
                                    <td>${item.PostingStatus}</td>
                                    <td>`+
                                        item.info.map((info) => {
                                            return `
                                                <div class="td-sdb-data-ownr__name" style="min-width: 180px">${info.InfoName}(${info.TypeData})</div>
                                                <div class="td-sdb-data-ownr__phone"><a href="tel:+84${info.InfoContact}">${info.InfoContact}</a></div>
                                            `;
                                        }).join('')+
                                        `<div><a href="">Có ${item.countInfo} số liên hệ</a></div>
                                    </td>
                                    <td>
                                        <div class="td-sdb-data-user__name" style="min-width: 180px">
                                            <a href="#edit-select-user" data-id="${item.ProductID}" data-toggle="modal" data-type="post_user" class="edit-select-user">${item.nguoidang} (${item.roleNguoidang})</a>
                                        </div>
                                        <div class="td-sdb-data-user__phone"><a href="tel:+84${item.phoneNguoidang}">${item.phoneNguoidang}</a></div>
                                    </td>
                                    <td>${item.AreaWidth}m</td>
                                    <td>${item.AreaHeight}m</td>
                                    <td>${formatPrice(item.price)}</td>
                                    <td>${item.description}</td>
                                    <td>${item.DistrictName}</td>
                                    <td>${item.WardName}</td>
                                    <td>${updatedDate}</td>
                                    <td>${createdDate}</td>
                                    <td>${item.rating}</td>
                                </tr>
                            `);
                        }
                    });
                }
            });
            $('.cnt').text(count);
            
            $(document).on('click', '.edit-select-user', function() {
                var id = $(this).data('id');
                var type = $(this).data('type');
                var formEditSelectUser = $('#form-edit-select-user');
                formEditSelectUser.find('input[name="id"]').val(id);
                formEditSelectUser.find('input[name="type"]').val(type);
            });
        }

        function searchUser(e) {
            var value = e.value;
            var addElementFill = $('#addElementFill');
            var count = 0;

            count = 0;
            
            addElementFill.html('');
            if(!value) {
                let value = @json($products);

                value.data.forEach((item, index) => {
                    let updatedAt = new Date(item.updated_at);
                    let createdAt = new Date(item.created_at);
                    let link = `{{ route('method.search', ['code' => '']) }}${item.postCode}`;
                    let updatedDate = `${updatedAt.getDate()}/${updatedAt.getMonth()+1}/${updatedAt.getFullYear()} ${updatedAt.getHours()}:${updatedAt.getMinutes()}:${updatedAt.getSeconds()}`;
                    let createdDate = `${createdAt.getDate()}/${createdAt.getMonth()+1}/${createdAt.getFullYear()} ${createdAt.getHours()}:${createdAt.getMinutes()}:${createdAt.getSeconds()}`;

                    addElementFill.append(`
                        <tr role="row" class="${index % 2 == 0 ? 'odd' : 'even'}">
                            <td><a target="_blank" href="${link}">${item.postCode}</a></td>
                            <td>${item.PostingStatus}</td>
                            <td>`+
                                item.info.map((info) => {
                                    return `
                                        <div class="td-sdb-data-ownr__name" style="min-width: 180px">${info.InfoName}(${info.TypeData})</div>
                                        <div class="td-sdb-data-ownr__phone"><a href="tel:+84${info.InfoContact}">${info.InfoContact}</a></div>
                                    `;
                                }).join('')+
                                `<div><a href="">Có ${item.countInfo} số liên hệ</a></div>
                            </td>
                            <td>
                                <div class="td-sdb-data-user__name" style="min-width: 180px">
                                    <a href="#edit-select-user" data-id="${item.ProductID}" data-toggle="modal" data-type="post_user" class="edit-select-user">${item.nguoidang} (${item.roleNguoidang})</a>
                                </div>
                                <div class="td-sdb-data-user__phone"><a href="tel:+84${item.phoneNguoidang}">${item.phoneNguoidang}</a></div>
                            </td>
                            <td>${item.AreaWidth}m</td>
                            <td>${item.AreaHeight}m</td>
                            <td>${formatPrice(item.price)}</td>
                            <td>${item.description}</td>
                            <td>${item.DistrictName}</td>
                            <td>${item.WardName}</td>
                            <td>${updatedDate}</td>
                            <td>${createdDate}</td>
                            <td>${item.rating}</td>
                        </tr>
                    `);
                });
                $('.cnt').text(data.length);
            
                $(document).on('click', '.edit-select-user', function() {
                    var id = $(this).data('id');
                    var type = $(this).data('type');
                    var formEditSelectUser = $('#form-edit-select-user');
                    formEditSelectUser.find('input[name="id"]').val(id);
                    formEditSelectUser.find('input[name="type"]').val(type);
                });
                return;
            }

            data.forEach((item, index) => {
                value = value.toLowerCase();
                nameNguoidang = item.nguoidang.toLowerCase();
                if (nameNguoidang.toString().includes(value.toString())) {
                    let updatedAt = new Date(item.updated_at);
                    let createdAt = new Date(item.created_at);
                    let link = `{{ route('method.search', ['code' => '']) }}${item.postCode}`;
                    let updatedDate = `${updatedAt.getDate()}/${updatedAt.getMonth()+1}/${updatedAt.getFullYear()} ${updatedAt.getHours()}:${updatedAt.getMinutes()}:${updatedAt.getSeconds()}`;
                    let createdDate = `${createdAt.getDate()}/${createdAt.getMonth()+1}/${createdAt.getFullYear()} ${createdAt.getHours()}:${createdAt.getMinutes()}:${createdAt.getSeconds()}`;
                    count++;
                    addElementFill.append(`
                        <tr role="row" class="${index % 2 == 0 ? 'odd' : 'even'}">
                            <td><a target="_blank" href="${link}">${item.postCode}</a></td>
                            <td>${item.PostingStatus}</td>
                            <td>`+
                                item.info.map((info) => {
                                    return `
                                        <div class="td-sdb-data-ownr__name" style="min-width: 180px">${info.InfoName}(${info.TypeData})</div>
                                        <div class="td-sdb-data-ownr__phone"><a href="tel:+84${info.InfoContact}">${info.InfoContact}</a></div>
                                    `;
                                }).join('')+
                                `<div><a href="">Có ${item.countInfo} số liên hệ</a></div>
                            </td>
                            <td>
                                <div class="td-sdb-data-user__name" style="min-width: 180px">
                                    <a href="#edit-select-user" data-id="${item.ProductID}" data-toggle="modal" data-type="post_user" class="edit-select-user">${item.nguoidang} (${item.roleNguoidang})</a>
                                </div>
                                <div class="td-sdb-data-user__phone"><a href="tel:+84${item.phoneNguoidang}">${item.phoneNguoidang}</a></div>
                            </td>
                            <td>${item.AreaWidth}m</td>
                            <td>${item.AreaHeight}m</td>
                            <td>${formatPrice(item.price)}</td>
                            <td>${item.description}</td>
                            <td>${item.DistrictName}</td>
                            <td>${item.WardName}</td>
                            <td>${updatedDate}</td>
                            <td>${createdDate}</td>
                            <td>${item.rating}</td>
                        </tr>
                    `);
                } else if(item.phoneNguoidang.toString().includes(value.toString())) {
                    let updatedAt = new Date(item.updated_at);
                    let createdAt = new Date(item.created_at);
                    let link = `{{ route('method.search', ['code' => '']) }}${item.postCode}`;
                    let updatedDate = `${updatedAt.getDate()}/${updatedAt.getMonth()+1}/${updatedAt.getFullYear()} ${updatedAt.getHours()}:${updatedAt.getMinutes()}:${updatedAt.getSeconds()}`;
                    let createdDate = `${createdAt.getDate()}/${createdAt.getMonth()+1}/${createdAt.getFullYear()} ${createdAt.getHours()}:${createdAt.getMinutes()}:${createdAt.getSeconds()}`;
                    count++;
                    addElementFill.append(`
                        <tr role="row" class="${index % 2 == 0 ? 'odd' : 'even'}">
                            <td><a target="_blank" href="${link}">${item.postCode}</a></td>
                            <td>${item.PostingStatus}</td>
                            <td>`+
                                item.info.map((info) => {
                                    return `
                                        <div class="td-sdb-data-ownr__name" style="min-width: 180px">${info.InfoName}(${info.TypeData})</div>
                                        <div class="td-sdb-data-ownr__phone"><a href="tel:+84${info.InfoContact}">${info.InfoContact}</a></div>
                                    `;
                                }).join('')+
                                `<div><a href="">Có ${item.countInfo} số liên hệ</a></div>
                            </td>
                            <td>
                                <div class="td-sdb-data-user__name" style="min-width: 180px">
                                    <a href="#edit-select-user" data-id="${item.ProductID}" data-toggle="modal" data-type="post_user" class="edit-select-user">${item.nguoidang} (${item.roleNguoidang})</a>
                                </div>
                                <div class="td-sdb-data-user__phone"><a href="tel:+84${item.phoneNguoidang}">${item.phoneNguoidang}</a></div>
                            </td>
                            <td>${item.AreaWidth}m</td>
                            <td>${item.AreaHeight}m</td>
                            <td>${formatPrice(item.price)}</td>
                            <td>${item.description}</td>
                            <td>${item.DistrictName}</td>
                            <td>${item.WardName}</td>
                            <td>${updatedDate}</td>
                            <td>${createdDate}</td>
                            <td>${item.rating}</td>
                        </tr>
                    `);
                }
            });
            $('.cnt').text(count);
            
            $(document).on('click', '.edit-select-user', function() {
                var id = $(this).data('id');
                var type = $(this).data('type');
                var formEditSelectUser = $('#form-edit-select-user');
                formEditSelectUser.find('input[name="id"]').val(id);
                formEditSelectUser.find('input[name="type"]').val(type);
            });
        }

        function dangPhattrien()
        {
            alert('Tính năng đang phát triển');
        }

        $(document).on('click', '.edit-select-user', function() {
            var id = $(this).data('id');
            var type = $(this).data('type');
            var formEditSelectUser = $('#form-edit-select-user');
            formEditSelectUser.find('input[name="id"]').val(id);
            formEditSelectUser.find('input[name="type"]').val(type);
        });

        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });

        $('#btn-save-select-user').click(function() {
            var formEditSelectUser = $('#form-edit-select-user');
            var id = formEditSelectUser.find('input[name="id"]').val();
            var idUser = formEditSelectUser.find('select[name="user_id"]').val();
            $.ajax({
                url: "{{ route('method.transfer') }}",
                type: 'post',
                data: {
                    id: id,
                    idUser: idUser
                },
                success: function(res) {
                    if(res.status) {
                        cuteToast({
                            type: "success",
                            message: res.message,
                            timer: 1000
                        }).then(() => {
                            location.reload();
                        });
                    } else {
                        cuteToast({
                            type: "error",
                            message: res.message,
                            timer: 3000
                        });
                    }
                },
                error: function(err) {
                    console.log(err.responseText);
                }
            });
        });
    </script>
@endsection
