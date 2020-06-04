<!doctype html>
<html lang="en">
    <head>
      <base href="{{ asset('public/user') }}/">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('title') </title>
        <link href='http://fonts.googleapis.com/css?family=Dosis:300,400' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/dest/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/dest/vendors/colorbox/example3/colorbox.css">
        <link rel="stylesheet" href="assets/dest/rs-plugin/css/settings.css">
        <link rel="stylesheet" href="assets/dest/rs-plugin/css/responsive.css">
        <link rel="stylesheet" title="style" href="assets/dest/css/style.css">
        <link rel="stylesheet" href="assets/dest/css/animate.css">
        <link rel="stylesheet" title="style" href="assets/dest/css/huong-style.css">
        <link rel="stylesheet" href="assets/dest/css/open-iconic-bootstrap.min.css">
        <link rel="stylesheet" href="assets/dest/css/ionicons.min.css">
        <link rel="stylesheet" href="assets/dest/css/flaticon.css">
        <link rel="stylesheet" href="assets/dest/css/icomoon.css">
        <link rel="stylesheet" title="style" href="assets/dest/css/huong-style.css">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <!-- Start WOWSlider.com HEAD section -->
        <link rel="stylesheet" type="text/css" href="engine1/style.css" />
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="//cdn.ckeditor.com/4.13.1/full/ckeditor.js"></script>

        <script type="text/javascript" src="engine1/jquery.js"></script>
        <!-- End WOWSlider.com HEAD section -->
        <script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async=""></script>
        <!-- Google Tag Manager -->
                    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
                    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
                    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
                    })(window,document,'script','dataLayer','GTM-KL2J4DJ');</script>
                    <!-- End Google Tag Manager -->
        <style type="text/css">
            #myBtn {
              display: none;
              position: fixed;
              bottom: 0px;
              right: 0px;
              z-index: 99;
              font-size: 18px;
              border: none;
              outline:  none;
              background-color: rgba(255,100,128,0.9);
              color: white;
              text-align: center;
              cursor: pointer;
              padding: 15px;
              border-radius: 10px;
              height: 40px;
            }

            #myBtn:hover {
              background-color: #555;
            }

            
        </style>
        <!-- Facebook Pixel Code -->
<script>
  !function(f,b,e,v,n,t,s)
  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
  n.queue=[];t=b.createElement(e);t.async=!0;
  t.src=v;s=b.getElementsByTagName(e)[0];
  s.parentNode.insertBefore(t,s)}(window, document,'script',
  'https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', '684170705756585');
  fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
  src="https://www.facebook.com/tr?id=684170705756585&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->
    </head>
    <body >
      <?php
        $_SESSION['chucvu']='user';
      ?>
      <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KL2J4DJ"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
        @include('header')
        <!-- #header -->
        @yield('content')
        <div id="fb-root"></div>
        <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v6.0&appId=2446208032152325&autoLogAppEvents=1"></script>
        <div id="fb-root"></div>
        <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v6.0&appId=2446208032152325&autoLogAppEvents=1"></script>
        <!-- #footer -->
        <button onclick="topFunction()" id="myBtn" title="Go to top" style="background: white;">
          <img src="../user/image/images/download.png" width="20" height="20">
        </button>
        @include('footer')

        <script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async=""></script>
        <script>
          var OneSignal = window.OneSignal || [];
          OneSignal.push(function() {
            OneSignal.init({
              appId: "01dcff93-323d-4225-b2eb-41ef5a7e419c",
            });
          });
        </script>
        
        <!-- .copyright -->
        @include('copyright')
        <!-- include js files -->
        <!-- Load Facebook SDK for JavaScript -->

      <div id="fb-root"></div>
      <script>
        window.fbAsyncInit = function() {
          FB.init({
            xfbml            : true,
            version          : 'v6.0'
          });
        };

        (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));</script>
      <div id="fb-root"></div>
      <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v6.0&appId=2446208032152325&autoLogAppEvents=1"></script>
      <!-- Your customer chat code -->
      <div class="fb-customerchat"
            attribution=setup_tool
            page_id="103809067815502"
            theme_color="#ffc310">
      </div>
     
        <script src="assets/dest/js/jquery.js"></script>
        <script src="assets/dest/vendors/jqueryui/jquery-ui-1.10.4.custom.min.js"></script>
        <script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
        <script src="assets/dest/vendors/bxslider/jquery.bxslider.min.js"></script>
        <script src="assets/dest/vendors/colorbox/jquery.colorbox-min.js"></script>
        <script src="assets/dest/vendors/animo/Animo.js"></script>
        <script src="assets/dest/vendors/dug/dug.js"></script>
        <script src="assets/dest/js/scripts.min.js"></script>
        <script src="assets/dest/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
        <script src="assets/dest/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
        <script src="assets/dest/js/waypoints.min.js"></script>
        <script src="assets/dest/js/wow.min.js"></script>
        <script type="text/javascript" src="engine1/wowslider.js"></script>
        <script type="text/javascript" src="engine1/script.js"></script>
            <!-- End WOWSlider.com BODY section -->
        <!--customjs-->
        <script src="assets/dest/js/custom2.js"></script>
        <script>
            $(document).ready(function($) {    
              $(window).scroll(function(){
                if($(this).scrollTop()>150){
                $(".header-bottom").addClass('fixNav')
                }else{
                  $(".header-bottom").removeClass('fixNav')
                }}
              )
            })
        </script>
        <!--customjs-->
    <script type="text/javascript">
        $(function() {
            // this will get the full URL at the address bar
            var url = window.location.href;

            // passes on every "a" tag
            $(".main-menu a").each(function() {
                // checks if its the same on the address bar
                if (url == (this.href)) {
                    $(this).closest("li").addClass("active");
                    $(this).parents('li').addClass('parent-active');
                }
            });
        });   


    </script>
    <script>
         jQuery(document).ready(function($) {
                    'use strict';
                    
    // color box

    //color
          jQuery('#style-selector').animate({
          left: '-213px'
        });

        jQuery('#style-selector a.close').click(function(e){
            e.preventDefault();
            var div = jQuery('#style-selector');
            if (div.css('left') === '-213px') {
              jQuery('#style-selector').animate({
                left: '0'
              });
              jQuery(this).removeClass('icon-angle-left');
              jQuery(this).addClass('icon-angle-right');
            } else {
              jQuery('#style-selector').animate({
                left: '-213px'
              });
              jQuery(this).removeClass('icon-angle-right');
              jQuery(this).addClass('icon-angle-left');
            }
          });
        });
        </script>

        <script>
        //Get the button
        var mybutton = document.getElementById("myBtn");

        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function() {scrollFunction()};

        function scrollFunction() {
          if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            mybutton.style.display = "block";
          } else {
            mybutton.style.display = "none";
          }
        }

        // When the user clicks on the button, scroll to the top of the document
        function topFunction() {
          document.body.scrollTop = 2000;
          document.documentElement.scrollTop = 0;
        }
        </script>
        
    </body>
</html>
