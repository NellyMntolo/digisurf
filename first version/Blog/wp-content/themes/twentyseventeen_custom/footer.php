<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.2
 */

?>

		</div><!-- #content -->


    <?php
 //    include_once dirname(ABSPATH) . '/Model/dbconfig.php';
	// include_once dirname(ABSPATH) . '/lang/lang.php';
	// include_once dirname(ABSPATH) . '/Model/menuDAO.php';
	// include_once dirname(ABSPATH) . '/Views/footer.php';

	// include_once dirname(ABSPATH) . '/Model/dbconfig.php';
	// include_once dirname(ABSPATH) . '/lang/lang.php';
	// include_once dirname(ABSPATH) . '/Model/menuDAO.php';
	// include_once dirname(ABSPATH) . '/Views/header.php';
	//

	//echo $nav2;
    //echo $footer;

    // CUSTOM TABLE SELECT FOR WORDPRESS UI
  $bottom_footer = "SELECT * FROM digisurf_footer where code='".$_SESSION['mywplang']."'";
  $myfooter = $wpdb->get_row( $bottom_footer, ARRAY_A );

  $arraysocial = array();
  foreach( $wpdb->get_results("SELECT * FROM digisurf_social") as $key => $row) {
    // each column in your row will be accessible like this
    // $my_column = $row->column_name;
    $my_column1 = $row->text1;
    $my_column2 = $row->text2;
    $my_column3 = $row->image1;
    $arraysocial[] = '<li><a href="'.$my_column1.'" target="'.$my_column2.'"><i class="'.$my_column3.'"></i></a></li>';
  }
//echo implode(' ', $arraysocial);

 //$social .= '<li><a href="'.$socialtext1.'" target="'.$socialtext2.'"><i class="'.$socialimage.'"></i></a></li>';

// echo "the array = ".$_SESSION['mywplang'];

 $footer_text1 = $myfooter['text1'];
 $footer_text2 = $myfooter['text2'];
 $footer_text3 = $myfooter['text3'];
 $footer_text4 = $myfooter['text4'];
 $footer_text5 = $myfooter['text5'];
 $footer_text6 = $myfooter['text6'];
 $footer_text7 = $myfooter['text7'];
 $footer_text8 = $myfooter['text8'];
 $footer_text9 = $myfooter['text9'];
 $footer_text10 = $myfooter['text10'];
 $footer_text11 = $myfooter['text11'];


 $mywpfooter = '<!-- Contact Section -->
<div id="contact" class="text-center">
  <div class="container">
    <div class="section-title center">
      <h2>'.$footer_text4.'</h2>
      <hr>
    </div>
    <div class="col-md-7"> <!-- <div class="col-md-6"> -->
      <div class="map-canvas"></div>
    </div>
    <div class="col-md-5"> <!-- <div class="col-md-6"> -->
      
      <form name="sentMessage" id="contactForm" novalidate>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <input type="text" id="name" name="name" class="form-control" placeholder="'.$footer_text5.'" required="required">
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <input type="email" id="email" name="email" class="form-control" placeholder="'.$footer_text6.'" required="required">
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <input type="text" id="company" name="copmany" class="form-control" placeholder="'.$footer_text7.'" required="required">
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <input type="text" id="subject" name="subject" class="form-control" placeholder="'.$footer_text8.'" required="required">
              <p class="help-block text-danger"></p>
            </div>
          </div>
        </div>
        <div class="form-group">
          <textarea name="message" id="message" class="form-control" rows="4" placeholder="'.$footer_text9.'" required></textarea>
          <p class="help-block text-danger"></p>
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <img src="/custom-captcha.php" class="form-control" style="width: auto!important;" />
              <p class="help-block text-danger"></p>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <input type="text" id="code" name="code" class="form-control" placeholder="'.$footer_text10.'" required="required">
              <p class="help-block text-danger"></p>
            </div>
          </div>
        </div>


        <div id="success"></div>
        <button type="submit" class="btn btn-default btn-lg" name="contact_calex">'.$footer_text11.'</button>
      </form>

      <!--<div class="social">
        <ul>
          '.$social.'
        </ul>
      </div>-->
    </div>

    <div class="col-md-12">
      <div class="social">
        <ul>
          '.implode(' ', $arraysocial).'
        </ul>
      </div>
    </div>


  </div>
