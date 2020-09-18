<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use Illuminate\Support\Facades\Auth;
use Hash;
use Session;
use Cart;
use App\Order;
use App\Product;
use App\Shipping;
use App\OrderDetail;
class CheckoutController extends Controller
{
    public function AuthLoginCheck(){
        $admin_id = Auth::id();
        if($admin_id){
            return redirect()->route('dashboard');
        }
        else{
            return redirect()->route('admin')->send();
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function check_out()
    {
        //
       
        return view('pages.checkout.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function get_out()
    {
        if((Session::has('cus_id')) || (Session::has('shipping'))){
            $customer = Customer::where('id',Session::get('cus_id'))->first();
        }
        else {
            $customer = false;
        }
        if(Cart::content() == '[]'){
            return redirect()->route('home');
        }
        $content = Cart::content();
        return view('pages.checkout.checkout',compact('content','customer'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addCustomer(Request $request)
    {
        //
        $data = new Customer;
        $data->customers_name = $request->name;
        $data->customers_email =$request->email;
        $data->password = md5($request->password);
        $data->phone = $request->phone;
        $data->save();
        Session::put('cus_id',$data->id);
        Session::put('cus_email',$data->customers_email);
        return redirect()->route('checkout.out');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // admin---------------------
    public function show($id)
    {
        //
        $this->AuthLoginCheck();
        $order = Order::find($id);
        $orders = Customer::find($order->customer_id)->order_one->toArray();
        $order_detail = Order::find($id)->order_detail->toArray();
        $customer = Customer::where('id',$order->id)->first();
        $shipping = Shipping::find($order->shipping_id);
        // echo '<pre>';
        // var_dump($customer);
        // echo '</pre>';
        
        return view('admin.manage.order_detail',compact('orders','order_detail','customer','shipping'));
    }
    // admin---------------
    public function index()
        {
            //
             $this->AuthLoginCheck();
        $orders = Order::join('customers','customers.id','=','orders.customer_id')->select('orders.*','customers.customers_name')->paginate(5);
            return view('admin.manage.manage_order',compact('orders'));
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
    public function check_in(Request $request)
    {
        //
        $data_email = $request->email;
        $data_pass = md5($request->pass);
        $checkin = Customer::where([['customers_email','=',$data_email],['password','=',$data_pass]])->first();

        if ($checkin) {
            // dd($checkin);
            Session::put('cus_id',$checkin->id);
            Session::put('cus_name',$checkin->customers_name);
            if (Cart::content()) {
                return redirect()->route('checkout.out');
            }
            else{
                return redirect()->route('home');
            }
            
        }
        else {
            return redirect()->back()->with('thongbao','đăng nhập thất bại!');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        Order::destroy($id);
        return redirect()->back();
    }
    public function checkout_logout($id)
    {
        //
        Session::forget('cus_id');
        Session::forget('shipping');
        return redirect()->route('home');
    }
}
