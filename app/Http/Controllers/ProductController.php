<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\categoryproduct;
use Illuminate\Support\Facades\Auth;
use App\Models\products;
use Illuminate\Support\Str;
use App\Models\imageproduct;
use App\Models\product_utilities;
use App\Models\apartmentinfo;
use App\Models\areaproduct;
use App\Models\alleyproduct;
use App\Models\addressproduct;
use App\Models\infoclientproduct;
use App\Models\businessinfo;
use App\Models\houseinfo;
use App\Models\streetapi;
use App\Models\subcategoryproduct;
use Illuminate\Support\Facades\DB;
use App\Models\users;
use App\Models\roleusers;
use App\Models\product_wishlists;
use App\Models\product_surveies;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use App\Models\customer_warehouse;
use App\Models\warehouse;
use App\Models\option_warehouse;
use App\Models\value_warehouse;
use App\Models\product_marketing;
use App\Models\areauser;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;
use App\Models\income_expenditure;
use App\Models\income_expenditure_categories;
use PHPViet\NumberToWords\Transformer;

class ProductController extends Controller
{
    public function choThue(request $request)
    {
        $request = Request::capture();
        $title = 'Cho thuê nhà đất bất động sản ';
        $type_collection = 'cho-thue';
        $role = Controller::getRole();
        $description = 'Cho thuê nhà đất bất động sản Việt Nam chính chủ giá rẻ.
          Bất động sản Guland đăng tin cho thuê nhà đất chính chủ, môi giới giá rẻ, đầy đủ tiện ích, tiện di chuyển, an ninh, thoáng mát.
        ';
        if(session('fill_city_id') && session('fill_district_id') && !session('fill_ward_id') && session('fill_street_id')) {
            $products = products::select('products.*', 'areaproduct.height as AreaHeight', 'areaproduct.width as AreaWidth', 'addressproduct.WardID',
             'addressproduct.StreetID', 'addressproduct.addressnumber', 'addressproduct.DistrictID', 'addressproduct.CityID', 'addressproduct.WardID', 'roleusers.UpperID',
             'users.fullName', 'users.phone as userPhone',
             'subcategoryproduct.name as subName', 'subcategoryproduct.slug as subSlug',
             'categoryproduct.name as cateName', 'categoryproduct.slug as cateSlug')
                ->join('areaproduct', 'areaproduct.ProductID', '=', 'products.ProductID')
                ->join('addressproduct', 'addressproduct.ProductID', '=', 'products.ProductID')
                ->join('roleusers', 'roleusers.UserID', '=', 'products.UserID')
                ->join('users', 'users.id', '=', 'products.UserID')
                ->join('subcategoryproduct', 'subcategoryproduct.id', '=', 'products.CategoryID')
                ->join('streetapi', 'streetapi.StreetID', '=', 'addressproduct.StreetID')
                ->join('categoryproduct', 'categoryproduct.CategoryID', '=', 'subcategoryproduct.CategoryID')
                ->where('products.TypeProduct', 1)
                ->where('addressproduct.CityID', session('fill_city_id'))
                ->where('addressproduct.DistrictID', session('fill_district_id'))
                ->where('streetapi.StreetName', 'like', '%' . Controller::convertAddressFromIDToName(session('fill_street_id'), '\App\Models\streetapi', 'StreetID') . '%')
                ->orderBy('products.updated_at', 'desc')
                ->get();

            $title .= Controller::convertAddressFromIDToName(session('fill_street_id'), '\App\Models\streetapi', 'StreetID') . ', ' . Controller::convertAddressFromIDToName(session('fill_district_id'), '\App\Models\districtapi', 'DistrictID') . ', ' . Controller::convertAddressFromIDToName(session('fill_city_id'), '\App\Models\cityapi', 'CityID');
        } else if(session('fill_city_id')) {
            if(session('fill_street_id')) {
                $products = products::select('products.*', 'areaproduct.height as AreaHeight', 'areaproduct.width as AreaWidth', 'addressproduct.WardID',
                 'addressproduct.StreetID', 'addressproduct.addressnumber', 'addressproduct.DistrictID', 'addressproduct.CityID', 'addressproduct.WardID', 'roleusers.UpperID',
                 'users.fullName', 'users.phone as userPhone',
                 'subcategoryproduct.name as subName', 'subcategoryproduct.slug as subSlug',
                 'categoryproduct.name as cateName', 'categoryproduct.slug as cateSlug')
                    ->join('areaproduct', 'areaproduct.ProductID', '=', 'products.ProductID')
                    ->join('addressproduct', 'addressproduct.ProductID', '=', 'products.ProductID')
                    ->join('roleusers', 'roleusers.UserID', '=', 'products.UserID')
                    ->join('users', 'users.id', '=', 'products.UserID')
                    ->join('subcategoryproduct', 'subcategoryproduct.id', '=', 'products.CategoryID')
                    ->join('categoryproduct', 'categoryproduct.CategoryID', '=', 'subcategoryproduct.CategoryID')
                    ->where('products.TypeProduct', 1)
                    ->where('addressproduct.CityID', session('fill_city_id'))
                    ->where('addressproduct.DistrictID', session('fill_district_id'))
                    ->where('addressproduct.WardID', session('fill_ward_id'))
                    ->where('addressproduct.StreetID', session('fill_street_id'))
                    ->orderBy('products.updated_at', 'desc')
                    ->get();

                $title .= Controller::convertAddressFromIDToName(session('fill_street_id'), '\App\Models\streetapi', 'StreetID') . ', ' . Controller::convertAddressFromIDToName(session('fill_ward_id'), '\App\Models\wardapi', 'WardID') . ', ' . Controller::convertAddressFromIDToName(session('fill_district_id'), '\App\Models\districtapi', 'DistrictID') . ', ' . Controller::convertAddressFromIDToName(session('fill_city_id'), '\App\Models\cityapi', 'CityID');
            } else if(session('fill_ward_id')) {
                $products = products::select('products.*', 'areaproduct.height as AreaHeight', 'areaproduct.width as AreaWidth', 'addressproduct.WardID',
                 'addressproduct.StreetID', 'addressproduct.addressnumber', 'addressproduct.DistrictID', 'addressproduct.CityID', 'addressproduct.WardID', 'roleusers.UpperID',
                 'users.fullName', 'users.phone as userPhone',
                 'subcategoryproduct.name as subName', 'subcategoryproduct.slug as subSlug',
                 'categoryproduct.name as cateName', 'categoryproduct.slug as cateSlug')
                    ->join('areaproduct', 'areaproduct.ProductID', '=', 'products.ProductID')
                    ->join('addressproduct', 'addressproduct.ProductID', '=', 'products.ProductID')
                    ->join('roleusers', 'roleusers.UserID', '=', 'products.UserID')
                    ->join('users', 'users.id', '=', 'products.UserID')
                    ->join('subcategoryproduct', 'subcategoryproduct.id', '=', 'products.CategoryID')
                    ->join('categoryproduct', 'categoryproduct.CategoryID', '=', 'subcategoryproduct.CategoryID')
                    ->where('products.TypeProduct', 1)
                    ->where('addressproduct.CityID', session('fill_city_id'))
                    ->where('addressproduct.DistrictID', session('fill_district_id'))
                    ->where('addressproduct.WardID', session('fill_ward_id'))
                    ->orderBy('products.updated_at', 'desc')
                    ->get();

                $title .= Controller::convertAddressFromIDToName(session('fill_ward_id'), '\App\Models\wardapi', 'WardID') . ', ' . Controller::convertAddressFromIDToName(session('fill_district_id'), '\App\Models\districtapi', 'DistrictID') . ', ' . Controller::convertAddressFromIDToName(session('fill_city_id'), '\App\Models\cityapi', 'CityID');
            } else if(session('fill_district_id')) {
                $products = products::select('products.*', 'areaproduct.height as AreaHeight', 'areaproduct.width as AreaWidth', 'addressproduct.WardID',
                 'addressproduct.StreetID', 'addressproduct.addressnumber', 'addressproduct.DistrictID', 'addressproduct.CityID', 'addressproduct.WardID', 'roleusers.UpperID',
                 'users.fullName', 'users.phone as userPhone',
                 'subcategoryproduct.name as subName', 'subcategoryproduct.slug as subSlug',
                 'categoryproduct.name as cateName', 'categoryproduct.slug as cateSlug')
                    ->join('areaproduct', 'areaproduct.ProductID', '=', 'products.ProductID')
                    ->join('addressproduct', 'addressproduct.ProductID', '=', 'products.ProductID')
                    ->join('roleusers', 'roleusers.UserID', '=', 'products.UserID')
                    ->join('users', 'users.id', '=', 'products.UserID')
                    ->join('subcategoryproduct', 'subcategoryproduct.id', '=', 'products.CategoryID')
                    ->join('categoryproduct', 'categoryproduct.CategoryID', '=', 'subcategoryproduct.CategoryID')
                    ->where('products.TypeProduct', 1)
                    ->where('addressproduct.CityID', session('fill_city_id'))
                    ->where('addressproduct.DistrictID', session('fill_district_id'))
                    ->orderBy('products.updated_at', 'desc')
                    ->get();

                $title .= Controller::convertAddressFromIDToName(session('fill_district_id'), '\App\Models\districtapi', 'DistrictID') . ', ' . Controller::convertAddressFromIDToName(session('fill_city_id'), '\App\Models\cityapi', 'CityID');
            } else if(session('fill_city_id')) {
                $products = products::select('products.*', 'areaproduct.height as AreaHeight', 'areaproduct.width as AreaWidth', 'addressproduct.WardID',
                 'addressproduct.StreetID', 'addressproduct.addressnumber', 'addressproduct.DistrictID', 'addressproduct.CityID', 'addressproduct.WardID', 'roleusers.UpperID',
                 'users.fullName', 'users.phone as userPhone',
                 'subcategoryproduct.name as subName', 'subcategoryproduct.slug as subSlug',
                 'categoryproduct.name as cateName', 'categoryproduct.slug as cateSlug')
                    ->join('areaproduct', 'areaproduct.ProductID', '=', 'products.ProductID')
                    ->join('addressproduct', 'addressproduct.ProductID', '=', 'products.ProductID')
                    ->join('roleusers', 'roleusers.UserID', '=', 'products.UserID')
                    ->join('users', 'users.id', '=', 'products.UserID')
                    ->join('subcategoryproduct', 'subcategoryproduct.id', '=', 'products.CategoryID')
                    ->join('categoryproduct', 'categoryproduct.CategoryID', '=', 'subcategoryproduct.CategoryID')
                    ->where('products.TypeProduct', 1)
                    ->where('addressproduct.CityID', session('fill_city_id'))
                    ->orderBy('products.updated_at', 'desc')
                    ->get();

                $title .= Controller::convertAddressFromIDToName(session('fill_city_id'), '\App\Models\cityapi', 'CityID');
            }
        } else {
            $products = products::select('products.*', 'areaproduct.height as AreaHeight', 'areaproduct.width as AreaWidth', 'addressproduct.WardID',
             'addressproduct.StreetID', 'addressproduct.addressnumber', 'addressproduct.DistrictID', 'addressproduct.CityID', 'addressproduct.WardID', 'roleusers.UpperID',
             'users.fullName', 'users.phone as userPhone',
             'subcategoryproduct.name as subName', 'subcategoryproduct.slug as subSlug',
             'categoryproduct.name as cateName', 'categoryproduct.slug as cateSlug')
                ->join('areaproduct', 'areaproduct.ProductID', '=', 'products.ProductID')
                ->join('addressproduct', 'addressproduct.ProductID', '=', 'products.ProductID')
                ->join('roleusers', 'roleusers.UserID', '=', 'products.UserID')
                ->join('users', 'users.id', '=', 'products.UserID')
                ->join('subcategoryproduct', 'subcategoryproduct.id', '=', 'products.CategoryID')
                ->join('categoryproduct', 'categoryproduct.CategoryID', '=', 'subcategoryproduct.CategoryID')
                ->where('products.TypeProduct', 1)
                ->orderBy('products.updated_at', 'desc')
                ->get();
        }

        $url = url()->current();
        if(stripos($url, 'trang-thai-') !== false) {
            $trangthai = strstr($url, 'trang-thai-');
            $trangthai = strstr($trangthai, '-end', true);
            $trangthai = str_replace(['trang-thai-', '-end'], '', $trangthai);
            $products = $products;
            // dd($products);
            if ($trangthai == 'dang-giao-dich') {
                $validProducts = $products->filter(function($value) {
                    return $value->PostingStatus == 'public';
                });
            } else if ($trangthai == 'da-giao-dich') {
                $validProducts = $products->filter(function($value) {
                    return $value->PostingStatus == 'sold';
                });
            } else if ($trangthai == 'nguon-sap-tra') {
                $validProducts = $products->filter(function($value) {
                    return $value->PostingStatus == 'return';
                });
            } else if($trangthai == 'marketing') {
                $validProducts = $products->filter(function($value) {
                    $marketing = product_marketing::where('parent_id', $value['ProductID'])->first();

                    if($marketing) {
                        return $value;
                    }
                });
            }
            $products = $validProducts;
            $trangthaiVietnam = [
                'dang-giao-dich' => 'đang giao dịch',
                'da-giao-dich' => 'đã giao dịch',
                'nguon-sap-tra' => 'nguồn sắp trả',
                'marketing' => 'marketing'
            ];
            $title .= ' trạng thái ' . $trangthaiVietnam[$trangthai];
        } else {
            $products = $products;
            $validProducts = $products->filter(function($value) {
                if($value->PostingStatus == 'public' || $value->PostingStatus == 'expired' || $value->PostingStatus == 'return') {
                    return $value;
                }
            });
            $products = $validProducts;
        }

        if(stripos($url, 'danh-muc-') !== false) {
            $danhmuc = strstr($url, 'danh-muc-');
            $danhmuc = strstr($danhmuc, '-end', true);
            $danhmuc = str_replace(['danh-muc-', '-end'], '', $danhmuc);
            $products = $products;
            if($danhmuc == 'bat-dong-san-kinh-doanh') {
                $validProducts = $products->filter(function($value) {
                    if($value->cateSlug == 'bat-dong-san-kinh-doanh') {
                        return $value;
                    }
                });
            } else if($danhmuc == 'nha-o-nha-rieng-nha-nguyen-can') {
                $validProducts = $products->filter(function($value) {
                    if($value->cateSlug == 'nha-o-nha-rieng-nha-nguyen-can') {
                        return $value;
                    }
                });
            } else if($danhmuc == 'can-ho') {
                $validProducts = $products->filter(function($value) {
                    if($value->cateSlug == 'can-ho') {
                        return $value;
                    }
                });
            } else if($danhmuc == 'dat-nen-dat-ray-vuon') {
                $validProducts = $products->filter(function($value) {
                    if($value->cateSlug == 'dat-nen-dat-ray-vuon') {
                        return $value;
                    }
                });
            } else {
                $subCategory = subcategoryproduct::where('slug', $danhmuc)->first();
                $validProducts = $products->filter(function($value) use ($subCategory) {
                    if($value->CategoryID == $subCategory->id) {
                        return $value;
                    }
                });
            }
            if(categoryproduct::where('slug', $danhmuc)->first() != null) {
                $title .= ' danh mục ' . strtolower(categoryproduct::where('slug', $danhmuc)->first()->name);
            } else {
                $title .= ' danh mục ' . strtolower(subcategoryproduct::where('slug', $danhmuc)->first()->name);
            }
            $products = $validProducts;
        }

        if(stripos($url, 'khoang-gia-') !== false) {
            $khoanggia = strstr($url, 'khoang-gia-');
            $khoanggia = strstr($khoanggia, '-end', true);
            $khoanggia = str_replace(['khoang-gia-', '-end'], '', $khoanggia);
            $products = $products;
            $price = explode('-', $khoanggia);

            $validProducts = $products->filter(function($value) use ($price) {
                if($price[0] == 0) {
                    return $value->price <= $price[1];
                } else if($price[1] == 0) {
                    return $value->price >= $price[0];
                } else {
                    return $value->price >= $price[0] && $value->price <= $price[1];
                }
            });

            if(intval($price[0]) == 0) {
                $title .= ' giá từ ' . Controller::convertPriceText($price[1]) . ' trở xuống';
            } else if(intval($price[1]) == 0) {
                $title .= ' giá từ ' . Controller::convertPriceText($price[0]) . ' trở lên';
            } else {
                $title .= ' giá từ ' . Controller::convertPriceText($price[0]) . ' đến ' . Controller::convertPriceText($price[1]);
            }
            $products = $validProducts;
        }

        if(stripos($url, 'be-ngang-') !== false) {
            $benang = strstr($url, 'be-ngang-');
            $benang = strstr($benang, '-end', true);
            $benang = str_replace(['be-ngang-', '-end'], '', $benang);
            $products = $products;
            $width = explode('-', $benang);

            $validProducts = $products->filter(function($value) use ($width) {
                $widthProduct = areaproduct::where('ProductID', $value->ProductID)->first();
                if($widthProduct) {
                    if($width[0] == 0) {
                        return $widthProduct->width <= $width[1];
                    } else if($width[1] == 0) {
                        return $widthProduct->width >= $width[0];
                    } else {
                        return $widthProduct->width >= $width[0] && $widthProduct->width <= $width[1];
                    }
                }
            });

            if(intval($width[0]) == 0) {
                $title .= ' bề ngang từ ' . $width[1] . 'm trở xuống';
            } else if(intval($width[1]) == 0) {
                $title .= ' bề ngang từ ' . $width[0] . 'm trở lên';
            } else {
                $title .= ' bề ngang từ ' . $width[0] . ' đến ' . $width[1] . 'm';
            }
            $products = $validProducts;
        }

        if(stripos($url, 'so-tang-') !== false) {
            $sotang = strstr($url, 'so-tang-');
            $sotang = strstr($sotang, '-end', true);
            $sotang = str_replace(['so-tang-', '-end'], '', $sotang);
            $products = $products;
            $floors = explode('-', $sotang);

            $validProducts = $products->filter(function($value) use ($floors) {
                if(intval($floors[0]) == 0) {
                    return $value->floors <= $floors[1];
                } else if(intval($floors[1]) == 0) {
                    return $value->floors >= intval($floors[0]);
                } else {
                    return $value->floors >= intval($floors[0]) && $value->floors <= intval($floors[1]);
                }
            });

            if(intval($floors[0]) == 0) {
                $title .= ' số tầng từ ' . $floors[1] . ' tầng trở xuống';
            } else if(intval($floors[1]) == 0) {
                $title .= ' số tầng từ ' . $floors[0] . ' tầng trở lên';
            } else {
                $title .= ' số tầng từ ' . $floors[0] . ' đến ' . $floors[1] . ' tầng';
            }
            $products = $validProducts;
        }

        if(stripos($url, 'phong-ngu-') !== false) {
            $phongngu = strstr($url, 'phong-ngu-');
            $phongngu = strstr($phongngu, '-end', true);
            $phongngu = str_replace(['phong-ngu-', '-end'], '', $phongngu);
            $products = $products;
            $bedrooms = explode('-', $phongngu);

            $validProducts = $products->filter(function($value) use ($bedrooms) {
                $bedroom = apartmentinfo::where('ProductID', $value->ProductID)->first();
                if($bedroom) {
                    if(intval($bedrooms[0]) == 0) {
                        return $bedroom['BedRoom'] <= $bedrooms[1];
                    } else if(intval($bedrooms[1]) == 0) {
                        return $bedroom['BedRoom'] >= $bedrooms[0];
                    } else {
                        return $bedroom['BedRoom'] >= $bedrooms[0] && $bedroom['BedRoom'] <= $bedrooms[1];
                    }
                }
            });

            if(intval($bedrooms[0]) == 0) {
                $title .= ' ' . $bedrooms[1] . ' phòng ngủ trở xuống';
            } else if(intval($bedrooms[1]) == 0) {
                $title .= ' ' . $bedrooms[0] . ' phòng ngủ trở lên';
            } else {
                $title .= ' ' . $bedrooms[0] . ' đến ' . $bedrooms[1] . ' phòng ngủ';
            }
            $products = $validProducts;
        }

        if($request->has('direction')) {
            $direction = explode('-', $request->direction);
            $products = $products;

            $validProducts = $products->filter(function($value) use ($direction) {
                foreach($direction as $item) {
                    if(products::where('ProductID', $value->ProductID)->where('direction', intval($item))->first()) {
                        return $value;
                    }
                }
            });

            $directionVietNam = [
                '1' => 'đông',
                '2' => 'tây',
                '3' => 'nam',
                '4' => 'bắc',
                '5' => 'đông bắc',
                '6' => 'tây bắc',
                '7' => 'đông nam',
                '8' => 'tây nam'
            ];

            foreach($direction as $item) {
                $title .= ' hướng ' . $directionVietNam[$item];
                if($item != end($direction)) {
                    $title .= ', ';
                }
            }
            $products = $validProducts;
        }

        if($request->has('AlleyWidth')) {
            $AlleyWidth = explode('-', $request->AlleyWidth);
            $products = $products;

            $validProducts = $products->filter(function($value) use ($AlleyWidth) {
                $width = alleyproduct::where('ProductID', $value->ProductID)->first();
                if($width) {
                    if($width['AlleyWidth'] >= $AlleyWidth[0] && $width['AlleyWidth'] <= $AlleyWidth[1]) {
                        return $value;
                    }
                }
            });

            foreach($AlleyWidth as $item) {
                $title .= ' hẻm ' . $item . 'm';
                if($item != end($AlleyWidth)) {
                    $title .= ', ';
                }
            }
            $products = $validProducts;
        }

        if($request->has('utilities')) {
            $utilities = explode('-', $request->utilities);
            $changeUtilities = [];
            foreach($utilities as $item) {
                if(intval($item) == 1) {
                    $changeUtilities[] = 'Căn góc';
                } else if(intval($item) == 2) {
                    $changeUtilities[] = 'Gần ngã 3, ngã 4';
                } else if(intval($item) == 3) {
                    $changeUtilities[] = 'Sân vườn';
                } else if(intval($item) == 4) {
                    $changeUtilities[] = 'Hầm';
                } else if(intval($item) == 5) {
                    $changeUtilities[] = 'Thang máy';
                } else if(intval($item) == 6) {
                    $changeUtilities[] = 'Trống suốt';
                }
            }
            $products = $products;

            $validProducts = $products->filter(function($value) use ($changeUtilities) {
                $utilities = product_utilities::where('ProductID', $value->ProductID)->get();
                $utilities = $utilities->pluck('UtilityName')->toArray();
                if(array_diff($changeUtilities, $utilities) === []) {
                    return $value;
                }
            });

            $ultilitiesName = [
                1 => 'Căn góc',
                2 => 'Gần ngã 3, ngã 4',
                3 => 'Sân vườn',
                4 => 'Hầm',
                5 => 'Thang máy',
                6 => 'Trống suốt'
            ];

            foreach($utilities as $item) {
                $title .= ' tiện ích ' . $ultilitiesName[$item];
                if($item != end($utilities)) {
                    $title .= ', ';
                }
            }
            $products = $validProducts;
        }

        if(stripos($url, 'district') !== false) {
            $district = strstr($url, 'district');
            $district = str_replace('district', '', $district);
            $district = ltrim($district, '0');
            $district = intval($district);
            $products = $products;

            $validProducts = $products->filter(function($value) use ($district) {
                $address = addressproduct::where('ProductID', $value->ProductID)->first();
                if($address) {
                    return $address->DistrictID == $district;
                }
            });

            $title .= ' ' . Controller::convertAddressFromIDToName($district, '\App\Models\districtapi', 'DistrictID');
        }

        if(stripos($url, 'ward') !== false) {
            $ward = strstr($url, 'ward');
            $ward = str_replace('ward', '', $ward);
            $ward = ltrim($ward, '0');
            $ward = intval($ward);
            $products = $products;

            $validProducts = $products->filter(function($value) use ($ward) {
                $address = addressproduct::where('ProductID', $value->ProductID)->first();
                if($address) {
                    return $address->WardID == $ward;
                }
            });

            $title .= ' ' . Controller::convertAddressFromIDToName($ward, '\App\Models\wardapi', 'WardID');
        }
        $totalNhuCau = 0;
        foreach($validProducts as $key => $value) {
            $marketing = product_marketing::where('parent_id', $value['ProductID'])->first();
            $validProducts[$key]['marketing'] = $marketing;
            $data = value_warehouse::get();
            if($data) {
                foreach($data as $item) {
                    if($value->CategoryID == $item->CategoryID) {
                        if($item->price_min <= $value->price && $item->price_max == 0 || $item->price_max >= $value->price && $item->price_min == 0 || $item->price_min <= $value->price && $item->price_max >= $value->price) {
                            if($item->DistrictID == $value->DistrictID && $item->WardID == $value->WardID || $item->DistrictID == $value->DistrictID && $item->WardID == 1) {
                                $totalNhuCau++;
                                $validProducts[$key]['nhucau'] = $totalNhuCau;
                                $tempId = value_warehouse::select('warehouse.id')
                                ->join('warehouse', 'warehouse.id', '=', 'value_warehouse.parent_id')
                                ->where('value_warehouse.id', $item->id)
                                ->first();

                                if($validProducts[$key]['idNhuCau'] != null) {
                                    $validProducts[$key]['idNhuCau'] .= ',' . $tempId->id;
                                } else {
                                    $validProducts[$key]['idNhuCau'] = $tempId->id;
                                }
                            }
                        }
                    }
                }
            }
            $totalNhuCau = 0;
        }

        $countProduct = $validProducts->count();
        $perPage = 30;
        $currentPage = $request->get('page', 1);
        $products = new LengthAwarePaginator(
            $validProducts->slice(($currentPage - 1) * $perPage, $perPage),
            $countProduct,
            $perPage,
            $currentPage,
            ['path' => $request->url(), 'query' => $request->query()]
        );

        $controller = new Controller();

        return view('Backend.Production.collections', compact('role', 'title', 'description', 'products', 'controller', 'type_collection', 'countProduct'));
    }

