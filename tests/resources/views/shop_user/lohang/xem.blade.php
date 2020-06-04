@extends('master_user_shop')<!-- ke thua tu trang mmaster-->
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
											<th style="color: black;">ID</th>
											<th style="color: black;">Ký hiệu</th>
											<th style="color: black;">Hạn sử dụng</th>
											<th style="color: black;">Giá mua vào</th>
											<th style="color: black;">giá bán ra</th>
											<th style="color: black;">Sl nhập</th>
											<th style="color: black;">Sl đã bán</th>
											<th style="color: black;">Sl đổi trả</th>
											<th style="color: black;">Sl hiện tại</th>
											<th style="color: black;">Lô hàng tình trạng</th>
											<th style="color: black;">Nhà cung cấp</th>
											<th style="color: black;">Tùy chọn</th>
										</tr>
									</thead>
									
									<tbody>
										@foreach($lohang as $lh)
										<tr>
											<th style="color: black;">{{$lh->id}}</th>
											<th style="color: black;">{{$lh->lohang_ky_hieu}}</th>
											<th style="color: black;">{{$lh->lohang_han_su_dung}}</th>
											<th style="color: black;">{{$lh->lohang_gia_mua_vao}}</th>
											<th style="color: black;">{{$lh->lohang_gia_ban_ra}}</th>
											<th style="color: black;">{{$lh->lohang_so_luong_nhap}}</th>
											<th style="color: black;">{{$lh->lohang_so_luong_da_ban}}</th>
											<th style="color: black;">{{$lh->lohang_so_luong_doi_tra}}</th>
											<th style="color: black;">{{$lh->lohang_so_luong_hien_tai}}</th>
											<th style="color: black;"><?php if($lh->lohang_so_luong_hien_tai>0) {echo 'còn hàng';}
											else{echo 'hết hàng';}?></th>
											<th style="color: black;">{{$lh->nhacungcap_id}}</th>
											<td>
												<a href="{{route('sualohangshop',$lh->id)}}" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i> Sửa</a>
												<a href="{{route('xoalohangshop',$lh->id)}}" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa phần tử này ?')"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</a>
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