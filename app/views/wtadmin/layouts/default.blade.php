<!DOCTYPE html>

<html lang="en">

    <head id="Starter-Site">

        <meta charset="UTF-8">

        <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame -->
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

        <title>
            @section('title')
            Administration
            @show
        </title>

        <meta name="keywords" content="@yield('keywords')" />
        <meta name="author" content="@yield('author')" />
        <!-- Google will often use this as its description of your page/site. Make it good. -->
        <meta name="description" content="@yield('description')" />

        <!-- Speaking of Google, don't forget to set your site up: http://google.com/webmasters -->
        <meta name="google-site-verification" content="">

        <!-- Dublin Core Metadata : http://dublincore.org/ -->
        <meta name="DC.title" content="Project Name">
        <meta name="DC.subject" content="@yield('description')">
        <meta name="DC.creator" content="Umair Majeed">

        <!--  Mobile Viewport Fix -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

        <!-- This is the traditional favicon.
         - size: 16x16 or 32x32
         - transparency is OK
         - see wikipedia for info on browser support: http://mky.be/favicon/ -->
        <link rel="shortcut icon" href="{{{ asset('assets/ico/favicon.png') }}}">

        <!-- iOS favicons. -->
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{{ asset('assets/ico/apple-touch-icon-144-precomposed.png') }}}">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{{ asset('assets/ico/apple-touch-icon-114-precomposed.png') }}}">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{{ asset('assets/ico/apple-touch-icon-72-precomposed.png') }}}">
        <link rel="apple-touch-icon-precomposed" href="{{{ asset('assets/ico/apple-touch-icon-57-precomposed.png') }}}">

        <!-- CSS -->

        <link rel="stylesheet" href="{{ asset('packages/mrjuliuss/syntara/assets/layout/bootstrap.min.css') }}" />

        <link rel="stylesheet" href="{{ asset('packages/mrjuliuss/syntara/assets/css/toggle-switch.css') }}" />

        <link rel="stylesheet" href="{{ asset('packages/mrjuliuss/syntara/assets/css/base.css') }}" media="all">

        @if (!empty($favicon))
        <link rel="icon" {{ !empty($faviconType) ? 'type="' . $faviconType . '"' : '' }} href="{{ $favicon }}" />
        @endif


        <!--<link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">-->
        <!--<link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap-theme.min.css')}}">-->
        <link rel="stylesheet" href="{{asset('assets/css/wysihtml5/prettify.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/wysihtml5/bootstrap-wysihtml5.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/datatables-bootstrap.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/colorbox.css')}}">
        <link rel="stylesheet" href="{{asset('assets/datepicker/css/datepicker.css')}}">
        <link rel="stylesheet" href="{{asset('bootstrap/css/custom.css')}}">




        <style>
            body {
                padding: 60px 0;
            }
        </style>

        @yield('styles')

        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

    </head>

    <body>
        <!-- Container -->
        <div class="container-fluid content">
            <div id="main-container" class="container">
                <!-- Navbar -->
                @include('wtadmin.layouts.menu')
                <!-- ./ navbar -->
                <!-- Notifications -->
                @include('notifications')
                <!-- ./ notifications -->

                <!-- Content -->
                @yield('content')
                <!-- ./ content -->


            </div>
        </div>
        <!-- ./ container -->
        <!-- Footer -->
        <footer class="clearfix">
            @yield('footer')
            <div id="footer" style="border-top:1px solid #cf5462;margin-top:50px">
                <div class="container" style="">
                    <div class="lg-col-12 row">

                        <div style="margin:auto;width:380px;">
                            Copyright &copy; Brretail Management system
                        </div>

                    </div>
                </div>
            </div>
        </footer>
        <!-- ./ Footer -->

        <!-- Javascripts -->
        <script src="{{asset('assets/js/jquery.min.js')}}"></script>
        <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('assets/js/wysihtml5/wysihtml5-0.3.0.js')}}"></script>
        <script src="{{asset('assets/js/wysihtml5/bootstrap-wysihtml5.js')}}"></script>
        <script src="{{asset('assets/js/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('assets/js/datatables-bootstrap.js')}}"></script>
        <script src="{{asset('assets/js/datatables.fnReloadAjax.js')}}"></script>
        <script src="{{asset('assets/js/jquery.colorbox.js')}}"></script>
        <script src="{{asset('assets/js/prettify.js')}}"></script>
        <script src="{{asset('assets/datepicker/js/bootstrap-datepicker.js')}}"></script>



        <script type="text/javascript">
$('.wysihtml5').wysihtml5();
$(prettyPrint);
jQuery('.datepicker').datepicker({
    format: 'yyyy-mm-dd',
});

var nowTemp = new Date();
var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);

var checkin = $('#from_date').datepicker({
    onRender: function (date) {
        return date.valueOf() < now.valueOf() ? 'disabled' : '';
    }
}).on('changeDate', function (ev) {
    if (ev.date.valueOf() > checkout.date.valueOf()) {
        var newDate = new Date(ev.date)
        newDate.setDate(newDate.getDate() + 1);
        checkout.setValue(newDate);
    }
    checkin.hide();
    $('#to_date')[0].focus();
}).data('datepicker');
var checkout = $('#to_date').datepicker({
    onRender: function (date) {
        return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
    }
}).on('changeDate', function (ev) {
    checkout.hide();
}).data('datepicker');

$(".iframe_file").colorbox({iframe: true, width: "90%", height: "100%"});
        </script>

        @yield('scripts')

    </body>

</html>
