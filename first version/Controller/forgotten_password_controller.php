<?php 
   include("Model/dbconfig.php");
   mysql_set_charset("utf8");
include_once "../Mail/class.phpmailer.php";
include_once "../Mail/class.phpmaileroauth.php";
//include_once "../Mail/class.phpmaileroauthgoogle.php";
include_once "../Mail/class.pop3.php";
include_once "../Mail/class.smtp.php";
include_once "../Mail/PHPMailerAutoload.php";
$todo='';
$mail = new PHPMailer(true);



  $error = '';
   
   if(isset($_POST['forgotten_submit'])){

    if(!empty($_POST['forgotten_email'])){

      $forgotten_email= mysql_real_escape_string($_POST['forgotten_email'],$conn);

  
      $sql="SELECT customer_email, customer_first_name FROM shop_digisurf_customer WHERE customer_email='$forgotten_email' LIMIT 1";     
      $result=mysql_query($sql, $conn);
      
      $count=mysql_num_rows($result);

      if(! $result )
          {
            die('Could not confirm user: ' . mysql_error());
          }
      $row_customer = mysql_fetch_array($result, MYSQL_ASSOC);
      $customer_email = $row_customer['customer_email'];
      $customer_first_name = $row_customer['customer_first_name'];
		
      if($count==1)
      {

        $code = md5(uniqid(rand()));


        $sql="UPDATE shop_digisurf_customer SET customer_secret_code='".$code."'  WHERE customer_email='".$customer_email."' LIMIT 1";              
                   $retval = mysql_query( $sql, $conn );
                   if(! $retval )
                       {
                          die('Could not update data: ' . mysql_error());
                       }

        $mail->IsSMTP();
        try {
            //$mail->SMTPDebug = 2;
            //$mail->SMTPSecure = 'SSL'; 
            //$mail->SMTPAuth = true; 
            //$mail->Host = "smtpout.secureserver.net"; 
            //$mail->Port = 465; //465 587
            //GODADDY!!!
            $mail->Host = 'relay-hosting.secureserver.net';
            $mail->Port = 25;
            $mail->SMTPAuth = false;
            $mail->SMTPSecure = false;

            $mail->Username = "no_reply@Customer.com"; 
            $mail->Password = "info84Customer";
            //$mail->AddAddress('info@Customer.com', 'Customer');
            //$mail->AddAddress('janec@Customer.com', 'Customer');
            $mail->AddAddress($customer_email, $customer_first_name);
            $mail->SetFrom('no_reply@Customer.com', 'no_reply@Customer.com');
            $mail->Subject = 'Password Reset';
            $mail->AltBody = ''; 
            $mail->CharSet = 'UTF-8';
            $body = "<div style=\"font-size:17px;font-family:Georgia;color:#14695e;\" accept-charset=\"utf-8\" charset=\"UTF-8\">
            Dear User,<br><br>Password Reset.</div><br><hr style=\"border:0;height:2px;background-image:linear-gradient(to right,rgba(0, 0, 0, 0),rgba(237,30,121,0.75),rgba(0, 0, 0, 0));\">
            <div style=\"font-size:17px;font-family:Georgia;color:#14695e;\" accept-charset=\"utf-8\" charset=\"UTF-8\">
             
             Hello $customer_first_name, 
                   <br /><br />
                   We got requested to reset your password, if you did this then just click the following link to reset your password, if not just ignore this email,
                   <br /><br />
                   Click Following Link To Reset Your Password.
                   <br /><br />
                   <a href='http://newsite.Customer.info/ResetPassword/$code'>click here to reset your password</a>
                   <br /><br />
                   thank you :)
                   <br /><br />
                   Customer

            </div><hr style=\"border:0;height:2px;background-image:linear-gradient(to right,rgba(0, 0, 0, 0),rgba(237,30,121,0.75),rgba(0, 0, 0, 0));\">"; // automatically
            $mail->MsgHTML($body);
            $mail->PreSend();
            $mail->Send();
            
            header("location: /ForgottenPasswordSecurityCheck");
        } catch ( phpmailerException $e ) {
            echo $e->errorMessage(); 
        } catch ( Exception $e ) {
            echo $e->getMessage(); 
        }
         
         //

      } else {
        $error = 'Your Email was not found! Please try again.';
      }

   } else {
      $error = 'Please fill in YOUR Email!';
   }

 }
   
?>