<?php
include '../Model/allnotificationsDAO.php';
include '../lang/lang.php';
include '../Model/paymentDAO.php';
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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css">
    <script src="/ckeditor/ckeditor.js"></script>

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
            <li class="active" style="color:white;"><a href="/Admin/Home"><i class="fa fa-dashboard text-lime"></i> <span>Dashboard</span></a></li>
            <!--<li><a href="#"><i class="fa fa-link"></i> <span>Another PAGE LINK</span></a></li>-->
            <li class="treeview">
              <a href="#"><i class="fa fa-laptop"></i> <span>Manage Pages</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="/Admin/Main/"><i class="fa fa-edit"></i>Index</a></li>
                <li><a href="/Admin/About/"><i class="fa fa-edit"></i>About</a></li>
                <li><a href="/Admin/Workshops/"><i class="fa fa-edit"></i>Workshops</a></li>
                
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
            Payment
            <small><?php echo $current_website; ?></small>
          </h1>
          
        </section>

        <section class="content">
<form action="/Admin/AllPayment" method="POST" enctype="multipart/form-data" accept-charset="utf-8">
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
              <h3 class="box-title">Payment SEO</h3>
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
                      <input type="text" name="general_entext1" class="form-control" value="<?php echo $entext1; ?>" placeholder="Page Title">
                    </div><!-- /.input group -->                       
                    </div>

                    <div class="form-group">
                      <label>Page Keywords</label>
                      <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-keyboard-o text-aqua"></i>
                      </div>
                      <textarea class="form-control" rows="3" name="general_entext2" placeholder="Page Keywords"><?php echo $entext2; ?></textarea>
                    </div><!-- /.input group -->                      
                    </div>

                    <div class="form-group">
                      <label>Page Description</label>
                      <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-keyboard-o text-aqua"></i>
                      </div>
                      <textarea class="form-control" rows="3" name="general_entext3" placeholder="Page Description"><?php echo $entext3; ?></textarea>
                    </div><!-- /.input group -->                      
                    </div>
                  
                </div><!-- box-body -->
            
          </div><!-- /.box -->
          <!-- Content Settings -->

          <!-- General Settings -->
          <div class="box box-solid">
            <div class="box-header">
              <h3 class="box-title">Payment Slogan Settings</h3>
                  <div class="pull-right box-tools">
                    <button class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                    <!--<button class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>-->
                  </div><!-- /. tools -->
            </div><!-- /.box-header -->
            <div class="box-body pad">


                  <div class="form-group">
                      <label>Main Slogan English</label>
                      <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-pencil-square-o"></i>
                      </div>
                      <input class="form-control" type="text" value="<?php echo $entext4; ?>" name="general_entext4" placeholder="Main Slogan English">
                    </div><!-- /.input group -->                         
                    </div>

                    <div class="form-group">
                      <label>Main Slogan Chinese</label>
                      <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-pencil-square-o"></i>
                      </div>
                      <input class="form-control" type="text" value="<?php echo $entext5; ?>" name="content_entext1" placeholder="Main Slogan Chinese">
                    </div><!-- /.input group -->                         
                    </div>

                    </div><!-- box-body -->
            
          </div><!-- /.box -->
          <!-- Content Settings -->

          <!-- General Settings -->
          <div class="box box-solid">
            <div class="box-header">
              <h3 class="box-title">Section 1 Settings</h3>
                  <div class="pull-right box-tools">
                    <button class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                    <!--<button class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>-->
                  </div><!-- /. tools -->
            </div><!-- /.box-header -->
            <div class="box-body pad">
                    
                    <div class="row">
                    <div class="col-md-3 col-sm-6 col-xs-12">
                      <div class="form-group" style="width: 100%;">
                        <label>Title</label>
                        <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-pencil-square-o text-aqua"></i>
                        </div>
                        <input type="text" name="content_entext2" class="form-control" value="<?php echo $entext6; ?>" placeholder="Title">
                      </div><!-- /.input group -->                       
                      </div>
                    </div>

                    <div class="col-md-3 col-sm-6 col-xs-12">
                      <div class="form-group" style="width: 100%;">
                        <label>Price</label>
                        <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-pencil-square-o text-aqua"></i>
                        </div>
                        <input type="text" name="content_entext3" class="form-control" value="<?php echo $entext7; ?>" placeholder="Price">
                      </div><!-- /.input group -->                       
                      </div>
                    </div>

                    <div class="col-md-3 col-sm-6 col-xs-12">
                      <div class="form-group" style="width: 100%;">
                        <label>Image</label>
                        <input type="file" name="payment_image1">
                        <img src="<?php echo $enimage1; ?>">
                      </div>
                    </div>
                    </div><!-- /.row -->

                     <div class="row">
                    <div class="col-md-3 col-sm-6 col-xs-12">
                      <div class="form-group" style="width: 100%;">
                        <label>Title</label>
                        <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-pencil-square-o text-aqua"></i>
                        </div>
                        <input type="text" name="content_entext4" class="form-control" value="<?php echo $entext8; ?>" placeholder="Title">
                      </div><!-- /.input group -->                       
                      </div>
                    </div>

                    <div class="col-md-3 col-sm-6 col-xs-12">
                      <div class="form-group" style="width: 100%;">
                        <label>Price</label>
                        <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-pencil-square-o text-aqua"></i>
                        </div>
                        <input type="text" name="content_entext5" class="form-control" value="<?php echo $entext9; ?>" placeholder="Price">
                      </div><!-- /.input group -->                       
                      </div>
                    </div>

                    <div class="col-md-3 col-sm-6 col-xs-12">
                      <div class="form-group" style="width: 100%;">
                        <label>Image</label>
                        <input type="file" name="payment_image2">
                        <img src="<?php echo $enimage2; ?>">
                      </div>
                    </div>
                    </div><!-- /.row -->

                    <div class="row">
                    <div class="col-md-3 col-sm-6 col-xs-12">
                      <div class="form-group" style="width: 100%;">
                        <label>Title</label>
                        <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-pencil-square-o text-aqua"></i>
                        </div>
                        <input type="text" name="content_entext6" class="form-control" value="<?php echo $entext10; ?>" placeholder="Title">
                      </div><!-- /.input group -->                       
                      </div>
                    </div>

                    <div class="col-md-3 col-sm-6 col-xs-12">
                      <div class="form-group" style="width: 100%;">
                        <label>Price</label>
                        <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-pencil-square-o text-aqua"></i>
                        </div>
                        <input type="text" name="content_entext7" class="form-control" value="<?php echo $entext11; ?>" placeholder="Price">
                      </div><!-- /.input group -->                       
                      </div>
                    </div>

                    <div class="col-md-3 col-sm-6 col-xs-12">
                      <div class="form-group" style="width: 100%;">
                        <label>Image</label>
                        <input type="file" name="payment_image3">
                        <img src="<?php echo $enimage3; ?>">
                      </div>
                    </div>
                    </div><!-- /.row -->


                    <div class="form-group">
                        <label>Button Text</label>
                        <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-pencil-square-o text-aqua"></i>
                        </div>
                        <input type="text" name="content_entext8" class="form-control" value="<?php echo $entext12; ?>" placeholder="Button Text">
                      </div><!-- /.input group -->                       
                    </div>


                    <div class="form-group">
                        <label>Button Link</label>
                        <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-pencil-square-o text-aqua"></i>
                        </div>
                        <input type="text" name="content_entext9" class="form-control" value="<?php echo $entext13; ?>" placeholder="Button Link">
                      </div><!-- /.input group -->                       
                    </div>                   
                  
                </div><!-- box-body -->
            
          </div><!-- /.box -->
          <!-- Content Settings -->



           <!-- General Settings -->
          <div class="box box-solid">
            <div class="box-header">
              <h3 class="box-title">Section 2 Settings</h3>
                  <div class="pull-right box-tools">
                    <button class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                    <!--<button class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>-->
                  </div><!-- /. tools -->
            </div><!-- /.box-header -->
            <div class="box-body pad">

                    <div class="form-group">
                        <label>Title</label>
                        <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-pencil-square-o text-aqua"></i>
                        </div>
                        <input type="text" name="content_entext10" class="form-control" value="<?php echo $entext14; ?>" placeholder="Title">
                      </div><!-- /.input group -->                       
                    </div> 

                    <div class="form-group">
                        <label>Short Description</label>
                        <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-pencil-square-o text-aqua"></i>
                        </div>
                        <input type="text" name="content_entext11" class="form-control" value="<?php echo $entext15; ?>" placeholder="Short Description">
                      </div><!-- /.input group -->                       
                    </div> 

                    <div class="form-group">
                        <label> Side Text</label>
                        <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-pencil-square-o text-aqua"></i>
                        </div>
                        <input type="text" name="content_entext12" class="form-control" value="<?php echo $entext16; ?>" placeholder=" Side Text">
                      </div><!-- /.input group -->                       
                    </div> 

                    <div class="form-group">
                        <label> Side Text</label>
                        <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-pencil-square-o text-aqua"></i>
                        </div>
                        <input type="text" name="content_entext13" class="form-control" value="<?php echo $entext17; ?>" placeholder=" Side Text">
                      </div><!-- /.input group -->                       
                    </div>
                    
                    <div class="row">
                    <div class="col-md-2 col-sm-6 col-xs-12">
                      <div class="form-group" style="width: 100%;">
                        <label>Title</label>
                        <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-pencil-square-o text-aqua"></i>
                        </div>
                        <input type="text" name="content_entext14" class="form-control" value="<?php echo $entext18; ?>" placeholder="Title">
                      </div><!-- /.input group -->                       
                      </div>
                    </div>

                    <div class="col-md-2 col-sm-6 col-xs-12">
                      <div class="form-group" style="width: 100%;">
                        <label>Title</label>
                        <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-pencil-square-o text-aqua"></i>
                        </div>
                        <input type="text" name="content_entext15" class="form-control" value="<?php echo $entext19; ?>" placeholder="Title">
                      </div><!-- /.input group -->                       
                      </div>
                    </div>

                    <div class="col-md-2 col-sm-6 col-xs-12">
                      <div class="form-group" style="width: 100%;">
                        <label>Title</label>
                        <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-pencil-square-o text-aqua"></i>
                        </div>
                        <input type="text" name="content_entext16" class="form-control" value="<?php echo $entext20; ?>" placeholder="Title">
                      </div><!-- /.input group -->                       
                      </div>
                    </div>

                    <div class="col-md-2 col-sm-6 col-xs-12">
                      <div class="form-group" style="width: 100%;">
                        <label>Title</label>
                        <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-pencil-square-o text-aqua"></i>
                        </div>
                        <input type="text" name="content_entext17" class="form-control" value="<?php echo $entext21; ?>" placeholder="Title">
                      </div><!-- /.input group -->                       
                      </div>
                    </div>

                    <div class="col-md-2 col-sm-6 col-xs-12">
                      <div class="form-group" style="width: 100%;">
                        <label>Title</label>
                        <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-pencil-square-o text-aqua"></i>
                        </div>
                        <input type="text" name="content_entext18" class="form-control" value="<?php echo $entext22; ?>" placeholder="Title">
                      </div><!-- /.input group -->                       
                      </div>
                    </div>

                    </div><!-- /.row -->

                     <div class="row">
                    <div class="col-md-2 col-sm-6 col-xs-12">
                      <div class="form-group" style="width: 100%;">
                        <label>Price</label>
                        <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-pencil-square-o text-aqua"></i>
                        </div>
                        <input type="text" name="content_entext19" class="form-control" value="<?php echo $entext23; ?>" placeholder="Price">
                      </div><!-- /.input group -->                       
                      </div>
                    </div>

                    <div class="col-md-2 col-sm-6 col-xs-12">
                      <div class="form-group" style="width: 100%;">
                        <label>Price</label>
                        <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-pencil-square-o text-aqua"></i>
                        </div>
                        <input type="text" name="content_entext20" class="form-control" value="<?php echo $entext24; ?>" placeholder="Price">
                      </div><!-- /.input group -->                       
                      </div>
                    </div>

                    <div class="col-md-2 col-sm-6 col-xs-12">
                      <div class="form-group" style="width: 100%;">
                        <label>Price</label>
                        <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-pencil-square-o text-aqua"></i>
                        </div>
                        <input type="text" name="content_entext21" class="form-control" value="<?php echo $entext25; ?>" placeholder="Price">
                      </div><!-- /.input group -->                       
                      </div>
                    </div>

                    <div class="col-md-2 col-sm-6 col-xs-12">
                      <div class="form-group" style="width: 100%;">
                        <label>Price</label>
                        <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-pencil-square-o text-aqua"></i>
                        </div>
                        <input type="text" name="content_entext22" class="form-control" value="<?php echo $entext26; ?>" placeholder="Price">
                      </div><!-- /.input group -->                       
                      </div>
                    </div>

                    <div class="col-md-2 col-sm-6 col-xs-12">
                      <div class="form-group" style="width: 100%;">
                        <label>Price</label>
                        <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-pencil-square-o text-aqua"></i>
                        </div>
                        <input type="text" name="content_entext23" class="form-control" value="<?php echo $entext27; ?>" placeholder="Price">
                      </div><!-- /.input group -->                       
                      </div>
                    </div>
                    </div><!-- /.row -->

                    <div class="row">
                    <div class="col-md-2 col-sm-6 col-xs-12">
                      <div class="form-group" style="width: 100%;">
                        <label>Price</label>
                        <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-pencil-square-o text-aqua"></i>
                        </div>
                        <input type="text" name="content_entext24" class="form-control" value="<?php echo $entext28; ?>" placeholder="Price">
                      </div><!-- /.input group -->                       
                      </div>
                    </div>

                    <div class="col-md-2 col-sm-6 col-xs-12">
                      <div class="form-group" style="width: 100%;">
                        <label>Price</label>
                        <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-pencil-square-o text-aqua"></i>
                        </div>
                        <input type="text" name="content_entext25" class="form-control" value="<?php echo $entext29; ?>" placeholder="Price">
                      </div><!-- /.input group -->                       
                      </div>
                    </div>

                    <div class="col-md-2 col-sm-6 col-xs-12">
                      <div class="form-group" style="width: 100%;">
                        <label>Price</label>
                        <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-pencil-square-o text-aqua"></i>
                        </div>
                        <input type="text" name="content_entext26" class="form-control" value="<?php echo $entext30; ?>" placeholder="Price">
                      </div><!-- /.input group -->                       
                      </div>
                    </div>

                    <div class="col-md-2 col-sm-6 col-xs-12">
                      <div class="form-group" style="width: 100%;">
                        <label>Price</label>
                        <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-pencil-square-o text-aqua"></i>
                        </div>
                        <input type="text" name="content_entext27" class="form-control" value="<?php echo $entext31; ?>" placeholder="Price">
                      </div><!-- /.input group -->                       
                      </div>
                    </div>

                    <div class="col-md-2 col-sm-6 col-xs-12">
                      <div class="form-group" style="width: 100%;">
                        <label>Price</label>
                        <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-pencil-square-o text-aqua"></i>
                        </div>
                        <input type="text" name="content_entext28" class="form-control" value="<?php echo $entext32; ?>" placeholder="Price">
                      </div><!-- /.input group -->                       
                      </div>
                    </div>
                    </div><!-- /.row -->


                    <div class="form-group">
                        <label>Title</label>
                        <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-pencil-square-o text-aqua"></i>
                        </div>
                        <input type="text" name="content_entext29" class="form-control" value="<?php echo $entext33; ?>" placeholder="Title">
                      </div><!-- /.input group -->                       
                    </div>


                    <div class="form-group">
                        <label>Description</label>
                        <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-pencil-square-o text-aqua"></i>
                        </div>
                        <textarea class="form-control" rows="3" name="content_entext30" placeholder="Description"><?php echo $entext34; ?></textarea>
                      </div><!-- /.input group -->                       
                    </div>                   
                  
                </div><!-- box-body -->
            
          </div><!-- /.box -->
          <!-- Content Settings -->


          <!-- General Settings -->
          <div class="box box-solid">
            <div class="box-header">
              <h3 class="box-title">Banner Settings</h3>
                  <div class="pull-right box-tools">
                    <button class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                    <!--<button class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>-->
                  </div><!-- /. tools -->
            </div><!-- /.box-header -->
            <div class="box-body pad">

                      <div class="form-group" style="width: 100%;">
                        <label>Banner</label>
                        <input type="file" name="payment_image4">
                        <img src="<?php echo $enimage4; ?>">
                      </div>

                      <div class="form-group">
                        <label>URL</label>
                        <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-pencil-square-o text-aqua"></i>
                        </div>
                        <input type="text" name="content_entext31" class="form-control" value="<?php echo $entext35; ?>" placeholder="URL">
                      </div><!-- /.input group -->                       
                    </div>

                    <div class="form-group" style="width: 100%;">
                        <label>Mobile Banner</label>
                        <input type="file" name="payment_image9">
                        <img src="<?php echo $enimage9; ?>">
                      </div>


              </div><!-- box-body -->
            
          </div><!-- /.box -->
          <!-- Content Settings -->







           <!-- General Settings -->
          <div class="box box-solid">
            <div class="box-header">
              <h3 class="box-title">Section 3 Settings</h3>
                  <div class="pull-right box-tools">
                    <button class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                    <!--<button class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>-->
                  </div><!-- /. tools -->
            </div><!-- /.box-header -->
            <div class="box-body pad">

                    <div class="form-group">
                        <label>Title</label>
                        <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-pencil-square-o text-aqua"></i>
                        </div>
                        <input type="text" name="content_entext32" class="form-control" value="<?php echo $entext36; ?>" placeholder="Title">
                      </div><!-- /.input group -->                       
                    </div> 

                    <div class="form-group">
                        <label>Short Description</label>
                        <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-pencil-square-o text-aqua"></i>
                        </div>
                        <input type="text" name="content_entext33" class="form-control" value="<?php echo $entext37; ?>" placeholder="Short Description">
                      </div><!-- /.input group -->                       
                    </div> 

                    <div class="form-group">
                        <label> Side Text</label>
                        <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-pencil-square-o text-aqua"></i>
                        </div>
                        <input type="text" name="content_entext34" class="form-control" value="<?php echo $entext38; ?>" placeholder=" Side Text">
                      </div><!-- /.input group -->                       
                    </div> 

                    <div class="form-group">
                        <label> Side Text</label>
                        <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-pencil-square-o text-aqua"></i>
                        </div>
                        <input type="text" name="content_entext35" class="form-control" value="<?php echo $entext39; ?>" placeholder=" Side Text">
                      </div><!-- /.input group -->                       
                    </div>
                    
                    <div class="row">
                    <div class="col-md-4 col-sm-6 col-xs-12">
                      <div class="form-group" style="width: 80%; margin-left: 10%;">
                        <label>Title</label>
                        <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-pencil-square-o text-aqua"></i>
                        </div>
                        <input type="text" name="content_entext36" class="form-control" value="<?php echo $entext40; ?>" placeholder="Title">
                      </div><!-- /.input group -->                       
                      </div>
                    </div>

                    <div class="col-md-4 col-sm-6 col-xs-12">
                      <div class="form-group" style="width: 80%; margin-left: 10%;">
                        <label>Title</label>
                        <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-pencil-square-o text-aqua"></i>
                        </div>
                        <input type="text" name="content_entext37" class="form-control" value="<?php echo $entext41; ?>" placeholder="Title">
                      </div><!-- /.input group -->                       
                      </div>
                    </div>

                    <div class="col-md-4 col-sm-6 col-xs-12">
                      <div class="form-group" style="width: 80%; margin-left: 10%;">
                        <label>Title</label>
                        <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-pencil-square-o text-aqua"></i>
                        </div>
                        <input type="text" name="content_entext38" class="form-control" value="<?php echo $entext42; ?>" placeholder="Title">
                      </div><!-- /.input group -->                       
                      </div>
                    </div>

                    </div><!-- /.row -->

                     <div class="row">
                    <div class="col-md-4 col-sm-6 col-xs-12">
                      <div class="form-group" style="width: 80%; margin-left: 10%;">
                        <label>Price</label>
                        <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-pencil-square-o text-aqua"></i>
                        </div>
                        <input type="text" name="content_entext39" class="form-control" value="<?php echo $entext43; ?>" placeholder="Price">
                      </div><!-- /.input group -->                       
                      </div>
                    </div>

                    <div class="col-md-4 col-sm-6 col-xs-12">
                      <div class="form-group" style="width: 80%; margin-left: 10%;">
                        <label>Price</label>
                        <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-pencil-square-o text-aqua"></i>
                        </div>
                        <input type="text" name="content_entext40" class="form-control" value="<?php echo $entext44; ?>" placeholder="Price">
                      </div><!-- /.input group -->                       
                      </div>
                    </div>

                    <div class="col-md-4 col-sm-6 col-xs-12">
                      <div class="form-group" style="width: 80%; margin-left: 10%;">
                        <label>Price</label>
                        <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-pencil-square-o text-aqua"></i>
                        </div>
                        <input type="text" name="content_entext41" class="form-control" value="<?php echo $entext45; ?>" placeholder="Price">
                      </div><!-- /.input group -->                       
                      </div>
                    </div>                    
                    </div><!-- /.row -->

                    <div class="row">
                    <div class="col-md-4 col-sm-6 col-xs-12">
                      <div class="form-group" style="width: 80%; margin-left: 10%;">
                        <label>Price</label>
                        <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-pencil-square-o text-aqua"></i>
                        </div>
                        <input type="text" name="content_entext42" class="form-control" value="<?php echo $entext46; ?>" placeholder="Price">
                      </div><!-- /.input group -->                       
                      </div>
                    </div>

                    <div class="col-md-4 col-sm-6 col-xs-12">
                      <div class="form-group" style="width: 80%; margin-left: 10%;">
                        <label>Price</label>
                        <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-pencil-square-o text-aqua"></i>
                        </div>
                        <input type="text" name="content_entext43" class="form-control" value="<?php echo $entext47; ?>" placeholder="Price">
                      </div><!-- /.input group -->                       
                      </div>
                    </div>

                    <div class="col-md-4 col-sm-6 col-xs-12">
                      <div class="form-group" style="width: 80%; margin-left: 10%;">
                        <label>Price</label>
                        <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-pencil-square-o text-aqua"></i>
                        </div>
                        <input type="text" name="content_entext44" class="form-control" value="<?php echo $entext48; ?>" placeholder="Price">
                      </div><!-- /.input group -->                       
                      </div>
                    </div>
                    </div><!-- /.row -->


                    <div class="form-group">
                        <label>Title</label>
                        <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-pencil-square-o text-aqua"></i>
                        </div>
                        <input type="text" name="content_entext45" class="form-control" value="<?php echo $entext49; ?>" placeholder="Title">
                      </div><!-- /.input group -->                       
                    </div>


                    <div class="form-group">
                        <label>Description</label>
                        <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-pencil-square-o text-aqua"></i>
                        </div>
                        <textarea class="form-control" rows="3" name="content_entext46" placeholder="Description"><?php echo $entext50; ?></textarea>
                      </div><!-- /.input group -->                       
                    </div>                   
                  
                </div><!-- box-body -->
            
          </div><!-- /.box -->
          <!-- Content Settings -->


          <!-- General Settings -->
          <div class="box box-solid">
            <div class="box-header">
              <h3 class="box-title">Banner Settings</h3>
                  <div class="pull-right box-tools">
                    <button class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                    <!--<button class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>-->
                  </div><!-- /. tools -->
            </div><!-- /.box-header -->
            <div class="box-body pad">

                      <div class="form-group" style="width: 100%;">
                        <label>Banner</label>
                        <input type="file" name="payment_image5">
                        <img src="<?php echo $enimage5; ?>">
                      </div>

                      <div class="form-group">
                        <label>URL</label>
                        <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-pencil-square-o text-aqua"></i>
                        </div>
                        <input type="text" name="content_entext47" class="form-control" value="<?php echo $entext51; ?>" placeholder="URL">
                      </div><!-- /.input group -->                       
                    </div>

                    <div class="form-group" style="width: 100%;">
                        <label>Mobile Banner</label>
                        <input type="file" name="payment_image10">
                        <img src="<?php echo $enimage10; ?>">
                      </div>


              </div><!-- box-body -->
            
          </div><!-- /.box -->
          <!-- Content Settings -->



           <!-- General Settings -->
          <div class="box box-solid">
            <div class="box-header">
              <h3 class="box-title">Section 4 Settings</h3>
                  <div class="pull-right box-tools">
                    <button class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                    <!--<button class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>-->
                  </div><!-- /. tools -->
            </div><!-- /.box-header -->
            <div class="box-body pad">

                    <div class="form-group">
                        <label>Title</label>
                        <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-pencil-square-o text-aqua"></i>
                        </div>
                        <input type="text" name="content_entext48" class="form-control" value="<?php echo $entext52; ?>" placeholder="Title">
                      </div><!-- /.input group -->                       
                    </div> 

                    <div class="form-group">
                        <label>Short Description</label>
                        <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-pencil-square-o text-aqua"></i>
                        </div>
                        <input type="text" name="content_entext49" class="form-control" value="<?php echo $entext53; ?>" placeholder="Short Description">
                      </div><!-- /.input group -->                       
                    </div> 

                    <div class="form-group">
                        <label> Side Text</label>
                        <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-pencil-square-o text-aqua"></i>
                        </div>
                        <input type="text" name="content_entext50" class="form-control" value="<?php echo $entext54; ?>" placeholder=" Side Text">
                      </div><!-- /.input group -->                       
                    </div> 

                    <div class="form-group">
                        <label> Side Text</label>
                        <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-pencil-square-o text-aqua"></i>
                        </div>
                        <input type="text" name="content_entext51" class="form-control" value="<?php echo $entext55; ?>" placeholder=" Side Text">
                      </div><!-- /.input group -->                       
                    </div>
                    
                    <div class="row">
                    <div class="col-md-2 col-sm-6 col-xs-12">
                      <div class="form-group" style="width: 100%;">
                        <label>Title</label>
                        <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-pencil-square-o text-aqua"></i>
                        </div>
                        <input type="text" name="content_entext52" class="form-control" value="<?php echo $entext56; ?>" placeholder="Title">
                      </div><!-- /.input group -->                       
                      </div>
                    </div>

                    <div class="col-md-2 col-sm-6 col-xs-12">
                      <div class="form-group" style="width: 100%;">
                        <label>Title</label>
                        <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-pencil-square-o text-aqua"></i>
                        </div>
                        <input type="text" name="content_entext53" class="form-control" value="<?php echo $entext57; ?>" placeholder="Title">
                      </div><!-- /.input group -->                       
                      </div>
                    </div>

                    <div class="col-md-2 col-sm-6 col-xs-12">
                      <div class="form-group" style="width: 100%;">
                        <label>Title</label>
                        <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-pencil-square-o text-aqua"></i>
                        </div>
                        <input type="text" name="content_entext54" class="form-control" value="<?php echo $entext58; ?>" placeholder="Title">
                      </div><!-- /.input group -->                       
                      </div>
                    </div>

                    <div class="col-md-2 col-sm-6 col-xs-12">
                      <div class="form-group" style="width: 100%;">
                        <label>Title</label>
                        <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-pencil-square-o text-aqua"></i>
                        </div>
                        <input type="text" name="content_entext55" class="form-control" value="<?php echo $entext59; ?>" placeholder="Title">
                      </div><!-- /.input group -->                       
                      </div>
                    </div>

                    <div class="col-md-2 col-sm-6 col-xs-12">
                      <div class="form-group" style="width: 100%;">
                        <label>Title</label>
                        <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-pencil-square-o text-aqua"></i>
                        </div>
                        <input type="text" name="content_entext56" class="form-control" value="<?php echo $entext60; ?>" placeholder="Title">
                      </div><!-- /.input group -->                       
                      </div>
                    </div>

                    </div><!-- /.row -->

                     <div class="row">
                    <div class="col-md-2 col-sm-6 col-xs-12">
                      <div class="form-group" style="width: 100%;">
                        <label>Price</label>
                        <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-pencil-square-o text-aqua"></i>
                        </div>
                        <input type="text" name="content_entext57" class="form-control" value="<?php echo $entext61; ?>" placeholder="Price">
                      </div><!-- /.input group -->                       
                      </div>
                    </div>

                    <div class="col-md-2 col-sm-6 col-xs-12">
                      <div class="form-group" style="width: 100%;">
                        <label>Price</label>
                        <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-pencil-square-o text-aqua"></i>
                        </div>
                        <input type="text" name="content_entext58" class="form-control" value="<?php echo $entext62; ?>" placeholder="Price">
                      </div><!-- /.input group -->                       
                      </div>
                    </div>

                    <div class="col-md-2 col-sm-6 col-xs-12">
                      <div class="form-group" style="width: 100%;">
                        <label>Price</label>
                        <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-pencil-square-o text-aqua"></i>
                        </div>
                        <input type="text" name="content_entext59" class="form-control" value="<?php echo $entext63; ?>" placeholder="Price">
                      </div><!-- /.input group -->                       
                      </div>
                    </div>

                    <div class="col-md-2 col-sm-6 col-xs-12">
                      <div class="form-group" style="width: 100%;">
                        <label>Price</label>
                        <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-pencil-square-o text-aqua"></i>
                        </div>
                        <input type="text" name="content_entext60" class="form-control" value="<?php echo $entext64; ?>" placeholder="Price">
                      </div><!-- /.input group -->                       
                      </div>
                    </div>

                    <div class="col-md-2 col-sm-6 col-xs-12">
                      <div class="form-group" style="width: 100%;">
                        <label>Price</label>
                        <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-pencil-square-o text-aqua"></i>
                        </div>
                        <input type="text" name="content_entext61" class="form-control" value="<?php echo $entext65; ?>" placeholder="Price">
                      </div><!-- /.input group -->                       
                      </div>
                    </div>
                    </div><!-- /.row -->

                    <div class="row">
                    <div class="col-md-2 col-sm-6 col-xs-12">
                      <div class="form-group" style="width: 100%;">
                        <label>Price</label>
                        <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-pencil-square-o text-aqua"></i>
                        </div>
                        <input type="text" name="content_entext62" class="form-control" value="<?php echo $entext66; ?>" placeholder="Price">
                      </div><!-- /.input group -->                       
                      </div>
                    </div>

                    <div class="col-md-2 col-sm-6 col-xs-12">
                      <div class="form-group" style="width: 100%;">
                        <label>Price</label>
                        <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-pencil-square-o text-aqua"></i>
                        </div>
                        <input type="text" name="content_entext63" class="form-control" value="<?php echo $entext67; ?>" placeholder="Price">
                      </div><!-- /.input group -->                       
                      </div>
                    </div>

                    <div class="col-md-2 col-sm-6 col-xs-12">
                      <div class="form-group" style="width: 100%;">
                        <label>Price</label>
                        <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-pencil-square-o text-aqua"></i>
                        </div>
                        <input type="text" name="content_entext64" class="form-control" value="<?php echo $entext68; ?>" placeholder="Price">
                      </div><!-- /.input group -->                       
                      </div>
                    </div>

                    <div class="col-md-2 col-sm-6 col-xs-12">
                      <div class="form-group" style="width: 100%;">
                        <label>Price</label>
                        <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-pencil-square-o text-aqua"></i>
                        </div>
                        <input type="text" name="content_entext65" class="form-control" value="<?php echo $entext69; ?>" placeholder="Price">
                      </div><!-- /.input group -->                       
                      </div>
                    </div>

                    <div class="col-md-2 col-sm-6 col-xs-12">
                      <div class="form-group" style="width: 100%;">
                        <label>Price</label>
                        <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-pencil-square-o text-aqua"></i>
                        </div>
                        <input type="text" name="content_entext66" class="form-control" value="<?php echo $entext70; ?>" placeholder="Price">
                      </div><!-- /.input group -->                       
                      </div>
                    </div>
                    </div><!-- /.row -->


                    <div class="form-group">
                        <label>Title</label>
                        <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-pencil-square-o text-aqua"></i>
                        </div>
                        <input type="text" name="content_entext67" class="form-control" value="<?php echo $entext71; ?>" placeholder="Title">
                      </div><!-- /.input group -->                       
                    </div>


                    <div class="form-group">
                        <label>Description</label>
                        <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-pencil-square-o text-aqua"></i>
                        </div>
                        <textarea class="form-control" rows="3" name="content_entext68" placeholder="Description"><?php echo $entext72; ?></textarea>
                      </div><!-- /.input group -->                       
                    </div>                   
                  
                </div><!-- box-body -->
            
          </div><!-- /.box -->
          <!-- Content Settings -->



          <!-- General Settings -->
          <div class="box box-solid">
            <div class="box-header">
              <h3 class="box-title">Banner Settings</h3>
                  <div class="pull-right box-tools">
                    <button class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                    <!--<button class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>-->
                  </div><!-- /. tools -->
            </div><!-- /.box-header -->
            <div class="box-body pad">

                      <div class="form-group" style="width: 100%;">
                        <label>Banner</label>
                        <input type="file" name="payment_image6">
                        <img src="<?php echo $enimage6; ?>">
                      </div>

                      <div class="form-group">
                        <label>URL</label>
                        <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-pencil-square-o text-aqua"></i>
                        </div>
                        <input type="text" name="content_entext69" class="form-control" value="<?php echo $entext73; ?>" placeholder="URL">
                      </div><!-- /.input group -->                       
                    </div>

                    <div class="form-group" style="width: 100%;">
                        <label>Mobile Banner</label>
                        <input type="file" name="payment_image11">
                        <img src="<?php echo $enimage11; ?>">
                      </div>


              </div><!-- box-body -->
            
          </div><!-- /.box -->
          <!-- Content Settings -->



          <!-- General Settings -->
          <div class="box box-solid">
            <div class="box-header">
              <h3 class="box-title">Section 5 Settings</h3>
                  <div class="pull-right box-tools">
                    <button class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                    <!--<button class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>-->
                  </div><!-- /. tools -->
            </div><!-- /.box-header -->
            <div class="box-body pad">

                      <div class="form-group">
                        <label>Title</label>
                        <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-pencil-square-o text-aqua"></i>
                        </div>
                        <input type="text" name="content_entext70" class="form-control" value="<?php echo $entext74; ?>" placeholder="Title">
                      </div><!-- /.input group -->                       
                    </div>


                    <div class="form-group">
                        <label>Description</label>
                        <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-pencil-square-o text-aqua"></i>
                        </div>
                        <textarea class="form-control" rows="3" name="content_entext71" placeholder="Description"><?php echo $entext75; ?></textarea>
                      </div><!-- /.input group -->                       
                    </div> 



                      <div class="form-group" style="width: 100%;">
                        <label>Background Image</label>
                        <input type="file" name="payment_image7">
                        <img src="<?php echo $enimage7; ?>">
                      </div>


                      <div class="form-group">
                        <label>Title</label>
                        <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-pencil-square-o text-aqua"></i>
                        </div>
                        <input type="text" name="content_entext72" class="form-control" value="<?php echo $entext76; ?>" placeholder="Title">
                      </div><!-- /.input group -->                       
                    </div>

                    <div class="form-group">
                        <label>Sub-Title</label>
                        <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-pencil-square-o text-aqua"></i>
                        </div>
                        <input type="text" name="content_entext73" class="form-control" value="<?php echo $entext77; ?>" placeholder="Sub-Title">
                      </div><!-- /.input group -->                       
                    </div>


                    <div class="form-group">
                        <label>Description</label>
                        <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-pencil-square-o text-aqua"></i>
                        </div>
                        <textarea class="form-control" rows="3" name="content_entext74" placeholder="Description"><?php echo $entext78; ?></textarea>
                      </div><!-- /.input group -->                       
                    </div> 

                    <div class="form-group">
                        <label>Sub-Title</label>
                        <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-pencil-square-o text-aqua"></i>
                        </div>
                        <input type="text" name="content_entext75" class="form-control" value="<?php echo $entext79; ?>" placeholder="Sub-Title">
                      </div><!-- /.input group -->                       
                    </div>


                    <div class="form-group">
                        <label>Description</label>
                        <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-pencil-square-o text-aqua"></i>
                        </div>
                        <textarea class="form-control" rows="3" name="content_entext76" placeholder="Description"><?php echo $entext80; ?></textarea>
                      </div><!-- /.input group -->                       
                    </div> 



                    <div class="form-group" style="width: 100%;">
                        <label>Background Image</label>
                        <input type="file" name="payment_image8">
                        <img src="<?php echo $enimage8; ?>">
                      </div>


                      <div class="form-group">
                        <label>Title</label>
                        <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-pencil-square-o text-aqua"></i>
                        </div>
                        <input type="text" name="content_entext77" class="form-control" value="<?php echo $entext81; ?>" placeholder="Title">
                      </div><!-- /.input group -->                       
                    </div>

                    <div class="form-group">
                        <label>Sub-Title</label>
                        <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-pencil-square-o text-aqua"></i>
                        </div>
                        <input type="text" name="content_entext78" class="form-control" value="<?php echo $entext82; ?>" placeholder="Sub-Title">
                      </div><!-- /.input group -->                       
                    </div>


                    <div class="form-group">
                        <label>Description</label>
                        <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-pencil-square-o text-aqua"></i>
                        </div>
                        <textarea class="form-control" rows="3" name="content_entext79" placeholder="Description"><?php echo $entext83; ?></textarea>
                      </div><!-- /.input group -->                       
                    </div> 

                    <div class="form-group">
                        <label>Sub-Title</label>
                        <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-pencil-square-o text-aqua"></i>
                        </div>
                        <input type="text" name="content_entext80" class="form-control" value="<?php echo $entext84; ?>" placeholder="Sub-Title">
                      </div><!-- /.input group -->                       
                    </div>


                    <div class="form-group">
                        <label>Description</label>
                        <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-pencil-square-o text-aqua"></i>
                        </div>
                        <textarea class="form-control" rows="3" name="content_entext81" placeholder="Description"><?php echo $entext85; ?></textarea>
                      </div><!-- /.input group -->                       
                    </div> 

                    <div class="form-group">
                        <label>Sub-Title</label>
                        <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-pencil-square-o text-aqua"></i>
                        </div>
                        <input type="text" name="content_entext82" class="form-control" value="<?php echo $entext86; ?>" placeholder="Sub-Title">
                      </div><!-- /.input group -->                       
                    </div>


                    <div class="form-group">
                        <label>Description</label>
                        <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-pencil-square-o text-aqua"></i>
                        </div>
                        <textarea class="form-control" rows="3" name="content_entext83" placeholder="Description"><?php echo $entext87; ?></textarea>
                      </div><!-- /.input group -->                       
                    </div>


                    <div class="form-group">
                        <label>Button Text</label>
                        <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-pencil-square-o text-aqua"></i>
                        </div>
                        <input type="text" name="content_entext84" class="form-control" value="<?php echo $entext88; ?>" placeholder="Button Text">
                      </div><!-- /.input group -->                       
                    </div>


              </div><!-- box-body -->
            
          </div><!-- /.box -->
          <!-- Content Settings -->

 <!-- <div class="form-group">
                      <label>Main Slogan Chinese</label>
                      <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-pencil-square-o"></i>
                      </div>
                      <textarea class="form-control" rows="3" name="general_entext4" placeholder="Main Slogan Chinese"><?php echo $entext4; ?></textarea>
                    </div>/.input group                     
                    </div>-->     
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


    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

    <script src="/Admin/Assets/js/hover_side1.js"></script>

    <!-- Optionally, you can add Slimscroll and FastClick plugins.
         Both of these plugins are recommended to enhance the
         user experience. Slimscroll is required when using the
         fixed layout. -->



