<div id="footer" class="color-div">
    <div class="container">
        <div class="row">
            <a class="btn-top" href="javascript:void(0);" title="Top" style="display: inline;"></a>
            <div class="col-sm-3">
                <div class="widget">
                    <h4 class="widget-title">Chức năng người bán</h4>
                    <div>
                        <ul>
                            <li><a href="{{route('dangkyshop')}}"><i class="fa fa-chevron-right"></i>Đăng ký mở shop</a></li>
                            <li><a href="{{route('quanlyshop')}}"><i class="fa fa-chevron-right"></i>Quản lý Shop</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="widget">
                    <h4 class="widget-title">Chức năng người dùng</h4>
                    <div>
                        <ul>
                            <?php
                                use Illuminate\Support\Facades\Auth;
                                if(Auth::check()==true){
                                    $id=Auth::user()->id;
                                }
                                else
                                {
                                    $id=0;
                                }
                            ?>
                            <li><a href="{{route('trangchu')}}"><i class="fa fa-chevron-right"></i> Trang chủ</a></li>
                            <li><a href="{{route('lienhe')}}"><i class="fa fa-chevron-right"></i> Liên hệ</a></li>
                            <li><a href="{{route('capnhatthongtin',$id)}}"><i class="fa fa-chevron-right"></i> Cập nhật thông tin</a></li>
                            <li><a href="{{route('gioithieu')}}"><i class="fa fa-chevron-right"></i>Giới thiệu</a></li>
                            <li><a href="{{route('dangnhap')}}"><i class="fa fa-chevron-right"></i> Đăng nhập</a></li>
                            <li><a href="{{route('dangxuat')}}"><i class="fa fa-chevron-right"></i> Đăng xuất</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="col-sm-10">
                    <div class="widget">
                        <h4 class="widget-title">Contact Us</h4>
                        <div>
                            <div class="contact-info">
                                <i class="fa fa-map-marker"></i>
                                <p>159 Hòa phú,BMT,Daklak</p>
                                <p>Rất vui được hợp tác với bạn.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="widget">
                    <h4 class="widget-title"></h4>
                </div>
            </div>
        </div>
        <!-- .row -->
    </div>
    <!-- .container -->
</div>