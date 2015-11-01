//jQuery to collapse the navbar on scroll
$(window).scroll(function() {
    if ($(".navbar").offset().top > 50 ) {
        $(".navbar-fixed-top").addClass("top-nav-collapse");
    } else {
        $(".navbar-fixed-top").removeClass("top-nav-collapse");
    }
	if ($(".product").offset().top > 50) {
        $(".lamp").addClass("fix-lamp");
    } else {
        $(".lamp").removeClass("fix-lamp");
    }
});

//jQuery for page scrolling feature - requires jQuery Easing plugin
$(function() {
    $('a.page-scroll').bind('click', function(event) {
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: $($anchor.attr('href')).offset().top+72
        }, 200, 'easeInOutExpo');
        event.preventDefault();
    });
});
$(document).ready(function(){
	$('#openclose').click(function(event) {
	  $(".code").toggleClass("show");
	}); 
	$('.openclose_1').click(function(event) {
	  $(".code").toggleClass("show");
	}); 
	    
        $('a.page-scroll').bind('click', function(event) {
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: $($anchor.attr('href')).offset().top-100
        }, 200, 'easeInOutExpo');
        event.preventDefault();
    });
});

$(document).ready(function(){
						   
	$('.quote_btn').click(function(event) {
	      var email_fld = $(this).data("email_fld");
	      var form_fld = $(this).data("form_fld");
          
		// show a simple loading indicator
		var loader = jQuery('<div id="loader"><img src="images/loading.gif" alt="loading..."></div>')
			.css({
				position: "relative",
				top: "1em",
				left: "25em",
				display: "inline"
			})
			.appendTo("body")
			.hide();
		jQuery().ajaxStart(function() {
			loader.show();
		}).ajaxStop(function() {
			loader.hide();
		}).ajaxError(function(a, b, e) {
			throw e;
		});

		var v = $("#"+form_fld).validate({
			submitHandler: function(form) {
				jQuery(form).ajaxSubmit({
					target: "#"+form_fld
				});
			}
		});

            }); 
    
	});
