<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'name', 'address', 'phone', 'email', 'message', 'user_id', 'address_id', 'order_status_id',
    ];
    public function orderStatus(){
        return $this->belongsTo('App\OrderStatus');
    }
    public function orderDetail(){
        return $this->hasMany('App\OrderDetail');
    }
}
