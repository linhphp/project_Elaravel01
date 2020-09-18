<?php

namespace App\Http\Controllers;

use App\BrandProduct;
use App\CategoryProduct;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Session;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
    //
    public function index(){
    	
    	$products = Product::join('brand_products','brand_products.id','=','products.brand_id')->select('products.id','products.product_name','products.unit_price','products.promotion_price','products.status','products.image','brand_products.brand_name')->where('products.status','=', 1)->orderby('products.id','desc')->paginate(3);
    	return view('pages.home',compact('products'));
    }
    public function seach(Request $request){
    	$result = $request->key;
    	$products = Product::join('brand_products','brand_products.id','=','products.brand_id')->select('products.id','products.product_name','products.unit_price','products.promotion_price','products.status','products.image','brand_products.brand_name')->where('brand_products.brand_name','like','%'.$result.'%')->orWhere('products.product_name','like','%'.$result.'%')->orWhere('products.unit_price','like',$result)->orderby('products.id','desc')->get();
    	return view('pages.seach',compact('products','result'));
    }
    
}
