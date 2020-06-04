@extends('master_user')<!-- ke thua tu trang mmaster-->
<!--thay the noi dung da mat - thay vao cho #yield('contend')-->
@section('title')
	dat hang
@endsection
@section('content')
<div class="container">
		<div id="content">
			<?php
				$content=Cart::content();
			?>
			@if(Session::has('thongbao0'))
				<div class="alert alert-danger">{{Session::get('thongbao0')}} </div>
			@endif
			<form action="{{route('dathang')}}" method="POST" class="beta-form-checkout">
				<input type="hidden" name="_token" value="{{csrf_token()}}">
				<div class="row">
					<div class="col-sm-6">
						<h4>Đặt hàng</h4>
						<div class="space20">&nbsp;</div>

						<div class="form-block">
							<label for="name">Họ tên*</label>
							<input type="hidden" name="khachhang_id" value="{{$user->id}}">
							<input type="hidden" name="tinhtranghd_id" value="1">
							<input type="text" id="name"  name="name" placeholder="Họ tên" value="{{$user->name}}" required>
						</div>
						

						<div class="form-block">
							<label for="email">Email*</label>
							<input type="email" id="email"  name="email" value="{{$user->email}}" required placeholder="expample@gmail.com">
						</div>

						<div class="form-block">
							<label for="adress">Địa chỉ*</label>
							<input type="text" id="adress" name="address" placeholder="Street Address" required>
						</div>
						

						<div class="form-block">
							<label for="phone">Điện thoại*</label>
							<input type="text" id="phone" name="phone" required>
						</div>
						
						<div class="form-block">
							<label for="notes">Ghi chú</label>
							<textarea name="your_message" class="ckeditor" placeholder="Your Message"></textarea>
	                        <script type="text/javascript">
	                            var editor = CKEDITOR.replace('your_message',{
	                            	language:'vi',
	                            	filebrowserImageBrowseUrl: '../user/ckfinder/ckfinder.html?Type=Images',
	                            	filebrowserFlashBrowseUrl: '../user/ckfinder/ckfinder.html?Type=Flash',
	                            	filebrowserImageUploadUrl: '../user/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
	                            	filebrowserFlashUploadUrl: '../user/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
	                            });
	                        </script>
							
						</div>
						
					</div>
					<div class="col-sm-6">

						<div class="your-order">
							<div class="your-order-head"><h5>Đơn hàng của bạn</h5></div>
							
							<div class="your-order-body" style="padding: 0px 10px">
								<div class="your-order-item">
									<div>
									<!--  one item	 -->
										@foreach($content as $c)
										<div class="media">
											<img class="pull-left" src="../user/image/images/{{$c->options->image}}" alt="" width="90" height="90">
											<div class="media-body">
												<div class="media-body">
													<p class="font-large table-title" style="padding-left: 15px;"><b>{{$c->name}}</b></p>
													<p class="table-option" style="padding-left: 15px;">Đơn vị: {{$c->options->donvitinh}}</p>
													<p class="table-option" style="padding-left: 15px;">Số lượng: {{$c->qty}}</p>
													<p class="table-option" style="padding-left: 15px;">Tiền: {{($c->price)*($c->qty)}} vnđ</p>
													<input type="hidden" name="tensanpham" value="{{$c->name}}">
													<input type="hidden" name="tidsanpham" value="{{$c->id}}">
													<input type="hidden" name="shop" value="{{$c->options->shop_id}}">
													<input type="hidden" name="lohang_id" value="{{$c->options->lohang_id}}">
													<input type="hidden" name="ctdhtt" value="{{($c->price)*($c->qty)}}">
												</div>
											</div>
										</div>
										@endforeach
									<!-- end one item -->
									</div>

									<div class="clearfix"></div>
								</div>
								<div class="your-order-item">
									<div class="pull-left"><p class="your-order-f18">Tổng tiền:</p></div>
									<div class="pull-right" ><h4 style="color: red"><input type="text" value="{{Cart::total()}} vnd" disabled>
									<?php  $sl=0 ;?>
									@foreach($content as $c)
										<?php $sl = ($sl+($c->price)*($c->qty))+(($c->price)*($c->qty))*0.01; ?>
									@endforeach
									<input type="hidden" name="total_price" value="{{$sl}}">
									</h4></div>
									<div class="clearfix"></div>
								</div>
							</div>

							<div class="space20">&nbsp;</div>

							<div class="your-order-head"><h5>Hình thức thanh toán</h5></div>
							
							<div class="your-order-body">
								<ul class="payment_methods methods">
									<li class="payment_method_bacs">
										<input id="payment_method_bacs" type="radio" class="input-radio" name="payment_method" value="COD"  name="COD" checked="checked" data-order_button_text="">
										<label for="payment_method_bacs">Thanh toán khi nhận hàng </label>
										<div class="payment_box payment_method_bacs" style="display: block;">
											Cửa hàng sẽ gửi hàng đến địa chỉ của bạn, bạn xem hàng rồi thanh toán tiền cho nhân viên giao hàng
										</div>						
									</li>

									<li class="payment_method_cheque">
										<input id="payment_method_cheque" type="radio" class="input-radio" name="payment_method" value="ATM" data-order_button_text="" name="ATM">
										<label for="payment_method_cheque">Chuyển khoản</label>
										<div class="payment_box payment_method_cheque" style="display: none;">
											<p>
												-Chủ thẻ: TRẦN HOÀI DẠ VŨ<br>
												-Ngân hàng: vietcombank<br>
												-Số tk:0231000646886
											</p>
										</div>						
									</li>
								</ul>
							</div>
				
							<div class="text-center"><button type="submit" class="beta-btn primary" onclick="return confirm('Bạn có chắc chắn muốn tiếp tục mua hàng?')">Đặt hàng</button></div>
							
						</div> <!-- .your-order -->
					</div>
				</div>
			</form>
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection