@section('title', $title)
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
@section('description', $description)
@section('css')
    <link rel="stylesheet" href="{{ asset('Assets/Css/Product/collection.css') }}">

<style>
    #Modal-InfoToContact {
        background: rgba(0, 0, 0, 0.512);
    }
    .sdb-content-picker {
        margin-left: auto;
        margin-right: auto;
        min-height: 50vh;
        background-color: #e9ecef;
    }
    .sdb-content-picker:before, .sdb-content-picker:after {
        content: " ";
        display: table;
        clear: both;
    }
    .container {
        padding: 0 16px;
        margin: 0 auto;
    }
    .row {
        overflow: unset;
    }
    .row {
        display: flex;
        flex-wrap: wrap;
        margin-right: -8px;
        margin-left: -8px;
    }
    .bds-list {
        padding: 0 0 24px;
        margin: 0 -16px 16px;
        background-color: #fff
    }

    @media(min-width: 768px) {
        .bds-list {
            margin: 0 0 40px;
            padding: 0 0;
            background-color: rgba(0, 0, 0, 0)
        }
    }
    .bds-list .c-spinner {
        margin: 8px 0
    }

    @media(min-width: 768px) {
        .bds-list .c-spinner {
            margin: 0 0 16px 0
        }
    }
    @media(max-width: 575px) {
        .front-stn__lst .bds-list__cards {
            margin: 0 -4px
        }
    }
    .bds-list__cards {
        margin: 0
    }

    @media(min-width: 768px) {
        .bds-list__cards {
            margin: 0
        }
    }
    @media(max-width: 575px) {
        .front-stn__lst .bds-list__single {
            padding: 0 0 12px;
            background-color: rgba(0, 0, 0, 0)
        }
    }
    .bds-list__single {
        border-bottom: 8px solid #dee2e6
    }
    @media(min-width: 768px) {
        .bds-list__single {
            margin: 0;
            padding: 0 0 16px;
            border-bottom: 0
        }
    }
    @media(min-width: 768px) {
        .bds-list__cards.desktop-grid {
            display: flex;
            flex-wrap: wrap;
            margin: 0 -8px
        }

        .bds-list__cards.desktop-grid .bds-list__single {
            flex: 0 0 33.33%;
            width: 33.33%;
            margin: 0 8px 16px
        }
    }
    .bds-list__cards.sdb-map-list .bds-list__single {
        padding: 0 16px;
        margin-left: 0 !important;
        margin-bottom: 16px
    }
    
    @media(min-width: 768px) {
        .bds-list__cards.desktop-grid {
            display: flex;
            flex-wrap: wrap;
            margin: 0 -8px
        }

        .bds-list__cards.desktop-grid .bds-list__single {
            flex: 0 0 33.33%;
            width: 33.33%;
            margin: 0 8px 16px
        }
    }
    .bds-list__cards.sdb-map-list .bds-list__single {
        padding: 0 16px;
        margin-left: 0 !important;
        margin-bottom: 16px
    }
    @media (min-width: 768px) {
        .bds-card {
            border-radius: 4px;
            box-shadow: 0 0 0;
            border: 0;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .12);
            transition: box-shadow .1s ease-in-out;
        }
    }
    .bds-card {
        width: 100%;
        height: auto; 
        margin: 0;
        font-family: "Roboto", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif;
        background-color: #fff;
        border-radius: 0;
    }
    @media(max-width: 575px) {
        .front-stn__lst .bds-card {
            border-radius: 8px;
            box-shadow: 0 0 0;
            border: 1px solid #dee2e6
        }
    }
    

    @media(min-width: 768px) {
        .bds-card {
            border-radius: 4px;
            box-shadow: 0 0 0;
            border: 0;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .12);
            transition: box-shadow .1s ease-in-out
        }

        .bds-card:hover {
            box-shadow: 0 3px 12px 0 rgba(0, 0, 0, .16)
        }
    }
    .bds-list__cards.sdb-map-list .bds-card {
        overflow: hidden;
        border-radius: 8px;
        box-shadow: 0 0 0;
        border: 1px solid #dee2e6
    }
    @media (min-width: 768px) {
        .bds-card {
            border-radius: 4px;
            box-shadow: 0 0 0;
            border: 0;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .12);
            transition: box-shadow .1s ease-in-out;
        }
    }
    .bds-card__wrap {
        position: relative
    }

    @media(min-width: 768px) {
        .bds-card__wrap {
            display: flex;
            align-items: stretch
        }
    }
    .bds-list__cards.desktop-grid .bds-card__wrap {
        position: relative
    }

    @media(min-width: 768px) {
        .bds-list__cards.desktop-grid .bds-card__wrap {
            display: block
        }
    }
    @media(max-width: 575px) {
        .front-stn__lst .bds-card__img {
            border-radius: 8px 8px 0 0
        }
    }

    @media(min-width: 768px) {
        .l-sdb-list__cards.desktop-grid .bds-card__img {
            width: auto;
            border-radius: 8px 8px 0 0
        }
    }
    .bds-card__img {
        display: block;
        position: relative;
        border-radius: 0;
        overflow: hidden
    }
    .bds-card__img .btn {
        display: inline-flex;
        align-items: center;
        padding: 0 6px;
        height: 28px;
        border-radius: 8px
    }
    @media (min-width: 768px) {
        .bds-card__img {
            flex: 0 0 312px;
            width: 312px;
            border-radius: 4px 0 0 4px;
        }
    }
    
    @media(min-width: 768px) {
        .bds-list__cards.desktop-grid .bds-card__img .bds-image-wrap:after {
            padding-bottom: 50%
        }
    }
    .bds-card__img .bds-image-wrap {
        position: relative;
        display: block;
        z-index: 80;
    }

    .bds-card__img .bds-image-wrap:hover {
        opacity: .85
    }

    @media(min-width: 768px) {
        .bds-card__img .bds-image-wrap {
            height: 100%;
            min-height: 148px
        }
    }

    @media(max-width: 767px) {
        .bds-card__img .bds-image-wrap:after {
            content: "";
            display: block;
            padding-bottom: 40%;
            z-index: 100
        }
    }
    .bds-card__img .bds-image-wrap__img {
        display: block;
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        z-index: 120;
        background-color: #f2f2f2;
        background-size: cover;
        background-position: center;
        overflow: hidden
    }

    .bds-card__img .bds-image-wrap__img img {
        display: block;
        width: 110%;
        height: 110%;
        object-fit: cover;
        object-position: center;
        position: relative;
        left: -5%;
        top: -5%;
        max-width: none
    }

    .bds-card__btn-group {
        position: absolute;
        padding: 4px;
        top: 0;
        left: 0;
        z-index: 200;
        display: flex
    }

    .bds-card__btn-group .btn {
        margin: 0 4px 0 0;
        padding: 0 5px 0 2px;
        height: 18px;
        font-size: 11px;
        font-weight: 500;
        border-radius: 4px
    }

    .bds-card__btn-group .btn.btn-outline-dark {
        background-color: #fff;
        border: 1px solid rgba(0, 0, 0, 0)
    }

    @media(min-width: 992px) {
        .bds-card__btn-group .btn.btn-outline-dark {
            background-color: rgba(255, 255, 255, .8)
        }

        .bds-card__btn-group .btn.btn-outline-dark:hover {
            background-color: #fff
        }
    }

    .bds-card__btn-group .btn:last-child {
        margin: 0
    }

    .bds-card__btn-group .btn i.mdi {
        margin: 0 2px 0 0;
        width: 12px;
        height: 12px;
        opacity: .7
    }

    .bds-card__btn-group .form-group {
        margin: 0
    }

    .bds-card__btn-group .form-control {
        width: auto;
        display: inline-block;
        vertical-align: top;
        height: 22px;
        padding: 0 24px 0 8px;
        line-height: 20px;
        font-size: 12px;
        font-weight: 500;
        background-color: #fff;
        border: 1px solid rgba(0, 0, 0, 0);
        background-size: 18px auto;
        border-radius: 4px
    }

    @media(min-width: 768px) {
        .bds-card__btn-group .form-control {
            max-width: 144px
        }
    }

    .bds-card__btn-group select.form-control {
        background-size: 14px;
        padding: 0 13px 0 4px
    }

    .bds-card__btn-group.p-top-rgt {
        left: auto;
        right: 0
    }

    .bds-card__btn-group.p-btm-rgt {
        top: auto;
        left: auto;
        right: 0;
        bottom: 0
    }

    .bds-card__btn-group.p-btm-lft {
        top: auto;
        left: 0;
        right: auto;
        bottom: 0
    }

    .bds-card__stt {
        position: absolute;
        top: 0;
        left: 50%;
        transform: translateX(-50%);
        z-index: 200;
        padding: 2px 6px 0;
        font-size: 12px;
        font-weight: 600;
        color: #fff;
        background-color: #6c757d;
        border-radius: 0 0 6px 6px
    }

    @media(min-width: 768px) {
        .bds-card__stt {
            font-size: 11px
        }
    }

    .bds-card__stt.bds-show {
        background-color: #66bb6a
    }

    .bds-card__stt.stt-hide {
        background-color: #ef5350
    }

    .bds-card__save {
        position: absolute;
        padding: 4px;
        top: 0;
        right: 0;
        z-index: 200
    }

    .bds-card__save .btn {
        height: 22px;
        padding: 0 6px 0 4px;
        font-size: 12px;
        font-weight: 500;
        border-radius: 4px;
        color: #1976d2;
        background-color: rgba(255, 255, 255, .8);
        border: 1px solid #2196f3
    }
    
    .bds-card__save .btn i,
    .bds-card__save .btn svg {
        display: none
    }

    .bds-card__save .btn span {
        display: flex;
        align-items: center;
        line-height: 18px
    }
    
    .bds-card__save .btn span:before {
        content: "";
        display: block;
        margin: 0 4px 0 0;
        width: 16px;
        height: 16px;
        background-size: contain;
        background-position: center;
        background-repeat: no-repeat;
        background-image: url("../img/mdi/heart-outline.svg");
        filter: invert(59%) sepia(55%) saturate(3099%) hue-rotate(178deg) brightness(91%) contrast(87%)
    }

    .bds-card__save .btn:hover {
        background-color: #fff
    }

    .bds-card__save .btn.active {
        color: #fff;
        background-color: #42a5f5;
        border-color: #42a5f5
    }

    .bds-card__save .btn.active i,
    .bds-card__save .btn.active svg {
        display: none
    }

    .bds-card__save .btn.active span {
        font-size: 0;
        height: 18px
    }

    .bds-card__save .btn.active span:before {
        background-image: url("../img/mdi/heart.svg");
        filter: invert(100%) sepia(100%) saturate(0%) hue-rotate(148deg) brightness(102%) contrast(103%)
    }

    .bds-card__save .btn.active span:after {
        display: block;
        line-height: 18px;
        font-size: 12px;
        content: "Đã lưu tin"
    }
    .bds-card__save {
        position: absolute;
        padding: 3px;
        top: 0;
        right: 0;
        z-index: 200;
    }
    .btn-save-icon {
        display: inline-flex;
        position: relative;
        align-items: center;
        justify-content: center;
        padding: 0;
        width: 40px;
        height: 40px;
        line-height: 40px;
        text-align: center;
        color: #c0392b
    }

    .btn-save-icon:hover {
        color: #e8b243
    }

    .btn-save-icon i.mdi {
        display: block;
        position: relative;
        z-index: 50;
        width: 40px;
        height: 40px;
        text-shadow: 0 0 12px rgba(255, 255, 255, .8)
    }

    .btn-save-icon i.mdi:before {
        content: "󰋕"
    }

    .btn-save-icon:after {
        display: flex;
        align-items: center;
        justify-content: center;
        content: "󰋑";
        position: absolute;
        top: 0;
        left: 0;
        width: 40px;
        height: 40px;
        text-align: center;
        color: #fff;
        z-index: 40
    }

    .btn-save-icon.active {
        color: #c0392b;
        filter: invert(24%) sepia(38%) saturate(2870%) hue-rotate(340deg) brightness(111%) contrast(93%)
    }

    @media (min-width: 768px) {
        .bds-card__cnt {
            flex: 1 1 auto;
            min-width: 0;
            padding: 12px 16px;
        }
    }
    .bds-card__cnt {
        padding: 8px 14px 8px;
    }
    @media(min-width: 768px) {
        .bds-list__cards.desktop-grid .bds-card__cnt {
            padding: 12px 16px
        }
    }


    .bds-card__tle {
        position: relative;
        margin: 0 -12px 0 0;
        padding: 0 0 2px 0;
        font-family: "LexendDeca", "Roboto", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif;
        line-height: 21px;
    }
    .bds-card__tle a {
        position: relative;
        z-index: 5;
        display: block;
        font-size: 15px;
        font-weight: 500;
        color: #8d6e24;
        display: block;
        display: -webkit-box;
        line-height: 21px;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
        max-height: 42px;
        text-indent: 0;
        display: inline-block;
    }

    .bds-list__cards.desktop-grid .bds-card__tle {
        margin: 0 0 8px;
        font-family: "LexendDeca", "Roboto", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif
    }

    .bds-list__cards.desktop-grid .bds-card__tle a {
        font-size: 15px;
        display: block;
        display: -webkit-box;
        line-height: 21px;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
        max-height: 42px
    }
    
    

    .bds-card__tle a b {
        font-weight: 700
    }

    .bds-card__tle a:hover {
        text-decoration: none;
        color: #cc9f34
    }

    @media(max-width: 575px) {
        .bds-card__tle a {
            height: auto
        }
    }

    .bds-card__tle .vrf-bdg{
        display: inline-block;
        position: absolute;
        vertical-align: top;
        top: 2px;
        left: -2px;
        z-index: 10;
        margin: 0 4px 0 0;
        line-height: 14px;
        font-size: 12px;
        font-weight: 500;
        text-indent: 0;
        border-radius: 3px
    }

    .bds-card__tle .vrf-bdg {
        padding: 3px 5px 2px
    }

    .bds-card__tle .vrf-bdg+a {
        text-indent: 40px
    }
    .bds-card__tle .vrf-bdg {
        letter-spacing: 1px;
        text-transform: uppercase;
        color: #fff;
        background-image: linear-gradient(45deg, #cc9f34, #fac340)
    }

    .bds-card__tle .vrf-bdg:hover {
        color: #fff;
        background-image: linear-gradient(45deg, #8d6e24, #fac340)
    }


    .bds-card__inf {
        margin-right: -16px
    }

    .bds-card__inf .bds-inf-row {
        position: relative;
        display: flex;
        align-items: center;
        flex-wrap: nowrap;
        line-height: 24px;
        font-size: 15px;
        margin: 0 0 0;
        overflow: hidden
    }

    .bds-card__inf .bds-inf-row:before {
        content: "";
        position: absolute;
        display: block;
        height: 23px;
        top: 0;
        right: 0;
        width: 14px;
        background-image: linear-gradient(to left, #fff, rgba(255, 255, 255, 0.7) 50%, rgba(255, 255, 255, 0))
    }

    .bds-card__inf .bds-inf-icon {
        flex: 0 0 auto;
        display: block;
        width: 20px;
        height: 20px;
        text-align: center;
        margin: 0 8px 0 0
    }

    .bds-card__inf .bds-inf-icon svg {
        display: block;
        width: 20px;
        height: 20px
    }

    .bds-card__inf .bds-inf-icon svg path {
        fill: #ced4da
    }

    .bds-card__inf .bds-inf-data {
        flex: 0 0 auto;
        min-width: 0;
        margin: 0 0 2px;
        display: block;
        align-items: center;
        white-space: nowrap;
        overflow: hidden;
        white-space: nowrap
    }

    .bds-card__inf .bds-inf-data.data-color-1 {
        color: #d32f2f
    }

    .bds-card__inf .bds-inf-data.data-size-lg {
        font-size: 15px
    }

    .bds-card__inf .bds-inf-data i {
        position: relative;
        left: -2px;
        vertical-align: top;
        margin: 2px 1px 0 0;
        opacity: .5
    }

    .bds-card__inf .bds-inf-data:after {
        display: inline-block;
        vertical-align: top;
        content: "•";
        line-height: 1;
        font-size: 13px;
        padding: 6px 5px 0;
        color: #adb5bd
    }

    @media(min-width: 768px) {
        .bds-card__inf .bds-inf-data:after {
            padding: 6px 8px 0
        }
    }

    .bds-card__inf .bds-inf-data b {
        font-weight: 700
    }

    .bds-card__inf .bds-inf-data:last-child:after {
        visibility: hidden;
        padding: 0
    }

    .bds-card__inf .bds-inf-data.data-size-xl {
        font-size: 17px
    }

    .bds-card__inf .bds-inf-data.data-size-sm {
        font-size: 14px
    } 
    .bds-card__icn {
        display: flex;
        align-items: flex-end;
        justify-content: space-between;
        margin: 3px 0 0;
        padding: 5px 0 0;
        border-top: 1px dashed #dee2e6;
    }
    .bds-card .bds-btm-tle {
        margin: 0 8px 0 0;
        padding: 2px 0;
        font-family: "LexendDeca", "Roboto", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif;
        font-size: 14px
    }

    .bds-card .bds-btm-tle.clr-sell {
        color: #0288d1
    }

    .bds-card__ctm {
        margin: 6px 0 0;
        padding: 0;
        white-space: nowrap;
        text-align: right
    } 

    .bds-card .bds-btn-user {
        height: 22px;
        white-space: nowrap
    }

    .bds-card .bds-btn-user .btn {
        vertical-align: top
    }
            .pagination {
                display: flex;
                justify-content: center;
                align-items: center;
                margin-top: -20px;
                text-align: center;
            }

            .pagination a.active {
                background-color: rgb(238, 177, 36);
                color: #333;
                border-color: #333;
                transition: background-color 0.5s ease, color 0.5s ease, border-color 0.5s ease;
            }

            .pagination a {
                color: #333;
                padding: 5px 10px;
                text-decoration: none;
                border: 1px solid #ccc;
                margin: 0 5px;
                border-radius: 7px;
                transition: background-color 0.5s ease, color 0.5s ease, border-color 0.5s ease;
            }

            .pagination .prev,
            .pagination .next {
                font-weight: bold;
            }

            @media only screen and (max-width: 768px) {
                .pagination {
                    font-size: 14px;
                }

                .pagination a {
                    padding: 3px 8px;
                }
            }

            .table-bottom {
                display: flex;
                flex-direction: column;
                align-items: center;

            }

            .table-responsive {
                overflow-x: auto;
            }
    
    .zl-wrp__avt {
        position: relative;
        top: -2px;
        flex: 0 0 auto;
        width: 40px;
        height: 40px;
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
        font-size: 17px;
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

    @media(min-width: 992px) {
        .zl-wrp-lg .zl-wrp__cnt {
            flex: 1 1 auto;
            margin: 0 0 0 16px
        }

        .zl-wrp-lg .zl-wrp__avt {
            width: 68px;
            height: 68px
        }

        .zl-wrp-lg .zl-wrp__tle {
            font-size: 21px
        }

        .zl-wrp-lg .zl-wrp__num {
            font-size: 21px
        }
    }

    .bds-card__save1 {
        position: absolute;
        padding: 4px;
        top: 0;
        right: 0;
        z-index: 200
    }

    .bds-card__save1 .btn {
        height: 22px;
        padding: 0 6px 0 4px;
        font-size: 12px;
        font-weight: 500;
        border-radius: 4px;
        color: #1976d2;
        background-color: rgba(255, 255, 255, .8);
        border: 1px solid #2196f3
    }
    
    .btn-blue {
        background-color: rgb(24, 205, 245);
        border-color: rgb(24, 205, 245);  
        color: white; 
    }
    
    .modal    {
        overflow-y: auto;  
        max-height: 110vh;  
    }
    @media (max-width: 768px) {
        #Modal-InfoToContact .ftxt-cnt h5,
        #Modal-InfoToContact .ftxt-cnt p {
            font-size: 18px;  
        }

        #Modal-InfoToContact .zl-wrp__tle,
        #Modal-InfoToContact .zl-wrp__num a {
            font-size: 18px; 
        }
    }
    .btn-filter-status sup {
        display: inline-block;
        vertical-align: top;
        margin-right: -12px;
        padding: 3px 5px;
        background-color: #000000;
        color: #ffffff;
        border-radius: 50%;
        font-size: 10px;
        line-height: 1;
        top:-6px;
    }
    .hflt-drd__wrp li input {
            margin-bottom: 10px;  
            border-radius: 5px;  
            padding: 8px;  
            display: block;  
    } 
    @media (max-width: 768px) {
        .hdr-flt__itm {
            
            padding: 10px; 
        }

        .hflt-drd__wrp {
            
            padding: 5px; 
        }
        
        .hflt-drd__slt li input[type="text"] {
            width: calc(100% - 10px);  
        }
    }
    .button-container {
            display: flex;
            justify-content: space-between;  
    }

    @media (max-width: 768px) {
            .hflt-drd__slt li {
                display: block; 
                margin-bottom: 10px; 
            }

            .button-container {
                flex-direction: column; 
            }
        }

 
    .bds_location .bds-inf-row {
        position: relative;
        line-height: 24px;
        font-size: 15px;
        margin-top: 10px
      
    }
    .bds_location .bds-inf-data:after {
        display: inline-block;
        vertical-align: top;
        content: "•";
        line-height: 1;
        font-size: 13px;
        padding: 6px 5px 0;
        color: #adb5bd
    }
 
</style>
@endsection
@section('filter-header')
    <div class="sdb-hdr-n__flt">
        <div class="hdr-flt">
            <div class="hdr-flt__row">

                <div class="hdr-flt__itm">
                    <div class="c-hflt-slt">
                        <a href="#" class="c-hflt-slt__tgl btn">
                            @php
                                if (stripos(url()->full(), 'cho-thue-bat-dong-san') !== false) {
                                    echo 'Cho Thuê';
                                } else if (stripos(url()->full(), 'mua-ban-bat-dong-san') !== false) {
                                    echo 'Mua Bán';
                                } else {
                                    echo 'Phân Loại';
                                }
                            @endphp
                              <i class="fas fa-chevron-down" style="padding:5px;margin-right: -20px;color: #636363;"></i>
               
                        </a>
                        <div class="c-hflt-slt__drd">
                            <div class="hflt-drd">
                                <div class="hflt-drd__bgc"></div>
                                <div class="hflt-drd__wrp">
                                    <button class="hflt-drd__cls btn btn--icon">
                                        <i class="mdi mdi-close"></i>
                                    </button>
                                    <ul class="hflt-drd__slt">
                                        <li>
                                        <li @php
                                            if (stripos(url()->full(), 'cho-thue-bat-dong-san') !== false) {
                                                echo 'class="active"';
                                            }
                                            @endphp>
                                            <a href="{{ route('cho-thue-bat-dong-san') }}" class="bds-type-filter" data-value=" ">Cho Thuê</a>
                                        </li>
                                        <li @php
                                            if (stripos(url()->full(), 'mua-ban-bat-dong-san') !== false) {
                                                echo 'class="active"';
                                            }
                                            @endphp>
                                            <a href="{{ route('mua-ban-bat-dong-san') }}" class="bds-type-filter" data-value=" ">Mua Bán</a>
                                        </li>
                                    </ul>
                                    </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="hdr-flt__itm">
                    <div class="c-hflt-slt">
                        <a href="#" class="c-hflt-slt__tgl btn">@php
                            if (stripos(url()->full(), 'dang-giao-dich') !== false) {
                                echo 'Đang Giao Dịch';
                            } else if (stripos(url()->full(), 'da-giao-dich') !== false) {
                                echo 'Đã Giao Dịch';
                            } else if (stripos(url()->full(), 'nguon-sap-tra') !== false) {
                                echo 'Nguồn Sắp Trả';
                            } else if (stripos(url()->full(), 'marketing') !== false) {
                                echo 'Nguồn Marketing';
                            } else {
                                echo 'Trạng thái';
                            }
                        @endphp
                         <i class="fas fa-chevron-down" style="padding:5px;margin-right: -20px;color: #636363;"></i>
               
                    </a>
                       
                        <div class="c-hflt-slt__drd">
                            <div class="hflt-drd">
                                <div class="hflt-drd__bgc"></div>
                                <div class="hflt-drd__wrp">
                                    <button class="hflt-drd__cls btn btn--icon">
                                        <i class="mdi mdi-close"></i>
                                    </button>
                                    <ul class="hflt-drd__slt">
                                        <li>
                                        <li class="{{ (stripos(url()->full(), 'dang-giao-dich') !== false) ? 'active' : '' }}">
                                            <a href="
                                                @php

                                                $explodeUrl = explode('?', url()->full());
                                                $url = $explodeUrl[0];
                                                if (stripos($url, '-trang-thai-') !== false) {
                                                    if(stripos($url, 'marketing') !== false) {
                                                        $url = str_replace('-trang-thai-marketing-end', '-trang-thai-dang-giao-dich-end', $url);
                                                    } else if(stripos($url, 'nguon-sap-tra') !== false) {
                                                        $url = str_replace('-trang-thai-nguon-sap-tra-end', '-trang-thai-dang-giao-dich-end', $url);
                                                    } else if(stripos($url, 'da-giao-dich') !== false) {
                                                        $url = str_replace('-trang-thai-da-giao-dich-end', '-trang-thai-dang-giao-dich-end', $url);
                                                    } else if(stripos($url, 'dang-giao-dich') !== false) {
                                                        $url = str_replace('-trang-thai-dang-giao-dich-end', '', $url);
                                                    }
                                                } else {
                                                    $url = $url . '-trang-thai-dang-giao-dich-end';
                                                }
                                                if(count($explodeUrl) > 1) {
                                                    $url = $url . '?' . $explodeUrl[1];
                                                }
                                                echo $url;
                                                @endphp
                                            " class="bds-type-filter" data-value=" ">Đang giao dịch</a>
                                        </li>
                                        <li class="{{ (stripos(url()->full(), 'da-giao-dich') !== false) ? 'active' : '' }}">
                                            <a href="
                                                @php
                                                $explodeUrl = explode('?', url()->full());
                                                $url = $explodeUrl[0];
                                                if (stripos($url, '-trang-thai-') !== false) {
                                                    if(stripos($url, 'marketing') !== false) {
                                                        $url = str_replace('-trang-thai-marketing-end', '-trang-thai-da-giao-dich-end', $url);
                                                    } else if(stripos($url, 'nguon-sap-tra') !== false) {
                                                        $url = str_replace('-trang-thai-nguon-sap-tra-end', '-trang-thai-da-giao-dich-end', $url);
                                                    } else if(stripos($url, 'da-giao-dich') !== false) {
                                                        $url = str_replace('-trang-thai-da-giao-dich-end', '', $url);
                                                    } else if(stripos($url, 'dang-giao-dich') !== false) {
                                                        $url = str_replace('-trang-thai-dang-giao-dich-end', '-trang-thai-da-giao-dich-end', $url);
                                                    }
                                                } else {
                                                    $url = $url . '-trang-thai-da-giao-dich-end';
                                                }
                                                if(count($explodeUrl) > 1) {
                                                    $url = $url . '?' . $explodeUrl[1];
                                                }
                                                echo $url;
                                                @endphp
                                            " class="bds-type-filter" data-value=" ">Đã giao dịch</a>
                                        </li>
                                        <li class="{{ (stripos(url()->full(), 'nguon-sap-tra') !== false) ? 'active' : '' }}">
                                            <a href="
                                                @php
                                                    $explodeUrl = explode('?', url()->full());
                                                    $url = $explodeUrl[0];
                                                    if (stripos($url, '-trang-thai-') !== false) {
                                                        if(stripos($url, 'marketing') !== false) {
                                                            $url = str_replace('-trang-thai-marketing-end', '-trang-thai-nguon-sap-tra-end', $url);
                                                        } else if(stripos($url, 'nguon-sap-tra') !== false) {
                                                            $url = str_replace('-trang-thai-nguon-sap-tra-end', '', $url);
                                                        } else if(stripos($url, 'da-giao-dich') !== false) {
                                                            $url = str_replace('-trang-thai-da-giao-dich-end', '-trang-thai-nguon-sap-tra-end', $url);
                                                        } else if(stripos($url, 'dang-giao-dich') !== false) {
                                                            $url = str_replace('-trang-thai-dang-giao-dich-end', '-trang-thai-nguon-sap-tra-end', $url);
                                                        }
                                                    } else {
                                                        $url = $url . '-trang-thai-nguon-sap-tra-end';
                                                    }
                                                    if(count($explodeUrl) > 1) {
                                                        $url = $url . '?' . $explodeUrl[1];
                                                    }
                                                    echo $url;
                                                @endphp
                                            " class="bds-type-filter" data-value=" ">Nguồn sắp trả</a>
                                        </li>
                                        @if(Auth::check() && $controller::checkRole($controller::getRole()->MainRole) >= 6)
                                            <li class="{{ (stripos(url()->full(), 'marketing') !== false) ? 'active' : '' }}">
                                                <a href="
                                                    @php
                                                        $explodeUrl = explode('?', url()->full());
                                                        $url = $explodeUrl[0];
                                                        if (stripos($url, '-trang-thai-') !== false) {
                                                            if(stripos($url, 'marketing') !== false) {
                                                                $url = str_replace('-trang-thai-marketing-end', '', $url);
                                                            } else if(stripos($url, 'nguon-sap-tra') !== false) {
                                                                $url = str_replace('-trang-thai-nguon-sap-tra-end', '-trang-thai-marketing-end', $url);
                                                            } else if(stripos($url, 'da-giao-dich') !== false) {
                                                                $url = str_replace('-trang-thai-da-giao-dich-end', '-trang-thai-marketing-end', $url);
                                                            } else if(stripos($url, 'dang-giao-dich') !== false) {
                                                                $url = str_replace('-trang-thai-dang-giao-dich-end', '-trang-thai-marketing-end', $url);
                                                            }
                                                        } else {
                                                            $url = $url . '-trang-thai-marketing-end';
                                                        }
                                                        if(count($explodeUrl) > 1) {
                                                            $url = $url . '?' . $explodeUrl[1];
                                                        }
                                                        echo $url;
                                                    @endphp
                                                " class="bds-type-filter" data-value=" ">Nguồn marketing</a>
                                            </li>
                                        @endif
                                    </ul>
                                    </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="hdr-flt__itm">
                    <div class="c-hflt-slt">
                        <a href="" class="c-hflt-slt__tgl btn">
                            @php
                                if(stripos(url()->full(), 'danh-muc') !== false) {
                                        if(stripos(url()->full(), 'bat-dong-san-kinh-doanh') !== false) {
                                            echo 'Bất động sản kinh doanh';
                                        } else if(stripos(url()->full(), 'nha-o-nha-rieng-nha-nguyen-can') !== false) {
                                            echo 'Nhà ở, nhà riêng, nguyên căn';
                                        } else if(stripos(url()->full(), 'can-ho') !== false) {
                                            echo 'Căn hộ';
                                        } else if(stripos(url()->full(), 'dat-nen-dat-ray-vuon') !== false) {
                                            echo 'Đất nền, đất rẫy, vườn';
                                        } else {
                                            foreach($controller::getSubCategory() as $i) {
                                                if(stripos(url()->full(), $i['slug']) !== false) {
                                                    echo $i['name'];
                                                }
                                            }
                                        }
                                } else {
                                    echo 'Bất động sản';
                                }
                            @endphp
                              <i class="fas fa-chevron-down" style="padding:5px;margin-right: -20px;color: #636363;"></i>
               
                        </a>
                        <div class="c-hflt-slt__drd">
                            <div class="hflt-drd">
                                <div class="hflt-drd__bgc"></div>
                                <div class="hflt-drd__wrp">
                                    <button class="hflt-drd__cls btn btn--icon">
                                        <i class="mdi mdi-close"></i>
                                    </button>
                                    <div class="hflt-drd__hdr">
                                        <h6 class="hflt-drd__tle"> Chọn loại BĐS
                                        </h6>
                                    </div>
                                    <ul class="hflt-drd__slt">
                                        <li class="{{ (stripos(url()->full(), 'danh-muc-')) ? '' : 'active' }}">
                                            <a class="bds-type-filter" onclick="filterAction('clear', 'danh-muc')" data-value="">
                                                Bất động sản
                                            </a>
                                        </li>
                                        <li class="{{ (stripos(url()->full(), 'danh-muc-bat-dong-san-kinh-doanh')) ? 'active' : '' }}">
                                            <a style="cursor: pointer;" onclick="filterAction('danh-muc-bat-dong-san-kinh-doanh', 'danh-muc')"
                                                class="bds-type-filter"
                                                data-value="">Bất động sản Kinh
                                                doanh</a>
                                            <ul>
                                                @foreach($controller::getSubCategory(7009) as $item)
                                                    <li class="{{ (stripos(url()->full(), $item['slug'])) ? 'active' : '' }}">
                                                        <a style="cursor: pointer;" onclick="filterAction('danh-muc-{{ $item['slug'] }}', 'danh-muc')" 
                                                            class="bds-type-filter"
                                                            data-value="">{{ $item['name'] }}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                        <li class="{{ (stripos(url()->full(), 'danh-muc-nha-o-nha-rieng-nha-nguyen-can')) ? 'active' : '' }}">
                                            <a style="cursor: pointer;" onclick="filterAction('danh-muc-nha-o-nha-rieng-nha-nguyen-can', 'danh-muc')" class="bds-type-filter" data-value="">Nhà ở, nhà
                                                riêng,nguyên căn</a>
                                            <ul>
                                                @foreach($controller::getSubCategory(7007) as $item)
                                                    <li class="{{ (stripos(url()->full(), $item['slug'])) ? 'active' : '' }}">
                                                        <a style="cursor: pointer;" onclick="filterAction('danh-muc-{{ $item['slug'] }}', 'danh-muc')" class="bds-type-filter"
                                                            data-value="">{{ $item['name'] }}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                        <li class="{{ (stripos(url()->full(), 'danh-muc-can-ho-end')) ? 'active' : '' }}">
                                            <a style="cursor: pointer;" onclick="filterAction('danh-muc-can-ho', 'danh-muc')" class="bds-type-filter" data-value="">Căn
                                                hộ</a>
                                            <ul>
                                                @foreach($controller::getSubCategory(7006) as $item)
                                                    <li class="{{ (stripos(url()->full(), $item['slug'])) ? 'active' : '' }}">
                                                        <a style="cursor: pointer;" onclick="filterAction('danh-muc-{{ $item['slug'] }}', 'danh-muc')" class="bds-type-filter"
                                                            data-value="">{{ $item['name'] }}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </li>

                                        <li class="{{ (stripos(url()->full(), 'danh-muc-dat-nen-dat-ray-vuon')) ? 'active' : '' }}">
                                            <a style="cursor: pointer;" onclick="filterAction('danh-muc-dat-nen-dat-ray-vuon', 'danh-muc')" class="bds-type-filter" data-value="">Đất
                                                nền,đất rẫy ,vườn</a>
                                            <ul>
                                                @foreach($controller::getSubCategory(7008) as $item)
                                                    <li class="{{ (stripos(url()->full(), $item['slug'])) ? 'active' : '' }}">
                                                        <a style="cursor: pointer;" onclick="filterAction('danh-muc-{{ $item['slug'] }}', 'danh-muc')" class="bds-type-filter"
                                                            data-value="danh-muc-{{ $item['slug'] }}">{{ $item['name'] }}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </li>


                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="hdr-flt__itm">
                    <div class="c-hflt-slt">
                        <a href="#" class="c-hflt-slt__tgl btn"> Khoảng giá
                             <i class="fas fa-chevron-down" style="padding:5px;margin-right: -20px;color: #636363;"></i>
               
                        </a>
                        <div class="c-hflt-slt__drd">
                            <div class="hflt-drd">
                                <div class="hflt-drd__bgc"></div>
                                <div class="hflt-drd__wrp">
                                    <button class="hflt-drd__cls btn btn--icon">
                                        <i class="mdi mdi-close"></i>
                                    </button>
                                    <div class="hflt-drd__hdr">
                                        <h6 class="hflt-drd__tle">Chọn khoảng giá</h6>
                                    </div>
                                    <ul class="hflt-drd__slt">
                                        <form action="{{ route('method.filterAction', 'price') }}" method="post">
                                            @csrf
                                            <input type="hidden" value="{{ url()->full() }}" name="url">
                                            <li class="active">
                                                <a href="#" class="price-filter" data-value="">Giá thuê</a>
                                            </li>
                                            <li>

                                                <input type="text" name="minimum" id="" value="@php
                                                    if (stripos(url()->full(), 'khoang-gia-') !== false) {
                                                        $explodeUrl = explode('khoang-gia-', url()->full());
                                                        $explodeUrl = explode('-', $explodeUrl[1]);
                                                        echo $explodeUrl[0];
                                                    }
                                                @endphp" placeholder="Giá tối thiểu" oninput="formatNumber(this)">
                                            </li>
                                            <li>
                                                <input type="text" name="maximum" value="@php
                                                    if (stripos(url()->full(), 'khoang-gia-') !== false) {
                                                        $explodeUrl = explode('khoang-gia-', url()->full());
                                                        $explodeUrl = explode('-', $explodeUrl[1]);
                                                        echo $explodeUrl[1];
                                                    }
                                                @endphp" id=""placeholder="Giá tối đa" oninput="formatNumber(this)">
                                            </li>
                                            <li class="button-container">
                                                @if (stripos(url()->full(), 'khoang-gia-') !== false)
                                                    <button class="btn btn-danger" type="submit" name="clear" value="0">Xóa</button>
                                                @endif
                                                <button class="btn btn-primary" type="submit" id="" name="fill">Lọc</button>
                                            </li>
                                        </form>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="hdr-flt__itm">
                    <div class="c-hflt-slt">
                        <a href="#" class="c-hflt-slt__tgl btn"> Bề ngang nhà
                             <i class="fas fa-chevron-down" style="padding:5px;margin-right: -20px;color: #636363;"></i>
               
                        </a>
                        <div class="c-hflt-slt__drd">
                            <div class="hflt-drd">
                                <div class="hflt-drd__bgc"></div>
                                <div class="hflt-drd__wrp">
                                    <button class="hflt-drd__cls btn btn--icon">
                                        <i class="mdi mdi-close"></i>
                                    </button>
                                    <div class="hflt-drd__hdr">
                                        <h6 class="hflt-drd__tle">Chọn diện tích</h6>
                                    </div>
                                    <form action="{{ route('method.filterAction', 'width') }}" method="post">
                                        @csrf
                                        <input type="hidden" value="{{ url()->full() }}" name="url">
                                        <ul class="hflt-drd__slt">
                                            <li class="active">
                                                <a href="#" class="size-filter" data-value=""> Bề ngang </a>
                                            </li>
                                            <li>
                                                <input type="text" name="minimum" id=""
                                                    placeholder="Ngang tối thiểu" value="@php
                                                        if (stripos(url()->full(), 'be-ngang-') !== false) {
                                                            $explodeUrl = explode('be-ngang-', url()->full());
                                                            $explodeUrl = explode('-', $explodeUrl[1]);
                                                            echo $explodeUrl[0];
                                                        }
                                                    @endphp">
                                            </li>
                                            <li>
                                                <input type="text" name="maximum" id=""
                                                    placeholder="Ngang tối đa" value="@php
                                                        if (stripos(url()->full(), 'be-ngang-') !== false) {
                                                            $explodeUrl = explode('be-ngang-', url()->full());
                                                            $explodeUrl = explode('-', $explodeUrl[1]);
                                                            echo $explodeUrl[1];
                                                        }
                                                    @endphp">
                                            </li>
                                            <li>
                                                @if (stripos(url()->full(), 'be-ngang-') !== false)
                                                    <button class="btn btn-danger" type="submit" name="clear" value="0">Xóa</button>
                                                @endif
                                                <button class="btn btn-primary" type="submit" name="fill">Lọc</button>
                                            </li>

                                        </ul>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tcc hdr-flt__itm">
                    <div class="c-hflt-slt">
                        <a href="#" class="c-hflt-slt__tgl btn">
                            
                            Số phòng ngủ   <i class="fas fa-chevron-down" style="padding:5px;margin-right: -20px;color: #636363;"></i>
               </a>
                        <div class="c-hflt-slt__drd">
                            <div class="hflt-drd">
                                <div class="hflt-drd__bgc"></div>
                                <div class="hflt-drd__wrp">
                                    <button class="hflt-drd__cls btn btn--icon">
                                        <i class="mdi mdi-close"></i>
                                    </button>

                                    <form action="{{ route('method.filterAction', 'bedroom') }}" method="post">
                                        @csrf
                                        <input type="hidden" value="{{ url()->full() }}" name="url">
                                        <ul class="hflt-drd__slt">
                                            <li class="active">
                                                <a href="#" class="size-filter" data-value=""> Chọn số PN </a>
                                            </li>
                                            <li>
                                                <input type="text" name="minimum" id=""
                                                    placeholder="Số PN tối thiểu" value="@php
                                                        if (stripos(url()->full(), 'phong-ngu-') !== false) {
                                                            $explodeUrl = explode('phong-ngu-', url()->full());
                                                            $explodeUrl = explode('-', $explodeUrl[1]);
                                                            echo $explodeUrl[0];
                                                        }
                                                    @endphp">
                                            </li>
                                            <li>
                                                <input type="text" name="maximum" value="@php
                                                    if (stripos(url()->full(), 'phong-ngu-') !== false) {
                                                        $explodeUrl = explode('phong-ngu-', url()->full());
                                                        $explodeUrl = explode('-', $explodeUrl[1]);
                                                        echo $explodeUrl[1];
                                                    }
                                                @endphp" id=""
                                                    placeholder="Số PN tối đa">
                                            </li>
                                            <li>
                                                @if (stripos(url()->full(), 'phong-ngu-') !== false)
                                                    <button class="btn btn-danger" type="submit" name="clear" value="0">Xóa</button>
                                                @endif

                                                <button class="btn btn-primary" type="submit" name="fill">Lọc</button>
                                            </li>

                                        </ul>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="tcc hdr-flt__itm">
                    <div class="c-hflt-slt">
                        <a href="#" class="c-hflt-slt__tgl btn"> Số tầng 
                              <i class="fas fa-chevron-down" style="padding:5px;margin-right: -20px;color: #636363;"></i>
               </a>
                        <div class="c-hflt-slt__drd">
                            <div class="hflt-drd">
                                <div class="hflt-drd__bgc"></div>
                                <div class="hflt-drd__wrp">
                                    <button class="hflt-drd__cls btn btn--icon">
                                        <i class="mdi mdi-close"></i>
                                    </button>
                                    <div class="hflt-drd__hdr">
                                        <h6 class="hflt-drd__tle">Chọn số tầng</h6>
                                    </div>
                                    <form action="{{ route('method.filterAction', 'floors') }}" method="post">
                                        @csrf
                                        <input type="hidden" value="{{ url()->full() }}" name="url">
                                        <ul class="hflt-drd__slt">
                                            <li class="active">
                                                <a href="#" class="size-filter" data-value=""> Số tầng </a>
                                            </li>
                                            <li>
                                                <input type="text" name="minimum" id=""
                                                    placeholder="Số tầng tối thiểu" value="@php
                                                        if (stripos(url()->full(), 'so-tang-') !== false) {
                                                            $explodeUrl = explode('so-tang-', url()->full());
                                                            $explodeUrl = explode('-', $explodeUrl[1]);
                                                            echo $explodeUrl[0];
                                                        }
                                                    @endphp">
                                            </li>
                                            <li>
                                                <input type="text" name="maximum" id=""
                                                    placeholder="Số tầng tối đa" value="@php
                                                        if (stripos(url()->full(), 'so-tang-') !== false) {
                                                            $explodeUrl = explode('so-tang-', url()->full());
                                                            $explodeUrl = explode('-', $explodeUrl[1]);
                                                            echo $explodeUrl[1];
                                                        }
                                                    @endphp">
                                            </li>
                                            <li>
                                                @if (stripos(url()->full(), 'so-tang-') !== false)
                                                    <button class="btn btn-danger" type="submit" name="clear" value="0">Xóa</button>
                                                @endif

                                                <button class="btn btn-primary" type="submit" name="fill">Lọc</button>
                                            </li>

                                        </ul>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tcc hdr-flt__itm">
                    <div class="c-hflt-slt">
                        <a href="#" class="c-hflt-slt__tgl btn">Lọc thêm 
                            <i class="fas fa-chevron-down" style="padding:5px;margin-right: -20px;color: #636363;"></i>
               
                        </a>
                        <div class="c-hflt-slt__drd">
                            <div class="hflt-drd">
                                <div class="hflt-drd__bgc"></div>
                                <div class="hflt-drd__wrp">
                                    <button class="hflt-drd__cls btn btn--icon">
                                        <i class="mdi mdi-close"></i>
                                    </button>
                                    <div class="hflt-drd__hdr">
                                        <h6 class="hflt-drd__tle">Lọc thêm</h6>
                                    </div>
                                    <form id="form-other" action="{{ route('method.filterAction', 'others') }}" method="post">
                                        <div class="hflt-drd__frm hfrm-oth">
                                                @csrf
                                                <input type="hidden" value="{{ url()->full() }}" name="url">
                                                @php
                                                    $direction = [
                                                        '1' => 'Đông',
                                                        '2' => 'Tây',
                                                        '3' => 'Nam',
                                                        '4' => 'Bắc',
                                                        '5' => 'Đông Bắc',
                                                        '6' => 'Đông Nam',
                                                        '7' => 'Tây Bắc',
                                                        '8' => 'Tây Nam',
                                                    ];
                                                    $utilities = [
                                                        '1' => 'Căn góc',
                                                        '2' => 'Gần ngã 3,4',
                                                        '3' => 'Sân vườn',
                                                        '4' => 'Hầm',
                                                        '5' => 'Thang máy',
                                                        '6' => 'Trống suốt',
                                                    ];
                                                    $AlleyWidth = [
                                                        '1-3' => '1m - 3m',
                                                        '3-5' => '3m - 5m',
                                                        '5-10' => '5m - 10m',
                                                        '10-0' => 'Trên 10m',
                                                    ];
                                                    if(isset($_GET['direction'])) {
                                                        echo '<input type="hidden" value="'.$_GET['direction'].'" name="directionOld">';
                                                    }
                                                    if(isset($_GET['utilities'])) {
                                                        echo '<input type="hidden" value="'.$_GET['utilities'].'" name="utilitiesOld">';
                                                    }
                                                    if(isset($_GET['AlleyWidth'])) {
                                                        echo '<input type="hidden" value="'.$_GET['AlleyWidth'].'" name="AlleyWidthOld">';
                                                    }
                                                @endphp
                                                @if(isset($_GET['direction'] ) || isset($_GET['utilities']) || isset($_GET['AlleyWidth']))
                                                    <button type="submit" name="clear" value="0" class="btn btn-danger text-center btn-lg d-flex" id="btn-search-other">
                                                        <i class="mdi mdi-magnify mdi-f-white"></i>
                                                        <span>Hủy lọc</span>
                                                    </button>
                                                @endif
                                                <div class="form-group-rows">
                                                    <div class="form-group">
                                                        <label class="form-lbl">Hướng nhà, đất</label>
                                                        <div class="form-opts">
                                                            @php
                                                                $directionOld = isset($_GET['direction']) ? explode('-', $_GET['direction']) : [];
                                                                foreach($direction as $key => $value) {
                                                                    if(in_array($key, $directionOld)) {
                                                                        echo '
                                                                            <label class="form-opt-btn">
                                                                                <input type="checkbox" value="'.$key.'" name="direction[]" checked>
                                                                                <span>'.$value.'</span>
                                                                            </label>
                                                                        ';
                                                                    } else {
                                                                        echo '
                                                                            <label class="form-opt-btn">
                                                                                <input type="checkbox" value="'.$key.'" name="direction[]">
                                                                                <span>'.$value.'</span>
                                                                            </label>
                                                                        ';
                                                                    }
                                                                }
                                                            @endphp
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="form-lbl">Độ rộng đường vào</label>
                                                        <div class="form-opts">
                                                            @php
                                                                $AlleyWidthOld = isset($_GET['AlleyWidth']) ? explode(',', $_GET['AlleyWidth']) : [];
                                                                foreach($AlleyWidth as $key => $value) {
                                                                    if(in_array($key, $AlleyWidthOld)) {
                                                                        echo '
                                                                            <label class="form-opt-btn">
                                                                                <input type="radio" value="'.$key.'" name="AlleyWidth" checked>
                                                                                <span>'.$value.'</span>
                                                                            </label>
                                                                        ';
                                                                    } else {
                                                                        echo '
                                                                            <label class="form-opt-btn">
                                                                                <input type="radio" value="'.$key.'" name="AlleyWidth">
                                                                                <span>'.$value.'</span>
                                                                            </label>
                                                                        ';
                                                                    }
                                                                }
                                                            @endphp
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-lbl">Tiện ích</label>
                                                        <div class="form-opts">
                                                            @php
                                                                $utilitiesOld = isset($_GET['utilities']) ? explode('-', $_GET['utilities']) : [];
                                                                foreach($utilities as $key => $value) {
                                                                    if(in_array($key, $utilitiesOld)) {
                                                                        echo '
                                                                            <label class="form-opt-btn">
                                                                                <input type="checkbox" value="'.$key.'" name="utilities[]" checked>
                                                                                <span>'.$value.'</span>
                                                                            </label>
                                                                        ';
                                                                    } else {
                                                                        echo '
                                                                            <label class="form-opt-btn">
                                                                                <input type="checkbox" value="'.$key.'" name="utilities[]">
                                                                                <span>'.$value.'</span>
                                                                            </label>
                                                                        ';
                                                                    }
                                                                }
                                                            @endphp
                                                        </div>
                                                    </div>
                                                </div>

                                            <div class="form-group-submit">
                                                <button type="submit" class="btn btn--guland btn-lg d-flex" id="btn-search-other">
                                                    <i class="mdi mdi-magnify mdi-f-white"></i>
                                                    <span>Tìm kiếm</span>
                                                </button>
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
@endsection
@extends('Systems.base')
@section('content')

    <div class="sdb-content-picker">
        <div class="container center-content ">
            <div class="row">
                <div class="col-12  ">
                    <div class="p-lst-n">
                        <div class="p-lst-n__hdr">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a  href="{{ route('cho-thue-bat-dong-san') }}">Cho thuê</a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a href="">TP. Hồ Chí Minh</a>
                                    </li>
                                    @if(session('fill_district_id'))
                                        <li class="breadcrumb-item">
                                            <a  href="">{{ $controller::convertAddressFromIDToName(session('fill_district_id'), '\App\Models\districtapi', 'DistrictID') }}</a>
                                        </li>
                                    @endif
                                    @if(session('fill_ward_id'))
                                        <li class="breadcrumb-item">
                                            <a  href="">{{ $controller::convertAddressFromIDToName(session('fill_ward_id'), '\App\Models\wardapi', 'WardID') }}</a>
                                        </li>
                                    @endif
                                    @if(session('fill_street_id'))
                                        <li class="breadcrumb-item">
                                            <a href="">{{ $controller::convertAddressFromIDToName(session('fill_street_id'), '\App\Models\streetapi', 'StreetID') }}</a>
                                        </li>
                                    @endif
                                </ol>
                            </nav>
                            <h1 class="p-lst-n__tle">{{ $title }}</h1>
                            <div class="p-lst-n__cat">
                                <div class="cat-list-wrap cat-list-wrap--main">
                                    @php
                                        $url = url()->full();
                                    @endphp
                                    @if(stripos($url, 'danh-muc-') !== false)
                                        @if(stripos($url, 'bat-dong-san-kinh-doanh') !== false
                                        || stripos($url, 'nha-o-nha-rieng-nha-nguyen-can') !== false
                                        || stripos($url, 'can-ho-end') !== false
                                        || stripos($url, 'dat-nen-dat-ray-vuon') !== false)
                                            <ul class="cat-list-wrap__main">
                                                @php
                                                    $danhmuc = strstr($url, 'danh-muc-');
                                                    $danhmuc = strstr($danhmuc, '-end', true);
                                                    $danhmuc = str_replace(['danh-muc-', '-end'], '', $danhmuc);
                                                @endphp
                                                @foreach($controller::getSubCategoryBySlug($danhmuc) as $item)
                                                    <li class="">
                                                        <a style="cursor: pointer;" onclick="filterAction('danh-muc-{{ $item['slug'] }}', 'danh-muc')" class="bds-type-filter"
                                                            data-value="">{{ $item['name'] }}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    @else
                                        <ul class="cat-list-wrap__main">
                                            <li>
                                                <a style="cursor: pointer;" onclick="filterAction('danh-muc-bat-dong-san-kinh-doanh', 'danh-muc')" class="bds-type-filter"
                                                    data-value="bat-dong-san-kinh-doanh">
                                                    <span>Mặt bằng Kinh doanh</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a style="cursor: pointer;" onclick="filterAction('danh-muc-nha-o-nha-rieng-nha-nguyen-can', 'danh-muc')" lass="bds-type-filter" data-value="nha-o">
                                                    <span>Nhà Nguyên căn</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a style="cursor: pointer;" onclick="filterAction('danh-muc-can-ho', 'danh-muc')" lass="bds-type-filter" data-value="can-ho">
                                                    <span>Căn hộ/chung cư</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a style="cursor: pointer;" onclick="filterAction('danh-muc-nha-phong-tro', 'danh-muc')" lass="bds-type-filter" data-value="can-tro">
                                                    <span>Nhà trọ/ở</span>
                                                </a>
                                            </li>

                                            <li>
                                                <a style="cursor: pointer;" onclick="filterAction('danh-muc-dat-nen-dat-ray-vuon', 'danh-muc')" lass="bds-type-filter"
                                                    data-value="dat-nen-ray-vuon">
                                                    <span>Đất </span>
                                                </a>
                                            </li>
                                        </ul>
                                    @endif
                                </div>
                            </div>
                            @if($type_collection == 'posted')
                                @if(Auth::check())
                                    @if($controller::checkRole($controller::getRole()->MainRole) >= 6 || $controller::getRole(intval($id))->UpperID == Auth::user()->id || $id == Auth::user()->id)
                                        <div class="p-lst-n__pil  ">
                                            <div class="tag-list-wrap">
                                                <ul class="tag-list-wrap__ul ">
                                                    <li>
                                                        <a href=" 
                                                        @php
                                                            $url = url()->full();
                                                            if(stripos($url, 'status') !== false) {
                                                                $url = str_replace('status='.$status, 'status=1', $url);
                                                            } else {
                                                                if(stripos($url, '?') !== false) {
                                                                    $url = $url.'&status='.$status;
                                                                } else {
                                                                    $url = $url.'?status=1';
                                                                }
                                                            }
                                                            
                                                            echo $url;
                                                        @endphp
                                                    " class="btn-filter-status {{ ($status != 0 && $status == 1 || $status == 0) ? 'active' : '' }}" data-value="1">Công khai {!! ($public != null) ? '<sup>'. $public .'</sup>' : '' !!}</a></li>
                                                    <li>
                                                        <a href="
                                                        @php
                                                            $url = url()->full();
        
                                                            if(stripos($url, 'status') !== false) {
                                                                $url = str_replace('status='.$status, 'status=6', $url);
                                                            } else {
                                                                if(stripos($url, '?') !== false) {
                                                                    $url = $url.'&status='.$status;
                                                                } else {
                                                                    $url = $url.'?status=6';
                                                                }
                                                            }
                                                            
                                                            echo $url;
                                                        @endphp    
                                                    " class="btn-filter-status {{ ($status != 0 && $status == 6) ? 'active' : '' }}" data-value="6"> Hết hạn{!! ($expired != null) ? '<sup>'. $expired .'</sup>' : '' !!}</a></li>
                                                    <li><a href="
                                                        @php
                                                            $url = url()->full();
        
                                                            if(stripos($url, 'status') !== false) {
                                                                $url = str_replace('status='.$status, 'status=5', $url);
                                                            } else {
                                                                if(stripos($url, '?') !== false) {
                                                                    $url = $url.'&status='.$status;
                                                                } else {
                                                                    $url = $url.'?status=5';
                                                                }
                                                            }
                                                            
                                                            echo $url;
                                                        @endphp    
                                                    " class="btn-filter-status {{ ($status != 0 && $status == 5) ? 'active' : '' }}" data-value="5">Đã thuê {!! ($sold != null) ? '<sup>'. $sold .'</sup>' : '' !!}</a></li>
                                                    <li><a href="
                                                        @php
                                                            $url = url()->full();
        
                                                            if(stripos($url, 'status') !== false) {
                                                                $url = str_replace('status='.$status, 'status=8', $url);
                                                            } else {
                                                                if(stripos($url, '?') !== false) {
                                                                    $url = $url.'&status='.$status;
                                                                } else {
                                                                    $url = $url.'?status=8';
                                                                }
                                                            }
                                                            
                                                            echo $url;
                                                        @endphp    
                                                    " class="btn-filter-status {{ ($status != 0 && $status == 8) ? 'active' : '' }}" data-value="8">Vị trí đẹp{!! ($vi_tri_dep != null) ? '<sup>'. $vi_tri_dep .'</sup>' : '' !!}</a>
                                                    </li>
                                                    <li><a href="
                                                        @php
                                                            $url = url()->full();
        
                                                            if(stripos($url, 'status') !== false) {
                                                                $url = str_replace('status='.$status, 'status=9', $url);
                                                            } else {
                                                                if(stripos($url, '?') !== false) {
                                                                    $url = $url.'&status='.$status;
                                                                } else {
                                                                    $url = $url.'?status=9';
                                                                }
                                                            }
                                                            
                                                            echo $url;
                                                        @endphp    
                                                    " class="btn-filter-status {{ ($status != 0 && $status == 9) ? 'active' : '' }}" data-value="9">Sắp trả{!! ($return != null) ? '<sup>'. $return .'</sup>' : '' !!}</a></li>
                                                    <li><a href="
                                                        @php
                                                            $url = url()->full();
        
                                                            if(stripos($url, 'status') !== false) {
                                                                $url = str_replace('status='.$status, 'status=10', $url);
                                                            } else {
                                                                if(stripos($url, '?') !== false) {
                                                                    $url = $url.'&status='.$status;
                                                                } else {
                                                                    $url = $url.'?status=10';
                                                                }
                                                            }
                                                            
                                                            echo $url;
                                                        @endphp    
                                                    " class="btn-filter-status {{ ($status != 0 && $status == 10) ? 'active' : '' }}" data-value="2">Chăm chủ{!! ($chamchu != null) ? '<sup>'. $chamchu .'</sup>' : '' !!}</a></li>
                                                    <li><a href="
                                                        @php
                                                            $url = url()->full();
        
                                                            if(stripos($url, 'status') !== false) {
                                                                $url = str_replace('status='.$status, 'status=2', $url);
                                                            } else {
                                                                if(stripos($url, '?') !== false) {
                                                                    $url = $url.'&status='.$status;
                                                                } else {
                                                                    $url = $url.'?status=2';
                                                                }
                                                            }
                                                            
                                                            echo $url;
                                                        @endphp    
                                                    " class="btn-filter-status {{ ($status != 0 && $status == 2) ? 'active' : '' }}" data-value="2">Đã ẩn{!! ($private != null) ? '<sup>'. $private .'</sup>' : '' !!}</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    @endif
                                @endif
                            @endif

                            <div class="p-lst-n__itr">
                                <div class="p-lst-n__stl">Có <b id="total">{{ $countProduct }}</b> bất động sản.</div>
                                <div class="p-lst-n__atn">
                                    <div class="dropdown dropdown--sort">
                                        <button class="btn dropdown-toggle" data-toggle="dropdown">
                                            <span>Tin mới</span>
                                            <i class="mdi mdi-chevron-down"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <ul>
                                                <li class="active"><a href="#" class="sort-link"
                                                        data-value="">Tin mới</a></li>
                                                <li>
                                                    <a href="#" class="sort-link" data-value="price_per_m-asc">Giá
                                                        /m2 thấp</a>
                                                </li>

                                                <li>
                                                    <a href="#" class="sort-link" data-value="size-desc">Diện tích lớn</a>
                                                </li>
                                                <li>
                                                    <a href="#" class="sort-link" data-value="comment-desc">Quan tâm nhiều</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>  <div class="bds_chothue ">
                <div class="bds-list">
                    <div class="bds-list__cards" id="listing">
                        @foreach ($products as $product)
                                  <div class="bds-list__single">
                                    <div class="bds-card">
                                        <div class="bds-card__wrap">
                                            <div class="bds-card__img">
                                                @if (Auth::check())
                                                    @if ($product->UserID == Auth::user()->id || $product->UpperID == Auth::user()->id || $controller::checkRole($controller::getRole()->MainRole) >= 6)
                                                        {{-- <div class="bds-card__btn-group p-top-lft">
                                                            <div class="form-group">
                                                                <select class="form-control change-personal-status" data-status="1" data-id="{{ $product['ProductID'] }}">
                                                                    <option value="" selected="">- Tình trạng - </option>
                                                                    <option selected="" value="1">Bán công khai </option>
                                                                    <option value="3">Tin hết hạn</option>
                                                                    <option value="-1">Lưu cá nhân</option>
                                                                    <option value="0">Chờ duyệt</option>
                                                                    <option value="2">Ngừng bán</option>
                                                                    <option value="5">Đã bán</option>
                                                                    <option value="-2">Đã ẩn</option>
                                                                    <option value="9">Bị báo cáo</option>
                                                                </select>
                                                            </div>
                                                        </div> --}}
                                                    @endif
                                                @endif
                                            <div class="image_product">
                                                <a href="{{ route('post-detail', $product['slug']) }}" class="bds-image-wrap ">
                                                    <div class="bds-image-wrap__img">
                                                        <img class="lazy" loading="lazy" src="{{ asset('Assets/Images/Products/' . $product->avatar) }}" alt="{{ $product->title }}">
                                                    </div>
                                                </a>
                                            </div>
                                                @if (Auth::check()) 
                                                @if ($product->UserID == Auth::user()->id || $product->UpperID == Auth::user()->id || $controller::checkRole($controller::getRole()->MainRole) >= 6)
                                                        
                                                            @if ($product->PostingStatus == 'public')
                                                            <div class="bds-card__stt bds-show">Đang hiển thị</div>
                                                            @elseif($product->PostingStatus == 'private')
                                                            <div class="bds-card__stt stt-hide">Đang ẩn</div>
                                                            @elseif($product->PostingStatus == 'deleted')
                                                            <div class="bds-card__stt stt-delete">Đã xóa</div>
                                                            @elseif($product->PostingStatus == 'reported')
                                                            <div class="bds-card__stt stt-report">Bị báo cáo</div>
                                                            @elseif($product->PostingStatus == 'sold' && $product->status_vitridep == 0)
                                                                @if($product->TypeProduct == 'Cho Thuê')
                                                                    <div class="bds-card__stt stt-sold">Đã cho thuê</div>
                                                                @else
                                                                    <div class="bds-card__stt stt-sold">Đã bán</div>
                                                                @endif
                                                            @elseif($product->PostingStatus == 'expired')
                                                            <div class="bds-card__stt stt-expired">Hết hạn</div>
                                                            @elseif($product->PostingStatus == 'stop')
                                                            <div class="bds-card__stt stt-stop">Ngừng bán</div>
                                                            @elseif($product->status_vitridep == 1)
                                                                @if($product->PostingStatus == 'return')
                                                                    <div class="bds-card__stt stt-nice">Vị trí đẹp, Sắp trả</div>
                                                                @else 
                                                                    <div class="bds-card__stt stt-nice">Vị trí đẹp</div>
                                                                @endif
                                                            @elseif($product->PostingStatus == 'return')
                                                                @if($product->status_vitridep == 1)
                                                                    <div class="bds-card__stt stt-nice">Sắp trả, Vị trí đẹp</div>
                                                                @else
                                                                    <div class="bds-card__stt stt-nice">Sắp trả</div>
                                                                @endif
                                                            @endif
                                                    @endif
                                                @endif
                                                <div class="bds-card__save1 ">
                                                    <a href="#" class="btn btn-outline-dark px-2 btn-save" data-id="697497">
                                                        <i class="fas fa-heart-square"></i>
                                                         <span> Lưu tin</span>
                                                    </a>
                                                </div>
                                                <div class="bds-card__btn-group p-btm-lft" data-id="{{ $product->slug }}" style="cursor: pointer;">
                                                    <a href=" " class="btn btn-outline-dark btn-call  " data-phone="0327485737" data-id="697497" data-toggle="modal" style="background-color:#65c0f1">
                                                        <i class="fas fa-phone-square-alt"></i>
                                                        <span>Liên hệ</span>
                                                    </a>
                                                </div>


                                                @if (Auth::check())
                                                    @if ($product->UserID == Auth::user()->id || $product->UpperID == Auth::user()->id || $controller::checkRole($controller::getRole()->MainRole) >= 6)
                                                        <div class="bds-card__btn-group p-btm-rgt">
                                                            <a target="_blank" href="https://maps.google.com/?q={{ $product->addressnumber . ' ' . $controller::convertAddressFromIDToName($product->StreetID, '\App\Models\streetapi', 'StreetID') . ', ' . $controller::convertAddressFromIDToName($product->WardID, '\App\Models\wardapi', 'WardID') . ', ' . $controller::convertAddressFromIDToName($product->DistrictID, '\App\Models\districtapi', 'DistrictID') . ', ' . 'TP. Hồ Chí Minh' }}"
                                                                class="btn btn-outline-dark">
                                                                <i class="fas fa-map-marker-alt"></i>
                                                                <span>Vị trí</span>
                                                            </a>
                                                        </div>
                                                    @endif
                                                @endif
                                            </div>
                                            <div class="bds-card__cnt">
                                                <div class="bds-card__tle">
                                                    <span class="vrf-bdg">VIP</span>
                                                    <a href="{{ route('post-detail', $product->slug) }}">{{ $product->title }}</a>
                                                </div>
                                                <div class="bds-card__inf">
                                                    <div class="bds-inf-row">
                                                        <span class="bds-inf-data data-color-1 data-size-xl"><b>{{ $controller::convertPriceText($product->price) }}
                                                     / tháng</b></span>
                                                        <span class="bds-inf-data data-size-lg"><b>Ngang :</b></span>
                                                        <span
                                                            class="bds-inf-data data-size-lg"><b>{{ $product->AreaWidth }}m</b></span>
                                                        <span class="bds-inf-data data-size-lg"><b>Dài:</b></span>
                                                        <span
                                                            class="bds-inf-data data-size-lg"><b>{{ $product->AreaHeight }}m</b></span>
                                                    </div>
                                                </div>
                                            <div class="bds_location  ">
                                                <div class="bds-inf-row">
                                                    <span class="bds-inf-data data-size-sm">Mã tin:
                                                        <b>{{ $product->postCode }}</b></span>
                                                    <span class="bds-inf-data data-size-sm">{{ $controller::convertTimeVietNam($product->updated_at) }}</span>
                                                    @if(Auth::check())
                                                        @if($controller::checkRole($controller::getRole()->MainRole) < 2)
                                                            <span class="bds-inf-data data-size-sm">
                                                                 <i class="mdi mdi-map-marker-outline"></i>
                                                                {{ $controller::convertAddressFromIDToName($product['DistrictID'], '\App\Models\districtapi', 'DistrictID') }}
                                                            </span>
                                                        @else
                                                        <span class="bds-inf-data data-size-sm"> 
                                                            <i class="fas fa-map-marker-alt"></i>    {{ $product['addressnumber'] . ' ' . $controller::convertAddressFromIDToName($product['StreetID'], '\App\Models\streetapi', 'StreetID') . ', ' . $controller::convertAddressFromIDToName($product['DistrictID'], '\App\Models\districtapi', 'DistrictID') }} 
                                                        </span>
                                                        @endif
                                                    @else
                                                        <span class="bds-inf-data data-size-sm"><i
                                                                class="mdi mdi-map-marker-outline"></i>
                                                            {{ $controller::convertAddressFromIDToName($product['DistrictID'], '\App\Models\districtapi', 'DistrictID') }}
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                                <div class=" bds-card__icn" style="margin-top:10px;">
                                                    <a href="cho-thue-{{ $product->subSlug }}">
                                                        <h4 class="bds-btm-tle clr-sell">Cho thuê {{ $product->subName }}
                                                        </h4>
                                                    </a>

                                                </div>
                                                @if (Auth::check())
                                                    @if ($product->UserID == Auth::user()->id || $product->UpperID == Auth::user()->id || $controller::checkRole($controller::getRole()->MainRole) >= 6)
                                                        <div class="bds-card__ctm">
                                                            <div class="bds-btn-user">
                                                                
                                                                @if($product->PostingStatus != 'sold' && $product->PostingStatus != 'location-nice')
                                                                    @if($product->PostingStatus == 'return')
                                                                        <a href="{{ route('process-status', ['id' => $product['ProductID'], 'status' => 5]) }}"
                                                                            class="btn btn-outline-dark btn-xs btn-up-vip-post"
                                                                            data-id="697497">
                                                                            <i class="fas fa-window-close"></i>
                                                                            Hủy trả
                                                                        </a>
                                                                        @if($product->status_vitridep == 0)
                                                                            <a href="{{ route('process-status', ['id' => $product['ProductID'], 'status' => 8]) }}"
                                                                                class="btn btn-outline-dark btn-xs btn-up-vip-post"
                                                                                data-id="697497"
                                                                                onclick="return confirm('Bạn có chắc chắn đã chọn vị trí đẹp chưa?')">
                                                                                <i class="far fa-location"></i>
                                                                                Vị trí đẹp
                                                                            </a>
                                                                        @else
                                                                            <a href="{{ route('process-status', ['id' => $product['ProductID'], 'status' => 10]) }}"
                                                                                class="btn btn-outline-dark btn-xs btn-up-vip-post"
                                                                                data-id="697497"
                                                                                onclick="return confirm('Bạn có chắc chắn đã hủy vị trí đẹp chưa?')">
                                                                                <i class="fas fa-location-slash"></i>
                                                                                Hủy vị trí đẹp
                                                                            </a>
                                                                        @endif
                                                                    @else
                                                                        <a href="{{ route('process-status', ['id' => $product['ProductID'], 'status' => 5]) }}"
                                                                            class="btn btn-outline-dark btn-xs btn-up-vip-post"
                                                                            data-id="697497"
                                                                            onclick="return confirm('Bạn có chắc chắn đã cho thuê chưa?')">
                                                                            <i class="fas fa-user-check"></i>
                                                                            Đã thuê
                                                                        </a>
                                                                    @endif

                                                                @else
                                                                    <a href="{{ route('process-status', ['id' => $product['ProductID'], 'status' => 9]) }}"
                                                                        class="btn btn-outline-dark btn-xs btn-up-vip-post"
                                                                        data-id="697497"
                                                                        onclick="return confirm('Bạn có chắc chắn đã sắp trả chưa?')">
                                                                        <i class="fas fa-money-check-edit-alt"></i>
                                                                        Sắp trả
                                                                    </a>
                                                                    @if($product->status_vitridep == 0)
                                                                        <a href="{{ route('process-status', ['id' => $product['ProductID'], 'status' => 8]) }}"
                                                                            class="btn btn-outline-dark btn-xs btn-up-vip-post"
                                                                            data-id="697497"
                                                                            onclick="return confirm('Bạn có chắc chắn đã chọn vị trí đẹp chưa?')">
                                                                            <i class="far fa-location"></i>
                                                                            Vị trí đẹp
                                                                        </a>
                                                                    @else
                                                                        <a href="{{ route('process-status', ['id' => $product['ProductID'], 'status' => 10]) }}"
                                                                            class="btn btn-outline-dark btn-xs btn-up-vip-post"
                                                                            data-id="697497"
                                                                            onclick="return confirm('Bạn có chắc chắn đã hủy vị trí đẹp chưa?')">
                                                                            <i class="fas fa-location-slash"></i>
                                                                            Hủy vị trí đẹp
                                                                        </a>
                                                                    @endif
                                                                    @if($product->updated_at->diffInDays() >= 60)
                                                                        <a onclick="return confirm('Bạn có chắc chắn đã gọi chăm chủ chưa?')" href="{{ route('process-status', ['id' => $product['ProductID'], 'status' => ($product['PostingStatus'] == 'sold' ? 5 : 8)]) }}"
                                                                            class="btn btn-outline-dark btn-xs bg-danger text-light btn-up-vip-post"
                                                                            data-id="697497">
                                                                            <i class="fas fa-mobile-android-alt"></i>
                                                                            Chăm chủ
                                                                        </a>
                                                                    @endif
                                                                @endif                                                                
                                                                
                                                                @if($controller::checkRole($controller::getRole()->MainRole) >= 6 || $controller::getRole($product['UserID'])->UpperID == Auth::user()->id || $product['UserID'] == Auth::user()->id)
                                                                    <a href="{{ route('chinh-sua-bai-viet', $product['ProductID']) }}" class="btn btn-outline-dark btn-xs"
                                                                        data-id="697497">
                                                                        <i class="fas fa-edit"></i>
                                                                        <span>Sửa</span>
                                                                    </a>
                                                                    @if($controller::checkRole($controller::getRole()->MainRole) >= 6)
                                                                        @if($controller::checkRole($controller::getRole()->MainRole) > 6)
                                                                            <a href="{{ route('method.delete-permanently', $product['ProductID']) }}" class="btn btn-outline-dark btn-xs"
                                                                                data-id="697497"
                                                                                onclick="return confirm('Bạn có chắc chắn muốn xóa vĩnh viễn không?')">
                                                                                <i class="far fa-window-close"></i>
                                                                                <span>Xóa vĩnh viễn</span>  
                                                                            </a>
                                                                        @endif
                                                                        @if($controller::checkRole($controller::getRole()->MainRole) >= 6)
                                                                            <a href="{{ route('method.marketing', ['id'=>$product['ProductID']]) }}" class="btn btn-outline-dark btn-xs"
                                                                                data-id="697497"
                                                                                onclick="return confirm('Bạn có chắc chắn muốn thêm {{ ($product['marketing']) ? 'Hủy nguồn marketing' : 'Thêm nguồn marketing' }} không?')">
                                                                                <i class="fas fa-megaphone me-1"></i>
                                                                                <span>{{ ($product['marketing']) ? 'Hủy nguồn marketing' : 'Thêm nguồn marketing' }}</span>  
                                                                            </a>
                                                                        @endif
                                                                    @endif
                                                                @endif
                                                                @if ($product->PostingStatus != 'public')
                                                                <a href="{{ route('process-status', ['id' => $product['ProductID'], 'status' => 1]) }}"
                                                                    class="btn btn-outline-dark btn-xs btn-up-vip-post"
                                                                    data-id="697497">
                                                                    <i class="fal fa-arrow-square-up"></i>
                                                                    Up tin
                                                                </a>
                                                            @else
                                                                <a href="{{ route('process-status', ['id' => $product['ProductID'], 'status' => 2]) }}"
                                                                    class="btn btn-outline-dark btn-xs btn-up-vip-post" data-id="697497">
                                                                    <i class="fas fa-eye"></i>
                                                                    Ẩn tin
                                                                </a>
                                                            @endif
                                                            </div>
                                                            @if($product->nhucau != '')
                                                                <form class="btn btn-xs btn-gray mt-3" method="POST" action="{{ route('kho-khach.find') }}">
                                                                    @csrf
                                                                    <input type="hidden" name="id" value="{{ $product['idNhuCau'] }}">
                                                                    <button type="submit">Có {{ $product['nhucau'] }} nhu cầu trong kho khách phù hợp</button>
                                                                </form>
                                                            @endif
                                                        </div>
                                                    @endif
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>  
                            
                        @endforeach
                    </div>
                    <div class="page mt-5">
                        @if($type_collection == 'posted')
                            {{ ($status != 10) ? $products->links('Frontend.Custom.paginate') : '' }}
                        @elseif($type_collection != 'search')
                            {{ $products->links('Frontend.Custom.paginate') }}
                        @endif
                        {{-- @if($type_collection == 'posted')
                            {{ ($status != 10) ? $products->links() : '' }}
                        @elseif($type_collection != 'search')
                            {{ $products->links() }}
                        @endif --}}
                    </div>
                </div>
            </div>

        </div>
    </div> 
    <div id="Modal-InfoToContact" class="modal fade modal-size-sm" tabindex="-1" style="padding-right: 17px; display: none; top: -2%;"  aria-modal="true" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <button type="button" class="close close-fix" data-dismiss="modal">
                    <i class="far fa-times"></i>
                </button>
                <div class="mdl-frm" id="modal-contact-content"  >
                    <div class="modal-content">
                        <div class="ftxt-cnt">
                            <h5>Người đăng tin</h5>
                            <p class="ftu-zl"></p>
                            <div class="zl-wrp">
                                <div class="zl-wrp__avt"
                                    style="background-image: url('https://cdn.guland.vn/users/image/16642692866332bbe62c654.JPG')">
                                    <div class="zl-wrp__rol rol--gl">Guland</div>
                                </div>
                                <div class="zl-wrp__cnt">
                                    <div class="zl-wrp__tle">Tan y</div>

                                    <div class="zl-wrp__num"><a href="tel:0345123856" data-phone="0345123856"
                                            class="btn-call-item" data-id="866582">0345123856
                                        </a>
                                    </div>
                                </div>
                                <a href="https://zalo.me/0345123856" data-phone="0345123856" class="btn-call-item"
                                    data-id="866582">
                                    <img src="https://guland.vn/bds/img/zalo.svg" class="zl-wrp__logo" width="32px"
                                        height="32px">
                                    </a>
                            </div>
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
                                    <div class="zl-wrp__num"><a href="tel:0345123856" data-phone="0345123856"
                                            class="btn-call-item" data-id="866582">0345123856</a></div>
                                </div>
                                <a href="https://zalo.me/0345123856" data-phone="0345123856"
                                    class="btn-zalo-item btn-call-item" data-id="866582"><img src="https://guland.vn/bds/img/zalo.svg"
                                        class="zl-wrp__logo" width="23px" height="23px"></a>
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
        function filterAction(keyword, type) {
            var url = "{{ url()->full() }}";
            var explodeUrl = url.split('?');
            var url = explodeUrl[0];
            if(url.includes('cho-thue-bat-dong-san-')) {
                if(keyword != 'clear') {
                    if(url.includes(keyword)) {
                        url = url.replace('-' + keyword + '-end', '');
                    } else {
                        if(url.includes('danh-muc')) {
                            url = url.replace(/danh-muc-[a-zA-Z0-9-]*-end/g, keyword + '-end');
                        } else {
                            url = url + '-' + keyword + '-end';
                        }
                    }
                } else {
                    url = url.replace(/-danh-muc-[a-zA-Z0-9-]*-end/g, '');
                }
            } else {
                if(keyword != 'clear') {
                    url = url + '-' + keyword + '-end';
                }
            }
            if(explodeUrl.length > 1) {
                url = url + '?' + explodeUrl[1];
            }
            window.location.href = url
        }
        function formatNumber(input) {
            var value = input.value.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            input.value = value;
        }
    </script>
    <script>
        $(".p-btm-lft").on('click', function() {
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
                    $('#Modal-InfoToContact').css('display', 'block');
                    $('#Modal-InfoToContact').addClass('show');
                }
            });
        });

        $(".close-fix").on('click', function() {
            $('#Modal-InfoToContact').css('display', 'none');
            $('#Modal-InfoToContact').removeClass('show');
        });
    </script>
    <script>
        $('.change-personal-status').on('change', function() {
            var id = $(this).data('id');
            alert(id);
        });
    </script>
@endsection
