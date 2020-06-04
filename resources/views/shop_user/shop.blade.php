@extends('master_user')<!-- ke thua tu trang mmaster-->
<!--thay the noi dung da mat - thay vao cho #yield('contend')-->
@section('title')
    <?php echo $shop->tenshop;?>
@endsection

@section('content')
<div class="inner-header">
        <div class="container">
            <div class="pull-left">
                <h3 class="inner-title" style="font-size: 20px; color: green;"><b>Chào mừng bạn đến với <?php echo $shop->tenshop;?></b></h3>
            </div>
            <div class="pull-right">
                <div class="beta-breadcrumb font-large">
                    <a href="{{route('trangchu')}}">Home</a> / <span>Shop</span>
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

    @if(count($slideshop)==0)
        <div id="wowslider-container1" style="width: 100%; padding-top: -20px;">    
            <div class="ws_images">
                <ul>
                    @foreach($anhslide as $anh)
                        <li>
                            <img src="../user/image/images/{{$anh->quangcao_anh}}" title="{{$anh->title}}" />
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
        </div>
    @else
        <div id="wowslider-container1" style="width: 100%; padding-top: -20px;">    
            <div class="ws_images">
                <ul>
                    @foreach($slideshop as $anh)
                        <li>
                            <img src="../user/image/images/{{$anh->anh}}" title="{{$anh->title}}" />
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="ws_bullets">
                <div>
                    @foreach($slideshop as $anh)
                        <a title="{{$anh->mota}}"></a>
                    @endforeach
                </div>
            </div>
        </div>
    @endif

<div class="container">

            <div id="content" class="space-top-none">
                <div class="main-content">
                    <div class="space60">&nbsp;</div>
                    <div class="row">
                        <div class="col-sm-3">
                            <ul class="aside-menu">
                                @foreach($menu as $menu)
                                    <li><a href="{{route('loaisanphamshop',[$menu->id,$shop->id])}}"><img src="../user/image/images/{{$menu->loaisanpham_anh}}" width="50" height="50"> {{$menu->loaisanpham_ten}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="col-sm-9">
                        <div class="row">
                <div class="col-sm-12">
                    <div class="beta-products-list">
                        <div class="row">
                            @foreach($spshop as $new)
                                <div class="col-sm-4">
                                    <div class="single-item">
                                        <div class="product">
                                            <a href="{{route('sanpham',$new->id,$new->donvitinh_id)}}" class="img-prod">
                
                                                <img class="img-fluid" name="anh" src="../user/image/images/{{$new->sanpham_anh}}" alt="Colorlib Template" style=" width: 300px;height: 270px;">
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
                </div>
                <div class="space40">&nbsp;</div>
                <div class="row block">
                    {{$spshop->links()}}
                </div>
            </div>

                            <!-- .beta-products-list -->
                            <div class="space50">&nbsp;</div>
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