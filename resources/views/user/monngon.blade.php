@extends('master_user')<!-- ke thua tu trang mmaster-->
<!--thay the noi dung da mat - thay vao cho #yield('contend')-->
@section('title')
	mon ngon
@endsection
@section('content')
<div class="container">
		<div id="content">
			<div class="our-history">
				<h2 class="text-center wow fadeInDown">MÓN NGON GỢI Ý</h2>
				<div class="space35">&nbsp;</div>

					<div class="history-slider">
						<div class="history-slides">
							<div> 
								@foreach($monngon as $tt)
									<div class="row">
										<div class="col-sm-5">
											<img src="../user/image/images/{{$tt->monngon_anh}} " width="470" height="320" alt="">
										</div>
										<div class="col-sm-7">
											<h5 class="other-title">{{$tt->monngon_tieu_de}}</h5>
											<div class="space20">&nbsp;</div>
											<p ><?php echo $tt->monngon_tom_tat;?></p>
										</div>
									</div> 
								@endforeach
							</div>
						</div>
					</div>
			</div>

			<div class="space50">&nbsp;</div>
			<hr />
		
			<h2 class="text-center wow fadeInDownwow fadeInDown">CÁC MÓN NGON KHÁC</h2>
			<div class="space20">&nbsp;</div>
			<h5 class="text-center other-title wow fadeInLeft">Tốt cho sức khỏe</h5>
			<p class="text-center wow fadeInRight">Chúng tôi luôn tìm các để cải thiện bữa cơm của bạn <br />hãy đồng hành cùng chúng tôi</p>
			<div class="space20">&nbsp;</div>
			<div class="row">
				@foreach($monngon as $tt)
				<div class="col-sm-6 wow fadeInLeft">
					<div class="beta-person media">
						<img src="../user/image/images/{{$tt->monngon_anh}} " width="270" height="285" alt="">
					
						<div class="media-body beta-person-body">
							<h5>{{$tt->monngon_tieu_de}}</h5>
							<p class="font-large">Thành phần món ăn</p>
							<p style="overflow-y: auto;height: 100px;">
								<?php echo $tt->monngon_noi_dung;?>
							</p>
						</div>
					</div>
				</div>
				@endforeach
				
			</div>
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection