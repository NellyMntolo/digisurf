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
                    


                        /* -------------------------------------------------------------------------------------------------------------------------- */

                        $sql_booked_cormember = 'select * from cormember where ct_Mobile="'.$current_user.'" OR ct_Phone="'.$current_user.'" ';
                        $retval_booked_cormember = mysql_query( $sql_booked_cormember, $conn );                 
                             if(! $retval_booked_cormember )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

                            $row_booked_cormember = mysql_fetch_array($retval_booked_cormember, MYSQL_ASSOC);
                            $ct_booked_No = $row_booked_cormember['ct_No'];
                            $ct_booked_Guid = $row_booked_cormember['ct_Guid'];
//echo $ct_booked_No.'<br>';
//echo $ct_booked_Guid.'<br>';
                        //$sql_booked_tkclassbooking = 'select * from tkclassbooking where tc_Member="'.$ct_booked_No.'" ';// and tc_Delete != 1  // order by tc_ID asc
                         $sql_booked_tkclassbooking = 'select *, tt_Date, tt_Guid from tkclassbooking, tktimetable where tc_Member="'.$ct_booked_No.'" and tc_TimeTable_Guid = tt_Guid order by tt_Date asc';// and tc_Delete != 1  // order by tc_ID asc
                        $retval_booked_tkclassbooking = mysql_query( $sql_booked_tkclassbooking, $conn );                 
                             if(! $retval_booked_tkclassbooking )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

                        while($row_booked_tkclassbooking = mysql_fetch_array($retval_booked_tkclassbooking, MYSQL_ASSOC)){        
                        $tc_booked_TimeTable_Guid = $row_booked_tkclassbooking['tc_TimeTable_Guid'];
                        $tc_Delete = $row_booked_tkclassbooking['tc_Delete'];
                        $tc_Second = $row_booked_tkclassbooking['tc_Second'];

//echo $tc_Second.'<br>';                    

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
//echo $tt_booked_Class.'<br>';
                        $sql_booked_teacher = 'select * from cormember where ct_No="'.$tt_booked_Teacher.'" AND ct_Type=02 ';
                        $retval_booked_teacher = mysql_query( $sql_booked_teacher, $conn );                 
                             if(! $retval_booked_teacher )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

                            $row_booked_teacher = mysql_fetch_array($retval_booked_teacher, MYSQL_ASSOC);
                            $current_booked_ct_Name = $row_booked_teacher['ct_Name'];
//echo $tt_booked_Class.'<br>';

                        $sql_booked_corclasses = 'select * from corclasses where cc_No="'.$tt_booked_Class.'" ';
                        $retval_booked_corclasses = mysql_query( $sql_booked_corclasses, $conn );                 
                             if(! $retval_booked_corclasses )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

                            $row_booked_corclasses = mysql_fetch_array($retval_booked_corclasses, MYSQL_ASSOC);                            
                            $cc_booked_Name = $row_booked_corclasses['cc_Name'];
                            $cc_booked_Times = $row_booked_corclasses['cc_Times'];
                            $cc_booked_No = $row_booked_corclasses['cc_No'];
//echo $cc_booked_No.'<br>';
                            $the_booked_date = date_create($tt_booked_Date);
                            $Class_booked_date = date_format($the_booked_date, 'Y-m-d');
                            $Some_bookedDate = date_format($the_booked_date, 'Y-m-d H:i:s');
                            $the_booked_time = date_create($tt_booked_Date);
                            $Class_booked_time = date_format($the_booked_time, 'H:i');
                            $Some_bookedDate1 [] = date_format($the_booked_date, 'Y-m-d H:i:s');

                            $starttime = date_format($the_booked_date, 'Y-m-d H:i:s');

                            $current_booked_status = date($Some_bookedDate, strtotime('+'.$cc_booked_Times.' minutes'));
                            //echo $current_booked_status.' - '.$thedd.'<br>';

                            // $endtime = strtotime('+'.$cc_booked_Times.' minutes', strtotime($the_booked_date));
                            // $added_minutes = date('Y-m-d h:i:s', $endtime);
                            // $added_minutes_time = date('h:i', $endtime);
                            // $mysort = usort($Some_bookedDate1,"strcmp");
                            // print_r($mysort);

                            //3 hours before class
                            //$added_minutesbooking = array();
                            $random = array();
                            $endtimebooking = strtotime('-3 hours', strtotime($starttime));
                            $added_minutesbooking = date('Y-m-d H:i:s', $endtimebooking);
                            //echo $added_minutesbooking.'<br>';
                            $random[] = $added_minutesbooking;
                            //print_r($random);

                            foreach ($random as $value) {
                                # code...
                                //echo $value.'<br>';
                                if($value <= $thedd) {
                                    //echo $value.'<br>';

                                        $ThreeHourSMS = '$.ajax({
                                                      type: "POST",
                                                      url:"/ClassReminder",
                                                      data: "phone_number='.$_SESSION['login_visitor'].'" + "&class_time='.$Some_bookedDate.'",
                                                      success: function (response) {  
                                                        console.log(response);                                                    
                                                      },            
                                                      error: function (jXHR, textStatus, errorThrown) {
                                                          alert(errorThrown); 
                                                        }            
                                                    });';
                                }                                
                                $value++;
                            }
                            


