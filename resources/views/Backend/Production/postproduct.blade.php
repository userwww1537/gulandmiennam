@section('title', 'Đăng tin bất động sản trên Gulandmiennam')
@section('description', 'Đăng tin bất động sản trên Gulandmiennam')
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
    <link rel="stylesheet" href="{{ asset('Assets/Css/Product/content.css') }}">

    <style>
        .l-sdb-profile__hdr-atn {
                  position: fixed;
                  right: 10px;
                  bottom: 100px;
                  z-index: 9999;
                }
                /* CSS */
        #rent-section .row {
            display: flex;
            flex-wrap: wrap;
        }

        #rent-section .column {
            display: flex;
            flex-direction: column;
            width: 50%;
            padding: 10px;  
        }

        #rent-section .form-group-cnt6 label {
            display: flex;
            align-items: center;
            margin-bottom: 15px;  
        }

        #rent-section .form-group-cnt6 div {
            margin-left: 10px;  
        }

        @media (max-width: 768px) {
            #rent-section .column {
                width: 100%;
            }
        }

        .form-container1 {
            width: 100%;
            max-width: 500px; 
            margin: 50px auto;
            padding: 20px;
            border: 2px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);     
            display: none;  
            position: fixed;  
            top: 30%;  
            left: 50%;  
            transform: translate(-50%, -50%);  
            background-color: #ffffff;  
        }
        .form-group2 {
          margin-bottom: 20px;}
        .form-group2 label {
          display: block;
          margin-bottom: 5px;
        }
        .form-group2 select,
        .form-group2 input {
          width: 100%;
          padding: 10px;
          border: 1px solid #ccc;
          border-radius: 5px;
        }
        .form-actions {
          text-align: right;
          margin-top: 20px;  
        }
        .form-actions button {
          padding: 10px 20px;
          border: none;
          background-color: #007bff;
          color: white;
          border-radius: 5px;
          cursor: pointer;
        }
        .form-actions button:hover {
          background-color: #0056b3;
        }
        .select2-container .select2-search--dropdown .select2-search__field {
          width: 100%;
          padding: 8px;
          box-sizing: border-box;
          border: 1px solid #ccc;
        }
        .select2-results__option {
          background-color: #fff;
          color: #000;
        }
        .select2-results__option--highlighted[aria-selected] {
          background-color: #ff4d4d !important;
          color: #fff;
        }
        @media (max-width: 600px) {
          .form-container {
            padding: 15px;
          }
        }
     

        
    
    </style>
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
        /* ****************************** */
        .form-control {
    padding: 10px;
    margin: 5px 0;
}

.rounded-input {
    border-radius: 15px;
    border: 1px solid #ccc;
    padding: 10px;
}

.btn-orange {
  background: linear-gradient(to right, rgb(218, 145, 10), rgb(219, 138, 45)); 
     color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 15px;
    cursor: pointer;
     
}

.btn-orange:hover {
    background-color: #e3a150; /* Darker orange */
}

.form-group-cnt {
    margin: 20px;
}

.cnt-hdig {
    margin-bottom: 10px;
}

.text-red {
    color: red;
}

.d-none {
    display: none;
}
.btn-checkbox {
    display: inline-block;
    padding: 5px 10px;
    background-color: #ed0f0f; /* Orange color */
    color: white;
    border: none;
    border-radius: 15px;
    cursor: pointer;
}

.btn-checkbox:hover {
    background-color: #d44747; /* Darker orange */
}

.btn-checkbox:active,
input[type="checkbox"]:checked + .btn-checkbox {
    background-color: #FF4500; /* Red-orange when active or checked */
}
    </style>
