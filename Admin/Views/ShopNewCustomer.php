<?php
include '../Model/session.php';
include '../lang/lang.php';
include '../Model/allnotificationsDAO.php';
include '../Model/shop_all_groupsDAO.php';
?>

<!DOCTYPE html>
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

    <!-- daterange picker -->
    <link rel="stylesheet" href="/Admin/plugins/daterangepicker/daterangepicker-bs3.css">

    <link rel="stylesheet" href="/Admin/plugins/iCheck/flat/_all.css">
    <link rel="stylesheet" href="/Admin/Assets/css/bootstrap-switch.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" href="/Admin/Assets/css/fileinput.css">

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
    
    <link rel="stylesheet" href="/Admin/plugins/morris/morris.css">

    <script src="/Admin/ckeditor/ckeditor.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <?php echo $hovver_icons;?>

    
<style type="text/css">
        .content .form-group {
          position: relative;
          width: 90%;
          margin: 2%;
          /*float: left;*/
          margin-left: 5%;
          text-align: left;
        }

        .content .form-group input[type='text'], .content .form-group input[type='email'], .content .form-group input[type='password'], .content .form-group input[type='tel'], select {
          position: relative;
          width: 90%;
        }

        .with-border {
          border-bottom: 1px solid #f4f4f4;
        }

        .modal-body1{
          overflow-x:hidden;
        }

        .bs-searchbox input {
          width: 100%;
        }

        .fileinput-remove {
          height: 35px;
        }

        .file-actions {
          display: none;
        }

        .file-caption {
          width: 15%!important;
        }

        .hideShowPassword-toggle {
          background-image: url(/Admin/Assets/img/wink.svg);
          background-position: 0 center;
          background-repeat: no-repeat;
          cursor: pointer;
          overflow: hidden;
          text-indent: -9999em;
          width: 44px;
          margin-top: 0px!important;
          height: 34px!important;
          z-index: 3;
          right: 10%!important;
          }
          .hideShowPassword-toggle-hide {
          background-position: -44px center;
          }

          .pass button {
          margin-top: 0px!important;
          z-index: 3!important;
          height: 34px!important;
          }

          .login-field-password {
            position: relative;
            width: 90%!important;
            z-index: 1!important;
          }

          .hideShowPassword-wrapper {
            width: 100%!important;
          }

    </style>


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
              <li><button title="Save All" data-tiggle="tooltip" type="button" class="extra-btn btn-success saver" style="float: right; right: 0;"><i class="fa fa-save"></i></button></li>
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
            New Customer
            <small><?php echo $current_website; ?></small>
          </h1>
          
        </section>

        <section class="content">

<form action="/Admin/AllShopCustomer" method="POST" enctype="multipart/form-data" accept-charset="utf-8">

      <!-- MODAL -->
      <div class="modal-frame">
        <div class="modal">
              <div class="modal-inset" style="">
                  <div class="button close"><i class="fa fa-close"></i></div>
        
                  <div class="modal-body">
                      <h3>Confirm</h3>
                      <p>Are you sure You want to make changes to this Page?</p>
                      <button type="submit" class="btn-success" name="create_project_submit">Submit</button>                      
                      <p class="ps"></p>
                  </div>
              </div>
          </div>
      </div>
      <div class="modal-overlay"></div>
<!-- MODAL -->


<?php 