//echo $current_booked_status.'<br>';

                        if($tc_Delete != 1){

                            // $booked_datetest[] = date_format($upcoming, 'Y-m-d');
                            // rsort($booked_datetest);
                            // $my_booked_date ='';
                            // foreach ($booked_datetest as $booked_key => $booked_val) {
                            //     $my_booked_date = $booked_val;
                            // }

                            if($current_booked_status > $thedd && $tc_Second != 1 && !empty($cc_booked_Name) && !empty($current_booked_ct_Name)) {
                                $result .= '<tr>
                                                <td><span>日期</span>'.$Class_booked_date.'</td>
                                                <td><span>時間</span>'.$Class_booked_time.'</td>
                                                <td><span>課程</span>'.$cc_booked_Name.'</td>
                                                <td><span>老師</span>'.$current_booked_ct_Name.'</td>
                                                <td><span>狀態</span>已預約</td>
                                                <td data-toggle="modal" data-target="#memberModal"><button type="button" class="btn modal-close"></button><input type="button" class="btn the-value" value="'.$tc_booked_TimeTable_Guid.'" style="position:relative; z-index:999999; width:100%; height:100%;margin-top:-10px;opacity:0;"><input type="hidden" class="the-user" value="'.$ct_booked_Guid.'"></td>
                                            </tr>';
                            } elseif($current_booked_status > $thedd && $tc_Second == 1 && !empty($cc_booked_Name) && !empty($current_booked_ct_Name)) {
                                $result .= '<tr>
                                                <td><span>日期</span>'.$Class_booked_date.'</td>
                                                <td><span>時間</span>'.$Class_booked_time.'</td>
                                                <td><span>課程</span>'.$cc_booked_Name.'</td>
                                                <td><span>老師</span>'.$current_booked_ct_Name.'</td>
                                                <td><span>狀態</span>候補</td>
                                                <td data-toggle="modal" data-target="#memberModal"><button type="button" class="btn modal-close"></button><input type="button" class="btn the-value" value="'.$tc_booked_TimeTable_Guid.'" style="position:relative; z-index:999999; width:100%; height:100%;margin-top:-10px;opacity:0;"><input type="hidden" class="the-user" value="'.$ct_booked_Guid.'"></td>
                                            </tr>';
                            }
                        }


                  }//while



                   /* -------------------------------------------------------------------------------------------------------------------------- */


$category_types_Short = array();

                        

                     //CONTENT
                        $sql_cormember = 'select * from cormember where ct_Mobile="'.$current_user.'" ';
                        $retval_cormember = mysql_query( $sql_cormember, $conn );                 
                             if(! $retval_cormember )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

                            $row_cormember = mysql_fetch_array($retval_cormember, MYSQL_ASSOC);                            
                            $ct_No = $row_cormember['ct_No'];
//echo 'ct_No = '.$ct_No.'<br>';





                        $sqlcategory_types = 'select * from tkclassbooking where tc_Member="'.$ct_No.'"';
                        $retvalcategory_types = mysql_query( $sqlcategory_types, $conn );                 
                             if(! $retvalcategory_types )
                             {
                                die('Could not get data: ' . mysql_error());
                             } 

                        while($rowcategory_types = mysql_fetch_array($retvalcategory_types, MYSQL_ASSOC)){
                        $category_types_Short[] = $rowcategory_types['tc_TimeTable_Guid']; 
                        }





                        //$sql_classbooking = 'select * from tkclassbooking where tc_Member="'.$ct_No.'"  order by tc_ID desc';// AND tc_Delete != 1 
                        //$sql_classbooking = 'select * from tkclassbooking where tc_TimeTable_Guid="'.$ts_TimeTable_Guid.'" '; //produces 3 records instead of 9
                        $sql_classbooking = 'Select 