    public function postDetail($slug)
    {
        // dd($slug);\
        $controller = new Controller();
        $role = Controller::getRole();
        $product = products::select('products.*', 'subcategoryproduct.name as subName', 'areaproduct.height as AreaHeight', 'areaproduct.width as AreaWidth', 'areaproduct.contructionArea as contructionArea'
        , 'subcategoryproduct.CategoryID as cateID', 'addressproduct.WardID', 'addressproduct.StreetID', 'addressproduct.addressnumber', 'addressproduct.DistrictID', 'addressproduct.CityID', 'addressproduct.WardID')
            ->join('subcategoryproduct', 'subcategoryproduct.id', '=', 'products.CategoryID')
            ->join('areaproduct', 'areaproduct.ProductID', '=', 'products.ProductID')
            ->join('addressproduct', 'addressproduct.ProductID', '=', 'products.ProductID')
            ->where('products.slug', $slug)->first();


        if($product == null) {
            return redirect()->route('home')->with('error', 'Bài đăng không tồn tại!');
        }

        if($product['cateID'] == 7006) {
            $infoProduct = apartmentinfo::where('ProductID', $product->ProductID)->first();
        } else if($product['cateID'] == 7007) {
            $infoProduct = houseinfo::where('ProductID', $product->ProductID)->first();
        } else if($product['cateID'] == 7009) {
            $infoProduct = businessinfo::where('ProductID', $product->ProductID)->first();
        } else {
            $infoProduct = [];
        }

        $product_utilities = product_utilities::where('ProductID', $product->ProductID)->get();

        $alley = alleyproduct::where('ProductID', $product->ProductID)->first();

        $images = imageproduct::where('ProductID', $product->ProductID)
            ->where('TypeImage', 1)
            ->get();
        $poster = users::select('users.*', 'roleusers.roleName')
            ->join('roleusers', 'roleusers.UserID', '=', 'users.id')
            ->where('users.id', $product->UserID)
            ->first();
        if(Auth::check()) {
            if(roleusers::where('UserID', $product['UserID'])->first()->UpperID == Auth::user()->id || Auth::user()->id == $product['UserID'] || Controller::checkRole(Controller::getRole()->MainRole) >= 2) {
                $address = addressproduct::where('ProductID', $product->ProductID)->first();
            } else {
                $address = addressproduct::select('CityID', 'DistrictID', 'WardID', 'StreetID')
                    ->where('ProductID', $product->ProductID)
                    ->first();
            }
        } else {
            $address = addressproduct::select('CityID', 'DistrictID', 'WardID', 'StreetID')
                ->where('ProductID', $product->ProductID)
                ->first();
        }

        if(infoclientproduct::where('ProductID', $product->ProductID)->first() == null) {
            $id = $product->ProductID;
            return view('errors.error-detail', compact('controller', 'poster', 'id'));
        }

        $rating = product_surveies::select('product_surveies.*', 'users.fullName')
            ->join('users', 'users.id', '=', 'product_surveies.UserID')
            ->where('product_surveies.ProductID', $product->ProductID)
            ->where('product_surveies.status', 1)
            ->orderBy('product_surveies.created_at', 'desc')
            ->get();

        if($rating) {
            foreach($rating as $key => $value) {
                $rating[$key]['images'] = imageproduct::where('ProductID', $product->ProductID)
                    ->where('TypeImage', 3)
                    ->where('SurveyID', $value->id)
                    ->get();
            }
        }

        return view('Backend.Production.detail', compact('product', 'role', 'images', 'poster', 'controller', 'address', 'infoProduct', 'alley', 'product_utilities', 'rating'));
    }

    public function fetchContact(Request $request)
    {
        $data = '';
        $slug = $request->slug;
        if(Auth::check()) {
            if(customer_warehouse::where('phone', Auth::user()->phone)->first()) {
                $customer = customer_warehouse::where('phone', Auth::user()->phone)->where('status', 1)->first();

                if($customer) {
                    customer_warehouse::where('phone', Auth::user()->phone)->update([
                        'updated_at' => date('Y-m-d H:i:s')
                    ]);
                } else {
                    if(Controller::checkRole(Controller::getRole()->MainRole) >= 2) {
                        $role = 3;
                    } else {
                        if(Controller::getRole()->roleName == 'Môi giới') {
                            $role = 2;
                        } else {
                            $role = 1;
                        }
                    }
                    customer_warehouse::create([
                        'fullName' => Auth::user()->fullName,
                        'phone' => Auth::user()->phone,
                        'role' => $role,
                        'UserID' => Auth::user()->id,
                        'status' => 1
                    ]);
                }
            } else {
                if(Controller::checkRole(Controller::getRole()->MainRole) >= 2) {
                    $role = 3;
                } else {
                    if(Controller::getRole()->roleName == 'Môi giới') {
                        $role = 2;
                    } else {
                        $role = 1;
                    }
                }
                customer_warehouse::create([
                    'fullName' => Auth::user()->fullName,
                    'phone' => Auth::user()->phone,
                    'role' => $role,
                    'UserID' => Auth::user()->id,
                    'status' => 1
                ]);
            }
            $customer = customer_warehouse::where('phone', Auth::user()->phone)->orderBy('id', 'desc')->first();
            $product = products::where('slug', $slug)->first();
            if(warehouse::where('link', $slug)->where('parent_id', intval($customer['id']))->first()) {
                warehouse::where('link', $slug)->where('parent_id', intval($customer['id']))->update([
                    'updated_at' => date('Y-m-d H:i:s')
                ]);
            } else {
                warehouse::create([
                    'content' => 'Đã quan tâm <b>Tin đăng '. $product['postCode'] .'</b>',
                    'type' => ($product['TypeProduct'] == 'Cho Thuê') ? 1 : 2,
                    'contentLink' => $product['title'],
                    'link' => $slug,
                    'parent_id' => intval($customer['id'])
                ]);
            }
            $warehouse = warehouse::where('link', $slug)->where('parent_id', intval($customer['id']))->first();
            if(option_warehouse::where('parent_id', intval($warehouse['id']))->first()) {
                $count = 0;
                foreach(option_warehouse::where('parent_id', intval($warehouse['id']))->get() as $item) {
                    if(stripos($item['content'], 'Đã quan tâm') != false) {
                        $count++;
                    }
                }
                option_warehouse::create([
                    'content' => ($count == 0) ? 'Đã quan tâm lần 2' : 'Đã quan tâm lần '. ($count + 1),
                    'type' => 1,
                    'parent_id' => intval($warehouse['id'])
                ]);

            } else {
                $user = users::where('id', $product['UserID'])->first();
                option_warehouse::create([
                    'content' => 'Nguồn tin của <a class="text-primary fw-bold" href="'. route('tin-da-dang.id', $user['id']) .'">'. $user['fullName'] .'</a>',
                    'type' => 1,
                    'parent_id' => intval($warehouse['id']),
                    'UserID' => $product['UserID']
                ]);
                option_warehouse::create([
                    'content' => 'Nguồn giới thiệu từ hệ thống',
                    'type' => 1,
                    'parent_id' => intval($warehouse['id'])
                ]);
            }
        }
        $contact = products::select('users.fullName', 'users.avatar', 'users.phone as userPhone', 'infoclientproduct.InfoName', 'infoclientproduct.InfoContact'
        , 'roleusers.UpperID', 'infoclientproduct.TypeData', 'products.UserID')
            ->join('users', 'users.id', '=', 'products.UserID')
            ->join('infoclientproduct', 'infoclientproduct.ProductID', '=', 'products.ProductID')
            ->join('roleusers', 'roleusers.UserID', '=', 'products.UserID')
            ->where('products.slug', $slug)
            ->get();

        $data = '
                <div class="mdl-frm" id="modal-contact-content">
                    <div class="modal-content">



                        <div class="ftxt-cnt">

                            <h5>Người đăng tin</h5>
                            <p class="ftu-zl">
                            </p>

                            <div class="zl-wrp">
                                <div class="zl-wrp__avt"
                                    style="background-image: url('. asset('Assets/Images/Users/' . $contact[0]['avatar']) .')">
                                    <div class="zl-wrp__rol rol--gl">Guland</div>
                                </div>
                                <div class="zl-wrp__cnt">
                                    <div class="zl-wrp__tle">'. $contact[0]['fullName'] .'</div>

                                    <div class="zl-wrp__num"><a href="tel:'. $contact[0]['userPhone'] .'" data-phone="'. $contact[0]['userPhone'] .'"
                                            class="btn-call-item">'. $contact[0]['userPhone'] .'
                                        </a></div>

                                </div>
                                <a href="https://zalo.me/'. $contact[0]['userPhone'] .'" data-phone="'. $contact[0]['userPhone'] .'" class="btn-call-item"
                                    data-id="866582"><img src="https://guland.vn/bds/img/zalo.svg" class="zl-wrp__logo" width="32px"
                                        height="32px"></a>
                            </div>
                            <p></p>';

                                if(Auth::check()) {
                                    if($contact[0]['UpperID'] == Auth::user()->id || Auth::user()->id == $contact[0]['UserID'] || Controller::checkRole(Controller::getRole()->MainRole) >= 4){
                                        for($i = 0; $i < count($contact); $i++) {
                                            $data .= '
                                                <hr>';
                                                if(count($contact) >= 2) {
                                                    $data .= '
                                                        <h5>Đầu chủ (Người nắm chủ) thứ '. $i + 1 .'</h5>
                                                    ';
                                                } else {
                                                    $data .= '
                                                        <h5>Đầu chủ (Người nắm chủ)</h5>
                                                    ';
                                                }
                                                $data .= '
                                                <p>Thông tin bảo mật chỉ hiển thị cho người đăng tin thấy</p>
                                                <p class="ftu-zl">
                                                </p>
                                                <div class="zl-wrp">
                                                    <div class="zl-wrp__avt" style="background-image: url('. asset('Assets/Images/Users/avt.png') .')">
                                                        <div class="zl-wrp__rol rol--mg">'. $contact[$i]['TypeData'] .'</div>
                                                    </div>
                                                    <div class="zl-wrp__cnt">
                                                        <div class="zl-wrp__tle">'. $contact[$i]['InfoName'] .'</div>
                                                        <div class="zl-wrp__num"><a href="tel:'. $contact[$i]['InfoContact'] .'" data-phone="'. $contact[$i]['InfoContact'] .'"
                                                                class="btn-call-item" data-id="866582">'. $contact[$i]['InfoContact'] .'</a></div>
                                                    </div>
                                                    <a href="https://zalo.me/'. $contact[$i]['InfoContact'] .'" data-phone="'. $contact[$i]['InfoContact'] .'"
                                                        class="btn-zalo-item btn-call-item" data-id="866582"><img src="https://guland.vn/bds/img/zalo.svg"
                                                            class="zl-wrp__logo" width="32px" height="32px"></a>
                                                </div>
                                            ';
                                        }
                                    }
                                }

                            $data .= '
                            <p></p>
                        </div>
                    </div>
                </div>
        ';
        echo $data;
    }

    public function postProduct()
    {
        $role = Controller::getRole();
        $checkRole = Controller::checkRole($role->MainRole);
        $controller = new Controller();
        $categories = [];
        $categories['kd'] = subcategoryproduct::where('CategoryID', 7009)->get();
        $categories['nha'] = subcategoryproduct::where('CategoryID', 7007)->get();
        $categories['canho'] = subcategoryproduct::where('CategoryID', 7006)->get();
        $categories['dat'] = subcategoryproduct::where('CategoryID', 7008)->get();
        return view('Backend.Production.postproduct', compact('role', 'categories', 'checkRole', 'controller'));
    }

    public function editProduct($id)
    {
        if(!Auth::check()) {
            return redirect()->route('home')->with('error', 'Bạn cần đăng nhập để sử dụng chức năng này!');
        }

        if(Controller::checkRole(Controller::getRole()->MainRole) < 5 && products::where('ProductID', $id)->first()->UserID != Auth::user()->id && Controller::getRole(products::where('ProductID', $id)->first()->UserID)->UpperID != Auth::user()->id) {
            return redirect()->route('home')->with('error', 'Bạn không có quyền truy cập bài đăng này!');
        }

        if(products::where('ProductID', $id)->first() == null) {
            return redirect()->route('home')->with('error', 'Bài đăng không tồn tại!');
        }

        $role = Controller::getRole();
        $checkRole = Controller::checkRole($role->MainRole);
        $categories = [];
        $categories['kd'] = subcategoryproduct::where('CategoryID', 7009)->get();
        $categories['nha'] = subcategoryproduct::where('CategoryID', 7007)->get();
        $categories['canho'] = subcategoryproduct::where('CategoryID', 7006)->get();
        $categories['dat'] = subcategoryproduct::where('CategoryID', 7008)->get();

        $product = products::select(
                'products.*',
                DB::raw('MAX(alleyproduct.AlleyLocation) as AlleyLocation'),
                DB::raw('MAX(alleyproduct.AlleyWidth) as AlleyWidth'),
                DB::raw('MAX(alleyproduct.AlleyType) as AlleyType'),
                DB::raw('MAX(addressproduct.addressnumber) as addressNumber'),
                DB::raw('MAX(addressproduct.StreetID) as StreetID'),
                DB::raw('MAX(addressproduct.WardID) as WardID'),
                DB::raw('MAX(addressproduct.DistrictID) as DistrictID'),
                DB::raw('MAX(addressproduct.CityID) as CityID'),
                DB::raw('MAX(addressproduct.AddressFull) as AddressFull'),
                DB::raw('MAX(addressproduct.ToaDo) as ToaDo'),
                DB::raw('MAX(areaproduct.height) as AreaHeight'),
                DB::raw('MAX(areaproduct.width) as AreaWidth'),
                DB::raw('MAX(areaproduct.contructionArea) as contructionArea'),
                DB::raw('GROUP_CONCAT(product_utilities.UtilityName) as UtilityName'),
                DB::raw('MAX(apartmentinfo.CodeRoom) as CodeRoom'),
                DB::raw('MAX(apartmentinfo.block) as block'),
                DB::raw('MAX(apartmentinfo.BedRoom) as ApartmentBedRoom'),
                DB::raw('MAX(apartmentinfo.frequency) as frequency'),
                DB::raw('MAX(businessinfo.BathRoom) as BathRoom'),
                DB::raw('MAX(houseinfo.BedRoom) as HouseBedRoom'),
                DB::raw('MAX(subcategoryproduct.CategoryID ) as cateID'),
            )
            ->leftJoin('alleyproduct', 'alleyproduct.ProductID', '=', 'products.ProductID')
            ->leftJoin('addressproduct', 'addressproduct.ProductID', '=', 'products.ProductID')
            ->leftJoin('areaproduct', 'areaproduct.ProductID', '=', 'products.ProductID')
            ->leftJoin('product_utilities', 'product_utilities.ProductID', '=', 'products.ProductID')
            ->leftJoin('apartmentinfo', 'apartmentinfo.ProductID', '=', 'products.ProductID')
            ->leftJoin('businessinfo', 'businessinfo.ProductID', '=', 'products.ProductID')
            ->leftJoin('houseinfo', 'houseinfo.ProductID', '=', 'products.ProductID')
            ->leftJoin('subcategoryproduct', 'subcategoryproduct.id', '=', 'products.CategoryID')
            ->where('products.ProductID', $id)
            ->groupBy('products.ProductID')
        ->first();

        $product->ImageFile = imageproduct::select('ImageFile')->where('ProductID', $id)->where('TypeImage', 1)->get();
        $product->HopDong = imageproduct::select('ImageFile')->where('ProductID', $id)->where('TypeImage', 2)->get();
        $infoClient = infoclientproduct::where('ProductID', $product->ProductID)->get();
        $product->InfoName = $infoClient->pluck('InfoName')->toArray();
        $product->InfoContact = $infoClient->pluck('InfoContact')->toArray();
        $product->TypeData = $infoClient->pluck('TypeData')->toArray();
        $product->UtilityName = explode(',', $product->UtilityName);
        $controller = new Controller();

        return view('Backend.Production.editproduct', compact('role', 'categories', 'checkRole', 'product', 'controller'));
    }

    public function getFormPost(Request $request)
    {
        $data = '';
        if ($request->value <= 3) {
            $data = '
                <div class="bds-type-content">
                        <div class="btn-cnt-type">
                        <h3 class="cnt-hdeg">Địa chỉ bất động sản</h3>';
                        if($request->type == 'sell') {
                            $data .= '
                                <div class="form-group-cnt1 name-land-style">
                                    <label for class="form-lable-cnt3"
                                    style="font-size: 15px">Tên tòa nhà / khu dân cư
                                    /Dự án</label>
                                    <input type="text" class="search-input" id="name_building"
                                    placeholder=" " />
                                </div>
                            ';
                        }
                        $data .= '
                        <div class="form-group-cnt1">
                            <label for class="form-lable-cnt3"
                            style="font-size: 15px">
                            Địa chỉ mặt bằng <span
                                class="text-red">(*)</span>
                            </label>
                            <a id="" class="form-control toggle-address-form text-truncate" style="cursor: pointer;"></a>
                            <input type="hidden" name="district_id_hidden" value="">
                            <input type="hidden" name="ward_id_hidden" value="">
                            <input type="hidden" name="street_id_hidden" value="">
                            <input type="hidden" name="address_value_hidden" value="">
                        </div>

                        <div class="row">
                            <div class="col-12">
                            <div class="form-group-cnt3">
                                <label class="form-label-cnt3">Tọa độ vị
                                trí</label>
                                <div class="input-group1">
                                <input
                                    type="text"
                                    class="form-control"
                                    name="toa_do"
                                    placeholder="10.787281170604397, 106.64923009534502" />
                                </div>
                            </div>
                            </div>
                        </div>';

                        if($request->type == 'sell') {
                            $data .= '
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
                            ';
                        }

                        $data .= '
                        <h3 class="cnt-hdeg">Thông tin BĐS</h3>

                        <div class="row">
                            <div class="col-6 col-lg-3">
                            <div class="form-group-cnt3">
                                <label class="form-label-cnt3">Số phòng tắm

                                </label>
                                <input
                                type="number"
                                min="1"
                                value
                                name="phong_tam"
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
                                    type="text"
                                    name="dien_tich_dat"
                                    required
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
                                    type="text"
                                    min="0"
                                    name="contructionArea"
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
                                    type="text"
                                    name="width_m"
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
                                    type="text"
                                    name="length_m"
                                    required
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
                                <label class="form-label-cnt3 price-change-here">';
                                    if($request->type == 'sell') {
                                        $data .= 'Giá bán';
                                    } else {
                                        $data .= 'Giá thuê';
                                    }
                                $data .= '
                                    <span class="text-red">(*)</span></label>
                                <div class="input-group1">
                                    <input
                                    type="text"
                                    class="form-control"
                                    oninput="formatNumber(this)"
                                    name="price"
                                    required />
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
                                <label class="form-label-cnt3">Số tiền cọc</label>
                                <div class="input-group1">
                                    <input
                                    type="text"
                                    class="form-control"
                                    name="deposit"
                                    oninput="formatNumber(this)" />
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
                                    <span class="text-red">(*)</span>
                                    <input type="radio" name="alley" id="trongngo" value="1" />
                                    <div>Trong ngõ, hẻm</div>
                                </label>
                                <label for="mattien" class="rd-2">
                                    <input type="radio" name="alley" id="mattien" value="2" />
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
                                    </label>
                                    <div class="input-group1">
                                    <input
                                        type="number"
                                        name="alley_width"
                                        class="form-control" />
                                    <div class="input-append">
                                        <span class="input-text">m</span>
                                    </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-3">
                                <div class="form-group-cnt3">
                                <label class="form-label-cnt3">Loại đường
                                </label>
                                <select
                                    class="form-control"
                                    name="loai_duong"
                                    >
                                    <option selected value>-</option>
                                    <option value="1">Đường nhựa</option>
                                    <option value="2">Đường bê tông</option>
                                    <option value="3">Đường đất</option>
                                    <option value="4">Đường đá</option>
                                </select>
                                </div>
                            </div>
                            </div>';

                            if($request->type == 'sell') {
                                $data .= '
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group-cnt2">
                                            <label class="form-label-cnt3">Pháp lý <span
                                                class="text-red">(*)</span>
                                            </label>
                                            <select
                                                class="form-control"
                                                name="phap_ly"
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
                                                lý</label>
                                            <textarea
                                                class="form-control"
                                                name="chi_tiet_phap_ly"
                                                placeholder="Ví dụ: Đang cầm cố ngân hàng, sổ có chung nhiều người, có đang tranh chấp kiện tụng, có đang phát mãi, ..."></textarea>
                                            </div>
                                        </div>
                                    </div>
                                ';
                            }
                            $data .=
                            '
                            <h3 class="cnt-hdeg">Tiêu đề &amp; Mô tả</h3>
                            <div class="form-group-cnt2">
                            <label class="form-label-cnt3">Tiêu đề tin
                                đăng<span class="text-red">(*)</span></label>
                            <input
                                type="text"
                                required
                                name="tieu_de_tin_dang"
                                class="form-control"
                                placeholder="Tiêu đề ngắn gọn cho tin đăng" />
                            </div>
                            <div class="form-group-cnt2">
                            <label class="form-label-cnt3">Tiện ích, mô tả
                                BĐS</label>
                            <div contenteditable="true" class="form-control" id="description_value" style="height: 150px; overflow-y: auto;">
                            </div>
                            <input type="hidden" name="tien_ich_mo_ta" id="tien_ich_mo_ta_hidden" />
                            <script>
                                function updateHiddenInput() {
                                    var descriptionContent = document.getElementById("description_value").innerHTML;
                                    document.getElementById("tien_ich_mo_ta_hidden").value = descriptionContent;
                                }

                                document.getElementById("description_value").addEventListener("input", updateHiddenInput);
                            </script>

                            <style>
                                .text-formatting .btn {
                                    margin-right: 5px;
                                }
                            </style>
                        </div>
                        </div>
            ';
        } else if ($request->value >= 4 && $request->value <= 7) {
            $data = '
                <div class="bds-type-content">
                        <div class="btn-cnt-type">
                        <h3 class="cnt-hdeg">Địa chỉ bất động sản</h3>';
                        if($request->type == 'sell') {
                            $data .= '
                                <div class="form-group-cnt1 name-land-style">
                                    <label for class="form-lable-cnt3"
                                    style="font-size: 15px">Tên tòa nhà / khu dân cư
                                    /Dự án</label>
                                    <input type="text" class="search-input" id="name_building"
                                    placeholder=" " />
                                </div>
                            ';
                        }
                        $data .= '
                        <div class="form-group-cnt1">
                            <label for class="form-lable-cnt3"
                            style="font-size: 15px">
                            Địa chỉ nhà <span
                                class="text-red">(*)</span>
                            </label>
                            <a id="" class="form-control toggle-address-form text-truncate" style="cursor: pointer;"></a>
                            <input type="hidden" name="district_id_hidden" value="">
                            <input type="hidden" name="ward_id_hidden" value="">
                            <input type="hidden" name="street_id_hidden" value="">
                            <input type="hidden" name="address_value_hidden" value="">
                        </div>

                        <div class="row">
                            <div class="col-12">
                            <div class="form-group-cnt3">
                                <label class="form-label-cnt3">Tọa độ vị
                                trí</label>
                                <div class="input-group1">
                                <input
                                    type="text"
                                    class="form-control"
                                    name="toa_do"
                                    placeholder="10.787281170604397, 106.64923009534502" />
                                </div>
                            </div>
                            </div>
                        </div>';

                        if($request->type == 'sell') {
                            $data .= '
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
                            ';
                        }

                        $data .= '
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
                                        name="phong_ngu"
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
                                        name="so_tang"
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
                                        type="text"
                                        name="dien_tich_dat"
                                required
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
                                        type="text"
                                        min="0"
                                        name="contructionArea"
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
                                        type="text"
                                        name="width_m"
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
                                        type="text"
                                        name="length_m"
                                    required
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
                                        oninput="formatNumber(this)"
                                        name="price"
                                    required />
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
                                    <label class="form-label-cnt3">Số tiền cọc</label>
                                    <div class="input-group1">
                                    <input
                                        type="text"
                                        class="form-control"
                                        name="deposit"
                                        oninput="formatNumber(this)" />
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
                                    <span class="text-red">(*)</span>
                                    <input type="radio" name="alley" id="trongngo" value="1" />
                                    <div>Trong ngõ, hẻm</div>
                                </label>
                                <label for="mattien" class="rd-2">
                                    <input type="radio" name="alley" id="mattien" value="2" />
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
                                    </label>
                                    <div class="input-group1">
                                    <input
                                        type="number"
                                        name="alley_width"
                                        class="form-control" />
                                    <div class="input-append">
                                        <span class="input-text">m</span>
                                    </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-3">
                                <div class="form-group-cnt3">
                                <label class="form-label-cnt3">Loại đường
                                </label>
                                <select
                                    class="form-control"
                                    name="loai_duong"
                                    >
                                    <option selected value>-</option>
                                    <option value="1">Đường nhựa</option>
                                    <option value="2">Đường bê tông</option>
                                    <option value="3">Đường đất</option>
                                    <option value="4">Đường đá</option>
                                </select>
                                </div>
                            </div>
                            </div>';

                            if($request->type == 'sell') {
                                $data .= '
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group-cnt2">
                                            <label class="form-label-cnt3">Pháp lý <span
                                                class="text-red">(*)</span>
                                            </label>
                                            <select
                                                class="form-control"
                                                name="phap_ly"
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
                                                name="chi_tiet_phap_ly"
                                                placeholder="Ví dụ: Đang cầm cố ngân hàng, sổ có chung nhiều người, có đang tranh chấp kiện tụng, có đang phát mãi, ..."></textarea>
                                            </div>
                                        </div>
                                    </div>
                                ';
                            }
                            $data .=
                            '

                            <h3 class="cnt-hdeg">Tiêu đề &amp; Mô tả</h3>
                            <div class="form-group-cnt2">
                            <label class="form-label-cnt3">Tiêu đề tin
                                đăng<span class="text-red">(*)</span></label>
                            <input
                                type="text"
                                required
                                name="tieu_de_tin_dang"
                                class="form-control"
                                placeholder="Tiêu đề ngắn gọn cho tin đăng" />
                            </div>
                            <div class="form-group-cnt2">
                            <label class="form-label-cnt3">Tiện ích, mô tả
                                BĐS</label>
                            <div contenteditable="true" class="form-control" id="description_value" style="height: 150px; overflow-y: auto;">
                            </div>
                            <input type="hidden" name="tien_ich_mo_ta" id="tien_ich_mo_ta_hidden" />
                            <script>
                                function updateHiddenInput() {
                                    var descriptionContent = document.getElementById("description_value").innerHTML;
                                    document.getElementById("tien_ich_mo_ta_hidden").value = descriptionContent;
                                }

                                document.getElementById("description_value").addEventListener("input", updateHiddenInput);
                            </script>

                            <style>
                                .text-formatting .btn {
                                    margin-right: 5px;
                                }
                            </style>
                            </div>
                        </div>
            ';
        } else if ($request->value >= 8 && $request->value <= 9) {
            // canho
            $data = '
            <div class="bds-type-content">
                <div class="bds-type-content">
                        <div class="btn-cnt-type">
                        <h3 class="cnt-hdeg">Địa chỉ bất động sản</h3>';
                        if($request->type == 'sell') {
                            $data .= '
                                <div class="form-group-cnt1 name-land-style">
                                    <label for class="form-lable-cnt3"
                                    style="font-size: 15px">Tên tòa nhà / khu dân cư
                                    /Dự án
                                    <span class="text-red">(*)</span></label>
                                    <input type="text" class="search-input" id="name_building"
                                    placeholder=" " />
                                </div>
                            ';
                        }
                        $data .= '
                        <div class="form-group-cnt1">
                            <label for class="form-lable-cnt3"
                            style="font-size: 15px">
                            Địa chỉ căn hộ <span
                                class="text-red">(*)</span>
                            </label>
                            <a id="" class="form-control toggle-address-form text-truncate" style="cursor: pointer;"></a>
                            <input type="hidden" name="district_id_hidden" value="">
                            <input type="hidden" name="ward_id_hidden" value="">
                            <input type="hidden" name="street_id_hidden" value="">
                            <input type="hidden" name="address_value_hidden" value="">
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
                                    name="toa_do"
                                    placeholder="10.787281170604397, 106.64923009534502" />
                                </div>
                            </div>
                            </div>
                        </div>';

                        if($request->type == 'sell') {
                            $data .= '
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
                            ';
                        }

                        $data .= '
                    <h3 class="cnt-hdeg">Vị trí BĐS</h3>
                    <div class="location">
                        <div class="row">
                        <div class="col-custom">
                            <div class="form-group-cnt2">
                            <label class="form-label-cnt3">Mã
                                căn</label>
                            <input
                                type="text"
                                name="ma_can"
                                class="form-control"
                                required />
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
                                name="tang_so"
                                required />
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
                                min="1"
                                value
                                name="phong_ngu"
                                class="form-control"
                                required />
                            </div>
                        </div>
                        <div class="col-custom">
                            <div class="form-group-cnt2">
                            <label class="form-label-cnt3">Số Tầng
                                <span class="text-red">(*)</span></label>
                            <input
                                required
                                type="number"
                                name="so_tang"
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
                                required
                                type="text"
                                name="dien_tich_dat"
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
                                type="text"
                                min="1"
                                class="form-control"
                                name="width_m"
                                    required
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
                                name="length_m"
                                    required
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
                                oninput="formatNumber(this)"
                                name="price"
                                    required />
                                <div class="input-append">
                                <span class="input-text">đ</span>
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>

                    <h3 class="cnt-hdeg">Thông tin thêm</h3>';

                            if($request->type == 'sell') {
                                $data .= '
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group-cnt2">
                                            <label class="form-label-cnt3">Pháp lý <span
                                                class="text-red">(*)</span>
                                            </label>
                                            <select
                                                class="form-control"
                                                name="phap_ly"
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
                                                name="chi_tiet_phap_ly"
                                                placeholder="Ví dụ: Đang cầm cố ngân hàng, sổ có chung nhiều người, có đang tranh chấp kiện tụng, có đang phát mãi, ..."></textarea>
                                            </div>
                                        </div>
                                    </div>
                                ';
                            }
                            $data .=
                            '

                    <h3 class="cnt-hdeg">Tiêu đề &amp; Mô tả</h3>
                    <div class="form-group-cnt2">
                        <label class="form-label-cnt3">Tiêu đề tin
                        đăng<span class="text-red">(*)</span></label>
                        <input
                        type="text"
                        required
                        name="tieu_de_tin_dang"
                        class="form-control"
                        placeholder="Tiêu đề ngắn gọn cho tin đăng" />
                    </div>
                    <div class="form-group-cnt2">
                        <label class="form-label-cnt3">Tiện ích, mô tả
                        BĐS</label>
                            <div contenteditable="true" class="form-control" id="description_value" style="height: 150px; overflow-y: auto;">
                            </div>
                            <input type="hidden" name="tien_ich_mo_ta" id="tien_ich_mo_ta_hidden" />
                            <script>
                                function updateHiddenInput() {
                                    var descriptionContent = document.getElementById("description_value").innerHTML;
                                    document.getElementById("tien_ich_mo_ta_hidden").value = descriptionContent;
                                }

                                document.getElementById("description_value").addEventListener("input", updateHiddenInput);
                            </script>

                            <style>
                                .text-formatting .btn {
                                    margin-right: 5px;
                                }
                            </style>
                    </div>
                </div>

        ';
        } else {
            // dat
            $data = '
                <div class="bds-type-content">
                        <div class="btn-cnt-type">
                        <h3 class="cnt-hdeg">Địa chỉ bất động sản</h3>';
                        if($request->type == 'sell') {
                            $data .= '
                                <div class="form-group-cnt1 name-land-style">
                                    <label for class="form-lable-cnt3"
                                    style="font-size: 15px">Tên tòa nhà / khu dân cư
                                    /Dự án
                                    <span class="text-red">(*)</span></label>
                                    <input type="text" class="search-input" id="name_building"
                                    placeholder=" " />
                                </div>
                            ';
                        }
                        $data .= '
                        <div class="form-group-cnt1">
                            <label for class="form-lable-cnt3"
                            style="font-size: 15px">
                            Địa chỉ đất <span
                                class="text-red">(*)</span>
                            </label>
                            <a id="" class="form-control toggle-address-form text-truncate" style="cursor: pointer;"></a>
                            <input type="hidden" name="district_id_hidden" value="">
                            <input type="hidden" name="ward_id_hidden" value="">
                            <input type="hidden" name="street_id_hidden" value="">
                            <input type="hidden" name="address_value_hidden" value="">
                        </div>

                        <div class="row">
                            <div class="col-12">
                            <div class="form-group-cnt3">
                                <label class="form-label-cnt3">Tọa độ vị
                                trí</label>
                                <div class="input-group1">
                                <input
                                    type="text"
                                    class="form-control"
                                    name="toa_do"
                                    placeholder="10.787281170604397, 106.64923009534502" />
                                </div>
                            </div>
                            </div>
                        </div>';

                        if($request->type == 'sell') {
                            $data .= '
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
                            ';
                        }

                        $data .= '

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
                                    type="text"
                                    name="dien_tich_dat"
                                required
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
                                    type="text"
                                    min="0"
                                    name="contructionArea"
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
                                    type="text"
                                    name="width_m"
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
                                    type="text"
                                    name="length_m"
                                    required
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
                                    oninput="formatNumber(this)"
                                    name="price"
                                    required />
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
                                </label>
                                <div class="input-group1">
                                <input
                                    type="text"
                                    class="form-control"
                                    name="deposit"
                                    oninput="formatNumber(this)" />
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
                                <span class="text-red">(*)</span>
                                <input type="radio" name="alley" id="trongngo" value="1" />
                                <div>Trong ngõ, hẻm</div>
                            </label>
                            <label for="mattien" class="rd-2">
                                <input type="radio" name="alley" id="mattien" value="2" />
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
                                </label>
                                <div class="input-group1">
                                <input
                                    type="number"
                                    name="alley_width"
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
                            </label>
                            <select
                                class="form-control"
                                name="loai_duong"
                                >
                                <option selected value>-</option>
                                <option value="1">Đường nhựa</option>
                                <option value="2">Đường bê tông</option>
                                <option value="3">Đường đất</option>
                                <option value="4">Đường đá</option>
                            </select>
                            </div>
                        </div>
                        </div>';

                            if($request->type == 'sell') {
                                $data .= '
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group-cnt2">
                                            <label class="form-label-cnt3">Pháp lý <span
                                                class="text-red">(*)</span>
                                            </label>
                                            <select
                                                class="form-control"
                                                name="phap_ly"
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
                                                name="chi_tiet_phap_ly"
                                                placeholder="Ví dụ: Đang cầm cố ngân hàng, sổ có chung nhiều người, có đang tranh chấp kiện tụng, có đang phát mãi, ..."></textarea>
                                            </div>
                                        </div>
                                    </div>
                                ';
                            }
                            $data .=
                            '

                        <h3 class="cnt-hdeg">Tiêu đề &amp; Mô tả</h3>
                        <div class="form-group-cnt2">
                        <label class="form-label-cnt3">Tiêu đề tin
                            đăng<span class="text-red">(*)</span></label>
                        <input
                            type="text"
                            required
                            name="tieu_de_tin_dang"
                            class="form-control"
                            placeholder="Tiêu đề ngắn gọn cho tin đăng" />
                        </div>
                        <div class="form-group-cnt2">
                        <label class="form-label-cnt3">Tiện ích, mô tả
                            BĐS</label>
                            <div contenteditable="true" class="form-control" id="description_value" style="height: 150px; overflow-y: auto;">
                            </div>
                            <input type="hidden" name="tien_ich_mo_ta" id="tien_ich_mo_ta_hidden" />
                            <script>
                                function updateHiddenInput() {
                                    var descriptionContent = document.getElementById("description_value").innerHTML;
                                    document.getElementById("tien_ich_mo_ta_hidden").value = descriptionContent;
                                }

                                document.getElementById("description_value").addEventListener("input", updateHiddenInput);
                            </script>

                            <style>
                                .text-formatting .btn {
                                    margin-right: 5px;
                                }
                            </style>
                        </div>
                    </div>
        ';
        }
        $data .= '
                    <hr>
                    <div class="info-land">
                    <div class="form-view-group">
                        <h6 class="form-stle">
                            Liên hệ người đăng
                            <br><small>(Thông tin được hiển thị công khai)</small>
                        </h6>
                        <div class="form-group form-type-user">
                        <div class="row" style="max-width: 480px;;">
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="ht-opt">
                                        <input type="radio" class="ht-opt__ipt" name="user_type" value="2">
                                        <div class="ht-opt__lbl">Chính chủ</div>
                                    </label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="ht-opt">
                                        <input type="radio" class="ht-opt__ipt" name="user_type" value="1" checked="">
                                        <div class="ht-opt__lbl">Không chính chủ</div>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group form-first-info d-none">
                            <div class="input-group">
                                <input type="text" class="form-control form-control-phonenum" placeholder="Số điện thoại" name="user_create_phone" value="'. Auth::user()->phone .'">
                                <input type="text" class="form-control" placeholder="Họ tên" name="user_create_name" value="'. Auth::user()->fullName .'">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-view-group landlord-info">
                        <h6 class="form-stle">Đầu chủ (Người nắm chủ)<i><small>(không bắt buộc)</small></i><br><small>(Thông
                                tin bảo mật chỉ hiển thị cho người đăng thấy)</small></h6>
                        <div class="row" style="max-width: 480px;;">
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="ht-opt">
                                        <input type="radio" class="ht-opt__ipt" name="type_name" value="1">
                                        <div class="ht-opt__lbl">Chủ nhà (đất)</div>
                                    </label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="ht-opt">
                                        <input type="radio" class="ht-opt__ipt" name="type_name" value="3">
                                        <div class="ht-opt__lbl">Môi giới</div>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" class="form-control form-control-phonenum" placeholder="Số điện thoại" name="landlord_phone">
                                <input type="text" class="form-control" placeholder="Họ tên" name="landlord_name">
                            </div>
                        </div>
                    </div>
                    <div class="form-group-submit">
                    <a href="{{ route("home") }}" class="btn btn-outline-dark">Hủy bỏ</a>
                        <button type="submit" class="btn btn-secondary btn-lg btn-submit-ppt" id="btn-save">
                        <i class="mdi mdi-checkbox-marked-outline mr-2"></i>Đăng tin ngay
                        </button>
                    </div>
                </form>
            </div>
            <script>
              function formatNumber(input) {
                  var value = input.value.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                  input.value = value;
              }
            </script>
        ';
        echo $data;
    }

