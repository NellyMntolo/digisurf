<?php 
   include("Model/dbconfig.php");
   mysql_set_charset("utf8");
   header('Content-Type: text/html; charset=utf-8');
   session_start();
   error_reporting(0);
  $error = '';
   
   if(isset($_POST['login_submit'])){

    if(!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['code'])  ){

      if($_POST['code'] == $_SESSION['rand_code']) {

      $myusername=mysql_real_escape_string($_POST['username'],$conn);
      $mypassword=mysql_real_escape_string($_POST['password'],$conn);

//$sql="SELECT customer_email, customer_password, customer_member_id FROM shop_digisurf_customer WHERE customer_email='$myusername' or customer_member_id='$myusername' and customer_password='$mypassword'"; 
  
      $sql="SELECT * FROM shop_digisurf_customer WHERE customer_email='$myusername' or customer_member_id='$myusername' and customer_password='$mypassword'";     
      $result=mysql_query($sql, $conn);
      
      $count=mysql_num_rows($result);

      if(! $result )
          {
            die('Could not confirm user: ' . mysql_error());
          }
      $row_customer = mysql_fetch_array($result, MYSQL_ASSOC);
      $customer_id = $row_customer['customer_id'];
      $customer_type = $row_customer['customer_type'];
      $_SESSION['customer_type'] = $row_customer['customer_type'];
      $customer_last_update = $row_customer['customer_last_update'];
      $customer_approve = $row_customer['customer_approve'];
      $customer_email = $row_customer['customer_email'];
		
      if($count==1 && $customer_type=="SWD" && $customer_approve=="Y")
      {
         //session_register("myusername");
         //$_SESSION['login_visitor']=$myusername;
        $_SESSION['login_visitor']=$customer_email;
         
         if ($customer_last_update != null || $customer_last_update != '') {
           header("location: /Accounts/Sales");
         } else{
            header("location: /Welcome");
         }
         

         $origin = $_SERVER['HTTP_ORIGIN'];

         if(empty($origin)){
          $origin = 'Direct Link';
         }

        $sqla = 'INSERT INTO shop_digisurf_customer_visits (visit_date, origin, ip_address, customer_id) VALUES ( now(), "'.$origin.'", "'.getenv('REMOTE_ADDR').'", "'.$customer_id.'")';

        $retvala = mysql_query( $sqla, $conn );
          if(! $retvala ) {  
              die('Could not enter data: ' . mysql_error());
            }

        $sqlb="UPDATE shop_digisurf_customer SET customer_last_update=now() WHERE customer_id='".$customer_id."' LIMIT 1 ";              
                   $retvalb = mysql_query( $sqlb, $conn );
                   if(! $retvalb )
                       {
                          die('Could not enter data: ' . mysql_error());
                       }

      } elseif($count==1 && $customer_type!="SWD" && $customer_approve=="Y" && $customer_type!="R")
      {
         //session_register("myusername");
         $_SESSION['login_visitor']=$customer_email;
         
         if ($customer_last_update != null || $customer_last_update != '') {
           header("location: /Accounts/Member");
         } else{
            header("location: /Welcome");
         }

         $origin = $_SERVER['HTTP_ORIGIN'];

         if(empty($origin)){
          $origin = 'Direct Link';
         }

        $sqla = 'INSERT INTO shop_digisurf_customer_visits (visit_date, origin, ip_address, customer_id) VALUES ( now(), "'.$origin.'", "'.getenv('REMOTE_ADDR').'", "'.$customer_id.'")';

        $retvala = mysql_query( $sqla, $conn );
          if(! $retvala ) {  
              die('Could not enter data: ' . mysql_error());
            }

        $sqlb="UPDATE shop_digisurf_customer SET customer_last_update=now() WHERE customer_id='".$customer_id."' LIMIT 1 ";              
                   $retvalb = mysql_query( $sqlb, $conn );
                   if(! $retvalb )
                       {
                          die('Could not enter data: ' . mysql_error());
                       }

      } elseif($count==1 && $customer_type=="R")
      {
         //session_register("myusername");
         $_SESSION['login_visitor']=$customer_email;
         
         header("location: /Accounts/Regular");

         /*if ($customer_last_update != null || $customer_last_update != '') {
           header("location: /Accounts/Regular");
         } else{
            header("location: /Welcome");
         }*/

         $origin = $_SERVER['HTTP_ORIGIN'];

         if(empty($origin)){
          $origin = 'Direct Link';
         }

        $sqla = 'INSERT INTO shop_digisurf_customer_visits (visit_date, origin, ip_address, customer_id) VALUES ( now(), "'.$origin.'", "'.getenv('REMOTE_ADDR').'", "'.$customer_id.'")';

        $retvala = mysql_query( $sqla, $conn );
          if(! $retvala ) {  
              die('Could not enter data: ' . mysql_error());
            }

        $sqlb="UPDATE shop_digisurf_customer SET customer_last_update=now() WHERE customer_id='".$customer_id."' LIMIT 1 ";              
                   $retvalb = mysql_query( $sqlb, $conn );
                   if(! $retvalb )
                       {
                          die('Could not enter data: ' . mysql_error());
                       }

      }
      else 
      {
         //$error="Your Login Name or Password is invalid";
         //echo "<br><div class=\"login-error\">Your Login Name or Password is invalidg</div>";
        $error = 'Wrong email/password or Your account hasn\'t been approved';
      }

    }else{
      $error = 'Please enter correct security code!';
   }

   } else{
      $error = 'Please fill in ALL fields!';
   }

 }
   
?>