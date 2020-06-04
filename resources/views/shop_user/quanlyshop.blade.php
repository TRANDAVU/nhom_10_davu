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
    <?php
        use Carbon\Carbon;
        $year=Carbon::now()->year;
        $month=Carbon::now()->month;
        $day=Carbon::now()->day;
    ?>
    <div class="agil-info-calendar">
        <!-- tasks -->
        <div class="col-md-12  agile-calendar">
            <h2 style="text-align: center;"><b>DOANH THU TRONG NĂM {{$year}}</b></h2>
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

    <div class="market-updates">
        <div class="col-md-3 market-update-gd">
            <div class="market-update-block clr-block-2">
                <div class="col-md-4 market-update-right">
                    <i style="font-size: 50px; color: white" class="fa fa-cubes"> </i>
                </div>
                <div class="col-md-8 market-update-left">
                    <h4>Product</h4>
                    <h3>{{$spmt}}</h3>
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
                    <h3>{{$sl_usert}}</h3>
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
                    <h3>{{$total_salet}}</h3>
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
                    <h3>{{number_format($total_moneyt)}} vnđ</h3>
                    <p>Doanh thu của shop theo năm</p>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
        <div class="clearfix"> </div>
    </div>

   <div class="agil-info-calendar">
        <!-- tasks -->
        <div class="col-md-12  agile-calendar">
            <h4 style="text-align: right;"><b>Ngày {{$day}} tháng {{$month}} năm {{$year}}</b></h4><br>
            <h2 style="text-align: center;"><b>DOANH THU TRONG THÁNG {{$month}}</b></h2> 
            <br>
            <div id="linechartthang" style=" height: 500px"></div>
            <script type="text/javascript">
                var bdt = <?php echo $bdt; ?>;
                console.log(bdt);
                google.charts.load('current', {'packages':['corechart']});
                google.charts.setOnLoadCallback(drawChart);
                function drawChart() {
                  var data = google.visualization.arrayToDataTable(bdt);
                  var options = {
                    title: 'Thông kê số lượng đơn hàng và người đặt hàng',
                    curveType: 'function',
                    legend: { position: 'bottom' }
                  };
                  var chart = new google.visualization.LineChart(document.getElementById('linechartthang'));
                  chart.draw(data, options);
                }
            </script>
        </div>
        <div class="clearfix"> </div>
    </div>
    </div>
</section>
@endsection