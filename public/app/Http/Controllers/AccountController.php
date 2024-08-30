<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\users;
use App\Models\roleusers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\areauser;
use App\Models\recordusers;

class AccountController extends Controller
{
    public function signin(Request $request)
    {
        $param = (isset($request->phone)) ? $request->phone : '';
        $controller = new Controller();
        return view('Backend.Account.signin', compact('param', 'controller'));
    }

    public function processSignin(request $request)
    {
        $param = '';
        $validated = Validator::make($request->all(), [
            'phone' => 'required|numeric|digits_between:10,11',
            'password' => 'required',
        ], [
            'phone.required' => 'Vui lòng nhập số điện thoại',
            'phone.numeric' => 'Số điện thoại không hợp lệ',
            'phone.digits_between' => 'Số điện thoại không hợp lệ',
            'password.required' => 'Vui lòng nhập mật khẩu',
        
        ]);

        if($validated->fails()) {
            if(!$validated->errors()->has('phone')) {
                $phoneInvalid = users::where('phone', $request->phone)->first();
                if($phoneInvalid) {
                    $param = 'phone=' . $request['phone'] . '&';
                } else {
                    $validated->errors()->add('phone', 'Số điện thoại không tồn tại');
                }
            }
            return redirect('signin?' . $param)->withErrors($validated->errors());
        }

        if(Auth::attempt($request->only('phone', 'password'))) {
            $title = Auth::user()->fullName . ' đã đăng nhập thành công từ IP: ' . $request->ip();
            Controller::addRecord($title, Auth::user()->id);
            users::where('id', Auth::user()->id)->update(['ipAddress' => $request->ip(), 'updated_at' => date('Y-m-d H:i:s')]);
            if(Auth::user()->status == 'Lock') {
                Auth::logout();
                return redirect('signin')->with('error', 'Tài khoản của bạn đã bị khóa đăng nhập');
            } else {
                return redirect()->route('home')->with('success', 'Đăng nhập thành công');
            }
        }
        if(users::where('phone', $request->phone)->first()) {
            return redirect('signin?phone=' . $request->phone)->with('error', 'Mật khẩu không chính xác');
        } else {
            return redirect('signin')->with('error', 'Số điện thoại không tồn tại');
        }
    }

