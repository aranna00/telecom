<head>
    <meta charset="utf-8"/>
    <title>404 Page Not Found</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <meta content="Aran Kieskamp" name="author"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('/css/admin.css') }}" rel="stylesheet">
    <!-- END THEME STYLES -->
</head>
<body class="page-404-3">
<div class="page-inner">
    <img src="{{ asset('/imgs/earth.jpg') }}" class="img-responsive" alt="">
</div>
<div class="container error-404">
    <h1>404</h1>
    <h2>Houston, we have a problem.</h2>
    <p>
        Actually, the page you are looking for does not exist.
    </p>
    <p>
        <a href="{{ action('HomeController@index') }}">
            Return home </a>
        <br>
    </p>
</div>