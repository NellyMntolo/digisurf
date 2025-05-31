<?php
include '../lang/lang.php';
mysql_set_charset("utf8");

include 'menuDAO.php';
include 'footerDAO.php';
$current_lang = $_SESSION['lang'];
$slides = '';

$redirect = '';
                    //CONTENT
if(!isset($_SESSION['login_visitor'])){
    //header("Location: /Booking"); 
      //exit;
    $redirect = '<script>window.location.href = "/Booking";</script>';
} else{
                        $sqlen_service = 'select * from digisurf_service_rules where code ="'.$current_lang.'"';
                        $retvalen_service = mysql_query( $sqlen_service, $conn );
                             if(! $retvalen_service )
                             {
                                die('Could not get data: ' . mysql_error());
                             }
                        $rowen_service = mysql_fetch_array($retvalen_service, MYSQL_ASSOC);
                            $service_text1 = $rowen_service['text1'];
                            $service_text2 = $rowen_service['text2'];
                            $service_text3 = $rowen_service['text3'];
                            $service_text4 = $rowen_service['text4'];
                            //$service_image1 = $rowen_service['image1'];
}
                            
?>