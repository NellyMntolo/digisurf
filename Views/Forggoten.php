<!doctype html>

<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="2h">
    <meta name="keywords" content="2h">
    <meta name="author" content="2h">
<?php echo $favs;?>
<?php echo $css; ?>
    <title>Forggoten Password</title>
</head>

<body>
<header class="" id="loggedin">
    <nav>
        <div class="logo"><a href=""><img src="../assets/images/logo_main.svg" alt=""></a></div>
        <ul class="menu">
			<li id="name"><span>Hi,</span><span>課程與師資</span></li>
            <li><a href="">品牌介紹</a></li>
            <li><a href="">課程與師資</a></li>
            <li><a href="" class="active">課程表</a></li>
            <li><a href="">最新消息</a></li>
            <li><a href="">價格方案</a></li>
            <li><a href="">店面資訊</a></li>
            <!-- This goes to typeform -->
			<li id="type"><a href="" class="btn btn-default2">我想體驗<span></span></a></li>
       		<li id="log"><a href="" class="btn btn-default2">LOG OUT</a></li>
        </ul>
        <ul class="others">
            <li class="admin">
				<a href="#">
					<img src="../assets/images/user.svg"/>
					<span class="hidden-sm hidden-xs">Hi,</span><span class="hidden-sm hidden-xs">課程與師資</span>
				</a>
            </li>
            <li class="trigger">
                <div class="in"></div>
            </li>	
        </ul>
    </nav>
</header>
<main>
    <div id="experience-class">
        <div id="title-wrapper">
           	<div class="content">
				<h1>FIRST TRAIL</h1>
				<p class="sub-title">預約您的初次199優惠體驗</p>
			</div>
            <div class="background"><img src="../assets/images/trial-bg.png"/></div>
        </div>
        <form class="try-body">
        	<div class="try-body-in">
        		<div class="row">
        			<div class="col-xs-12 text-center">
        				<h4>請輸入您的手機號碼，將獲取簡訊驗證碼</h4>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12">
						<input class="form-control" type="text">
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12">
						<button class="btn btn-default btn-block" type="text">送出</button>
					</div>
				</div>
			</div>
		</form>
        <!-- If you need it
        <div id="experience-phone-wrapper">
            <div id="experience-class-phone">
                <p class="certificate">請輸入您的手機號碼，將獲取簡訊驗證碼</p>
                
                <div id="btn-member">
                    <input type="text">
                    <button class="send">發送驗證碼</button>
                </div>
            </div>
        </div>
        -->
    </div>
</main>

<footer>
  	<div class="footer-top">
   		<a href="#" class="back-top">TOP</a>
	</div>
    <div class="in">
       	<div class="footer-logo">
       		<img src="../assets/images/logo_main.svg"/>
		</div>
       	<div class="footer-address">
			<p>新北市三峽區學成路398號4樓（遠雄凱旋門）</p>
			<p>TEL  02 8672-2286</p>
			<p>Email  hello@2h-ﬁtness.com</p>
			<p>© 2017 2h ﬁtness. All Rights Reserved.</p>
		</div>
        <div class="social-media">
            <a href=""><img src="../assets/images/icon_facebook.svg" alt=""></a>
            <a href=""><img src="../assets/images/icon_instagram.svg" alt=""></a>
            <a href=""><img src="../assets/images/icon_naver.svg" alt=""></a>
            <a href=""><img src="../assets/images/icon_youtube.svg" alt=""></a>
        </div>
    </div>
</footer>


<!-- Script -->
<script src="../assets/js/jquery.js"></script>
<script src="../assets/js/jquery.mobile.custom.min.js"></script>
<script src="../assets/js/modernizr.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>
<script src="../assets/js/bootstrap-select.min.js"></script>
<script src="../assets/js/swiper.min.js"></script>
<script src="../assets/js/main.js"></script>
<script src="../assets/js/clipboard.min.js"></script>
<script src="https://f.vimeocdn.com/js/froogaloop2.min.js"></script>
</body>
</html>
