<?php 
   include("../Model/dbconfig.php");
   mysql_set_charset("utf8");

if(!empty($_POST['reset_pass']) && $_POST['reset_pass'] != '' && !empty($_POST['reset_number']) && $_POST['reset_number'] != '' ){
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

$reset_pass = mysql_real_escape_string($_POST['reset_pass'],$conn);
$reset_number = mysql_real_escape_string($_POST['reset_number'],$conn);


  $sqlcustomer_id = 'SELECT customer_email, verify_code FROM shop_digisurf_customer WHERE verify_code="'.$reset_pass.'" AND customer_email="'.$reset_number.'" ';
  $retvalcustomer_id = mysql_query( $sqlcustomer_id, $conn );                 
                             if(! $retvalcustomer_id )
                             {
                                die('Could not get data: ' . mysql_error());
                             }
  $rowcustomer_id = mysql_fetch_array($retvalcustomer_id, MYSQL_ASSOC);
  $customer_email = $rowcustomer_id['customer_email'];
  $verify_code = $rowcustomer_id['verify_code'];

  

if($customer_email == $reset_number && $verify_code == $reset_pass ){


  echo "1";
} else {
  echo "0";
}

}
?>