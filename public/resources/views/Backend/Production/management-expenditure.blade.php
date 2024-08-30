@section('title', 'Danh sách khách hàng')
@section('description', 'GulandMienNam - Danh sách khách hàng trên Guland Miền Nam')
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/js/bootstrap-datepicker.min.js" integrity="sha512-LsnSViqQyaXpD4mBBdRYeP6sRwJiJveh2ZIbW41EBrNmKxgr/LFZIiWT6yr+nycvhvauz8c2nYMhrP80YhG7Cw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/css/bootstrap-datepicker.min.css" integrity="sha512-34s5cpvaNG3BknEWSuOncX28vz97bRI59UnVtEEpFX536A7BtZSJHsDyFoCl8S7Dt2TPzcrCEoHBGeM4SUBDBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

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
                            <div class="l-sdb-profile__hdr">
                                <h1 class="l-sdb-profile__hdr-tle">Quản lý phiếu thu chi</h1>
                            </div>
                            <div class="l-sdb-profile__cnt">
                                <div class="l-sdb-profile__fsection">
                                        <form action="#" class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                <label class="form-label">Chọn sổ quỹ</label>
                                                <select name="fund_id" class="form-control" id="fund_id">
                                                    <option value="1">Quỹ Guland HCM</option>
                                                    <option value="2">Quỹ Tân Phú HCM</option>
                                                    <option value="3">Quỹ Quận 10 HCM</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                              <div class="form-group">
                                                     <label class="form-label">Khoảng thời  gian</label>
                                                <select name="time_range" class="form-control" id="time_range">
                                                    <option value="" selected="">Tự chọn</option>
                                                    <option value="{{ $date['homqua'] }}">Hôm qua</option>
                                                    <option value="{{ $date['homnay'] }}">Hôm nay</option>
                                                    <option value="{{ $date['7ngaytruoc'] }}">7 ngày qua</option>
                                                    <option value="{{ $date['thangnay'] }}">Tháng này</option>
                                                </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                <label class="form-label">Chọn khoảng thời gian</label>
                                                <div class="input-group input-large" data-date-format="dd/mm/yyyy">
                                                    <input type="text" class="form-control datepicker" name="from" id="start_time" placeholder="Bắt đầu">
                                                    <input type="text" class="form-control datepicker" name="to" id="end_time" placeholder="Kết Thúc">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="c-table-datatables">
                                        <div class="c-table-datatables">
                                            <a href="#add-spend-modal" data-toggle="modal" class="btn btn-success btn-add-collect-spend" data-type="2" style="float: left; margin-bottom: 10px">Thêm phiếu chi</a>
                                            <a href="#add-collect-modal" data-toggle="modal" class="btn btn-danger btn-add-collect-spend" data-type="1" style="float: left; margin-left: 10px;">Thêm phiếu thu</a>
                                            <div id="orders-table_wrapper" class="dataTables_wrapper">
                                                <div class="table-responsive">
                                            <table class="table table-bordered js-datatables table--custom-vtc dataTable" id="orders-table" role="grid" aria-describedby="orders-table_info" style="width: 1682px;">
                                                <thead>
                                                    <th>Mã</th>
                                                    <th>Sổ quỹ</th>
                                                    <th>Người thực hiện</th>
                                                    <th>Dư đầu kỳ</th>
                                                    <th>Thu</th>
                                                    <th>Chi</th>
                                                    <th>Dư cuối kỳ</th>
                                                    <th>Người nhận</th>
                                                    <th>Hình thức</th>
                                                    <th>Lý do</th>
                                                    <th>Ghi chú</th>
                                                    <th>Thời gian</th>
                                                    <th>Ngày tạo</th>
                                                    <th>Hành động</th>
                                                </thead>

                                                <tbody>
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
</div>
<!-- phiếu Chi -->
<div class="modal fade" id="add-spend-modal" tabindex="-1" role="dialog" aria-labelledby="spend-title" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cp-title">Thêm phiếu chi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form class="form-horizontal" id="form-add-collect-spend" action="{{ route('method.add-expenditure') }}" method="post" enctype="multipart/form-data">
                <div class="modal-body" id="add-collect-spend-content">
                    @csrf
                    <input type="hidden" name="type" value="1">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-body">
                                <div class="form-group">
                                    <label class="">Số tiền chi <span class="required" aria-required="true"> (*) </span>
                                    </label>
                                    <input type="text" class="form-control amount price-r" required name="price" oninput="formatNumber(this)">
                                </div>
                                <div class="form-group">
                                    <label class="">Lý do  chi
                                        <span class="required" aria-required="true"> (*) </span>
                                    </label>
                                    <input class="form-control" required name="desc">
                                </div>
                                <div class="form-group">
                                    <label class="">Ngày chi </label>
                                    <input type="date" class="form-control datepicker hasDatepicker" required name="date_action" id="dp1722399494373">
                                </div>
                                <div class="form-group">
                                    <label class="">Hình thức thanh toán</label>
                                    <select class="form-control" name="payment_method" required id="payment_method">
                                        <option value="2">Tiền mặt</option>
                                        <option value="1">Chuyển khoản ngân hàng </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="">Chọn sổ quỹ</label>
                                    <select class="form-control" name="fund_id" id="fund_id">
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-body">
                                <div class="form-group">
                                    <label class="">SĐT người nhận
                                        <span class="required" aria-required="true"> (*) </span>
                                    </label>
                                    <input type="text" class="form-control autocomplete phone" name="phone" autocomplete="off" value="">
                                </div>
                                <div class="form-group">
                                    <label class="">Người nhận
                                        <span class="required" aria-required="true"> (*) </span>
                                    </label>
                                    <input type="text" class="form-control name" name="name" value="">
                                </div>
                                <div class="form-group">
                                    <label class="">Địa chỉ</label>
                                    <input class="form-control address" name="address" value="">
                                </div>
                                <div class="form-group">
                                    <label class="">Ghi chú</label>
                                    <textarea class="form-control" name="note"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="form-label-wrap">
                                    <labe class="form-label">Chứng từ, hoá đơn, ảnh chup chuyển khoản … </labe>
                                    </div>
                                    <div class="c-form-bds__mtl-img">
                                        <div class="glr-img-upload ui-sortable" id="images"></div>
                                        <div class="text-right mt-2">
                                            <label class="btn btn-outline-primary">
                                                <input type="file" id="file" name="file" class="d-none">
                                                <i class="mdi mdi-camera-plus-outline mr-2"></i>Thêm ảnh
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-dark" data-dismiss="modal" id="dismiss-modal">Hủy</button>
                    <button type="submit" class="btn btn-primary" id="btn-save-collect-spend">Lưu</button>
                </div>
            </form>
            </div>
        </div>
