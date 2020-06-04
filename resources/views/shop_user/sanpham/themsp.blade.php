@extends('master_user_shop')<!-- ke thua tu trang mmaster-->
<!--thay the noi dung da mat - thay vao cho #yield('contend')-->
@section('title')
	Thêm sản phẩm
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
					<h3><div class="panel-heading"><b>Thêm sản phẩm</b></div></h3>
					<div class="panel-body">
						
						<form method="post" enctype="multipart/form-data" action="{{route('themsanphamshop')}}">
							<input type="hidden" name="_token" value="{{csrf_token()}}">
							<div class="row" style="margin-bottom:40px">
								<div class="col-xs-12">
									<div class="form-group" >
										<input required type="hidden" name="c1" class="form-control" value="{{$shop->id}}">
									</div>

									<div class="form-group" >
										<label>Sản phẩm tên</label>
										<input required id="img" type="text" name="c3" class="form-control " >
									</div>

									<div class="form-group" >
										<label>Lô hàng ký hiệu</label>
										<select required name="c2" class="form-control">
											@foreach($lohang as $l)
												<option value="{{$l->id}}"> {{$l->lohang_ky_hieu}}</option>
											@endforeach
					                    </select>
									</div>
									
									<div class="form-group" >
										<label>Sản phẩm ảnh</label>
										<input required id="img" type="text" name="c4" class="form-control " >
									</div>

									<div class="form-group" >
										<label>Miêu tả</label>
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
										<label>Loại sản phẩm</label>
										<select required name="c6" class="form-control">
											@foreach($loai as $l)
												<option value="{{$l->id}}">{{$l->loaisanpham_ten}}</option>
											@endforeach
					                    </select>
									</div>

									<div class="form-group" >
										<label>Đơn vị tính</label>
										<select required name="c7" class="form-control">
											@foreach($dvt as $l)
												<option value="{{$l->id}}">{{$l->donvitinh_ten}}</option>
											@endforeach
					                    </select>
									</div>

									
									<div class="form-group" >
										<label>Giá tiền</label>
										<input required id="img" type="text" name="c8" class="form-control " >
									</div>

									<div class="form-group" >
										<label>% khuyến mãi</label>
										<input required id="img" type="text" name="c9" class="form-control " >
									</div>

									<div class="form-group" >
										<label>New</label>
										<select required name="c10" class="form-control">
											<option value="1">Mới</option>
											<option value="0">Hết mới</option>
					                    </select>
									</div>

									<div class="form-group" >
										<label>Active</label>
										<select required name="c11" class="form-control">
											<option value="1">active</option>
											<option value="0">no active</option>
					                    </select>
									</div>

									<input type="submit" name="submit" value="Thêm" class="btn btn-primary">
									<a href="" class="btn btn-danger" style="margin-left: 25px;">Hủy bỏ</a>
									<a href="" class="btn btn-danger" style="margin-left: 25px;">Import excel</a>
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