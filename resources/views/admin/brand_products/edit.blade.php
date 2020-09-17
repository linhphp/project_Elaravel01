@extends('admin_layout')
@section('admin_content')
<div class="form-w3layouts">
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Cập nhật thương hiệu sản phẩm
                </header>
                @if(Session::has('message'))
                <div class="alert-success text-center">
                    {{ Session::get('message') }}
                </div>
                @endif
                <div class="panel-body">
                    <div class="position-center">
                        <form role="form" action="{{ route('thuong-hieu-san-pham.update',$brand->id) }}" method="post">
                            @method('PATCH')
                            @csrf
                        <div class="form-group">
                            <label for="">Tên thương hiệu</label>
                            <input type="text" name='name' class="form-control" placeholder="Enter name" value="{{ $brand->brand_name }}">
                        </div>
                        <div class="form-group">
                            <label for="">mô tả thương hiệu</label>
                            <textarea name="desc" rows="5" style="resize: none;" class="form-control"  placeholder="mô tả thương hiệu sản phẩm">{{ $brand->desc }}</textarea>
                        </div>
                        
                        <button type="submit" class="btn btn-info">lưu chỉnh sửa</button>
                    </form>
                    </div>

                </div>
            </section>
        </div>
    </div>
</div>
@endsection