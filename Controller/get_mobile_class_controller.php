<?php 
include '../Model/dbconfig.php';
mysql_set_charset("utf8");
session_start();
$current_lang = $_SESSION['lang'];
//ini_set('display_errors', 'On');
//

date_default_timezone_set("Asia/Taipei");
$today = getdate();

$tc_Members_overbook = array();

$result = '';
$result1 = '';
$result2 = '';
$result3 = '';
$result4 = '';
$result5 = '';
$result6 = '';
$result0 = '';

$week = $_POST['week'];
//$week = "'2017-08-24'";
//$width = $_POST['width'];
$width = '';
$query = '';
if($width == "769"){
  $query = 'SELECT * FROM tktimetable WHERE WEEKOFYEAR(tt_Date) = WEEKOFYEAR('.$week.') AND MONTH('.$week.')=MONTH('.$week.') AND tt_Teacher like "%D%" ORDER BY tt_Date ASC';
  //$query = 'SELECT * FROM tktimetable WHERE WEEKOFYEAR(tt_Date) = WEEKOFYEAR('.$week.') AND MONTH('.$week.')=MONTH('.$week.') AND DAY(tt_Date) = DAY(NOW()) AND tt_Teacher like "%D%" ORDER BY tt_Date ASC';
  //$query = 'SELECT * FROM tktimetable WHERE DAY(tt_Date) = DAY('.$week.') AND tt_Teacher like "%D%" ORDER BY tt_Date ASC';
} elseif ($width == "767") {
  $query = 'SELECT * FROM tktimetable WHERE WEEKOFYEAR(tt_Date) = WEEKOFYEAR('.$week.') AND MONTH('.$week.')=MONTH('.$week.') AND tt_Teacher like "%D%" ORDER BY tt_Date ASC';
  //$query = 'SELECT * FROM tktimetable WHERE DAY(tt_Date) = DAY('.$week.') AND tt_Teacher like "%D%" ORDER BY tt_Date ASC';
}

$ct_Guid = '';
$totalbook = '';
$totalwaiting = '';
$waiting = '';
$tc_TimeTable_Guid = '';
$status = '';
$status_tt_Guid = '';

$tc_TimeTable_Guid_total_booked = '';

$starttime = '';
$startting_time = '';
$endtime = '';
$member = '';
$memberName = '';
$classnumber = '';
$link = '';
$classguid = '';
$classbooking = '';
$tt_Date = array();
$classname = '';  
$classtime = '';
$classunit = '';
$cc_Needbooking = '';
$classremark = '';
$class_day = '';
$startdate = ''; 
$test []= ''; 
$per_class = '';
$currentWeek = '';
$class_status = '';
$buttons = '';
$dd_ = '';
$rr = '';
$di[] = '';
$db_startdate = '';
$category_types_Short = array();
$arrayName = array();
$tc_Gdsno = array();
//$tk_Guid = array();
$thedd = date('Y-m-d H:i:s',strtotime('now'));
$result1 .= '<div class="swiper-slide animated fadeInUp" style="width: auto; margin-right: 7px;">';
// $result2 .= '<div class="swiper-slide animated fadeInUp" style="width: auto; margin-right: 7px;">';
// $result3 .= '<div class="swiper-slide animated fadeInUp" style="width: auto; margin-right: 7px;">';
// $result4 .= '<div class="swiper-slide animated fadeInUp" style="width: auto; margin-right: 7px;">';
// $result5 .= '<div class="swiper-slide animated fadeInUp" style="width: auto; margin-right: 7px;">';
// $result6 .= '<div class="swiper-slide animated fadeInUp" style="width: auto; margin-right: 7px;">';
// $result0 .= '<div class="swiper-slide animated fadeInUp" style="width: auto; margin-right: 7px;">';
$tc_Member = '';

$mytest_value ='';
$member_giud = array();

$category_id = '';
$currentWeek = date('W'); 
//echo $currentWeek;
$Dated = "2017-07-31"; #Your Own Date
$Dated = date("d"); #Or Current Date
$FirstDay = date("Y-m-d", strtotime('sunday last week'));  
$LastDay = date("Y-m-d", strtotime('sunday this week'));  
if($Dated > $FirstDay && $Dated < $LastDay) {
   //echo "It is Between";
} else {
   //echo "No Not !!!";  
}
$tt_Guid = '';
$tc_TimeTable_Guid = '';

// $buttons ='<div class="swiper-button-next" onclick="'.nextweek().'"><img src="/assets/images/nav_right.svg"/></div>
//           <div class="swiper-button-prev" onclick="'.prevweek().'"><img src="/assets/images/nav_left.svg"/></div>';

function getWeekday($dates) {
    return date('w', strtotime($dates));
}

function getMonth($weeks) {
    return date('m', strtotime($weeks));
}
//if(isset($_POST['test-input'])){

  //$selected_option = "12";


// $timestamp = strtotime('next Sunday');
// $days = array();
// for ($i = 0; $i < 7; $i++) {
//     $days[] = strftime('%A', $timestamp);
//     $timestamp = strtotime('+1 day', $timestamp);
// }
                        
                        $sqlcategory_types = 'SELECT * FROM _types where Short != ""';
                        $retvalcategory_types = mysql_query( $sqlcategory_types, $conn );                 
                             if(! $retvalcategory_types )
                             {
                                die('Could not get data: ' . mysql_error());
                             } 

                        while($rowcategory_types = mysql_fetch_array($retvalcategory_types, MYSQL_ASSOC)){
                        $category_types_Short[] = $rowcategory_types['Short']; 
                        }




