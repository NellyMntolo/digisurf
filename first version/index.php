<?php 
include_once("Model/mainDAO.php");
//include_once("Views/header.php");
include_once("Views/footer.php");
//include_once("Views/search.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="initial-scale=1, minimum-scale=1, maximum-scale=1">
    <title>DigiSurf App</title>
    <meta name="description" content="">
    <link rel="stylesheet" type="text/css" href="Assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="Assets/css/styles-merged.css">
    <link rel="stylesheet" type="text/css" href="Assets/css/fontawesome.css">
    <link rel="stylesheet" type="text/css" href="Assets/css/normalize.css">
    <link rel="stylesheet" type="text/css" href="Assets/css/idangerous.swiper.css">
    <link rel="stylesheet" type="text/css" href="Assets/css/main.css">
    <link rel="stylesheet" type="text/css" href="Assets/css/responsive.css">  
    <!-- <link rel="stylesheet" type="text/css" href="Assets/css/nav.css"> -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat|Playfair+Display:400,400i,700,700i" rel="stylesheet">
    <script type="text/javascript" src="Assets/js/vendor/modernizr-2.7.1.min.js"></script>

    <style type="text/css">
      section {
        height: 100%;
        width: 100%;
        position: relative;
      }
    </style>
  </head>
  <body>



    <!-- Nav -->
    <main>
      <!-- <div class="cd-main__content"> -->
    <div class="top-nav">
      <div class="nav-inner"><a href="/" class="logo scroll-link"><!-- 城市修理站 --> Nothing Is Garbage</a>
        <ul>
          <li><a href="#" class="scroll-link">Nominate A New Shop</a></li>
          <li><a href="#" class="scroll-link">Events</a></li>
          <li><a href="#" class="scroll-link">Articles</a></li>
          <li><a href="#" class="scroll-link">Workshops</a></li>
          <li><a href="#" class="scroll-link right"><i class="fa fa-user"></i>  Log-in</a></li>
        </ul>
      </div>
    </div>
    <!-- Header -->
    <header>
      <div class="header-bg"></div>
      <div class="header-inner">
        <!-- <div class="logo"></div> -->
        <div class="slogan"><!-- Best Location Based System (LBS) -->目前有<span>365</span>個城市修理站<br>正在敲敲打打找回新活力 </div>
        <!-- <div class="open-video"> <a href="#">Watch how it works</a></div> -->
        <div class="head-btns">
          <div class="header-btns"> <a href="#"><!-- 尋找店家 --> Search Store</a></div>
          <div class="header-btns"> <a href="#"><!-- 探索附近 --> Location Explore</a></div>
        </div>
      </div>
      <div class="video-layer">
        <div class="close-video"><a href="#">Close</a></div>
        <div class="video-layer-inner"><iframe src="https://www.youtube.com/embed/lTTajzrSkCw" scrolling="no" frameborder="0" allowfullscreen></iframe></div>
      </div>
    </header>

    <!-- <h1 style="margin-top: 50px; color: rgba(0, 0, 0, 0.5);">用修理取代丟棄，用創意延伸物品生命</h1> -->
    <!-- <div class="content-block" style="background-color: transparent; background: linear-gradient( rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5) ), url('Assets/images/1.jpg'); background-repeat: no-repeat; background-size: cover;">
      <div class="app-icon" style="background-color: #ffff00;"><h1>最新活動</h1></div>
      <div class="info" style="">
        <div class="body-slogan">新竹市民也來做個地圖吧！</div>
      </div>
      <div class="clearfix"></div>
    </div> -->



    <!-- <section id="section2" class="cd-section2 events"> -->
      <div class="green-wrapper bg1 content-block">
        <div class="gr-news">
            <div class="gr-news-in">
              <h2>用修理取代丟棄，用創意延伸物品生命</h2>
                <p>Second sentence description here. <br> Two Sentences.</p>
            </div>
          </div>
          <div class="gr-slider">
            <div class="gr-slider-in">
                <div class="swiper-container2">
                      <div class="swiper-wrapper">

                          <a href="/Solutions/Solution/'.$url.'" class="swiper-slide">
                              <div class="solution-pre">
                                  <div class="solution-pre-content">
                                      <h3>our H3 slide</h3>
                                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                                      <div class="solution-pre-button">
                                      </div>
                                  </div>
                                  <img src="/Assets/images/blue.jpg"/>
                              </div>
                          </a>

                          <a href="/Solutions/Solution/'.$url.'" class="swiper-slide">
                              <div class="solution-pre">
                                  <div class="solution-pre-content">
                                      <h3>our H3 slide</h3>
                                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                                      <div class="solution-pre-button">
                                      </div>
                                  </div>
                                  <img src="/Assets/images/blue.jpg"/>
                              </div>
                          </a>

                          <a href="/Solutions/Solution/'.$url.'" class="swiper-slide">
                              <div class="solution-pre">
                                  <div class="solution-pre-content">
                                      <h3>our H3 slide</h3>
                                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                                      <div class="solution-pre-button">
                                      </div>
                                  </div>
                                  <img src="/Assets/images/blue.jpg"/>
                              </div>
                          </a>
                      </div>
                      <div class="swiper-pagination2"></div>
                      <div class="swiper-button-next hidden-xs"></div>
                      <div class="swiper-button-prev hidden-xs"></div>
                  </div>
            </div>
          </div>
      </div>
    <!-- </section> -->




    <!-- <div class="content-block" style="background-color: transparent; background: linear-gradient( rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5) ), url('Assets/images/2.jpg'); background-repeat: no-repeat; background-size: cover;">
      <div class="app-icon" style="background-color: #00bfff;"><h1>推薦文章</h1></div>
      <div class="info" style="">
        <div class="body-slogan">『這位師傅好年輕』修理皮包的圈圈師</div>
      </div>
      <div class="clearfix"></div>
    </div> -->

    <!-- <div class="content-block" style="background-color: transparent; background: linear-gradient( rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5) ), url('Assets/images/3.jpg'); background-repeat: no-repeat; background-size: cover;">
      <div class="app-icon" style="background-color: #00bfff;"><h1>推薦文章</h1></div>
      <div class="info" style="">
        <div class="body-slogan">修理心靈之術</div>
      </div>
      <div class="clearfix"></div>
    </div>

    <div class="content-block" style="background-color: transparent; background: linear-gradient( rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5) ), url('Assets/images/4.jpg'); background-repeat: no-repeat; background-size: cover;">
      <div class="app-icon" style="background-color: #04df8f;"><h1>課程活動</h1></div>
      <div class="info" style="">
        <div class="body-slogan"></div>
      </div>
      <div class="clearfix"></div>
    </div> -->


    <!-- About -->
    <!-- <div id="about" class="content-block">
      <div class="phones">
        <div class="phone phone-left">
          <div class="phone-bg"></div>
          <div class="shadow"></div>
          <div class="swiper-container">
            <div class="swiper-wrapper">
              <div class="swiper-slide"></div>
              <div class="swiper-slide"><img src="Assets/images/slide1.png"></div>
              <div class="swiper-slide"><img src="Assets/images/slide2.png"></div>
              <div class="swiper-slide"><img src="Assets/images/slide3.png"></div>
            </div>
          </div>
        </div>
        <div class="phone phone-right">
          <div class="phone-bg"></div>
          <div class="shadow"></div>
          <div class="swiper-container">
            <div class="swiper-wrapper">
              <div class="swiper-slide"><img src="Assets/images/slide1.png"></div>
              <div class="swiper-slide"><img src="Assets/images/slide2.png"></div>
              <div class="swiper-slide"><img src="Assets/images/slide3.png"></div>
            </div>
          </div>
        </div>
        <div class="clearfix"></div>
      </div>
      <div class="info">
        <h2>DigiSurf - discover, share, make friends, find trash cans and places</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
      </div>
      <div class="clearfix"></div>
    </div> -->
    <!-- Features -->
    <!-- <div id="features" class="content-block">
      <h2>Amazing Features</h2>
      <div class="feat">
        <h3>Discover</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</p>
      </div>
      <div class="feat">
        <h3>Share</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</p>
      </div>
      <div class="feat">
        <h3>Connect</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</p>
      </div>
      <div class="feat">
        <h3>Explore</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</p>
      </div>
      <div class="feat">
        <h3>Save</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</p>
      </div>
      <div class="feat">
        <h3>Make Photo</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</p>
      </div>
      <div class="clearfix"></div>
    </div> -->
  </main>
    <!-- Reviews -->
    <!-- <div id="reviews" class="content-block">
      <div class="reviews-inner">
        <div class="review">
          <p class="stars"><span class="star"></span><span class="star"></span><span class="star"></span><span class="star"></span><span class="star"></span></p>
          <p class="quote">“Best app we’ve ever seen with such amazing features and functionality.”</p>
          <p class="author">- John Doe, AppReview</p>
        </div>
        <div class="review">
          <p class="stars"><span class="star"></span><span class="star"></span><span class="star"></span><span class="star"></span><span class="star"></span></p>
          <p class="quote">“All i can say is Wow! And this just after 5 minutest of using DigiSurf.”</p>
          <p class="author">- Joahn Doe, AppInsider</p>
        </div>
        <div class="review">
          <p class="stars"><span class="star"></span><span class="star"></span><span class="star"></span><span class="star"></span><span class="star"></span></p>
          <p class="quote">“All i can say is Wow! And this just after 5 minutest of using DigiSurf.”</p>
          <p class="author">- Joahn Doe, AppInsider</p>
        </div>
        <div class="review">
          <p class="stars"><span class="star"></span><span class="star"></span><span class="star"></span><span class="star"></span><span class="star"></span></p>
          <p class="quote">“Best app we’ve ever seen with such amazing features and functionality.”</p>
          <p class="author">- John Doe, AppReview</p>
        </div>
        <div class="clearfix"></div>
      </div>
    </div> -->


