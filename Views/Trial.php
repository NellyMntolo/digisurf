<?php 
include_once("../Model/sign-upDAO.php");
include_once("../Controller/sign_up_controller.php");
include_once("header.php");
include_once("footer.php");
?>
<!doctype html>

<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo $sign_up_text3; ?>">
    <meta name="keywords" content="<?php echo $sign_up_text2; ?>">
    <meta name="author" content="Nelly">
<?php echo $favs;?>
<?php echo $css; ?>
    <title><?php echo $sign_up_text1; ?></title>
</head>

<body>
<!-- Modal -->
<?php echo $header;?>
<main>
    <div id="experience-class">
        <div id="title-wrapper">
           	<div class="content">
				<h1><?php echo $sign_up_text4; ?></h1>
				<p class="sub-title"><?php echo $sign_up_text5; ?></p>
			</div>
            <div class="background"><img src="<?php echo $sign_up_image1; ?>"/></div>
        </div>
        <form class="try-body2" method="POST">
        	<div class="try-body-in try-body-in2">
				<div class="row">
					<div class="col-xs-3 text-right">
						<?php echo $sign_up_text6; ?>
					</div>
					<div class="col-xs-9">
						<input class="form-control" type="text1" name="text">
					</div>
				</div>
				<div class="row">
					<div class="col-xs-3 text-right">
						<label><?php echo $sign_up_text7; ?></label>
					</div>
					<div class="col-xs-4">
						<input type="radio" name="text2">
						<label><?php echo $sign_up_text8; ?></label>
					</div>
					<div class="col-xs-4">
						<input type="radio" name="text2">
						<label><?php echo $sign_up_text9; ?></label>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-3 text-right">
						<label><?php echo $sign_up_text10; ?></label>
					</div>
					<div class="col-xs-3 full">
						<select class="selectpicker" name="text3">
							<option><?php echo $sign_up_text11; ?></option>
							<option>2017</option>
							<option>2016</option>
							<option>2015</option>
						</select>
					</div>
					<div class="col-xs-3 full">
						<select class="selectpicker" name="text4">
							<option><?php echo $sign_up_text12; ?></option>
							<option>2017</option>
							<option>2016</option>
							<option>2015</option>
						</select>
					</div>
					<div class="col-xs-3 full">
						<select class="selectpicker" name="text5">
							<option><?php echo $sign_up_text13; ?></option>
							<option>2017</option>
							<option>2016</option>
							<option>2015</option>
						</select>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-3 text-right">
						<?php echo $sign_up_text14; ?>
					</div>
					<div class="col-xs-9">
						<input class="form-control" type="text" name="text6">
					</div>
				</div>
				<div class="row">
					<div class="col-xs-3 text-right">
						<?php echo $sign_up_text15; ?>
					</div>
					<div class="col-xs-9">
						<input class="form-control" type="text" name="text7">
					</div>
				</div>
				<div class="row">
					<div class="col-xs-3 text-right">
						<?php echo $sign_up_text16; ?>
					</div>
					<div class="col-xs-9">
						<select class="selectpicker select-full" name="text8">
							<option><?php echo $sign_up_text17; ?></option>
							<option>2017</option>
							<option>2016</option>
							<option>2015</option>
						</select>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12 text-center ">
						<button class="btn btn-default pull-button" data-toggle="modal" data-target="#myModal"><?php echo $sign_up_text18; ?></button>
					</div>
				</div>
			</div>
		</form>
       <!-- IF you need it 
        <div id="experience-edit-wrapper" class="try-body">
            <div id="experience-class-edit">
                <div class="line">
                    <div class="title">
                        <p>姓名</p>
                    </div>
                    <div class="put">
                        <input type="text">
                    </div>
                </div>
                <div class="line">
                    <div class="title">
                        <p>性別</p>
                    </div>
                    <div class="put gender">
                        <div>
                            <div class="dib">
                                <input type="radio">
                            </div>
                            <div class="dib">
                                <p>男生</p>
                            </div>
                        </div>
                        <div>
                            <div class="dib">
                                <input type="radio">
                            </div>
                            <div class="dib">
                                <p>女生</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="line birthday">
                    <div class="title">
                        <p>生日</p>
                    </div>
                    <div class="put three-column">
                        <div>
                            <select class="selectpicker">
                                <option>年</option>
                                <option>2017</option>
                                <option>2016</option>
                                <option>2015</option>
                            </select>
                        </div>
                        <div>
                            <select class="selectpicker">
                                <option>月</option>
                                <option>01</option>
                                <option>02</option>
                                <option>03</option>
                            </select>
                        </div>
                        <div>
                            <select class="selectpicker">
                                <option>日</option>
                                <option>01</option>
                                <option>02</option>
                                <option>03</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="line">
                    <div class="title">
                        <p>電話</p>
                    </div>
                    <div class="put">
                        <input type="text">
                    </div>
                </div>
                <div class="line">
                    <div class="title">
                        <p>email</p>
                    </div>
                    <div class="put">
                        <input type="text">
                    </div>
                </div>
                <div class="line">
                    <div class="title">
                        <p>課程偏好</p>
                    </div>
                    <div class="put prefer-class">
                        <select class="selectpicker">
                            <option>年</option>
                            <option>2017</option>
                            <option>2016</option>
                            <option>2015</option>
                        </select>
                    </div>
                </div>
            </div>
         
            <div id="btn-member">
                <button>送出</button>
            </div>
        </div>
        -->
    </div>
</main>
<?php echo $footer;?>


<!-- Script -->
<script src="/assets/js/jquery.js"></script>
<script src="/assets/js/jquery.mobile.custom.min.js"></script>
<script src="/assets/js/modernizr.js"></script>
<script src="/assets/js/bootstrap.min.js"></script>
<script src="/assets/js/bootstrap-select.min.js"></script>
<script src="/assets/js/swiper.min.js"></script>
<script src="/assets/js/main.js"></script>
<script src="/assets/js/clipboard.min.js"></script>
<script src="https://f.vimeocdn.com/js/froogaloop2.min.js"></script>

</body>
</html>
