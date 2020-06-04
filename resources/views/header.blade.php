<div id="header">
    <div class="header-top">
        <div class="container">
            <div class="pull-left auto-width-left">
                <ul class="top-menu menu-beta l-inline">
                    <li><a href="https://www.google.com/maps/search/159+thon+2+xa+hoa+phu,+Th%C3%A0nh+ph%E1%BB%91+Bu%C3%B4n+Ma+Thu%E1%BB%99t,+%C4%90%E1%BA%AFk+L%E1%BA%AFk,+Vi%E1%BB%87t+Nam/@12.6170641,107.9384837,17z/data=!3m1!4b1"><i class="fa fa-home fa-2x"></i> 159 THÔN 2 XÃ HÒA PHÚ BMT DAKLAK VIỆT NAM</a></li>
                    <li><a><i class="fa fa-phone fa-2x"></i> 0947 93 40 41</a></li>
                </ul>
            </div>
            <div class="pull-right auto-width-right">
                <ul class="top-details menu-beta l-inline">
                    @if(Auth::check()==true)
                        <li style="padding-top: 10px; width: 200px;">
                            <span> 
                                <img alt="" src="{{Auth::user()->avatar}}" width="50" height="50" style="padding-bottom: 15px;"> 
                                <a>
                                    Hello  @if(empty(Auth::user()->name)) {{Auth::user()->email}} @else {{Auth::user()->name}} @endif
                                </a>
                            </span>
                        </li>
                        <li><a href="{{route('dangxuat')}}">Đăng xuất</a></li>
                    @else
                        <li><a href="{{route('dangkyuser')}}">Đăng kí</a></li>
                        <li><a href="{{route('dangnhap')}}">Đăng nhập</a></li>
                    @endif
                </ul>
            </div>
            <div class="clearfix"></div>
        </div>
        <!-- .container -->
    </div>
    <!-- .header-top -->
    <div class="header-body">
        <div class="container beta-relative">
            <div class="pull-left">
                <a href="{{route('trangchu')}}" id="logo">
                    <h2 style="color: green; text-align: center;"><b>VEGEFOODS</b></h2>
                    Chúng tôi đảm bảo chất lượng cho từng sản phẩm
                </a>
                <br><br>
            </div>
            <div class="pull-right beta-components space-left ov">
                <div class="space10">&nbsp;</div>
                <div class="beta-comp">
                    <form role="search" method="get" id="searchform" action="{{route('search')}}">
                        <input type="text" value="" name="key" id="s" style="color: green;" placeholder="Nhập từ khóa..." />
                        <button class="fa fa-search" type="submit" id="searchsubmit"></button>
                    </form>
                </div>
                <div class="beta-comp">
                    <a href="{{route('giohang')}}" class="beta-btn primary text-center">
                    <i class="fa fa-shopping-cart" style="font-size: 15px;"> Giỏ hàng ( @if(Cart::count()>0) {{Cart::count()}} @elseif(Auth::check()==false) Trống @else Trống @endif )</i>
                    </a>
                    <!-- .cart -->
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
        <!-- .container -->
    </div>
    <!-- .header-body -->
    <div class="header-bottom" style="background-color: rgba(177,25,136,0.9);">
        <div class="container">
            <a class="visible-xs beta-menu-toggle pull-right" href="#"><span class='beta-menu-toggle-text'>Menu</span> <i class="fa fa-bars"></i></a>
            <div class="visible-xs clearfix"></div>
            <nav class="main-menu">
                <ul class="l-inline ov">
                    <li><a href="{{route('trangchu')}}">Trang chủ</a></li>
                    <li>
                        <a >Sản phẩm</a>
                        <ul class="sub-menu">
                            @foreach($loai_sp as $lsp)
                            <li><a href="{{route('loaisanpham',$lsp->id)}}" title="" >{{$lsp->loaisanpham_ten}}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    <li><a href="{{route('gioithieu')}}">Giới thiệu</a></li>
                    <li><a href="{{route('lienhe')}}">Liên hệ</a></li>
                    <li><a href="{{route('monngon')}}">Món ngon</a></li>
                    <!-- Facebook Pixel Code -->
                        <!-- Google Tag Manager -->
                    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
                    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
                    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
                    })(window,document,'script','dataLayer','GTM-KL2J4DJ');</script>
                    <!-- End Google Tag Manager -->
                        
                    <!-- End Facebook Pixel Code -->
                </ul>
                <div class="clearfix"></div>
            </nav>
        </div>
        <!-- .container -->
    </div>
    <!-- .header-bottom -->
</div>
