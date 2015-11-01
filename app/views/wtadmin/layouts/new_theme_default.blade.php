<!DOCTYPE html>

<html lang="en">

    <head >

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

        <meta name="google-site-verification" content="">

        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport">
        <!--  Mobile Viewport Fix -->
        <meta http-equiv="Content-type" content="text/html; charset=utf-8">

    
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="{{asset('assets/new_theme/js/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{asset('assets/new_theme/js/simple-line-icons/simple-line-icons.min.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{asset('assets/new_theme/js/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{asset('assets/new_theme/js/uniform/css/uniform.default.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{asset('assets/new_theme/js/bootstrap-switch/css/bootstrap-switch.min.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{asset('assets/global/plugins/bootstrap-toastr/toastr.min.css')}}" rel="stylesheet" type="text/css">
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PAGE LEVEL PLUGIN STYLES -->
        <link rel="stylesheet" type="text/css" href="{{asset('assets/new_theme/js/bootstrap-wysihtml5/bootstrap-wysihtml5.css')}}"/>
        <link rel="stylesheet" type="text/css" href="{{asset('assets/new_theme/js/bootstrap-markdown/css/bootstrap-markdown.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('assets/new_theme/js/bootstrap-summernote/summernote.css')}}">
        <link href="{{asset('assets/new_theme/js/dropzone/css/dropzone.css')}}" rel="stylesheet"/>
        <link href="{{asset('assets/new_theme/js/dropzone/css/dropzone.min.css')}}" rel="stylesheet"/>
    <!-- END PAGE LEVEL PLUGIN STYLES -->

    <!-- BEGIN PAGE STYLES -->
        <link href="{{asset('assets/new_theme/css/tasks.css')}}" rel="stylesheet" type="text/css"/>
    <!-- END PAGE STYLES -->
    <!-- BEGIN THEME STYLES -->
        <link href="{{asset('assets/new_theme/css/components-rounded.css')}}" id="style_components" rel="stylesheet" type="text/css"/>
        <link href="{{asset('assets/new_theme/css/plugins.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{asset('assets/new_theme/css/layout.css')}}" rel="stylesheet" type="text/css"/>
        <link id="style_color" href="{{asset('assets/new_theme/css/themes/darkblue.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{asset('assets/new_theme/css/custom.css')}}" rel="stylesheet" type="text/css"/>
        
        <link rel="stylesheet" href="{{asset('assets/js/wysihtml5/lib/css/prettify.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/datatables-bootstrap.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/colorbox.css')}}">
        <link rel="stylesheet" href="{{asset('assets/datepicker/css/datepicker.css')}}">
        

        @yield('styles')

        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
        <script src="https://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

    </head>

    <body class="page-full-width">
        <!-- BEGIN PAGE CONTAINER -->
        <div class="page-container">
            <!-- BEGIN PAGE HEAD -->
            
            <!-- END PAGE HEAD -->
            <!-- BEGIN PAGE CONTENT -->
            <div class="page-content-wrapper">
                <div class="page-content">
                    
                        <h3 class="page-title">
                            {{{$title}}}
                        </h3>
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
                <!-- END PAGE CONTENT -->
            </div>
        </div>
        <!-- END PAGE CONTAINER -->




        <!-- BEGIN JAVASCRIPTS (Load javascripts at bottom, this will reduce page load time) -->
        <!-- BEGIN CORE PLUGINS -->
        <!--[if lt IE 9]>
        <script src="{{asset('assets/global/plugins/respond.min.js')}}"></script>
        <script src="{{asset('assets/global/plugins/excanvas.min.js')}}"></script> 
        <![endif]-->
        <script src="{{asset('assets/global/plugins/jquery-1.11.0.min.js')}}" type="text/javascript"></script>
        <!-- IMPORTANT! Load jquery-ui-1.10.3.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
        <script src="{{asset('assets/global/plugins/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
        
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->

            <script src="{{asset('assets/new_theme/js/dropzone/dropzone.js')}}"></script>

            <!-- IMPORTANT! fullcalendar depends on jquery-ui-1.10.3.custom.min.js for drag & drop support -->
            <!-- END PAGE LEVEL PLUGINS -->
            <!-- BEGIN PAGE LEVEL SCRIPTS -->
            <script type="text/javascript" src="{{asset('assets/new_theme/js/bootstrap-wysihtml5/wysihtml5-0.3.0.js')}}"></script>
            <script type="text/javascript" src="{{asset('assets/new_theme/js/bootstrap-wysihtml5/bootstrap-wysihtml5.js')}}"></script>
            <script src="{{asset('assets/new_theme/js/components-editors.js')}}"></script>
            <script src="{{asset('assets/new_theme/js/bootstrap-markdown/lib/markdown.js')}}" type="text/javascript"></script>
            <script src="{{asset('assets/new_theme/js/bootstrap-markdown/js/bootstrap-markdown.js')}}" type="text/javascript"></script>
            <script src="{{asset('assets/new_theme/js/bootstrap-summernote/summernote.min.js')}}" type="text/javascript"></script>
            <script src="{{asset('assets/new_theme/js/form-dropzone.js')}}"></script>


        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <!-- END PAGE LEVEL SCRIPTS -->
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


        <script type="text/javascript">
            jQuery(document).ready(function() {
                
                jQuery('.advance_options').click(function() {
                   var value = $(this).attr('alt');
                   $('#'+value).toggle()
                });
                
                jQuery('.close_popup').click(function() {
                    parent.jQuery.fn.colorbox.close();
                    parent.oTable.fnReloadAjax();
                    return false;
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
//            $('.wysihtml5').wysihtml5();
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
            $(document).on('click', '.iframe_file', function() {
               jQuery(".iframe_file").colorbox({iframe: true, width: "90%", height: "100%"});
            });
//            jQuery(document).on('click', '.iframe_list', function() {
//               jQuery(".iframe_list").colorbox({iframe: true, width: "90%", height: "100%"});
//            });
            $(document).on('click', '.iframe', function() {
               $(".iframe").colorbox({iframe: true, width: "90%", height: "100%"});
            });
            $(document).on('click', '.iframe_del', function() {
               
               $(".iframe_del").colorbox({iframe: true, width: "90%", height: "55%"});
            });
            jQuery(".iframe_list").colorbox({iframe: true, width: "90%", height: "100%"});
            
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
<script>
            jQuery(document).ready(function() {
                // initiate layout and plugins
                FormDropzone.init();
                ComponentsEditors.init();
            });
        </script>
        @yield('scripts')
        <!-- END JAVASCRIPTS -->
        <div class="overlay"></div>
    </body>

</html>
