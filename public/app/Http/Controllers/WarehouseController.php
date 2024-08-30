<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\warehouse;
use App\Models\customer_warehouse;
use App\Models\option_warehouse;
use App\Models\roleusers;
use Illuminate\Support\Facades\Auth;
use App\Models\subcategoryproduct;
use App\Models\value_warehouse;
use App\Models\status_warehouse;

class WarehouseController extends Controller
{
    public function index(request $request)
    {
        if(controller::checkRole(controller::getRole()->MainRole) < 2 || !Auth::check()) {
            return redirect()->route('home')->with('error', 'Vui lòng hợp tác thành chuyên viên để có thể xem kho khách!');
        }
        $role = Controller::getRole();
        $controller = new Controller();
        if($request->has('status') && $request->status == '4') {
            $warehousies = warehouse::select('warehouse.*')
            ->join('customer_warehouse', 'warehouse.parent_id', '=', 'customer_warehouse.id')
            ->where('customer_warehouse.UserID', Auth::user()->id)
            ->where('customer_warehouse.status', 0)
            ->orderBy('updated_at', 'desc')
            ->get();
        } else {
            $warehousies = warehouse::select('warehouse.*')
            ->join('customer_warehouse', 'warehouse.parent_id', '=', 'customer_warehouse.id')
            ->where('customer_warehouse.status', 1)
            ->orderBy('updated_at', 'desc')
            ->get();
        }
    
        $warehousies = $warehousies->groupBy('parent_id')
            ->map(function($group) {
                return $group->sortByDesc('updated_at')->first();
            });
        
        foreach ($warehousies as $key => $value) {
            if(!$request->has('status')) {
                if(status_warehouse::where('parent_id', $value['parent_id'])->where('UserID', Auth::user()->id)->count() != 0) {
                    unset($warehousies[$key]);
                } else {
                    if(warehouse::where('AreaUserID', '!=', roleusers::where('UserID', Auth::user()->id)->first()->AreaUserID)->where('id', $value->id)->count() != 0 && $value->AreaUserID != 3) {
                        $warehousies[$key] = warehouse::where('id', '!=', $value->id)->where('parent_id', $value->parent_id)->where('AreaUserID', roleusers::where('UserID', Auth::user()->id)->first()->AreaUserID)->orderBy('updated_at', 'desc')->first();
                        if($warehousies[$key] == null) {
                            unset($warehousies[$key]);
                        } else {
                            $warehousies[$key]['customer'] = customer_warehouse::where('id', $warehousies[$key]['parent_id'])->orderBy('updated_at', 'desc')->first();
                            $warehousies[$key]['tuongtac'] = option_warehouse::where('parent_id', $warehousies[$key]['id'])->where('type', 1)->count();
                            $warehousies[$key]['nhucau'] = warehouse::where('parent_id', $warehousies[$key]['parent_id'])->count();
                            $warehousies[$key]['ghichu'] = option_warehouse::where('parent_id', $warehousies[$key]['id'])->where('UserID', Auth::user()->id)->where('type', 2)->count();
                        }
                    } else {
                        $warehousies[$key]['customer'] = customer_warehouse::where('id', $warehousies[$key]['parent_id'])->orderBy('updated_at', 'desc')->first();
                        $warehousies[$key]['tuongtac'] = option_warehouse::where('parent_id', $warehousies[$key]['id'])->where('type', 1)->count();
                        $warehousies[$key]['nhucau'] = warehouse::where('parent_id', $warehousies[$key]['parent_id'])->count();
                        $warehousies[$key]['ghichu'] = option_warehouse::where('parent_id', $warehousies[$key]['id'])->where('UserID', Auth::user()->id)->where('type', 2)->count();
                    }
                }
            } else {
                if($request->status == '1') {
                    if(status_warehouse::where('parent_id', $value['parent_id'])->where('UserID', Auth::user()->id)->where('status', 1)->count() != 0) {
                        $warehousies[$key]['isFollow'] = true;
                        $warehousies[$key]['isSkip'] = false;
                        $warehousies[$key]['customer'] = customer_warehouse::where('id', $warehousies[$key]['parent_id'])->orderBy('updated_at', 'desc')->first();
                        $warehousies[$key]['tuongtac'] = option_warehouse::where('parent_id', $warehousies[$key]['id'])->where('type', 1)->count();
                        $warehousies[$key]['nhucau'] = warehouse::where('parent_id', $warehousies[$key]['parent_id'])->count();
                        $warehousies[$key]['ghichu'] = option_warehouse::where('parent_id', $warehousies[$key]['id'])->where('UserID', Auth::user()->id)->where('type', 2)->count();
                    } else {
                        unset($warehousies[$key]);
                    }
                } else if($request->status == '2') {
                    if(status_warehouse::where('parent_id', $value['parent_id'])->where('UserID', Auth::user()->id)->where('status', 2)->count() != 0) {
                        $warehousies[$key]['isFollow'] = false;
                        $warehousies[$key]['isSkip'] = true;
                        $warehousies[$key]['customer'] = customer_warehouse::where('id', $warehousies[$key]['parent_id'])->orderBy('updated_at', 'desc')->first();
                        $warehousies[$key]['tuongtac'] = option_warehouse::where('parent_id', $warehousies[$key]['id'])->where('type', 1)->count();
                        $warehousies[$key]['nhucau'] = warehouse::where('parent_id', $warehousies[$key]['parent_id'])->count();
                        $warehousies[$key]['ghichu'] = option_warehouse::where('parent_id', $warehousies[$key]['id'])->where('UserID', Auth::user()->id)->where('type', 2)->count();
                    } else {
                        unset($warehousies[$key]);
                    }
                } else if($request->status == '3') {
                    $warehousies[$key]['isFollow'] = false;
                    $warehousies[$key]['isSkip'] = false;
                    if(controller::checkRole(controller::getRole()->MainRole) >= 6) {
                        if(status_warehouse::where('parent_id', $value['parent_id'])->where('UserID', Auth::user()->id)->count() != 0) {
                            $status = status_warehouse::where('parent_id', $value['parent_id'])->where('UserID', Auth::user()->id)->first();
                            $warehousies[$key]['isFollow'] = ($status->status == 'follow') ? true : false;
                            $warehousies[$key]['isSkip'] = ($status->status == 'skip') ? true : false;
                        }
                        $warehousies[$key]['customer'] = customer_warehouse::where('id', $warehousies[$key]['parent_id'])->orderBy('updated_at', 'desc')->first();
                        $warehousies[$key]['tuongtac'] = option_warehouse::where('parent_id', $warehousies[$key]['id'])->where('type', 1)->count();
                        $warehousies[$key]['nhucau'] = warehouse::where('parent_id', $warehousies[$key]['parent_id'])->count();
                        $warehousies[$key]['ghichu'] = option_warehouse::where('parent_id', $warehousies[$key]['id'])->where('UserID', Auth::user()->id)->where('type', 2)->count();
                    } else {
                        if($value->AreaUserID == 3 || $value->AreaUserID == roleusers::where('UserID', Auth::user()->id)->first()->AreaUserID) {
                            if(status_warehouse::where('parent_id', $value['parent_id'])->where('UserID', Auth::user()->id)->count() != 0) {
                                $status = status_warehouse::where('parent_id', $value['parent_id'])->where('UserID', Auth::user()->id)->first();
                                $warehousies[$key]['isFollow'] = ($status->status == 'follow') ? true : false;
                                $warehousies[$key]['isSkip'] = ($status->status == 'skip') ? true : false;
                            }
                            $warehousies[$key]['customer'] = customer_warehouse::where('id', $warehousies[$key]['parent_id'])->orderBy('updated_at', 'desc')->first();
                            $warehousies[$key]['tuongtac'] = option_warehouse::where('parent_id', $warehousies[$key]['id'])->where('type', 1)->count();
                            $warehousies[$key]['nhucau'] = warehouse::where('parent_id', $warehousies[$key]['parent_id'])->count();
                            $warehousies[$key]['ghichu'] = option_warehouse::where('parent_id', $warehousies[$key]['id'])->where('UserID', Auth::user()->id)->where('type', 2)->count();
                        } else {
                            unset($warehousies[$key]);
                        }
                    }
                } else if($request->status == '4') {
                    $warehousies[$key]['isFollow'] = false;
                    $warehousies[$key]['isSkip'] = false;
                    if(customer_warehouse::where('UserID', Auth::user()->id)->where('id', $value['parent_id'])->count() != 0) {
                        if(status_warehouse::where('parent_id', $value['parent_id'])->where('UserID', Auth::user()->id)->count() != 0) {
                            $status = status_warehouse::where('parent_id', $value['parent_id'])->where('UserID', Auth::user()->id)->first();
                            $warehousies[$key]['isFollow'] = ($status->status == 'follow') ? true : false;
                            $warehousies[$key]['isSkip'] = ($status->status == 'skip') ? true : false;
                        }
                        $warehousies[$key]['customer'] = customer_warehouse::where('id', $warehousies[$key]['parent_id'])->orderBy('updated_at', 'desc')->first();
                        $warehousies[$key]['tuongtac'] = option_warehouse::where('parent_id', $warehousies[$key]['id'])->where('type', 1)->count();
                        $warehousies[$key]['nhucau'] = warehouse::where('parent_id', $warehousies[$key]['parent_id'])->count();
                        $warehousies[$key]['ghichu'] = option_warehouse::where('parent_id', $warehousies[$key]['id'])->where('UserID', Auth::user()->id)->where('type', 2)->count();
                    } else {
                        unset($warehousies[$key]);
                    }
                }
            }
        }
        $countNew = warehouse::select('warehouse.*')
        ->join('customer_warehouse', 'warehouse.parent_id', '=', 'customer_warehouse.id')
        ->where('customer_warehouse.status', 1)
        ->where('AreaUserID', roleusers::where('UserID', Auth::user()->id)->first()->AreaUserID)
        ->orWhere('AreaUserID', 3)
        ->where('customer_warehouse.status', 1)
        ->get();

        $groupedCountNew = $countNew->groupBy('parent_id')
            ->map(function($group) {
            return $group->sortByDesc('updated_at')->first();
            });

        $countNew = $groupedCountNew;

        foreach ($countNew as $key => $value) {
            if(status_warehouse::where('parent_id', $value['parent_id'])->where('UserID', Auth::user()->id)->count() != 0) {
                unset($countNew[$key]);
            }
        }
        $countNew = count($countNew);
        $countFollow = status_warehouse::where('UserID', Auth::user()->id)->where('status', 1)->count();
        $countSkip = status_warehouse::where('UserID', Auth::user()->id)->where('status', 2)->count();
        $countAll = warehouse::select('warehouse.*')
            ->join('customer_warehouse', 'warehouse.parent_id', '=', 'customer_warehouse.id')
            ->where('customer_warehouse.status', 1)
            ->where('AreaUserID', roleusers::where('UserID', Auth::user()->id)->first()->AreaUserID)
            ->orWhere('AreaUserID', 3)
            ->where('customer_warehouse.status', 1)
            ->get();

        $groupedCountAll = $countAll->groupBy('parent_id')
            ->map(function($group) {
            return $group->sortByDesc('updated_at')->first();
        });

        $countAll = count($groupedCountAll);
        $countPrivate = customer_warehouse::where('UserID', Auth::user()->id)
            ->where('customer_warehouse.status', 0)
            ->count();

        $categories = [];
        $categories['kd'] = subcategoryproduct::where('CategoryID', 7009)->get();
        $categories['nha'] = subcategoryproduct::where('CategoryID', 7007)->get();
        $categories['canho'] = subcategoryproduct::where('CategoryID', 7006)->get();
        $categories['dat'] = subcategoryproduct::where('CategoryID', 7008)->get();

        if($request->has('nguon')) {
            if($request->nguon == '5') {
                $fillRoleCustomer = $warehousies->filter(function($value, $key) {
                    if($value['customer']['role'] == 'Chuyên viên') {
                        return $value;
                    }
                });
            } else if($request->nguon == '6') {
                $fillRoleCustomer = $warehousies->filter(function($value, $key) {
                    if($value['customer']['role'] == 'Khách hàng') {
                        return $value;
                    }
                });
            } else if($request->nguon == '7') {
                $fillRoleCustomer = $warehousies->filter(function($value, $key) {
                    if($value['customer']['role'] == 'Môi giới') {
                        return $value;
                    }
                });
            } else {
                $fillRoleCustomer = $warehousies;
            }

            $warehousies = $fillRoleCustomer;
        }

        $perPage = 30;
        $currentPage = $request->get('page', 1);
        $warehousies = new \Illuminate\Pagination\LengthAwarePaginator(
            $warehousies->forPage($currentPage, $perPage),
            $warehousies->count(),
            $perPage,
            $currentPage,
            ['path' => $request->url(), 'query' => $request->query()]
        );
        $countItem = $warehousies->total();

        return view('Backend.Production.khokhach', compact('role', 'controller', 'warehousies', 'countItem', 'categories', 'countNew', 'countFollow', 'countSkip', 'countAll', 'countPrivate'));
    }

