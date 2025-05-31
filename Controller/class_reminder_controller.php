<?php 
   include("../Model/dbconfig.php");
   mysql_set_charset("utf8");
   session_start();


   
    if(!empty($_POST['phone_number']) && $_POST['phone_number'] != '' ){

      $sql_sms_message = 'select * from sms_messages';
                        $retval_sms_message = mysql_query( $sql_sms_message, $conn );
                             if(! $retval_sms_message )
                             {
                                die('Could not get data: ' . mysql_error());
                             }
                        $row_sms_message = mysql_fetch_array($retval_sms_message, MYSQL_ASSOC);
                        $sms_message_text = $row_sms_message['text3'];

      $phone_number= mysql_real_escape_string($_POST['phone_number'],$conn);
      $class_time= mysql_real_escape_string($_POST['class_time'],$conn);


  
      $sql="SELECT ct_Phone, ct_Mobile FROM cormember WHERE ct_Phone='$phone_number' OR ct_Mobile='$phone_number' LIMIT 1";     
      $result=mysql_query($sql, $conn);
      
      $count=mysql_num_rows($result);

      if(! $result )
          {
            die('Could not confirm user: ' . mysql_error());
          }
      $row_customer = mysql_fetch_array($result, MYSQL_ASSOC);
      $phone_number = ''; 

      if($row_customer['ct_Phone'] != '') {
        $phone_number = $row_customer['ct_Phone'];
      } else {
        $phone_number = $row_customer['ct_Mobile'];
      }

//echo $phone_number;

            $_SESSION['phone_number'] = $phone_number;
            $username = "2hfitness";     // 帳號
            $password = "88888888";     // 密碼
            $mobile = $phone_number; // 電話 $phone_number
            $message = mysql_real_escape_string($sms_message_text.' '.$class_time.'',$conn);
            //'you have a class in less than 3 hours. your class time is '.$class_time.' ';  // 簡訊內容
            $MSGData = "";
            $Tmp = "";


            $msg = "username=".$username."&password=".$password."&mobile=".$mobile."&message=".urlencode($message);
            $num = strlen($msg);        

            // 打開 API 閘道
            $fp = fsockopen ("api.twsms.com", 80);
            if ($fp) {
                $MSGData .= "POST /smsSend.php HTTP/1.1\r\n";
                $MSGData .= "Host: api.twsms.com\r\n";
                $MSGData .= "Content-Length: ".$num."\r\n";
                $MSGData .= "Content-Type: application/x-www-form-urlencoded\r\n";
                $MSGData .= "Connection: Close\r\n\r\n";
                $MSGData .= $msg."\r\n";
                fputs ($fp, $MSGData);

                  $sqla = 'INSERT INTO sent_sms (sms_type, sms_message, sms_date, sms_number) VALUES ( "class_reminder", "'.$message.'", NOW(), "'.$phone_number.'")';

                  $retvala = mysql_query( $sqla, $conn );
                    if(! $retvala ) {  
                        die('Could not enter data: ' . mysql_error());
                      }

                // 取出回傳值
                while (!feof($fp)) $Tmp.=fgets ($fp,128); 

                // 關閉閘道
                fclose ($fp);
                echo $phone_number;
                return $phone_number;

            } else {
              echo "0";
                return "0";
            }

      }
   
?>