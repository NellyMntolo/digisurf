<?php  
include '../Model/dbconfig.php';
mysql_set_charset("utf8");
session_start();

$result = '';
$text1 = $_POST['cancel_booking'];
$text2 = $_POST['the-user'];


if(!isset($_SESSION['login_visitor'])){
    header("location: /Booking"); 
      exit;
} else {
$current_user = $_SESSION['login_visitor'];

                  if(!empty($text1) && !empty($text2)){

                    $sql_booked_cormember = 'select * from cormember where ct_Mobile="'.$current_user.'" OR ct_Phone="'.$current_user.'" ';
                        $retval_booked_cormember = mysql_query( $sql_booked_cormember, $conn );                 
                             if(! $retval_booked_cormember )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

                            $row_booked_cormember = mysql_fetch_array($retval_booked_cormember, MYSQL_ASSOC);
                            $ct_booked_No = $row_booked_cormember['ct_No'];
                    
                    $sql="UPDATE tkclassbooking SET tc_Delete = 1, sync_ok = 0 WHERE tc_TimeTable_Guid = '".$text1."' and tc_Member='".$ct_booked_No."' ";     // LIMIT 1         
                    $retval = mysql_query( $sql, $conn );
                    if(! $retval )
                        {
                           die('Could not enter data: ' . mysql_error());
                        }

                    // $sqlb="UPDATE tktimetable SET sync_guid = sync_guid WHERE tt_Guid = '".$text1."' LIMIT 1";              
                    // $retvalb = mysql_query( $sqlb, $conn );
                    // if(! $retvalb )
                    //     {
                    //        die('Could not enter data: ' . mysql_error());
                    //     }

                    $sqla = 'INSERT INTO cancel_list (timetable_guid, member_giud, created_at) VALUES ("'.$text1.'", "'.$text2.'", now() )';
                      $retvala = mysql_query( $sqla, $conn );
                        if(! $retvala ) {  
                            die('Could not enter data: ' . mysql_error());
                          }
                        
                    header('Location: ' . $_SERVER['HTTP_REFERER']);

                    }//if not empty


            }//else   
?>