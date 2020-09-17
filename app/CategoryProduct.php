<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryProduct extends Model
{
    //
    protected $table = 'category_products';
    public function product(){
    	return $this->hasMany('App\Product','cate_id','id');
    }
}
