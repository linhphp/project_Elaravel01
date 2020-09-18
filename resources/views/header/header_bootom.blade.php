<div class="header-bottom"><!--header-bottom-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="mainmenu pull-left">
                            <ul class="nav navbar-nav collapse navbar-collapse">
                                <li><a href="{{ route('home') }}" class="active">Trang chủ</a></li>
                                <li class="dropdown"><a>Sản phẩm<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        @foreach($cate_products as $key => $value)
                                        <li><a href="{{ route('cate_pro',$value) }}">{{ $key }}</a></li>
                                        @endforeach
                                    </ul>
                                </li> 
                                <li class="dropdown"><a href="#">Tin tức{{-- <i class="fa fa-angle-down"></i> --}}</a>
                                </li> 
                                <li><a href="404.html">Giỏ hàng</a></li>
                                <li><a href="contact-us.html">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <form action="{{ route('product.seach',) }}" method="get">
                            <div class="search_box pull-right">
                                <input style="width: 70%;" type="text" name="key" placeholder="Search"/>
                                <input style="width: 25%;" class="btn" type="submit" name="submit" value="seach">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div><!--/header-bottom-->
        @if(Session::has('payment'))
    <h2 class="title text-center">Đặt hàng thành công</h2>
    @endif
        