@extends('master_admin')<!-- ke thua tu trang mmaster-->
<!--thay the noi dung da mat - thay vao cho #yield('contend')-->
@section('title')
	Thêm Nhà cung cấp
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
					<h3><div class="panel-heading"><b>Thêm Nhà cung cấp</b></div></h3>
					<div class="panel-body">
						@if(Session::has('thongbao_11'))
							<div class="alert alert-success">{{Session::get('thongbao_11')}} </div>
						@endif
						<form method="post" enctype="multipart/form-data" action="{{route('themnhacungcap')}}">
							<input type="hidden" name="_token" value="{{csrf_token()}}">
							<div class="row" style="margin-bottom:40px">
								<div class="col-xs-12">
									<div class="form-group" >
										<label>Tên nhà cấp</label>
										<input required type="text" name="c1" class="form-control">
									</div>
									<div class="form-group" >
										<label>Địa chỉ nhà cung cấp</label>
										<input required type="text" name="c2" class="form-control">
									</div>
									<div class="form-group" >
										<label>Số điện thoại</label>
										<input required type="number" name="c3" class="form-control">
					                    
									</div>
									
									<input type="submit" name="submit" value="Thêm" class="btn btn-primary">
									<a href="{{route('nhacungcap')}}" class="btn btn-danger" style="margin-left: 25px;">Hủy bỏ</a>
								</div>
							</div>
						</form>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
		</div><!--/.row-->
	</div>	<!--/.main-->
@endsection