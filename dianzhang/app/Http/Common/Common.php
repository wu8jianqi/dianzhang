<?php
/**
 * Created by PhpStorm.
 * User: wu
 * Date: 2020/3/16
 * Time: 14:05
 */

namespace App\Http\Common;


class Common
{
    /**
     * 时间搜索插件封装
     * @param $timeset
     * @return array
     */
    function get_time_search($timeset)
    {
        switch ($timeset) {
            case 1;//昨天
                $stime = strtotime('-1 day' . ' 0:0:0');
                $etime = strtotime('-1 day' . ' 23:59:59');
                break;
            case 2;//今天
                $stime = strtotime(date('Y-m-d', time()) . ' 0:0:0');
                $etime = strtotime(date('Y-m-d', time()) . ' 23:59:59');
                break;
            case 3;//上周
                $stime = mktime(0, 0, 0, date('m'), date('d') - date('w') + 1 - 7, date('Y'));
                $etime = mktime(23, 59, 59, date('m'), date('d') - date('w') + 7 - 7, date('Y'));
                break;
            case 4;//上月
                $stime = strtotime(date('Y-m-01 00:00:00', strtotime('-1 month')));
                $etime = strtotime(date("Y-m-d 23:59:59", strtotime(-date('d') . 'day')));
                break;
            case 5;//本月
                $stime = mktime(0, 0, 0, date('m'), 1, date('Y'));
                $etime = mktime(23, 59, 59, date('m'), date('t'), date('Y'));
                break;
            case 6;//所有时间
                $stime = strtotime('2020-3-10' . ' 0:0:0');
                $etime = strtotime('2030-3-10' . ' 23:59:59');
                break;

        }
        return ['stime'=>$stime,'etime'=>$etime];

    }
}