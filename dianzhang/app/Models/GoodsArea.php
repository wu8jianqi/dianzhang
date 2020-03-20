<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GoodsArea extends Model
{
    protected  $table='goods_area';
    public function goods(){

        return $this->belongsTo(Goods::class,'goods_id','goods_id');
    }
}
