@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Thông tin người mua
    </div>
    @if(Session::has('message'))
    <div class="alert-success">{{ Session::get('message') }}</div>
    @endif
    <div class="row w3-res-tb">
      <div class="col-sm-5 m-b-xs">
        <select class="input-sm form-control w-sm inline v-middle">
          <option value="0">Bulk action</option>
          <option value="1">Delete selected</option>
          <option value="2">Bulk edit</option>
          <option value="3">Export</option>
        </select>
        <button class="btn btn-sm btn-default">Apply</button>                
      </div>
      <div class="col-sm-4">
      </div>
      <div class="col-sm-3">
        <div class="input-group">
          <input type="text" class="input-sm form-control" placeholder="Search">
          <span class="input-group-btn">
            <button class="btn btn-sm btn-default" type="button">Go!</button>
          </span>
        </div>
      </div>
    </div>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th style="width:20px;">
              <label class="i-checks m-b-none">
                <input type="checkbox"><i></i>
              </label>
            </th>
            <th>tên khách hàng</th>
        	<th>số điện thoại</th>    
        </tr>
        </thead>
        <tbody>
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td>{{ $customer->customers_name }}</td>
            <td>{{ $customer->phone }}</td>
            
          </tr>
        </tbody>
      </table>

    </div>
    {{-- /////////////////////// --}}
    <div class="table-agile-info">
  		<div class="panel panel-default">
		    <div class="panel-heading">
		      địa chỉ giao hàng
		    </div>
		</div>
	</div>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th style="width:20px;">
              <label class="i-checks m-b-none">
                <input type="checkbox"><i></i>
              </label>
            </th>
            <th>tên người đặt</th>
            <th>địa chỉ</th>
            <th>số điện thoại</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td>{{ $shipping->shipping_name }}</td>
            <td>{{ $shipping->address }}</td>
            <td>{{ $shipping->phone }}</td>
           
            
          </tr>
        </tbody>
      </table>

    </div>

    {{-- ///////////////////////////////////// --}}
    <div class="table-agile-info">
  		<div class="panel panel-default">
		    <div class="panel-heading">
		      chi tiết sản phẩm đơn hàng
		    </div>
		</div>
	</div>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th style="width:20px;">
              <label class="i-checks m-b-none">
                <input type="checkbox"><i></i>
              </label>
            </th>
            <th>tên sản phẩm</th>
            <th>số lượng</th>
            <th>Giá</th>
            <th>tổng tiền (chưa VAT)</th>
          </tr>
        </thead>
        <tbody>
        	@foreach($order_detail as $detail)
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td>{{ $detail['product_name'] }}</td>
            <td>{{ $detail['product_quantity'] }}</td>
            <td>{{ $detail['product_price'] }}</td>
            <td>{{ ($detail['product_price'])*($detail['product_quantity']) }}</td>
           @endforeach
            
          </tr>
        </tbody>
      </table>

    </div>

    {{-- ///////////////////////////////////// --}}
    
  </div>
</div>
@endsection
