@section('title', $product['title'])
@section('description', $product['description'])
@section('btn-fixed-menu')
    <a href="#" class="bnav-lnk bnav-lnk--call btn-call" data-id="{{ $product['slug'] }}" data-phone="0847388888">
        <div class="bnav-icn">
            <svg style="width:22px;height:22px" viewBox="0 0 24 24">
                <path d="M15,12H17A5,5 0 0,0 12,7V9A3,3 0 0,1 15,12M19,12H21C21,7 16.97,3 12,3V5C15.86,5 19,8.13 19,12M20,15.5C18.75,15.5 17.55,15.3 16.43,14.93C16.08,14.82 15.69,14.9 15.41,15.18L13.21,17.38C10.38,15.94 8.06,13.62 6.62,10.79L8.82,8.59C9.1,8.31 9.18,7.92 9.07,7.57C8.7,6.45 8.5,5.25 8.5,4A1,1 0 0,0 7.5,3H4A1,1 0 0,0 3,4A17,17 0 0,0 20,21A1,1 0 0,0 21,20V16.5A1,1 0 0,0 20,15.5Z"></path>
            </svg>
        </div>
        <div class="bnav-lbl">Liên hệ</div>
    </a>
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('Assets/Css/Product/detail.css') }}">
 <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css"/>
 <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css"/>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
     <style>
 .sdb-hdr-n .hdr-ft__loc .c-hflt-slt__gps {
    position: absolute;
    top:  28%;
    left: 0;
    width: 42px;
    height: 34px;
    padding: 0;

}

.modal-backdrop.modal-backdrop-show {
    opacity: 0.5;
}
.modal-backdrop {
    opacity: 0.5;
    transition: opacity 0.1s ease;
}
.modal-content-custom {
        font-size: 10px;
    }
.dtl-stl__row {
    display: flex;
    align-items: center;
}
.dtl-stl__row i {
    margin-right: 5px;
    color: black;
}
.dtl-stl__row span {
    display: inline-block;
}
.s-dtl-inf {
    display: flex;
    align-items: center;
}
.s-dtl-inf i {
   margin-right: 10px;
   color: black;
   align-self: flex-start;
}
.s-dtl-inf__lbl {
    margin-right: 10px;
}
.s-dtl-inf__val {
  flex-grow: 1;
}
.dtl-matn {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: flex-end;
    height: 100vh;
    padding-top: 60%;
}

.dtl-matn2 {
    position: absolute;
    z-index: 999;
    background: #fff;
    margin: -10px 10px;
}

.survey {
    max-width: 100%;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    margin-top: 60px;
}

@media (max-width: 768px) {
    .survey {
        width: 90%;
        margin-top: 100px;
    }
}
.zl-wrp__avt {
    position: relative;
    top: -2px;
    flex: 0 0 auto;
    width: 50px;
    height: 50px;
    margin: 0 16px 0 0;
    background-size: cover;
    background-position: center;
    border-radius: 50%;
    background-color: #999
}

.zl-wrp__avt img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 50%;
    overflow: hidden
}

.modal-content {
    position: relative;
    display: flex;
    flex-direction: column;
    width: 100%;
    height: auto;
    pointer-events: auto;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid rgba(0, 0, 0, .2);
    border-radius: 4px;
    outline: 0
}
.zl-wrp__cnt {
    flex: 1 1 auto;
    min-width: 0;
    padding: 0 0 2px;
    margin: 0 0 0
}

.zl-wrp__tle {
    margin: 0 0 8px;
    font-family: "LexendDeca", "Roboto", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif;
    line-height: 1.25;
    font-size: 16px;
    font-weight: 400;
    color: #212529
}

.zl-wrp__tle a {
    color: #212529
}

.zl-wrp__num {
    line-height: 1;
    font-size: 15px;
    font-weight: 600;
    color: #1976d2;
    letter-spacing: -0.25px
}

.zl-wrp__num a {
    color: #1976d2
}

@media (min-width: 992px) {
    .dtl-row-wrp .dtl-col-rgt {
        flex: 0 0 28%;
        width: 28%;
        position: sticky;
        padding: 0 0 0 16px;
    }
}

@media (max-width: 991px) {
    .dtl-row-wrp .dtl-col-rgt {
        flex: 1 1 100%;
        width: 100%;
        padding: 0 16px;
    }
}

.dtl-row-wrp .dtl-col-rgt {
    padding: 0 16px;
}

