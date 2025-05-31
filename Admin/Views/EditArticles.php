<?php
include '../Model/allnotificationsDAO.php';
include '../lang/lang.php';
include '../Model/editblogDAO.php';
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
    <link rel="stylesheet" href="/Admin/Assets/css/modal1.css">
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
              <li><button type="button" class="image-btn extra-btn btn-warning">Manage Images</button></li>
              <li><button title="Save All" data-tiggle="tooltip" type="button" class="extra-btn btn-success save-btn" style="float: right; right: 0;"><i class="fa fa-save"></i></button></li>
                <li class="dropdown" >
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" title="Add New Language"><?php echo $lang_result; ?> <span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                    <?php echo $news_group_active_language; ?>
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
            <li class="treeview menu-open active">
              <a href="#"><i class="fa fa-newspaper-o"></i> <span>Manage Articles</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu menu-open">
                <li><a href="/Admin/AddArticles"><i class="fa fa-keyboard-o"></i>Create An Article</a></li>
                <li class="active"><a href="/Admin/ViewAllArticles/" style="color:white;"><i class="fa fa-tv text-lime"></i>View All Articles<span class="label label-primary pull-right"><?php echo $allblogs_idx; ?></span></a></li>
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
            Edit Article
            <small><?php echo $current_website; ?></small>
          </h1>
          
        </section>
        <section class="content">



          <div class="row">

        <div class="col-md-6" >
<!-- General Settings -->
          <div class="box box-solid">
            <div class="box-header">
              <h3 class="box-title">Article Category Settings</h3>
                  <div class="pull-right box-tools">
                    <button class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                    <!--<button class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>-->
                  </div><!-- /. tools -->
            </div><!-- /.box-header -->
            <div class="box-body pad">
                <form id="categ-form-1" method="post">
                    <div class="form-group">
                    <label>Choose Action</label>
                    <div class="input-group">                      
                      <select class="selectpicker" name="selected_option" id="form-select-1">
                          <option>Nothing selected</option>
                          <option value="0">Add Articles Category</option>
                          <option value="<?php echo $idx; ?>">Remove Articles Category</option>
                        <?php //echo $categories; ?>                 
                      </select>
                      </div><!-- /.input group -->  
                    </div>
                    <input type="hidden" value="<?php echo $idx; ?>" id="test-input" name="test-input" > 
                </form>

                <form id="categ-form-2" method="POST" action="/Admin/AllArticles">
                    <div class="form-group" id="action">
                    <label>Add Or Remove Article Category</label>
                    <div class="input-group">   
                      <select class="selectpicker" name="selected_category" id="form-select-2"> <!-- multiple="multiple"-->
                                            
                      </select>
                        
                      </div>
                      <input type="hidden" value="" id="selected_option" name="selected_option">
                      <input type="hidden" value="<?php echo $idx; ?>" name="project_id" >
                    </div>

                    <div class="form-group">                      
                      <div class="input-group">
                      <input style="margin-left: 0%; width: 248px; height: 30px;" type="submit" value="Submit" class="extra-btn btn-success" name="category_test">
                    </div><!-- /.input group -->                       
                    </div>
                </form>

                                                          

                </div><!-- box-body -->            
          </div><!-- /.box -->
          <!-- General Settings -->


          </div><!-- col -->

          <div class="col-md-6" >
          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Categories Containing This Article</h3>
                  <div class="pull-right box-tools">
                    <button class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                    <!--<button class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>-->
                  </div><!-- /. tools -->
            </div><!-- /.box-header -->
            <div class="box-body pad">                

                    <dl class="dl-horizontal">
                        <dt>Category List</dt>
                        <dd><?php echo $current_categories;?></dd>
                    </dl>
                                                          

                </div><!-- box-body -->            
          </div><!-- /.box -->
          <!-- General Settings -->
          </div><!-- col -->

          </div><!-- row -->






        <!-- MODAL -->
      <div class="modal-frame1">
        <div class="modal1">
              <div class="modal-inset" style="">
              Please select images to delete
                  <div class="button close"><i class="fa fa-close"></i></div>

                  <form action="/Admin/AllArticles" method="POST">
        
                  <div class="modal-body1">
                      <div class="">
                          <div style="position: relative; float: left; width: 210px; margin-top: 10px;">
                              <input type="hidden" name="check_image1" value="no"> 
                              <input type="checkbox" name="check_image1" value="yes" class="mycheckbox">
                              <img src="<?php echo $enimage1; ?>" style="width: 200px; height: 150px;" name="image1" class="checkimage">
                          </div>
                      </div>
                      <p class="ps"></p>
                  </div>
                  <input type="hidden" value="<?php echo $idx; ?>" name="blog_id">
                  <input type="submit" value="Delete All Selected" name="delete_images" class="extra-btn btn-danger" style="margin-top: 20px"> 
                  </form>
              </div>
          </div>
      </div>
      <div class="modal-overlay1"></div>