    public function addWarehouse(request $request)
    {
        $request['price_from'] = intval(str_replace(',', '', $request->price_from));
        $request['price_to'] = intval(str_replace(',', '', $request->price_to));
        if($request->type == 2) {
            $request['type'] = 2;
        } else if($request->type == 3) {
            $request['type'] = 4;
        } else if($request->type == 4) {
            $request['type'] = 5;
        } else {
            $request['type'] = 1;
        }
        $customer = customer_warehouse::where('phone', $request->phone)->first();
        if($customer == null) {
            $customer = new customer_warehouse();
            $customer->fullName = $request->name;
            $customer->phone = $request->phone;
            $customer->role = $request->type;
            $customer->UserID = Auth::user()->id;
            $customer->status = ($request->has('from') && $request->from == 'nguon-chi-nhanh') ? 1 : 0;
            $customer->save();
        } else {
            if($customer->status == 0) {
                $customer = new customer_warehouse();
                $customer->fullName = $request->name;
                $customer->phone = $request->phone;
                $customer->role = $request->type;
                $customer->UserID = Auth::user()->id;
                $customer->status = ($request->has('from') && $request->from == 'nguon-chi-nhanh') ? 1 : 0;
                $customer->save();
            } else {
                if($request->from == 'nguon-chi-nhanh') {
                    $customer->status = 1;
                    $customer->save();
                } else {
                    $customer = new customer_warehouse();
                    $customer->fullName = $request->name;
                    $customer->phone = $request->phone;
                    $customer->role = $request->type;
                    $customer->UserID = Auth::user()->id;
                    $customer->status = 0;
                    $customer->save();
                }
            }
        }

        $contentLink = ($request->nhucau == 'can-thue') ? 'Cần thuê' : 'Cần mua';
        $link = ($request->nhucau == 'can-thue') ? 'cho-thue-bat-dong-san' : 'mua-ban-bat-dong-san';
        $contentLink .= ' ' . subcategoryproduct::where('id', $request->bds_type)->first()->name;
        $link = $link . '-danh-muc-' . subcategoryproduct::where('id', $request->bds_type)->first()->slug . '-end';
        if($request->price_from != 0 && $request->price_to != 0) {
            $link = $link . '-khoang-gia-' . $request->price_from . '-' . $request->price_to . '-end';
            $contentLink .= ' giá từ ' . controller::convertPriceText($request->price_from) . ' đến ' . controller::convertPriceText($request->price_to);
        } else if($request->price_from != 0) {
            $link = $link . '-khoang-gia-' . $request->price_from . '-0-end';
            $contentLink .= ' giá từ ' . controller::convertPriceText($request->price_from) . ' trở lên';
        } else if($request->price_to != 0) {
            $link = $link . '-khoang-gia-0-' . $request->price_to . '-end';
            $contentLink .= ' giá dưới ' . controller::convertPriceText($request->price_to);
        }
        
        if($request->province_id != 0 && $request->district_id != 0 && $request->ward_id != 0) {
            $link .= '-tai' . '-ward' . $request->ward_id . '-district' . $request->district_id . '-city1-end';
            $contentLink .= ' tại ' . controller::convertAddressFromIDToName($request->ward_id, '\App\Models\wardapi', 'WardID') . ', ' . controller::convertAddressFromIDToName($request->district_id, '\App\Models\districtapi', 'DistrictID') . ', ' . controller::convertAddressFromIDToName($request->province_id, '\App\Models\cityapi', 'CityID');
        } else if($request->province_id != 0 && $request->district_id != 0) {
            $link .= '-tai' . '-district' . $request->district_id . '-city1-end';
            $contentLink .= ' tại ' . controller::convertAddressFromIDToName($request->district_id, '\App\Models\districtapi', 'DistrictID') . ', ' . controller::convertAddressFromIDToName($request->province_id, '\App\Models\cityapi', 'CityID');
        } else if($request->province_id != 0) {
            $link .= '-tai' . 'city' . $request->province_id . '-end';
            $contentLink .= ' tại ' . controller::convertAddressFromIDToName($request->province_id, '\App\Models\cityapi', 'CityID');
        }

        $warehouse = warehouse::create([
            'content' => ($request->content) ? $request->content : '',
            'type' => ($request->nhucau == 'can-thue') ? 1 : 2,
            'contentLink' => $contentLink,
            'link' => $link,
            'parent_id' => $customer->id,
            'AreaUserID' => roleusers::where('UserID', Auth::user()->id)->first()->AreaUserID
        ])->id;

        option_warehouse::create([
            'content' => '<a class="text-primary fw-bold" href="'. route('tin-da-dang.id', Auth::user()->id) .'">'. Auth::user()->fullName .'</a> đã giới thiệu khách',
            'type' => 1,
            'parent_id' => $warehouse,
            'UserID' => Auth::user()->id
        ]);

        value_warehouse::create([
            'WardID' => ($request->ward_id != 0) ? $request->ward_id : 1,
            'DistrictID' => ($request->district_id != 0) ? $request->district_id : 1,
            'CityID' => 1,
            'price_min' => $request->price_from,
            'price_max' => $request->price_to,
            'CategoryID' => $request->bds_type,
            'parent_id' => $warehouse
        ]);

        return redirect()->route('kho-khach')->with('success', 'Đã thêm khách hàng thành công');
    }

