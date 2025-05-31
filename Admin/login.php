<?php 
   include("Controller/login_controller.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="/Admin/Assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="/Admin/Assets/css/modal.css">

	<link rel="apple-touch-icon" sizes="57x57" href="/assets/favs/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="/assets/favs/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="/assets/favs/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="/assets/favs/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="/assets/favs/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="/assets/favs/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="/assets/favs/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="/assets/favs/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="/assets/favs/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192"  href="/assets/favs/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="/assets/favs/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="/assets/favs/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/assets/favs/favicon-16x16.png">
	<link rel="manifest" href="/assets/favs/manifest.json">
	<meta name="msapplication-TileColor" content="#128E75">
	<meta name="msapplication-TileImage" content="/assets/favs/ms-icon-144x144.png">
	<meta name="theme-color" content="#128E75">
	<META NAME="ROBOTS" CONTENT="INDEX, FOLLOW, ARCHIVE" />


</head>
<body>

<div id="wrapper">

	<form name="login-form" class="login-form" action="" method="POST">	
		<div class="header">
		<h3><a href="/"><img style="margin-top: -50px;" src="/assets/images/digi-logo.png"></a></h3>
		<!-- <span>Enter Your Username And Password Below:</span> -->
		</div>
	
		<div class="content">
			<input name="username" type="text" class="input username" placeholder="Username" />
			<div class="user-icon"></div>
			<input name="password" type="password" class="input password" placeholder="Password" />
			<div class="pass-icon"></div>
			<img src="/Admin/custom-captcha.php"/>
			<input name="code" type="text" class="input password" placeholder="Enter Security Code" />				
		</div>

		<div class="footer">
		<input type="submit" name="login_submit" value="Login" class="button" />
		<!--<input type="submit" name="submit" value="Register" class="register" />-->
		</div>
	
	</form>



<div class="modal-frame" style="top:0!important;">
  <div class="modal">
		    <div class="modal-inset" style="">
      			<div class="button close"><i class="fa fa-close"></i></div>
	
            <div class="modal-body">
				        <h3>Error</h3>
        				<p>Your Login Account or Password is invalid</p>
                <p class="ps"></p>
      			</div>
    		</div>
  	</div>
</div>
<div class="modal-overlay"></div>


</div>
<div class="gradient"></div>

</body>
</html>
<style>
@import url(http://fonts.googleapis.com/css?family=Bree+Serif);

h1 img {
	width: 100%;
}

::selection {
	color: #fff;
	background: #f676b2; /* Safari */
}
::-moz-selection {
	color: #fff;
	background: #f676b2; /* Firefox */
}


* {
	padding: 0;
	border: none;
	outline: none;

}


html, body {
	position: relative;
	background: url(<?php echo $bground; ?>);
	background-repeat: no-repeat;
	background-size: 100% 100%;
	font-family: "HelveticaNeue-Light", "Helvetica Neue Light", "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif;
	font-weight:300;
	text-align: left;
	text-decoration: none;
	height: 100%;
	margin: 0;
	overflow: hidden;
	z-index: -2;
	}

#wrapper {
	/* Center wrapper perfectly */
	width: 300px;
	height: 400px;
	margin: 0px auto;
	padding-top: 5%;
}


/*
.gradient {
	width: 600px;
	height: 600px;
	position: fixed;
	left: 50%;
	top: 50%;
	margin-left: -300px;
	margin-top: -300px;
	
	background: url(http://www.demo.amitjakhu.com/login-form/images/gradient.png) no-repeat;
}
*/
/*
.gradient {
	width: 600px;
	height: 600px;
	position: fixed;
	left: 50%;
	top: 50%;
	margin-left: -300px;
	margin-top: -400px;
	z-index: -2;	
	background-image: url(http://www.demo.amitjakhu.com/login-form/images/gradient.png); 
	background-repeat: no-repeat; 	
	background-image: -webkit-gradient(radial, 0% 0%, 0% 100%, from(rgba(213,246,255,1)), to(rgba(213,246,255,0)));
	background-image: -webkit-radial-gradient(50% 50%, 40% 40%, rgba(213,246,255,1), rgba(213,246,255,0));
	background-image: -moz-radial-gradient(50% 50%, 50% 50%, rgba(213,246,255,1), rgba(213,246,255,0));
	background-image: -ms-radial-gradient(50% 50%, 50% 50%, rgba(213,246,255,1), rgba(213,246,255,0));
	background-image: -o-radial-gradient(50% 50%, 50% 50%, rgba(213,246,255,1), rgba(213,246,255,0));
}
*/
/*******************
LOGIN FORM
*******************/

select {
	margin-top: 20px;
	padding: 11px 25px;
	width: 240px;
}

.login-form {
	width: 300px;
	margin: 0 auto;
	position: relative;	
	background: #f3f3f3;
	border: 1px solid #fff;
	border-radius: 5px;	
	box-shadow: 0 1px 3px rgba(0,0,0,0.5);
	-moz-box-shadow: 0 1px 3px rgba(0,0,0,0.5);
	-webkit-box-shadow: 0 1px 3px rgba(0,0,0,0.5);
}

/*******************
HEADER
*******************/


.login-form .header {
	padding: 40px 30px 30px 30px;
}

.login-form .header h1 {
	font-family: 'Bree Serif', serif;
	font-weight: 300;
	font-size: 28px;
	line-height:34px;
	color: #414848;
	text-shadow: 1px 1px 0 rgba(256,256,256,1.0);
	margin-bottom: 10px;
}

.login-form .header span {
	font-size: 11px;
	line-height: 16px;
	color: #678889;
	text-shadow: 1px 1px 0 rgba(256,256,256,1.0);
}

/*******************
CONTENT
*******************/

.login-form .content {
	padding: 0 30px 25px 30px;
	position: relative;
}

/* Input field */
.login-form .content .input {
	width: 240px;
	padding: 15px 25px;
	
	font-family: "HelveticaNeue-Light", "Helvetica Neue Light", "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif;
	font-weight: 400;
	font-size: 14px;
	color: #9d9e9e;
	text-shadow: 1px 1px 0 rgba(256,256,256,1.0);
	
	background: #fff;
	border: 1px solid #fff;
	border-radius: 5px;
	
	box-shadow: inset 0 1px 3px rgba(0,0,0,0.50);
	-moz-box-shadow: inset 0 1px 3px rgba(0,0,0,0.50);
	-webkit-box-shadow: inset 0 1px 3px rgba(0,0,0,0.50);
}

/* Second input field */
.login-form .content .password, .login-form .content .pass-icon {
	margin-top: 25px;
}

.login-form .content .input:hover {
	background: #dfe9ec;
	color: #414848;
}

.login-form .content .input:focus {
	background: #dfe9ec;
	color: #414848;
	
	box-shadow: inset 0 1px 2px rgba(0,0,0,0.25);
	-moz-box-shadow: inset 0 1px 2px rgba(0,0,0,0.25);
	-webkit-box-shadow: inset 0 1px 2px rgba(0,0,0,0.25);
}

.user-icon, .pass-icon {
	width: 46px;
	height: 47px;
	display: block;
	position: absolute;
	left: 0px;
	padding-right: 2px;
	z-index: -1;
	
	-moz-border-radius-topleft: 5px;
	-moz-border-radius-bottomleft: 5px;
	-webkit-border-top-left-radius: 5px;
	-webkit-border-bottom-left-radius: 5px;
}

.user-icon {
	top:0px;
	background: rgba(65,72,72,0.75) url(http://www.demo.amitjakhu.com/login-form/images/user-icon.png) no-repeat center;	
}

.pass-icon {
	top:55px;
	background: rgba(65,72,72,0.75) url(http://www.demo.amitjakhu.com/login-form/images/pass-icon.png) no-repeat center;
}

.content input:focus + div{
	left: -46px;
}

/* Animation */
.input, .user-icon, .pass-icon, .button, .register {
	transition: all 0.5s ease;
	-moz-transition: all 0.5s ease;
	-webkit-transition: all 0.5s ease;
	-o-transition: all 0.5s ease;
	-ms-transition: all 0.5s ease;
}

/*******************
FOOTER
*******************/

.login-form .footer {
	padding: 25px 30px 10px 30px;
	overflow: auto;
	
	background: #d4dedf;
	border-top: 1px solid #fff;
	
	box-shadow: inset 0 1px 0 rgba(0,0,0,0.15);
	-moz-box-shadow: inset 0 1px 0 rgba(0,0,0,0.15);
	-webkit-box-shadow: inset 0 1px 0 rgba(0,0,0,0.15);
}

/* Login button */
.login-form .footer .button {
	float:left;
	padding: 11px 25px;
	width: 240px;
	font-family: 'Bree Serif', serif;
	font-weight: 300;
	font-size: 18px;
	color: #fff;
	text-shadow: 0px 1px 0 rgba(0,0,0,0.25);
	/*background: #29b6f6;*/
	background: #128e75;
	border: 1px solid #46b3d3;
	border-radius: 5px;
	cursor: pointer;
	
	box-shadow: inset 0 0 2px rgba(256,256,256,0.75);
	-moz-box-shadow: inset 0 0 2px rgba(256,256,256,0.75);
	-webkit-box-shadow: inset 0 0 2px rgba(256,256,256,0.75);
}

.login-form .footer .button:hover {
	background: #107d67;
	border: 1px solid rgba(256,256,256,0.75);
	
	box-shadow: inset 0 1px 3px rgba(0,0,0,0.5);
	-moz-box-shadow: inset 0 1px 3px rgba(0,0,0,0.5);
	-webkit-box-shadow: inset 0 1px 3px rgba(0,0,0,0.5);
}

.login-form .footer .button:focus {
	position: relative;
	bottom: -1px;
	
	background: #128e75;
	
	box-shadow: inset 0 1px 6px rgba(256,256,256,0.75);
	-moz-box-shadow: inset 0 1px 6px rgba(256,256,256,0.75);
	-webkit-box-shadow: inset 0 1px 6px rgba(256,256,256,0.75);
}

/* Register button */
.login-form .footer .register {
	display: block;
	float: right;
	padding: 10px;
	margin-right: 20px;
	
	background: none;
	border: none;
	cursor: pointer;
	
	font-family: 'Bree Serif', serif;
	font-weight: 300;
	font-size: 18px;
	color: #414848;
	text-shadow: 0px 1px 0 rgba(256,256,256,0.5);
}

.login-form .footer .register:hover {
	color: #3f9db8;
}

.login-form .footer .register:focus {
	position: relative;
	bottom: -1px;
}
</style>