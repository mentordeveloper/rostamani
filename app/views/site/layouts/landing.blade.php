<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="MobileOptimized" content="1150" />
        <title>A W Rostamani Lumina (LLC). Lighting</title>
        <meta HTTP-EQUIV="CACHE-CONTROL" CONTENT="public" />
        <meta HTTP-EQUIV="EXPIRES" CONTENT="<?php echo date('l, d M Y H:i:s');?>" />
        <meta NAME="KEYWORDS" CONTENT="lighting, lumina, rostamani, market crackers,mentordevloper" />
        <META NAME="ROBOTS" CONTENT="ALL" />
        <META NAME="DESCRIPTION" CONTENT="A W Rostamani Lumina (LLC). Lighting">
        
        <link href="{{asset('assets/landing/css/_new_all_final.css')}}" rel="stylesheet" media="all" type="text/css">
        <link rel="stylesheet" type="text/css" href="{{asset('assets/landing/css/style.css')}}"/>
        <link rel="stylesheet" type="text/css" href="{{asset('assets/landing/css/bootstrap.css')}}"/>
        <link rel="stylesheet" type="text/css" href="{{asset('assets/landing/css/bootstrap-theme.css')}}"/>
        <link rel="stylesheet" type="text/css" href="{{asset('assets/landing/css/font-awesome.css')}}"/>
        <link rel="stylesheet" type="text/css" href="{{asset('assets/landing/css/font-awesome.min.css')}}"/>
        <link rel="stylesheet" type="text/css" href="{{asset('assets/landing/css/animate.css')}}"/>
        <link  rel="stylesheet" type="text/css" href="{{asset('assets/loader/css/jpreloader.css')}}"/>
        <!-- Custom CSS -->
        <link href="{{asset('assets/landing/css/scrolling-nav.css')}}" rel="stylesheet">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
                <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
                <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <link rel="shortcut icon" href="{{asset('assets/landing/images/fav.ico')}}" type="image/x-icon">
        <link rel="icon" href="{{asset('assets/landing/images/fav.ico')}}" type="image/x-icon">

        <style>
            #image-reel{overflow:hidden;position:relative;border-radius: 100%;border:#FFF solid 3px;}
            #image-reel{width:164px;height:164px;}
            #image-reel,#image-reel .reel{display:block;}
            .reel-cache{position:fixed;left:-100px;top:-100px;}
            .reel-cache img{position:absolute;width:10px;height:10px;}
            #image-reel .reel-preloader{position:absolute;left:0px;bottom:0px;height:2px;overflow:hidden;background-color:#000;}
            #image-reel .reel{-moz-user-select:none;-webkit-user-select:none;-moz-transform:translateZ(0);}
            #image-reel{cursor:url('http://code.vostrel.net/jquery.reel.cur'),move;}
            #image-reel.reel-loading{cursor:wait;}
            .reel-panning,.reel-panning *{cursor:url('http://code.vostrel.net/jquery.reel.cur'),move;}
            #image-reel .reel-indicator.x{position:absolute;width:0px;height:0px;overflow:hidden;background-color:#000;}
            #the_man{display:none;position:absolute;}
            #jSplash img.responsive{max-width: 351px;max-height: 96px;}
        </style>

<!--Start of Zopim Live Chat Script-->
<!--<script type="text/javascript">
window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
_.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute("charset","utf-8");
$.src="//v2.zopim.com/?3CuawilmIZwW2koF5ZiKdKPHUmpVVMIs";z.t=+new Date;$.
type="text/javascript";e.parentNode.insertBefore($,e)})(document,"script");
</script>-->
<!--End of Zopim Live Chat Script-->
    </head>
    <body>
        <!-- wrapper -->
        <div id="wrapper">
            <!-- Navbar --> 
            @include('site.layouts.menu') 
            <!-- ./ navbar --> 


            <!-- Content --> 
            @yield('index') 
            <!-- ./ content --> 
            <!-- footer -->

            <!-- This section is for Splash Screen -->
            <section id="jSplash">
                <section class="selected">
                    
                    <img class="responsive" src="{{asset('assets/landing/images/logo.png')}}" alt="logo" />
                    
                </section>
                <section>
                    <p>Slider2 <br/>
                        <span style="font-size:30px; color:#FF6123;">Splash Screen</span>.</p>
                </section>
                <section>
                    <p>Slider3 <br/>
                        <span style="font-size:30px; color:#23FF27;">using CSS</span>.</p>
                </section>
                <section>
                    <p>Slider4 <br/> 
                        <span style="font-size:25px; color:#FF23FF;">&lt;img&gt; tag</span> + 
                        <span style="font-size:25px; color:#FF23FF;">CSS background-image</span>.</p>
                </section>
            </section>
            <!-- End of Splash Screen -->

            <footer id="footer">
                <div class="footer-holder">
                    <span class="copyrights">A W Rostamani Lumina (LLC). Lighting &reg; All rights reserved <?php echo date('Y');?></span>
                </div>
            </footer>

        </div>
        <script src="{{asset('assets/landing/js/jquery.js')}}"></script>
        <script>
