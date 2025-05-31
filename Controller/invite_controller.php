<?php  

include '../Model/dbconfig.php';
mysql_set_charset("utf8");
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
    //$mail->AddAddress('', 'Customer');
    //$mail->AddAddress('', 'Customer');
    //$mail->AddAddress('', 'Customer');
    $mail->SetFrom($text2, '');
    $mail->Subject = $text1;
    $mail->AltBody = ''; 
    $mail->CharSet = 'UTF-8';
    $body = "<div style=\"font-size:17px;font-family:Georgia;color:#14695e;\" accept-charset=\"utf-8\" charset=\"UTF-8\">
    Dear Recipient,<br><br>You Have Been Invited to Join.</div><br><hr style=\"border:0;height:2px;background-image:linear-gradient(to right,rgba(0, 0, 0, 0),rgba(237,30,121,0.75),rgba(0, 0, 0, 0));\">
    <div style=\"font-size:17px;font-family:Georgia;color:#14695e;\" accept-charset=\"utf-8\" charset=\"UTF-8\">
     First Name : $text1<br><br>
     Last Name : $text2<br><br>
     other : $text4<br><br>
    </div><hr style=\"border:0;height:2px;background-image:linear-gradient(to right,rgba(0, 0, 0, 0),rgba(237,30,121,0.75),rgba(0, 0, 0, 0));\">"; // automatically
    $mail->MsgHTML($body);
    $mail->PreSend();
    $mail->Send();
    //echo "Message Sent OK</p>\n";
    header('Location: ' . $_SERVER['HTTP_REFERER']);
} catch ( phpmailerException $e ) {
    echo $e->errorMessage(); 
} catch ( Exception $e ) {
    echo $e->getMessage(); 
}




//header("Refresh:0; url=/Home");


?>