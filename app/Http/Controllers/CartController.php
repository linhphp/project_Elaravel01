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
use Cart;
class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addCart(Request $request)
    {
        //
        $product_id = $request->pro_id;
        $quantity = $request->quantity;
        $product_cart = Product::where('id',$request->pro_id)->first();
        $data['id'] = $product_cart->id;
        $data['qty'] = $quantity;
        $data['name'] = $product_cart->product_name;
        if($product_cart->unit_price === $product_cart->promotion_price){
            $price = $product_cart->unit_price;
        }
        else{
            $price = $product_cart->promotion_price;
        }
        $data['price'] = $price;
        $data['weight'] = 10;
        $data['options']['image'] = $product_cart->image;
        Cart::add($data);
        // Cart::destroy();
        return redirect()->route('showCart');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showCart()
    {
        //
        $content = Cart::content();
        return view('pages.cart.index_cart',compact('content'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_qty(Request $request)
    {
        //
        $rowId = $request->rowId_cart;
        $qty =$request->quantity;
        Cart::update($rowId,$qty);
        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($rowId)
    {
        //
        Cart::update($rowId,0);
        $cart = Cart::content();
        if($cart != '[]'){
        // echo $cart;
            // echo 'da xoa';
        return redirect()->back();
        }
        else{
            Cart::destroy($rowId);
            return redirect()->route('home');
        }
    }
}