    public function processPost(Request $request)
    {
        if(!isset($request->district_id_hidden) && $request->district_id_hidden == null || !isset($request->ward_id_hidden) && $request->ward_id_hidden == null || !isset($request->street_id_hidden) && $request->street_id_hidden == null || !isset($request->address_value_hidden) && $request->address_value_hidden == null) {
            return redirect()->back()->withInput()->withErrors(['address_errors' => 'Vui lòng chọn địa chỉ'])->with('error', 'Vui lòng chọn địa chỉ');
        }

        $postCode = rand(100000, 999999);
        $slug = Str::slug($request->tieu_de_tin_dang . ' ' . $postCode, '-');
        $price = str_replace(',', '', $request->price);

        if($request->user_type == 1) {
            if(isset($request->landlord_phone) && $request->landlord_phone != null) {
                $phone = explode(',', $request->landlord_phone);

                foreach ($phone as $item) {
                    $check = products::select('products.ProductID')
                        ->join('addressproduct', 'products.ProductID', '=', 'addressproduct.ProductID')
                        ->join('infoclientproduct', 'products.ProductID', '=', 'infoclientproduct.ProductID')
                        ->where('infoclientproduct.InfoContact', 'like', '%' . $item . '%')
                        ->where('addressproduct.addressnumber', $request->address_value_hidden)
                        ->where('addressproduct.StreetID', $request->street_id_hidden)
                        ->where('addressproduct.WardID', $request->ward_id_hidden)
                        ->where('addressproduct.DistrictID', $request->district_id_hidden)
                        ->where('products.CategoryID', $request->CategoryID)
                        ->where('products.TypeProduct', 1)
                        ->first();

                    if($check != null) {
                        return redirect()->back()->with('error', 'Thông tin bài đăng đã tồn tại');
                    }
                }
            }
        } else {
            if(isset($request->user_create_phone) && $request->user_create_phone != null) {
                $check = products::select('products.ProductID')
                    ->join('addressproduct', 'products.ProductID', '=', 'addressproduct.ProductID')
                    ->join('infoclientproduct', 'products.ProductID', '=', 'infoclientproduct.ProductID')
                    ->where('infoclientproduct.InfoContact', $request->user_create_phone)
                    ->where('addressproduct.addressnumber', $request->address_value_hidden)
                    ->where('addressproduct.StreetID', $request->street_id_hidden)
                    ->where('addressproduct.WardID', $request->ward_id_hidden)
                    ->where('addressproduct.DistrictID', $request->district_id_hidden)
                    ->where('products.CategoryID', $request->CategoryID)
                    ->where('products.TypeProduct', 1)
                    ->first();

                if($check != null) {
                    return redirect()->back()->with('error', 'Thông tin bài đăng đã tồn tại');
                }
            }
        }

        if($request->user_type == 1) {
            if($request->landlord_name == null || $request->landlord_phone == null || $request->landlord_phone == null) {
                return redirect()->back()->with('error', 'Vui lòng nhập đầy đủ thông tin liên hệ');
            }
        }

        if(stripos($request->dien_tich_dat, ',') !== false) {
            $request['dien_tich_dat'] = str_replace(',', '.', $request->dien_tich_dat);
        }

        if(stripos($request->width_m, ',') !== false) {
            $request['width_m'] = str_replace(',', '.', $request->width_m);
        }

        if(stripos($request->length_m, ',') !== false) {
            $request['length_m'] = str_replace(',', '.', $request->length_m);
        }

        if(isset($request->contructionArea) && $request->contructionArea != null) {
            if(stripos($request->contructionArea, ',') !== false) {
                $request['contructionArea'] = str_replace(',', '.', $request->contructionArea);
            }
        }

        if(isset($request->alley_width) && $request->alley_width != null) {
            if(stripos($request->alley_width, ',') !== false) {
                $request['alley_width'] = str_replace(',', '.', $request->alley_width);
            }
        }
        if(isset($request->listNameImages) && $request->listNameImages != '') {
            $listNameImages = explode(',', $request->listNameImages);
            $fileNameOneImage = $listNameImages[0];
        } else {
            $avatar = $request->file('avatar');
            $fileNameOneImage = time() . '-GulandMienNam.' . $avatar->getClientOriginalExtension();
            $avatar->move(public_path('Assets/Images/Products'), $fileNameOneImage);
        }

        products::create([
            'title' => $request->tieu_de_tin_dang,
            'price' => $price,
            'slug' => $slug,
            'deposit' => (isset($request->deposit) && $request->deposit != null) ? str_replace(',', '', $request->deposit) : 0,
            'avatar' => $fileNameOneImage,
            'TypeProduct' => ($request->category == 'sell') ? 2 : 1,
            'direction' => $request->direction,
            'totalArea' => $request->dien_tich_dat,
            'floors' => (isset($request->so_tang) && $request->so_tang != null) ? $request->so_tang : 0,
            'phaply' => (isset($request->phap_ly) && $request->phap_ly != null) ? $request->phap_ly : 7,
            'chitietphaply' => (isset($request->chi_tiet_phap_ly) && $request->chi_tiet_phap_ly != null) ? $request->chi_tiet_phap_ly : '',
            'description' => (isset($request->tien_ich_mo_ta) && $request->tien_ich_mo_ta != null) ? $request->tien_ich_mo_ta : '',
            'postCode' => $postCode,
            'PostingStatus' => $request->is_public,
            'CategoryID' => $request->CategoryID,
            'UserID' => Auth::user()->id
        ]);

        $ProductID = products::orderBy('ProductID', 'desc')->where('UserID', Auth::user()->id)->first()->ProductID;

        if(isset($request->listNameImages) && $request->listNameImages != '' && stripos($request->listNameImages, 'GulandMienNam') !== false) {
            $listNameImages = explode(',', $request->listNameImages);
            if(count($listNameImages) > 1) {
                unset($listNameImages[0]);
                foreach ($listNameImages as $item) {
                    imageproduct::create([
                        'ImageFile' => $item,
                        'ProductID' => $ProductID,
                        'TypeImage' => 1
                    ]);
                }
            }
        } else {
            $file = ($request->hasFile('file_real_1') && $request->file('file_real_1') != null) ? $request->file('file_real_1') : array();
            if(count($file) > 0) {
                foreach ($file as $item) {
                    try {
                        $fileName = time() . '-GulandMienNam-' . rand(10000, 1000000) . '.' . $item->getClientOriginalExtension();
                        $item->move(public_path('Assets/Images/Products'), $fileName);

                        if (file_exists(public_path('Assets/Images/Products') . '/' . $fileName)) {
                            imageproduct::create([
                                'ImageFile' => $fileName,
                                'ProductID' => $ProductID,
                                'TypeImage' => 1
                            ]);
                        } else {
                            Log::error('File was not moved successfully: ' . $fileName);
                        }
                    } catch (\Exception $e) {
                        Log::error('Error uploading file: ' . $e->getMessage());
                    }
                }
            }
        }


        if(isset($request->file_hopdong) && $request->file_hopdong != null) {
            $file = $request->file('file_hopdong');

            for ($i = 0; $i < count($file); $i++) {
                $fileName = time() . '-GulandMienNam-' . rand(10000, 1000000) . '.' . $file[$i]->getClientOriginalExtension();
                $file[$i]->move(public_path('Assets/Images/Contract'), $fileName);
                imageproduct::create([
                    'ImageFile' => $fileName,
                    'ProductID' => $ProductID,
                    'TypeImage' => 2
                ]);
            }
        }

        if($request->category == 'rent') {
            if(isset($request->utilities) && $request->utilities != null) {
                foreach ($request->utilities as $item) {
                    product_utilities::create([
                        'UtilityName' => $item,
                        'ProductID' => $ProductID
                    ]);
                }
            }
        }

        areaproduct::create([
            'width' => $request->width_m,
            'height' => $request->length_m,
            'contructionArea' => (isset($request->contructionArea) && $request->contructionArea != null) ? $request->contructionArea : 0,
            'ProductID' => $ProductID,
        ]);

        if(isset($request->alley) && $request->alley != null) {
            alleyproduct::create([
                'AlleyLocation' => $request->alley,
                'AlleyWidth' => (isset($request->alley_width) && $request->alley_width != null) ? $request->alley_width : 0,
                'AlleyType' => (isset($request->loai_duong) && $request->loai_duong != null) ? $request->loai_duong : 5,
                'ProductID' => $ProductID
            ]);
        }

        addressproduct::create([
            'addressnumber' => $request->address_value_hidden,
            'StreetID' => $request->street_id_hidden,
            'WardID' => $request->ward_id_hidden,
            'DistrictID' => $request->district_id_hidden,
            'CityID' => 1,
            'AddressFull' => $request->address_value_hidden . ', ' . $request->ward_id_hidden . ', ' . $request->district_id_hidden . ', ' . $request->city_id_hidden,
            'ToaDo' => (isset($request->toa_do) && $request->toa_do != null) ? $request->toa_do : '',
            'ProductID' => $ProductID
        ]);

        if($request->user_type == 1) {
            if(isset($request->landlord_phone) && $request->landlord_phone != null) {
                $phone = explode(',', $request->landlord_phone);
                $name = explode(',', $request->landlord_name);

                if(count($phone) != count($name))
                    return redirect()->back()->with('error', 'Số điện thoại và tên không khớp nhau')
                        ->withInput();


                for ($i = 0; $i < count($phone); $i++) {
                    $phoneNumber = preg_replace('/[^0-9]/', '', $phone[$i]);
                    infoclientproduct::create([
                        'InfoName' => $name[$i],
                        'InfoContact' => $phoneNumber,
                        'TypeData' => $request->type_name,
                        'ProductID' => $ProductID
                    ]);
                }
            }
        } else {
            infoclientproduct::create([
                'InfoName' => $request->user_create_name,
                'InfoContact' => $request->user_create_phone,
                'TypeData' => 1,
                'ProductID' => $ProductID
            ]);
        }

        if($request->CategoryID <= 3) {
            businessinfo::create([
                'BathRoom' => (isset($request->phong_tam) && $request->phong_tam != null) ? $request->phong_tam : 0,
                'ProductID' => $ProductID
            ]);
            $title = Auth::user()->fullName . ' đã đăng tin ' . $request->tieu_de_tin_dang . ' - id: ' . $ProductID . ' - với ip: ' . $request->ip() . ' vào lúc ' . date('Y-m-d H:i:s');
            Controller::addRecord($title, Auth::user()->id);
            return redirect()->route('home')->with('success', 'Đăng tin thành công');
        } else if($request->CategoryID >= 4 && $request->CategoryID <= 7) {
            houseinfo::create([
                'BedRoom' => (isset($request->phong_ngu) && $request->phong_ngu != null) ? $request->phong_ngu : 0,
                'ProductID' => $ProductID
            ]);
            $title = Auth::user()->fullName . ' đã đăng tin ' . $request->tieu_de_tin_dang . ' - id: ' . $ProductID . ' - với ip: ' . $request->ip() . ' vào lúc ' . date('Y-m-d H:i:s');
            Controller::addRecord($title, Auth::user()->id);
            return redirect()->route('home')->with('success', 'Đăng tin thành công');
        } else if($request->CategoryID >= 8 && $request->CategoryID <= 9) {
            apartmentinfo::create([
                'CodeRoom' => (isset($request->ma_can) && $request->ma_can != null) ? $request->ma_can : 0,
                'block' => (isset($request->block) && $request->block != null) ? $request->block : 0,
                'BedRoom' => (isset($request->phong_ngu) && $request->phong_ngu != null) ? $request->phong_ngu : 0,
                'frequency' => (isset($request->tang_so) && $request->tang_so != null) ? $request->tang_so : 0,
                'ProductID' => $ProductID
            ]);
            $title = Auth::user()->fullName . ' đã đăng tin ' . $request->tieu_de_tin_dang . ' - id: ' . $ProductID . ' - với ip: ' . $request->ip() . ' vào lúc ' . date('Y-m-d H:i:s');
            Controller::addRecord($title, Auth::user()->id);
            return redirect()->route('home')->with('success', 'Đăng tin thành công');
        } else if($request->CategoryID >= 10 && $request->CategoryID <= 14) {
            $title = Auth::user()->fullName . ' đã đăng tin ' . $request->tieu_de_tin_dang . ' - id: ' . $ProductID . ' - với ip: ' . $request->ip() . ' vào lúc ' . date('Y-m-d H:i:s');
            Controller::addRecord($title, Auth::user()->id);
            return redirect()->route('home')->with('success', 'Đăng tin thành công');
        } else {
            $title = Auth::user()->fullName . ' đã spam tin đăng tin';
            Controller::addRecord($title, Auth::user()->id);
            return redirect()->back()->with('error', 'Danh mục không tồn tại');
        }
    }

