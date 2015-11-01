<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="MobileOptimized" content="1150" />
        <title>AL Rostamani</title>
        <link href="{{asset('assets/landing/css/all.css')}}" rel="stylesheet" media="all" type="text/css">
        <link rel="stylesheet" type="text/css" href="{{asset('assets/landing/css/style.css')}}"/>
        <link rel="stylesheet" type="text/css" href="{{asset('assets/landing/css/bootstrap.css')}}"/>
        <link rel="stylesheet" type="text/css" href="{{asset('assets/landing/css/bootstrap-theme.css')}}"/>
        <link rel="stylesheet" type="text/css" href="{{asset('assets/landing/css/font-awesome.css')}}"/>
        <link rel="stylesheet" type="text/css" href="{{asset('assets/landing/css/font-awesome.min.css')}}"/>
        <link rel="stylesheet" type="text/css" href="{{asset('assets/landing/css/animate.css')}}"/>
        <!-- Custom CSS -->
        <link href="css/scrolling-nav.css" rel="stylesheet">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
                <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
                <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        
        
    </head>
    <body>
        <!-- wrapper -->
        <div id="wrapper">
            <nav style="background:none; background-color:transparent;" class="navbar navbar-default navbar-fixed-top" role="navigation" id="header">
                <div class="navbar-header page-scroll">
                    <div class="col-sm-2 logo animated bounceInDown">
                        <a class="navbar-brand page-scroll" href="#page-top"><img src="{{asset('assets/landing/images/logo.png')}}" alt="logo" /> </a>
                    </div>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="navbar-ex1-collapse">
                    <div class="col-md-1 pull-right margin15">
                        <div class="nav-drop">
                            <a href="#" class="nav-opener"><i class="fa fa-navicon fa-3x navico"></i></a>
                            <div class="nav-slide">
                                <a href="#" class="nav-opener"><i class="fa fa-navicon fa-3x navico"></i></a>
                                <form class="search" action="#" method="post">
                                    <input type="submit" value="search">
                                    <input type="text">
                                </form>
                                <ul class="menu">
                                    <li><a href="#">Download cataloge</a></li>
                                    <li><a href="#">Faq</a></li>
                                    <li><a href="#">Quotations</a></li>
                                    <li><a href="#">Light Calculator</a></li>
                                    <li><a href="#">Producst </a></li>
                                    <li><a href="#">Work with us</a></li>
                                    <li><a href="#">Partner with us</a></li>
                                </ul>
                                <div class="social-networks">
                                    <strong class="heading">Follow us</strong>
                                    <ul>
                                        <li><a href="#" class="gp"></a></li>
                                        <li><a href="#" class="in"></a></li>
                                        <li><a href="#" class="yo"></a></li>
                                        <li><a href="#" class="tw"></a></li>
                                        <li><a href="#" class="fb"></a></li>
                                    </ul>
                                </div>
                                <div class="pp-carousel">
                                    <a href="#" class="btn-prev"></a>
                                    <a href="#" class="btn-next"></a>
                                    <strong class="heading">Poular Products</strong>
                                    <div class="mask">
                                        <div class="slideset">
                                            <div class="slide">
                                                <img src="{{asset('assets/landing/images/product-1.png')}}" width="170" height="170" alt="">
                                                <p>Evo 35W</p>
                                            </div>
                                            <div class="slide">
                                                <img src="{{asset('assets/landing/images/product-1.png')}}" width="170" height="170" alt="">
                                                <p>Evo 35W</p>
                                            </div>
                                            <div class="slide">
                                                <img src="{{asset('assets/landing/images/product-1.png')}}" width="170" height="170" alt="">
                                                <p>Evo 35W</p>
                                            </div>
                                            <div class="slide">
                                                <img src="{{asset('assets/landing/images/product-1.png')}}" width="170" height="170" alt="">
                                                <p>Evo 35W</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pagination"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <nav id="nav">
                        <a href="#" class="nav-opener1">menu</a>
                        <ul class="nav navbar-nav menus">
                            <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                            <li class="hidden">
                                <a class="page-scroll" href="#page-top"></a>
                            </li>
                            <li><a class="page-scroll" href="#section1">HOME</a></li>
                            <li><a class="page-scroll" href="#section2">ABOUT US</a></li>
                            <li><a class="page-scroll" href="#section3">PRODUCTS</a></li>
                            <li><a class="page-scroll" href="#section4">PARTNERS</a></li>
                            <li><a class="page-scroll" href="#section6">PROJECTS</a></li>
                            <li><a class="page-scroll" href="#section5">APPLICATIONS</a></li>
                            <li><a class="page-scroll" href="#section7">CONTACT US</a></li>
                        </ul>
                    </nav>
                </div>
                <!-- /.navbar-collapse -->
                <!-- /.container -->
            </nav>
    
            <!-- Content --> 
            @yield('index') 
            <!-- ./ content --> 
            <!-- footer -->

            <footer id="footer">
                <div class="footer-holder">
                    <div class="f1">



                        <h2>drop a line</h2>

                        <form action="#" method="post">

                            <div class="name">
                                <input type="text" placeholder="name">
                            </div>
                            <div class="email">
                                <input type="text" placeholder="email addresee">
                            </div>

                            <input type="text" placeholder="subject">
                            <textarea cols="10" rows="10" placeholder="Your text!"></textarea>
                        </form>




                    </div>

                </div>
                <div class="footer-holder">
                    <span class="copyrights">AL Rostomani &reg; All rights reserved 2015</span>
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
    </body>
</html>