@extends('master_admin')
@section('title')
	admin
@endsection
@section('content')
<section id="main-content">
	<section class="wrapper">
		<!-- //market-->
		<div class="market-updates">
			<div class="col-md-3 market-update-gd">
				<div class="market-update-block clr-block-2">
					<div class="col-md-4 market-update-right">
						<i class="fa fa-eye"> </i>
					</div>
					 <div class="col-md-8 market-update-left">
					 <h4>Khách Hàng</h4>
					<h3>{{$total_khach_0}}</h3>
					<p>Khách hàng đã đặt hàng</p>
				  </div>
				  <div class="clearfix"> </div>
				</div>
			</div>
			<div class="col-md-3 market-update-gd">
				<div class="market-update-block clr-block-1">
					<div class="col-md-4 market-update-right">
						<i class="fa fa-users" ></i>
					</div>
					<div class="col-md-8 market-update-left">
					<h4>Người Dùng</h4>
						<h3 style="text-align: center;">{{$sl_user}}</h3>
						<p>Số người đã đăng nhập vào web</p>
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
						<h4>Giảm giá</h4>
						<h3>{{$total_sale}}</h3>
						<p>Số lượng sản phẩm giảm giá</p>
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
						<h4>Đặt hàng</h4>
						<h3>{{number_format($total_money)}} vnd</h3>
						<p>Tổng doanh thu</p>
					</div>
				  <div class="clearfix"> </div>
				</div>
			</div>
		   <div class="clearfix"> </div>
		</div>
		<!-- //market-->
			<div class="panel-body">
				<div class="col-md-12 w3ls-graph">
					<h2 style="text-align: center;"><b>DOANH THU TRONG NĂM</b></h2><br>
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
			</div>
		<!-- calendar -->
		<div class="col-md-6 agile-calendar">

		</div>
		<!-- //calendar -->
		<div class="col-md-6 w3agile-notifications">

		</div>
	</section>
</section>
@endsection