<!-- NAVIGATION -->
  <!-- <a href="#cd-nav" class="cd-nav-trigger">Menu 
    <span class="cd-nav-icon"></span>

    <svg x="0px" y="0px" width="54px" height="54px" viewBox="0 0 54 54">
      <circle fill="transparent" stroke="#ffffff" stroke-width="1" cx="27" cy="27" r="25" stroke-dasharray="157 157" stroke-dashoffset="157"></circle>
    </svg>
  </a>
  
  <div id="cd-nav" class="cd-nav">
    <div class="cd-navigation-wrapper">
      <div class="cd-half-block">
        <h2><img src="/Assets/images/digi-logo-white.png"></h2>

        <div class="grid">
            <div class="col-6-md">
              <nav>
                <ul class="nav-list">
                  <li><a href="/About" class="cd-nav__link cd-nav__link-selected">關於我們</a></li>
                  <li><a href="/Common_Problem" class="cd-nav__link">常見問題</a></li>
                  <li><a href="/Focus_Exposure" class="cd-nav__link">焦點曝光</a></li>
                  <li><a href="/Contact" class="cd-nav__link">合作提案</a></li>
                  <li><a href="/Join_Us" class="cd-nav__link">參與我們</a></li>
                  <li><a href="/Privacy_Policy" class="cd-nav__link">隱私權政策</a></li>
                  <li><a href="/Terms_And_Services" class="cd-nav__link">服務與條款</a></li>
                  <li><a href="#0" class="cd-nav__link lvn-search-trigger">Search</a></li>
                </ul>
              </nav>
            </div>
          </div>

      </div>
      
      <div class="cd-half-block">
        <address>
          <ul class="cd-contact-info">
            <li><a href="mailto:nothingisgarbage@email.com">nothingisgarbage@email.com</a></li>
            <li>+886-27-123-456</li>
            <li>
              <span>Heping East Rd., No. 200</span>
              <span>106</span>
              <span>Taipei City, Taiwan</span>
            </li>
          </ul>
        </address>
      </div>

    </div>
  </div> -->
<!-- NAVIGATION -->


<!-- <div class="lvn-overlay"></div>
<div class="lvn-overlay2"></div>
<div id="lvn-search" class="lvn-search">
  <a href="#" class="search-close lvn-search-trigger"></a>
    <form method="POST" action="/Search">
        <input type="search" name="search" placeholder="<?php //echo $menu_text21;?>">
    </form>
</div> -->


    <!-- Footer -->
    <?php echo $footer; ?>
    <!-- <footer id="contacts">
      <div class="social">
        <p>Say Hello to DigiSurf:</p>
        <p> <a href="#">Facebook</a><a href="#">Instagram</a><a href="#">Youtube</a><a href="#">Google+</a><a href="#">Twitter</a><a href="mailto:nelly@gmail.com?subject=Hello">E-mail</a></p>
      </div>
      <div class="copy">© <?php //echo date('Y');?> DigiSurf Inc. All Rights Reserved.</div>
    </footer> -->
    <script type="text/javascript" src="Assets/js/vendor/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="Assets/js/plugins.js"></script>
    <script type="text/javascript" src="Assets/js/util.js"></script>
    <script type="text/javascript" src="Assets/js/main.js"></script>
  </body>
</html>