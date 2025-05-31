<?php 
include '../Model/dbconfig.php';
mysql_set_charset("utf8");
session_start();
$current_lang = $_SESSION['lang'];

date_default_timezone_set("Asia/Taipei");

$result = '';
$result1 = '';
$result2 = '';
$result3 = '';
$result4 = '';
$result5 = '';
$result6 = '';
$result0 = '';

$week = $_POST['week'];
$category_id = $_POST['class_category'];


$starttime = '';
$startting_time = '';
$endtime = '';
$member = '';
$memberName = '';
$classnumber = '';
$link = '';
$classguid = '';
$classbooking = '';
$tt_Date = '';
$classname = '';  
$classtime = '';
$classunit = '';
$cc_Needbooking = '';
$classremark = '';
$db_day = array();
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
$result1 .= '<div class="swiper-slide" style="width: 142.571px; margin-right: 7px;">';
$result2 .= '<div class="swiper-slide" style="width: 142.571px; margin-right: 7px;">';
$result3 .= '<div class="swiper-slide" style="width: 142.571px; margin-right: 7px;">';
$result4 .= '<div class="swiper-slide" style="width: 142.571px; margin-right: 7px;">';
$result5 .= '<div class="swiper-slide" style="width: 142.571px; margin-right: 7px;">';
$result6 .= '<div class="swiper-slide" style="width: 142.571px; margin-right: 7px;">';
$result0 .= '<div class="swiper-slide" style="width: 142.571px; margin-right: 7px;">';


$classcate = '';

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
    
//if(isset($_POST['test-input'])){

  //$selected_option = "12";


// $timestamp = strtotime('next Sunday');
// $days = array();
// for ($i = 0; $i < 7; $i++) {
//     $days[] = strftime('%A', $timestamp);
//     $timestamp = strtotime('+1 day', $timestamp);
// }


