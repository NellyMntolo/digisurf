
$(window).scroll(function () {
    var sc = $(window).scrollTop()
    if (sc > 10) {
        $(".language2").addClass("sticky")
    } else {
        $(".language2").removeClass("sticky")
    }
});
$(window).scroll(function () {
    var sc = $(window).scrollTop()
    if (sc > 300) {
        $(".dates-cont").addClass("sticky")
    } else {
        $(".dates-cont").removeClass("sticky")
    }
});
$(window).scroll(function () {
    var sc = $(window).scrollTop()
    if (sc > 300) {
        $(".mobile-buttons").addClass("sticky")
    } else {
        $(".mobile-buttons").removeClass("sticky")
    }
});
$(".trigger").click(function () {
    $(".menu").toggleClass("triggered");
});
$("main").click(function () {
    $(".menu").removeClass("triggered");
});

// Animation section
$(document).ready(function () {
    var $animation_elements = $('.animation-element');
    var $window = $(window);

    function check_if_in_view() {
        var window_height = $window.height();
        var window_top_position = $window.scrollTop();
        var window_bottom_position = (window_top_position + window_height);

        $.each($animation_elements, function () {
            var $element = $(this);
            var element_height = $element.outerHeight();
            var element_top_position = $element.offset().top;
            var element_bottom_position = (element_top_position + element_height);

            //check to see if this current container is within viewport
            if ((element_bottom_position >= window_top_position) &&
                (element_top_position <= window_bottom_position)) {
                $element.addClass('in-view');
            }
        });
    }

    $window.on('scroll resize', check_if_in_view);
    $window.trigger('scroll');
});

// Review stars
$('.teacher-wrapper-write').hide();

$(document).on('click', '.star', function (event) {
    var value = $(this).attr('data-val');
    value < 3 ? $('.teacher-wrapper-write').slideToggle(400).show() : $('.teacher-wrapper-write').hide();

    $('.star').css('filter', 'grayscale(100%)').each(function () {
        $(this).attr('data-val') <= value ? $(this).css('filter', 'grayscale(0%)') : '';
    });
});

/* Full Screen */

jQuery(document).ready(function($){
	var contentSections = $('.cd-section'),
		navigationItems = $('#cd-vertical-nav a');

	updateNavigation();
	$(window).on('scroll', function(){
		updateNavigation();
	});

	//smooth scroll to the section
	navigationItems.on('click', function(event){
        event.preventDefault();
        smoothScroll($(this.hash));
    });
    //smooth scroll to second section
    $('.cd-scroll-down').on('click', function(event){
        event.preventDefault();
        smoothScroll($(this.hash));
    });

    //open-close navigation on touch devices
    $('.touch .cd-nav-trigger').on('click', function(){
    	$('.touch #cd-vertical-nav').toggleClass('open');
  
    });
    //close navigation on touch devices when selectin an elemnt from the list
    $('.touch #cd-vertical-nav a').on('click', function(){
    	$('.touch #cd-vertical-nav').removeClass('open');
    });

	function updateNavigation() {
		contentSections.each(function(){
			$this = $(this);
			var activeSection = $('#cd-vertical-nav a[href="#'+$this.attr('id')+'"]').data('number') - 1;
			if ( ( $this.offset().top - $(window).height()/2 < $(window).scrollTop() ) && ( $this.offset().top + $this.height() - $(window).height()/2 > $(window).scrollTop() ) ) {
				navigationItems.eq(activeSection).addClass('is-selected');
			}else {
				navigationItems.eq(activeSection).removeClass('is-selected');
			}
		});
	}

	function smoothScroll(target) {
        $('body,html').animate(
        	{'scrollTop':target.offset().top},
        	600
        );
	}
});


//Scroll Top

jQuery(document).ready(function($){
	// browser window scroll (in pixels) after which the "back to top" link is shown
	var offset = 300,
		//browser window scroll (in pixels) after which the "back to top" link opacity is reduced
		offset_opacity = 1200,
		//duration of the top scrolling animation (in ms)
		scroll_top_duration = 700,
		//grab the "back to top" link
		$back_to_top = $('.back-top');

	//hide or show the "back to top" link
	$(window).scroll(function(){
		( $(this).scrollTop() > offset ) ? $back_to_top.addClass('cd-is-visible') : $back_to_top.removeClass('cd-is-visible cd-fade-out');
		if( $(this).scrollTop() > offset_opacity ) { 
			$back_to_top.addClass('cd-fade-out');
		}
	});

	//smooth scroll to top
	$back_to_top.on('click', function(event){
		event.preventDefault();
		$('body,html').animate({
			scrollTop: 0 ,
		 	}, scroll_top_duration
		);
	});

});

jQuery(document).ready(function($){

$('.mobile-side-menu a').click(function () {
        // body...
        if ($(this).hasClass("active")) {
            $("#mobile-side-menu-button").text($(this).text());
        }
    });
var pings = $('.dropdown-menu li a').hasClass("active");

    if ($('.dropdown-menu li a').hasClass("active")) {
            $("#mobile-side-menu-button").text($(pings).text());
    }

});


$('#loginForm').submit(function(sub) {
  sub.preventDefault();
  var username = $('#LoginNum').val();
  var password = $('#LoginPass').val();
  if(password != '' && username != ''){
  $.ajax({
  type: "POST",
  url:"/Log",
  data: "password=" + password + '&username=' + username,
  success: function (response) {
  if(response == 'Y') {
  $('#loginForm input').val('');
  $('#myLogin').modal('hide');
  location.reload();
    } else if (response == 'N'){
        $('.login-error').html('帳號或密碼錯誤<br>請重新登⼊');
        $('#myLoginError').modal('show'); 
    }
  },            
  error: function (jXHR, textStatus, errorThrown) {
      alert(errorThrown); 
    }            
});
} else {
  $('.login-error').html('帳號或密碼錯誤<br>請重新登⼊');
  $('#myLoginError').modal('show'); 
}
});