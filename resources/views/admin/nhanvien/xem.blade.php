@extends('master_admin')<!-- ke thua tu trang mmaster-->
<!--thay the noi dung da mat - thay vao cho #yield('contend')-->
@section('title')
	Nhân viên
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
					<h3><div class="panel-heading"><b>Danh sách nhân viên<b></div> </h3>
					<div class="panel-body">
						<div class="bootstrap-table">
							<div class="table-responsive">
								<table class="table table-bordered" style="margin-top:20px;">				
									<thead>
										<tr class="bg-primary">
											<th style="color: white;">Tên</th>
											<th style="color: white;">CMND</th>
											<th style="color: white;">Số điện thoại</th>
											<th style="color: white;">Địa chỉ</th>
											<th style="color: white;">ID user</th>
											<th style="color: white;">Tùy chọn</th>
										</tr>
									</thead>
									
									<tbody>
										@foreach($nhanvien as $mn)
										<tr>
											<th style="color: black;">{{$mn->nhanvien_ten}}</th>
											<th style="color: black;">{{$mn->nhanvien_cmnd}}</th>
											<th style="color: black;">{{$mn->nhanvien_sdt}}</th>
											<th style="color: black;">{{$mn->nhanvien_dia_chi}}</th>
											<th style="color: black;">{{$mn->user_id}}</th>
											<td>
												
												<a href="{{route('xoanhanvien',$mn->id)}}" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa phần tử này ?')"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</a>
											</td>
										</tr>
										@endforeach
										
									</tbody>
								</table>	
								<div class="row" style="margin-left: 15px;">
									{{$nhanvien->links()}}
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