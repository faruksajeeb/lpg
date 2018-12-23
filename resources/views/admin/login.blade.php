<!DOCTYPE html>
<html lang="en-us" id="extr-page">
    <head>
        <meta charset="utf-8">
        <title>  {{ config('app.name', 'Baraka LPG') }}</title>
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

        <!-- #CSS Links -->
        <!-- Basic Styles -->
        <link rel="stylesheet" type="text/css" media="screen" href="{{asset('resources/assets/admin')}}/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" media="screen" href="{{asset('resources/assets/admin')}}/css/font-awesome.min.css">

        <!-- SmartAdmin Styles : Caution! DO NOT change the order -->
        <link rel="stylesheet" type="text/css" media="screen" href="{{asset('resources/assets/admin')}}/css/smartadmin-production-plugins.min.css">
        <link rel="stylesheet" type="text/css" media="screen" href="{{asset('resources/assets/admin')}}/css/smartadmin-production.min.css">
        <link rel="stylesheet" type="text/css" media="screen" href="{{asset('resources/assets/admin')}}/css/smartadmin-skins.min.css">

        <!-- SmartAdmin RTL Support -->
        <link rel="stylesheet" type="text/css" media="screen" href="{{asset('resources/assets/admin')}}/css/smartadmin-rtl.min.css"> 

        <!-- We recommend you use "your_style.css" to override SmartAdmin
             specific styles this will also ensure you retrain your customization with each SmartAdmin update.
        <link rel="stylesheet" type="text/css" media="screen" href="{{asset('resources/assets/admin')}}/css/your_style.css"> -->

        <!-- Demo purpose only: goes with demo.js, you can delete this css when designing your own WebApp -->
        <link rel="stylesheet" type="text/css" media="screen" href="{{asset('resources/assets/admin')}}/css/demo.min.css">

        <!-- #FAVICONS -->
        <link rel="shortcut icon" href="{{asset('resources/assets/admin')}}/img/favicon/favicon.ico" type="image/x-icon">
        <link rel="icon" href="{{asset('resources/assets/admin')}}/img/favicon/favicon.ico" type="image/x-icon">

        <!-- #GOOGLE FONT -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,300,400,700">

        <!-- #APP SCREEN / ICONS -->
        <!-- Specifying a Webpage Icon for Web Clip 
                 Ref: https://developer.apple.com/library/ios/documentation/AppleApplications/Reference/SafariWebContent/ConfiguringWebApplications/ConfiguringWebApplications.html -->
        <link rel="apple-touch-icon" href="{{asset('resources/assets/admin')}}/img/splash/sptouch-icon-iphone.png">
        <link rel="apple-touch-icon" sizes="76x76" href="{{asset('resources/assets/admin')}}/img/splash/touch-icon-ipad.png">
        <link rel="apple-touch-icon" sizes="120x120" href="{{asset('resources/assets/admin')}}/img/splash/touch-icon-iphone-retina.png">
        <link rel="apple-touch-icon" sizes="152x152" href="{{asset('resources/assets/admin')}}/img/splash/touch-icon-ipad-retina.png">

        <!-- iOS web-app metas : hides Safari UI Components and Changes Status Bar Appearance -->
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">

        <!-- Startup image for web apps -->
        <link rel="apple-touch-startup-image" href="{{asset('resources/assets/admin')}}/img/splash/ipad-landscape.png" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:landscape)">
        <link rel="apple-touch-startup-image" href="{{asset('resources/assets/admin')}}/img/splash/ipad-portrait.png" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:portrait)">
        <link rel="apple-touch-startup-image" href="{{asset('resources/assets/admin')}}/img/splash/iphone.png" media="screen and (max-device-width: 320px)">

    </head>

    <body class="animated fadeInDown">

        <header id="header">

            <div id="logo-group">
                <h1 class="txt-color-red login-header-big"> {{ config('app.name', 'Baraka LPG') }}</h1>
            </div>

            <span id="extr-page-header-space"> <span class="hidden-mobile hiddex-xs">Need an account?</span> <a href="{{ route('register') }}" class="btn btn-danger">Create account</a> </span>

        </header>

        <div id="main" role="main">

            <!-- MAIN CONTENT -->
            <div id="content" class="container">

                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 hidden-xs hidden-sm">
                        <div class="hero">



                            <img src="{{asset('resources/assets/admin')}}/img/bl_lpg_division.png" class="pull-right display-image" alt="" style="width:210px">

                        </div>



                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-5 col-lg-4">
                        <div class="well no-padding">
                            {!! Form::open(['url' => '/login','method'=>'POST','class'=>'smart-form client-form']) !!}                            
                            {{ csrf_field() }}
                                <header>
                                    Sign In
                                </header>

                                <fieldset>

                                    <section class="{{ $errors->has('email') ? ' has-error' : '' }}">
                                       
                                        {{Form::label('email', 'E-Mail:', ['class' => 'label'])}}                                        
                                        <label class="input"> <i class="icon-append fa fa-user"></i>
                                          {{ Form::email('email',null,['id'=>'email','name'=>'email','class'=>''])}}
                                            @if ($errors->has('email')) 
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                            @endif
                                            <b class="tooltip tooltip-top-right"><i class="fa fa-user txt-color-teal"></i> Please enter email address/username</b></label>
                                    </section>

                                    <section class="{{ $errors->has('password') ? ' has-error' : '' }}">                                       
                                        {{Form::label('password', 'Password:', ['class' => 'label'])}} 
                                        <label class="input"> <i class="icon-append fa fa-lock"></i>                                            
                                            {{ Form::password('password',null,['id'=>'password','name'=>'password','class'=>''])}}
                                            @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                            @endif
                                            <b class="tooltip tooltip-top-right"><i class="fa fa-lock txt-color-teal"></i> Enter your password</b> </label>
                                        <div class="note">
                                            <a href="{{ route('password.request') }}">Forgot password?</a>
                                        </div>
                                    </section>

                                    <section>
                                        <label class="checkbox">
                                            {{ Form::checkbox('checkbox',null,['id'=>'remember','name'=>'remember','class'=>'',''] ) }}
                                            <!--<input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>-->
                                            <i></i>Stay signed in</label>
                                    </section>
                                </fieldset>
                                <footer>                                   
                                    {{ Form::button('<i class="fa " aria-hidden="true">Sign In</i>', ['class' => 'btn btn-primary', 'type' => 'submit']) }}                                 
                                </footer>
                           {!! Form::close() !!}
                        </div>

                        <h5 class="text-center"> - Or sign in using -</h5>

                        <ul class="list-inline text-center">
                            <li>
                                <a href="javascript:void(0);" class="btn btn-primary btn-circle"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="btn btn-info btn-circle"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="btn btn-warning btn-circle"><i class="fa fa-linkedin"></i></a>
                            </li>
                        </ul>

                    </div>
                </div>
            </div>

        </div>

        <!--================================================== -->	

        <!-- PACE LOADER - turn this on if you want ajax loading to show (caution: uses lots of memory on iDevices)-->
        <script src="{{asset('resources/assets/admin')}}/js/plugin/pace/pace.min.js"></script>

        <!-- Link to Google CDN's jQuery + jQueryUI; fall back to local -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script> if (!window.jQuery) { document.write('<script src="{{asset('resources / assets / admin')}}/js/libs/jquery-2.1.1.min.js"><\/script>'); }</script>

        <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
        <script> if (!window.jQuery.ui) { document.write('<script src="{{asset('resources / assets / admin')}}/js/libs/jquery-ui-1.10.3.min.js"><\/script>'); }</script>

        <!-- IMPORTANT: APP CONFIG -->
        <script src="{{asset('resources/assets/admin')}}/js/app.config.js"></script>

        <!-- JS TOUCH : include this plugin for mobile drag / drop touch events 		
        <script src="{{asset('resources/assets/admin')}}/js/plugin/jquery-touch/jquery.ui.touch-punch.min.js"></script> -->

        <!-- BOOTSTRAP JS -->		
        <script src="{{asset('resources/assets/admin')}}/js/bootstrap/bootstrap.min.js"></script>

        <!-- JQUERY VALIDATE -->
        <script src="{{asset('resources/assets/admin')}}/js/plugin/jquery-validate/jquery.validate.min.js"></script>

        <!-- JQUERY MASKED INPUT -->
        <script src="{{asset('resources/assets/admin')}}/js/plugin/masked-input/jquery.maskedinput.min.js"></script>

        <!--[if IE 8]>
                
                <h1>Your browser is out of date, please update your browser by going to www.microsoft.com/download</h1>
                
        <![endif]-->

        <!-- MAIN APP JS FILE -->
        <script src="{{asset('resources/assets/admin')}}/js/app.min.js"></script>

        <script type="text/javascript">
runAllForms();
$(function() {
// Validation
$("#login-form").validate({
// Rules for form validation
rules : {
email : {
required : true,
        email : true
        },
        password : {
        required : true,
                minlength : 3,
                maxlength : 20
                }
},
// Messages for form validation
        messages : {
        email : {
        required : 'Please enter your email address',
                email : 'Please enter a VALID email address'
                },
                password : {
                required : 'Please enter your password'
                }
        },
// Do not change code below
        errorPlacement : function(error, element) {
        error.insertAfter(element.parent());
        }
});
});
        </script>

    </body>
</html>