@extends('master_user_shop')<!-- ke thua tu trang mmaster-->
<!--thay the noi dung da mat - thay vao cho #yield('contend')-->
@section('title')
quan ly shop
@endsection
@section('content')
<section id="main-content">
<section class="wrapper">
    <!-- //market-->
    <div class="market-updates">
        <div class="col-md-3 market-update-gd">
            <div class="market-update-block clr-block-2">
                <div class="col-md-4 market-update-right">
                    <i style="font-size: 50px; color: white" class="fa fa-cubes"> </i>
                </div>
                <div class="col-md-8 market-update-left">
                    <h4>Product</h4>
                    <h3>{{$spm}}</h3>
                    <p>Khách hàng đặt hàng</p>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
        <div class="col-md-3 market-update-gd" >
            <div class="market-update-block clr-block-1">
                <div class="col-md-4 market-update-right">
                    <i class="fa fa-users" ></i>
                </div>
                <div class="col-md-8 market-update-left">
                    <h4>Customer</h4>
                    <h3>{{$sl_user}}</h3>
                    <p>khách hàng ghé thăm shop</p>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
        <div class="col-md-3 market-update-gd">
            <div class="market-update-block clr-block-3">
                <div class="col-md-4 market-update-right">
                    <i class="fa fa-usd"></i>
                </div>
                <div class="col-md-8 market-update-left">
                    <h4>Sales</h4>
                    <h3>{{$total_sale}}</h3>
                    <p>Sản phẩm giảm giá</p>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
        <div class="col-md-3 market-update-gd">
            <div class="market-update-block clr-block-4">
                <div class="col-md-4 market-update-right">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                </div>
                <div class="col-md-8 market-update-left">
                    <h4>Orders</h4>
                    <h3>{{number_format($total_money)}} vnđ</h3>
                    <p>Doanh thu của shop theo năm</p>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
        <div class="clearfix"> </div>
    </div>
    <!-- //market-->
    @if(Session::has('thongbao001'))
    <div class="alert alert-success">
        <h4 style="color: #5200cc; text-align: center;"> {{Session::get('thongbao001')}} </h4>
    </div>
    @endif 
    @if(Session::has('thongbao_loi_004'))
    <div class="alert alert-success">
        <h4 style="color: #5200cc; text-align: center;"> {{Session::get('thongbao_loi_004')}} </h4>
    </div>
    @endif
    <div class="agil-info-calendar">
        <!-- tasks -->
        <div class="col-md-12  agile-calendar">
            <h2 style="text-align: center;"><b>DOANH THU TRONG NĂM</b></h2>
            <br>
            <div id="linechart" style=" height: 500px"></div>
            <script type="text/javascript">
                var visitor = <?php echo $visitor; ?>;
                console.log(visitor);
                google.charts.load('current', {'packages':['corechart']});
                google.charts.setOnLoadCallback(drawChart);
                function drawChart() {
                  var data = google.visualization.arrayToDataTable(visitor);
                  var options = {
                    title: 'Thông kê số lượng đơn hàng và người đặt hàng',
                    curveType: 'function',
                    legend: { position: 'bottom' }
                  };
                  var chart = new google.visualization.LineChart(document.getElementById('linechart'));
                  chart.draw(data, options);
                }
            </script>
        </div>
        <div class="clearfix"> </div>
    </div>
    <!-- //tasks -->
    <!-- calendar -->
    <div class="col-md-6 agile-calendar">
        <div class="calendar-widget">
            <div class="panel-heading ui-sortable-handle">
                <span class="panel-icon">
                <i class="fa fa-calendar-o"></i>
                </span>
                <span class="panel-title"> Calendar Widget</span>
            </div>
            <!-- grids -->
            <div class="agile-calendar-grid">
                <div class="page">
                    <div class="w3l-calendar-left">
                        <div class="calendar-heading">
                        </div>
                        <div class="monthly" id="mycalendar"></div>
                    </div>
                    <div class="clearfix"> </div>
                </div>
            </div>
        </div>
    </div>
    <!-- //calendar -->
    <div class="col-md-6 w3agile-notifications">
        <div class="notifications">
            <!--notification start-->
            <header class="panel-heading">
                Notification 
            </header>
            <div class="notify-w3ls">
                <div class="alert alert-info clearfix">
                    <span class="alert-icon"><i class="fa fa-envelope-o"></i></span>
                    <div class="notification-info">
                        <ul class="clearfix notification-meta">
                            <li class="pull-left notification-sender"><span><a href="#">Jonathan Smith</a></span> send you a mail </li>
                            <li class="pull-right notification-time">1 min ago</li>
                        </ul>
                        <p>
                            Urgent meeting for next proposal
                        </p>
                    </div>
                </div>
                <div class="alert alert-danger">
                    <span class="alert-icon"><i class="fa fa-facebook"></i></span>
                    <div class="notification-info">
                        <ul class="clearfix notification-meta">
                            <li class="pull-left notification-sender"><span><a href="#">Jonathan Smith</a></span> mentioned you in a post </li>
                            <li class="pull-right notification-time">7 Hours Ago</li>
                        </ul>
                        <p>
                            Very cool photo jack
                        </p>
                    </div>
                </div>
                <div class="alert alert-success ">
                    <span class="alert-icon"><i class="fa fa-comments-o"></i></span>
                    <div class="notification-info">
                        <ul class="clearfix notification-meta">
                            <li class="pull-left notification-sender">You have 5 message unread</li>
                            <li class="pull-right notification-time">1 min ago</li>
                        </ul>
                        <p>
                            <a href="#">Anjelina Mewlo, Jack Flip</a> and <a href="#">3 others</a>
                        </p>
                    </div>
                </div>
                <div class="alert alert-warning ">
                    <span class="alert-icon"><i class="fa fa-bell-o"></i></span>
                    <div class="notification-info">
                        <ul class="clearfix notification-meta">
                            <li class="pull-left notification-sender">Domain Renew Deadline 7 days ahead</li>
                            <li class="pull-right notification-time">5 Days Ago</li>
                        </ul>
                        <p>
                            Next 5 July Thursday is the last day
                        </p>
                    </div>
                </div>
                <div class="alert alert-info clearfix">
                    <span class="alert-icon"><i class="fa fa-envelope-o"></i></span>
                    <div class="notification-info">
                        <ul class="clearfix notification-meta">
                            <li class="pull-left notification-sender"><span><a href="#">Jonathan Smith</a></span> send you a mail </li>
                            <li class="pull-right notification-time">1 min ago</li>
                        </ul>
                        <p>
                            Urgent meeting for next proposal
                        </p>
                    </div>
                </div>
            </div>
            <!--notification end-->
        </div>
    </div>
    <div class="clearfix"> </div>
    </div>
</section>
@endsection