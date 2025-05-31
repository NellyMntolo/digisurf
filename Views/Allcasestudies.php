<?php 
include_once("../Model/allcasesDAO.php");
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
<meta name="description" content="<?php echo $main_case_text3;?>">
<meta name="keywords" content="<?php echo $main_case_text2;?>">
<meta name="author" content="lvnrich">

<?php echo $favs;?>
<?php echo $css; ?>
<title><?php echo $main_case_text1;?></title>
</head>

<body>
<!-- Header -->
<?php echo $header;?>

<!-- /Header END-->
<!-- BODY -->
<main class="lvn-main-content">
<?php echo $cart;?>

<section class="lvn-wrapper-alt">
    <div class="lvn-page-top-empty">
       	<h1 class=""><?php echo $main_case_text4;?></h1>
    </div>
</section>

<section class="lvn-wrapper bg2" style="background: url(/Assets/images/background-test-min.jpg) repeat-x center center fixed;">
    <div class="lvn-container content-return">        
        <?php echo $allcases;?>
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

<script>
$(document).ready(function(){

$(document).on('click', ".event_filter", function() {
          $("#LoadingImage").show();
          $('#trashForm').submit();
          var data = $(this).val();
          console.log(data);
          // var orig = $(this).next('input').val();
          setTimeout(function(){
                          $.ajax({
                              type: "POST",
                              url:"/getcasecategory",
                              data: "selected_category=" + data,
                              //data: data,
                              cache: false,
                              success: function (response) {
                              $('.content-return').html(response);
                              //console.log(data);
                              $("#LoadingImage").hide();
                              },            
                              error: function (jXHR, textStatus, errorThrown) {
                                 alert(errorThrown);  
                                 $("#LoadingImage").hide();             
                              }
                          });
                      }, 3000);

        event.preventDefault();
});

$("#trashForm").submit( function() {     
  return false;
}); 



});
</script>
</body>
</html>