@endsection
@extends('Systems.base')
@section('content')
    @if($checkRole >= 2)
      <div id="Modal__AddRoad" class="modal fade modal--form" tabindex="-1"
          style="display: none; padding-right: 17px;" aria-modal="true" role="dialog">
          <div class="modal-dialog" >
              <div class="modal-content" id="road-content"><button type="button" class="close close-abs"
                      data-dismiss="modal">✕</button>
                  <div class="l-modal-form">
                      <div class="l-modal-form__form">
                          <form id="form-add-road" action="{{ route('method.addAddress') }}" method="post">
                              @csrf
                              <h3 class="form-title">
                                <i class="mdi mdi-account-plus-outline mr-2" ></i>Thêm đường </h3>
                              <div class="row">
                                  <div class="col-12">
                                      <div class="form-group">
                                          <label class="form-label">Tỉnh / thành phố<span
                                                  class="text-red">(*)</span></label>
                                          <select class="form-control select2-add-property select2-hidden-accessible"
                                              name="city_id" id="city_select_addroad"
                                              data-select2-id="select2-data-province_id" tabindex="-1"
                                              aria-hidden="true" required>
                                              <option class="selected" data-select2-id="select2-data-223-41jt">Vui lòng chọn</option>
                                              <option value="1">Tp Hồ Chí Minh</option>
                                          </select>
                                      </div>
                                  </div>
                                  <div class="col-12">
                                      <div class="form-group">
                                          <label class="form-label">Quận / Huyện<span
                                                  class="text-red">(*)</span></label>
                                          <select class="form-control select2-add-property select2-hidden-accessible"
                                              name="district_id" id="district_select_addroad"
                                              data-select2-id="select2-data-district_id" tabindex="-1"
                                              aria-hidden="true" required>
                                              <option class="selected" data-select2-id="select2-data-225-0olz">Vui lòng
                                                  chọn</option>
                                          </select>
                                      </div>
                                  </div>
                                  <div class="col-12">
                                      <div class="form-group">
                                          <label class="form-label">Phường / Xã<span
                                                  class="text-red">(*)</span></label>
                                          <select class="form-control select2-add-property select2-hidden-accessible"
                                              name="ward_id" id="ward_select_addroad"
                                              data-select2-id="select2-data-ward_id" tabindex="-1"
                                              aria-hidden="true" required>
                                              <option class="selected" data-select2-id="select2-data-225-0olz">Vui lòng
                                                  chọn</option>
                                          </select>
                                      </div>
                                  </div>
                                  <div class="col-12">
                                      <div class="form-group">
                                          <label class="form-label">Đường </label>
                                          <input class="form-control" name="name_address" required placeholder="Định dạng ghi hoa chữ cái đầu: Lê Thánh Tôn">
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
        <div class="l-sdb-profile__hdr-atn">
            <a href="#Modal__AddRoad" class="btn btn-secondary" id="btn-add-item" data-toggle="modal"><i
                    class="mdi mdi-map-marker-plus-outline mr-2"></i>Thêm đường</a>
        </div>
    @endif
    <style>
      .card-address {
        z-index: 1000000;
        top: 40%;
        transform: translate(-50%, -50%);
      }
      .card-address .form-control1 {
        z-index: 1000000;
      }
      .select2-container--open {
        z-index: 1000000;
      }
    </style>
    <div class="form-container1 card-address"style="display: none;">
      <div class="form-group2  ">
          <label for="form-lable-cnt1">Tỉnh / Thành
              phố<span class="text-red">(*)</span></label>
          <select class="form-control1" name id="city_select">
              <option class value>
                  Vui lòng chọn
              </option>
              <option value="1">TP. Hồ Chí Minh</option>
          </select>
      </div>
      <div class="form-group2">
          <label for="district">Quận / Huyện<span class="text-red">(*)</span></label>
          <select name id="district_select" class="form-control1">
              <option value="">Vui lòng chọn</option>
            
          </select>
      </div>
      <div class="form-group2">
          <label for="ward">Phường / Xã<span class="text-red">(*)</span></label>
          <select name id="ward_select" class="form-control1">
              <option value="">Vui lòng chọn</option>
             
          </select>
      </div>
      <div class="form-group2">
          <label for="street">Đường<span class="text-red">(*)</span></label>
          <select name id="street_select" class="form-control1">
              <option value="">Vui lòng chọn</option>
               
          </select>
      </div>
      <div class="form-group2">
          <label for="form-lable-cnt1">Địa chỉ<span class="text-red">(*)</span></label>
          <input type="text" class="search-input address-input"
              placeholder="Lưu ý: Nên nhập số nhà dạng: 15/158 - Số nhà 15 / hẻm 158" />
      </div>
        <div class="form-butn">
            <button class="btn btn-se">Hủy</button>
            <button class="btn btn-primary1">
                Xác nhận địa chỉ
            </button>
        </div>
  </div>
    <form action="{{ route('process-postProduct') }}" method="POST" enctype="multipart/form-data" id="form-post-product">
        @csrf
        @error('address_errors')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="content-bds sdb-content-picker">
            <div class="bds-form-wrp">
                <div class="container">
                    <div class="bds-form-main">
                        <div class="tab-content">
                            <hr />
                            <div class="form-nav-ctl">
                                <div class="form-tab-rd">
                                    <div class="form-op-wrp">
                                        <label class="custom-ctl-nav">
                                            <input type="radio" checked name="is_public" value="1" id="not-private"
                                                data-target="#Tab-Form-01" data-textsubmit="Đăng tin ngay"
                                                onclick="handle_coop()" />
                                            <div class="cnt-nav-headg">
                                                <h5>Đăng công khai</h5>
                                            </div>
                                        </label>
                                        <label class="custom-ctl-nav">
                                            <input type="radio" name="is_public" value="2" id="private"
                                                data-target="#Tab-Form-02" data-textsubmit="Lưu tin ngay" />
                                            <div class="cnt-nav-headg">
                                                <h5>Lưu riêng tư</h5>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div id class="cnt-ctg">
                                <div class="cnt-form-bds">
                                    <div class="form-group-cnt">
                                        <label class="form-lable-cnt">Danh mục</label>
                                        <div class="form-op-wrp">
                                            <label class="content-control content-btn1" style="cursor: pointer;"
                                                onclick="changeCategory('1')">
                                                <input type="radio" name="category" value="sell"
                                                    class="cnt-control-input" />
                                                <div class="content-lable">Cần bán</div>
                                            </label>
                                            <label class="content-control content-btn1" style="cursor: pointer;"
                                                onclick="changeCategory('2')">
                                                <input type="radio" name="category" value="rent" checked
                                                    class="cnt-control-input" />
                                                <div class="content-lable">Cho thuê</div>
                                            </label>
                                        </div>
                                    </div>
                                    <h3 class="cnt-form-tle">Loại &amp; Danh mục BĐS</h3>
                                    <div class="form-group-cnt">
                                        <label class="form-lable-cnt">Loại nhà đất
                                            <span class="text-red">(*)</span>
                                        </label>
                                        <select id="property-type" class="form-control select2-input select3"
                                            name="CategoryID">
                                            <option value="none">-- Chọn loại nhà đất --</option>
                                            <optgroup label="Bất động sản kinh doanh">
                                                @foreach ($categories['kd'] as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </optgroup>
                                            <optgroup label="Nhà ở, nhà riêng, nguyên căn">
                                                @foreach ($categories['nha'] as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </optgroup>
                                            <optgroup label="Căn hộ">
                                                @foreach ($categories['canho'] as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </optgroup>
                                            <optgroup label="Đất nền, đất rẫy, vườn">
                                                @foreach ($categories['dat'] as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </optgroup>
                                        </select>
                                    </div>

                                    <div id="rent-section">
                                      <h3 class="cnt-hdig">Tiện ích cho thuê</h3>
                                      <div class="row mt-3">
                                          <div class="content-loca col-12">
                                              <div class="form-group-cnt6 column">
                                                  <label for="utilities1" class="rd-1">
                                                      <input type="checkbox" name="utilities[]" class="utilities" value="1" id="utilities1" />
                                                      <div>Căn góc</div>
                                                  </label>
                                                  <label for="utilities2" class="rd-2">
                                                      <input type="checkbox" name="utilities[]" class="utilities" value="2" id="utilities2" />
                                                      <div>Gần ngã 3, 4</div>
                                                  </label>
                                                  <label for="utilities3">
                                                      <input type="checkbox" name="utilities[]" class="utilities" value="3" id="utilities3" />
                                                      <div>Sân vườn</div>
                                                  </label>
                                              </div>
                                              <div class="form-group-cnt6 column">
                                                  <label for="utilities4">
                                                      <input type="checkbox" name="utilities[]" class="utilities" value="4" id="utilities4" />
                                                      <div>Hầm</div>
                                                  </label>
                                                  <label for="utilities5">
                                                      <input type="checkbox" name="utilities[]" class="utilities" value="5" id="utilities5" />
                                                      <div>Thang máy</div>
                                                  </label>
                                                  <label for="utilities6">
                                                      <input type="checkbox" name="utilities[]" class="utilities" value="6" id="utilities6" />
                                                      <div>Trống suốt</div>
                                                  </label>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                                  
                                  <div class="form-group-cnt">
                                      <h3 class="cnt-hdig">Sử dụng ảnh từ mã tin 
                                        <span class="text-red">(*)</span>
                                      </h3> 
                                    <label for="isAvatarCode" class="btn-checkbox">Chọn</label>
                                    <input type="checkbox" name="isAvatarCode" id="isAvatarCode" class="d-none">
  
                                    <div class="cnt-code-avatar-up d-none">
                                      <input class="form-control rounded-input" type="text" name="avatarCode" id="avatarCode" placeholder="Nhập mã tin" required>
                                      <button class="btn-orange" id="getImageGuland">Lấy ảnh</button>
                                      <input type="hidden" name="listNameImages" id="listNameImages">
                                    </div>
                                  </div>
                                  
                                    <div class="form-group-cnt avatar-class">
                                      <label class="form-lable-cnt">Ảnh đại diện
                                          <span class="text-red">(*)</span>
                                      </label>
                                      <div class="cnt-img-up">
                                        <input type="file" class="form-control" name="avatar" id="avatar" required>
                                      </div>
                                    </div>

                                    <div class="form-group-cnt images-class">
                                        <label class="form-lable-cnt">Hình ảnh BĐS thực tế
                                            <span class="text-red">(*)</span>
                                        </label>
                                        <div class="cnt-img-up">
                                            <div class="upload-img" id="imagePreview"></div>
                                            <div class="text-right mt-2">
                                                <label for="file_real" class="btn-custom1">
                                                    <input type="file" id="file_real" name="file_real_1[]" value
                                                        multiple class="d-none  btn-orange file_images"
                                                        onchange="previewImages(this, '#imagePreview')" />Thêm ảnh
                                                </label>
                                                @error('file_real_1')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>

                                        </div>
                                    </div>

                                    <div class="cnt-hdig"></div>
                                    <div class="form-group-cnt mt-4">
                                        <label class="form-lable-cnt">Sổ , hợp đồng, bản vẽ
                                            ,giấy tờ liên quan
                                        </label>
                                        <input type="file"class="form-control" name="file_hopdong[]" multiple id="">
                                    </div>
                                </div>

                                <div class="bds-type-content"></div>
                                <!--form cho thuê mặt bằng-->
                                {{-- 
                    <div class="bds-type-content kd d-none">
                      <div class="btn-cnt-type">
                        <h3 class="cnt-hdeg">Địa chỉ bất động sản</h3>
                        <div class="form-group-cnt1 name-land-style">
                          <label for class="form-lable-cnt3"
                            style="font-size: 15px">Tên tòa nhà / khu dân cư
                            /Dự án
                            <span class="text-red">(*)</span></label>
                          <input type="text" class="search-input" id="name-building-real-estate"
                            placeholder=" " />
                        </div>
                        <div class="form-group-cnt1">
                          <label for class="form-lable-cnt3"
                            style="font-size: 15px">
                            Địa chỉ mặt bằng <span
                              class="text-red">(*)</span>
                          </label>
                          <a id="" class="form-control toggle-address-form" style="cursor: pointer;"></a>
                        </div>

                        <div class="row">
                          <div class="col-12">
                            <div class="form-group-cnt3">
                              <label class="form-label-cnt3">Tọa độ vị
                                trí<span class="text-red">(*)</span></label>
                              <div class="input-group1">
                                <input
                                  type="text"
                                  class="form-control"
                                  name="toa-do-vi-tri"
                                  placeholder="10.787281170604397, 106.64923009534502" />
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row soto-sothua">
                          <div class="col-6">
                            <div class="form-group-cnt3">
                              <label class="form-label-cnt3">Số Thửa<span
                                  class="text-red">(*)</span></label>
                              <div class="input-group1">
                                <input
                                  type="text"
                                  name="sothua"
                                  class="form-control" />
                              </div>
                            </div>
                          </div>
                          <div class="col-6">
                            <div class="form-group-cnt3">
                              <label class="form-label-cnt3">Số tờ<span
                                  class="text-red">(*)</span></label>
                              <div class="input-group1">
                                <input
                                  type="text"
                                  class="form-control"
                                  name="soto" />
                              </div>
                            </div>
                            <div class="form-add text-right">
                              <button type="button" class="btn btn-to-thua">
                                <i class="bx bx-add-to-queue"></i>Thêm tờ
                                thửa
                              </button>
                            </div>
                          </div>
                        </div>

                        <h3 class="cnt-hdeg">Thông tin BĐS</h3>

                        <div class="row">
                          <div class="col-6 col-lg-3">
                            <div class="form-group-cnt3">
                              <label class="form-label-cnt3">Số phòng tắm
                                <span class="text-red">(*)</span>
                              </label>
                              <input
                                type="number"
                                required
                                min="1"
                                value
                                name="phongtam"
                                class="form-control" />
                            </div>
                          </div>

                          <div class="col-6 col-lg-3">
                            <div class="form-group-cnt3">
                              <label class="form-label-cnt3">Hướng cửa chính
                                <span class="text-red">(*)</span>
                              </label>
                              <select
                                class="form-control"
                                name="direction"
                                required>
                                <option selected value>-</option>
                                <option value="1">Đông</option>
                                <option value="2">Tây</option>
                                <option value="3">Nam</option>
                                <option value="4">Bắc</option>
                                <option value="5">Đông Bắc</option>
                                <option value="6">Đông Nam</option>
                                <option value="7">Tây Bắc</option>
                                <option value="8">Tây Nam</option>
                              </select>
                            </div>
                          </div>
                        </div>

                        <h3 class="cnt-hdeg">Diện tích &amp; Giá</h3>
                        <div class="area-price">
                          <div class="row">
                            <div class="col-6">
                              <div class="form-group-cnt2">
                                <label class="form-label-cnt3">Diện tích đất
                                  <span class="text-red">(*)</span></label>
                                <div class="input-group1">
                                  <input
                                    type="number"
                                    name="dien-tich-dat"
                                    class="form-control" />
                                  <div class="input-append">
                                    <span class="input-text">m²</span>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-6">
                              <div class="form-group-cnt2">
                                <label class="form-label-cnt3">Diện tích xây
                                  dựng</label>
                                <div class="input-group1">
                                  <input
                                    type="number"
                                    min="0"
                                    name="dien-tich-xay-dung"
                                    class="form-control" />
                                  <div class="input-append">
                                    <span class="input-text">m²</span>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-6">
                              <div class="form-group-cnt2">
                                <label class="form-label-cnt3">Ngang mặt
                                  tiền<span
                                    class="text-red">(*)</span></label>
                                <div class="input-group1">
                                  <input
                                    required
                                    type="number"
                                    name="width-m"
                                    class="form-control" />
                                  <div class="input-append">
                                    <span class="input-text">m</span>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-6">
                              <div class="form-group-cnt2">
                                <label class="form-label-cnt3">Chiều
                                  dài<span
                                    class="text-red">(*)</span></label>
                                <div class="input-group1">
                                  <input
                                    type="number"
                                    name="length-m"
                                    class="form-control" />
                                  <div class="input-append">
                                    <span class="input-text">m</span>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="row" id=" ">
                            <div class="col-12">
                              <div class="form-group-cnt2">
                                <label class="form-label-cnt3 price-change-here">Giá thuê
                                  <span class="text-red">(*)</span></label>
                                <div class="input-group1">
                                  <input
                                    type="text"
                                    class="form-control"
                                    name="price" />
                                  <div class="input-append">
                                    <span class="input-text">đ</span>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="row" id=" ">
                            <div class="col-12">
                              <div class="form-group-cnt2">
                                <label class="form-label-cnt3">Số tiền cọc
                                  <span class="text-red">(*)</span></label>
                                <div class="input-group1">
                                  <input
                                    type="text"
                                    class="form-control"
                                    name="deposit" />
                                  <div class="input-append">
                                    <span class="input-text">đ</span>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>

                          <h3 class="cnt-hdeg">Thông tin thêm</h3>
                          <div class="row">
                            <div class="content-loca col-12">
                              <div class="form-group-cnt4">
                                <div class="form-label-cnt5">Vị trí:</div>
                                <label for="trongngo" class="rd-1">
                                  <input type="radio" name="alley" id="trongngo" />
                                  <div>Trong ngõ, hẻm</div>
                                </label>
                                <label for="mattien" class="rd-2">
                                  <input type="radio" name="alley" id="mattien" />
                                  <div>Mặt Tiền, Phố</div>
                                </label>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-6 col-lg-3">
                              <div class="form-group-cnt3">
                                <div class="form-group-cnt2">
                                  <label class="form-label-cnt3">Đường (hẻm)
                                    vào rộng
                                    <span class="text-red">(*)</span>
                                  </label>
                                  <div class="input-group1">
                                    <input
                                      type="number"
                                      name="alley-width"
                                      class="form-control" />
                                    <div class="input-append">
                                      <span class="input-text">m²</span>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-6 col-lg-3">
                              <div class="form-group-cnt3">
                                <label class="form-label-cnt3">Loại đường
                                  <span class="text-red">(*)</span>
                                </label>
                                <select
                                  class="form-control"
                                  name="loai-duong"
                                  required>
                                  <option selected value>-</option>
                                  <option value=" ">Đường nhựa</option>
                                  <option value=" ">Đường bê tông</option>
                                  <option value=" ">Đường đất</option>
                                  <option value=" ">Đường đá</option>
                                </select>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-12">
                              <div class="form-group-cnt2">
                                <label class="form-label-cnt3">Pháp lý <span
                                    class="text-red">(*)</span>
                                </label>
                                <select
                                  class="form-control"
                                  name="phap-ly"
                                  required>
                                  <option value>-</option>
                                  <option value="1">Sổ hồng</option>
                                  <option value="2">Sổ đỏ</option>
                                  <option value="3">Sổ trắng</option>
                                  <option value="4">Giấy chứng nhận</option>
                                  <option value="5">Chưa có sổ</option>
                                  <option value="6">Sổ chung</option>
                                </select>
                              </div>
                              <div class="form-group-cnt2">
                                <label class="form-label-cnt3">Chi tiết pháp
                                  lý<span
                                    class="text-red">(*)</span></label>
                                <textarea
                                  class="form-control"
                                  name="chi-tiet-phap-ly"
                                  placeholder="Ví dụ: Đang cầm cố ngân hàng, sổ có chung nhiều người, có đang tranh chấp kiện tụng, có đang phát mãi, ..."></textarea>
                              </div>
                            </div>
                          </div>

                          <h3 class="cnt-hdeg">Tiêu đề &amp; Mô tả</h3>
                          <div class="form-group-cnt2">
                            <label class="form-label-cnt3">Tiêu đề tin
                              đăng<span class="text-red">(*)</span></label>
                            <input
                              type="text"
                              required
                              name="tieu-de-tin-dang"
                              class="form-control"
                              placeholder="Tiêu đề ngắn gọn cho tin đăng" />
                          </div>
                          <div class="form-group-cnt2">
                            <label class="form-label-cnt3">Tiện ích, mô tả
                              BĐS</label>
                            <textarea
                              name="tien-ich-mo-ta"
                              class="form-control"
                              placeholder="Ví dụ: Khu vui chơi, bể bơi, phòng tập, công viên, hồ điều hòa,..."
                              rows="8"></textarea>
                          </div>
                        </div>
                      </div>
                    </div> --}}

                                <!--form cho thuê nhà-->
                                {{-- <div class="bds-type-content nha d-none">
                      <div class="btn-cnt-type">
                        <h3 class="cnt-hdeg">Địa chỉ bất động sản</h3>
                        <div class="form-group-cnt1 name-land-style">
                          <label for class="form-lable-cnt3"
                            style="font-size: 15px">Tên tòa nhà / khu dân cư
                            /Dự án
                            <span class="text-red">(*)</span></label>
                          <input type="text" class="search-input" id="name-building-real-estate"
                            placeholder=" " />
                        </div>
                        <div class="form-group-cnt1 mt-3">
                          <label for class="form-lable-cnt3"
                            style="font-size: 15px">
                            Địa chỉ nhà <span class="text-red">(*)</span>
                          </label>
                          <a id="" class="form-control toggle-address-form" style="cursor: pointer;"> </a>
                        </div>

                        <div class="row">
                          <div class="col-12">
                            <div class="form-group-cnt3">
                              <label class="form-label-cnt3">Tọa độ vị
                                trí<span class="text-red">(*)</span></label>
                              <div class="input-group1">
                                <input
                                  type="text"
                                  class="form-control"
                                  name="toa-do-vi-tri"
                                  placeholder="10.787281170604397, 106.64923009534502" />
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row soto-sothua">
                          <div class="col-6">
                            <div class="form-group-cnt3">
                              <label class="form-label-cnt3">Số Thửa<span
                                  class="text-red">(*)</span></label>
                              <div class="input-group1">
                                <input
                                  type="text"
                                  name="sothua"
                                  class="form-control" />
                              </div>
                            </div>
                          </div>
                          <div class="col-6">
                            <div class="form-group-cnt3">
                              <label class="form-label-cnt3">Số tờ<span
                                  class="text-red">(*)</span></label>
                              <div class="input-group1">
                                <input
                                  type="text"
                                  class="form-control"
                                  name="soto" />
                              </div>
                            </div>
                            <div class="form-add text-right">
                              <button type="button" class="btn btn-to-thua">
                                <i class="bx bx-add-to-queue"></i>Thêm tờ
                                thửa
                              </button>
                            </div>
                          </div>
                        </div>

                        <h3 class="cnt-hdeg">Thông tin BĐS</h3>

                        <div class="row">
                          <div class="col-custom">
                            <div class="form-group-cnt2">
                              <label class="form-label-cnt3">Số phòng ngủ
                                <span class="text-red">(*)</span>
                              </label>
                              <input
                                type="number"
                                required
                                min="1"
                                value
                                name="phong-ngu"
                                class="form-control" />
                            </div>
                          </div>
                          <div class="col-custom">
                            <div class="form-group-cnt2">
                              <label class="form-label-cnt3">Hướng cửa chính
                                <span class="text-red">(*)</span>
                              </label>
                              <select
                                class="form-control"
                                name="direction"
                                required>
                                <option selected value>-</option>
                                <option value="1">Đông</option>
                                <option value="2">Tây</option>
                                <option value="3">Nam</option>
                                <option value="4">Bắc</option>
                                <option value="5">Đông Bắc</option>
                                <option value="6">Đông Nam</option>
                                <option value="7">Tây Bắc</option>
                                <option value="8">Tây Nam</option>
                              </select>
                            </div>
                          </div>
                          <div class="col-custom">
                            <div class="form-group-cnt2">
                              <label class="form-label-cnt3">Số Tầng
                                <span class="text-red">(*)</span></label>
                              <input
                                required
                                type="number"
                                name="so-tang"
                                min="0"
                                value
                                class="form-control" />
                            </div>
                          </div>
                        </div>

                        <h3 class="cnt-hdeg">Diện tích &amp; Giá</h3>
                        <div class="area-price">
                          <div class="row">
                            <div class="col-6">
                              <div class="form-group-cnt2">
                                <label class="form-label-cnt3">Diện tích đất
                                  <span class="text-red">(*)</span></label>
                                <div class="input-group1">
                                  <input
                                    type="number"
                                    name="dien-tich-dat"
                                    class="form-control" />
                                  <div class="input-append">
                                    <span class="input-text">m²</span>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-6">
                              <div class="form-group-cnt2">
                                <label class="form-label-cnt3">Diện tích xây
                                  dựng</label>
                                <div class="input-group1">
                                  <input
                                    type="number"
                                    min="0"
                                    name="dien-tich-xay-dung"
                                    class="form-control" />
                                  <div class="input-append">
                                    <span class="input-text">m²</span>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-6">
                              <div class="form-group-cnt2">
                                <label class="form-label-cnt3">Ngang mặt
                                  tiền<span
                                    class="text-red">(*)</span></label>
                                <div class="input-group1">
                                  <input
                                    required
                                    type="number"
                                    name="width-m"
                                    class="form-control" />
                                  <div class="input-append">
                                    <span class="input-text">m</span>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-6">
                              <div class="form-group-cnt2">
                                <label class="form-label-cnt3">Chiều
                                  dài<span
                                    class="text-red">(*)</span></label>
                                <div class="input-group1">
                                  <input
                                    type="number"
                                    name="length-m"
                                    class="form-control" />
                                  <div class="input-append">
                                    <span class="input-text">m</span>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="row" id=" ">
                            <div class="col-12">
                              <div class="form-group-cnt2">
                                <label class="form-label-cnt3 price-change-here">Giá thuê
                                  <span class="text-red">(*)</span></label>
                                <div class="input-group1">
                                  <input
                                    type="text"
                                    class="form-control"
                                    name="price" />
                                  <div class="input-append">
                                    <span class="input-text">đ</span>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="row" id=" ">
                            <div class="col-12">
                              <div class="form-group-cnt2">
                                <label class="form-label-cnt3">Số tiền cọc
                                  <span class="text-red">(*)</span></label>
                                <div class="input-group1">
                                  <input
                                    type="text"
                                    class="form-control"
                                    name="deposit" />
                                  <div class="input-append">
                                    <span class="input-text">đ</span>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>

                        <h3 class="cnt-hdeg">Thông tin thêm</h3>
                        <div class="row">
                          <div class="content-loca col-12">
                            <div class="form-group-cnt4">
                              <div class="form-label-cnt5">Vị trí:</div>
                              <label for="trongngo" class="rd-1">
                                <input type="radio" name="alley" id="trongngo" />
                                <div>Trong ngõ, hẻm</div>
                              </label>
                              <label for="mattien" class="rd-2">
                                <input type="radio" name="alley" id="mattien" />
                                <div>Mặt Tiền, Phố</div>
                              </label>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-6 col-lg-3">
                            <div class="form-group-cnt3">
                              <div class="form-group-cnt2">
                                <label class="form-label-cnt3">Đường (hẻm)
                                  vào rộng
                                  <span class="text-red">(*)</span>
                                </label>
                                <div class="input-group1">
                                  <input
                                    type="number"
                                    name="alley-width"
                                    class="form-control" />
                                  <div class="input-append">
                                    <span class="input-text">m²</span>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-6 col-lg-3">
                            <div class="form-group-cnt3">
                              <label class="form-label-cnt3">Loại đường
                                <span class="text-red">(*)</span>
                              </label>
                              <select
                                class="form-control"
                                name="loai-duong"
                                required>
                                <option selected value>-</option>
                                <option value="1">Đường nhựa</option>
                                <option value="2">Đường bê tông</option>
                                <option value="3">Đường đất</option>
                                <option value="4">Đường đá</option>
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-12">
                            <div class="form-group-cnt2">
                              <label class="form-label-cnt3">Pháp lý <span
                                  class="text-red">(*)</span>
                              </label>
                              <select
                                class="form-control"
                                name="phap-ly"
                                required>
                                <option value>-</option>
                                <option value="1">Sổ hồng</option>
                                <option value="2">Sổ đỏ</option>
                                <option value="3">Sổ trắng</option>
                                <option value="4">Giấy chứng nhận</option>
                                <option value="5">Chưa có sổ</option>
                                <option value="6">Sổ chung</option>
                              </select>
                            </div>
                            <div class="form-group-cnt2">
                              <label class="form-label-cnt3">Chi tiết pháp
                                lý<span class="text-red">(*)</span></label>
                              <textarea
                                class="form-control"
                                name="chi-tiet-phap-ly"
                                placeholder="Ví dụ: Đang cầm cố ngân hàng, sổ có chung nhiều người, có đang tranh chấp kiện tụng, có đang phát mãi, ..."></textarea>
                            </div>
                          </div>
                        </div>

                        <h3 class="cnt-hdeg">Tiêu đề &amp; Mô tả</h3>
                        <div class="form-group-cnt2">
                          <label class="form-label-cnt3">Tiêu đề tin
                            đăng<span class="text-red">(*)</span></label>
                          <input
                            type="text"
                            required
                            name="tieu-de-tin-dang"
                            class="form-control"
                            placeholder="Tiêu đề ngắn gọn cho tin đăng" />
                        </div>
                        <div class="form-group-cnt2">
                          <label class="form-label-cnt3">Tiện ích, mô tả
                            BĐS</label>
                          <textarea
                            name="tien-ich-mo-ta"
                            class="form-control"
                            placeholder="Ví dụ: Khu vui chơi, bể bơi, phòng tập, công viên, hồ điều hòa,..."
                            rows="8"></textarea>
                        </div>
                      </div>
                    </div> --}}

                                <!--Form căn hộ-->
                                {{-- <div class="bds-type-content canho d-none">
                      <div class="btn-cnt-type">
                        <h3 class="cnt-hdeg">Địa chỉ bất động sản</h3>
                        <div class="form-group-cnt1 name-land-style">
                          <label
                            for
                            class="form-lable-cnt1"
                            style="font-size: 18px">Tên tòa nhà / khu dân cư
                            /Dự án
                            <span class="text-red">(*)</span></label>
                          <input
                            type="text"
                            class="search-input" id="name-building-real-estate"
                            placeholder=" " />
                        </div>
                        <div class="form-group-cnt1">
                          <label
                            for
                            class="form-lable-cnt1"
                            style="font-size: 18px">Địa chỉ căn hộ
                            <span class="text-red">(*)</span></label>
                          <a id="" class="form-control toggle-address-form" style="cursor: pointer;"></a>
                        </div>
                        <div class="row">
                          <div class="col-12">
                            <div class="form-group-cnt3">
                              <label class="form-label-cnt3">Tọa độ vị
                                trí<span class="text-red">(*)</span></label>
                              <div class="input-group1">
                                <input
                                  type="text"
                                  class="form-control"
                                  name="toa-do-vi-tri"
                                  placeholder="10.787281170604397, 106.64923009534502" />
                              </div>
                            </div>
                          </div>
                        </div>
                        <h3 class="cnt-hdeg">Vị trí BĐS</h3>
                        <div class="location">
                          <div class="row">
                            <div class="col-custom">
                              <div class="form-group-cnt2">
                                <label class="form-label-cnt3">Mã
                                  căn</label>
                                <input
                                  type="text"
                                  name="ma-can"
                                  class="form-control" />
                              </div>
                            </div>
                            <div class="col-custom">
                              <div class="form-group-cnt2">
                                <label
                                  class="form-label-cnt3">Block/Tháp</label>
                                <input
                                  type="text"
                                  class="form-control"
                                  name="block" />
                              </div>
                            </div>
                            <div class="col-custom">
                              <div class="form-group-cnt2">
                                <label class="form-label-cnt3">Tầng
                                  số</label>
                                <input
                                  type="text"
                                  class="form-control"
                                  name="tang-so" />
                              </div>
                            </div>
                          </div>
                        </div>
                        <h3 class="cnt-hdeg">Thông tin BĐS</h3>
                        <div class="infobds">
                          <div class="row">
                            <div class="col-custom">
                              <div class="form-group-cnt2">
                                <label class="form-label-cnt3">Số phòng ngủ
                                  <span class="text-red">(*)</span>
                                </label>
                                <input
                                  type="number"
                                  required
                                  min="1"
                                  value
                                  name="phong-ngu"
                                  class="form-control" />
                              </div>
                            </div>
                            <div class="col-custom">
                              <div class="form-group-cnt2">
                                <label class="form-label-cnt3">Số Tầng
                                  <span class="text-red">(*)</span></label>
                                <input
                                  required
                                  type="number"
                                  name="so-tang"
                                  min="0"
                                  value
                                  class="form-control" />
                              </div>
                            </div>
                            <div class="col-custom">
                              <div class="form-group-cnt2">
                                <label class="form-label-cnt3">Hướng ban
                                  công
                                  <span class="text-red">(*)</span>
                                </label>
                                <select
                                  class="form-control"
                                  name="direction"
                                  required>
                                  <option selected value>-</option>
                                  <option value="1">Đông</option>
                                  <option value="2">Tây</option>
                                  <option value="3">Nam</option>
                                  <option value="4">Bắc</option>
                                  <option value="5">Đông Bắc</option>
                                  <option value="6">Đông Nam</option>
                                  <option value="7">Tây Bắc</option>
                                  <option value="8">Tây Nam</option>
                                </select>
                              </div>
                            </div>
                          </div>
                        </div>

                        <h3 class="cnt-hdeg">Diện tích &amp; Giá</h3>
                        <div class="area-price">
                          <div class="row">
                            <div class="col-12">
                              <div class="form-group-cnt3">
                                <label class="form-label-cnt3">Tổng diện
                                  tích sàn
                                  <span class="text-red">(*)</span></label>
                                <div class="input-group1">
                                  <input
                                    type="number"
                                    required
                                    name="dien-tich-dat"
                                    min="10"
                                    class="form-control val-area-total"
                                    id="size" />
                                  <div class="input-append">
                                    <span class="input-text">m²</span>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-6">
                              <div class="form-group-cnt3">
                                <label class="form-label-cnt3">Chiều
                                  ngang<span
                                    class="text-red">(*)</span></label>
                                <div class="input-group1">
                                  <input
                                    type="number"
                                    min="1"
                                    class="form-control"
                                    name="width-m"
                                    step="0.1"
                                    inputmode="decimal" />
                                  <div class="input-append">
                                    <span class="input-text">m</span>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-6">
                              <div class="form-group-cnt3">
                                <label class="form-label-cnt3">Chiều
                                  dài<span
                                    class="text-red">(*)</span></label>
                                <div class="input-group1">
                                  <input
                                    type="text"
                                    class="form-control"
                                    name="length-m"
                                    step="0.1"
                                    inputmode="decimal" />
                                  <div class="input-append">
                                    <span class="input-text">m</span>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="row" id=" ">
                            <div class="col-12">
                              <div class="form-group-cnt2">
                                <label class="form-label-cnt3 price-change-here">Giá thuê
                                  <span class="text-red">(*)</span></label>
                                <div class="input-group1">
                                  <input
                                    type="text"
                                    class="form-control"
                                    name="price" />
                                  <div class="input-append">
                                    <span class="input-text">đ</span>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>

                        <h3 class="cnt-hdeg">Thông tin thêm</h3>
                        <div class="row">
                          <div class="col-12">
                            <div class="form-group-cnt2">
                              <label class="form-label-cnt3">Pháp lý <span
                                  class="text-red">(*)</span>
                              </label>
                              <select
                                class="form-control"
                                name="phap-ly"
                                required>
                                <option value>-</option>
                                <option value="1">Sổ hồng</option>
                                <option value="2">Sổ đỏ</option>
                                <option value="3">Sổ trắng</option>
                                <option value="4">Giấy chứng nhận</option>
                                <option value="5">Chưa có sổ</option>
                                <option value="6">Sổ chung</option>
                              </select>
                            </div>
                            <div class="form-group-cnt2">
                              <label class="form-label-cnt3">Chi tiết pháp
                                lý<span class="text-red">(*)</span></label>
                              <textarea
                                class="form-control"
                                name="chi-tiet-phap-ly"
                                placeholder="Ví dụ: Đang cầm cố ngân hàng, sổ có chung nhiều người, có đang tranh chấp kiện tụng, có đang phát mãi, ..."></textarea>
                            </div>
                          </div>
                        </div>

                        <h3 class="cnt-hdeg">Tiêu đề &amp; Mô tả</h3>
                        <div class="form-group-cnt2">
                          <label class="form-label-cnt3">Tiêu đề tin
                            đăng<span class="text-red">(*)</span></label>
                          <input
                            type="text"
                            required
                            name="tieu-de-tin-dang"
                            class="form-control"
                            placeholder="Tiêu đề ngắn gọn cho tin đăng" />
                        </div>
                        <div class="form-group-cnt2">
                          <label class="form-label-cnt3">Tiện ích, mô tả
                            BĐS</label>
                          <textarea
                            name="tien-ich-mo-ta"
                            class="form-control"
                            placeholder="Ví dụ: Khu vui chơi, bể bơi, phòng tập, công viên, hồ điều hòa,..."
                            rows="8"></textarea>
                        </div>
                      </div>
                    </div> --}}

                                <!--form cho đất-->
                                {{-- <div class="bds-type-content dat d-none">
                      <div class="btn-cnt-type">
                        <h3 class="cnt-hdeg">Địa chỉ bất động sản</h3>
                        <div class="form-group-cnt1 name-land-style">
                          <label
                            for
                            class="form-lable-cnt3"
                            style="font-size: 15px">Tên tòa nhà / khu dân cư
                            /Dự án
                            <span class="text-red">(*)</span></label>
                          <input
                            type="text"
                            class="search-input" id="name-building-real-estate"
                            placeholder=" " />
                        </div>
                        <div class="form-group-cnt1">
                          <label
                            for
                            class="form-lable-cnt3"
                            style="font-size: 15px">Địa chỉ đất
                            <span class="text-red">(*)</span></label>
                          <a id="" class="form-control toggle-address-form" style="cursor: pointer;"></a>
                        </div>
                        <div class="row">
                          <div class="col-12">
                            <div class="form-group-cnt3">
                              <label class="form-label-cnt3">Tọa độ vị
                                trí<span class="text-red">(*)</span></label>
                              <div class="input-group1">
                                <input
                                  type="text"
                                  class="form-control"
                                  name="toa-do-vi-tri"
                                  placeholder="10.787281170604397, 106.64923009534502" />
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row soto-sothua">
                          <div class="col-6">
                            <div class="form-group-cnt3">
                              <label class="form-label-cnt3">Số Thửa<span
                                  class="text-red">(*)</span></label>
                              <div class="input-group1">
                                <input
                                  type="text"
                                  name="sothua"
                                  class="form-control" />
                              </div>
                            </div>
                          </div>
                          <div class="col-6">
                            <div class="form-group-cnt3">
                              <label class="form-label-cnt3">Số tờ<span
                                  class="text-red">(*)</span></label>
                              <div class="input-group1">
                                <input
                                  type="text"
                                  class="form-control"
                                  name="soto" />
                              </div>
                            </div>
                            <div class="form-add text-right">
                              <button type="button" class="btn btn-to-thua">
                                <i class="bx bx-add-to-queue"></i>Thêm tờ
                                thửa
                              </button>
                            </div>
                          </div>
                        </div>

                        <h3 class="cnt-hdeg">Thông tin chi tiết</h3>

                        <div class="row">
                          <div class="col-6 col-lg-3">
                            <div class="form-group-cnt3">
                              <label class="form-label-cnt3">Hướng đất <span
                                  class="text-red">(*)</span>
                              </label>
                              <select
                                class="form-control"
                                name="direction"
                                required>
                                <option selected value>-</option>
                                <option value="1">Đông</option>
                                <option value="2">Tây</option>
                                <option value="3">Nam</option>
                                <option value="4">Bắc</option>
                                <option value="5">Đông Bắc</option>
                                <option value="6">Đông Nam</option>
                                <option value="7">Tây Bắc</option>
                                <option value="8">Tây Nam</option>
                              </select>
                            </div>
                          </div>
                        </div>

                        <h3 class="cnt-hdeg">Diện tích &amp; Giá</h3>
                        <div class="area-price">
                          <div class="row">
                            <div class="col-6">
                              <div class="form-group-cnt2">
                                <label class="form-label-cnt3">Diện tích đất
                                  <span class="text-red">(*)</span></label>
                                <div class="input-group1">
                                  <input
                                    type="number"
                                    name="dien-tich-dat"
                                    class="form-control" />
                                  <div class="input-append">
                                    <span class="input-text">m²</span>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-6">
                              <div class="form-group-cnt2">
                                <label class="form-label-cnt3">Diện tích thổ
                                  cư</label>
                                <div class="input-group1">
                                  <input
                                    type="number"
                                    min="0"
                                    class="form-control" />
                                  <div class="input-append">
                                    <span class="input-text">m²</span>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-6">
                              <div class="form-group-cnt2">
                                <label class="form-label-cnt3">Ngang mặt
                                  tiền<span
                                    class="text-red">(*)</span></label>
                                <div class="input-group1">
                                  <input
                                    required
                                    type="number"
                                    name="width-m"
                                    class="form-control" />
                                  <div class="input-append">
                                    <span class="input-text">m</span>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-6">
                              <div class="form-group-cnt2">
                                <label class="form-label-cnt3">Chiều
                                  dài<span
                                    class="text-red">(*)</span></label>
                                <div class="input-group1">
                                  <input
                                    type="number"
                                    name="length-m"
                                    class="form-control" />
                                  <div class="input-append">
                                    <span class="input-text">m</span>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="row" id=" ">
                            <div class="col-12">
                              <div class="form-group-cnt2">
                                <label class="form-label-cnt3 price-change-here">Giá thuê
                                  <span class="text-red">(*)</span></label>
                                <div class="input-group1">
                                  <input
                                    type="text"
                                    class="form-control"
                                    name="price" />
                                  <div class="input-append">
                                    <span class="input-text">đ</span>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-12">
                              <div class="form-group-cnt2">
                                <label class="form-label-cnt3">Số tiền cọc
                                  <span class="text-red">(*)</span></label>
                                <div class="input-group1">
                                  <input
                                    type="text"
                                    class="form-control"
                                    name="deposit" />
                                  <div class="input-append">
                                    <span class="input-text">đ</span>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>

                        <h3 class="cnt-hdeg">Thông tin thêm</h3>
                        <div class="row">
                          <div class="content-loca col-12">
                            <div class="form-group-cnt4">
                              <div class="form-label-cnt5">Vị trí:</div>
                              <label for="trongngo" class="rd-1">
                                <input type="radio" name="alley" id="trongngo" />
                                <div>Trong ngõ, hẻm</div>
                              </label>
                              <label for="mattien" class="rd-2">
                                <input type="radio" name="alley" id="mattien" />
                                <div>Mặt Tiền, Phố</div>
                              </label>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-6 col-lg-3">
                            <div class="form-group-cnt3">
                              <div class="form-group-cnt2">
                                <label class="form-label-cnt3">Đường (hẻm)
                                  vào rộng
                                  <span class="text-red">(*)</span>
                                </label>
                                <div class="input-group1">
                                  <input
                                    type="number"
                                    name="alley-width"
                                    class="form-control" />
                                  <div class="input-append">
                                    <span class="input-text">m²</span>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-6 col-lg-3">
                            <div class="form-group-cnt3">
                              <label class="form-label-cnt3">Loại đường
                                <span class="text-red">(*)</span>
                              </label>
                              <select
                                class="form-control"
                                name="loai-duong"
                                required>
                                <option selected value>-</option>
                                <option value=" ">Đường nhựa</option>
                                <option value=" ">Đường bê tông</option>
                                <option value=" ">Đường đất</option>
                                <option value=" ">Đường đá</option>
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-12">
                            <div class="form-group-cnt2">
                              <label class="form-label-cnt3">Pháp lý <span
                                  class="text-red">(*)</span>
                              </label>
                              <select
                                class="form-control"
                                name="phap-ly"
                                required>
                                <option value>-</option>
                                <option value="1">Sổ hồng</option>
                                <option value="2">Sổ đỏ</option>
                                <option value="3">Sổ trắng</option>
                                <option value="4">Giấy chứng nhận</option>
                                <option value="5">Chưa có sổ</option>
                                <option value="6">Sổ chung</option>
                              </select>
                            </div>
                            <div class="form-group-cnt2">
                              <label class="form-label-cnt3">Chi tiết pháp
                                lý<span class="text-red">(*)</span></label>
                              <textarea
                                class="form-control"
                                name="chi-tiet-phap-ly"
                                placeholder="Ví dụ: Đang cầm cố ngân hàng, sổ có chung nhiều người, có đang tranh chấp kiện tụng, có đang phát mãi, ..."></textarea>
                            </div>
                          </div>
                        </div>

                        <h3 class="cnt-hdeg">Tiêu đề &amp; Mô tả</h3>
                        <div class="form-group-cnt2">
                          <label class="form-label-cnt3">Tiêu đề tin
                            đăng<span class="text-red">(*)</span></label>
                          <input
                            type="text"
                            required
                            name="tieu-de-tin-dang"
                            class="form-control"
                            placeholder="Tiêu đề ngắn gọn cho tin đăng" />
                        </div>
                        <div class="form-group-cnt2">
                          <label class="form-label-cnt3">Tiện ích, mô tả
                            BĐS</label>
                          <textarea
                            name="tien-ich-mo-ta"
                            class="form-control"
                            placeholder="Ví dụ: Khu vui chơi, bể bơi, phòng tập, công viên, hồ điều hòa,..."
                            rows="8"></textarea>
                        </div>
                      </div>
                    </div> --}}

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>

       
    @endsection
    @section('js')
        <script>
            function changeCategory($type) {
                if ($type == 2) {
                    $('.price-change-here').text('Giá thuê');
                    $('#rent-section').css('display', 'block');
                    return;
                }

                $('.price-change-here').text('Giá bán');
                $('#rent-section').css('display', 'none');
            }

            $('.select3').on('change', function() {
                var value = $(this).val();
                var type = $('input[name="category"]:checked').val();
                if (type == 'rent') {
                    $('.soto-sothua').css('display', 'none');
                    $('.name-land-style').css('display', 'none');
                } else {
                    $('.soto-sothua').css('display', 'block');
                    $('.name-land-style').css('display', 'block');
                }

                $.ajax({
                    url: "{{ route('getForm') }}",
                    method: 'post',
                    data: {
                        _token: "{{ csrf_token() }}",
                        value: value,
                        type: type
                    },
                    success: function(data) {
                        $('.bds-type-content').html(data);
                        $('.toggle-address-form').on('click', function(e) {
                            e.preventDefault();
                            $('.card-address').toggle();
                        });

                        $('#btn-add-item').on('click', function() {
                            $('#Modal__AddRoad').modal('show');

                        });

                        $('.btn-se').on('click', function() {
                            $('.card-address').css('display', 'none');
                        });

                        $(".btn-primary1").on('click', function() {
                            var regex = /^[a-zA-Z0-9]+(\/[a-zA-Z0-9]+)*$/;
                            var regexLienKe = /^[a-zA-Z0-9]+-[a-zA-Z0-9]+$/;
                            var regexNumber = /^[0-9]+$/;

                            if ($('#city_select').val() == '' || $('#district_select').val() ==
                                '' || $('#ward_select').val() == '' || $('#street_select').val() ==
                                '' || $('#city_select').val() == null || $('#district_select')
                            .val() == null || $('#ward_select').val() == null || $('#street_select')
                                .val() == null) {
                                alert('Vui lòng chọn đầy đủ thông tin');
                                return;
                            }

                            if (!regexNumber.test($('.address-input').val())) {
                              if($('.address-input').val().indexOf('/') != -1) {
                                if (!regex.test($('.address-input').val())) {
                                    alert('Vui lòng nhập đúng định dạng địa chỉ');
                                    return;
                                }
                              } else if($('.address-input').val().indexOf('-') != -1) {
                                if (!regexLienKe.test($('.address-input').val())) {
                                    alert('Vui lòng nhập đúng định dạng địa chỉ');
                                    return;
                                }
                              } else {
                                if(!regex.test($('.address-input').val())) {
                                  alert('Vui lòng nhập đúng định dạng địa chỉ');
                                  return;
                                }
                              }
                            }


                            var address = $('.address-input').val() + ', ' + $(
                                '#street_select option:selected').text() + ', ' + $(
                                '#ward_select option:selected').text() + ', ' + $(
                                '#district_select option:selected').text() + ', ' + $(
                                '#city_select option:selected').text();
                            $('.toggle-address-form').text(address);
                            $('input[name="district_id_hidden"]').val($('#district_select').val());
                            $('input[name="ward_id_hidden"]').val($('#ward_select').val());
                            $('input[name="street_id_hidden"]').val($('#street_select').val());
                            $('input[name="address_value_hidden"]').val($('.address-input').val());
                            $('.card-address').css('display', 'none');
                        });

                        $('input[name="user_type"]').on('change', function() {
                            if ($(this).val() == 1) {
                                $('.landlord-info').removeClass('d-none');
                                $('.form-first-info').addClass('d-none');
                            } else {
                                $('.landlord-info').addClass('d-none');
                                $('.form-first-info').removeClass('d-none');
                            }
                        });

                        $('.btn-submit-ppt').on('click', function(e) {
                          e.preventDefault();
                          var images = $('#file_real').prop('files');
                          var user_type = $('input[name="user_type"]:checked').val();
                          var address_value_hidden = $('input[name="address_value_hidden"]').val();
                          var street_id_hidden = $('input[name="street_id_hidden"]').val();
                          var ward_id_hidden = $('input[name="ward_id_hidden"]').val();
                          var district_id_hidden = $('input[name="district_id_hidden"]').val();
                          var direction = $('select[name="direction"]').val();
                          var dien_tich_dat = $('input[name="dien_tich_dat"]').val();
                          var width_m = $('input[name="width-m"]').val();
                          var length_m = $('input[name="length-m"]').val();
                          var price = $('input[name="price"]').val();
                          var tieu_de_tin_dang = $('input[name="tieu_de_tin_dang"]').val();
                          var avatar = $('#avatar').prop('files');
                          var isAvatarCode = $('#isAvatarCode');

                          if(isAvatarCode.is(':checked')) {
                            let listNameImages = $('#listNameImages').val();
                            if(listNameImages == '') {
                              alert('Vui lòng nhập mã tin');
                              return;
                            }
                          } else {
                            if(avatar.length == 0) {
                              alert('Vui lòng chọn ảnh đại diện');
                              $('#avatar').focus();
                              return;
                            }
                          }

                          if(dien_tich_dat == '') {
                            alert('Vui lòng nhập diện tích đất');
                            return;
                          }

                          if(width_m == '' || length_m == '') {
                            alert('Vui lòng nhập chiều ngang và chiều dài');
                            return;
                          }

                          if(price == '') {
                            alert('Vui lòng nhập giá');
                            return;
                          }

                          if(tieu_de_tin_dang == '') {
                            alert('Vui lòng nhập tiêu đề tin đăng');
                            return;
                          }

                          if(user_type == 1) {
                            var type_name = $('input[name="type_name"]:checked').val();
                            if(type_name != null) {
                              var landlord_phone = $('input[name="landlord_phone"]').val();
                              var landlord_name = $('input[name="landlord_name"]').val();

                              if(landlord_phone != '' && landlord_name != '') {
                                if(landlord_phone.indexOf(',') != -1 && landlord_name.indexOf(',') == -1) {
                                  alert('Nếu thêm nhiều số điện thoại vui lòng nhập tên cũng tương ứng với số điện thoại có');
                                  return;
                                } else if(landlord_phone.indexOf(',') == -1 && landlord_name.indexOf(',') != -1) {
                                  alert('Nếu thêm nhiều tên vui lòng nhập số điện thoại cũng tương ứng với tên có');
                                  return;
                                } else {
                                    if(address_value_hidden == '' || street_id_hidden == '' || ward_id_hidden == '' || district_id_hidden == '') {
                                      $('html, body').animate({
                                        scrollTop: $(".toggle-address-form").offset().top
                                      }, 1000);
                                      alert('Vui lòng chọn địa chỉ');
                                      return;
                                    }
                                    if(direction == '' || direction == null) {
                                      $('html, body').animate({
                                        scrollTop: $(".form-group-cnt3:nth-child(1)").offset().top
                                      }, 1000);
                                      alert('Vui lòng chọn hướng nhà');
                                      return;
                                    }
                                  $('#form-post-product').submit();
                                }
                              } else {
                                alert('Vui lòng nhập đầy đủ thông tin chủ nhà');
                                return;
                              }
                            } else {
                              alert('Vui lòng chọn loại chủ nhà');
                              return;
                            
                            }
                          } else {
                              if(address_value_hidden == '' || street_id_hidden == '' || ward_id_hidden == '' || district_id_hidden == '') {
                                $('html, body').animate({
                                  scrollTop: $(".toggle-address-form").offset().top
                                }, 1000);
                                alert('Vui lòng chọn địa chỉ');
                                return;
                              }
                              if(direction == '' || direction == null) {
                                $('html, body').animate({
                                  scrollTop: $(".form-group-cnt3:nth-child(1)").offset().top
                                }, 1000);
                                alert('Vui lòng chọn hướng nhà');
                                return;
                              }

                              $('#form-post-product').submit();
                          }
                        });

                    }
                });
            });


            $('#city_select').on('change', function() {
                $.ajax({
                    url: "{{ route('fetch.get-district') }}",
                    type: 'post',
                    data: {
                        _token: "{{ csrf_token() }}",
                        city_id: $(this).val()
                    },
                    success: function(data) {
                        for (let i = 0; i < data.length; i++) {
                            $('#district_select').append('<option value="' + data[i].DistrictID + '">' +
                                data[i].DistrictName + '</option>');
                        }
                    }
                });
            });

            $('#district_select').on('change', function() {
                $.ajax({
                    url: "{{ route('fetch.get-ward') }}",
                    type: 'post',
                    data: {
                        _token: "{{ csrf_token() }}",
                        district_id: $(this).val()
                    },
                    success: function(data) {
                        $('#ward_select').empty();
                        $('#street_select').empty();
                        $('#ward_select').append('<option value="">Vui lòng chọn</option>');
                        for (let i = 0; i < data.length; i++) {
                            $('#ward_select').append('<option value="' + data[i].WardID + '">' + data[i]
                                .WardName + '</option>');
                        }
                    }
                });
            });

            $('#ward_select').on('change', function() {
                $.ajax({
                    url: "{{ route('fetch.get-street') }}",
                    type: 'post',
                    data: {
                        _token: "{{ csrf_token() }}",
                        ward_id: $(this).val()
                    },
                    success: function(data) {
                        $('#street_select').empty();
                        $('#street_select').append('<option value="">Vui lòng chọn</option>');
                        for (let i = 0; i < data.length; i++) {
                            $('#street_select').append('<option value="' + data[i].StreetID + '">' + data[i]
                                .StreetName + '</option>');
                        }
                    }
                });
            });

            $('#city_select_addroad').on('change', function() {
                $.ajax({
                    url: "{{ route('fetch.get-district') }}",
                    type: 'post',
                    data: {
                        _token: "{{ csrf_token() }}",
                        city_id: $(this).val()
                    },
                    success: function(data) {
                        for (let i = 0; i < data.length; i++) {
                            $('#district_select_addroad').append('<option value="' + data[i].DistrictID +
                                '">' + data[i].DistrictName + '</option>');
                        }
                    }
                });
            });

            $('#district_select_addroad').on('change', function() {
                $.ajax({
                    url: "{{ route('fetch.get-ward') }}",
                    type: 'post',
                    data: {
                        _token: "{{ csrf_token() }}",
                        district_id: $(this).val()
                    },
                    success: function(data) {
                        $('#ward_select_addroad').empty();
                        for (let i = 0; i < data.length; i++) {
                            $('#ward_select_addroad').append('<option value="' + data[i].WardID + '">' +
                                data[i].WardName + '</option>');
                        }
                    }
                });
            });
        </script>

        <script>
            function previewImages(input, id) {
                var files = input.files;
                $(id).empty();
                for (var i = 0; i < files.length; i++) {
                    var file = files[i];
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        var template = `<div class="img-item">
                                        <img style="height: 120px;" src="${e.target.result}" alt="image">
                                      </div>`;
                        $(id).append(template);
                    };
                    reader.readAsDataURL(file);
                }
            }

            $('.btn-to-thua').on('click', function() {
                alert('Chức năng đang phát triển');
            });
        </script>
        <script>
          $(document).ready(function() {
              $('.form-control1').select2({
                  minimumResultsForSearch: 0,
                  width: 'resolve',
                  dropdownCssClass: 'bigdrop'
              }).on('select2:open', function() {
                  let searchField = $('.select2-search__field');
                  searchField.attr('placeholder', 'Tìm kiếm');
              });
          });
      </script>

      <script>
        $('#isAvatarCode').click(function() {
          if($(this).is(':checked')) {
            $('.cnt-code-avatar-up').removeClass('d-none');
            $('.avatar-class').addClass('d-none');
            $('.images-class').addClass('d-none');
          } else {
            $('.cnt-code-avatar-up').addClass('d-none');
            $('.avatar-class').removeClass('d-none');
            $('.images-class').removeClass('d-none');
          }
        });

        $("#getImageGuland").click(function() {
          let code = $('#avatarCode').val();

          if(code == '') {
            alert('Vui lòng nhập mã');
            return;
          }

          document.querySelector('.loading-robot').classList.remove('d-none');
          document.querySelector('.loading-robot').style.display = 'flex';

          $.ajax({
            url: "{{ route('method.process-images') }}",
            type: 'post',
            data: {
              _token: "{{ csrf_token() }}",
              code: code
            },
            success: function(data) {
              document.querySelector('.loading-robot').classList.add('d-none');
              document.querySelector('.loading-robot').style.display = 'none';
              if(data.status) {
                $('#listNameImages').val(data.data);
                $('#avatarCode').attr('readonly', true);
                $('#getImageGuland').attr('disabled', true);
                $('#getImageGuland').css('cursor', 'not-allowed');
                alert('Lấy thành công ' + data.count + ' ảnh từ mã tin ' + code);
              } else {
                alert('Mã không tồn tại');
              }
            }
          });
        });
      </script>
    
      
      
    @endsection
