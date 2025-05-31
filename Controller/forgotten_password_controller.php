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

   
    if(!empty($_POST['forgotten_email']) && $_POST['forgotten_email'] != '' ){

      // $sql_sms_message = 'select * from sms_messages';
      //                   $retval_sms_message = mysql_query( $sql_sms_message, $conn );
      //                        if(! $retval_sms_message )
      //                        {
      //                           die('Could not get data: ' . mysql_error());
      //                        }
      //                   $row_sms_message = mysql_fetch_array($retval_sms_message, MYSQL_ASSOC);
      //                   $sms_message_text = $row_sms_message['text1'];

      $forgotten_email= mysql_real_escape_string($_POST['forgotten_email'],$conn);

      $seed = str_split('1234567890'); // and any other characters
      shuffle($seed); // probably optional since array_is randomized; this may be redundant
      $rand = '';
      foreach (array_rand($seed, 6) as $k) $rand .= $seed[$k];
      

      //$code = md5(uniqid(rand()));

      $sql_user_points="UPDATE shop_digisurf_customer SET verify_code='".$rand."' WHERE customer_email='".$forgotten_email."' LIMIT 1 ";              
      $retval_user_points = mysql_query( $sql_user_points, $conn );
      if(! $retval_user_points )
            {
              die('Could not enter data: ' . mysql_error());
            }

  
      $sql="SELECT customer_email, verify_code FROM shop_digisurf_customer WHERE customer_email='$forgotten_email' LIMIT 1";     
      $result=mysql_query($sql, $conn);
      
      $count=mysql_num_rows($result);

      if(! $result )
          {
            die('Could not confirm user: ' . mysql_error());
          }
      $row_customer = mysql_fetch_array($result, MYSQL_ASSOC);
      $confirmed_email = ''; 
      $verify_code = $row_customer['verify_code'];

      if($row_customer['customer_email'] != '') {
        $confirmed_email = $row_customer['customer_email'];
      } 
      // else {
      //   $confirmed_email = $row_customer['ct_Mobile'];
      // }

//echo $confirmed_email;

            $_SESSION['confirmed_email'] = $confirmed_email;

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
    $mail->Password = "digi_surf";
    // $mail->Password = $smtp_pass;
    $mail->AddAddress('', 'Nothing Is Garbage');
    // $mail->AddAddress('', 'Nothing Is Garbage');
    // $mail->AddAddress('', 'Nothing Is Garbage');
    // $mail->AddAddress('', 'Nothing Is Garbage');
    // $mail->AddAddress('', 'Nothing Is Garbage');
    // $mail->AddAddress('', 'Nothing Is Garbage');
    $mail->AddAddress($forgotten_email, 'Nothing Is Garbage');
    $mail->From = ''; 
    $mail->SetFrom('', '');
    $mail->Subject = 'From https://www.nothingisgarbage.com Forgotten Password';
    $mail->AltBody = '';
    $mail->CharSet = 'UTF-8';
    // $mail->addAttachment(''.$newsletter_image.'');
    $body = "<div style=\"font-size:17px;font-family:Georgia;color:#14695e;\" accept-charset=\"utf-8\" charset=\"UTF-8\">
            Dear User,<br><br>Password Reset.</div><br><hr style=\"border:0;height:2px;background-image:linear-gradient(to right,rgba(0, 0, 0, 0),rgba(237,30,121,0.75),rgba(0, 0, 0, 0));\">
            <div style=\"font-size:17px;font-family:Georgia;color:#14695e;\" accept-charset=\"utf-8\" charset=\"UTF-8\">
             
                   We got requested to reset your password, if you did this then just click the following link to reset your password, if not just ignore this email,
                   <br /><br />
                   This is your Verification Code: $verify_code
                   <br /><br />
                   thank you :)
                   <br /><br />
                   Nothing Is Garbage

            </div><hr style=\"border:0;height:2px;background-image:linear-gradient(to right,rgba(0, 0, 0, 0),rgba(237,30,121,0.75),rgba(0, 0, 0, 0));\">"; // automatically
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

    }else{
      $result = 'N';
   }

   // } else{
   //    $result = 'L';
   // }



    //  }
   echo $result;
?>