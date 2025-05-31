<?php
include '../Model/session.php';
include '../lang/lang.php';
include '../Model/allnotificationsDAO.php';
include '../Model/shopanalyticsDAO.php';
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>digisurf</title>
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

    <link rel="stylesheet" href="/Admin/plugins/iCheck/flat/_all.css">

    <style type="text/css">
      .item img {
        min-height: 150px;
      }

      .table img {
        width: 50px;
        height: 50px;
      }
      
    </style>

    <link rel="stylesheet" href="/Admin/Assets/css/skins/_all-skins.css">
    <link rel="stylesheet" href="/Admin/Assets/css/main.css">
    <link rel="stylesheet" href="/Admin/Assets/css/modal.css">
    <link rel="stylesheet" href="/Admin/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    
    <link rel="stylesheet" href="/Admin/plugins/morris/morris.css">

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
          <span class="logo-mini"><b>H</b>VR</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>digisurf</b></span>
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
            <!--<div class="input-group ui-widget">
              <input type="text" name="q" class="form-control" placeholder="Search..." id="tags">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>-->
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
            Shop Analytics
            <small><?php echo $current_website; ?></small>
          </h1>
          
        </section>

        <section class="content">


      <!-- MODAL -->
      <div class="modal-frame">
        <div class="modal">
              <div class="modal-inset" style="">
                  <div class="button close"><i class="fa fa-close"></i></div>
        
                  <div class="modal-body">

                    <div class="form-group">
                      <label>Product Name</label>
                      <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-pencil-square-o text-aqua"></i>
                      </div>
                      <input type="text" name="" class="form-control" value="<?php echo $entext1; ?>" placeholder="Page Title">
                    </div><!-- /.input group -->                       
                    </div>


                  </div>
              </div>
          </div>
      </div>
      <div class="modal-overlay"></div>
      <!-- MODAL -->




              <div class="row">

                <div class="col-md-6">



              <!-- solid sales graph -->
              <div class="box box-solid bg-teal-gradient">
                <div class="box-header">
                  <i class="fa fa-th"></i>
                  <h3 class="box-title">Sales Graph</h3>
                  <div class="box-tools pull-right">
                    <button class="btn bg-teal btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn bg-teal btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <div class="box-body border-radius-none">
                  <div class="chart with-transitions" id="line-chart" style="height: 250px;"></div>
                </div><!-- /.box-body -->
                <div class="box-footer no-border">
                  <div class="row">
                  </div><!-- /.row -->
                </div><!-- /.box-footer -->
              </div><!-- /.box -->

                  </div><!-- /.col -->


                <div class="col-md-6">

                    <!-- MAP & BOX PANE -->
                      <div class="box box-success">
                        <div class="box-header with-border">
                          <h3 class="box-title">Visitors Report</h3>
                          <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                          </div>
                        </div><!-- /.box-header -->
                        <div class="box-body no-padding">
                          <div class="row">
                            <div class="col-md-9 col-sm-8">
                              <div class="pad">
                                <!-- Map will be created here -->
                                <div id="world-map-markers" style="height: 325px;"></div>
                              </div>
                            </div><!-- /.col -->
                            <div class="col-md-3 col-sm-4">
                              <div class="pad box-pane-right bg-green" style="min-height: 280px">
                                <div class="description-block margin-bottom">
                                  <div class="sparkbar pad" data-color="#fff">90,70,90,70,75,80,70</div>
                                  <h5 class="description-header">8390</h5>
                                  <span class="description-text">Visits</span>
                                </div><!-- /.description-block -->
                                <div class="description-block margin-bottom">
                                  <div class="sparkbar pad" data-color="#fff">90,50,90,70,61,83,63</div>
                                  <h5 class="description-header">30%</h5>
                                  <span class="description-text">Referrals</span>
                                </div><!-- /.description-block -->
                                <div class="description-block">
                                  <div class="sparkbar pad" data-color="#fff">90,50,90,70,61,83,63</div>
                                  <h5 class="description-header">70%</h5>
                                  <span class="description-text">Organic</span>
                                </div><!-- /.description-block -->
                              </div>
                            </div><!-- /.col -->
                          </div><!-- /.row -->
                        </div><!-- /.box-body -->
                      </div><!-- /.box -->


                </div><!-- /.col -->

