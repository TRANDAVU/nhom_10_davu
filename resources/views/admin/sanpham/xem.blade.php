@extends('master_admin')<!-- ke thua tu trang mmaster-->
<!--thay the noi dung da mat - thay vao cho #yield('contend')-->
@section('title')
	Sản phẩm
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

				@if(Session::has('thongbao_loi_38'))
					<div class="alert alert-danger">{{Session::get('thongbao_loi_38')}} </div>
				@endif
				<div class="panel panel-primary">
					<h3><div class="panel-heading"><b>Danh sách sản phẩm<b></div> </h3>
					<div class="panel-body">
						<div class="bootstrap-table">
							<div class="table-responsive">
								<table class="table table-bordered" style="margin-top:20px;">				
									<thead>
										<tr class="bg-primary">
											<th style="color: white;">ID</th>
											<th style="color: white;">ID loại sản phẩm</th>
											<th style="color: white;">ID đơn vị tính</th>
											<th style="color: white;">Tên sản phẩm</th>
											<th style="color: white;">Ảnh</th>
											<th style="color: white;">Mô tả</th>
											<th style="color: white;">Giá tiền</th>
											<th style="color: white;">% khuyến mãi</th>
											<th style="color: white;">Active</th>
											<th style="color: white;">New</th>
											<th style="color: white;">Tùy chọn</th>
										</tr>
									</thead>
									
									<tbody>
										@foreach($sanpham as $mn)
										<tr>
											<th style="color: black;">{{$mn->id}}</th>
											<th style="color: black;">{{$mn->loaisanpham_id}}</th>
											<th style="color: black;">{{$mn->donvitinh_id}}</th>
											<th style="color: black;">{{$mn->sanpham_ten}}</th>
											<th style="color: black;"><img width="200px" height="100px" src="../user/image/images/{{$mn->sanpham_anh}} " class="thumbnail"></th>
											<th style="color: black; overflow-y: auto;height: 300px;"><?php echo $mn->sanpham_mo_ta;?></th>
											<th style="color: black;">{{$mn->gia_tien}}</th>
											<th style="color: black;">{{$mn->phan_tram_km}}</th>
											<th style="color: black;">
												@if($mn->active==1)
													<i style="font-size: 25px; margin-left: 25px;" class="glyphicon glyphicon-star"></i>
												@else
  													<i style="font-size: 25px; margin-left: 25px;" class="glyphicon glyphicon-star-empty"></i>
  												@endif
											</th>
											<th style="color: black;">{{$mn->new}}</th>
											<td>
												
												<a href="{{route('xoasanphamall',$mn->id)}}" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa phần tử này ?')"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</a>
											</td>
										</tr>
										@endforeach
										
									</tbody>
								</table>	
								<div class="row" style="margin-left: 15px;">
									{{$sanpham->links()}}
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