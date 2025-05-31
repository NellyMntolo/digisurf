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

    $text1 = mysql_real_escape_string($_POST['text1'],$conn);
    $text2 = mysql_real_escape_string($_POST['text2'],$conn);
    $text3 = mysql_real_escape_string($_POST['text3'],$conn);
    $text4 = mysql_real_escape_string($_POST['text4'],$conn);
    $text5 = mysql_real_escape_string($_POST['text5'],$conn);
    $text6 = mysql_real_escape_string($_POST['text6'],$conn);
    $text7 = mysql_real_escape_string($_POST['text7'],$conn);
    $text8 = mysql_real_escape_string($_POST['text8'],$conn);
    $text9 = mysql_real_escape_string($_POST['text9'],$conn);
    $text10 = mysql_real_escape_string($_POST['text10'],$conn);
    $text11 = mysql_real_escape_string($_POST['text11'],$conn);


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
    $mail->Username = "info@Customer.com"; 
    $mail->Password = "L84nyc2016";
    $mail->AddAddress('info@Customer.com', 'Customer');
    $mail->AddAddress('janec@Customer.com', 'Customer');
    //$mail->AddAddress('info@Customer.com', 'Customer');
    $mail->SetFrom($text4, 'info@Customer.com');
    $mail->Subject = $text4;
    $mail->AltBody = ''; 
    $mail->CharSet = 'UTF-8';
    $body = "<div style=\"font-size:17px;font-family:Georgia;color:#14695e;\" accept-charset=\"utf-8\" charset=\"UTF-8\">
    Dear Admin,<br><br>Website Contact Information Below.</div><br><hr style=\"border:0;height:2px;background-image:linear-gradient(to right,rgba(0, 0, 0, 0),rgba(237,30,121,0.75),rgba(0, 0, 0, 0));\">
    <div style=\"font-size:17px;font-family:Georgia;color:#14695e;\" accept-charset=\"utf-8\" charset=\"UTF-8\">
     First Name : $text1<br><br>
     Last Name : $text2<br><br>
     Phone Number : $text3<br><br>
     Email : $text4<br><br>
     Time : $text5<br><br>
     English : $text6<br><br>
     chinese : $text7<br><br>
     Cantonese : $text8<br><br>
     Fuzhou dialect : $text9<br><br>
     other : $text10<br><br>
     越快越好 : $text11<br><br>
    </div><hr style=\"border:0;height:2px;background-image:linear-gradient(to right,rgba(0, 0, 0, 0),rgba(237,30,121,0.75),rgba(0, 0, 0, 0));\">"; // automatically
    $mail->MsgHTML($body);
    $mail->PreSend();
    $mail->Send();
    //echo "Message Sent OK</p>\n";
    $_SESSION['knowing_thankyou'] = "99999999999999991";
    header("Refresh:0; url=/ThankYou");
} catch ( phpmailerException $e ) {
    echo $e->errorMessage(); 
} catch ( Exception $e ) {
    echo $e->getMessage(); 
}



//header("Refresh:0; url=/Home");


?>