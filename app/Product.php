<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable =
    [
        'name', 'price', 'description', 'detail', 'category_id',
    ];
    public function category()
    {
        return $this->belongsTo('App\Category');
    }
    public function productImage()
    {
        return $this->hasOne('App\ProductImage', 'product_id');
    }
    public function size()
    {
        return $this->belongsToMany('App\Size', 'product_sizes', 'product_id', 'size_id')->withPivot('quantities');
    }
    public function comment()
    {
        return $this->hasMany('App\Comment');
    }
}
