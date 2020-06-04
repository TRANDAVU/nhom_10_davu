@extends('master_admin')<!-- ke thua tu trang mmaster-->
<!--thay the noi dung da mat - thay vao cho #yield('contend')-->
@section('title')
	Lô hàng
@endsection
@section('content')

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Slide show</h1>
			</div>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-xs-12 col-md-12 col-lg-12">
				@if(Session::has('thongbao_24'))
					<div class="alert alert-success">{{Session::get('thongbao_24')}} </div>
				@endif

				@if(Session::has('thongbao_30'))
					<div class="alert alert-success">{{Session::get('thongbao_30')}} </div>
				@endif

				@if(Session::has('thongbao_loi_30'))
					<div class="alert alert-danger">{{Session::get('thongbao_loi_30')}} </div>
				@endif
				<div class="panel panel-primary">
					<h3><div class="panel-heading"><b>Danh sách lô hàng<b></div> </h3>
					<div class="panel-body">
						<div class="bootstrap-table">
							<div class="table-responsive">
								<table class="table table-bordered" style="margin-top:20px;">				
									<thead>
										<tr class="bg-primary">
											<th style="color: white;">ID</th>
											<th style="color: white;">ID shop</th>
											<th style="color: white;">ID nhà cung cấp</th>
											<th style="color: white;">Ký hiệu</th>
											<th style="color: white;">Hạn sử dụng</th>
											<th style="color: white;">Giá mua vào</th>
											<th style="color: white;">giá bán ra</th>
											<th style="color: white;">Sl nhập</th>
											<th style="color: white;">Sl đã bán</th>
											<th style="color: white;">Sl đỏi trả</th>
											<th style="color: white;">Sl hiện tại</th>
											<th style="color: white;">Lô hàng tình trạng</th>
											<th style="color: white;">Tùy chọn</th>
										</tr>
									</thead>
									
									<tbody>
										@foreach($lohang as $lh)
										<tr>
											<th style="color: black;">{{$lh->id}}</th>
											<th style="color: black;">{{$lh->shop_id}}</th>
											<th style="color: black;">{{$lh->nhacungcap_id}}</th>
											<th style="color: black;">{{$lh->lohang_ky_hieu}}</th>
											<th style="color: black;">{{$lh->lohang_han_su_dung}}</th>
											<th style="color: black;">{{$lh->lohang_gia_mua_vao}}</th>
											<th style="color: black;">{{$lh->lohang_gia_ban_ra}}</th>
											<th style="color: black;">{{$lh->lohang_so_luong_nhap}}</th>
											<th style="color: black;">{{$lh->lohang_so_luong_da_ban}}</th>
											<th style="color: black;">{{$lh->lohang_so_luong_doi_tra}}</th>
											<th style="color: black;">{{$lh->lohang_so_luong_hien_tai}}</th>
											<th style="color: black;">
												<?php
													if($lh->lohang_tinh_trang==1){
														echo 'còn hàng';
													}else{
														echo 'hết hàng';
													}
												?>
											</th>
											<td>
												<a href="{{route('sualohang',$lh->id)}}" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i> Sửa</a>
												<a href="{{route('xoalohang',$lh->id)}}" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa phần tử này ?')"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</a>
											</td>
										</tr>
										@endforeach
										
									</tbody>
								</table>	
								<div class="row" style="margin-left: 15px;">
									{{$lohang->links()}}
								</div>					
							</div>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
		</div><!--/.row-->
	</div>

@endsection