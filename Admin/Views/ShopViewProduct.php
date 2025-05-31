<?php
include '../Model/session.php';
include '../lang/lang.php';
include '../Model/allnotificationsDAO.php';
include '../Model/shop_view_productDAO.php';
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>hi</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="/Admin/Assets/css/bootstrap.css">
    <!-- Font Awesome -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <link rel="stylesheet" href="/Admin/plugins/select2/select2.min.css">
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
    <link rel="stylesheet" href="/Admin/Assets/css/bootstrap-tagsinput.css">

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

        .content .form-group input[type='text'] {
          position: relative;
          width: 50%;
        }

        .content .form-group input[type='number'] {
          position: relative;
          width: 50%;
        }

        .with-border {
          border-bottom: 1px solid #f4f4f4;
        }

        .modal-body1{
          overflow-x:hidden;
        }

        .bs-searchbox input {
          width: 100%!important;
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
        
        blockquote {
          -webkit-transition: transform 0.2s ease-in-out box-shadow 0.2s;
             -moz-transition: transform 0.2s ease-in-out box-shadow 0.2s;
            -ms-transition: transform 0.2s ease-in-out box-shadow 0.2s;
             -o-transition: transform 0.2s ease-in-out box-shadow 0.2s;
              transition: transform 0.2s ease-in-out, box-shadow 0.2s;
          -webkit-box-shadow: 0 0px 0px 0 rgba(0,0,0,0.15);
              box-shadow: 0 0px 0px 0 rgba(0,0,0,0.15);
          -webkit-transform:scale(1) translateY(-0px);
             -moz-transform:scale(1) translateY(-0px);
             -o-transform:scale(1) translateY(-0px);
            -ms-transform:scale(1) translateY(-0px);
              transform:scale(1) translateY(-0px);
        }

        blockquote:hover {
          background: rgba(0,0,0,0.1);
          -webkit-box-shadow: 0 10px 20px 0 rgba(0,0,0,0.2);
                  box-shadow: 0 10px 20px 0 rgba(0,0,0,0.2);
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
          <span class="logo-mini"><b>2h</b>-f</span>
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
            <?php echo $product_name; ?>
            <small><?php echo $current_website; ?></small>
          </h1>
          
        </section>

        <section class="content">


        <!-- General Settings -->
          <div class="box box-solid">
            <div class="box-header">
              <h3 class="box-title">Product Category Settings</h3>
                  <div class="pull-right box-tools">
                    <button class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                    <!--<button class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>-->
                  </div><!-- /. tools -->
            </div><!-- /.box-header -->
            <div class="box-body pad">
            <form id="categ-form-1" method="post">
                    <div class="form-group" style="width: 20%; ">
                    <label>Choose Action</label>
                    <div class="input-group">                      
                      <select class="selectpicker" name="selected_option" id="form-select-1">
                          <option>Nothing selected</option>
                          <option value="0">Add this product to a Category</option>
                          <option value="<?php echo $product_id; ?>">Remove this product from a Category</option>
                        <?php //echo $categories; ?>                 
                      </select>
                      </div><!-- /.input group -->  
                      <input type="hidden" value="<?php echo $product_id; ?>" id="test-input" name="test-input" > 
                    </div>
                    
                </form>

                <form id="categ-form-2" method="POST" action="/Admin/AllShopProduct">
                    <div class="form-group" id="action">
                    <label>Add Or Remove Product Category</label>
                    <div class="input-group">   
                      <select class="selectpicker" name="selected_category" id="form-select-2"> <!-- multiple="multiple"-->
                                            
                      </select>
                        <input type="submit" value="Submit" class="extra-btn btn-success" name="category_test">
                      </div>
                      <input type="hidden" value="" id="selected_option" name="selected_option" > 
                      <input type="hidden" value="<?php echo $product_id; ?>" name="project_id" >
                    </div>
                </form>
            </div><!-- box-body -->            
          </div><!-- /.box -->
          <!-- General Settings -->




          
<form action="/Admin/AllShopProduct" method="POST" enctype="multipart/form-data" accept-charset="utf-8">

<input type="hidden" name="product_id" value="<?php echo $product_id;?>">

      <!-- MODAL -->
      <div class="modal-frame">
        <div class="modal">
              <div class="modal-inset" style="">
                  <div class="button close"><i class="fa fa-close"></i></div>
        
                  <div class="modal-body">
                      <h3>Confirm</h3>
                      <p>Are you sure You want to make changes to this Page?</p>
                      
                      <div class="btn-cover-wrap">
                            <div class="btn-back">
                              <p>Are you sure you want to do that?</p>
                              <button class="yes" type="button" ><input type="submit" value="Yes" name="delete_project_submit" class="btn" > </button>
                              <button class="no" type="button">No</button>
                            </div>
                            <div class="btn-front">Delete</div>
                      </div> 
                      <button type="submit" class="btn-success" name="edit_product_submit">Confirm Changes</button>   

                      <p class="ps"></p>
                  </div>
              </div>
          </div>
      </div>
      <div class="modal-overlay"></div>
<!-- MODAL -->




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
          <!--<div class="col-md-12">
                <button type="button" class="extra-btn btn-success saver" style="float: right; right: 0;"><i class="fa fa-save"></i></button>
            </div>-->

            <div class="col-md-12">
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">

                  <li class="active"><a class="text-teal" href="#general" data-toggle="tab">General</a></li>
                  <li><a class="text-black" href="#pricing" data-toggle="tab">Pricing</a></li>
                  <li><a class="text-aqua" href="#discount" data-toggle="tab">Discount</a></li>
                  <li ><a class="text-yellow" href="#seo" data-toggle="tab">SEO</a></li>
                  <li><a class="text-blue" href="#shipping" data-toggle="tab">Shipping</a></li>
                  <li><a class="text-maroon" href="#images" data-toggle="tab">Images</a></li>
                  <!--<li><a class="text-green" href="#categories" data-toggle="tab">Categories</a></li>-->
                  <!--<li><a class="text-black" href="#reviews" data-toggle="tab">Reviews</a></li>-->
                        <div class="pull-right box-tools">
                          <button type="button" class="btn-flat btn-danger save-btn" style=""><i class="fa fa-trash"></i> Delete Product</button>                          
                        </div>
                </ul>
                <div class="tab-content" style="min-height: 300px;">



                  <div class="tab-pane active" id="general">  
                      <div class="box-header with-border text-teal">                        
                          <h3 class="box-title"><i class="fa fa-info"></i> INFORMATION</h3>
                      </div><!-- /.box-header -->  

                      <div class="box-body text-teal">


                            <div class="form-group" style="width: 95%;">
                              <label>Product Main Image</label>
                              <input type="file" name="product_image1">
                              <img src="<?php echo $product_image; ?>">
                            </div>
                            
                            <div class="form-group">
                                <label>Product Name:<small class="label label-danger">Cannot be duplicate</small></label>
                                <div class="input-group">
                                <div class="input-group-addon">
                                  <i class="fa fa-pencil-square-o text-teal faa-wrench animated faa-slow"></i>
                                </div>
                                <input type="text" id="prod_name" name="content_text1" class="form-control" value="<?php echo $product_name; ?>" placeholder="Product Name">
                              </div><!-- /.input group -->                       
                              </div>


                              <div class="form-group">
                                <label>SKU (Stock Keeping Unit):</label>
                                <div class="input-group">
                                <div class="input-group-addon">
                                  <i class="fa fa-bank text-teal faa-wrench animated faa-slow"></i>
                                </div>
                                <input type="text" id="" name="content_text2" class="form-control" value="<?php echo $product_sku; ?>" placeholder="SKU (Stock Keeping Unit)">
                              </div><!-- /.input group -->                       
                              </div>


                              <div class="form-group with-border">
                                <label>Barcode(UPC, EAN, JAN, ISBN, MPN, etc.):</label>
                                <div class="input-group">
                                <div class="input-group-addon">
                                  <i class="fa fa-barcode text-teal faa-wrench animated faa-slow"></i>
                                </div>
                                <input type="text" id="" name="content_text3" class="form-control" value="<?php echo $product_barcode; ?>" placeholder="Barcode(UPC, EAN, JAN, ISBN, MPN, etc.)">
                              </div><!-- /.input group -->                       
                              </div>


                              <div class="form-group">
                                <label>Status (visible/invisible):</label>
                                <div class="input-group">
                                <input name="content_text4" value="N" type="hidden">
                                <?php echo $new_status;?>
                              </div><!-- /.input group -->                       
                              </div>

<?php /*
                              <div id="options" class="form-group with-border">
                                <label>Options:</label>
                                <div class="input-group">
                                <label for="option1"><input id="option1" style="opacity: 0;" type="checkbox" name="" class="" checked>  Available for Order</label>
                              </div><!-- /.input group -->     

                              <div class="input-group">
                                <label for="option2"><input id="option2" style="opacity: 0;" type="checkbox" name="" class="" checked>  Show Price</label>
                              </div><!-- /.input group -->  

                              <div class="input-group">
                                <label for="option3"><input id="option3" style="opacity: 0;" type="checkbox" name="" class="">  Online only (not sold in your retail store)</label>
                              </div><!-- /.input group -->                    
                              </div>

*/ ?>

                              <div class="form-group">
                                <label>Quantity:</label>
                                <div class="input-group">
                                <div class="input-group-addon">
                                  <i class="fa fa-balance-scale text-teal faa-wrench animated faa-slow"></i>
                                </div>
                                <input type="text" id="" name="content_text6" class="form-control" value="<?php echo $product_quantity; ?>" placeholder="000">
                              </div><!-- /.input group -->                       
                              </div>

                              <div class="form-group">
                                <label>Related Products</label>
                                <select class="form-control select2" multiple="multiple" data-placeholder="Select Products" style="width: 90%;" name="content_text24[]">
                                  <?php echo $existing_products;?>
                                  <?php echo $all_products;?>
                                </select>
                              </div><!-- /.form-group -->



                              <div class="form-group with-border">
                                <label>Product Description:</label>
                                <div class="input-group">
                                <textarea id="p" class="form-control" rows="3" name="content_text7" placeholder="Product Description"></textarea>
                              </div><!-- /.input group -->                      
                              </div>

                              <script type="text/javascript">
                                CKEDITOR.replace( 'p' );
                            </script>
                            <?php echo "<script>CKEDITOR.instances.p.setData('".mysql_real_escape_string($product_description, $conn)."')</script>"; ?>



                            <div class="form-group">
                                <label>Tags:</label>
                                <div class="input-group">
                                <div class="input-group-addon">
                                  <i class="fa fa-tags text-teal faa-wrench animated faa-slow"></i>
                                </div>
                                <input type="text" style="width: 100%;" data-role="tagsinput" name="content_text8" class="form-control mytagsinput" value="<?php echo $product_tag; ?>"> 
                                
                              </div><!-- /.input group --> 
                              <label class="text-black">10 Maximum Tags Allowed. Each tag has to be followed by a comma. The following characters are forbidden: !<;>;?=+#"°{}_$%&/\.</label>                      
                              </div>


                        <div class="form-group">
                          <label> Additional Info 1:</label>
                          <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-info text-blue faa-wrench animated faa-slow"></i>
                          </div>
                          <input type="text" id="" name="content_text17" class="form-control" placeholder="Type here" value="<?php echo $product_text17;?>">
                        </div><!-- /.input group -->                       
                        </div>

                        <div class="form-group with-border" style="width: 95%;">
                                <label>Additional Info 1 Description:</label>
                                <div class="input-group"> 
                                <textarea id="p1" class="form-control" rows="3" name="content_text18" placeholder=""></textarea>
                              </div><!-- /.input group -->                      
                        </div>

                              <script type="text/javascript">
                                CKEDITOR.replace( 'p1' );
                            </script>
                          <?php echo "<script>CKEDITOR.instances.p1.setData('".mysql_real_escape_string($product_text18, $conn)."')</script>"; ?>


                          <div class="form-group">
                          <label> Additional Info 2:</label>
                          <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-info text-blue faa-wrench animated faa-slow"></i>
                          </div>
                          <input type="text" id="" name="content_text19" class="form-control" placeholder="Type here" value="<?php echo $product_text19;?>">
                        </div><!-- /.input group -->                       
                        </div>



                          <div class="form-group">
                          <label> Additional Info 3:</label>
                          <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-info text-blue faa-wrench animated faa-slow"></i>
                          </div>
                          <input type="text" id="" name="content_text20" class="form-control" placeholder="Type here" value="<?php echo $product_text20;?>">
                        </div><!-- /.input group -->                       
                        </div>

                        <div class="form-group with-border" style="width: 95%;">
                                <label>Additional Info 3 Description:</label>
                                <div class="input-group"> 
                                <textarea id="p2" class="form-control" rows="3" name="content_text21" placeholder=""></textarea>
                              </div><!-- /.input group -->                      
                        </div>

                              <script type="text/javascript">
                                CKEDITOR.replace( 'p2' );
                            </script>
                          <?php echo "<script>CKEDITOR.instances.p2.setData('".mysql_real_escape_string($product_text21, $conn)."')</script>"; ?>




                          <div class="form-group">
                          <label> Additional Info 4:</label>
                          <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-info text-blue faa-wrench animated faa-slow"></i>
                          </div>
                          <input type="text" id="" name="content_text22" class="form-control" placeholder="Type here" value="<?php echo $product_text22;?>">
                        </div><!-- /.input group -->                       
                        </div>

                        <div class="form-group with-border" style="width: 95%;">
                                <label>Additional Info 4 Description:</label>
                                <div class="input-group"> 
                                <textarea id="p3" class="form-control" rows="3" name="content_text23" placeholder=""></textarea>
                              </div><!-- /.input group -->                      
                        </div>

                              <script type="text/javascript">
                                CKEDITOR.replace( 'p3' );
                            </script>
                          <?php echo "<script>CKEDITOR.instances.p3.setData('".mysql_real_escape_string($product_text23, $conn)."')</script>"; ?>
                        

                      </div><!--box-body-->
                  </div><!-- /.tab-pane -->





                  <div class="tab-pane" id="pricing">  
                      <div class="box-header with-border text-aqua">                        
                          <h3 class="box-title"><i class="fa fa-money"></i> Pricing</h3>
                      </div><!-- /.box-header -->  

                      <div class="box-body text-aqua">

                              <div class="form-group">
                                <label>Product Price USD:</label>
                                <div class="input-group">
                                <div class="input-group-addon">
                                  <i class="fa fa-dollar text-aqua faa-wrench animated faa-slow"></i>
                                </div>
                                <input required type="text" id="" name="content_text5" class="form-control" value="<?php echo $product_price; ?>" placeholder="00">
                              </div><!-- /.input group -->                       
                              </div>


                              <div class="form-group">
                                <label>Points:</label>
                                <div class="input-group">
                                <div class="input-group-addon">
                                  <i class="fa fa-hourglass-end text-aqua faa-wrench animated faa-slow"></i>
                                </div>
                                <input type="text" id="" name="content_text25" class="form-control" value="<?php echo $product_points; ?>" placeholder="00">
                              </div><!-- /.input group -->                       
                              </div>

                      </div><!--box-body-->                      
                  </div><!-- /.tab-pane -->






                  <div class="tab-pane" id="discount">

                      <!--<div class="box">-->
                      <div class="box-header with-border text-aqua">                        
                          <h3 class="box-title"><i class="fa fa-money"></i> PRODUCT DISCOUNT</h3>
                      </div><!-- /.box-header -->  

                      <div class="box-body text-aqua">

                            <div class="callout callout-info">
                                <span><i class="fa fa-info fa-2x"></i>  You can set a specific discount for a group or a particular customer.</span>
                            </div>

                              <div class="form-group with-border">
                                <label>Specific Discount:</label>
                                <div class="input-group">

                                  <form method="GET" action="/Admin/AllShopProduct">

                                      <div class="form-group">
                                        <label>For:</label>
                                        <div class="input-group">
                                        <div class="input-group-addon" style="height: 40px;">
                                          <i class="fa fa-group text-aqua faa-wrench animated faa-slow"></i>
                                        </div>
                                        <select name="discount_groups" class="form-control selectpicker" data-width="50%">
                                              <option>All Groups</option>
                                              <?php echo $all_groups;?>
                                        </select>
                                      </div><!-- /.input group -->                       
                                      </div>

                                      <div class="form-group">
                                        <label>Customers:</label>
                                        <div class="input-group">
                                        <div class="input-group-addon" style="height: 40px;">
                                          <i class="fa fa-users text-aqua faa-wrench animated faa-slow"></i>
                                        </div>
                                        <select name="discount_customers" class="form-control selectpicker" data-width="50%" data-live-search="true">
                                          <option>All customers in this group above</option>
                                          <?php echo $all_customers;?>
                                        </select>
                                        </div>
                                      </div><!-- /.form-group -->

                                      
                                      <div class="form-group with-border">
                                        <label>Available (from date - to date):</label>
                                        <div class="input-group">
                                        <div class="input-group-addon">
                                          <i class="fa fa-calendar-o text-aqua faa-wrench animated faa-slow"></i>
                                        </div>
                                        <input type="text" id="" name="general_entext1" class="form-control datepicker" value="" placeholder="From">
                                      </div><!-- /.input group -->   

                                      <div class="input-group">
                                        <div class="input-group-addon">
                                          <i class="fa fa-calendar-o text-aqua faa-wrench animated faa-slow"></i>
                                        </div>
                                        <input type="text" id="" name="general_entext1" class="form-control datepicker" value="" placeholder="To">
                                      </div><!-- /.input group -->                    
                                      </div>
                                      

                                      <!-- Date and time range -->
                                      <div class="form-group">
                                        <label>Available (starting date - ending date):</label>
                                        <div class="input-group">
                                          <div class="input-group-addon">
                                            <i class="fa fa-clock-o text-aqua"></i>
                                          </div>
                                          <?php 
                                          //$re = '/\w+(?:[- ]\w+)*/';
                                          $re = '[-]';  /*--comment start/* end comment--*/
                                          //$str = "Some Words - Other Words (More Words) Dash-Binded-Word"; 
                                          $str = "2016/11/03 12:00 AM - 2016/11/03 11:59 PM"; 
                                          preg_match_all($re, $str, $matches);

                                          $val []= split('[-]', $str);
                                          foreach ($val as $key => $value) {
                                            # code...
                                            //print_r($value[0]);
                                            //print_r($value[1]);
                                          }
                                          ?>
                                          <input type="text" class="form-control" id="reservationtime" name="discount_dates" placeholder="YYYY/MM/DD h:m - YYYY/MM/DD h:m">
                                        </div><!-- /.input group -->
                                      </div><!-- /.form group -->

                                      <input type="hidden" value="<?php echo $product_id; ?>" name="discount_p_id">



                                      <div class="form-group">
                                        <label>Apply a discount of:</label>
                                        <div class="input-group">
                                        <div class="input-group-addon">
                                          <i class="fa fa-dollar text-aqua faa-wrench animated faa-slow"></i>
                                        </div>
                                        <input type="text" id="" name="discount_price" class="form-control" value="" placeholder="00">
                                      </div><!-- /.input group -->                       
                                      </div>

                                      <button type="submit" name="discount_save" class="btn btn-success extra-btn btn-flat loadin"><i class="fa fa-save"></i></button>

                                      </form>

                                  
                              </div><!-- /.input group -->                       
                              </div>
                          
                              <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                  <tr>
                                    <th>discount id</th>
                                    <th>Group</th>
                                    <th>Customer</th>
                                    <th>Impact</th>
                                    <th>Period</th>
                                    <th>Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php echo $all_discounts; ?>
                                </tbody>
                              </table>

                              

                      </div><!--box-body-->
                      <!--</div> /.box -->



                  </div><!-- /.tab-pane -->


                  <div class="tab-pane" id="seo">

                      <div class="box-header with-border text-yellow">                        
                          <h3 class="box-title"><i class="fa fa-random"></i> SEO</h3>
                      </div><!-- /.box-header --> 

                      <div class="box-body text-yellow">

                      <div class="form-group">
                        <label>Meta Title:</label>
                        <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-pencil-square-o text-yellow faa-wrench animated faa-slow"></i>
                        </div>
                        <input type="text" id="" name="content_text9" class="form-control" value="<?php echo $product_meta_title;?>" placeholder="Meta Title">
                      </div><!-- /.input group -->                       
                      </div>

                      <div class="form-group">
                        <label>Meta Keywords:</label>
                        <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-pencil-square-o text-yellow faa-wrench animated faa-slow"></i>
                        </div>
                        <input type="text" id="" name="content_text10" class="form-control" value="<?php echo $product_meta_key;?>" placeholder="Meta Keywords">
                      </div><!-- /.input group -->                       
                      </div>

                      <div class="form-group">
                        <label>Meta Description:</label>
                        <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-keyboard-o text-yellow faa-wrench animated faa-slow"></i>
                        </div>
                        <textarea rows="3" name="content_text11" class="form-control" placeholder="Meta Description"><?php echo $product_meta_desc;?></textarea>
                      </div><!-- /.input group -->                       
                      </div>


                      </div><!-- box-body-->

                  </div><!-- /.tab-pane -->

                  <div class="tab-pane" id="shipping">

                      <div class="box-header with-border text-blue">                        
                          <h3 class="box-title"><i class="fa fa-truck"></i> SHIPPING</h3>
                      </div><!-- /.box-header --> 

                      <div class="box-body text-blue">

                      <div class="form-group">
                        <label>Packaging width:</label>
                        <div class="input-group">
                        <div class="input-group-addon">
                          <span class="text-blue">cm</span>
                        </div>
                        <input type="text" id="" name="content_text12" class="form-control" value="<?php echo $shipping_text1;?>" placeholder="0.000000">
                      </div><!-- /.input group -->                       
                      </div>

                      <div class="form-group">
                        <label>Packaging height:</label>
                        <div class="input-group">
                        <div class="input-group-addon">
                          <span class="text-blue">cm</span>
                        </div>
                        <input type="text" id="" name="content_text13" class="form-control" value="<?php echo $shipping_text2;?>" placeholder="0.000000">
                      </div><!-- /.input group -->                       
                      </div>

                      <div class="form-group">
                        <label>Packaging depth:</label>
                        <div class="input-group">
                        <div class="input-group-addon">
                          <span class="text-blue">cm</span>
                        </div>
                        <input type="text" id="" name="content_text14" class="form-control" value="<?php echo $shipping_text3;?>" placeholder="0.000000">
                      </div><!-- /.input group -->                       
                      </div>

                      <div class="form-group">
                        <label>Packaging weight:</label>
                        <div class="input-group">
                        <div class="input-group-addon">
                          <span class="text-blue">kg</span>
                        </div>
                        <input type="text" id="" name="content_text15" class="form-control" value="<?php echo $shipping_text4;?>" placeholder="0.000000">
                      </div><!-- /.input group -->                       
                      </div>

                      <div class="form-group">
                        <label>Additional shipping fees (for a single item):</label>
                        <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-dollar text-blue faa-wrench animated faa-slow"></i>
                        </div>
                        <input type="text" id="" name="content_text16" class="form-control" value="<?php echo $shipping_text5;?>" placeholder="0.00">
                      </div><!-- /.input group -->                       
                      </div>

                      </div><!-- box-body-->

                  </div><!-- /.tab-pane -->

                  <div class="tab-pane" id="images">

                      <div class="box-header with-border text-maroon">                        
                          <h3 class="box-title"><i class="fa fa-image"></i> IMAGES <small>NOTE: All existing images will be replaced.</small></h3>
                      </div><!-- /.box-header --> 


                        <input name="multiple_uploaded_files[]" onchange="preview(this);" type="file" multiple class="multi with-preview form-content" id="multiple_uploaded_files" maxlength="200">

                        <div id="images-in" style="position: relative; height: 100%;"><?php echo $product_images;?></div>


                        <!--<input id="input-23" name="input23[]" type="file" multiple class="file-loading">-->
                  </div><!-- /.tab-pane -->


                  <div class="tab-pane" id="categories">

                      <div class="box-header with-border text-green">                        
                          <h3 class="box-title"><i class="fa fa-list-alt"></i> CATEGORIES</h3>
                      </div><!-- /.box-header --> 

                

          </div><!-- /.tab-pane -->

                  <div class="tab-pane" id="reviews">

                      <div class="box-header with-border text-black">                        
                          <h3 class="box-title"><i class="fa fa-quote-left"></i> REVIEWS</h3>
                      </div><!-- /.box-header --> 

                      <blockquote>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                        <small>By <cite title="Source Title">Customer Name</cite></small>
                        <cite>*****</cite><button class="btn btn-danger btn-flat pull-right" style="margin-top: -50px;"><i class="fa fa-trash"></i> </button>
                      </blockquote>
                      

                      <blockquote>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                        <small>By <cite title="Source Title">Customer Name</cite></small>
                        <cite>*****</cite><button class="btn btn-danger btn-flat pull-right" style="margin-top: -50px;"><i class="fa fa-trash"></i> </button>
                      </blockquote>

                      <blockquote>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                        <small>By <cite title="Source Title">Customer Name</cite></small>
                        <cite>*****</cite>
                      </blockquote>

                      <blockquote>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                        <small>By <cite title="Source Title">Customer Name</cite></small>
                        <cite>*****</cite>
                      </blockquote>

                  </div><!-- /.tab-pane -->


                </div><!-- /.tab-content -->
              </div><!-- /.nav-tabs-custom -->
            </div><!-- /.col -->
          </div><!-- /.row -->



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
    <script src="/Admin/Assets/js/bootstrap-tagsinput.js"></script>


    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>



<script src="/Admin/Assets/js/moment.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>

<script src="/Admin/plugins/select2/select2.full.min.js"></script>

<script src="/Admin/plugins/daterangepicker/daterangepicker.js"></script>
<script src="/Admin/Assets/js/fileinput.js"></script>
<script src="/Admin/Assets/js/purify.js"></script>
    <script src="/Admin/Assets/js/hover_side1.js"></script>





<script>
$(function () {
        //Initialize Select2 Elements
        $(".select2").select2();

      });

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
</script>


<script type="text/javascript">
  $('.loadin').click(function () {
    // body...
    $("#LoadingImage").show();
  });
</script>


    <script type="text/javascript">


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


    $("[id='content_text4']").bootstrapSwitch();



    $('.selectpicker').selectpicker({
        style: 'btn-info',
        size: 3
      });


    $(function () {
        $('.datepicker').datetimepicker({
          format: 'YYYY/MM/DD'
        });
    });


    //Date range picker with time picker
        $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'YYYY/MM/DD h:mm A'});


        $('.mytagsinput').tagsinput({
            onTagExists: function(item, $tag) {
              $tag.hide().fadeIn();
            },
            allowDuplicates: false,
            confirmKeys: [44],
            tagClass: 'bg-teal',
            maxTags: 10
          });
        $('.bootstrap-tagsinput input[type="text"]').attr('placeholder', 'add tag');
    </script>



<script type="text/javascript">
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
                    url:"/Admin/AddProductCat",
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
     else if (name==<?php echo $product_id; ?>) {
      $.ajax({
                    type: "POST",
                    url:"/Admin/RemoveProductCat",
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

});
</script>
  </body>
</html>
