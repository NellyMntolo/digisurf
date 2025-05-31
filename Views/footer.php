<?php
$footer = '<!--<footer class="digisurf-footer digisurf-bg" style="background: blue; background-image: url("../images/img-bg-part-b.png");">-->
<footer class="digisurf-footer digisurf-bg">
    <div class="container">
      <div class="row">
        <div class="col-md-4 col-xs-6">
          <div class="digisurf-footer-widget">
            <!-- <h4 class="heading"><a href="/">城市修理站</a></h4> -->
            <h4 class="heading">'.$footer_text1.'</h4>
            <ul class="footer-links">
              <li><a href="/About" '.theUrl('/About').' class="heading">'.$footer_text6.'</a></li>
              <li><a href="/FAQ" '.theUrl('/FAQ').' class="heading">'.$footer_text7.'</a></li>
              <!--<li><a href="/Articles" '.theUrl('/Articles').' class="heading">'.$footer_text8.'</a></li>-->
              <li><a href="/Cooperation" '.theUrl('/Cooperation').' class="heading">'.$footer_text9.'</a></li>
              <li><a href="/JoinUs" '.theUrl('/JoinUs').' class="heading">'.$footer_text10.'</a></li>
              <li><a href="/Terms" '.theUrl('/Terms').' class="heading">'.$footer_text11.'</a></li>
              <li><a href="/Terms" '.theUrl('/Terms').' class="heading">'.$footer_text12.'</a></li>
            </ul>
          </div> 
        </div>
        <div class="col-md-2 col-xs-6">
          <div class="digisurf-footer-widget digisurf-link-wrap">
            <h4 class="heading">'.$footer_text2.'</h4>
            <ul class="footer-links">
              <li><a href="/Stores" '.theUrl('/Stores').' class="heading">'.$footer_text13.'</a></li>
              <li><a href="/Videos" '.theUrl('/Videos').' class="heading">'.$footer_text14.'</a></li>
              <!-- <li><a href="/Nominate_New_Shop" '.theUrl('/Nominate_New_Shop').' class="heading">Nominate Shop</a></li> -->
            </ul>
          </div>
        </div>
        <!-- <div class="col-md-6">
          <div class="digisurf-footer-widget">
            <h4 class="heading">訂閱電子報</h4>
            <form action="#">
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
                    <input type="text" id="code" name="code" class="form-control" placeholder="Enter Code" required="required">
                    <p class="help-block text-danger"></p>
                  </div>
                </div>
              </div>

              <div class="form-field">
                <input type="text" class="form-control" placeholder="請輸入您的 Email">
                <button class="btn btn-subscribe" name="contact_digisurf">訂閱</button>
              </div>              
            </form>
          </div>
        </div> -->
      </div>
      <div class="row copyright">
      <hr>
        <div class="col-md-12">
          <div class="footer-logo"><a href="/"><img src="/assets/images/nis_logo_140x32.png"><!--Nothing Is Garbage--></a></div>

          <ul class="digisurf-social">
            <li class="icons facebook"><a href="https://www.facebook.com/nothingisgarbage" target="_blank"><i class="fab fa-facebook-square"></i></a></li>
            <li class="icons youtube"><a href="https://www.youtube.com/channel/UCMoWRuT7UxE27s3qs-TwAEw" target="_blank"><i class="fab fa-youtube-square"></i></a></li>              
            <li class="icons twitter"><a href="https://twitter.com/shpvhcnz5rDIbRl" target="_blank"><i class="fab fa-twitter"></i></a></li>
            <li class="icons instagram"><a href="https://www.instagram.com/nothingisgarbage" target="_blank"><i class="fab fa-instagram"></i></a></li>
          </ul>


          <div class="digisurf-footer-widget">
            <!-- <p>&copy; '.date('Y').' NothingIsGarbage. All Rights Reserved.<br> Powered by Digisurf Co.,Ltd.</p> -->
            <p>&copy; '.date('Y').' '.$footer_text3.'</p>
          </div>
          
        </div>
      </div>
    </div>




<!-- <section class=container>
  <div class="row">
    <div class="col-xs-12 text-center">
      <h1> Click the BUTTON in the bottom of the Pen</h1>
    </div>
  </div>
</section> -->



<section id="fixed-form-container">
<form id="quick_message_form" method="post">
  <div class="button">Quick Message</div>
    <div class="body">
        <div class="form-group"> 
            <p> Our agents are not available right now. Please leave a message and we\'ll get back to you.</p>
        </div>
        <div class="form-group">
            <input name="quick_message_name" type="text" class="form-control" id="quick_message_name" placeholder="Your Name">
        </div>
        <div class="form-group">
            <input name="quick_message_email" type="email" class="form-control" id="quick_message_email" placeholder="Email">
        </div>
        <div class="form-group">
            <input name="quick_message_subject" type="text" class="form-control" id="quick_message_subject" placeholder="Subject">
        </div>
        <div class="form-group">
            <textarea rows="3" name="quick_message" class="form-control" id="quick_message" placeholder="Message"></textarea>
        </div>
            <button name="quick_message_submit" id="quick_message_submit" type="submit" class="btn btn-default message_button" value="Leave a Message">Leave a Message</button>
    </div>
    </form>
</section>



  </footer>';
?>
