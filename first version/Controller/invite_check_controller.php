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
$mail = new PHPMailer(true);
$result = '';
//if(isset($_POST['selected_category'])){ 
  $customer_email = mysql_real_escape_string($_POST['text2'],$conn);
  $invite_email = mysql_real_escape_string($_POST['text3'],$conn);


                        $sqlinvites = 'select * from digisurf_invite_list where customer_email= "'.$customer_email.'" and invite_email="'.$invite_email.'" limit 1';
                        $retvalinvites = mysql_query( $sqlinvites, $conn );                 
                             if(! $retvalinvites )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

                        
                        //$rowinvites = mysql_fetch_array($retvalinvites, MYSQL_ASSOC);
                            //$current_customer_email = $rowinvites['customer_email']; 
                            //$current_invite_email = $rowinvites['invite_email'];

                            $exsisting = mysql_num_rows($retvalinvites);

                            if($exsisting == 1){
                              $result = "1";
                            } elseif ($exsisting == 0){
                              $result = "0";



                              $text1 = mysql_real_escape_string($_POST['text1'],$conn);
    $text2 = mysql_real_escape_string($_POST['text2'],$conn);
    $text3 = mysql_real_escape_string($_POST['text3'],$conn);
    $text4 = mysql_real_escape_string($_POST['text4'],$conn);

$mail->IsSMTP();
try {
    //$mail->SMTPDebug = 2;
    $mail->SMTPSecure = 'ssl'; 
    $mail->SMTPAuth = true; 
    $mail->Host = "smtpout.secureserver.net"; 
    $mail->Port = 465; //465 587
    //GODADDY!!!
            // $mail->Host = 'relay-hosting.secureserver.net';
            // $mail->Port = 25;
            // $mail->SMTPAuth = false;
            // $mail->SMTPSecure = false;
    $mail->Username = "no_reply@Customer.com"; 
    $mail->Password = "info84Customer";
    //$mail->AddAddress('info@Customer.com', 'Customer');
    //$mail->AddAddress('janec@Customer.com', 'Customer');
    $mail->AddAddress($text3, 'Customer');
    $mail->SetFrom('no_reply@Customer.com', 'no_reply@Customer.com');
    $mail->Subject = $text1;
    $mail->AltBody = ''; 
    $mail->CharSet = 'UTF-8';
    $body = "<div style=\"font-size:17px;font-family:Georgia;color:#14695e;\" accept-charset=\"utf-8\" charset=\"UTF-8\">
        DO NOT REPLY<br><br>Dear Recipient,<br><br>You Have Been Invited to Join.</div><br><hr style=\"border:0;height:2px;background-image:linear-gradient(to right,rgba(0, 0, 0, 0),rgba(237,30,121,0.75),rgba(0, 0, 0, 0));\">
        <div style=\"font-size:17px;font-family:Georgia;color:#14695e;\" accept-charset=\"utf-8\" charset=\"UTF-8\">
         From : $text1<br><br>
         Email : $text2<br><br>
         Message : $text4<br><br>
         <a href=\"http://www.Customer.dev/Invite2\" target=\"_blank\">Check it out</a><br><br>
        </div><hr style=\"border:0;height:2px;background-image:linear-gradient(to right,rgba(0, 0, 0, 0),rgba(237,30,121,0.75),rgba(0, 0, 0, 0));\">"; // automatically
    $mail->MsgHTML($body);
    $mail->PreSend();
    $mail->Send();
    //echo "Message Sent OK</p>\n";
    //header('Location: ' . $_SERVER['HTTP_REFERER']);

    $sqla = 'INSERT INTO digisurf_invite_list (customer_email, invite_email, invite_date) VALUES ( "'.$text2.'", "'.$text3.'", NOW())';

  $retvala = mysql_query( $sqla, $conn );
    if(! $retvala ) {  
        die('Could not enter data: ' . mysql_error());
      }


} catch ( phpmailerException $e ) {
    echo $e->errorMessage(); 
} catch ( Exception $e ) {
    echo $e->getMessage(); 
}

                            }

echo $result;
?>