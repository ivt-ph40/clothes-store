<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    public function product()
    {
        return $this->belongsToMany('App\Product', 'product_sizes', 'size_id', 'product_id');
    }
}
