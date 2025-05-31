"use strict";
$(document).ready(function () {
    $(".animsition").animsition({
        inClass: 'fade-in',
        outClass: 'fade-out',
        inDuration: 1500,
        outDuration: 800,
        linkElement: '.animsition-link',
        loading: true,
        loadingParentElement: 'html',
        loadingClass: 'animsition-loading-1',
        loadingInner: '<div data-loader="ball-scale"></div>',
        timeout: false,
        timeoutCountdown: 5000,
        onLoadEvent: true,
        browser: [ 'animation-duration', '-webkit-animation-duration'],
        overlay : false,
        overlayClass : 'animsition-overlay-slide',
        overlayParentElement : 'html',
        transition: function(url){ window.location.href = url; }
    });
});
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

$(".trigger").click(function () {
    $(".menu").toggleClass("triggered");
});
$("main").click(function () {
    $(".menu").removeClass("triggered");
});
$(".trigger").click(function () {
    $(".trigger").toggleClass("open");
});
$("main").click(function () {
    $(".trigger").removeClass("open");
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

// $(document).on('click', '.star', function (event) {
//     var value = $(this).attr('data-val');
//     value < 3 ? $('.teacher-wrapper-write').slideToggle(400).show() : $('.teacher-wrapper-write').hide();

//     $('.star').css('filter', 'grayscale(100%)').each(function () {
//         $(this).attr('data-val') <= value ? $(this).css('filter', 'grayscale(0%)') : '';
//     });
// });

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

// $('.mobile-side-menu a').click(function () {
//         // body...
//         if ($(this).hasClass("active")) {
//             $("#mobile-side-menu-button").text($(this).text());
//         }
//     });
// var pings = $('.dropdown-menu li a').hasClass("active");

//     if ($('.dropdown-menu li a').hasClass("active")) {
//             $("#mobile-side-menu-button").text($(pings).text());
//     }

$("#mobile-side-menu-button").text($('.mob-what a.active').text());
});

