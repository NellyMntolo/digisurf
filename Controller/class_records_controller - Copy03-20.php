<?php  
include '../Model/dbconfig.php';
mysql_set_charset("utf8");
session_start();

date_default_timezone_set("Asia/Taipei");
$thedd = date('Y-m-d H:i:s',strtotime('now'));
$result = '';
$text1 = $_POST['record_dates'];
//$cc_Times = String;
//$cc_Times = '';


	$re = '[-]';
    $str = $_POST['record_dates'];
    preg_match_all($re, $str, $matches);

	$start_date = '';
    $end_date = '';
    $val []= split('[-]', $str);
    foreach ($val as $key => $value) {
      $times = array("AM", " PM", "  ");
      $endates = str_replace($times, '', $value);
      $start_date = $endates[0];
      $end_date = $endates[1];      
    }

    //echo $end_date.'<br>';

    //$result = 'dates = '.$start_date.' - '.$end_date;

if(!isset($_SESSION['login_visitor'])){
    header("location: /Booking"); 
      exit;
} else {
$current_user = $_SESSION['login_visitor'];

                  if(!empty($text1)){
                    //CONTENT
//                         $sql_cormember = 'select * from cormember where ct_Mobile="'.$current_user.'" ';
//                         $retval_cormember = mysql_query( $sql_cormember, $conn );                 
//                              if(! $retval_cormember )
//                              {
//                                 die('Could not get data: ' . mysql_error());
//                              }

//                             $row_cormember = mysql_fetch_array($retval_cormember, MYSQL_ASSOC);                            
//                             $ct_No = $row_cormember['ct_No'];


//                         //$sql_tkswiping = 'select * from tkswiping where ts_Member="'.$ct_No.'" AND (ts_Date BETWEEN "'.$start_date.' 00:00:00"  AND "'.$end_date.' 23:59:00") order by ts_Date ASC';
//                         $sql_tkswiping = 'select * from tkswiping where ts_Member="'.$ct_No.'" ';
//                         $retval_tkswiping = mysql_query( $sql_tkswiping, $conn );                 
//                              if(! $retval_tkswiping )
//                              {
//                                 die('Could not get data: ' . mysql_error());
//                              }

//                         while($row_tkswiping = mysql_fetch_array($retval_tkswiping, MYSQL_ASSOC)){                     
//                             $ts_Class = $row_tkswiping['ts_Class'];
//                             $ts_Date = $row_tkswiping['ts_Date'];
//                             $ts_TimeTable_Guid = $row_tkswiping['ts_TimeTable_Guid'];


//                         $sql_corclasses = 'select * from corclasses where cc_No="'.$ts_Class.'" ';
//                         $retval_corclasses = mysql_query( $sql_corclasses, $conn );                 
//                              if(! $retval_corclasses )
//                              {
//                                 die('Could not get data: ' . mysql_error());
//                              }

//                             $row_corclasses = mysql_fetch_array($retval_corclasses, MYSQL_ASSOC);                            
//                             $cc_Name = $row_corclasses['cc_Name'];
//                             $cc_No = $row_corclasses['cc_No'];
//                             $cc_Times = $row_corclasses['cc_Times'];

//                         $sql_tktimetable = 'select * from tktimetable where tt_Class="'.$cc_No.'" and tt_guid="'.$ts_TimeTable_Guid.'" ';
//                         $retval_tktimetable = mysql_query( $sql_tktimetable, $conn );                 
//                              if(! $retval_tktimetable )
//                              {
//                                 die('Could not get data: ' . mysql_error());
//                              }

//                             $row_tktimetable = mysql_fetch_array($retval_tktimetable, MYSQL_ASSOC);                         
//                             $tt_Teacher = $row_tktimetable['tt_Teacher'];
                  

// //
//                         $sql_teacher = 'select * from cormember where ct_No="'.$tt_Teacher.'" AND ct_Type=02 ';
//                         $retval_teacher = mysql_query( $sql_teacher, $conn );                 
//                              if(! $retval_teacher )
//                              {
//                                 die('Could not get data: ' . mysql_error());
//                              }

//                             $row_teacher = mysql_fetch_array($retval_teacher, MYSQL_ASSOC);
//                             $ct_Name = $row_teacher['ct_Name'];

//                         $sql_classbooking = 'select * from tkclassbooking where tc_TimeTable_Guid="'.$ts_TimeTable_Guid.'" ';
//                         $retval_classbooking = mysql_query( $sql_classbooking, $conn );                 
//                              if(! $retval_classbooking )
//                              {
//                                 die('Could not get data: ' . mysql_error());
//                              }

//                             $row_classbooking = mysql_fetch_array($retval_classbooking, MYSQL_ASSOC);
//                             $tc_TimeTable_Guid = $row_classbooking['tc_TimeTable_Guid'];
//                             $tc_Delete = $row_classbooking['tc_Delete'];

//                         $sql_tktimetable_classbooking = 'select * from tktimetable where tt_Class="'.$cc_No.'" and tt_guid="'.$tc_TimeTable_Guid.'" AND (tt_Date BETWEEN "'.$start_date.' 00:00:00"  AND "'.$end_date.' 23:59:00") order by tt_Date desc';//tt_guid="'.$tc_TimeTable_Guid.'"
//                         $retval_tktimetable_classbooking = mysql_query( $sql_tktimetable_classbooking, $conn );                 
//                              if(! $retval_tktimetable_classbooking )
//                              {
//                                 die('Could not get data: ' . mysql_error());
//                              }

//                             $row_tktimetable_classbooking = mysql_fetch_array($retval_tktimetable_classbooking, MYSQL_ASSOC);                       
//                             $tt_Date = $row_tktimetable_classbooking['tt_Date'];
//                             $tt_Class = $row_tktimetable_classbooking['tt_Class'];
//                             $tt_Room = $row_tktimetable_classbooking['tt_Room'];
// //echo $tt_Date;
//                         $sql_corclasses_classbooking = 'select * from corclasses where cc_No="'.$tt_Class.'" and cc_ClassRoom="'.$tt_Room.'" ';
//                         $retval_corclasses_classbooking = mysql_query( $sql_corclasses_classbooking, $conn );                 
//                              if(! $retval_corclasses_classbooking )
//                              {
//                                 die('Could not get data: ' . mysql_error());
//                              }

//                             $row_corclasses_classbooking = mysql_fetch_array($retval_corclasses_classbooking, MYSQL_ASSOC);                           
//                             $booked_Name = $row_corclasses_classbooking['cc_Name'];


//                             $upcoming = date_create($tt_Date);
//                             $booked_date_time = date_format($upcoming, 'Y-m-d h:i:s');
//                             $booked_date = date_format($upcoming, 'Y-m-d');
//                             $booked_time = date_format($upcoming, 'H:i');

//                             //$endtime = strtotime('+'.$cc_Times.' minutes', strtotime($upcoming));
//                             $booked_status = date($booked_date_time, strtotime('+'.$cc_Times.' minutes'));


//                             $the_date = date_create($ts_Date);
//                             $Class_date = date_format($the_date, 'Y-m-d');
//                             $SomeDate = date_format($the_date, 'Y-m-d h:i:s');
//                             $the_time = date_create($ts_Date);
//                             $Class_time = date_format($the_time, 'H:i');

                            
//                             $added_minutes = date($SomeDate, strtotime('+'.$cc_Times.' minutes'));
// //echo $added_minutes;
//                             if(!empty($tt_Date)){
//                             if($tc_Delete != 1){

//                             if($booked_status < $thedd){
//                                 $result .= '<tr class="diss">
//                                                 <td><span>日期</span>'.$booked_date.'</td>
//                                                 <td><span>時間</span>'.$booked_time.'</td>
//                                                 <td><span>課程名稱</span>'.$cc_Name.'</td>
//                                                 <td><span>老師</span>'.$ct_Name.'</td>
//                                                 <td><span>取消</span>時間已過</td>
//                                                 <td></td>
//                                             </tr>';
//                             } 
//                             elseif($booked_status > $thedd){
//                                 $result .= '<tr>
//                                                 <td><span>日期</span>'.$booked_date.'</td>
//                                                 <td><span>時間</span>'.$booked_time.'</td>
//                                                 <td><span>課程名稱</span>'.$booked_Name.'</td>
//                                                 <td><span>老師</span>'.$ct_Name.'</td>
//                                                 <td><span>取消</span>已預約</td>
//                                                 <td data-toggle="modal" data-target="#memberModal"><button type="button" class="btn modal-close"></button><input type="button" class="btn the-value" value="'.$ts_TimeTable_Guid.'" style="position:relative; z-index:999999; width:100%; height:100%;margin-top:-10px;opacity:0;"></td>
//                                             </tr>';
//                             }
//                         }
//                     }


//                         }//while




                    /* -------------------------------------------------------------------------------------------------------------------------- */

                        $sql_booked_cormember = 'select * from cormember where ct_Mobile="'.$current_user.'" OR ct_Phone="'.$current_user.'"  ';
                        $retval_booked_cormember = mysql_query( $sql_booked_cormember, $conn );                 
                             if(! $retval_booked_cormember )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

                            $row_booked_cormember = mysql_fetch_array($retval_booked_cormember, MYSQL_ASSOC);
                            $ct_booked_No = $row_booked_cormember['ct_No'];
                            $ct_booked_Guid = $row_booked_cormember['ct_Guid'];

//echo $ct_booked_No.'<br>';
                        $sql_booked_tkclassbooking = 'select * from tkclassbooking where tc_Member="'.$ct_booked_No.'"';
                        $retval_booked_tkclassbooking = mysql_query( $sql_booked_tkclassbooking, $conn );                 
                             if(! $retval_booked_tkclassbooking )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

                        while($row_booked_tkclassbooking = mysql_fetch_array($retval_booked_tkclassbooking, MYSQL_ASSOC)){        
                        $tc_booked_TimeTable_Guid = $row_booked_tkclassbooking['tc_TimeTable_Guid'];
                        $tc_Delete = $row_booked_tkclassbooking['tc_Delete'];
                        $tc_Second = $row_booked_tkclassbooking['tc_Second'];

//echo $tc_booked_TimeTable_Guid.'<br>';                    

                        $sql_booked_tktimetable = 'select * from tktimetable where tt_Guid="'.$tc_booked_TimeTable_Guid.'" AND (tt_Date BETWEEN "'.$start_date.' 00:00:00"  AND "'.$end_date.' 23:59:00") ORDER BY tt_Date DESC';
                        $retval_booked_tktimetable = mysql_query( $sql_booked_tktimetable, $conn );                 
                             if(! $retval_booked_tktimetable )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

                            $row_booked_tktimetable = mysql_fetch_array($retval_booked_tktimetable, MYSQL_ASSOC);
                            $tt_booked_Date = $row_booked_tktimetable['tt_Date'];                           
                            $tt_booked_Class = $row_booked_tktimetable['tt_Class'];
                            $tt_booked_Teacher = $row_booked_tktimetable['tt_Teacher'];
//echo $tc_booked_TimeTable_Guid.'<br>';
                        $sql_booked_teacher = 'select * from cormember where ct_No="'.$tt_booked_Teacher.'" AND ct_Type=02 ';
                        $retval_booked_teacher = mysql_query( $sql_booked_teacher, $conn );                 
                             if(! $retval_booked_teacher )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

                            $row_booked_teacher = mysql_fetch_array($retval_booked_teacher, MYSQL_ASSOC);
                            $current_booked_ct_Name = $row_booked_teacher['ct_Name'];


                        $sql_booked_corclasses = 'select * from corclasses where cc_No="'.$tt_booked_Class.'" ';
                        $retval_booked_corclasses = mysql_query( $sql_booked_corclasses, $conn );                 
                             if(! $retval_booked_corclasses )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

                            $row_booked_corclasses = mysql_fetch_array($retval_booked_corclasses, MYSQL_ASSOC);                            
                            $cc_booked_Name = $row_booked_corclasses['cc_Name'];
                            $cc_booked_Times = $row_booked_corclasses['cc_Times'];

                            $the_booked_date = date_create($tt_booked_Date);
                            $Class_booked_date = date_format($the_booked_date, 'Y-m-d');
                            $Some_bookedDate = date_format($the_booked_date, 'Y-m-d h:i:s');
                            $the_booked_time = date_create($tt_booked_Date);
                            $Class_booked_time = date_format($the_booked_time, 'H:i');

                            $current_booked_status = date($Some_bookedDate, strtotime('+'.$cc_booked_Times.' minutes'));
                            //echo $current_booked_status.' - '.$thedd.'<br>';

                            // $endtime = strtotime('+'.$cc_booked_Times.' minutes', strtotime($the_booked_date));
                            // $added_minutes = date('Y-m-d h:i:s', $endtime);
                            // $added_minutes_time = date('h:i', $endtime);

                           
                                // if(!empty($Class_booked_date) && !empty($Class_booked_time) && !empty($cc_booked_Name)){
                                //     $body_records_info = '<p>提醒您於<span>'.$Class_booked_date.'</span><span>'.$Class_booked_time.'</span>有<span>'.$cc_booked_Name.'</span>課程！</p>';
                                // } else {
                                //   $body_records_info = '<p>規律的運動習慣，將幫助您達到健康目標！</p>';
                                // }

                        //     if($tc_Delete != 1){

                        //     if($booked_status < $thedd){
                        //         $class_records_info .= '<tr class="diss">
                        //                         <td><span>日期</span>'.$booked_date.'</td>
                        //                         <td><span>時間</span>'.$booked_time.'</td>
                        //                         <td><span>課程名稱</span>'.$cc_Name.'</td>
                        //                         <td><span>老師</span>'.$ct_Name.'</td>
                        //                         <td><span>取消</span>時間已過</td>
                        //                         <td></td>
                        //                     </tr>';
                        //     } 
                        //     elseif($current_booked_status > $thedd) {
                        //         $class_records_info .= '<tr>
                        //                         <td><span>日期</span>'.$Class_booked_date.'</td>
                        //                         <td><span>時間</span>'.$Class_booked_time.'</td>
                        //                         <td><span>課程名稱</span>'.$cc_booked_Name.'</td>
                        //                         <td><span>老師</span>'.$current_booked_ct_Name.'</td>
                        //                         <td><span>取消</span>已預約</td>
                        //                         <td data-toggle="modal" data-target="#memberModal"><button type="button" class="btn modal-close"></button><input type="button" class="btn the-value" value="'.$ts_TimeTable_Guid.'" style="position:relative; z-index:999999; width:100%; height:100%;margin-top:-10px;opacity:0;"></td>
                        //                     </tr>';
                        //     }
                        // }
                        if(!empty($tt_booked_Date)){
                        if($tc_Delete != 1){

                            if($current_booked_status > $thedd && $tc_Second != 1) {
                                $result .= '<tr>
                                                <td><span>日期</span>'.$Class_booked_date.'</td>
                                                <td><span>時間</span>'.$Class_booked_time.'</td>
                                                <td><span>課程名稱</span>'.$cc_booked_Name.'</td>
                                                <td><span>老師</span>'.$current_booked_ct_Name.'</td>
                                                <td><span>取消</span>已預約</td>
                                                <td data-toggle="modal" data-target="#memberModal"><button type="button" class="btn modal-close"></button><input type="button" class="btn the-value" value="'.$tc_booked_TimeTable_Guid.'" style="position:relative; z-index:999999; width:100%; height:100%;margin-top:-10px;opacity:0;"><input type="hidden" class="the-user" value="'.$ct_booked_Guid.'"></td>
                                            </tr>';
                            } elseif($current_booked_status > $thedd && $tc_Second == 1) {
                                $result .= '<tr>
                                                <td><span>日期</span>'.$Class_booked_date.'</td>
                                                <td><span>時間</span>'.$Class_booked_time.'</td>
                                                <td><span>課程名稱</span>'.$cc_booked_Name.'</td>
                                                <td><span>老師</span>'.$current_booked_ct_Name.'</td>
                                                <td><span>取消</span>候補</td>
                                                <td data-toggle="modal" data-target="#memberModal"><button type="button" class="btn modal-close"></button><input type="button" class="btn the-value" value="'.$tc_booked_TimeTable_Guid.'" style="position:relative; z-index:999999; width:100%; height:100%;margin-top:-10px;opacity:0;"><input type="hidden" class="the-user" value="'.$ct_booked_Guid.'"></td>
                                            </tr>';
                            }
                        }
                      }


                  }//while



                   /* -------------------------------------------------------------------------------------------------------------------------- */


                    //CONTENT
                        $sql_cormember = 'select * from cormember where ct_Mobile="'.$current_user.'" OR ct_Phone="'.$current_user.'"  ';
                        $retval_cormember = mysql_query( $sql_cormember, $conn );                 
                             if(! $retval_cormember )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

                            $row_cormember = mysql_fetch_array($retval_cormember, MYSQL_ASSOC);                            
                            $ct_No = $row_cormember['ct_No'];


                        $sql_tkswiping = 'select * from tkswiping where ts_Member="'.$ct_No.'" ';
                        $retval_tkswiping = mysql_query( $sql_tkswiping, $conn );                 
                             if(! $retval_tkswiping )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

                        while($row_tkswiping = mysql_fetch_array($retval_tkswiping, MYSQL_ASSOC)){                     
                            $ts_Class = $row_tkswiping['ts_Class'];
                            $ts_Date = $row_tkswiping['ts_Date'];
                            $ts_TimeTable_Guid = $row_tkswiping['ts_TimeTable_Guid'];

                        $sql_corclasses = 'select * from corclasses where cc_No="'.$ts_Class.'" ';
                        $retval_corclasses = mysql_query( $sql_corclasses, $conn );                 
                             if(! $retval_corclasses )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

                            $row_corclasses = mysql_fetch_array($retval_corclasses, MYSQL_ASSOC);                           
                            $cc_Name = $row_corclasses['cc_Name'];
                            $cc_No = $row_corclasses['cc_No'];
                            $cc_Times = $row_corclasses['cc_Times'];


                        $sql_tktimetable = 'select * from tktimetable where tt_Class="'.$cc_No.'" and tt_guid="'.$ts_TimeTable_Guid.'" ';// AND where  tt_Delete != 1
                        $retval_tktimetable = mysql_query( $sql_tktimetable, $conn );                 
                             if(! $retval_tktimetable )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

                            $row_tktimetable = mysql_fetch_array($retval_tktimetable, MYSQL_ASSOC);                       
                            $tt_Teacher = $row_tktimetable['tt_Teacher'];

                        $sql_teacher = 'select * from cormember where ct_No="'.$tt_Teacher.'" AND ct_Type=02 ';
                        $retval_teacher = mysql_query( $sql_teacher, $conn );                 
                             if(! $retval_teacher )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

                            $row_teacher = mysql_fetch_array($retval_teacher, MYSQL_ASSOC);
                            $ct_Name = $row_teacher['ct_Name'];

                        //$sql_classbooking = 'select * from tkclassbooking where tc_Member="'.$ct_No.'" AND tc_Delete != 1 ';
                        $sql_classbooking = 'select * from tkclassbooking where tc_TimeTable_Guid="'.$ts_TimeTable_Guid.'" ';
                        $retval_classbooking = mysql_query( $sql_classbooking, $conn );                 
                             if(! $retval_classbooking )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

                            $row_classbooking = mysql_fetch_array($retval_classbooking, MYSQL_ASSOC);
                            $tc_TimeTable_Guid = $row_classbooking['tc_TimeTable_Guid'];
                            $tc_Delete = $row_classbooking['tc_Delete'];
                            $tc_TksalesGuid = $row_classbooking['tc_TksalesGuid'];
                            $tc_TickGuid = $row_classbooking['tc_TickGuid'];

                        //$sql_tktimetable_classbooking = 'select DISTINCT YEAR(tt_Date), MONTH(tt_Date), DAY(tt_Date), tt_Class, tt_Room from tktimetable where tt_Class="'.$cc_No.'" order by tt_Date desc '; //and tt_guid="'.$tc_TimeTable_Guid.'" 
                        $sql_tktimetable_classbooking = 'select * from tktimetable where tt_Class="'.$cc_No.'" and tt_guid="'.$tc_TimeTable_Guid.'" AND (tt_Date BETWEEN "'.$start_date.' 00:00:00"  AND "'.$end_date.' 23:59:00") order by tt_Date desc '; // 
                        $retval_tktimetable_classbooking = mysql_query( $sql_tktimetable_classbooking, $conn );                 
                             if(! $retval_tktimetable_classbooking )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

                            //while($row_tktimetable_classbooking = mysql_fetch_array($retval_tktimetable_classbooking, MYSQL_ASSOC)){ 
                            $row_tktimetable_classbooking = mysql_fetch_array($retval_tktimetable_classbooking, MYSQL_ASSOC);
                            $tt_Date = $row_tktimetable_classbooking['tt_Date'];
                            $tt_Class = $row_tktimetable_classbooking['tt_Class'];
                            $tt_Room = $row_tktimetable_classbooking['tt_Room'];
    

                        $sql_corclasses_classbooking = 'select * from corclasses where cc_No="'.$tt_Class.'" and cc_ClassRoom="'.$tt_Room.'" ';// 
                        $retval_corclasses_classbooking = mysql_query( $sql_corclasses_classbooking, $conn );                 
                             if(! $retval_corclasses_classbooking )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

                            $row_corclasses_classbooking = mysql_fetch_array($retval_corclasses_classbooking, MYSQL_ASSOC);                           
                            $booked_Name = $row_corclasses_classbooking['cc_Name'];


                            $upcoming = date_create($tt_Date);
                            $booked_date_time = date_format($upcoming, 'Y-m-d h:i:s');
                            $booked_date = date_format($upcoming, 'Y-m-d');
                            $booked_time = date_format($upcoming, 'H:i');

                            //$endtime = strtotime('+'.$cc_Times.' minutes', strtotime($upcoming));
                            $booked_status = date($booked_date_time, strtotime('+'.$cc_Times.' minutes'));

//echo $booked_time.' --- ';
//echo date('Y-m-d\TH:i:sO');

                            $the_date = date_create($ts_Date);
                            $Class_date = date_format($the_date, 'Y-m-d');
                            $SomeDate = date_format($the_date, 'Y-m-d h:i:s');
                            $the_time = date_create($ts_Date);
                            $Class_time = date_format($the_time, 'H:i');

                            // $endtime = strtotime('+'.$cc_Times.' minutes', strtotime($the_date));
                            // $added_minutes = date('Y-m-d h:i:s', $endtime);
                            // $added_minutes_time = date('h:i', $endtime);



                            if(!empty($tt_Date)){
                            if($tc_Delete != 1){

                            if($booked_status < $thedd && $tc_TksalesGuid != '' && $tc_TickGuid != ''){
                                $result .= '<tr class="diss">
                                                <td><span>日期</span>'.$booked_date.'</td>
                                                <td><span>時間</span>'.$booked_time.'</td>
                                                <td><span>課程名稱</span>'.$cc_Name.'</td>
                                                <td><span>老師</span>'.$ct_Name.'</td>
                                                <td><span>取消</span>已報到</td>
                                                <td></td>
                                            </tr>';
                            } elseif($booked_status < $thedd){
                                $result .= '<tr class="diss">
                                                <td><span>日期</span>'.$booked_date.'</td>
                                                <td><span>時間</span>'.$booked_time.'</td>
                                                <td><span>課程名稱</span>'.$cc_Name.'</td>
                                                <td><span>老師</span>'.$ct_Name.'</td>
                                                <td><span>取消</span>缺席</td>
                                                <td></td>
                                            </tr>';

                            }
                        }
                      }

                        }//while







                    }//if not empty


            }//else       D00025 

        if(!empty($result)){
          echo $result;
        } else {
          echo '<div class="no_records error">找不到任何記錄</div>';
        }
            
?>