if ($category_id != 'allClassCategory') {

                        $sqlcategory_types = 'SELECT * FROM _types where Short != ""';
                        $retvalcategory_types = mysql_query( $sqlcategory_types, $conn );                 
                             if(! $retvalcategory_types )
                             {
                                die('Could not get data: ' . mysql_error());
                             } 

                        while($rowcategory_types = mysql_fetch_array($retvalcategory_types, MYSQL_ASSOC)){
                        $category_types_Short[] = $rowcategory_types['Short']; 
                        }

                        //$sqlprojecten = 'SELECT * FROM tktimetable WHERE WEEKOFYEAR(tt_Date) = WEEKOFYEAR('.$week.') AND MONTH(tt_Date)=MONTH(NOW()) AND tt_Teacher like "%D%" ORDER BY tt_Date ASC ';
                        $sqlprojecten = 'SELECT * FROM tktimetable WHERE WEEKOFYEAR(tt_Date) = WEEKOFYEAR('.$week.') AND MONTH('.$week.')=MONTH('.$week.') AND tt_Teacher like "%D%" ORDER BY tt_Date ASC ';
                        //$sqlprojecten = 'SELECT * FROM tktimetable WHERE YEAR('.$week.') = YEAR(tt_Date) ORDER BY tt_Date ASC ';
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
                            $tt_Date = $rowprojecten['tt_Date'];
                            $tt_Room = $rowprojecten['tt_Room'];
                            $tt_Qty = $rowprojecten['tt_Qty'];
                            $tt_Delete = $rowprojecten['tt_Delete'];

                            if($tt_Delete != 1){

                            $startdate = date_create($rowprojecten['tt_Date']);                           
                            $the_time = date_format($startdate, 'H:i:s');
                            if($the_time != '00:00:00'){
                            $starttime = date_format($startdate, 'Y-m-d H:i:s');
                            $startting_time = date_format($startdate, 'H:i');
                            }
                            //$db_day .= date_format($startdate, 'm-d');
                            // echo $db_day.'|| '; // returns 08-07
                            // $dd_ = '<div class="swiper-slide">
                            //           <div class="date"><p class="date_1">'.$db_day.'</p><span>MON</span></div>
                            //         </div>';
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

                            //echo $classguid;

                            
                            $test = date_format($startdate, 'Y-m-d');

                            //echo getWeekday($test); // returns 4
                            

                            $enddate = date_create($rowprojecten['tt_Time_e']);
                            //$endtime = date_format($enddate, 'H:i'); //old

                            $class_day = date_format($startdate, 'd');

                        $sqlmember = 'SELECT * FROM cormember WHERE ct_No ="'.$member.'" AND ct_Type=02 ';
                        $retvalmember = mysql_query( $sqlmember, $conn );                 
                             if(! $retvalmember )
                             {
                                die('Could not get data: ' . mysql_error());
                             }
                        $rowmember = mysql_fetch_array($retvalmember, MYSQL_ASSOC);
                        $memberName = $rowmember['ct_Name'];

                       

                        //print_r(implode($category_types_Short,','));
                        $sqlclasses = 'SELECT * FROM corclasses WHERE cc_No ="'.$classnumber.'" AND cc_Type ="'.$category_id.'" ';
                        //$sqlclasses = 'SELECT * FROM corclasses WHERE cc_Type ="'.$category_id.'" AND cc_ClassRoom ="'.$tt_Room.'" ';//AND cc_Type IN // AND cc_ClassRoom ="'.$tt_Room.'"('.implode($category_types_Short,',').') 
                        $retvalclasses = mysql_query( $sqlclasses, $conn );                 
                             if(! $retvalclasses )
                             {
                                die('Could not get data: ' . mysql_error());
                             } 

                        $rowclasses = mysql_fetch_array($retvalclasses, MYSQL_ASSOC);
                        $classname = $rowclasses['cc_Name'];
                        $classcate = $rowclasses['cc_Type']; 
                        $classtime = $rowclasses['cc_Times'];
                        $classunit = $rowclasses['cc_Unit'];
                        $cc_Needbooking = $rowclasses['cc_Needbooking'];
                        $classremark = $rowclasses['cc_Remark'];

                        //echo $classcate;


                        //$selectedTime = "9:15:00";
                        $endtime = strtotime('+'.$classtime.' minutes', strtotime($starttime));
                        $added_minutes = date('Y-m-d h:i:s', $endtime);
                        $added_minutes_time = date('Y-m-d h:i:s', $endtime);
                        //$added_minutes_time = date('h:i', $endtime);


                        $sqltkClassBooking = "SELECT * FROM tkclassbooking WHERE tc_TimeTable_Guid != '' ";
                        $retvaltkClassBooking = mysql_query( $sqltkClassBooking, $conn );                 
                             if(! $retvaltkClassBooking )
                             {
                                die('Could not get data: ' . mysql_error());
                             }
                             //echo mysql_num_rows($retvaltkClassBooking);

                            $rowtkClassBooking = mysql_fetch_array($retvaltkClassBooking, MYSQL_ASSOC);
                            // $totalbook = $rowtkClassBooking['totalbook'];
                            // $totalwaiting = $rowtkClassBooking['totalwaiting'];
                            // $waiting = $rowtkClassBooking['waiting'];
                            $tc_ID = $rowtkClassBooking['tc_ID'];
                            $tc_TimeTable_Guid = $rowtkClassBooking['tc_TimeTable_Guid'];

                            // $maybe_total = $totalbook - $totalwaiting;
                            $maybe_total = 1;
                          if($tc_ID > $tt_Qty){
                            $waiting = $tc_ID - $tt_Qty;
                          }

                            if($memberName != '' && $classname != '' && $category_id == $classcate  && $cc_Needbooking  != 1){ //&& $category_id == array_unique($classcate)

                            if(isset($_SESSION['login_visitor'])){

                            //if(date('now') > strtotime($added_minutes) ){ // class time over
                            if(strtotime($added_minutes) < strtotime('now') ){
                              $link = '<a class="class">';
                              $class_status = '<div class="class-none">
                                              </div></a>';
                            } elseif ($classbooking == 1) { //Cannot Book Online
                              $link = '<a class="class">';
                              $class_status = '<div class="class-problem class-booked">
                                                  <div class="inner">
                                                    <p>請洽櫃檯或<br>來電預約</p>
                                                  </div>
                                                </div></a>';
                            } elseif ($waiting != '') {
                              $link = '<a class="class" data-toggle="modal" data-target="#myModal">';
                              $class_status = '<div class="class-problem over-people">
                                                  <div class="inner">
                                                    <p class="mention">人數已滿</p>
                                  <p class="grey">人數已滿 <br>候補人數<span class="green">'.$maybe_total.'</span>位</p>
                                                    <button class="btn btn-sm btn-default2 btn-block hidden-xs">預約候補</button>
                                                </div>
                                                </div></a>';
                            }elseif ($tt_Guid == $tc_TimeTable_Guid) {
                              $link = '<a class="class">';
                              $class_status = '<div class="class-problem class-preorder">
                                                  <div class="inner">
                                                    <p>已訂課程</p>
                                                </div>
                                                </div></a>';
                            } else {
                              $link = '<a class="class" data-toggle="modal" data-target="#bookaction">';
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

                          }//Logged in

                          else {

                            //echo $mytest_value;

                            if(strtotime($added_minutes) < strtotime('now') ){
                              $link = '<a class="class">';
                              $class_status = '<div class="class-none">
                                              </div></a>';
                            } elseif ($classbooking == 1) { //Cannot Book Online
                              $link = '<a class="class">';
                              $class_status = '<div class="class-problem class-booked">
                                                  <div class="inner">
                                                    <p>請洽櫃檯或<br>來電預約</p>
                                                  </div>
                                                </div></a>';
                            } elseif ($tt_Guid != $tc_TimeTable_Guid) { //Make a Booking && $tt_Guid != $tc_TimeTable_Guid
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
                            } elseif ($waiting == 'true') { //waiting$classbooking == 0 && 
                              $link = '<a class="class" data-toggle="modal" data-target="#myLogin">';
                              $class_status = '<div class="class-problem over-people">
                                                  <div class="inner">
                                                    <p class="mention">人數已滿</p>
                                  <p class="grey">人數已滿 <br>候補人數<span class="green">'.$maybe_total.'</span>位</p>
                                                    <button class="btn btn-sm btn-default2 btn-block hidden-xs">預約候補</button>
                                                </div>
                                                </div></a>';
                            } elseif ($tt_Guid == $tc_TimeTable_Guid) { //already booked$classbooking == 0 && //in_array($tc_TimeTable_Guid, $tt_Guid)
                              $link = '<a class="class">';
                              $class_status = '<div class="class-problem class-preorder">
                                                  <div class="inner">
                                                    <p>已訂課程</p>
                                                </div>
                                                </div></a>';
                            }
                            

                          }

                         

                        

                        for ($i = 0; $i < 7; $i++) { 
                          //echo $i;
                          // print_r(getWeekday($test) == 1);
                          //print_r(getWeekday($test) == $i);

                        if(getWeekday($test) == 1 && $i == 0){
                          
                          $result1 .=''.$link.'<div>
                                        <p>'.$startting_time.'</p>
                                        <p>'.$classtime.''.$classunit.'</p>
                                        <p class="sport">'.$classname.'</p>
                                        <p class="name">'.$memberName.'</p>
                                      </div>
                                      '.$class_status.''; 
                        }


                        if(getWeekday($test) == 2 && $i == 1){

                          $result2 .=''.$link.'<div>
                                                    <p>'.$startting_time.'</p>
                                                    <p>'.$classtime.''.$classunit.'</p>
                                                    <p class="sport">'.$classname.'</p>
                                                    <p class="name">'.$memberName.'</p>
                                                  </div>
                                                  '.$class_status.'';
                         
                        }

                        if(getWeekday($test) == 3 && $i == 2){

                          $result3 .=''.$link.'<div>
                                                    <p>'.$startting_time.'</p>
                                                    <p>'.$classtime.''.$classunit.'</p>
                                                    <p class="sport">'.$classname.'</p>
                                                    <p class="name">'.$memberName.'</p>
                                                  </div>
                                                  '.$class_status.'';
                         
                        }

                        if(getWeekday($test) == 4 && $i == 3){

                          $result4 .=''.$link.'<div>
                                                    <p>'.$startting_time.'</p>
                                                    <p>'.$classtime.''.$classunit.'</p>
                                                    <p class="sport">'.$classname.'</p>
                                                    <p class="name">'.$memberName.'</p>
                                                  </div>
                                                  '.$class_status.'';
                         
                        }

                        if(getWeekday($test) == 5 && $i == 4){

                          $result5 .=''.$link.'<div>
                                                    <p>'.$startting_time.'</p>
                                                    <p>'.$classtime.''.$classunit.'</p>
                                                    <p class="sport">'.$classname.'</p>
                                                    <p class="name">'.$memberName.'</p>
                                                  </div>
                                                  '.$class_status.'';
                         
                        }

                        if(getWeekday($test) == 6 && $i == 5){

                          $result6 .=''.$link.'<div>
                                                    <p>'.$startting_time.'</p>
                                                    <p>'.$classtime.''.$classunit.'</p>
                                                    <p class="sport">'.$classname.'</p>
                                                    <p class="name">'.$memberName.'</p>
                                                  </div>
                                                  '.$class_status.'';
                         
                        }

                        if(getWeekday($test) == 0 && $i == 6){

                          $result0 .=''.$link.'<div>
                                                    <p>'.$startting_time.'</p>
                                                    <p>'.$classtime.''.$classunit.'</p>
                                                    <p class="sport">'.$classname.'</p>
                                                    <p class="name">'.$memberName.'</p>
                                                  </div>
                                                  '.$class_status.'';
                         
                        }

                      }//for loop

                      }//member and class names

                      }//if not deleted


                        }
   


  } else {

                        $sqlcategory_types = 'SELECT * FROM _types where Short != ""';
                        $retvalcategory_types = mysql_query( $sqlcategory_types, $conn );                 
                             if(! $retvalcategory_types )
                             {
                                die('Could not get data: ' . mysql_error());
                             } 

                        while($rowcategory_types = mysql_fetch_array($retvalcategory_types, MYSQL_ASSOC)){
                        $category_types_Short[] = $rowcategory_types['Short'];  
                        }

        $sqlprojecten = 'SELECT * FROM tktimetable WHERE WEEKOFYEAR(tt_Date) = WEEKOFYEAR('.$week.') AND MONTH('.$week.')=MONTH('.$week.') AND tt_Teacher like "%D%" ORDER BY tt_Date ASC ';
                      //$sqlprojecten = 'SELECT * FROM tktimetable WHERE MONTH(tt_Date)=MONTH(NOW()) AND tt_Teacher like "%D%" GROUP BY tt_Guid ORDER BY tt_Date ASC ';
                        //$sqlprojecten = 'SELECT * FROM tktimetable WHERE YEAR('.$week.') = YEAR(tt_Date)  AND tt_Teacher like "%D%" ORDER BY tt_Date ASC ';
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
                            $tt_Date = $rowprojecten['tt_Date'];
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
                            $the_time = date_format($startdate, 'H:i:s');
                            if($the_time != '00:00:00'){
                            $starttime = date_format($startdate, 'Y-m-d H:i:s');
                            $startting_time = date_format($startdate, 'H:i');
                            }
                            //$db_day .= date_format($startdate, 'm-d');
                            // echo $db_day.'|| '; // returns 08-07
                            // $dd_ = '<div class="swiper-slide">
                            //           <div class="date"><p class="date_1">'.$db_day.'</p><span>MON</span></div>
                            //         </div>';
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


                            
                            $test = date_format($startdate, 'Y-m-d');

                            //echo getWeekday($test); // returns 4
                            


                            $class_day = date_format($startdate, 'd');

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

                        $rowclasses = mysql_fetch_array($retvalclasses, MYSQL_ASSOC);
                        $classname = $rowclasses['cc_Name'];
                        $classcate = $rowclasses['cc_Type'];
                        $classtime = $rowclasses['cc_Times'];
                        $classunit = $rowclasses['cc_Unit'];
                        $cc_Needbooking = $rowclasses['cc_Needbooking'];
                        $classremark = $rowclasses['cc_Remark'];


                        //$selectedTime = "9:15:00";
                        $endtime = strtotime('+'.$classtime.' minutes', strtotime($starttime));
                        $added_minutes = date('Y-m-d h:i:s', $endtime);
                        //$added_minutes_time = date('Y-m-d h:i:s', $endtime);
                        $added_minutes_time = date('h:i', $endtime);

                        $now = new DateTime( $tt_Date, new DateTimeZone('Asia/Hong_Kong'));
                        $interval = new DateInterval( 'P1D'); // 1 Day interval
                        $period = new DatePeriod( $now, $interval, 30); // 7 Days

                        //echo strtotime($classtime);


                        $sqltkClassBooking = "SELECT * FROM tkclassbooking WHERE tc_TimeTable_Guid != '' ";
                        $retvaltkClassBooking = mysql_query( $sqltkClassBooking, $conn );                 
                             if(! $retvaltkClassBooking )
                             {
                                die('Could not get data: ' . mysql_error());
                             }
                             //echo mysql_num_rows($retvaltkClassBooking);

                            $rowtkClassBooking = mysql_fetch_array($retvaltkClassBooking, MYSQL_ASSOC);
                            // $totalbook = $rowtkClassBooking['totalbook'];
                            // $totalwaiting = $rowtkClassBooking['totalwaiting'];
                            // $waiting = $rowtkClassBooking['waiting'];
                            $tc_ID = $rowtkClassBooking['tc_ID'];
                            $tc_TimeTable_Guid = $rowtkClassBooking['tc_TimeTable_Guid'];

                            // $maybe_total = $totalbook - $totalwaiting;
                            $maybe_total = 1;
                          if($tc_ID > $tt_Qty){
                            $waiting = $tc_ID - $tt_Qty;
                          }

                            
                                                     
                            



                            if($memberName != '' && $classname != '' && in_array($classcate, $category_types_Short) && $cc_Needbooking != 1){

                              if(isset($_SESSION['login_visitor'])){

                            //if(date('now') > strtotime($added_minutes) ){ // class time over
                            if(strtotime($added_minutes) < strtotime('now') ){
                              $link = '<a class="class">';
                              $class_status = '<div class="class-none">
                                              </div></a>';
                            } elseif ($classbooking == 1) { //Cannot Book Online
                              $link = '<a class="class">';
                              $class_status = '<div class="class-problem class-booked">
                                                  <div class="inner">
                                                    <p>請洽櫃檯或<br>來電預約</p>
                                                  </div>
                                                </div></a>';
                            } elseif ($waiting != '') {
                              $link = '<a class="class" data-toggle="modal" data-target="#myModal">';
                              $class_status = '<div class="class-problem over-people">
                                                  <div class="inner">
                                                    <p class="mention">人數已滿</p>
                                  <p class="grey">人數已滿 <br>候補人數<span class="green">'.$maybe_total.'</span>位</p>
                                                    <button class="btn btn-sm btn-default2 btn-block hidden-xs">預約候補</button>
                                                </div>
                                                </div></a>';
                            }elseif ($tt_Guid == $tc_TimeTable_Guid) {
                              $link = '<a class="class">';
                              $class_status = '<div class="class-problem class-preorder">
                                                  <div class="inner">
                                                    <p>已訂課程</p>
                                                </div>
                                                </div></a>';
                            } else {
                              $link = '<a class="class" data-toggle="modal" data-target="#bookaction">';
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

                          }//Logged in

                          else {

                            //echo $mytest_value;

                            if(strtotime($added_minutes) < strtotime('now') ){
                              $link = '<a class="class">';
                              $class_status = '<div class="class-none">
                                              </div></a>';
                            } elseif ($classbooking == 1) { //Cannot Book Online
                              $link = '<a class="class">';
                              $class_status = '<div class="class-problem class-booked">
                                                  <div class="inner">
                                                    <p>請洽櫃檯或<br>來電預約</p>
                                                  </div>
                                                </div></a>';
                            } elseif ($tt_Guid != $tc_TimeTable_Guid) { //Make a Booking && $tt_Guid != $tc_TimeTable_Guid
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
                            } elseif ($waiting == 'true') { //waiting$classbooking == 0 && 
                              $link = '<a class="class" data-toggle="modal" data-target="#myLogin">';
                              $class_status = '<div class="class-problem over-people">
                                                  <div class="inner">
                                                    <p class="mention">人數已滿</p>
                                  <p class="grey">人數已滿 <br>候補人數<span class="green">'.$maybe_total.'</span>位</p>
                                                    <button class="btn btn-sm btn-default2 btn-block hidden-xs">預約候補</button>
                                                </div>
                                                </div></a>';
                            } elseif ($tt_Guid == $tc_TimeTable_Guid) { //already booked$classbooking == 0 && //in_array($tc_TimeTable_Guid, $tt_Guid)
                              $link = '<a class="class">';
                              $class_status = '<div class="class-problem class-preorder">
                                                  <div class="inner">
                                                    <p>已訂課程</p>
                                                </div>
                                                </div></a>';
                            }
                            

                          }


                          //echo getMonth($test);
                        for ($i = 0; $i < 7; $i++) {
                          //echo $i;
                          // print_r(getWeekday($test) == 1);
                          //print_r(getWeekday($test) == $i);

                        if(getWeekday($test) == 1 && $i == 0){
                          
                          $result1 .=''.$link.'<div>
                                        <p>'.$startting_time.'</p>
                                        <p>'.$classtime.''.$classunit.'</p>
                                        <p class="sport">'.$classname.'</p>
                                        <p class="name">'.$memberName.'</p>
                                      </div>
                                      '.$class_status.''; 
                        }


                        if(getWeekday($test) == 2 && $i == 1){

                          $result2 .=''.$link.'<div>
                                                    <p>'.$startting_time.'</p>
                                                    <p>'.$classtime.''.$classunit.'</p>
                                                    <p class="sport">'.$classname.'</p>
                                                    <p class="name">'.$memberName.'</p>
                                                  </div>
                                                  '.$class_status.'';
                         
                        }

                        if(getWeekday($test) == 3 && $i == 2){

                          $result3 .=''.$link.'<div>
                                                    <p>'.$startting_time.'</p>
                                                    <p>'.$classtime.''.$classunit.'</p>
                                                    <p class="sport">'.$classname.'</p>
                                                    <p class="name">'.$memberName.'</p>
                                                  </div>
                                                  '.$class_status.'';
                         
                        }

                        if(getWeekday($test) == 4 && $i == 3){

                          $result4 .=''.$link.'<div>
                                                    <p>'.$startting_time.'</p>
                                                    <p>'.$classtime.''.$classunit.'</p>
                                                    <p class="sport">'.$classname.'</p>
                                                    <p class="name">'.$memberName.'</p>
                                                  </div>
                                                  '.$class_status.'';
                         
                        }

                        if(getWeekday($test) == 5 && $i == 4){

                          $result5 .=''.$link.'<div>
                                                    <p>'.$startting_time.'</p>
                                                    <p>'.$classtime.''.$classunit.'</p>
                                                    <p class="sport">'.$classname.'</p>
                                                    <p class="name">'.$memberName.'</p>
                                                  </div>
                                                  '.$class_status.'';
                         
                        }

                        if(getWeekday($test) == 6 && $i == 5){

                          $result6 .=''.$link.'<div>
                                                    <p>'.$startting_time.'</p>
                                                    <p>'.$classtime.''.$classunit.'</p>
                                                    <p class="sport">'.$classname.'</p>
                                                    <p class="name">'.$memberName.'</p>
                                                  </div>
                                                  '.$class_status.'';
                         
                        }

                        if(getWeekday($test) == 0 && $i == 6){

                          $result0 .=''.$link.'<div>
                                                    <p>'.$startting_time.'</p>
                                                    <p>'.$classtime.''.$classunit.'</p>
                                                    <p class="sport">'.$classname.'</p>
                                                    <p class="name">'.$memberName.'</p>
                                                  </div>
                                                  '.$class_status.'';
                         
                        }

                      }//for loop


                    }//if not deleted

                    }//member and class names

                        }

   }





   $result1 .= '</div>';
   $result2 .= '</div>';
   $result3 .= '</div>';
   $result4 .= '</div>';
   $result5 .= '</div>';
   $result6 .= '</div>';
   $result0 .= '</div>';
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
echo $result2;
echo $result3;
echo $result4;
echo $result5;
echo $result6;
echo $result0;



?>