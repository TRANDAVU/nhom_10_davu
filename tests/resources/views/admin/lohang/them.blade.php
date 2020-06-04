@extends('master_admin')<!-- ke thua tu trang mmaster-->
<!--thay the noi dung da mat - thay vao cho #yield('contend')-->
@section('title')
	Thêm lô hàng
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
					<h3><div class="panel-heading"><b>Thêm lô hàng</b></div></h3>
					<div class="panel-body">
						@if(Session::has('thongbao_9'))
							<div class="alert alert-success">{{Session::get('thongbao_9')}} </div>
						@endif
						<form method="post" enctype="multipart/form-data" action="{{route('themlohangshop')}}">
							<input type="hidden" name="_token" value="{{csrf_token()}}">
							<div class="row" style="margin-bottom:40px">
								<div class="col-xs-12">
									<div class="form-group" >
										<label>ID shop</label>
										<select required name="c1" class="form-control">
											@foreach($shop as $l)
												<option value="{{$l->id}}">{{$l->tenshop}}</option>
											@endforeach
					                    </select>
									</div>
									<div class="form-group" >
										<label>Ký hiệu lô hàng</label>
										<input required type="text" name="c2" class="form-control">
									</div>
									
									<div class="form-group" >
										<label>hạn sử dụng</label>
										<input required type="text" name="c3" class="form-control">
									</div>

									<div class="form-group" >
										<label>Giá mua vào</label>
										<input required type="text" name="c4" class="form-control">
									</div>
									<div class="form-group" >
										<label>Giá bán ra</label>
										<input required type="text" name="c5" class="form-control">
									</div>
									<div class="form-group" >
										<label>Số lượng nhập</label>
										<input required type="text" name="c6" class="form-control">
									</div>
									<div class="form-group" >
										<label>Số lượng đã bán</label>
										<input required type="text" name="c7" class="form-control">
									</div>
									<div class="form-group" >
										<label>Số lượng đổi trả</label>
										<input required type="text" name="c8" class="form-control">
									</div>
									<div class="form-group" >
										<label>Số lượng hiện tại</label>
										<input required type="text" name="c9" class="form-control">
									</div>
									<div class="form-group" >
										<label>Tình trạng lô hàng</label>
										<select required name="c10" class="form-control">
											<option value="1">Còn hàng</option>
											<option value="0">Hết hàng</option>
					                    </select>
									</div>
									<div class="form-group" >
										<label>Nhà cung cấp</label>
										<select required name="c11" class="form-control">
											@foreach($ncc as $l)
												<option value="{{$l->id}}">{{$l->nhacungcap_ten}}</option>
											@endforeach
					                    </select>
									
									</div>
									
									
									<input type="submit" name="submit" value="Thêm" class="btn btn-primary">
									<a href="{{route('lohangshop')}}" class="btn btn-danger" style="margin-left: 25px;">Hủy bỏ</a>
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