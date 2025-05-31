$(document).on('ready', function(){
  //$( ".save-all" ).click(function() {
    $('.save-btn').on('click', function(){
    $modal = $('.modal-frame');
    $overlay = $('.modal-overlay');

    /* Need this to clear out the keyframe classes so they dont clash with each other between ener/leave. Cheers. */
    $modal.bind('webkitAnimationEnd oanimationend msAnimationEnd animationend', function(e){
      if($modal.hasClass('state-leave')) {
        $modal.removeClass('state-leave');
      }
    });

    $('.close').on('click', function(){
      $overlay.removeClass('state-show');
      $modal.removeClass('state-appear').addClass('state-leave');
    });

    
      $overlay.addClass('state-show');
      $modal.removeClass('state-leave').addClass('state-appear');
   
});


    $('.saver').on('click', function(){
    $modal = $('.modal-frame');
    $overlay = $('.modal-overlay');

    /* Need this to clear out the keyframe classes so they dont clash with each other between ener/leave. Cheers. */
    $modal.bind('webkitAnimationEnd oanimationend msAnimationEnd animationend', function(e){
      if($modal.hasClass('state-leave')) {
        $modal.removeClass('state-leave');
      }
    });

    $('.close').on('click', function(){
      $overlay.removeClass('state-show');
      $modal.removeClass('state-appear').addClass('state-leave');
    });

    
      $overlay.addClass('state-show');
      $modal.removeClass('state-leave').addClass('state-appear');
   
});



    /* images */
    $('.image-btn').on('click', function(){
    $modal = $('.modal-frame1');
    $overlay = $('.modal-overlay1');

    /* Need this to clear out the keyframe classes so they dont clash with each other between ener/leave. Cheers. */
    $modal.bind('webkitAnimationEnd oanimationend msAnimationEnd animationend', function(e){
      if($modal.hasClass('state-leave')) {
        $modal.removeClass('state-leave');
      }
    });

    $('.close').on('click', function(){
      $overlay.removeClass('state-show');
      $modal.removeClass('state-appear').addClass('state-leave');
    });

    
      $overlay.addClass('state-show');
      $modal.removeClass('state-leave').addClass('state-appear');
   
});

  });

/**************************** DELETE BTN***********************************/
var btn = document.querySelector('.btn-cover-wrap');

var btnFront = btn.querySelector('.btn-front'),
    btnYes = btn.querySelector('.btn-back .yes'),
    btnNo = btn.querySelector('.btn-back .no');


btnFront.addEventListener('click', function(event) {
  var mx = event.clientX - btn.offsetLeft,
      my = event.clientY - btn.offsetTop;

  var w = btn.offsetWidth,
      h = btn.offsetHeight;
    
  var directions = [
    { id: 'top', x: w/2, y: 0 },
    { id: 'right', x: w, y: h/2 },
    { id: 'bottom', x: w/2, y: h },
    { id: 'left', x: 0, y: h/2 }
  ];
  
  directions.sort(function( a, b ) {
    return distance( mx, my, a.x, a.y ) - distance( mx, my, b.x, b.y );
  } );
  
  btn.setAttribute('data-direction', directions.shift().id);
  btn.classList.add('is-open');

});


btnYes.addEventListener('click', function(event) {   
  btn.classList.remove('is-open');
} );
btnNo.addEventListener('click', function(event) {
  btn.classList.remove('is-open');
} );

function distance(x1, y1, x2, y2) {
  var dx = x1-x2;
  var dy = y1-y2;
  return Math.sqrt(dx*dx + dy*dy);
}
/**************************** DELETE BTN***********************************/