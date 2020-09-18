@extends('layout')
@section('content')
@section('title')
giỏ hàng 
@endsection
<section id="cart_items">
	<div class="breadcrumbs">
		<ol class="breadcrumb">
		  <li><a href="#">Home</a></li>
		  <li class="active">giỏ hàng của bạn</li>
		</ol>
	</div>
		@if($content != '[]')
	<div class="table-responsive cart_info">

		<table class="table table-condensed">
			<thead>
				
				<tr class="cart_menu">
					<td class="image">hình ảnh</td>
					<td class="name">tên sản phẩm</td>
					<td class="price">giá</td>
					<td class="quantity">số lượng</td>
					<td class="total">tổng tiền</td>
					<td></td>
				</tr>
			</thead>
			<tbody>
				@foreach($content as $cnt)
					<tr>
						<td class="cart_product">
							<a href=""><img width="50" height="50" src="upload/product/{{ $cnt->options->image }}" alt=""></a>
						</td>
						<td class="cart_description">
							<h4><a href="">{{ $cnt->name }}</a></h4>
							<p>Web ID: {{ $cnt->id }}</p>
						</td>
						<td class="cart_price">
							<p>{{ number_format($cnt->price) }} VNĐ</p>
						</td>
						<td class="cart_quantity">
							<div class="cart_quantity_button">
							<form action="{{ route('cart.update_qty') }}" method="post">
								@method('POST')
								@csrf
								<input class="cart_quantity_input" type="text" name="quantity" value="{{ $cnt->qty }}" autocomplete="off" size="2">
								<input type="hidden" name="rowId_cart" value="{{ $cnt->rowId }}">
								<input type="submit" value="Cập nhật" name="update_qty" class="btn btn-default btn-sm">
							</form>
							</div>
						</td>
						<td class="cart_total">
							<p class="cart_total_price">{{ number_format($cnt->price*$cnt->qty) }} VNĐ</p>
						</td>
						<td class="cart_delete">
							<a class="cart_quantity_delete" href="{{ route('delete.cart',$cnt->rowId) }}"><i class="fa fa-times"></i></a>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</section> <!--/#cart_items-->
<section id="do_action">
	<div class="heading">
		<h3>Bạn sẽ làm gì tiếp theo</h3>
		<p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
	</div>
	<div class="row">
		
		<div class="col-sm-12">
			<div class="total_area">
				<ul>
					<li>Tổng tiền <span>{{ Cart::initial() }} VNĐ</span></li>
					<li>Thuế VAT <span>{{ Cart::tax() }} VNĐ</span></li>
					<li>phí vận chuyển <span>pree</span></li>
					<li>thành tiền <span>{{ Cart::total() }}VNĐ</span></li>
				</ul>
				@if((Session::has('cus_id')) || (Session::has('shipping')))
                    <a href="{{ route('checkout.out') }}" class="btn btn-default check_out"><i ></i> thanh toán</a>
                @else
					<a class="btn btn-default check_out" href="{{ route('checkout.login') }}">Thanh Toán</a>
                @endif
			</div>
		</div>
	</div>
</section><!--/#do_action-->
	@else
	<h2 class="alert-danger text-center">chưa có sản phẩm trong giỏ hàng, vui vòng đặt hàng rồi quay lại đây</h2>
	@endif
@endsection