<?php
include '../Model/dbconfig.php';
mysql_set_charset("utf8");

include_once "../Mail/class.phpmailer.php";
include_once "../Mail/class.phpmaileroauth.php";
include_once "../Mail/class.phpmaileroauthgoogle.php";
include_once "../Mail/class.pop3.php";
include_once "../Mail/class.smtp.php";
include_once "../Mail/PHPMailerAutoload.php";
$pop = new POP3();
//$pop3 = new pop3_class;
$mail = new PHPMailer(true);
session_start();
$current_lang = $_SESSION['lang'];
$error = '';

error_reporting(E_ALL);

if(isset($_POST['nominate_submit'])){

        
        $nominate_shop_name = $_POST['nominate_shop_name'];
        $nominate_main_category = $_POST['nominate_main_category'];
        $nominate_sub_category = $_POST['nominate_sub_category'];
        // $nominate_description = $_POST['nominate_description'];
        $nominate_address = $_POST['nominate_address'];
        // $nominate_date = $_POST['nominate_date'];
        // $multiple_uploaded_filesone[] = $_POST['multiple_uploaded_filesone[]'];

echo "Shop Name = ".$nominate_shop_name."<br><br>";


$address = 'BTM 2nd Stage,Bengaluru,Karnataka,560076';
$encode = urlencode($address);
$key = "insert key here";
$url = "https://maps.googleapis.com/maps/api/geocode/json?address={$encode}&key={$key}";

$json = file_get_contents($url);
$data = json_decode($json);

echo ($data->results[0]->geometry->location->lat); 

// NEEDS HTTPS TO WORK  


// $address = $nominate_address;
// $address = "No. 8號, Lane 406, Section 3, Heping East Road, Da’an District, Taipei City, 106";
// $address = str_replace(" ", "+", $address);
// $region = "USA";

// $json = file_get_contents("http://maps.google.com/maps/api/geocode/json?address=$address&sensor=false&region=$region");
// $json = json_decode($json);

// $lat = $json->{'results'}[0]->{'geometry'}->{'location'}->{'lat'};
// $long = $json->{'results'}[0]->{'geometry'}->{'location'}->{'lng'};
// echo $lat." --- ".$long;
           

// $sql_nominate = 'INSERT INTO digisurf_stores (store_id, store_name, store_description, store_address, store_lat, store_lng, category, sub_category) VALUES ( "'.$themisc.'", "'.$real_customer_id.'", "'.$rand.'", now(), "P", "'.$current_total.'", "'.$points.'", "N" )';

//   $retval_nominate = mysql_query( $sql_nominate, $conn );
//     if(! $retval_nominate ) {  
//         die('Could not enter data: ' . mysql_error());
//       }



}
?>