//                         $sqltkClassBooking = "SELECT tc_TimeTable_Guid, tt_Guid, cc_Times, tt_Date, tt_NeedBooking, tt_Teacher, tc_Member, cc_No, tt_Class, ct_No, ct_Type, ct_Name, Short, cc_Name, cc_Remark,
// (CASE WHEN  now() > (DATE_FORMAT(tt_Date, '%Y-%m-%d %H:%i:%s')+ INTERVAL cc_Times MINUTE) THEN 'timesover' 
//  WHEN now() > tt_Date and now() < (tt_Date + INTERVAL cc_Times MINUTE)
//  THEN 'ing' 
// ELSE 'notopen' END) as status,
// count(tc_ID) as totalbook,
// CASE WHEN (COUNT(tc_ID) >= tt_Qty) THEN 'true' ELSE 'false' END as waiting, 
// IF(count(tc_ID) >= tt_Qty, count(tc_ID)-tt_Qty, 0) as totalwaiting
// FROM tktimetable, tkclassbooking, corclasses, cormember, _types WHERE cc_No = tt_Class AND ct_No = tt_Teacher AND ct_Type = '02' AND cc_Type = Short
// GROUP BY tt_Guid
// ORDER BY tt_Date ASC
// ";
//                         $retvaltkClassBooking = mysql_query( $sqltkClassBooking, $conn );  
//                              if(! $retvaltkClassBooking )
//                              {
//                                 die('Could not get data: ' . mysql_error());
//                              }
//                              //echo mysql_num_rows($retvaltkClassBooking);
//                              //var_dump($retvaltkClassBooking);

//                             while($rowtkClassBooking = mysql_fetch_array($retvaltkClassBooking, MYSQL_ASSOC)){
//                             $totalbook = $rowtkClassBooking['totalbook'];
//                             $totalwaiting = $rowtkClassBooking['totalwaiting'];
//                             $waiting = $rowtkClassBooking['waiting'];
//                             $tc_TimeTable_Guid = $rowtkClassBooking['tc_TimeTable_Guid'];
//                             $status = $rowtkClassBooking['status'];
//                             $status_tt_Guid = $rowtkClassBooking['tt_Guid'];

//                             //echo $waiting;
//                             $maybe_total = $totalbook - $totalwaiting;

//                             $arrayName = array(
//                               'totalbook' => $rowtkClassBooking['totalbook'], 
//                               'totalwaiting' => $rowtkClassBooking['totalwaiting'], 
//                               'waiting' => $rowtkClassBooking['waiting'], 
//                               'tc_TimeTable_Guid' => $rowtkClassBooking['tc_TimeTable_Guid'], 
//                               'status' => $rowtkClassBooking['status'], 
//                               'status_tt_Guid' => $rowtkClassBooking['tt_Guid'],
//                               'tt_NeedBooking' => $rowtkClassBooking['tt_NeedBooking'],
//                               'cc_Times' => $rowtkClassBooking['cc_Times'],
//                               'tt_Date' => date_create($rowtkClassBooking['tt_Date']),
//                               'cc_Remark' => $rowtkClassBooking['cc_Remark']
//                               );

//                             //echo $arrayName['tt_NeedBooking'].' - '.$arrayName['status'].'<br>';



//                              //print_r($arrayName);
//                           } //while long query


                      //   $sqlclass_types_exist = 'SELECT * FROM corclasses WHERE cc_Type IN ('.implode($category_types_Short,',').') ';
                      //   $retvalclass_types_exist = mysql_query( $sqlclass_types_exist, $conn );                 
                      //        if(! $retvalclass_types_exist )
                      //        {
                      //           die('Could not get data: ' . mysql_error());
                      //        } 

                      //   while($rowclass_types_exist = mysql_fetch_array($retvalclass_types_exist, MYSQL_ASSOC)){
                      //   $the_Type = $rowclass_types_exist['cc_Type'];
                      //   //echo $the_Type.', ';
                      // }

//echo implode(array_unique($category_types_Short),',');
//in_array($cc_Type, implode(array_unique($category_types_Short),','))

                        //$sqlprojecten = 'SELECT * FROM tktimetable WHERE WEEKOFYEAR(tt_Date) = WEEKOFYEAR('.$week.') AND MONTH(tt_Date)=MONTH(NOW()) AND tt_Teacher like "%D%" ORDER BY tt_Date ASC ';
                        
                        //$sqlprojecten = $query;
$sqlprojecten = $query = 'SELECT * FROM tktimetable WHERE DAY(tt_Date) = DAY('.$week.') AND WEEKOFYEAR(tt_Date) = WEEKOFYEAR('.$week.') AND MONTH('.$week.')=MONTH('.$week.') AND tt_Teacher like "%D%" ORDER BY tt_Date ASC';


