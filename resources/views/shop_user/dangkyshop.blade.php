@extends('master_user')<!-- ke thua tu trang mmaster-->
<!--thay the noi dung da mat - thay vao cho #yield('contend')-->
@section('title')
Đăng ký shop
@endsection
@section('content')
<style type="text/css">
    /* form styles */
    form .row {
    display: block;
    padding: 7px 8px;
    margin-bottom: 7px;
    }
    form .row:hover {
    background: #f1f7fa;
    }
    form label {
    display: inline-block;
    font-size: 1.2em;
    font-weight: bold;
    width: 120px;
    padding: 6px 0;
    color: #464646;
    vertical-align: top;
    }
    form .req { color: #ca5354; }
    form .note {
    font-size: 1.2em;
    line-height: 1.33em;
    font-weight: normal;
    padding: 2px 7px;
    margin-bottom: 10px;
    }
    form input:focus, form textarea:focus { outline: none; }
    /* placeholder styles: http://stackoverflow.com/a/2610741/477958 */
    ::-webkit-input-placeholder { color: #aaafbd; font-style: italic; } /* WebKit */
    :-moz-placeholder { color: #aaafbd; font-style: italic; }           /* Mozilla Firefox 4 to 18 */
    ::-moz-placeholder { color: #aaafbd; font-style: italic; }          /* Mozilla Firefox 19+ */
    :-ms-input-placeholder { color: #aaafbd; font-style: italic; }      /* Internet Explorer 10+ */
    form .txt {
    display: inline-block;
    padding: 8px 9px;
    padding-right: 30px;
    width: 90%;
    font-family: 'Oxygen', sans-serif;
    font-size: 1.35em;
    font-weight: normal;
    color: #898989;
    background-color: #f0f0f0;
    background-image: url('images/checkmark.png');
    background-position: 110% center;
    background-repeat: no-repeat;
    border: 1px solid #ccc;
    text-shadow: 0 1px 0 rgba(255,255,255,0.75);
    -webkit-box-sizing: content-box;
    -moz-box-sizing: content-box;
    box-sizing: content-box;
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    border-radius: 3px;
    -webkit-box-shadow: 0 1px 2px rgba(25, 25, 25, 0.25) inset, -1px 1px #fff;
    -moz-box-shadow: 0 1px 2px rgba(25, 25, 25, 0.25) inset, -1px 1px #fff;
    box-shadow: 0 1px 2px rgba(25, 25, 25, 0.25) inset, -1px 1px #fff;
    -webkit-transition: all 0.3s linear;
    -moz-transition: all 0.3s linear;
    transition: all 0.3s linear;
    }
    form .txtarea {
    display: inline-block;
    padding: 8px 11px;
    padding-right: 30px;
    width: 100%;
    height: 120px;
    font-family: 'Oxygen', sans-serif;
    font-size: 1.35em;
    font-weight: normal;
    color: #898989;
    background-color: #f0f0f0;
    background-image: url('images/checkmark.png');
    background-position: 110% 4%;
    background-repeat: no-repeat;
    border: 1px solid #ccc;
    text-shadow: 0 1px 0 rgba(255,255,255,0.75);
    -webkit-box-sizing: content-box;
    -moz-box-sizing: content-box;
    box-sizing: content-box;
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    border-radius: 3px;
    -webkit-box-shadow: 0 1px 4px -1px #a8a8a8 inset;
    -moz-box-shadow: 0 1px 4px -1px #a8a8a8 inset;
    box-shadow: 0 1px 4px -1px #a8a8a8 inset;
    -webkit-transition: all 0.3s linear;
    -moz-transition: all 0.3s linear;
    transition: all 0.3s linear;
    }
    form .txt:focus, form .txtarea:focus {
    width: 100%;
    color: #545454;
    background-color: #fff;
    background-position: 110% center;
    background-repeat: no-repeat;
    border-color: #059;
    -webkit-box-shadow: 0 1px 4px -1px #a8a8a8 inset, 0 1px rgba(255, 255, 255, 0.6), 0 0 11px rgba(70, 100, 200, 0.7);
    -moz-box-shadow: 0 1px 4px -1px #a8a8a8 inset, 0 1px rgba(255, 255, 255, 0.6), 0 0 11px rgba(70, 100, 200, 0.7);
    box-shadow: 0 1px 4px -1px #a8a8a8 inset, 0 1px rgba(255, 255, 255, 0.6), 0 0 11px rgba(70, 100, 200, 0.7);
    }
    form .txtarea:focus {
    width: 100%;
    background-position: 110% 4%;
    }
    form .txt:valid {
    background-color: #deecda;
    background-position: 98% center;
    background-repeat: no-repeat;
    color: #7d996e;
    border: 1px solid #95bc7d;
    }
    form .txtarea:valid {
    background-color: #deecda;
    background-position: 98% 4%;
    background-repeat: no-repeat;
    color: #7d996e;
    border: 1px solid #95bc7d;
    }
    form .txt:focus:valid, form .txtarea:focus:valid {
    -webkit-box-shadow: 0 1px 4px -1px #a8a8a8 inset, 0 1px rgba(255, 255, 255, 0.6), 0 0 11px rgba(120, 200, 70, 0.7);
    -moz-box-shadow: 0 1px 4px -1px #a8a8a8 inset, 0 1px rgba(255, 255, 255, 0.6), 0 0 11px rgba(120, 200, 70, 0.7);
    box-shadow: 0 1px 4px -1px #a8a8a8 inset, 0 1px rgba(255, 255, 255, 0.6), 0 0 11px rgba(120, 200, 70, 0.7);
    }
    #submitbtn {
    height: 70px;
    width: 275px;
    padding: 0;
    cursor: pointer;
    font-family: 'Oxygen', Arial, sans-serif;
    font-size: 2.0em;
    color: #0a528f;
    text-shadow: 1px 1px 0 rgba(255,255,255,0.65);
    border-width: 1px;
    border-style: solid;
    border-color: #317bd6 #3784e3 #2d74d5 #3774e3;
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    border-radius: 3px;
    background-color: #4581e5;
    background-image: -webkit-gradient(linear, left top, left bottom, from(#6faefd), to(#4581e5));
    background-image: -webkit-linear-gradient(top, #6faefd, #4581e5);
    background-image: -moz-linear-gradient(top, #6faefd, #4581e5);
    background-image: -ms-linear-gradient(top, #6faefd, #4581e5);
    background-image: -o-linear-gradient(top, #6faefd, #4581e5);
    background-image: linear-gradient(top, #6faefd, #4581e5);
    -moz-box-shadow: 1px 1px 3px rgba(0,0,0,0.4), 0 1px 0 rgba(255, 255, 255, 0.5) inset;
    -webkit-box-shadow: 1px 1px 3px rgba(0,0,0,0.4), 0 1px 0 rgba(255, 255, 255, 0.5) inset;
    box-shadow: 1px 1px 3px rgba(0,0,0,0.4), 0 1px 0 rgba(255, 255, 255, 0.5) inset;
    -webkit-transition: all 0.3s linear;
    -moz-transition: all 0.3s linear;
    transition: all 0.3s linear;
    }
    #submitbtn:hover, #submitbtn:focus {
    -webkit-box-shadow: 0 0 15px rgba(70, 100, 200, 0.9);
    -moz-box-shadow: 0 0 15px rgba(70, 100, 200, 0.9);
    box-shadow: 0 0 15px rgba(70, 100, 200, 0.9);
    }
    #submitbtn:active {
    -webkit-box-shadow: 0 0 15px rgba(70, 100, 200, 0.9), 0 1px 3px rgba(0,0,0,0.4) inset;
    -moz-box-shadow: 0 0 15px rgba(70, 100, 200, 0.9), 0 1px 3px rgba(0,0,0,0.4) inset;
    box-shadow: 0 0 15px rgba(70, 100, 200, 0.9), 0 1px 3px rgba(0,0,0,0.4) inset;
    }
</style>
<div class="container">
    <div id="content" class="space-top-none">
        <div class="main-content " >
            @if(Session::has('thongbao0001'))
                <div class="alert alert-danger"><h4 style="color: #5200cc; text-align: center;"> {{Session::get('thongbao0001')}} </h4></div>
            @endif
           
            <form id="contactform" name="contact" method="post" action="{{route('dangkyshop')}}">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <p class="note"><span class="req"></span>
                <h2 style="text-align: center;"><b > ĐIỀN ĐẦY ĐỦ THÔNG TIN ĐƠN VỊ KINH DOANH</b></h2>
                </p>
                <br>
                <br>
                <div class="row ">
                    <label for="name">Tên ảnh <span class="req">*</span></label>
                    <input type="text" name="c1" id="name" class="txt" tabindex="1" placeholder="Tên ảnh" required>
                </div>
                
                <div class="row">
                    <label for="name">Tên shop <span class="req">*</span></label>
                    <input type="text" name="c2" id="name" class="txt" tabindex="1" placeholder="Tên shop" required>
                </div>
                <div class="row">
                    <label for="name">Địa chỉ <span class="req">*</span></label>
                    <input type="text" name="c3" id="name" class="txt" tabindex="1" placeholder="Địa chỉ" required>
                </div>
                <div class="row">
                    <label for="name">Số điện thoại <span class="req">*</span></label>
                    <input type="text" name="c4" id="name" class="txt" tabindex="1" placeholder="Số điện thoại" required>
                </div>
                <div class="row">
                    <label for="email">Địa chỉ E-mail <span class="req">*</span></label>
                    <input type="email" name="c5" id="email" class="txt" tabindex="2" placeholder="address@domain.com" required>
                </div>
                
                <div class="row">
                    
                    <div class="form-block">
                        <label>Mô tả</label><br><br>
                        <textarea name="c6"></textarea>
                        <script>
                            CKEDITOR.replace( 'c6',{
                                                language:'vi',
                                                filebrowserImageBrowseUrl: '../ckfinder/ckfinder.html?Type=Images',
                                                filebrowserFlashBrowseUrl: '../ckfinder/ckfinder.html?Type=Flash',
                                                filebrowserImageUploadUrl: '../ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                                                filebrowserFlashUploadUrl: '../ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
                                            } );
                        </script>
                        
                    </div>
                <input type="hidden" name="c7" id="name" class="txt" tabindex="1" value="{{$udn->id}}" required>
                <div class="center">
                    <input type="submit" id="submitbtn" name="submitbtn" tabindex="5" value="Send Message">
                </div>
            </form>
        </div>
    </div>
    <!-- end section with sidebar and main content -->
</div>
<!-- .main-content -->
</div>
<!-- #content -->
</div> <!-- .container -->
@endsection