</div>
<div id="footer">
  <div class="container text-center">
    <div class="fnav">
      <p>&copy; '.date('Y').' '.$footer_text3.'</p>
      <p> '.$footer_text1.'   '.$footer_text2.'</p>
    </div>
  </div>
</div>


<!-- Back to top -->
  <div class="btn-back-to-top bg0-hov" id="myBtn">
    <span class="symbol-btn-back-to-top">
      <!-- <i class="fa fa-angle-double-up" aria-hidden="true"></i> -->
      <i class="fa fa-anchor" aria-hidden="true"></i>
    </span>
  </div>

<!-- SEARCH -->
<!--
  <div class="lvn-overlay"></div>
<div class="lvn-overlay2"></div>
<div id="lvn-search" class="nm-search">
    <form method="POST" action="/Search">
        <input type="search" name="search" placeholder="'.$menu_text6.'">
    </form>
</div> 
-->
';

  


/*
 $mywpfooter = '<!-- Contact Section -->
<div id="contact" class="text-center">
  <div class="container">
    <div class="section-title center">
      <h2>'.$myfooter['text4'].'</h2>
      <hr>
    </div>
    <div class="col-md-6">
      <div class="map-canvas"></div>
    </div>
    <div class="col-md-6">
      
      <form name="sentMessage" id="contactForm" novalidate>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <input type="text" id="name" name="name" class="form-control" placeholder="'.$myfooter['text5'].'" required="required">
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <input type="email" id="email" name="email" class="form-control" placeholder="'.$myfooter['text6'].'" required="required">
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <input type="text" id="company" name="copmany" class="form-control" placeholder="'.$myfooter['text7'].'" required="required">
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <input type="text" id="subject" name="subject" class="form-control" placeholder="'.$myfooter['text8'].'" required="required">
              <p class="help-block text-danger"></p>
            </div>
          </div>
        </div>
        <div class="form-group">
          <textarea name="message" id="message" class="form-control" rows="4" placeholder="'.$myfooter['text9'].'" required></textarea>
          <p class="help-block text-danger"></p>
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <img src="/custom-captcha.php" class="form-control" style="width: auto!important;" />
              <p class="help-block text-danger"></p>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <input type="text" id="code" name="code" class="form-control" placeholder="'.$myfooter['text10'].'" required="required">
              <p class="help-block text-danger"></p>
            </div>
          </div>
        </div>


        <div id="success"></div>
        <button type="submit" class="btn btn-default btn-lg">'.$myfooter['text11'].'</button>
      </form>
      <div class="social">
        <ul>
          <li><a href="#"><i class="fa fa-facebook"></i></a></li>
          <li><a href="#"><i class="fa fa-twitter"></i></a></li>
          <li><a href="#"><i class="fa fa-youtube"></i></a></li>
          <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
          <li><a href="#"><i class="fa fa-instagram"></i></a></li>
          <li><a href="http://www.google.com" ><i class="fa fa-linkedin"></i></a></li>
        </ul>
      </div>
    </div>
  </div>
</div>
<div id="footer">
  <div class="container text-center">
    <div class="fnav">
      <p>&copy; '.date('Y').' '.$myfooter['text3'].'</p>
      <p> '.$myfooter['text1'].'   '.$myfooter['text2'].'</p>
    </div>
  </div>
</div>


<!-- Back to top -->
  <div class="btn-back-to-top bg0-hov" id="myBtn">
    <span class="symbol-btn-back-to-top">
      <!-- <i class="fa fa-angle-double-up" aria-hidden="true"></i> -->
      <i class="fa fa-anchor" aria-hidden="true"></i>
    </span>
  </div>
';
*/
echo $mywpfooter;
?>


		


		
	</div><!-- .site-content-contain -->
</div><!-- #page -->
<?php wp_footer(); ?>

</body>
</html>