    public function addOption(request $request)
    {
        if($request->option == 'call') {
            $option = (Auth::check()) ? '<a class="text-primary fw-bold" href="'. route('tin-da-dang.id', Auth::user()->id) .'">'. Auth::user()->fullName .'</a> đã gọi' : 'Người dùng ẩn danh đã gọi';
        } else if($request->option == 'zalo') {
            $option = (Auth::check()) ? '<a class="text-primary fw-bold" href="'. route('tin-da-dang.id', Auth::user()->id) .'">'. Auth::user()->fullName .'</a> đã nhắn tin Zalo' : 'Người dùng ẩn danh đã nhắn tin Zalo';
        } else if($request->has('status')) {
            if($request->option == 'unfollow' || $request->option == 'unskip') {
                status_warehouse::where('parent_id', warehouse::where('id', $request['id'])->first()->parent_id)->delete();
                return;
            }
            if(status_warehouse::where('parent_id', warehouse::where('id', $request['id'])->first()->parent_id)->where('UserID', Auth::user()->id)->count() != 0) {
                status_warehouse::where('parent_id', warehouse::where('id', $request['id'])->first()->parent_id)->where('UserID', Auth::user()->id)->update([
                    'status' => $request->status
                ]);
                return;
            }
            status_warehouse::create([
                'status' => $request->status,
                'UserID' => Auth::user()->id,
                'parent_id' => warehouse::where('id', $request->id)->first()->parent_id
            ]);
            return;
        }
        option_warehouse::create([
            'content' => $option,
            'type' => $request->type,
            'parent_id' => $request->id,
            'UserID' => (Auth::check()) ? Auth::user()->id : 0
        ]);
    }

