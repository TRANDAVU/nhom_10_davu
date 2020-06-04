@extends('master_user')<!-- ke thua tu trang mmaster-->
<!--thay the noi dung da mat - thay vao cho #yield('contend')-->
@section('title')
shopping cart
@endsection
@section('content')
<section id="cart_items">
    <div class="container">
        <div class="inner-header">
        <div class="container">
            <div class="pull-left">
                <h3 class="inner-title" style="font-size: 20px;">Shopping Cart </h3>
            </div>
            <div class="pull-right">
                <div class="beta-breadcrumb font-large">
                    <a href="{{route('trangchu')}}">Home</a> / <span>shopping cart</span>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
        <div class="container">
		<div id="content">
			<?php
				$content=Cart::content();
			?>
			@if(Session::has('thongbao'))
				<div class="alert alert-danger">{{Session::get('thongbao')}} </div>
			@endif

			@if(Session::has('thongbao000'))
		        <div class="alert alert-success">{{Session::get('thongbao000')}} </div>
		    @endif
			<div class="table-responsive">
				<!-- Shop Products Table -->
				<table class="shop_table beta-shopping-cart-table" cellspacing="0">
					
					<thead>
						<tr>
							<th class="product-name">Product</th>
							<th class="product-price" style="width: 200px;">Price</th>
							<th class="product-quantity" style="width: 200px;">Qty.</th>
							<th class="product-subtotal" style="width: 200px;">Total</th>
							<th class="product-remove">Remove</th>
						</tr>
					</thead>
					<tbody>
						@foreach($content as $c)
						<tr class="cart_item">
							<td class="product-name">
								<img class="pull-left" src="../user/image/images/{{$c->options->image}}" alt="" width="80" height="80">
								<div class="media-body">
									<p class="font-large table-title" style="padding-left: 15px;">{{$c->name}}</p>
									<p class="table-option" style="padding-left: 15px;">Đơn vị: {{$c->options->donvitinh}}</p>
									<br>
								</div>
							</td>

							<td class="product-price">
								<span class="amount">
									{{number_format($c->price)}} vnđ
								</span>
							</td>

							<td class="product-quantity">
								<form action="{{URL::to('/Update-cart/')}}" method="POST">
									{{csrf_field()}}
									<span><input type="number" name="cart_qty" min="1" value="{{$c->qty}}" style="width: 70px; height: 35px;"><br><br>
									<input type="hidden" name="rowId_cart" value="{{$c->rowId}}" class="form-control"></span>
									<input type="hidden" name="id_sp" value="{{$c->id}}" class="form-control"></span>
									<input type="hidden" name="lohang_id" value="{{$c->options->lohang_id}}">
									<input type="submit" name="update_qty" value="cập nhật" class="btn btn-sm btn btn-warning"></span>
								</form>
							</td>

							<td class="product-subtotal">
								<span class="amount" style="color: red;">
									<?php
										$tien=$c->qty*$c->price;
										echo number_format($tien) ." vnd";
									?>
								</span>
							</td>

							<td class="product-remove" onclick="return confirm('Bạn muốn xóa sản phẩm này ?')">
								<a href="{{URL::to('/delete-to-cart/'.$c->rowId)}}" class="remove" title="Remove this item"><i class="fa fa-trash-o"></i></a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
				<div class="cart-totals pull-right"style="width: 450px;">
					<div class="cart-totals-row"><h5 class="cart-total-title">Tổng tiền</h5></div>
					<div class="cart-totals-row" ><span>Tổng tiền:</span> <span>{{Cart::subtotal()}} vnd</span></div>
					<div class="cart-totals-row"><span>Thuế:</span> <span>{{Cart::tax()}} vnd</span></div>
					<div class="cart-totals-row"><span>Thành tiền:</span> <span style="color: red;">{{Cart::total()}} vnd</span></div>
				</div>
				<!-- End of Shop Table Products -->
				<a href="{{ route('dathang') }}" class="btn btn-primary" style="margin-left: 15px;"></i> Thanh toán</a>
				
			</div>

</section> <!--/#cart_items-->

@endsection	