@extends('master_admin')<!-- ke thua tu trang mmaster-->
<!--thay the noi dung da mat - thay vao cho #yield('contend')-->
@section('title')
	Shop
@endsection
@section('content')

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header"><br></h1>
			</div>
		</div><!--/.row-->
		@if(Session::has('thongbao_27'))
			<div class="alert alert-success">{{Session::get('thongbao_27')}} </div>
		@endif
		<div class="row">
			<div class="col-xs-12 col-md-12 col-lg-12">
				@if(Session::has('thongbao_30'))
					<div class="alert alert-success">{{Session::get('thongbao_30')}} </div>
				@endif

				@if(Session::has('thongbao_loi_30'))
					<div class="alert alert-danger">{{Session::get('thongbao_loi_30')}} </div>
				@endif
				<div class="panel panel-primary">
					<h3><div class="panel-heading"><b>Danh sách shop<b></div> </h3>
					<div class="panel-body">
						<div class="bootstrap-table">
							<div class="table-responsive">
								<table class="table table-bordered" style="margin-top:20px;">				
									<thead>
										<tr class="bg-primary">
											<th style="color: white;">ID</th>
											<th style="color: white;">Tên shop</th>
											<th style="color: white;">Ảnh</th>
											<th style="color: white;">Mô tả</th>
											<th style="color: white;">ID user</th>
											<th style="color: white;">Tùy chọn</th>
										</tr>
									</thead>
									
									<tbody>
										@foreach($shop as $mn)
										<tr>
											<th style="color: black;">{{$mn->id}}</th>
											<th style="color: black;">{{$mn->tenshop}}</th>
											<th style="color: black;"><img width="200px" height="100px" src="../user/image/product/{{$mn->image_name}} " class="thumbnail"></th>
											<th style="color: black;"><?php echo $mn->shop_mo_ta ;?></th>
											<th style="color: black;">{{$mn->user_id}}</th>
											<td >
												<a href="{{route('suashop',$mn->id)}}" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i> Sửa</a>
												<a href="{{route('xoashop',$mn->id)}}" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</a>
											</td>
										</tr>
										@endforeach
										
									</tbody>
								</table>	
								<div class="row" style="margin-left: 15px;">
									{{$shop->links()}}
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