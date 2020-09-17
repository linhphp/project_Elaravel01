@extends('admin_layout')
@section('admin_content')
<div class="form-w3layouts">
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm thương hiệu sản phẩm
                </header>
                @if(Session::has('message'))
                <div class="alert-success text-center">
                    {{ Session::get('message') }}
                </div>
                @endif
                <div class="panel-body">
                    <div class="position-center">
                        <form role="form" action="{{ route('thuong-hieu-san-pham.store') }}" method="post">
                            @method('post')
                            @csrf
                        <div class="form-group">
                            <label for="">Tên thương hiệu</label>
                            <input type="text" name='name' class="form-control" placeholder="Enter name">
                        </div>
                        <div class="form-group">
                            <label for="">mô tả thương hiệu</label>
                            <textarea name="desc" rows="5" style="resize: none;" class="form-control"  placeholder="mô tả thương hiệu sản phẩm"></textarea>
                        </div>
                         <div class="form-group">
                            <select name="status" class="form-control input-sm m-bot15">
                                <option value="0">ẩn</option>
                                <option value="1">hiển thị</option>
                            </select>
                        </div>
                        
                        <button type="submit" class="btn btn-info">thêm thương hiệu sản phẩm</button>
                    </form>
                    </div>

                </div>
            </section>
        </div>
    </div>
</div>
@endsection