@extends('master_admin')<!-- ke thua tu trang mmaster-->
<!--thay the noi dung da mat - thay vao cho #yield('contend')-->
@section('title')
	Món ngon
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
				@if(Session::has('thongbao_25'))
					<div class="alert alert-success">{{Session::get('thongbao_25')}} </div>
				@endif

				@if(Session::has('thongbao_30'))
					<div class="alert alert-success">{{Session::get('thongbao_30')}} </div>
				@endif

				@if(Session::has('thongbao_loi_30'))
					<div class="alert alert-danger">{{Session::get('thongbao_loi_30')}} </div>
				@endif
				<div class="panel panel-primary">
					<h3><div class="panel-heading"><b>Danh sách món ngon<b></div> </h3>
					<div class="panel-body">
						<div class="bootstrap-table">
							<div class="table-responsive">
								<table class="table table-bordered" style="margin-top:20px;">				
									<thead>
										<tr class="bg-primary">
											<th style="color: white;">Tiêu đề</th>
											<th style="color: white;">Tóm tắt</th>
											<th style="color: white;">Nội dung</th>
											<th style="color: white;">Ảnh</th>
											<th style="color: white;">Active</th>
											<th style="color: white;">Tùy chọn</th>
										</tr>
									</thead>
									
									<tbody>
										@foreach($monngon as $mn)
										<tr>
											<th style="color: black;"><?php echo $mn->monngon_tieu_de;?></th>
											<th style="color: black;"><?php echo $mn->monngon_tom_tat ;?></th>
											<th style="color: black;"><?php echo $mn->monngon_noi_dung;?></th>
											<th style="color: black;"><img width="200px" height="100px" src="../user/image/images/{{$mn->monngon_anh}} " class="thumbnail"></th>
											<th style="color: black;">
												@if($mn->active==1)
													<i style="font-size: 25px; margin-left: 50px;" class="glyphicon glyphicon-star"></i>
												@else
  													<i style="font-size: 25px; margin-left: 50px;" class="glyphicon glyphicon-star-empty"></i>
  												@endif
											</th>
											<td>
												<a href="{{route('suamonngon',$mn->id)}}" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i> Sửa</a>
												<a href="{{route('xoamonngon',$mn->id)}}" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa phần tử này ?')"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</a>
											</td>
										</tr>
										@endforeach
										
									</tbody>
								</table>	
								<div class="row" style="margin-left: 15px;">
									{{$monngon->links()}}
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