<?php
include '../Model/allnotificationsDAO.php';
include '../lang/lang.php';
include '../Model/maineventDAO.php';
include '../Model/session.php';
?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $company_name;?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="/Admin/Assets/css/bootstrap.css">
    <!-- Font Awesome -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/Admin/Assets/css/AdminLTE.css">
    <!-- AdminLTE Skins. We have chosen the skin-green for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect.
    -->
    <link rel="stylesheet" href="/Admin/Assets/css/skins/_all-skins.css">
    <link rel="stylesheet" href="/Admin/Assets/css/main.css">
    <link rel="stylesheet" href="/Admin/Assets/css/modal.css">
    <link rel="stylesheet" href="/Admin/Assets/css/icon_animations.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <?php echo $hovver_icons;?>
  </head>
  <body class="hold-transition skin-green sidebar-mini fixed <?php echo $animate;?>">
    <div class="wrapper">

      <!-- Main Header -->
      <header class="main-header">

        <!-- Logo -->
        <a href="/Admin/Home/" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>N</b>IS</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b><?php echo $company_name;?></b></span>
        </a>

        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
          




          <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
              <ul class="nav navbar-nav">
              <li><button title="Save All" data-tiggle="tooltip" type="button" class="extra-btn btn-success save-btn" style="float: right; right: 0;"><i class="fa fa-save"></i></button></li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $lang_result; ?> <span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                    <?php echo $active_language; ?>
                  </ul>
                </li>
              </ul>
            </div><!-- /.navbar-collapse -->


            <?php echo $shop_notifications;?>


            
            <ul class="nav navbar-nav">
              <!-- User Account Menu -->
              <li class="dropdown user user-menu">
                <!-- Menu Toggle Button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <!-- The user image in the navbar-->
                  <img src="<?php echo $login_image;?>" class="user-image" alt="User Image">
                  <!-- hidden-xs hides the username on small devices so only the image appears. -->
                  <span class="hidden-xs"><?php echo $login_firstname." ".$login_lastname;?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- The user image in the menu -->
                  <li class="user-header">
                    <img src="<?php echo $login_image;?>" class="img-circle" alt="User Image">
                    <p>
                      <?php echo $login_firstname." ".$login_lastname." - ".$login_jobtitle;?>
                      <small></small>
                    </p>
                  </li>
                  <!-- Menu Body -->
                  <!--<li class="user-body">
                    <div class="col-xs-4 text-center">
                      <a href="#">Followers</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Sales</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Friends</a>
                    </div>
                  </li>-->
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="/Admin/Profile/" class="btn btn-default btn-flat"><i class="fa fa-user"></i>Profile</a>
                    </div>
                    <div class="pull-right">
                      <a href="/Admin/Logout" class="btn btn-default btn-flat"><i class="fa fa-sign-out"></i>Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
              <li>
                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

          <!-- Sidebar user panel (optional) -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="<?php echo $login_image;?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p><?php echo $login_firstname." ".$login_lastname;?></p>
              <!-- Status -->
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>

          <!-- search form (Optional) -->
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <!--<input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>-->
            </div>
          </form>
          <!-- /.search form -->

          <!-- Sidebar Menu -->
          <ul class="sidebar-menu">
            <li class="header">NAVIGATION</li>
            <!-- Optionally, you can add icons to the links -->
            <li><a href="/Admin/Home"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
            <!--<li><a href="#"><i class="fa fa-link"></i> <span>Another PAGE LINK</span></a></li>-->
            <li class="treeview menu-open active">
              <a href="#"><i class="fa fa-laptop"></i> <span>Manage Pages</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu menu-open">
                <li><a href="/Admin/Main/"><i class="fa fa-edit"></i>Index</a></li>
                <li><a href="/Admin/About/"><i class="fa fa-edit"></i>About</a></li>
                <li><a href="/Admin/Workshops/"><i class="fa fa-edit"></i>Workshops</a></li>
                <li class="active"><a href="/Admin/Case_Studies/" style="color:white;"><i class="fa fa-edit text-lime"></i>Events</a></li>
                
                <li><a href="/Admin/Stores/"><i class="fa fa-edit"></i>Stores</a></li>
                <li><a href="/Admin/Log-in/"><i class="fa fa-edit"></i>Log-in</a></li>
                <li><a href="/Admin/Newsletter/"><i class="fa fa-edit"></i>Newsletter</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#"><i class="fa fa-puzzle-piece"></i> <span>Manage Workshops</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="/Admin/AddWorkshop"><i class="fa fa-keyboard-o"></i>Create A Workshop</a></li>
                <li><a href="/Admin/ViewAllWorkshops/"><i class="fa fa-tv"></i>View All Workshops<span class="label label-primary pull-right"><?php echo $allthinkers_idx; ?></span></a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#"><i class="fa fa-puzzle-piece"></i> <span>Manage Events</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="/Admin/AddEvent"><i class="fa fa-keyboard-o"></i>Create Events</a></li>
                <li><a href="/Admin/ViewAllEvents/"><i class="fa fa-tv"></i>View All Events<span class="label label-primary pull-right"><?php echo $allprojects_idx; ?></span></a></li>
                <li><a href="/Admin/eventCategories"><i class="fa fa-clone"></i><span>Events Categories</span></a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#"><i class="fa fa-newspaper-o"></i> <span>Manage Articles</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="/Admin/AddArticles"><i class="fa fa-keyboard-o"></i>Create An Article</a></li>
                <li><a href="/Admin/ViewAllArticles/"><i class="fa fa-tv"></i>View All Articles<span class="label label-primary pull-right"><?php echo $allblogs_idx; ?></span></a></li>
