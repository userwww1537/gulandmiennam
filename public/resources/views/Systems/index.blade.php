@section('title', 'Bất động sản Guland.vn kênh đăng tin mua bán cho thuê nhà đất uy tín số 1 Việt Nam')
@section('description', 'Guland chuyên mua bán cho thuê nhà riêng, nhà phố, nhà nguyên căn, căn hộ chung cư, đất thổ cư, đất nông nghiệp, đất nền,  bất động sản kinh doanh, bất động sản nghỉ dưỡng, phòng trọ, khách sạn, văn phòng')
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
<style>
    .notification {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        z-index: 1000000;
        width: 350px;
        text-align: center;
        background: #fff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px; /* Added margin to separate notifications */
    }
    .notification .icon {
        font-size: 50px;
    }
    .icon-container {
        display: inline-block;
        width: 70px;
        height: 70px;
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 0 auto 10px;
    }
    .notification.success .icon-container {
        border: 2px solid #00a2ff;
    }
    .notification.success .icon {
        color: #00a2ff;
    }
    .notification.error .icon-container {
        border: 2px solid #ff4d4d;
    }
    .notification.error .icon {
        color: #ff4d4d;
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
        background-color: #f1b300;
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
        background-color: #d49b00;
    }
</style>
@endsection
@extends('Systems.base')
@section('content')
    <div class="sdb-content-picker">
        <div class="p-front">
            <div class="front-cat">
                <div class="container">
                    <div class="front-cat__wrap">
                        <ul class="front-cat__ul">
                            @if(!Auth::check())
                                <li>
                                    <a href="{{ route('signin') }}" class="front-cat__lnk">
                                        <div class="fclk-icn"><img src="https://guland.vn/bds_2/img/icon-cat/dang-nhap.png" class="filter-blue-300"></div>
                                        <h3 class="fclk-lbl">Đăng nhập</h3>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('signup') }}" class="front-cat__lnk">
                                        <div class="fclk-icn clr-01"><img src="https://guland.vn/bds_2/img/icon-cat/dang-ky.png" class="filter-teal-300"></div>
                                        <h3 class="fclk-lbl">Đăng ký</h3>
                                    </a>
                                </li>
                            @endif
                            <li>
                                <a href="{{ route('mua-ban-bat-dong-san') }}"
                                    class="front-cat__lnk sell">
                                    <div class="fclk-icn clr-01"><img
                                            src="https://guland.vn/bds_2/img/icon-cat/mua-ban.png"
                                            class="filter-guland-600"></div>
                                    <h3 class="fclk-lbl">Mua bán</h3>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('cho-thue-bat-dong-san') }}"
                                    class="front-cat__lnk rent">
                                    <div class="fclk-icn clr-02"><img
                                            src="https://guland.vn/bds_2/img/icon-cat/cho-thue.png"
                                            class="filter-green-500"></div>
                                    <h3 class="fclk-lbl">Cho thuê</h3>
                                </a>
                            </li>

                            <li>
                                <a
                                    href="{{ route('kho-khach') }}"
                                    class="front-cat__lnk customer_url">
                                    <div class="fclk-icn clr-02"><img
                                            src="https://guland.vn/bds_2/img/icon-cat/khach-hang.png"
                                            class="filter-purple-300"></div>
                                    <h3 class="fclk-lbl">Kho khách</h3>
                                </a>
                            </li>

                            <li>

                                <a
                                    href="{{ route('affilate') }}"
                                    class="front-cat__lnk">
                                    <div class="fclk-icn clr-04"><img
                                            src="https://guland.vn/bds_2/img/icon-cat/gioi-thieu.png"
                                            class="filter-light-green-500"></div>
                                    <h3 class="fclk-lbl">Giới thiệu <br>
                                        thành viên</h3>
                                </a>
                            </li>
                            @if(Auth::check())
                                <li>
                                    <a href="{{ route('dang-bai') }}"
                                        class="front-cat__lnk">
                                        <div class="fclk-icn clr-04"><img
                                                src="https://guland.vn/bds_2/img/icon-cat/dang-tin.png"
                                                class="filter-blue-gray-400"></div>
                                        <h3 class="fclk-lbl">Đăng tin</h3>
                                    </a>
                                </li>
                            @endif

                        </ul>
                    </div>
                </div>
            </div>

            <div class="front-aff">
            </div>

            <div class="link-sqh-grp">
            </div>

            <div class="front-vids">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <div
                                class="embed-responsive embed-responsive-16by9">
                                <iframe class="embed-responsive-item"
                                    src="https://www.youtube.com/embed/US8ajY971JU"
                                    allowfullscreen></iframe>
                            </div>
                            <h3 class="front-vids__tle">Cách đăng bán
                                bất động sản trên Guland - Hướng dẫn mới
                                nhất về đăng bán BĐS Bất Động Sản
                                Guland</h3>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div
                                class="embed-responsive embed-responsive-16by9">
                                <iframe class="embed-responsive-item"
                                    src="https://www.youtube.com/embed/US8ajY971JU"
                                    allowfullscreen></iframe>
                            </div>
                            <h3 class="front-vids__tle">Cách đăng bán
                                bất động sản trên Guland - Hướng dẫn mới
                                nhất về đăng bán BĐS Bất Động Sản
                                Guland</h3>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection