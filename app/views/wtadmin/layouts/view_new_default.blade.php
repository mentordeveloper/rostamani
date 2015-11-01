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

        <!-- Speaking of Google, don't forget to set your site up: https://google.com/webmasters -->
        <meta name="google-site-verification" content="">

        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport">
        <!--  Mobile Viewport Fix -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

        <!-- This is the traditional favicon.
         - size: 16x16 or 32x32
         - transparency is OK
         - see wikipedia for info on browser support: https://mky.be/favicon/ -->
        <link rel="shortcut icon" href="{{{ asset('assets/ico/favicon.png') }}}">
   <link rel="stylesheet" href="{{asset('bootstrap/css/custom.css')}}">
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css">
        <link href="{{asset('assets/global/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('assets/global/plugins/simple-line-icons/simple-line-icons.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('assets/global/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('assets/global/plugins/uniform/css/uniform.default.css')}}" rel="stylesheet" type="text/css">
         <link href="{{asset('assets/global/plugins/bootstrap-toastr/toastr.min.css')}}" rel="stylesheet" type="text/css">
        <!-- END GLOBAL MANDATORY STYLES -->

        <!-- BEGIN PAGE LEVEL PLUGIN STYLES -->

        <!--<link rel="stylesheet" type="text/css" href="{{asset('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css')}}"/>-->

        <!-- END PAGE LEVEL PLUGIN STYLES -->

        <!-- BEGIN THEME STYLES -->
        <link href="{{asset('assets/global/css/components.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('assets/global/css/plugins.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('assets/admin/layout3/css/layout.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('assets/admin/layout3/css/themes/default.css')}}" rel="stylesheet" type="text/css" id="style_color">
        <link href="{{asset('assets/admin/layout3/css/custom.css')}}" rel="stylesheet" type="text/css">
        <!-- END THEME STYLES -->



        <!-- iOS favicons. -->
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{{ asset('assets/ico/apple-touch-icon-144-precomposed.png') }}}">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{{ asset('assets/ico/apple-touch-icon-114-precomposed.png') }}}">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{{ asset('assets/ico/apple-touch-icon-72-precomposed.png') }}}">
        <link rel="apple-touch-icon-precomposed" href="{{{ asset('assets/ico/apple-touch-icon-57-precomposed.png') }}}">

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
            body {
                padding: 60px 0;
            }
        </style>

        @yield('styles')

        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
        <script src="https://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

    </head>

    <body>
        <!-- BEGIN HEADER -->
        <div class="page-header">
            <!-- Navbar -->
            @include('wtadmin.layouts.new_menu')
            <!-- ./ navbar -->
        </div>
        <!-- END HEADER -->
        <!-- BEGIN PAGE CONTAINER -->
        <div class="page-container">
            <!-- BEGIN PAGE HEAD -->
            <div class="page-head">
                <div class="container">
                    <!-- BEGIN PAGE TITLE -->
                    <div class="page-title">
                        <h1>{{{@$title}}}</h1>
                    </div>
                    <!-- END PAGE TITLE -->
                    <!-- BEGIN PAGE TOOLBAR -->
                    <div class="page-toolbar">
                        <!-- BEGIN THEME PANEL -->
                        <div class="btn-group btn-theme-panel">
