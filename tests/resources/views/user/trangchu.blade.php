@extends('master_user')<!-- ke thua tu trang mmaster-->
<!--thay the noi dung da mat - thay vao cho #yield('contend')-->
@section('title')
Trang chủ
@endsection
@section('content')
<div id="wowslider-container1" style="width: 100%;">    
    <div class="ws_images">
        <ul>
            @foreach($anhslide as $anh)
                <li>
                    <img src="../user/image/images/{{$anh->quangcao_anh}}"  title="{{$anh->title}}" />
                </li>
            @endforeach
        </ul>
    </div>
    <div class="ws_bullets">
        <div>
            @foreach($anhslide as $anh)
                <a title="{{$anh->title}}"></a>
            @endforeach
        </div>
    </div>
    <div class="ws_shadow" style="background: black;"></div>
    </div> 
    <!-- End WOWSlider.com BODY section -->
</div>
@if(Session::has('thongbao_1'))
    <div class="alert alert-success"><h4 style="color: #5200cc; text-align: center;"> {{Session::get('thongbao_1')}} </h4></div>
@endif

@if(Session::has('thongbao_loi_002'))
    <div class="alert alert-danger"><h4 style="color: #5200cc; text-align: center;"> {{Session::get('thongbao_loi_002')}} </h4></div>
@endif
@if(Session::has('thongbao_2'))
    <div class="alert alert-danger"><h4 style="color: #5200cc; text-align: center;"> {{Session::get('thongbao_2')}} </h4></div>
@endif
@if(Session::has('thongbao_4'))
    <div class="alert alert-danger"><h4 style="color: #5200cc; text-align: center;"> {{Session::get('thongbao_4')}} </h4></div>
@endif
@if(Session::has('thongbao_5'))
    <div class="alert alert-danger"><h4 style="color: #5200cc; text-align: center;"> {{Session::get('thongbao_5')}} </h4></div>
@endif
 @if(Session::has('thongbao_shop_0'))
    <div class="alert alert-danger"><h4 style="color: #5200cc; text-align: center;"> {{Session::get('thongbao_shop_0')}} </h4></div>
@endif 

@if(Session::has('thongbao_loi_003'))
    <div class="alert alert-danger"><h4 style="color: #5200cc; text-align: center;"> {{Session::get('thongbao_loi_003')}} </h4></div>