<?php 
/* PERCENTAGES
$x = 18; //total items
$y = 3; //items under total items

$percent = $x/$y;
$percent_friendly = number_format( $percent * 1, 2 ) . '%';
echo $percent_friendly;
*/
?>
              </div><!--row-->




              <div class="row">
          <!--<div class="col-md-12">
                <button type="button" class="extra-btn btn-success saver" style="float: right; right: 0;"><i class="fa fa-save"></i></button>
            </div>-->

                <div class="col-md-12">
                  
                </div><!-- /.col -->
              </div><!-- /.row -->



            

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
        <strong>Copyright &copy; <?php echo date('Y'); ?> <a href="http://www.digisurf.com/" target="_blank">digisurf</a>.</strong> All rights reserved.
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
    <script src="/Admin/Assets/js/app1.js"></script>
    <script src="/Admin/Assets/js/modal.js"></script>
    <script src="/Admin/plugins/slimScroll/jquery.slimscroll.min.js"></script>



    <!-- Morris.js charts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="/Admin/plugins/morris/morris.min.js"></script>
    <script src="/Admin/plugins/chartjs/Chart.min.js"></script>
    <script src="/Admin/plugins/iCheck/icheck.min.js"></script>

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>


    <!-- jvectormap -->
    <script src="/Admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="/Admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>


    <script src="/Admin/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="/Admin/plugins/datatables/dataTables.bootstrap.min.js"></script>

    <script src="/Admin/Assets/js/hover_side1.js"></script>


    <script type="text/javascript">
    $(document).ready(function() {
      $( function() {
        var availableTags = [
          "ActionScript",
          "AppleScript",
          "Asp",
          "BASIC",
          "C",
          "C++",
          "Clojure",
          "COBOL",
          "ColdFusion",
          "Erlang",
          "Fortran",
          "Groovy",
          "Haskell",
          "Java",
          "JavaScript",
          "Lisp",
          "Perl",
          "PHP",
          "Python",
          "Ruby",
          "Scala",
          "Scheme"
        ];
        $( "#tags" ).autocomplete({
          source: availableTags
        });
      });
    });


    $(function () {
        //Enable iCheck plugin for checkboxes
        //iCheck for checkbox and radio inputs
        $('#products input[type="checkbox"]').iCheck({
          checkboxClass: 'icheckbox_flat-blue',
          radioClass: 'iradio_flat-blue'
        });

        //Enable check and uncheck all functionality
        $(".checkbox-toggle").click(function () {
          var clicks = $(this).data('clicks');
          if (clicks) {
            //Uncheck all checkboxes
            $("#products input[type='checkbox']").iCheck("uncheck");
            $(".fa", this).removeClass("fa-check-square-o").addClass('fa-square-o');
          } else {
            //Check all checkboxes
            $("#products input[type='checkbox']").iCheck("check");
            $(".fa", this).removeClass("fa-square-o").addClass('fa-check-square-o');
          }
          $(this).data("clicks", !clicks);
        });

        
      });

    $("#example1").DataTable();
    $("#example2").DataTable();



    var line = new Morris.Line({
    element: 'line-chart',
    resize: true,
   /* data: [
      {y: '2011 Q1', item1: 2666},
      {y: '2011 Q2', item1: 2778},
      {y: '2011 Q3', item1: 4912},
      {y: '2011 Q4', item1: 3767},
      {y: '2012 Q1', item1: 6810},
      {y: '2012 Q2', item1: 5670},
      {y: '2012 Q3', item1: 4820},
      {y: '2012 Q4', item1: 15073},
      {y: '2013 Q1', item1: 10687},
      {y: '2013 Q2', item1: 8432}
    ],   */
    data: <?php echo json_encode($rows);?>,
    xkey: 'y',
    ykeys: ['item1'],
    labels: ['Products Sold'],
    lineColors: ['#efefef'],
    lineWidth: 2,
    hideHover: 'auto',
    gridTextColor: "#fff",
    gridStrokeWidth: 0.4,
    pointSize: 4,
    pointStrokeColors: ["#efefef"],
    gridLineColor: "#efefef",
    gridTextFamily: "Georgia",
    gridTextSize: 10
  });



    $('#world-map-markers').vectorMap({
    map: 'world_mill_en',
    normalizeFunction: 'polynomial',
    hoverOpacity: 0.7,
    hoverColor: false,
    backgroundColor: 'transparent',
    regionStyle: {
      initial: {
        fill: 'rgba(210, 214, 222, 1)',
        "fill-opacity": 1,
        stroke: 'none',
        "stroke-width": 0,
        "stroke-opacity": 1
      },
      hover: {
        "fill-opacity": 0.7,
        cursor: 'pointer'
      },
      selected: {
        fill: 'yellow'
      },
      selectedHover: {
      }
    },
    markerStyle: {
      initial: {
        fill: '#00a65a',
        stroke: '#111'
      }
    },
    markers: [
      {latLng: [41.90, 12.45], name: 'Vatican City'},
      {latLng: [43.73, 7.41], name: 'Monaco'},
      {latLng: [-0.52, 166.93], name: 'Nauru'},
      {latLng: [-8.51, 179.21], name: 'Tuvalu'},
      {latLng: [43.93, 12.46], name: 'San Marino'},
      {latLng: [47.14, 9.52], name: 'Liechtenstein'},
      {latLng: [7.11, 171.06], name: 'Marshall Islands'},
      {latLng: [17.3, -62.73], name: 'Saint Kitts and Nevis'},
      {latLng: [3.2, 73.22], name: 'Maldives'},
      {latLng: [35.88, 14.5], name: 'Malta'},
      {latLng: [12.05, -61.75], name: 'Grenada'},
      {latLng: [13.16, -61.23], name: 'Saint Vincent and the Grenadines'},
      {latLng: [13.16, -59.55], name: 'Barbados'},
      {latLng: [17.11, -61.85], name: 'Antigua and Barbuda'},
      {latLng: [-4.61, 55.45], name: 'Seychelles'},
      {latLng: [7.35, 134.46], name: 'Palau'},
      {latLng: [42.5, 1.51], name: 'Andorra'},
      {latLng: [14.01, -60.98], name: 'Saint Lucia'},
      {latLng: [6.91, 158.18], name: 'Federated States of Micronesia'},
      {latLng: [1.3, 103.8], name: 'Singapore'},
      {latLng: [1.46, 173.03], name: 'Kiribati'},
      {latLng: [-21.13, -175.2], name: 'Tonga'},
      {latLng: [15.3, -61.38], name: 'Dominica'},
      {latLng: [-20.2, 57.5], name: 'Mauritius'},
      {latLng: [26.02, 50.55], name: 'Bahrain'},
      {latLng: [0.33, 6.73], name: 'São Tomé and Príncipe'}
    ]
  });
    </script>



