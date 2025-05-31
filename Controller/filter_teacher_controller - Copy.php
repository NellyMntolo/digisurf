<?php 
include '../Model/dbconfig.php';
mysql_set_charset("utf8");
session_start();
$current_lang = $_SESSION['lang'];

$result = '';
//if(isset($_POST['test-input'])){ 
  //$teacher_id = mysql_real_escape_string($_POST['teacher'],$conn);
  $week = mysql_real_escape_string($_POST['week'],$conn);
  //$category = mysql_real_escape_string($_POST['week'],$conn);
  //$bo = "'$week'";
  //$selected_option = "12";

// tkticket - tk_Member, tk_BegDate, tk_ExpDate
//   cormember - ct_No

//     select HOUR(tk_BegDate),MINUTE(tk_BegDate) from tkticket;
$current_lang = $_SESSION['lang'];
$locations = '';
$courseType = '';
$teachers = '';
$result = '';
$starttime = '';
$endtime = '';
$startingdate = '';
$endingdate = '';
$member = '';
$memberName = '';
$classnumber = '';
$link = '';
$classguid = '';
$classbooking = '';
$tt_Date = '';
$tt_Time_e = '';
$classname = '';  
$classtime = '';
$classunit = '';
$classneedbooking = '';
$classremark = '';
$db_day = array();
$day_one = '';
$day_two = '';
$day_three = '';
$day_four = '';
$day_five = '';
$day_six = '';
$day_seven = '';
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
                    //CONTENT

                    if(isset($_SESSION['login_visitor'])){
                        //classes
                    } else {

                    }


// $currentWeek = date('W');
// echo $currentWeek; 
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

