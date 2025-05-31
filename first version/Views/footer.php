<?php
$footer = '<footer class="digisurf-footer digisurf-bg">
    <div class="container">
      <div class="row mb60">
        <div class="col-md-4">
          <div class="digisurf-footer-widget">
            <h4 class="heading"><a href="/">城市修理站</a></h4>
            <ul class="footer-links">
              <li><a href="/About" '.theUrl('/About').' class="heading">關於我們</a></li>
              <li><a href="/Common_Problem" '.theUrl('/Common_Problem').' class="heading">常見問題</a></li>
              <li><a href="/Focus_Exposure" '.theUrl('/Focus_Exposure').' class="heading">焦點曝光</a></li>
              <li><a href="/Contact" '.theUrl('/Contact').' class="heading">合作提案</a></li>
              <li><a href="/Join_Us" '.theUrl('/Join_Us').' class="heading">參與我們</a></li>
              <li><a href="/Privacy_Policy" '.theUrl('/Privacy_Policy').' class="heading">隱私權政策</a></li>
              <li><a href="/Terms_And_Services" '.theUrl('/Terms_And_Services').' class="heading">服務與條款</a></li>
            </ul>
          </div> 
        </div>
        <div class="col-md-4">
          <div class="digisurf-footer-widget digisurf-link-wrap">
            <h4 class="heading">追蹤我們</h4>
            <ul class="digisurf-social">
              <li><a href="#"><i class="fab fa-facebook-square"></i></a></li>
              <li><a href="#"><i class="fab fa-line"></i></a></li>              
              <li><a href="#"><i class="fab fa-youtube-square"></i></a></li>
            </ul>
          </div>
        </div>
        <div class="col-md-4">
          <div class="digisurf-footer-widget">
            <h4 class="heading">訂閱電子報</h4>
            <form action="#">
              <div class="row">
                <div class="col-md-6" style="padding-left: 0px;">
                  <div class="form-group">
                    <img src="custom-captcha.php" class="form-control" style="width: auto!important; border: 0px;" />
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
        </div>
      </div>
      <div class="row copyright">
        <div class="col-md-12">
          <div class="digisurf-footer-widget">
            <p>&copy; '.date('Y').' NothingIsGarbage. All Rights Reserved.<br> Powered by Digisurf Co.,Ltd.
          </div>
        </div>
        <!-- <div class="col-md-6">
          <div class="digisurf-footer-widget right">
          <p>追蹤我們</p>
            <ul class="digisurf-social">
              <li><a href="#"><i class="fa fa-line"></i></a></li>
              <li><a href="#"><i class="icon-facebook"></i></a></li>
              <li><a href="#"><i class="icon-youtube"></i></a></li>
              <li><a href="#"><i class="fa fa-pencil-square-o"></i></a></li>
            </ul>
          </div>
        </div> -->
      </div>
    </div>
  </footer>';
?>
