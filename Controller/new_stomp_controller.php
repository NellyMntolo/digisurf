<?php 
include '../Model/dbconfig.php';
mysql_set_charset("utf8");
session_start();
$current_lang = $_SESSION['lang'];
$result = '';


$myusername = mysql_real_escape_string($_POST['user'],$conn);
$mypassword = mysql_real_escape_string($_POST['newpass'],$conn);
$trap = '0'.$myusername.'';


$sql_user_points="UPDATE cormember SET ct_WebPassword='".$mypassword."', sync_ok=0  WHERE ct_Mobile='".$trap."' LIMIT 1 ";              
                  $retval_user_points = mysql_query( $sql_user_points, $conn );
                  if(! $retval_user_points )
                       {
                          die('Could not enter data: ' . mysql_error());
                       }

?>