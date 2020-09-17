<?php

namespace App\Http\Controllers;

use App\BrandProduct;
use App\CategoryProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
class BrandProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function AuthLoginCheck(){
        $admin_id = Auth::id();
        if($admin_id){
            return redirect()->route('dashboard');
        }
        else{
            return redirect()->route('admin')->send();
        }
    }
    public function index()
    {
        //
        $this->AuthLoginCheck();
        $brands = BrandProduct::paginate(5);
        return view('admin.brand_products.index',compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $this->AuthLoginCheck();

        return view('admin.brand_products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->AuthLoginCheck();

        $data = new BrandProduct;
        $data->brand_name = $request->name;
        $data->desc = $request->desc;
        $data->status = $request->status;
        $data->save();
        return redirect()->back()->with('message', 'Thêm thương hiệu sản phẩm thành công');
    }
    public function un_active($id)
    {
        $this->AuthLoginCheck();

        $data = BrandProduct::find($id);
        $data->status = 0;
        $data->save();
        return redirect()->back();
    }
    public function active($id)
    {
        $this->AuthLoginCheck();

        $data = BrandProduct::find($id);
        $data->status = 1;
        $data->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BrandProduct  $BrandProduct
     * @return \Illuminate\Http\Response
     */
    public function show(BrandProduct $BrandProduct)
    {
        //
        $this->AuthLoginCheck();

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BrandProduct  $BrandProduct
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $this->AuthLoginCheck();

        $brand = BrandProduct::find($id);
        return view('admin.brand_products.edit',compact('brand'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BrandProduct  $BrandProduct
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->AuthLoginCheck();

        $update = BrandProduct::find($id);
        $update->brand_name = $request->name;
        $update->desc = $request->desc;
        $update->save();
        return redirect()->route('thuong-hieu-san-pham.index'); 

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BrandProduct  $BrandProduct
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $this->AuthLoginCheck();
        
        BrandProduct::destroy($id);
        return redirect()->route('thuong-hieu-san-pham.index')->with('message','xoa thuong hieu thanh cong');
    }
    // end function admin brand
    public function showBrandHome($id){
        $product_brand = BrandProduct::join('products','products.brand_id','=','brand_products.id')->select('products.id','products.product_name','products.image','products.unit_price','products.promotion_price')->where('brand_products.id',$id)->get();
        
        $brand = BrandProduct::find($id);
        if(count($product_brand)<=0){
            $product = 0;
        }
        else{
            $product =1;
        }
        return view('pages.brand.show_brand',compact('product_brand','brand','product'));
    }
}