</div>
<!-- Phiếu thu -->
<div class="modal fade" id="add-collect-modal" tabindex="-1" role="dialog" aria-labelledby="collect-title" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="cp-title">Thêm phiếu thu</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <form class="form-horizontal" id="form-add-collect-collect" action="{{ route('method.add-expenditure') }}" method="post" enctype="multipart/form-data">
            <div class="modal-body" id="add-collect-spend-content">
                @csrf
                <input type="hidden" name="type" value="2">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-body">
                            <div class="form-group">
                                <label class="">Số tiền thu <span class="required" aria-required="true"> (*) </span>
                                </label>
                                <input type="text" class="form-control amount price-r" required name="price" oninput="formatNumber(this)">
                            </div>
                            <div class="form-group">
                                <label class="">Lý do thu
                                    <span class="required" aria-required="true"> (*) </span>
                                </label>
                                <input class="form-control" required name="desc">
                            </div>
                            <div class="form-group">
                                <label class="">Ngày thu </label>
                                <input type="date" class="form-control datepicker hasDatepicker" required name="date_action" id="dp1722399494373">
                            </div>
                            <div class="form-group">
                                <label class="">Hình thức thanh toán</label>
                                <select class="form-control" name="payment_method" required id="payment_method">
                                    <option value="2">Tiền mặt</option>
                                    <option value="1">Chuyển khoản ngân hàng </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="">Chọn sổ quỹ</label>
                                <select class="form-control" name="fund_id" id="fund_id">
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-body">
                            <div class="form-group">
                                <label class="">SĐT người nhận
                                    <span class="required" aria-required="true"> (*) </span>
                                </label>
                                <input type="text" class="form-control autocomplete phone" name="phone" autocomplete="off" value="">
                            </div>
                            <div class="form-group">
                                <label class="">Người nhận
                                    <span class="required" aria-required="true"> (*) </span>
                                </label>
                                <input type="text" class="form-control name" name="name" value="">
                            </div>
                            <div class="form-group">
                                <label class="">Địa chỉ</label>
                                <input class="form-control address" name="address" value="">
                            </div>
                            <div class="form-group">
                                <label class="">Ghi chú</label>
                                <textarea class="form-control" name="note"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="form-label-wrap">
                                <labe class="form-label">Chứng từ, hoá đơn, ảnh chup chuyển khoản … </labe>
                                </div>
                                <div class="c-form-bds__mtl-img">
                                    <div class="glr-img-upload ui-sortable" id="images"></div>
                                    <div class="text-right mt-2">
                                        <label class="btn btn-outline-primary">
                                            <input type="file" id="file" name="file" class="d-none">
                                            <i class="mdi mdi-camera-plus-outline mr-2"></i>Thêm ảnh
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-dark" data-dismiss="modal" id="dismiss-modal">Hủy</button>
                <button type="submit" class="btn btn-primary" id="btn-save-collect-spend">Lưu</button>
            </div>
        </form>
    </div>