    public function findNhuCau(request $request)
    {
        $categories = [];
        $categories['kd'] = subcategoryproduct::where('CategoryID', 7009)->get();
        $categories['nha'] = subcategoryproduct::where('CategoryID', 7007)->get();
        $categories['canho'] = subcategoryproduct::where('CategoryID', 7006)->get();
        $categories['dat'] = subcategoryproduct::where('CategoryID', 7008)->get();
        $role = Controller::getRole();
        $controller = new Controller();

        $id = explode(',', $request->id);
        
        $warehousies = warehouse::select('warehouse.*')
        ->join('customer_warehouse', 'warehouse.parent_id', '=', 'customer_warehouse.id')
        ->where('customer_warehouse.status', 1)
        ->whereIn('warehouse.id', $id)
        ->orderBy('updated_at', 'desc')
        ->get();
    
        $warehousies = $warehousies->groupBy('parent_id')
            ->map(function($group) {
                return $group->sortByDesc('updated_at')->first();
            });
        
        foreach ($warehousies as $key => $value) {
            if(status_warehouse::where('parent_id', $value['id'])->where('UserID', Auth::user()->id)->count() != 0) {
                unset($warehousies[$key]);
            } else {
                if(warehouse::where('AreaUserID', '!=', roleusers::where('UserID', Auth::user()->id)->first()->AreaUserID)->where('id', $value->id)->count() != 0 && $value->AreaUserID != 3) {
                    $warehousies[$key] = warehouse::where('id', '!=', $value->id)->where('parent_id', $value->parent_id)->where('AreaUserID', roleusers::where('UserID', Auth::user()->id)->first()->AreaUserID)->orderBy('updated_at', 'desc')->first();
                    if($warehousies[$key] == null) {
                        unset($warehousies[$key]);
                    } else {
                        $warehousies[$key]['customer'] = customer_warehouse::where('id', $warehousies[$key]['parent_id'])->orderBy('updated_at', 'desc')->first();
                        $warehousies[$key]['tuongtac'] = option_warehouse::where('parent_id', $warehousies[$key]['id'])->where('type', 1)->count();
                        $warehousies[$key]['nhucau'] = warehouse::where('parent_id', $warehousies[$key]['parent_id'])->count();
                        $warehousies[$key]['ghichu'] = option_warehouse::where('parent_id', $warehousies[$key]['id'])->where('UserID', Auth::user()->id)->where('type', 2)->count();
                    }
                } else {
                    $warehousies[$key]['customer'] = customer_warehouse::where('id', $warehousies[$key]['parent_id'])->orderBy('updated_at', 'desc')->first();
                    $warehousies[$key]['tuongtac'] = option_warehouse::where('parent_id', $warehousies[$key]['id'])->where('type', 1)->count();
                    $warehousies[$key]['nhucau'] = warehouse::where('parent_id', $warehousies[$key]['parent_id'])->count();
                    $warehousies[$key]['ghichu'] = option_warehouse::where('parent_id', $warehousies[$key]['id'])->where('UserID', Auth::user()->id)->where('type', 2)->count();
                }
            }
        }
        $countNew = warehouse::select('warehouse.*')
        ->join('customer_warehouse', 'warehouse.parent_id', '=', 'customer_warehouse.id')
        ->where('customer_warehouse.status', 1)
        ->where('AreaUserID', roleusers::where('UserID', Auth::user()->id)->first()->AreaUserID)
        ->orWhere('AreaUserID', 3)
        ->where('customer_warehouse.status', 1)
        ->get();

        $groupedCountNew = $countNew->groupBy('parent_id')
            ->map(function($group) {
            return $group->sortByDesc('updated_at')->first();
            });

        $countNew = $groupedCountNew;

        foreach ($countNew as $key => $value) {
            if(status_warehouse::where('parent_id', $value['parent_id'])->where('UserID', Auth::user()->id)->count() != 0) {
                unset($countNew[$key]);
            }
        }
        $countNew = count($countNew);
        $countFollow = status_warehouse::where('UserID', Auth::user()->id)->where('status', 1)->count();
        $countSkip = status_warehouse::where('UserID', Auth::user()->id)->where('status', 2)->count();
        $countAll = warehouse::select('warehouse.*')
            ->join('customer_warehouse', 'warehouse.parent_id', '=', 'customer_warehouse.id')
            ->where('customer_warehouse.status', 1)
            ->where('AreaUserID', roleusers::where('UserID', Auth::user()->id)->first()->AreaUserID)
            ->orWhere('AreaUserID', 3)
            ->where('customer_warehouse.status', 1)
            ->get();

        $groupedCountAll = $countAll->groupBy('parent_id')
            ->map(function($group) {
            return $group->sortByDesc('updated_at')->first();
        });

        $countAll = count($groupedCountAll);
        $countPrivate = customer_warehouse::where('UserID', Auth::user()->id)
            ->where('customer_warehouse.status', 0)
            ->count();

        $categories = [];
        $categories['kd'] = subcategoryproduct::where('CategoryID', 7009)->get();
        $categories['nha'] = subcategoryproduct::where('CategoryID', 7007)->get();
        $categories['canho'] = subcategoryproduct::where('CategoryID', 7006)->get();
        $categories['dat'] = subcategoryproduct::where('CategoryID', 7008)->get();

        $perPage = 30;
        $currentPage = $request->get('page', 1);
        $warehousies = new \Illuminate\Pagination\LengthAwarePaginator(
            $warehousies->forPage($currentPage, $perPage),
            $warehousies->count(),
            $perPage,
            $currentPage,
            ['path' => $request->url(), 'query' => $request->query()]
        );
        
        $countItem = $warehousies->total();

        return view('Backend.Production.khokhach', compact('role', 'controller', 'warehousies', 'countItem', 'categories', 'countNew', 'countFollow', 'countSkip', 'countAll', 'countPrivate'));
    }

