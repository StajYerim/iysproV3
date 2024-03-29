<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" style="background:#eff0f0">
<head>
    <meta charset="utf-8">
    <title> {{ env("APP_NAME")}}</title>
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <!-- #CSS Links -->
    <!-- Basic Styles -->
    <link rel="stylesheet" type="text/css" media="screen" href="{{asset("css/bootstrap.min.css")}}">
    <link rel="stylesheet" type="text/css" media="screen" href="{{asset("css/font-awesome.min.css")}}">

    <!-- SmartAdmin Styles : Caution! DO NOT change the order -->
    <link rel="stylesheet" type="text/css" media="screen" href="{{asset("css/smartadmin-production-plugins.min.css")}}">
    <link rel="stylesheet" type="text/css" media="screen" href="{{asset("css/smartadmin-production.min.css")}}">
    <link rel="stylesheet" type="text/css" media="screen" href="{{asset("css/smartadmin-skins.min.css")}}">

    <!-- SmartAdmin RTL Support -->
    <link rel="stylesheet" type="text/css" media="screen" href="{{asset("css/smartadmin-rtl.min.css")}}">

    <link rel="stylesheet" type="text/css" media="screen" href="{{asset("css/login.css")}}">

    <!-- Demo purpose only: goes with demo.js, you can delete this css when designing your own WebApp -->
    <link rel="stylesheet" type="text/css" media="screen" href="{{asset("css/demo.min.css")}}">

    <!-- #FAVICONS -->
    <link rel="shortcut icon" href="{{asset("img/favicon/favicon.ico")}}" type="image/x-icon">
    <link rel="icon" href="{{asset("img/favicon/favicon.ico")}}" type="image/x-icon">

    <!-- #GOOGLE FONT -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,300,400,700">

    <!-- #APP SCREEN / ICONS -->
    <!-- Specifying a Webpage Icon for Web Clip
         Ref: https://developer.apple.com/library/ios/documentation/AppleApplications/Reference/SafariWebContent/ConfiguringWebApplications/ConfiguringWebApplications.html -->
    <link rel="apple-touch-icon" href="{{asset("img/splash/sptouch-icon-iphone.png")}}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset("img/splash/touch-icon-ipad.png")}}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{asset("img/splash/touch-icon-iphone-retina.png")}}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{asset("img/splash/touch-icon-ipad-retina.png")}}">

    <!-- iOS web-app metas : hides Safari UI Components and Changes Status Bar Appearance -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">

    <!-- Startup image for web apps -->
    <link rel="apple-touch-startup-image" href="{{asset("img/splash/ipad-landscape.png")}}" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:landscape)">
    <link rel="apple-touch-startup-image" href="{{asset("img/splash/ipad-portrait.png")}}" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:portrait)">
    <link rel="apple-touch-startup-image" href="{{asset("img/splash/iphone.png")}}" media="screen and (max-device-width: 320px)">

</head>

<body>
<div role="main"  @php use Jenssegers\Agent\Agent;$agent = new Agent();

                if($agent->isPhone()){
               echo "class='login-phone'";
                }else{
               echo "class='login-desktop'";
                } @endphp>

@yield('guest')

</div>
<!-- PACE LOADER - turn this on if you want ajax loading to show (caution: uses lots of memory on iDevices)-->
<script src="{{asset("js/plugin/pace/pace.min.js")}}"></script>

<!-- Link to Google CDN's jQuery + jQueryUI; fall back to local -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script> if (!window.jQuery) { document.write('<script src="{{asset("js/libs/jquery-2.1.1.min.js")}}"><script>');} </script>

<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<script> if (!window.jQuery.ui) { document.write('<script src="{{asset("js/libs/jquery-ui-1.10.3.min.js")}}"><script>');} </script>

<!-- IMPORTANT: APP CONFIG -->
<script src="{{asset("js/app.config.js")}}"></script>

<!-- JS TOUCH : include this plugin for mobile drag / drop touch events
<script src="js/plugin/jquery-touch/jquery.ui.touch-punch.min.js"></script> -->

<!-- BOOTSTRAP JS -->
<script src="{{asset("js/bootstrap/bootstrap.min.js")}}"></script>

<!-- JQUERY VALIDATE -->
<script src="{{asset("js/plugin/jquery-validate/jquery.validate.min.js")}}"></script>

<!-- JQUERY MASKED INPUT -->
<script src="{{asset("js/plugin/masked-input/jquery.maskedinput.min.js")}}"></script>

<!--[if IE 8]>

<h1>Your browser is out of date, please update your browser by going to www.microsoft.com/download</h1>

<![endif]-->

<!-- MAIN APP JS FILE -->
<script src="{{asset("js/app.min.js")}}"></script>
@stack("guest_script")

</body>
</html>