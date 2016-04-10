$(document).ready(function() {
    // $('#calendar').fullCalendar({
    //     googleCalendarApiKey: 'AIzaSyAfIu2iaqycS3gfXYl1aMjBNQ4CyHvSlqo',
    //     events: {
    //         googleCalendarId: 'ncvkteq0hm7cgr5bhi00bgbaik@group.calendar.google.com'
    //     },
    //     eventBackgroundColor: "#993333"
    // });
    $(".button-collapse").sideNav();

    function adjustToWidth() {
    	if ($(window).width() < 700) {
    		$('#blog-post').hide();
    		$('.blog-header-link').hide();
    		if($(window).width() < 450) {
    			$('.welcome').addClass('mobile-welcome');
    			$('.mask').hide();
    		}
    	} else {
    		$('.welcome').removeClass('mobile-welcome');
    		$('.mask').show();
    		$('#blog-post').show();
    		$('.blog-header-link').show();
    	}
    };

    adjustToWidth();

    $(window).resize(function() {
    	adjustToWidth();
    });

    $(function() {
    	$('.nav-list div').bind('click', function() {
    		var $anchor = $(this);
    		$('html, body').stop().animate({
    			scrollTop: $($anchor.attr('data-id')).offset().top
    		}, 500, 'swing');            
    	});
    });

    $('body').scrollspy({
    	target: '.bs-docs-sidebar',
    	offset: 40
    });
});
$(function() {
	$(".student").hover(function(){
		$(this).find(".info").fadeIn('fast');
	},
	function(){
		$(this).find(".info").fadeOut('fast');
	});
});