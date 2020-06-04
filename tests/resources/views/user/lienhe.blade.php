@extends('master_user')<!-- ke thua tu trang mmaster-->
<!--thay the noi dung da mat - thay vao cho #yield('contend')-->
@section('title')
lien he
@endsection
@section('content')
<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title" style="font-size: 20px;">Liên hệ</h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb font-large">
                <a href="{{route('trangchu')}}">Home</a> / <span>Liên hệ</span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<div class="beta-map">
    <div class="abs-fullwidth beta-map wow flipInX"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d22022.480430615367!2d108.03180371695288!3d12.643982470185124!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31721de945b5bc67%3A0x99bb9ace54335d15!2zNTY3IEzDqiBEdeG6qW4sIEVhIFRhbSwgVGjDoG5oIHBo4buRIEJ1w7RuIE1hIFRodeG7mXQsIMSQ4bqvayBM4bqvaywgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1568199156431!5m2!1svi!2s" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe></div>
</div>
<div class="container">
    <div id="content" class="space-top-none">
        <div class="space50">&nbsp;</div>
        <div class="row">
            <div class="col-sm-8">
                <h2>Contact Form</h2>
					@if(Session::has('thongbao8'))
						<div class="alert alert-success">{{Session::get('thongbao8')}} </div>
					@endif
					<div class="space20">&nbsp;</div>
					<p>Chúng tôi luôn sẳn lòng phục vụ các bạn.Hãy cho chúng tôi biết bạn đang nghĩ gì?</p>
					<div class="space20">&nbsp;</div>
					<form action="{{route('lienhe')}}" method="post" class="contact-form">	
                    <input type="hidden" name="_token" value="{!!csrf_token()!!}">
                    <div class="form-block">
                        <input name="your_name" type="text" placeholder="Your Name (required)">
                    </div>
                    <div class="form-block">
                        <input name="your_email" type="email" placeholder="Your Email (required)">
                    </div>
                    <div class="form-block">
                        <input name="your_subject" type="text" placeholder="Subject">
                    </div>
                    <div class="form-block">
                        <label>Mô tả</label><br><br>
                        <textarea name="editor1"></textarea>
                        <script>
                            CKEDITOR.replace( 'editor1',{
                                                language:'vi',
                                                filebrowserImageBrowseUrl: '../ckfinder/ckfinder.html?Type=Images',
                                                filebrowserFlashBrowseUrl: '../ckfinder/ckfinder.html?Type=Flash',
                                                filebrowserImageUploadUrl: '../ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                                                filebrowserFlashUploadUrl: '../ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
                                            } );
                        </script>
                        
                    </div>
                    <div class="form-block">
                        <button type="submit" class="beta-btn primary">Send Message <i class="fa fa-chevron-right"></i></button>
                    </div>
                </form>
            </div>
            <div class="col-sm-4">
                <h2>Contact Information</h2>
                <div class="space20">&nbsp;</div>
                <h6 class="contact-title">Address</h6>
                <p>
                    <b> 567-569 Lê Duẩn ,<br>
                    Buôn Ma Thuột, <br>
                    Dallak</b>
                </p>
                <div class="space20">&nbsp;</div>
                <h6 class="contact-title">Business Enquiries</h6>
                <p>
                    <b>Email liên hệ với admin. <br>
                    <a href="thienthanma521@gmail.com">thienthanma521@gmail.com</a></b>
                </p>
                <div class="space20">&nbsp;</div>
                <h6 class="contact-title">Employment</h6>
                <p>
                    <b>Chúng tôi luôn cần nhân tài. <br>
                    <a href="thienthanma521@gmail.com">thienthanma521@gmail.com</a></b>
                </p>
            </div>
        </div>
    </div>
    <!-- #content -->
</div>
<!-- .container -->
@endsection