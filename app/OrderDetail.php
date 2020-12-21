<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    public $table = 'order_details';

    protected $fillable = [
        'size', 'quantities', 'price', 'product_id', 'created_at', 'order_id', 'updated_at'
    ];
    public function order(){
        return $this->belongsTo('App\Order');
    }
    public function product(){
        return $this->belongsTo('App\Product');
    }
}
