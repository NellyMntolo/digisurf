<?php  
include '../Model/dbconfig.php';
mysql_set_charset("utf8");

session_start();
header('Cache-control: private'); // IE 6 FIX


$language = $_POST['lang'];
$id = $_POST['the_id'];

$_SESSION['lang'] = '';

	$sqlprojectzh = 'select * from digisurf_product WHERE idx="'.$id.'" LIMIT 1';
                        $retval_singlecasezh = mysql_query( $sqlprojectzh, $conn );                 
                             if(! $retval_singlecasezh )
                             {
                                die('Could not get data: ' . mysql_error());
                             }  

	$row_singlecasezh = mysql_fetch_array($retval_singlecasezh, MYSQL_ASSOC);
    $misc_id = $row_singlecasezh['misc_id']; 

    //echo $sortable_order;

	$sqlprojecten = 'select * from digisurf_product WHERE misc_id="'.$misc_id.'" and code ="'.$language.'" LIMIT 1';
                        $retval_singlecaseen = mysql_query( $sqlprojecten, $conn );                 
                             if(! $retval_singlecaseen )
                             {
                                die('Could not get data: ' . mysql_error());
                             }  

	$row_singlecaseen = mysql_fetch_array($retval_singlecaseen, MYSQL_ASSOC);
    $url = $row_singlecaseen['url']; 
    $code = $row_singlecaseen['code'];

    $_SESSION['lang'] = $code;
	 
	setcookie('lang', $language, time() + (3600 * 24 * 30));

	header("Refresh:0; url=/Products/Product/".urlencode($url)."");



?>