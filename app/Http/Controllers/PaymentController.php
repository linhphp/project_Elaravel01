<?php

namespace App\Http\Controllers;
use App\Product;
use App\Order;
use App\OrderDetail;
use Session;
use Cart;
use App\Customer;
use App\Shipping;
use App\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
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
    public function postpayment(Request $request)
    {
        
        $data_payment = new Payment;
        $data_payment->method = $request->option;
        $data_payment->status = 'Đang sử lý';
        $data_payment->save();
        //order
        $data_order = new Order;
        $data_order->customer_id = Session::get('cus_id');
        $data_order->shipping_id = Session::get('shipping');
        $data_order->payment_id = $data_payment->id;
        $data_order->total = Cart::total();
        $data_order->status = 'Đang xử lý';
        $data_order->save();
        //order detail
        foreach(Cart::content() as $key){
            $data_order_detail = new OrderDetail;
            $data_order_detail->order_id = $data_order->id;
            $data_order_detail->product_id = $key->id;
            $data_order_detail->product_name = $key->name;
            $data_order_detail->product_price = $key->price;
            $data_order_detail->product_quantity = $key->qty;
            $data_order_detail->save();
        }
        Cart::destroy();
        echo Cart::content();
        return redirect()->route('home')->with('payment','thanh toán thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment)
    {
        //
    }
}
