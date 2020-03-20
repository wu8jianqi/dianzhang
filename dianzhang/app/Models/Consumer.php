<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Consumer extends Model
{
    protected $table='consumer';

    public function address(){
        return $this->hasOne(ConsumerAddress::class,'consumer_id','consumer_id');
    }
}
