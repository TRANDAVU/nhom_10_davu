@extends('master_user')<!-- ke thua tu trang mmaster-->
<!--thay the noi dung da mat - thay vao cho #yield('contend')-->
@section('title')
	gioi thieu
@endsection
@section('content')
<div class="container">
		<div id="content">
			<div class="our-history">
				<h2 class="text-center wow fadeInDown">THÔNG TIN KHUYẾN MÃI</h2>
				<div class="space35">&nbsp;</div>

				<div class="history-slider">
					
					<div class="history-slides">
						@foreach($thongtin as $tt)
						<div> 
							<div class="row">
							<div class="col-sm-5">
								<img src="../user/image/images/{{$tt->loaisanpham_anh}} " width="470" height="320" alt="">
							</div>
							<div class="col-sm-7">
								<h5 class="other-title" style="font-size: 12px; color: #e60099;overflow-y: auto;height: 300px;"><?php echo $tt->loaisanpham_mo_ta;?></h5>
								<div class="space20">&nbsp;</div>
								<p style="font-size: 12px; color: #e60099;overflow-y: auto;height: 200px;"><?php echo $tt->khuyenmai_noi_dung;?></p>
							</div>
							</div> 
						</div>
						@endforeach
					</div>
					
				</div>
			</div>
			<hr />
			<h2 class="text-center wow fadeInDownwow fadeInDown">ĐIỀU HÀNH TRANG WEB</h2>
			<div class="space20">&nbsp;</div>
			<h5 class="text-center other-title wow fadeInLeft">THÀNH VIÊN LẬP TRANG</h5>
			<p class="text-center wow fadeInRight">Lấy khách hàng làm kim chỉ nam<br />hân hạnh phục vụ khách hàng.</p>
			<div class="space20">&nbsp;</div>
			<div class="row">
				@foreach($thongtinweb as $tt)
				<div class="col-sm-6 wow fadeInLeft">
					<div class="beta-person media">
					
						<img class="pull-left" src="../user/image/images/{{$tt->thanhlapweb_anh}}" width="270" height="320" alt="">
					
						<div class="media-body beta-person-body">
							<h5>{{$tt->thanhlapweb_ten}}</h5>
							<p class="font-large">{{$tt->thanhlapweb_chucvu}}</p>
							<p><?php echo $tt->thanhlapweb_thongtin;?></p>
						</div>
					</div>
				</div>
				@endforeach
			</div>
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection