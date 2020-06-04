@extends('master_admin')<!-- ke thua tu trang mmaster-->
<!--thay the noi dung da mat - thay vao cho #yield('contend')-->
@section('title')
	Thêm shop
@endsection
@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Sản phẩm</h1>
			</div>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-xs-12 col-md-12 col-lg-12">
				
				<div class="panel panel-primary">
					<h3><div class="panel-heading"><b>Thêm shop</b></div></h3>
					<div class="panel-body">
						@if(Session::has('thongbao_12'))
							<div class="alert alert-success">{{Session::get('thongbao_12')}} </div>
						@endif
						<form method="post" enctype="multipart/form-data" action="{{route('themshop')}}">
							<input type="hidden" name="_token" value="{{csrf_token()}}">
							<div class="row" style="margin-bottom:40px">
								<div class="col-xs-12">
									<div class="form-group" >
										<label>Tên shop</label>
										<input required type="text" name="c1" class="form-control">
									</div>

									<div class="form-group" >
										<label>Mô tả</label>
										<textarea required name="c2"></textarea>
										<script type="text/javascript">
				                            var editor = CKEDITOR.replace('c2',{
				                            	language:'vi',
				                            	filebrowserImageBrowseUrl: '../ckfinder/ckfinder.html?Type=Images',
				                            	filebrowserFlashBrowseUrl: '../ckfinder/ckfinder.html?Type=Flash',
				                            	filebrowserImageUploadUrl: '../ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
				                            	filebrowserFlashUploadUrl: '../ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
				                            });
				                        </script>
									</div>

									<div class="form-group" >
										<label>Tên ảnh</label>
										<input required type="number" name="c3" class="form-control">
									</div>
									
									
									<div class="form-group" >
										<label>ID user</label>
										<input required type="text" name="c4" class="form-control">
									</div>
									
									
									<input type="submit" name="submit" value="Thêm" class="btn btn-primary">
									<a href="{{route('shop')}}" class="btn btn-danger" style="margin-left: 25px;">Hủy bỏ</a>
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