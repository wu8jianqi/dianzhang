<?php
/**
 * Created by PhpStorm.
 * User: wu
 * Date: 2020/3/11
 * Time: 11:51
 */

namespace App\Http\Controllers\Backend;


use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShopOwner extends Controller
{
    /**
     * 我的店员
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function myShopOwner(Request $request)
    {

        $shopOwner = User::query();
        if (Auth::id() != 1) {
            $shopOwner->where('pid', Auth::id());
        }
        $data = $shopOwner->paginate(10, ['nickname', 'avatar'])->toArray()['data'];
        return view('shopOwner/list',['data'=>$data]);
    }

    public function layui()
    {
        $shopOwner = User::query();
        if (Auth::id() != 1) {
            $shopOwner->where('pid', Auth::id());
        }
        $data = $shopOwner->paginate(10, ['nickname', 'avatar'])->toArray();
      return  $this->layuiResponse(0,'我的店员',$data['data'],$data['total']);

    }

    public function inviteAssistant(Request $request){




    }
}