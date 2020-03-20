<?php

namespace App\Http\Controllers\Backend;

use App\Http\Common\Common;
use App\Models\ConsumerAddress;
use App\Models\Order;
use App\Models\Shopkeeper;

use App\Models\ShopkeeperRole;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * 订单列表
     * @param Request $request
     * @param Common $common
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\JsonResponse|\Illuminate\View\View
     * @throws \Throwable
     */
    public function getOrder(Request $request, Common $common)
    {

        $order_type = $request->input('order_type', 1);
        //$order_type 1 未接单 ；2配送中 ；3今日订单；4；昨日订单 ；5 所有订单
        $order = Order::query();
        switch ($order_type) {
            case 1://未接单
                $order->where('shopowner_status', 2);
                break;
            case 2://配送中
                $order->where('shopowner_status', 3);
                break;
            case 3://今日订单
                $time = $common->get_time_search(2);
                $order->where('shopowner_status', 4)->whereBetween('pay_time', $time);
                break;
            case 4://昨日订单
                $time = $common->get_time_search(1);
                $order->where('shopowner_status', 4)->whereBetween('pay_time', $time);
                break;
            case 5://所有订单
               // $time = $common->get_time_search(1);
                $order->where('shopowner_status', 4);
                break;

        }
     // echo  ;
        //dd($common->get_time_search(1));
        $order->where('shopowner_status', '<', 5);
        $result = $order->with(['order_goods' => function ($query) {
            $query->select('price', 'number', 'goods_name', 'goods_pic', 'order_id');
        }, 'consumer' => function ($query) {
            $query->with(['address' => function ($query) {
            }])->select('consumer_id', 'nick_name', 'avatar');
        }])->paginate(1);
        $page = $result->appends(['order_type' => $order_type])->render();
        $category_count = [
            'no_received' => Order::where('shopowner_status', 2)->count(),
            'send' => Order::where('shopowner_status', 3)->count(),
            'this_day' => Order::where('shopowner_status', 4)->whereBetween('pay_time', $common->get_time_search(2))->count(),
            'today' => Order::where('shopowner_status', 4)->whereBetween('pay_time', $common->get_time_search(1))->count(),
            'all' => Order::where('shopowner_status', 4)->count(),
        ];
        if ($request->ajax()) {
            return $this->JsonResponse('200', view('order/ajxOrderList', ['data' => $result->toArray()['data'], 'page' => $page])->render());
        } else {
            return view('order/orderList', ['data' => $result->toArray()['data'], 'page' => $page, 'category_count' => $category_count, 'order_type' => $order_type]);
        }

    }

    /**
     * 订单状态改变
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function keepOwnerUpdateOrderStatus(Request $request)
    {
        $type = $request->input('type');
        $order_id = $request->input('order_id');
        switch ($type) {
            case 2://确定接单
                $result = Order::where('order_id', $order_id)->where('shopowner_status', 2)->update(['shopowner_status' => 3]);
                if ($result) {
                    return $this->JsonResponse(200, '操作成功');
                }
                return $this->JsonResponse(401, '操作失败');
                break;
            case 3://确定送达
                $result = Order::where('order_id', $order_id)->where('shopowner_status', 3)->update(['shopowner_status' => 4]);
                if ($result) {
                    return $this->JsonResponse(200, '确定送货成功');
                }
                return $this->JsonResponse(401, '确定送货操作失败');
                break;
            case 4://确定拒绝，变成转单
                Auth::id();
                $history_id = array();
                $history_shopowner = Order::where('order_id', $order_id)->value('history');
                if (empty($history_shopowner)) {
                    $history_id[] = Auth::id();
                } else {
                    $history_id = json_decode($history_shopowner, true);
                    $history_id[] = Auth::id();
                }
                $result = Order::where('order_id', $order_id)->where('shopowner_status', 2)->update(['shopowner_status' => 6, 'history' => json_encode($history_id)]);
                if ($result) {
                    return $this->JsonResponse(200, '确定送货成功');
                }
                return $this->JsonResponse(401, '确定送货操作失败');
                break;
        }
    }

    /**
     * 订单流转
     * @param $order_id
     */
    public function orderMove($order_id)
    {
        //查询用户信息跟历史转单的店长信息
        $consumer_id = Order::where('order_id', $order_id)->first(['consumer_id', 'history']);
        $not_in_user = $consumer_id->history;
        //查询用户学校与几楼
        $consumer_address = ConsumerAddress::where('consumer_id', $consumer_id->consumer_id)->first(['school_id', 'building']);//查询用户地址
        //查询用户对应楼的店长，楼长
        $shopkeeper_ids = Shopkeeper::where('school_id', $consumer_address->school_id)->where('building', $consumer_address->building)->pluck('shopkeeper_id');//选取用户住宿楼的店长
        $shopowner = ShopkeeperRole::where('role_id', 3)->whereIn('user_id',$shopkeeper_ids)->pluck('user_id');//选店长角色
        //查询符合要求的店长
        $find_result = User::whereIn('id', $shopowner)->where(function ($query) use ($not_in_user) {
            if ($not_in_user) {
                $query->whereNotIn('id', json_decode($not_in_user));//排除历史流转的店长
            }
        })
            ->where('is_delete', 0)->where('status', 1)->get(['shopowner_level_id', 'id'])->toArray();
        if(!empty($find_result)){
            $user_id = [];
            foreach ($find_result as $value) {
                if ($value['shopowner_level_id'] == 1 || $value['shopowner_level_id'] == 2) {//青铜,白银
                    $user_id[] = $value['id'];
                    $user_id[] = $value['id'];
                } elseif ($value['shopowner_level_id'] == 3 || $value['shopowner_level_id'] == 4) {//黄金，砖石
                    $user_id[] = $value['id'];
                    $user_id[] = $value['id'];
                    $user_id[] = $value['id'];
                }
            }
            if (!empty($user_id)) {
                //随机选取店长转单
                $random_keys = array_rand($user_id, 1);
                //更新订单信息
                Order::where('order_id', $order_id)->where('shopowner_status', 6)->update(['migrate_shopowner_id' => $random_keys[0]]);
            }
        }else{

            //退款
        }

    }
}
