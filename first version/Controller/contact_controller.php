<?php 
  include("../model/dbconfig.php");
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

  $test = '';

  session_start();
  $current_lang = $_SESSION['lang'];

    $todo='';

   if($_SERVER["REQUEST_METHOD"] == "POST")
   {

    
      $first_name = $_POST['first_name'];
      $last_name = $_POST['last_name']; 
      $useremail = $_POST['email']; 
      $message = $_POST['message'];

$mail->IsSMTP();
try {
    //$mail->SMTPDebug = 2;     
    $mail->SMTPSecure = 'tls'; 
    $mail->SMTPAuth = true; 
    $mail->Host = "smtp.gmail.com"; 
    $mail->Port = 587; //465 587
    $mail->Username = "fakudze@gmail.com";
    $mail->Password = "system_analitics";
    $mail->AddAddress('fakudze@gmail.com', 'NellyMntolo.com');
    // $mail->AddAddress('apple3home@gmail.com', 'Nelly');
    $mail->From = 'fakudze@gmail.com'; 
    $mail->SetFrom($useremail, 'fakudze@gmail.com');
    $mail->Subject = 'From www.nellymntolo.com Contact';
    $mail->AltBody = '';
    $mail->CharSet = 'UTF-8';
    $body = '<div style="font-size:17px;font-family:Georgia;color:#14695e;" accept-charset="utf-8" charset="UTF-8">
    Dear Admin,<br><br>User Information Below.</div><br><hr style="border:0;height:2px;background-image:linear-gradient(to right,rgba(0, 0, 0, 0),rgba(237,30,121,0.75),rgba(0, 0, 0, 0));">
    <div style="font-size:17px;font-family:Georgia;color:#14695e;" accept-charset="utf-8" charset="UTF-8">
    <br>Email: '.$useremail.'
    <br><br>First Name: '.$first_name.'
    <br><br>Last Name: '.$last_name.'
    <br><br>Message:<br> '.$message.'
    '.$test.'
    </div><hr style="border:0;height:2px;background-image:linear-gradient(to right,rgba(0, 0, 0, 0),rgba(237,30,121,0.75),rgba(0, 0, 0, 0));">'; // automatically
    $mail->MsgHTML($body);
    $mail->Send();
    //echo "Message Sent OK</p>\n";
} catch ( phpmailerException $e ) {
    //echo $e->errorMessage(); 
} catch ( Exception $e ) {
    //echo $e->getMessage(); 
}


                    header("location: /Contact");
  }

  
function doubleCheck(){
  global $todo;
  echo $todo;
  //echo "<script type=\"text/javascript\">window.location.href='#check-space'</script>";
}


?>