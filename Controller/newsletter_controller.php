<?php
include '../Model/dbconfig.php';
mysql_set_charset("utf8");

include_once "../Mail/class.phpmailer.php";
include_once "../Mail/class.phpmaileroauth.php";
// include_once "../Mail/class.phpmaileroauthgoogle.php";
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

if(isset($_POST['newsletter_submit'])){

    

  
  if(!empty($_POST['newletter_email']) && !empty($_POST['newsletter_code']) ) {

    

      //if($_POST['newsletter_code'] == $_SESSION['rand_code']) {
       //echo $_SESSION['rand_code']; 

        $newsletter_Sql = 'SELECT * FROM digisurf_newsletter ORDER BY idx DESC';
        $retval_newsletter = mysql_query( $newsletter_Sql, $conn );                 
                                 if(! $retval_newsletter )
                                 {
                                    die('Could not get data: ' . mysql_error());
                                 }
        $row_newsletter = mysql_fetch_array($retval_newsletter, MYSQL_ASSOC);
        $newsletter_idx = $row_newsletter['idx'];
        $newsletter_info = $row_newsletter['newsletter_info'];
        $newsletter_url = $row_newsletter['newsletter_url'];
        $newsletter_id = $row_newsletter['newsletter_id'];
        $newsletter_image = $row_newsletter['image1'];


        
        $email = $_POST['newletter_email'];
        $code = $_POST['newsletter_code'];

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
    $mail->AddAddress($email, 'Nothing Is Garbage');
    $mail->From = ''; 
    $mail->SetFrom('', '');
    $mail->Subject = 'From https://www.nothingisgarbage.com Newsletter';

    
    $mail->AltBody = '';
    $mail->CharSet = 'UTF-8';
    // $mail->addAttachment(''.$newsletter_image.'');
    $body = '<div style="font-size:17px;font-family:Georgia;color:#14695e;" accept-charset="utf-8" charset="UTF-8">
    Dear Admin,<br><br>New Newsletter From Your Website.</div><br><hr style="border:0;height:2px;background-image:linear-gradient(to right,rgba(0, 0, 0, 0),rgba(78, 151, 222,0.75),rgba(0, 0, 0, 0));">
    <div style="font-size:17px;font-family:Georgia;color:#14695e;" accept-charset="utf-8" charset="UTF-8">
    
    <br><br>Email:<br> '.$email.'
    <br><br>Image:<br><img src="..'.$newsletter_image.'" style="width: 100%; height: 100%;">
    <br><br><div class="" style="width: 100%; text-align: center;"><a href="http://nothingisgarbage.com/Read_Newsletter" target="_blank" style="background-color: #128e75; text-align: center; color: white; border-radius: 5px; width:100px; padding: 10px; text-decoration: none; cursor: pointer;">Read More</a></div>
    </div><hr style="border:0;height:2px;background-image:linear-gradient(to right,rgba(0, 0, 0, 0),rgba(78, 151, 222,0.75),rgba(0, 0, 0, 0));">'; // automatically
    $mail->MsgHTML($body);
    // $mail->PreSend();
    $mail->Send();
    // header("Refresh:3; url=/");
    //echo "Message Sent OK</p>\n";
    // echo " response arrived ok";
    $result = 'Y';

} catch ( phpmailerException $e ) {
    // echo $e->errorMessage(); 
} catch ( Exception $e ) {
    // echo $e->getMessage(); 
}

    } else{
      $result = 'N';
   }

   // } else{
   //    $result = 'L';
   // }

}
echo $result;
?>