<li><a href="/Admin/articleCategories"><i class="fa fa-clone"></i><span>Article Categories</span></a></li>   
              </ul>
            </li>
            <li><a href="/Admin/Menu/"><i class="fa fa-reorder"></i><span>Menu</span></a></li>
            <li><a href="/Admin/TermsPrivacy/"><i class="fa fa-keyboard-o"></i><span>Terms</span></a></li>
            <li><a href="/Admin/AllCustomers/"><i class="fa fa-group"></i>Customers</a></li>
            <li><a href="/Admin/Stores/"><i class="fa fa-money"></i><span>Stores</span></a></li>
            <li><a href="/Admin/Footer/"><i class="fa fa-wheelchair"></i><span>Footer</span></a></li>
            <li><a href="/Admin/Profile/"><i class="fa fa-user"></i><span>Profile</span></a></li>
          </ul><!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Case Studies
            <small><?php echo $current_website; ?></small>
          </h1>
          
        </section>

        <section class="content">

<form action="/Admin/AllEvents" method="POST" enctype="multipart/form-data" accept-charset="utf-8">
<!-- MODAL -->
      <div class="modal-frame">
        <div class="modal">
              <div class="modal-inset" style="">
                  <div class="button close"><i class="fa fa-close"></i></div>
        
                  <div class="modal-body">
                      <h3>Confirm</h3>
                      <p>Are you sure You want to make changes to this Page?</p>
                      <button type="submit" class="btn-success loadin" name="page_submit">Submit</button>                      
                      <p class="ps"></p>
                  </div>
              </div>
          </div>
      </div>
      <div class="modal-overlay"></div>
<!-- MODAL -->


