@extends('master_user_shop')<!-- ke thua tu trang mmaster-->
<!--thay the noi dung da mat - thay vao cho #yield('contend')-->
@section('title')
	Ảnh slide
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
				
				<div class="panel panel-primary">
					<h3><div class="panel-heading"><b>Danh sách hình ảnh slide<b></div> </h3>
					<div class="panel-body">
						<div class="bootstrap-table">
							<div class="table-responsive">
								@if(Session::has('thongbao_20'))
									<div class="alert alert-success">{{Session::get('thongbao_20')}} </div>
								@endif

								@if(Session::has('thongbao_30'))
									<div class="alert alert-success">{{Session::get('thongbao_30')}} </div>
								@endif

								@if(Session::has('thongbao_loi_30'))
									<div class="alert alert-danger">{{Session::get('thongbao_loi_30')}} </div>
								@endif
								<table class="table table-bordered" style="margin-top:20px;">				
									<thead>
										<tr class="bg-primary" >
											<th style="color: white;">Ảnh</th>
											<th width="20%" style="color: white;">Tiêu đề</th>
											<th style="color: white;">Trạng thái</th>
											<th style="color: white;">Tùy chọn</th>
										</tr>
									</thead>
									<tbody>
										@foreach($quangcaoshop as $qc)
										<tr>
											<td>
												<img width="200px" height="100px" src="../user/image/images/{{$qc->anh}} " class="thumbnail">
											</td>

											<td>
												<h4 style="color: black;"><?php echo $qc->mota ;?></h4>
											</td>

											<td >
												@if($qc->active==0)
													<i style="font-size: 25px; margin-left: 50px;" class="glyphicon glyphicon-star"></i>
												@else
  													<i style="font-size: 25px; margin-left: 50px;" class="glyphicon glyphicon-star-empty"></i>
  												@endif
											</td>

											<td>
												<a href="{{route('Sua_slide_shop',$qc->id)}}" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i> Sửa</a>
												<a href="{{route('xoaslide_shop',$qc->id)}}" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true" onclick="return confirm('Bạn có chắc chắn muốn xóa phần tử này ?')"></i> Xóa</a>
											</td>
										</tr>
										@endforeach
									</tbody>
								</table>
								<div class="row" style="margin-left: 15px">
	                                {{$quangcaoshop->links()}}
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