//$sqlprojecten = $query;
                        //$sqlprojecten = 'SELECT * FROM tktimetable WHERE datediff(tt_date, '.$week.') = 0 AND tt_Teacher like "%D%" ORDER BY tt_Date ASC ';

                      //$sqlprojecten = 'SELECT * FROM tktimetable WHERE MONTH(tt_Date)=MONTH(NOW()) AND tt_Teacher like "%D%" GROUP BY tt_Guid ORDER BY tt_Date ASC ';
                        //sqlprojecten = 'SELECT * FROM tktimetable WHERE YEAR('.$week.') = YEAR(tt_Date)  AND tt_Teacher like "%D%" ORDER BY tt_Date, WEEKOFYEAR(NOW()) ASC ';
                        //$sqlprojecten = 'SELECT * FROM tktimetable WHERE YEAR('.$week.') = YEAR(tt_Date) ORDER BY WEEKOFYEAR(NOW()) ASC';
                        $retvalprojecten = mysql_query( $sqlprojecten, $conn );                 
                             if(! $retvalprojecten )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

                        while($rowprojecten = mysql_fetch_array($retvalprojecten, MYSQL_ASSOC)){
                            
                            $startingdate = $rowprojecten['tt_Date'];
                            $member = $rowprojecten['tt_Teacher'];
                            $classnumber = $rowprojecten['tt_Class'];
                            $tt_Guid = $rowprojecten['tt_Guid'];
                            $classbooking = $rowprojecten['tt_NeedBooking'];
                            $tt_Date[] = $rowprojecten['tt_Date'];
                            $tt_Room = $rowprojecten['tt_Room'];
                            $tt_Qty = $rowprojecten['tt_Qty'];
                            $tt_Delete = $rowprojecten['tt_Delete'];

                             //echo $cc_Type.', ';
                            // if(in_array($cc_Type, $category_types_Short)){
                            //   echo $cc_Type.' | ';
                            // } else {
                            //   echo 'NOT IN';
                            // }

                        if($tt_Delete != 1){

                            $startdate = date_create($rowprojecten['tt_Date']);
                            $the_date = date_format($startdate, 'Y-m-d');                          
                            $the_time = date_format($startdate, 'H:i:s');
                            if($the_time != '00:00:00'){
                            $starttime = date_format($startdate, 'Y-m-d H:i:s');
                            $startting_time = date_format($startdate, 'H:i');
                            //$startting_time = date_format($startdate, 'Y-m-d H:i:s');
                            }

                            $timestamp = strtotime('next Monday');
                            $days = array();
                            for ($i = 0; $i < 7; $i++) {       
                                $days[] = strftime('%a', $timestamp);
                                $timestamp = strtotime('+1 day', $timestamp);
                                $db_startdate = $rowprojecten['tt_Date'];
                                $db_day[] = date_format($startdate, 'm-d');
                                $di[] = date('D');
                                $dd_ .= '<div class="swiper-slide">
                                          <div class="date"><p class="date_'.$i.'">'.$db_day[$i].'</p><span>'.$days[$i].'</span></div>
                                        </div>';                              
                            }


                            // for($i = 1; $i <= 7; $i++) {

                            //     $dddate = moment().week(intCurrentWeek).add(i-now.day(), 'd');
                            //     //console.log(date);
                            //   if($i == 1) startday = date.format('YYYY-MM-DD HH:mm:ss');

                            //     $('.date_' + i).html(date.format('MM-DD'));
                            // }


                            
                            $test = date_format($startdate, 'Y-m-d h:i:s');
                            $testmonth = date_format($startdate, 'Y-m-d');

                            //echo getMonth($testmonth);

                            // echo getWeekday($test); // returns 4
                            


                            //$class_day = date_format($startdate, 'd');

                        $sqlmember = 'SELECT * FROM cormember WHERE ct_No ="'.$member.'" AND ct_Type=02 ';
                        $retvalmember = mysql_query( $sqlmember, $conn );                 
                             if(! $retvalmember )
                             {
                                die('Could not get data: ' . mysql_error());
                             }
                        $rowmember = mysql_fetch_array($retvalmember, MYSQL_ASSOC);
                        $memberName = $rowmember['ct_Name'];
                        

                        $sqlclasses = 'SELECT * FROM corclasses WHERE cc_No ="'.$classnumber.'" AND cc_Type IN ('.implode($category_types_Short,',').')  ';//--AND cc_ClassRoom ="'.$tt_Room.'" // AND cc_ClassRoom ="'.$tt_Room.'"
                        $retvalclasses = mysql_query( $sqlclasses, $conn );                 
                             if(! $retvalclasses )
                             {
                                die('Could not get data: ' . mysql_error());
                             } 

                        $rowclasses = mysql_fetch_array($retvalclasses, MYSQL_ASSOC); //IN ('.implode($category_types_Short,',').')
                        $classname = $rowclasses['cc_Name'];
                        $classcate = $rowclasses['cc_Type'];
                        $classtime = $rowclasses['cc_Times'];
                        $classunit = $rowclasses['cc_Unit'];
                        $cc_Needbooking = $rowclasses['cc_Needbooking'];
                        $classremark = $rowclasses['cc_Remark'];
                        $cc_No = $rowclasses['cc_No'];


                        //$selectedTime = "9:15:00";
                        $endtime = strtotime('+'.$classtime.' minutes', strtotime($starttime));
                        //$endtime = strtotime('-2 hours', strtotime($starttime));
                        $added_minutes = date('Y-m-d H:i:s', $endtime);
                        //$added_minutes_time = date('Y-m-d h:i:s', $endtime);
                        $added_minutes_time = date('h:i', $endtime);

                        $endtimebooking = strtotime('-2 hours', strtotime($starttime));
                        $added_minutesbooking = date('Y-m-d H:i:s', $endtimebooking);
                        

                        $mycurrentdate = $today['year'].'-'.$today['mon'].'-'.$today['mday'].' '.$today['hours'].':'.$today['minutes'].':'.$today['seconds'].'<br>';

                        // $now = new DateTime( $tt_Date, new DateTimeZone('Asia/Hong_Kong'));
                        // $interval = new DateInterval( 'P1D'); // 1 Day interval
                        // $period = new DatePeriod( $now, $interval, 30); // 7 Days

                        //echo strtotime($classtime);

                        //$sqloverbooked = 'SELECT COUNT(*) AS tc_Second_count FROM tkclassbooking where tc_TimeTable_Guid="'.$tt_Guid.'" and tc_Second=1 ';
                        //$sqloverbooked = 'SELECT COUNT(tc_Second) AS tc_Second_count FROM tkclassbooking where tc_TimeTable_Guid="'.$tt_Guid.'" ';
                        $sqloverbooked = 'SELECT tc_Second FROM tkclassbooking where tc_TimeTable_Guid="'.$tt_Guid.'" ';
                        $retvaloverbooked = mysql_query( $sqloverbooked, $conn );                 
                             if(! $retvaloverbooked )
                             {
                                die('Could not get data: ' . mysql_error());
                             }
                            $rowoverbooked = mysql_fetch_array($retvaloverbooked, MYSQL_ASSOC);
                            $tc_Second_count = $rowoverbooked['tc_Second'];
                            //$overbooked_tc_Second = $rowoverbooked['tc_Second'];
                            //$booked_num = mysql_num_rows($retvaloverbooked);
                            //echo $tc_Second_count.'<br>';                        
                       
//if ($tc_TimeTable_Guid == $tt_Guid) { echo $tc_TimeTable_Guid.' == '.$tt_Guid; }
//echo $tc_TimeTable_Guid.' == '.$tt_Guid.'<br>';
                        if($memberName != '' && $classname != '' && in_array($classcate, $category_types_Short) && $cc_Needbooking != 1){ // 

                              if(isset($_SESSION['login_visitor'])){

                        $sqlcormember = 'SELECT ct_No, ct_Guid FROM cormember WHERE ct_Type=01 AND ct_Mobile="'.$_SESSION['login_visitor'].'" ';
                        $retvalcormember = mysql_query( $sqlcormember, $conn );                 
                             if(! $retvalcormember )
                             {
                                die('Could not get data: ' . mysql_error());
                             }
                        $rowcormember = mysql_fetch_array($retvalcormember, MYSQL_ASSOC);
                        $cormemberNum = $rowcormember['ct_No'];
                        $ct_Guid = $rowcormember['ct_Guid'];

                        //$sqltkClassBooking = "SELECT * FROM tkclassbooking WHERE tc_TimeTable_Guid != '' ";
                        $sqltkClassBooking = 'SELECT tc_ID, tc_TimeTable_Guid, tc_Second, tc_Member, IFNULL(tc_Delete,0) as tc_Delete FROM tkclassbooking where tc_TimeTable_Guid="'.$tt_Guid.'" and tc_Member="'.$cormemberNum.'" order by tc_ID desc ';// and tc_Delete != 1 // and tc_Second != 1
                        $retvaltkClassBooking = mysql_query( $sqltkClassBooking, $conn );                 
                             if(! $retvaltkClassBooking )
                             {
                                die('Could not get data: ' . mysql_error());
                             }
                            $rowtkClassBooking = mysql_fetch_array($retvaltkClassBooking, MYSQL_ASSOC);
                            // $totalbook = $rowtkClassBooking['totalbook'];
                            // $totalwaiting = $rowtkClassBooking['totalwaiting'];
                            // $waiting = $rowtkClassBooking['waiting'];
                            $tc_ID = $rowtkClassBooking['tc_ID'];
                            $tc_TimeTable_Guid = $rowtkClassBooking['tc_TimeTable_Guid'];
                            $tc_Second = $rowtkClassBooking['tc_Second'];
                            $tc_Delete = $rowtkClassBooking['tc_Delete'];
                            $tc_Member = $rowtkClassBooking['tc_Member'];
                            //echo $tc_Member.'<br>';

                        //echo $ct_Guid;

                        $sqlcancelled = 'SELECT timetable_guid, member_giud, created_at FROM cancel_list WHERE WEEKOFYEAR(created_at) = WEEKOFYEAR('.$week.') AND member_giud="'.$ct_Guid.'" ';
                        $retvalcancelled = mysql_query( $sqlcancelled, $conn );                 
                             if(! $retvalcancelled )
                             {
                                die('Could not get data: ' . mysql_error());
                             }
                            $rowcancelled = mysql_fetch_array($retvalcancelled, MYSQL_ASSOC);
                            $timetable_guid = $rowcancelled['timetable_guid'];
                            $member_giud[] = $rowcancelled['member_giud'];
                            $created_at = $rowcancelled['created_at'];
                            //echo $timetable_guid;

                            $seven_days = strtotime('+7 days', strtotime($created_at));
                            //bug $date_cancel = date_create($created_at);
                            // $start_cancel = date('Y-m-d H:i:s',$date_cancel);
                            // $end_cancel = strtotime('+7 days', strtotime($date_cancel));
                            // $cancelled = date('Y-m-d H:i:s',$end_cancel);
                            $cancelled = date('Y-m-d H:i:s',$seven_days);
                            //$seven_days = strtotime('+7 days', strtotime('2017-09-19 06:00:00'));
                            

                            // if($tt_Guid == $timetable_guid && $thedd < $cancelled){
                            //   echo $tt_Guid.' = '.$cancelled;
                            // }

                            //echo $member_giud.' - '.$ct_Guid;

//bought classes
                        // $sqlcortickclassuse = 'SELECT tc_Classno, tc_Gdsno FROM cortickclassuse WHERE tc_Classno = "'.$classnumber.'" ';
                        // $retvalcortickclassuse = mysql_query( $sqlcortickclassuse, $conn );                 
                        //      if(! $retvalcortickclassuse )
                        //      {
                        //         die('Could not get data: ' . mysql_error());
                        //      }
                        //     $rowcortickclassuse = mysql_fetch_array($retvalcortickclassuse, MYSQL_ASSOC);
                        //     $tc_Classno = $rowcortickclassuse['tc_Classno'];
                        //     $tc_Gdsno[] = $rowcortickclassuse['tc_Gdsno'];
                            

                        //     $mytc_Gdsno = array();
                        //     if(!empty($tc_Gdsno)) {
                        //       $mytc_Gdsno = $tc_Gdsno;
                        //     } else {
                        //       $mytc_Gdsno = array('0' => '1111-1111-1111-1111', );
                        //     }

                        

//print_r($mytc_Gdsno);
//echo $cormemberNum;
                        // $sqltkticket = 'SELECT tk_Guid FROM tkticket WHERE tk_Member = "'.$cormemberNum.'" AND tk_Gdsno IN ('.implode($mytc_Gdsno,',').')  AND tk_Delete !=1'; //
                        // $retvaltkticket = mysql_query( $sqltkticket, $conn );                 
                        //      if(! $retvaltkticket )
                        //      {
                        //         die('Could not get data: ' . mysql_error());
                        //      }
                        //     $rowtkticket = mysql_fetch_array($retvaltkticket, MYSQL_ASSOC);
                        //     $tk_Guid[] = $rowtkticket['tk_Guid'];
                        //     //print_r($tk_Guid);

                        //     $mytk_Guid = array();
                        //     if(in_array('', $tk_Guid)) {
                        //       $mytk_Guid = array('0' => '1111-1111-1111-1111', );
                        //     } else {
                        //       $mytk_Guid = $tk_Guid;
                        //     }

//print_r($tk_Guid);
                        // $sqltkticksales = 'SELECT * FROM tkticksales WHERE ts_Parent IN ('.implode($mytk_Guid,',').') AND ts_BagDate <= now() AND ts_ExpDate >= now() AND ts_Close !=1 ';
                        // $retvaltkticksales = mysql_query( $sqltkticksales, $conn );                 
                        //      if(! $retvaltkticksales )
                        //      {
                        //         die('Could not get data: ' . mysql_error());
                        //      }
                        //     $rowtkticksales = mysql_fetch_array($retvaltkticksales, MYSQL_ASSOC);
                        //     $ts_Close = $rowtkticksales['ts_Close'];
                        //     $ts_Parent = $rowtkticksales['ts_Parent'];


                        $sqltkticksales = 'SELECT * FROM tkticksales WHERE ts_Close !=1 ';
                        $retvaltkticksales = mysql_query( $sqltkticksales, $conn );                 
                             if(! $retvaltkticksales )
                             {
                                die('Could not get data: ' . mysql_error());
                             }
                            $rowtkticksales = mysql_fetch_array($retvaltkticksales, MYSQL_ASSOC);
                            $ts_Close = $rowtkticksales['ts_Close'];
                            $ts_Parent = $rowtkticksales['ts_Parent'];



//echo $cormemberNum;

                        //all in one
                        $sqlbought_test = 'SELECT tk_Guid, ts_Guid
                                            FROM tkticket
                                            LEFT OUTER JOIN tkticksales ON tk_Guid = ts_Parent
                                            WHERE tk_Member = "'.$cormemberNum.'"
                                              AND ts_BagDate <= now()
                                                AND ts_ExpDate >= now()
                                                AND IFNULL(ts_Out,0) = 0
                                              AND tk_GdsGuid IN 
                                                (
                                                SELECT ck_Guid FROM
                                                  (SELECT ck_Guid FROM corticket 
                                                  LEFT OUTER JOIN corticketclass ON ck_Guid = cl_Parent
                                                  WHERE ck_LimitClass = 1 AND cl_Gmc = "'.$classnumber.'"
                                                  UNION
                                                  SELECT ck_Guid FROM corticket
                                                  LEFT OUTER JOIN corticketclasstype ON ck_Guid = ct_Parent
                                                  LEFT OUTER JOIN corclasses ON ct_Type = cc_Type
                                                  WHERE ck_LimitClass = 1 AND cc_No = "'.$classnumber.'"     
                                                  UNION 
                                                  SELECT ck_Guid FROM corticket 
                                                  WHERE IFNULL(ck_LimitClass,0) = 0
                                                  ) SS
                                                )';
                        $retvalbought_test = mysql_query( $sqlbought_test, $conn );                 
                             if(! $retvalbought_test )
                             {
                                die('Could not get data: ' . mysql_error());
                             }
                            $rowbought_test = mysql_fetch_array($retvalbought_test, MYSQL_ASSOC);
                            $tk_Guid = $rowbought_test['tk_Guid'];
                            $ts_Guid = $rowbought_test['ts_Guid'];



                        $sqltkclassbooking_total_booked = 'SELECT COUNT(tc_TimeTable_Guid) AS totalbooked FROM tkclassbooking WHERE tc_TimeTable_Guid="'.$tt_Guid.'" ';
                        $retvaltkclassbooking_total_booked = mysql_query( $sqltkclassbooking_total_booked, $conn );                 
                             if(! $retvaltkclassbooking_total_booked )
                             {
                                die('Could not get data: ' . mysql_error());
                             }
                            $rowtkclassbooking_total_booked = mysql_fetch_array($retvaltkclassbooking_total_booked, MYSQL_ASSOC);
                            $tc_TimeTable_Guid_total_booked = $rowtkclassbooking_total_booked['totalbooked'];

// SET @MemberNo = 'D00304'; -- 會員編號
// SET @ClassNo = '008'; -- 課程編號
// SET @BookingDate = '2017-09-26'; -- 預約日期

// SELECT tk_Guid, ts_Guid
// FROM tkticket
// LEFT OUTER JOIN tkticksales ON tk_Guid = ts_Parent
// WHERE tk_Member = "'.$cormemberNum.'"
//   AND ts_BagDate <= now()
//     AND ts_ExpDate >= now()
//     AND IFNULL(ts_Out,0) = 0
//   AND tk_GdsGuid IN 
//     (
//     SELECT ck_Guid FROM
//       (SELECT ck_Guid FROM corticket 
//       LEFT OUTER JOIN corticketclass ON ck_Guid = cl_Parent
//       WHERE ck_LimitClass = 1 AND cl_Gmc = "'.$classnumber.'"
//       UNION
//       SELECT ck_Guid FROM corticket
//       LEFT OUTER JOIN corticketclasstype ON ck_Guid = ct_Parent
//       LEFT OUTER JOIN corclasses ON ct_Type = cc_Type
//       WHERE ck_LimitClass = 1 AND cc_No = "'.$classnumber.'"     
//       UNION 
//       SELECT ck_Guid FROM corticket 
//       WHERE IFNULL(ck_LimitClass,0) = 0
//       ) SS
//     )

//echo $ts_Parent;
//bought classes
                        $sqlwaiting_list = 'select tc_Second,tc_Member,@rn:=@rn+1 as row_num from tkclassbooking,(select @rn:=0) as r where tc_TimeTable_Guid="'.$tt_Guid.'" and tc_Second=1 order by tc_ID desc';
                        $retvalwaiting_list = mysql_query( $sqlwaiting_list, $conn );                 
                             if(! $retvalwaiting_list )
                             {
                                die('Could not get data: ' . mysql_error());
                             }
                            while($rowwaiting_list = mysql_fetch_array($retvalwaiting_list, MYSQL_ASSOC)){
                            $row_num = $rowwaiting_list['row_num'];
                            $tc_Members_overbook[] = $rowwaiting_list['tc_Member'];
                            $tc_Second = $rowwaiting_list['tc_Second'];
                            //echo $tc_Member;
                            foreach($tc_Members_overbook as $val){
                              //echo $val.'<br>';
                            }
                          } 

                          

                            $category_id = array_unique($category_types_Short);
                            
                            // if($tt_Guid == $timetable_guid && $thedd < $cancelled){
                            //   if($added_minutes < $thedd){ //strtotime($added_minutes) < strtotime('now') //
                            //   $link = '<a class="class">';
                            //   $class_status = '<div class="class-none">
                            //                   </div></a>';
                            // } else { 
                            //   $link = '<a class="class" data-toggle="modal" data-target="#myCancelled">';
                            //   $class_status = '<div class="class-problem class-preorder">
                            //             <div class="inner">
                            //               <p>預約課程</p>
                            //             </div>
                            //              <img src="/assets/images/icon_line.svg" alt="">
                            //           </div>
                            //           <div class="class-description">
                            //             <h4>'.$classname.'</h4>
                            //             <p>'.$classremark.'</p>
                            //           </div></a>';
                            //   $_SESSION['bookingcancelled'] = '<div class="modal-fix">
                            //                                       <p><span>you can book after</span></p>
                            //                                       <p><span>日期:</span><span>'.$cancelled.'</span></p>
                            //                                   </div>';
                            //                                 }
                            // } elseif($thedd > $cancelled) { //not cancelled

//if ($tc_TimeTable_Guid == $tt_Guid) {echo $tc_TimeTable_Guid .' == '. $tt_Guid;}
                            //echo $ts_Parent;
                            // if($added_minutes < $thedd){ //strtotime($added_minutes) < strtotime('now') //
                            //   $link = '<a class="class">';
                            //   $class_status = '<div class="class-none">
                            //                   </div></a>';
                            // } else
                            if($added_minutesbooking < $thedd){ //strtotime($added_minutes) < strtotime('now') //
                              $link = '<a class="class">';
                              $class_status = '<div class="class-none">
                                              </div>
                                              <div class="class-description">
                                                  <h4>'.$classname.'</h4>
                                                  <p>'.$classremark.'</p>
                                                </div></a>';
                            } elseif ($classbooking == 1) { //Cannot Book Online || $classbooking == 1 && $tc_Second != 1 && $tc_Second == 1
                              $link = '<a class="class">';
                              $class_status = '<div class="class-problem class-booked">
                                                  <div class="inner"><!-- 請洽櫃檯或<br>來電預約 -->
                                                    <p>請洽櫃檯或<br>來電預約</p>
                                                  </div>
                                                  <img src="/assets/images/icon_line.svg" alt="">
                                                </div> <div class="class-description"></div></a>';
                            } 
                            elseif ($tc_TimeTable_Guid_total_booked >= $tt_Qty) { //$classbooking != 1 &&    //$tc_Second_count >= 1                            
                              $link = '<a class="class">';
                              $class_status = '<div class="class-problem over-people">
                                                  <div class="inner">
                                                    <p class="mention"><!--人數已滿 -->已額滿請來電<br>或至現場後補</p>
                                                </div>
                                                </div></a>';
                            }

                            // elseif ($tc_Delete == 1) { //Cannot Book Online || $classbooking == 1 && $tc_Second != 1 && $tc_Second == 1 // && $cormemberNum == $tc_Member
                            //   $link = '<a class="class" data-toggle="modal" data-target="#myCancelled">';
                            //   $class_status = '<div class="class-problem class-preorder">
                            //             <div class="inner">
                            //               <p>預約課程</p>
                            //             </div>
                            //              <img src="/assets/images/icon_line.svg" alt="">
                            //           </div>
                            //           <div class="class-description">
                            //             <h4>'.$classname.'</h4>
                            //             <p>'.$classremark.'</p>
                            //           </div></a>';
                            //   $_SESSION['bookingcancelled'] = '<div class="modal-fix">
                            //                                       <p><span>you can book after</span></p>
                            //                                       <p><span>日期:</span><span>'.$cancelled.'</span></p>
                            //                                   </div>';
                            // }

                            // elseif ($tc_Second_count >= 1 && in_array($cormemberNum, $tc_Members_overbook)) { //$classbooking != 1 &&                               
                            //   $link = '<a class="class" data-toggle="modal" data-target="#myAlreadyFull">';
                            //   $class_status = '<div class="class-problem over-people">
                            //                       <div class="inner">
                            //                         <p class="mention">人數已滿</p>
                            //       <p class="grey">人數已滿 <br>候補人數<span class="green">'.$tc_Second_count.'</span>位</p>
                            //                         <button class="btn btn-sm btn-default2 btn-block hidden-xs">預約候補</button>
                            //                     </div>
                            //                     </div></a>';
                            // } elseif ($tc_Second_count >= 1 && !in_array($cormemberNum, $tc_Members_overbook)) { //$classbooking != 1 && 
                            //   $link = '<a class="class" data-toggle="modal" data-target="#myOverBooking'.$tt_Guid.'">';
                            //   $class_status = '<div class="class-problem over-people">
                            //                       <div class="inner">
                            //                         <p class="mention">人數已滿</p>
                            //       <p class="grey">人數已滿 <br>候補人數<span class="green">'.$tc_Second_count.'</span>位</p>
                            //                         <button class="btn btn-sm btn-default2 btn-block hidden-xs">預約候補</button>
                            //                     </div>
                            //                     </div></a>';
                            // } 

                            // elseif($tt_Guid == $timetable_guid && $thedd < $cancelled && $cormemberNum == $tc_Member){
                              
                            //   $link = '<a class="class" data-toggle="modal" data-target="#myCancelled">';
                            //   $class_status = '<div class="class-problem class-preorder">
                            //             <div class="inner">
                            //               <p>預約課程</p>
                            //             </div>
                            //              <img src="/assets/images/icon_line.svg" alt="">
                            //           </div>
                            //           <div class="class-description">
                            //             <h4>'.$classname.'</h4>
                            //             <p>'.$classremark.'</p>
                            //           </div></a>';
                            //   $_SESSION['bookingcancelled'] = '<div class="modal-fix">
                            //                                       <p><span>you can book after</span></p>
                            //                                       <p><span>日期:</span><span>'.$cancelled.'</span></p>
                            //                                   </div>';
                            // }  

                            //  latest
                            elseif ($tc_TimeTable_Guid == $tt_Guid && $cormemberNum == $tc_Member && $tc_Delete == 1) { //Cannot Book Online || $classbooking == 1 && $tc_Second != 1 && $tc_Second == 1 // && $cormemberNum == $tc_Member
                              $link = '<a class="class" data-toggle="modal" data-target="#myBooking'.$tt_Guid.'">';
                              $class_status = '<div class="class-problem class-preorder">
                                        <div class="inner">
                                          <p>預約課程</p>
                                        </div>
                                         <img src="/assets/images/icon_line.svg" alt="">
                                      </div>
                                      <div class="class-description">
                                        <h4>'.$classname.'</h4>
                                        <p>'.$classremark.'</p>
                                      </div></a>';
                                      //if($cancelled > $thedd && in_array($ct_Guid, $member_giud))
                                      $_SESSION['booking'.$tt_Guid] = '<div class="modal-fix">
                                                                  <p><span>日期:</span><span>'.$the_date.'</span></p>
                                                                  <p><span>時間:</span><span>'.$startting_time.'</span></p>
                                                                  <p><span>課程:</span><span>'.$classname.'</span></p>
                                                                  <p><span>老師:</span><span>'.$memberName.'</span></p>
                                                              </div>';
                            }

                            elseif ($tc_TimeTable_Guid == $tt_Guid && $cormemberNum == $tc_Member  && $tc_Delete != 1) { // //already booked
                              $link = '<a class="class" data-toggle="modal" data-target="#myConflict">';
                              $class_status = '<div class="class-problem class-preorder">
                                                  <div class="inner">
                                                    <p>已訂課程</p>
                                                </div>
                                                </div></a>';
                            } 

                            


                            // elseif($tt_Guid == $timetable_guid && $thedd < $cancelled && in_array($ct_Guid, $member_giud)){
                            //   $link = '<a class="class" data-toggle="modal" data-target="#myCancelled">';
                            //   $class_status = '<div class="class-problem class-preorder">
                            //             <div class="inner">
                            //               <p>預約課程</p>
                            //             </div>
                            //              <img src="/assets/images/icon_line.svg" alt="">
                            //           </div>
                            //           <div class="class-description">
                            //             <h4>'.$classname.'</h4>
                            //             <p>'.$classremark.'</p>
                            //           </div></a>';
                            //   $_SESSION['bookingcancelled'] = '<div class="modal-fix">
                            //                                       <p><span>you can book after</span></p>
                            //                                       <p><span>日期:</span><span>'.$cancelled.'</span></p>
                            //                                   </div>';
                            // } 
                                            
                            elseif(!empty($tk_Guid) && !empty($ts_Guid))  {//!empty($tk_Guid) && !empty($ts_Guid) //$tk_Guid == $ts_Parent   //Make a booking booked$classbooking == 0 && //in_array($tc_TimeTable_Guid, $tt_Guid)
                              $link = '<a class="class" data-toggle="modal" data-target="#myBooking'.$tt_Guid.'">';
                              $class_status = '<div class="class-problem class-preorder">
                                        <div class="inner">
                                          <p>預約課程</p>
                                        </div>
                                         <img src="/assets/images/icon_line.svg" alt="">
                                      </div>
                                      <div class="class-description">
                                        <h4>'.$classname.'</h4>
                                        <p>'.$classremark.'</p>
                                      </div></a>';
                                      //if($cancelled > $thedd && in_array($ct_Guid, $member_giud))
                                      $_SESSION['booking'.$tt_Guid] = '<div class="modal-fix">
                                                                  <p><span>日期:</span><span>'.$the_date.'</span></p>
                                                                  <p><span>時間:</span><span>'.$startting_time.'</span></p>
                                                                  <p><span>課程:</span><span>'.$classname.'</span></p>
                                                                  <p><span>老師:</span><span>'.$memberName.'</span></p>
                                                              </div>';
                            } else { //didn't buy 
                              $link = '<a class="class" data-toggle="modal" data-target="#myNotBought">';
                              $class_status = '<div class="class-problem class-preorder">
                                        <div class="inner">
                                          <p>預約課程</p>
                                        </div>
                                         <img src="/assets/images/icon_line.svg" alt="">
                                      </div>
                                      <div class="class-description">
                                        <h4>'.$classname.'</h4>
                                        <p>'.$classremark.'</p>
                                      </div></a>';

                            }

                          //}//not cancelled

                          }//Logged in

                          else {

                            //echo $mytest_value;

                            //if($added_minutes < $thedd){ //strtotime($added_minutes) < strtotime('now')
                            if($added_minutesbooking < $thedd){
                              $link = '<a class="class">';
                              $class_status = '<div class="class-none">
                                              </div></a>';
                            } elseif ($classbooking == 1) { //Cannot Book Online && $tc_Second == 1 || $classbooking == 1 && $tc_Second != 1
                              $link = '<a class="class">';
                              $class_status = '<div class="class-problem class-booked">
                                                  <div class="inner"><!-- 請洽櫃檯或<br>來電預約 -->
                                                    <p>請洽櫃檯或<br>來電預約</p>
                                                  </div>
                                                  <img src="/assets/images/icon_line.svg" alt="">
                                                </div>
                                                <div class="class-description"></div></a>';
                            } 
                            elseif ($tc_TimeTable_Guid_total_booked >= $tt_Qty) { //$tc_Second_count >= 1
                              $link = '<a class="class">';
                              $class_status = '<div class="class-problem over-people">
                                                  <div class="inner">
                                                    <p class="mention">人數已滿<!--人數已滿 -->已額滿請來電<br>或至現場後補</p>
                                                </div>
                                                </div></a>';
                            }

                            // elseif ($tc_Second_count >= 1) {
                            //   $link = '<a class="class" data-toggle="modal" data-target="#myLogin">';
                            //   $class_status = '<div class="class-problem over-people">
                            //                       <div class="inner">
                            //                         <p class="mention">人數已滿</p>
                            //       <p class="grey">人數已滿 <br>候補人數<span class="green">'.$tc_Second_count.'</span>位</p>
                            //                         <button class="btn btn-sm btn-default2 btn-block hidden-xs">預約候補</button>
                            //                     </div>
                            //                     </div></a>';
                            // } 
                            // elseif ($tc_TimeTable_Guid == $tt_Guid ) { //already booked$classbooking == 0 && //in_array($tc_TimeTable_Guid, $tt_Guid)
                            //   $link = '<a class="class">';
                            //   $class_status = '<div class="class-problem class-preorder">
                            //                       <div class="inner">
                            //                         <p>已訂課程</p>
                            //                     </div>
                            //                     </div></a>';
                            // } 
                            else { //Make a Booking && $tt_Guid != $tc_TimeTable_Guid //last night && $startting_time == $startdate && $the_date == $startdate .$the_date.$startting_time.$classname.$memberName
                              $link = '<a class="class" data-toggle="modal" data-target="#myLogin">';
                              $class_status = '<div class="class-problem class-preorder">
                                        <div class="inner">
                                          <p>預約課程</p>
                                        </div>
                                         <img src="/assets/images/icon_line.svg" alt="">
                                      </div>
                                      <div class="class-description">
                                        <h4>'.$classname.'</h4>
                                        <p>'.$classremark.'</p>
                                      </div></a>';
                            }
                            

                          }

                          //echo getMonth($test);
                        //for ($i = 0; $i < 7; $i++) {
                          //echo $i;
                          // print_r(getWeekday($test) == 1);
                          //print_r(getWeekday($test) == $i);

                        //if(getWeekday($test) == 1 && $i == 0){
                          
                          $result1 .=''.$link.'<div>
                                        <p>'.$startting_time.'</p>
                                        <p>'.$classtime.''.$classunit.'</p>
                                        <p class="sport">'.$classname.'</p>
                                        <p class="name">'.$memberName.'</p>
                                      </div>
                                      '.$class_status.''; 
                        //}


                        // if(getWeekday($test) == 2 && $i == 1){

                        //   $result2 .=''.$link.'<div>
                        //                             <p>'.$startting_time.'</p>
                        //                             <p>'.$classtime.''.$classunit.'</p>
                        //                             <p class="sport">'.$classname.'</p>
                        //                             <p class="name">'.$memberName.'</p>
                        //                           </div>
                        //                           '.$class_status.'';
                         
                        // }

                        // if(getWeekday($test) == 3 && $i == 2){

                        //   $result3 .=''.$link.'<div>
                        //                             <p>'.$startting_time.'</p>
                        //                             <p>'.$classtime.''.$classunit.'</p>
                        //                             <p class="sport">'.$classname.'</p>
                        //                             <p class="name">'.$memberName.'</p>
                        //                           </div>
                        //                           '.$class_status.'';
                         
                        // }

                        // if(getWeekday($test) == 4 && $i == 3){

                        //   $result4 .=''.$link.'<div>
                        //                             <p>'.$startting_time.'</p>
                        //                             <p>'.$classtime.''.$classunit.'</p>
                        //                             <p class="sport">'.$classname.'</p>
                        //                             <p class="name">'.$memberName.'</p>
                        //                           </div>
                        //                           '.$class_status.'';
                         
                        // }

                        // if(getWeekday($test) == 5 && $i == 4){

                        //   $result5 .=''.$link.'<div>
                        //                             <p>'.$startting_time.'</p>
                        //                             <p>'.$classtime.''.$classunit.'</p>
                        //                             <p class="sport">'.$classname.'</p>
                        //                             <p class="name">'.$memberName.'</p>
                        //                           </div>
                        //                           '.$class_status.'';
                         
                        // }

                        // if(getWeekday($test) == 6 && $i == 5){

                        //   $result6 .=''.$link.'<div>
                        //                             <p>'.$startting_time.'</p>
                        //                             <p>'.$classtime.''.$classunit.'</p>
                        //                             <p class="sport">'.$classname.'</p>
                        //                             <p class="name">'.$memberName.'</p>
                        //                           </div>
                        //                           '.$class_status.'';
                         
                        // }

                        // if(getWeekday($test) == 0 && $i == 6){

                        //   $result0 .=''.$link.'<div>
                        //                             <p>'.$startting_time.'</p>
                        //                             <p>'.$classtime.''.$classunit.'</p>
                        //                             <p class="sport">'.$classname.'</p>
                        //                             <p class="name">'.$memberName.'</p>
                        //                           </div>
                        //                           '.$class_status.'';
                         
                        // }

                      //}//for loop

                      }//member and class names


                    }//if not deleted






                        }




   
   $result1 .= '</div>';
   // $result2 .= '</div>';
   // $result3 .= '</div>';
   // $result4 .= '</div>';
   // $result5 .= '</div>';
   // $result6 .= '</div>';
   // $result0 .= '</div>';
                        //$timetable['day'.$i] = json_decode(json_encode($result), true);   