    public function processEdit(request $request, $id)
    {
        // dd($request->all());

        if(isset($request->avatar) && $request->avatar != null) {
            $extension = $request->avatar->getClientOriginalExtension();
            if($extension != 'jpg' && $extension != 'jpeg' && $extension != 'png' && $extension != 'gif' && $extension != 'webp') {
                return redirect()->back()->withInput()->with('error', 'Vui lòng chọn ảnh đại diện đúng định dạng');
            }

            if(file_exists(public_path('Assets/Images/Products') . '/' . products::where('ProductID', $id)->first()->avatar)) {
                unlink(public_path('Assets/Images/Products') . '/' . products::where('ProductID', $id)->first()->avatar);
            }

            $fileNameOneImage = time() . '-GulandMienNam.' . $request->avatar->getClientOriginalExtension();
            $request->avatar->move(public_path('Assets/Images/Products'), $fileNameOneImage);
            products::where('ProductID', $id)->update(['avatar' => $fileNameOneImage]);
        }

        if(isset($request->file_real_1) && $request->file_real_1 != null) {
            if(isset($request->is_keep_image) && $request->is_keep_image == "1") {
                foreach ($request->file('file_real_1') as $file) {
                    $extension = $file->getClientOriginalExtension();
                    if (!in_array($extension, ['jpg', 'jpeg', 'png', 'gif', 'webp'])) {
                        return redirect()->back()->withInput()->withErrors(['file_real_1' => 'File không phải là ảnh'])->with('error', 'File không phải là ảnh');
                    }
                }
                foreach ($request->file('file_real_1') as $file) {
                    $fileName = time() . '-GulandMienNam-' . rand(10000, 1000000) . '.' . $file->getClientOriginalExtension();
                    $file->move(public_path('Assets/Images/Products'), $fileName);
                    imageproduct::create([
                        'ImageFile' => $fileName,
                        'ProductID' => $id,
                        'TypeImage' => 1
                    ]);
                }
            } else {
                imageproduct::where('ProductID', $id)->where('TypeImage', 1)->delete();
                $file = $request->file('file_real_1');

                foreach ($file as $item) {
                    try {
                        $fileName = time() . '-GulandMienNam-' . rand(10000, 1000000) . '.' . $item->getClientOriginalExtension();
                        $item->move(public_path('Assets/Images/Products'), $fileName);

                        if (file_exists(public_path('Assets/Images/Products') . '/' . $fileName)) {
                            imageproduct::create([
                                'ImageFile' => $fileName,
                                'ProductID' => $id,
                                'TypeImage' => 1
                            ]);
                        } else {
                            Log::error('File was not moved successfully: ' . $fileName);
                        }
                    } catch (\Exception $e) {
                        Log::error('Error uploading file: ' . $e->getMessage());
                    }
                }
            }
        }

        $postCode = products::where('ProductID', $id)->first()->postCode;

        $slug = Str::slug($request->tieu_de_tin_dang . ' ' . $postCode, '-');

        $price = str_replace(',', '', $request->price);

        if(isset($request->deposit) && $request->deposit != 0 || isset($request->deposit) && $request->deposit != null) {
            $deposit = str_replace(',', '', $request->deposit);
        } else {
            $deposit = 0;
        }

        if(stripos($request->dien_tich_dat, ',') !== false) {
            $request['dien_tich_dat'] = str_replace(',', '.', $request->dien_tich_dat);
        }

        if(stripos($request->width_m, ',') !== false) {
            $request['width_m'] = str_replace(',', '.', $request->width_m);
        }

        if(stripos($request->length_m, ',') !== false) {
            $request['length_m'] = str_replace(',', '.', $request->length_m);
        }

        if(isset($request->contructionArea) && $request->contructionArea != null) {
            if(stripos($request->contructionArea, ',') !== false) {
                $request['contructionArea'] = str_replace(',', '.', $request->contructionArea);
            }
        }

        if(isset($request->alley_width) && $request->alley_width != null) {
            if(stripos($request->alley_width, ',') !== false) {
                $request['alley_width'] = str_replace(',', '.', $request->alley_width);
            }
        }

        products::where('ProductID', $id)->update([
            'title' => $request->tieu_de_tin_dang,
            'price' => $price,
            'slug' => $slug,
            'deposit' => $deposit,
            'TypeProduct' => ($request->category == 'sell') ? 2 : 1,
            'direction' => ($request->direction != 'old') ? $request->direction : products::where('ProductID', $id)->first()->direction,
            'totalArea' => $request->dien_tich_dat,
            'floors' => (isset($request->so_tang) && $request->so_tang != null) ? $request->so_tang : 0,
            'phaply' => (isset($request->phap_ly) && $request->phap_ly != null) ? $request->phap_ly : 7,
            'chitietphaply' => (isset($request->chi_tiet_phap_ly) && $request->chi_tiet_phap_ly != null) ? $request->chi_tiet_phap_ly : '',
            'description' => (isset($request->tien_ich_mo_ta) && $request->tien_ich_mo_ta != null) ? $request->tien_ich_mo_ta : '',
            'PostingStatus' => $request->is_public,
            'CategoryID' => $request->CategoryID,
            'UserID' => products::where('ProductID', $id)->first()->UserID
        ]);

        if(isset($request->file_hopdong) && $request->file_hopdong != null) {
            if(isset($request->is_keep_hopdong) && $request->is_keep_hopdong == "1") {
                foreach ($request->file('file_hopdong') as $file) {
                    $extension = $file->getClientOriginalExtension();
                    if (!in_array($extension, ['jpg', 'jpeg', 'png', 'gif', 'webp'])) {
                        return redirect()->back()->withInput()->withErrors(['file_hopdong' => 'File không phải là ảnh'])->with('error', 'File không phải là ảnh');
                    }
                }
                foreach ($request->file('file_hopdong') as $file) {
                    $fileName = time() . '-GulandMienNam-' . rand(10000, 1000000) . '.' . $file->getClientOriginalExtension();
                    $file->move(public_path('Assets/Images/Contract'), $fileName);
                    imageproduct::create([
                        'ImageFile' => $fileName,
                        'ProductID' => $id,
                        'TypeImage' => 2
                    ]);
                }
            } else {
                imageproduct::where('ProductID', $id)->where('TypeImage', 2)->delete();
                $file = $request->file('file_hopdong');
                foreach ($file as $item) {
                    $fileName = time() . '-GulandMienNam-' . rand(10000, 1000000) . '.' . $item->getClientOriginalExtension();
                    $item->move(public_path('Assets/Images/Contract'), $fileName);
                    imageproduct::create([
                        'ImageFile' => $fileName,
                        'ProductID' => $id,
                        'TypeImage' => 2
                    ]);
                }
            }
        }

        if($request->category == 'rent') {
            product_utilities::where('ProductID', $id)->delete();
            if(isset($request->utilities) && $request->utilities != null) {
                foreach ($request->utilities as $item) {
                    product_utilities::create([
                        'UtilityName' => $item,
                        'ProductID' => $id
                    ]);
                }
            }
        }

        areaproduct::where('ProductID', $id)->update([
            'width' => $request->width_m,
            'height' => $request->length_m,
            'contructionArea' => (isset($request->contructionArea) && $request->contructionArea != null) ? $request->contructionArea : 0,
        ]);

        if(isset($request->alley) && $request->alley != null) {
            alleyproduct::where('ProductID', $id)->update([
                'AlleyLocation' => $request->alley,
                'AlleyWidth' => (isset($request->alley_width) && $request->alley_width != null) ? $request->alley_width : 0,
                'AlleyType' => (isset($request->loai_duong) && $request->loai_duong != null && $request->loai_duong != 'old') ? $request->loai_duong : alleyproduct::where('ProductID', $id)->first()->AlleyType,
            ]);
        }

        addressproduct::where('ProductID', $id)->update([
            'addressnumber' => $request->address_value_hidden,
            'StreetID' => $request->street_id_hidden,
            'WardID' => $request->ward_id_hidden,
            'DistrictID' => $request->district_id_hidden,
            'CityID' => 1,
            'AddressFull' => $request->address_value_hidden . ', ' . $request->ward_id_hidden . ', ' . $request->district_id_hidden . ', ' . $request->city_id_hidden,
            'ToaDo' => (isset($request->toa_do) && $request->toa_do != null) ? $request->toa_do : '',
        ]);

        if($request->user_type == 1) {
            if(isset($request->landlord_phone) && $request->landlord_phone != null) {
                $phone = explode(',', $request->landlord_phone);
                $name = explode(',', $request->landlord_name);

                if(count($phone) != count($name))
                    return redirect()->back()->with('error', 'Số điện thoại và tên không khớp nhau')
                        ->withInput();

                infoclientproduct::where('ProductID', $id)->delete();
                for ($i = 0; $i < count($phone); $i++) {
                    $phoneNumber = preg_replace('/[^0-9]/', '', $phone[$i]);
                    infoclientproduct::create([
                        'InfoName' => $name[$i],
                        'InfoContact' => $phoneNumber,
                        'TypeData' => $request->type_name,
                        'ProductID' => $id
                    ]);
                }
            }
        } else {
            infoclientproduct::where('ProductID', $id)->delete();
            infoclientproduct::create([
                'InfoName' => $request->user_create_name,
                'InfoContact' => $request->user_create_phone,
                'TypeData' => 1,
                'ProductID' => $id
            ]);
        }

        if($request->CategoryID <= 3) {
            businessinfo::where('ProductID', $id)->update([
                'BathRoom' => (isset($request->phong_tam) && $request->phong_tam != null) ? $request->phong_tam : 0,
            ]);
            $title = Auth::user()->fullName . ' đã cập nhật tin ' . $postCode . ' - id: ' . $id . ' - với ip: ' . $request->ip() . ' vào lúc ' . date('Y-m-d H:i:s');
            Controller::addRecord($title, Auth::user()->id);
            return redirect('/method/search?code='. $postCode)->with('success', 'Cập nhật tin có mã ' . $postCode . ' thành công');
        } else if($request->CategoryID >= 4 && $request->CategoryID <= 7) {
            houseinfo::where('ProductID', $id)->update([
                'BedRoom' => (isset($request->phong_ngu) && $request->phong_ngu != null) ? $request->phong_ngu : 0,
            ]);
            $title = Auth::user()->fullName . ' đã cập nhật tin ' . $postCode . ' - id: ' . $id . ' - với ip: ' . $request->ip() . ' vào lúc ' . date('Y-m-d H:i:s');
            Controller::addRecord($title, Auth::user()->id);
            return redirect('/method/search?code='. $postCode)->with('success', 'Cập nhật tin có mã ' . $postCode . ' thành công');
        } else if($request->CategoryID >= 8 && $request->CategoryID <= 9) {
            apartmentinfo::where('ProductID', $id)->update([
                'CodeRoom' => (isset($request->ma_can) && $request->ma_can != null) ? $request->ma_can : 0,
                'block' => (isset($request->block) && $request->block != null) ? $request->block : 0,
                'BedRoom' => (isset($request->phong_ngu) && $request->phong_ngu != null) ? $request->phong_ngu : 0,
                'frequency' => (isset($request->tang_so) && $request->tang_so != null) ? $request->tang_so : 0,
            ]);
            $title = Auth::user()->fullName . ' đã cập nhật tin ' . $postCode . ' - id: ' . $id . ' - với ip: ' . $request->ip() . ' vào lúc ' . date('Y-m-d H:i:s');
            Controller::addRecord($title, Auth::user()->id);
            return redirect('/method/search?code='. $postCode)->with('success', 'Cập nhật tin có mã ' . $postCode . ' thành công');
        } else if($request->CategoryID >= 10 && $request->CategoryID <= 14) {
            $title = Auth::user()->fullName . ' đã cập nhật tin ' . $postCode . ' - id: ' . $id . ' - với ip: ' . $request->ip() . ' vào lúc ' . date('Y-m-d H:i:s');
            Controller::addRecord($title, Auth::user()->id);
            return redirect('/method/search?code='. $postCode)->with('success', 'Cập nhật tin có mã ' . $postCode . ' thành công');
        } else {
            return redirect()->back()->with('error', 'Danh mục không tồn tại');
        }
    }

    public function processStatus($id, $status)
    {
        if($status > 10 || $status < 1) {
            return redirect()->back()->with('error', 'Trạng thái không hợp lệ');
        }
        if($status != 8 && $status != 10) {
            if(Auth::check()) {
                $product = products::where('ProductID', $id)->first();
                if($product) {
                    if($product->UserID == Auth::user()->id || Controller::checkRole(Controller::getRole()->MainRole) >= 6 || Controller::getRole()->UpperID == Auth::user()->id) {
                        products::where('ProductID', $id)->update(['PostingStatus' => $status]);
                        return redirect()->back()->with('success', 'Cập nhật trạng thái thành công');
                    } else {
                        return redirect()->back()->with('error', 'Bạn không có quyền cập nhật trạng thái');
                    }
                } else {
                    return redirect()->back()->with('error', 'Tin đăng không tồn tại');
                }
            }
        } else {
            if(Auth::check()) {
                $product = products::where('ProductID', $id)->first();
                if($product->UserID == Auth::user()->id || Controller::checkRole(Controller::getRole()->MainRole) >= 6 || Controller::getRole()->UpperID == Auth::user()->id) {
                    if($status == 10) {
                        product_wishlists::where('ProductID', $id)->update(['status' => 0]);
                        return redirect()->back()->with('success', 'Đã xóa khỏi danh sách vị trí đẹp');
                    }
                    product_wishlists::updateOrCreate(
                        ['ProductID' => $id],
                        ['status' => 1]
                    );
                    return redirect()->back()->with('success', 'Đã thêm vào danh sách vị trí đẹp');
                }
            }
            return redirect()->back()->with('error', 'Vui lòng đăng nhập');
        }
    }

    public function addAddress(Request $request)
    {
        // dd($request->all());

        if($request->city_id == null || $request->district_id == null || $request->ward_id == null || $request->name_address == null) {
            return redirect()->back()->with('error', 'Vui lòng nhập đầy đủ thông tin');
        }

        $address_name = ucwords(strtolower($request->name_address));

        $data = streetapi::where('CityID', $request->city_id)
            ->where('DistrictID', $request->district_id)
            ->where('WardID', $request->ward_id)
            ->where('StreetName',  $address_name)
            ->get();

        if(count($data) > 0) {
            return redirect()->back()->with('error', 'Địa chỉ đã tồn tại');
        } else {
            streetapi::create([
                'StreetName' => $address_name,
                'DistrictID' => $request->district_id,
                'WardID' => $request->ward_id,
                'CityID' => 1,
            ]);
            $title = Auth::user()->fullName . ' đã thêm địa chỉ ' . $address_name . ' - với ip: ' . $request->ip() . ' vào lúc ' . date('Y-m-d H:i:s');
            Controller::addRecord($title, Auth::user()->id);
            return redirect()->back()->with('success', 'Thêm địa chỉ thành công');
        }
    }

    public function deletePermanently($id)
    {
        if(Auth::check()) {
            if(Controller::checkRole(Controller::getRole()->MainRole) >= 6) {
                if(products::where('ProductID', $id)->first() == null) {
                    return redirect()->back()->with('error', 'Tin đăng không tồn tại');
                }
                foreach (imageproduct::where('ProductID', $id)->get() as $item) {
                    if(file_exists(public_path('Assets/Images/Products') . '/' . $item->ImageFile)) {
                        unlink(public_path('Assets/Images/Products') . '/' . $item->ImageFile);
                    }
                }
                if(products::where('ProductID', $id)->delete()) {
                    return redirect()->back()->with('success', 'Xóa tin đăng thành công');
                }
                return redirect()->back()->with('error', 'Xóa tin đăng thất bại');
            }
        }
    }

