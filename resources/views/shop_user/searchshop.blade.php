@extends('master_user_shop')<!-- ke thua tu trang mmaster-->
<!--thay the noi dung da mat - thay vao cho #yield('contend')-->
@section('title')
	Searchshop
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
					<h3><div class="panel-heading"><b>Sản phẩm tìm kiếm<b></div> </h3>
					<div class="panel-body">
						<div class="bootstrap-table">
							<div class="table-responsive">
								<table class="table table-bordered" style="margin-top:20px;">				
									<thead>
										<tr class="bg-primary">
											<th style="color: black;">ID</th>
											<th style="color: black;">ID loại sản phẩm</th>
											<th style="color: black;">ID đơn vị tính</th>
											<th style="color: black;">Tên sản phẩm</th>
											<th style="color: black;">Ký hệu</th>
											<th style="color: black;">Ảnh</th>
											<th style="color: black;">Mô tả</th>
											<th style="color: black;">Giá tiền</th>
											<th style="color: black;">% khuyến mãi</th>
											<th style="color: black;">Active</th>
											<th style="color: black;">New</th>
											<th style="color: black;">Tùy chọn</th>
										</tr>
									</thead>
									
									<tbody>
										@foreach($product as $mn)
										<tr>
											<th style="color: black;">{{$mn->id}}</th>
											<th style="color: black;">{{$mn->loaisanpham_id}}</th>
											<th style="color: black;">{{$mn->donvitinh_id}}</th>
											<th style="color: black;">{{$mn->sanpham_ten}}</th>
											<th style="color: black;">{{$mn->sanpham_ky_hieu}}</th>
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
												<a href="{{route('suasanphamshop',$mn->id)}}" class="btn btn-success" ><i class="fa fa-trash" aria-hidden="true"></i> Sửa</a>
												
												<a href="{{route('xoasanphamshop',$mn->id)}}" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa phần tử này ?')"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</a>
											</td>
										</tr>
										@endforeach
										
									</tbody>
								</table>	
								<div class="row" style="margin-left: 15px;">
									{{$product->links()}}
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