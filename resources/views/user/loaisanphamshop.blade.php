@extends('master_user')<!-- ke thua tu trang mmaster-->
<!--thay the noi dung da mat - thay vao cho #yield('contend')-->
@section('title')
    Loại sản phẩm shop <?php echo $shop->tenshop;?>
@endsection
@section('content')
<div class="inner-header">
        <div class="container">
            <div class="pull-left">
                <h3 class="inner-title" style="font-size: 20px; color: green;"><b>Sản phẩm {{$ten_sp->loaisanpham_ten}} <a href="{{route('shopuser',$shop->id)}}"><?php echo $shop->tenshop;?></a></b></h3>
                <input type="hidden" name="Id" value="{{$ten_sp->id}}">
            </div>
            <div class="pull-right">
                <div class="beta-breadcrumb font-large">
                    <a href="{{route('trangchu')}}">Home</a> / <span>Sản phẩm shop <a href=""></span>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
        @if(Session::has('thongbaoshop'))
            <div class="alert alert-success"><h4 style="color: #5200cc; text-align: center;"> {{Session::get('thongbaoshop')}} </h4></div>
        @endif
        @if(Session::has('thongbao'))
            <div class="alert alert-success"><h4 style="color: #5200cc; text-align: center;"> {{Session::get('thongbao')}} </h4></div>
        @endif
<div class="container">
            <div id="content" class="space-top-none">
                <div class="main-content">
                    <div class="space60">&nbsp;</div>
                    <div class="row">
                        <div class="col-sm-3">
                            <ul class="aside-menu">
                                @foreach($loai as $menu)
                                    <li><a href="{{route('loaisanphamshop',[$menu->id,$shop->id])}}">
                                        <img src="../user/image/images/{{$menu->loaisanpham_anh}}" width="50" height="50"> 
                                        {{$menu->loaisanpham_ten}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="col-sm-9">
                            <div class="beta-products-list">
                                <h4>Sản phẩm theo loại</h4>
                                <div class="beta-products-details">
                                    <p class="pull-left">Tìm thấy {{count($sp_theoloai)}} sản phẩm</p>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="row">
                                    @foreach($sp_theoloai as $sp)
                                    <div class="col-sm-4">
                                        <div class="single-item">
                                            <div class="product">
                                                <a href="{{route('sanpham',$sp->id)}}" class="img-prod">
                                                    <img class="img-fluid" name="anh" src="../user/image/images/{{$sp->sanpham_anh}}" alt="Colorlib Template" style=" width: 270px;height: 270px;">
                                                    @if($sp->phan_tram_km!=0)
                                                        <span class="status">{{$sp->phan_tram_km}}%</span>
                                                    @endif
                                                    <div class="overlay"></div>
                                                </a>
                                                <div class="text py-3 pb-4 px-3 text-center">
                                                    <h3><a href="{{route('sanpham',$sp->id)}}" name="name">{{$sp->sanpham_ten}}</a></h3>
                                                    <div class="d-flex">
                                                        <div class="pricing">
                                                            @if($sp->phan_tram_km==0)
                                                                <p class="price"><span class="mr-2 price-sale">{{number_format($sp->gia_tien)}} vnd</span>
                                                            @else
                                                                <p class="price"><span class="mr-2 price-dc">{{number_format($sp->gia_tien)}} VNĐ</span><span class="price-sale">{{number_format(($sp->gia_tien)-(($sp->gia_tien)*($sp->phan_tram_km))/100)}} VNĐ</span></p>
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
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <!-- .beta-products-list -->
                            <div class="space50">&nbsp;</div>
                            <div class="beta-products-list">
                                <h4>Sản phẩm khác</h4>
                                <div class="beta-products-details">
                                    <p class="pull-left">Tìm thấy {{count($sp_khac)}} sản phẩm</p>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="row">
                                    @foreach($sp_khac as $sp)
                                        <div class="col-sm-4">
                                        <div class="single-item">
                                            <div class="product">
                                                <a href="{{route('sanpham',$sp->id)}}" class="img-prod">
                                                    <img class="img-fluid" name="anh" src="../user/image/images/{{$sp->sanpham_anh}}" alt="Colorlib Template" style=" width: 270px;height: 300px;">
                                                    @if($sp->phan_tram_km!=0)
                                                        <span class="status">{{$sp->phan_tram_km}}%</span>
                                                    @endif
                                                    <div class="overlay"></div>
                                                </a>
                                                <div class="text py-3 pb-4 px-3 text-center">
                                                    <h3><a href="{{route('sanpham',$sp->id)}}" name="name">{{$sp->sanpham_ten}}</a></h3>
                                                    <div class="d-flex">
                                                        <div class="pricing">
                                                            @if($sp->phan_tram_km==0)
                                                                <p class="price"><span class="mr-2 price-sale">{{number_format($sp->gia_tien)}} vnd</span>
                                                            @else
                                                                <p class="price"><span class="mr-2 price-dc">{{number_format($sp->gia_tien)}} VNĐ</span><span class="price-sale">{{number_format(($sp->gia_tien)-(($sp->gia_tien)*($sp->phan_tram_km))/100)}} VNĐ</span></p>
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
                                    </div>
                                     @endforeach
                                </div>
                                        
                                </div>
                                <div class="row">
                                    {{$sp_khac->links()}}
                                </div>
                                <div class="space40">&nbsp;</div>
                            </div>
                            <!-- .beta-products-list -->
                        </div>
                    </div>
                    <!-- end section with sidebar and main content -->
                </div>
                <!-- .main-content -->
            </div>
            <!-- #content -->
        </div>
        <!-- .container -->
@endsection