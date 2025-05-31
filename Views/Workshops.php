<?php 
include '../Model/allworkshopsDAO.php';
include_once("header.php");
include_once("footer.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo $main_workshop_text3;?>">
    <meta name="keywords" content="<?php echo $main_workshop_text2;?>">
    <meta name="author" content="Nelly">

    <?php echo $favs;?>
    <?php echo $css;?>
    <title><?php echo $main_workshop_text1;?></title>

</head>

<body class="animsition">
<?php echo $google_tags_analytics;?>
<?php echo $header;?>

<!-- Modal -->
<div class="modal fade about-modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg modal-vid" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <div class="nav-open-logo">
            <!-- <img src="/assets/images/logo_main.svg"/> -->
        </div>
        <div class="close1 btn3" data-dismiss="modal" aria-label="Close">
            <!-- <img src="/assets/images/Close.svg"/><button id="pause-button"><span>pause</span></button> -->
        </div>
      </div>
      <div class="modal-body" >
        <!-- <iframe id="video1" src="https://www.youtube.com/embed/oclcHbnHoj4" frameborder="0" allowfullscreen></iframe> -->
        <iframe type="text/html" width="100%" height="100%" src="<?php echo $about_video_url;?>?autoplay=0&showinfo=0&controls=0&rel=0" frameborder="0" allowfullscreen></iframe>
      </div>
    </div>
  </div>
</div>

<main>
    <div class="main-container page-fix">
        <div class="container cf">



            <section class="about-section-header" style="background-image: url('/assets/images/about.jpg');">
                <div class="container">
                  <div class="row">
                    <div class="col-md-12">
                      <h2><?php echo $main_workshop_text1;?></h2>                 
                    </div>
                  </div>
                </div>
            </section>


            <!-- <section class="workshop-section">
                <div class="container">
                  <div class="row">
                    <div class="col-md-4">
                      <div class="row work-date">12-03-2029</div>
                      <div class="row workshop-title"><h1>Workshop Title Here</h1></div>
                      <div class="row workshop-p"><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p></div>
                      <div class="row workshop-btn"><button>Join</button></div>              
                    </div>
                    <div class="col-md-8">
                      <div class="workshop-img"><img src="/assets/images/about.jpg"></div>                 
                    </div>
                  </div>
                </div>
            </section> -->

            <?php echo $all_workshops; ?>

            <!-- right side Ads -->
            <!-- <section class="article-section col-md-4 article-right pull-right">
                <div class="container">
                  <div class="row">
                    <div class="col-md-12">
                      <img src="/assets/images/img-signup-bg.png">
                    </div>
                  </div>
                </div>
            </section> -->


<?php
// Include the wp-load.php
// require '../Blog/wp-load.php';
 
// // Get the last 10 posts
// // Returns posts as arrays instead of get_posts' objects
// $recent_posts = wp_get_recent_posts(array(
// 'numberposts' => 10
// ));
 
// echo '<div class="word-container article-section col-md-10"><ul class="word-articles">';
// foreach($recent_posts as $post) {
//   $feat_image = wp_get_attachment_url(get_post_thumbnail_id($post['ID']));
//   $my_postid = $post['ID'];
//   $content_post = get_post($post['ID']);
//   $content = $content_post->post_content;
//   $content = apply_filters('the_content', $content);
//   $content = str_replace(']]>', ']]&gt;', $content);
//   echo '<li class="word-article-image"><img src="'.$feat_image.'"></li>';
//   echo '<li class="word-article-title"><a href="', get_permalink($post['ID']), '">', $post['post_title'], '</a></li>';
//   echo '<li class="word-excerpt">'.$content.'</li>';
//   echo '<li class="word-catag">', get_the_category();'</li>';
// }
// echo '</ul></div>';





// echo $all_articles;
?>

<!--Search Item-->
      <div id="boxcover">
          <?php //echo $all_articles;?>
      </div>
       <!--/Search Item -->

       <div class="lvn-grid1 search-pagination">
          <nav aria-label="Page navigation">
              <input id="current_page" class="current_page" type="hidden" />
              <input id="show_per_page" class="show_per_page" type="hidden" />
              <ul class="pagination" id="page_navigation">
                <!--<li>
                  <a class="btn-primary" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                  </a>
                </li>
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li>
                  <a class="btn-primary" href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                  </a>
                </li>-->
              </ul>
            </nav>
        </div>

<!-- <a class="all_articles col-md-12" href="#">
  <img class="all_articles_image" src="http://www.placehold.it/70x70">
  <span class="all_articles_date"> Aug 21, 2019</span>
  <h2 class="all_articles_title">the title</h2>
  <p class="all_articles_p">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse illum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
</a> -->


<!-- <div class="word-container article-section col-md-10">
  <ul class="word-articles">
    <li class="word-article-image"><img src="'.$all_articles_image1.'"></li>
    <li class="word-article-title"><a href="/Single/Article/'.$all_articles_url.'">'.$all_articles_text1.'</a></li>
    <li class="word-excerpt">'.$all_articles_text3.'</li>
    <li class="word-catag">'.$category.'</li>
  </ul>
</div> -->


<!-- <figure class="effect-articles">
    <img class="word-article-image" src="'<?php echo $all_articles_image1; ?>'" alt="'<?php echo $all_articles_image1; ?>'"/>
    <figcaption>
        <span class="article-date">Sep. 08, 2019</span>
        <h2><span>'.$all_articles_text1.'</span></h2>
        <p>'.$all_articles_text3.'</p>
        <a class="word-article-title" href="/Single/Article/'<?php echo $all_articles_image1; ?>'">View all</a>
    </figcaption>           
</figure> -->


<section class="lvn-wrapper bg2">
    <div id="lvn-container" class="lvn-container">
      <div class="lvn-grid1">
          <form class="input-group" id="adv-search" method="GET" action="//Views/Search_Article">                  
                  <div class="input-group-btn">
                      <div class="btn-group" role="group">
                          <!-- <button type="submit" class="btn btn-primary">Search</button> later hide via css -->
                      </div>
                  </div>
            </form>
        </div>
      <!--Search Item-->
      <div id="boxcover">
          <?php //echo $all_articles;?>
      </div>
       <!--/Search Item -->

        <div class="lvn-grid1 search-pagination">
          <nav aria-label="Page navigation">
              <input id="current_page" class="current_page" type="hidden" />
              <input id="show_per_page" class="show_per_page" type="hidden" />
              <ul class="pagination" id="page_navigation">
                <!--<li>
                  <a class="btn-primary" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                  </a>
                </li>
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li>
                  <a class="btn-primary" href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                  </a>
                </li>-->
              </ul>
            </nav>
        </div>
    </div>
</section>






            


        </div>
    </div>

<?php echo $footer;?>    
</main>




<!-- Script -->
<!-- <script src="/assets/js/jquery.js"></script>
<script src="/assets/js/jquery.mobile.custom.min.js"></script>
<script src="/assets/js/modernizr.js"></script>
<script src="/assets/js/bootstrap.min.js"></script>
<script src="/assets/js/bootstrap-select.min.js"></script>
<script src="/assets/js/swiper.min.js"></script>
<script src="/assets/js/main.js"></script>
<script src="/assets/js/clipboard.min.js"></script>
<script src="/assets/js/typed.js"></script> -->


<!-- Script -->
<?php echo $scripts; ?>


<script>
    $(function(){
        $(".clicktoplay").typed({
            strings: ["點擊觀看影片"],
            typeSpeed: 50,
            backSpeed: 0,
            backDelay: 2000,
            startDelay: 2000,
            loop: true,
            showCursor: false,
        });
    });  
</script>

<script>
    var swiper = new Swiper('.swiper-container', {
        pagination: '.swiper-pagination',
        paginationClickable: true,
        centeredSlides: true,
        nextButton: '.swiper-button-next',
        prevButton: '.swiper-button-prev',
        spaceBetween: 0,
        speed:1000,
        autoplay:5000,
        loop: true
    });
</script>
<script type="text/javascript">
var videoSrc = $("#myModal iframe").attr("src");

$('#myModal').on('show.bs.modal', function () { // on opening the modal
  // set the video to autostart
  $("#myModal iframe").attr("src", videoSrc+"?amp;autoplay=1");
});

$("#myModal").on('hidden.bs.modal', function (e) { // on closing the modal
  // stop the video
  $("#myModal iframe").attr("src", null);
});
</script>
<script>
jQuery(document).ready(function($){
    //this is used for the video effect only
    if( $('.cd-bg-video-wrapper').length > 0 ) {
        var videoWrapper = $('.cd-bg-video-wrapper'),
            mq = window.getComputedStyle(document.querySelector('.cd-bg-video-wrapper'), '::after').getPropertyValue('content').replace(/"/g, "").replace(/'/g, "");
        if( mq == 'desktop' ) {
            // we are not on a mobile device 
            var videoUrl = videoWrapper.data('video'),
                video = $('<video loop><source src="'+videoUrl+'.mp4" type="video/mp4" /><source src="'+videoUrl+'.webm" type="video/webm" /></video>');
            video.appendTo(videoWrapper);
            video.get(0).play();
        }
    }
});

//  RATING COUNTER
$('.rator-hr').each(function () {
    $(this).prop('Counter',0).animate({
        Counter: $(this).text()
    }, {
        duration: 4000,
        easing: 'swing',
        step: function (now) {
            $(this).text(Math.ceil(now));
        }
    });
});

</script>
<script type="text/javascript">var _jf = _jf || [];_jf.push(['p','50988']);_jf.push(['_setFont','sourcehansans-tc-extralight','css','.sourcehansans-tc-extralight']);_jf.push(['_setFont','sourcehansans-tc-extralight','alias','sourcehansans-tc']);_jf.push(['_setFont','sourcehansans-tc-extralight','weight',100]);_jf.push(['_setFont','sourcehansans-tc-normal','css','.sourcehansans-tc-normal']);_jf.push(['_setFont','sourcehansans-tc-normal','alias','sourcehansans-tc']);_jf.push(['_setFont','sourcehansans-tc-normal','weight',300]);_jf.push(['_setFont','sourcehansans-tc-medium','css','.sourcehansans-tc-medium']);_jf.push(['_setFont','sourcehansans-tc-medium','alias','sourcehansans-tc']);_jf.push(['_setFont','sourcehansans-tc-medium','weight',600]);(function(f,q,c,h,e,i,r,d){var k=f._jf;if(k.constructor===Object){return}var l,t=q.getElementsByTagName("html")[0],a=function(u){for(var v in k){if(k[v][0]==u){if(false===k[v][1].call(k)){break}}}},j=/\S+/g,o=/[\t\r\n\f]/g,b=/^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g,g="".trim,s=g&&!g.call("\uFEFF\xA0")?function(u){return u==null?"":g.call(u)}:function(u){return u==null?"":(u+"").replace(b,"")},m=function(y){var w,z,v,u,x=typeof y==="string"&&y;if(x){w=(y||"").match(j)||[];z=t[c]?(" "+t[c]+" ").replace(o," "):" ";if(z){u=0;while((v=w[u++])){if(z.indexOf(" "+v+" ")<0){z+=v+" "}}t[c]=s(z)}}},p=function(y){var w,z,v,u,x=arguments.length===0||typeof y==="string"&&y;if(x){w=(y||"").match(j)||[];z=t[c]?(" "+t[c]+" ").replace(o," "):"";if(z){u=0;while((v=w[u++])){while(z.indexOf(" "+v+" ")>=0){z=z.replace(" "+v+" "," ")}}t[c]=y?s(z):""}}},n;k.push(["_eventActived",function(){p(h);m(e)}]);k.push(["_eventInactived",function(){p(h);m(i)}]);k.addScript=n=function(u,A,w,C,E,B){E=E||function(){};B=B||function(){};var x=q.createElement("script"),z=q.getElementsByTagName("script")[0],v,y=false,D=function(){x.src="";x.onerror=x.onload=x.onreadystatechange=null;x.parentNode.removeChild(x);x=null;a("_eventInactived");B()};if(C){v=setTimeout(function(){D()},C)}x.type=A||"text/javascript";x.async=w;x.onload=x.onreadystatechange=function(G,F){if(!y&&(!x.readyState||/loaded|complete/.test(x.readyState))){y=true;if(C){clearTimeout(v)}x.src="";x.onerror=x.onload=x.onreadystatechange=null;x.parentNode.removeChild(x);x=null;if(!F){setTimeout(function(){E()},200)}}};x.onerror=function(H,G,F){if(C){clearTimeout(v)}D();return true};x.src=u;z.parentNode.insertBefore(x,z)};a("_eventPreload");m(h);n(r,"text/javascript",false,3000)})(this,this.document,"className","jf-loading","jf-active","jf-inactive","//d3gc6cgx8oosp4.cloudfront.net/js/stable/v/5.0.3/id/90054322147");</script>
</body>
</html>
