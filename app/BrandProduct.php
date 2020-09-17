<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BrandProduct extends Model
{
    //
    protected $table = 'brand_products';

    public function product(){
    	return $this->hasMany('App\Product','brand_id','id');
    }
}