<!-- MODAL -->



<form id="allform" action="/Admin/AllArticles" method="POST" enctype="multipart/form-data" accept-charset="utf-8">
<!-- MODAL -->
      <div class="modal-frame">
        <div class="modal">
              <div class="modal-inset" style="">
                  <div class="button close"><i class="fa fa-close"></i></div>
        
                  <div class="modal-body">
                      <h3>Confirm</h3>
                      <p>Are you sure You want to make changes to this Project?</p>
                      <!--<button type="submit" class="btn btn-danger" name="delete_project_submit" >Delete Project</button> -->
                      <div class="btn-cover-wrap">
                            <div class="btn-back">
                              <p>Are you sure you want to do that?</p>
                              <button class="yes" type="button" ><input type="submit" value="Yes" name="delete_project_submit" class="btn" > </button>
                              <button class="no" type="button">No</button>
                            </div>
                            <div class="btn-front">Delete</div>
                      </div>
                      <button type="submit" class="btn-success" name="edit_project_submit">Confirm Changes</button>                      
                                            
                      <p class="ps"></p>
                  </div>
              </div>
          </div>
      </div>
      <div class="modal-overlay"></div>
<!-- MODAL -->
                      
<input type="hidden" id="first_misc" value="<?php echo $a; ?>" name="a">
<input type="hidden" value="<?php echo $idx; ?>" name="blog_id">
        

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

                   <div class="form-group" style="width: 95%;">
                      <label>Featured Image </label>
                      <input type="file" name="article_image1">
                      <img src="<?php echo $enimage1; ?>">
                    </div>

                    <div class="form-group">
                      <label>Featured Article Title</label>
                      <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-pencil-square-o text-lime faa-wrench animated faa-slow"></i>
                      </div>
                      <input id="entitle" type="text" name="content_entext1" class="form-control"  placeholder="Featured Article Title" value="<?php echo $entext1; ?>">
                    </div><!-- /.input group -->                      
                    </div>

                    <div class="form-group">
                      <label>Short Description</label>
                      <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-pencil-square-o text-lime faa-wrench animated faa-slow"></i>
                      </div>
                      <textarea rows="3" name="content_entext2" class="form-control" placeholder="Short Description"><?php echo $entext2; ?></textarea>
                    </div><!-- /.input group -->                      
                    </div> 

                    <div class="form-group" style="width: 95%; margin-left: 2%;">
                      <label>Article Content</label>
                      <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-keyboard-o"></i>
                      </div>
                      <textarea class="form-control" id="article_content" rows="3" name="content_entext3" placeholder="Article Content"><?php echo $entext3; ?></textarea>
                    </div><!-- /.input group -->                       
                    </div>          


                  <script type="text/javascript">
                      CKEDITOR.replace( 'article_content' );
                  </script>

                  <?php echo "<script>CKEDITOR.instances.article_content.setData('".mysql_real_escape_string($entext3, $conn)."')</script>"; ?>
                    

                  
                </div><!-- box-body -->
            
          </div><!-- /.box -->
          <!-- Content Settings -->

