<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>

    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/owl.carousel.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/owl.transitions.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/prettyPhoto.css') }}" rel="stylesheet">

    <!-- Fonts -->
    <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="wrapper">
@include('layouts.header')

    @if (Session::has('flash_notification.message'))
        <div class="alert alert-{{ Session::get('flash_notification.level') }}">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

            {{ Session::get('flash_notification.message') }}
        </div>
    @endif

@yield('content')

@include('layouts.footer')
</div>
<!-- Scripts -->
<!-- base scripts -->
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>

<!-- theme scripts -->
<script src="{{ asset('js/jquery-migrate-1.2.1.js') }}"></script>
<script src="{{ asset("http://maps.google.com/maps/api/js?sensor=false&amp;language=en") }}"></script>
<script src="{{ asset("js/gmap3.min.js") }}"></script>
<script src="{{ asset("js/bootstrap-hover-dropdown.min.js") }}"></script>
<script src="{{ asset("js/owl.carousel.min.js") }}"></script>
<script src="{{ asset("js/css_browser_selector.min.js") }}"></script>
<script src="{{ asset("js/echo.min.js") }}"></script>
<script src="{{ asset("js/jquery.easing-1.3.min.js") }}"></script>
<script src="{{ asset("js/bootstrap-slider.min.js") }}"></script>
<script src="{{ asset("js/jquery.raty.min.js") }}"></script>
<script src="{{ asset("js/jquery.prettyPhoto.min.js") }}"></script>
<script src="{{ asset("js/jquery.customSelect.min.js") }}"></script>
<script src="{{ asset("js/wow.min.js") }}"></script>
<script src="{{ asset("js/scripts.js") }}"></script>

{{--<script src="http://w.sharethis.com/button/buttons.js"></script>--}}

</body>
</html>
