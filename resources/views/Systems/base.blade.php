<html lang="vi">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, minimum-scale=1, maximum-scale=1.0, user-scalable=no">
    <link rel="apple-touch-icon" sizes="180x180" href="https://guland.vn/bds/img/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="https://guland.vn/bds/img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="https://guland.vn/bds/img/favicon-16x16.png">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="manifest" href="https://guland.vn/bds/img/site.webmanifest">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/7.4.47/css/materialdesignicons.css"
        integrity="sha512-/bZeHtNhCNHsuODhywlz53PIfvrJbAmm7MUXWle/f8ro40mVNkPLz0I5VdiYyV030zepbBdMIty0Z3PRwjnfmg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>@yield('title')</title>
    <meta name="description" content="@yield('description')">
    <meta name="keywords" content>
    <link rel="icon" href="https://guland.vn/bds/img/icon.png">
    <link rel="shortcut icon" href="https://guland.vn/bds/img/icon.png">
    <link rel="stylesheet" href="https://guland.vn/bds_2/css/main.css?v=nor">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link rel="canonical" href="https://guland.vn">
    <link rel="stylesheet" href>

    <meta property="fb:app_id" content="419261262612197">
    <meta property="og:url" content="https://guland.vn">
    <meta property="og:type" content="website">

    <meta property="og:title" content="@yield('title')">
    <meta property="og:description" content="@yield('description')">
    <meta property="og:image" content="https://guland.vn/share_logo.png">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/nprogress/0.2.0/nprogress.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/nprogress/0.2.0/nprogress.min.css" rel="stylesheet" />
    <!-- Cute Alert -->
    <link class="main-stylesheet" href="https://shop.muatainguyen.com/public/cute-alert/style.css" rel="stylesheet"
        type="text/css">
    <script src="https://shop.muatainguyen.com/public/cute-alert/cute-alert.js"></script>
    <link rel="stylesheet" href="{{ asset('Assets/Css/Library/swl-alert.css') }}">
    <script src="{{ asset('Assets/Js/swl-js.js') }}"></script>

    <style>
        .help-block help-block-error {
            color: red
        }

        .l-artl a {
            color: blue;
        }

        .modal {
            overflow-y: auto;
        }

        .table--custom-vtc tbody .td-sdb-data-stts.is-warning {
            color: gold;
        }

        .select2-selection__placeholder {
            color: inherit !important;
        }

        #modal-arounds {
            max-width: 800px;
        }

        .report-view-post {
            color: blue;
            font-weight: bold;
        }
    </style>
    <style>
        .ht-on-loading {
            display: block;
            position: relative;
        }

        .ht-on-loading:after {
            content: "";
            display: block;
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(255, 255, 255, .6);
            background-image: url('/spinner.gif');
            background-position: 50% 50%;
            -webkit-background-size: 36px 36px;
            background-size: 36px 36px;
            background-repeat: no-repeat;
        }

        .l-sdb-home__sstl>a {
            color: blue
        }
    </style>
    <style>
        .ht-on-loading {
            display: block;
            position: relative;
        }

        .ht-on-loading:after {
            content: "";
            display: block;
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(255, 255, 255, .6);
            background-image: url('/spinner.gif');
            background-position: 50% 50%;
            -webkit-background-size: 36px 36px;
            background-size: 36px 36px;
            background-repeat: no-repeat;
        }
    </style>
    <style>
        .notify-box {
            background: rgba(0, 0, 0, 0.684);
            position: fixed;
            z-index: 1000000;
            width: 100%;
            height: 100%;
        }

        .notification {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 1000000;
            width: 90%;
            /* Thay đổi từ px sang % để tự động điều chỉnh kích thước theo thiết bị */
            max-width: 350px;
            /* Giới hạn chiều rộng tối đa để tránh quá rộng trên màn hình lớn */
            text-align: center;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .icon-container {
            width: 90px;
            height: 90px;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0 auto 10px;
        }

        .icon-container img {
            width: 60%;
        }

        .notification.success .icon-container {
            border: 5px solid #61d1b9;
        }

        .notification.error .icon-container {
            border: 5px solid #d01515;
        }

        .notification h1 {
            margin: 10px 0;
            font-size: 24px;
        }

        .notification p {
            margin: 10px 0 20px;
            font-size: 18px;
            color: #666;
        }

        .notification button {
            background: linear-gradient(to right, #c58611, #eba015);
            border: none;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
        }

        .notification button:hover {
            background: linear-gradient(to right, #c58611, #eba015);
        }

        .icon {
            font-size: 40px;
        }

        @media (max-width: 768px) {
            .notification {
                width: 80%;
                /* Thay đổi kích thước nếu chiều rộng màn hình nhỏ hơn 768px */
            }
        }

        @media (max-width: 480px) {
            .notification {
                width: 90%;
                /* Thay đổi kích thước nếu chiều rộng màn hình nhỏ hơn 480px */
            }
        }

        .loading-robot {
            position: fixed;
            justify-content: center;
            align-items: center;
            z-index: 10000000;
            width: 100%;
            height: 100%;
            background: #000000a8;
        }
    </style>
    @yield('css')
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-70LT6T4R1S"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-70LT6T4R1S');
    </script>
</head>

<body>

    @if (session('error'))
        <div class="notify-box">
            <div class="notification error">
                <div class="icon-container">
                    <div class="icon">ℹ️</div>
                </div>
                <h1>Thông báo</h1>
                <p>{{ session('error') }}</p>
                <button id="cancel-notify">OK</button>
            </div>
        </div>
    @elseif (session('success'))
        <div class="notify-box">
            <div class="notification success">
                <div class="icon-container">
                    <img src="{{ asset('Assets/Images/Icons/success.png') }}" alt="Success" class="icon">
                </div>
                <h1>Thông báo</h1>
                <p>{{ session('success') }}</p>
                <button id="cancel-notify">OK</button>
            </div>
        </div>
    @endif


    <script>
        document.getElementById('cancel-notify').addEventListener('click', function() {
            document.querySelector('.notify-box').style.display = 'none';
        });

        setTimeout(function() {
            document.querySelector('.notify-box').style.display = 'none';
        }, 3000);
    </script>

    <div class="loading-robot d-none">
        <img width="150px" src="{{ asset('Assets/Gif/loading_robot.gif') }}" alt="">
    </div>

    <div class="sdb-picker-site">
        <div class="sdb-side-menu">
            <div class="sdb-side-menu__blank"></div>
            <div class="sdb-content-picker">
                <div class="sm-nav-wrap">
                    <div class="sm-nav-logo">
                        <a href="#">
                            <img src="https://guland.vn/bds_2/img/logo-guland.webp" alt>
                            <span>Thông tin thật - Giá trị thật</span>
                        </a>
                    </div>
                    <!-- Menu Nav Right -->
                    <div class="sm-nav-menu">

                        <div class="sm-nav-cat">
                            <div class="front-cat">
                                <div class="container">
                                    <div class="front-cat__wrap">
                                        <ul class="front-cat__ul">
                                            @if (!Auth::check())
                                                <li>
                                                    <a href="{{ route('signin') }}" class="front-cat__lnk">
                                                        <div class="fclk-icn">
                                                            <img src="https://guland.vn/bds_2/img/icon-cat/dang-nhap.png"
                                                                class="filter-blue-300">
                                                        </div>
                                                        <h3 class="fclk-lbl">Đăng
                                                            nhập
                                                        </h3>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('signup') }}" class="front-cat__lnk">
                                                        <div class="fclk-icn clr-01"><img
                                                                src="https://guland.vn/bds_2/img/icon-cat/dang-ky.png"
                                                                class="filter-teal-300"></div>
                                                        <h3 class="fclk-lbl">Đăng
                                                            ký</h3>
                                                    </a>
                                                </li>
                                            @endif
                                            <li>
                                                <a href="{{ route('mua-ban-bat-dong-san') }}"
                                                    class="front-cat__lnk sell">
                                                    <div class="fclk-icn clr-01"><img
                                                            src="https://guland.vn/bds_2/img/icon-cat/mua-ban.png"
                                                            class="filter-guland-600"></div>
                                                    <h3 class="fclk-lbl">Mua
                                                        bán</h3>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('cho-thue-bat-dong-san') }}"
                                                    class="front-cat__lnk rent">
                                                    <div class="fclk-icn clr-02"><img
                                                            src="https://guland.vn/bds_2/img/icon-cat/cho-thue.png"
                                                            class="filter-green-500"></div>
                                                    <h3 class="fclk-lbl">Cho
                                                        thuê</h3>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('kho-khach') }}"
                                                    class="front-cat__lnk customer_url">
                                                    <div class="fclk-icn clr-02"><img
                                                            src="https://guland.vn/bds_2/img/icon-cat/khach-hang.png"
                                                            class="filter-purple-300"></div>
                                                    <h3 class="fclk-lbl">Kho
                                                        khách</h3>
                                                </a>
                                            </li>

                                            <li>

                                                <a href="{{ route('affilate') }}" class="front-cat__lnk">
                                                    <div class="fclk-icn clr-04"><img
                                                            src="https://guland.vn/bds_2/img/icon-cat/gioi-thieu.png"
                                                            class="filter-light-green-500"></div>
                                                    <h3 class="fclk-lbl">Giới
                                                        thiệu <br> thành
                                                        viên</h3>
                                                </a>
                                            </li>
                                            @if (Auth::check())
                                                <li>
                                                    <a href="{{ route('dang-bai') }}" class="front-cat__lnk">
                                                        <div class="fclk-icn clr-04"><img
                                                                src="https://guland.vn/bds_2/img/icon-cat/dang-tin.png"
                                                                class="filter-blue-gray-400"></div>
                                                        <h3 class="fclk-lbl">Đăng
                                                            tin</h3>
                                                    </a>
                                                </li>
                                            @endif
                                            <li>
                                                <a href="{{ route('tin-da-dang.id', Auth::check() ? Auth::user()->id : 1) }}"
                                                    class="front-cat__lnk">
                                                    <div class="fclk-icn clr-04"><img
                                                            src="https://guland.vn/bds_2/img/icon-cat/tin-da-dang.png"
                                                            class="filter-cyan-600"></div>
                                                    <h3 class="fclk-lbl">Bài
                                                        đăng của bạn</h3>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if (Auth::check())
                            <div class="sm-nav-usr">
                                <div
                                    class="sm-usr-prf {{ $role->MainRole == 'boss' || $role->MainRole == 'admin' ? 'is-vip' : '' }}">
                                    @if ($role->MainRole == 'boss' || $role->MainRole == 'admin')
                                        <style>
                                            .is-vip-glmn {
                                                position: absolute;
                                                bottom: -19px;
                                                left: 9px;
                                                width: 30px;
                                                height: 30px;
                                                z-index: 100;
                                            }
                                        </style>
                                        <img src="{{ asset('Assets/Images/Icons/vip.png') }}" class="is-vip-glmn"
                                            alt="">
                                    @endif
                                    <div class="sm-usr-prf__avt">
                                        <img src="{{ asset('Assets/Images/Users/' . Auth::user()->avatar) }}"
                                            width="32" height="32">
                                    </div>
                                    <div class="sm-usr-prf__cxt">
                                        <div class="sm-usr-prf__tle">{{ Auth::user()->fullName }}</div>
                                        <div class="sm-usr-prf__rle">{{ $role->roleName }}</div>
                                    </div>
                                </div>
                                <ul class="sm-usr-lst">
                                    <li><a href="{{ route('profile', Auth::user()->phone) }}">Thông tin cá nhân</a>
                                    </li>
                                    @if ($controller::checkRole($controller::getRole()->MainRole) > 2)
                                        <li><a href="{{ route('quan-ly-nhan-vien') }}">Danh sách nhân viên</a></li>
                                    @endif
                                    @if ($controller::checkRole($controller::getRole()->MainRole) > 5)
                                        <li><a href="{{ route('quan-ly-khach-hang') }}">Data Member</a></li>
                                    @endif
                                    @if ($controller::checkRole($controller::getRole()->MainRole) > 5)
                                        <li><a href="{{route('quan-ly-thu-chi')}}">Quản lý Thu Chi</a></li>  
                                    @endif
                                    <li><a href="{{ route('quan-ly-tin') }}">Nhà đất đang quản lý</a></li>
                                       
                                </ul>
                            </div>
                            <div class="sm-nav-usr">
                                <ul class="sm-usr-lst">
                                </ul>
                            </div>
                            <div class="sm-nav-usr">
                                <ul class="sm-usr-lst sm-usr-lst--sgl">
                                    <li><a href="{{ route('logout') }}">Đăng xuất</a></li>
                                    <li><a style="cursor: pointer;" onclick="logoutAll()">Đăng xuất ở các thiết bị
                                            khác</a></li>
                                </ul>
                            </div>
                        @endif

                        <script>
                            function logoutAll() {
                                var password = prompt("Nhập mật khẩu để xác nhận đăng xuất toàn bộ thiết bị", "");
                                if (password != null) {
                                    $.ajax({
                                        url: '{{ route('logout.all') }}',
                                        type: 'get',
                                        data: {
                                            _token: '{{ csrf_token() }}',
                                            password: password
                                        },
                                        success: function(data) {
                                            alert(data.message);
                                        }
                                    });
                                }
                            }
                        </script>

                    </div>
                    <div class="sm-nav-app">
                        <a href="https://apps.apple.com/ng/app/guland-th%C3%B4ng-tin-quy-ho%E1%BA%A1ch-vn/id1597429748"
                            target="_blank">
                            <img src="https://guland.vn/bds/img/download-app-store.webp"></a>
                        <a href="https://play.google.com/store/apps/details?id=bds.guland.vietnam.com"
                            target="_blank">
                            <img src="https://guland.vn/bds/img/download-google-play.webp"></a>
                    </div>
                </div>
            </div>
        </div>

        @include('Frontend.Header.index')

        <!-- //Thêm phần content vô đây nhé class(sdb-content-picker) -->

        @yield('content')

        @include('Frontend.Footer.index')
    </div>


    <div id="Modal__FilterForm2" class="modal modal-hrd-srch fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <button type="button" class="close close-abs" data-dismiss="modal">✕</button>
                <div class="m-hdr-stn m-hdr-flt">
                    <div class="l-stn-frm">
                        <div class="l-stn-frm__wrp">
                            <div class="l-stn-frm">
                                <h3 class="form-title">Tìm kiếm bất động
                                    sản</h3>
                                <div class="m-hdr-stn m-hdr-srch">
                                    <div class="form-navtab nav">
                                        <a href="#Tab-HdrSrch-3" class="active" data-toggle="tab">Số điện thoại
                                            <br></a>
                                        <a href="#Tab-HdrSrch-2" data-toggle="tab">Mã nhà đất</a>
                                    </div>
                                    <div class="tab-content">
                                        <div id="Tab-HdrSrch-1" class="tab-pane show active" role="tabpanel">
                                            <form method="get" action="{{ route('method.search') }}">
                                                <div class="form-section">
                                                    <div class="form-group form-srch-group">
                                                        <i class="form-icon mdi mdi-magnify"></i>
                                                        <input type="text" class="form-control" name="phone"
                                                            placeholder="Tìm kiếm theo số điện thoại chủ">
                                                    </div>
                                                </div>
                                                <div class="form-section">
                                                    <div class="form-group form-submit">
                                                        <a href="#" class="btn btn-outline-dark"
                                                            data-dismiss="modal">Hủy
                                                            bỏ</a>
                                                        <button class="btn btn-primary">Tìm
                                                            kiếm</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div id="Tab-HdrSrch-2" class="tab-pane" role="tabpanel">
                                            <form action="{{ route('method.search') }}" method="get">
                                                <div class="form-section">
                                                    <div class="form-group form-srch-group">
                                                        <i class="form-icon mdi mdi-magnify"></i>
                                                        <input type="text" class="form-control" name="code"
                                                            placeholder="Tìm theo mã nhà đất">
                                                    </div>
                                                </div>
                                                <div class="form-section">
                                                    <div class="form-group form-submit">
                                                        <a href="#" class="btn btn-outline-dark"
                                                            data-dismiss="modal">Hủy
                                                            bỏ</a>
                                                        <button class="btn btn-primary">Tìm
                                                            kiếm</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div id="Tab-HdrSrch-3" class="tab-pane" role="tabpanel">
                                            <form action="{{ route('method.search') }}" method="get">
                                                <div class="form-section">
                                                    <div class="form-group form-srch-group">
                                                        <i class="form-icon mdi mdi-magnify"></i>
                                                        <input name="phone" type="text" class="form-control"
                                                            placeholder="Tìm kiếm theo số điện thoại chủ">
                                                    </div>
                                                </div>
                                                <div class="form-section">
                                                    <div class="form-group form-submit">
                                                        <a href="#" class="btn btn-outline-dark"
                                                            data-dismiss="modal">Hủy
                                                            bỏ</a>
                                                        <button class="btn btn-primary">Tìm
                                                            kiếm</button>
                                                    </div>
                                                </div>
                                            </form>
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

    <!-- Menu Fixed -->
    <div class="sdb-bnav">
        <div class="sdb-bnav__wrp">
            <div class="sdb-bnav__lst">
                <div class="lft-wrp">
                    <div class="sdb-bnav__itm">
                        <a href="#" class="bnav-lnk" onclick="history.go(-1); return false;">
                            <div class="bnav-icn">
                                <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                                    <path d="M20,11V13H8L13.5,18.5L12.08,19.92L4.16,12L12.08,4.08L13.5,5.5L8,11H20Z">
                                    </path>
                                </svg>
                            </div>
                            <div class="bnav-lbl">Quay lại</div>
                        </a>
                    </div>

                    <div class="sdb-bnav__itm">
                        <a href="{{ route('tin-da-dang.id', Auth::check() ? Auth::user()->id : 1) }}"
                            class="bnav-lnk">
                            <div class="bnav-icn">
                                <svg style="width:22px;height:22px" viewBox="0 0 24 24">
                                    <path
                                        d="M20 5L20 19L4 19L4 5H20M20 3H4C2.89 3 2 3.89 2 5V19C2 20.11 2.89 21 4 21H20C21.11 21 22 20.11 22 19V5C22 3.89 21.11 3 20 3M18 15H6V17H18V15M10 7H6V13H10V7M12 9H18V7H12V9M18 11H12V13H18V11Z">
                                    </path>
                                </svg>
                            </div>
                            <div class="bnav-lbl">Quản lý tin</div>
                        </a>
                    </div>
                </div>
                <div class="ctr-wrp">
                    <div class="sdb-bnav__itm">
                        @yield('btn-fixed-menu')
                    </div>
                </div>
                <div class="rgt-wrp">
                    <div class="sdb-bnav__itm">
                        <a href="#" class="bnav-lnk" id="share-url">
                            <div class="bnav-icn">
                                <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                                    <path
                                        d="M14,5V9C7,10 4,15 3,20C5.5,16.5 9,14.9 14,14.9V19L21,12L14,5M16,9.83L18.17,12L16,14.17V12.9H14C11.93,12.9 10.07,13.28 8.34,13.85C9.74,12.46 11.54,11.37 14.28,11L16,10.73V9.83Z">
                                    </path>
                                </svg>
                            </div>
                            <div class="bnav-lbl">Chia sẻ</div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div id="Modal-ChangeStatus" class="modal fade modal-ftxt">
        <div class="modal-dialog">
            <div class="modal-content">
                <button type="button" class="close close-abs" data-dismiss="modal">✕</button>
                <div class="ftxt-cnt">
                    <h5>
                        <div class="btn btn--blue">Công khai</div>
                    </h5>
                    <p>Bất động sản của bạn đang được chào bán công khai
                        trên Guland, sản phẩm được xuất hiện ở danh sách
                        sản phẩm và trên bản đồ quy hoạch Guland.</p>
                    <hr>
                    <h5>
                        <div class="btn btn--red">Riêng tư</div>
                    </h5>
                    <p>Bất động sản của bạn được lưu riêng tư, chỉ mình bạn
                        thấy để quản lý và theo dõi các bất động sản cá
                        nhân hoặc phục vụ cho việc nghiên cứu đầu tư.</p>
                    <hr>
                    <div><small><i>Bạn có thể thay đổi bằng cách sửa lại
                                thông tin sản phẩm.</i></small></div>
                </div>
            </div>
        </div>
    </div>

    <div id="Modal__Contact" class="modal-ftxt modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content" id="modal-contact-content-list">

            </div>
        </div>
    </div>

    <!-- JS Libs-->
    <script data-pagespeed-no-defer src="https://guland.vn/bds/libs/jquery.min.js"></script>
    <script src="https://guland.vn/bds/libs/jquery-ui/jquery-ui.min.js"></script>

    <script src="https://guland.vn/bds/libs/jquery.smooth-scroll.js"></script>

    <script src="https://guland.vn/bds/libs/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="https://guland.vn/bds/libs/select2/js/select2.full.min.js"></script>
    <script src="https://guland.vn/bds/libs/select2/js/i18n/vi.js"></script>

    <script src="https://guland.vn/bds/libs/toastr/toastr.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.lazyload/1.9.1/jquery.lazyload.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.4/clipboard.min.js"></script>
    <!-- JS Main -->
    <script src="https://guland.vn/bds_2/js/main.js?v=82"></script>

    <script>
        $("img.lazy").lazyload();

        $('.l-artl__wrap img').lazyload();

        $('.l-artl__smr-tgl').click(function(e) {
            e.preventDefault();
            $(this).closest('.l-artl').toggleClass('show-less');
        });
    </script>

    <script>
        $(document).ready(function() {
            toastr.options = {
                timeOut: 0,
                extendedTimeOut: 0,
                closeButton: true,
                tapToDismiss: false,
                showDuration: "200",
                hideDuration: "100",
                escapeHtml: false,
                toastClass: 'c-toast',
                containerId: 'ToastContainer',
                positionClass: '',
                titleClass: 'c-toast__tle',
                messageClass: 'c-toast__msg',
                closeClass: 'c-toast__cls',
            }
            $('#check-post').click(function(e) {
                e.preventDefault();
                $('#Modal_RequireLogin').modal('show');

            });

            $('.sdb-icon-fix__mess').click(function(e) {
                //e.preventDefault();
                $('.l-ntf').toggleClass('active');
            });
            $('.l-ntf .j-ntf-close').click(function(e) {
                e.preventDefault();
                $(this).closest('.l-ntf').removeClass('active');
            });
            $('.l-ntf .ntf-single__wrap').click(function(e) {
                e.preventDefault();
                $(this).closest('.l-ntf').addClass('show-detail');
            });
            $('.l-ntf .j-ntf-back').click(function(e) {
                e.preventDefault();
                $(this).closest('.l-ntf').removeClass('show-detail');
            });
        })
        $(document).on('click', '#share-url', function(e) {
            var href = window.location.href;

            var n_href = href;



            e.preventDefault();
            if (navigator.share) {
                navigator.share({
                        title: $('title').val(),
                        // text: $("meta[property='og:description']").attr("content"),
                        url: n_href,
                    })
                    .then(() => console.log('Successful share'))
                    .catch((error) => console.log('Error sharing', error));
            }
        });

        var clipboard = new ClipboardJS('#copy-url', {
            text: function(trigger) {
                return href = window.location.href;
            },
        });

        $(document).on('click', '#copy-url', function(e) {
            e.preventDefault();
        })

        clipboard.on('success', function(e) {
            toastr.success('Đã copy thành công link');
            e.clearSelection();
        });
    </script>
    <script>
        $.ajax({
            url: "{{ route('fetch.get-district') }}",
            type: 'post',
            data: {
                _token: "{{ csrf_token() }}",
                city_id: 1
            },
            success: function(data) {
                $('#district_id_3').empty();
                $('#district_id_3').append('<option value="">Chọn Quận/Huyện</option>')
                $('#ward_id_3').empty();
                $('#ward_id_3').append('<option value="">Chọn Phường/Xã</option>')
                $('#street_id_3').empty();
                $('#street_id_3').append('<option value="">Chọn Đường/Phố</option>')
                for (let i = 0; i < data.length; i++) {
                    if ({{ session('fill_district_id') ? session('fill_district_id') : 0 }} == data[i].DistrictID)
                        $('#district_id_3').append('<option value="' + data[i].DistrictID + '" selected>' +
                            data[i].DistrictName + '</option>');
                    else {
                        $('#district_id_3').append('<option value="' + data[i].DistrictID + '">' +
                            data[i].DistrictName + '</option>');
                    }
                }
            }
        });
    </script>
    @if (session('fill_district_id'))
        <script>
            let ward_id = {{ session('fill_ward_id') ? session('fill_ward_id') : 0 }};
            $.ajax({
                url: "{{ route('fetch.get-ward') }}",
                type: 'post',
                data: {
                    _token: "{{ csrf_token() }}",
                    district_id: {{ session('fill_district_id') }}
                },
                success: function(data) {
                    $('#ward_id_3').empty();
                    $('#ward_id_3').append('<option value="">Chọn Phường/Xã</option>')
                    $('#street_id_3').empty();
                    $('#street_id_3').append('<option value="">Chọn Đường/Phố</option>')
                    for (let i = 0; i < data.length; i++) {
                        if (ward_id == data[i].WardID)
                            $('#ward_id_3').append('<option value="' + data[i].WardID + '" selected>' +
                                data[i].WardName + '</option>');
                        else {
                            $('#ward_id_3').append('<option value="' + data[i].WardID + '">' +
                                data[i].WardName + '</option>');
                        }
                    }
                }
            });
        </script>
    @endif
    @if (session('fill_ward_id'))
        <script>
            let street_id = {{ session('fill_street_id') ? session('fill_street_id') : 0 }};
            $.ajax({
                url: "{{ route('fetch.get-street') }}",
                type: 'post',
                data: {
                    _token: "{{ csrf_token() }}",
                    ward_id: {{ session('fill_ward_id') }}
                },
                success: function(data) {
                    for (let i = 0; i < data.length; i++) {
                        if (street_id == data[i].StreetID)
                            $('#street_id_3').append('<option value="' + data[i].StreetID + '" selected>' +
                                data[i].StreetName + '</option>');
                        else {
                            $('#street_id_3').append('<option value="' + data[i].StreetID + '">' +
                                data[i].StreetName + '</option>');
                        }
                    }
                }
            });
        </script>
    @elseif(session('fill_street_id'))
        <script>
            let street_id = {{ session('fill_street_id') }};
            $.ajax({
                url: "{{ route('fetch.get-street-by-district') }}",
                type: 'post',
                data: {
                    _token: "{{ csrf_token() }}",
                    district_id: {{ session('fill_district_id') }}
                },
                success: function(data) {
                    $('#street_id_3').empty();
                    $('#street_id_3').append('<option value="">Chọn Đường/Phố</option>')
                    for (let i = 0; i < data.length; i++) {
                        if (street_id == data[i].StreetID)
                            $('#street_id_3').append('<option value="' + data[i].StreetID + '" selected>' +
                                data[i].StreetName + '</option>');
                        else {
                            $('#street_id_3').append('<option value="' + data[i].StreetID + '">' +
                                data[i].StreetName + '</option>');
                        }
                    }
                }
            });
        </script>
    @endif
    <script>
        $('#province_id_3').on('change', function() {
            $.ajax({
                url: "{{ route('fetch.get-district') }}",
                type: 'post',
                data: {
                    _token: "{{ csrf_token() }}",
                    city_id: 1
                },
                success: function(data) {
                    $('#district_id_3').empty();
                    $('#district_id_3').append('<option value="">Chọn Quận/Huyện</option>')
                    $('#ward_id_3').empty();
                    $('#ward_id_3').append('<option value="">Chọn Phường/Xã</option>')
                    $('#street_id_3').empty();
                    $('#street_id_3').append('<option value="">Chọn Đường/Phố</option>')
                    for (let i = 0; i < data.length; i++) {
                        $('#district_id_3').append('<option value="' + data[i].DistrictID + '">' +
                            data[i].DistrictName + '</option>');
                    }
                }
            });
        });

        $('#district_id_3').on('change', function() {
            $.ajax({
                url: "{{ route('fetch.get-ward') }}",
                type: 'post',
                data: {
                    _token: "{{ csrf_token() }}",
                    district_id: $(this).val()
                },
                success: function(data) {
                    $('#ward_id_3').empty();
                    $('#ward_id_3').append('<option value="">Chọn Phường/Xã</option>')
                    $('#street_id_3').empty();
                    $('#street_id_3').append('<option value="">Chọn Đường/Phố</option>')
                    for (let i = 0; i < data.length; i++) {
                        $('#ward_id_3').append('<option value="' + data[i].WardID + '">' +
                            data[i].WardName + '</option>');
                    }
                    let district_id = $('#district_id_3').val();
                    $.ajax({
                        url: "{{ route('fetch.get-street-by-district') }}",
                        type: 'post',
                        data: {
                            _token: "{{ csrf_token() }}",
                            district_id: district_id
                        },
                        success: function(data) {
                            $('#street_id_3').empty();
                            $('#street_id_3').append(
                                '<option value="">Chọn Đường/Phố</option>')
                            for (let i = 0; i < data.length; i++) {
                                $('#street_id_3').append('<option value="' + data[i]
                                    .StreetID + '">' +
                                    data[i].StreetName + '</option>');
                            }
                        }
                    });
                }
            });
        });

        $('#ward_id_3').on('change', function() {
            $.ajax({
                url: "{{ route('fetch.get-street') }}",
                type: 'post',
                data: {
                    _token: "{{ csrf_token() }}",
                    ward_id: $(this).val()
                },
                success: function(data) {
                    $('#street_id_3').empty();
                    $('#street_id_3').append('<option value="">Chọn Đường/Phố</option>')
                    for (let i = 0; i < data.length; i++) {
                        $('#street_id_3').append('<option value="' + data[i].StreetID + '">' +
                            data[i].StreetName + '</option>');
                    }
                }
            });
        });
    </script>


    @yield('js')

</body>

</html>