    public function processSignup(request $request)
    {
        $param = '';
        $validated = Validator::make($request->all(), [
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'phone' => 'required|numeric|digits_between:10,11|unique:users',
            'fullName' => 'required|string|max:255',
            'province_id' => 'nullable|numeric',
            'district_id' => 'nullable|numeric',
            'ward_id' => 'nullable|numeric',
            'address' => 'nullable|string|max:255',
            'affilate_phone' => 'nullable|numeric|digits_between:10,11',
            'password' => 'required|min:6',
            'password_confirmation' => 'required|same:password',
            'register_type' => 'required|numeric'
        ], [
            'image.image' => 'Ảnh đại diện không hợp lệ',
            'image.mimes' => 'Ảnh đại diện không hợp lệ',
            'image.max' => 'Ảnh đại diện không hợp lệ',
            'phone.required' => 'Vui lòng nhập số điện thoại',
            'phone.numeric' => 'Số điện thoại không hợp lệ',
            'phone.digits_between' => 'Số điện thoại không hợp lệ',
            'phone.unique' => 'Số điện thoại đã tồn tại',
            'fullName.required' => 'Vui lòng nhập họ tên',
            'fullName.string' => 'Họ tên không hợp lệ',
            'fullName.max' => 'Họ tên không hợp lệ',
            'province_id.numeric' => 'Tỉnh/thành phố không hợp lệ',
            'district_id.numeric' => 'Quận/huyện không hợp lệ',
            'ward_id.numeric' => 'Phường/xã không hợp lệ',
            'address.string' => 'Địa chỉ không hợp lệ',
            'address.max' => 'Địa chỉ không hợp lệ',
            'affilate_phone.numeric' => 'Số điện thoại không hợp lệ',
            'affilate_phone.digits_between' => 'Số điện thoại không hợp lệ',
            'password.required' => 'Vui lòng nhập mật khẩu',
            'password.min' => 'Mật khẩu phải chứa ít nhất 6 ký tự',
            'password_confirmation.required' => 'Vui lòng xác nhận mật khẩu',
            'password_confirmation.same' => 'Mật khẩu xác nhận không khớp'
        ]);

        if($validated->fails()) {
            if(!$validated->errors()->has('phone')) {
                $param = 'phone=' . $request['phone'] . '&';
            }
            if(!$validated->errors()->has('fullName')) {
                $param .= 'fullName=' . $request['fullName'] . '&';
            }
            if(!$validated->errors()->has('address')) {
                $param .= 'address=' . $request['address'] . '&';
            }
            if(!$validated->errors()->has('affilate_phone')) {
                if(users::where('phone', $request->affilate_phone)->first()) {
                    $param .= 'affilate_phone=' . $request['affilate_phone'] . '&';
                } else {
                    $validated->errors()->add('affilate_phone', 'Số điện thoại người giới thiệu không tồn tại');
                }
            }
            return redirect('signup?' . $param)->withErrors($validated->errors());
        }

        $idAffilate = users::where('phone', $request->affilate_phone)->first();
        if(isset($request->image)) {
            $imageName = time() . '-GulandMienNam.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('Assets/Images/Users'), $imageName);
        } else {
            $imageName = 'avt.png';
        }
        $request->merge(['password' => Hash::make($request->password)]);
        if($request->register_type == 1) {
            $request->merge(['register_type' => 'Chủ nhà ,đất']);
        } elseif($request->register_type == 2) {
            $request->merge(['register_type' => 'Môi giới']);
        } else {
            $request->merge(['register_type' => 'Khách hàng']);
        }

        users::create([
            'fullName' => $request->fullName,
            'avatar' => $imageName,
            'phone' => $request->phone,
            'password' => $request->password,
            'address' => ($request->address != null && isset($request->ward_id) && isset($request->district_id) && isset($request->province_id)) ? $request->address . ', ' . Controller::convertAddressFromIDToName($request->ward_id, '\App\Models\wardapi', 'WardID') . ', ' . Controller::convertAddressFromIDToName($request->district_id, '\App\Models\districtapi', 'DistrictID') . ', ' . Controller::convertAddressFromIDToName($request->province_id, '\App\Models\cityapi', 'CityID') : 'Không có địa chỉ',
            'affilateUser' => ($idAffilate) ? $idAffilate->id : 1,
            'ipAddress' => $request->ip(),
            'status' => 1
        ]);

        $idJustCreated = users::where('phone', $request->phone)->first();
        roleusers::create([
            'roleName' => $request->register_type,
            'MainRole' => 1,
            'UserID' => $idJustCreated->id,
            'AreaUserID' => 3,
            'assistantBoolean' => 2
        ]);
        $title = $request->fullName . ' đã đăng ký tài khoản thành công từ IP: ' . $request->ip();
        Controller::addRecord($title, $idJustCreated->id);
        return redirect('signin')->with('success', 'Đăng ký tài khoản thành công');
    }

    public function signup(request $request)
    {
        $params = $request->all();
        $controller = new Controller();
        return view('Backend.Account.signup', compact('params', 'controller'));
    }

    public function logout()
    {
        $title = Auth::user()->fullName . ' đã đăng xuất tài khoản từ IP: ' . request()->ip();
        Controller::addRecord($title, Auth::user()->id);
        Auth::logout();
        return redirect()->route('home')->with('success', 'Đăng xuất thành công');
    }

    public function logoutAll(request $request)
    {
        $res = [
            'status' => false,
            'message' => 'Đăng xuất tất cả thiết bị thất bại'
        ];
        $password = $request->password;
        
        if(Hash::check($password, Auth::user()->password)) {
            $title = Auth::user()->fullName . ' đã đăng xuất tất cả thiết bị từ IP: ' . request()->ip();
            Controller::addRecord($title, Auth::user()->id);
            Auth::logoutOtherDevices($password);
            $res = [
                'status' => true,
                'message' => 'Đăng xuất tất cả thiết bị thành công'
            ];
        } else {
            $res = [
                'status' => false,
                'message' => 'Mật khẩu không chính xác'
            ];
        }
        return response()->json($res);
    }

