@extends('master_user_shop')<!-- ke thua tu trang mmaster-->
<!--thay the noi dung da mat - thay vao cho #yield('contend')-->
@section('title')
	xem đơn hàng shop
@endsection
@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header"><br></h1>
			</div>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-xs-12 col-md-12 col-lg-12">
				@if(Session::has('thongbao_30'))
					<div class="alert alert-success">{{Session::get('thongbao_30')}} </div>
				@endif

				@if(Session::has('thongbao_loi_30'))
					<div class="alert alert-danger">{{Session::get('thongbao_loi_30')}} </div>
				@endif
				<div class="panel panel-primary">
					<h3><div class="panel-heading"><b>Xem đơn hàng shop<b></div> </h3>
					<div class="panel-body">
						<div class="bootstrap-table">
							<div class="table-responsive">
								<table class="table table-bordered" style="margin-top:20px;">				
									<thead>
										<tr class="bg-primary">
											<th style="color: black;">ID</th>
											<th style="color: black;">Người nhận</th>
											<th style="color: black;">Tin nhắn</th>
											<th style="color: black;">Email</th>
											<th style="color: black;">Sđt</th>
											<th style="color: black;">Địa chỉ</th>
											<th style="color: black;">Tổng tiền</th>
											<th style="color: black;">Hình thức thanh toán</th>
											<th style="color: black;">TT hóa đơn</th>
											<th style="color: black;">Tùy chọn</th>
										</tr>
									</thead>
									<tbody>
										@foreach($donhang as $dh)
										<tr>
											<td style="color: black;">{{$dh->id}}</td>
											<td style="color: black;">{{$dh->donhang_nguoi_nhan}}</td>
											<td style="color: black;"><?php echo $dh->donhang_ghi_chu;?></td>
											<td style="color: black;">{{$dh->donhang_nguoi_nhan_email}}</td>
											<td style="color: black;">{{$dh->donhang_nguoi_nhan_sdt}}</td>
											<td style="color: black;">{{$dh->donhang_nguoi_nhan_dia_chi}}</td>
											<td style="color: black;">{{$dh->donhang_tong_tien}}</td>
											<td style="color: black;">{{$dh->hinhthucthanhtoan}}</td>
											<th>
												@if($dh->tinhtranghd_id==1)
													<input type="submit" class="btn btn-fefault" style="background:  #4dffff; color: red;  margin-left: 15px; font-size: 20px;"  value="chưa xác nhận">
												@elseif($dh->tinhtranghd_id==2)
													<input type="submit" class="btn btn-fefault" style="background:  #4dffff; color: red;  margin-left: 15px; font-size: 20px;"  value="giao hàng">
												@elseif($dh->tinhtranghd_id==3)
													<input type="submit" class="btn btn-fefault" style="background:  #4dffff; color: red;  margin-left: 15px; font-size: 20px;"  value="đã hủy">
												@else
													<input type="submit" class="btn btn-fefault" style="background:  #4dffff; color: red;  margin-left: 15px; font-size: 20px;"  value="đã thanh toán">
												@endif
											</th>
											<td>
												<a href="{{route('suadonhangshop',$dh->id)}}" class="btn btn-success" ><i class="fa fa-trash" aria-hidden="true"></i> Sửa</a>
												
												<a href="{{route('xoadonhangshop',$dh->id)}}" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa phần tử này ?')"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</a>
											</td>
										</tr>
										@endforeach
									</tbody>
								</table>
								<div class="row" style="margin-left: 15px">
	                                {{$donhang->links()}}
	                            </div>							
							</div>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
		</div><!--/.row-->
	</div>
@endsection