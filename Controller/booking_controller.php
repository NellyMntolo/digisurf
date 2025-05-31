<?php  
include '../Model/dbconfig.php';
mysql_set_charset("utf8");
session_start();

if(!isset($_SESSION['login_visitor'])){
    header("location: /Booking"); 
      exit;
} else {
$current_user = $_SESSION['login_visitor'];

$tc_Member = $_POST['studentNum'];
$tc_TimeTable_Guid = $_POST['tt_Guid'];
//echo $_POST['tc_Second'];

//$tc_sync_Guid = $_POST['sync_guid'];

$tc_sync_Guid = '';

function gen_uuid() {
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
$theGuid = strtoupper(gen_uuid());


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
$syncGuid = strtoupper(sync_uuid());
                       //for later
//                         $sqlcormember = 'SELECT ct_No FROM cormember WHERE ct_Type=01 AND ct_Mobile="'.$_SESSION['login_visitor'].'" ';
//                         $retvalcormember = mysql_query( $sqlcormember, $conn );                 
//                              if(! $retvalcormember )
//                              {
//                                 die('Could not get data: ' . mysql_error());
//                              }
//                         $rowcormember = mysql_fetch_array($retvalcormember, MYSQL_ASSOC);
//                         $cormemberNum = $rowcormember['ct_No'];


//                         $sqlcortickclassuse = 'SELECT tc_Classno, tc_Gdsno FROM cortickclassuse WHERE tc_Classno = "'.$classnumber.'" ';
//                         $retvalcortickclassuse = mysql_query( $sqlcortickclassuse, $conn );                 
//                              if(! $retvalcortickclassuse )
//                              {
//                                 die('Could not get data: ' . mysql_error());
//                              }
//                             $rowcortickclassuse = mysql_fetch_array($retvalcortickclassuse, MYSQL_ASSOC);
//                             $tc_Classno = $rowcortickclassuse['tc_Classno'];
//                             $tc_Gdsno[] = $rowcortickclassuse['tc_Gdsno'];
                            

//                             $mytc_Gdsno = array();
//                             if(!empty($tc_Gdsno)) {
//                               $mytc_Gdsno = $tc_Gdsno;
//                             } else {
//                               $mytc_Gdsno = array('0' => '9000000000000', );
//                             }

                        


// //echo $cormemberNum;
//                         $sqltkticket = 'SELECT tk_Guid FROM tkticket WHERE tk_Member = "'.$cormemberNum.'" AND tk_Gdsno IN ('.implode($mytc_Gdsno,',').') AND tk_Delete !=1 ';
//                         $retvaltkticket = mysql_query( $sqltkticket, $conn );                 
//                              if(! $retvaltkticket )
//                              {
//                                 die('Could not get data: ' . mysql_error());
//                              }
//                             $rowtkticket = mysql_fetch_array($retvaltkticket, MYSQL_ASSOC);
//                             $tk_Guid[] = $rowtkticket['tk_Guid'];
//                             //print_r($tk_Guid);

//                             $mytk_Guid = array();
//                             if(in_array('', $tk_Guid)) {
//                               $mytk_Guid = array('0' => '900000000000000', );
//                             } else {
//                               $mytk_Guid = $tk_Guid;
//                             }


//                         $sqltkticksales = 'SELECT * FROM tkticksales WHERE ts_Parent IN ('.implode($mytk_Guid,',').') AND ts_BagDate <= now() AND ts_ExpDate >= now() AND ts_Close !=1 ';
//                         $retvaltkticksales = mysql_query( $sqltkticksales, $conn );                 
//                              if(! $retvaltkticksales )
//                              {
//                                 die('Could not get data: ' . mysql_error());
//                              }
//                             $rowtkticksales = mysql_fetch_array($retvaltkticksales, MYSQL_ASSOC);
//                             $ts_Close = $rowtkticksales['ts_Close'];
                            //for later

                            //$count=mysql_num_rows($retvaltkticksales);

                            //if($count > 0)//==



///Check if the sync GUID exists and update if it is already there

                $sqlsync_list_available = 'SELECT sync_guid FROM  tkclassbooking WHERE tc_TimeTable_Guid ="'.$tc_TimeTable_Guid.'" ';
                        $retvalsync_list_available = mysql_query( $sqlsync_list_available, $conn );                 
                             if(! $retvalsync_list_available )
                             {
                                die('Could not get data: ' . mysql_error());
                             }
                        $rowsync_list_available = mysql_fetch_array($retvalsync_list_available, MYSQL_ASSOC);
                        $sync_list_available_sync_guid = $rowsync_list_available['sync_guid'];

                        if($tc_sync_Guid == $sync_list_available_sync_guid) {

                        }

                        $sql_sms_message = 'select * from sms_messages';
                        $retval_sms_message = mysql_query( $sql_sms_message, $conn );
                             if(! $retval_sms_message )
                             {
                                die('Could not get data: ' . mysql_error());
                             }
                        $row_sms_message = mysql_fetch_array($retval_sms_message, MYSQL_ASSOC);
                        $sms_message_text = $row_sms_message['text2'];

                if(!empty($current_user)){

                    if($_POST['tc_Second'] == "1"){
                        $sqla = 'INSERT INTO tkclassbooking (tc_Guid, tc_Gtimer, tc_Creater, tc_TimeTable_Guid, tc_Member, tc_FirstTrial, tc_Second, sync_guid, sync_ok, tc_Delete ) VALUES ( "'.$theGuid.'", now(), "2h-fitness.com", "'.$tc_TimeTable_Guid.'", "'.$tc_Member.'", "0", "1", "'.$syncGuid.'", "0", "0")';
                        $retvala = mysql_query( $sqla, $conn );
                        if(! $retvala ) {  
                            die('Could not enter data: ' . mysql_error());
                          }

                          if (isset($_POST['phone_number'])) {
                              # code...
                            $phone_number = $_POST['phone_number'];
                         
                            $username = "2hfitness";     // 帳號
                            $password = "88888888";     // 密碼
                            $mobile = $phone_number; // 電話 $phone_number
                            $message = $sms_message_text;  // 簡訊內容
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

                                  $sqla = 'INSERT INTO sent_sms (sms_type, sms_message, sms_date, sms_number) VALUES ( "booking_reminder", "'.$message.'", NOW(), "'.$phone_number.'")';

                                  $retvala = mysql_query( $sqla, $conn );
                                    if(! $retvala ) {  
                                        die('Could not enter data: ' . mysql_error());
                                      }

                                // 取出回傳值
                                while (!feof($fp)) $Tmp.=fgets ($fp,128); 

                                // 關閉閘道
                                fclose ($fp);
                                //echo $phone_number;
                                return $phone_number;

                            } else {
                              echo "0";
                                return "0";
                            }
                        }

                    } else {
                    $sqla = 'INSERT INTO tkclassbooking (tc_Guid, tc_Gtimer, tc_Creater, tc_TimeTable_Guid, tc_Member, tc_FirstTrial, tc_Second, sync_guid, sync_ok, tc_Delete ) VALUES ( "'.$theGuid.'", now(), "2h-fitness.com", "'.$tc_TimeTable_Guid.'", "'.$tc_Member.'", "0", "0", "'.$syncGuid.'", "0", "0")';
                      $retvala = mysql_query( $sqla, $conn );
                        if(! $retvala ) {  
                            die('Could not enter data: ' . mysql_error());
                          }




                          if (isset($_POST['phone_number'])) {
                              # code...
                            $phone_number = $_POST['phone_number'];
                         
                            $username = "2hfitness";     // 帳號
                            $password = "88888888";     // 密碼
                            $mobile = $phone_number; // 電話 $phone_number
                            $message = $sms_message_text;  // 簡訊內容
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

                                  $sqla = 'INSERT INTO sent_sms (sms_type, sms_message, sms_date, sms_number) VALUES ( "booking_reminder", "'.$message.'", NOW(), "'.$phone_number.'")';

                                  $retvala = mysql_query( $sqla, $conn );
                                    if(! $retvala ) {  
                                        die('Could not enter data: ' . mysql_error());
                                      }

                                // 取出回傳值
                                while (!feof($fp)) $Tmp.=fgets ($fp,128); 

                                // 關閉閘道
                                fclose ($fp);
                                //echo $phone_number;
                                return $phone_number;

                            } else {
                              echo "0";
                                return "0";
                            }
                        }
                    }//tc_Second


                    }//if not empty


            }//else   
?>