
@extends('master_user_shop')<!-- ke thua tu trang mmaster-->
<!--thay the noi dung da mat - thay vao cho #yield('contend')-->
@section('title')
	Thêm nguyên liệu sản xuất
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
					<h3><div class="panel-heading"><b>Thêm nguyên liệu sản xuất</b></div></h3>
					<div class="panel-body">
						@if(Session::has('thongbao_9'))
							<div class="alert alert-success">{{Session::get('thongbao_9')}} </div>
						@endif
						<form method="post" enctype="multipart/form-data" action="{{route('themnguyenlieusx')}}">
							<input type="hidden" name="_token" value="{{csrf_token()}}">
							<div class="row" style="margin-bottom:40px">
								<div class="col-xs-12">
									<div class="form-group" >
										<input required type="hidden" name="c1" class="form-control" value="{{$shop->id}}">
									</div>
									<div class="form-group" >
										<label>ID lô hàng</label>
										<select required name="c2" class="form-control">
											@foreach($lohang as $lh)
												<option value="{{$lh->id}}">{{$lh->lohang_ky_hieu}}</option>
											@endforeach
					                    </select>
									</div>
									
									<div class="form-group" >
										<label>Phân bón</label>
										<textarea required name="c3"></textarea>
										<script type="text/javascript">
				                            var editor = CKEDITOR.replace('c3',{
				                            	language:'vi',
				                            	filebrowserImageBrowseUrl: '../<?php $c='ckfinder/ckfinder.html?Type=Images'; echo $c; ?>',
				                            	filebrowserFlashBrowseUrl: '../ckfinder/ckfinder.html?Type=Flash',
				                            	filebrowserImageUploadUrl: '../ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
				                            	filebrowserFlashUploadUrl: '../ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
				                            });
				                        </script>
									
									</div>

									<div class="form-group" >
										<label>Hạt giống</label>
										<textarea required name="c4"></textarea>
										<script type="text/javascript">
				                            var editor = CKEDITOR.replace('c4',{
				                            	language:'vi',
				                            	filebrowserImageBrowseUrl: '../<?php $c='ckfinder/ckfinder.html?Type=Images'; echo $c; ?>',
				                            	filebrowserFlashBrowseUrl: '../ckfinder/ckfinder.html?Type=Flash',
				                            	filebrowserImageUploadUrl: '../ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
				                            	filebrowserFlashUploadUrl: '../ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
				                            });
				                        </script>
									
									</div>
									<div class="form-group" >
										<label>Nhiên liệu</label>
										<textarea required name="c5"></textarea>
										<script type="text/javascript">
				                            var editor = CKEDITOR.replace('c5',{
				                            	language:'vi',
				                            	filebrowserImageBrowseUrl: '../<?php $c='ckfinder/ckfinder.html?Type=Images'; echo $c; ?>',
				                            	filebrowserFlashBrowseUrl: '../ckfinder/ckfinder.html?Type=Flash',
				                            	filebrowserImageUploadUrl: '../ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
				                            	filebrowserFlashUploadUrl: '../ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
				                            });
				                        </script>
									
									</div>
									<div class="form-group" >
										<label>Thuốc trừ sâu</label>
										<textarea required name="c6"></textarea>
										<script type="text/javascript">
				                            var editor = CKEDITOR.replace('c6',{
				                            	language:'vi',
				                            	filebrowserImageBrowseUrl: '../<?php $c='ckfinder/ckfinder.html?Type=Images'; echo $c; ?>',
				                            	filebrowserFlashBrowseUrl: '../ckfinder/ckfinder.html?Type=Flash',
				                            	filebrowserImageUploadUrl: '../ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
				                            	filebrowserFlashUploadUrl: '../ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
				                            });
				                        </script>
									
									</div>
									
									<input type="submit" name="submit" value="Thêm" class="btn btn-primary">
									<a href="{{route('nguyenlieusx')}}" class="btn btn-danger" style="margin-left: 25px;">Hủy bỏ</a>
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