// $(document).ready(function(){
// 	$(".btn-close").click(function(){
// 		$(this).parent(".tab").hide(1000, function(){
// 			$(this).addClass('js-tab-hidden');
// 		});
// 	});
// 	$("#show").click(function(){
// 		$("p").show();
// 	});
// });
        </script>





        <!-- Scrolling Nav JavaScript -->
        <script type="text/javascript" src="{{asset('assets/landing/js/jquery.easing.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('assets/landing/js/scrolling-nav.js')}}"></script>
        <script type="text/javascript" src="{{asset('assets/landing/js/jquery.main.js')}}"></script>
        <script type="text/javascript" src="{{asset('assets/landing/js/jquery.reel-edge-bundle.js')}}" charset="utf-8"></script>
        <script type="text/javascript" src="{{asset('assets/landing/js/jquery.reel.js')}}" charset="utf-8"></script>
        <script type="text/javascript" src="{{asset('assets/landing/js/bootstrap.min.js')}}" charset="utf-8"></script>
        
        <script type="text/javascript" src="{{asset('assets/landing/js/jquery-validation/lib/jquery.mockjax.js')}}"></script>
	<script type="text/javascript" src="{{asset('assets/landing/js/jquery-validation/lib/jquery.form.js')}}"></script>
	<script type="text/javascript" src="{{asset('assets/landing/js/jquery-validation/dist/jquery.validate.js')}}"></script>
	<script type="text/javascript" src="{{asset('assets/landing/js/jquery-validation/dist/jquery.validate.js')}}"></script>
	<script type="text/javascript" src="{{asset('assets/loader/js/jpreloader.js')}}"></script>
        
        
        <!-- CSS STYLE-->
        <link rel="stylesheet" type="text/css" href="{{asset('assets/rev_slider/css/style.css')}}" media="screen" />


        <!-- SLIDER REVOLUTION 4.x SCRIPTS  -->
    
        <script type="text/javascript" src="{{asset('assets/rev_slider/rs-plugin/js/jquery.themepunch.plugins.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('assets/rev_slider/rs-plugin/js/jquery.themepunch.revolution.min.js')}}"></script>

	<!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->
        <link rel="stylesheet" type="text/css" href="{{asset('assets/rev_slider/css/extralayers.css')}}" media="screen" />	
	<link rel="stylesheet" type="text/css" href="{{asset('assets/rev_slider/rs-plugin/css/settings.css')}}" media="screen" />

        
        <link rel="stylesheet" type="text/css" href="{{asset('assets/owalcarusal-light/owl.theme.css')}}" />
        <link rel="stylesheet" type="text/css" href="{{asset('assets/owalcarusal-light/owl.carousel.css')}}" />
<!--        <script type='text/javascript' src="{{asset('assets/owalcarusal-light/grabbing.png')}}"></script>
        <script type='text/javascript' src="{{asset('assets/owalcarusal-light/AjaxLoader.gif')}}"></script>-->
        <script type='text/javascript' src="{{asset('assets/owalcarusal-light/owl.carousel.min.js')}}"></script>
        <script type='text/javascript' src="{{asset('assets/owalcarusal-light/jquery.prettyPhoto.js')}}"></script>
        <link rel="stylesheet" type="text/css" href="{{asset('assets/owalcarusal-light/prettyPhoto.css')}}">
  

<script type='text/javascript'>//<![CDATA[

 $(document).ready(function () {
     $("a[rel^='partners']").prettyPhoto({animation_speed:'normal',theme:'light_square',slideshow:3000, autoplay_slideshow: false,social_tools:false});

     $(".owl-slider").owlCarousel({

         autoPlay: 3000, //Set AutoPlay to 3 seconds

         items: 4,
         itemsDesktop: [1199, 3],
         itemsDesktopSmall: [979, 3]

     });
 });
//]]> 

</script>
	
        <script type="text/javascript">
            var tabsFn = (function () {

                function init() {
                    setHeight();
                }

                function setHeight() {
                    var $tabPane = $('.tab-pane_my'),
                    tabsHeight = $('#left-tab-nav').height();
                    $tabPane.css({
                        height: tabsHeight
                    });
                }

            //            jQuery(init);
            })();
        </script>
<!--        <script>
          (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
          (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
          })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

          ga('create', 'UA-66681352-1', 'auto');
          ga('send', 'pageview');

        </script>-->

        <script>
$(document).ready( function() {
	var timer;	//timer for splash screen
	
	//calling jPreLoader
	jQuery('body').jpreLoader({
		splashID: "#jSplash",
		loaderVPos: '70%',
		autoClose: true,
//		closeBtnText: "Let's Begin!",
		splashFunction: function() {  
			//passing Splash Screen script to jPreLoader
			jQuery('#jSplash').children('section').not('.selected').hide();
			jQuery('#jSplash').hide().fadeIn(800);
			
//			timer = setInterval(function() {
//				splashRotator();
//			}, 4000);
		}
	}, function() {	//callback function
		clearInterval(timer);
		jQuery('#footer')
		.animate({"bottom":0}, 500);
		jQuery('#header')
		.animate({"top":0}, 800, function() {
			jQuery('#wrapper').fadeIn(1000);
		});
	});
	
	//create splash screen animation
	function splashRotator(){
		var cur = $('#jSplash').children('.selected');
		var next = $(cur).next();
		
		if($(next).length != 0) {
			$(next).addClass('selected');
		} else {
			$('#jSplash').children('section:first-child').addClass('selected');
			next = $('#jSplash').children('section:first-child');
		}
			
		$(cur).removeClass('selected').fadeOut(800, function() {
			$(next).fadeIn(800);
		});
	}
});
</script>

    </body>
</html>