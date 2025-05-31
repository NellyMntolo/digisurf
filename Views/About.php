<?php 
include '../Model/aboutDAO.php';
include_once("header.php");
include_once("footer.php");
?>
<!doctype html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php  echo $about_text3;?>">
    <meta name="keywords" content="<?php  echo $about_text2;?>">
    <meta name="author" content="Nelly">

    <?php echo $favs;?>
    <?php echo $css; ?>
    <title><?php  echo $about_text1;?></title>

</head>

<body class="animsition">

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
        <!-- <iframe type="text/html" width="100%" height="100%" src="<?php echo $about_video_url;?>?autoplay=0&showinfo=0&controls=0&rel=0" frameborder="0" allowfullscreen></iframe> -->
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
                      <h2>About Us</h2>                 
                    </div>
                  </div>
                </div>
            </section>


            <section class="about-section">
                <div class="container">
                  <div class="row">
                    <div class="col-md-6">
                      <h2>About Us</h2>                      
                    </div>
                    <div class="col-md-6">
                      <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p><br><br>
                      <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p><br><br>
                      <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p><br><br>
                      <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
                    </div>
                  </div>
                </div>
            </section>

            <section class="about-section-rator">
                <div class="container">
                    <div class="row ">
                        <div class="col-md-12 rator-image" style="background-image: url('/assets/images/2.jpg');"></div>
                    </div>
                    <div class="row ratings">
                        <div class="col-md-3">
                            <!-- <h2 class="rator-hr">100, 318</h2> -->
                            <h2 class="rator-hr">100000</h2>
                            <span class="rator-title">Visitors</span>
                            <!-- <span class="rator-number">1</span> -->
                        </div>
                        <div class="col-md-3">
                            <h2 class="rator-hr">39</h2>
                            <span class="rator-title">Workshops</span>
                            <!-- <span class="rator-number">2</span> -->
                        </div>
                        <div class="col-md-3">
                            <h2 class="rator-hr">+500</h2>
                            <span class="rator-title">Shops</span>
                            <!-- <span class="rator-number">3</span> -->
                        </div>
                        <div class="col-md-3">
                            <!-- <h2 class="rator-hr">100, 318</h2> -->
                            <h2 class="rator-hr">100000</h2>
                            <span class="rator-title">Repaired</span>
                            <!-- <span class="rator-number">4</span> -->
                        </div>
                    </div>
                </div>
            </section>


            <section class="about-section">
                <div class="container">
                  <div class="row">
                    <div class="col-md-6">
                      <h2>Our Value</h2>                      
                    </div>
                    <div class="col-md-6">
                        <h3>Every Individual Deserves a Website</h3>
                          <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p><br><br>
                        <h3>Our Customers Mean the World</h3>
                          <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p><br><br>
                          <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p><br><br>
                        <h3>In-House Made</h3>
                          <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
                    </div>
                  </div>
                </div>
            </section>


            <!-- <section class="about-section-team">
                <div class="container">
                    <div class="row ">
                        <div class="col-md-3 team-members">
                            Members
                        </div>
                    </div>
                    <div class="row team">
                        <div class="col-md-3">
                            <img class="team-image" src="/assets/images/avatar3.png">
                            <span class="team-title">Jo, Lin</span>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                            cillum dolore eu fugiat nulla pariatur.</p>
                        </div>
                        <div class="col-md-3">
                            <img class="team-image" src="/assets/images/avatar3.png">
                            <span class="team-title">Monica</span>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                            cillum dolore eu fugiat nulla pariatur.</p>
                        </div>
                        <div class="col-md-3">
                            <img class="team-image" src="/assets/images/avatar3.png">
                            <span class="team-title">Shops</span>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                            cillum dolore eu fugiat nulla pariatur.</p>
                        </div>
                        <div class="col-md-3">
                            <img class="team-image" src="/assets/images/avatar3.png">
                            <span class="team-title">Repaired</span>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                            cillum dolore eu fugiat nulla pariatur.</p>
                        </div>
                    </div>
                </div>
            </section> -->
          
        </div>
    </div>

<?php echo $footer;?>    
</main>



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
			var	videoUrl = videoWrapper.data('video'),
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
