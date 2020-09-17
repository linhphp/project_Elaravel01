@extends('admin_layout')
@section('admin_content')
<div class="form-w3layouts">
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Cập nhật danh mục sản phẩm
                </header>
                @if(Session::has('message'))
                <div class="alert-success text-center">
                    {{ Session::get('message') }}
                </div>
                @endif
                <div class="panel-body">
                    <div class="position-center">
                        <form role="form" action="{{ route('danh-muc-san-pham.update',$cate_pro->id) }}" method="post">
                            @method('PATCH')
                            @csrf
                        <div class="form-group">
                            <label for="">Tên danh mục</label>
                            <input type="text" name='category_product' class="form-control" placeholder="Enter email" value="{{ $cate_pro->cate_name }}">
                        </div>
                        <div class="form-group">
                            <label for="">mô tả sản phẩm</label>
                            <textarea name="category_product_desc" rows="5" style="resize: none;" class="form-control"  placeholder="mô tả danh mục sản phẩm">{{ $cate_pro->category_desc }}</textarea>
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