    public function getDemand(request $request)
    {
        $count = warehouse::where('parent_id', $request->id)->where('AreaUserID', roleusers::where('UserID', Auth::user()->id)->first()->AreaUserID)->orWhere('AreaUserID', 3)->where('parent_id', $request->id)->count();
        $items = warehouse::where('parent_id', $request->id)->where('AreaUserID', roleusers::where('UserID', Auth::user()->id)->first()->AreaUserID)->orWhere('AreaUserID', 3)->where('parent_id', $request->id)->orderBy('updated_at', 'desc')->get();
        $output = '
            <div class="l-cmt" id="customer-modals-content">
                <h5 class="l-cmt__tle">Khách có <b>'. $count .'</b> nhu cầu</h5>
                <div class="l-cmt__bdy">';

        foreach ($items as $item) {
            $customer = customer_warehouse::where('id', $item->parent_id)->first();
            $output .= '
                <div class="l-cmt__lst">
                    <div class="c-cmt">
                        <div class="c-cmt__wrp">
                            <div class="c-cmt__inf">
                                <span><b>'. $customer['fullName'] .'</b></span>
                                <span>'. controller::convertTimeVietNam($item['updated_at']) .'</span>
                            </div>
                            <div class="c-cmt__cnt">'. $item['content'] .'</div>
                            <div class="c-cmt__lnk">
                                <a href="';
                                    if(stripos($item['content'], 'Đã quan tâm') !== false) {
                                        $output .= route('post-detail', $item['link']);
                                    } else {
                                        $output .= route('cho-thue-bat-dong-san-filter', $item['link']);
                                    }
                                $output .='" class="color-green-500">'. $item['contentLink'] .'</a>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="c-spinner"></div> -->
                </div>
            ';
        }

        $output .= '
                </div>
            </div>
        ';

        echo $output;
    }

