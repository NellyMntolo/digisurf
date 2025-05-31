<?php
include("Controller/login_controller.php");
include 'Model/session.php';
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>digisurf | Lockscreen</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="/Admin/Assets/css/bootstrap.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/Admin/Assets/css/AdminLTE.css">

    <link rel="stylesheet" href="/Admin/Assets/css/skins/skin-blue.css">
    <link rel="stylesheet" href="/Admin/Assets/css/main.css">
    <link rel="stylesheet" href="/Admin/Assets/css/modal.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="hold-transition lockscreen">
    <!-- Automatic element centering -->
    <div class="lockscreen-wrapper">
      <div class="lockscreen-logo">
        <a href="/"><b>digisurf</b>Link</a>
      </div>
      <!-- User name -->
      <div class="lockscreen-name"><?php echo $login_firstname.' '.$login_lastname;?></div>

      <!-- START LOCK SCREEN ITEM -->
      <div class="lockscreen-item">
        <!-- lockscreen image -->
        <div class="lockscreen-image">
          <img src="<?php echo $login_image;?>" alt="User Image">
        </div>
        <!-- /.lockscreen-image -->

        <!-- lockscreen credentials (contains the form) -->
        <form class="lockscreen-credentials" method="POST">
          <div class="input-group">
          	<input name="username" type="hidden" class="input username" value="<?php echo $login_session; ?>" />
            <input name="password" type="password" class="form-control" placeholder="password">
            <div class="input-group-btn">
              <button class="btn" type="submit"><i class="fa fa-arrow-right text-muted"></i></button>
            </div>
          </div>
        </form><!-- /.lockscreen credentials -->









        <div class="modal-frame" style="top:0!important;">
		  <div class="modal">
				    <div class="modal-inset" style="">
		      			<div class="button close"><i class="fa fa-close"></i></div>
			
		            <div class="modal-body">
						        <h3>Error</h3>
		        				<p>Your Password is invalid</p>
		                <p class="ps"></p>
		      			</div>
		    		</div>
		  	</div>
		</div>
		<div class="modal-overlay"></div>



      </div><!-- /.lockscreen-item -->
      <div class="help-block text-center">
        Enter your password to retrieve your session
      </div>
      <div class="text-center">
        <form action="/Admin/Logout" method="POST"><button type="submit" name="end_session" style="background-color: transparent; outline: none; border: none; color: blue;">Or sign in as a different user</button></form>
      </div>
      <div class="lockscreen-footer text-center">
        Copyright &copy; <?php echo date('Y'); ?> <a href="http://www.digisurf.com/" target="_blank">digisurf</a>.</b><br>
        All rights reserved.
      </div>
    </div><!-- /.center -->

    <!-- jQuery 2.1.4 -->
    <<script src="/Admin/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="/Admin/Assets/js/bootstrap.min.js"></script>
    <!-- AdminLTE App -->
    <script src="/Admin/Assets/js/app.min.js"></script>
    <script src="/Admin/Assets/js/modal.js"></script>


  </body>
</html>