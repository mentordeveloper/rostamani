<!DOCTYPE html>

<html lang="en">

    <head id="Starter-Site">

        <meta charset="UTF-8">

        <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame -->
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

        <title>
            @section('title')
            {{{ $title }}} :: Administration
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
        <meta name="DC.creator" content="@yield('author')">

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
        <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap-theme.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/js/wysihtml5/lib/css/prettify.css')}}">
        <link rel="stylesheet" href="{{asset('assets/js/wysihtml5/src/bootstrap-wysihtml5.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/datatables-bootstrap.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/colorbox.css')}}">
        <link rel="stylesheet" href="{{asset('assets/datepicker/css/datepicker.css')}}">

        <style>
            .tab-pane {
                padding-top: 20px;
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
        <div class="container">

            <!-- Notifications -->
            @include('notifications')
            <!-- ./ notifications -->

            <div class="page-header">
                <h3>
                    {{ $title }}
                    <div class="pull-right">
                        <button class="btn btn-default btn-small btn-inverse file_close_popup"><span class="glyphicon glyphicon-circle-arrow-left"></span> Back</button>
                    </div>
                </h3>
            </div>

            <!-- Content -->
            @yield('content')
            <!-- ./ content -->


        </div>
        <!-- ./ container -->

        <!-- Footer -->
        <footer class="clearfix">
            @yield('footer')
            <div id="footer" style="border-top:1px solid #cf5462;margin-top:50px">
              <div class="container" style="">
                <div class="lg-col-12 row">
                <a class="plogofoot" href="https://www.positivessl.com" style="position: absolute;margin: 0 auto;font-family: arial; font-size: 10px; color: #212121; text-decoration: none;"><img src="https://www.positivessl.com/images-new/PositiveSSL_tl_trans.png" alt="Positive SSL on a transparent background" title="Positive SSL on a transparent background" border="0" /></a>
                        <div style="margin:auto;width:380px;">
                            Copyright &copy; Elearning Education Management system
                        </div>

                </div>
              </div>
            </div>
        </footer>
        <!-- ./ Footer -->
        <!-- Javascripts -->

        <script src="{{asset('assets/js/jquery.min.js')}}"></script>
        <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('assets/js/wysihtml5/lib/js/wysihtml5-0.3.0.js')}}"></script>
        <script src="{{asset('assets/js/wysihtml5/src/bootstrap-wysihtml5.js')}}"></script>
        <script src="{{asset('assets/js/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('assets/js/datatables-bootstrap.js')}}"></script>
        <script src="{{asset('assets/js/datatables.fnReloadAjax.js')}}"></script>
        <script src="{{asset('assets/js/jquery.colorbox.js')}}"></script>
        <script src="{{asset('assets/js/wysihtml5/lib/js/prettify.js')}}"></script>
        <script src="{{asset('assets/datepicker/js/bootstrap-datepicker.js')}}"></script>

        <!-- File Uploading   -->
        <link href="{{asset('fileupload/uploadfile.css')}}" rel="stylesheet">
        <script src="{{asset('fileupload/jquery.uploadfile.js')}}"></script>
        <!-- File Uploading  -->
        <?php include('assets/js/common.php');
        ?>
        <script type="text/javascript">

    jQuery(document).ready(function() {
        jQuery('.file_close_popup').click(function() {
                parent.jQuery.fn.colorbox.close();
                return false;
            
        });
         
    });
        </script>

        @yield('scripts')

    </body>

</html>