    public function getInteract(request $request)
    {
        $count = option_warehouse::where('parent_id', $request->id)->where('type', 1)->count();
        $items = option_warehouse::where('parent_id', $request->id)->where('type', 1)->orderBy('updated_at', 'desc')->get();

        $output = '
            <div class="l-cmt" id="customer-modals-content-interact">
                <h5 class="l-cmt__tle">Khách có <b>'. $count .'</b> tương tác</h5>
                <div class="l-cmt__bdy">';

        foreach ($items as $item) {
            if($item['UserID'] != 0) {
                $user = \App\Models\User::where('id', $item['UserID'])->first();
            } else {
                $user = [
                    'fullName' => 'Gulandmiennam'
                ];
            }
            $output .= '
                <div class="l-cmt__lst">
                    <div class="c-cmt">
                        <div class="c-cmt__wrp">
                            <div class="c-cmt__inf">
                                <span><b>'. $user['fullName'] .'</b></span>
                                <span>'. controller::convertTimeVietNam($item['updated_at']) .'</span>
                            </div>
                            <div class="c-cmt__cnt">'. $item['content'] .'</div>
                        </div>
                    </div>
                    <!-- <div class="c-spinner"></div> -->
                </div>
            ';
        }

        $output .= '
                </div>
            </div>
        ';

        echo $output;
    }