// 11:45 Jo Class situation:

// 1. Avaiable (Green) 預約課程
// 2. full- can be on the waiting list (White) 人數已滿 候補人數01位
// 3. already booked (Dark gray) 已訂課程
// 4. can't book call us (Dark gray) 請洽櫃檯或
// 來電預約
// 5. time passed (Light gray)
// 11:45 Jo PoP out

// 1. Log in
// 2. Resend Password
// 3. Are you sure you wanna book:  是否確定預約訂課？ 
// 4. you are booked seccueesully: GOT IT 您已預約成功！ 請於預約時段15分鐘前報到
// 5. double booking note: 您於同時段已有預約課程！請選擇其他時間
// 6. GOT IT 您已候補成功！ 候補為第01位，
// 如有名額將為您直接訂課
                        
// echo json_decode(json_encode($result1), true);
// echo json_decode(json_encode($result2), true);


echo $result1;
// echo $result2;
// echo $result3;
// echo $result4;
// echo $result5;
// echo $result6;
// echo $result0;


// Rather than get all days and loop through them all, get the first Monday after the start date and then iterate 7 days at a time:

// $endDate = strtotime($endDate);
// for($i = strtotime('Monday', strtotime($startDate)); $i <= $endDate; $i = strtotime('+1 week', $i))
//     echo date('l Y-m-d', $i);