<script type="text/javascript">
// $(function () {
//     $('#video_url').one('blur', function () {
//         var text = $('#video_url');
//         text.val(text.val() + '?api=1&player_id=player1');    
//     });
// });
</script>

<script type="text/javascript">
  $('.loadin').click(function () {
    // body...
    $("#LoadingImage").show();
  });
</script>


<script type="text/javascript">
$(document).ready(function(){

      $(function() {
            $('#sorter').sortable({
              placeholder: "ui-state-highlight",
              items: '.project-list',
              revert: true,
              over: function() {
                 $('.ui-state-highlight').stop().animate({
                     height: 0
                 }, 400);
              },
              change: function() {
                 $('.ui-state-highlight').stop().animate({
                     height: 200
                 }, 400);
              },
              update: function() {
                 $('.ui-state-highlight').stop().animate({
                     height: 200
                 }, 400);
              }, 

              stop: function (event, ui) {
              var data = $(this).sortable('serialize');
                  $.ajax({
                      type: "POST",
                      url:"/Admin/SortStep",
                      data: data,
                      success: function (response) {
                      //alert(response);                      
                      $("#sorter").html(response); 
                      console.log(data);
                      },            
                      error: function (jXHR, textStatus, errorThrown) {
                         alert(errorThrown);               
                      }
                  });
              }
          });
          $( "#sorter" ).disableSelection();
      });      
});
</script>

<style type="text/css">
  #sorter img:hover{
    cursor: move;
    opacity: 0.7;
    transition: all 200ms ease-in-out;
    -webkit-transition: all 200ms ease-in-out;
    -moz-transition: all 200ms ease-in-out;
    -o-transition: all 200ms ease-in-out;
  }
  .ui-state-highlight {
    width: 300px;
    height: 200px; 
    float: left; 
    background: #eee; 
    border: 1px dashed #bbb; 
    display: block;
    opacity: 0.8;
    border-radius: 2px;
    -moz-border-radius: 2px;
    -webkit-border-radius: 2px;
    margin-top: 20px;
    margin-left:2%;
  }
  /* sortable bug fix */
  body {
    overflow: visible;
  }
  /* sortable bug fix */
</style>

<script type="text/javascript">
  $('.loadin').click(function () {
    // body...
    $("#LoadingImage").show();
  });
</script>
  </body>
</html>
