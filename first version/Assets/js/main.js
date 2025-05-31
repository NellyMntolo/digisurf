(function(){
    // Paralax header
    if (!Modernizr.touch && $('.header-bg').length>0) {
        var headerBG = $('.header-bg')
        function handleScroll(){
            var st = $(window).scrollTop()
            var transform = Modernizr.csstransforms3d ? 'translate3d(0px,'+(st/2)+'px,0px)' : 'translate(0px,'+(st/2)+'px)'
            headerBG.css({
                '-webkit-transform':transform,
                '-o-transform':transform,
                '-moz-transform':transform,
                '-ms-transform':transform,
                'transform':transform
            }) 
        }
        $(window).scroll(function(){
            handleScroll()
        })
        $(window).resize(function(){
            handleScroll()
        })
    }
    

    // Phone sliders
    var swiperLeft = $('.phone-left .swiper-container').swiper({
        onlyExternal:true
    })
    var swiperRight = $('.phone-right .swiper-container').swiper({
        grabCursor:true,
        autoplay:3000,
        onTouchMove: function(s){
            swiperLeft.stopAutoplay()
            swiperLeft.setWrapperTransition(0)
            swiperLeft.setWrapperTranslate(s.getWrapperTranslate())
        },
        onSlideChangeStart: function(s){
            swiperLeft.swipeTo(s.activeIndex)
        },
        onSlideReset: function(s){
            swiperLeft.swipeTo(s.activeIndex)
        }
    })

    // Video
    $('.open-video a').click(function(e){
        e.preventDefault()
        $('.video-layer').addClass('opened')
    })
    $('.close-video a').click(function(e){
        e.preventDefault()
        $('.video-layer').removeClass('opened')
    })

    // Scroll Link
    $('.scroll-link').click(function(e){
        e.preventDefault();
        var id = $(this).attr('href')
        var el = $(id)
        if (id=='#') $('html, body').animate({scrollTop: 0},500);
        else if (el.length==0) return;
        else {
            $('html, body').animate({scrollTop: el.offset().top - 60},500);
        }
        
    });


    //open search form
    $('.lvn-search-trigger').on('click', function(event){
        event.preventDefault();
        toggleSearch();
        closeNav();
    });

    function closeNav() {
        $('.lvn-nav-trigger').removeClass('nav-is-visible');
        $('.lvn-main-header').removeClass('nav-is-visible');
        $('.lvn-primary-nav').removeClass('nav-is-visible');
        $('.has-children ul').addClass('is-hidden');
        $('.has-children a').removeClass('selected');
        $('.moves-out').removeClass('moves-out');
        $('.lvn-main-content').removeClass('nav-is-visible').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function(){
            $('body').removeClass('overflow-hidden');
        });
    }

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
            // if($(window).width() > MqL && $('.lvn-search').hasClass('is-visible')) $('.lvn-search').find('input[type="search"]').focus();
            ($('.lvn-search').hasClass('is-visible')) ? $('.lvn-overlay2').addClass('is-visible') : $('.lvn-overlay2').removeClass('is-visible') ;
        }
    }

    $(document).ready(function() {
        
        /* Every time the window is scrolled ... */
        $(window).scroll( function(){
        
            /* Check the location of each desired element */
            $('.content-block').each( function(i){
                
                var bottom_of_object = $(this).position().top + $(this).outerHeight();
                var bottom_of_window = $(window).scrollTop() + $(window).height();
                
                /* If the object is completely visible in the window, fade it it */
                if( bottom_of_window > bottom_of_object ){
                    
                    $(this).animate({'opacity':'1'},1500);
                        
                }
                
            }); 
        
        });
        
    });

    


})();

// jQuery(document).ready(function($){
//     var isLateralNavAnimating = false;
    
//     //open/close lateral navigation
//     $('.cd-nav-trigger').on('click', function(event){
//         event.preventDefault();
//         //stop if nav animation is running 
//         if( !isLateralNavAnimating ) {
//             if($(this).parents('.csstransitions').length > 0 ) isLateralNavAnimating = true; 
            
//             $('body').toggleClass('navigation-is-open');
//             $('.cd-navigation-wrapper').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function(){
//                 //animation is over
//                 isLateralNavAnimating = false;
//             });
//         }
//     });
// });

jQuery(document).ready(function($){
    var isLateralNavAnimating = false;
    
    //open/close lateral navigation
    $('.cd-nav-trigger').on('click', function(event){
        event.preventDefault();
        //stop if nav animation is running 
        if( !isLateralNavAnimating ) {
            if($(this).parents('.csstransitions').length > 0 ) isLateralNavAnimating = true; 
            
            $('body').toggleClass('navigation-is-open');
            $('.cd-navigation-wrapper').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function(){
                //animation is over
                isLateralNavAnimating = false;
            });
        }
    });
});
