<!DOCTYPE html >
<html lang="{{app()->getLocale()}}" id="app">
<head>
    <meta charset="utf-8">
    <!--<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">-->
    <title> {{env("APP_NAME")}} </title>
    <meta name="description" content="">
    <meta name="author" content="">

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <!-- Basic Styles -->
    <link rel="stylesheet" type="text/css" media="screen" href="{{asset("css/bootstrap.min.css")}}">
    <link rel="stylesheet" type="text/css" media="screen" href="{{asset("css/font-awesome.min.css")}}">

    <!-- SmartAdmin Styles : Caution! DO NOT change the order -->
    <link rel="stylesheet" type="text/css" media="screen" href="{{asset("css/smartadmin-production-plugins.min.css")}}">
    <link rel="stylesheet" type="text/css" media="screen" href="{{asset("css/smartadmin-production.min.css")}}">
    <link rel="stylesheet" type="text/css" media="screen" href="{{asset("css/smartadmin-skins.min.css")}}">
    <!-- SmartAdmin RTL Support  -->
    <link rel="stylesheet" type="text/css" media="screen" href="{{asset("css/smartadmin-rtl.min.css")}}">

    <link rel="stylesheet" type="text/css" media="screen" href="{{asset("css/iys.css")}}"> &nbsp;

    <!-- FAVICONS -->
    <link rel="shortcut icon" href="{{asset("img/favicon/favicon.ico")}}" type="image/x-icon">
    <link rel="icon" href="{{asset("img/favicon/favicon.ico")}}" type="image/x-icon">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- GOOGLE FONT -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,300,400,700">

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
    <link rel="stylesheet" type="text/css" media="screen" href="{{asset("js/full-loading/loading.css")}}">


    <!-- VueJs -->
    <script src="{{asset("js/vue/vue.js")}}"></script>
    <script src="{{asset("js/vue/vue-select.js")}}"></script>
    {{--<script src="{{asset("js/vue/date-picker.js")}}"></script>--}}
    <script src="{{asset("js/vue/vue-dialog.js")}}"></script>
    <script src="{{asset("js/vue/loadash.js")}}"></script>
    <script src="{{asset("js/vue/v-money.js")}}"></script>
    <script src="{{asset("js/vue/vue-router.js")}}"></script>
    <script src="{{asset("js/vue/v-validate.js")}}"></script>
    <script src="{{asset("js/vue/vue-tags-input.js")}}"></script>
    <script src="{{asset("js/vue/vue-the-mask.js")}}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="{{asset("js/sweetalert/sweetalert.min.js")}}"></script>

    <script>
        if (!window.jQuery) {
            document.write('<script src="{{asset("js/libs/jquery-2.1.1.min.js")}}"><script>');
        }
    </script>

    <script src="{{asset("https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js")}}"></script>
    <script>
        if (!window.jQuery.ui) {
            document.write('<script src="{{asset("js/libs/jquery-ui-1.10.3.min.js")}}"><script>');
        }
    </script>
    <script src="{{asset("/js/full-loading/loading.js")}}"></script>

    <script>
        function fullLoading(text="Please waiting.") {
            $('body').loadingModal({text: text});
            $('body').loadingModal('animation', 'fadingCircle');
            $('body').loadingModal('color', '#000');
        }

        fullLoading("Loading...");
        $( window ).on( "load", function(){
            $('body').loadingModal('destroy');
        } );

        Vue.use(VeeValidate);
    </script>
    @stack("style")
<body style="color:#7b7b7b" class="fixed-header fuelux">
@include("layouts.header")

@include("layouts.sidebar")

@include("layouts.main")

@include("layouts.footer")
@include("layouts.shourcut")
@include("layouts.scripts")

<script>

</script>
</body>
</html>