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
	<div class="table-responsive cart_info">

		<?php 
		
		//echo"<pre>";
		//print_r($content);
		//echo"</pre>";
		?>
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
								<a class="cart_quantity_up" href=""> + </a>
								<input class="cart_quantity_input" type="text" name="quantity" value="{{ $cnt->qty }}" autocomplete="off" size="2">
								<a class="cart_quantity_down" href=""> - </a>
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
		<div class="col-sm-6">
			<div class="chose_area">
				<ul class="user_option">
					<li>
						<input type="checkbox">
						<label>sử dụng mã giảm giá</label>
					</li>
					<li>
						<input type="checkbox">
						<label>sủ dụng phiếu quà tặng</label>
					</li>
					<li>
						<input type="checkbox">
						<label>ước tính vận chuyển</label>
					</li>
				</ul>
				<ul class="user_info">
					<li class="single_field">
						<label>quốc gia:</label>
						<select>
							<option>United States</option>
							<option>Bangladesh</option>
							<option>UK</option>
							<option>India</option>
							<option>Pakistan</option>
							<option>Ucrane</option>
							<option>Canada</option>
							<option>Dubai</option>
						</select>
						
					</li>
					<li class="single_field">
						<label>thành phố:</label>
						<select>
							<option>Select</option>
							<option>Dhaka</option>
							<option>London</option>
							<option>Dillih</option>
							<option>Lahore</option>
							<option>Alaska</option>
							<option>Canada</option>
							<option>Dubai</option>
						</select>
					
					</li>
					<li class="single_field zip-field">
						<label>Zip Code:</label>
						<input type="text">
					</li>
				</ul>
				<a class="btn btn-default update" href="">Get Quotes</a>
				<a class="btn btn-default check_out" href="">Continue</a>
			</div>
		</div>
		<div class="col-sm-6">
			<div class="total_area">
				<ul>
					<li>Tổng tiền <span>{{ Cart::initial() }} VNĐ</span></li>
					<li>Thuế VAT <span>{{ Cart::tax() }} VNĐ</span></li>
					<li>phí vận chuyển <span>pree</span></li>
					<li>thành tiền <span>{{ Cart::total() }}VNĐ</span></li>
				</ul>
					<a class="btn btn-default update" href="">Update</a>
					<a class="btn btn-default check_out" href="">Check Out</a>
			</div>
		</div>
	</div>
</section><!--/#do_action-->
	
@endsection