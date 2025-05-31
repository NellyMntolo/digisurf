<?php 
   include("../Model/dbconfig.php");
   mysql_set_charset("utf8");

if(isset($_POST['reset_submit'])){

  $customerid = mysql_real_escape_string($_POST['customer_id'],$conn);
  $entext1 = mysql_real_escape_string($_POST['new_pass'],$conn);

 $sql="UPDATE shop_digisurf_customer SET customer_password='".$entext1."' WHERE customer_id='".$customerid."' LIMIT 1 ";              
                   $retval = mysql_query( $sql, $conn );
                   if(! $retval )
                       {
                          die('Could not enter data: ' . mysql_error());
                       }

              header("Refresh:0; url=/ResetSuccessful");
}
   
?>