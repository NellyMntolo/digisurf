<?php 
   include("../Model/dbconfig.php");
   mysql_set_charset("utf8");

if(!empty($_POST['new_pass']) && $_POST['new_pass'] != '' && !empty($_POST['phone']) && $_POST['phone'] != '' ){
function sync_uuid() {
    return sprintf( '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
        // 32 bits for "time_low"
        mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),

        // 16 bits for "time_mid"
        mt_rand( 0, 0xffff ),

        // 16 bits for "time_hi_and_version",
        // four most significant bits holds version number 4
        mt_rand( 0, 0x0fff ) | 0x4000,

        // 16 bits, 8 bits for "clk_seq_hi_res",
        // 8 bits for "clk_seq_low",
        // two most significant bits holds zero and one for variant DCE1.1
        mt_rand( 0, 0x3fff ) | 0x8000,

        // 48 bits for "node"
        mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff )
    );
}
$syncGuid = strtoupper(sync_uuid());

$new_pass = mysql_real_escape_string($_POST['new_pass'],$conn);
$phone = mysql_real_escape_string($_POST['phone'],$conn);


  $sqlcustomer_id = 'SELECT customer_email, verify_code FROM shop_digisurf_customer WHERE customer_email="'.$phone.'" ';
  $retvalcustomer_id = mysql_query( $sqlcustomer_id, $conn );                 
                             if(! $retvalcustomer_id )
                             {
                                die('Could not get data: ' . mysql_error());
                             }
  $rowcustomer_id = mysql_fetch_array($retvalcustomer_id, MYSQL_ASSOC);
  $customer_email = $rowcustomer_id['customer_email'];
  $verify_code = $rowcustomer_id['verify_code'];

  

if($customer_email == $phone){


 $sql="UPDATE shop_digisurf_customer SET customer_password='".$new_pass."', verify_code=NULL WHERE customer_email='".$phone."' LIMIT 1 ";              
                   $retval = mysql_query( $sql, $conn );
                   if(! $retval )
                       {
                          die('Could not enter data: ' . mysql_error());
                       }

  echo "1";
} else {
  echo "0";
}

}

// cannot change sync_guid
?>