$(".mobile-side-menu-button").text($('.dropdown-menu li a .active').text());
$('#loginForm').submit(function(sub) {
  sub.preventDefault();
  var username = $('#LoginNum').val();
  var password = $('#LoginPass').val();
  var code = $('#login_code').val();
  if(password != '' && username != ''){
  $.ajax({
  type: "POST",
  url:"/Log",
  data: "password=" + password + '&username=' + username + '&login_code=' + code,
  
  success: function (response) {
    // console.log(code);
    console.log(response);
  if(response == 'Y') {
  $('#loginForm input').val('');
  $('#myLogin').modal('hide');
  console.log('Y');
  location.reload();
    } else if (response == 'N'){
        $('.login-error').html('Username or Password is Wrong<br>Please try again');
        $('#myLoginError').modal('show');
        console.log('N');
    } else if (response == 'L'){
        $('.login-error').html('Username or Password or Security code is Wrong');
        $('#myLoginError').modal('show');
        console.log('L');
    } else if (response == 'D'){
        $('.login-error').html('duplicate <br> account');
        $('#myLoginError').modal('show');
        console.log('D');
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


$('.forgotBtn').click(function () {
    $('#myLogin').modal('hide');
});
$('#forgotten-password').submit(function(forgot) {
  forgot.preventDefault();
  var forgotten_email = $('.forgotten-password').val();
  if(forgotten_email != ''){
  $.ajax({
  type: "POST",
  url:"/Forgotten",
  data: "forgotten_email=" + forgotten_email,
  success: function (response) {
    console.log(response);
  if(response != '0') {
  $('#forgotten-password input').val('');
  $('#myForgot').modal('hide');
  $('#myForgotSuccess').modal('show');
  //$('.forgotten-reset-number').val(response);
  //alert(<?php //echo $_SESSION['phone_number']; ?>);
    } else if (response == '0'){
        $('.forgot-error').html('這個手機號碼沒有資料');
        $('#myForgoterror').modal('show');
    }
  },            
  error: function (jXHR, textStatus, errorThrown) {
      alert(errorThrown); 
    }            
});
} else {
  $('.forgot-error').html('這個手機號碼沒有資料');
  $('#myForgoterror').modal('show'); 
}
});


$('#forgotten-reset').submit(function(reset) {
  reset.preventDefault();
  var phone_pass = $('.forgotten-reset').val();
  var phone_reset = $('.forgotten-reset-number').val();
  if(phone_reset != ''){
  $.ajax({
  type: "POST",
  url:"/Resetting",
  data: "reset_pass=" + phone_pass + "&reset_number=" + phone_reset,
  success: function (response) {  
    console.log(response);
    if(response == '1') {
      $('#forgotten-reset input').val('');
      $('#myForgotSuccess').modal('hide');
      $('#newPassword').modal('show');
      $('#phone').val(phone_reset);
      //$('#myLogin').modal('show');
    } else if (response == '0'){
        $('.forgot-error').html('Wrong authentication code <br> Please try again');
        $('#myForgoterror').modal('show');
    }
  },            
  error: function (jXHR, textStatus, errorThrown) {
      alert(errorThrown); 
    }            
});
} else {
  $('.forgot-error').html('Wrong authentication code <br> Please try again');
  $('#myForgoterror').modal('show'); 
}
});


$('#newPass').submit(function(newpass) {
  newpass.preventDefault();
  var new_pass2 = $('#newpass2').val();
  var newpass1 = $('#newpass1').val();
  var phone = $('#phone').val();
  if(newpass1 == new_pass2 && new_pass2 != ''){
  $.ajax({
  type: "POST",
  url:"/Resetter",
  data: "new_pass=" + new_pass2 + "&phone=" + phone,
  success: function (response) {  
    console.log(response);
    if(response == '1') {
      $('#newPass input').val('');
      $('#newPassword').modal('hide');
      $('#myLogin').modal('show');
    } else if (response == '0'){
        $('.forgot-error').html('Please check if your internet signal is normal');
        $('#myForgoterror').modal('show');
    }
  },            
  error: function (jXHR, textStatus, errorThrown) {
      alert(errorThrown); 
    }            
});
} else {
  $('.forgot-error').html('Please check if your internet signal is normal');
  $('#myForgoterror').modal('show'); 
}
});



//  sign up
$('#SignUpForm').submit(function(sign_up_sub) {
  sign_up_sub.preventDefault();
  var username = $('#SignUpUser').val();
  var password = $('#SignUpPass').val();
  var repeat_password = $('#SignUpPass_confirm').val();
  var sign_up_code = $('#signup_code').val();
  if(password != '' && username != '' && repeat_password == password){
  $.ajax({
  type: "POST",
  url:"/SignUp",
  data: "SignUpPass_confirm=" + repeat_password + '&username=' + username + '&signup_code=' + sign_up_code,
  success: function (sign_up_response) {
    console.log(sign_up_response);
  if(sign_up_response == 'Y') {
  $('#SignUpForm input').val('');
  $('#mySignUp').modal('hide');
  $('#signupemail').modal('show');
  // console.log(repeat_password+' ' + username+ ' '+ sign_up_code+ ' ');
  // console.log('Y');
  location.reload();
    } else if (sign_up_response == 'N'){
        $('.login-error').html('Please Feel Out<br>All The info.');
        $('#mySignUpError').modal('show');
        // console.log('N');
    } else if (sign_up_response == 'L'){
        $('.login-error').html('Passwords, <br> or security code Don\'t match');
        $('#mySignUpError').modal('show');
        // console.log('L');
    } else if (sign_up_response == 'D'){
        $('.login-error').html('duplicate <br> account');
        $('#mySignUpError').modal('show');
        // console.log('D');
    }
  },            
  error: function (jXHR, textStatus, errorThrown) {
      alert(errorThrown); 
    }
});
} else {
  $('.login-error').html('Passwords, <br> or security code Don\'t match');
  $('#mySignUpError').modal('show'); 
}
});
//  sign up

//  Newsletter
$('#newsletter-form').submit(function(news_letter_sub) {
  news_letter_sub.preventDefault();
  // sub.stopImmediatePropagation();  
  var newletter_email = $('#newletter_email').val();
  var newsletter_code = $('#newsletter_code').val();
  var newsletter_submit = $('#newsletter_submit').val();
  if(newletter_email != '' && newsletter_submit != ''){
  $.ajax({
  type: "POST",
  url:"/Newsletter",
  data: "newsletter_code=" + newsletter_code + '&newletter_email=' + newletter_email + '&newsletter_submit=' + newsletter_submit,
  success: function (news_letter_response) {
    // console.log(news_letter_response);
  if(news_letter_response == 'Y') {
    // console.log('what?');
  $('#newsletter-form .newsletter-input').val('');
  $('mySubscribe').modal('show');
  // console.log(repeat_quick_message_email+' ' + name+ ' '+ code+ ' ');
  // console.log('Y');
  //location.reload();
    } else if (news_letter_response == 'N'){
        $('.login-error').html('Please Feel Out<br>All The info.');
        $('#myNewsletterError').modal('show');
        console.log('N');
    } else if (news_letter_response == 'L'){
        $('.login-error').html('Some Email Error');
        $('#myNewsletterError').modal('show');
        console.log('L');
    } 
  },
  error: function (jXHR, textStatus, errorThrown) {
      alert(errorThrown); 
    } 
});
  
} else {
  $('.login-error').html('Some Unknown Error');
  $('#myNewsletterError').modal('show'); 
}

return false;
});
//  Newsletter

//  quick message
$('#quick_message_form').submit(function(sub) {
  sub.preventDefault();
  var quick_message_name = $('#quick_message_name').val();
  var quick_message_email = $('#quick_message_email').val();
  var quick_message_subject = $('#quick_message_subject').val();
  var quick_message = $('#quick_message').val();
  var quick_message_submit = $('#quick_message_submit').val();
  if(quick_message_email != '' && quick_message_name != ''){
  $.ajax({
  type: "POST",
  url:"/QuickMessage",
  data: "quick_message_name=" + quick_message_name + '&quick_message_email=' + quick_message_email + '&quick_message_subject=' + quick_message_subject + '&quick_message=' + quick_message + '&quick_message_submit=' + quick_message_submit,
  success: function (response) {
    //console.log(response);
  if(response == 'Y') {
  $('#quick_message_form input').val('');
  $('#quick_message_form textarea').val('');
  $('#myQuickMessageSent').modal('show');
  // console.log(repeat_quick_message_email+' ' + name+ ' '+ code+ ' ');
  //console.log('Y');
  //location.reload();
    } else if (response == 'N'){
        $('.login-error').html('Please Feel Out<br>All The info.');
        $('#myQuickMessageError').modal('show');
        console.log('N');
    } else if (response == 'L'){
        $('.login-error').html('Some Email Error');
        $('#myQuickMessageError').modal('show');
        console.log('L');
    } 
  },            
  error: function (jXHR, textStatus, errorThrown) {
      alert(errorThrown); 
    }      
});
} else {
  $('.login-error').html('Some Unknown Error');
  $('#myQuickMessageError').modal('show'); 
}
});
//  quick message

//  join us
$('#join_us_form').submit(function(sub) {
  sub.preventDefault();
  var join_us_name = $('#join_us_name').val();
  var join_us_phone_number = $('#join_us_phone_number').val();
  var join_us_volunteer_type = $('#join_us_volunteer_type').val();
  var join_us_volunteer_email = $('#join_us_volunteer_email').val();
  var join_us_volunteer_message = $('#join_us_volunteer_message').val();
  var joinus_code = $('#joinus_code').val();
  var join_us_submit = $('#join_us_submit').val();
  if(join_us_name != '' && join_us_volunteer_email != ''){
  $.ajax({
  type: "POST",
  url:"/Join_Us",
  data: "join_us_name=" + join_us_name + '&join_us_phone_number=' + join_us_phone_number + '&join_us_volunteer_type=' + join_us_volunteer_type + '&join_us_volunteer_email=' + join_us_volunteer_email + '&join_us_volunteer_message=' + join_us_volunteer_message + '&joinus_code=' + joinus_code + '&join_us_submit=' + join_us_submit,
  success: function (response) {
    console.log(response);
  if(response == 'Y') {
  $('#join_us_form input').val('');
  $('#joinus_code textarea').val('');
  $('#myjoinus').modal('show');
  // console.log(repeat_quick_message_email+' ' + name+ ' '+ code+ ' ');
  // console.log('Y');
  //location.reload();
    } else if (response == 'N'){
        $('.login-error').html('Please Feel Out<br>All The info.');
        $('#myJoinUsError').modal('show');
        // console.log('N');
    } else if (response == 'L'){
        $('.login-error').html('Some Email Error');
        $('#myJoinUsError').modal('show');
        // console.log('L');
    } 
  },            
  error: function (jXHR, textStatus, errorThrown) {
      alert(errorThrown); 
    }      
});
} else {
  $('.login-error').html('Some Unknown Error');
  $('#myJoinUsError').modal('show'); 
}
});
//  join us




//  cooperate
$('#cooperate_form').submit(function(cooperate_sub) {
  cooperate_sub.preventDefault();
  var cooperate_name = $('#cooperate_name').val();
  var cooperate_phone_number = $('#cooperate_phone_number').val();
  var cooperate_company_name = $('#cooperate_company_name').val();
  var cooperate_email = $('#cooperate_email').val();
  var cooperate_message = $('#cooperate_message').val();
  var cooperate_code = $('#cooperate_code').val();
  var cooperate_submit = $('#cooperate_submit').val();
  if(cooperate_name != '' && cooperate_phone_number != '' && cooperate_company_name != '' && cooperate_email != '' && cooperate_code != ''){
  $.ajax({
  type: "POST",
  url:"/Cooperate",
  data: "cooperate_name=" + cooperate_name + '&cooperate_phone_number=' + cooperate_phone_number + '&cooperate_company_name=' + cooperate_company_name + '&cooperate_email=' + cooperate_email + '&cooperate_message=' + cooperate_message + '&cooperate_code=' + cooperate_code + '&cooperate_submit=' + cooperate_submit,
  success: function (cooperate_response) {
    console.log(cooperate_response);
  if(cooperate_response == 'Y') {
  $('#cooperate_form input').val('');
  $('#cooperate_form textarea').val('');
  // $('#mycooperation').modal('hide');
  $('#mycooperation').modal('show');
  // console.log(repeat_password+' ' + username+ ' '+ cooperate_code+ ' ');
  // console.log('Y');
  // location.reload();
    } else if (cooperate_response == 'N'){
        $('.login-error').html('Please Feel Out<br>All The info.');
        $('#mySignUpError').modal('show');
        // console.log('N');
    } else if (cooperate_response == 'L'){
        $('.login-error').html('Passwords, <br> or security code Don\'t match');
        $('#mySignUpError').modal('show');
        // console.log('L');
    } else if (cooperate_response == 'D'){
        $('.login-error').html('duplicate <br> account');
        $('#mySignUpError').modal('show');
        // console.log('D');
    }
  },            
  error: function (jXHR, textStatus, errorThrown) {
      alert(errorThrown); 
    }
});
} else {
  $('.login-error').html('Passwords, <br> or security code Don\'t match');
  $('#mySignUpError').modal('show'); 
}
});
//  cooperate

//  footer button
$("#fixed-form-container .body").hide();
$("#fixed-form-container .button").click(function () {
    $('#fixed-form-container .button').next("#fixed-form-container div").slideToggle(400);
    $('#fixed-form-container .button').toggleClass("expanded");
});
//  footer button

// article search
$('.fa-search').click(function () {
  $('#Search_Article_form').submit();
  //$(this).parent('form').submit();

});
// article search

//  SEARCH
// $(document).ready(function(){
//   $('#search').on("click",(function(e){
//   $(".search-group").addClass("sb-search-open");
//     e.stopPropagation()
//   }));
//    $(document).on("click", function(e) {
//     if ($(e.target).is("#search") === false && $(".search-control").val().length == 0) {
//       $(".search-group").removeClass("sb-search-open");
//     }
//   });
//     $(".search-control-submit").click(function(e){
//       $(".search-control").each(function(){
//         if($(".search-control").val().length == 0){
//           e.preventDefault();
//           // $(this).css('border', '1px solid #128e75');
//         }
//     });
//   });
// });
//  SEARCH


//  PANELS
 $('.panel-collapse').on('show.bs.collapse', function () {
    $(this).siblings('.panel-heading').addClass('active');
  });

  $('.panel-collapse').on('hide.bs.collapse', function () {
    $(this).siblings('.panel-heading').removeClass('active');
  });
//  PANELS

//  sign up
// $("#SignUpForm").submit (function () {
//     if ($('#SignUpPass_first').val() !== ('#SignUpPass_second').val() ) {
//         alert("no match");
//         console.log("no match");
//         return false;
//        } else {
//         alert ("MATCH");
//         console.log("MATCH");
//        }
// });
 

//  sign up



// About Ratings
// $.fn.isOnScreen = function(){

//     var win = $(window);

//     var viewport = {
//         top : win.scrollTop(),
//         left : win.scrollLeft()
//     };
//     viewport.right = viewport.left + win.width();
//     viewport.bottom = viewport.top + win.height();

//     var bounds = this.offset();
//     bounds.right = bounds.left + this.outerWidth();
//     bounds.bottom = bounds.top + this.outerHeight();

//     return (!(viewport.right < bounds.left || viewport.left > bounds.right || viewport.bottom < bounds.top || viewport.top > bounds.bottom));

// };

// $(document).ready(function(){
//     $(window).scroll(function(){
//         if ($('.ratings').isOnScreen()) {
//             //  RATING COUNTER
//             $('.rator-hr').each(function () {
//                 $(this).prop('Counter',0).animate({
//                     Counter: $(this).text()
//                 }, {
//                     duration: 4000,
//                     easing: 'swing',
//                     step: function (now) {
//                         $(this).text(Math.ceil(now));
//                     }
//                 });
//             });

//             return false;

//         } else {
//             // The element is NOT visible, do something else
//         }
//     });
// });


// About Ratings



//  AutoComplete
// $('.basicAutoComplete').autoComplete({
//     resolverSettings: {
//         url: '/assets/autocomplete.json'
//     }
// });
//  AutoComplete


// //Rating
// $(document).on('click', '.star, .rating', function (rating) {
//     rating.preventDefault();
//     var value = $(this).attr('data-val');
//     $('.thestar').val(value);
//     //$('.rating').attr('data-val', value);
    
//     //setTimeout(function(){}, 1000);

//         if(value >= 3){
//             $(this).parents('.teacher-wrapper').slideUp('slow').delay(1000);
//             $('.star').css('filter', 'grayscale(100%)');

//             var data = $(this).parents("form").find(':input').serialize();
//             console.log(data);
//             //alert(data);
//             $('#myReview').modal('hide');
//             $.ajax({
//               type: "POST",
//               url:"/Rating",
//               data: data,
//               success: function (response) {
//                 console.log('success');
//               },            
//               error: function (jXHR, textStatus, errorThrown) {
//                   alert(errorThrown); 
//                 }            
//             });

//         } else if(value <= 2){
//             $('.thestar').val(value);

//             var data = $(this).parents("form").find(':input').serialize();
//             console.log(data);
//             //alert(data);
//             $('#myReview').modal('hide');

//             $.ajax({
//               type: "POST",
//               url:"/Rating",
//               data: data,
//               success: function (response) {
//                 console.log('success');
//               },            
//               error: function (jXHR, textStatus, errorThrown) {
//                   alert(errorThrown); 
//                 }            
//             });
            

//         }else{
//             $(this).parents('.teacher-wrapper').slideUp('slow').delay(1000);
//             $('.star').css('filter', 'grayscale(100%)');
//             var data = $(this).parents("form").find(':input').serialize();
//             //console.log(data);
//             $('.thestar').val(value);

//             $.ajax({
//               type: "POST",
//               url:"/Rating",
//               data: data,
//               success: function (response) {
//                 console.log('success');
//               },            
//               error: function (jXHR, textStatus, errorThrown) {
//                   alert(errorThrown); 
//                 }            
//             });
//         }
    
//     // $.ajax({
//     //   type: "POST",
//     //   url:"/Rating",
//     //   data: data,
//     //   success: function (response) {
//     //     console.log('success');
//     //   },            
//     //   error: function (jXHR, textStatus, errorThrown) {
//     //       alert(errorThrown); 
//     //     }            
//     // });
// });
function toggleSearch(type) {
    if(type=="close") {
      //close serach 
      $('.lvn-search').removeClass('is-visible');
      $('.lvn-search-trigger').removeClass('search-is-visible');
      $('.lvn-overlay2').removeClass('search-is-visible');
    } else {
      //toggle search visibility
      $('.lvn-search').toggleClass('is-visible');
      $('.lvn-search-trigger').toggleClass('search-is-visible');
      $('.lvn-overlay2').toggleClass('search-is-visible');
      if($(window).width() > MqL && $('.lvn-search').hasClass('is-visible')) $('.lvn-search').find('input[type="search"]').focus();
      ($('.lvn-search').hasClass('is-visible')) ? $('.lvn-overlay2').addClass('is-visible') : $('.lvn-overlay2').removeClass('is-visible') ;
    }
  }