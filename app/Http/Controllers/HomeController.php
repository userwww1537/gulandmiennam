<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\customer_warehouse;
use App\Models\imageproduct;

class HomeController extends Controller
{
    public function index()
    {
        $role = Controller::getRole();
        $controller = new Controller();
        return view('index', compact('role', 'controller'));
    }

    public function testFetchImage(request $request)
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
}