    public function postedArticle($id = 0, request $request)
    {
        $id = ($id == 0) ? Auth::user()->id : $id;

        if(users::where('id', $id)->count() == 0) {
            return redirect()->route('home')->with('error', 'Người dùng không tồn tại');
        }

        $products = products::where('UserID', $id)->where('PostingStatus', 1)->get();
        if(count($products) > 0) {
            foreach ($products as $item) {
                $time = strtotime($item->updated_at);
                $nextMonth = strtotime('+1 months', $time);
                $now = strtotime(date('Y-m-d H:i:s'));
                if($now > $nextMonth) {
                    products::where('ProductID', $item->ProductID)->update(['PostingStatus' => 6]);
                }
            }
        }
        $products = products::select('products.*', 'product_wishlists.status as status_vitridep')
            ->join('product_wishlists', 'product_wishlists.ProductID', '=', 'products.ProductID')
            ->where('products.UserID', $id)
            ->where('products.PostingStatus', '!=', 5)
            ->where('products.PostingStatus', '!=', 9)
            ->orderBy('products.updated_at', 'desc')
            ->get();

        if(count($products) > 0) {
            foreach ($products as $item) {
                if($item->status_vitridep == 1) {
                    product_wishlists::where('ProductID', $item->ProductID)->update(['status' => 0]);
                }
            }
        }
        if($request->has('status') && Auth::check() && Controller::checkRole(Controller::getRole()->MainRole) >= 6 || $request->has('status') && Auth::check() && $id == Auth::user()->id || $request->has('status') && Auth::check() && Controller::getRole()->UpperID == Auth::user()->id) {
            $status = $request->status;
        } else {
            $status = 1;
        }

        if(session('fill_city_id') && session('fill_district_id') && !session('fill_ward_id') && session('fill_street_id')) {
            $countProduct = products::join('addressproduct', 'addressproduct.ProductID', '=', 'products.ProductID')
                ->join('streetapi', 'streetapi.StreetID', '=', 'addressproduct.StreetID')
                ->where('UserID', $id)
                ->where('PostingStatus', 8)
                ->where('addressproduct.CityID', session('fill_city_id'))
                ->where('addressproduct.DistrictID', session('fill_district_id'))
                ->where('streetapi.StreetName', 'like', '%' . Controller::convertAddressFromIDToName(session('fill_street_id'), '\App\Models\streetapi', 'StreetID') . '%')
                ->orWhere('PostingStatus', 5)
                ->where('UserID', $id)
                ->where('addressproduct.CityID', session('fill_city_id'))
                ->where('addressproduct.DistrictID', session('fill_district_id'))
                ->where('streetapi.StreetName', 'like', '%' . Controller::convertAddressFromIDToName(session('fill_street_id'), '\App\Models\streetapi', 'StreetID') . '%')
                ->count();

            $public = products::join('addressproduct', 'addressproduct.ProductID', '=', 'products.ProductID')
                ->join('streetapi', 'streetapi.StreetID', '=', 'addressproduct.StreetID')
                ->where('UserID', $id)
                ->where('PostingStatus', 1)
                ->where('addressproduct.CityID', session('fill_city_id'))
                ->where('addressproduct.DistrictID', session('fill_district_id'))
                ->where('streetapi.StreetName', 'like', '%' . Controller::convertAddressFromIDToName(session('fill_street_id'), '\App\Models\streetapi', 'StreetID') . '%')
                ->count();

            $expired = products::join('addressproduct', 'addressproduct.ProductID', '=', 'products.ProductID')
                ->join('streetapi', 'streetapi.StreetID', '=', 'addressproduct.StreetID')
                ->where('UserID', $id)
                ->where('PostingStatus', 6)
                ->where('addressproduct.CityID', session('fill_city_id'))
                ->where('addressproduct.DistrictID', session('fill_district_id'))
                ->where('streetapi.StreetName', 'like', '%' . Controller::convertAddressFromIDToName(session('fill_street_id'), '\App\Models\streetapi', 'StreetID') . '%')
                ->count();

            $sold = products::join('product_wishlists', 'product_wishlists.ProductID', '=', 'products.ProductID')
                ->join('addressproduct', 'addressproduct.ProductID', '=', 'products.ProductID')
                ->join('streetapi', 'streetapi.StreetID', '=', 'addressproduct.StreetID')
                ->where('products.UserID', $id)
                ->where('product_wishlists.status', 5)
                ->where('addressproduct.CityID', session('fill_city_id'))
                ->where('addressproduct.DistrictID', session('fill_district_id'))
                ->where('streetapi.StreetName', 'like', '%' . Controller::convertAddressFromIDToName(session('fill_street_id'), '\App\Models\streetapi', 'StreetID') . '%')
                ->orWhere('products.PostingStatus', 5)
                ->where('products.UserID', $id)
                ->where('addressproduct.CityID', session('fill_city_id'))
                ->where('addressproduct.DistrictID', session('fill_district_id'))
                ->where('streetapi.StreetName', 'like', '%' . Controller::convertAddressFromIDToName(session('fill_street_id'), '\App\Models\streetapi', 'StreetID') . '%')
                ->orWhere('products.PostingStatus', 9)
                ->where('products.UserID', $id)
                ->where('addressproduct.CityID', session('fill_city_id'))
                ->where('addressproduct.DistrictID', session('fill_district_id'))
                ->where('streetapi.StreetName', 'like', '%' . Controller::convertAddressFromIDToName(session('fill_street_id'), '\App\Models\streetapi', 'StreetID') . '%')
                ->count();

            $vi_tri_dep = products::join('product_wishlists', 'product_wishlists.ProductID', '=', 'products.ProductID')
                ->join('addressproduct', 'addressproduct.ProductID', '=', 'products.ProductID')
                ->join('streetapi', 'streetapi.StreetID', '=', 'addressproduct.StreetID')
                ->where('products.UserID', $id)
                ->where('product_wishlists.status', 1)
                ->where('addressproduct.CityID', session('fill_city_id'))
                ->where('addressproduct.DistrictID', session('fill_district_id'))
                ->where('streetapi.StreetName', 'like', '%' . Controller::convertAddressFromIDToName(session('fill_street_id'), '\App\Models\streetapi', 'StreetID') . '%')
                ->count();

            $return = products::join('addressproduct', 'addressproduct.ProductID', '=', 'products.ProductID')
                ->join('streetapi', 'streetapi.StreetID', '=', 'addressproduct.StreetID')
                ->where('UserID', $id)
                ->where('PostingStatus', 9)
                ->where('addressproduct.CityID', session('fill_city_id'))
                ->where('addressproduct.DistrictID', session('fill_district_id'))
                ->where('streetapi.StreetName', 'like', '%' . Controller::convertAddressFromIDToName(session('fill_street_id'), '\App\Models\streetapi', 'StreetID') . '%')
                ->count();

            $private = products::join('addressproduct', 'addressproduct.ProductID', '=', 'products.ProductID')
                ->join('streetapi', 'streetapi.StreetID', '=', 'addressproduct.StreetID')
                ->where('UserID', $id)
                ->where('PostingStatus', 2)
                ->where('addressproduct.CityID', session('fill_city_id'))
                ->where('addressproduct.DistrictID', session('fill_district_id'))
                ->where('streetapi.StreetName', 'like', '%' . Controller::convertAddressFromIDToName(session('fill_street_id'), '\App\Models\streetapi', 'StreetID') . '%')
                ->count();
        } else if(session('fill_city_id')) {
            if(session('fill_street_id')) {
                $countProduct = products::join('addressproduct', 'addressproduct.ProductID', '=', 'products.ProductID')
                    ->where('UserID', $id)
                    ->where('PostingStatus', 8)
                    ->where('addressproduct.CityID', session('fill_city_id'))
                    ->where('addressproduct.DistrictID', session('fill_district_id'))
                    ->where('addressproduct.WardID', session('fill_ward_id'))
                    ->where('addressproduct.StreetID', session('fill_street_id'))
                    ->orWhere('PostingStatus', 5)
                    ->where('UserID', $id)
                    ->where('addressproduct.CityID', session('fill_city_id'))
                    ->where('addressproduct.DistrictID', session('fill_district_id'))
                    ->where('addressproduct.WardID', session('fill_ward_id'))
                    ->where('addressproduct.StreetID', session('fill_street_id'))
                    ->count();

                $public = products::join('addressproduct', 'addressproduct.ProductID', '=', 'products.ProductID')
                    ->where('UserID', $id)
                    ->where('PostingStatus', 1)
                    ->where('addressproduct.CityID', session('fill_city_id'))
                    ->where('addressproduct.DistrictID', session('fill_district_id'))
                    ->where('addressproduct.WardID', session('fill_ward_id'))
                    ->where('addressproduct.StreetID', session('fill_street_id'))
                    ->count();

                $expired = products::join('addressproduct', 'addressproduct.ProductID', '=', 'products.ProductID')
                    ->where('UserID', $id)
                    ->where('PostingStatus', 6)
                    ->where('addressproduct.CityID', session('fill_city_id'))
                    ->where('addressproduct.DistrictID', session('fill_district_id'))
                    ->where('addressproduct.WardID', session('fill_ward_id'))
                    ->where('addressproduct.StreetID', session('fill_street_id'))
                    ->count();

                $sold = products::join('product_wishlists', 'product_wishlists.ProductID', '=', 'products.ProductID')
                    ->join('addressproduct', 'addressproduct.ProductID', '=', 'products.ProductID')
                    ->where('products.UserID', $id)
                    ->where('product_wishlists.status', 5)
                    ->where('addressproduct.CityID', session('fill_city_id'))
                    ->where('addressproduct.DistrictID', session('fill_district_id'))
                    ->where('addressproduct.WardID', session('fill_ward_id'))
                    ->where('addressproduct.StreetID', session('fill_street_id'))
                    ->orWhere('products.PostingStatus', 5)
                    ->where('products.UserID', $id)
                    ->where('addressproduct.CityID', session('fill_city_id'))
                    ->where('addressproduct.DistrictID', session('fill_district_id'))
                    ->where('addressproduct.WardID', session('fill_ward_id'))
                    ->where('addressproduct.StreetID', session('fill_street_id'))
                    ->orWhere('products.PostingStatus', 9)
                    ->where('products.UserID', $id)
                    ->where('addressproduct.CityID', session('fill_city_id'))
                    ->where('addressproduct.DistrictID', session('fill_district_id'))
                    ->where('addressproduct.WardID', session('fill_ward_id'))
                    ->where('addressproduct.StreetID', session('fill_street_id'))
                    ->count();

                $vi_tri_dep = products::join('product_wishlists', 'product_wishlists.ProductID', '=', 'products.ProductID')
                    ->join('addressproduct', 'addressproduct.ProductID', '=', 'products.ProductID')
                    ->where('products.UserID', $id)
                    ->where('product_wishlists.status', 1)
                    ->where('addressproduct.CityID', session('fill_city_id'))
                    ->where('addressproduct.DistrictID', session('fill_district_id'))
                    ->where('addressproduct.WardID', session('fill_ward_id'))
                    ->where('addressproduct.StreetID', session('fill_street_id'))
                    ->count();

                $return = products::join('addressproduct', 'addressproduct.ProductID', '=', 'products.ProductID')
                    ->where('UserID', $id)
                    ->where('PostingStatus', 9)
                    ->where('addressproduct.CityID', session('fill_city_id'))
                    ->where('addressproduct.DistrictID', session('fill_district_id'))
                    ->where('addressproduct.WardID', session('fill_ward_id'))
                    ->where('addressproduct.StreetID', session('fill_street_id'))
                    ->count();

                $private = products::join('addressproduct', 'addressproduct.ProductID', '=', 'products.ProductID')
                    ->where('UserID', $id)
                    ->where('PostingStatus', 2)
                    ->where('addressproduct.CityID', session('fill_city_id'))
                    ->where('addressproduct.DistrictID', session('fill_district_id'))
                    ->where('addressproduct.WardID', session('fill_ward_id'))
                    ->where('addressproduct.StreetID', session('fill_street_id'))
                    ->count();
            } else if(session('fill_ward_id')) {
                $countProduct = products::join('addressproduct', 'addressproduct.ProductID', '=', 'products.ProductID')
                    ->where('UserID', $id)
                    ->where('PostingStatus', 8)
                    ->where('addressproduct.CityID', session('fill_city_id'))
                    ->where('addressproduct.DistrictID', session('fill_district_id'))
                    ->where('addressproduct.WardID', session('fill_ward_id'))
                    ->orWhere('PostingStatus', 5)
                    ->where('UserID', $id)
                    ->where('addressproduct.CityID', session('fill_city_id'))
                    ->where('addressproduct.DistrictID', session('fill_district_id'))
                    ->where('addressproduct.WardID', session('fill_ward_id'))
                    ->count();

                $public = products::join('addressproduct', 'addressproduct.ProductID', '=', 'products.ProductID')
                    ->where('UserID', $id)
                    ->where('PostingStatus', 1)
                    ->where('addressproduct.CityID', session('fill_city_id'))
                    ->where('addressproduct.DistrictID', session('fill_district_id'))
                    ->where('addressproduct.WardID', session('fill_ward_id'))
                    ->count();

                $expired = products::join('addressproduct', 'addressproduct.ProductID', '=', 'products.ProductID')
                    ->where('UserID', $id)
                    ->where('PostingStatus', 6)
                    ->where('addressproduct.CityID', session('fill_city_id'))
                    ->where('addressproduct.DistrictID', session('fill_district_id'))
                    ->where('addressproduct.WardID', session('fill_ward_id'))
                    ->count();

                $sold = products::join('addressproduct', 'addressproduct.ProductID', '=', 'products.ProductID')
                    ->where('UserID', $id)
                    ->where('PostingStatus', 8)
                    ->where('addressproduct.CityID', session('fill_city_id'))
                    ->where('addressproduct.DistrictID', session('fill_district_id'))
                    ->where('addressproduct.WardID', session('fill_ward_id'))
                    ->orWhere('PostingStatus', 5)
                    ->where('UserID', $id)
                    ->where('addressproduct.CityID', session('fill_city_id'))
                    ->where('addressproduct.DistrictID', session('fill_district_id'))
                    ->where('addressproduct.WardID', session('fill_ward_id'))
                    ->orWhere('PostingStatus', 9)
                    ->where('UserID', $id)
                    ->where('addressproduct.CityID', session('fill_city_id'))
                    ->where('addressproduct.DistrictID', session('fill_district_id'))
                    ->where('addressproduct.WardID', session('fill_ward_id'))
                    ->count();

                $vi_tri_dep = products::join('product_wishlists', 'product_wishlists.ProductID', '=', 'products.ProductID')
                    ->join('addressproduct', 'addressproduct.ProductID', '=', 'products.ProductID')
                    ->where('products.UserID', $id)
                    ->where('product_wishlists.status', 1)
                    ->where('addressproduct.CityID', session('fill_city_id'))
                    ->where('addressproduct.DistrictID', session('fill_district_id'))
                    ->where('addressproduct.WardID', session('fill_ward_id'))
                    ->count();

                $return = products::join('addressproduct', 'addressproduct.ProductID', '=', 'products.ProductID')
                    ->where('UserID', $id)
                    ->where('PostingStatus', 9)
                    ->where('addressproduct.CityID', session('fill_city_id'))
                    ->where('addressproduct.DistrictID', session('fill_district_id'))
                    ->where('addressproduct.WardID', session('fill_ward_id'))
                    ->count();

                $private = products::join('addressproduct', 'addressproduct.ProductID', '=', 'products.ProductID')
                    ->where('UserID', $id)
                    ->where('PostingStatus', 2)
                    ->where('addressproduct.CityID', session('fill_city_id'))
                    ->where('addressproduct.DistrictID', session('fill_district_id'))
                    ->where('addressproduct.WardID', session('fill_ward_id'))
                    ->count();
            } else if(session('fill_district_id')) {
                $countProduct = products::join('addressproduct', 'addressproduct.ProductID', '=', 'products.ProductID')
                    ->where('UserID', $id)
                    ->where('PostingStatus', 8)
                    ->where('addressproduct.CityID', session('fill_city_id'))
                    ->where('addressproduct.DistrictID', session('fill_district_id'))
                    ->orWhere('PostingStatus', 5)
                    ->where('UserID', $id)
                    ->where('addressproduct.CityID', session('fill_city_id'))
                    ->where('addressproduct.DistrictID', session('fill_district_id'))
                    ->count();

                $public = products::join('addressproduct', 'addressproduct.ProductID', '=', 'products.ProductID')
                    ->where('UserID', $id)
                    ->where('PostingStatus', 1)
                    ->where('addressproduct.CityID', session('fill_city_id'))
                    ->where('addressproduct.DistrictID', session('fill_district_id'))
                    ->count();

                $expired = products::join('addressproduct', 'addressproduct.ProductID', '=', 'products.ProductID')
                    ->where('UserID', $id)
                    ->where('PostingStatus', 6)
                    ->where('addressproduct.CityID', session('fill_city_id'))
                    ->where('addressproduct.DistrictID', session('fill_district_id'))
                    ->count();

                $sold = products::join('addressproduct', 'addressproduct.ProductID', '=', 'products.ProductID')
                    ->where('UserID', $id)
                    ->where('PostingStatus', 8)
                    ->where('addressproduct.CityID', session('fill_city_id'))
                    ->where('addressproduct.DistrictID', session('fill_district_id'))
                    ->orWhere('PostingStatus', 5)
                    ->where('UserID', $id)
                    ->where('addressproduct.CityID', session('fill_city_id'))
                    ->where('addressproduct.DistrictID', session('fill_district_id'))
                    ->orWhere('PostingStatus', 9)
                    ->where('UserID', $id)
                    ->where('addressproduct.CityID', session('fill_city_id'))
                    ->where('addressproduct.DistrictID', session('fill_district_id'))
                    ->count();

                $vi_tri_dep = products::join('product_wishlists', 'product_wishlists.ProductID', '=', 'products.ProductID')
                    ->join('addressproduct', 'addressproduct.ProductID', '=', 'products.ProductID')
                    ->where('products.UserID', $id)
                    ->where('product_wishlists.status', 1)
                    ->where('addressproduct.CityID', session('fill_city_id'))
                    ->where('addressproduct.DistrictID', session('fill_district_id'))
                    ->count();

                $return = products::join('addressproduct', 'addressproduct.ProductID', '=', 'products.ProductID')
                    ->where('UserID', $id)
                    ->where('PostingStatus', 9)
                    ->where('addressproduct.CityID', session('fill_city_id'))
                    ->where('addressproduct.DistrictID', session('fill_district_id'))
                    ->count();

                $private = products::join('addressproduct', 'addressproduct.ProductID', '=', 'products.ProductID')
                    ->where('UserID', $id)
                    ->where('PostingStatus', 2)
                    ->where('addressproduct.CityID', session('fill_city_id'))
                    ->where('addressproduct.DistrictID', session('fill_district_id'))
                    ->count();
            } else if(session('fill_city_id')) {
                $countProduct = products::join('addressproduct', 'addressproduct.ProductID', '=', 'products.ProductID')
                    ->where('UserID', $id)
                    ->where('PostingStatus', 8)
                    ->where('addressproduct.CityID', session('fill_city_id'))
                    ->orWhere('PostingStatus', 5)
                    ->where('UserID', $id)
                    ->where('addressproduct.CityID', session('fill_city_id'))
                    ->count();

                $public = products::join('addressproduct', 'addressproduct.ProductID', '=', 'products.ProductID')
                    ->where('UserID', $id)
                    ->where('PostingStatus', 1)
                    ->where('addressproduct.CityID', session('fill_city_id'))
                    ->count();

                $expired = products::join('addressproduct', 'addressproduct.ProductID', '=', 'products.ProductID')
                    ->where('UserID', $id)
                    ->where('PostingStatus', 6)
                    ->where('addressproduct.CityID', session('fill_city_id'))
                    ->count();

                $sold = products::join('addressproduct', 'addressproduct.ProductID', '=', 'products.ProductID')
                    ->where('UserID', $id)
                    ->where('PostingStatus', 8)
                    ->where('addressproduct.CityID', session('fill_city_id'))
                    ->orWhere('PostingStatus', 5)
                    ->where('UserID', $id)
                    ->where('addressproduct.CityID', session('fill_city_id'))
                    ->orWhere('PostingStatus', 9)
                    ->where('UserID', $id)
                    ->where('addressproduct.CityID', session('fill_city_id'))
                    ->count();

                $vi_tri_dep = products::join('product_wishlists', 'product_wishlists.ProductID', '=', 'products.ProductID')
                    ->join('addressproduct', 'addressproduct.ProductID', '=', 'products.ProductID')
                    ->where('products.UserID', $id)
                    ->where('product_wishlists.status', 1)
                    ->where('addressproduct.CityID', session('fill_city_id'))
                    ->count();

                $return = products::join('addressproduct', 'addressproduct.ProductID', '=', 'products.ProductID')
                    ->where('UserID', $id)
                    ->where('PostingStatus', 9)
                    ->where('addressproduct.CityID', session('fill_city_id'))
                    ->count();

                $private = products::join('addressproduct', 'addressproduct.ProductID', '=', 'products.ProductID')
                    ->where('UserID', $id)
                    ->where('PostingStatus', 2)
                    ->where('addressproduct.CityID', session('fill_city_id'))
                    ->count();
            }
        } else {
            $countProduct = products::where('UserID', $id)->where('PostingStatus', 8)->orWhere('PostingStatus', 5)->where('UserID', $id)->count();
            $public = products::where('UserID', $id)->where('PostingStatus', 1)->count();
            $expired = products::where('UserID', $id)->where('PostingStatus', 6)->count();
            $sold = products::leftJoin('product_wishlists', 'product_wishlists.ProductID', '=', 'products.ProductID')
            ->where('products.UserID', $id)
            ->where('product_wishlists.status', 5)
            ->orWhere('products.PostingStatus', 5)
            ->where('products.UserID', $id)
            ->orWhere('products.PostingStatus', 9)
            ->where('products.UserID', $id)
            ->count();
            $vi_tri_dep = products::join('product_wishlists', 'product_wishlists.ProductID', '=', 'products.ProductID')->where('products.UserID', $id)->where('product_wishlists.status', 1)->count();
            $return = products::where('UserID', $id)->where('PostingStatus', 9)->count();
            $private = products::where('UserID', $id)->where('PostingStatus', 2)->count();
        }

        $chamchu = 0;

        $testChamchu = products::select('products.*')
            ->leftJoin('product_wishlists', 'product_wishlists.ProductID', '=', 'products.ProductID')
            ->where('products.UserID', $id)
            ->where('product_wishlists.status', 5)
            ->orWhere('products.PostingStatus', 5)
            ->where('products.UserID', $id)
            ->orWhere('products.PostingStatus', 9)
            ->where('products.UserID', $id)
            ->get();
        foreach ($testChamchu as $item) {
            $time = strtotime($item->updated_at);
            $nextMonth = strtotime('+2 months', $time);
            $now = strtotime(date('Y-m-d H:i:s'));
            if($nextMonth < $now) {
                $chamchu = $chamchu + 1;
            }
        }

        $role = Controller::getRole();
        $title = 'Danh sách tin đăng của ' . users::where('id', $id)->first()->fullName . ' Trên GulandMienNam';
        $description = 'Cho thuê nhà đất bất động sản Việt Nam chính chủ giá rẻ.
          Bất động sản Guland đăng tin cho thuê nhà đất chính chủ, môi giới giá rẻ, đầy đủ tiện ích, tiện di chuyển, an ninh, thoáng mát.';

        $type_collection = 'posted';
        if(session('fill_city_id') && session('fill_district_id') && !session('fill_ward_id') && session('fill_street_id')) {
            if($status == 5) {
                $products = products::select('products.*', 'areaproduct.height as AreaHeight', 'areaproduct.width as AreaWidth', 'addressproduct.WardID',
                    'addressproduct.StreetID', 'addressproduct.addressnumber', 'addressproduct.DistrictID', 'addressproduct.CityID', 'addressproduct.WardID', 'roleusers.UpperID',
                    'users.fullName', 'users.phone as userPhone',
                    'subcategoryproduct.name as subName', 'subcategoryproduct.slug as subSlug',
                    'product_wishlists.status as status_vitridep')
                    ->join('areaproduct', 'areaproduct.ProductID', '=', 'products.ProductID')
                    ->join('addressproduct', 'addressproduct.ProductID', '=', 'products.ProductID')
                    ->join('roleusers', 'roleusers.UserID', '=', 'products.UserID')
                    ->join('users', 'users.id', '=', 'products.UserID')
                    ->join('subcategoryproduct', 'subcategoryproduct.id', '=', 'products.CategoryID')
                    ->leftJoin('product_wishlists', 'product_wishlists.ProductID', '=', 'products.ProductID')
                    ->join('streetapi', 'streetapi.StreetID', '=', 'addressproduct.StreetID')
                    ->where('products.UserID', $id)
                    ->where('products.PostingStatus', intval($status))
                    ->where('addressproduct.CityID', session('fill_city_id'))
                    ->where('addressproduct.DistrictID', session('fill_district_id'))
                    ->where('streetapi.StreetName', 'like', '%' . Controller::convertAddressFromIDToName(session('fill_street_id'), '\App\Models\streetapi', 'StreetID') . '%')
                    ->orWhere('products.PostingStatus', 9)
                    ->where('products.UserID', $id)
                    ->where('addressproduct.CityID', session('fill_city_id'))
                    ->where('addressproduct.DistrictID', session('fill_district_id'))
                    ->where('streetapi.StreetName', 'like', '%' . Controller::convertAddressFromIDToName(session('fill_street_id'), '\App\Models\streetapi', 'StreetID') . '%')
                    ->orderBy('products.updated_at', 'desc')
                    ->get();
            } else if($status == 8) {
                $products = products::select('products.*', 'areaproduct.height as AreaHeight', 'areaproduct.width as AreaWidth', 'addressproduct.WardID',
                 'addressproduct.StreetID', 'addressproduct.addressnumber', 'addressproduct.DistrictID', 'addressproduct.CityID', 'addressproduct.WardID', 'roleusers.UpperID',
                 'users.fullName', 'users.phone as userPhone',
                 'subcategoryproduct.name as subName', 'subcategoryproduct.slug as subSlug',
                 'product_wishlists.status as status_vitridep')
                    ->join('areaproduct', 'areaproduct.ProductID', '=', 'products.ProductID')
                    ->join('addressproduct', 'addressproduct.ProductID', '=', 'products.ProductID')
                    ->join('roleusers', 'roleusers.UserID', '=', 'products.UserID')
                    ->join('users', 'users.id', '=', 'products.UserID')
                    ->join('subcategoryproduct', 'subcategoryproduct.id', '=', 'products.CategoryID')
                    ->join('product_wishlists', 'product_wishlists.ProductID', '=', 'products.ProductID')
                    ->join('streetapi', 'streetapi.StreetID', '=', 'addressproduct.StreetID')
                    ->where('products.UserID', $id)
                    ->where('product_wishlists.status', 1)
                    ->where('addressproduct.CityID', session('fill_city_id'))
                    ->where('addressproduct.DistrictID', session('fill_district_id'))
                    ->where('streetapi.StreetName', 'like', '%' . Controller::convertAddressFromIDToName(session('fill_street_id'), '\App\Models\streetapi', 'StreetID') . '%')
                    ->orderBy('products.updated_at', 'desc')
                    ->get();
            } else if($status == 10) {
                $products = products::select('products.*', 'areaproduct.height as AreaHeight', 'areaproduct.width as AreaWidth', 'addressproduct.WardID',
                 'addressproduct.StreetID', 'addressproduct.addressnumber', 'addressproduct.DistrictID', 'addressproduct.CityID', 'addressproduct.WardID', 'roleusers.UpperID',
                 'users.fullName', 'users.phone as userPhone',
                 'subcategoryproduct.name as subName', 'subcategoryproduct.slug as subSlug',
                 'product_wishlists.status as status_vitridep')
                    ->join('areaproduct', 'areaproduct.ProductID', '=', 'products.ProductID')
                    ->join('addressproduct', 'addressproduct.ProductID', '=', 'products.ProductID')
                    ->join('roleusers', 'roleusers.UserID', '=', 'products.UserID')
                    ->join('users', 'users.id', '=', 'products.UserID')
                    ->join('subcategoryproduct', 'subcategoryproduct.id', '=', 'products.CategoryID')
                    ->leftJoin('product_wishlists', 'product_wishlists.ProductID', '=', 'products.ProductID')
                    ->where('products.UserID', $id)
                    ->where('products.PostingStatus', 5)
                    ->orWhere('products.PostingStatus', 9)
                    ->where('products.UserID', $id)
                    ->orWhere('product_wishlists.status', 1)
                    ->where('products.UserID', $id)
                    ->orderBy('products.updated_at', 'desc')
                    ->get();

                if(count($products) > 0) {
                    foreach ($products as $item) {
                        $time = strtotime($item->updated_at);
                        $nextMonth = strtotime('+2 months', $time);
                        $now = strtotime(date('Y-m-d H:i:s'));
                        if($now > $nextMonth) {
                            $dataSes[] = $item;
                        }
                    }
                }

                $products = (isset($dataSes)) ? $dataSes : [];

                $countProduct = count($products);
            } else {
                $products = products::select('products.*', 'areaproduct.height as AreaHeight', 'areaproduct.width as AreaWidth', 'addressproduct.WardID',
                 'addressproduct.StreetID', 'addressproduct.addressnumber', 'addressproduct.DistrictID', 'addressproduct.CityID', 'addressproduct.WardID', 'roleusers.UpperID',
                 'users.fullName', 'users.phone as userPhone',
                 'subcategoryproduct.name as subName', 'subcategoryproduct.slug as subSlug',
                 'product_wishlists.status as status_vitridep')
                    ->join('areaproduct', 'areaproduct.ProductID', '=', 'products.ProductID')
                    ->join('addressproduct', 'addressproduct.ProductID', '=', 'products.ProductID')
                    ->join('roleusers', 'roleusers.UserID', '=', 'products.UserID')
                    ->join('users', 'users.id', '=', 'products.UserID')
                    ->join('subcategoryproduct', 'subcategoryproduct.id', '=', 'products.CategoryID')
                    ->leftJoin('product_wishlists', 'product_wishlists.ProductID', '=', 'products.ProductID')
                    ->join('streetapi', 'streetapi.StreetID', '=', 'addressproduct.StreetID')
                    ->where('products.UserID', $id)
                    ->where('products.PostingStatus', intval($status))
                    ->where('addressproduct.CityID', session('fill_city_id'))
                    ->where('addressproduct.DistrictID', session('fill_district_id'))
                    ->where('streetapi.StreetName', 'like', '%' . Controller::convertAddressFromIDToName(session('fill_street_id'), '\App\Models\streetapi', 'StreetID') . '%')
                    ->orWhere('products.PostingStatus', 9)
                    ->where('products.UserID', $id)
                    ->where('addressproduct.CityID', session('fill_city_id'))
                    ->where('addressproduct.DistrictID', session('fill_district_id'))
                    ->where('streetapi.StreetName', 'like', '%' . Controller::convertAddressFromIDToName(session('fill_street_id'), '\App\Models\streetapi', 'StreetID') . '%')
                    ->orderBy('products.updated_at', 'desc')
                    ->get();
            }
        } else if(session('fill_city_id')) {
            if($status == 5) {
                if(session('fill_street_id')) {
                    $products = products::select('products.*', 'areaproduct.height as AreaHeight', 'areaproduct.width as AreaWidth', 'addressproduct.WardID',
                     'addressproduct.StreetID', 'addressproduct.addressnumber', 'addressproduct.DistrictID', 'addressproduct.CityID', 'addressproduct.WardID', 'roleusers.UpperID',
                     'users.fullName', 'users.phone as userPhone',
                     'subcategoryproduct.name as subName', 'subcategoryproduct.slug as subSlug',
                     'product_wishlists.status as status_vitridep')
                        ->join('areaproduct', 'areaproduct.ProductID', '=', 'products.ProductID')
                        ->join('addressproduct', 'addressproduct.ProductID', '=', 'products.ProductID')
                        ->join('roleusers', 'roleusers.UserID', '=', 'products.UserID')
                        ->join('users', 'users.id', '=', 'products.UserID')
                        ->join('subcategoryproduct', 'subcategoryproduct.id', '=', 'products.CategoryID')
                        ->leftJoin('product_wishlists', 'product_wishlists.ProductID', '=', 'products.ProductID')
                        ->where('products.UserID', $id)
                        ->where('products.PostingStatus', intval($status))
                        ->where('addressproduct.CityID', session('fill_city_id'))
                        ->where('addressproduct.DistrictID', session('fill_district_id'))
                        ->where('addressproduct.WardID', session('fill_ward_id'))
                        ->where('addressproduct.StreetID', session('fill_street_id'))
                        ->orWhere('products.PostingStatus', 9)
                        ->where('products.UserID', $id)
                        ->where('addressproduct.CityID', session('fill_city_id'))
                        ->where('addressproduct.DistrictID', session('fill_district_id'))
                        ->where('addressproduct.WardID', session('fill_ward_id'))
                        ->where('addressproduct.StreetID', session('fill_street_id'))
                        ->orderBy('products.updated_at', 'desc')
                        ->get();
                } else if(session('fill_ward_id')) {
                    $products = products::select('products.*', 'areaproduct.height as AreaHeight', 'areaproduct.width as AreaWidth', 'addressproduct.WardID',
                     'addressproduct.StreetID', 'addressproduct.addressnumber', 'addressproduct.DistrictID', 'addressproduct.CityID', 'addressproduct.WardID', 'roleusers.UpperID',
                     'users.fullName', 'users.phone as userPhone',
                     'subcategoryproduct.name as subName', 'subcategoryproduct.slug as subSlug',
                     'product_wishlists.status as status_vitridep')
                        ->join('areaproduct', 'areaproduct.ProductID', '=', 'products.ProductID')
                        ->join('addressproduct', 'addressproduct.ProductID', '=', 'products.ProductID')
                        ->join('roleusers', 'roleusers.UserID', '=', 'products.UserID')
                        ->join('users', 'users.id', '=', 'products.UserID')
                        ->join('subcategoryproduct', 'subcategoryproduct.id', '=', 'products.CategoryID')
                        ->leftJoin('product_wishlists', 'product_wishlists.ProductID', '=', 'products.ProductID')
                        ->where('products.UserID', $id)
                        ->where('products.PostingStatus', intval($status))
                        ->where('addressproduct.CityID', session('fill_city_id'))
                        ->where('addressproduct.DistrictID', session('fill_district_id'))
                        ->where('addressproduct.WardID', session('fill_ward_id'))
                        ->orWhere('products.PostingStatus', 9)
                        ->where('products.UserID', $id)
                        ->where('addressproduct.CityID', session('fill_city_id'))
                        ->where('addressproduct.DistrictID', session('fill_district_id'))
                        ->where('addressproduct.WardID', session('fill_ward_id'))
                        ->orderBy('products.updated_at', 'desc')
                        ->get();
                } else if(session('fill_district_id')) {
                    $products = products::select('products.*', 'areaproduct.height as AreaHeight', 'areaproduct.width as AreaWidth', 'addressproduct.WardID',
                     'addressproduct.StreetID', 'addressproduct.addressnumber', 'addressproduct.DistrictID', 'addressproduct.CityID', 'addressproduct.WardID', 'roleusers.UpperID',
                     'users.fullName', 'users.phone as userPhone',
                     'subcategoryproduct.name as subName', 'subcategoryproduct.slug as subSlug',
                     'product_wishlists.status as status_vitridep')
                        ->join('areaproduct', 'areaproduct.ProductID', '=', 'products.ProductID')
                        ->join('addressproduct', 'addressproduct.ProductID', '=', 'products.ProductID')
                        ->join('roleusers', 'roleusers.UserID', '=', 'products.UserID')
                        ->join('users', 'users.id', '=', 'products.UserID')
                        ->join('subcategoryproduct', 'subcategoryproduct.id', '=', 'products.CategoryID')
                        ->leftJoin('product_wishlists', 'product_wishlists.ProductID', '=', 'products.ProductID')
                        ->where('products.UserID', $id)
                        ->where('products.PostingStatus', intval($status))
                        ->where('addressproduct.CityID', session('fill_city_id'))
                        ->where('addressproduct.DistrictID', session('fill_district_id'))
                        ->orWhere('products.PostingStatus', 9)
                        ->where('products.UserID', $id)
                        ->where('addressproduct.CityID', session('fill_city_id'))
                        ->where('addressproduct.DistrictID', session('fill_district_id'))
                        ->orderBy('products.updated_at', 'desc')
                        ->get();
                } else if(session('fill_city_id')) {
                    $products = products::select('products.*', 'areaproduct.height as AreaHeight', 'areaproduct.width as AreaWidth', 'addressproduct.WardID',
                     'addressproduct.StreetID', 'addressproduct.addressnumber', 'addressproduct.DistrictID', 'addressproduct.CityID', 'addressproduct.WardID', 'roleusers.UpperID',
                     'users.fullName', 'users.phone as userPhone',
                     'subcategoryproduct.name as subName', 'subcategoryproduct.slug as subSlug',
                     'product_wishlists.status as status_vitridep')
                        ->join('areaproduct', 'areaproduct.ProductID', '=', 'products.ProductID')
                        ->join('addressproduct', 'addressproduct.ProductID', '=', 'products.ProductID')
                        ->join('roleusers', 'roleusers.UserID', '=', 'products.UserID')
                        ->join('users', 'users.id', '=', 'products.UserID')
                        ->join('subcategoryproduct', 'subcategoryproduct.id', '=', 'products.CategoryID')
                        ->leftJoin('product_wishlists', 'product_wishlists.ProductID', '=', 'products.ProductID')
                        ->where('products.UserID', $id)
                        ->where('products.PostingStatus', intval($status))
                        ->where('addressproduct.CityID', session('fill_city_id'))
                        ->orWhere('products.PostingStatus', 9)
                        ->where('products.UserID', $id)
                        ->where('addressproduct.CityID', session('fill_city_id'))
                        ->orderBy('products.updated_at', 'desc')
                        ->get();
                }
            } else if($status == 8) {
                if(session('fill_street_id')) {
                    $products = products::select('products.*', 'areaproduct.height as AreaHeight', 'areaproduct.width as AreaWidth', 'addressproduct.WardID',
                     'addressproduct.StreetID', 'addressproduct.addressnumber', 'addressproduct.DistrictID', 'addressproduct.CityID', 'addressproduct.WardID', 'roleusers.UpperID',
                     'users.fullName', 'users.phone as userPhone',
                     'subcategoryproduct.name as subName', 'subcategoryproduct.slug as subSlug',
                     'product_wishlists.status as status_vitridep')
                        ->join('areaproduct', 'areaproduct.ProductID', '=', 'products.ProductID')
                        ->join('addressproduct', 'addressproduct.ProductID', '=', 'products.ProductID')
                        ->join('roleusers', 'roleusers.UserID', '=', 'products.UserID')
                        ->join('users', 'users.id', '=', 'products.UserID')
                        ->join('subcategoryproduct', 'subcategoryproduct.id', '=', 'products.CategoryID')
                        ->join('product_wishlists', 'product_wishlists.ProductID', '=', 'products.ProductID')
                        ->where('products.UserID', $id)
                        ->where('product_wishlists.status', 1)
                        ->where('addressproduct.CityID', session('fill_city_id'))
                        ->where('addressproduct.DistrictID', session('fill_district_id'))
                        ->where('addressproduct.WardID', session('fill_ward_id'))
                        ->where('addressproduct.StreetID', session('fill_street_id'))
                        ->orderBy('products.updated_at', 'desc')
                        ->get();
                } else if(session('fill_ward_id')) {
                    $products = products::select('products.*', 'areaproduct.height as AreaHeight', 'areaproduct.width as AreaWidth', 'addressproduct.WardID',
                     'addressproduct.StreetID', 'addressproduct.addressnumber', 'addressproduct.DistrictID', 'addressproduct.CityID', 'addressproduct.WardID', 'roleusers.UpperID',
                     'users.fullName', 'users.phone as userPhone',
                     'subcategoryproduct.name as subName', 'subcategoryproduct.slug as subSlug',
                     'product_wishlists.status as status_vitridep')
                        ->join('areaproduct', 'areaproduct.ProductID', '=', 'products.ProductID')
                        ->join('addressproduct', 'addressproduct.ProductID', '=', 'products.ProductID')
                        ->join('roleusers', 'roleusers.UserID', '=', 'products.UserID')
                        ->join('users', 'users.id', '=', 'products.UserID')
                        ->join('subcategoryproduct', 'subcategoryproduct.id', '=', 'products.CategoryID')
                        ->join('product_wishlists', 'product_wishlists.ProductID', '=', 'products.ProductID')
                        ->where('products.UserID', $id)
                        ->where('product_wishlists.status', 1)
                        ->where('addressproduct.CityID', session('fill_city_id'))
                        ->where('addressproduct.DistrictID', session('fill_district_id'))
                        ->where('addressproduct.WardID', session('fill_ward_id'))
                        ->orderBy('products.updated_at', 'desc')
                        ->get();
                } else if(session('fill_district_id')) {
                    $products = products::select('products.*', 'areaproduct.height as AreaHeight', 'areaproduct.width as AreaWidth', 'addressproduct.WardID',
                     'addressproduct.StreetID', 'addressproduct.addressnumber', 'addressproduct.DistrictID', 'addressproduct.CityID', 'addressproduct.WardID', 'roleusers.UpperID',
                     'users.fullName', 'users.phone as userPhone',
                     'subcategoryproduct.name as subName', 'subcategoryproduct.slug as subSlug',
                     'product_wishlists.status as status_vitridep')
                        ->join('areaproduct', 'areaproduct.ProductID', '=', 'products.ProductID')
                        ->join('addressproduct', 'addressproduct.ProductID', '=', 'products.ProductID')
                        ->join('roleusers', 'roleusers.UserID', '=', 'products.UserID')
                        ->join('users', 'users.id', '=', 'products.UserID')
                        ->join('subcategoryproduct', 'subcategoryproduct.id', '=', 'products.CategoryID')
                        ->join('product_wishlists', 'product_wishlists.ProductID', '=', 'products.ProductID')
                        ->where('products.UserID', $id)
                        ->where('product_wishlists.status', 1)
                        ->where('addressproduct.CityID', session('fill_city_id'))
                        ->where('addressproduct.DistrictID', session('fill_district_id'))
                        ->orderBy('products.updated_at', 'desc')
                        ->get();
                } else if(session('fill_city_id')) {
                    $products = products::select('products.*', 'areaproduct.height as AreaHeight', 'areaproduct.width as AreaWidth', 'addressproduct.WardID',
                     'addressproduct.StreetID', 'addressproduct.addressnumber', 'addressproduct.DistrictID', 'addressproduct.CityID', 'addressproduct.WardID', 'roleusers.UpperID',
                     'users.fullName', 'users.phone as userPhone',
                     'subcategoryproduct.name as subName', 'subcategoryproduct.slug as subSlug',
                     'product_wishlists.status as status_vitridep')
                        ->join('areaproduct', 'areaproduct.ProductID', '=', 'products.ProductID')
                        ->join('addressproduct', 'addressproduct.ProductID', '=', 'products.ProductID')
                        ->join('roleusers', 'roleusers.UserID', '=', 'products.UserID')
                        ->join('users', 'users.id', '=', 'products.UserID')
                        ->join('subcategoryproduct', 'subcategoryproduct.id', '=', 'products.CategoryID')
                        ->join('product_wishlists', 'product_wishlists.ProductID', '=', 'products.ProductID')
                        ->where('products.UserID', $id)
                        ->where('product_wishlists.status', 1)
                        ->where('addressproduct.CityID', session('fill_city_id'))
                        ->orderBy('products.updated_at', 'desc')
                        ->get();
                }
            } else if($status == 10) {
                if(session('fill_street_id')) {
                    $products = products::select('products.*', 'areaproduct.height as AreaHeight', 'areaproduct.width as AreaWidth', 'addressproduct.WardID',
                     'addressproduct.StreetID', 'addressproduct.addressnumber', 'addressproduct.DistrictID', 'addressproduct.CityID', 'addressproduct.WardID', 'roleusers.UpperID',
                     'users.fullName', 'users.phone as userPhone',
                     'subcategoryproduct.name as subName', 'subcategoryproduct.slug as subSlug',
                     'product_wishlists.status as status_vitridep')
                        ->join('areaproduct', 'areaproduct.ProductID', '=', 'products.ProductID')
                        ->join('addressproduct', 'addressproduct.ProductID', '=', 'products.ProductID')
                        ->join('roleusers', 'roleusers.UserID', '=', 'products.UserID')
                        ->join('users', 'users.id', '=', 'products.UserID')
                        ->join('subcategoryproduct', 'subcategoryproduct.id', '=', 'products.CategoryID')
                        ->leftJoin('product_wishlists', 'product_wishlists.ProductID', '=', 'products.ProductID')
                        ->where('products.UserID', $id)
                        ->where('products.PostingStatus', 5)
                        ->where('addressproduct.CityID', session('fill_city_id'))
                        ->where('addressproduct.DistrictID', session('fill_district_id'))
                        ->where('addressproduct.WardID', session('fill_ward_id'))
                        ->where('addressproduct.StreetID', session('fill_street_id'))
                        ->orWhere('products.PostingStatus', 9)
                        ->where('products.UserID', $id)
                        ->where('addressproduct.CityID', session('fill_city_id'))
                        ->where('addressproduct.DistrictID', session('fill_district_id'))
                        ->where('addressproduct.WardID', session('fill_ward_id'))
                        ->where('addressproduct.StreetID', session('fill_street_id'))
                        ->orWhere('product_wishlists.status', 1)
                        ->where('products.UserID', $id)
                        ->where('addressproduct.CityID', session('fill_city_id'))
                        ->where('addressproduct.DistrictID', session('fill_district_id'))
                        ->where('addressproduct.WardID', session('fill_ward_id'))
                        ->where('addressproduct.StreetID', session('fill_street_id'))
                        ->orderBy('products.updated_at', 'desc')
                        ->get();

                    if(count($products) > 0) {
                        foreach ($products as $item) {
                            $time = strtotime($item->updated_at);
                            $nextMonth = strtotime('+2 months', $time);
                            $now = strtotime(date('Y-m-d H:i:s'));
                            if($now > $nextMonth) {
                                $dataSes[] = $item;
                            }
                        }
                    }
                    $products = (isset($dataSes)) ? $dataSes : [];
                } else if(session('fill_ward_id')) {
                    $products = products::select('products.*', 'areaproduct.height as AreaHeight', 'areaproduct.width as AreaWidth', 'addressproduct.WardID',
                     'addressproduct.StreetID', 'addressproduct.addressnumber', 'addressproduct.DistrictID', 'addressproduct.CityID', 'addressproduct.WardID', 'roleusers.UpperID',
                     'users.fullName', 'users.phone as userPhone',
                     'subcategoryproduct.name as subName', 'subcategoryproduct.slug as subSlug',
                     'product_wishlists.status as status_vitridep')
                        ->join('areaproduct', 'areaproduct.ProductID', '=', 'products.ProductID')
                        ->join('addressproduct', 'addressproduct.ProductID', '=', 'products.ProductID')
                        ->join('roleusers', 'roleusers.UserID', '=', 'products.UserID')
                        ->join('users', 'users.id', '=', 'products.UserID')
                        ->join('subcategoryproduct', 'subcategoryproduct.id', '=', 'products.CategoryID')
                        ->leftJoin('product_wishlists', 'product_wishlists.ProductID', '=', 'products.ProductID')
                        ->where('products.UserID', $id)
                        ->where('products.PostingStatus', 5)
                        ->where('addressproduct.CityID', session('fill_city_id'))
                        ->where('addressproduct.DistrictID', session('fill_district_id'))
                        ->where('addressproduct.WardID', session('fill_ward_id'))
                        ->orWhere('products.PostingStatus', 9)
                        ->where('products.UserID', $id)
                        ->where('addressproduct.CityID', session('fill_city_id'))
                        ->where('addressproduct.DistrictID', session('fill_district_id'))
                        ->where('addressproduct.WardID', session('fill_ward_id'))
                        ->orWhere('product_wishlists.status', 1)
                        ->where('products.UserID', $id)
                        ->where('addressproduct.CityID', session('fill_city_id'))
                        ->where('addressproduct.DistrictID', session('fill_district_id'))
                        ->where('addressproduct.WardID', session('fill_ward_id'))
                        ->orderBy('products.updated_at', 'desc')
                        ->get();

                    if(count($products) > 0) {
                        foreach ($products as $item) {
                            $time = strtotime($item->updated_at);
                            $nextMonth = strtotime('+2 months', $time);
                            $now = strtotime(date('Y-m-d H:i:s'));
                            if($now > $nextMonth) {
                                $dataSes[] = $item;
                            }
                        }
                    }

                    $products = (isset($dataSes)) ? $dataSes : [];
                } else if(session('fill_district_id')) {
                    $products = products::select('products.*', 'areaproduct.height as AreaHeight', 'areaproduct.width as AreaWidth', 'addressproduct.WardID',
                     'addressproduct.StreetID', 'addressproduct.addressnumber', 'addressproduct.DistrictID', 'addressproduct.CityID', 'addressproduct.WardID', 'roleusers.UpperID',
                     'users.fullName', 'users.phone as userPhone',
                     'subcategoryproduct.name as subName', 'subcategoryproduct.slug as subSlug',
                     'product_wishlists.status as status_vitridep')
                        ->join('areaproduct', 'areaproduct.ProductID', '=', 'products.ProductID')
                        ->join('addressproduct', 'addressproduct.ProductID', '=', 'products.ProductID')
                        ->join('roleusers', 'roleusers.UserID', '=', 'products.UserID')
                        ->join('users', 'users.id', '=', 'products.UserID')
                        ->join('subcategoryproduct', 'subcategoryproduct.id', '=', 'products.CategoryID')
                        ->leftJoin('product_wishlists', 'product_wishlists.ProductID', '=', 'products.ProductID')
                        ->where('products.UserID', $id)
                        ->where('products.PostingStatus', 5)
                        ->where('addressproduct.CityID', session('fill_city_id'))
                        ->where('addressproduct.DistrictID', session('fill_district_id'))
                        ->orWhere('products.PostingStatus', 9)
                        ->where('products.UserID', $id)
                        ->where('addressproduct.CityID', session('fill_city_id'))
                        ->where('addressproduct.DistrictID', session('fill_district_id'))
                        ->orWhere('product_wishlists.status', 1)
                        ->where('products.UserID', $id)
                        ->where('addressproduct.CityID', session('fill_city_id'))
                        ->where('addressproduct.DistrictID', session('fill_district_id'))
                        ->orderBy('products.updated_at', 'desc')
                        ->get();

                    if(count($products) > 0) {
                        foreach ($products as $item) {
                            $time = strtotime($item->updated_at);
                            $nextMonth = strtotime('+2 months', $time);
                            $now = strtotime(date('Y-m-d H:i:s'));
                            if($now > $nextMonth) {
                                $dataSes[] = $item;
                            }
                        }
                    }

                    $products = (isset($dataSes)) ? $dataSes : [];
                } else if(session('fill_city_id')) {
                    $products = products::select('products.*', 'areaproduct.height as AreaHeight', 'areaproduct.width as AreaWidth', 'addressproduct.WardID',
                     'addressproduct.StreetID', 'addressproduct.addressnumber', 'addressproduct.DistrictID', 'addressproduct.CityID', 'addressproduct.WardID', 'roleusers.UpperID',
                     'users.fullName', 'users.phone as userPhone',
                     'subcategoryproduct.name as subName', 'subcategoryproduct.slug as subSlug',
                     'product_wishlists.status as status_vitridep')
                        ->join('areaproduct', 'areaproduct.ProductID', '=', 'products.ProductID')
                        ->join('addressproduct', 'addressproduct.ProductID', '=', 'products.ProductID')
                        ->join('roleusers', 'roleusers.UserID', '=', 'products.UserID')
                        ->join('users', 'users.id', '=', 'products.UserID')
                        ->join('subcategoryproduct', 'subcategoryproduct.id', '=', 'products.CategoryID')
                        ->leftJoin('product_wishlists', 'product_wishlists.ProductID', '=', 'products.ProductID')
                        ->where('products.UserID', $id)
                        ->where('products.PostingStatus', 5)
                        ->where('addressproduct.CityID', session('fill_city_id'))
                        ->orWhere('products.PostingStatus', 9)
                        ->where('products.UserID', $id)
                        ->where('addressproduct.CityID', session('fill_city_id'))
                        ->orderBy('products.updated_at', 'desc')
                        ->get();

                    if(count($products) > 0) {
                        foreach ($products as $item) {
                            $time = strtotime($item->updated_at);
                            $nextMonth = strtotime('+2 months', $time);
                            $now = strtotime(date('Y-m-d H:i:s'));
                            if($now > $nextMonth) {
                                $dataSes[] = $item;
                            }
                        }
                    }

                    $products = (isset($dataSes)) ? $dataSes : [];
                }
            } else {
                if(session('fill_street_id')) {
                    $products = products::select('products.*', 'areaproduct.height as AreaHeight', 'areaproduct.width as AreaWidth', 'addressproduct.WardID',
                     'addressproduct.StreetID', 'addressproduct.addressnumber', 'addressproduct.DistrictID', 'addressproduct.CityID', 'addressproduct.WardID', 'roleusers.UpperID',
                     'users.fullName', 'users.phone as userPhone',
                     'subcategoryproduct.name as subName', 'subcategoryproduct.slug as subSlug',
                     'product_wishlists.status as status_vitridep')
                        ->join('areaproduct', 'areaproduct.ProductID', '=', 'products.ProductID')
                        ->join('addressproduct', 'addressproduct.ProductID', '=', 'products.ProductID')
                        ->join('roleusers', 'roleusers.UserID', '=', 'products.UserID')
                        ->join('users', 'users.id', '=', 'products.UserID')
                        ->join('subcategoryproduct', 'subcategoryproduct.id', '=', 'products.CategoryID')
                        ->leftJoin('product_wishlists', 'product_wishlists.ProductID', '=', 'products.ProductID')
                        ->where('products.UserID', $id)
                        ->where('products.PostingStatus', intval($status))
                        ->where('addressproduct.CityID', session('fill_city_id'))
                        ->where('addressproduct.DistrictID', session('fill_district_id'))
                        ->where('addressproduct.WardID', session('fill_ward_id'))
                        ->where('addressproduct.StreetID', session('fill_street_id'))
                        ->orWhere('products.PostingStatus', 9)
                        ->where('products.UserID', $id)
                        ->where('addressproduct.CityID', session('fill_city_id'))
                        ->where('addressproduct.DistrictID', session('fill_district_id'))
                        ->where('addressproduct.WardID', session('fill_ward_id'))
                        ->where('addressproduct.StreetID', session('fill_street_id'))
                        ->orderBy('products.updated_at', 'desc')
                        ->get();
                } else if(session('fill_ward_id')) {
                    $products = products::select('products.*', 'areaproduct.height as AreaHeight', 'areaproduct.width as AreaWidth', 'addressproduct.WardID',
                     'addressproduct.StreetID', 'addressproduct.addressnumber', 'addressproduct.DistrictID', 'addressproduct.CityID', 'addressproduct.WardID', 'roleusers.UpperID',
                     'users.fullName', 'users.phone as userPhone',
                     'subcategoryproduct.name as subName', 'subcategoryproduct.slug as subSlug',
                     'product_wishlists.status as status_vitridep')
                        ->join('areaproduct', 'areaproduct.ProductID', '=', 'products.ProductID')
                        ->join('addressproduct', 'addressproduct.ProductID', '=', 'products.ProductID')
                        ->join('roleusers', 'roleusers.UserID', '=', 'products.UserID')
                        ->join('users', 'users.id', '=', 'products.UserID')
                        ->join('subcategoryproduct', 'subcategoryproduct.id', '=', 'products.CategoryID')
                        ->leftJoin('product_wishlists', 'product_wishlists.ProductID', '=', 'products.ProductID')
                        ->where('products.UserID', $id)
                        ->where('products.PostingStatus', intval($status))
                        ->where('addressproduct.CityID', session('fill_city_id'))
                        ->where('addressproduct.DistrictID', session('fill_district_id'))
                        ->where('addressproduct.WardID', session('fill_ward_id'))
                        ->orWhere('products.PostingStatus', 9)
                        ->where('products.UserID', $id)
                        ->where('addressproduct.CityID', session('fill_city_id'))
                        ->where('addressproduct.DistrictID', session('fill_district_id'))
                        ->where('addressproduct.WardID', session('fill_ward_id'))
                        ->orderBy('products.updated_at', 'desc')
                        ->get();
                } else if(session('fill_district_id')) {
                    $products = products::select('products.*', 'areaproduct.height as AreaHeight', 'areaproduct.width as AreaWidth', 'addressproduct.WardID',
                     'addressproduct.StreetID', 'addressproduct.addressnumber', 'addressproduct.DistrictID', 'addressproduct.CityID', 'addressproduct.WardID', 'roleusers.UpperID',
                     'users.fullName', 'users.phone as userPhone',
                     'subcategoryproduct.name as subName', 'subcategoryproduct.slug as subSlug',
                     'product_wishlists.status as status_vitridep')
                        ->join('areaproduct', 'areaproduct.ProductID', '=', 'products.ProductID')
                        ->join('addressproduct', 'addressproduct.ProductID', '=', 'products.ProductID')
                        ->join('roleusers', 'roleusers.UserID', '=', 'products.UserID')
                        ->join('users', 'users.id', '=', 'products.UserID')
                        ->join('subcategoryproduct', 'subcategoryproduct.id', '=', 'products.CategoryID')
                        ->leftJoin('product_wishlists', 'product_wishlists.ProductID', '=', 'products.ProductID')
                        ->where('products.UserID', $id)
                        ->where('products.PostingStatus', intval($status))
                        ->where('addressproduct.CityID', session('fill_city_id'))
                        ->where('addressproduct.DistrictID', session('fill_district_id'))
                        ->orWhere('products.PostingStatus', 9)
                        ->where('products.UserID', $id)
                        ->where('addressproduct.CityID', session('fill_city_id'))
                        ->where('addressproduct.DistrictID', session('fill_district_id'))
                        ->orderBy('products.updated_at', 'desc')
                        ->get();
                } else if(session('fill_city_id')) {
                    $products = products::select('products.*', 'areaproduct.height as AreaHeight', 'areaproduct.width as AreaWidth', 'addressproduct.WardID',
                     'addressproduct.StreetID', 'addressproduct.addressnumber', 'addressproduct.DistrictID', 'addressproduct.CityID', 'addressproduct.WardID', 'roleusers.UpperID',
                     'users.fullName', 'users.phone as userPhone',
                     'subcategoryproduct.name as subName', 'subcategoryproduct.slug as subSlug',
                     'product_wishlists.status as status_vitridep')
                        ->join('areaproduct', 'areaproduct.ProductID', '=', 'products.ProductID')
                        ->join('addressproduct', 'addressproduct.ProductID', '=', 'products.ProductID')
                        ->join('roleusers', 'roleusers.UserID', '=', 'products.UserID')
                        ->join('users', 'users.id', '=', 'products.UserID')
                        ->join('subcategoryproduct', 'subcategoryproduct.id', '=', 'products.CategoryID')
                        ->leftJoin('product_wishlists', 'product_wishlists.ProductID', '=', 'products.ProductID')
                        ->where('products.UserID', $id)
                        ->where('products.PostingStatus', intval($status))
                        ->where('addressproduct.CityID', session('fill_city_id'))
                        ->orWhere('products.PostingStatus', 9)
                        ->where('products.UserID', $id)
                        ->where('addressproduct.CityID', session('fill_city_id'))
                        ->orderBy('products.updated_at', 'desc')
                        ->get();
                }
            }
        } else {
            if($status == 5) {
                $products = products::select('products.*', 'areaproduct.height as AreaHeight', 'areaproduct.width as AreaWidth', 'addressproduct.WardID',
                 'addressproduct.StreetID', 'addressproduct.addressnumber', 'addressproduct.DistrictID', 'addressproduct.CityID', 'addressproduct.WardID', 'roleusers.UpperID',
                 'users.fullName', 'users.phone as userPhone',
                 'subcategoryproduct.name as subName', 'subcategoryproduct.slug as subSlug',
                 'product_wishlists.status as status_vitridep')
                    ->join('areaproduct', 'areaproduct.ProductID', '=', 'products.ProductID')
                    ->join('addressproduct', 'addressproduct.ProductID', '=', 'products.ProductID')
                    ->join('roleusers', 'roleusers.UserID', '=', 'products.UserID')
                    ->join('users', 'users.id', '=', 'products.UserID')
                    ->join('subcategoryproduct', 'subcategoryproduct.id', '=', 'products.CategoryID')
                    ->leftJoin('product_wishlists', 'product_wishlists.ProductID', '=', 'products.ProductID')
                    ->where('products.UserID', $id)
                    ->where('products.PostingStatus', intval($status))
                    ->orWhere('products.PostingStatus', 9)
                    ->where('products.UserID', $id)
                    ->orderBy('products.updated_at', 'desc')
                    ->get();
            } else if($status == 8) {
                $products = products::select('products.*', 'areaproduct.height as AreaHeight', 'areaproduct.width as AreaWidth', 'addressproduct.WardID',
                 'addressproduct.StreetID', 'addressproduct.addressnumber', 'addressproduct.DistrictID', 'addressproduct.CityID', 'addressproduct.WardID', 'roleusers.UpperID',
                 'users.fullName', 'users.phone as userPhone',
                 'subcategoryproduct.name as subName', 'subcategoryproduct.slug as subSlug',
                 'product_wishlists.status as status_vitridep')
                    ->join('areaproduct', 'areaproduct.ProductID', '=', 'products.ProductID')
                    ->join('addressproduct', 'addressproduct.ProductID', '=', 'products.ProductID')
                    ->join('roleusers', 'roleusers.UserID', '=', 'products.UserID')
                    ->join('users', 'users.id', '=', 'products.UserID')
                    ->join('subcategoryproduct', 'subcategoryproduct.id', '=', 'products.CategoryID')
                    ->join('product_wishlists', 'product_wishlists.ProductID', '=', 'products.ProductID')
                    ->where('products.UserID', $id)
                    ->where('product_wishlists.status', 1)
                    ->orderBy('products.updated_at', 'desc')
                    ->get();
            } else if($status == 10) {
                $products = products::select('products.*', 'areaproduct.height as AreaHeight', 'areaproduct.width as AreaWidth', 'addressproduct.WardID',
                 'addressproduct.StreetID', 'addressproduct.addressnumber', 'addressproduct.DistrictID', 'addressproduct.CityID', 'addressproduct.WardID', 'roleusers.UpperID',
                 'users.fullName', 'users.phone as userPhone',
                 'subcategoryproduct.name as subName', 'subcategoryproduct.slug as subSlug',
                 'product_wishlists.status as status_vitridep')
                    ->join('areaproduct', 'areaproduct.ProductID', '=', 'products.ProductID')
                    ->join('addressproduct', 'addressproduct.ProductID', '=', 'products.ProductID')
                    ->join('roleusers', 'roleusers.UserID', '=', 'products.UserID')
                    ->join('users', 'users.id', '=', 'products.UserID')
                    ->join('subcategoryproduct', 'subcategoryproduct.id', '=', 'products.CategoryID')
                    ->leftJoin('product_wishlists', 'product_wishlists.ProductID', '=', 'products.ProductID')
                    ->where('products.UserID', $id)
                    ->where('products.PostingStatus', 5)
                    ->orWhere('products.PostingStatus', 9)
                    ->where('products.UserID', $id)
                    ->orWhere('product_wishlists.status', 1)
                    ->where('products.UserID', $id)
                    ->orderBy('products.updated_at', 'desc')
                    ->get();

                if(count($products) > 0) {
                    foreach ($products as $item) {
                        $time = strtotime($item->updated_at);
                        $nextMonth = strtotime('+2 months', $time);
                        $now = strtotime(date('Y-m-d H:i:s'));
                        if($now > $nextMonth) {
                            $dataSes[] = $item;
                        }
                    }
                }

                $products = (isset($dataSes)) ? $dataSes : [];
            } else {
                $products = products::select('products.*', 'areaproduct.height as AreaHeight', 'areaproduct.width as AreaWidth', 'addressproduct.WardID',
                 'addressproduct.StreetID', 'addressproduct.addressnumber', 'addressproduct.DistrictID', 'addressproduct.CityID', 'addressproduct.WardID', 'roleusers.UpperID',
                 'users.fullName', 'users.phone as userPhone',
                 'subcategoryproduct.name as subName', 'subcategoryproduct.slug as subSlug',
                 'product_wishlists.status as status_vitridep')
                    ->join('areaproduct', 'areaproduct.ProductID', '=', 'products.ProductID')
                    ->join('addressproduct', 'addressproduct.ProductID', '=', 'products.ProductID')
                    ->join('roleusers', 'roleusers.UserID', '=', 'products.UserID')
                    ->join('users', 'users.id', '=', 'products.UserID')
                    ->join('subcategoryproduct', 'subcategoryproduct.id', '=', 'products.CategoryID')
                    ->leftJoin('product_wishlists', 'product_wishlists.ProductID', '=', 'products.ProductID')
                    ->where('products.UserID', $id)
                    ->where('products.PostingStatus', intval($status))
                    ->orderBy('products.updated_at', 'desc')
                    ->get();
            }
        }

        $url = url()->current();
        if(stripos($url, 'trang-thai-') !== false) {
            $trangthai = strstr($url, 'trang-thai-');
            $trangthai = strstr($trangthai, '-end', true);
            $trangthai = str_replace(['trang-thai-', '-end'], '', $trangthai);
            $products = $products;
            // dd($products);
            if ($trangthai == 'dang-giao-dich') {
                $validProducts = $products->filter(function($value) {
                    return $value->PostingStatus == 'public';
                });
            } else if ($trangthai == 'da-giao-dich') {
                $validProducts = $products->filter(function($value) {
                    return $value->PostingStatus == 'sold';
                });
            } else if ($trangthai == 'nguon-sap-tra') {
                $validProducts = $products->filter(function($value) {
                    return $value->PostingStatus == 'return';
                });
            } else if($trangthai == 'marketing') {
                $validProducts = $products->filter(function($value) {
                    $marketing = product_marketing::where('parent_id', $value['ProductID'])->first();

                    if($marketing) {
                        return $value;
                    }
                });
            }
            $products = $validProducts;
            $trangthaiVietnam = [
                'dang-giao-dich' => 'đang giao dịch',
                'da-giao-dich' => 'đã giao dịch',
                'nguon-sap-tra' => 'nguồn sắp trả',
                'marketing' => 'marketing'
            ];
            $title .= ' trạng thái ' . $trangthaiVietnam[$trangthai];
        } else {
            $validProducts = $products;
        }

        if(stripos($url, 'danh-muc-') !== false) {
            $danhmuc = strstr($url, 'danh-muc-');
            $danhmuc = strstr($danhmuc, '-end', true);
            $danhmuc = str_replace(['danh-muc-', '-end'], '', $danhmuc);
            $products = $products;
            if($danhmuc == 'bat-dong-san-kinh-doanh') {
                $validProducts = $products->filter(function($value) {
                    if($value->cateSlug == 'bat-dong-san-kinh-doanh') {
                        return $value;
                    }
                });
            } else if($danhmuc == 'nha-o-nha-rieng-nha-nguyen-can') {
                $validProducts = $products->filter(function($value) {
                    if($value->cateSlug == 'nha-o-nha-rieng-nha-nguyen-can') {
                        return $value;
                    }
                });
            } else if($danhmuc == 'can-ho') {
                $validProducts = $products->filter(function($value) {
                    if($value->cateSlug == 'can-ho') {
                        return $value;
                    }
                });
            } else if($danhmuc == 'dat-nen-dat-ray-vuon') {
                $validProducts = $products->filter(function($value) {
                    if($value->cateSlug == 'dat-nen-dat-ray-vuon') {
                        return $value;
                    }
                });
            } else {
                $subCategory = subcategoryproduct::where('slug', $danhmuc)->first();
                $validProducts = $products->filter(function($value) use ($subCategory) {
                    if($value->CategoryID == $subCategory->id) {
                        return $value;
                    }
                });
            }
            if(categoryproduct::where('slug', $danhmuc)->first() != null) {
                $title .= ' danh mục ' . strtolower(categoryproduct::where('slug', $danhmuc)->first()->name);
            } else {
                $title .= ' danh mục ' . strtolower(subcategoryproduct::where('slug', $danhmuc)->first()->name);
            }
            $products = $validProducts;
        }

        if(stripos($url, 'khoang-gia-') !== false) {
            $khoanggia = strstr($url, 'khoang-gia-');
            $khoanggia = strstr($khoanggia, '-end', true);
            $khoanggia = str_replace(['khoang-gia-', '-end'], '', $khoanggia);
            $products = $products;
            $price = explode('-', $khoanggia);

            $validProducts = $products->filter(function($value) use ($price) {
                if($price[0] == 0) {
                    return $value->price <= $price[1];
                } else if($price[1] == 0) {
                    return $value->price >= $price[0];
                } else {
                    return $value->price >= $price[0] && $value->price <= $price[1];
                }
            });

            if(intval($price[0]) == 0) {
                $title .= ' giá từ ' . Controller::convertPriceText($price[1]) . ' trở xuống';
            } else if(intval($price[1]) == 0) {
                $title .= ' giá từ ' . Controller::convertPriceText($price[0]) . ' trở lên';
            } else {
                $title .= ' giá từ ' . Controller::convertPriceText($price[0]) . ' đến ' . Controller::convertPriceText($price[1]);
            }
            $products = $validProducts;
        }

        if(stripos($url, 'be-ngang-') !== false) {
            $benang = strstr($url, 'be-ngang-');
            $benang = strstr($benang, '-end', true);
            $benang = str_replace(['be-ngang-', '-end'], '', $benang);
            $products = $products;
            $width = explode('-', $benang);

            $validProducts = $products->filter(function($value) use ($width) {
                $widthProduct = areaproduct::where('ProductID', $value->ProductID)->first();
                if($widthProduct) {
                    if($width[0] == 0) {
                        return $widthProduct->width <= $width[1];
                    } else if($width[1] == 0) {
                        return $widthProduct->width >= $width[0];
                    } else {
                        return $widthProduct->width >= $width[0] && $widthProduct->width <= $width[1];
                    }
                }
            });

            if(intval($width[0]) == 0) {
                $title .= ' bề ngang từ ' . $width[1] . 'm trở xuống';
            } else if(intval($width[1]) == 0) {
                $title .= ' bề ngang từ ' . $width[0] . 'm trở lên';
            } else {
                $title .= ' bề ngang từ ' . $width[0] . ' đến ' . $width[1] . 'm';
            }
            $products = $validProducts;
        }

        if(stripos($url, 'so-tang-') !== false) {
            $sotang = strstr($url, 'so-tang-');
            $sotang = strstr($sotang, '-end', true);
            $sotang = str_replace(['so-tang-', '-end'], '', $sotang);
            $products = $products;
            $floors = explode('-', $sotang);

            $validProducts = $products->filter(function($value) use ($floors) {
                if(intval($floors[0]) == 0) {
                    return $value->floors <= $floors[1];
                } else if(intval($floors[1]) == 0) {
                    return $value->floors >= intval($floors[0]);
                } else {
                    return $value->floors >= intval($floors[0]) && $value->floors <= intval($floors[1]);
                }
            });

            if(intval($floors[0]) == 0) {
                $title .= ' số tầng từ ' . $floors[1] . ' tầng trở xuống';
            } else if(intval($floors[1]) == 0) {
                $title .= ' số tầng từ ' . $floors[0] . ' tầng trở lên';
            } else {
                $title .= ' số tầng từ ' . $floors[0] . ' đến ' . $floors[1] . ' tầng';
            }
            $products = $validProducts;
        }

        if(stripos($url, 'phong-ngu-') !== false) {
            $phongngu = strstr($url, 'phong-ngu-');
            $phongngu = strstr($phongngu, '-end', true);
            $phongngu = str_replace(['phong-ngu-', '-end'], '', $phongngu);
            $products = $products;
            $bedrooms = explode('-', $phongngu);

            $validProducts = $products->filter(function($value) use ($bedrooms) {
                $bedroom = apartmentinfo::where('ProductID', $value->ProductID)->first();
                if($bedroom) {
                    if(intval($bedrooms[0]) == 0) {
                        return $bedroom['BedRoom'] <= $bedrooms[1];
                    } else if(intval($bedrooms[1]) == 0) {
                        return $bedroom['BedRoom'] >= $bedrooms[0];
                    } else {
                        return $bedroom['BedRoom'] >= $bedrooms[0] && $bedroom['BedRoom'] <= $bedrooms[1];
                    }
                }
            });

            if(intval($bedrooms[0]) == 0) {
                $title .= ' ' . $bedrooms[1] . ' phòng ngủ trở xuống';
            } else if(intval($bedrooms[1]) == 0) {
                $title .= ' ' . $bedrooms[0] . ' phòng ngủ trở lên';
            } else {
                $title .= ' ' . $bedrooms[0] . ' đến ' . $bedrooms[1] . ' phòng ngủ';
            }
            $products = $validProducts;
        }

        if($request->has('direction')) {
            $direction = explode('-', $request->direction);
            $products = $products;

            $validProducts = $products->filter(function($value) use ($direction) {
                foreach($direction as $item) {
                    if(products::where('ProductID', $value->ProductID)->where('direction', intval($item))->first()) {
                        return $value;
                    }
                }
            });

            $directionVietNam = [
                '1' => 'đông',
                '2' => 'tây',
                '3' => 'nam',
                '4' => 'bắc',
                '5' => 'đông bắc',
                '6' => 'tây bắc',
                '7' => 'đông nam',
                '8' => 'tây nam'
            ];

            foreach($direction as $item) {
                $title .= ' hướng ' . $directionVietNam[$item];
                if($item != end($direction)) {
                    $title .= ', ';
                }
            }
            $products = $validProducts;
        }

        if($request->has('AlleyWidth')) {
            $AlleyWidth = explode('-', $request->AlleyWidth);
            $products = $products;

            $validProducts = $products->filter(function($value) use ($AlleyWidth) {
                $width = alleyproduct::where('ProductID', $value->ProductID)->first();
                if($width) {
                    if($width['AlleyWidth'] >= $AlleyWidth[0] && $width['AlleyWidth'] <= $AlleyWidth[1]) {
                        return $value;
                    }
                }
            });

            foreach($AlleyWidth as $item) {
                $title .= ' hẻm ' . $item . 'm';
                if($item != end($AlleyWidth)) {
                    $title .= ', ';
                }
            }
            $products = $validProducts;
        }

        if($request->has('utilities')) {
            $utilities = explode('-', $request->utilities);
            $changeUtilities = [];
            foreach($utilities as $item) {
                if(intval($item) == 1) {
                    $changeUtilities[] = 'Căn góc';
                } else if(intval($item) == 2) {
                    $changeUtilities[] = 'Gần ngã 3, ngã 4';
                } else if(intval($item) == 3) {
                    $changeUtilities[] = 'Sân vườn';
                } else if(intval($item) == 4) {
                    $changeUtilities[] = 'Hầm';
                } else if(intval($item) == 5) {
                    $changeUtilities[] = 'Thang máy';
                } else if(intval($item) == 6) {
                    $changeUtilities[] = 'Trống suốt';
                }
            }
            $products = $products;

            $validProducts = $products->filter(function($value) use ($changeUtilities) {
                $utilities = product_utilities::where('ProductID', $value->ProductID)->get();
                $utilities = $utilities->pluck('UtilityName')->toArray();
                if(array_diff($changeUtilities, $utilities) === []) {
                    return $value;
                }
            });

            foreach($utilities as $item) {
                $title .= ' tiện ích ' . strtolower(product_utilities::where('UtilityName', intval($item))->first()->UtilityName);
                if($item != end($utilities)) {
                    $title .= ', ';
                }
            }
            $products = $validProducts;
        }

        foreach($validProducts as $key => $value) {
            $marketing = product_marketing::where('parent_id', $value['ProductID'])->first();
            $validProducts[$key]['marketing'] = $marketing;
        }

        $countProduct = ($validProducts) ? count($validProducts) : 0;
        $perPage = 30;
        $currentPage = $request->get('page', 1);
        if($validProducts) {
            ($request->status == 10) ? $validProducts = array_slice($validProducts, ($currentPage - 1) * $perPage, $perPage) : $validProducts = $validProducts->slice(($currentPage - 1) * $perPage, $perPage);
            $products = new LengthAwarePaginator(
                $validProducts,
                $countProduct,
                $perPage,
                $currentPage,
                ['path' => $request->url(), 'query' => $request->query()]
            );
        } else {
            $products = new LengthAwarePaginator(
                [],
                0,
                $perPage,
                $currentPage,
                ['path' => $request->url(), 'query' => $request->query()]
            );
        }

        $controller = new Controller();

        return view('Backend.Production.collections', compact('role', 'title', 'description', 'products', 'controller', 'type_collection', 'status', 'id', 'countProduct', 'public', 'expired', 'sold', 'vi_tri_dep', 'return', 'private', 'chamchu'));
    }

