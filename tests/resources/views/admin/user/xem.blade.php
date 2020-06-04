@extends('master_admin')<!-- ke thua tu trang mmaster-->
<!--thay the noi dung da mat - thay vao cho #yield('contend')-->
@section('title')
	User
@endsection
@section('content')

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Slide show</h1>
			</div>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-xs-12 col-md-12 col-lg-12">
				@if(Session::has('thongbao_28'))
					<div class="alert alert-success">{{Session::get('thongbao_28')}} </div>
				@endif

				@if(Session::has('thongbao_30'))
					<div class="alert alert-success">{{Session::get('thongbao_30')}} </div>
				@endif
				<div class="panel panel-primary">
					<h3><div class="panel-heading"><b>Danh sách người dùng<b></div> </h3>
					<div class="panel-body">
						<div class="bootstrap-table">
							<div class="table-responsive">
								<table class="table table-bordered" style="margin-top:20px;">				
									<thead >
										<tr class="bg-primary" >
											<th style="color: white;">ID</th>
											<th style="color: white;">Avatar</th>
											<th style="color: white;">Mở shop</th>
											<th style="color: white;">Name</th>
											<th style="color: white;">Email</th>
											<th style="color: white;">Địa chỉ</th>
											<th style="color: white;">Sđt</th>
											<th style="color: white;">Provider</th>
											<th style="color: white;">ID loại người dùng</th>
											<th style="color: white;">Tùy chọn</th>
										</tr>
									</thead>
									
									<tbody>
										@foreach($user as $mn)
										<tr>
											<th style="color: black;">{{$mn->id}}</th>
											<th style="color: black;">{{$mn->avatar}}</th>
											<th style="color: black;">@if($mn->mo_shop==0) chưa mở @else đã mở @endif</th>
											<th style="color: black;">{{$mn->name}}</th>
											<th style="color: black;">{{$mn->email}}</th>
											<th style="color: black;">{{$mn->diachi}}</th>
											<th style="color: black;">{{$mn->sodienthoai}}</th>
											<th style="color: black;">{{$mn->provider}}</th>
											<th style="color: black;">@if($mn->loainguoidung_id==1) user @elseif($mn->loainguoidung_id==2) admin 
											@else content @endif
											</th>
											<td>
												<a href="{{route('suauser',$mn->id)}}" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i> Sửa</a>
												<a href="{{route('xoauser',$mn->id)}}" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</a>
											</td>
										</tr>
										@endforeach
										
									</tbody>
								</table>	
								<div class="row" style="margin-left: 15px;">
									{{$user->links()}}
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