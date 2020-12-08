<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    public $table = 'order_details';
    public function order(){
        return $this->belongsTo('App\Order');
    }
    public function product(){
        return $this->belongsTo('App\Product');
    }
}