<script type="text/javascript">
$(document).ready(function() {
$(".direct-chat-messages").animate({ scrollTop: $('.direct-chat-messages').prop("scrollHeight")}, 3000); 
//CHAT AJax
    $(".chat-btn").click( function(event) {

    if ($('#message').val() != '') {
        $('.chat-form').submit();              

             var data = $(".chat-form :input").serialize();
                              $.ajax({
                                  type: "POST",
                                  url:"/Admin/Chat",
                                  data: data,
                                  success: function (response) {
                                  //alert("yes");
                                  $('.direct-chat-messages').html(response);
                                  //console.log(data);
                                  $('.direct-chat-messages').scrollTop($('.direct-chat-messages')[0].scrollHeight);
                                  },            
                                  error: function (jXHR, textStatus, errorThrown) {
                                     alert(errorThrown);               
                                  }
                              });

            event.preventDefault();
            clearInput();
    }

        });



        $(".chat-form").submit( function() {            
          return false;
        });
         
        function clearInput() {
            $("#message").each( function() {
               $(this).val('');
            });
            //$('.chat_id').val("<?php echo $current_user_id; ?>");
        }



        $('.chat_radios').click(function () {
          // body...
          //alert($(this).val());
          $("#item_to_get").val($(this).val());
        });

        
        function notify() {
                      if($("#item_to_get").val() != ''){
                          var to_id = $("#item_to_get").val();
                          var from_id = $('#chat_id').val();
                              $.ajax({
                                  type: "POST",
                                  url:"/Admin/ChatNotify",
                                  data: "to_id=" + to_id + "&from_id=" + from_id,
                                  success: function (response) {
                                  $('.direct-chat-messages').html(response);
                                  //$('.direct-chat-messages').scrollTop($('.direct-chat-messages')[0].scrollHeight);
                                  },            
                                  error: function (jXHR, textStatus, errorThrown) {
                                     alert(errorThrown);               
                                  }
                              });

                            }
        } 
        
        setInterval(function(){ notify(); }, 1000);
        
        
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
