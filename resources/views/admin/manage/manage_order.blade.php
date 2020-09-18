@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      liệt kê  đơn hàng
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
            <th>tên người đặt</th>
            <th>tổng giá tiền</th>
            <th>tình trạng</th>
            <th>Hiển thị</th>
            <th>truy vấn</th>
          </tr>
        </thead>
        <tbody>
          @foreach($orders as $order)
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td>{{ $order->customers_name }}</td>
            <td>{{ $order->total }} VNĐ</td>
            <td>{{ $order->status }}</td>
            <td>
              <a href="{{ route('quan-ly-don-hang.show',$order->id) }}" class="active text-danger btn btn-light" ui-toggle-class="">show 
                <i class="fa fa-check text-success text-active"></i>
              </a>
            </td>
            <td>
              <form action="{{ route('quan-ly-don-hang.destroy',$order->id) }}" method="post">
                @method('DELETE')
                @csrf
                <button class="btn border-0 btn-light">delete<i class="fa fa-times text-danger text"></i></button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">
        
        <div class="col-sm-5 text-center">
          <small class="text-muted inline m-t-sm m-b-sm">showing {{ count($orders) }} items</small>
        </div>
        <div class="col-sm-7 text-right text-center-xs">                
         {{ $orders->links() }}
        </div>
      </div>
    </footer>
  </div>
</div>
@endsection