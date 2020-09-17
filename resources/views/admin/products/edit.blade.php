@extends('admin_layout')
@section('admin_content')
<div class="form-w3layouts">
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                   Cập nhật sản phẩm
                </header>
                @if(Session::has('message'))
                <div class="alert-success text-center">
                    {{ Session::get('message') }}
                </div>
                @endif
                <div class="panel-body">
                    <div class="position-center">
                        <form role="form" action="{{ route('san-pham.update',$product->id) }}" method="post" enctype="multipart/form-data">
                            @method('PATCH')
                            @csrf
                        <div class="form-group">
                            <label for="">Tên sản phẩm</label>
                            <input type="text" name='name' class="form-control" placeholder="Enter name" value="{{ $product->product_name }}">
                        </div>
                        <div class="form-group">
                            <label for="">Giá sản phẩm</label>
                            <input type="text" name='unit_price' class="form-control" placeholder="Enter name" value="{{ $product->unit_price }}">
                        </div>
                        <div class="form-group">
                            <label for="">Giá khuyến mãi</label>
                            <select name="promotion" class="form-control input-sm m-bot15">
                                <option value="0">0%</option>
                                <option value="10">10%</option>
                                <option value="25">25%</option>
                                <option value="50">50%</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Hình ảnh sản phẩm</label>
                            <input type="file" name='image' class="form-control" >
                        </div>
                        
                        <div class="form-group">
                            <label for="">mô tả sản phẩm</label>
                            <textarea name="desc" rows="5" style="resize: none;" class="form-control"  placeholder="mô tả thương hiệu sản phẩm">{{ $product->desc }}</textarea>
                        </div>
                        
                        <div class="form-group">
                            <label for="">danh mục sản phẩm</label>

                            <select name="cate" class="form-control input-sm m-bot15">
                                @foreach($cates as $key =>$valuecate)
                                @if($valuecate == $product->cate_id)
                                    <option selected value="{{ $valuecate }}">{{ $key }}</option>
                                @else
                                    <option value="{{ $valuecate }}">{{ $key }}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">thương hiệu sản phẩm</label>

                            <select name="brand" class="form-control input-sm m-bot15">
                                @foreach($brand as $key =>$valuebr)
                                @if($valuebr == $product->brand_id)
                                <option selected value="{{ $valuebr }}">{{ $key }}</option>
                                @else
                                <option value="{{ $valuebr }}">{{ $key }}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">nội dung sản phẩm</label>
                            <textarea rows='5' name="content" id="editor" rows="5" style="resize: none;" class="form-control"  placeholder="nội dung sản phẩm">{{ $product->content }}</textarea>
                        </div>
                        
                        <button type="submit" class="btn btn-info">cập nhật sản phẩm</button>
                    </form>
                    </div>

                </div>
            </section>
        </div>
    </div>
</div>
<script type="text/javascript">
    $('select[name="cate"]').on('change',function(){
        var id_cate = $(this).val();
        // console.log(id_cate);
        if(id_cate){
            $.ajax({
                url: 'san-pham/cate/'+id_cate,
                type: 'GET',
                dataType: 'json',
                success: function(data){
                    $('select[name="brand"]').empty();
                    
                    $.each(data,function(key,value){
                        $('select[name="brand"]').append(
                            '<option value = "'+value+'">'+key+'</option>'
                            );
                    });
                }
            });
        }
        else{
            $('select[name="brand"]').empty();
            $('select[name="brand"]').append('<option>'+'--chưa chọn danh mục--'+'</option>');
        }
    });
</script>
<script>
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
@endsection