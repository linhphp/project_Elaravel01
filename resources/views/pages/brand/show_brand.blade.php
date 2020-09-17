@extends('layout')
@section('title')
thuong hieu - {{ $brand->brand_name }}
@endsection
@section('content')
<div class="features_items">
    <h2 class="title text-center">Thương Hiệu {{ $brand->brand_name }}</h2>
    @if($product==1)
    @foreach($product_brand as $product)
    <div class="col-sm-4">
        <div class="product-image-wrapper">
            <div class="single-products">
                    <form action="{{ route('addToCart') }}" method="post">
                        @method('POST')
                        @csrf
                        <a href="{{ route('detail',$product->id) }}">
                            <div class="productinfo text-center">
                                <img src="upload/product/{{ $product->image }}" alt="" />
                                @if($product->unit_price === $product->promotion_price)
                                <h2>{{ number_format($product->unit_price) }} VNĐ</h2>
                                @else
                                <h2><span style="text-decoration: line-through;">{{ number_format($product->unit_price) }} VNĐ</span> <span>{{ number_format($product->promotion_price) }}VNĐ</span></h2>
                                @endif
                                <p>{{ $product->product_name }}</p>
                        </a>
                            <button type="submit" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</button>
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
    @else
    <div class="col">
        <div class="product-image-wrapper">
            <h2 >404 - không có sản phần này</h2>
        </div>
    </div>
    @endif
    {{-- end product --}}
    
</div>
{{-- end Features Items --}}
{{-- <div class="row">{!! $products->links() !!}</div> --}}
{{-- end category-tab --}}
@endsection