@extends('master_user_shop')<!-- ke thua tu trang mmaster-->
<!--thay the noi dung da mat - thay vao cho #yield('contend')-->
@section('title')
	Sửa điểm sản xuất
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
					<h3><div class="panel-heading"><b>Sửa điểm sản xuất</b></div></h3>
					<div class="panel-body">
						@if(Session::has('thongbao_9'))
							<div class="alert alert-success">{{Session::get('thongbao_9')}} </div>
						@endif
						<form method="post" enctype="multipart/form-data" action="">
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
										<label>Tên điểm sản xuất</label>
										<input required type="text" name="c3" class="form-control" value="{{$diemsanxuat->diadiemsanxuat_ten}}">
									</div>

									<div class="form-group" >
										<label>Địa chỉ</label>
										<input required type="text" name="c4" class="form-control" value="{{$diemsanxuat->diadiemsanxuat_diachi}}">
									</div>
									<div class="form-group" >
										<label>Tên hình ảnh</label>
										<input required type="text" name="c5" class="form-control" value="{{$diemsanxuat->diadiemsanxuat_hinhanh}}">
									</div>
									<div class="form-group" >
										<label>Tọa độ x</label>
										<input required type="text" name="c6" class="form-control" value="{{$diemsanxuat->diadiemsanxuat_toado_x}}">
									</div>
									<div class="form-group" >
										<label>Tọa độ y</label>
										<input required type="text" name="c7" class="form-control" value="{{$diemsanxuat->diadiemsanxuat_toado_y}}">
									</div>
									
									<div class="form-group" >
										<label>Miêu tả</label>
										<textarea required name="c8"> {{$diemsanxuat->diadiemsanxuat_mota}}</textarea>
										<script type="text/javascript">
				                            var editor = CKEDITOR.replace('c8',{
				                            	language:'vi',
				                            	filebrowserImageBrowseUrl: '../<?php $c='ckfinder/ckfinder.html?Type=Images'; echo $c; ?>',
				                            	filebrowserFlashBrowseUrl: '../ckfinder/ckfinder.html?Type=Flash',
				                            	filebrowserImageUploadUrl: '../ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
				                            	filebrowserFlashUploadUrl: '../ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
				                            });
				                        </script>
									
									</div>
									
									
									<input type="submit" name="submit" value="Thêm" class="btn btn-primary">
									<a href="{{route('diadiemsx')}}" class="btn btn-danger" style="margin-left: 25px;">Hủy bỏ</a>
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