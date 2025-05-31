<?php 
include_once("Model/mainDAO.php");
include_once("Views/header.php");
include_once("Views/footer.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php  echo $index_text3;?>">
    <meta name="keywords" content="<?php  echo $index_text2;?>">
    <meta name="author" content="Nelly">
    <?php echo $favs;?>
    <?php echo $css; ?>
    <title><?php echo $index_text1;?></title>
</head>

<body class="animsition">
<?php echo $google_tags_analytics;?>
<?php echo $header;?>
<main>
    <div class="main-container">
        <div class="container cf">
            <div id="home-slider-1">
                <div class="swiper-container animation-element slide-bottom">
                    <div class="swiper-wrapper">
                        <?php echo $first_slides;?>                  
                    </div>
                    <!-- Add Arrows -->
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>



<section class="digisurf-wrapper bg3 ">
<img src="/assets/images/img-bg-part-a.png" class="img_bg_part_a">    
    <div class="digisurf-container">
        <div class="digisurf-grid1 digisurf-sec-head">
            <h1 class="text-center"> Events</h1>
            <p class="text-center">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p>
        </div>
        <div class="digisurf-grid1 home">
            <?php echo $index_events_all; ?>
        </div>
    </div>
</section>

<section class="digisurf-wrapper bg3 ">
    <div id="home-slider-2" class="hidden-xs">
        <div class="swiper-container animation-element slide-bottom">
            <div class="swiper-wrapper">
                <?php //echo $second_slides;?> 
                <?php echo $index_allworkshops; ?>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
    <div id="home-slider-mob" class="visible-xs">
        <div class="swiper-container animation-element slide-bottom">
            <div class="swiper-wrapper">
                <!-- <div class="swiper-slide">
                    <div class="info">
                        <h1>Workshop Title Here</h1>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua.</p>
                        <a href="#" class="btn">Join Now</a>
                    </div>
                    <div class="background">
                        <img src="/assets/images/img-bg-part-a.png" alt="">
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="info">
                        <h1>Workshop Title Here</h1>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua.</p>
                        <a href="#" class="btn">Join Now</a>
                    </div>
                    <div class="background">
                        <img src="/assets/images/img-bg-part-a.png" alt="">
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="info">
                        <h1>Workshop Title Here</h1>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua.</p>
                        <a href="#" class="btn">Join Now</a>
                    </div>
                    <div class="background">
                        <img src="/assets/images/img-bg-part-a.png" alt="">
                    </div>
                </div> -->
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
</section>

<section class="digisurf-wrapper bg3 ">
    <div class="articles-wrap">
        <?php echo $index_articles_all;?>
    </div>
</section>

<section class="digisurf-wrapper bg3 ">
    <div class="digisurf-container">
        <div class="digisurf-grid1 digisurf-sec-head">
            <h1 class="text-center"> Fixing Knowledge</h1>
            <p class="text-center">Autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur.</p>
        </div>
        <div class="digisurf-grid1 home">
            <a href="/" class="digisurf-grid1-3">
                <div class="event-item">
                    <div class="event-item-in">
                        <div class="event-item-top">
                            <iframe id="ytplayer" type="text/html" width="100%" height="100%" src="https://www.youtube.com/embed/zIKxshOqlAc?autoplay=0&showinfo=0&controls=0&rel=0" frameborder="0" allowfullscreen></iframe>
                        </div>
                        <div class="event-item-bottom">
                            <div class="">
                                <p>This is a test of the description to see what happens when we try something different</p>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            <a href="/" class="digisurf-grid1-3">
                <div class="event-item">
                    <div class="event-item-in">
                        <div class="event-item-top">
                            <iframe id="ytplayer" type="text/html" width="100%" height="100%" src="https://www.youtube.com/embed/zIKxshOqlAc?autoplay=0&showinfo=0&controls=0&rel=0" frameborder="0" allowfullscreen></iframe>
                        </div>
                        <div class="event-item-bottom">
                            <div class="">
                                <p>This is a test of the description to see what happens when we try something different This is a test of the description to see what happens when we try something different</p>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            <a href="/" class="digisurf-grid1-3">
                <div class="event-item">
                    <div class="event-item-in">
                        <div class="event-item-top">
                            <iframe id="ytplayer" type="text/html" width="100%" height="100%" src="https://www.youtube.com/embed/zIKxshOqlAc?autoplay=0&showinfo=0&controls=0&rel=0" frameborder="0" allowfullscreen></iframe>
                        </div>
                        <div class="event-item-bottom">
                            <div class="">
                                <p>This is a test of the description to see what happens when we try something different This is a test of the description to see what happens when we try something different</p>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
</section>






<!-- --------------------------------------------------------------------------------------------------------------- -->
<!-- <section class="digisurf-wrapper bg3 ">
    <div class="digisurf-container">
        <div class="digisurf-grid1 digisurf-sec-head">
            <h1 class="text-center"> Fixing Knowledge</h1>
            <p>Autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur</p>
        </div>
        <div class="digisurf-grid1 home">
            <a href="/" class="digisurf-grid1-3">
                <div class="event-item">
                    <div class="event-item-in">
                        <div class="event-item-top">
                            <iframe id="ytplayer" type="text/html" width="100%" height="100%" src="https://www.youtube.com/embed/zIKxshOqlAc?autoplay=0&showinfo=0&controls=0&rel=0" frameborder="0" allowfullscreen></iframe>
                        </div>
                        <div class="event-item-bottom">
                            <div class="">
                                <p>This is a test of the description to see what happens when we try something different</p>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            <a href="/" class="digisurf-grid1-3">
                <div class="event-item">
                    <div class="event-item-in">
                        <div class="event-item-top">
                            <iframe id="ytplayer" type="text/html" width="100%" height="100%" src="https://www.youtube.com/embed/zIKxshOqlAc?autoplay=0&showinfo=0&controls=0&rel=0" frameborder="0" allowfullscreen></iframe>
                        </div>
                        <div class="event-item-bottom">
                            <div class="">
                                <p>This is a test of the description to see what happens when we try something different This is a test of the description to see what happens when we try something different</p>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            <a href="/" class="digisurf-grid1-3">
                <div class="event-item">
                    <div class="event-item-in">
                        <div class="event-item-top">
                            <iframe id="ytplayer" type="text/html" width="100%" height="100%" src="https://www.youtube.com/embed/zIKxshOqlAc?autoplay=0&showinfo=0&controls=0&rel=0" frameborder="0" allowfullscreen></iframe>
                        </div>
                        <div class="event-item-bottom">
                            <div class="">
                                <p>This is a test of the description to see what happens when we try something different This is a test of the description to see what happens when we try something different</p>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
</section> -->


<section class="digisurf-wrapper bg3 ">
    <div class="col-md-12">
            <div class="row">
                <h4 class="Follow-Nothing-is-Ga text-center">Follow <span class="text-style-1">Nothing is Garbage</span> by Newsletter</h4>
            </div>
            <div class="row">
                <form id="newsletter-form" class="newsletter-form" method="post">

                    <div class="form-field newsletter-security">
                        <input type="text" id="newletter_email" name="newletter_email" class="form-control newsletter-input" placeholder="請輸入您的 Email">
                    </div> 
                  <div class="row">
                    <div class="col-md-6" style="padding-left: 0px;">
                      <div class="form-group">
                        <img src="/custom-captcha.php" class="form-control" style="width: auto!important; border: 0px;" />
                        <p class="help-block text-danger"></p>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <input type="text" id="newsletter_code" name="newsletter_code" class="form-control newsletter-input" placeholder="Enter Code" required="required">
                        <p class="help-block text-danger"></p>
                      </div>
                    </div>
                  </div>

                  <div class="form-field">
                    <button type="submit" class="btn btn-subscribe" id="newsletter_submit" name="newsletter_submit" data-toggle="modal" data-target="#mySubscribe" value="Subscribe Now">Subscribe Now</button>
                  </div>              
                </form>
            </div>
        </div>
</section>

<!-- --------------------------------------------------------------------------------------------------------------- -->

    </div>
</div>

<?php echo $footer;?>
</main>

<!-- Script -->
<?php echo $scripts; ?>

<!-- home slider 1 -->
<script>
    var swiper = new Swiper('#home-slider-1 .swiper-container', {
        pagination: '.swiper-pagination',
        nextButton: '.swiper-button-next',
        prevButton: '.swiper-button-prev',
        
        slidesPerView: 1,
        paginationClickable: true,
		speed: 1000,
        autoplay:5000,
		loop: true,
        effect:'slide'
    });
</script>
<!-- home slider 2 -->
<script>
    var swiper = new Swiper('#home-slider-2 .swiper-container', {
        pagination: '.swiper-pagination',
        slidesPerView: 1,
        paginationClickable: true,
        // direction: 'vertical',
		speed: 1000,
		autoplay:5000,
		loop: true,
		// effect:'fade'
        effect:'slide'
    });
</script>
<!-- home slider 2 -->
<script>
    var swiper = new Swiper('#home-slider-mob .swiper-container', {
        paginationClickable: true,
		speed: 1000,
		autoplay:5000,
		loop: true,
		effect:'slide'
    });
</script>
<script>
    var galleryTop = new Swiper('.gallery-top', {
        spaceBetween: 10,
		speed: 1000
    });
    var galleryThumbs = new Swiper('.gallery-thumbs', {
        spaceBetween: 0,
        centeredSlides: true,
        slidesPerView:2,
        touchRatio: 0.2,
        slideToClickedSlide: true,
		speed: 1000
    });
    galleryTop.params.control = galleryThumbs;
    galleryThumbs.params.control = galleryTop;
















    //  sign up
// $('#SignUpForm').submit(function(sub) {
//   sub.preventDefault();
//   var username = $('#SignUpUser').val();
//   var password = $('#SignUpPass').val();
//   var repeat_password = $('#SignUpPass_confirm').val();
//   if(password != '' && username != '' && repeat_password == password){
//   $.ajax({
//   type: "POST",
//   url:"/SignUp",
//   data: "password=" + repeat_password + '&username=' + username,
//   success: function (response) {
//     console.log(response);
//   if(response == 'Y') {
//   $('#SignUpForm input').val('');
//   $('#mySignUp').modal('hide');
//   console.log('Y');
//   location.reload();
//     } else if (response == 'N'){
//         $('.login-error').html('Please Feel Out<br>All The info.');
//         $('#mySignUpError').modal('show');
//         console.log('N');
//     } else if (response == 'L'){
//         $('.login-error').html('Passwords, <br> or security code Don\'t match');
//         $('#mySignUpError').modal('show');
//         console.log('L');
//     } else if (response == 'D'){
//         $('.login-error').html('duplicate <br> account');
//         $('#mySignUpError').modal('show');
//         console.log('D');
//     }
//   },            
//   error: function (jXHR, textStatus, errorThrown) {
//       alert(errorThrown); 
//     }            
// });
// } else {
//   $('.login-error').html('Passwords, <br> or security code Don\'t match');
//   $('#mySignUpError').modal('show'); 
// }
// });
//  sign up




    
</script>
<script type="text/javascript">var _jf = _jf || [];_jf.push(['p','50988']);_jf.push(['_setFont','sourcehansans-tc-extralight','css','.sourcehansans-tc-extralight']);_jf.push(['_setFont','sourcehansans-tc-extralight','alias','sourcehansans-tc']);_jf.push(['_setFont','sourcehansans-tc-extralight','weight',100]);_jf.push(['_setFont','sourcehansans-tc-normal','css','.sourcehansans-tc-normal']);_jf.push(['_setFont','sourcehansans-tc-normal','alias','sourcehansans-tc']);_jf.push(['_setFont','sourcehansans-tc-normal','weight',300]);_jf.push(['_setFont','sourcehansans-tc-medium','css','.sourcehansans-tc-medium']);_jf.push(['_setFont','sourcehansans-tc-medium','alias','sourcehansans-tc']);_jf.push(['_setFont','sourcehansans-tc-medium','weight',600]);(function(f,q,c,h,e,i,r,d){var k=f._jf;if(k.constructor===Object){return}var l,t=q.getElementsByTagName("html")[0],a=function(u){for(var v in k){if(k[v][0]==u){if(false===k[v][1].call(k)){break}}}},j=/\S+/g,o=/[\t\r\n\f]/g,b=/^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g,g="".trim,s=g&&!g.call("\uFEFF\xA0")?function(u){return u==null?"":g.call(u)}:function(u){return u==null?"":(u+"").replace(b,"")},m=function(y){var w,z,v,u,x=typeof y==="string"&&y;if(x){w=(y||"").match(j)||[];z=t[c]?(" "+t[c]+" ").replace(o," "):" ";if(z){u=0;while((v=w[u++])){if(z.indexOf(" "+v+" ")<0){z+=v+" "}}t[c]=s(z)}}},p=function(y){var w,z,v,u,x=arguments.length===0||typeof y==="string"&&y;if(x){w=(y||"").match(j)||[];z=t[c]?(" "+t[c]+" ").replace(o," "):"";if(z){u=0;while((v=w[u++])){while(z.indexOf(" "+v+" ")>=0){z=z.replace(" "+v+" "," ")}}t[c]=y?s(z):""}}},n;k.push(["_eventActived",function(){p(h);m(e)}]);k.push(["_eventInactived",function(){p(h);m(i)}]);k.addScript=n=function(u,A,w,C,E,B){E=E||function(){};B=B||function(){};var x=q.createElement("script"),z=q.getElementsByTagName("script")[0],v,y=false,D=function(){x.src="";x.onerror=x.onload=x.onreadystatechange=null;x.parentNode.removeChild(x);x=null;a("_eventInactived");B()};if(C){v=setTimeout(function(){D()},C)}x.type=A||"text/javascript";x.async=w;x.onload=x.onreadystatechange=function(G,F){if(!y&&(!x.readyState||/loaded|complete/.test(x.readyState))){y=true;if(C){clearTimeout(v)}x.src="";x.onerror=x.onload=x.onreadystatechange=null;x.parentNode.removeChild(x);x=null;if(!F){setTimeout(function(){E()},200)}}};x.onerror=function(H,G,F){if(C){clearTimeout(v)}D();return true};x.src=u;z.parentNode.insertBefore(x,z)};a("_eventPreload");m(h);n(r,"text/javascript",false,3000)})(this,this.document,"className","jf-loading","jf-active","jf-inactive","//d3gc6cgx8oosp4.cloudfront.net/js/stable/v/5.0.3/id/90054322147");</script>



</body>
</html>