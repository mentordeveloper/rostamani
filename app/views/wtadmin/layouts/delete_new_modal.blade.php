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

        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="{{asset('assets/global/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('assets/global/plugins/simple-line-icons/simple-line-icons.min.css')}}" rel="stylesheet" type="text/css">
        <!--<link href="{{asset('assets/global/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">-->
        <link href="{{asset('assets/global/plugins/uniform/css/uniform.default.css')}}" rel="stylesheet" type="text/css">
        <!-- END GLOBAL MANDATORY STYLES -->

        <!-- BEGIN THEME STYLES -->
        <link href="{{asset('assets/global/css/components.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('assets/global/css/plugins.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('assets/admin/layout3/css/layout.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('assets/admin/layout3/css/themes/default.css')}}" rel="stylesheet" type="text/css" id="style_color">
        <link href="{{asset('assets/admin/layout3/css/custom.css')}}" rel="stylesheet" type="text/css">
        <!-- END THEME STYLES -->
        <!-- CSS -->
        <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap-theme.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/js/wysihtml5/lib/css/prettify.css')}}">
        <link rel="stylesheet" href="{{asset('assets/js/wysihtml5/src/bootstrap-wysihtml5.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/datatables-bootstrap.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/colorbox.css')}}">
        <link rel="stylesheet" href="{{asset('assets/datepicker/css/datepicker.css')}}">
        <link rel="stylesheet" href="{{asset('bootstrap/css/custom.css')}}">

        <style>
            .tab-pane {
                padding-top: 20px;
            }
        </style>

        @yield('styles')

        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
        <script src="https://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->


    </head>

    <body>
                    <!-- BEGIN PAGE CONTAINER -->
                    <div class="light bordered form-fit">
<!--                        <div class="portlet-title">
                            <div class="caption">
                                {{{@$title}}}
                            </div>
                        </div>-->
                        <!-- BEGIN PAGE CONTENT -->
                        <div class=" portlet-body form">
                            <div class="container">
                                <!-- BEGIN PAGE CONTENT INNER -->
                                <div class="row">
                                    <div class="col-lg-12">
                                        <!-- Notifications -->
                                        @include('notifications')
                                        <!-- ./ notifications -->

                                    </div>

                                </div>

                                <!-- Content -->
                                @yield('content')
                                <!-- ./ content -->

                                <!-- END PAGE CONTENT INNER -->
                            </div>
                        </div>
                        <!-- END PAGE CONTENT -->

                    </div>
                    <!-- END PAGE CONTAINER -->

 
        <!-- Javascripts -->

        <!-- BEGIN JAVASCRIPTS (Load javascripts at bottom, this will reduce page load time) -->
        <!-- BEGIN CORE PLUGINS -->
        <script src="{{asset('assets/global/plugins/jquery-1.11.0.min.js')}}" type="text/javascript"></script>
        <!-- IMPORTANT! Load jquery-ui-1.10.3.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
        <script src="{{asset('assets/global/plugins/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->

        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <!-- END PAGE LEVEL SCRIPTS -->

        <script type="text/javascript">

jQuery(document).ready(function() {
    jQuery('.close_popup').click(function() {
        var option_id = $('#option_id').val();

        if (option_id == 1) {
            parent.jQuery.fn.colorbox.close();
//                return false;
            parent.window.location = '/wtadmin';
        } else {
            parent.jQuery.fn.colorbox.close();
            parent.oTable.fnReloadAjax();
            return false;
        }
    });
    jQuery('.popup_close').click(function() {
        parent.jQuery.fn.colorbox.close();
        return false;
    });
    jQuery('#deleteForm').submit(function(event) {
        var form = jQuery(this);
        jQuery.ajax({
            type: form.attr('method'),
            url: form.attr('action'),
            data: form.serialize()
        }).done(function() {
            parent.jQuery.colorbox.close();
            parent.oTable.fnReloadAjax();
        }).fail(function() {
        });
        event.preventDefault();
    });
});
        </script>

        @yield('scripts')

    </body>

</html>
