<!DOCTYPE html>
<html lang="en">
     <head>
     <title>{{ $title }}</title>
     <meta charset="utf-8">
     <meta name = "format-detection" content = "telephone=no" />
     <link rel="icon" href="{{asset('resources/assets')}}/images/favicon.ico">
     <link rel="shortcut icon" href="{{asset('resources/assets')}}/images/favicon.ico" />
     <link href="https://fonts.googleapis.com/css?family=Prosto+One" rel="stylesheet"> 
     <link rel="stylesheet" href="{{asset('resources/assets')}}/css/style.css">
     <link rel="stylesheet" href="{{asset('resources/assets')}}/css/camera.css">
     
     <script src="{{asset('resources/assets')}}/js/jquery.js"></script>
     <script src="{{asset('resources/assets')}}/js/jquery-migrate-1.1.1.js"></script>
     <script src="{{asset('resources/assets')}}/js/script.js"></script> 
     <script src="{{asset('resources/assets')}}/js/superfish.js"></script>
     <script src="{{asset('resources/assets')}}/js/jquery.ui.totop.js"></script>
     <script src="{{asset('resources/assets')}}/js/jquery.equalheights.js"></script>
     <script src="{{asset('resources/assets')}}/js/jquery.mobilemenu.js"></script>
     <script src="{{asset('resources/assets')}}/js/jquery.easing.1.3.js"></script>
     <script src="{{asset('resources/assets')}}/js/camera.js"></script>
     <!--[if (gt IE 9)|!(IE)]><!-->
     <script src="{{asset('resources/assets')}}/js/jquery.mobile.customized.min.js"></script>
     <!--<![endif]-->
     <script>
     
     
  $(document).ready(function(){
      
      
      jQuery('#camera_wrap').camera({
        loader: false,
        pagination: true ,
        thumbnails: false,
        height: '36.5%',
        caption: false,
        navigation: true,
        fx: 'mosaic'
      });   
    });
    
     $(document).ready(function(){
      $().UItoTop({ easingType: 'easeOutQuart' });
    });

     </script>

     </head>
     <body class="page1">
<!--==============================header=================================-->
<header> 
 @include('inc.header')
 @include('inc.top_menu')

</header>
<div class="content c1">
@yield('mainContent')
</div>
<!--==============================footer=================================-->

<footer  style="background:#00562a">    
  @include('inc.footer')
</footer>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-7078796-5']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</body><!-- Google Tag Manager --><noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-P9FT69"height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript><script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start': new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer','GTM-P9FT69');</script><!-- End Google Tag Manager -->
</html>