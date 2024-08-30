@section('title', $title)
@section('description', $description)
@section('css')
    <link rel="stylesheet" href="{{ asset('Assets/Css/Product/collection.css') }}">

    <style>
.l-sdb-list__single {
    height: 40%;
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

@media (min-width: 768px) {
    .l-sdb-list {
        margin: 0 0 40px;
        padding: 0 0;
        background-color: rgba(0, 0, 0, 0);
    }
} 
.l-sdb-list {
    padding: 0 0 24px;
    background-color: #fff;
}
@media (min-width: 768px) {
    .l-sdb-list__cards {
        margin: 0;
    }
}
.l-sdb-list__cards {
    margin: 0;
}
@media (min-width: 768px) {
    .l-sdb-list__single {
        margin: 0;
        padding: 0 0 16px;
        border-bottom: 0;
    }
}
.l-sdb-list__single {
 
}
@media (min-width: 768px) {
    .c-sdb-card {
        border-radius: 4px;
        box-shadow: 0 0 0;
        border: 0;
        box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .12);
        transition: box-shadow .1s ease-in-out;
    }
} 
.c-sdb-card {
    width: 100%;
    height: 100%;
    margin: 0;
    font-family: "Roboto", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif;
    background-color: #fff;
    border-radius: 0;
}
@media (min-width: 768px) {
    .c-sdb-card__wrap {
        display: flex;
        align-items: stretch;
    }
}
.c-sdb-card__wrap {
    position: relative;
}
@media (min-width: 768px) {
    .c-sdb-card__img {
        flex: 0 0 312px;
        width: 312px;
        border-radius: 4px 0 0 4px;
    }
}
.c-sdb-card__img {
    display: block;
    position: relative;
    border-radius: 0;
    overflow: hidden;
}
@media (min-width: 768px) {
    .c-sdb-card__img .sdb-image-wrap {
        height: 100%;
        min-height: 148px;
    }
}
.c-sdb-card__img .sdb-image-wrap {
    position: relative;
    display: block;
    z-index: 80;
}
.c-sdb-card__save {
    position: absolute;
    padding: 3px;
    top: 0;
    right: 0;
    z-index: 200;
}
.c-sdb-card__save .btn {
    height: 20px;
    padding: 0 6px 0 4px;
    font-size: 12px;
    font-weight: 500;
    border-radius: 4px;
    color: #1976d2;
    background-color: rgba(255, 255, 255, .8);
    border: 1px solid #2196f3;
}
.c-sdb-card__img .btn {
    display: inline-flex;
    align-items: center;
    padding: 0 6px;
    height: 28px;
}
svg {
    overflow: hidden;
    vertical-align: middle;
}
.c-sdb-card__save .btn span {
    display: flex;
    align-items: center;
    line-height: 18px;
}
@media (min-width: 768px) {
    .c-sdb-card__cnt {
        flex: 1 1 auto;
        min-width: 0;
        padding: 12px 16px;
    }
}
.c-sdb-card__cnt {
    padding: 8px 14px 8px;
}
.c-sdb-card__tle {
    position: relative;
    margin: 0 -12px 0 0;
    padding: 0 0 2px 0;
    font-family: "LexendDeca", "Roboto", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif;
    line-height: 21px;
}
.c-sdb-card__tle a {
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
.c-sdb-card__inf {
    margin-right: -16px;
}
.c-sdb-card__inf .sdb-inf-row {
    position: relative;
    display: flex;
    align-items: center;
    flex-wrap: nowrap;
    line-height: 24px;
    font-size: 15px;
    margin: 0 0 0;
    overflow: hidden;
}
.c-sdb-card__inf .sdb-inf-row:before {
    content: "";
    position: absolute;
    display: block;
    height: 23px;
    top: 0;
    right: 0;
    width: 14px;
    background-image: linear-gradient(to left, #fff, rgba(255, 255, 255, 0.7) 50%, rgba(255, 255, 255, 0));
}
.c-sdb-card__inf .sdb-inf-data.data-size-xl {
    font-size: 17px;
}
.c-sdb-card__inf .sdb-inf-data.data-color-1 {
    color: #d32f2f;
}
.c-sdb-card__inf .sdb-inf-data {
    flex: 0 0 auto;
    min-width: 0;
    margin: 0 0 2px;
    display: block;
    align-items: center;
    white-space: nowrap;
    overflow: hidden;
    white-space: nowrap;
}
.c-sdb-card__inf .sdb-inf-data b {
    font-weight: 700;
}
@media (min-width: 768px) {
    .c-sdb-card__inf .sdb-inf-data:after {
        padding: 6px 8px 0;
    }
}
.c-sdb-card__inf .sdb-inf-data:after {
    display: inline-block;
    vertical-align: top;
    content: "•";
    line-height: 1;
    font-size: 13px;
    padding: 6px 5px 0;
    color: #adb5bd;
}
.c-sdb-card__inf .sdb-inf-data.data-size-lg {
    font-size: 15px;
}
.c-sdb-card__inf .sdb-inf-row {
    position: relative;
    display: flex;
    align-items: center;
    flex-wrap: nowrap;
    line-height: 24px;
    font-size: 15px;
    margin: 0 0 0;
    overflow: hidden;
}
.c-sdb-card__inf .sdb-inf-row:before {
    content: "";
    position: absolute;
    display: block;
    height: 23px;
    top: 0;
    right: 0;
    width: 14px;
    background-image: linear-gradient(to left, #fff, rgba(255, 255, 255, 0.7) 50%, rgba(255, 255, 255, 0));
}
.c-sdb-card__inf .sdb-inf-data.data-size-sm {
    font-size: 14px;
}
 
.c-sdb-card .sdb-btm-tle.clr-sell {
    color: #0288d1;
   
}
.c-sdb-card .sdb-btm-tle {
    margin: 0 8px 0 0;
    
    padding: 2px 0;
    font-family: "LexendDeca", "Roboto", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif;
    font-size: 14px;
}
.c-sdb-card__btn-group .form-group {
    margin: 0
}

.c-sdb-card__btn-group .form-control {
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
    .c-sdb-card__btn-group .form-control {
        max-width: 144px
    }
}

.c-sdb-card__btn-group select.form-control {
    background-size: 14px;
    padding: 0 13px 0 4px
}
.c-sdb-card__icn {
    display: flex;
    align-items: flex-end;
    justify-content: space-between;
    margin: 3px 0 0;
    padding: 5px 0 0;
    border-top: 1px dashed #dee2e6;
}
h4, .h4 {
    line-height: 1.375;
    margin-top:30px; 
}

h4{
    font-family: "LexendDeca", "Roboto", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif;
}
h4, .h4 {
    font-size: 1.25rem;
}
h4{
    margin-bottom: .5rem;
    font-weight: 500;
    line-height: 1.25;
}
h4{
    margin-top: 0;
    margin-bottom: .5rem;
}
 
h4 {
    display: block;
    margin-block-start: 1.33em;
    margin-block-end: 1.33em;
    margin-inline-start: 0px;
    margin-inline-end: 0px;
    font-weight: bold;
    unicode-bidi: isolate;
}

.c-sdb-card__stt {
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
    .c-sdb-card__stt {
        font-size: 11px
    }
}
.c-sdb-card__stt.stt-show {
    background-color: #66bb6a
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


    </style>
@endsection
@section('filter-header')
    <div class="sdb-hdr-n__flt">
        <div class="hdr-flt">
            <div class="hdr-flt__row">

                <div class="hdr-flt__itm">
                    <div class="c-hflt-slt">
                        <a href="#" class="c-hflt-slt__tgl btn"> Phân Loại
                        </a>
                        <div class="c-hflt-slt__drd">
                            <div class="hflt-drd">

                                <div class="hflt-drd__wrp">
                                    <button class="hflt-drd__cls btn btn--icon">
                                        <i class="mdi mdi-close"></i>
                                    </button>
                                    <ul class="hflt-drd__slt">
                                        <li>
                                        <li>
                                            <a href="#" class="bds-type-filter" data-value=" ">Cho Thuê</a>
                                        </li>
                                        <li>
                                            <a href="#" class="bds-type-filter" data-value=" ">Mua Bán</a>
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
                        <a href="#" class="c-hflt-slt__tgl btn"> Trạng thái
                        </a>
                        <div class="c-hflt-slt__drd">
                            <div class="hflt-drd">
                                <div class="hflt-drd__wrp">
                                    <button class="hflt-drd__cls btn btn--icon">
                                        <i class="mdi mdi-close"></i>
                                    </button>
                                    <ul class="hflt-drd__slt">
                                        <li>
                                        <li>
                                            <a href="#" class="bds-type-filter" data-value=" ">Đang giao dịch</a>
                                        </li>
                                        <li>
                                            <a href="#" class="bds-type-filter" data-value=" ">Đã giao dịch</a>
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
                        <a href="#" class="c-hflt-slt__tgl btn"> Bất động sản
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
                                        <li class="active">
                                            <a href="#" class="bds-type-filter" data-value="">
                                                Bất động sản
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="bds-type-filter"
                                                data-value="bat-dong-san-kinh-doanh">Bất động sản Kinh
                                                doanh</a>
                                            <ul>
                                                <li>
                                                    <a href="#" class="bds-type-filter"
                                                        data-value="mat-bang-kinh-danh">Mặt bằng kinh doanh</a>
                                                </li>
                                                <li>
                                                    <a href="#" class="bds-type-filter" data-value="van-phong">Văn
                                                        phòng ofice</a>
                                                </li>
                                                <li>
                                                    <a href="#" class="bds-type-filter"
                                                        data-value="kho-nha-xuong">Kho, nhà xưởng</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="#" class="bds-type-filter" data-value="nha-o">Nhà ở, nhà
                                                riêng,nguyên căn</a>
                                            <ul>
                                                <li><a href="#" class="bds-type-filter"
                                                        data-value="nha-mat-pho-mat-tien"> Nhà văn phòng mặt tiền</a></li>
                                                <li><a href="#" class="bds-type-filter" data-value="nha-ngo-hem">Nhà
                                                        ngõ,
                                                        hẻm</a></li>
                                                <li><a href="#" class="bds-type-filter" data-value="nha-biet-thu">Nhà
                                                        biệt
                                                        thự</a></li>

                                                <li><a href="#" class="bds-type-filter" data-value="nha-thanh-ly">
                                                        Phòng trọ</a></li>

                                            </ul>
                                        </li>
                                        <li>
                                            <a href="#" class="bds-type-filter" data-value="can-ho">Căn
                                                hộ</a>
                                            <ul>
                                                <li><a href="#" class="bds-type-filter"
                                                        data-value="can-ho-chung-cu">Căn hộ
                                                        Chung cư</a></li>
                                                <li><a href="" class="bds-type-filter"
                                                        data-value="can-ho-officetel">Căn hộ
                                                        Officetel</a>
                                                </li>
                                            </ul>
                                        </li>

                                        <li>
                                            <a href="#" class="bds-type-filter" data-value="dat-nen-ray-vuon">Đất
                                                nền,đất rẫy ,vườn</a>
                                            <ul>
                                                <li><a href="#" class="bds-type-filter" data-value="dat-tho-cu">Đất
                                                        thổ cư</a>
                                                </li>
                                                <li><a href="#" class="bds-type-filter" data-value="dat-nen-du-an">Đất
                                                        dự án</a></li>
                                                <li><a href="#" class="bds-type-filter"
                                                        data-value="dat-nong-nghiep">Đất nông nghiệp</a></li>
                                                <li><a href="#" class="bds-type-filter"
                                                        data-value="dat-thuong-mai-dich-vu">Đất
                                                        thương mại dịch vụ</a></li>
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
                                        <li class="active">
                                            <a href="#" class="price-filter" data-value="">Giá thuê</a>
                                        </li>
                                        <li>

                                            <input type="text" name="" id=""
                                                placeholder="Giá tối thiểu">
                                        </li>
                                        <li>
                                            <input type="text" name="" id=""placeholder="Giá tối đa">
                                        </li>
                                        <li class="button-container">
                                            <button class="btn btn-danger" type="text">Xóa</button>
                                            <button class="btn btn-primary" type="text" name=""
                                                id="">Lọc</button>
                                        </li>


                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="hdr-flt__itm">
                    <div class="c-hflt-slt">
                        <a href="#" class="c-hflt-slt__tgl btn"> Bề ngang nhà
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
                                    <ul class="hflt-drd__slt">
                                        <li class="active">
                                            <a href="#" class="size-filter" data-value=""> Bề ngang </a>
                                        </li>
                                        <li>
                                            <input type="text" name=" " id=""
                                                placeholder="Ngang tối thiểu">
                                        </li>
                                        <li>
                                            <input type="text" name=" " id=""
                                                placeholder="Ngang tối đa">
                                        </li>
                                        <li>
                                            <button class="btn btn-danger" type="">Xoá</button>
                                            <button class="btn btn-primary">Lọc</button>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tcc hdr-flt__itm">
                    <div class="c-hflt-slt">
                        <a href="#" class="c-hflt-slt__tgl btn">
                            Số phòng ngủ </a>
                        <div class="c-hflt-slt__drd">
                            <div class="hflt-drd">
                                <div class="hflt-drd__bgc"></div>
                                <div class="hflt-drd__wrp">
                                    <button class="hflt-drd__cls btn btn--icon">
                                        <i class="mdi mdi-close"></i>
                                    </button>

                                    <ul class="hflt-drd__slt">
                                        <li class="active">
                                            <a href="#" class="size-filter" data-value=""> Chọn số PN </a>
                                        </li>
                                        <li>
                                            <input type="text" name=" " id=""
                                                placeholder="Số PN tối thiểu">
                                        </li>
                                        <li>
                                            <input type="text" name=" " id=""
                                                placeholder="Số PN tối đa">
                                        </li>
                                        <li>
                                            <button class="btn btn-danger" type="">Xoá</button>

                                            <button class="btn btn-primary">Lọc</button>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="tcc hdr-flt__itm">
                    <div class="c-hflt-slt">
                        <a href="#" class="c-hflt-slt__tgl btn"> Số tầng </a>
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
                                    <ul class="hflt-drd__slt">
                                        <li class="active">
                                            <a href="#" class="size-filter" data-value=""> Số tầng </a>
                                        </li>
                                        <li>
                                            <input type="text" name=" " id=""
                                                placeholder="Số tầng tối thiểu">
                                        </li>
                                        <li>
                                            <input type="text" name=" " id=""
                                                placeholder="Số tầng tối đa">
                                        </li>
                                        <li>
                                            <button class="btn btn-danger" type="">Xoá</button>
                                            <button class="btn btn-primary">Lọc</button>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tcc hdr-flt__itm">
                    <div class="c-hflt-slt">
                        <a href="#" class="c-hflt-slt__tgl btn">Lọc thêm</a>
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
                                    <div class="hflt-drd__frm hfrm-oth">
                                        <form id="form-other">
                                            <div class="form-group-rows">


                                                <div class="form-group">
                                                    <label class="form-lbl">Hướng nhà, đất</label>
                                                    <div class="form-opts">
                                                        <label class="form-opt-btn">
                                                            <input type="checkbox" value="1" name="direction[]">
                                                            <span>Đông</span>
                                                        </label>
                                                        <label class="form-opt-btn">
                                                            <input type="checkbox" value="2" name="direction[]">
                                                            <span>Tây</span>
                                                        </label>
                                                        <label class="form-opt-btn">
                                                            <input type="checkbox" value="3" name="direction[]">
                                                            <span>Nam</span>
                                                        </label>
                                                        <label class="form-opt-btn">
                                                            <input type="checkbox" value="4" name="direction[]">
                                                            <span>Bắc</span>
                                                        </label>
                                                        <label class="form-opt-btn">
                                                            <input type="checkbox" value="5" name="direction[]">
                                                            <span>Đông Bắc</span>
                                                        </label>
                                                        <label class="form-opt-btn">
                                                            <input type="checkbox" value="6" name="direction[]">
                                                            <span>Đông Nam</span>
                                                        </label>
                                                        <label class="form-opt-btn">
                                                            <input type="checkbox" value="7" name="direction[]">
                                                            <span>Tây Bắc</span>
                                                        </label>
                                                        <label class="form-opt-btn">
                                                            <input type="checkbox" value="8" name="direction[]">
                                                            <span>Tây Nam</span>
                                                        </label>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="form-lbl">Độ rộng đường vào</label>
                                                    <div class="form-opts">
                                                        <label class="form-opt-btn">
                                                            <input name="road_sizes[]" type="checkbox" value="1-3">
                                                            <span>1m - 3m</span>
                                                        </label>
                                                        <label class="form-opt-btn">
                                                            <input name="road_sizes[]" type="checkbox" value="3-5">
                                                            <span>3m - 5m</span>
                                                        </label>
                                                        <label class="form-opt-btn">
                                                            <input name="road_sizes[]" type="checkbox" value="5-10">
                                                            <span>5m - 10m</span>
                                                        </label>
                                                        <label class="form-opt-btn">
                                                            <input name="road_sizes[]" type="checkbox" value="10-20000">
                                                            <span>Trên 10m</span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-lbl">Tiện ích</label>
                                                    <div class="form-opts">
                                                        <label class="form-opt-btn">
                                                            <input type="checkbox" value="1" name="utilities[]">
                                                            <span>Căn góc </span>
                                                        </label>
                                                        <label class="form-opt-btn">
                                                            <input type="checkbox" value="1" name="utilities[]">
                                                            <span>Hầm </span>
                                                        </label>
                                                        <label class="form-opt-btn">
                                                            <input type="checkbox" value="1" name="utilities[]">
                                                            <span>Hồ bơi</span>
                                                        </label><label class="form-opt-btn">
                                                            <input type="checkbox" value="1" name="utilities[]">
                                                            <span>Sân vườn</span>
                                                        </label>
                                                        <label class="form-opt-btn">
                                                            <input type="checkbox" value="1" name="utilities[]">
                                                            <span>Thang máy</span>
                                                        </label>



                                                    </div>
                                                </div>
                                            </div>
                                        </form>

                                        <div class="form-group-submit">
                                            <button class="btn btn--guland btn-lg d-flex" id="btn-search-other">
                                                <i class="mdi mdi-magnify mdi-f-white"></i>
                                                <span>Tìm kiếm</span>
                                            </button>
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
@extends('Systems.base')
@section('content')
<div class="sdb-content-picker1">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="p-lst-n">
                    <div class="p-lst-n__hdr">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/cho-thue-bat-dong-san">Cho thuê</a>
                            </li>
                            <li class="breadcrumb-item"><a href="/cho-thue-bat-dong-san-tp-ho-chi-minh">TP. Hồ Chí Minh</a>
                             </li>
                            <li class="breadcrumb-item"><a href="/cho-thue-bat-dong-san-huyen-nha-be-tp-ho-chi-minh">Huyện Nhà Bè</a>
                            </li>
                            </ol>
                        </nav> 
                        <h1 class="p-lst-n__tle">Cho thuê nhà đất bất động sản Huyện Nhà Bè, TP. Hồ Chí Minh chính chủ giá rẻ</h1>  
                        <div class="p-lst-n__cat">
                          <div class="cat-list-wrap cat-list-wrap--main">
                              <ul class="cat-list-wrap__main">
                                  <li>
                                    <a href="#" class="bds-type-filter" data-value="bat-dong-san-kinh-doanh">
                                      <span>Mặt bằng Kinh doanh</span>
                                    </a>
                                  </li>
                                  <li>
                                    <a href="#" class="bds-type-filter" data-value="nha-o"> 
                                      <span>Nhà Nguyên căn</span> 
                                    </a>
                                  </li>
                                  <li>
                                    <a href="#" class="bds-type-filter" data-value="can-ho">
                                      <span>Căn hộ/chung cư</span>
                                    </a>
                                  </li>
                                  <li>
                                    <a href="#" class="bds-type-filter" data-value="can-tro">
                                      <span>Nhà trọ/ở</span>
                                    </a>
                                  </li>
                                  <li>
                                    <a href="#" class="bds-type-filter" data-value="dat-nen-ray-vuon">
                                      <span>Đất </span>
                                    </a>
                                  </li>
                              </ul>
                          </div>
                      </div>
                      <div class="p-lst-n__pil">
                        <div class="tag-list-wrap">
                            <ul class="tag-list-wrap__ul">
                                <li><a href="#" class="btn-filter-status" data-value="1">Công khai</a></li>
                                <li><a href="#" class="btn-filter-status" data-value="3"> Hết hạn</a></li>
                                <li><a href="#" class="btn-filter-status" data-value="-1">Đã thuê </a></li>
                                <li><a href="#" class="btn-filter-status" data-value="0">Vị trí đẹp</a>
                                </li>
                                <li><a href="#" class="btn-filter-status" data-value="2">Sắp trả</a></li>
                                <li><a href="#" class="btn-filter-status" data-value="5">Đã xoá</a></li>
                            </ul>
                        </div>
                    </div>
                        <div class="p-lst-n__itr">
                            <div class="p-lst-n__stl">Có <b id="total">10</b> bất động sản.</div>
                            <div class="p-lst-n__atn">
                                <div class="dropdown dropdown--sort">
                                    <button class="btn dropdown-toggle" data-toggle="dropdown">
                                        <span>Tin mới đăng</span>
                                        <i class="mdi mdi-chevron-down"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <ul>
                                            <li class="active"><a href="#" class="sort-link" data-value="">Tin mới đăng</a>
                                            </li>
                                            <li>
                                                <a href="#" class="sort-link" data-value="price_real-asc">Giá thấp đến cao</a>
                                            </li>
                                            <li>
                                                <a href="#" class="sort-link" data-value="price_per_m-asc">Giá trên  m2 thấp nhất</a>
                                            </li> 
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="p-lst-n__sdb">
                        <div class="l-sdb-list">
                            <div class="l-sdb-list__cards" id="listing">
                                <div class="l-sdb-list__single">
                                    <div class="c-sdb-card">
                                        <div class="c-sdb-card__wrap">
                                            <div class="c-sdb-card__img"> 
                                              <div class="c-sdb-card__btn-group p-top-lft">
                                                <div class="form-group">
                                                    <select class="form-control change-personal-status"data-status="1" data-id="697497">
                                                        <option value="" selected="">- Tình trạng -</option>
                                                        <option selected="" value="1">Bán công khai</option>
                                                        <option value="3">Tin hết hạn</option>
                                                        <option value="-1">Lưu cá nhân</option>
                                                        <option value="0">Chờ duyệt</option>
                                                        <option value="2">Ngừng bán</option>
                                                        <option value="5">Đã bán</option>
                                                        <option value="-2">Đã xóa</option>
                                                        <option value="9">Bị báo cáo</option>
                                                    </select>
                                                </div>
                                            </div>
                                              <a href="https://guland.vn/post/chinh-chu-can-cho-thue-phong-tro-gap-tai-nha-be-855826" class="sdb-image-wrap "> 
                                                <div class="sdb-image-wrap__img"> 
                                                  <img class="lazy" loading="lazy" src="https://cdn.guland.vn/files/mua-ban-nha-dat-bat-dong-san-duong-bac-ba-niem-thi-tran-nha-be-huyen-nha-be-guland-32-3980313.jpg" alt=" ">
                                                </div>
                                              </a> 
                                              <div class="c-sdb-card__stt stt-show">Đang hiển thị</div> 
                                              <div class="c-sdb-card__save ">
                                                <a href="#" class="btn btn-outline-dark px-2   btn-save  "
                                                    data-id="697497">
                                                    <svg viewBox="0 0 24 24">
                                                        <path
                                                            d="M12.1,18.55L12,18.65L11.89,18.55C7.14,14.24 4,11.39 4,8.5C4,6.5 5.5,5 7.5,5C9.04,5 10.54,6 11.07,7.36H12.93C13.46,6 14.96,5 16.5,5C18.5,5 20,6.5 20,8.5C20,11.39 16.86,14.24 12.1,18.55M16.5,3C14.76,3 13.09,3.81 12,5.08C10.91,3.81 9.24,3 7.5,3C4.42,3 2,5.41 2,8.5C2,12.27 5.4,15.36 10.55,20.03L12,21.35L13.45,20.03C18.6,15.36 22,12.27 22,8.5C22,5.41 19.58,3 16.5,3Z">
                                                        </path>
                                                    </svg>
                                                    <span>Lưu tin</span>
                                                </a>
                                                <!-- thêm class active -->
                                            </div>  
                                            <div class="c-sdb-card__btn-group p-btm-lft">
                                              <a href=" " class="btn btn-outline-dark btn-call"
                                                  data-phone="0327485737" data-id="697497" data-toggle="modal">
                                                  <i class="mdi mdi-phone-in-talk"></i>
                                                  <span>Liên hệ</span>
                                              </a>
                                            </div> 
                                            <div class="c-sdb-card__btn-group p-btm-rgt">
                                              <a target="_blank" href=" " class="btn btn-outline-dark">
                                                  <i class="mdi mdi-map mr-1"></i>
                                                  <span>Vị trí</span>
                                              </a>
                                          </div>  
                                          </div> 
                                          <div class="c-sdb-card__cnt"> 
                                            <div class="c-sdb-card__tle"> 
                                              <span class="vrf-bdg">VIP</span>     
                                              <a href=" ">Chính chủ cần cho thuê phòng trọ gấp tại Nhà Bè</a> 
                                            </div> 
                                            <div class="c-sdb-card__inf"> 
                                              <div class="sdb-inf-row"> 
                                                <span class="sdb-inf-data data-color-1 data-size-xl">
                                                  <b>1.6 triệu / tháng</b>
                                                </span> 
                                                <span class="sdb-inf-data data-size-lg">
                                                  <b>20m²</b>
                                                </span> 
                                                <span class="sdb-inf-data data-size-lg">
                                                  <b>80 nghìn /m2</b>
                                                </span>
                                                <span class="sdb-inf-data data-size-lg">
                                                  <b>Ngang:  /m2</b>
                                                </span>  
                                                <span class="sdb-inf-data data-size-lg">
                                                  <b>Dài:  /m2</b>
                                                </span> 
                                              </div> 
                                              <div class="sdb-inf-row"> 
                                                <span class="sdb-inf-data data-size-sm">Mã tin: 
                                                  <b>855826</b>
                                                </span> 
                                                <span class="sdb-inf-data data-size-sm">1 tuần trước</span> 
                                                <span class="sdb-inf-data data-size-sm">
                                                  <i class="mdi mdi-map-marker-outline"></i>Huyện Nhà Bè, TP. Hồ Chí Minh
                                                </span> 
                                              </div>  
                                            </div> 
                                            <div class="c-sdb-card__icn"> 
                                              <a href=" ">
                                                <h4 class="sdb-btm-tle clr-sell">Cho thuê Phòng trọ TP. Hồ Chí Minh</h4>
                                              </a> 
                                            </div>  
                                            <div class="c-sdb-card__ctm">
                                              <div class="sdb-btn-user">
                                                  <a href="#" class="btn btn-outline-dark btn-xs btn-up-vip-post" data-id="697497">
                                                      <i class="mdi mdi-arrow-up-bold-outline"></i>  Chăm sóc
                                                  </a>
                                                  <a href=" " class="btn btn-outline-dark btn-xs btn-up-vip-post" data-id="697497">
                                                      <i class="mdi mdi-arrow-up-bold-outline"></i> Up tin
                                                  </a>
                                                  <a href="#" class="btn btn-outline-dark btn-xs btn-up-vip-post" data-id="697497">
                                                      <i class="mdi mdi-arrow-up-bold-outline"></i> Đã thuê
                                                  </a>
  
                                                  <a href=" " class="btn btn-outline-dark btn-xs" data-id="697497">
                                                      <i class="mdi mdi-file-document-edit-outline"></i>
                                                      <span>Sửa</span>
                                                  </a>
                                              </div> 
                                              <a href=" " class="btn btn-xs btn--gray mt-3">Xem 0 khách có nhu cầu phù hợp</a> 
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
 <div class="table-bottom mt-3">
                            <div class="pagination">
                              <a href="#" class="prev">&laquo; Prev</a>
                              <a href="#" class="page active">1</a>
                              <a href="#" class="page">2</a>
                              <a href="#" class="page">3</a>
                              <a href="#" class="next">Next &raquo;</a>
                            </div>
                          </div> 
 
                   
                    
<script>
  document.addEventListener('DOMContentLoaded', function() {
  const paginationLinks = document.querySelectorAll('.pagination a.page');
  paginationLinks.forEach(link => {
    link.addEventListener('click', function(e) {
      e.preventDefault();

      // Remove the active class from all links
      paginationLinks.forEach(link => link.classList.remove('active'));

      // Add the active class to the clicked link
      this.classList.add('active');
    });
  });
});
</script>   

@endsection
@section('js')
@endsection
