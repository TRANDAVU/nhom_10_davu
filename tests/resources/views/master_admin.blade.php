<!DOCTYPE html>
<head>
<base href="{{ asset('public/admin') }}/">
<title>@yield('title')</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/bootstrap.min.css" >
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="css/style-responsive.css" rel="stylesheet"/>
<link rel="stylesheet" href="css/font.css" type="text/css"/>
<link href="css/font-awesome.css" rel="stylesheet"> 
<link rel="stylesheet" href="css/morris.css" type="text/css"/>
<link rel="stylesheet" href="css/monthly.css">
<script src="js/jquery2.0.3.min.js"></script>
<script src="js/raphael-min.js"></script>
<script src="js/morris.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script src="//cdn.ckeditor.com/4.13.1/full/ckeditor.js"></script>
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="ckfinder/ckfinder.js"></script>
<script type="text/javascript" src="ckeditor/ckeditor.js"> </script>

</head>
<body>
    <div id="container">
        <!--header start-->
        <header class="header fixed-top clearfix">
            <!--logo start-->
            <div class="brand">
                <a href="{{route('admin_home')}}" class="logo">
                    <b>VEGEFOODS</b>
                </a>
                <div class="sidebar-toggle-box">
                    <div class="fa fa-bars"></div>
                </div>
            </div>
            <!--logo end-->
            <div class="nav notify-row" id="top_menu">
                <!--  notification start -->
                <?php 
                    use App\donhang;
                    $tb_dathang=donhang::where('tinhtranghd_id','=',1)->count();
                ?>
                <ul class="nav top-menu">
                    <li id="header_notification_bar" class="dropdown" title="Bill chưa xử lý">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <i class="fa fa-bell-o"></i>
                        <span class="badge bg-warning"><?php echo $tb_dathang ;?></span>
                        </a>
                    </li>
                    <!-- notification dropdown end -->
                </ul>
                <!--  notification end -->
            </div>
            <div class="top-nav clearfix">
                <!--search & user info start-->
                <ul class="nav pull-right top-menu">
                    <li>
                        <form role="search" method="get" id="searchform" action="{{route('searchphamall')}}">
                            <input type="text" class="form-control search" name="skey" placeholder=" Search">
                        </form>
                        
                    </li>
                    <!-- user login dropdown start-->
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        @if(Auth::check()==true)
                        <img alt="" src="images/2.png">
                        <span class="username">{{Auth::user()->name}}</span>
                        @endif
                        <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu extended logout">
                            <li><a href="{{route('dangxuatadmin')}}"><i class="fa fa-key"></i> Log Out</a></li>
                        </ul>
                    </li>
                    <!-- user login dropdown end -->
                </ul>
                <!--search & user info end-->
            </div>
        </header>
        <!--header end-->
        <!--sidebar start-->
        <aside>
            <div id="sidebar" class="nav-collapse">
                <!-- sidebar menu start-->
                <div class="leftside-navigation">
                    <ul class="sidebar-menu" id="nav-accordion">
                        <li>
                            <a class="active" href="{{route('trangchu')}}">
                            <i class="fa fa-dashboard"></i>
                            <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="sub-menu">
                            <a href="javascript:;">
                            <i class="fa fa-book"></i>
                            <span>QUẢNG CÁO</span>
                            </a>
                            <ul class="sub">
                                <li><a href="{{route('themslide')}}">THÊM</a></li>
                                <li><a href="{{route('xem_slide')}}">XEM</a></li>
                            </ul>
                        </li>
                        <li class="sub-menu">
                            <a href="javascript:;">
                            <i class="fa fa-book"></i>
                            <span>ĐƠN HÀNG</span>
                            </a>
                            <ul class="sub">
                                <li><a href="{{route('donhang')}}">XEM</a></li>
                            </ul>
                        </li>
                        <li class="sub-menu">
                            <a href="javascript:;">
                            <i class="fa fa-book"></i>
                            <span>CHI TIẾT ĐƠN HÀNG</span>
                            </a>
                            <ul class="sub">
                                <li><a href="{{route('chitietdonhang')}}">XEM</a></li>
                            </ul>
                        </li>
                        <li class="sub-menu">
                            <a href="javascript:;">
                            <i class="fa fa-book"></i>
                            <span>ĐƠN VỊ TÍNH</span>
                            </a>
                            <ul class="sub">
                                <li><a href="{{route('themdonvitinh')}}">THÊM</a></li>
                                <li><a href="{{route('don_vi_tinh')}}">XEM</a></li>
                            </ul>
                        </li>
                        <li class="sub-menu">
                            <a href="javascript:;">
                            <i class="fa fa-book"></i>
                            <span>KHÁCH HÀNG</span>
                            </a>
                            <ul class="sub">
                                <li><a href="{{route('khachhang')}}">XEM</a></li>
                            </ul>
                        </li>
                        <li class="sub-menu">
                            <a href="javascript:;">
                            <i class="fa fa-book"></i>
                            <span>LOẠI NGƯỜI DÙNG</span>
                            </a>
                            <ul class="sub">
                                <li><a href="{{route('themloainguoidung')}}">THÊM</a></li>
                                <li><a href="{{route('loainguoidung')}}">XEM</a></li>
                            </ul>
                        </li>
                        <li class="sub-menu">
                            <a href="javascript:;">
                            <i class="fa fa-book"></i>
                            <span>LOẠI SẢN PHẨM</span>
                            </a>
                            <ul class="sub">
                                <li><a href="{{route('themloaisanphamall')}}">THÊM</a></li>
                                <li><a href="{{route('loaisanphamall')}}">XEM</a></li>
                            </ul>
                        </li>
                        <li class="sub-menu">
                            <a href="javascript:;">
                            <i class="fa fa-book"></i>
                            <span>LÔ HÀNG</span>
                            </a>
                            <ul class="sub">
                                <li><a href="{{route('themlohang')}}">THÊM</a></li>
                                <li><a href="{{route('lohang')}}">XEM</a></li>
                            </ul>
                        </li>
                        <li class="sub-menu">
                            <a href="javascript:;">
                            <i class="fa fa-book"></i>
                            <span>MÓN NGON</span>
                            </a>
                            <ul class="sub">
                                <li><a href="{{route('themmonngon')}}">THÊM</a></li>
                                <li><a href="{{route('monngonall')}}">XEM</a></li>
                            </ul>
                        </li>
                        
                        <li class="sub-menu">
                            <a href="javascript:;">
                            <i class="fa fa-book"></i>
                            <span>NHÀ CUNG CẤP</span>
                            </a>
                            <ul class="sub">
                                <li><a href="{{route('themnhacungcap')}}">THÊM</a></li>
                                <li><a href="{{route('nhacungcap')}}">XEM</a></li>
                            </ul>
                        </li>
                        <!--
                        <li class="sub-menu">
                            <a href="javascript:;">
                            <i class="fa fa-book"></i>
                            <span>NHÂN VIÊN</span>
                            </a>
                            <ul class="sub">
                                <li><a href="{{route('nhanvien')}}">XEM</a></li>
                            </ul>
                        </li>
                        -->
                        <li class="sub-menu">
                            <a href="javascript:;">
                            <i class="fa fa-book"></i>
                            <span>SẢN PHẨM</span>
                            </a>
                            <ul class="sub">
                                <li><a href="{{route('sanphamall')}}">XEM</a></li>
                            </ul>
                        </li>
                        <li class="sub-menu">
                            <a href="javascript:;">
                            <i class="fa fa-book"></i>
                            <span>SHOP</span>
                            </a>
                            <ul class="sub">
                                <li><a href="{{route('themshop')}}">THÊM</a></li>
                                <li><a href="{{route('shop')}}">XEM</a></li>
                            </ul>
                        </li>
                        <li class="sub-menu">
                            <a href="javascript:;">
                            <i class="fa fa-book"></i>
                            <span>TÌNH TRẠNG HÓA ĐƠN</span>
                            </a>
                            <ul class="sub">
                                <li><a href="{{route('tinhtranghoadon')}}">XEM</a></li>
                            </ul>
                        </li>
                        
                        <li class="sub-menu">
                            <a href="javascript:;">
                            <i class="fa fa-book"></i>
                            <span>User</span>
                            </a>
                            <ul class="sub">
                                <li><a href="{{route('themuser')}}">THÊM</a></li>
                                <li><a href="{{route('user')}}">XEM</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <!-- sidebar menu end-->
            </div>
        </aside>
        <!--sidebar end-->
        <!--main content start-->
        @yield('content')
    </div>
    <!--main content end-->
