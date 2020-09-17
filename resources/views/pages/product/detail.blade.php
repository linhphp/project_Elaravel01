@extends('layout')
@section('title')
{{ $product->product_name }}   
@endsection
@section('content')
<div class="product-details"><!--product-details-->
    <div class="col-sm-5">
        <div class="view-product">
            <img src="upload/product/{{ $product->image }}" alt="" />
            
        </div>

    </div>
    <div class="col-sm-7">
        <div class="product-information"><!--/product-information-->
            <img src="images/product-details/new.jpg" class="newarrival" alt="" />
            <h2>{{ $product->product_name }}</h2>
            <img src="frontend/image/rating.png" alt="" />

            <span>
                @if($product->unit_price === $product->promotion_price)
                <span>{{ number_format($product->unit_price) }} VNĐ</span>
                @else
                <span style="text-decoration: line-through;">{{ number_format($product->unit_price) }} VNĐ</span> 
                <span style="text-decoration: line-through;">{{ number_format($product->promotion_price) }} VNĐ</span>
                @endif
                <label>số lượng:</label>
                <input type="number" min="1" name="quantity" value="1" />
                <button type="button" class="btn btn-fefault cart">
                    <i class="fa fa-shopping-cart"></i>
                    Thêm vào giỏ hàng
                </button>
            </span>

            <form action="" method="post">
                <span>
                    @if($product->unit_price === $product->promotion_price)
                    <span>{{ number_format($product->unit_price) }} VNĐ</span>
                    @else
                    <span style="text-decoration: line-through;">{{ number_format($product->unit_price) }} VNĐ</span> 
                    <span style="text-decoration: line-through;">{{ number_format($product->promotion_price) }} VNĐ</span>
                    @endif
                    <label>số lượng:</label>
                    <input type="number" min="1" name="quantity" value="1" />
                    <button type="button" class="btn btn-fefault cart">
                        <i class="fa fa-shopping-cart"></i>
                        Thêm vào giỏ hàng
                    </button>
                </span>
            </form>
            <p><b>Còn Hàng:</b> Khả dụng</p>
            <p><b>Mã ID: </b>{{ $product->id }}</p>
            <p><b>Tình trạng:</b> Mới</p>
            <p><b>thương hiệu:</b> {{ $product->brand_name }}</p>
            <p><b>danh mục:</b> {{ $product->cate_name }}</p>
            <a href=""><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a>
        </div><!--/product-information-->
    </div>
</div><!--/product-details-->
<div class="category-tab shop-details-tab"><!--category-tab-->
    <div class="col-sm-12">
        <ul class="nav nav-tabs">
            <li><a href="#details" data-toggle="tab">Chi tiết sản phẩm</a></li>
            <li class="active"><a href="#reviews" data-toggle="tab">bình luận</a></li>
        </ul>
    </div>
    <div class="tab-content">
        <div class="tab-pane fade" id="details" >
                <h2>{{ $product->product_name }}</h2>
                <h4>{{ $product->desc }}</h4>
                <img src="upload/product/{{ $product->image }}" alt="" />
                <p>{!! $product->content !!}</p>
        </div>

        <div class="tab-pane fade active in" id="reviews" >
            <div class="col-sm-12">
                <ul>
                    <li><a href=""><i class="fa fa-user"></i>EUGEN</a></li>
                    <li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>
                    <li><a href=""><i class="fa fa-calendar-o"></i>31 DEC 2014</a></li>
                </ul>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                <p><b>Write Your Review</b></p>
                
                <form action="#">
                    <span>
                        <input type="text" placeholder="Your Name"/>
                        <input type="email" placeholder="Email Address"/>
                    </span>
                    <textarea name="" ></textarea>
                    <b>Rating: </b> <img src="images/product-details/rating.png" alt="" />
                    <button type="button" class="btn btn-default pull-right">
                        Submit
                    </button>
                </form>
            </div>
        </div>
        
    </div>
</div><!--/category-tab-->
<div class="recommended_items"><!--recommended_items-->
    <h2 class="title text-center">Sản phẩm gợi ý</h2> 
    @foreach($related_product as $product)
        <div class="col-sm-4">
            <a href="{{ route('detail',$product->id) }}">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <img src="upload/product/{{ $product->image }}" alt="" />
                            <h2>{{ number_format($product->unit_price) }} VNĐ</h2>
                            <p>{{ $product->product_name }}</p>
                            <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm Vào giỏ hàng</button>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    @endforeach
         
</div><!--/recommended_items-->
@endsection