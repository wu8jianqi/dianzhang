<?php
/**
 * Created by PhpStorm.
 * User: wu
 * Date: 2020/3/18
 * Time: 11:17
 */

namespace App\Http\Controllers\Backend;


use App\Http\Controllers\Controller;
use App\Models\Dendrogram;
use App\Models\GoodsArea;
use App\Models\ShopkeeperAddress;
use App\Models\ShopkeeperRole;
use App\Models\ShopOwnerGoods;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;

class myStory extends Controller
{
    /**
     * 我的商品
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\JsonResponse|\Illuminate\View\View
     */
    public function myGoodsList(Request $request)
    {
        $user_id = Auth::id();
        $find_role = ShopkeeperRole::where('user_id', $user_id)->pluck('role_id')->toArray();
        // dd($find_role);
        $shop = ShopOwnerGoods::query();
        if (in_array(3, $find_role)) {//店长
            $shop->where('shopowner_id', $user_id);
        } elseif (in_array(4, $find_role)) {//店员
            $shop->where('shopowner_id', Auth::user()->pid);
        } elseif (in_array(1, $find_role)) {

        } else {
            return $this->JsonResponse(401, '其他角色不能访问');
        }
        $result = $shop->with(['goods' => function ($query) {
            $query->select('goods_name', 'goods_id', 'goods_pic', 'is_discount', 'present_price');

        }])->paginate(2);
        $data = $result->toArray();
        $page = $result->render();
        //echo $page;die;
        //dd($data);
        return view('myGoods/myGoodsList', ['data' => $data['data'], 'page' => $page]);
    }

    /**
     * 公司货物
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function companyGoods()
    {
        $user_id = Auth::id();
        //查询店长的学校id
        $schoole_id = ShopkeeperAddress::where('shopkeeper_id', $user_id)->value('school_id');
        //查询学校父级id
        $p_id = Dendrogram::where('id', $schoole_id)->value('p_id');
        //查询学校对应的区域id
        $qu_id = Dendrogram::where('id', $p_id)->value('id');
        // echo $qu_id;die;
        //查询区域库存商品
        $result = GoodsArea::where('area_id', $qu_id)->with(['goods' => function ($query) {
            $query->where('is_delete', 0)->select('goods_id', 'goods_name', 'goods_pic', 'is_discount', 'present_price');
        }])->paginate(2);
        $data = $result->toArray();
        $page = $result->render();
        //dd($data);

        $key = 'keeperCar' . Auth::id();
        $car_data = Redis::get($key);
        $redis_data = [];
        $total_count = 0;
        $total_price = 0;
        if ($car_data) {
            $car_data_array = json_decode($car_data, true);
            $redis_data = $car_data_array;
            foreach ($car_data_array as $value) {
                $total_count = $total_count + $value['count'];
                $total_price = $total_price + $value['price'] * $value['count'];
            }

        }
        //  dd($car_data_array);
        $total = [
            'total_count' => $total_count,
            'total_price' => $total_price,
        ];


        return view('myGoods/companyGoodsList', ['data' => $data['data'], 'page' => $page, 'total' => $total, 'redis_data' => $redis_data]);

    }

    public function applyGoods(Request $request)
    {
        $count = $request->input('count');

    }

    /**
     * 添加到购物车
     * @param Request $request
     */
    public function addCarGoods(Request $request)
    {
        //半个小时
        $setex_time = 60 * 30;
        $key = 'keeperCar' . Auth::id();
        // echo $key;die;
        $car_data = Redis::get($key);
        // echo $car_data;die;
        $goods_id = (int)$request->input('goods_id');
        $goods_pic = $request->input('goods_pic');
        $goods_name = $request->input('goods_name');
        $is_discount = (int)$request->input('is_discount');
        $price = (int)$request->input('present_price');
        $stock = (int)$request->input('stock');
        $count = (int)$request->input('count');
        if ($car_data) {
            $car_data_array = json_decode($car_data, true);
            if (isset($car_data_array[$goods_id])) {
                if ($count > 0) {
                    $car_data_array[$goods_id]['count'] = $count;
                    Redis::SETEX($key, $setex_time, json_encode($car_data_array));
                } else {
                    unset($car_data_array[$goods_id]);
                    Redis::SETEX($key, $setex_time, json_encode($car_data_array));
                }
            } else {
                $data = [];
                if ($count) {
                    $data[$goods_id] = [
                        'goods_id' => $goods_id,
                        'price' => $price,
                        'count' => $count,
                        'stock' => $stock,
                        'goods_pic' => $goods_pic,
                        'goods_name' => $goods_name,
                        'is_discount' => $is_discount
                    ];
                    $json_data = json_encode($data);
                    Redis::SETEX($key, $setex_time, $json_data);
                }
            }
        } else {
            $data = [];
            if ($count > 0) {
                $data[$goods_id] = [
                    'goods_id' => $goods_id,
                    'price' => $price,
                    'count' => $count,
                    'stock' => $stock,
                    'goods_pic' => $goods_pic,
                    'goods_name' => $goods_name,
                    'is_discount' => $is_discount
                ];
                $json_data = json_encode($data);
                Redis::SETEX($key, $setex_time, $json_data);
            }
        }
        $car_data1 = Redis::get($key);
        $total_count = 0;
        $total_price = 0;
        if ($car_data1) {
            $car_data_array1 = json_decode($car_data1, true);

            foreach ($car_data_array1 as $value1) {
                $total_count = $total_count + $value1['count'];
                $total_price = $total_price + $value1['price'] * $value1['count'];
            }

        }
        //  dd($car_data_array);
        $total = [
            'total_count' => $total_count,
            'total_price' => $total_price,
        ];
//        $car_data = Redis::get($key);
//        dd($car_data);
        return $this->layuiResponse(200, 'cg', $total, 1);

    }

    public function redisDataList(Request $request)
    {
        $key = 'keeperCar' . Auth::id();
        $car_data = Redis::get($key);
        $car_data_array = json_decode($car_data, true);
        if (empty($car_data_array)) {
            $car_data_array = [];
        }
        if ($request->ajax()) {
            return $this->JsonResponse(200, view('myGoods/redisDataList', ['data' => $car_data_array])->render());
        }
        return view('myGoods/redisDataList', ['data' => $car_data_array]);

    }

    public function testRedis()
    {
        Redis::set('name', 'guwenjie');
        $values = Redis::get('name1');
        dd($values);
        //输出："guwenjie"
        //加一个小例子比如网站首页某个人员或者某条新闻日访问量特别高，可以存储进redis，减轻内存压力
        $userinfo = Member::find(1200);
        Redis::set('user_key', $userinfo);
        if (Redis::exists('user_key')) {
            $values = Redis::get('user_key');
        } else {
            $values = Member::find(1200);//此处为了测试你可以将id=1200改为另一个id
        }
        dump($values);
    }
}