</div>
</div>
</div>
<!-- Sửa  -->
<div class="modal fade" id="edit-collect-spend" tabindex="-1" role="dialog" aria-labelledby="edit-title" aria-hidden="true">
    <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="cp-title">Cập nhật phiếu thu chi</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body" id="edit-collect-spend-content">
            <form class="form-horizontal" id="form-edit-collect-spend">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-body">
                            <div class="form-group">
                                <label class="">Lý do  chi
                                    <span class="required" aria-required="true"> (*) </span>
                                </label>
                                <input class="form-control" name="desc" value="Tai tro mv">
                            </div>
                            <div class="form-group">
                                <label class="">Ghi chú</label>
                                <textarea class="form-control" name="note" value=""></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="id" value="2096">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="form-label-wrap">
                                <label class="form-label">Chứng từ, hoá đơn, ảnh chup chuyển khoản …
                                </label>
                            </div>
                            <div class="c-form-bds__mtl-img">
                                <div class="glr-img-upload ui-sortable" id="images">
                                    <div class="glr-img-upload__sgl" id="images_172239619766a9ae25ab9ab.png">
                                        <div class="sgl-img-upload">
                                            <div class="sgl-img-upload__img">
                                                <div class="h-rectangle">
                                                    <div class="h-rectangle__inner">
                                                        <img src="" alt="Alternate Text">
                                                    </div>
                                                </div>
                                            </div>
                                            <span class="sgl-img-upload__drg"><i class="mdi mdi-cursor-move"></i></span>
                                            <a href="#" class="sgl-img-upload__dlt btn-delete-image" data-image-name="172239619766a9ae25ab9ab.png">Xóa</a>
                                            <!--<span class="sgl-img-upload__drg"><i class="mdi mdi-menu"></i></span>-->
                                        </div>
                                    </div>
                                </div>
                                <div class="text-right mt-2">
                                    <label class="btn btn-outline-primary">
                                        <input type="file" id="file" name="file" value="" multiple="" class="d-none">
                                        <i class="mdi mdi-camera-plus-outline mr-2"></i>Thêm ảnh
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-outline-dark" data-dismiss="modal" id="dismiss-modal">Hủy
            </button>
            <button type="button" class="btn btn-primary" id="btn-save-edit-collect-spend">Lưu</button>
        </div>
    </div>
    <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>


@endsection
@section('js')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
<script type='text/javascript' src='https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js'></script>

<script>
    $(document).ready(function() {

        $('.datepicker').datepicker({
            format: 'dd/mm/yyyy',
            autoclose: true,
            todayHighlight: true,
        });

        $('#orders-table').DataTable({
            dom: 'Bfrtip',
            processing: true,
            serverSide: true,
            "order": [[ 0, "desc" ]],
            pageLength: 30,
            ajax: {
                url: "{{ route('method.get-collect-spend') }}"
            },
            columns: [
                { data: 'id' },
                { data: 'category_name' },
                { data: 'user_action' },
                { data: 'balance_first' },
                { data: 'collect' },
                { data: 'spend' },
                { data: 'balance_last' },
                { data: 'fullName' },
                { data: 'type' },
                { data: 'description',
                    render: function(data, type, row) {
                        descAndAvatar = row.description;
                        if (row.avatar) {
                            descAndAvatar = '<img src="/Assets/Images/Imcomes/' + row.avatar + '" style="width: 50px; height: 50px; border-radius: 50%;">' + row.description;
                        }
                        return descAndAvatar;
                    }
                },
                { data: 'content' },
                { data: 'date_payment' },
                { data: 'create_at' },
                { data: 'option' },
            ],
        });

        $('#fund_id').on('change', function() {
            var value = $(this).val();
            $('#orders-table').DataTable().ajax.url("{{ route('method.get-collect-spend') }}?id=" + value).load();
        });

        $('#time_range').on('change', function() {
            var value = $(this).val();
            var id = $('#fund_id').val();

            if($('#start_time').val() != '') {
                $('#start_time').val('');
            }

            if($('#end_time').val() != '') {
                $('#end_time').val('');
            }

            $('#orders-table').DataTable().ajax.url("{{ route('method.get-collect-spend') }}?time_range=" + value + "&id=" + id).load();
        });

        $('#start_time').on('change', function() {
            var value = $(this).val();
            var end_time = $('#end_time').val();
            var id = $('#fund_id').val();

            if($('#time_range').val() != '') {
                $('#time_range').val('');
            }

            if (value > end_time && end_time != '') {
                alert('Ngày bắt đầu không được lớn hơn ngày kết thúc');
                return;
            }

            $('#orders-table').DataTable().ajax.url("{{ route('method.get-collect-spend') }}?start_time=" + value + "&end_time=" + end_time + "&id=" + id).load();
        });

        $('#end_time').on('change', function() {
            var value = $(this).val();
            var start_time = $('#start_time').val();
            var id = $('#fund_id').val();

            if($('#time_range').val() != '') {
                $('#time_range').val('');
            }

            if (value < start_time && start_time != '') {
                alert('Ngày kết thúc không được nhỏ hơn ngày bắt đầu');
                return;
            }

            $('#orders-table').DataTable().ajax.url("{{ route('method.get-collect-spend') }}?start_time=" + start_time + "&end_time=" + value + "&id=" + id).load();
        });
    });

    function formatNumber(input) {
        var value = input.value.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        input.value = value;
    }
</script>
@endsection