<script src="js/bootstrap.js"></script>
<script src="js/jquery.dcjqaccordion.2.7.js"></script>
<script src="js/scripts.js"></script>
<script src="js/jquery.slimscroll.js"></script>
<script src="js/jquery.nicescroll.js"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="js/jquery.scrollTo.js"></script>

@yield('js')
<!-- morris JavaScript -->  
<script>
    $(document).ready(function() {
        //BOX BUTTON SHOW AND CLOSE
       jQuery('.small-graph-box').hover(function() {
          jQuery(this).find('.box-button').fadeIn('fast');
       }, function() {
          jQuery(this).find('.box-button').fadeOut('fast');
       });
       jQuery('.small-graph-box .box-close').click(function() {
          jQuery(this).closest('.small-graph-box').fadeOut(200);
          return false;
       });
       
        //CHARTS
        function gd(year, day, month) {
            return new Date(year, month - 1, day).getTime();
        }
        
        graphArea2 = Morris.Area({
            element: 'hero-area',
            padding: 10,
        behaveLikeLine: true,
        gridEnabled: false,
        gridLineColor: '#dddddd',
        axes: true,
        resize: true,
        smooth:true,
        pointSize: 0,
        lineWidth: 0,
        fillOpacity:0.85,
            data: [
                {period: '2015 Q1', iphone: 2668, ipad: null, itouch: 2649},
                {period: '2015 Q2', iphone: 15780, ipad: 13799, itouch: 12051},
                {period: '2015 Q3', iphone: 12920, ipad: 10975, itouch: 9910},
                {period: '2015 Q4', iphone: 8770, ipad: 6600, itouch: 6695},
                {period: '2016 Q1', iphone: 10820, ipad: 10924, itouch: 12300},
                {period: '2016 Q2', iphone: 9680, ipad: 9010, itouch: 7891},
                {period: '2016 Q3', iphone: 4830, ipad: 3805, itouch: 1598},
                {period: '2016 Q4', iphone: 15083, ipad: 8977, itouch: 5185},
                {period: '2017 Q1', iphone: 10697, ipad: 4470, itouch: 2038},
            
            ],
            lineColors:['#eb6f6f','#926383','#eb6f6f'],
            xkey: 'period',
            redraw: true,
            ykeys: ['iphone', 'ipad', 'itouch'],
            labels: ['All Visitors', 'Returning Visitors', 'Unique Visitors'],
            pointSize: 2,
            hideHover: 'auto',
            resize: true
        });
        
       
    });
    </script>
<!-- calendar -->
    <script type="text/javascript" src="js/monthly.js"></script>
    <script type="text/javascript">
        $(window).load( function() {

            $('#mycalendar').monthly({
                mode: 'event',
                
            });

            $('#mycalendar2').monthly({
                mode: 'picker',
                target: '#mytarget',
                setWidth: '250px',
                startHidden: true,
                showTrigger: '#mytarget',
                stylePast: true,
                disablePast: true
            });

        switch(window.location.protocol) {
        case 'http:':
        case 'https:':
        // running on a server, should be good.
        break;
        case 'file:':
        alert('Just a heads-up, events will not work when run locally.');
        }

        });
    </script>
    <!-- //calendar -->
</body>
</html>
