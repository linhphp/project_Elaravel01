<?php

namespace App\Http\Controllers;

use App\CategoryProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\BrandProduct;
use App\Product;
class CategoryProductController extends Controller
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
        $categoryProducts = CategoryProduct::paginate(5);
        return view('admin.category_products.show_category_product',compact('categoryProducts'));
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

        return view('admin.category_products.add_category_product');
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

        $data = new CategoryProduct;
        $data->cate_name = $request->category_product;
        $data->category_desc = $request->category_product_desc;
        $data->category_status = $request->categoty_status;
        $data->save();
        return redirect()->back()->with('message', 'Thêm loại sản phẩm thành công');
    }
    public function un_active($id)
    {
        $this->AuthLoginCheck();

        $data = CategoryProduct::find($id);
        $data->category_status = 0;
        $data->save();
        return redirect()->back();
    }
    public function active($id)
    {
        $this->AuthLoginCheck();

        $data = CategoryProduct::find($id);
        $data->category_status = 1;
        $data->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CategoryProduct  $categoryProduct
     * @return \Illuminate\Http\Response
     */
    public function show(CategoryProduct $categoryProduct)
    {
        //
        $this->AuthLoginCheck();

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CategoryProduct  $categoryProduct
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $this->AuthLoginCheck();

        $cate_pro = CategoryProduct::find($id);
        // dd($cate_pro);
        return view('admin.category_products.edit_category_product',compact('cate_pro'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CategoryProduct  $categoryProduct
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->AuthLoginCheck();

        $update = CategoryProduct::find($id);
        $update->cate_name = $request->category_product;
        $update->category_desc = $request->category_product_desc;
        $update->save();
        return redirect()->route('danh-muc-san-pham.index'); 

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CategoryProduct  $categoryProduct
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $this->AuthLoginCheck();
        
        CategoryProduct::destroy($id);
        return redirect()->route('danh-muc-san-pham.index')->with('message','xoa danh muc thanh cong');
    }

    // end function admin page
    public function showCateHome($id){
        $product_cates = CategoryProduct::join('products','products.cate_id','=','category_products.id')->select('products.id','products.product_name','products.image','products.unit_price','products.promotion_price')->where('category_products.id',$id)->get();
        $cate = CategoryProduct::find($id);
        if (count($product_cates)<=0) {
            $product =0;
        }
        else{
            $product =1;
        }
        
        return view('pages.category.show_cate',compact('product_cates','product','cate'));
    }
}
