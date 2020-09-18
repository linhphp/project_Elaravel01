<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>@yield('title')</title>
    <base href="{{ asset('') }}">
    <link href="frontend/css/bootstrap.min.css" rel="stylesheet">
    <link href="frontend/css/font-awesome.min.css" rel="stylesheet">
    <link href="frontend/css/prettyPhoto.css" rel="stylesheet">
    <link href="frontend/css/price-range.css" rel="stylesheet">
    <link href="frontend/css/animate.css" rel="stylesheet">
    <link href="frontend/css/main.css" rel="stylesheet">
    <link href="frontend/css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="{{ ('public/frontend/image/favicon.ico') }}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
    <header id="header"><!--header-->
        @include('header/header_top')
        @include('header/header_middle')
       
    
        @include('header/header_bootom')
    </header><!--/header-->
    @if(Route::currentRouteName() !='checkout.login')
    @include('layout_slide');

    @endif
    <section> <!--content-->
        <div class="container">
            <div class="row">
                 @if(Route::currentRouteName() !='checkout.login')
                <div class="col-sm-3">
                    <div class="left-sidebar">
                        <h2>Danh mục sản phẩm</h2>
                        <div class="panel-group category-products" id="accordian"><!--category-productsr-->
                            @foreach($cate_products as $key =>$value)
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a href="{{ route('cate_pro',$value) }}">{{ $key }}</a></h4>
                                </div>
                            </div>
                            @endforeach
                        </div><!--/category-products-->
                    
                        <div class="brands_products"><!--brands_products-->
                            <h2>Thương hiệu sản phẩm</h2>
                            @foreach($brand_products as $key => $value)
                            <div class="brands-name">
                                <ul class="nav nav-pills nav-stacked">
                                    <li><a href="{{ route('brand',$value) }}"> {{ $key }}</a></li>
                                </ul>
                            </div>
                            @endforeach
                        </div><!--/brands_products-->
                    </div>
                </div>
    @endif
                
                {{-- end sizebar --}}
                <div class="col-sm-9 padding-right overflow-hidden">
                        <!--features_items-->
                   <!--features_items-->
                    @section('content')
                    @show
                                            <!--category-tab-->
                   
                    <!--/category-tab-->
                    
                        <!--recommended_items-->
                    <!--/recommended_items-->
                    
                </div>
            </div>
        </div>
    </section>
    
    @include('layout_footer');
    

  
    <script src="frontend/js/jquery.js"></script>
    <script src="frontend/js/bootstrap.min.js"></script>
    <script src="frontend/js/jquery.scrollUp.min.js"></script>
    <script src="frontend/js/price-range.js"></script>
    <script src="frontend/js/jquery.prettyPhoto.js"></script>
    <script src="frontend/js/main.js"></script>
</body>
</html>