tt_Date,tt_Time_e,tt_Class,tt_Room,tt_Teacher,tt_Needbooking,tt_Keep,tt_Qty,
tc_Member, ts_Date, tc_TimeTable_Guid, tc_ID
from tktimetable
LEFT OUTER JOIN tkclassbooking ON tc_TimeTable_Guid = tt_Guid
LEFT OUTER JOIN tkswiping ON ts_TimeTable_Guid = tt_Guid AND tc_Member = ts_Member WHERE tc_Member = "'.$ct_No.'" order by tc_ID desc ';
                        $retval_classbooking = mysql_query( $sql_classbooking, $conn );                 
                             if(! $retval_classbooking )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

                            //$row_classbooking = mysql_fetch_array($retval_classbooking, MYSQL_ASSOC);
                            while($row_classbooking = mysql_fetch_array($retval_classbooking, MYSQL_ASSOC)){
                            $tc_TimeTable_Guid = $row_classbooking['tc_TimeTable_Guid'];
                            $ts_Date = $row_classbooking['ts_Date'];
                            //$tc_TickGuid = $row_classbooking['tc_TickGuid'];
//echo 'tc_TimeTable_Guid = '.$tc_TimeTable_Guid.'<br>';




                        $sql_tkswiping = 'select * from tkswiping where ts_Member="'.$ct_No.'" order by ts_Date desc ';
                        //$sql_tkswiping = 'select *, tt_Date, tt_Guid from tkswiping, tktimetable where ts_Member="'.$ct_No.'" and ts_TimeTable_Guid = tt_Guid order by tt_Date asc';
                        $retval_tkswiping = mysql_query( $sql_tkswiping, $conn );                 
                             if(! $retval_tkswiping )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

                        //while($row_tkswiping = mysql_fetch_array($retval_tkswiping, MYSQL_ASSOC)){   
                            $row_tkswiping = mysql_fetch_array($retval_tkswiping, MYSQL_ASSOC);
                            $ts_TimeTable_Guid = $row_tkswiping['ts_TimeTable_Guid'];

//echo 'ts_TimeTable_Guid = '.$ts_TimeTable_Guid.'<br>';



                        //$sql_tktimetable_classbooking = 'select DISTINCT YEAR(tt_Date), MONTH(tt_Date), DAY(tt_Date), tt_Class, tt_Room from tktimetable where tt_Class="'.$cc_No.'" order by tt_Date desc '; //and tt_guid="'.$tc_TimeTable_Guid.'" 
                        //$sql_tktimetable_classbooking = 'select * from tktimetable where tt_Class="'.$cc_No.'" and tt_guid="'.$tc_TimeTable_Guid.'" order by DAYOFMONTH(tt_Date) DESC '; // back-up query
                        $sql_tktimetable_classbooking = 'select * from tktimetable where tt_guid="'.$tc_TimeTable_Guid.'" AND (tt_Date BETWEEN "'.$start_date.' 00:00:00"  AND "'.$end_date.' 23:59:00") order by tt_Date desc ';
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

                            $the_real_tt_Date = date_create($row_tktimetable_classbooking['tt_Date']);
    
    //echo 'tt_Date = '.$tt_Date.'<br>';



                        $sql_corclasses = 'select * from corclasses where cc_No="'.$tt_Class.'" ';
                        $retval_corclasses = mysql_query( $sql_corclasses, $conn );                 
                             if(! $retval_corclasses )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

                            $row_corclasses = mysql_fetch_array($retval_corclasses, MYSQL_ASSOC);                           
                            $cc_Name = $row_corclasses['cc_Name'];
                            $cc_No = $row_corclasses['cc_No'];
                            $cc_Times = $row_corclasses['cc_Times'];
//echo 'cc_Name = '.$cc_Name.'<br>';
//echo 'cc_No = '.$cc_No.'<br>';
                        $sql_tktimetable = 'select * from tktimetable where tt_Class="'.$cc_No.'" and tt_guid="'.$tc_TimeTable_Guid.'" ';// AND where  tt_Delete != 1
                        $retval_tktimetable = mysql_query( $sql_tktimetable, $conn );                 
                             if(! $retval_tktimetable )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

                            $row_tktimetable = mysql_fetch_array($retval_tktimetable, MYSQL_ASSOC);                       
                            $tt_Teacher = $row_tktimetable['tt_Teacher'];
//echo 'tt_Teacher = '.$tt_Teacher.'<br>';
                        $sql_teacher = 'select * from cormember where ct_No="'.$tt_Teacher.'" AND ct_Type=02 ';
                        $retval_teacher = mysql_query( $sql_teacher, $conn );                 
                             if(! $retval_teacher )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

                            $row_teacher = mysql_fetch_array($retval_teacher, MYSQL_ASSOC);
                            $ct_Name = $row_teacher['ct_Name'];
//echo 'ct_Name = '.$ct_Name.'<br>';







                        





//echo 'explode -> '.explode(',', $category_types_Short);




                        

                        $sql_corclasses_classbooking = 'select * from corclasses where cc_No="'.$tt_Class.'" and cc_ClassRoom="'.$tt_Room.'" ';// 
                        $retval_corclasses_classbooking = mysql_query( $sql_corclasses_classbooking, $conn );                 
                             if(! $retval_corclasses_classbooking )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

                            $row_corclasses_classbooking = mysql_fetch_array($retval_corclasses_classbooking, MYSQL_ASSOC);                           
                            $booked_Name = $row_corclasses_classbooking['cc_Name'];


                            $upcoming = date_create($tt_Date);
                            $booked_date_time = date_format($upcoming, 'Y-m-d H:i:s');
                            $booked_date = date_format($upcoming, 'Y-m-d');
                            $booked_time = date_format($upcoming, 'H:i');

                            //$endtime = strtotime('+'.$cc_Times.' minutes', strtotime($upcoming));
                            $booked_status = date($booked_date_time, strtotime('+'.$cc_Times.' minutes'));

//echo $booked_time.' --- ';
//echo date('Y-m-d\TH:i:sO');

                            // $the_date = date_create($ts_Date);
                            // $Class_date = date_format($the_date, 'Y-m-d');
                            // $SomeDate = date_format($the_date, 'Y-m-d H:i:s');
                            // $the_time = date_create($ts_Date);
                            // $Class_time = date_format($the_time, 'H:i');

                            $the_real_time = date_format($the_real_tt_Date, 'H:i:s');

                            // $endtime = strtotime('+'.$cc_Times.' minutes', strtotime($the_date));
                            // $added_minutes = date('Y-m-d h:i:s', $endtime);
                            // $added_minutes_time = date('h:i', $endtime);


                            // review card swipping and data


//echo $the_real_time.'<br>';
//echo implode($category_types_Short,'__');


                            //if($tc_Delete != 1){

                            // $booked_datetest[] = date_format($upcoming, 'Y-m-d');
                            // rsort($booked_datetest);
                            // $my_booked_date ='';
                            // foreach ($booked_datetest as $booked_key => $booked_val) {
                            //     $my_booked_date = $booked_val;
                            // }data-toggle="modal" data-target="#myReview"

                            //if($booked_status < $thedd && $tc_TksalesGuid != '' && $tc_TickGuid != ''){
                            //if($booked_status < $thedd && $tc_TksalesGuid != '' && $tc_TickGuid != '' && $the_real_time != '00:00:00'){  
                            //if($booked_status < $thedd && $ts_TimeTable_Guid != '' && $the_real_time != '00:00:00' && !empty($ts_TimeTable_Guid) ){ 
                            if($booked_status < $thedd && $ts_Date !='' || !empty($ts_Date) && !empty($cc_Name) ){  
                                $result .= '<tr class="diss" >
                                                <td><span>日期</span>'.$booked_date.'</td>
                                                <td><span>時間</span>'.$booked_time.'</td>
                                                <td><span>課程</span>'.$cc_Name.'</td>
                                                <td><span>老師</span>'.$ct_Name.'</td>
                                                <td><span>狀態</span>已報到</td>
                                                <td></td>
                                            </tr>';
                            //} elseif($booked_status < $thedd && $the_real_time != '00:00:00'){
                            } 
                            //elseif($booked_status < $thedd && $the_real_time != '00:00:00' && $ts_TimeTable_Guid == '' && empty($ts_TimeTable_Guid)){
                            elseif($cc_Name != '' || !empty($cc_Name) && $ct_Name != '' || !empty($ct_Name)) {
                                $result .= '<tr class="diss">
                                                <td><span>日期</span>'.$booked_date.'</td>
                                                <td><span>時間</span>'.$booked_time.'</td>
                                                <td><span>課程</span>'.$cc_Name.'</td>
                                                <td><span>老師</span>'.$ct_Name.'</td>
                                                <td><span>狀態</span>缺席</td>
                                                <td></td>
                                            </tr>';

                            }


                            //} //second while

                        }//while







                    }//if not empty


            }//else       D00025 

        if(!empty($result)){
          echo $result;
        } else {
          echo '<div class="no_records error">找不到任何記錄</div>';
        }
            
?>