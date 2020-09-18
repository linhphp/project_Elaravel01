@extends('layout')
@section('content')
@section('title')
tien hanh thanh toan
@endsection
        
<section id="cart_items">
	<div class="breadcrumbs">
		<ol class="breadcrumb">
		  <li><a href="#">Home</a></li>
		  <li class="active">thanh toán giỏ hàng</li>
		</ol>
	</div><!--/breadcrums-->
	@if(!$customer)
	<div class="register-req">
		<p>vui lòng đăng ký hoặc đăng nhập để tiến hành thanh toán </p>
	</div><!--/register-req-->
	@endif
	<div class="shopper-informations">
		<div class="row">

			<div class="col-sm-5 clearfix">
				<div class="bill-to">

					<p>Điền thông tin gửi hàng</p>
					<div class="form-one">
				<form action="{{ route('checkout.customer') }}">
						@if($customer)
							<input type="email"  name ="email" placeholder="Email*" value="{{ $customer->customers_email }}">
							<input type="text" name="name" placeholder="Họ và tên" value="{{ $customer->customers_name }}">
							<input type="text" name="phone" placeholder="phone number  " value="{{ $customer->phone }}">
							<input type="text" name="address" placeholder="dia chi">
						@else
							<input type="email"  name ="email" placeholder="Email*" >
							<input type="text" name="name" placeholder="Họ và tên" >
							<input type="text" name="phone" placeholder="phone number  ">
							<input type="text" name="address" placeholder="dia chi">
						@endif	
							<input type="submit" name="send_order" value="gửi" class="btn btn-default add-to-cart">
					</div>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="order-message">
					<p>ghi chú</p>
					<textarea name="message"  placeholder="ghi chú đơn hàng của bạn" rows="16"></textarea>
					
				</div>	
			</div>					
				</form>
		</div>
	</div>
	<div class="review-payment">
		<h2>xem lại giỏ hàng</h2>
	</div>

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
					<tr>
							<td colspan="4">&nbsp;</td>
							<td colspan="2">
								<table class="table table-condensed total-result">
									<tr>
										<td>Tổng tiền </td>
										<td><span>{{ Cart::initial() }} VNĐ</td>
									</tr>
									<tr>
										<td>Thuế VAT </td>
										<td><span>{{ Cart::tax() }} VNĐ</td>
									</tr>
									<tr class="shipping-cost">
										<td>phí vận chuyển </td>
										<td><span>pree</span></td>										
									</tr>
									<tr>
										<td>Tthành tiền </td>
										<td><span><span>{{ Cart::total() }}VNĐ</span></td>
									</tr>
								</table>
							</td>
						</tr>
					</tbody>
				</table>
			</div>


	<div class="payment-options">
		<span>
			<label><input type="checkbox"> Direct Bank Transfer</label>
		</span>
		<span>
			<label><input type="checkbox"> Check Payment</label>
		</span>
		<span>
			<label><input type="checkbox"> Paypal</label>
		</span>
	</div>
	</section> <!--/#cart_items-->
@endsection