.dtl-aut__avt img {
    width: 100%;
    height: 100%;
    width: 55px;
    height: 55px;
    object-fit: cover;
    display: block;
    border-radius: 50%;
    overflow: hidden;

}
.dtl-aut__rol.role-agency {
    color: #000000;
    background-color: #b0b0b0;
}
.dtl-aut__rol {
    position: absolute;
    bottom: -8px;
    left: 55%;
    transform: translateX(-50%);
    padding: 0px 6px;
    line-height: 20px;
    font-family: "LexendDeca", "Roboto", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif;
    font-size: 10px;
    font-weight: 500;
    white-space: nowrap;
    color: #f6f6f6;
    background-color: #9e9e9e;
    border-radius: 8px;
}

.dtl-aut__tle , {
    margin: 0;
    margin-left:6%;
    line-height: 1.25;
    font-size: 17px;
}
@media (min-width: 992px) {
    .detail-media__view-wrap {
        min-height: 256px;
        overflow: hidden;
    }
}

.detail-media__view-wrap {
    position: relative;
    min-height: 128px;
    cursor: pointer;
}


/* edit */
.dtl-matn1.pos-tr1 {
    top: 0;
    right: 0;

}

.dtl-matn1 {
    position: absolute;
    padding: 8px;
    z-index: 200;
    width: auto;

}

.dtl-matn1 .btn.btn-outline-dark {
    background-color: #fff;
    height: 25px;
    border-radius: 5px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2) ;
    display: flex;
    align-items: center;
    transition: all 0.3s ease;

}

.dtl-matn1 .btn.btn-outline-dark .icon {
    margin-right: 2px;

}

@media (max-width: 600px) {
    .dtl-matn1 .btn.btn-outline-dark {
        height: 25px;
        border-radius: 5px;
        font-size: 12px;
        margin-right:2px ;
        top: 30%;
        cursor: pointer;
    }
}
 /* ***************************** */
#SlickSlider-DetailView .slick-list {
    display: flex;
    justify-content: center;
    overflow: hidden; / /
}

.slick-slider .slick-track, .slick-slider .slick-list {
    -webkit-transform: translate3d(0, 0, 0);
    -moz-transform: translate3d(0, 0, 0);
    -ms-transform: translate3d(0, 0, 0);
    -o-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
}

.slick-list {
    position: relative;
    overflow: hidden;
    display: block;
    margin: 0;
    padding: 0;
}
#SlickSlider-DetailView .slick-track {
    display: flex;
    justify-content: center;
    align-items: center;
}

.slick-track {
    position: relative;
    left: 0;
    top: 0;
    display: block;
    margin-left: auto;
    margin-right: auto;
}

.slick-track:before, .slick-track:after {
    content: "";
    display: table;
}

.slick-track:after {
    clear: both;
}

.media-full-wrap {
    position: relative;
    display: block;
    height: 100%;
    width: 100%;
}

.media-full-wrap__inner {
    display: flex;
    align-items: center;
    justify-content: center;
    position: absolute;
    top: 0;
    left: 0;
    right: 23   ;
    bottom: 0;

    background-color: #e9ecef;
    border-radius: 0;

}
@media (max-width: 767px) {
    .media-full-wrap__inner {
        right: 20px;
    }
}
.media-full-wrap__img {
    display: flex;
    width: 100%;
    height: 100%;
    align-items: center;
    justify-content: center;
    overflow: hidden;
}

@media (min-width: 768px) {
    .media-full-wrap {
        height: 460px;
    }
}

@media (max-width: 767px) {
    .media-full-wrap {
        height: 300px;
    }
}

.media-full-wrap img {
    display: block;
    width: 100%;
    height: 100%;
    object-fit: contain;
    -webkit-touch-callout: default;
    -webkit-user-select: default;
    -khtml-user-select: default;
    -moz-user-select: default;
    -ms-user-select: default;
    user-select: default;
    cursor: zoom-in;
}
/* slide */
.media-full-wrap__img img {
     width: 100%;
     cursor: pointer;
   }

/* **************************** */
.detail-media__list {
    position: relative;
    text-align: center;
    margin: 3 auto;
}

.slick-list {
    overflow: hidden;
    margin: 0 auto;
}

.slick-track {
    display: flex;
    align-items: center;
    justify-content: flex-start; /* Căn hình ảnh về phía bên trái */
    transition: transform 0.5s ease; /* Hiệu ứng di chuyển mượt mà */
}

.slick-slide {
    display: flex;
    justify-content: center; /* Căn giữa từng slide */
}

.detail-media__thumb {
    display: inline-block;
    margin: 0 5px; /* Lề đều */
}

.media-thumb-wrap {
    width: 100px; /* Chiều rộng mặc định */
    height: 80px; /* Chiều cao mặc định */
}

.media-thumb-wrap__inner {
    width: 100%;
    height: 100%;
    background-size: cover;
    background-position: center;
}

/* Điều chỉnh phản hồi */
@media (max-width: 768px) {
    .media-thumb-wrap {
        width: 90px;
        height: 70px;
    }
    .detail-media__thumb {
        margin: 0 3px;
    }
}

