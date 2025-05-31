<?php
include '../lang/lang.php';
mysql_set_charset("utf8");


include 'menuDAO.php';
include 'footerDAO.php';
$current_lang = $_SESSION['lang'];


$tt_Guid = '';
$tt_Date = '';
$tt_NeedBooking = '';
$tt_Class = '';
$tt_Teacher = '';
$tt_Qty = '';
$cc_Times = '';
$cc_Name = '';
$cc_Type = '';
$Type = '';
$Parent = '';
$cc_Remark = '';
$thetime = '';


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
$result .= '<div class="swiper-slide">';


$catcc_type = array();
                    //CONTENT

$week = $_POST['week'];

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


// $buttons ='<div class="swiper-button-next" onclick="'.nextweek().'"><img src="/assets/images/nav_right.svg"/></div>
//           <div class="swiper-button-prev" onclick="'.prevweek().'"><img src="/assets/images/nav_left.svg"/></div>';

function getWeekday($dates) {
    return date('w', strtotime($dates));
}
    
//if(isset($_POST['test-input'])){
  //echo date('Y-m-d'); //current date today
  //$selected_option = "12";


// $timestamp = strtotime('next Sunday');
// $days = array();
// for ($i = 0; $i < 7; $i++) {
//     $days[] = strftime('%A', $timestamp);
//     $timestamp = strtotime('+1 day', $timestamp);
// }
                        //$sqlprojecten = 'SELECT * FROM tktimetable WHERE WEEKOFYEAR(tt_Date) = WEEKOFYEAR('.$week.') AND MONTH(tt_Date)=MONTH(NOW()) AND tt_Teacher like "%D%" ORDER BY tt_Date ASC ';
                        $sqlprojecten = "SELECT tt_Guid, tt_Date, tt_NeedBooking, tt_Class, tt_Teacher, tt_Qty, cc_Times, cc_Name, cc_Type, Type, Parent,
IF(cc_Remark IS NULL or cc_Remark = '', '', cc_Remark) as cc_Remark,
CASE WHEN  now() > (DATE_FORMAT(tt_Date, '%Y-%m-%d %H:%i:%s')+ INTERVAL cc_Times MINUTE) THEN 'timesover'
WHEN now() > tt_Date and now() < (tt_Date + INTERVAL cc_Times MINUTE)
THEN 'currentlyon' 
ELSE 'notopen' END as thetime
 FROM tktimetable, corclasses, _types, tkclassbooking