@endif
<div class="container">
    <div id="content" class="space-top-none">
        <div class="main-content">
            <div class="space60">&nbsp;</div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="beta-products-list">
                        <h4>Sản Phẩm Mới</h4>
                            <div class="beta-products-details">
                                <p class="pull-left">Tìm thấy {{count($new_product)}} sản phẩm</p>
                                <div class="clearfix"></div>
                            </div>
                        <div class="row">
                            @foreach($new_product as $new)
                                <div class="col-sm-3">
                                    <div class="single-item">
                                        <div class="product">
                                            <a href="{{route('sanpham',$new->id,$new->donvitinh_id)}}" class="img-prod">
                                                <img class="img-fluid" src="../user/image/images/{{$new->sanpham_anh}}" alt="Colorlib Template" style=" width: 270px;height: 300px;">
                                                @if($new->phan_tram_km!=0)
                                                    <span class="status">{{$new->phan_tram_km}}%</span>
                                                @endif
                                                <div class="overlay"></div>
                                            </a>
                                            <div class="text py-3 pb-4 px-3 text-center">
                                                <h3><a href="{{route('sanpham',$new->id)}}">{{$new->sanpham_ten}}</a></h3>
                                                <div class="d-flex">
                                                    <div class="pricing">
                                                        @if($new->phan_tram_km==0)
                                                            <p class="price"><span class="mr-2 price-sale">{{number_format($new->gia_tien)}} vnd</span>
                                                        @else
                                                            <p class="price" ><span class="mr-2 price-dc">{{number_format($new->gia_tien)}} VNĐ</span><span class="price-sale">{{number_format(($new->gia_tien)-(($new->gia_tien)*($new->phan_tram_km))/100)}} VNĐ</span></p>
                                                        @endif
                                                        
                                                    </div>
                                                </div>
                                                <div class="bottom-area d-flex px-3">
                                                    <div class="m-auto d-flex">
                                                        @if($new->lohang_so_luong_hien_tai==0)
                                                        <form action="{{URL::to('/save-cart')}}" method="POST" onclick="return confirm('Sản phẩm bạn chọn đã hết,mong bạn quay lạ lần sau ?')">
                                                                
                                                        </form>
                                                        @else
                                                        <form action="{{URL::to('/save-cart')}}" method="POST" onclick="return confirm('Bạn có chắc chắn muốn tiếp tục mua hàng?')">
                                                                <input type="hidden" name="product_id" value="{{$new->id}}">
                                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                                <button type="submit" class="add-to-cart d-flex justify-content-center align-items-center text-center" style="font-size:24px; color: white; border-radius: 20px; width: 45px;height: 45px; background: #4dff88;">
                                                                    <i class="fa fa-shopping-cart"></i>
                                                                </button>
                                                                <input type="hidden" name="productid_hidden" value="{{$new->id}}">
                                                                <input type="hidden" name="shop" value="{{$new->shop_id}}">
                                                                <input type="hidden" name="lohang_id" value="{{$new->lohang_id}}">
                                                                <input type="hidden" name="qty" min="1" value="1" style="width: 50px; height: 35px;">
                                                                <input type="hidden" name="donvi" min="1" value="kg" style="width: 50px; height: 35px;">
                                                        </form>
                                                        @endif
                                                        
                                                        <a href="{{route('sanpham',$new->id)}}" class="add-to-cart d-flex justify-content-center align-items-center text-center"style="font-size:24px; color: white; border-radius: 20px; width: 45px;height: 45px; background: #4dff88;">
                                                        <span><i class="ion-ios-menu"></i></span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- .beta-products-list -->
                    <div class="beta-products-list">
                        <h4>Sản phẩm khuyến mãi</h4>
                            <div class="beta-products-details">
                                <p class="pull-left">Tìm thấy {{count($sanpham_giamgia)}} sản phẩm</p>
                                <div class="clearfix"></div>
                            </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="beta-products-list">
                                    @foreach($sanpham_giamgia as $sp)
                                    <div class="col-sm-3">
                                        <div class="product">
                                            <a href="{{route('sanpham',$sp->id)}}" class="img-prod">
                                                <img class="img-fluid" name="anh" src="../user/image/images/{{$sp->sanpham_anh}}" alt="Colorlib Template" style=" width: 270px;height: 300px;">
                                                @if($sp->phan_tram_km!=0)
                                                    <span class="status">{{$sp->phan_tram_km}}%</span>
                                                @endif
                                                <div class="overlay"></div>
                                            </a>
                                            <div class="text py-3 pb-4 px-3 text-center">
                                                <h3><a href="{{route('sanpham',$sp->id,$sp->donvitinh_id)}}" name='name'>{{$sp->sanpham_ten}}</a></h3>
                                                <div class="d-flex">
                                                    <div class="pricing">
                                                        @if($sp->phan_tram_km==0)
                                                            <p class="price"><span class="mr-2 price-sale">{{number_format($sp->gia_tien)}} vnd</span>
                                                        @else
                                                            <p class="price" ><span class="mr-2 price-dc">{{number_format($sp->gia_tien)}} VNĐ</span><span class="price-sale">{{number_format(($sp->gia_tien)-(($sp->gia_tien)*($sp->phan_tram_km))/100)}} VNĐ</span></p>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="bottom-area d-flex px-3">
                                                    <div class="m-auto d-flex">
                                                       @if($sp->lohang_so_luong_hien_tai==0)
                                                        <form action="{{URL::to('/save-cart')}}" method="POST" onclick="return confirm('Sản phẩm bạn chọn đã hết,mong bạn quay lạ lần sau ?')">
                                                                
                                                        </form>
                                                        @else
                                                        <form action="{{URL::to('/save-cart')}}" method="POST" onclick="return confirm('Bạn có chắc chắn muốn tiếp tục mua hàng?')">
                                                                <input type="hidden" name="product_id" value="{{$sp->id}}">
                                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                                <button type="submit" class="add-to-cart d-flex justify-content-center align-items-center text-center" style="font-size:24px; color: white; border-radius: 20px; width: 45px;height: 45px; background: #4dff88;">
                                                                    <i class="fa fa-shopping-cart"></i>
                                                                </button>
                                                                <input type="hidden" name="productid_hidden" value="{{$sp->id}}">
                                                                <input type="hidden" name="shop" value="{{$sp->shop_id}}">
                                                                <input type="hidden" name="lohang_id" value="{{$sp->lohang_id}}">
                                                                <input type="hidden" name="qty" min="1" value="1" style="width: 50px; height: 35px;">
                                                                <input type="hidden" name="donvi" min="1" value="kg" style="width: 50px; height: 35px;">
                                                        </form>
                                                        @endif
                                                        <a href="{{route('sanpham',$sp->id)}}" class="add-to-cart d-flex justify-content-center align-items-center text-center"style="font-size:24px; color: white; border-radius: 20px; width: 45px;height: 45px; background: #4dff88;">
                                                        <span><i class="ion-ios-menu"></i></span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="row">
                                {{$new_product->links()}}
                            </div>

                            <div class="space40">&nbsp;</div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- .beta-products-list -->
        </div>
    </div>
    <!-- end section with sidebar and main content -->
</div>
<!-- .main-content -->
</div>
<!-- #content -->
</div> <!-- .container -->
@endsection