    public function getNote(request $request)
    {
        $count = option_warehouse::where('parent_id', $request->id)->where('type', 2)->where('UserID', Auth::user()->id)->count();
        $items = option_warehouse::where('parent_id', $request->id)->where('type', 2)->where('UserID', Auth::user()->id)->orderBy('updated_at', 'desc')->get();

        $output = '
            <div class="l-cmt" id="customer-modals-content-note">
                <h5 class="l-cmt__tle">Khách có <b>'. $count .'</b> ghi chú</h5>
                <div class="l-cmt__bdy">
                    <div class="l-cmt__add">
                        <form id="form-create-note">
                            <div class="form-group">
                                <textarea rows="3" class="form-control sm-size" name="note" placeholder="Thêm ghi chú cho khách này"></textarea>
                            </div>
                            <div class="form-group-sbm">
                                <button class="btn btn--guland" id="btn-save-note">Đăng ghi chú </button>
                            </div>
                            <input type="hidden" name="id" value="'. $request->id .'">
                        </form>
                    </div>';

        foreach ($items as $item) {
            if($item['UserID'] != 0) {
                $user = \App\Models\User::where('id', $item['UserID'])->first();
            } else {
                $user = [
                    'fullName' => 'Gulandmiennam'
                ];
            }
            $output .= '
                <div class="l-cmt__lst">
                    <div class="c-cmt">
                        <div class="c-cmt__wrp">
                            <div class="c-cmt__inf">
                                <span><b>'. $user['fullName'] .'</b></span>
                                <span>'. controller::convertTimeVietNam($item['updated_at']) .'</span>
                            </div>
                            <div class="c-cmt__cnt">'. $item['content'] .'</div>
                        </div>
                    </div>
                    <!-- <div class="c-spinner"></div> -->
                </div>
            ';
        }

        $output .= '
                </div>
            </div>
        ';

        echo $output;
    }

    public function addNote(request $request)
    {
        $res = [
            'status' => false,
            'message' => 'Đã có lỗi xảy ra, vui lòng thử lại sau',
            'data' => ''
        ];
        if(warehouse::where('id', $request->id)->count() == 0) {
            $res['message'] = 'Không tìm thấy khách hàng';
        } else {
            option_warehouse::create([
                'content' => $request->note,
                'type' => 2,
                'parent_id' => $request->id,
                'UserID' => Auth::user()->id
            ]);
            $res = [
                'status' => true,
                'message' => 'Đã thêm ghi chú thành công'
            ];
        }

        return response()->json($res);
    }

