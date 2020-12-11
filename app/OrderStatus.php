<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderStatus extends Model
{
    public $table = "order_status";
    public function order(){
        return $this->hasMany('App\Oder');
    }
}
