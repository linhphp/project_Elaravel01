<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Builder;
class Product extends Model
{
    //
    protected $table = 'products';
   	public function brand_product(){
    	return $this->belongsTo('App\BrandProduct','brand_id','id');
    }
    public function cate_product(){
    	return $this->belongsTo('App\CategoryProduct','cate_id','id');
    }
    
}
