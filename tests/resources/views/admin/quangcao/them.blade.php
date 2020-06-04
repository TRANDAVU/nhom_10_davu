@extends('master_admin')<!-- ke thua tu trang mmaster-->
<!--thay the noi dung da mat - thay vao cho #yield('contend')-->
@section('title')
	Thêm slide
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
					<h3><div class="panel-heading"><b>Thêm slide</b></div></h3>
					<div class="panel-body">
						<form method="post" enctype="multipart/form-data" action="{{route('themslide')}}">
							<input type="hidden" name="_token" value="{{csrf_token()}}">
							@if(Session::has('thongbao_5'))
								<div class="alert alert-success">{{Session::get('thongbao_5')}} </div>
							@endif
							<div class="row" style="margin-bottom:40px">
								<div class="col-xs-12">
									<div class="form-group" >
										<label>Tên ảnh</label>
										<input required type="text" name="image" class="form-control">
									</div>
									
									<div class="form-group" >
										<label>Trạng thái</label>
										<select required name="trangthai" class="form-control">
											<option value="1">active</option>
											<option value="0">no active</option>
					                    </select>
									</div>
									<div class="form-block">
										<label>Tiêu đề</label>
										<textarea required name="description"></textarea>
										<script type="text/javascript">
				                            var editor = CKEDITOR.replace('description',{
				                            	language:'vi',
				                            	filebrowserImageBrowseUrl: '../ckfinder/ckfinder.html?Type=Images',
				                            	filebrowserFlashBrowseUrl: '../ckfinder/ckfinder.html?Type=Flash',
				                            	filebrowserImageUploadUrl: '../ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
				                            	filebrowserFlashUploadUrl: '../ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
				                            });
				                        </script>
				                        
				                    </div>
									<br><br>
									<input type="submit" name="submit" value="Thêm" class="btn btn-primary">
									<a href="{{route('xem_slide')}}" class="btn btn-danger" style="margin-left: 25px;">Hủy bỏ</a>
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

@section('js')

@endsection