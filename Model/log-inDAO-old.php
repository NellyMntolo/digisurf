<?php
include '../lang/lang.php';
mysql_set_charset("utf8");


include 'menuDAO.php';
include 'footerDAO.php';
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
//$db_day = '';
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
$result1 .= '<div class="swiper-slide">';
$result2 .= '<div class="swiper-slide">';
$result3 .= '<div class="swiper-slide">';
$result4 .= '<div class="swiper-slide">';
$result5 .= '<div class="swiper-slide">';
$result6 .= '<div class="swiper-slide">';
$result0 .= '<div class="swiper-slide">';


$catcc_type = array();
                    //CONTENT
                        
                        $sql_catcc_types = 'select * from corclasses';
                        $retval_catcc_types = mysql_query( $sql_catcc_types, $conn );
                             if(! $retval_catcc_types )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

                        while($row_catcc_types = mysql_fetch_array($retval_catcc_types, MYSQL_ASSOC)){
                            $catcc_type[] = $row_catcc_types['cc_Type'];
                          }

                        $sql_cattypes = 'select * from _types where Short IN ('.implode($catcc_type,',').') and Parent= 1';
                        $retval_cattypes = mysql_query( $sql_cattypes, $conn );
                             if(! $retval_cattypes )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

                        while($row_cattypes = mysql_fetch_array($retval_cattypes, MYSQL_ASSOC)){
                            $cattype = $row_cattypes['Type'];

                            $courseType .= '<option value="'.$cattype.'">'.$cattype.'</option>';                         

                        }

                        $sqlen_teachers = 'select * from cormember where ct_Type=02 and ct_No like "%D%"';
                        $retvalen_teachers = mysql_query( $sqlen_teachers, $conn );
                             if(! $retvalen_teachers )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

                        while($rowen_teachers = mysql_fetch_array($retvalen_teachers, MYSQL_ASSOC)){
                            $teachers_id = $rowen_teachers['ct_No'];
                            $teachers_name = $rowen_teachers['ct_Name'];

                            $teachers .= '<option value="'.$teachers_id.'">'.$teachers_name.'</option>';                         

                        }

                    if(isset($_SESSION['login_visitor'])){
                        //classes
                    } else {

                    }


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
  $teacher_id = 'D00003';
  $week = "'2017-08-17'";
  //$selected_option = "12";


// $timestamp = strtotime('next Sunday');
// $days = array();
// for ($i = 0; $i < 7; $i++) {
//     $days[] = strftime('%A', $timestamp);
//     $timestamp = strtotime('+1 day', $timestamp);
// }

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
                          // if($classbooking == 1 ) { //Cannot Book Online
                          //   $result1 .='<a href="#" class="class" data-toggle="modal" data-target="#myModal">
                          //                   <div>
                          //                     <p>'.$starttime.' - '.$endtime.'</p>
                          //                     <p class="sport">'.$classname.'</p>
                          //                     <p class="name">'.$memberName.'</p
                          //                   </div>
                          //                 </a>';

                          // }elseif($classbooking == 0){ //Make a Booking
                          //   $result1 .='<a class="class" data-toggle="modal" data-target="#myModal">
                          //             <div>
                          //               <p>'.$starttime.' - '.$endtime.'</p>
                          //               <p class="sport">'.$classname.'</p>
                          //               <p class="name">'.$memberName.'</p>
                          //             </div>
                          //             <div class="class-problem class-preorder">
                          //               <div class="inner">
                          //                 <p>預約課程</p>
                          //               </div>
                          //                <img src="/assets/images/icon_line.svg" alt="">
                          //             </div>
                          //             <div class="class-description">
                          //               <h4>Title</h4>
                          //               <p>sdfglhkjasdghfl kjasdgfh sak;jdhf a;shf ;asdkljfh sad;lkh fsadhjlk fsdlkjh fasdkjlhfas h </p>
                          //             </div>
                          //           </a>';
                          // } elseif(strtotime($tt_Time_e) > strtotime('now')){

                          // }


                          // elseif($classguid != -1){ //Already Booked
                          // $result1 .='<a href="#" class="class" data-toggle="modal" data-target="#myAlreadyFull">
                          //         <div>
                          //           <p>'.$starttime.' - '.$endtime.'</p>
                          //               <p class="sport">'.$classname.'</p>
                          //               <p class="name">'.$memberName.'</p
                          //         </div>
                          //         <div class="class-problem class-booked">
                          //           <div class="inner">
                          //             <p>已訂課程</p>
                          //           </div>
                          //         </div>
                          //       </a>';
                          // } 

                          
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


                        //Coped

                        // $result .= '<div class="swiper-slide">
                        //                     <a class="class" data-toggle="modal" data-target="#myModal">
                        //                       <div>
                        //                         <div>
                        //                             <!--<p>'.date('Y').'</p>-->
                        //                             <p>'.$starttime.' - '.$endtime.'</p>
                        //                             <p class="sport">'.$classname.'</p>
                        //                             <p class="name">'.$memberName.'</p>
                        //                         </div>';

                

                        // if(1 == 2){ //Available For Booking
                        //   $result .= '<div class="class-problem class-preorder">
                        //                 <div class="inner">
                        //                   <p>預約課程 make a booking</p>
                        //                 </div>
                        //                  <img src="../assets/images/icon_line.svg" alt="">
                        //               </div>
                        //               <div class="class-description">
                        //                 <h4>Title</h4>
                        //                 <p>'.$classremark.'sdfglhkjasdghfl kjasdgfh sak;jdhf a;shf ;asdkljfh sad;lkh fsadhjlk fsdlkjh fasdkjlhfas h </p>
                        //               </div>';
                        // } elseif($classguid != -1){ //Already Booked
                        //   $result .= '<div class="class-problem class-booked">
                        //                 <div class="inner">
                        //                   <p>已訂課程 already booked</p>
                        //                 </div>
                        //               </div>';
                        // }elseif(2 == 1){ //Currently Full
                        //   $result .= '<div class="class-problem over-people">
                        //                 <div class="inner">
                        //                     <p class="mention">人數已滿 full class</p>
                        //                     <p class="grey">人數已滿 <br>候補人數<span class="green">2</span>位</p>
                        //                     <button class="btn btn-sm btn-default2 btn-block hidden-xs">預約候補</button>
                        //                 </div>
                        //             </div>';
                        


                        // }elseif($classbooking == 1){ //Cannot Book Online
                        //   $result .= '<div class="class-problem class-booked">
                        //                 <div class="inner">
                        //                   <p>請洽櫃檯或<br>來電預約 cannot book online</p>
                        //                 </div>
                        //               </div>';
                        // }elseif(strtotime($tt_Time_e) > strtotime('now')){ //Time Passed
                        //   $result .= '<div class="class-none">
                        
                        //                 </div>';
                        // }

                        //   $result .= '</div></a>
                        //         </div>';
                        }
   
   $result1 .= '</div>';
   $result2 .= '</div>';
   $result3 .= '</div>';
   $result4 .= '</div>';
   $result5 .= '</div>';
   $result6 .= '</div>';
   $result0 .= '</div>';

// function nextweek() {
//   return $currentWeek++;
// }

// function prevweek() {
//   return $currentWeek--;
// }
?>
