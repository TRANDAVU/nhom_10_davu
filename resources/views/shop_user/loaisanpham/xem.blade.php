@extends('master_user_shop')<!-- ke thua tu trang mmaster-->
<!--thay the noi dung da mat - thay vao cho #yield('contend')-->
@section('title')
	xem menu shop
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
				@if(Session::has('thongbao_24'))
					<div class="alert alert-success">{{Session::get('thongbao_24')}} </div>
				@endif

				@if(Session::has('thongbao_30'))
					<div class="alert alert-success">{{Session::get('thongbao_30')}} </div>
				@endif

				@if(Session::has('thongbao_loi_30'))
					<div class="alert alert-danger">{{Session::get('thongbao_loi_30')}} </div>
				@endif
				<div class="panel panel-primary">
					<h3><div class="panel-heading"><b>Danh sách lô hàng<b></div> </h3>
					<div class="panel-body">
						<div class="bootstrap-table">
							<div class="table-responsive">
								<div class="card-body">
						            <form action="" method="POST" enctype="multipart/form-data">
						                @csrf
						                <input type="file" name="file" class="form-control">
						                <br>
						                <button class="btn btn-success">Import Data</button>
						                <a class="btn btn-warning" href="{{ route('exportlohang') }}">Export Data</a>
						            </form>
						        </div>
								<table class="table table-bordered" style="margin-top:20px;">				
									<thead>
										<tr class="bg-primary">
											<th style="color: black;">ID</th>
											<th style="color: black;">Tên hiển thị</th>
											<th style="color: black;">Hình ảnh</th>
											<th style="color: black;">Mô tả</th>
											<th style="color: black;">Tùy chọn</th>
										</tr>
									</thead>
									
									<tbody>
										@foreach($loaisanphamshop as $lh)
										<tr>
											<th style="color: black;">{{$lh->id}}</th>
											<th style="color: black;">{{$lh->loaisanphamshop_ten}}</th>
											<th style="color: black;">{{$lh->loaisanphamshop_anh}}</th>
											<th style="color: black;">{{$lh->loaisanphamshop_mota}}</th>
											<td>
												<a href="{{route('sualohangshop',$lh->id)}}" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i> Sửa</a>
												<a href="{{route('xoalohangshop',$lh->id)}}" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa phần tử này ?')"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</a>
											</td>
										</tr>
										@endforeach
										
									</tbody>
								</table>	
								<div class="row" style="margin-left: 15px;">
									{{$lohang->links()}}
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