<?php 
include_once("../Model/log-inDAO.php");
include_once("../Controller/cart_controller.php");
include_once("../Model/resetDAO.php");
include_once("header.php");
include_once("footer.php");

?>
<!doctype html>

<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="digisurf">
<meta name="keywords" content="digisurf">
<meta name="author" content="Nelly">

<?php echo $favs;?>
<?php echo $css; ?>
<title>digisurf</title>
</head>

<body>
<!-- Header -->
<?php echo $header;?>

<!-- /Header END-->
<!-- BODY -->
<main class="lvn-main-content">
<?php echo $cart;?>

<section class="lvn-wrapper" style="background: url(/themes/greentheme/views/site/Assets/images/background-test-min.jpg) repeat-x center center fixed;">
	<div class="lvn-container ">
    	<form id="resetForm" class="forgot-container" method="POST" action="/Resetting">

    	<?php echo $content;?>
        </form>
    </div>
</section>
<section class="lvn-wrapper-alt">
	<div class="login-bottom">
		<img src="<?php echo $log_in_image1;?>"/>
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

<script src="/themes/greentheme/views/site/Assets/js/jquery.js"></script>
<script src="/themes/greentheme/views/site/Assets/js/jquery.mobile.custom.min.js"></script>
<script src="/themes/greentheme/views/site/Assets/js/modernizr.js"></script>
<script src="/themes/greentheme/views/site/Assets/js/bootstrap.min.js"></script>
<script src="/themes/greentheme/views/site/Assets/js/main.js"></script>
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

$('#resetForm').submit(function () {
	// body...
	if ($('#pass2').val() != $('#pass1').val()) {
		alert("Passwords did not match!")
		return false;
	}
	if ($('#pass2').val() == '' ||  $('#pass1').val() == '') {
		alert("Please type your new password")
		return false;
	}
});
</script>
</body>
</html>
