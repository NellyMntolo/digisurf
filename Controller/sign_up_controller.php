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
error_reporting(E_ALL);
$current_lang = $_SESSION['lang'];
$error = '';
$result = '';

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
$verify_code = strtoupper(sync_uuid());
//echo $verify_code;

$entext1 = '';
$entext2 = '';
$customer_email = '';
$code = '';
$themisc = '';
// $code = md5(uniqid(rand()));
//if(isset($_POST['SignUp_submit'])){

  if(!empty($_POST['username']) && !empty($_POST['SignUpPass_confirm']) && !empty($_POST['signup_code']) ) {

      if($_POST['signup_code'] == $_SESSION['rand_code']) {

  $max_misc = 'SELECT customer_id, customer_email FROM shop_digisurf_customer ORDER BY customer_id DESC';
  $retvalmax_miscen = mysql_query( $max_misc, $conn );                 
                             if(! $retvalmax_miscen )
                             {
                                die('Could not get data: ' . mysql_error());
                             }
  $rowmax_miscen = mysql_fetch_array($retvalmax_miscen, MYSQL_ASSOC);
  $large_misc = $rowmax_miscen['customer_id'];
  $customer_email = $rowmax_miscen['customer_email'];

  $themisc = $large_misc+1;
  
  $entext1 = mysql_real_escape_string($_POST['username'],$conn);
  $entext2 = mysql_real_escape_string($_POST['SignUpPass_confirm'],$conn);
  // $entext3 = mysql_real_escape_string($_POST['confirm_digi_pass'],$conn);
  // $entext4 = mysql_real_escape_string($_POST['text4'],$conn);



  $mail->IsSMTP();
try {

    // $mail->SMTPDebug = 2;
    $mail->SMTPSecure = 'tls'; 
    $mail->SMTPAuth = true; 
    $mail->Host = "smtp.gmail.com"; 
    $mail->Port = 587; //465 587
    $mail->Username = "";
    $mail->Password = "";
    // $mail->Password = $smtp_pass;
    $mail->AddAddress('', 'Nothing Is Garbage');
    $mail->AddAddress('', 'Nothing Is Garbage');
    $mail->AddAddress($customer_email, 'Nothing Is Garbage');
    $mail->From = ''; 
    $mail->SetFrom($customer_email, '');
    $mail->Subject = 'From https://www.nothingisgarbage.com Sign Up Message';
    $mail->AltBody = '';
    $mail->CharSet = 'UTF-8';
    $body = '<div style="font-size:17px;font-family:Georgia;color:#14695e;" accept-charset="utf-8" charset="UTF-8">
    Dear User,<br><br>New Sign Up Message From Nothing is Garbage('.$customer_email.') <br>  please confirm your sign up by clicking on this link <a href="http://nothingisgarbage.com/SignUp_Verify/'.$verify_code.'" target="_blank"> Confirm Sign Up</a></div><br><hr style="border:0;height:2px;background-image:linear-gradient(to right,rgba(0, 0, 0, 0),rgba(78, 151, 222,0.75),rgba(0, 0, 0, 0));">
    <div style="font-size:17px;font-family:Georgia;color:#14695e;" accept-charset="utf-8" charset="UTF-8">
    <br><br>

    </div>'; // automatically
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

    } else {
      $result = 'N';
   }


  $seed = str_split('1234567890'); // and any other characters
  shuffle($seed); // probably optional since array_is randomized; this may be redundant
  $rand = '';
  foreach (array_rand($seed, 10) as $k) $rand .= $seed[$k];

$vowels = array(" ", "&", "?", "/");
$enurl = str_replace($vowels, '_', $entext1);
  $sqla = 'INSERT INTO shop_digisurf_customer (customer_id, customer_email, customer_password, customer_reg_date, customer_approve, customer_type, customer_url, customer_member_id, customer_secret_code, verify_code) VALUES ( "'.$themisc.'", "'.$entext1.'", "'.$entext2.'", now(), "Y", "R", "'.$enurl.'", "'.$rand.'", "'.$code.'", "'.$verify_code.'")';
$retvala = mysql_query( $sqla, $conn );
    if(! $retvala ) {
        die('Could not enter data: ' . mysql_error());
      }

$sqlb = 'INSERT INTO shop_digisurf_address (customer_id) VALUES ( "'.$themisc.'")';

  $retvalb = mysql_query( $sqlb, $conn );
    if(! $retvalb ) {
        die('Could not enter data: ' . mysql_error());
      }

$sqlc = 'INSERT INTO shop_digisurf_group_members (customer_id) VALUES ( "'.$themisc.'")';

  $retvalc = mysql_query( $sqlc, $conn );
    if(! $retvalc ) {
        die('Could not enter data: ' . mysql_error());
      }

      // header("Refresh:0; url=/Home");
      // $result = 'Y';

    } else {
      $result = 'L';
   } 

   if ($customer_email == $_POST['username']) {
      $result = 'D';
   }

// }
echo $result;
?>