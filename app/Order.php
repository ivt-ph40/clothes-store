<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function orderStatus(){
        return $this->belongsTo('App\OrderStatus');
    }
}
