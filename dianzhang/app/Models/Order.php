<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected  $table='order';
    public function order_goods(){

        return $this->hasMany(OrderGoods::class,'order_id','order_id');
    }

    public function consumer(){
        return $this->belongsTo(Consumer::class,'consumer_id','consumer_id');
    }
}
