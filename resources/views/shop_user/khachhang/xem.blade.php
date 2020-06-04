@extends('master_user_shop')<!-- ke thua tu trang mmaster-->
<!--thay the noi dung da mat - thay vao cho #yield('contend')-->
@section('title')
	Khách hàng
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

				@if(Session::has('thongbao_loi_31'))
					<div class="alert alert-danger">{{Session::get('thongbao_loi_31')}} </div>
				@endif
				<div class="panel panel-primary">
					<h3><div class="panel-heading"><b>Danh sách khách hàng<b></div> </h3>
					<div class="panel-body">
						<div class="bootstrap-table">
							<div class="table-responsive">
								<table class="table table-bordered" style="margin-top:20px;">				
									<thead>
										<tr class="bg-primary">
											<th style="color: black;">ID</th>
											<th style="color: black;">Tên khách</th>
											<th style="color: black;">email</th>
											<th style="color: black;">Sđt</th>
											<th style="color: black;">Địa chỉ</th>
											<th style="color: black;">Xem biên lai</th>
											<th style="color: black;">Tùy chọn</th>
										</tr>
									</thead>
									<tbody>
										@foreach($khach as $kh)
										<tr>
											<th style="color: black;">{{$kh->id}}</th>
											<th style="color: black;">{{$kh->khachhang_ten}}</th>
											<th style="color: black;">{{$kh->khachhang_email}}</th>
											<th style="color: black;">{{$kh->khachhang_sdt}}</th>
											<th style="color: black;">{{$kh->khachhang_dia_chi}}</th>
											<td>
												<a href="{{route('bienlai',$kh->id)}}" class="btn btn-success" ><i class="fa fa-trash" aria-hidden="true"></i> Xem biên lai</a>
											</td>
											<td>
												<a href="{{route('suakhachhangshop',$kh->id)}}" class="btn btn-success" ><i class="fa fa-trash" aria-hidden="true"></i> Sửa</a>
												
												<a href="{{route('xoakhachhangshop',$kh->id)}}" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa phần tử này ?')"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</a>
											</td>
										</tr>
										@endforeach
										
									</tbody>
								</table>	
								<div class="row" style="margin-left: 15px">
									{{$khach->links()}}
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