$country_array = array("Afghanistan", "Aland Islands", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica", "Antigua", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Barbuda", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia", "Botswana", "Bouvet Island", "Brazil", "British Indian Ocean Trty.", "Brunei Darussalam", "Bulgaria", "Burkina Faso", "Burundi", "Caicos Islands", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "China", "Christmas Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo", "Congo, Democratic Republic of the", "Cook Islands", "Costa Rica", "Cote d'Ivoire", "Croatia", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands (Malvinas)", "Faroe Islands", "Fiji", "Finland", "France", "French Guiana", "French Polynesia", "French Southern Territories", "Futuna Islands", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guernsey", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Heard", "Herzegovina", "Holy See", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran (Islamic Republic of)", "Iraq", "Ireland", "Isle of Man", "Israel", "Italy", "Jamaica", "Jan Mayen Islands", "Japan", "Jersey", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea", "Korea (Democratic)", "Kuwait", "Kyrgyzstan", "Lao", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libyan Arab Jamahiriya", "Liechtenstein", "Lithuania", "Luxembourg", "Macao", "Macedonia", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "McDonald Islands", "Mexico", "Micronesia", "Miquelon", "Moldova", "Monaco", "Mongolia", "Montenegro", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "Nevis", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Palestinian Territory, Occupied", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland", "Portugal", "Principe", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russian Federation", "Rwanda", "Saint Barthelemy", "Saint Helena", "Saint Kitts", "Saint Lucia", "Saint Martin (French part)", "Saint Pierre", "Saint Vincent", "Samoa", "San Marino", "Sao Tome", "Saudi Arabia", "Senegal", "Serbia", "Seychelles", "Sierra Leone", "Singapore", "Slovakia", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia", "South Sandwich Islands", "Spain", "Sri Lanka", "Sudan", "Suriname", "Svalbard", "Swaziland", "Sweden", "Switzerland", "Syrian Arab Republic", "Taiwan", "Tajikistan", "Tanzania", "Thailand", "The Grenadines", "Timor-Leste", "Tobago", "Togo", "Tokelau", "Tonga", "Trinidad", "Tunisia", "Turkey", "Turkmenistan", "Turks Islands", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "Uruguay", "US Minor Outlying Islands", "Uzbekistan", "Vanuatu", "Vatican City State", "Venezuela", "Vietnam", "Virgin Islands (British)", "Virgin Islands (US)", "Wallis", "Western Sahara", "Yemen", "Zambia", "Zimbabwe");

$countrys = '';
foreach ($country_array as $key => $value) {
  # code...
  $countrys .= '<option value="'.$key.'">'.$value.'</option>';
  $countrys .= '<option value="'.$value.'">'.$value.'</option>';
}

?>

              <div class="row">

                <div class="col-md-12">


              <?php /*
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
                  <div class="chart" id="line-chart" style="height: 250px;"></div>
                </div><!-- /.box-body -->
                <div class="box-footer no-border">
                  <div class="row">
                  </div><!-- /.row -->
                </div><!-- /.box-footer -->
              </div><!-- /.box -->
              */?>

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

            <div class="col-md-6">

                    <div class="box box-solid">
                      <div class="box-header text-blue">                        
                          <i class="fa fa-user"></i>
                          <h3 class="box-title"> General Customer Info </h3>
                      </div><!-- /.box-header -->
              


                      <div class="box-body text-blue">

                        <div class="form-group">
                          <label>Social Title:</label>

                          <div class="row">

                          <div class="col-md-4">
                            <div class="input-group">
                              <div class="input-group-addon">
                                <i class="fa fa-male text-aqua"></i>
                              </div>
                              <input id="male" type="radio" style="opacity: 0;" id="" name="content_text1" value="Male" data-on-text="YES" data-off-text="NO" data-on-color="info" data-off-color="primary" checked>
                            </div><!-- /.input group -->  
                          </div>

                          <div class="col-md-4">
                            <div class="input-group">
                              <div class="input-group-addon">
                                <i class="fa fa-female text-fuchsia"></i>
                              </div>
                              <input id="female" type="radio" style="opacity: 0;" id="" name="content_text1" value="Female" data-on-text="YES" data-off-text="NO" data-on-color="info" data-off-color="primary"> 
                            </div><!-- /.input group -->   
                          </div>

                            </div>
                        </div>


                        <div class="form-group">
                          <label><font color="red">*</font> First Name:</label>
                          <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-pencil-square-o text-blue faa-wrench animated faa-slow"></i>
                          </div>
                          <input required type="text" id="" name="content_text2" class="form-control" value="" placeholder="Type here">
                        </div><!-- /.input group -->                       
                        </div>

                        <div class="form-group">
                          <label><font color="red">*</font> Last Name:</label>
                          <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-pencil-square-o text-blue faa-wrench animated faa-slow"></i>
                          </div>
                          <input required type="text" id="" name="content_text3" class="form-control" value="" placeholder="Type here">
                        </div><!-- /.input group -->                       
                        </div>

                        <div class="form-group">
                          <label><font color="red">*</font> Email:</label>
                          <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-envelope text-blue faa-wrench animated faa-slow"></i>
                          </div>
                          <input required type="email" id="" name="content_text4" class="form-control" value="" placeholder="Type here">
                        </div><!-- /.input group -->                       
                        </div>

                        <div class="form-group">
                          <label><font color="red">*</font> Password:</label>
                          <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-key text-blue faa-wrench animated faa-slow"></i>
                          </div>
                          <input required type="password" id="password" name="content_text5" class="login-field login-field-password form-control" placeholder="Password">
                        </div><!-- /.input group -->                       
                        </div>


                        <div class="form-group">
                          <label> DOB:</label>
                          <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar text-blue faa-wrench animated faa-slow"></i>
                          </div>
                          <input required type="text" name="content_text6" class="datepicker form-control">
                        </div><!-- /.input group -->                       
                        </div>

                        <div class="form-group">
                          <label><font color="red">*</font> Change Group:</label>
                          <div class="input-group">
                          <div class="input-group-addon" style="height: 40px;">
                            <i class="fa fa-users text-blue faa-wrench animated faa-slow"></i>
                          </div>
                          <select required type="text" name="content_text7" class="selectpicker form-control" data-width="90%">
                              <?php echo $all_groups_other;?>
                          </select>
                        </div><!-- /.input group -->                       
                        </div>

                        <div class="form-group">
                          <label><font color="red">*</font> User Type:</label>
                          <div class="input-group">
                          <div class="input-group-addon" style="height: 40px;">
                            <i class="fa fa-users text-blue faa-wrench animated faa-slow"></i>
                          </div>
                          <select required type="text" name="content_text15" class="selectpicker form-control" data-width="90%">
                              <option value="V">VIP</option>
                              <option value="M">Member</option>
                              <option value="R">Regular</option>
                              <option value="SWD">Senior Web Distributor</option>
                              <option value="IWD">Independent Web Distributor </option>

                          </select>
                        </div><!-- /.input group -->                       
                        </div>

                        <div class="form-group">
                          <label> Sponsor:</label>
                          <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-user text-blue faa-wrench animated faa-slow"></i>
                          </div>
                          <input type="text" name="content_text17" class="form-control">
                        </div><!-- /.input group -->                       
                        </div>

                       </div><!-- box-body-->
                    </div><!--box-->


            </div><!-- /.col -->

            <div class="col-md-6">

                    <div class="box box-solid">
                      <div class="box-header text-blue">                        
                          <i class="fa fa-map"></i>
                          <h3 class="box-title"> Address Info </h3>
                      </div><!-- /.box-header -->
              


                      <div class="box-body text-blue">
                        

                        <div class="form-group">
                          <label><font color="red">*</font> City:</label>
                          <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-map-signs text-blue faa-wrench animated faa-slow"></i>
                          </div>
                          <input required type="text" id="" name="content_text8" class="form-control" value="" placeholder="Type here">
                        </div><!-- /.input group -->                       
                        </div>

                        <div class="form-group">
                          <label><font color="red">*</font> Country:</label>
                          <div class="input-group">
                          <div class="input-group-addon" style="height: 40px;">
                            <i class="fa fa-flag text-blue faa-wrench animated faa-slow"></i>
                          </div>
                          <select required type="text" name="content_text9" class="selectpicker form-control" data-width="90%">
                              <?php echo $countrys;?>
                          </select>
                        </div><!-- /.input group -->                       
                        </div>

                        <div class="form-group">
                          <label><font color="red">*</font> Address:</label>
                          <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-road text-blue faa-wrench animated faa-slow"></i>
                          </div>
                          <input required type="text" id="" name="content_text10" class="form-control" value="" placeholder="Type here">
                        </div><!-- /.input group -->                       
                        </div>

                        <div class="form-group">
                          <label> Address(2):</label>
                          <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-map-marker text-blue faa-wrench animated faa-slow"></i>
                          </div>
                          <input required type="text" id="" name="content_text11" class="form-control" value="" placeholder="Type here">
                        </div><!-- /.input group -->                       
                        </div>

                        <div class="form-group">
                          <label> Address(3):</label>
                          <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-location-arrow text-blue faa-wrench animated faa-slow"></i>
                          </div>
                          <input required type="text" id="" name="content_text12" class="form-control" value="" placeholder="Type here">
                        </div><!-- /.input group -->                       
                        </div>

                        <div class="form-group">
                          <label><font color="red">*</font> LandLine Phone:</label>
                          <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-phone text-blue faa-wrench animated faa-slow"></i>
                          </div>
                          <input required type="text" name="content_text13" class="form-control">
                        </div><!-- /.input group -->                       
                        </div>

                        <div class="form-group">
                          <label><font color="red">*</font> Mobile Phone:</label>
                          <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-mobile-phone text-blue faa-wrench animated faa-slow"></i>
                          </div>
                          <input required type="text" name="content_text14" class="form-control">
                        </div><!-- /.input group -->                       
                        </div>


                        <div class="form-group">
                          <label>Approve this customer: <small>(Allow Front-end Login by this Customer)</small></label>
                          <div class="input-group">
                          <div class="input-group-addon" style="height: 40px;">
                            <i class="fa fa-check-square-o text-blue faa-wrench animated faa-slow"></i>
                          </div>
                          <select required type="text" name="content_text16" class="selectpicker form-control" data-width="90%">
                              <option value="Y">YES</option>
                              <option value="N">No</option>
                          </select>
                        </div><!-- /.input group -->                       
                        </div>



                       </div><!-- box-body-->
                    </div><!--box-->


            </div><!-- /.col -->
          </div><!-- /.row -->

          </form>

          </section>


<div id="LoadingImage" style="display: none">
    <div class="loader__figure"></div>
</div>

<?php
function currencyConverter($currency_from,$currency_to,$currency_input){
    $yql_base_url = "http://query.yahooapis.com/v1/public/yql";
    $yql_query = 'select * from yahoo.finance.xchange where pair in ("'.$currency_from.$currency_to.'")';
    $yql_query_url = $yql_base_url . "?q=" . urlencode($yql_query);
    $yql_query_url .= "&format=json&env=store%3A%2F%2Fdatatables.org%2Falltableswithkeys";
    $yql_session = file_get_contents($yql_query_url);
    $yql_json =  json_decode($yql_session,true);
    $currency_output = (float) $currency_input*$yql_json['query']['results']['rate']['Rate'];

    return $currency_output;
}

 $currency_input = 30.00;
 //currency codes : http://en.wikipedia.org/wiki/ISO_4217
 $currency_from = "USD";
 $currency_to = "TWD";
 $currency = currencyConverter($currency_from,$currency_to,$currency_input);

 $currency_input.' '.$currency_from.' = '.$currency.' '.$currency_to.'<br>';

?>




          <?php
          /*
//$user_ip = getenv('REMOTE_ADDR');
//$user_ip = "220.133.169.57";
$user_ip = "1.171.182.185";
$geo = unserialize(file_get_contents("http://www.geoplugin.net/php.gp?ip=$user_ip"));
$city = $geo["geoplugin_city"];
$region = $geo["geoplugin_regionName"];
$country = $geo["geoplugin_countryName"];
$lat = $geo["geoplugin_latitude"];
$long = $geo["geoplugin_longitude"];
$curr = $geo["geoplugin_currencyConverter"];
$sym = $geo["geoplugin_currencySymbol"];
$code = $geo["geoplugin_currencyCode"];
echo "City: ".$city."<br>";
echo "Region: ".$region."<br>";
echo "Country: ".$country."<br>";
echo "lat: ".$lat."<br>";
echo "long: ".$long."<br>";
echo "curr: ".$sym.$curr."<br>";
echo "currCode: ".$code."<br>";
*/


/*
geoplugin_request
geoplugin_status
geoplugin_credit
geoplugin_city
geoplugin_region
geoplugin_areaCode
geoplugin_dmaCode
geoplugin_countryCode
geoplugin_countryName
geoplugin_continentCode
geoplugin_latitude
geoplugin_longitude
geoplugin_regionCode
geoplugin_regionName
geoplugin_currencyCode
geoplugin_currencySymbol
geoplugin_currencySymbol_UTF8
geoplugin_currencyConverter
*/
?>

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
    <script src="/Admin/Assets/js/app1.js"></script>
    <script src="/Admin/Assets/js/modal.js"></script>
    <script src="/Admin/plugins/slimScroll/jquery.slimscroll.min.js"></script>


    <!-- Morris.js charts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="/Admin/plugins/morris/morris.min.js"></script>
    <script src="/Admin/plugins/chartjs/Chart.min.js"></script>
    <script src="/Admin/plugins/iCheck/icheck.min.js"></script>

    <!--<link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">-->
    <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>


    <script src="/Admin/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="/Admin/plugins/datatables/dataTables.bootstrap.min.js"></script>
    <script src="/Admin/Assets/js/bootstrap-switch.min.js"></script>

    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>



<script src="/Admin/Assets/js/moment.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
<script src="/Admin/plugins/daterangepicker/daterangepicker.js"></script>
<script src="/Admin/Assets/js/fileinput.js"></script>
<script src="/Admin/Assets/js/purify.js"></script>
    <script src="/Admin/Assets/js/hover_side1.js"></script>

<script src="/Admin/Assets/js/hideShowPassword.min.js"></script>



<script>
    $(document).on('ready', function() {
    $("#input-23").fileinput({
        showUpload: false,
        layoutTemplates: {
            main1: "{preview}\n" +
            "<div class=\'input-group {class}\'>\n" +
            "   <div class=\'input-group-btn\'>\n" +
            "       {browse}\n" +
            "       {upload}\n" +
            "       {remove}\n" +
            "   </div>\n" +
            "   {caption}\n" +
            "</div>"
        },
        purifyHtml: true, // this by default purifies HTML data for preview
        overwriteInitial: false,
        previewFileType: "image",
        browseClass: "btn btn-success"
    });

});

    $('#password').hideShowPassword({
      innerToggle: true
    });
</script>



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
        $('#options input[type="checkbox"]').iCheck({
          checkboxClass: 'icheckbox_flat-green',
          radioClass: 'iradio_flat-green'
        });

        //Enable check and uncheck all functionality
        $(".checkbox-toggle").click(function () {
          var clicks = $(this).data('clicks');
          if (clicks) {
            //Uncheck all checkboxes
            $("#options input[type='checkbox']").iCheck("uncheck");
            $(".fa", this).removeClass("fa-check-square-o").addClass('fa-square-o');
          } else {
            //Check all checkboxes
            $("#options input[type='checkbox']").iCheck("check");
            $(".fa", this).removeClass("fa-square-o").addClass('fa-check-square-o');
          }
          $(this).data("clicks", !clicks);
        });

        
      });

    $("#example1").DataTable();
    $('#example2').DataTable({
          "paging": false,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });




    window.preview = function (input) {
    if (input.files && input.files[0]) {
        $(input.files).each(function () {
            var reader = new FileReader();
            reader.readAsDataURL(this);
            reader.onload = function (e) {
                //$('.page-none-in-relative h3, .page-none-in-relative p').hide();
                //$(".page-none-in").append("<img class='thumb' src='" + e.target.result + "'>");
                $("#images-in").append("<div class=\"project-list\" ><img class='thumb' src='" + e.target.result + "'></div>");
                }
            });
        }
    }


    $("[name='content_text1']").bootstrapSwitch();



    $('.selectpicker').selectpicker({
        style: 'btn-primary',
        size: 3
      });


    $(function () {
        $('.datepicker').datetimepicker({
          format: 'YYYY/MM/DD'
        });
    });


    //Date range picker with time picker
        $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'YYYY/MM/DD h:mm A'});

    
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