    public function addLocation(request $request)
    {
        // dd($request->all());
        if($request->city_id != null && $request->district_id != null && $request->street_id != null && $request->ward_id == null) {
            $request->session()->put('fill_city_id', $request->city_id);
            $request->session()->put('fill_district_id', $request->district_id);
            $request->session()->put('fill_street_id', $request->street_id);
            if($request->session()->has('fill_ward_id')) {
                $request->session()->forget('fill_ward_id');
            }
            return redirect()->back();
        } else if($request->city_id != null) {
            $request->session()->put('fill_city_id', $request->city_id);
            if($request->district_id != null) {
                $request->session()->put('fill_district_id', $request->district_id);
                if($request->session()->has('fill_ward_id')) {
                    $request->session()->forget('fill_ward_id');
                }
            } else {
                if($request->session()->has('fill_district_id')) {
                    $request->session()->forget('fill_district_id');
                }
            }
            if($request->ward_id != null) {
                $request->session()->put('fill_ward_id', $request->ward_id);
                if($request->session()->has('fill_street_id')) {
                    $request->session()->forget('fill_street_id');
                }
            } else {
                if($request->session()->has('fill_ward_id')) {
                    $request->session()->forget('fill_ward_id');
                }
            }
            if($request->street_id != null) {
                $request->session()->put('fill_street_id', $request->street_id);
            } else {
                if($request->session()->has('fill_street_id')) {
                    $request->session()->forget('fill_street_id');
                }
            
            }
            return redirect()->back();
        }

        return redirect()->back()->with('success', 'Lọc địa chỉ thất bại');
    }

    public function removeLocation(request $request)
    {
        if($request->session()->has('fill_city_id')) {
            $request->session()->forget('fill_city_id');
        }
        if($request->session()->has('fill_district_id')) {
            $request->session()->forget('fill_district_id');
        }
        if($request->session()->has('fill_ward_id')) {
            $request->session()->forget('fill_ward_id');
        }
        if($request->session()->has('fill_street_id')) {
            $request->session()->forget('fill_street_id');
        }
        return redirect()->back();
    }

    public function profile($phone)
    {
        $phone = intval($phone);
        if(!users::where('phone', $phone)->first()) {
            return redirect()->route('home')->with('error', 'Người dùng không tồn tại');
        }
        if(controller::checkRole(controller::getRole()->MainRole) < 5 
        && Auth::user()->phone != $phone 
        && users::select('UpperID')->join('roleusers', 'users.id', '=', 'roleusers.UserID')->where('users.phone', $phone)->first()->UpperID != Auth::user()->id) {
            return redirect()->route('home')->with('error', 'Bạn không có quyền xem thông tin người dùng khác');
        }
        $user = users::select('users.*', 'roleusers.roleName', 'roleusers.MainRole', 'roleusers.UpperID', 'roleusers.AreaUserID')
            ->join('roleusers', 'users.id', '=', 'roleusers.UserID')
            ->where('users.phone', $phone)
            ->first();
        $controller = new Controller();
        $role = Controller::getRole();
        $area = areauser::get();
        $affiliate = users::select('users.phone', 'users.fullName', 'roleusers.roleName')
            ->join('roleusers', 'users.id', '=', 'roleusers.UserID')
            ->where('users.id', $user->affilateUser)
            ->first();
        $upper = users::select('users.phone', 'users.fullName', 'roleusers.roleName')
            ->join('roleusers', 'users.id', '=', 'roleusers.UserID')
            ->where('users.id', $user->UpperID)
            ->first();

        $logs = recordusers::where('UserID', $user->id)->orderBy('created_at', 'desc')->paginate(10);
        return view('Backend.Account.profile', compact('user', 'controller', 'role', 'area', 'affiliate', 'upper', 'logs'));
    }

