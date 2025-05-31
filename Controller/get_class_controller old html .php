<?php 
include '../Model/dbconfig.php';
mysql_set_charset("utf8");
session_start();
$current_lang = $_SESSION['lang'];
ini_set('display_errors', 'On');


$result = '';
$result1 = '';
$result2 = '';
$result3 = '';
$result4 = '';
$result5 = '';
$result6 = '';
$result0 = '';

$week = $_POST['week'];


$starttime = '';
$endtime = '';
$endingdate = '';
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
$classneedbooking = '';
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

                    //CONTENT


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

;

function getWeekday($dates) {
    return date('w', strtotime($dates));
}
    
//if(isset($_POST['test-input'])){
  // $teacher_id = 'D00003';
  // $week = "'2017-08-23'";
  //$selected_option = "12";

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

                            if(strtotime($added_minutes) > strtotime('now') ){
                              $link = '<a class="class">';
                              $class_status = '<div class="class-none"></div></a>';
                            } elseif ($classbooking == 1) {
                              $class_status = '<div class="class-problem class-booked">
                                                  <div class="inner">
                                                    <p>請洽櫃檯或<br>來電預約</p>
                                                  </div>
                                                </div></a>';
                            } elseif ($classbooking == 0) {
                              $link = '<a class="class" data-toggle="modal" data-target="#myModal">';
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
                            }

                        

                        if(getWeekday($test) == 1){

                          
                          $result1 .=''.$link.'<div>
                                        <p>'.$starttime.' - '.$added_minutes_time.'</p>
                                        <p>'.$classtime.''.$classunit.'</p>
                                        <p class="sport">'.$classname.'</p>
                                        <p class="name">'.$memberName.'</p>
                                      </div>
                                      '.$class_status.''; 
                        }


                        if(getWeekday($test) == 2){

                          $result2 .=''.$link.'<div>
                                                    <p>'.$starttime.'</p>
                                                    <p>'.$classtime.''.$classunit.'</p>
                                                    <p class="sport">'.$classname.'</p>
                                                    <p class="name">'.$memberName.'</p>
                                                  </div>
                                                  '.$class_status.'';
                         
                        }

                        if(getWeekday($test) == 3){

                          $result3 .=''.$link.'<div>
                                                    <p>'.$starttime.'</p>
                                                    <p>'.$classtime.''.$classunit.'</p>
                                                    <p class="sport">'.$classname.'</p>
                                                    <p class="name">'.$memberName.'</p>
                                                  </div>
                                                  '.$class_status.'';
                         
                        }

                        if(getWeekday($test) == 4){

                          $result4 .=''.$link.'<div>
                                                    <p>'.$starttime.'</p>
                                                    <p>'.$classtime.''.$classunit.'</p>
                                                    <p class="sport">'.$classname.'</p>
                                                    <p class="name">'.$memberName.'</p>
                                                  </div>
                                                  '.$class_status.'';
                         
                        }

                        if(getWeekday($test) == 5){

                          $result5 .=''.$link.'<div>
                                                    <p>'.$starttime.'</p>
                                                    <p>'.$classtime.''.$classunit.'</p>
                                                    <p class="sport">'.$classname.'</p>
                                                    <p class="name">'.$memberName.'</p>
                                                  </div>
                                                  '.$class_status.'';
                         
                        }

                        if(getWeekday($test) == 6){

                          $result6 .=''.$link.'<div>
                                                    <p>'.$starttime.'</p>
                                                    <p>'.$classtime.''.$classunit.'</p>
                                                    <p class="sport">'.$classname.'</p>
                                                    <p class="name">'.$memberName.'</p>
                                                  </div>
                                                  '.$class_status.'';
                         
                        }

                        if(getWeekday($test) == 0){

                          $result0 .=''.$link.'<div>
                                                    <p>'.$starttime.'</p>
                                                    <p>'.$classtime.''.$classunit.'</p>
                                                    <p class="sport">'.$classname.'</p>
                                                    <p class="name">'.$memberName.'</p>
                                                  </div>
                                                  '.$class_status.'';
                         
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