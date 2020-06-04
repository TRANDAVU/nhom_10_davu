@extends('master_user')<!-- ke thua tu trang mmaster-->
<!--thay the noi dung da mat - thay vao cho #yield('contend')-->
@section('title')
    seach
@endsection
@section('content')

    <div class="container">
        <div id="content" class="space-top-none">
            <div class="main-content">
                <div class="space60">&nbsp;</div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="beta-products-list">
                            <h4>Tìm kiếm</h4>
                            <div class="beta-products-details">
                                <p class="pull-left">Tìm thấy {{count($sanpham)}} sản phẩm</p>
                                <div class="clearfix"></div>
                            </div>

                            <div class="row">
                            @foreach($sanpham as $new)
                                <div class="col-sm-3">
                                    <div class="single-item">
                                        <div class="product">
                                            <a href="{{route('sanpham',$new->id)}}" class="img-prod">
                                                <img class="img-fluid" name="anh" src="../user/image/images/{{$new->sanpham_anh}}" alt="Colorlib Template" style=" width: 270px;height: 300px;">
                                                @if($new->phan_tram_km!=0)
                                                    <span class="status">{{$new->phan_tram_km}}%</span>
                                                @endif
                                                <div class="overlay"></div>
                                            </a>
                                            <div class="text py-3 pb-4 px-3 text-center">
                                                <h3><a href="{{route('sanpham',$new->id)}}" name="name">{{$new->sanpham_ten}}</a></h3>
                                                <div class="d-flex">
                                                    <div class="pricing">
                                                        @if($new->phan_tram_km==0)
                                                            <p class="price" name="price"><span class="mr-2 price-sale">{{number_format($new->gia_tien)}} vnd</span>
                                                        @else
                                                            <p class="price" name="price_sale"><span class="mr-2 price-dc">{{number_format($new->gia_tien)}} VNĐ</span><span class="price-sale">{{number_format(($new->gia_tien)-(($new->gia_tien)*($new->phan_tram_km))/100)}} VNĐ</span></p>
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
                        <div class="row">
                            {{$sanpham->links()}}
                        </div> <!-- .beta-products-list -->
                    </div>
                </div> <!-- end section with sidebar and main content -->
            </div>
            </div> <!-- .main-content -->
    </div> <!-- #content -->

@endsection