    public function searchWarehouse(request $request)
    {
        $query = $request->q;
        $customer_warehouse = customer_warehouse::where('phone', $request->q)->first();

        if($customer_warehouse == null) {
            return redirect()->route('kho-khach')->with('error', 'Không tìm thấy khách hàng');
        }
        
        $warehousies = warehouse::where('parent_id', $customer_warehouse->id)->orderBy('updated_at', 'desc')->get();

        if($warehousies->count() == 0) {
            return redirect()->route('kho-khach')->with('error', 'Khách hàng chưa có nhu cầu');
        }

        foreach($warehousies as $key => $item) {
            if($item->AreaUserID != 3 && $item->AreaUserID != roleusers::where('UserID', Auth::user()->id)->first()->AreaUserID && Auth::check() && controller::checkRole(controller::getRole()->MainRole) < 6) {
                unset($warehousies[$item]);
                continue;
            }
            $warehousies[$key]['isFollow'] = status_warehouse::where('parent_id', $item->parent_id)->where('UserID', Auth::user()->id)->where('status', 1)->count();
            $warehousies[$key]['isSkip'] = status_warehouse::where('parent_id', $item->parent_id)->where('UserID', Auth::user()->id)->where('status', 2)->count();
            $warehousies[$key]['customer'] = $customer_warehouse;
            $warehousies[$key]['tuongtac'] = option_warehouse::where('parent_id', $item->id)->where('type', 1)->count();
            $warehousies[$key]['nhucau'] = warehouse::where('parent_id', $item->parent_id)->count();
            $warehousies[$key]['ghichu'] = option_warehouse::where('parent_id', $item->id)->where('UserID', Auth::user()->id)->where('type', 2)->count();
        }

        if($warehousies->count() == 0) {
            return redirect()->route('kho-khach')->with('error', 'Bạn không cùng chi nhánh với khách hàng');
        }

        $perPage = 30;
        $currentPage = $request->get('page', 1);
        $warehousies = new \Illuminate\Pagination\LengthAwarePaginator(
            $warehousies->forPage($currentPage, $perPage),
            $warehousies->count(),
            $perPage,
            $currentPage,
            ['path' => $request->url(), 'query' => $request->query()]
        );

        $countItem = $warehousies->total();

        $categories = [];
        $categories['kd'] = subcategoryproduct::where('CategoryID', 7009)->get();
        $categories['nha'] = subcategoryproduct::where('CategoryID', 7007)->get();
        $categories['canho'] = subcategoryproduct::where('CategoryID', 7006)->get();
        $categories['dat'] = subcategoryproduct::where('CategoryID', 7008)->get();

        $role = Controller::getRole();
        $controller = new Controller();

        $countNew = warehouse::select('warehouse.*')
        ->join('customer_warehouse', 'warehouse.parent_id', '=', 'customer_warehouse.id')
        ->where('customer_warehouse.status', 1)
        ->where('AreaUserID', roleusers::where('UserID', Auth::user()->id)->first()->AreaUserID)
        ->orWhere('AreaUserID', 3)
        ->where('customer_warehouse.status', 1)
        ->get();

        $groupedCountNew = $countNew->groupBy('parent_id')
            ->map(function($group) {
            return $group->sortByDesc('updated_at')->first();
            });

        $countNew = $groupedCountNew;

        foreach ($countNew as $key => $value) {
            if(status_warehouse::where('parent_id', $value['parent_id'])->where('UserID', Auth::user()->id)->count() != 0) {
                unset($countNew[$key]);
            }
        }
        $countNew = count($countNew);
        $countFollow = status_warehouse::where('UserID', Auth::user()->id)->where('status', 1)->count();
        $countSkip = status_warehouse::where('UserID', Auth::user()->id)->where('status', 2)->count();
        $countAll = warehouse::select('warehouse.*')
            ->join('customer_warehouse', 'warehouse.parent_id', '=', 'customer_warehouse.id')
            ->where('customer_warehouse.status', 1)
            ->where('AreaUserID', roleusers::where('UserID', Auth::user()->id)->first()->AreaUserID)
            ->orWhere('AreaUserID', 3)
            ->where('customer_warehouse.status', 1)
            ->get();
        
        $groupedCountAll = $countAll->groupBy('parent_id')
            ->map(function($group) {
            return $group->sortByDesc('updated_at')->first();
        });

        $countAll = count($groupedCountAll);
        $countPrivate = customer_warehouse::where('UserID', Auth::user()->id)
            ->where('customer_warehouse.status', 0)
            ->count();

        return view('Backend.Production.khokhach', compact('role', 'controller', 'warehousies', 'countItem', 'categories', 'countNew', 'countFollow', 'countSkip', 'countAll', 'countPrivate', 'query'));
    }

    protected function delPrivateWarehouse($id)
    {
        $customer = warehouse::select('customer_warehouse.*')
            ->join('customer_warehouse', 'warehouse.parent_id', '=', 'customer_warehouse.id')
            ->where('warehouse.id', $id)
            ->first();

        if($customer->UserID != Auth::user()->id) {
            return redirect()->route('kho-khach')->with('error', 'Không thể xóa khách hàng của người khác');
        }

        customer_warehouse::where('id', $customer->id)->delete();

        return redirect()->back()->with('success', 'Đã xóa khách hàng thành công');
    }
}
