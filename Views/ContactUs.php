<?php 
include_once("../Model/contactDAO.php");
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
<meta name="description" content="<?php echo $contact_text3;?>">
<meta name="keywords" content="<?php echo $contact_text2;?>">
<meta name="author" content="lvnrich">

<?php echo $favs;?>
<?php echo $css; ?>
<title><?php echo $contact_text1;?></title>
</head>

<body>

<!-- Header -->
<?php echo $header;?>

<!-- /Header END-->
<!-- BODY -->
<main class="lvn-main-content">
 <!-- THIS IS FOR THE CART ADD IT HERE -->
<?php echo $cart;?>
<!-- /THIS IS FOR THE CART ADD IT HERE END --> 

<section class="lvn-wrapper" style="background: url(/Assets/images/background-test-min.jpg) repeat-x center center fixed;">
	<div class="lvn-container ">
    	<form class="login-container" action="/Contact" method="POST">
            <h3><?php echo $contact_text4;?></h3>
            <div class="form-group">
            	<input type="text" class="form-control alt" name="first_name" required placeholder="<?php echo $contact_text5;?>">
            </div>
            <div class="form-group">
            	<input type="text" class="form-control alt" name="last_name" required placeholder="<?php echo $contact_text6;?>">
            </div>
            <div class="form-group">
            	<input type="email" class="form-control alt" name="email" required placeholder="<?php echo $contact_text7;?>">
            </div>
            <div class="form-group">
                <input type="text" class="form-control alt" name="subject" required placeholder="<?php echo $contact_text8;?>">
            </div>
            <div class="form-group">
            	<textarea type="text" class="form-control alt" name="message" required placeholder="<?php echo $contact_text9;?>"></textarea>
            </div>
            <div class="form-group">
            	<button type="submit" class="btn btn-primary btn-block">Send</button>
            </div>
            <div class="form-group">
                <p><?php echo $contact_text10;?></p>
            </div>
            <div class="form-group">
            	<a href="/SignUp" class="btn btn-info btn-block">Sign Up</a>
            </div>
        </form>
    </div>
</section>
<section class="lvn-wrapper-alt">
	<div class="login-bottom">
		<img src="<?php echo $contact_image1;?>"/>
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
