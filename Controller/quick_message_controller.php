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

  
  if(!empty($_POST['quick_message_submit'])){

        $quick_message_name = $_POST['quick_message_name'];
        $quick_message_email = $_POST['quick_message_email'];
        $quick_message_subject = $_POST['quick_message_subject'];
        $quick_message = $_POST['quick_message'];
        //$code = $_POST['code'];

        //echo $email.'<br>';

        $mail->IsSMTP();
try {
    // $mail->SMTPDebug = 2;
    // $mail->Host = 'a2plcpnl0369.prod.iad2.secureserver.net';
    // $mail->SMTPSecure = 'tls'; 
    // $mail->Port = 587; //465 587
    // $mail->Username = "iqmaxj21xb8j";
    // $mail->Password = "w03=>*8N._Y4.";

    // $mail->SMTPDebug = 2;
    $mail->SMTPSecure = 'tls'; 
    $mail->SMTPAuth = true; 
    $mail->Host = "smtp.gmail.com"; 
    $mail->Port = 587; //465 587
    $mail->Username = "";
    $mail->Password = "";
    // $mail->Password = $smtp_pass;
    $mail->AddAddress('', 'Nothing Is Garbage');
    // $mail->AddAddress('', 'Nothing Is Garbage');
    $mail->AddAddress('', 'Nothing Is Garbage');
    // $mail->AddAddress('', 'Nothing Is Garbage');
    // $mail->AddAddress('', 'Nothing Is Garbage');
    // $mail->AddAddress('', 'Nothing Is Garbage');
    $mail->AddAddress($quick_message_email, 'Nothing Is Garbage');
    $mail->From = ''; 
    $mail->SetFrom($quick_message_email, '');
    $mail->Subject = 'From https://www.nothingisgarbage.com Quick Message';
    $mail->AltBody = '';
    $mail->CharSet = 'UTF-8';
    $body = '<div style="font-size:17px;font-family:Georgia;color:#14695e;" accept-charset="utf-8" charset="UTF-8">
    Dear Admin,<br><br>New Quick Message From Your Website.</div><br><hr style="border:0;height:2px;background-image:linear-gradient(to right,rgba(0, 0, 0, 0),rgba(78, 151, 222,0.75),rgba(0, 0, 0, 0));">
    <div style="font-size:17px;font-family:Georgia;color:#14695e;" accept-charset="utf-8" charset="UTF-8">
    
    <br><br>Name:<br> '.$quick_message_name.'
    <br><br>Email:<br> '.$quick_message_email.'
    <br><br>subject:<br> '.$quick_message_subject.'
    <br><br>Quick Message:<br> '.$quick_message.'
    <br><br>
    </div><hr style="border:0;height:2px;background-image:linear-gradient(to right,rgba(0, 0, 0, 0),rgba(78, 151, 222,0.75),rgba(0, 0, 0, 0));">'; // automatically
    $mail->MsgHTML($body);
    $mail->Send();
    //echo "Message Sent OK</p>\n";
    //echo " response arrived ok";
    $result = 'Y';
} catch ( phpmailerException $e ) {
    // echo $e->errorMessage(); 
} catch ( Exception $e ) {
    // echo $e->getMessage(); 
}

    } else{
      $result = 'N';
   }
echo $result;
?>