    public function updateProfile(request $request)
    {
        if(controller::checkRole(controller::getRole()->MainRole) < 6 
        && Auth::user()->phone != $request->phone 
        && users::select('UpperID')->join('roleusers', 'users.id', '=', 'roleusers.UserID')->where('users.phone', $request->phone)->first()->UpperID != Auth::user()->id) {
            return redirect()->route('home')->with('error', 'Bạn không có quyền cập nhật thông tin người dùng khác');
        }

        if(preg_match('/[a-zA-Z]/', $request->phone)) {
            return redirect()->back()->with('error', 'Số điện thoại không hợp lệ');
        }

        if($request->has('image')) {
            $avatarOld = users::where('id', $request->id)->first()->avatar;
            if($avatarOld != 'avt.png') {
                unlink(public_path('Assets/Images/Users/' . $avatarOld));
            }
            $imageName = time() . '-GulandMienNam.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('Assets/Images/Users'), $imageName);
            users::where('id', $request->id)->update(['avatar' => $imageName]);
        }

        if($request->fullName != users::where('id', $request->id)->first()->fullName) {
            users::where('id', $request->id)->update(['fullName' => $request->fullName]);
        }

        if($request->has('province_id') && $request->has('district_id') && $request->has('ward_id') && $request->has('address')) {
            users::where('id', $request->id)->update(['address' => $request->address . ', ' . Controller::convertAddressFromIDToName($request->ward_id, '\App\Models\wardapi', 'WardID') . ', ' . Controller::convertAddressFromIDToName($request->district_id, '\App\Models\districtapi', 'DistrictID') . ', ' . Controller::convertAddressFromIDToName($request->province_id, '\App\Models\cityapi', 'CityID')]);
        }

        if($request->has('area_id') && $request->area_id != roleusers::where('UserID', $request->id)->first()->AreaUserID) {
            roleusers::where('UserID', $request->id)->update(['AreaUserID' => $request->area_id]);
        }

        if(users::where('id', $request->id)->first()->phone) {
            if($request->phone != users::where('id', $request->id)->first()->phone) {
                if(users::where('phone', $request->phone)->first()) {
                    Controller::addRecord('Cập nhật thông tin cá nhân thất bại - User: ' . $request->phone, $request->id);
                    return redirect()->back()->with('error', 'Số điện thoại đã tồn tại');
                }
                users::where('id', $request->id)->update(['phone' => $request->phone]);
                Controller::addRecord('Cập nhật thông tin cá nhân thành công - User: ' . $request->phone, $request->id);
                return redirect('thong-tin-ca-nhan-cua-' . $request->phone)->with('success', 'Cập nhật thông tin thành công');
            }
        }
        Controller::addRecord('Cập nhật thông tin cá nhân thành công - User: ' . $request->phone, $request->id);
        return redirect()->back()->with('success', 'Cập nhật thông tin thành công');
    }

    public function updatePassword(request $request)
    {
        if(controller::checkRole(controller::getRole()->MainRole) < 6
        && Auth::user()->id != $request->id 
        && users::select('UpperID')->join('roleusers', 'users.id', '=', 'roleusers.UserID')->where('users.id', $request->id)->first()->UpperID != Auth::user()->id) {
            return redirect()->route('home')->with('error', 'Bạn không có quyền cập nhật mật khẩu người dùng khác');
        }

        if($request->new_password != $request->retype_password) {
            return redirect()->back()->with('error', 'Mật khẩu xác nhận không khớp');
        }

        if(Hash::check($request->password, users::where('id', $request->id)->first()->password)) {
            Controller::addRecord('Cập nhật mật khẩu thành công - User: ' . users::where('id', $request->id)->first()->phone, $request->id);
            Auth::logoutOtherDevices($request->password);
            $user = users::find($request->id);
            $user->password = Hash::make($request->new_password);
            $user->save();
            Auth::login($user);
            return redirect()->back()->with('success', 'Cập nhật mật khẩu thành công');
        }
        Controller::addRecord('Cập nhật mật khẩu thất bại - User: ' . users::where('id', $request->id)->first()->phone, $request->id);
        return redirect()->back()->with('error', 'Mật khẩu không chính xác');
    }

    public function checkPassword(request $request)
    {
        if(Hash::check($request->password, users::where('id', $request->id)->first()->password)) {
            return response()->json(['status' => true]);
        }
        return response()->json(['status' => false]);
    }
}
