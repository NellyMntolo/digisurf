<?php  
include '../Model/dbconfig.php';
mysql_set_charset("utf8");
session_start();
include_once "../Mail/class.phpmailer.php";
include_once "../Mail/class.phpmaileroauth.php";
//include_once "../Mail/class.phpmaileroauthgoogle.php";
include_once "../Mail/class.pop3.php";
include_once "../Mail/class.smtp.php";
include_once "../Mail/PHPMailerAutoload.php";
$todo='';
$mail = new PHPMailer(true);


    $text1 = mysql_real_escape_string($_POST['first_name'],$conn);
    $text2 = mysql_real_escape_string($_POST['last_name'],$conn);
    $text3 = mysql_real_escape_string($_POST['email'],$conn);
    $text4 = mysql_real_escape_string($_POST['subject'],$conn);
    $text5 = mysql_real_escape_string($_POST['message'],$conn);
 /*
    echo "First Name : ".$text1."<br><br>";
    echo "Last Name : ".$text2."<br><br>";
    echo "Email : ".$text3."<br><br>";
    echo "Subject : ".$text4."<br><br>";

    echo "Message : ".$text5."<br><br>";
*/
   


$mail->IsSMTP();
try {
    //$mail->SMTPDebug = 2;
    // $mail->SMTPSecure = 'ssl'; 
    // $mail->SMTPAuth = true; 
    // $mail->Host = "smtpout.secureserver.net"; 
    // $mail->Port = 465; //465 587
    //GODADDY!!!
            $mail->Host = 'relay-hosting.secureserver.net';
            $mail->Port = 25;
            $mail->SMTPAuth = false;
            $mail->SMTPSecure = false;
    $mail->Username = ""; 
    $mail->Password = "";
    $mail->AddAddress('', 'Customer');
    $mail->AddAddress('', 'Customer');
    //$mail->AddAddress('', 'Customer');
    $mail->SetFrom($text3, '');
    $mail->Subject = $text4;
    $mail->AltBody = ''; 
    $mail->CharSet = 'UTF-8';
    $body = "<div style=\"font-size:17px;font-family:Georgia;color:#14695e;\" accept-charset=\"utf-8\" charset=\"UTF-8\">
    Dear Admin,<br><br>Website Contact Information Below.</div><br><hr style=\"border:0;height:2px;background-image:linear-gradient(to right,rgba(0, 0, 0, 0),rgba(237,30,121,0.75),rgba(0, 0, 0, 0));\">
    <div style=\"font-size:17px;font-family:Georgia;color:#14695e;\" accept-charset=\"utf-8\" charset=\"UTF-8\">
     First Name : $text1<br><br>
     Last Name : $text2<br><br>
     Email : $text3<br><br>
     other : $text5<br><br>
    </div><hr style=\"border:0;height:2px;background-image:linear-gradient(to right,rgba(0, 0, 0, 0),rgba(237,30,121,0.75),rgba(0, 0, 0, 0));\">"; // automatically
    $mail->MsgHTML($body);
    $mail->PreSend();
    $mail->Send();
    //echo "Message Sent OK</p>\n";
    $_SESSION['contact_thankyou'] = "99999999999999992";
    header("Refresh:0; url=/ThankYou");
} catch ( phpmailerException $e ) {
    echo $e->errorMessage(); 
} catch ( Exception $e ) {
    echo $e->getMessage(); 
}



//header("Refresh:0; url=/Home");



?>