<!-- General Settings -->
          <div class="box box-solid">
            <div class="box-header">
              <h3 class="box-title">General Settings</h3>
                  <div class="pull-right box-tools">
                    <button class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                    <!--<button class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>-->
                  </div><!-- /. tools -->
            </div><!-- /.box-header -->
            <div class="box-body pad">
                  

                    <div class="form-group">
                      <label>Page Title</label>
                      <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-pencil-square-o text-aqua"></i>
                      </div>
                      <input type="text" name="general_entext1" class="form-control" value="<?php echo $entext1;?>" placeholder="Page Title">
                    </div><!-- /.input group -->                       
                    </div>

                    <div class="form-group">
                      <label>Page Keywords</label>
                      <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-keyboard-o text-aqua"></i>
                      </div>
                      <textarea class="form-control" rows="3" name="general_entext2" placeholder="Page Keywords"><?php echo $entext2;?></textarea>
                    </div><!-- /.input group -->                      
                    </div>

                    <div class="form-group">
                      <label>Page Description</label>
                      <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-keyboard-o text-aqua"></i>
                      </div>
                      <textarea class="form-control" rows="3" name="general_entext3" placeholder="Page Description"><?php echo $entext3;?></textarea>
                    </div><!-- /.input group -->                      
                    </div>                  

                </div><!-- box-body -->            
          </div><!-- /.box -->
          <!-- General Settings -->

          <!-- Content Settings -->
          <div class="box box-solid">
            <div class="box-header">
              <h3 class="box-title"> Content Settings</h3>
                  <div class="pull-right box-tools">
                    <button class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                    <!--<button class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>-->
                  </div><!-- /. tools -->
            </div><!-- /.box-header -->
            <div class="box-body pad">    

                    <div class="form-group">
                      <label>Page Main Slogan</label>
                      <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-pencil-square-o"></i>
                      </div>
                      <input type="text" name="general_entext4" class="form-control" value="<?php echo $entext4;?>" placeholder="Page Main Slogan">
                    </div><!-- /.input group -->                         
                    </div>

                    <div class="form-group">
                      <label>Category Text</label>
                      <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-pencil-square-o"></i>
                      </div>
                      <input type="text" name="content_entext1" class="form-control" value="<?php echo $entext5;?>" placeholder="Category Text">
                    </div><!-- /.input group -->                         
                    </div>

                    <div class="form-group">
                      <label>All Cases Text</label>
                      <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-pencil-square-o"></i>
                      </div>
                      <input type="text" name="content_entext2" class="form-control" value="<?php echo $entext6;?>" placeholder="All Cases Text">
                    </div><!-- /.input group -->                         
                    </div>

                    <div class="form-group">
                      <label>Related Cases Text</label>
                      <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-pencil-square-o"></i>
                      </div>
                      <input type="text" name="content_entext3" class="form-control" value="<?php echo $entext7;?>" placeholder="Related Cases Text">
                    </div><!-- /.input group -->                         
                    </div>


                   <?php /*

                    <div class="form-group">
                      <label>Page Main Description EN</label>
                      <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-keyboard-o"></i>
                      </div>
                      <textarea class="form-control" rows="3" name="content_entext2" placeholder="Page Main Description EN"><?php echo $entext6;?></textarea>
                    </div><!-- /.input group -->                       
                    </div>

                    <div class="form-group">
                      <label>Page Main Description ZH</label>
                      <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-keyboard-o"></i>
                      </div>
                      <textarea class="form-control" rows="3" name="content_zhtext2" placeholder="Page Main Description ZH"><?php echo $zhtext6;?></textarea>
                    </div><!-- /.input group -->                       
                    </div>




                    <div class="form-group" style="width: 95%;">
                      <label for="pagemainimage">Page Main Image</label>
                      <input type="file" id="pagemainimage" name="main_project_image1">
                      <img src="<?php echo $enimage1; ?>">
                    </div>

                    */ ?>

                    <hr class="hrs">
                </div><!-- box-body -->
            
          </div><!-- /.box -->
          <!-- Content Settings -->
</form>

        
        </section>

<div id="LoadingImage" style="display: none">
    <div class="loader__figure"></div>
