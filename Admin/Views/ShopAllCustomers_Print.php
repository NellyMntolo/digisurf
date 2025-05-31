<?php
include '../Model/session.php';
include '../lang/lang.php';
include '../Model/allnotificationsDAO.php';
include '../Model/shop_all_customersDAO.php';
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>All Customers</title>
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
    
    <link rel="stylesheet" href="/Admin/plugins/morris/morris.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <?php echo $hovver_icons;?>
  </head>
  <body class="hold-transition skin-green sidebar-mini fixed" onload="window.print();">

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrappller" style="width: 100%;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            All Customers
            <small><?php echo $current_website; ?></small>
          </h1>
          
        </section>

        <section class="content">


              <div class="row">
          <!--<div class="col-md-12">
                <button type="button" class="extra-btn btn-success saver" style="float: right; right: 0;"><i class="fa fa-save"></i></button>
            </div>-->

            <div class="col-md-12">
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs" id="tryf">
                  <!--<li class="active"><a class="text-teal" href="#customers" data-toggle="tab">Customers</a></li>
                  <li><a class="text-light-blue" href="#addresses" data-toggle="tab">Addresses</a></li>
                  <li><a class="text-black" href="#groups" data-toggle="tab">Groups</a></li>-->
                </ul>
                <div class="tab-content" style="min-height: 300px;">

                  <div class="tab-pane active" id="customers">
                      

                      <div class="box-body text-teal">
                        <table id="example1" class="table table-bordered table-hover">
                          <thead>
                            <tr class="text-center">
                              <th>Gender</th>
                              <th>First Name</th>
                              <th>Last Name</th>
                              <th>Email Address</th>
                              <th>Registration</th>
                              <th>Last Visit</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                          <?php echo $all_customers; ?>
                          </tbody>
                        </table>
                      </div><!--box-body-->


                  </div><!-- /.tab-pane -->



                  <div class="tab-pane" id="addresses">  
                    
                        <div class="box-body text-light-blue">                        
                        <table id="example2" class="table table-bordered table-striped">
                          <thead>
                            <tr class="text-center">
                              <th>First Name</th>
                              <th>Last Name</th>
                              <th>Address</th>
                              <th>City</th>
                              <th>Country</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr class="color-palette text-center">
                              <td>Nelly</td>
                              <td>mntolo</td>
                              <td>west road</td>
                              <td>Taipei</td>
                              <td>Taiwan</td>
                              <td><!--<form method="get" action=""><button type="button" onclick="window.location='/Admin/Product';" class="btn btn-primary btn-flat" title="Edit"><i class="fa fa-pencil"></i></button><input type="hidden" name="edit_product" ></form>-->

                              <div class="input-group input-group-lg">
                                <div class="input-group-btn">
                                  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"><i class="fa fa-pencil" style="width: 20px;"></i></button>
                                  <ul class="dropdown-menu">
                                    <li><a href="#"><i class="fa fa-pencil-square-o"></i> Edit</a></li>
                                    <li><a href="#"><i class="fa fa-eye"></i> View</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#"><i class="fa fa-trash"></i> Delete</a></li>
                                  </ul>
                                </div><!-- /btn-group -->
                              </div><!-- /input-group -->

                              </td>
                            </tr>   


                            <tr class="color-palette text-center">
                              <td>Nelly</td>
                              <td>mntolo</td>
                              <td>west road</td>
                              <td>Taipei</td>
                              <td>Taiwan</td>
                              <td><!--<form method="get" action=""><button type="button" onclick="window.location='/Admin/Product';" class="btn btn-primary btn-flat" title="Edit"><i class="fa fa-pencil"></i></button><input type="hidden" name="edit_product" ></form>-->

                              <div class="input-group input-group-lg">
                                <div class="input-group-btn">
                                  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"><i class="fa fa-pencil" style="width: 20px;"></i></button>
                                  <ul class="dropdown-menu">
                                    <li><a href="#"><i class="fa fa-pencil-square-o"></i> Edit</a></li>
                                    <li><a href="#"><i class="fa fa-eye"></i> View</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#"><i class="fa fa-trash"></i> Delete</a></li>
                                  </ul>
                                </div><!-- /btn-group -->
                              </div><!-- /input-group -->

                              </td>
                            </tr>                                            
                            
                          </tbody>
                        </table>
                      </div><!--box-body-->

                  </div><!-- /.tab-pane -->


                  <div class="tab-pane" id="groups">         

                    <div class="box-body text-black">
                        <table id="example3" class="table table-bordered table-hover">
                          <thead>
                            <tr class="text-center">
                              <th>Group Name</th>
                              <th>Discount(%)</th>
                              <th>Members</th>
                              <th>Creation Date</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr class="color-palette text-center">
                              <td>my group</td>
                              <td>0.00%</td>
                              <td>3</td>
                              <td>yyyy/mm/dd</td>
                              <td><!--<form method="get" action=""><button type="button" onclick="window.location='/Admin/Product';" class="btn btn-primary btn-flat" title="Edit"><i class="fa fa-pencil"></i></button><input type="hidden" name="edit_product" ></form>-->

                              <div class="input-group input-group-lg">
                                <div class="input-group-btn">
                                  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"><i class="fa fa-pencil" style="width: 20px;"></i></button>
                                  <ul class="dropdown-menu">
                                    <li><a href="#"><i class="fa fa-pencil-square-o"></i> Edit</a></li>
                                    <li><a href="#"><i class="fa fa-eye"></i> View</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#"><i class="fa fa-trash"></i> Delete</a></li>
                                  </ul>
                                </div><!-- /btn-group -->
                              </div><!-- /input-group -->

                              </td>
                            </tr>                                               
                            
                          </tbody>
                        </table>
                      </div><!--box-body-->

                  </div><!-- /.tab-pane -->


                </div><!-- /.tab-content -->
              </div><!-- /.nav-tabs-custom -->
            </div><!-- /.col -->
          </div><!-- /.row -->



            

          </section>


          <div id="LoadingImage" style="display: none">
    <div class="loader__figure"></div>
</div>


      </div><!-- /.content-wrapper -->

      

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

    $("#example1").DataTable({
          "paging": false,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
    $("#example2").DataTable();
    $("#example3").DataTable();
    

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
