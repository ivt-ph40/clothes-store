<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductSize extends Model
{
    protected $fillable = 
    [
        'quantities', 'product_id', 'size_id',
    ];
    public function product()
    {
        return $this->belongsTo('App\Product');
    }
    public function size()
    {
        return $this->belongsTo('App\Size');
    }
}
