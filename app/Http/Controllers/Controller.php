<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function fetchDistrict(Request $request)
    {
        $city_id = $request->city_id;
        $districts = \App\Models\districtapi::where('ProvinceID', $city_id)->get();
        return response()->json($districts);
    }

    public function fetchWard(Request $request)
    {
        $district_id = $request->district_id;
        $wards = \App\Models\wardapi::where('DistrictID', $district_id)->get();
        return response()->json($wards);
    }

    public function fetchStreet(Request $request)
    {
        $ward_id = $request->ward_id;
        $street = \App\Models\streetapi::where('WardID', $ward_id)->get();
        return response()->json($street);
    }

    public function fetchStreetByDistrict(Request $request)
    {
        $district_id = $request->district_id;
        $street = \App\Models\streetapi::where('DistrictID', $district_id)->get();
        return response()->json($street);
    }

    public static function convertAddressFromIDToName($id, $table, $collumnID)
    {
        $name = $table::where($collumnID, $id)->first();
        if($table == '\App\Models\cityapi') {
            return $name->CityName;
        } elseif($table == '\App\Models\districtapi') {
            return $name->DistrictName;
        } elseif($table == '\App\Models\wardapi') {
            return $name->WardName;
        } elseif($table == '\App\Models\streetapi') {
            return $name->StreetName;
        }
    }

    public static function convertTimeVietNam($time)
    {
        $time = strtotime($time);
        $now = time();
        $time = $now - $time;
        if($time < 60) {
            return 'Vừa xong';
        } elseif($time < 3600) {
            return floor($time / 60) . ' phút trước';
        } elseif($time < 86400) {
            return floor($time / 3600) . ' giờ trước';
        } elseif($time < 604800) {
            return floor($time / 86400) . ' ngày trước';
        } elseif($time < 2592000) {
            return floor($time / 604800) . ' tuần trước';
        } elseif($time < 31536000) {
            return floor($time / 2592000) . ' tháng trước';
        }
        return floor($time / 31536000) . ' năm trước';
    }

    public static function convertPriceText($price)
    {
        if($price < 1000) {
            return $price . ' nghìn';
        } elseif($price < 1000000) {
            return floor($price / 1000) . ' nghìn';
        } elseif($price < 1000000000) {
            return floor($price / 1000000) . ' triệu';
        } elseif($price < 1000000000000) {
            return floor($price / 1000000000) . ' tỷ';
        }
    }

    public static function checkRole($role)
    {
        if($role == 'intern, agency, landowner, client') {
            return 1;
        } else if($role == 'staff') {
            return 2;
        } else if($role == 'assBossGroup' || $role == 'bossGroup') {
            return 3;
        } else if($role == 'assBossRoom' || $role == 'bossRoom') {
            return 4;
        } else if($role == 'assBossArea' || $role == 'bossArea') {
            return 5;
        } else if($role == 'assBoss' || $role == 'boss') {
            return 6;
        } else if($role == 'admin') {
            return 7;
        }
    }

    public static function addRecord($title, $UserID)
    {
        \App\Models\recordusers::create([
            'RecordTitle' => $title,
            'UserID' => $UserID
        ]);
    }

    public static function countPostUser($UserID)
    {
        return \App\Models\products::where('UserID', $UserID)->count();
    }

    public static function getRole($id = 0)
    {
        if($id == 0) {
            return \App\Models\roleusers::where('UserID', auth()->id())->first();
        }
        return \App\Models\roleusers::where('UserID', $id)->first();
    }

    public static function getSubCategory($id = 0)
    {
        if($id == 0) {
            return \App\Models\subcategoryproduct::get();
        }
        return \App\Models\subcategoryproduct::where('CategoryID', $id)->get();
    }

    public static function getSubCategoryBySlug($slug)
    {
        $cateID = \App\Models\categoryproduct::where('slug', $slug)->first();
        return \App\Models\subcategoryproduct::where('CategoryID', $cateID->CategoryID)->get();
    }

    public static function getUser($id)
    {
        return \App\Models\users::where('id', $id)->first();
    }
}
