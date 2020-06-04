@extends('master_user')<!-- ke thua tu trang mmaster-->
<!--thay the noi dung da mat - thay vao cho #yield('contend')-->
@section('title')
	dang ky
@endsection
@section('content')
<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title" style="font-size: 20px;">Đăng ký</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb">
					<a href="{{route('trangchu')}}">Home</a> / <span>Đăng ký</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
<div class="container">
		<div id="content">
			<form action="{{route('dangky')}}" method="post" class="beta-form-checkout">
				<input type="hidden" name="_token" value="{!!csrf_token()!!}">
				<div class="row">
					<div class="col-sm-3"></div>
					<div class="col-sm-6">
						<h2 style="text-align: center; color:green; ">Thêm thông tin người dùng</h2>
						<div class="space20">&nbsp;</div>
							@if(count($errors)>0)
								<div class="alert alert-danger">
									<ul>
										@foreach($errors->all() as $err)
											<li>{!!$err!!}</li>
										@endforeach
									</ul>
								</div>
							@endif
						<div class="form-block">
							<label for="email">Email address*</label>
							<input type="email" id="email" name="email" value="" required>
						</div>

						<div class="form-block">
							<label for="your_last_name">Fullname*</label>
							<input type="text" name="name" value="" required>
						</div>

						<div class="form-block">
							<label for="adress">Address*</label>
							<input type="text" name="address" required>
						</div>

						<div class="form-block">
							<label for="phone">Phone*</label>
							<input type="text" name="phone" required>
						</div>

						<div class="form-block">
							<label for="phone">Password*</label>
							<input type="password" id="password" name="password" required>
						</div>

						<div class="form-block col-md-8 offset-md-4">
							<button type="submit" class="btn btn-primary " style="margin-right:15px;"><i class="fa fa-home fa-2x"></i></button>
							<a href="{{ url('/auth/redirect/facebook') }}" class="btn btn-primary" style="margin-right: 15px; "><i class="fa fa-facebook fa-2x" style="color: white;"></i> </a>
							<a href="{{ url('/auth/redirect/github') }}" class="btn btn-primary" style="margin-right:15px;"><i class="fa fa-github fa-2x" style="color: white;"></i> </a>
						</div>
					</div>
					<div class="col-sm-3"></div>
				</div>
			</form>
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection