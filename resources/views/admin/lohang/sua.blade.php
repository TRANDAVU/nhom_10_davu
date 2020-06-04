@extends('master_admin')<!-- ke thua tu trang mmaster-->
<!--thay the noi dung da mat - thay vao cho #yield('contend')-->
@section('title')
	Sửa lô hàng
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
					<h3><div class="panel-heading"><b>Sửa lô hàng</b></div></h3>
					<div class="panel-body">
						
						<form method="post" enctype="multipart/form-data" action="">
							<input type="hidden" name="_token" value="{{csrf_token()}}">
							<div class="row" style="margin-bottom:40px">
								<div class="col-xs-12">
									<label>ID shop</label>
										<select required name="c1" class="form-control">
											@foreach($shop as $l)
												<option value="{{$l->id}}">{{$l->tenshop}}</option>
											@endforeach
					                    </select>
									<div class="form-group" >
										<label>Ký hiệu lô hàng</label>
										<input required type="text" name="c2" class="form-control" value="{{$lhx->lohang_ky_hieu}}">
									</div>
									
									<div class="form-group" >
										<label>hạn sử dụng</label>
										<input required type="text" name="c3" class="form-control" value="{{$lhx->lohang_han_su_dung}}">
									</div>

									<div class="form-group" >
										<label>Giá mua vào</label>
										<input required type="text" name="c4" class="form-control" value="{{$lhx->lohang_gia_mua_vao}}">
									</div>
									<div class="form-group" >
										<label>Giá bán ra</label>
										<input required type="text" name="c5" class="form-control" value="{{$lhx->lohang_gia_ban_ra}}">
									</div>
									<div class="form-group" >
										<label>Số lượng nhập</label>
										<input required type="text" name="c6" class="form-control" value="{{$lhx->lohang_so_luong_nhap}}">
									</div>
									<div class="form-group" >
										<label>Số lượng đã bán</label>
										<input required type="text" name="c7" class="form-control" value="{{$lhx->lohang_so_luong_da_ban}}">
									</div>
									<div class="form-group" >
										<label>Số lượng đổi trả</label>
										<input required type="text" name="c8" class="form-control" value="{{$lhx->lohang_so_luong_doi_tra}}">
									</div>
									<div class="form-group" >
										<label>Số lượng hiện tại</label>
										<input required type="text" name="c9" class="form-control" value="{{$lhx->lohang_so_luong_hien_tai}}">
									</div>
									<div class="form-group" >
										<label>Tình trạng lô hàng</label>
										<input required type="text" name="c10" class="form-control" value="{{$lhx->lohang_tinh_trang}}">
									</div>
									<div class="form-group" >
										<label>ID nhà cung cấp</label>
										<input required type="text" name="c11" class="form-control" value="{{$lhx->nhacungcap_id}}">
									</div>
									
									
									<input type="submit" name="submit" value="Thêm" class="btn btn-primary">
									<a href="{{route('lohang')}}" class="btn btn-danger" style="margin-left: 25px;">Hủy bỏ</a>
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