function getWeekday($dates) {
    return date('w', strtotime($dates));
}

                        $sqlprojecten = 'SELECT * FROM tktimetable WHERE WEEKOFYEAR(tt_Date) = WEEKOFYEAR('.$week.') AND MONTH(tt_Date)=MONTH(NOW()) ORDER BY tt_Date ASC ';
                        //$sqlprojecten = 'SELECT * FROM tktimetable WHERE YEAR('.$week.') = YEAR(tt_Date) ORDER BY tt_Date ASC ';
                        //$sqlprojecten = 'SELECT * FROM tktimetable WHERE YEAR('.$week.') = YEAR(tt_Date) ORDER BY WEEKOFYEAR(NOW()) ASC';
                        $retvalprojecten = mysql_query( $sqlprojecten, $conn );                 
                             if(! $retvalprojecten )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

                        while($rowprojecten = mysql_fetch_array($retvalprojecten, MYSQL_ASSOC)){
                            
                            $startingdate = $rowprojecten['tt_Date'];
                            $endingdate = $rowprojecten['tt_Time_e'];
                            $member = $rowprojecten['tt_Teacher'];
                            $classnumber = $rowprojecten['tt_Class'];
                            $classguid = $rowprojecten['tt_Guid'];
                            $classbooking = $rowprojecten['tt_NeedBooking'];
                            $tt_Date = $rowprojecten['tt_Date'];
                            $tt_Time_e = $rowprojecten['tt_Time_e'];

                            $startdate = date_create($rowprojecten['tt_Date']);                           
                            $the_time = date_format($startdate, 'H:i:s');
                            if($the_time != '00:00:00'){
                            $starttime = date_format($startdate, 'H:i');
                            }

                            $timestamp = strtotime('next Monday');
                            $days = array();
                            for ($i = 0; $i < 7; $i++) {                        
                                $days[] = strftime('%a', $timestamp);
                                $timestamp = strtotime('+1 day', $timestamp);
                                $db_startdate = date_create($rowprojecten['tt_Date']);
                                $db_day[$i] = date_format($db_startdate, 'm-d');
                                //print_r($db_day[$i]);                           
                            }
                            
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

                        $sqlclasses = 'SELECT * FROM corclasses WHERE cc_No ="'.$classnumber.'" ';
                        $retvalclasses = mysql_query( $sqlclasses, $conn );                 
                             if(! $retvalclasses )
                             {
                                die('Could not get data: ' . mysql_error());
                             } 

                        $rowclasses = mysql_fetch_array($retvalclasses, MYSQL_ASSOC);
                        $classname = $rowclasses['cc_Name'];  
                        $classtime = $rowclasses['cc_Times'];
                        $classunit = $rowclasses['cc_Unit'];
                        $classneedbooking = $rowclasses['cc_Needbooking'];
                        $classremark = $rowclasses['cc_Remark'];


                        //$selectedTime = "9:15:00";
                        $endtime = strtotime('+'.$classtime.' minutes', strtotime($starttime));
                        $added_minutes = date('Y-m-d h:i:s', $endtime);
                        $added_minutes_time = date('h:i', $endtime);

                        $sqlticket = 'SELECT * FROM tkticket WHERE tk_Member ="'.$member.'" AND WEEKOFYEAR(tk_BegDate) = WEEKOFYEAR('.$week.') ORDER BY tk_BegDate ASC ';
                        $retvalticket = mysql_query( $sqlticket, $conn );                 
                             if(! $retvalticket )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

                            $rowticket = mysql_fetch_array($retvalticket, MYSQL_ASSOC);
                            //$startingdate = $rowticket['tk_BegDate'];
                            //$endingdate = $rowticket['tk_ExpDate'];
                            //$member = $rowticket['tk_Member'];

                            // $startdate = date_create($rowticket['tk_BegDate']);
                            // $starttime = date_format($startdate, 'H:i');
                            // $db_day = date_format($startdate, 'm-d');
                            

                            // $enddate = date_create($rowticket['tk_ExpDate']);
                            // $endtime = date_format($enddate, 'H:i');

                            // $class_day = date_format($startdate, 'd');


                        //if( strtotime($tt_Time_e) > strtotime('now') ) { echo 'it has passed';}
                            //echo strtotime($added_minutes) > strtotime('now') ;

                        $sqlstatus = 'select (CASE WHEN  now() > (DATE_FORMAT(tt_Date, \'%Y-%m-%d %H:%i:%s\')+ INTERVAL cc_Times MINUTE) THEN \'timesover\' 
                                      WHEN now() > tt_Date and now() < (tt_Date + INTERVAL cc_Times MINUTE)
                                      THEN \'ing\' 
                                      ELSE \'notopen\' END) as status, tt_Date from tktimetable, corclasses where tt_Date < NOW()';
                        $retvalstatus = mysql_query( $sqlstatus, $conn );                 
                             if(! $retvalstatus )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

                            $rowstatus = mysql_fetch_array($retvalstatus, MYSQL_ASSOC);
                            $classstatus = $rowstatus['status'];
                            $classtest = $rowstatus['tt_Date'];
                            
                            //strtotime($added_minutes) > strtotime('now')
                            if ($classbooking == 1) {
                              $link = '<a href="" class="class" data-toggle="modal" data-target="#myModal">';
                              $class_status = '<div class="class-problem class-booked">
                                                  <div class="inner">
                                                    <p>請洽櫃檯或<br>來電預約</p>
                                                  </div>
                                                </div></a>';
                            } elseif ($classbooking == 0) {
                              $link = '<a href="" class="class" data-toggle="modal" data-target="#myModal">';
                              $class_status = '<div class="class-problem class-preorder">
                                        <div class="inner">
                                          <p>預約課程</p>
                                        </div>
                                         <img src="/assets/images/icon_line.svg" alt="">
                                      </div>
                                      <div class="class-description">
                                        <h4>Title</h4>
                                        <p>'.$classremark.'</p>
                                      </div></a>';
                            } elseif($classstatus == 'timesover'){
                              $link = '<a class="class" href="">';
                              $class_status = '<div class="class-none"><p>'.$classtest.'</p></div></a>';
                            }

                        

                        if(getWeekday($test) == 1){
                          
                          $result .=''.$link.'<div>
                                        <p>'.$starttime.' - '.$added_minutes_time.'</p>
                                        <p>'.$classtime.''.$classunit.'</p>
                                        <p class="sport">'.$classname.'</p>
                                        <p class="name">'.$memberName.'</p>
                                      </div>
                                      '.$class_status.''; 
                        }


                        if(getWeekday($test) == 2){

                          $result .=''.$link.'<div>
                                                    <p>'.$starttime.' - '.$added_minutes_time.'</p>
                                                    <p>'.$classtime.''.$classunit.'</p>
                                                    <p class="sport">'.$classname.'</p>
                                                    <p class="name">'.$memberName.'</p>
                                                  </div>
                                                  '.$class_status.'';
                         
                        }

                        if(getWeekday($test) == 3){

                          $result .=''.$link.'<div>
                                                    <p>'.$starttime.' - '.$added_minutes_time.'</p>
                                                    <p>'.$classtime.''.$classunit.'</p>
                                                    <p class="sport">'.$classname.'</p>
                                                    <p class="name">'.$memberName.'</p>
                                                  </div>
                                                  '.$class_status.'';
                         
                        }

                        if(getWeekday($test) == 4){

                          $result .=''.$link.'<div>
                                                    <p>'.$starttime.' - '.$added_minutes_time.'</p>
                                                    <p>'.$classtime.''.$classunit.'</p>
                                                    <p class="sport">'.$classname.'</p>
                                                    <p class="name">'.$memberName.'</p>
                                                  </div>
                                                  '.$class_status.'';
                         
                        }

                        if(getWeekday($test) == 5){

                          $result .=''.$link.'<div>
                                                    <p>'.$starttime.' - '.$added_minutes_time.'</p>
                                                    <p>'.$classtime.''.$classunit.'</p>
                                                    <p class="sport">'.$classname.'</p>
                                                    <p class="name">'.$memberName.'</p>
                                                  </div>
                                                  '.$class_status.'';
                         
                        }

                        if(getWeekday($test) == 6){

                          $result .=''.$link.'<div>
                                                    <p>'.$starttime.' - '.$added_minutes_time.'</p>
                                                    <p>'.$classtime.''.$classunit.'</p>
                                                    <p class="sport">'.$classname.'</p>
                                                    <p class="name">'.$memberName.'</p>
                                                  </div>
                                                  '.$class_status.'';
                         
                        }

                        if(getWeekday($test) == 0){

                          $result .=''.$link.'<div>
                                                    <p>'.$starttime.' - '.$added_minutes_time.'</p>
                                                    <p>'.$classtime.''.$classunit.'</p>
                                                    <p class="sport">'.$classname.'</p>
                                                    <p class="name">'.$memberName.'</p>
                                                  </div>
                                                  '.$class_status.'';
                         
                        }

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
                        }
   
echo $result;


?>