//  $endDate = strtotime('1st January 2018');
//  for($i = strtotime('Monday', strtotime('1st August 2017')); $i <= $endDate; $i = strtotime('+1 week', $i))
//      //echo date('l Y-m-d', $i); 
// $text = "[{colour: 'red', date: '10-31-2014'}]";

// echo $text;






//LATEST CHANGE AFTER LOGGED IN
//if(date('now') > strtotime($added_minutes) ){ // class time over
                            // if(strtotime($added_minutes) < strtotime('now') ){
                            //   $link = '<a class="class">';
                            //   $class_status = '<div class="class-none">
                            //                   </div></a>';
                            // } elseif ($classbooking == 1) { //Cannot Book Online
                            //   $link = '<a class="class">';
                            //   $class_status = '<div class="class-problem class-booked">
                            //                       <div class="inner">
                            //                         <p>請洽櫃檯或<br>來電預約</p>
                            //                       </div>
                            //                     </div></a>';
                            // } elseif ($tc_Second != 0) {
                            //   $link = '<a class="class" data-toggle="modal" data-target="#myModal">';
                            //   $class_status = '<div class="class-problem over-people">
                            //                       <div class="inner">
                            //                         <p class="mention">人數已滿</p>
                            //       <p class="grey">人數已滿 <br>候補人數<span class="green">'.$tc_Second.'</span>位</p>
                            //                         <button class="btn btn-sm btn-default2 btn-block hidden-xs">預約候補</button>
                            //                     </div>
                            //                     </div></a>';
                            // } elseif ($tt_Guid == $tc_TimeTable_Guid) {
                            //   $link = '<a class="class">';
                            //   $class_status = '<div class="class-problem class-preorder">
                            //                       <div class="inner">
                            //                         <p>已訂課程</p>
                            //                     </div>
                            //                     </div></a>';
                            // } else {
                            //   $link = '<a class="class" data-toggle="modal" data-target="#myBooking">';
                            //   $class_status = '<div class="class-problem class-preorder">
                            //             <div class="inner">
                            //               <p>預約課程</p>
                            //             </div>
                            //              <img src="/assets/images/icon_line.svg" alt="">
                            //           </div>
                            //           <div class="class-description">
                            //             <h4>'.$classname.' - '.$tc_Second.'</h4>
                            //             <p>'.$classremark.'</p>
                            //           </div></a>';
                            // }
?>