WHERE WEEKOFYEAR(tt_Date) = WEEKOFYEAR('2017-08-22') 
AND MONTH(tt_Date)=MONTH(NOW()) 
AND tt_Teacher like \"%D%\" ORDER BY tt_Date ASC ";
                        //$sqlprojecten = 'SELECT * FROM tktimetable WHERE WEEKOFYEAR(tt_Date) = WEEKOFYEAR('.$week.') AND MONTH(tt_Date)=MONTH(NOW()) ORDER BY tt_Date ASC ';
                        //$sqlprojecten = 'SELECT * FROM tktimetable WHERE YEAR('.$week.') = YEAR(tt_Date) ORDER BY tt_Date ASC ';
                        //$sqlprojecten = 'SELECT * FROM tktimetable WHERE YEAR('.$week.') = YEAR(tt_Date) ORDER BY WEEKOFYEAR(NOW()) ASC';
                        $retvalprojecten = mysql_query( $sqlprojecten, $conn );                 
                             if(! $retvalprojecten )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

                            //echo mysql_num_rows($retvalprojecten);

                            $i = 0;

                            $rowprojecten = mysql_fetch_array($retvalprojecten, MYSQL_ASSOC);
                            
                            //$thetime = $rowprojecten['thetime'];

                            echo date('d-m-Y h:i:s'); 
                              $tt_Guid = $rowprojecten['tt_Guid'];
                              $tt_Date = $rowprojecten['tt_Date'];
                              $tt_NeedBooking = $rowprojecten['tt_NeedBooking'];
                              $tt_Class = $rowprojecten['tt_Class'];
                              $tt_Teacher = $rowprojecten['tt_Teacher'];
                              $tt_Qty = $rowprojecten['tt_Qty'];
                              $cc_Times = $rowprojecten['cc_Times'];
                              $cc_Name = $rowprojecten['cc_Name'];
                              $cc_Type = $rowprojecten['cc_Type'];
                              $Type = $rowprojecten['Type'];
                              $Parent = $rowprojecten['Parent'];
                              $cc_Remark = $rowprojecten['cc_Remark'];
                              $thetime = $rowprojecten['thetime'];



                              if($memberName != null || $memberName != '' && $cc_Name != null || $cc_Name != ''){

                                  if( $thetime == 'timesover' ){ // class time over
                                    $link = '<a class="class">';
                                    $class_status = '<div class="class-none">
                                                    </div></a>';
                                  } elseif ($tt_NeedBooking == 1) { //Cannot Book Online
                                    $class_status = '<div class="class-problem class-booked">
                                                        <div class="inner">
                                                          <p>請洽櫃檯或<br>來電預約</p>
                                                        </div>
                                                      </div></a>';
                                  } elseif ($tt_NeedBooking == 0) { //Make a Booking
                                    $link = '<a class="class" data-toggle="modal" data-target="#myModal">';
                                    $class_status = '<div class="class-problem class-preorder">
                                              <div class="inner">
                                                <p>預約課程</p>
                                              </div>
                                               <img src="/assets/images/icon_line.svg" alt="">
                                            </div>
                                            <div class="class-description">
                                              <h4></h4>
                                              <p>'.$classremark.'</p>
                                            </div></a>';
                                  }

                                }//member and class names


                              if(getWeekday($test) == 1){
                          
                                $result1 .=''.$link.'<div>
                                              <p>'.$starttime.'</p>
                                              <p>'.$classtime.''.$classunit.'</p>
                                              <p class="sport">'.$classname.'</p>
                                              <p class="name">'.$memberName.'</p>
                                            </div>
                                            '.$class_status.''; 
                              }

                            
                        // while($rowprojecten = mysql_fetch_array($retvalprojecten, MYSQL_ASSOC)){

                        //     $tt_Guid = $rowprojecten['tt_Guid'];
                        //     $tt_Date = $rowprojecten['tt_Date'];
                        //     $tt_NeedBooking = $rowprojecten['tt_NeedBooking'];
                        //     $tt_Class = $rowprojecten['tt_Class'];
                        //     $tt_Teacher = $rowprojecten['tt_Teacher'];
                        //     $tt_Qty = $rowprojecten['tt_Qty'];
                        //     $cc_Times = $rowprojecten['cc_Times'];
                        //     $cc_Name = $rowprojecten['cc_Name'];
                        //     $cc_Type = $rowprojecten['cc_Type'];
                        //     $Type = $rowprojecten['Type'];
                        //     $Parent = $rowprojecten['Parent'];
                        //     $cc_Remark = $rowprojecten['cc_Remark'];
                        //     $thetime = $rowprojecten['thetime'];

                        //     $startdate = date_create($rowprojecten['tt_Date']);                          
                        //     $the_time = date_format($startdate, 'H:i:s');
                        //     if($the_time != '00:00:00'){
                        //     $starttime = date_format($startdate, 'H:i');
                        //     }
                        //     //$db_day .= date_format($startdate, 'm-d');
                        //     // echo $db_day.'|| '; // returns 08-07
                        //     // $dd_ = '<div class="swiper-slide">
                        //     //           <div class="date"><p class="date_1">'.$db_day.'</p><span>MON</span></div>
                        //     //         </div>';
                        //     $timestamp = strtotime('next Monday');
                        //     $days = array();
                        //     for ($i = 0; $i < 7; $i++) {                    
                        //         $days[] = strftime('%a', $timestamp);
                        //         $timestamp = strtotime('+1 day', $timestamp);
                        //         $db_startdate = $rowprojecten['tt_Date'];
                        //         $db_day[] = date_format($startdate, 'm-d');
                        //         $di[] = date('D');
                        //         $result .= '<div class="swiper-slide">
                        //                   <div class="date"><p class="date_'.$i.'">'.$db_day[$i].'</p><span>'.$days[$i].'</span></div>
                        //                 </div>';                              
                        //     }



                        // }
   
   $result .= '</div>';

// function nextweek() {
//   return $currentWeek++;
// }

// function prevweek() {
//   return $currentWeek--;
// }
?>
