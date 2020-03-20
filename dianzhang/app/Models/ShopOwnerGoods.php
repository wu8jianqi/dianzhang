<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShopOwnerGoods extends Model
{
    protected  $table='shopowner_goods';
    public function Goods(){
        return $this->belongsTo(Goods::class,'goods_id','goods_id');
    }

    public function shopkeeper(){
        return $this->belongsTo(User::class,'shopowner_id','id');
    }
}
