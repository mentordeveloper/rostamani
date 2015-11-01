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
    <link rel="stylesheet" href="{{asset('bootstrap/css/custom.css')}}">
    <!-- CSS -->
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/js/wysihtml5/lib/css/bootstrap.min.css')}}">
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
      <!-- To make sticky footer need to wrap in a div -->
      <div id="wrap">

          <!-- Container -->
          <div class="container">
              <!-- Notifications -->
              @include('notifications')
              <!-- ./ notifications -->

              <div class="page-header">
                  <h3>
                      {{ $title }}
                      <div class="pull-right">
                          <a href="" class="btn btn-default btn-small btn-inverse close_popup"><span class="glyphicon glyphicon-circle-arrow-left"></span> Back</a>
                      </div>
                  </h3>
              </div>
              <!-- Content -->
              @yield('content')
              <!-- ./ content -->
              <!-- ./ container -->

              <!-- the following div is needed to make a sticky footer -->
              <div id="push"></div>
          </div>
          <!-- ./wrap -->
         
    <!-- Javascripts -->
   
    <script src="{{asset('assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
    <!--<script src="{{asset('assets/js/wysihtml5/lib/js/bootstrap.min.js')}}"></script>-->
    <script src="{{asset('assets/js/wysihtml5/lib/js/wysihtml5-0.3.0.js')}}"></script>
    <script src="{{asset('assets/js/wysihtml5/lib/js/highlight/highlight.pack.js')}}"></script>
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
//    parent.oTable.fnReloadAjax();
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
 "stylesheets": ["{{asset('assets/js/wysihtml5/lib/css/wysiwyg-color.css')}}", "{{asset('assets/js/wysihtml5/lib/css/highlight/github.css')}}"], // CSS stylesheets to load
  "color": true, // enable text color selection
  "size": 'small', // buttons size
  "html": true, // enable button to edit HTML
  "format-code" : true // enable syntax highlighting
  
});
jQuery(prettyPrint);
jQuery('.datepicker').datepicker({
    format: 'yyyy-mm-dd',

})  ;
$(".iframe_view").colorbox({iframe: true, width: "95%", height: "95%"});
    </script>

    @yield('scripts')

  </body>

</html>
