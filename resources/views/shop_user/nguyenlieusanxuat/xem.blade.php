@extends('master_user_shop')<!-- ke thua tu trang mmaster-->
<!--thay the noi dung da mat - thay vao cho #yield('contend')-->
@section('title')
	Nguyên liệu sản xuất
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
					<h3><div class="panel-heading"><b>Nguyên liệu sản xuất<b></div> </h3>
					<div class="panel-body">
						<div class="bootstrap-table">
							<div class="table-responsive">

								 <div class="card-body">
						            <form action="" method="POST" enctype="multipart/form-data">
						                @csrf
						                <input type="file" name="file" class="form-control">
						                <br>
						                <button class="btn btn-success">Import Data</button>
						                <a class="btn btn-warning" href="{{ route('exportnguyenlieusx') }}">Export Data</a>
						            </form>
						        </div>

								<table class="table table-bordered" style="margin-top:20px;">				
									<thead>
										<tr class="bg-primary">
											<th style="color: black;">ID</th>
											<th style="color: black;">ID lô hàng</th>
											<th style="color: black;">Phân bón</th>
											<th style="color: black;">Hạt giống</th>
											<th style="color: black;">Nhiên liệu</th>
											<th style="color: black;">Thuốc trừ sâu</th>
											<th style="color: black;">Tùy chọn</th>
										</tr>
									</thead>
									<tbody>
										@foreach($nguyenlieusanxuat as $nlsx)
										<tr>
											<td style="color: black;">{{$nlsx->id}}</td>
											<td style="color: black;">{{$nlsx->lohang_id}}</td>
											<td style="color: black;"><?php echo $nlsx->nguyenlieusanxuat_phanbon;?></td>
											<td style="color: black;"><?php echo $nlsx->nguyenlieusanxuat_hatgiong;?></td>
											<td style="color: black;"><?php echo $nlsx->nguyenlieusanxuat_nhienlieu;?></td>
											<td style="color: black;"><?php echo $nlsx->nguyenlieusanxuat_thuottrusau;?></td>
											<td>
												<a href="{{route('suanguyenlieusx',$nlsx->id)}}" class="btn btn-success" ><i class="fa fa-trash" aria-hidden="true"></i> Sửa</a>
												
												<a href="{{route('xoanguyenlieusx',$nlsx->id)}}" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa phần tử này ?')"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</a>
											</td>
										</tr>
										@endforeach
										
									</tbody>
								</table>
								<div class="row" style="margin-left: 15px">
	                                {{$nguyenlieusanxuat->links()}}
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