    public function search(request $request)
    {
        $controller = new Controller();
        $role = Controller::getRole();
        if($request->has('status') && Auth::check() && Controller::checkRole(Controller::getRole()->MainRole) >= 6) {
            $status = $request->status;
        } else {
            $status = 1;
        }
        $countProduct = 0;

        if($request->has('code')) {

            $products = products::select('products.*', 'areaproduct.height as AreaHeight', 'areaproduct.width as AreaWidth', 'addressproduct.WardID',
                'addressproduct.StreetID', 'addressproduct.addressnumber', 'addressproduct.DistrictID', 'addressproduct.CityID', 'addressproduct.WardID', 'roleusers.UpperID',
                'users.fullName', 'users.phone as userPhone',
                'subcategoryproduct.name as subName', 'subcategoryproduct.slug as subSlug',
                'categoryproduct.name as cateName', 'categoryproduct.slug as cateSlug')
                    ->join('areaproduct', 'areaproduct.ProductID', '=', 'products.ProductID')
                    ->join('addressproduct', 'addressproduct.ProductID', '=', 'products.ProductID')
                    ->join('roleusers', 'roleusers.UserID', '=', 'products.UserID')
                    ->join('users', 'users.id', '=', 'products.UserID')
                    ->join('subcategoryproduct', 'subcategoryproduct.id', '=', 'products.CategoryID')
                    ->join('streetapi', 'streetapi.StreetID', '=', 'addressproduct.StreetID')
                    ->join('categoryproduct', 'categoryproduct.CategoryID', '=', 'subcategoryproduct.CategoryID')
                    ->where('products.postCode', $request['code'])
                    ->orderBy('products.updated_at', 'desc')
                    ->get();

            if($products == null) {
                return redirect()->route('home')->with('error', 'Mã nhà đất không tồn tại!');
            }

            $id = $products[0]->UserID;
            $title = 'Danh sách tin đăng của mã ' . $request['code'] . ' Trên GulandMienNam';
            $description = 'Cho thuê nhà đất bất động sản Việt Nam chính chủ giá rẻ.
              Bất động sản Guland đăng tin cho thuê nhà đất chính chủ, môi giới giá rẻ, đầy đủ tiện ích, tiện di chuyển, an ninh, thoáng mát.';
            $type_collection = 'search';

            $countProduct = $products->count();

            return view('Backend.Production.collections', compact('role', 'title', 'description', 'products', 'controller', 'type_collection', 'status', 'id', 'countProduct'));
        } else if($request->has('phone')) {
            $type_collection = 'search';

            $products = products::select('products.*', 'areaproduct.height as AreaHeight', 'areaproduct.width as AreaWidth', 'addressproduct.WardID',
                'addressproduct.StreetID', 'addressproduct.addressnumber', 'addressproduct.DistrictID', 'addressproduct.CityID', 'addressproduct.WardID', 'roleusers.UpperID',
                'users.fullName', 'users.phone as userPhone',
                'subcategoryproduct.name as subName', 'subcategoryproduct.slug as subSlug')
                ->join('areaproduct', 'areaproduct.ProductID', '=', 'products.ProductID')
                ->join('addressproduct', 'addressproduct.ProductID', '=', 'products.ProductID')
                ->join('roleusers', 'roleusers.UserID', '=', 'products.UserID')
                ->join('infoclientproduct', 'infoclientproduct.ProductID', '=', 'products.ProductID')
                ->join('users', 'users.id', '=', 'products.UserID')
                ->join('subcategoryproduct', 'subcategoryproduct.id', '=', 'products.CategoryID')
                ->where('infoclientproduct.InfoContact', 'like', '%' . $request['phone'] . '%')
                ->orderBy('products.updated_at', 'desc')
                ->get();

            $countProduct = $products->count();

            if(count($products) == 0) {
                return redirect()->route('home')->with('error', 'Số điện thoại không tồn tại!');
            }
            $id = $products[0]->UserID;
            $title = 'Danh sách tin đăng của số điện thoại ' . $request['phone'] . ' Trên GulandMienNam';
            $description = 'Cho thuê nhà đất bất động sản Việt Nam chính chủ giá rẻ.
              Bất động sản Guland đăng tin cho thuê nhà đất chính chủ, môi giới giá rẻ, đầy đủ tiện ích, tiện di chuyển, an ninh, thoáng mát.';
            return view('Backend.Production.collections', compact('role', 'title', 'description', 'products', 'controller', 'type_collection', 'status', 'id', 'countProduct'));
        }

        return redirect()->route('home')->with('error', 'Không tìm thấy kết quả!');
    }

