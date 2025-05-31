<?php 
include_once("../Model/eventDAO.php");
include_once("../Controller/cart_controller.php");
include_once("header.php");
include_once("footer.php");
?>
<!doctype html>

<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="<?php echo $case_text3;?>">
<meta name="keywords" content="<?php echo $case_text2;?>">
<meta name="author" content="lvnrich">

<?php echo $favs;?>
<?php echo $css; ?>
<title><?php echo $case_text1;?></title>
</head>

<body>
<!-- Header -->
<?php echo $header;?>
<!-- /Header END-->
<!-- BODY -->
<main class="lvn-main-content">
<?php echo $cart;?>


<section class="lvn-wrapper-alt">
<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
  <div class="panel panel-default">
  	</div>
    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body bg2">
        <div class="lvn-container">
        <div class=" lvn-catv2 lvn-grid1">
        	<?php echo $casecategories;?>
        </div>
    	</div>
      </div>
    </div>
  
</div>
</section>

<section class="lvn-wrapper" style="background: url(/Assets/images/background-test-min.jpg) repeat-x center center fixed;">
    <div class="lvn-container">
    	<div class="lvn-sec-head testimonial-head">
        	<h2 class=""><?php echo $case_text4;?></h2>
        </div>
    	<div class="lvn-grid1">
        	<!-- TEstimonial Item -->
        	<a href="#" class="testimonial-item">
            	<div class="lvn-grid1-4">
                	<div class="test-item-person">
                    	<img src="<?php echo $case_image1;?>"/>
                    </div>
                    <div class="test-item-name color2-over">
                    	<h2><?php echo $case_text5;?></h2>
                    </div>
                    <div class="test-item-age color2-over">
                    	<h4><?php echo $case_text6;?></h4>
                    </div>
                    <div class="test-item-desc color2-over">
                    	<h4><?php echo $case_text7;?></h4>
                    </div>
                </div>
                <div class="lvn-grid3-4">
                	<div class="test-body">
                    	<h2><?php echo $case_text8;?></h2>
                        <p><?php echo $case_text9;?></p>
                        <div class="lvn-grid1-2">
                        	<div class="test-before">
                            	<div class="test-badge"><?php echo $case_text10;?></div>
                            	<img src="<?php echo $case_image2;?>"/>
                            </div>
                        </div>
                        <div class="lvn-grid1-2">
                        	<div class="test-before">
                            	<div class="test-badge test-badge2"><?php echo $case_text11;?></div>
                            	<img src="<?php echo $case_image3;?>"/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="lvn-grid1">
                	<div class="lvn-grid1-4">
						<h4 class="color3"><?php echo $case_text12;?></h4>
					</div>
					<div class="lvn-grid3-4">
						<h4 class="color4"><?php echo $case_text13;?></h4>
					</div>
				</div>
            </a>
            <!-- TEstimonial Item End-->
        </div>
    </div>
</section>




<?php echo $footer;?>
</main>
<!-- /BODY END -->




<div class="lvn-overlay"></div>
<div class="lvn-overlay2"></div>
<div id="lvn-search" class="lvn-search">
    <form method="POST" action="/Search">
        <input type="search" name="search" placeholder="<?php echo $menu_text21;?>">
    </form>
</div>


<script src="/Assets/js/jquery.js"></script>
<script src="/Assets/js/jquery.mobile.custom.min.js"></script>
<script src="/Assets/js/modernizr.js"></script>
<script src="/Assets/js/bootstrap.min.js"></script>
<script src="/Assets/js/main.js"></script>
<script src="https://f.vimeocdn.com/js/froogaloop2.min.js"></script>

<script>
$(".hey").on("click", function() {

  var $button = $(this);
  var oldValue = $button.parent().find("input").val();

  if ($button.text() == "+") {
	  var newVal = parseFloat(oldValue) + 1;
	} else {
   // Don't allow decrementing below zero
    if (oldValue > 0) {
      var newVal = parseFloat(oldValue) - 1;
    } else {
      newVal = 0;
    }
  }

  $button.parent().find("input").val(newVal);

});
</script>
</body>
</html>
