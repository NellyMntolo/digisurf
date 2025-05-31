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
$result = '';
error_reporting(E_ALL);

if(isset($_POST['join_us_submit'])){

  
  if(!empty($_POST['join_us_submit']) && !empty($_POST['joinus_code']) ){

      if($_POST['joinus_code'] == $_SESSION['rand_code']) {

        $name = $_POST['join_us_name'];
        $join_us_volunteer_type = $_POST['join_us_volunteer_type'];
        $join_us_phone_number = $_POST['join_us_phone_number'];        
        $join_us_volunteer_email = $_POST['join_us_volunteer_email'];
        $join_us_volunteer_message = $_POST['join_us_volunteer_message'];
        $code = $_POST['joinus_code'];

        //echo $email.'<br>';

        $mail->IsSMTP();
try {
    // $mail->SMTPDebug = 2;     
    $mail->SMTPSecure = 'tls'; 
    $mail->SMTPAuth = true; 
    $mail->Host = "smtp.gmail.com"; 
    $mail->Port = 587; //465 587
    $mail->Username = "";
    $mail->Password = "digi_surf";
    // $mail->Password = $smtp_pass;
    $mail->AddAddress('', 'Nothing Is Garbage');
    // $mail->AddAddress('', 'Nothing Is Garbage');
    $mail->AddAddress('', 'Nothing Is Garbage');
    // $mail->AddAddress('', 'Nothing Is Garbage');
    // $mail->AddAddress('', 'Nothing Is Garbage');
    // $mail->AddAddress('', 'Nothing Is Garbage');
    $mail->AddAddress($join_us_volunteer_email, 'Nothing Is Garbage');
    $mail->From = ''; 
    $mail->SetFrom($join_us_volunteer_email, '');
    $mail->Subject = 'From https://www.nothingisgarbage.com Join Us';
    $mail->AltBody = '';
    $mail->CharSet = 'UTF-8';
    $body = '<div style="font-size:17px;font-family:Georgia;color:#14695e;" accept-charset="utf-8" charset="UTF-8">
    Dear Admin,<br><br>New Join Us From Your Website.</div><br><hr style="border:0;height:2px;background-image:linear-gradient(to right,rgba(0, 0, 0, 0),rgba(78, 151, 222,0.75),rgba(0, 0, 0, 0));">
    <div style="font-size:17px;font-family:Georgia;color:#14695e;" accept-charset="utf-8" charset="UTF-8">
    
    <br><br>Volunteer Name:<br> '.$name.'
    <br><br>Volunteer Type:<br> '.$join_us_volunteer_type.'
    <br><br>Volunteer Phone Number:<br> '.$join_us_phone_number.'
    <br><br>Volunteer Email:<br> '.$join_us_volunteer_email.'
    <br><br>Volunteer Message:<br> '.$join_us_volunteer_message.'
    </div><hr style="border:0;height:2px;background-image:linear-gradient(to right,rgba(0, 0, 0, 0),rgba(78, 151, 222,0.75),rgba(0, 0, 0, 0));">'; // automatically
    $mail->MsgHTML($body);
    $mail->Send();
    //echo "Message Sent OK</p>\n";
    //echo " response arrived ok";
    $result = 'Y';
} catch ( phpmailerException $e ) {
    //echo $e->errorMessage(); 
} catch ( Exception $e ) {
    //echo $e->getMessage(); 
}

    }else{
      $result = 'N';
   }

   } else{
      $result = 'L';
   }

}

echo $result;
?>