    public function filterAction(request $request, $action)
    {
        $url = $request->url;
        if($action == 'price') {
            if(isset($request->clear) && $request->clear == '0') {
                $url = preg_replace('/-khoang-gia\-[0-9]+\-[0-9]*-end+/', '', $url);
            } else {
                $min = intval(str_replace(',', '', $request->minimum));
                $max = intval(str_replace(',', '', $request->maximum));

                if(stripos($url, 'khoang-gia') !== false) {
                    $url = preg_replace('/khoang-gia\-[0-9]+\-[0-9]*-end+/', 'khoang-gia-' . $min . '-' . $max . '-end', $url);
                } else {
                    $url = $url . '-khoang-gia-' . $min . '-' . $max . '-end';
                }
            }
            return redirect($url);
        } else if($action == 'width') {
            if(isset($request->clear) && $request->clear == '0') {
                $url = preg_replace('/-be-ngang\-[0-9]+\-[0-9]*-end+/', '', $url);
            } else {
                $min = ($request->minimum == '') ? 0 : $request->minimum;
                $max = ($request->maximum == '') ? 0 : $request->maximum;

                if(stripos($url, 'be-ngang') !== false) {
                    $url = preg_replace('/be-ngang\-[0-9]+(\.[0-9]+)?\-[0-9]*(\.[0-9]+)?-end+/', 'be-ngang-' . $min . '-' . $max . '-end', $url);
                } else {
                    $url = $url . '-be-ngang-' . $min . '-' . $max . '-end';
                }
            }
            return redirect($url);
        } else if($action == 'bedroom') {
            if(isset($request->clear) && $request->clear == '0') {
                $url = preg_replace('/-phong-ngu\-[0-9]+\-[0-9]*-end+/', '', $url);
            } else {
                $min = intval($request->minimum);
                $max = intval($request->maximum);

                if(stripos($url, 'phong-ngu') !== false) {
                    $url = preg_replace('/phong-ngu\-[0-9]+\-[0-9]*-end+/', 'phong-ngu-' . $min . '-' . $max . '-end', $url);
                } else {
                    $url = $url . '-phong-ngu-' . $min . '-' . $max . '-end';
                }
            }
            return redirect($url);
        } else if($action == 'floors') {
            if(isset($request->clear) && $request->clear == '0') {
                $url = preg_replace('/-so-tang\-[0-9]+\-[0-9]*-end+/', '', $url);
            } else {
                $min = intval($request->minimum);
                $max = intval($request->maximum);

                if(stripos($url, 'so-tang') !== false) {
                    $url = preg_replace('/so-tang\-[0-9]+\-[0-9]*-end+/', 'so-tang-' . $min . '-' . $max . '-end', $url);
                } else {
                    $url = $url . '-so-tang-' . $min . '-' . $max . '-end';
                }
            }
            return redirect($url);
        } else if($action == 'others') {
            if(isset($request->clear) && $request->clear == '0') {
                $url = explode('?', $url);
                return redirect($url[0]);
            } else {
                if(stripos($url, '?') !== false) {
                    $direction = (isset($request->direction)) ? implode('-', $request->direction) : '';
                    $AlleyWidth = (isset($request->AlleyWidth)) ? $request->AlleyWidth : '';
                    $utilities = (isset($request->utilities)) ? implode('-', $request->utilities) : '';
                    // dd($direction, $AlleyWidth, $utilities);
                    if($direction != '') {
                        if(isset($request->directionOld)) {
                            $url = preg_replace('/direction=([^&]+)/', 'direction=' . $direction, $url);
                        } else {
                            $url = $url . '&direction=' . $direction;
                        }
                    }
                    if($AlleyWidth != '') {
                        if(isset($request->AlleyWidthOld)) {
                            $url = preg_replace('/AlleyWidth=([^&]+)/', 'AlleyWidth=' . $AlleyWidth, $url);
                        } else {
                            $url = $url . '&AlleyWidth=' . $AlleyWidth;
                        }
                    }
                    // dd($utilities);

                    if($utilities != '') {
                        if(isset($request->utilitiesOld)) {
                            $url = preg_replace('/utilities=([^&]+)/', 'utilities=' . $utilities, $url);
                        } else {
                            $url = $url . '&utilities=' . $utilities;
                        }
                    }
                    return redirect($url);
                } else {
                    $direction = (isset($request->direction)) ? implode('-', $request->direction) : '';
                    $AlleyWidth = (isset($request->AlleyWidth)) ? $request->AlleyWidth : '';
                    $utilities = (isset($request->utilities)) ? implode('-', $request->utilities) : '';

                    if($direction != '' || $AlleyWidth != '' || $utilities != '') {
                        $url = $url . '?';
                    }

                    if($direction != '' && $AlleyWidth == '' && $utilities == '') {
                        $url = $url . 'direction=' . $direction;
                    } else if($direction != '' && $AlleyWidth != '' && $utilities == '') {
                        $url = $url . 'direction=' . $direction . '&AlleyWidth=' . $AlleyWidth;
                    } else if($direction != '' && $AlleyWidth != '' && $utilities != '') {
                        $url = $url . 'direction=' . $direction . '&AlleyWidth=' . $AlleyWidth . '&utilities=' . $utilities;
                    } else if($direction != '' && $AlleyWidth == '' && $utilities != '') {
                        $url = $url . 'direction=' . $direction . '&utilities=' . $utilities;
                    } else if($direction == '' && $AlleyWidth != '' && $utilities == '') {
                        $url = $url . 'AlleyWidth=' . $AlleyWidth;
                    } else if($direction == '' && $AlleyWidth != '' && $utilities != '') {
                        $url = $url . 'AlleyWidth=' . $AlleyWidth . '&utilities=' . $utilities;
                    } else if($direction == '' && $AlleyWidth == '' && $utilities != '') {
                        $url = $url . 'utilities=' . $utilities;
                    }

                    return redirect($url);
                }
            }
        }
    }

    public function processRating(request $request)
    {
        // dd($request->all());
        if($request->content == null && !isset($request->image)) {
            return redirect()->back()->with('error', 'Vui lòng nhập nội dung hoặc chọn hình ảnh!');
        }

        if(!Auth::check()) {
            return redirect()->back()->with('error', 'Vui lòng đăng nhập để thực hiện chức năng này!');
        }

        if(controller::checkRole(controller::getRole()->MainRole) < 2) {
            return redirect()->back()->with('error', 'Bạn không có quyền thực hiện chức năng này!');
        }

        if(!products::where('ProductID', $request->id)->first()) {
            return redirect()->back()->with('error', 'Sản phẩm không tồn tại!');
        }

        product_surveies::create([
            'content' => ($request->content) ? $request->content : '',
            'UserID' => Auth::user()->id,
            'ProductID' => $request->id
        ]);

        if($request->hasFile('image')) {
            $idSurveies = product_surveies::where('ProductID', $request->id)->where('UserID', Auth::user()->id)->orderBy('created_at', 'desc')->first()->id;
            $images = $request->file('image');
            foreach ($images as $item) {
                $name = time() . '-GulandMienNam-' . rand(1, 100000) . '-baocaokhaosat.' . $item->getClientOriginalExtension();
                $item->move(public_path('Assets/Images/Surveies'), $name);
                imageproduct::create([
                    'ImageFile' => $name,
                    'TypeImage' => 3,
                    'ProductID' => $request->id,
                    'SurveyID' => $idSurveies
                ]);
            }
        }

        return redirect()->back()->with('success', 'Gửi báo cáo khảo sát thành công!');
    }

    public function processImages(request $request)
    {
        $res = [
            'status' => false,
            'data' => 'Có lỗi xảy ra!',
            'count' => 0
        ];
        include __DIR__ . '../../../php-simple-dom/simple_html_dom.php';
        $code = $request->code;
        $url = 'https://guland.vn/search?id=' . $code;
        $html = file_get_html($url);
        if($html->find('title', 0)->plaintext == 'Có 0 BĐS được tìm thấy') {
            $res['data'] = 'Không tìm thấy hình ảnh!';
            return response()->json($res);
        }
        $url = $html->find('.c-sdb-card__cnt .c-sdb-card__tle a', 0)->href;
        $html = file_get_html($url);
        $images = [];

        foreach($html->find('.detail-media__full .media-full-wrap .media-full-wrap__inner .media-full-wrap__img img') as $item) {
            $images[] = $item->src;
        }

        $count = count($images);
        if($count == 0) {
            $res['data'] = 'Không tìm thấy hình ảnh!';
        } else {
            if(count($images) > 1) {
                for($i = 0; $i < count($images); $i++) {
                    $name = time() . '-GulandMienNam-' . rand(1, 1000000) . '.' . pathinfo($images[$i], PATHINFO_EXTENSION);
                    $image = file_get_contents($images[$i]);

                    file_put_contents(public_path('Assets/Images/Products/') . $name, $image);
                    if($i != 0) {
                        imageproduct::create([
                            'ImageFile' => $name,
                            'TypeImage' => 1,
                            'ProductID' => 0
                        ]);
                    }
                    $data[] = $name;
                }
            } else {
                $name = time() . '-GulandMienNam-' . rand(1, 1000000) . '.' . pathinfo($images[0], PATHINFO_EXTENSION);
                $image = file_get_contents($images[0]);

                file_put_contents(public_path('Assets/Images/Products/') . $name, $image);
                imageproduct::create([
                    'ImageFile' => $name,
                    'TypeImage' => 1,
                    'ProductID' => 0
                ]);

                $data = $name;
            }
            if (is_array($data)) {
                $data = implode(',', $data);
            }
            $res['status'] = true;
            $res['data'] = $data;
            $res['count'] = $count;
        }

        return response()->json($res);
    }

    public function processScope(request $request)
    {
        $customer = customer_warehouse::where('id', $request->id)->first();

        if($customer) {
            if($customer->status == 0) {
                $another = customer_warehouse::where('phone', $customer->phone)->where('id', '!=', $request->id)->where('status', 1)->first();
                if($another) {
                    return response()->json(['status' => false, 'message' => 'Số điện thoại đã được sử dụng ngoài công khai!']);
                } else {
                    $customer->status = 1;
                    $customer->updated_at = date('Y-m-d H:i:s');
                    $customer->save();

                    $warehouse = warehouse::where('parent_id', $request->id)->orderBy('created_at', 'desc')->first();
                    $warehouse->updated_at = date('Y-m-d H:i:s');
                    $warehouse->save();
                    return response()->json(['status' => true, 'message' => 'Đã công khai số điện thoại!']);
                }
            } else {
                $customer->status = 0;
                $customer->updated_at = date('Y-m-d H:i:s');
                $customer->save();

                $warehouse = warehouse::where('parent_id', $request->id)->orderBy('created_at', 'desc')->first();
                $warehouse->updated_at = date('Y-m-d H:i:s');
                $warehouse->save();
                return response()->json(['status' => true, 'message' => 'Đã ẩn số điện thoại!']);
            }
        }
        return response()->json(['status' => false, 'message' => 'Không tìm thấy số điện thoại!']);
    }

    public function processMarketing($id)
    {
        if(!Auth::check()) {
            return redirect()->route('home')->with('error', 'Vui lòng đăng nhập để thực hiện chức năng này!');
        }

        if(controller::checkRole(controller::getRole()->MainRole) < 6) {
            return redirect()->route('home')->with('error', 'Bạn không có quyền thực hiện chức năng này!');
        }

        $marketing = product_marketing::where('parent_id', $id)->first();

        if($marketing) {
            $marketing->delete();
            return redirect()->back()->with('success', 'Đã loại khỏi danh sách marketing!');
        }

        $marketing = new product_marketing();
        $marketing->parent_id = $id;
        $marketing->UserID = Auth::user()->id;
        $marketing->save();
        return redirect()->back()->with('success', 'Đã thêm vào danh sách marketing!');
    }

    public function managementNew(request $request)
    {
        $controller = new Controller();
        $role = Controller::getRole();
        $status = [
            'public' => 'Công khai',
            'private' => 'Riêng tư',
            'deleted' => 'Đã xóa',
            'reported' => 'Bị báo cáo',
            'sold' => 'Đã bán/thuê',
            'expired' => 'Tin hết hạn',
            'stop' => 'Dừng bán',
            'location-nice' => 'Vị trí đẹp',
            'return' => 'Sắp trả'
        ];

        $products = products::select('products.*', 'users.fullName AS nguoidang', 'users.phone AS phoneNguoidang', 'roleusers.roleName AS roleNguoidang', 'roleusers.UpperID',
        'areaproduct.height as AreaHeight', 'areaproduct.width as AreaWidth', 'wardapi.WardName', 'districtapi.DistrictName')
        ->join('users', 'users.id', '=', 'products.UserID')
        ->join('roleusers', 'roleusers.UserID', '=', 'products.UserID')
        ->join('areaproduct', 'areaproduct.ProductID', '=', 'products.ProductID')
        ->join('addressproduct', 'addressproduct.ProductID', '=', 'products.ProductID')
        ->join('wardapi', 'wardapi.WardID', '=', 'addressproduct.WardID')
        ->join('districtapi', 'districtapi.DistrictID', '=', 'addressproduct.DistrictID')
        ->orderBy('products.updated_at', 'desc')
        ->get();

            foreach($products as $key => $value) {

                if(controller::checkRole(controller::getRole()->MainRole) < 6) {
                    if($value->UserID != Auth::user()->id && $value->UpperID != Auth::user()->id) {
                        unset($products[$key]);
                        continue;
                    }
                }

                if(product_surveies::where('ProductID', $value->ProductID)->first()) {
                    $products[$key]['rating'] = product_surveies::where('ProductID', $value->ProductID)->count();
                } else {
                    $products[$key]['rating'] = 0;
                }

                $infoclientproduct = infoclientproduct::where('ProductID', $value->ProductID)->get();
                $products[$key]['info'] = $infoclientproduct;
                $products[$key]['countInfo'] = $infoclientproduct->count();
                $products[$key]['PostingStatus'] = $status[$value->PostingStatus];
            }

        $all = $products;
        $count = $products->count();
        $perPage = 30;
        $currentPage = $request->get('page', 1);
        $products = new LengthAwarePaginator(
            $products->slice(($currentPage - 1) * $perPage, $perPage),
            $products->count(),
            $perPage,
            $currentPage,
            ['path' => $request->url(), 'query' => $request->query()]
        );
        $staff = (controller::checkRole(controller::getRole()->MainRole) >= 6) ? users::select('users.*', 'roleusers.roleName')
        ->join('roleusers', 'roleusers.UserID', '=', 'users.id')
        ->where('roleusers.MainRole', '>=', '2')
        ->where('roleusers.UserID', '!=', Auth::user()->id)
        ->orderBy('users.created_at', 'desc')
        ->get() : users::select('users.*', 'roleusers.roleName')
        ->join('roleusers', 'roleusers.UserID', '=', 'users.id')
        ->where('roleusers.MainRole', '>=', '2')
        ->where('roleusers.UserID', '!=', Auth::user()->id)
        ->where('roleusers.UpperID', Auth::user()->id)
        ->orderBy('users.created_at', 'desc')
        ->get();

        return view('Backend.Production.management-news', compact('controller', 'role', 'products', 'count', 'all', 'staff'));
    }

