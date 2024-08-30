<style>
    .sdb-hdr-n .c-hflt-slt .hflt-drd__cls {
    display: flex;
    position: absolute;
    top: -2;
    right: -4;
    height: 48px;
    width: 48px;
    padding: 0;
}
.img_reset {
    width: 35px;  
    height: auto;  
    float: right; 
    margin-right: 50px;  
    position: absolute; 
    top: 4; 
    right: 0; 
  
    
   
    border-radius: 5px;
    
}
 

 
 
</style>
<header class="sdb-hdr-n" style="height: auto;">
    <div class="sdb-hdr-n__wrap">

        <div class="sdb-hdr-n__main">
            <div class="hdr-top hdr-stn">
                <div class="hdr-lg">
                    <a href="/">
                        <img
                            src="https://guland.vn/bds/img/logo-guland.webp"
                            alt="Guland">
                        <span>Thông tin thật - Giá trị thật</span>
                    </a>
                </div>
                <div class="hdr-ft">
                    <div class="hdr-ft__loc">
                        <div class="c-hflt-slt"
                            id="menu_location">
                            <a href="#"class="c-hflt-slt__gps btn"id="home-geo">
                                <i class="fad fa-location"></i>
                            </a>
                            <a href="#" class="c-hflt-slt__tgl btn">
                                <span class="loc-cty-txt">
                                    @if (session('fill_city_id'))
                                        @if(session('fill_street_id'))
                                            {{ $controller::convertAddressFromIDToName(session('fill_street_id'), '\App\Models\streetapi', 'StreetID') . ', ' }}
                                        @endif
                                        @if(session('fill_ward_id'))
                                            {{ $controller::convertAddressFromIDToName(session('fill_ward_id'), '\App\Models\wardapi', 'WardID') . ', ' }}
                                        @endif
                                        @if(session('fill_district_id') != 0)
                                            {{ $controller::convertAddressFromIDToName(session('fill_district_id'), '\App\Models\districtapi', 'DistrictID') . ', ' }}
                                        @endif
                                        {{ $controller::convertAddressFromIDToName(session('fill_city_id'), '\App\Models\cityapi', 'CityID') }}
                                    @else
                                        Chọn khu vực
                                    @endif
                                </span>
                            </a>
                            <div class="c-hflt-slt__drd">
                                <div class="hflt-drd">
                                    <div class="hflt-drd__bgc"></div>
                                    <div class="hflt-drd__wrp">
                                        <button class="hflt-drd__cls btn btn--icon">
                                            <i class="fas fa-times  " style="color: #000000; font-size:25px;"></i>
                                        </button>
                                        <div class="hflt-drd__hdr">
                                            <h6 class="hflt-drd__tle">Chọn khu vực</h6>
                                        </div>
                                        <form action="{{ route('method.add-location') }}" method="POST">
                                            @csrf
                                            <div class="hflt-drd__frm hfrm-loc">
                                                <div class="form-group-rows">
                                                    @if (session('fill_city_id'))
                                                        <div class="form-group">
                                                            <div class="reset">
                                                                <a href="{{ route('method.remove-location') }}"> 
                                                                   
                                                                    <img src="{{ asset('Assets/Gif/reset.gif') }}" class="img_reset">                                                                      
                                                                        
                                                                </a> 
                                                            </div>
                                                        </div>
                                                    @endif
                                                    
                                                     
                                                    <div class="form-group">
                                                        <label class="form-lbl">Tỉnh, thành phố</label>
                                                        <select required name="city_id"
                                                            class="form-control select2-input select2-hidden-accessible" id="province_id_3" data-select2-id="select2-data-province_id_2"
                                                            tabindex="-1" aria-hidden="true">
                                                            <option {{ (session('fill_city_id')) ? 'selected' : '' }} value="1">Tp. Hồ Chí Minh</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-lbl">Quận, huyện</label>
                                                        <select  name="district_id"
                                                            class="form-control select2-input select2-hidden-accessible"
                                                            id="district_id_3" data-select2-id="select2-data-district_id_2"
                                                            tabindex="-1" aria-hidden="true">
                                                            <option selected value data-select2-id="select2-data-148-z7at">Tất cả</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-lbl">Phường, xã</label>
                                                        <select name="ward_id" class="form-control select2-input select2-hidden-accessible"
                                                            id="ward_id_3" data-select2-id="select2-data-ward_id_2"
                                                            tabindex="-1" aria-hidden="true">
                                                            <option selected value data-select2-id="select2-data-150-g5gw">Tất cả</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-lbl">Đường</label>
                                                        <select name="street_id" class="form-control select2-input select2-hidden-accessible"
                                                            id="street_id_3" data-select2-id="select2-data-road_id_2"
                                                            tabindex="-1" aria-hidden="true">
                                                            <option selected disabled data-select2-id="select2-data-152-heyk">Tất cả</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group-submit">
                                                    <button type="submit" class="btn btn--guland btn-lg d-flex" id="btn-location-filter">
                                                        <i class="mdi mdi-magnify mdi-f-white"></i>
                                                        <span>Chọn khu vực</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="hdr-ft__it ">
                        <a href="#Modal__FilterForm2"
                            class="hdr-ft__srch"
                            data-toggle="modal">
                            <i class="fad fa-search"></i>
                            <span>Tìm BĐS</span>
                        </a>
                    </div>
                </div>
                <div class="hdr-mn">
                    <div class="hdr-mn__it only-fixed-mb">

                        <a href="#Modal__FilterForm"
                            class="hdr-mn__lk" data-toggle="modal">
                            <span
                                class="mn-lk-ic mdi mdi-magnify"></span>
                        </a>
                    </div>
                    <div class="hdr-mn__it">
                        <a href="{{ route('kho-khach') }}"
                            class="hdr-mn__lk customer_url">
                            <!-- <span class="mn-lk-nb">12</span> -->
                            <i class="far fa-users"></i>
                            <span class="mn-lk-lb">Kho khách</span>
                        </a>
                    </div>
                    <div class="hdr-mn__it">
                        <a href="#"
                            class="hdr-mn__lk js-toggle-side-menu">
                            <i class="fas fa-bars"></i>
                            <span class="mn-lk-lb">Danh mục</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        @yield('filter-header')

        <form id="form-header">
            <input type="hidden" name="sort" id="sort-link" value>
            <input type="hidden" name="status" id="status_filter"
                value>
            <input type="hidden" name="bds_type_new"
                id="bds_type_new" value>
            <input type="hidden" name="province_id"
                id="province_id_filter" value>
            <input type="hidden" name="district_id"
                id="district_id_filter" value>
            <input type="hidden" name="ward_id" id="ward_id_filter"
                value>
            <input type="hidden" name="road_id" id="road_id_filter"
                value>
            <input type="hidden" name="bds_method" id="bds_method"
                value>
            <input type="hidden" name="bds_type" id="bds_type"
                value>
        </form>

    </div>
</header>