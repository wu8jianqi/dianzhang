<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    /**
     * api返回数据格式
     * @param $code
     * @param $message
     * @param $data
     * @return array
     */
    /**
     * layui返回数据格式
     * @param $code
     * @param $message
     * @param $data
     * @param $count
     * @return \Illuminate\Http\JsonResponse
     */
    protected function layuiResponse($code, $message,array $data,$count)
    {
        return response()->json([
            'code' => $code,
            'msg' => $message,
            'data' => $data,
            'count'=>$count
        ]);
    }

    /**
     * json数据返回格式
     * @param $code
     * @param $message
     * @return \Illuminate\Http\JsonResponse
     */
    protected function JsonResponse($code, $message)
    {
        return response()->json([
            'code' => $code,
            'msg' => $message,

        ]);
    }
}
