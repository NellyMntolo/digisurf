<?php

//$_SESSION['text'] = "Audio On";
//$_SESSION['play'] = "autoplay loop";
if (!isset($_SESSION['text']) || !isset($_SESSION['play'])) {
        $_SESSION['text'] = "Audio On";
        $_SESSION['play'] = "autoplay loop";
   }
$header ='<header role="banner" class="nellyboot-header">
    <div class="container">
        <a href="/" class="nellyboot-logo logo color-text-flow">'.$menu_text1.'</a>
        
        <a href="#" class="nellyboot-burger-menu visible-xs" ><i>Menu</i></a>
        <div class="mobile-menu-overlay"></div>

        <nav role="navigation" class="nellyboot-nav hidden-xs">
          <ul class="nellyboot-main-nav">
            <!--<li '.theUrl('/').'><a href="/" class="logo color-text-flow">Home</a></li>-->
            <li><a href="/About" '.theUrl('/About').'>'.$menu_text2.'</a></li>
            <li><a href="/Case_Studies" '.theUrl('/Case_Studies').'>'.$menu_text3.'</a>
            <!--<ul>
              <li>catags</li>
            </ul>-->
            </li>
            <li><a href="/Capabilities" '.theUrl('/Capabilities').'>'.$menu_text4.'</a></li>
            <!-- <li><a href="/Downloads" '.theUrl('/Downloads').'>Downloads</a></li> -->
            <li><a href="/Contact" '.theUrl('/Contact').'>'.$menu_text5.'</a></li>
          </ul>
          <ul class="nellyboot-right-nav hidden-xs">
           <!-- <li><a href="https://twitter.com/nellymntolo" target="_blank"><i class="icon-twitter"></i></a></li>
            <li><a href="https://www.facebook.com/nelly.mntolo" target="_blank"><i class="icon-facebook2"></i></a></li> -->


            <form id="music-form" action="/Music"><input type="hidden" id="music" name="music" value="'.$_SESSION['text'].'"></form>
            
              <a href="" id="mute"><button class="btn" style="margin-left: -50px; background: transparent;">
                    <div id="bars" title="Play Music">
                        <div class="roll"></div>
                        <div class="roll"></div>
                        <div class="roll"></div>
                        <div class="roll"></div>
                        <div class="roll"></div>
                        <div class="roll"></div>
                    </div>
                    <span class="pushme" style="opacity: 0;">'.$_SESSION['text'].'</span></button>
                </a>
                
                <audio id="background_audio" '.$_SESSION['play'].'>
                   <source src="'.$music.'" /> 
                </audio>
<!--
                <button class="nm-search-trigger">
                  <span><img src="/Assets/img/nelly-1.svg"/></span>
              </button> 
-->
          <!-- <li class="language-selector hidden-item">
                  <ul class="nav navbar-nav">
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown">'.$lang_result.'<span class="caret"></span></a>
                      <ul class="dropdown-menu" role="menu">
                        '.$active_language.'
                      </ul>
                    </li>
                  </ul>       
          </li> -->

          </ul>

          
<div class="extra-text visible-xs"> 
            <!-- <a href="#" class="nellyboot-burger-menu"><i>Menu</i></a>
                        <h5>Address</h5>
            <p>198 West 21th Street, Suite 721 New York NY 10016</p>
            <h5>Connect</h5>
            <ul class="social-buttons">
              <li><a href="https://twitter.com/nellymntolo" target="_blank"><i class="icon-twitter"></i></a></li>
              <li><a href="https://www.facebook.com/nelly.mntolo" target="_blank"><i class="icon-facebook2"></i></a></li>
              <li><a href="#"><i class="icon-instagram2"></i></a></li>


            </ul> -->
            
            <!--
            <ul class="nav navbar-nav">
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">'.$lang_result.'<span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                  '.$active_language.'
                </ul>
              </li>
            </ul>  -->

          </div> 
        </nav>
    </div>
  </header>';
?>