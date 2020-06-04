@extends('master_user')<!-- ke thua tu trang mmaster-->
<!--thay the noi dung da mat - thay vao cho #yield('contend')-->
@section('title')
    san pham
@endsection
@section('content')
<div class="inner-header">
        <div class="container">
            <div class="pull-right">
                <div class="beta-breadcrumb font-large">
                    <a href="{{route('trangchu')}}">Home</a> / <span>Chi tiết sản phẩm</span>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
<div class="container">
    @if(Session::has('thongbao_3'))
        <div class="alert alert-success">{{Session::get('thongbao_3')}} </div>
    @endif

    @if(Session::has('thongbao00'))
        <div class="alert alert-success">{{Session::get('thongbao00')}} </div>
    @endif
            <div id="content">
                <div class="row">
                    <div class="col-sm-9">
                        <div class="row">
                            <div class="col-sm-4">
                                <img src="../user/image/images/{{$sanpham->sanpham_anh}}" width="270" height="320" alt="">
                            </div>
                            <div class="col-sm-8">
                                <form action="{{URL::to('/save-cart')}}" method="POST">
                                    {{csrf_field()}}
                                    <div class="single-item-body">
                                        <h2>{{$sanpham->sanpham_ten}}</h2>
                                        <p class="single-item-price" name="price" style="margin-top:0px; ">
                                            <span>
                                                <div class="pricing">
                                                    @if($sanpham->phan_tram_km==0)
                                                        <h3 style="color: red;" name="price">{{number_format($sanpham->gia_tien)}} vnd</h3>
                                                    @else
                                                        <h3 style="color: red;" name="price">{{number_format(($sanpham->gia_tien)-(($sanpham->gia_tien)*($sanpham->phan_tram_km))/100)}} VNĐ</h3>
                                                    @endif
                                                </div>
                                            </span>
                                        </p>
                                    </div>
                                    <?php $id=$sanpham->id;?>

                                    <?php 
                                       use Illuminate\Support\Facades\Auth;
                                       use App\shop;
                                       use App\sanpham;
                                       $sanpham=sanpham::where('id',$id)->first();
                                       $shop=shop::where('id','=',$sanpham->shop_id)->first(); 
                                    ?>

                                    <input type="hidden" name="shop_id_user" value="{{$sanpham->shop_id}}">
                                    
                                    <p style="color: black;">Tùy chọn:</p>
                                    <div class="single-item-options">
                                        <select class="wc-select"  name="donvi" >
                                            <option>Đơn vị tính</option>
                                            @foreach($donvi as $dv)
                                                <option  value="{{$dv->donvitinh_ten}}">{{$dv->donvitinh_ten}}</option>
                                            @endforeach
                                        </select>
                                        <input type="hidden" name="productid_hidden" value="{{$sanpham->id}}">
                                        <input type="hidden" name="shop" value="{{$sanpham->shop_id}}">
                                        <input type="hidden" name="lohang_id" value="{{$sanpham->lohang_id}}">
                                        <input type="number" name="qty" min="1" value="1" style="width: 50px; height: 35px;">
                                        @if($soluong->sl==0)
                                            <input type="hidden" class="btn btn-fefault cart fa fa-shopping-cart" style="background:  #4dffff;  margin-left: 15px;"  value=" Mua hàng">
                                        @else
                                            <input type="submit" class="btn btn-fefault cart fa fa-shopping-cart" style="background:  #4dffff;  margin-left: 15px;"  value=" Mua hàng">
                                        @endif
                                        <div class="clearfix"></div>
                                    </div>
                                </form>
                                <div class="space20">&nbsp;</div>
                                <p style="color: red;"><b>@if($soluong->sl==0) Hết hàng,mong quý khách thông cảm @else Sản phẩm có trong kho : {{$soluong->sl}} @endif</b></p>
                                <p style="color: red;"><i>Giá sản phẩm tính theo kg.</i></p>
                                <span><p><b>Đánh giá sản phẩm: </b></p>
                                <div class="fb-like" data-href="{{Request::url()}}" data-width="" data-layout="box_count" data-action="like" data-size="small" data-share="false" style="margin-left: 15px;"></div></span>
                            </div>
                        </div>
                        <div class="space40">&nbsp;</div>
                        <div class="woocommerce-tabs">
                            <ul class="tabs">
                                <li><a href="#tab-description">Mô tả sản phẩm</a></li>
                                <li><a href="#tab-reviews">Bình luận sản phẩm</a></li>
                                <li><a href="#add-comment">Shop và thông tin về shop</a></li>
                            </ul>
                            <div class="panel" id="tab-description" style="color: black; overflow-y: auto;height: 500px;">
                                <?php echo $sanpham->sanpham_mo_ta;?>
                            </div>
                            <div class="panel" id="tab-reviews" style="color: black; overflow-y: auto;height: 500px;">
                                <div class="fb-comments" data-href="{{Request::url()}}" data-width="700" data-numposts="5"></div>
                            </div>
                             <div class="panel" id="add-comment" style="color: black; overflow-y: auto;height: 500px;">
                                
                                <b style="color: red;">Ghé thăm shop chúng tôi. </b><a class="btn btn-primary" href="{{route('shopuser',$shop->id)}}" role="button"><b>Shop {{$shop->tenshop}}</b></a>
                                <br>
                                <?php echo $shop->mota;?>
                            </div>
                        </div>
                        <div class="space50">&nbsp;</div>
                        <div class="beta-products-list">
                            <h4>Sản phẩm tương tự</h4>
                            <div class="beta-products-details">
                                    <p class="pull-left">Tìm thấy {{count($sanpham_tuongtu)}} sản phẩm</p>
                                    <div class="clearfix"></div>
                                </div>
                            <div class="row">
                                @foreach($sanpham_tuongtu as $sptt)
                                <div class="col-sm-4">
                                    <div class="single-item">
                                        <div class="product">
                                            <a href="{{route('sanpham',$sptt->id)}}" class="img-prod">
                                                <img class="img-fluid" name="anh" src="../user/image/images/{{$sptt->sanpham_anh}}" alt="Colorlib Template">
                                                @if($sptt->phan_tram_km!=0)
                                                    <span class="status">{{$sptt->phan_tram_km}}%</span>
                                                @endif
                                                <div class="overlay"></div>
                                            </a>
                                            <div class="text py-3 pb-4 px-3 text-center">
                                                <h3><a href="{{route('sanpham',$sptt->id)}}" name='name'>{{$sptt->sanpham_ten}}</a></h3>
                                                <div class="d-flex">
                                                    <div class="pricing">
                                                        @if($sptt->phan_tram_km==0)
                                                            <p class="price" name="price"><span class="mr-2 price-sale">{{number_format($sptt->gia_tien)}} vnd</span>
                                                        @else
                                                            <p class="price" name="price_sale"><span class="mr-2 price-dc">{{number_format($sptt->gia_tien)}} VNĐ</span><span class="price-sale">{{number_format(($sptt->gia_tien)-(($sptt->gia_tien)*($sptt->phan_tram_km))/100)}} VNĐ</span></p>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="bottom-area d-flex px-3">
                                                    <div class="m-auto d-flex">
                                                        @if($sptt->sl==0)
                                                        <form action="{{URL::to('/save-cart')}}" method="POST" onclick="return confirm('Sản phẩm bạn chọn đã hết,mong bạn quay lạ lần sau ?')">
                                                                
                                                        </form>
                                                        @else
                                                        <form action="{{URL::to('/save-cart')}}" method="POST" onclick="return confirm('Bạn có chắc chắn muốn tiếp tục mua hàng?')">
                                                                <input type="hidden" name="product_id" value="{{$sptt->id}}">
                                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                                <button type="submit" class="add-to-cart d-flex justify-content-center align-items-center text-center" style="font-size:24px; color: white; border-radius: 20px; width: 45px;height: 45px; background: #4dff88;">
                                                                    <i class="fa fa-shopping-cart"></i>
                                                                </button>
                                                                <input type="hidden" name="productid_hidden" value="{{$sptt->id}}">
                                                                <input type="hidden" name="shop" value="{{$sptt->shop_id}}">
                                                                <input type="hidden" name="lohang_id" value="{{$sptt->lohang_id}}">
                                                                <input type="hidden" name="qty" min="1" value="1" style="width: 50px; height: 35px;">
                                                                <input type="hidden" name="donvi" min="1" value="kg" style="width: 50px; height: 35px;">
                                                        </form>
                                                        @endif
                                                        
                                                        <a href="{{route('sanpham',$sptt->id)}}" class="add-to-cart d-flex justify-content-center align-items-center text-center"style="font-size:24px; color: white; border-radius: 20px; width: 45px;height: 45px; background: #4dff88;">
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
                            {{$sanpham_tuongtu->links()}}
                        </div>
                        <!-- .beta-products-list -->
                    </div>
                    <div class="col-sm-3 aside">
                        <!-- best sellers widget -->
                        <div class="widget">
                            <h3 class="widget-title">SẢN PHẨM MỚI</h3>
                            <div class="widget-body">
                                 @foreach($sanphammoi as $spm)
                                <div class="beta-sales beta-lists">
                                    <div class="media beta-sales-item">
                                        <a class="pull-left" name="anh" href="{{route('sanpham',$spm->id)}}"><img src="../user/image/images/{{$spm->sanpham_anh}}" alt=""></a>
                                        <div class="media-body" name='name'>
                                            {{$spm->sanpham_ten}}<br>
                                            <div class="pricing">
                                                @if($spm->phan_tram_km==0)
                                                    <p class="price"><span class="mr-2 price-sale">{{number_format($spm->gia_tien)}} vnd</span>
                                                @else
                                                    <span class="price-sale">{{number_format(($spm->gia_tien)-(($spm->gia_tien)*($spm->phan_tram_km))/100)}} VNĐ</span></p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                 @endforeach
                            </div>
                        </div>
                        <!-- best sellers widget -->
                    </div>
                </div>
            </div>
            <!-- #content -->
        </div>
        <!-- .container -->
@endsection