    public function managementStaff(request $request)
    {
        $role = Controller::getRole();
        $controller = new Controller();
        $area = areauser::all();
        if(controller::checkRole(controller::getRole()->MainRole) >= 6) {
            $staffs = users::select('users.*', 'roleusers.roleName', 'roleusers.MainRole', 'areauser.areaUserName', 'roleusers.UpperID')
                ->join('roleusers', 'roleusers.UserID', '=', 'users.id')
                ->join('areauser', 'areauser.AreaUserID', '=', 'roleusers.AreaUserID')
                ->where('roleusers.MainRole', '>=', 2)
                ->where('roleusers.UserID', '!=', Auth::user()->id)
                ->orWhere('roleusers.roleName', 'Học viên')
                ->where('roleusers.UserID', '!=', Auth::user()->id)
                ->orWhere('roleusers.roleName', 'Cộng tác viên')
                ->where('roleusers.UserID', '!=', Auth::user()->id)
                ->orderBy('users.created_at', 'desc')
                ->get();
        } else if(controller::checkRole(controller::getRole()->MainRole) > 2 && controller::checkRole(controller::getRole()->MainRole) < 6) {
            if(controller::checkRole(controller::getRole()->MainRole) == 3) {
                $staffs = users::select('users.*', 'roleusers.roleName', 'roleusers.MainRole', 'areauser.areaUserName', 'roleusers.UpperID')
                    ->join('roleusers', 'roleusers.UserID', '=', 'users.id')
                    ->join('areauser', 'areauser.AreaUserID', '=', 'roleusers.AreaUserID')
                    ->where('roleusers.MainRole', '>=', 2)
                    ->where('roleusers.MainRole', '<', 4)
                    ->where('roleusers.AreaUserID', roleusers::where('UserID', Auth::user()->id)->first()->AreaUserID)
                    ->where('roleusers.UserID', '!=', Auth::user()->id)
                    ->orWhere('roleusers.roleName', 'Học viên')
                    ->where('roleusers.AreaUserID', roleusers::where('UserID', Auth::user()->id)->first()->AreaUserID)
                    ->where('roleusers.UserID', '!=', Auth::user()->id)
                    ->orWhere('roleusers.roleName', 'Cộng tác viên')
                    ->where('roleusers.AreaUserID', roleusers::where('UserID', Auth::user()->id)->first()->AreaUserID)
                    ->where('roleusers.UserID', '!=', Auth::user()->id)
                    ->orderBy('users.created_at', 'desc')
                    ->get();
            } else if(controller::checkRole(controller::getRole()->MainRole) == 4) {
                $staffs = users::select('users.*', 'roleusers.roleName', 'roleusers.MainRole', 'areauser.areaUserName', 'roleusers.UpperID')
                    ->join('roleusers', 'roleusers.UserID', '=', 'users.id')
                    ->join('areauser', 'areauser.AreaUserID', '=', 'roleusers.AreaUserID')
                    ->where('roleusers.MainRole', '>=', 2)
                    ->where('roleusers.MainRole', '<', 6)
                    ->where('roleusers.AreaUserID', roleusers::where('UserID', Auth::user()->id)->first()->AreaUserID)
                    ->where('roleusers.UserID', '!=', Auth::user()->id)
                    ->orWhere('roleusers.roleName', 'Học viên')
                    ->where('roleusers.AreaUserID', roleusers::where('UserID', Auth::user()->id)->first()->AreaUserID)
                    ->where('roleusers.UserID', '!=', Auth::user()->id)
                    ->orWhere('roleusers.roleName', 'Cộng tác viên')
                    ->where('roleusers.AreaUserID', roleusers::where('UserID', Auth::user()->id)->first()->AreaUserID)
                    ->where('roleusers.UserID', '!=', Auth::user()->id)
                    ->orderBy('users.created_at', 'desc')
                    ->get();
            } else if(controller::checkRole(controller::getRole()->MainRole) == 5) {
                $staffs = users::select('users.*', 'roleusers.roleName', 'roleusers.MainRole', 'areauser.areaUserName', 'roleusers.UpperID')
                    ->join('roleusers', 'roleusers.UserID', '=', 'users.id')
                    ->join('areauser', 'areauser.AreaUserID', '=', 'roleusers.AreaUserID')
                    ->where('roleusers.MainRole', '>=', 2)
                    ->where('roleusers.MainRole', '<', 8)
                    ->where('roleusers.AreaUserID', roleusers::where('UserID', Auth::user()->id)->first()->AreaUserID)
                    ->where('roleusers.UserID', '!=', Auth::user()->id)
                    ->orWhere('roleusers.roleName', 'Học viên')
                    ->where('roleusers.AreaUserID', roleusers::where('UserID', Auth::user()->id)->first()->AreaUserID)
                    ->where('roleusers.UserID', '!=', Auth::user()->id)
                    ->orWhere('roleusers.roleName', 'Cộng tác viên')
                    ->where('roleusers.AreaUserID', roleusers::where('UserID', Auth::user()->id)->first()->AreaUserID)
                    ->where('roleusers.UserID', '!=', Auth::user()->id)
                    ->orderBy('users.created_at', 'desc')
                    ->get();
            }
        } else {
            $staffs = users::select('users.*', 'roleusers.roleName', 'roleusers.MainRole', 'areauser.areaUserName', 'roleusers.UpperID')
                ->join('roleusers', 'roleusers.UserID', '=', 'users.id')
                ->join('areauser', 'areauser.AreaUserID', '=', 'roleusers.AreaUserID')
                ->where('roleusers.MainRole', '>=', 2)
                ->where('roleusers.UpperID', Auth::user()->id)
                ->where('roleusers.UserID', '!=', Auth::user()->id)
                ->orderBy('users.created_at', 'desc')
                ->get();
        }
        $arr = [
            'intern, agency, landowner, client' => 1,
            'staff' => 2,
            'assBossGroup' => 3,
            'bossGroup' => 3,
            'assBossRoom' => 4,
            'bossRoom' => 4,
            'assBossArea' => 5,
            'bossArea' => 5,
            'assBoss' => 6,
            'boss' => 6,
            'admin' => 7,
        ];
        foreach($staffs as $key => $value) {
            $staffs[$key]['captren'] = users::select('users.*', 'roleusers.roleName')->join('roleusers', 'roleusers.UserID', '=', 'users.id')->where('users.id', $value->UpperID)->first();
            $staffs[$key]['capduoi'] = roleusers::where('UpperID', $value->id)->count();
            $staffs[$key]['countProduct'] = products::where('UserID', $value->id)->count();
            $staffs[$key]['role_search'] = $arr[$value->MainRole];
        }

        $count = $staffs->count();
        $all = $staffs;
        $perPage = 30;
        $currentPage = $request->get('page', 1);
        $staffs = new LengthAwarePaginator(
            $staffs->slice(($currentPage - 1) * $perPage, $perPage),
            $count,
            $perPage,
            $currentPage,
            ['path' => $request->url(), 'query' => $request->query()]
        );

        $uppers = users::select('users.*', 'roleusers.roleName')
            ->join('roleusers', 'roleusers.UserID', '=', 'users.id')
            ->where('roleusers.MainRole', '>', 2)
            ->orderBy('users.created_at', 'desc')
            ->get();

        $users = users::select('users.*', 'roleusers.roleName')
            ->join('roleusers', 'roleusers.UserID', '=', 'users.id')
            ->where('roleusers.MainRole', '<', 2)
            ->orderBy('users.created_at', 'desc')
            ->get();

        return view('Backend.Production.management-staff', compact('staffs', 'count', 'controller', 'role', 'all', 'area', 'uppers', 'users'));
    }

    public function managementClient(request $request)
    {

        if(controller::checkRole(controller::getRole()->MainRole) < 6) {
            return redirect()->route('home')->with('error', 'Bạn không có quyền thực hiện chức năng này!');
        }

        $role = Controller::getRole();
        $controller = new Controller();
        $area = areauser::all();
        $staffs = users::select('users.*', 'roleusers.roleName', 'roleusers.MainRole', 'areauser.areaUserName', 'roleusers.UpperID')
        ->join('roleusers', 'roleusers.UserID', '=', 'users.id')
        ->join('areauser', 'areauser.AreaUserID', '=', 'roleusers.AreaUserID')
        ->where('roleusers.UserID', '!=', Auth::user()->id)
        ->orderBy('users.created_at', 'desc')
        ->get();

        $arr = [
            'intern, agency, landowner, client' => 1,
            'staff' => 2,
            'assBossGroup' => 3,
            'bossGroup' => 3,
            'assBossRoom' => 4,
            'bossRoom' => 4,
            'assBossArea' => 5,
            'bossArea' => 5,
            'assBoss' => 6,
            'boss' => 6,
            'admin' => 7,
        ];
        foreach($staffs as $key => $value) {
            $staffs[$key]['captren'] = users::select('users.*', 'roleusers.roleName')->join('roleusers', 'roleusers.UserID', '=', 'users.id')->where('users.id', $value->UpperID)->first();
            $staffs[$key]['capduoi'] = roleusers::where('UpperID', $value->id)->count();
            $staffs[$key]['countProduct'] = products::where('UserID', $value->id)->count();
            $staffs[$key]['role_search'] = $arr[$value->MainRole];
        }

        $count = $staffs->count();
        $all = $staffs;
        $perPage = 30;
        $currentPage = $request->get('page', 1);
        $staffs = new LengthAwarePaginator(
            $staffs->slice(($currentPage - 1) * $perPage, $perPage),
            $count,
            $perPage,
            $currentPage,
            ['path' => $request->url(), 'query' => $request->query()]
        );

        $uppers = users::select('users.*', 'roleusers.roleName')
            ->join('roleusers', 'roleusers.UserID', '=', 'users.id')
            ->where('roleusers.MainRole', '>', 2)
            ->orderBy('users.created_at', 'desc')
            ->get();

        $users = users::select('users.*', 'roleusers.roleName')
            ->join('roleusers', 'roleusers.UserID', '=', 'users.id')
            ->where('roleusers.MainRole', '<', 2)
            ->orderBy('users.created_at', 'desc')
            ->get();

        return view('Backend.Production.management-client', compact('staffs', 'count', 'controller', 'role', 'all', 'area', 'uppers', 'users'));
    }

    public function transfer(request $request)
    {
        if(controller::checkRole(controller::getRole()->MainRole) < 6) {
            return response()->json(['status' => false, 'message' => 'Bạn không có quyền thực hiện chức năng này!']);
        }

        $user = users::where('id', $request->idUser)->first();

        if(!$user) {
            return response()->json(['status' => false, 'message' => 'Nhân viên không tồn tại!']);
        }

        $product = products::where('ProductID', $request->id)->first();

        if(!$product) {
            return response()->json(['status' => false, 'message' => 'Sản phẩm không tồn tại!']);
        }

        products::where('ProductID', $request->id)->update(['UserID' => $request->idUser]);

        return response()->json(['status' => true, 'message' => 'Chuyển nhân viên thành công!']);
    }

    public function changeRole(request $request)
    {
        $arr = [
            1 => 'Cộng tác viên',
            2 => 'Chuyên viên',
            3 => 'Trợ lý trưởng nhóm',
            4 => 'Trưởng nhóm',
            5 => 'Trợ lý trưởng phòng',
            6 => 'Trưởng phòng',
            7 => 'Trợ lý giám đốc chi nhánh',
            8 => 'Giám đốc chi nhánh',
            9 => 'Trợ lý tổng giám đốc',
            10 => 'Tổng giám đốc',
            11 => 'Học viên',
        ];

        if(controller::checkRole(controller::getRole()->MainRole) < 3 && roleusers::where('UserID', $request->id)->first()->UpperID != Auth::user()->id) {
            return response()->json(['status' => false, 'message' => 'Bạn không có quyền thực hiện chức năng này!']);
        }

        if(controller::checkRole(controller::getRole()->MainRole) < intval($request->role) - 2 && $request->role != '11') {
            return response()->json(['status' => false, 'message' => 'Bạn không có quyền nâng cấp chức vụ cao hơn bạn!']);
        }

        if(controller::checkRole(controller::getRole()->MainRole) < controller::checkRole(controller::getRole($request->id)->MainRole)) {
            return response()->json(['status' => false, 'message' => 'Bạn không có quyền nâng cấp chức vụ của cấp trên!']);
        }

        $user = roleusers::where('UserID', $request->id)->first();

        if(!$user) {
            return response()->json(['status' => false, 'message' => 'Nhân viên không tồn tại!']);
        }

        if($request->role > 11) {
            return response()->json(['status' => false, 'message' => 'Chức vụ không hợp lệ!']);
        }

        roleusers::where('UserID', $request->id)->update(['MainRole' => ($request->role == 11) ? 1 : $request->role, 'roleName' => $arr[$request->role]]);

        return response()->json(['status' => true, 'message' => 'Thay đổi chức vụ thành công!']);
    }

    public function changeArea(request $request)
    {
        if(controller::checkRole(controller::getRole()->MainRole) < 5 && roleusers::where('UserID', $request->id)->first()->UpperID != Auth::user()->id) {
            return response()->json(['status' => false, 'message' => 'Bạn không có quyền thực hiện chức năng này!']);
        }

        if(controller::checkRole(controller::getRole()->MainRole) < controller::checkRole(controller::getRole($request->id)->MainRole)) {
            return response()->json(['status' => false, 'message' => 'Bạn không có quyền nâng cấp chi nhánh của cấp trên!']);
        }

        $user = roleusers::where('UserID', $request->id)->first();

        if(!$user) {
            return response()->json(['status' => false, 'message' => 'Nhân viên không tồn tại!']);
        }

        $area = areauser::where('AreaUserID', $request->area)->first();

        if(!$area) {
            return response()->json(['status' => false, 'message' => 'Khu vực không tồn tại!']);
        }

        roleusers::where('UserID', $request->id)->update(['AreaUserID' => $request->area]);

        return response()->json(['status' => true, 'message' => 'Thay đổi khu vực thành công!']);
    }

    public function changeUpper(request $request)
    {
        if(controller::checkRole(controller::getRole()->MainRole) < 6 && roleusers::where('UserID', $request->id)->first()->UpperID != Auth::user()->id) {
            return response()->json(['status' => false, 'message' => 'Bạn không có quyền thực hiện chức năng này!']);
        }

        if(controller::checkRole(controller::getRole()->MainRole) < controller::checkRole(controller::getRole($request->id)->MainRole)) {
            return response()->json(['status' => false, 'message' => 'Bạn không có quyền nâng cấp chức vụ của cấp trên!']);
        }

        $user = roleusers::where('UserID', $request->id)->first();

        if(!$user) {
            return response()->json(['status' => false, 'message' => 'Nhân viên không tồn tại!']);
        }

        $upper = roleusers::where('UserID', $request->upper)->first();

        if(!$upper) {
            return response()->json(['status' => false, 'message' => 'Cấp trên không tồn tại!']);
        }

        roleusers::where('UserID', $request->id)->update(['UpperID' => $request->upper]);

        return response()->json(['status' => true, 'message' => 'Thay đổi cấp trên thành công!']);
    }

    public function resetPass(request $request)
    {
        if(controller::checkRole(controller::getRole()->MainRole) < 5 && roleusers::where('UserID', $request->id)->first()->UpperID != Auth::user()->id) {
            return redirect()->back()->with('error', 'Bạn không có quyền thực hiện chức năng này!');
        }

        if(controller::checkRole(controller::getRole()->MainRole) < controller::checkRole(controller::getRole($request->id)->MainRole)) {
            return redirect()->back()->with('error', 'Bạn không có quyền nâng cấp chức vụ của cấp trên!');
        }

        $user = users::where('id', $request->id)->first();

        if(!$user) {
            return redirect()->back()->with('error', 'Nhân viên không tồn tại!');
        }

        $user->password = Hash::make('123123');
        $user->save();

        return redirect()->back()->with('success', 'Đặt lại mật khẩu thành công!');
    }

    public function addStaff(request $request)
    {
        // dd($request->all());
        if(controller::checkRole(controller::getRole()->MainRole) < 5) {
            return redirect()->back()->with('error', 'Bạn không có quyền thực hiện chức năng này!');
        }

        if(controller::checkRole(controller::getRole()->MainRole) < $request->position && $request->position != 11) {
            return redirect()->back()->with('error', 'Bạn không có quyền thêm chức vụ cao hơn bạn!');
        }

        if($request->position > 11) {
            return redirect()->back()->with('error', 'Chức vụ không hợp lệ!');
        }

        $arr = [
            11 => 'Học viên',
            1 => 'Cộng tác viên',
            2 => 'Chuyên viên',
            3 => 'Trợ lý trưởng nhóm',
            4 => 'Trưởng nhóm',
            5 => 'Trợ lý trưởng phòng',
            6 => 'Trưởng phòng',
            7 => 'Trợ lý giám đốc chi nhánh',
            8 => 'Giám đốc chi nhánh',
            9 => 'Trợ lý tổng giám đốc',
            10 => 'Tổng giám đốc'
        ];

        if(roleusers::where('UserID', $request->user_id)->update(['MainRole' => ($request->position == 11) ? 1 : $request->position, 'roleName' => $arr[$request->position], 'UpperID' => $request->manager_id])) {
            return redirect()->back()->with('success', 'Thêm nhân viên thành công!');
        }

        return redirect()->back()->with('error', 'Thêm nhân viên thất bại!');
    }

    public function processLock(request $request)
    {
        if(controller::checkRole(controller::getRole()->MainRole) < 5) {
            return redirect()->back()->with('error', 'Bạn không có quyền thực hiện chức năng này!');
        }

        if(controller::checkRole(controller::getRole()->MainRole) < controller::checkRole(controller::getRole($request->id)->MainRole)) {
            return redirect()->back()->with('error', 'Bạn không có quyền khóa nhân viên cấp trên!');
        }

        $user = users::where('id', $request->id)->first();

        if(!$user) {
            return redirect()->back()->with('error', 'Nhân viên không tồn tại!');
        }

        if($user->status != 'Active') {
            $user->status = 'Active';
            $user->save();
            return redirect()->back()->with('success', 'Mở khóa nhân viên thành công!');
        } else {
            $user->status = 'Lock';
            $user->save();
            return redirect()->back()->with('success', 'Khóa nhân viên thành công!');
        }
    }

    public function managementExpenditure(request $request)
    {
        $role = Controller::getRole();
        $controller = new Controller();
        $date = [
            'homqua' => date('Y-m-d', strtotime('-1 days')),
            'homnay' => date('Y-m-d'),
            '7ngaytruoc' => date('Y-m-d', strtotime('-7 days')),
            'thangnay' => date('Y-m-d', strtotime('first day of this month'))
        ];
        $categories = income_expenditure_categories::get();

        return view('Backend.Production.management-expenditure', compact('role', 'controller', 'date', 'categories'));
    }

    protected function getDataThuChi(request $request)
    {
        $id = 1;
        if($request->has('id')) {
            $id = $request->id;
        }
        if(controller::checkRole(controller::getRole()->MainRole) < 6) {
            return redirect()->route('home')->with('error', 'Bạn không có quyền thực hiện chức năng này!');
        }

        $data = income_expenditure::select('income_expenditure.*', 'income_expenditure_categories.name as category_name', 'users_from.fullName as from_user_name', 'users_from.phone as from_user_phone')
            ->join('users as users_from', 'users_from.id', '=', 'income_expenditure.user_from')
            ->join('income_expenditure_categories', 'income_expenditure_categories.id', '=', 'income_expenditure.parent_id')
            ->where('income_expenditure.parent_id', $id)
            ->orderBy('income_expenditure.created_at', 'desc')
            ->get();


        if($request->has('time_range') && $request->time_range != '') {
            $data = income_expenditure::select('income_expenditure.*', 'income_expenditure_categories.name as category_name', 'users_from.fullName as from_user_name', 'users_from.phone as from_user_phone')
                ->join('users as users_from', 'users_from.id', '=', 'income_expenditure.user_from')
                ->join('income_expenditure_categories', 'income_expenditure_categories.id', '=', 'income_expenditure.parent_id')
                ->where('income_expenditure.parent_id', $id)
                ->whereDate('income_expenditure.created_at', '>=', $request->time_range)
                ->orderBy('income_expenditure.created_at', 'desc')
                ->get();
        }

        if($request->has('start_time') && $request != '') {
            $convertStart = strtotime($request->start_time);
            $convertEnd = strtotime($request->end_time);
            $convertStart = date('Y-m-d', $convertStart);
            $convertEnd = date('Y-m-d', $convertEnd);
            if($request->has('end_time') && $request->end_time != '') {
                $data = income_expenditure::select('income_expenditure.*', 'income_expenditure_categories.name as category_name', 'users_from.fullName as from_user_name', 'users_from.phone as from_user_phone')
                    ->join('users as users_from', 'users_from.id', '=', 'income_expenditure.user_from')
                    ->join('income_expenditure_categories', 'income_expenditure_categories.id', '=', 'income_expenditure.parent_id')
                    ->where('income_expenditure.parent_id', $id)
                    ->whereDate('income_expenditure.created_at', '>=', $convertStart)
                    ->whereDate('income_expenditure.created_at', '<=', $convertEnd)
                    ->orderBy('income_expenditure.created_at', 'desc')
                    ->get();
            } else {
                $data = income_expenditure::select('income_expenditure.*', 'income_expenditure_categories.name as category_name', 'users_from.fullName as from_user_name', 'users_from.phone as from_user_phone')
                    ->join('users as users_from', 'users_from.id', '=', 'income_expenditure.user_from')
                    ->join('income_expenditure_categories', 'income_expenditure_categories.id', '=', 'income_expenditure.parent_id')
                    ->where('income_expenditure.parent_id', $id)
                    ->whereDate('income_expenditure.created_at', '>=', $convertStart)
                    ->orderBy('income_expenditure.created_at', 'desc')
                    ->get();
            }
        } else if($request->has('end_time') && $request->end_time != '') {
            $convertStart = strtotime($request->start_time);
            $convertEnd = strtotime($request->end_time);
            $convertStart = date('Y-m-d', $convertStart);
            $convertEnd = date('Y-m-d', $convertEnd);
            if($request->has('start_time') && $request->start_time != '') {
                $data = income_expenditure::select('income_expenditure.*', 'income_expenditure_categories.name as category_name', 'users_from.fullName as from_user_name', 'users_from.phone as from_user_phone')
                    ->join('users as users_from', 'users_from.id', '=', 'income_expenditure.user_from')
                    ->join('income_expenditure_categories', 'income_expenditure_categories.id', '=', 'income_expenditure.parent_id')
                    ->where('income_expenditure.parent_id', $id)
                    ->whereDate('income_expenditure.created_at', '>=', $convertStart)
                    ->whereDate('income_expenditure.created_at', '<=', $convertEnd)
                    ->orderBy('income_expenditure.created_at', 'desc')
                    ->get();
            } else {
                $data = income_expenditure::select('income_expenditure.*', 'income_expenditure_categories.name as category_name', 'users_from.fullName as from_user_name', 'users_from.phone as from_user_phone')
                    ->join('users as users_from', 'users_from.id', '=', 'income_expenditure.user_from')
                    ->join('income_expenditure_categories', 'income_expenditure_categories.id', '=', 'income_expenditure.parent_id')
                    ->where('income_expenditure.parent_id', $id)
                    ->whereDate('income_expenditure.created_at', '<=', $convertEnd)
                    ->orderBy('income_expenditure.created_at', 'desc')
                    ->get();
            }
        }

        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('option', function($row) {
                $hrefIn = route('method.in-phieu-thu-chi', $row->id);
                $option = '<a href="'. $hrefIn .'" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="inPhieu" class="edit btn btn-primary btn-sm inPhieu">In</a>';
                $option .= '&nbsp;&nbsp;';
                $option .= '<a href='. route('method.delete-phieu-thu-chi', $row->id) .' data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="delete btn btn-danger btn-sm" onclick="return confirm(\'Bạn có chắc chắn muốn xóa phiếu thu chi này không?\')">Xóa</a>';
                return $option;
            })
            ->rawColumns(['option'])
            ->addColumn('user_action', function($row) {
                return $row->from_user_name . ' - ' . $row->from_user_phone;
            })
            ->addColumn('create_at', function($row) {
                return date('d/m/Y H:i:s', strtotime($row->created_at));
            })
            ->addColumn('balance_first', function($row) {
                return number_format($row->balance_first) . 'đ';
            })
            ->addColumn('collect', function($row) {
                return number_format($row->collect) . 'đ';
            })
            ->addColumn('spend', function($row) {
                return number_format($row->spend) . 'đ';
            })
            ->addColumn('balance_last', function($row) {
                return number_format($row->balance_last) . 'đ';
            })
            ->addColumn('avatar', function($row) {
                return $row->avatar;
            })
            ->make(true);
    }

    protected function store_expenditure(request $request)
    {
        $cate = income_expenditure_categories::where('id', $request->fund_id)->first();
        if(!$cate) {
            return redirect()->back()->with('error', 'Không thể thêm phiếu thu chi vì không có dữ liệu!');
        }

        $imcome = new income_expenditure();

        $request['price'] = str_replace(',', '', $request->price);

        $imcome->parent_id = $request->fund_id;
        $imcome->user_from = Auth::user()->id;
        $imcome->balance_first = $cate->balance;
        if($request->type == 1) {
            $imcome->spend = $request->price;
            $imcome->collect = 0;
            $imcome->balance_last = $cate->balance - $request->price;
        } else {
            $imcome->collect = $request->price;
            $imcome->spend = 0;
            $imcome->balance_last = $cate->balance + $request->price;
        }
        $imcome->type = $request->payment_method == 2 ? 'Tiền mặt' : 'Chuyển khoản';
        $imcome->description = $request->desc;
        if($request->has('none')) $imcome->content = $request->note;
        $imcome->fullName = $request->name;
        $imcome->phone = $request->phone;
        $imcome->date_payment = $request->date_action;
        if($request->has('file')) {
            $file = $request->file('file');
            $name = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('Assets/Images/Imcomes'), $name);
            $imcome->avatar = $name;
        }
        $imcome->save();

        $cate->balance = $imcome->balance_last;
        $cate->save();

        return redirect()->back()->with('success', 'Thêm phiếu thu chi thành công!');
    }

    protected function inPhieuThuChi($id)
    {
        if(controller::checkRole(controller::getRole()->MainRole) < 6) {
            return redirect()->route('home')->with('error', 'Bạn không có quyền thực hiện chức năng này!');
        }

        $data = income_expenditure::select('income_expenditure.*', 'income_expenditure_categories.name as category_name', 'users_from.fullName as from_user_name', 'users_from.phone as from_user_phone')
            ->join('users as users_from', 'users_from.id', '=', 'income_expenditure.user_from')
            ->join('income_expenditure_categories', 'income_expenditure_categories.id', '=', 'income_expenditure.parent_id')
            ->where('income_expenditure.id', $id)
            ->first();

        $data['format_date'] = 'Ngày ' . date('d', strtotime($data->created_at)) . ', tháng ' . date('m', strtotime($data->created_at)) . ', năm ' . date('Y', strtotime($data->created_at));
        $price = (int) $data['collect'] != 0 ? $data['collect'] : $data['spend'];
        $transformer = new Transformer();
        $data['price'] = $transformer->toWords($price) . ' đồng';

        return view('Frontend.Custom.printf', compact('data'));
    }

    protected function xoaPhieuThuChi($id)
    {
        if(controller::checkRole(controller::getRole()->MainRole) < 6) {
            return redirect()->route('home')->with('error', 'Bạn không có quyền thực hiện chức năng này!');
        }

        $data = income_expenditure::where('id', $id)->first();
        if(!$data) {
            return redirect()->back()->with('error', 'Không thể xóa phiếu thu chi vì không có dữ liệu!');
        }
        $cate = income_expenditure_categories::where('id', $data->parent_id)->first();

        $cate->balance = $data->type == 1 ? $cate->balance + $data->spend : $cate->balance - $data->collect;
        $cate->save();

        $data->delete();

        return redirect()->back()->with('success', 'Xóa phiếu thu chi thành công!');
    }
}