</div>


      </div><!-- /.content-wrapper -->

      <!-- Main Footer -->
      <footer class="main-footer">
        <!-- To the right -->
        <div class="pull-right hidden-xs">
          Version 2.0
        </div>
        <!-- Default to the left -->
        <strong>Copyright &copy; <?php echo date('Y'); ?>.</strong> All rights reserved.
      </footer>

      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Create the tabs -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
          <!--<li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
          <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>-->
        </ul>
        <!-- Tab panes -->
        <div class="tab-content" style="margin-left: 0%; width: 100%;">
          <!-- Home tab content -->
          <div class="tab-pane" id="control-sidebar-home-tab">
            <h3 class="control-sidebar-heading">Recent Activity</h3>
            <ul class="control-sidebar-menu">
              <li>
                <a href="javascript::;">
                  <i class="menu-icon fa fa-birthday-cake bg-red"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>
                    <p>Will be 23 on April 24th</p>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <i class="menu-icon fa fa-user bg-yellow"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>
                    <p>New phone +1(800)555-1234</p>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>
                    <p>nora@example.com</p>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <i class="menu-icon fa fa-file-code-o bg-green"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>
                    <p>Execution time 5 seconds</p>
                  </div>
                </a>
              </li>
            </ul><!-- /.control-sidebar-menu -->

            <h3 class="control-sidebar-heading">Tasks Progress</h3>
            <ul class="control-sidebar-menu">
              <li>
                <a href="javascript::;">
                  <h4 class="control-sidebar-subheading">
                    Custom Template Design
                    <span class="label label-danger pull-right">70%</span>
                  </h4>
                  <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <h4 class="control-sidebar-subheading">
                    Update Resume
                    <span class="label label-success pull-right">95%</span>
                  </h4>
                  <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <h4 class="control-sidebar-subheading">
                    Laravel Integration
                    <span class="label label-warning pull-right">50%</span>
                  </h4>
                  <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <h4 class="control-sidebar-subheading">
                    Back End Framework
                    <span class="label label-primary pull-right">68%</span>
                  </h4>
                  <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                  </div>
                </a>
              </li>
            </ul><!-- /.control-sidebar-menu -->

          </div><!-- /.tab-pane -->
          <!-- Stats tab content -->
          <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div><!-- /.tab-pane -->
          <!-- Settings tab content -->
          <div class="tab-pane" id="control-sidebar-settings-tab">
            <form method="post">
              <h3 class="control-sidebar-heading">General Settings</h3>
              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Report panel usage
                  <input type="checkbox" class="pull-right" checked>
                </label>
                <p>
                  Some information about this general settings option
                </p>
              </div><!-- /.form-group -->

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Allow mail redirect
                  <input type="checkbox" class="pull-right" checked>
                </label>
                <p>
                  Other sets of options are available
                </p>
              </div><!-- /.form-group -->

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Expose author name in posts
                  <input type="checkbox" class="pull-right" checked>
                </label>
                <p>
                  Allow the user to show his name in blog posts
                </p>
              </div><!-- /.form-group -->

              <h3 class="control-sidebar-heading">Chat Settings</h3>

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Show me as online
                  <input type="checkbox" class="pull-right" checked>
                </label>
              </div><!-- /.form-group -->

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Turn off notifications
                  <input type="checkbox" class="pull-right">
                </label>
              </div><!-- /.form-group -->

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Delete chat history
                  <a href="javascript::;" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
                </label>
              </div><!-- /.form-group -->
            </form>
          </div><!-- /.tab-pane -->
        </div>
      </aside><!-- /.control-sidebar -->
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

    <!-- REQUIRED JS SCRIPTS -->

    <!-- jQuery 2.1.4 -->
    <script src="/Admin/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="/Admin/Assets/js/bootstrap.min.js"></script>
    <!-- AdminLTE App -->
    <script src="/Admin/Assets/js/app.min.js"></script>
    <script src="/Admin/Assets/js/modal.js"></script>
    <script src="/Admin/plugins/slimScroll/jquery.slimscroll.min.js"></script>

    <script src="/Admin/Assets/js/hover_side1.js"></script>

    <!-- Optionally, you can add Slimscroll and FastClick plugins.
         Both of these plugins are recommended to enhance the
         user experience. Slimscroll is required when using the
         fixed layout. -->

<script type="text/javascript">
  $('.loadin').click(function () {
    // body...
    $("#LoadingImage").show();
  });
</script>

  </body>
</html>
