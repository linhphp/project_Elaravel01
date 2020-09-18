<div class="header-middle"><!--header-middle-->
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <div class="logo pull-left">
                    <a href="index.html"><img src="frontend/image/logo.png'" alt="" /></a>
                </div>
                <div class="btn-group pull-right">
                    <div class="btn-group">
                        <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                            USA
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a href="#">Canada</a></li>
                            <li><a href="#">UK</a></li>
                        </ul>
                    </div>
                    
                    <div class="btn-group">
                        <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                            DOLLAR
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a href="#">Canadian Dollar</a></li>
                            <li><a href="#">Pound</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="shop-menu pull-right">
                    <ul class="nav navbar-nav">
                        <li><a href="#"><i class="fa fa-star"></i> yêu thích</a></li>
                        <li><a href="{{ route('showCart') }}"><i class="fa fa-shopping-cart"></i>
                        giỏ hàng
                        @if(Cart::content() != '[]') 
                        <span style="color: darkred; font-family: bold;">{{ Cart::count() }}</span>
                        @endif
                        </a></li>
                        @if((Session::has('cus_id')) || (Session::has('shipping')))
                        <li><a>{{ Session::get('cus_name') }}</a></li>
                            <li><a href="{{ route('checkout.out') }}"><i class="fa fa-crosshairs"></i> thanh toán</a></li>
                        @else
                            <li><a href="{{ route('checkout.login') }}"><i class="fa fa-crosshairs"></i> thanh toán</a></li>
                        @endif
                        @if(Session::has('cus_id'))
                            <form style="display: inline;" action="{{ route('checkout.logout',Session::get('cus_id')) }}" method="post">
                                @method('POST')
                                @csrf
                                <li><button class="btn btn-default" style="border: 0; color: #696763;padding: 0;padding-right: 0;margin-top: 10px;"><a><i class="fa fa-lock"></i> đăng xuất</a></button></li>
                            </form>
                        @else
                        <li><a href="{{ route('checkout.login') }}"><i class="fa fa-lock"></i> đăng nhập</a></li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
    </div><!--/header-middle-->