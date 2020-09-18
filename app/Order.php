<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $table = 'orders';
    public function order_detail(){
    	return $this->hasMany('App\OrderDetail','order_id','id');
    }
    public function customer_or(){
    	return $this->belongsTo('App\Customoer','customer_id','id');
    }
}