@media (max-width: 480px) {
    .media-thumb-wrap {
        width: 80px;
        height: 60px;
    }
    .detail-media__thumb {
        margin: 0 2px;
    }
}

#SlickSlider-DetailList .slick-list {
    overflow-x: auto;
    overflow-y: hidden;
    white-space: nowrap;
    display: flex;
    align-items: center;
}

#SlickSlider-DetailList .slick-track {
    display: flex;
    align-items: center;
}

#SlickSlider-DetailList .detail-media__thumb {
    flex: 0 0 auto;
    margin-right: 10px; /* Adjust spacing between thumbnails */
}

/* Custom scrollbar styles */
#SlickSlider-DetailList .slick-list::-webkit-scrollbar {
    height: 12px;

}

#SlickSlider-DetailList .slick-list::-webkit-scrollbar-thumb {
    background-color: #696969;
    border-radius: 25px;
    cursor: pointer;

}

#SlickSlider-DetailList .slick-list::-webkit-scrollbar-thumb:hover {
    background-color: #555;
}




/* ******************** */






     </style>
@endsection
@extends('Systems.base')
@section('content')
    <div class="sdb-content-picker">
        <div class="l-sdb-detail">
            <div class="container">
                <div class="dtl-row-wrp">
                    <div class="dtl-col-lft">
                        <div class="dtl-col-lft__wrp">
                            <div class="dtl-top dtl-stn">
                                <!-- IMAGE -->
                                <div class="dtl-imvi">
                                    <div class="detail-media ">
                                        <div class="detail-media__view-wrap ">
                                            @if(Auth::check())
                                                @if($controller::checkRole($controller::getRole()->MainRole) >= 6 || $controller::getRole($product['UserID'])->UpperID == Auth::user()->id || $product['UserID'] == Auth::user()->id)
                                                    <style>
                                                        .edit-post {
                                                            z-index: 501;
                                                        }
                                                    </style>
                                                    <div class="dtl-matn1 pos-tr1 edit-post" >
                                                        <a href="{{ route('chinh-sua-bai-viet', $product['ProductID']) }}" class="btn btn-outline-dark btn-d-save btn-save "style="cursor: pointer;">
                                                            <i class="icon fas fa-edit"></i>
                                                            <span>Sửa</span>
                                                        </a>
                                                    </div>
                                                @endif
                                            @endif
                                            @if(Auth::check())
                                                @if($controller::checkRole($controller::getRole()->MainRole) >= 2)
                                                <form action="{{ route('process-rating') }}" method="post" id="form-report" enctype="multipart/form-data">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $product['ProductID'] }}">
                                                    <div class="dtl-matn pos-br">
                                                        <a href="#Modal-ExmReport" class="btn btn-outline-dark" data-toggle="modal" onclick="toggleSurvey()">
                                                            <i class="far fa-file-chart-pie" ></i>
                                                            <span style="margin-left:2px;">BC khảo sát</span>
                                                        </a>

                                                        <div class="overlay hidden" onclick="closeSurvey()"></div>
                                                        <div class="survey hidden">
                                                            <div class="close" onclick="closeSurvey()">X</div>
                                                            <div class="nd1">
                                                                <h3>Báo cáo khảo sát</h3>
                                                            </div>
                                                            <hr>
                                                            <div class="bd">
                                                                <h4>Nội dung báo cáo</h4>
                                                                <input type="text" name="content" id="content">
                                                            </div>
                                                            <div class="ig">
                                                                <p>Hình ảnh</p>
                                                                <input type="file" placeholder="hình ảnh" name="image[]" multiple
                                                                    id="image">
                                                            </div>
                                                            <div class="bt">
                                                                <button class="cancel">Hủy bỏ</button>
                                                                <button id="submit-btn-report">Gửi Báo Cáo</button>

                                                                <script>
                                                                    $('#submit-btn-report').click(function(e) {
                                                                        e.preventDefault();
                                                                        $('#submit-btn-report').attr('disabled', 'disabled');
                                                                        $('#submit-btn-report').html('Đang xử lý...');
                                                                        $('#submit-btn-report').css('background-color', '#ccc');

                                                                        $('#form-report').submit();
                                                                    });
                                                                </script>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                                <div class="dtl-matn2" >
                                                    <a target="_blank" href="https://maps.google.com/?q={{ $product->addressnumber . ' ' . $controller::convertAddressFromIDToName($product->StreetID, '\App\Models\streetapi', 'StreetID') . ', ' . $controller::convertAddressFromIDToName($product->WardID, '\App\Models\wardapi', 'WardID') . ', ' . $controller::convertAddressFromIDToName($product->DistrictID, '\App\Models\districtapi', 'DistrictID') . ', ' . 'TP. Hồ Chí Minh' }}" class="btn btn-outline-dark btn-d-save btn-save "style="cursor: pointer;">
                                                        <i class="icon fas fa-location"></i>
                                                        <span>Vị trí</span>
                                                    </a>
                                                </div>
                                                @endif
                                            @endif
                                            {{-- image --}}
                                            <div id="SlickSlider-DetailView"  class="detail-media__view slick-slider slick-initialized" style="margin-left: 16px; width: 100%  ; ">
                                                <button class="slick-prev slick-arrow slick-disabled" aria-label="Previous" type="button" aria-disabled="true" style="display: inline-block;">Previous</button>
                                                <div class="slick-list">
                                                    <div class="slick-track"  style="opacity: 1; width: 1524px; transform: translate3d(0px, 0px, 0px);  ">
                                                        {{-- @if(count($images) > 0 && $product['avatar'] != $images[0]['ImageFile'])
                                                            <div class="detail-media__full slick-slide slick-current slick-active" data-slick-index="0" aria-hidden="false" tabindex="0" style="width: 762px;">
                                                                <div class="media-full-wrap">
                                                                    <div class="media-full-wrap__inner">
                                                                        <div data-src="{{ asset('Assets/Images/Product/' . $product['avatar']) }}" data-fancybox="detail-media-gallery" class="media-full-wrap__img">
                                                                            <img src="{{ asset('Assets/Images/Products/' . $product['avatar']) }}">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endif --}}
                                                        <div class="detail-media__full slick-slide slick-current slick-active" data-slick-index="0" aria-hidden="false" tabindex="0" style="width: 762px;">
                                                            <div class="media-full-wrap">
                                                                <div class="media-full-wrap__inner">
                                                                    <a data-fancybox="detail-media-gallery" href="{{ asset('Assets/Images/Products/' . $product['avatar']) }}" class="media-full-wrap__img">
                                                                        <img src="{{ asset('Assets/Images/Products/' . $product['avatar']) }}">
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        @foreach($images as $key => $image)
                                                            <div class="detail-media__full slick-slide" data-slick-index="1"
                                                                aria-hidden="true" tabindex="-1" style="width: 762px;">
                                                                <div class="media-full-wrap">
                                                                    <div class="media-full-wrap__inner">
                                                                        <div data-src="{{ asset('Assets/Images/Products/' . $image['ImageFile']) }}"
                                                                            data-fancybox="detail-media-gallery" class="media-full-wrap__img">
                                                                            <img src="{{ asset('Assets/Images/Products/' . $image['ImageFile']) }}">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                                <button class="slick-next slick-arrow" aria-label="Next" type="button" style="display: inline-block;" aria-disabled="false">Next</button>
                                            </div>
                                        </div>
                                        <div class="detail-media__list slick-initialized slick-slider" id="SlickSlider-DetailList">

                                              <div class="slick-list">
                                                <div class="slick-track">
                                                    <div class="detail-media__thumb">
                                                        <div class="media-thumb-wrap">
                                                            <div class="media-thumb-wrap__inner" style="background-image: url('{{ asset('Assets/Images/Products/' . $product['avatar']) }}')"></div>
                                                        </div>
                                                    </div>
                                                    @foreach($images as $key => $image)
                                                        <div class="detail-media__thumb">
                                                            <div class="media-thumb-wrap">
                                                                <div class="media-thumb-wrap__inner" style="background-image: url('{{ asset('Assets/Images/Products/' . $image['ImageFile']) }}')"></div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                            </div>



                                    </div>
                                </div>


                                <!-- content -->
                                <div class="dtl-main">
                                    <h1 class="dtl-tle" >
                                        <span class="vrf-bdg">VIP</span>
                                            {{ $product['title'] }}
                                    </h1>
                                    <div class="row row-dtl-sub">
                                        <div class="col-12 col-lg-auto">
                                            <div class="dtl-prc">
                                                <div class="dtl-prc__row">
                                                    <div class="dtl-prc__sgl dtl-prc__ttl">
                                                        {{ $controller::convertPriceText($product['price']) }}
                                                    </div>
                                                    <div class="dtl-prc__sgl dtl-prc__dtc">{{ $product['totalArea'] }}m²</div>
                                                    <div class="dtl-prc__sgl">{{ number_format($product['price'] / $product['totalArea']) }} nghìn /m²</div>
                                                    {{-- <div class="dtl-prc__sgl">7.5 tr /mn</div> --}}
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="dtl-stll">
                                        <div class="dtl-stl_row">
                                        <i class="fas fa-map-marker-alt "></i>
                                          <span> {{ (isset($address['addressnumber'])) ? $address['addressnumber'] : '' }} {{ $controller::convertAddressFromIDToName($address['StreetID'], '\App\Models\streetapi', 'StreetID') . ', ' .  $controller::convertAddressFromIDToName($address['WardID'], '\App\Models\wardapi', 'WardID') . ', ' .  $controller::convertAddressFromIDToName($address['DistrictID'], '\App\Models\districtapi', 'DistrictID') . ', ' .  $controller::convertAddressFromIDToName($address['CityID'], '\App\Models\cityapi', 'CityID') }}</span>
                                        </div>
                                        <div class="dtl-stl_row " style="margin-top:10px;">
                                            <i class="far fa-clipboard-list"></i>
                                            <span>Mã tin: <b>{{ $product['postCode'] }}</b></span>
                                            <span style="margin: 10px ;" >  Cập nhật {{ $controller::convertTimeVietNam($product['updated_at']) }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="dtl-inf dtl-stn">
                                <div class="dtl-inf__wrp">
                                    <h3 class="dtl-inf__tle">Thông tin BĐS</h3>
                                    <div class="dtl-inf__row">
                                        <div class="dtl-inf__col">
                                            <div class="s-dtl-inf">
                                                <i class="fas fa-list"></i>
                                                <div class="s-dtl-inf__lbl">Loại BĐS:</div>
                                                <div class="s-dtl-inf__val">
                                                    <b>{{ $product['subName'] }}</b>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="dtl-inf__col">
                                            <div class="s-dtl-inf">
                                                <i class="fas fa-long-arrow-right"></i>
                                                 <div class="s-dtl-inf__lbl">Chiều ngang:</div>
                                                <div class="s-dtl-inf__val"><b>{{ $product['AreaWidth'] }}m</b></div>
                                            </div>
                                        </div>
                                        <div class="dtl-inf__col">
                                            <div class="s-dtl-inf">
                                                <i class="fas fa-long-arrow-alt-up"></i>
                                                <div class="s-dtl-inf__lbl">Chiều dài:</div>
                                                <div class="s-dtl-inf__val"><b>{{ $product['AreaHeight'] }}m</b></div>
                                            </div>
                                        </div>
                                        @if($product['contructionArea'] != 0)
                                            <div class="dtl-inf__col">
                                                <div class="s-dtl-inf">
                                                    <i class="fas fa-warehouse"></i>
                                                    <div class="s-dtl-inf__lbl">DTXD:</div>
                                                    <div class="s-dtl-inf__val"><b>{{ $product['contructionArea'] }}m²</b></div>
                                                </div>
                                            </div>
                                        @endif
                                        @if($product['deposit'] != 0)
                                            <div class="dtl-inf__col">
                                                <div class="s-dtl-inf">
                                                    <i class="fas fa-money-bill-wave"></i>
                                                    <div class="s-dtl-inf__lbl">Tiền cọc:</div>
                                                    <div class="s-dtl-inf__val"><b>{{ $controller::convertPriceText($product['deposit']) }}</b></div>
                                                </div>
                                            </div>
                                        @endif
                                        @if(isset($infoProduct['CodeRoom']) && $infoProduct['CodeRoom'] != 'Không xác định')
                                            <div class="dtl-inf__col">
                                                <div class="s-dtl-inf">
                                                    <i class="fas fa-code-branch"></i>
                                                    <div class="s-dtl-inf__lbl">Mã căn:</div>
                                                    <div class="s-dtl-inf__val"><b>{{ $infoProduct['CodeRoom'] }}</b></div>
                                                </div>
                                            </div>
                                        @endif
                                        @if(isset($infoProduct['block']) && $infoProduct['block'] != 'Không xác định')
                                            <div class="dtl-inf__col">
                                                <div class="s-dtl-inf">
                                                    <i class="fas fa-shapes"></i>
                                                    <div class="s-dtl-inf__lbl">Block:</div>
                                                    <div class="s-dtl-inf__val"><b>{{ $infoProduct['block'] }}</b></div>
                                                </div>
                                            </div>
                                        @endif
                                        @if(isset($infoProduct['frequency']) && $infoProduct['frequency'] != 0)
                                            <div class="dtl-inf__col">
                                                <div class="s-dtl-inf">
                                                    <i class="fas fa-house-damage"></i>
                                                    <div class="s-dtl-inf__lbl">Tòa ở tầng:</div>
                                                    <div class="s-dtl-inf__val"><b>{{ $infoProduct['frequency'] }}</b></div>
                                                </div>
                                            </div>
                                        @endif
                                        @if($product['floors'] != 0)
                                            <div class="dtl-inf__col">
                                                <div class="s-dtl-inf">
                                                    <i class="fas fa-home"></i>
                                                    <div class="s-dtl-inf__lbl">Số tầng:</div>
                                                    <div class="s-dtl-inf__val"><b>{{ $product['floors'] }}</b></div>
                                                </div>
                                            </div>
                                        @endif
                                        @if(isset($infoProduct['BathRoom']) && $infoProduct['BathRoom'] != 0)
                                            <div class="dtl-inf__col">
                                                <div class="s-dtl-inf">
                                                    <i class="fa-solid fa-bath"></i>
                                                    <div class="s-dtl-inf__lbl">Số phòng tắm:</div>
                                                    <div class="s-dtl-inf__val"><b>{{ $infoProduct['BathRoom'] }}</b></div>
                                                </div>
                                            </div>
                                        @endif
                                        @if(isset($infoProduct['BedRoom']) && $infoProduct['BedRoom'] != 0)
                                            <div class="dtl-inf__col">
                                                <div class="s-dtl-inf">
                                                    <i class="fas fa-home"></i>
                                                    <div class="s-dtl-inf__lbl">Số phòng ngủ:</div>
                                                    <div class="s-dtl-inf__val"><b>{{ $infoProduct['BedRoom'] }}</b></div>
                                                </div>
                                            </div>
                                        @endif
                                        <div class="dtl-inf__col">
                                            <div class="s-dtl-inf">
                                                <i class="far fa-door-open"></i>
                                                 <div class="s-dtl-inf__lbl">Hướng cửa chính:</div>
                                                <div class="s-dtl-inf__val"><b>{{ $product['direction'] }}</b></div>
                                            </div>
                                        </div>
                                        @if($alley != null)
                                            <div class="dtl-inf__col">
                                                <div class="s-dtl-inf">
                                                    <i class="fas fa-map-marker-alt"></i>
                                                    <div class="s-dtl-inf__lbl">Vị trí:</div>
                                                    <div class="s-dtl-inf__val"><b>{{ $alley['AlleyLocation'] }}</b></div>
                                                </div>
                                            </div>
                                            <div class="dtl-inf__col">
                                                <div class="s-dtl-inf">
                                                    <i class="far fa-road"></i>
                                                    <div class="s-dtl-inf__lbl">
                                                        Đường vào rộng:
                                                    </div>
                                                    <div class="s-dtl-inf__val"><b>{{ ($alley['AlleyWidth'] != 0) ? $alley['AlleyWidth'] : 'Không xác định' }}m</b></div>
                                                </div>
                                            </div>
                                            <div class="dtl-inf__col">
                                                <div class="s-dtl-inf">
                                                    <i class="fas fa-road"></i>
                                                    <div class="s-dtl-inf__lbl">Loại đường:</div>
                                                    <div class="s-dtl-inf__val">
                                                        <b>{{ $alley['AlleyType'] }}</b>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        @if(count($product_utilities) > 0)
                                            <div class="dtl-inf__col">
                                                <div class="s-dtl-inf">
                                                    <i class="fas fa-window-restore"></i>
                                                    <div class="s-dtl-inf__lbl">Tiện ích:</div>
                                                    <div class="s-dtl-inf__val">
                                                        <b>
                                                            @foreach($product_utilities as $key => $utility)
                                                                {{ $utility['UtilityName'] }}
                                                                @if($key != count($product_utilities) - 1), @endif
                                                            @endforeach
                                                        </b>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        {{-- <div class="dtl-inf__col">
                                            <div class="s-dtl-inf">
                                                <box-icon name='book-bookmark' class="icon" color='#646161'></box-icon>
                                                <div class="s-dtl-inf__lbl">Pháp lý:</div>
                                                <div class="s-dtl-inf__val"><b>Có sổ hồng</b></div>
                                            </div>
                                        </div> --}}
                                    </div>
                                    <div class="dtl-inf__dsr">
                                        {!! $product['description'] !!}
                                    </div>
                                </div>
                            </div>
                            @if(Auth::check())
                                @if($controller::checkRole($controller::getRole()->MainRole) >= 2)
                                    @if(count($rating) > 0)
                                        <div class="dtl-exm dtl-stn">
                                            <div class="dtl-exm__wrp">
                                                <h3 class="dtl-exm__tle">Báo cáo khảo sát</h3>
                                                <div class="dtl-exm__lst">
                                                    <div class="exm-lst">
                                                        @if(count($rating) > 0)
                                                            @php
                                                                foreach($rating as $key => $value) {
                                                                    echo '
                                                                        <div class="exm-itm">
                                                                            <div class="exm-itm__wrp">
                                                                                <div class="exm-itm__lbl">
                                                                                    <b>'. $value['fullName'] .'</b>, '. $controller::convertTimeVietNam($value['created_at']) .'
                                                                                </div>
                                                                                <div class="exm-itm__cnt">'. $value['content'] .'</div>
                                                                                <div class="exm-itm__mda">
                                                                                    <div class="ht-img">';
                                                                                        if($value['images'] != null) {
                                                                                            foreach($value['images'] as $key => $image) {
                                                                                                echo '
                                                                                                    <a href="'. asset('Assets/Images/Surveies/'. $image['ImageFile']) .'" class="ht-img__sgl" data-fancybox="20294">
                                                                                                        <img src="'. asset('Assets/Images/Surveies/'. $image['ImageFile']) .'" alt="">
                                                                                                    </a>
                                                                                                ';
                                                                                            }
                                                                                        }
                                                                            echo '</div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    ';
                                                                }
                                                            @endphp
                                                        @endif

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endif
                            @endif
                        </div>
                    </div>
                    <div class="dtl-col-rgt">
                        <div class="dtl-aut dtl-crd">
                            <div class="dtl-aut__wrp">
                                <a href="{{ route('tin-da-dang.id', $poster['id']) }}" class="dtl-aut__inf">
                                    <div class="dtl-aut__avt">
                                        <img src="{{ asset('Assets/Images/Users/' . $poster['avatar']) }}" alt="" />
                                        <div class="dtl-aut__rol role-agency">{{ $poster['roleName'] }}</div>
                                    </div>
                                    <div class="dtl-aut__cxt">
                                        <h5 class="dtl-aut__tle">{{ $poster['fullName'] }}</h5>
                                        <div class="dtl-aut__stl">Xem {{ $controller::countPostUser($poster['id']) - 1 }} tin đăng khác</div>
                                    </div>
                                </a>
                                <div class="dtl-aut__atn mt-3">
                                    <div class="row">
                                        <div class="col-6">
                                            <a href="#" class="btn btn-outline-dark btn-outline-call btn-call" id="btn-call" data-toggle="modal" data-id="{{ $product->slug }}">
                                                <i class="fas fa-phone-square-alt" style="color: #63E6BE; height:15px; margin:1px;"></i>
                                                <span>Gọi điện</span>
                                            </a>
                                        </div>
                                        <div class="col-6">
                                            <a target="_blank" href="https://zalo.me/{{ $poster['phone'] }}" class="btn btn-outline-dark btn-outline-zalo"
                                                id="btn-zalo">
                                                <i class="fas fa-comment " style="color: #74C0FC; height:15px;  margin:1px;"></i>
                                                <span>Chat Zalo</span>
                                            </a>
                                        </div>
                                        <div class="col-12">
                                            <a href="#Modal-RequestQuote" class="btn btn--blue" data-toggle="modal">
                                                <i class="mdi mdi-account-check-outline"></i>
                                                <span>Yêu cầu tư vấn</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="dtl-atn dtl-crd">
                            <div class="dtl-atn__wrp">
                                <ul>
                                    <li class="text-center">
                                        @if(Auth::check() && $controller::checkRole($controller::getRole()->MainRole) >= 6)
                                            <a href="{{ route('method.marketing', ['id'=>$product['ProductID']]) }}" class="btn"
                                                onclick="return confirm('Bạn có chắc chắn muốn thêm {{ ($product['marketing']) ? 'Hủy nguồn marketing' : 'Thêm nguồn marketing' }} không?')">
                                                <i class="fas fa-home" style="color: #000000;margin-left:-40px;"></i> <span>{{ ($product['marketing']) ? 'Hủy nguồn marketing' : 'Thêm nguồn marketing' }}</span>
                                            </a>
                                        @endif
                                    </li>
                                    <li  class="text-center">
                                        <a href="{{ route('dang-bai') }}" class="btn">
                                            <i class="far fa-upload" style="color: #000000;margin-left:-55px;" ></i><span>Đăng nhanh bán gọn</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="dtl-row-wrp">
                    <div class="dtl-col-lft"></div>
                    <div class="dtl-col-rgt"></div>
                </div>
            </div>
        </div>


    </div>
    <div id="Modal-InfoToContact" class="modal fade modal-size-sm" tabindex="-1"
        style="padding-right: 17px; display: none;" aria-modal="true" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <button type="button" class="close close-fix" data-dismiss="modal">
                    <i class="far fa-times"></i>
                </button>
                <div class="mdl-frm" id="modal-contact-content">
                    <div class="modal-content">
                        <div class="ftxt-cnt">
                            <h5>Người đăng tin</h5>
                            <p class="ftu-zl">
                            </p>
                            <div class="zl-wrp">
                                <div class="zl-wrp__avt" style="background-image: url('https://cdn.guland.vn/users/image/16642692866332bbe62c654.JPG'); ">
                                    <div class="zl-wrp__rol rol--gl">Guland</div>
                                </div>
                                <div class="zl-wrp__cnt">
                                    <div class="zl-wrp__tle">Tan y</div>
                                    <div class="zl-wrp__num"><a href="tel:0345123856" data-phone="0345123856"
                                            class="btn-call-item" data-id="866582">0345123856
                                        </a>
                                    </div>
                                </div>
                                <a href="https://zalo.me/0345123856" data-phone="0345123856" class="btn-call-item" data-id="866582">
                                    <img src="https://guland.vn/bds/img/zalo.svg" class="zl-wrp__logo" width="23px" height="23px"></a>
                            </div>
                            <p></p>
                            <hr>
                            <h5>Đầu chủ (Người nắm chủ)</h5>
                            <p>Thông tin bảo mật chỉ hiển thị cho người đăng tin thấy</p>
                            <p class="ftu-zl">
                            </p>
                            <div class="zl-wrp">
                                <div class="zl-wrp__avt" style="background-image: url('/bds/img/user.jpg')">
                                    <div class="zl-wrp__rol rol--mg">Môi giới</div>
                                </div>
                                <div class="zl-wrp__cnt">
                                    <div class="zl-wrp__tle">Nguyen Tan Y</div>
                                    <div class="zl-wrp__num">
                                        <a href="tel:0345123856" data-phone="0345123856"
                                            class="btn-call-item" data-id="866582">0345123856</a>
                                        </div>
                                </div>
                                <a href="https://zalo.me/0345123856" data-phone="0345123856"
                                    class="btn-zalo-item btn-call-item" data-id="866582">
                                    <img src="https://guland.vn/bds/img/zalo.svg"
                                        class="zl-wrp__logo" width="32px" height="32px">
                                    </a>
                            </div>
                            <p></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
<script>
    var thumbnails = document.querySelectorAll('.detail-media__list .detail-media__thumb');
    var imageView = document.getElementById('SlickSlider-DetailView');
    var imageSlides = imageView.querySelectorAll('.detail-media__full');
    showImage(0);
    thumbnails.forEach(function(thumbnail, index) {
        thumbnail.addEventListener('click', function() {
            showImage(index);
        });
    });

    thumbnails.forEach(function(thumbnail) {
        thumbnail.addEventListener('click', function() {

             thumbnails.forEach(function(item) {
                item.classList.remove('active-item');
            });
            this.classList.add('active-item');
        });
    });
    function showImage(index) {
        imageSlides.forEach(function(slide) {
            slide.style.display = 'none';
        });
        imageSlides[index].style.display = 'block';
    }
    function toggleSurvey() {
        var overlay = document.querySelector('.overlay');
        var survey = document.querySelector('.survey');

        overlay.classList.toggle('hidden');
        survey.classList.toggle('hidden');

        if (!survey.classList.contains('hidden')) {
            document.body.style.overflow = 'hidden';
            setTimeout(function() {
                survey.style.top = '1%';
            }, 100);
        } else {
            document.body.style.overflow = '';
        }
    }
    $('.cancel').click(function(e) {
        e.preventDefault();
        closeSurvey();
    });
    function closeSurvey() {
        var overlay = document.querySelector('.overlay');
        var survey = document.querySelector('.survey');
        overlay.classList.add('hidden');
        survey.classList.add('hidden');
        survey.style.top = '-100%';
        document.body.style.overflow = '';
    }
</script>
<script>
    $(".btn-call").on('click', function() {
        var slug = $(this).data('id');

        $.ajax({
            url: '{{ route('fetch.get-contact') }}',
            type: 'post',
            data: {
                _token: "{{ csrf_token() }}",
                slug: slug
            },
            success: function(data) {
                $('#modal-contact-content').html(data);
                $('#Modal-InfoToContact').modal('show');
                $('#Modal-InfoToContact .modal-content').addClass('modal-content-custom'); // Thêm lớp CSS cho phần nội dung modal
                $('.modal-backdrop').addClass('modal-backdrop-show');
            }
        });
    });

    $(".close-fix").on('click', function() {
        $('#Modal-InfoToContact').modal('hide');
        $('.modal-backdrop').removeClass('modal-backdrop-show');
    });
</script>
{{-- <script>
    $(document).ready(function(){
        $('#SlickSlider-DetailView').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            prevArrow: '.slick-prev',
            nextArrow: '.slick-next'
        });

        $('[data-fancybox="gallery"]').fancybox({
            protect: true
        });
    });
</script>
  --}}
  <script >
    $(document).ready(function(){
$('#SlickSlider-DetailList').slick({
    slidesToShow: 3,  // Number of slides to show at once
    slidesToScroll: 1,
    infinite: false,  // Disable infinite scroll to prevent looping
    arrows: true,     // Show navigation arrows
    responsive: [
        {
            breakpoint: 768,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1,
                arrows: false,  // Hide arrows on smaller screens
                dots: true      // Use dots for navigation on smaller screens
            }
        },
        {
            breakpoint: 480,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: false,
                dots: true
            }
        }
    ]
});
});

</script>



@endsection
