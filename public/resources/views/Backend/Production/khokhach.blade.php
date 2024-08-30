@section('title', 'Khách hàng cần thuê nhà đất thành phố hồ chí minh')
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
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <style>
        .bds-n__pil {
            display: flex;
            justify-content: flex-start;
            padding: 0 8px;
            margin-left: -20px;
            top: 10px;
        }

        .bds-list-wrap {
            display: flex;
        }

        .bds-list-wrap__ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
            display: flex;
        }

        .bds-list-wrap__ul li {
            margin: 0 6px;
        }

        .bds-list-wrap__ul li a {
            display: block;
            padding: 2px 6px;
            text-decoration: none;
            color: rgb(0, 0, 0);
            font-size: 16px;
            background-color: #ffffff;
            border: 2px solid #e2e2e2;
            border-radius: 15px;
            transition: background-color 0.3s, box-shadow 0.3s;
            white-space: nowrap;
        }

        .active-nav {
            background-color: #ad872d;
            background-image: linear-gradient(5deg, #cc9f34 0%, #cc9f34 25%, #fac340 100%);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            cursor: pointer;
            color: #ffffff;
        }

        .bds-list-wrap__ul li a:hover {
            background-color: #ad872d;
            background-image: linear-gradient(5deg, #cc9f34 0%, #cc9f34 25%, #fac340 100%);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            cursor: pointer;
            color: #ffffff;
        }

        .bds-list-wrap__ul li a.selected {
            background-color: #ad872d;
            background-image: linear-gradient(5deg, #cc9f34 0%, #cc9f34 25%, #fac340 100%);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            color: #ffffff;
        }

        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 14px;
            border-radius: 8px;
            padding: 8px 0;
        }

        .dropdown-content a {
            color: black;
            padding: 8px 16px;
            text-decoration: none;
            display: block;
            transition: background-color 0.3s;
        }

        .dropdown-content a:hover {
            background-color: #f1f1f1;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .dropdown-content a.selected {
            background-color: #ffc107;
            color: #ffffff;
        }

        .card {
            width: 600px;
            height: auto;
            max-width: 100%;
            position: fixed;
            top: -50%;
            left: 50%;
            transform: translateX(-50%);
            z-index: 1000;
            display: none;
            opacity: 0;
            transition: top 0.5s ease, opacity 0.3s ease;
            box-sizing: border-box;
        }

        .card.show {
            top: 20%;
            opacity: 1;
            padding: 20px;
        }

        .card .close-btn {
            position: absolute;
            top: 1px;
            right: 1px;
            background-color: transparent;
            border: none;
            font-size: 36px;
            color: #000;
            cursor: pointer;
        }

        .c-kif_inf {
            background-color: #f9f9f9;
            border-radius: 15px;
            padding: 15px;
            margin-bottom: 10px;
        }

        .c-kif_inf p {
            margin-bottom: 8px;
            line-height: 1.4;
        }

        .c-kif_inf p:last-child {
            margin-bottom: 0;
        }

        .c-kif_inf p a {
            color: #6bacf3;
            font-size: 18px;
            text-decoration: none;
        }

        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.6);
            z-index: 999;
            display: none;
        }

        .overlay.show {
            display: block;
        }

        @media (max-width: 768px) {
            .card {
                width: 90%;
                max-width: 90%;
                left: 50%;
                transform: translateX(-50%);
            }

            .card.show {
                top: 10%;
            }

            .card .close-btn {
                top: 1px;
                right: 1px;
            }

            .card .close-btn1 {
                top: -10%;
                right: -18px;
            }

            .c-kif_inf {
                font-size: 14px;
            }

            .note_cnt input[type="text"] {
                height: 50px;
            }

            .note_btn button {
                height: 36px;
            }
        }

        .card .close-btn1 {
            position: absolute;
            top: 1px;
            right: -5px;
            background-color: transparent;
            border: none;
            font-size: 36px;
            color: #000;
            cursor: pointer;
        }

        .note_cnt input[type="text"] {
            width: 100%;
            height: 60px;
            padding: 10px;
            box-sizing: border-box;/ border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        .note_btn {
            display: flex;
            justify-content: flex-end;
        }

        .note_btn button {
            width: auto;
            top: 5%;
            height: 40px;
            background-color: #8d6e24;
            background-image: linear-gradient(5deg, #cc9f34 0%, #cc9f34 25%, #fac340 100%);
            border: none;
            color: #ffffff;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
            margin-left: 10px;
        }

        .modal-dialog {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: calc(100vh - 1rem);
        }

        .modal-content {
            top: -10px;
        }

        .modal.fade .modal-dialog {
            transform: translate(0, -50px);
            transition: transform 0.3s ease-out;
        }

        .modal.show .modal-dialog {
            transform: translate(0, 0);
        }
    </style>
@endsection
@extends('Systems.base')
@section('content')
    <div class="sdb-content-picker">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-12">
                    <div class="p-lst-n">
                        <div class="p-lst-n__hdr">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="/">Bất động sản</a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a href="/khach-hang/can-mua-bat-dong-san">Cần mua Nhà đất bất động sản Việt Nam</a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a href="/khach-hang/can-mua-bat-dong-san-tp-ho-chi-minh">Cần mua Nhà đất bất động
                                            sản TP. Hồ Chí Minh</a>
                                    </li>
                                </ol>
                            </nav>
                            <div class="bds-n__pil">
                                <div class="bds-list-wrap">
                                    <ul class="bds-list-wrap__ul">
                                        <li class="dropdown">
                                            <a href="" class="@php
                                                if(stripos(url()->full(), 'nguon=4') !== false || stripos(url()->full(), 'nguon=5') !== false || stripos(url()->full(), 'nguon=6') !== false || stripos(url()->full(), 'nguon=7') !== false) {
                                                    echo 'active-nav';
                                                }
                                            @endphp">Phân Loại</a>
                                            <div class="dropdown-content">
                                                <a href="@php
                                                $url = url()->full();

                                                if (strpos($url, '?nguon') !== false) {
                                                    if(stripos($url, '&') !== false) {
                                                        echo preg_replace('/nguon=\d+\&/', '', $url);
                                                    } else {
                                                        echo preg_replace('/\?nguon=\d+/', '', $url);
                                                    }
                                                } else if(strpos($url, '&nguon') !== false) {
                                                    echo preg_replace('/\&nguon=\d+/', '', $url);
                                                } else {
                                                    echo $url;
                                                }
                                            @endphp" data-value="all" class="{{ (stripos(url()->full(), 'nguon=4') !== false) ? 'active-nav' : '' }}">Tất cả</a>
                                                <a class="{{ (stripos(url()->full(), 'nguon=5') !== false) ? 'active-nav' : '' }}" href="@php
                                                    $url = url()->full();

                                                    if (strpos($url, 'nguon') !== false) {
                                                        echo preg_replace('/nguon=\d+/', 'nguon=5', $url);
                                                    } else {
                                                        if(strpos($url, '?') !== false) {
                                                            echo $url . '&nguon=5';
                                                        } else {
                                                            echo $url . '?nguon=5';
                                                        }
                                                    }
                                                @endphp" data-value="specialist">Chuyên Viên</a>
                                                <a class="{{ (stripos(url()->full(), 'nguon=6') !== false) ? 'active-nav' : '' }}" href="@php
                                                    $url = url()->full();

                                                    if (strpos($url, 'nguon') !== false) {
                                                        echo preg_replace('/nguon=\d+/', 'nguon=6', $url);
                                                    } else {
                                                        if(strpos($url, '?') !== false) {
                                                            echo $url . '&nguon=6';
                                                        } else {
                                                            echo $url . '?nguon=6';
                                                        }
                                                    }
                                                @endphp" data-value="customer">Khách hàng</a>
                                                <a class="{{ (stripos(url()->full(), 'nguon=7') !== false) ? 'active-nav' : '' }}" href="@php
                                                    $url = url()->full();

                                                    if (strpos($url, 'nguon') !== false) {
                                                        echo preg_replace('/nguon=\d+/', 'nguon=7', $url);
                                                    } else {
                                                        if(strpos($url, '?') !== false) {
                                                            echo $url . '&nguon=7';
                                                        } else {
                                                            echo $url . '?nguon=7';
                                                        }
                                                    }
                                                @endphp" data-value="broker">Môi giới</a>
                                            </div>
                                        </li>
                                        <li>
                                            <a class="{{ (stripos(url()->full(), 'nguon=2') !== false) ? 'active-nav' : '' }}" href="@php
                                                $url = url()->full();

                                                if (strpos($url, 'nguon') !== false) {
                                                    echo preg_replace('/nguon=\d+/', 'nguon=2', $url);
                                                } else {
                                                    if(strpos($url, '?') !== false) {
                                                        echo $url . '&nguon=2';
                                                    } else {
                                                        echo $url . '?nguon=2';
                                                    }
                                                }
                                            @endphp">Cần mua</a>
                                        </li>
                                        <li>
                                            <a class="active-nav" href="@php
                                                $url = url()->full();

                                                if (strpos($url, 'nguon') !== false) {
                                                    echo preg_replace('/nguon=\d+/', 'nguon=3', $url);
                                                } else {
                                                    if(strpos($url, '?') !== false) {
                                                        echo $url . '&nguon=3';
                                                    } else {
                                                        echo $url . '?nguon=3';
                                                    }
                                                }
                                            @endphp">Cần thuê</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <h1 class="p-lst-n__tle mt-3">Khách cần thuê nhà đất thành phố hồ chí minh</h1>
                            <div class="p-lst-n__rsa">
                                <div class="row">
                                    <div class="col-auto">
                                        <a href="#Modal-AddNewCustomer" class="btn btn-primary" id="btn-create"
                                            data-toggle="modal">Thêm mới</a>
                                        <div id="Modal-AddNewCustomer" class="modal fade">
                                            <div class="modal-dialog">
                                                <div class="modal-content" id="add-customer-content">
                                                    <button type="button" class="close close-fix" data-dismiss="modal">
                                                        <i class="mdi mdi-close"></i>
                                                    </button>
                                                    <div class="mdl-frm">
                                                        <div class="mdl-frm__wrp">
                                                            <div class="mdl-frm__hdr">
                                                                <h5 class="mdl-frm__tle">Thêm nhu cầu khách hàng</h5>
                                                            </div>
                                                            <form id="form-add-customer"
                                                                action="{{ route('method.add-warehouse') }}" method="post">
                                                                @csrf
                                                                <div class="mdl-frm__cnt">
                                                                    <div class="form-group">
                                                                        <label class="form-label">Loại khách
                                                                            <span class="text-red">(*)</span></label>
                                                                        <div class="ht-opt-wrp">
                                                                            <label class="ht-opt">
                                                                                <input checked value="1" type="radio"
                                                                                    class="ht-opt__ipt" name="type">
                                                                                <div class="ht-opt__lbl">Khách lẻ</div>
                                                                            </label>
                                                                            <label class="ht-opt">
                                                                                <input value="3" type="radio"
                                                                                    class="ht-opt__ipt" name="type">
                                                                                <div class="ht-opt__lbl">Nhà đầu tư</div>
                                                                            </label>
                                                                            <label class="ht-opt">
                                                                                <input value="2" type="radio"
                                                                                    class="ht-opt__ipt" name="type">
                                                                                <div class="ht-opt__lbl">Môi giới</div>
                                                                            </label>
                                                                            <label class="ht-opt">
                                                                                <input value="4" type="radio"
                                                                                    class="ht-opt__ipt" name="type">
                                                                                <div class="ht-opt__lbl">Chủ đất</div>
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-label">Họ tên
                                                                            <span class="text-red">(*)</span></label>
                                                                        <input type="text" class="form-control"
                                                                            name="name" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-label">SĐT
                                                                            <span class="text-red">(*)</span></label>
                                                                        <input type="text" class="form-control"
                                                                            name="phone" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-label">Khu vực quan tâm
                                                                            <span class="text-red">(*)</span></label>
                                                                        <div class="row row-frm">
                                                                            <div class="col-6">
                                                                                <select
                                                                                    class="form-control select2-input select2-hidden-accessible"
                                                                                    name="province_id" id="province_id"
                                                                                    required tabindex="-1"
                                                                                    aria-hidden="true"
                                                                                    data-select2-id="select2-data-province_id">
                                                                                    <option value="0"
                                                                                        class="selected"
                                                                                        data-select2-id="select2-data-454-bf4q">
                                                                                        - Tỉnh thành -</option>
                                                                                    <option value="01">Hồ Chí Minh
                                                                                    </option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="col-6">
                                                                                <select
                                                                                    class="form-control select2-input select2-hidden-accessible"
                                                                                    name="district_id" id="district_id"
                                                                                    required tabindex="-1"
                                                                                    aria-hidden="true"
                                                                                    data-select2-id="select2-data-district_id">
                                                                                    <option value="0"
                                                                                        class="selected"
                                                                                        data-select2-id="select2-data-456-zdh4">
                                                                                        - Quận huyện -</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="col-6 mt-2">
                                                                                <select
                                                                                    class="form-control select2-input select2-hidden-accessible"
                                                                                    name="ward_id" id="ward_id"
                                                                                    tabindex="-1" aria-hidden="true"
                                                                                    data-select2-id="select2-data-ward_id">
                                                                                    <option value="0"
                                                                                        class="selected">- Phường Xã -
                                                                                    </option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label class="form-label">Nhu cầu
                                                                            <span class="text-red">(*)</span></label>
                                                                        <select class="form-control" name="nhucau"
                                                                            required id="demand" data-id="0">
                                                                            <option value="can-mua"> Cần mua </option>
                                                                            <option selected value="can-thue"> Cần thuê
                                                                            </option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-label">
                                                                            Tài chính <span class="text-red">(*)</span>
                                                                        </label>
                                                                        <div class="row row-frm">
                                                                            <div class="col-6">
                                                                                <input type="text" class="form-control"
                                                                                    oninput="formatNumber(this)"
                                                                                    name="price_from" required
                                                                                    placeholder="Từ">
                                                                            </div>
                                                                            <div class="col-6">
                                                                                <input type="text" class="form-control"
                                                                                    oninput="formatNumber(this)"
                                                                                    name="price_to" required
                                                                                    placeholder="Đến">
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label class="form-label">Loại BĐS quan tâm <span
                                                                                class="text-red">(*)</span></label>
                                                                        <select
                                                                            class="form-control select2-input select2-hidden-accessible"
                                                                            name="bds_type" required tabindex="-1"
                                                                            aria-hidden="true"
                                                                            data-select2-id="select2-data-501-37jz">
                                                                            <option selected disabled
                                                                                data-select2-id="select2-data-503-8j6d">
                                                                            </option>
                                                                            <optgroup label="Bất động sản kinh doanh">
                                                                                @foreach ($categories['kd'] as $item)
                                                                                    <option value="{{ $item['id'] }}">
                                                                                        {{ $item['name'] }}</option>
                                                                                @endforeach
                                                                            </optgroup>
                                                                            <optgroup label="Nhà ở, nhà riêng, nguyên căn">
                                                                                @foreach ($categories['nha'] as $item)
                                                                                    <option value="{{ $item['id'] }}">
                                                                                        {{ $item['name'] }}</option>
                                                                                @endforeach
                                                                            </optgroup>
                                                                            <optgroup label="Căn hộ">
                                                                                @foreach ($categories['canho'] as $item)
                                                                                    <option value="{{ $item['id'] }}">
                                                                                        {{ $item['name'] }}</option>
                                                                                @endforeach
                                                                            </optgroup>
                                                                            <optgroup label="Đất nền, đất rẫy, vườn">
                                                                                @foreach ($categories['dat'] as $item)
                                                                                    <option value="{{ $item['id'] }}">
                                                                                        {{ $item['name'] }}</option>
                                                                                @endforeach
                                                                            </optgroup>
                                                                            <!-- Văn phòng coi như căn hộ -->
                                                                            <!-- Home stay và khách sạn farmstay coi như nhà -->
                                                                            <!-- Mặt bằng kinh doanh, shophouse, phòng trọ, kho nhà xưởng coi như nhà -->
                                                                        </select>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label class="form-label">Mô tả nhu cầu</label>
                                                                        <textarea rows="3" class="form-control" name="content"></textarea>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-label">Chia sẻ trong
                                                                            <span class="text-red">(*)</span></label>
                                                                        <select name="from" class="form-control"
                                                                            required>
                                                                            <option selected value="nguon-chi-nhanh">Chi
                                                                                nhánh
                                                                            </option>
                                                                            <option value="nguon-rieng-tu">Riêng tư
                                                                            </option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group-sbm">
                                                                        <a href="#" class="btn btn-outline-dark"
                                                                            data-dismiss="modal">Hủy bỏ</a>
                                                                        <button class="btn btn--green"
                                                                            id="btn-add-customer">Thêm khách hàng
                                                                            mới</button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="p-lst-n__srh">
                                            <div class="form-group">
                                                <form action="{{ route('method.search-warehouse') }}" method="POST">
                                                    @csrf
                                                    <input type="text" class="form-control" name="q"
                                                        placeholder="Tìm theo tên, số điện thoại" value="{{ (isset($query)) ? $query : '' }}">
                                                    <button class="btn btn--blue btn--icon" type="submit">
                                                        <i class="mdi mdi-magnify"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="p-lst-n__itr">
                            <div class="p-lst-n__stl">Có <b>{{ $countItem }}</b> khách.</div>
                        </div>
                        <div class="p-menu">
                            <ul class="p-menu__ul">
                                <li class="{{ (stripos(url()->full(), 'status') !== false) ? '' : 'active' }}">
                                    <a href="{{ route('kho-khach') }}">Khách mới <span class="pm-item-count">{{ $countNew }}</span>
                                    </a>
                                </li>
                                <li class="{{ (stripos(url()->full(), 'status=1') !== false) ? 'active' : '' }}">
                                    <a href="@php
                                    $url = request()->fullUrl();

                                    if (strpos($url, 'status') !== false) {
                                        echo preg_replace('/status=\d+/', 'status=1', $url);
                                    } else {
                                        if(strpos($url, '?') !== false) {
                                            echo $url . '&status=1';
                                        } else {
                                            echo $url . '?status=1';
                                        }
                                    }
                                @endphp">Theo dõi <span class="pm-item-count">{{ $countFollow }}</span></a>
                                </li>
                                <li class="{{ (stripos(url()->full(), 'status=2') !== false) ? 'active' : '' }}">
                                    <a href="@php
                                    $url = request()->fullUrl();

                                    if (strpos($url, 'status') !== false) {
                                        echo preg_replace('/status=\d+/', 'status=2', $url);
                                    } else {
                                        if(strpos($url, '?') !== false) {
                                            echo $url . '&status=2';
                                        } else {
                                            echo $url . '?status=2';
                                        }
                                    }
                                @endphp">Bỏ qua <span class="pm-item-count">{{ $countSkip }}</span></a>
                                </li>
                                <li class="{{ (stripos(url()->full(), 'status=3') !== false) ? 'active' : '' }}"><a href="@php
                                    $url = request()->fullUrl();

                                    if (strpos($url, 'status') !== false) {
                                        echo preg_replace('/status=\d+/', 'status=3', $url);
                                    } else {
                                        if(strpos($url, '?') !== false) {
                                            echo $url . '&status=3';
                                        } else {
                                            echo $url . '?status=3';
                                        }
                                    }
                                @endphp">Tất cả <span class="pm-item-count">{{ $countAll }}</span>
                                    </a>
                                </li>
                                <li class="{{ (stripos(url()->full(), 'status=4') !== false) ? 'active' : '' }}"><a href="@php
                                    $url = request()->fullUrl();

                                    if (strpos($url, 'status') !== false) {
                                        echo preg_replace('/status=\d+/', 'status=4', $url);
                                    } else {
                                        if(strpos($url, '?') !== false) {
                                            echo $url . '&status=4';
                                        } else {
                                            echo $url . '?status=4';
                                        }
                                    }
                                @endphp">Riêng tư <span class="pm-item-count">{{ $countPrivate }}</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="l-kif">
                            <div class="l-kif__lst">
                                @foreach ($warehousies as $item)
                                    <div class="c-kif">
                                        <div class="c-kif__wrp">
                                            <div class="c-kif__top">
                                                <h3 class="c-kif__tle">{{ $item['customer']['fullName'] }}
                                                    <span> - {{ $item['customer']['role'] }}</span>
                                                    <a data-id="{{ $item['customer']['id'] }}" class="tle-type tle-type--rt {{ (($item['customer']['UserID'] == Auth::user()->id)) ? 'btn-change-scope' : '' }}">@php
                                                        if($item['AreaUserID'] == 3) {
                                                            echo 'Hệ thống';
                                                        } else {
                                                            if($item['customer']['status'] == 1) {
                                                                echo 'Chi nhánh';
                                                            } else {
                                                                echo 'Riêng tư';
                                                            }
                                                        }
                                                    @endphp</a>
                                                </h3>
                                                <div class="c-kif__atn">
                                                    <div class="atn-lft">
                                                        {{-- goidien --}}
                                                        <a  class="btn btn-call btn-phone btn-call-customer"
                                                            data-type="call"
                                                            data-phone="{{ $item['customer']['phone'] }}"
                                                            data-id="{{ $item['id'] }}">
                                                            <i class="mdi mdi-phone-in-talk"></i>
                                                            <span>Gọi điện</span>
                                                        </a>
                                                        {{-- form-dienthoai --}}
                                                        <div class="modal modal-ftxt fade show"
                                                            id="customer-contact-modal-{{ $item['id'] }}"
                                                            aria-modal="true" role="dialog">
                                                            <div class="modal-dialog modal-dialog-centered">
                                                                <div class="modal-content">
                                                                    <button type="button" class="close close-fix"
                                                                        data-dismiss="modal">
                                                                        <i class="mdi mdi-close"></i>
                                                                    </button>
                                                                    <div class="modal-content"
                                                                        id="modal-customer-contact-content">
                                                                        <div class="ftxt-cnt">
                                                                            <div class="ctc-wrp">
                                                                                <h6>Liên hệ</h6>
                                                                                <hr>
                                                                                <div>
                                                                                    <a href="tel::{{ $item['customer']['phone'] }}"
                                                                                        id="text-phone">
                                                                                        <b>{{ $item['customer']['phone'] }}</b></a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        {{-- zalo --}}
                                                        <a href="https://zalo.me/{{ $item['customer']['phone'] }}"
                                                            data-phone="{{ $item['customer']['phone'] }}"
                                                            data-id="{{ $item['id'] }}" data-type="zalo"
                                                            class="btn btn-zalo btn-interact btn-zalo-customer">
                                                            <i class="mdi mdi-alpha-z-box-outline"></i>
                                                            <span>Zalo</span>
                                                        </a>
                                                    </div>
                                                    <div class="atn-rgt">
                                                        @if($item['isFollow'])
                                                            <a  data-id="{{ $item['id'] }}"
                                                                data-type="follow" class="btn btn-un-follow btn-interact">
                                                                <i class="mdi mdi-account-plus-outline"></i>
                                                                <span>Hủy theo dõi</span>
                                                            </a>
                                                        @else
                                                            <a  data-id="{{ $item['id'] }}"
                                                                data-type="follow" class="btn btn-follow btn-interact">
                                                                <i class="mdi mdi-account-plus-outline"></i>
                                                                <span>Theo dõi</span>
                                                            </a>
                                                        @endif
                                                        @if($item['isSkip'])
                                                            <a  data-id="{{ $item['id'] }}"
                                                                data-type="skip" class="btn btn-un-skip btn-interact">
                                                                <i class="mdi mdi-trash-can-outline"></i>
                                                                <span>Hủy bỏ qua</span>
                                                            </a>
                                                        @else
                                                            <a  data-id="{{ $item['id'] }}" data-type="pass"
                                                                class="btn btn-pass btn-interact">
                                                                <i class="mdi mdi-trash-can-outline"></i>
                                                                <span>Bỏ qua</span>
                                                            </a>
                                                        @endif
                                                        @if(isset($_GET['status']) && $_GET['status'] == 4)
                                                            <a href="{{ route('method.delete-private-warehouse', $item['id']) }}" data-id="{{ $item['id'] }}"
                                                                data-type="delete" class="btn btn-delete btn-interact">
                                                                <i class="mdi mdi-delete-outline"></i>
                                                                <span>Xóa</span>
                                                            </a>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="c-kif__cnt">
                                                <div class="c-kif__menu">
                                                    <a   class="btn btn-outline-dark btn-customer-demand"
                                                        data-id="{{ $item['parent_id'] }}">Nhu cầu
                                                        <span class="ck-item-count">{{ $item['nhucau'] }}</span>
                                                    </a>

                                                    @if ($controller::checkRole($controller::getRole()->MainRole) >= 3)
                                                        <a  
                                                            class="btn btn-outline-dark btn-customer-interact"
                                                            data-id="{{ $item['id'] }}">Tương tác
                                                            <span class="ck-item-count">{{ $item['tuongtac'] }}</span>
                                                        </a>
                                                    @endif

                                                    @if (Auth::check())
                                                        <a   class="btn btn-outline-dark btn-customer-note"
                                                            data-id="{{ $item['id'] }}">Ghi chú
                                                            <span class="ck-item-count">{{ $item['ghichu'] }}</span>
                                                        </a>
                                                    @endif
                                                </div>
                                                <div class="c-kif__cmt">
                                                    <div class="c-cmt">
                                                        <div class="c-cmt__wrp">
                                                            <div class="c-cmt__inf">
                                                                <span><b>{{ $item['customer']['fullName'] }}</b></span>
                                                                <span>{{ $controller::convertTimeVietNam($item['updated_at']) }}</span>
                                                            </div>
                                                            <div class="c-cmt__cnt">
                                                                {!! $item['content'] !!} - Người giới thiệu: <b> @php
                                                                    if(stripos($item['content'], 'Tin đăng') !== false) {
                                                                        echo 'Hệ thống';
                                                                    } else {
                                                                        echo $controller::getUser($item['customer']['UserID'])->fullName;
                                                                    }
                                                                @endphp</b>
                                                            </div>
                                                            <div class="c-cmt__lnk">
                                                                <a href="{{ stripos($item['content'], 'Đã quan tâm') !== false ? route('post-detail', $item['link']) : route('cho-thue-bat-dong-san-filter', $item['link']) }}"
                                                                    class="color-green-500">{{ $item['contentLink'] }}</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                @endforeach

                                {{ $warehousies->links() }}
                            </div>
                        </div>
                        <!-- <div class="l-tcc">
                                        <div class="l-tcc__lst" id="listing">
                                    
                                                <div class="c-tcc" id="c-61459">
                                                    <div class="c-tcc__wrp">
                                                        <div class="wrp-lft">
                                                            <div class="c-tcc__cnt">
                                                
                                                                <h3 class="c-tcc__tle">
                                                                    <span><a style="color: #8d6e24" href="/mua-ban-nha-mat-pho-mat-tien-quan-tan-binh-tp-ho-chi-minh-gia-tu-10-ty-den-20-ty">Bán Nhà mặt phố, mặt tiền Quận Tân Bình, TP. Hồ Chí Minh giá 10 tỷ - 20 tỷ</a></span>
                                                            </h3>
                                                
                                                                <div class="c-tcc__mta">
                                                                    <div class="row">
                                                                        <div class="col-auto">
                                                                            <span><b>Mã nhu cầu:</b> 61459</span>
                                                                        </div>
                                                                        <div class="col-auto">
                                                                            <span>1 giờ trước</span>
                                                                        </div>
                                                                        <div class="col-auto">
                                                                            <span><b>Nguồn:</b>  Guland</span>
                                                                        </div>
                                                                        <div class="col-auto">
                                                                            <span><b>Chia sẻ:</b> Đại Dương</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="c-tcc__dsr">
                                                                    <div class="tcc-dsr-wrp">Khách quan tâm tin đăng 506208 bán nhà mặt tiền kinh doanh quận tân bình </div>
                                                                </div>
                                                                <div class="c-tcc__ctm-smr">
                                                                    <a href="/khach-hang?cid=238">Xem 554
                                                                        nhu cầu khác của Phùng Văn Khải</a>
                                                                </div>
                                                                                    <div class="c-tcc__ctm-atn">
                                                                        <div class="row">
                                                                            <div class="col-6 col-lg-auto">
                                                                                <a href="/tin-da-dang-12512/mua-ban-nha-mat-pho-mat-tien-quan-tan-binh-tp-ho-chi-minh-gia-tu-10-ty-den-20-ty" class="btn btn-outline-dark btn-sm d-flex">Kho BĐS cá nhân
                                                                                    (37)</a>
                                                                            </div>
                                                                            <div class="col-6 col-lg-auto">
                                                                                <a href="/tin-xac-thuc/mua-ban-nha-mat-pho-mat-tien-quan-tan-binh-tp-ho-chi-minh-gia-tu-10-ty-den-20-ty" class="btn btn-outline-dark btn-sm d-flex">Kho BĐS Guland
                                                                                    (9)</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                            </div>
                                                        </div>
                                                
                                                        <div class="wrp-rgt">
                                                            <div class="c-tcc__ctm-inf"><b>Phùng Văn Khải</b> - Giám đốc CN
                                                            </div>
                                                            <div class="c-tcc__top">
                                                                <div class="tcc-top-atn">
                                                                    <div class="tcc-modal">
                                                                                                    <a href="#" data-id="61459" class="btn btn-call btn-call-customer tcc-modal__tgl">
                                                                                <i class="mdi mdi-phone-in-talk"></i>
                                                                                <span>Gọi điện</span>
                                                                            </a>
                                                                                            </div>
                                                                                        <a href="#" class="btn btn-zalo btn-zalo-customer" data-id="61459">
                                                                        <i class="mdi mdi-alpha-z-box-outline"></i>
                                                                        <span>Chat Zalo</span>
                                                                    </a>
                                                                                        </div>
                                                                <div class="tcc-top-pss">
                                                                    <a href="#" class="btn btn-gray btn-ignore" data-id="61459">
                                                                        <i class="mdi mdi-trash-can-outline "></i>
                                                                        <span>Bỏ qua</span>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div class="c-tcc__mid">
                                                                <div class="row">
                                                                    <div class="col-7">
                                                                        <div class="form-group">
                                                                            <select class="form-control sm-size btn-change-status" data-id="61459">
                                                                                <option value="" selected="">Tin mới</option>
                                                                                                                                                    <option value="5">Đang chốt</option>
                                                                                                                    <option value="8">Đang hẹn</option>
                                                                                                                    <option value="3">Khách nét</option>
                                                                                                                    <option value="2">Theo dõi</option>
                                                                                                                    <option value="6">Đã bỏ qua</option>
                                                                                                                    <option value="7">Hết nhu cầu</option>
                                                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-5">
                                                                        <div class="tcc-modal">
                                                                            <a data-toggle="modal" href="#modal-customer-comments" data-id="61459" class="btn btn-outline-dark btn-block tcc-modal__tgl btn-create-note">Ghi chú
                                                                                (0)</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                                                                    
                                            
                                            </div>
                                            <div class="c-spinner d-none" id="spinner"></div>
                                                                        <div class="l-tcc__smr">
                                                <a href="#" class="btn btn--guland" id="btn-load-more">Xem thêm</a>
                                            </div>
                                        </div> -->
                    </div>
                </div>
            </div>
        </div>
        <div class="l-artl">
            <div class="container">
                <div class="l-artl__wrap">
                    <div class="l-artl__cnt">
                        Bất động sản <a href="/">Guland.vn</a> cung cấp
                        phần mềm CRM quản lý khách hàng <b>Cần mua nhà
                            đất bất động sản Quận Tân Bình, TP. Hồ Chí
                            Minh</b> toàn diện danh cho môi giới bất
                        động sản
                        Cung cấp nhu cầu khách hàng <b>Cần mua nhà đất
                            bất động sản Quận Tân Bình, TP. Hồ Chí
                            Minh</b> miễn phí cho anh em môi giới bất
                        động sản chăm sóc

                        Chỉ cần khách hàng có nhu cầu <b>Cần mua nhà đất
                            bất động sản Quận Tân Bình, TP. Hồ Chí
                            Minh</b> sẽ được hàng chục chuyên viên môi
                        giới chăm sóc hàng ngày cho đến khi chốt được
                        giao dịch. Mỗi ngày đều gửi các tin đăng nhà đất
                        phù hợp với nhu cầu để khách hàng lựa chọn

                        Guland sẽ chọn lọc những khách hàng có nhu cầu
                        <b>Cần mua nhà đất bất động sản Quận Tân Bình,
                            TP. Hồ Chí Minh</b> phù hợp để cho chủ đất,
                        môi giới, chuyên viên chăm sóc ngay sau khi đăng
                        tin mà không cần chờ đợi

                        Khi quản lý khách hàng bằng phầm mềm Guland môi
                        giới sẽ dễ dàng theo dõi, phân loại, sắp xếp và
                        gợi ý sản phẩm cho khách hàng theo nhu cầu
                        <b>Cần mua nhà đất bất động sản Quận Tân Bình,
                            TP. Hồ Chí Minh</b> đồng thời có thể chia sẻ
                        cho nhóm cùng chăm sóc, tăng khả năng chốt sale
                        gấp 5 đến 10 lần.
                    </div>
                </div>
            </div>

        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const dropdownItems = document.querySelectorAll('.dropdown');

            dropdownItems.forEach(function(dropdown) {
                const dropdownContent = dropdown.querySelector('.dropdown-content');
                const dropdownToggle = dropdown.querySelector('a');

                dropdownToggle.addEventListener('click', function(e) {
                    e.preventDefault();
                    // Đóng tất cả các dropdown-content khác trước khi mở dropdown hiện tại
                    closeAllDropdowns();
                    dropdownContent.classList.toggle('show');
                });

                // Đóng dropdown khi click bên ngoài
                window.addEventListener('click', function(event) {
                    if (!dropdown.contains(event.target)) {
                        dropdownContent.classList.remove('show');
                    }
                });

                // Xử lý khi người dùng chọn một mục trong dropdown
                const dropdownLinks = dropdownContent.querySelectorAll('a');
                dropdownLinks.forEach(function(link) {
                    link.addEventListener('click', function() {
                        // Đóng dropdown khi chọn xong
                        dropdownContent.classList.remove('show');
                        // Đặt class 'selected' cho mục đã chọn
                        dropdownLinks.forEach(function(l) {
                            l.classList.remove('selected');
                        });
                        link.classList.add('selected');
                        // Đổi nội dung của dropdown-toggle thành nội dung mục đã chọn
                        dropdownToggle.textContent = link.textContent;
                    });
                });
            });

            function closeAllDropdowns() {
                dropdownItems.forEach(function(dropdown) {
                    dropdown.querySelector('.dropdown-content').classList.remove('show');
                });
            }
        });
    </script>
    <script>
        document.querySelectorAll('.bds-list-wrap__ul li a').forEach(function(button) {
            button.addEventListener('click', function() {
                document.querySelectorAll('.bds-list-wrap__ul li a').forEach(function(btn) {
                    btn.classList.remove('selected');
                });
                button.classList.add('selected');
            });
        });
    </script>
    <script>
        function showModal(event, modalId) {
            event.preventDefault();
            $('#' + modalId).modal('show');
        }
    </script>



    <div id="overlay" class="overlay"></div>
    <!-- Form Nhu cầu -->
    <div class="modal fade" id="customer-demand-modal" tabindex="-1" role="dialog"
        aria-labelledby="customer-demand-modal-label" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content pd-16">
                <button type="button" class="close close-fix" data-dismiss="modal" aria-label="Close">
                    <i class="mdi mdi-close"></i>
                </button>
                <div class="l-cmt" id="customer-modals-content">
                    <h5 class="l-cmt__tle">Khách có <b>1</b> nhu cầu</h5>
                    <div class="l-cmt__bdy">
                        <div class="l-cmt__lst">
                            <div class="c-cmt">
                                <div class="c-cmt__wrp">
                                    <div class="c-cmt__inf">
                                        <span><b>My</b></span>
                                        <span>14:03, 04/07/2024</span>
                                    </div>
                                    <div class="c-cmt__cnt">Đã quan tâm <b>Tin đăng 886223</b></div>
                                    <div class="c-cmt__lnk">
                                        <a href="/post/ban-dat-dep-duong-nu-dan-cong-vinh-loc-a-ngang-8-x-20-886223"
                                            class="color-green-500">Bán đất đẹp đường Nữ dân công . Vĩnh Lộc A Ngang : 8 x
                                            20</a>
                                    </div>
                                    <div class="c-cmt__cnt">Đã quan tâm Tin đăng Bán đất đẹp đường Nữ dân công . Vĩnh Lộc A
                                        Ngang : 8 x 20</div>
                                </div>
                            </div>
                            <!-- <div class="c-spinner"></div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Form Tương tác -->
    <div class="modal fade" id="customer-interact-modal" tabindex="-1" role="dialog"
        aria-labelledby="customer-interact-modal-label" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content pd-16">
                <button type="button" class="close close-fix" data-dismiss="modal" aria-label="Close">
                    <i class="mdi mdi-close"></i>
                </button>
                <div class="l-cmt" id="customer-modals-content-interact">
                    <h5 class="l-cmt__tle">Có <b>2</b> tương tác</h5>
                    <div class="l-cmt__bdy">
                        <div class="l-cmt__lst">
                            <div class="c-cmt">
                                <div class="c-cmt__wrp">
                                    <div class="c-cmt__inf">
                                        <span><b>Phùng Văn Khải</b></span>
                                        <span>15:36, 04/07/2024</span>
                                    </div>
                                    <div class="c-cmt__cnt">Đã gọi cho khách</div>
                                </div>
                            </div>

                        </div>
                        <!-- <div class="c-spinner"></div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Form Ghi chú -->
    <div class="modal fade" id="customer-note-modal" tabindex="-1" role="dialog"
        aria-labelledby="customer-note-modal-label" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content pd-16">
                <button type="button" class="close close-fix" data-dismiss="modal" aria-label="Close">
                    <i class="mdi mdi-close"></i>
                </button>
                <div class="l-cmt" id="customer-modals-content-note">
                    <h5 class="l-cmt__tle">Có <b>0</b> ghi chú với khách này </h5>
                    <div class="l-cmt__bdy">
                        <div class="l-cmt__add">
                            <form id="form-create-note">
                                <div class="form-group">
                                    <textarea rows="3" class="form-control sm-size" name="note" placeholder="Thêm ghi chú cho khách này"></textarea>
                                </div>
                                <div class="form-group-sbm">
                                    <button class="btn btn--guland" id="btn-save-note">Đăng ghi chú </button>
                                </div>
                                <input type="hidden" name="customer_id" value="216046">
                            </form>
                        </div>
                        <div class="l-cmt__lst"></div>
                        <!-- <div class="c-spinner"></div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')
    <script>
        $('#province_id').change(function() {
            $.ajax({
                url: "{{ route('fetch.get-district') }}",
                type: 'post',
                data: {
                    _token: "{{ csrf_token() }}",
                    city_id: $(this).val()
                },
                success: function(data) {
                    for (let i = 0; i < data.length; i++) {
                        $('#district_id').append('<option value="' + data[i].DistrictID + '">' +
                            data[i].DistrictName + '</option>');
                    }
                }
            });
        });

        $('#district_id').change(function() {
            $.ajax({
                url: "{{ route('fetch.get-ward') }}",
                type: 'post',
                data: {
                    _token: "{{ csrf_token() }}",
                    district_id: $(this).val()
                },
                success: function(data) {
                    $('#ward_id').empty();
                    $('#ward_id').html('<option value="0" class="selected">- Phường Xã -</option>');
                    for (let i = 0; i < data.length; i++) {
                        $('#ward_id').append('<option value="' + data[i].WardID + '">' +
                            data[i].WardName + '</option>');
                    }
                }
            });
        });
    </script>
    <script>
        function formatNumber(input) {
            var value = input.value.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            input.value = value;
        }
    </script>
    <script>
        $('.btn-call-customer').click(function() {
            var id = $(this).data('id');

            $.ajax({
                url: "{{ route('method.add-option') }}",
                type: 'post',
                data: {
                    _token: "{{ csrf_token() }}",
                    id: id,
                    option: 'call',
                    type: 1
                },
                success: function(data) {
                    $('.btn-customer-interact').each(function() {
                        if ($(this).data('id') == id) {
                            var count = $(this).find('.ck-item-count').text();
                            $(this).find('.ck-item-count').text(parseInt(count) + 1);
                        }
                    });
                    $('#customer-contact-modal-' + id).modal('show');
                }
            });
        });

        $('.btn-zalo-customer').click(function() {
            var id = $(this).data('id');

            $.ajax({
                url: "{{ route('method.add-option') }}",
                type: 'post',
                data: {
                    _token: "{{ csrf_token() }}",
                    id: id,
                    option: 'zalo',
                    type: 1
                },
                success: function(data) {
                    $('.btn-customer-interact').each(function() {
                        if ($(this).data('id') == id) {
                            var count = $(this).find('.ck-item-count').text();
                            $(this).find('.ck-item-count').text(parseInt(count) + 1);
                        }
                    });
                }
            });
        });

        $('.btn-customer-demand').on('click', function() {
            var id = $(this).data('id');

            $.ajax({
                url: '{{ route('method.get-customer-demand') }}',
                type: 'post',
                data: {
                    _token: "{{ csrf_token() }}",
                    id: id
                },
                success: function(data) {
                    $('#customer-modals-content').html(data);
                    $('#customer-demand-modal').modal('show');
                }
            });
        });

        $('.btn-customer-interact').on('click', function() {
            var id = $(this).data('id');

            $.ajax({
                url: '{{ route('method.get-customer-interact') }}',
                type: 'post',
                data: {
                    _token: "{{ csrf_token() }}",
                    id: id
                },
                success: function(data) {
                    $('#customer-modals-content-interact').html(data);
                    $('#customer-interact-modal').modal('show');
                }
            });
        });

        $('.btn-customer-note').on('click', function() {
            var id = $(this).data('id');

            $.ajax({
                url: '{{ route('method.get-customer-note') }}',
                type: 'post',
                data: {
                    _token: "{{ csrf_token() }}",
                    id: id
                },
                success: function(data) {
                    $('#customer-modals-content-note').html(data);
                    $('#customer-note-modal').modal('show');

                    $('#form-create-note').submit(function(e) {
                        e.preventDefault();
                        var formData = $(this).serializeArray();

                        if (formData[0].value == '') {
                            alert('Vui lòng nhập nội dung ghi chú');
                            return;
                        }

                        $.ajax({
                            url: '{{ route('method.add-customer-note') }}',
                            type: 'post',
                            data: {
                                _token: "{{ csrf_token() }}",
                                id: id,
                                note: formData[0].value
                            },
                            success: function(res) {
                                if (res) {
                                    alert(res.message);
                                    location.reload();
                                } else {
                                    alert(res.message);
                                }
                            }
                        });
                    });
                }
            });
        });
    </script>
    <script>
        $('.btn-follow').on('click', function() {
            var id = $(this).data('id');

            $.ajax({
                url: '{{ route('method.add-option') }}',
                type: 'post',
                data: {
                    _token: "{{ csrf_token() }}",
                    id: id,
                    option: 'follow',
                    status: 1
                },
                success: function(data) {
                    location.reload();
                }
            });
        });

        $('.btn-un-follow').on('click', function() {
            var id = $(this).data('id');

            $.ajax({
                url: '{{ route('method.add-option') }}',
                type: 'post',
                data: {
                    _token: "{{ csrf_token() }}",
                    id: id,
                    option: 'unfollow',
                    status: 0
                },
                success: function(data) {
                    location.reload();
                }
            });
        });

        $('.btn-un-skip').on('click', function() {
            var id = $(this).data('id');

            $.ajax({
                url: '{{ route('method.add-option') }}',
                type: 'post',
                data: {
                    _token: "{{ csrf_token() }}",
                    id: id,
                    option: 'unskip',
                    status: 1
                },
                success: function(data) {
                    location.reload();
                }
            });
        });

        $('.btn-pass').on('click', function() {
            var id = $(this).data('id');

            $.ajax({
                url: '{{ route('method.add-option') }}',
                type: 'post',
                data: {
                    _token: "{{ csrf_token() }}",
                    id: id,
                    option: 'pass',
                    status: 2
                },
                success: function(data) {
                    location.reload();
                }
            });
        });
    </script>
    <script>
        $('.btn-change-scope').on('click', function() {
            var id = $(this).data('id');

            $.ajax({
                url: '{{ route('method.change-scope') }}',
                type: 'post',
                data: {
                    _token: "{{ csrf_token() }}",
                    id: id
                },
                success: function(data) {
                    if(data.status) {
                        cuteToast({
                            type: "success",
                            message: data.message,
                            timer: 800
                        }).then(() => {
                            location.reload();
                        });
                    } else {
                        cuteToast({
                            type: "error",
                            message: data.message,
                            timer: 2000
                        });
                    }
                }
            });
        });
    </script>
@endsection
