<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <meta content="Aran Kieskamp" name="author"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('/css/admin.css') }}" rel="stylesheet">
    <!-- END THEME STYLES -->
</head>
<body class="page-boxed page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid page-sidebar-closed-hide-logo">
    <div class="container">
        <div class="page-container">
            @include('admin.layouts.header')
            @include('admin.layouts.sidebar')
            <div class="page-content-wrapper">
                <div class="page-content">
                    @yield('content')
                </div>
            </div>
        </div>
        @include('admin.layouts.footer')
    </div>


    <!--[if lt IE 9]>
    <script src="{{ asset('/plugins/respond.min.js') }}"></script>
    <script src="{{ asset('/plugins/excanvas.min.js') }}"></script>
    <![endif]-->
    <script src="{{ asset('/plugins/jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/plugins/jquery-migrate.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/plugins/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/plugins//bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/plugins/jquery.blockui.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('/plugins/jquery.cokie.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/plugins/uniform/jquery.uniform.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('/plugins/flot/jquery.flot.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/plugins/flot/jquery.flot.resize.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/plugins/flot/jquery.flot.categories.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/plugins/jquery.pulsate.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('/plugins/bootstrap-daterangepicker/moment.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/plugins/bootstrap-daterangepicker/daterangepicker.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/plugins/fullcalendar/fullcalendar.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/plugins/jquery-easypiechart/jquery.easypiechart.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/plugins/jquery.sparkline.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('plugins/datatables/media/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js') }}"></script>
    <script src="{{ asset('/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('/js/metronic.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/js//layout.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/js/index.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/js/tasks.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/js/datatable.js') }}"></script>
    <script src="{{ asset('/js/ecommerce-products.js') }}"></script>

    <script>
        jQuery(document).ready(function() {
            Metronic.init(); // init metronic core componets
            Layout.init(); // init layout
            Index.init();
            Index.initDashboardDaterange();
            Index.initJQVMAP(); // init index page's custom scripts
            Index.initCalendar(); // init index page's custom scripts
            Index.initCharts(); // init index page's custom scripts
            Index.initChat();
            Index.initMiniCharts();
            Tasks.initDashboardWidget();
            EcommerceProducts.init();
        });
    </script>
</body>