<!--                            <a href="javascript:;" class="btn dropdown-toggle" data-toggle="dropdown">
                                <i class="icon-settings"></i>
                            </a>-->
                            <div class="dropdown-menu theme-panel pull-right dropdown-custom hold-on-click">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <h3>THEME COLORS</h3>
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <ul class="theme-colors">
                                                    <li class="theme-color theme-color-default" data-theme="default">
                                                        <span class="theme-color-view"></span>
                                                        <span class="theme-color-name">Default</span>
                                                    </li>
                                                    <li class="theme-color theme-color-blue-hoki" data-theme="blue-hoki">
                                                        <span class="theme-color-view"></span>
                                                        <span class="theme-color-name">Blue Hoki</span>
                                                    </li>
                                                    <li class="theme-color theme-color-blue-steel" data-theme="blue-steel">
                                                        <span class="theme-color-view"></span>
                                                        <span class="theme-color-name">Blue Steel</span>
                                                    </li>
                                                    <li class="theme-color theme-color-yellow-orange" data-theme="yellow-orange">
                                                        <span class="theme-color-view"></span>
                                                        <span class="theme-color-name">Orange</span>
                                                    </li>
                                                    <li class="theme-color theme-color-yellow-crusta" data-theme="yellow-crusta">
                                                        <span class="theme-color-view"></span>
                                                        <span class="theme-color-name">Yellow Crusta</span>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <ul class="theme-colors">
                                                    <li class="theme-color theme-color-green-haze" data-theme="green-haze">
                                                        <span class="theme-color-view"></span>
                                                        <span class="theme-color-name">Green Haze</span>
                                                    </li>
                                                    <li class="theme-color theme-color-red-sunglo" data-theme="red-sunglo">
                                                        <span class="theme-color-view"></span>
                                                        <span class="theme-color-name">Red Sunglo</span>
                                                    </li>
                                                    <li class="theme-color theme-color-red-intense" data-theme="red-intense">
                                                        <span class="theme-color-view"></span>
                                                        <span class="theme-color-name">Red Intense</span>
                                                    </li>
                                                    <li class="theme-color theme-color-purple-plum" data-theme="purple-plum">
                                                        <span class="theme-color-view"></span>
                                                        <span class="theme-color-name">Purple Plum</span>
                                                    </li>
                                                    <li class="theme-color theme-color-purple-studio" data-theme="purple-studio">
                                                        <span class="theme-color-view"></span>
                                                        <span class="theme-color-name">Purple Studio</span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12 seperator">
                                        <h3>LAYOUT</h3>
                                        <ul class="theme-settings">
                                            <li>
                                                Layout
                                                <select class="theme-setting theme-setting-layout form-control input-sm input-small input-inline tooltips" data-original-title="Change layout type" data-container="body" data-placement="left">
                                                    <option value="boxed" selected="selected">Boxed</option>
                                                    <option value="fluid">Fluid</option>
                                                </select>
                                            </li>
                                            <li>
                                                Top Menu Style
                                                <select class="theme-setting theme-setting-top-menu-style form-control input-sm input-small input-inline tooltips" data-original-title="Change top menu dropdowns style" data-container="body" data-placement="left">
                                                    <option value="dark" selected="selected">Dark</option>
                                                    <option value="light">Light</option>
                                                </select>
                                            </li>
                                            <li>
                                                Top Menu Mode
                                                <select class="theme-setting theme-setting-top-menu-mode form-control input-sm input-small input-inline tooltips" data-original-title="Enable fixed(sticky) top menu" data-container="body" data-placement="left">
                                                    <option value="fixed">Fixed</option>
                                                    <option value="not-fixed" selected="selected">Not Fixed</option>
                                                </select>
                                            </li>
                                            <li>
                                                Mega Menu Style
                                                <select class="theme-setting theme-setting-mega-menu-style form-control input-sm input-small input-inline tooltips" data-original-title="Change mega menu dropdowns style" data-container="body" data-placement="left">
                                                    <option value="dark" selected="selected">Dark</option>
                                                    <option value="light">Light</option>
                                                </select>
                                            </li>
                                            <li>
                                                Mega Menu Mode
                                                <select class="theme-setting theme-setting-mega-menu-mode form-control input-sm input-small input-inline tooltips" data-original-title="Enable fixed(sticky) mega menu" data-container="body" data-placement="left">
                                                    <option value="fixed" selected="selected">Fixed</option>
                                                    <option value="not-fixed">Not Fixed</option>
                                                </select>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END THEME PANEL -->
                    </div>
                    <!-- END PAGE TOOLBAR -->
                </div>
            </div>
            <!-- END PAGE HEAD -->
            <!-- BEGIN PAGE CONTENT -->
            <div class="page-content">
                <div class="container-fluid">

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
        <!-- BEGIN PRE-FOOTER -->
        <div class="page-prefooter">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-6 col-xs-12 footer-block">
                        <h2>About</h2>
                        <p>
                            Elearning management system for data capturing and listing
                        </p>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs12 footer-block">
                        <div class="subscribe-form">
                            <div class="col-md-1 col-sm-6 col-xs-12 footer-block">
                                <img src="{{asset('assets/img/centrosoft_logo_normal.jpg')}}" alt="Centro Soft" title="Centro Soft" border="0" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12 footer-block">
                        <h2>Follow Us On</h2>
                        <ul class="social-icons">
<!--                            <li>
                                <a href="#" data-original-title="rss" class="rss"></a>
                            </li>
                            <li>
                                <a href="#" data-original-title="facebook" class="facebook"></a>
                            </li>-->
                            <li>
                                <a href="https://twitter.com/centrosoft_uk" data-original-title="twitter" class="twitter"></a>
                            </li>
<!--                            <li>
                                <a href="#" data-original-title="googleplus" class="googleplus"></a>
                            </li>-->
                            <li>
                                <a href="#" data-original-title="linkedin" class="linkedin"></a>
                            </li>
