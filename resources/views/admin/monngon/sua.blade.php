@extends('master_admin')<!-- ke thua tu trang mmaster-->
<!--thay the noi dung da mat - thay vao cho #yield('contend')-->
@section('title')
	Sửa món ngon
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
					<h3><div class="panel-heading"><b>Sửa món ngon</b></div></h3>
					<div class="panel-body">
						
						<form method="post" enctype="multipart/form-data" action="">
							<input type="hidden" name="_token" value="{{csrf_token()}}">
							<div class="row" style="margin-bottom:40px">
								<div class="col-xs-12">
									
									<div class="form-group" >
										<label>Tiêu đề</label>
										<input required type="text" name="c1" class="form-control" value="{{$mn->monngon_tieu_de}}">
									</div>
									<div class="form-group" >
										<label>Tóm tắt</label>
										<textarea required name="c2">value="{{$mn->monngon_tom_tat}}"</textarea>
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
										<label>Nội dung</label>
										<textarea required name="c3">{{$mn->monngon_noi_dung}}</textarea>
										<script type="text/javascript">
				                            var editor = CKEDITOR.replace('c3',{
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
										<input required type="text" name="c4" class="form-control" value="{{$mn->monngon_anh}}">
									</div>
									<div class="form-group" >
										<label>Trạng thái</label>
										<select required name="c5" class="form-control">
											<option value="1">active</option>
											<option value="0">no active</option>
					                    </select>
									</div>
									
									
									<input type="submit" name="submit" value="Thêm" class="btn btn-primary">
									<a href="{{route('monngonall')}}" class="btn btn-danger" style="margin-left: 25px;">Hủy bỏ</a>
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