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

        <!-- Speaking of Google, don't forget to set your site up: https://google.com/webmasters -->
        <meta name="google-site-verification" content="">

        <!-- Dublin Core Metadata : https://dublincore.org/ -->
        <meta name="DC.title" content="Project Name">
        <meta name="DC.subject" content="@yield('description')">
        <meta name="DC.creator" content="@yield('author')">

        <!--  Mobile Viewport Fix -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

        <!-- This is the traditional favicon.
         - size: 16x16 or 32x32
         - transparency is OK
         - see wikipedia for info on browser support: https://mky.be/favicon/ -->
        <link rel="shortcut icon" href="{{{ asset('assets/ico/favicon.png') }}}">

        <!-- iOS favicons. -->
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{{ asset('assets/ico/apple-touch-icon-144-precomposed.png') }}}">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{{ asset('assets/ico/apple-touch-icon-114-precomposed.png') }}}">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{{ asset('assets/ico/apple-touch-icon-72-precomposed.png') }}}">
        <link rel="apple-touch-icon-precomposed" href="{{{ asset('assets/ico/apple-touch-icon-57-precomposed.png') }}}">

         <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css">
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
        <link rel="stylesheet" href="{{asset('assets/js/wysihtml5/lib/css/bootstrap.min.css')}}">
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
                    <div class="portlet box green">
                        <div class="portlet-title">
                            <div class="caption">
                                {{{@$title}}}
                            </div>
                        </div>
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
        <!--[if lt IE 9]>
        <script src="{{asset('assets/global/plugins/respond.min.js')}}"></script>
        <script src="{{asset('assets/global/plugins/excanvas.min.js')}}"></script> 
        <![endif]-->
        <script src="{{asset('assets/global/plugins/jquery-1.11.0.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('assets/global/plugins/jquery-migrate-1.2.1.min.js')}}" type="text/javascript"></script>
        <!-- IMPORTANT! Load jquery-ui-1.10.3.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
        <script src="{{asset('assets/global/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('assets/global/plugins/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('assets/global/plugins/jquery.blockui.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('assets/global/plugins/jquery.cokie.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('assets/global/plugins/uniform/jquery.uniform.min.js')}}" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->

        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="{{asset('assets/global/scripts/metronic.js')}}" type="text/javascript"></script>
        <script src="{{asset('assets/admin/layout3/scripts/layout.js')}}" type="text/javascript"></script>
        <script src="{{asset('assets/admin/layout3/scripts/demo.js')}}" type="text/javascript"></script>
<!--        <script src="{{asset('assets/admin/pages/scripts/form-samples.js')}}"></script>
        <script type="text/javascript" src="{{asset('assets/global/plugins/select2/select2.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('assets/global/plugins/datatables/media/js/jquery.dataTables.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js')}}"></script>
        -->
        <!-- END PAGE LEVEL SCRIPTS -->
        <script src="{{asset('assets/js/wysihtml5/wysihtml5-0.3.0.js')}}"></script>
        <script src="{{asset('assets/js/wysihtml5/bootstrap-wysihtml5.js')}}"></script>
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
        jQuery('.close_popup').click(function() {
                parent.jQuery.fn.colorbox.close();
                return false;
//            parent.window.location = parent.window.location.href;
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
    jQuery('.wysihtml5').wysihtml5({
    });
    jQuery(prettyPrint)

    jQuery('.datepicker').datepicker({
        format: 'yyyy-mm-dd',
    });

    var nowTemp = new Date();
    var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);

    var checkin = $('#start_date').datepicker({
        onRender: function(date) {
            return date.valueOf() < now.valueOf() ? 'disabled' : '';
        }
    }).on('changeDate', function(ev) {
        if (ev.date.valueOf() > checkout.date.valueOf()) {
            var newDate = new Date(ev.date)
            newDate.setDate(newDate.getDate() + 1);
            checkout.setValue(newDate);
        }
        checkin.hide();
        $('#end_date')[0].focus();
    }).data('datepicker');
    var checkout = $('#end_date').datepicker({
        onRender: function(date) {
            return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
        }
    }).on('changeDate', function(ev) {
        checkout.hide();
    }).data('datepicker');
    
    $(document).on('click','.paction',function(){
        $('.paction').removeAttr('disabled');
        var dval = $(this).attr('data');
        $("#page_status").val(dval);
        $(this).attr( "disabled",'true' );
        

    });
    
    $(".iframe_list").colorbox({iframe: true, width: "80%", height: "80%"});
        </script>

        @yield('scripts')
<div class="overlay"></div>
    </body>

</html>