<?php /*
          <!-- Content Settings -->
          <div class="box box-solid">
            <div class="box-header">
              <h3 class="box-title">Rating Data</h3>
                  <div class="pull-right box-tools">
                    <button class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                    <!--<button class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>-->
                  </div><!-- /. tools -->
            </div><!-- /.box-header -->
            <div class="box-body pad">                  

                   <div class="table-responsive mailbox-messages">
                <table class="table table-striped">
                  <tbody>

                    <tr>
                    <td class="mailbox-name">Student Name</td>
                    <td class="mailbox-subject">Feedback</td>
                    <td class="mailbox-attachment">Class Name</td>
                    <td class="mailbox-date">Class Date/Time</td>
                    <td class="mailbox-date">Rating
                      <td class="mailbox-star"><i class="fa fa-star text-green"></i></td>
                      <td class="mailbox-star"><i class="fa fa-star text-green"></i></td>
                      <td class="mailbox-star"><i class="fa fa-star text-green"></i></td>
                      <td class="mailbox-star"><i class="fa fa-star text-green"></i></td>
                      <td class="mailbox-star"><i class="fa fa-star text-green"></i></td>

                    </td>
                  </tr>
                  

                  <?php echo $rates;?>

                  <!-- <tr>
                    <td class="mailbox-name">student Name</td>
                    <td class="mailbox-subject">content description</td>
                    <td class="mailbox-attachment"></td>
                    <td class="mailbox-date">class time/created time</td>
                    <td class="mailbox-date">stars 
                      <td class="mailbox-star"><a href="#"><i class="fa fa-star text-yellow"></i></a></td>
                      <td class="mailbox-star"><a href="#"><i class="fa fa-star text-yellow"></i></a></td>
                      <td class="mailbox-star"><a href="#"><i class="fa fa-star text-yellow"></i></a></td>
                      <td class="mailbox-star"><a href="#"><i class="fa fa-star text-yellow"></i></a></td>
                      <td class="mailbox-star"><a href="#"><i class="fa fa-star text-yellow"></i></a></td>

                    </td>
                  </tr> -->
                  
                  </tbody>
                </table>
                <!-- /.table -->
              </div>
                    

                  
                </div><!-- box-body -->
            
          </div><!-- /.box -->
          <!-- Content Settings -->


          */ ?>
          
        

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

    <!-- Optionally, you can add Slimscroll and FastClick plugins.
         Both of these plugins are recommended to enhance the
         user experience. Slimscroll is required when using the
         fixed layout. -->
         
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>



<script src="/Admin/Assets/js/moment.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>

<script src="/Admin/Assets/js/hover_side1.js"></script>

<script type="text/javascript">
  $(function () {
      $('.datepicker').datetimepicker({
        format: 'YYYY/MM/DD'
      });
  });
</script>

<script type="text/javascript">
$('.selectpicker').selectpicker({
      style: 'btn-default',
      size: 3
    });



//AJAX
$(document).ready(function(){

$(".second_misc").val($('#first_misc').val());

$("#categ-form-1").submit(function(event){
    // cancels the form submission
    event.preventDefault();
    submitForm();   
});

function submitForm(){
   var name = $("#form-select-1").val();
   var testinput = $("#test-input").val();

  //$("#form-select-1").val($("#form-select-1 option:eq(1)").val())
   if(name==0) {
            $.ajax({
                    type: "POST",
                    url:"/Admin/AddTag",
                    data: "test-input=" + testinput,
                    success: function (response) {
                    //alert(testinput);  
                    //console.log(response);
                    $("#form-select-2").find('option').remove().end().append(response).val($("#form-select-2 option:first").val()).selectpicker('refresh');
                    },            
                    error: function (jXHR, textStatus, errorThrown) {
                       alert(errorThrown);               
                    }
                });
        } //if 
     else if (name==<?php echo $idx; ?>) {
      $.ajax({
                    type: "POST",
                    url:"/Admin/RemoveTag",
                    data: "selected_option=" + name,
                    success: function (response) {
                    //alert(response);  
                    //console.log(response);
                    $("#form-select-2").find('option').remove().end().append(response).val($("#form-select-2 option:first").val()).selectpicker('refresh');
                    },            
                    error: function (jXHR, textStatus, errorThrown) {
                       alert(errorThrown);               
                    }
                });
     }
}
function formSuccess(){
    $( "#msgSubmit" ).removeClass( "hidden" );
}



$("#form-select-1").on('change', function(e) {
  $("#categ-form-1").submit();
  $("#selected_option").val($(this).val());
});


$("#allform").submit(function(event){
if($('#entitle').val() == ''){
    alert("News Title Cannot be Empty");
    $('#entitle').focus();
    $(".modal-overlay").removeClass('state-show');
    $(".modal-frame").removeClass('state-appear').addClass('state-leave');
      return false;   
  }
if($('#zhtitle').val() == ''){
    alert("News Title Cannot be Empty");
    $('#zhtitle').focus();
    $(".modal-overlay").removeClass('state-show');
    $(".modal-frame").removeClass('state-appear').addClass('state-leave');
      return false;   
  }
});


$('input').keydown(function(event){
    if(event.keyCode == 13) {
      event.preventDefault();
      return false;
    }
  });

});
</script>


<script type="text/javascript">
  $('.loadin').click(function () {
    // body...
    $("#LoadingImage").show();
  });
</script>
  </body>
</html>
