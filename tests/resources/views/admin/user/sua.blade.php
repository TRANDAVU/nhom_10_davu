@extends('master_admin')<!-- ke thua tu trang mmaster-->
<!--thay the noi dung da mat - thay vao cho #yield('contend')-->
@section('title')
	Sửa user
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
					<h3><div class="panel-heading"><b>Thêm user</b></div></h3>
					<div class="panel-body">
						
						<form method="post" enctype="multipart/form-data" action="">
							<input type="hidden" name="_token" value="{{csrf_token()}}">
							<div class="row" style="margin-bottom:40px">
								<div class="col-xs-8">
									<label>Avatar</label>
										<input required type="text" name="c1" class="form-control"><br><br>
										<textarea required name="c0">{{$user->avatar}}</textarea>
										<script type="text/javascript">
				                            var editor = CKEDITOR.replace('c0',{
				                            	language:'vi',
				                            	filebrowserImageBrowseUrl: '../ckfinder/ckfinder.html?Type=Images',
				                            	filebrowserFlashBrowseUrl: '../ckfinder/ckfinder.html?Type=Flash',
				                            	filebrowserImageUploadUrl: '../ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
				                            	filebrowserFlashUploadUrl: '../ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
				                            });
				                        </script><br><br>
									<div class="form-group" >
										<label>Name</label>
										<input required type="number" name="c2" class="form-control" value="{{$user->name}}">
									</div>
									
									<div class="form-group" >
										<label>Email</label>
										<input required type="text" name="c3" class="form-control" value="{{$user->email}}">
									</div>
									<div class="form-group" >
										<label>Địa chỉ</label>
										<input required type="text" name="c4" class="form-control" value="{{$user->diachi}}">
									</div>
									<div class="form-group" >
										<label>Số điện thoại</label>
										<input required type="text" name="c5" class="form-control" value="{{$user->sodienthoai}}">
									</div>
									<div class="form-group" >
										<label>ID loại người dùng</label>
										<select required name="cate" class="form-control">
											@foreach($all as $a)
											<option value="{{$a->id}}">{{$a->loainguoidung_ten}}</option>
											@endforeach
					                    </select>
									</div>
									
									<input type="submit" name="submit" value="Thêm" class="btn btn-primary">
									<a href="{{route('user')}}" class="btn btn-danger" style="margin-left: 25px;">Hủy bỏ</a>
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