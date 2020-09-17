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


class ProductController extends Controller
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
        $products = Product::join('brand_products','brand_products.id','=','products.brand_id')->select('products.id','products.product_name','products.unit_price','products.promotion_price','products.status','products.image','brand_products.brand_name')->paginate(5);
        // foreach($products as $pro){
        // echo '<pre>';
        // echo $pro;
        // echo '</pre>';    
        return view('admin.products.index',compact('products'));
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

        $cates = CategoryProduct::all()->pluck('id','cate_name');
        $brands = BrandProduct::all()->pluck('id','brand_name');
        return view('admin.products.create',compact('cates','brands'));
    }
    // public function brand($id){
    //     $brands = BrandProduct::where('cate_id',$id)->pluck('id','brand_name');
    //     return json_encode($brands);
    // }

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

        $data = new Product;
        $data->product_name = $request->name;
        $data->cate_id = $request->cate;
        $data->brand_id = $request->brand;
        $data->desc = $request->desc;
        $data->content = $request->content;
        $data->unit_price = $request->unit_price;
        $data->promotion_price = $request->unit_price-(($request->unit_price*$request->promotion)/100);
        $data->status = $request->status;

        // lay hinh anh
        if($request->hasfile('image')){

            $file = $request->file('image');
            if($file->getClientOriginalExtension('image') == 'jpg' || $file->getClientOriginalExtension == 'JPG' || $file->getClientOriginalExtension('image') == 'png' || $file->getClientOriginalExtension == 'PNG'){
                $file_name = $file->getClientOriginalName('image');
                $file->move('upload/product',$file_name);
                $data->image = $file_name;
            }
            else {
                $data->image = 'null';
            }

        }
        else {
            $data->image = 'null';
        }
        $data->save();
        return redirect()->back()->with('message', 'Thêm sản phẩm thành công');
    }
    public function un_active($id)
    {
        $this->AuthLoginCheck();

        $data = Product::find($id);
        // dd($data->pro_id);
        $data->status = 0;
        $data->save();
        return redirect()->back();
    }
    public function active($id)
    {
        $this->AuthLoginCheck();

        $data = Product::find($id);
        $data->status = 1;
        $data->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $Product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $Product)
    {
        //
        $this->AuthLoginCheck();

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $Product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $this->AuthLoginCheck();

        $product = Product::find($id);
        // dd($product);
        $cates = CategoryProduct::all()->pluck('id','cate_name');
        $brand = BrandProduct::all()->pluck('id','brand_name');
        return view('admin.products.edit',compact('product','cates','brand'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $Product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->AuthLoginCheck();

       $data = Product::find($id);
        $data->product_name = $request->name;
        $data->cate_id = $request->cate;
        $data->brand_id = $request->brand;
        $data->desc = $request->desc;
        $data->content = $request->content;
        $data->unit_price = $request->unit_price;
        $data->promotion_price = $request->unit_price-(($request->unit_price*$request->promotion)/100);

        // lay hinh anh
        if($request->hasfile('image')){

            $file = $request->file('image');
            if($file->getClientOriginalExtension('image') == 'jpg' || $file->getClientOriginalExtension == 'JPG' || $file->getClientOriginalExtension('image') == 'png' || $file->getClientOriginalExtension == 'PNG'){
                $file_name = $file->getClientOriginalName('image');
                $file->move('upload/product',$file_name);
                $data->image = $file_name;
            }
            else {
                $data->image = 'null';
            }

        }
        else {
        }
        $data->save();
        return redirect()->route('san-pham.index'); 

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $Product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $this->AuthLoginCheck();
        
        Product::destroy($id);
        return redirect()->route('san-pham.index')->with('message','xoa thuong hieu thanh cong');
    }
    // end function admin
    public function detail($id){
        $product = Product::join('brand_products','brand_products.id','=','products.brand_id')->join('category_products','category_products.id','=','products.cate_id')->select('products.id','products.product_name','products.unit_price','products.promotion_price','products.status','products.image','products.desc','products.content','brand_products.brand_name','category_products.cate_name')->where('products.id','=',$id)->first();
        $cate_product = CategoryProduct::join('products','products.cate_id','=','category_products.id')->select('category_products.id')->where('products.id',$id)->first();
        // echo $cate_product;
        $related_product = CategoryProduct::join('products','products.cate_id','=','category_products.id')->select('products.product_name','products.unit_price','products.promotion_price','products.image','products.id')->where('category_products.id',$cate_product->id)->whereNotIn('products.id',[$id])->paginate(3);
        // foreach($related_product as $pro){
        //     echo '<pre>';
        //     echo $pro;
        //     echo '</pre>';
        // }
        return view('pages.product.detail',compact('product','related_product'));
    }
}