<!--                            <li>
                                <a href="#" data-original-title="youtube" class="youtube"></a>
                            </li>
                            <li>
                                <a href="#" data-original-title="vimeo" class="vimeo"></a>
                            </li>-->
                        </ul>
                    </div>
                    <div class="col-md-2 col-sm-6 col-xs-12 footer-block">
                        <h2>Contacts</h2>
                        <address class="margin-bottom-40">
                            Phone: 01709 916162<br>
                            Email: <a href="mailto:d.trout@centrosoft.co.uk">d.trout@centrosoft.co.uk</a>
                        </address>
                    </div>
                    <div class="col-md-1 col-sm-6 col-xs-12 footer-block">
                        <a class="plogofoot ssl_logo" href="https://www.positivessl.com"><img class="ssl_image_styler" src="https://www.positivessl.com/images-new/PositiveSSL_tl_trans.png" alt="Positive SSL on a transparent background" title="Positive SSL on a transparent background" border="0" /></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- END PRE-FOOTER -->
        <!-- BEGIN FOOTER -->
        <div class="page-footer">
            <div class="container">
               {{{date('Y')}}} Copyright &copy; Centrosoft Ltd. All Rights Reserved
            </div>
        </div>
        <div class="scroll-to-top">
            <i class="icon-arrow-up"></i>
        </div>
        <!-- END FOOTER -->



        <!-- Javascripts -->
        <!--<script src="{{asset('assets/js/jquery.min.js')}}"></script>-->
        <!--<script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>-->





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
        <script src="{{asset('assets/global/plugins/bootstrap-toastr/toastr.min.js')}}"></script>
        <script src="{{asset('assets/admin/pages/scripts/ui-toastr.js')}}"></script>
         
        <!-- END CORE PLUGINS -->

        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="{{asset('assets/global/scripts/metronic.js')}}" type="text/javascript"></script>
        <script src="{{asset('assets/admin/layout3/scripts/layout.js')}}" type="text/javascript"></script>
        <script src="{{asset('assets/admin/layout3/scripts/demo.js')}}" type="text/javascript"></script>

<!--        <script type="text/javascript" src="{{asset('assets/global/plugins/select2/select2.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('assets/global/plugins/datatables/media/js/jquery.dataTables.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js')}}"></script>-->

        <!-- END PAGE LEVEL SCRIPTS -->

        
        <script src="{{asset('assets/js/wysihtml5/wysihtml5-0.3.0.js')}}"></script>
        <script src="{{asset('assets/js/wysihtml5/bootstrap-wysihtml5.js')}}"></script>
        <script src="{{asset('assets/js/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('assets/js/datatables-bootstrap.js')}}"></script>
        <script src="{{asset('assets/js/datatables.fnReloadAjax.js')}}"></script>
        <script src="{{asset('assets/js/jquery.colorbox.js')}}"></script>
        <script src="{{asset('assets/js/prettify.js')}}"></script>
        <script src="{{asset('assets/datepicker/js/bootstrap-datepicker.js')}}"></script>
<!-- File Uploading   -->
        <link href="{{asset('fileupload/uploadfile.css')}}" rel="stylesheet">
        <script src="{{asset('fileupload/jquery.uploadfile.js')}}"></script>
        <!-- File Uploading  -->
        <?php include('assets/js/common.php');
        ?>

        <script>
            jQuery(document).ready(function() {
                Metronic.init(); // init metronic core componets
                Layout.init(); // init layout
                Demo.init(); // init demo(theme settings page)
            });
        </script>

        <script type="text/javascript">
                
            jQuery('.advance_options').click(function() {
                   var value = $(this).attr('alt');   
                   $('#'+value).toggle()
                });
            
            jQuery(document).on("click",'.close_popup_view', function() {
                parent.window.location = '/wtadmin';
            });
            jQuery(document).ready(function() {
                jQuery('.close_popup').click(function() {
                    history.back(-1);
                    return ;
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
            $('.wysihtml5').wysihtml5();
            $(prettyPrint);
            jQuery('.datepicker').datepicker({
                format: 'yyyy-mm-dd',
            });

            var nowTemp = new Date();
            var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);

            var checkin = $('#from_date').datepicker({
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
                $('#to_date')[0].focus();
            }).data('datepicker');
            var checkout = $('#to_date').datepicker({
                onRender: function(date) {
                    return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
                }
            }).on('changeDate', function(ev) {
                checkout.hide();
            }).data('datepicker');

            $(document).on('click', '.paction', function() {
                $('.paction').removeAttr('disabled');
                var dval = $(this).attr('data');
                $("#page_status").val(dval);
                $(this).attr("disabled", 'true');


            });
            $(".iframe_file").colorbox({iframe: true, width: "90%", height: "100%"});
            $(".iframe").colorbox({iframe: true, width: "90%", height: "100%"});
            $(".iframe_list").colorbox({iframe: true, width: "90%", height: "90%"});
            //$(".alert").slideUp(8000);
            
            var checkin_new = $('#start_date').datepicker({
                onRender: function(date) {
                    return date.valueOf() < now.valueOf() ? 'disabled' : '';
                }
            }).on('changeDate', function(ev) {
                if (ev.date.valueOf() > checkout_new.date.valueOf()) {
                    var newDate = new Date(ev.date)
                    newDate.setDate(newDate.getDate() + 1);
                    checkout_new.setValue(newDate);
                }
                checkin_new.hide();
                $('#end_date')[0].focus();
            }).data('datepicker');
            var checkout_new = $('#end_date').datepicker({
                onRender: function(date) {
                    return date.valueOf() <= checkin_new.date.valueOf() ? 'disabled' : '';
                }
            }).on('changeDate', function(ev) {
                checkout_new.hide();
            }).data('datepicker');

        </script>

        @yield('scripts')
        <!-- END JAVASCRIPTS -->
        <div class="overlay"></div>
    </body>

</html>
