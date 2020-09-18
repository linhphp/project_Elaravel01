@extends('layout')
@section('content')
@section('title','tim kiem')
<div class="features_items">
    <h2 class="title text-center">tìm thấy <span style="color: darkred;">{{ count($products) }}</span> sản phẩm với <span style="color: darkred;">{{ $result }}</span></h2>
    @foreach($products as $product)
    <div class="col-sm-4">
        <div class="product-image-wrapper">
            <div class="single-products">
                <a href="{{ route('detail',$product->id) }}">
                <form action="{{ route('addToCart') }}" method="post">
                    @method('POST')
                    @csrf
                    <input type="hidden" min="1" name="quantity" value="1" />
                        <input type="hidden" min="1" name="pro_id" value="{{ $product->id }}" />
                    <div class="productinfo text-center">
                        <img src="upload/product/{{ $product->image }}" alt="" />
                        @if($product->unit_price === $product->promotion_price)
                        <h2>{{ number_format($product->unit_price) }} VNĐ</h2>
                        @else
                        <h2><span style="text-decoration: line-through;">{{ number_format($product->unit_price) }} VNĐ</span> <span>{{ number_format($product->promotion_price) }}VNĐ</span></h2>
                        @endif
                </a>
                        <p>{{ $product->product_name }}</p>
                        <button class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</button>
                    </div>
                </form>
            </div>
            <div class="choose">
                <ul class="nav nav-pills nav-justified">
                    <li><a href="#"><i class="fa fa-plus-square"></i>Thêm yêu thích</a></li>
                    <li><a href="#"><i class="fa fa-plus-square"></i>Thêm so sánh</a></li>
                </ul>
            </div>
        </div>
    </div>
    @endforeach
    {{-- end product --}}
    
</div>
{{-- end Features Items --}}
{{-- end category-tab --}}
@endsection