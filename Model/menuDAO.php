<?php
// Send noindex to avoid ghost carts by bots
//header('X-Robots-Tag: noindex, nofollow', true);
error_reporting(0);
include 'lang/lang.php';
include '../lang/lang.php';
mysql_set_charset("utf8");
header('Content-Type: text/html; charset=utf-8');
// session_start();
date_default_timezone_set("Asia/Taipei");
$error = '';
$customer_name ='';
$tt_Guid_ratings = array();
$score_rating_tt_guid = array();
$tt_Guid_rating = '';
// 

$current_lang = $_SESSION['lang'];
function theUrl($link) {
        $uri = $_SERVER['REQUEST_URI'];
        if($link==$uri) {
            return 'class="active"';
        }
    }

$_SESSION['booking'] = $_SESSION['booking'];
$_SESSION['bookingcancelled'] = $_SESSION['bookingcancelled'];
// $book_cancel = '';
// $cancel_id = '';
// if(!empty($book_cancel)){$cancel_id = $book_cancel;}

                        $sqlcart = 'select * from digisurf_cart_module where code ="'.$current_lang.'"';
                        $retvalcart = mysql_query( $sqlcart, $conn );                 
                             if(! $retvalcart )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

                        $rowcart = mysql_fetch_array($retvalcart, MYSQL_ASSOC);
                            $idx = $rowcart['idx']; 
                            $cart_text1 = $rowcart['text1'];
                            $cart_text2 = $rowcart['text2'];
                            $cart_text3 = $rowcart['text3'];
                            $cart_text4 = $rowcart['text4'];
                            $cart_text5 = $rowcart['text5'];
                            $cart_text6 = $rowcart['text6'];
                            $cart_text7 = $rowcart['text7'];
                            $cart_text8 = $rowcart['text8'];


                            

                        $sqlmenuen = 'select * from digisurf_menu where code ="'.$current_lang.'"';
                        $retvalmenuen = mysql_query( $sqlmenuen, $conn );                 
                             if(! $retvalmenuen )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

                        $rowmenuen = mysql_fetch_array($retvalmenuen, MYSQL_ASSOC);
                            $menu_text1 = $rowmenuen['text1'];
                            $menu_text2 = $rowmenuen['text2'];
                            $menu_text3 = $rowmenuen['text3'];
                            $menu_text4 = $rowmenuen['text4'];
                            $menu_text5 = $rowmenuen['text5'];
                            $menu_text6 = $rowmenuen['text6'];
                            $menu_text7 = $rowmenuen['text7']; 
                            $menu_text8 = $rowmenuen['text8']; 
                            $menu_text9 = $rowmenuen['text9']; 
                            $menu_text10 = $rowmenuen['text10']; 
                            $menu_text11 = $rowmenuen['text11']; 
                            $menu_text12 = $rowmenuen['text12'];
                            $menu_text13 = $rowmenuen['text13'];
                            $menu_text14 = $rowmenuen['text14'];
                            $menu_text15 = $rowmenuen['text15'];
                            $menu_text16 = $rowmenuen['text16'];
                            $menu_text17 = $rowmenuen['text17'];
                            $menu_text18 = $rowmenuen['text18'];
                            $menu_text19 = $rowmenuen['text19'];
                            $menu_text20 = $rowmenuen['text20'];
                            $menu_text21 = $rowmenuen['text21'];
                            $menu_text22 = $rowmenuen['text22'];
                            $menu_text23 = $rowmenuen['text23'];


                            $mypromo = '';
                            $sqlpromo = 'SELECT * FROM shop_digisurf_promo WHERE WEEKOFYEAR(promo_date) = WEEKOFYEAR(NOW()) ORDER BY idx DESC LIMIT 1';
                            $retvalpromo = mysql_query( $sqlpromo, $conn );                 
                                 if(! $retvalpromo )
                                 {
                                    die('Could not get data: ' . mysql_error());
                                 }
                            
                            $rowpromo = mysql_fetch_array($retvalpromo, MYSQL_ASSOC);
                            $promo_text = $rowpromo['promo_text'];

                            if($promo_text != null || $promo_text != ''){
                                $_SESSION['promo_text'] = $promo_text;

                                $mypromo = '<div class="notification bg3">
                                    <div class="notification-message">
                                        <p>'.$_SESSION['promo_text'].'</p>
                                    </div>

                                    <a class="notification-close">
                                        <img src="/assets/images/nothing-icon.svg"/>
                                    </a>
                                </div>';
                            } 
                            
                            if(isset($_SESSION['promo_dead'])){
                                $mypromo = '';
                            }

                            


//$current_user = $_SESSION['login_visitor'];
$menu_account = '';
$menu_account_mobile = '';
$menu_log = '';
$side_user = '';
$class_rating = '';
$guid_already_rated = array();
$rating_script = '';

// if(!isset($_SESSION['login_visitor'])) {
//     $menu_account = '<li id="type"><a href="#myLogin" class="btn btn-default2" data-toggle="modal" data-target="#myLogin">LOGIN - '.$menu_text7.'</a></li>'; 
// } 
// // elseif(isset($_SESSION['login_visitor'])){
// //     $menu_account = '<li id="type"><a href="/Logout" class="btn btn-default2">'.$menu_text9.'</a></li>
// //     <li id="type"><a href="/Account" class="btn btn-default2">'.$_SESSION['login_name'].'</a></li>'; 

// // }

// if(isset($_SESSION['login_visitor']) && $_SESSION['customer_type']=="SWD"){
//     $menu_account = '<li id="type"><a href="/Logout" class="btn btn-default2">'.$menu_text9.'</a></li>
//     <li id="type"><a href="/Account" class="btn btn-default2">'.$_SESSION['login_name'].'</a></li>'; 

// } else {
//     $menu_account = '<li id="type"><a href="#myLogin" class="btn btn-default2" data-toggle="modal" data-target="#myLogin">LOGIN - '.$menu_text7.'</a></li>'; 
// }



                



                
                
                // $menu_account = '<a href="/Sport_Records">
                //                     <img src="/assets/images/user.svg"/>
                //                     <span class="hidden-sm hidden-xs">Hi,</span><span class="hidden-sm hidden-xs">'.$_SESSION['login_name'].'</span>
                //                 </a>';
                // $menu_account_mobile = '<li id="name"><span>Hi,</span><span>'.$_SESSION['login_name'].'</span></li>';
                // $menu_log = '<li id="log"><a href="/Logout" class="btn btn-default2">'.$menu_text9.'</a></li>';
                // $side_user = '<h4>'.$_SESSION['login_name'].'</h4>';
                



                        $sql_already_rated = 'select * from teachers_score';
                        $retval_already_rated = mysql_query( $sql_already_rated, $conn );                 
                             if(! $retval_already_rated )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

                            while($row_already_rated = mysql_fetch_array($retval_already_rated, MYSQL_ASSOC)){
                            $guid_already_rated[] = $row_already_rated['tt_guid'];
                            //print_r($guid_already_rated);
                            }

                //login for digisurf
                if(isset($_SESSION['login_visitor'])){
                    // $menu_account = '';
                // $menu_account = '<a href="/Class_Records" class="btn btn-default2">
                //                     <!--<img src="/assets/images/user.svg"/>-->
                //                     <span class="hidden-sm hidden-xs">Hi,</span><span class="hidden-sm hidden-xs">'.$_SESSION['login_name'].'</span>
                //                 </a>';

                    $nominate_shop = '<li><a href="/Nominate_New_Shop" '.theUrl('/Nominate_New_Shop').'>Nominate New Shop</a></li>';
                     $menu_account = '<li class="language-selector user-drop">                                           
                                        
                                          <ul class="nav navbar-nav">
                                            <li class="dropdown" id="type">
                                              <a href="#" class="dropdown-toggle btn btn-default2" data-toggle="dropdown">'.$_SESSION['login_name'].'</a>
                                                <ul class="dropdown-menu dropdown-menu-right" role="menu">


                                                    <li class="dropdown-li">
                                                        <span class="dropdown-history"> 360 </span>

                                                        <a href="/History">View History</a>
                                                    </li>

                                                    <li class="dropdown-li">
                                                        <span class="dropdown-history"> 36 </span>

                                                        <a href="/">Waiting for Review</a>
                                                    </li>

                                                    <li class="dropdown-li"><a href="/User_Settings">Settings</a></li>
                                                    
                                                    <li class="dropdown-li"><a href="/Logout">Log Out</a></li>


                                                    
                                                  </ul>
                                                </li>
                                            </ul>
                                </li>';


                $menu_account_mobile = '<li id="name"><span>Hi,</span><span>'.$_SESSION['login_name'].'</span></li>';
                $menu_log = '<li id="log"><a href="/Logout" class="btn btn-default2">'.$menu_text9.'</a></li>';
                $side_user = '<h4>'.$_SESSION['login_name'].'</h4>';

                        // $sql_teacher_score_rating = 'select * from teachers_score ';//  where tt_guid not in ('.implode($tt_Guid_ratings,',').')
                        // $retval_teacher_score_rating = mysql_query( $sql_teacher_score_rating, $conn );                 
                        //      if(! $retval_teacher_score_rating )
                        //      {
                        //         die('Could not get data:implode: ' . mysql_error());
                        //      }

                        //     while($row_teacher_score_rating = mysql_fetch_array($retval_teacher_score_rating, MYSQL_ASSOC)){
                        //     $score_rating_tt_guid[] = $row_teacher_score_rating['tt_guid'];
                        // }


                //RATING
                date_default_timezone_set("Asia/Taipei");
                $thedd = date('Y-m-d H:i:s',strtotime('now'));
                $current_user = $_SESSION['login_visitor'];
                $sql_cormember_rating = 'select * from cormember where ct_Mobile="'.$current_user.'" or ct_Phone="'.$current_user.'" ';
                        $retval_cormember_rating = mysql_query( $sql_cormember_rating, $conn );                 
                             if(! $retval_cormember_rating )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

                            $row_cormember_rating = mysql_fetch_array($retval_cormember_rating, MYSQL_ASSOC);                            
                            $ct_No_rating = $row_cormember_rating['ct_No'];
                            $ct_Guid_rating = $row_cormember_rating['ct_Guid'];

//echo "heeeeelo";
//echo $ct_No_rating;
                        $sql_tkswiping_rating = 'select * from tkswiping where ts_Member="'.$ct_No_rating.'" order by ts_Date desc ';
                        $retval_tkswiping_rating = mysql_query( $sql_tkswiping_rating, $conn );                 
                             if(! $retval_tkswiping_rating )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

                        while($row_tkswiping_rating = mysql_fetch_array($retval_tkswiping_rating, MYSQL_ASSOC)){                     
                            $ts_Class_rating = $row_tkswiping_rating['ts_Class'];
                            $ts_Date_rating = $row_tkswiping_rating['ts_Date'];
                            $ts_TimeTable_Guid_rating = $row_tkswiping_rating['ts_TimeTable_Guid'];

//echo $ts_TimeTable_Guid_rating.'<br>';
                        $sql_corclasses_rating = 'select * from corclasses where cc_No="'.$ts_Class_rating.'" ';
                        $retval_corclasses_rating = mysql_query( $sql_corclasses_rating, $conn );                 
                             if(! $retval_corclasses_rating )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

                            $row_corclasses_rating = mysql_fetch_array($retval_corclasses_rating, MYSQL_ASSOC);                           
                            $cc_Name_rating = $row_corclasses_rating['cc_Name'];
                            $cc_No_rating = $row_corclasses_rating['cc_No'];
                            $cc_Times_rating = $row_corclasses_rating['cc_Times'];
//echo $cc_Name_rating.'<br>';

                        $sql_tktimetable_rating = 'select * from tktimetable where tt_Class="'.$cc_No_rating.'" and tt_guid="'.$ts_TimeTable_Guid_rating.'" ';// AND where  tt_Delete != 1
                        $retval_tktimetable_rating = mysql_query( $sql_tktimetable_rating, $conn );                 
                             if(! $retval_tktimetable_rating )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

                            $row_tktimetable_rating = mysql_fetch_array($retval_tktimetable_rating, MYSQL_ASSOC);         
                            $tt_Teacher_rating = $row_tktimetable_rating['tt_Teacher'];
                            $tt_Date_rating = $row_tktimetable_rating['tt_Date'];
                            $tt_Guid_rating = $row_tktimetable_rating['tt_Guid'];
                            $tt_Guid_ratings[] = $row_tktimetable_rating['tt_Guid'];

//echo '00 : '.$tt_Teacher_rating.'<br>';
//echo  $tt_Guid_rating.'<br>';

                        $sql_teacher_rating = 'select * from cormember where ct_No="'.$tt_Teacher_rating.'" AND ct_Type=02 ';
                        $retval_teacher_rating = mysql_query( $sql_teacher_rating, $conn );                 
                             if(! $retval_teacher_rating )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

                            $row_teacher_rating = mysql_fetch_array($retval_teacher_rating, MYSQL_ASSOC);
                            $ct_Name_rating = $row_teacher_rating['ct_Name'];
                            $ct_Teacher_Guid_rating = $row_teacher_rating['ct_Guid'];

//echo 'num : '.$tt_Teacher_rating.'<br>';

                        $sql_teacher_rating_image = 'select * from digisurf_blog where text4="'.$tt_Teacher_rating.'" ';
                        $retval_teacher_rating_image = mysql_query( $sql_teacher_rating_image, $conn );                 
                             if(! $retval_teacher_rating_image )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

                            $row_teacher_rating_image = mysql_fetch_array($retval_teacher_rating_image, MYSQL_ASSOC);
                            $ct_Name_rating_image = $row_teacher_rating_image['image1'];
//echo 'thingy magigy!!! '.$ct_Name_rating_image.'<br>';


                        //$sql_classbooking_rating = 'select * from tkclassbooking where tc_Member="'.$ct_No_rating.'" AND tc_Delete != 1 ';
                        $sql_classbooking_rating = 'select * from tkclassbooking where tc_TimeTable_Guid="'.$ts_TimeTable_Guid_rating.'" ';
                        $retval_classbooking_rating = mysql_query( $sql_classbooking_rating, $conn );                 
                             if(! $retval_classbooking_rating )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

                            $row_classbooking_rating = mysql_fetch_array($retval_classbooking_rating, MYSQL_ASSOC);
                            $tc_TimeTable_Guid_rating = $row_classbooking_rating['tc_TimeTable_Guid'];
                            $tc_Delete_rating = $row_classbooking_rating['tc_Delete'];
                            $tc_TksalesGuid_rating = $row_classbooking_rating['tc_TksalesGuid'];
                            $tc_TickGuid_rating = $row_classbooking_rating['tc_TickGuid'];



                            $upcoming = date_create($tt_Date_rating);
                            $booked_date_time = date_format($upcoming, 'Y-m-d H:i:s');
                            $booked_date = date_format($upcoming, 'Y-m-d');
                            $booked_time = date_format($upcoming, 'H:i');

                            //$endtime = strtotime('+'.$cc_Times.' minutes', strtotime($upcoming));
                            $booked_status = date($booked_date_time, strtotime('+'.$cc_Times_rating.' minutes'));


//echo $booked_status.'<br>';

//echo $booked_time.' --- ';
//echo date('Y-m-d\TH:i:sO');

                            $the_date = date_create($ts_Date);
                            $Class_date = date_format($the_date, 'Y-m-d');
                            $SomeDate = date_format($the_date, 'Y-m-d H:i:s');
                            $the_time = date_create($ts_Date);
                            $Class_time = date_format($the_time, 'H:i');

                            //print_r($tt_Guid_ratings);



                        $sql_teacher_score_rating = 'select * from teachers_score where tt_guid != "'.$tt_Guid_rating.'" ';//  where tt_guid not in ('.implode($tt_Guid_ratings,',').')
                        $retval_teacher_score_rating = mysql_query( $sql_teacher_score_rating, $conn );                 
                             if(! $retval_teacher_score_rating )
                             {
                                die('Could not get data:implode: ' . mysql_error());
                             }

                            $row_teacher_score_rating = mysql_fetch_array($retval_teacher_score_rating, MYSQL_ASSOC);
                            //while($row_teacher_score_rating = mysql_fetch_array($retval_teacher_score_rating, MYSQL_ASSOC)){
                            $score_rating_tt_guid = $row_teacher_score_rating['tt_guid'];
                            $score_rating_ct_guid = $row_teacher_score_rating['ct_guid'];
                            $score_rating_teacher_guid = $row_teacher_score_rating['teacher_guid'];

                      //echo $score_rating_tt_guid.'<br>';      
                            
                            // if(in_array($tt_Guid_rating,$score_rating_tt_guid) ){
                            //       echo $tt_Guid_rating.'<br>';
                            //   }



                            //if($tc_Delete_rating != 1 ){//&& in_array($tt_Guid_rating, $score_rating_tt_guid)

                            //if($booked_status < $thedd && $tc_TksalesGuid_rating != '' && $tc_TickGuid_rating != '' && $score_rating_tt_guid != $tt_Guid_rating && $score_rating_ct_guid != $ct_Guid_rating && $score_rating_teacher_guid != $ct_Teacher_Guid_rating){
                            if(!in_array($tt_Guid_rating,$guid_already_rated)){ //$score_rating_tt_guid != $tt_Guid_rating
                                $class_rating .= '<div class="teacher-wrapper">
                                                        <form method="post">
                                                        <div class="teacher-wrapper-rates">
                                                            <div class="teacher-container">
                                                                <div class="teacher-profile">
                                                                    <div class="inner">
                                                                        <img src="'.$ct_Name_rating_image.'" alt="">
                                                                    </div>
                                                                </div>
                                                                <div class="teacher-info">
                                                                    <p>日期：<span>'.$booked_date.'</span></p><!-- '.$tt_Teacher_rating.' -->
                                                                    <p>教學課程：<span>'.$cc_Name_rating.'</span></p>
                                                                    <p>老師姓名：<span>'.$ct_Name_rating.'</span></p>
                                                                    
                                                                    <div class="teacher-stars">
                                                                        <img class="star" src="/assets/images/2h_star_green.svg" alt="" data-val="1" name="score">
                                                                        <img class="star" src="/assets/images/2h_star_green.svg" alt="" data-val="2" name="score">
                                                                        <img class="star" src="/assets/images/2h_star_green.svg" alt="" data-val="3" name="score">
                                                                        <img class="star" src="/assets/images/2h_star_green.svg" alt="" data-val="4" name="score">
                                                                        <img class="star" src="/assets/images/2h_star_green.svg" alt="" data-val="5" name="score">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="teacher-wrapper-write">
                                                            <div class="teacher-container">
                                                                <div class="write-icon">
                                                                    <div class="box">
                                                                        <img src="/assets/images/2h_icon_record.svg" alt="">
                                                                        <p>教學內容</p>
                                                                    </div>
                                                                    <div class="box">
                                                                        <img src="/assets/images/2h_icon_people.svg" alt="">
                                                                        <p>教學態度</p>
                                                                    </div>
                                                                    <div class="box">
                                                                        <img src="/assets/images/2h_icon_clock.svg" alt="">
                                                                        <p>時間掌控</p>
                                                                    </div>
                                                                    <div class="box">
                                                                        <img src="/assets/images/2h_icon_music.svg" alt="">
                                                                        <p>設備音樂</p>
                                                                    </div>
                                                                </div>
                                                                <div class="write-message">
                                                                    <p>請問有什麼地方需要改進呢？</p>
                                                                    <div class="fake-textarea">
                                                                        <textarea name="content"></textarea>
                                                                    </div>
                                                                </div>
                                                                <button type="submit" class="btn btn-black rating">送出</button>
                                                            </div>
                                                        </div>
                                                        <input type="hidden" name="score" class="thestar">
                                                        <input type="hidden" name="tt_guid" value="'.$tt_Guid_rating.'">
                                                        <input type="hidden" name="ct_guid" value="'.$ct_Guid_rating.'">
                                                        <input type="hidden" name="teacher_guid" value="'.$ct_Teacher_Guid_rating.'">
                                                        </form>
                                                    </div>';
                            }// if
                        //}//delete

                    //}//another while

                        }//while


                } else {
                $nominate_shop = '';
                $menu_account = '<li id="type"><a href="#myLogin" class="btn btn-default2" data-toggle="modal" data-target="#myLogin">'.$menu_text7.'</a></li>';
                // $menu_account = '<a href="#" data-toggle="modal" data-target="#myLogin">
                //                         <span class="hidden-sm hidden-xs"></span><span class="hidden-sm hidden-xs">'.$menu_text8.'</span>
                //                     </a>';
                $menu_account_mobile = '<li id="name"><span></span><span></span></li>';
                $menu_log = '<li id="log"><a href="" data-toggle="modal" data-target="#myLogin" class="btn btn-default2">'.$menu_text8.'</a></li>';
                $side_user = '<h4> </h4>';
                }

                $sqlen_log_in = 'select * from digisurf_login where code ="'.$current_lang.'"';
                        $retvalen_log_in = mysql_query( $sqlen_log_in, $conn );
                             if(! $retvalen_log_in )
                             {
                                die('Could not get data: ' . mysql_error());
                             }
                        $rowen_log_in = mysql_fetch_array($retvalen_log_in, MYSQL_ASSOC);
                            $log_in_text1 = $rowen_log_in['text1'];
                            $log_in_text2 = $rowen_log_in['text2'];
                            $log_in_text3 = $rowen_log_in['text3'];
                            $log_in_text4 = $rowen_log_in['text4'];
                            $log_in_text5 = $rowen_log_in['text5'];
                            $log_in_text6 = $rowen_log_in['text6'];
                            $log_in_text7 = $rowen_log_in['text7'];
                            $log_in_text8 = $rowen_log_in['text8'];
                            $log_in_text9 = $rowen_log_in['text9'];

                



function currencyConverter($currency_from,$currency_to,$currency_input){
    $yql_base_url = "http://query.yahooapis.com/v1/public/yql";
    $yql_query = 'select * from yahoo.finance.xchange where pair in ("'.$currency_from.$currency_to.'")';
    $yql_query_url = $yql_base_url . "?q=" . urlencode($yql_query);
    $yql_query_url .= "&format=json&env=store%3A%2F%2Fdatatables.org%2Falltableswithkeys";
    $yql_session = file_get_contents($yql_query_url);
    $yql_json =  json_decode($yql_session,true);
    $currency_output = (float) $currency_input*$yql_json['query']['results']['rate']['Rate'];

    return $currency_output;
}





                        $sqlcasecategory = 'select * from digisurf_categories WHERE code="'.$current_lang.'" ORDER BY sortable_order ASC';
                        $retvalcasecategory = mysql_query( $sqlcasecategory, $conn );                 
                             if(! $retvalcasecategory )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

                        $casecategories = '';
                        
                        while($rowcasecategory = mysql_fetch_array($retvalcasecategory, MYSQL_ASSOC)){
                        $caseidx = $rowcasecategory['idx']; 
                        $casetext1 = $rowcasecategory['text1']; 
                        $casetext2 = $rowcasecategory['text2']; 
                        $caseimage1 = $rowcasecategory['image1']; 
                        //$casecategories .= '<option name="category_name" value="'.$idx.'" class="names">'.$text1.'</option>'; 

                        $casecategories .= '<a href="/event/Categories/'.$caseidx.'" class="lvn-grid1-6">
                                                <div class="lvn-cat">
                                                    <div class="lvn-cat-in">
                                                        <div class="lvn-cat-top">
                                                            <img src="'.$caseimage1.'"/>
                                                        </div>
                                                        <div class="lvn-cat-bottom">
                                                            <h4>'.$casetext1.'</h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>';
                           }

                        $sqlwhitepapercategory = 'select * from digisurf_white_categories WHERE code="'.$current_lang.'" ORDER BY sortable_order ASC';
                        $retvalwhitepapercategory = mysql_query( $sqlwhitepapercategory, $conn );                 
                             if(! $retvalwhitepapercategory )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

                        $whitepapercategories = '';
                        
                        while($rowwhitepapercategory = mysql_fetch_array($retvalwhitepapercategory, MYSQL_ASSOC)){
                        $whitepaperidx = $rowwhitepapercategory['idx']; 
                        $whitepapertext1 = $rowwhitepapercategory['text1']; 
                        $whitepapertext2 = $rowwhitepapercategory['text2']; 
                        $whitepaperimage1 = $rowwhitepapercategory['image1']; 
                        //$whitepapercategories .= '<option name="category_name" value="'.$idx.'" class="names">'.$text1.'</option>'; 

                        $whitepapercategories .= '<a href="/whitepaperStudy/Categories/'.$whitepaperidx.'" class="lvn-grid1-6">
                                                <div class="lvn-cat">
                                                    <div class="lvn-cat-in">
                                                        <div class="lvn-cat-top">
                                                            <img src="'.$whitepaperimage1.'"/>
                                                        </div>
                                                        <div class="lvn-cat-bottom">
                                                            <h4>'.$whitepapertext1.'</h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>';
                           }



                        $sqlmenu_latest_news = 'select * from  digisurf_blog where code ="'.$current_lang.'" order by idx desc limit 3';
                        $retvalmenu_latest_news = mysql_query( $sqlmenu_latest_news, $conn );                 
                             if(! $retvalmenuen )
                             {
                                die('Could not get data: ' . mysql_error());
                             }
                        $latest_news = '';
                        while($rowmenu_latest_news = mysql_fetch_array($retvalmenu_latest_news, MYSQL_ASSOC)){
                            $idx = $rowmenu_latest_news['idx'];
                            $text4 = $rowmenu_latest_news['text4'];
                            $text5 = $rowmenu_latest_news['text5'];
                            $text7 = $rowmenu_latest_news['text7'];
                            $image = $rowmenu_latest_news['image1']; 
                            $url = $rowmenu_latest_news['url'];

                            $latest_news .= '<a href="/News/Articles/'.$url.'" class="lvn-grid1-3">
                                                <div class="news-item">
                                                    <div class="news-item-date">
                                                        <p>'.$text7.'</p>
                                                    </div>
                                                    <div class="news-item-title">
                                                        <h4>'.$text4.'</h4>
                                                    </div>
                                                    <div class="news-item-desc">
                                                        <p>'.$text5.'</p>
                                                    </div>
                                                </div>
                                            </a>';
                        }

                        $mypromo = '';
                        //if (!isset($_SESSION['promo_text']) ) {

                        $sqlpromo = 'SELECT * FROM shop_digisurf_promo WHERE WEEKOFYEAR(promo_date) = WEEKOFYEAR(NOW()) ORDER BY idx DESC LIMIT 1';
                        $retvalpromo = mysql_query( $sqlpromo, $conn );                 
                             if(! $retvalpromo )
                             {
                                die('Could not get data: ' . mysql_error());
                             }
                        
                        $rowpromo = mysql_fetch_array($retvalpromo, MYSQL_ASSOC);
                        $promo_text = $rowpromo['promo_text'];

                        if($promo_text != null || $promo_text != ''){
                            $_SESSION['promo_text'] = $promo_text;

                            $mypromo = '<div class="notification bg3">
                                <div class="notification-message">
                                    <p>'.$_SESSION['promo_text'].'</p>
                                </div>

                                <a class="notification-close">
                                    <img src="/Assets/icons/LivenIcons-06.svg"/>
                                </a>
                            </div>';
                        } 
                        
                        if(isset($_SESSION['promo_dead'])){
                            $mypromo = '';
                        }
                        
                    //}

                        //MENU Solutions
                        $sqlen_menu_solutions = 'select * from digisurf_solution where code ="'.$current_lang.'" ORDER BY sortable_order ASC';
                        $retvalen_menu_solutions = mysql_query( $sqlen_menu_solutions, $conn );
                             if(! $retvalen_menu_solutions )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

                        $menu_solutions = '';
                        while($rowen_menu_solutions = mysql_fetch_array($retvalen_menu_solutions, MYSQL_ASSOC)) {
                                                    $menu_solutions_entext4 = $rowen_menu_solutions['text4'];        
                                                    $url = $rowen_menu_solutions['url'];

                                                 $menu_solutions .= '<li><a href="/Solutions/Solution/'.$url.'">'.$menu_solutions_entext4.'</a></li>';                   
                                                }
                        //$menu_solutions = $menu_solutions;



                         //MENU Products
                        $sqlen_menu_products = 'select * from digisurf_product where code ="'.$current_lang.'" ORDER BY sortable_order ASC';
                        $retvalen_menu_products = mysql_query( $sqlen_menu_products, $conn );
                             if(! $retvalen_menu_products )
                             {
                                die('Could not get data: ' . mysql_error());
                             }


                        //MENU Product Categories FIRST
                        $sqlzh_menu_product_list_first = 'select * from think_tag ORDER BY sortable_order ASC LIMIT 1';
                        $retvalzh_menu_product_list_first = mysql_query( $sqlzh_menu_product_list_first, $conn );
                             if(! $retvalzh_menu_product_list_first )
                             {
                                die('Could not get data: ' . mysql_error());
                             }
                        

                        $sqlen_menu_product_list_first = 'select * from think_tag ORDER BY sortable_order ASC LIMIT 1';
                        $retvalen_menu_product_list_first = mysql_query( $sqlen_menu_product_list_first, $conn );
                             if(! $retvalen_menu_product_list_first )
                             {
                                die('Could not get data: ' . mysql_error());
                             }



                        //MENU Product Categories    
                        $sqlzh_menu_product_list = 'select * from think_tag ORDER BY sortable_order ASC LIMIT 500 OFFSET 1';
                        $retvalzh_menu_product_list = mysql_query( $sqlzh_menu_product_list, $conn );
                             if(! $retvalzh_menu_product_list )
                             {
                                die('Could not get data: ' . mysql_error());
                             }
                        

                        $sqlen_menu_product_list = 'select * from think_tag ORDER BY sortable_order ASC LIMIT 500 OFFSET 1';
                        $retvalen_menu_product_list = mysql_query( $sqlen_menu_product_list, $conn );
                             if(! $retvalen_menu_product_list )
                             {
                                die('Could not get data: ' . mysql_error());
                             }



                        //MENU Product Categories MOBILE
                        $sqlzh_menu_product_list_mobile = 'select * from think_tag ORDER BY sortable_order ASC';
                        $retvalzh_menu_product_list_mobile = mysql_query( $sqlzh_menu_product_list_mobile, $conn );
                             if(! $retvalzh_menu_product_list_mobile )
                             {
                                die('Could not get data: ' . mysql_error());
                             }
                        

                        $sqlen_menu_product_list_mobile = 'select * from think_tag ORDER BY sortable_order ASC';
                        $retvalen_menu_product_list_mobile = mysql_query( $sqlen_menu_product_list_mobile, $conn );
                             if(! $retvalen_menu_product_list_mobile )
                             {
                                die('Could not get data: ' . mysql_error());
                             }



                        $menu_products = '';
                        while($rowen_menu_products = mysql_fetch_array($retvalen_menu_products, MYSQL_ASSOC)) {
                                                    $menu_products_entext4 = $rowen_menu_products['text4'];        
                                                    $url = $rowen_menu_products['url'];

                                                 $menu_products .= '<li><a href="/Products/Product/'.$url.'">'.$menu_products_entext4.'</a></li>';                   
                                                }
                        $menu_products = $menu_products;

                        $menu_product_list = '';
                        $menu_product_list_item1 = '';
                        $menu_product_list_item2 = '';
                        $menu_product_list_item3 = '';
                        $menu_product_list_item4 = '';
                        $menu_product_list_item5 = '';
                        $menu_product_list_item6 = '';
                        $menu_product_list_item7 = '';
                        $menu_product_list_item8 = '';
                        $menu_product_list_item9 = '';
                        $menu_product_list_item10 = '';
                        $text1_id = '';
                        $text2_id = '';
                        $text3_id = '';
                        $text4_id = '';
                        $text5_id = '';
                        $text6_id = '';
                        $text7_id = '';
                        $text8_id = '';
                        $text9_id = '';
                        $text10_id = '';
                        $menu_product_list_mobile = '';
                        $menu_product_list_item1_mobile = '';
                        $menu_product_list_item2_mobile = '';
                        $menu_product_list_item3_mobile = '';
                        $menu_product_list_item4_mobile = '';
                        $menu_product_list_item5_mobile = '';
                        $menu_product_list_item6_mobile = '';
                        $menu_product_list_item7_mobile = '';
                        $menu_product_list_item8_mobile = '';
                        $menu_product_list_item9_mobile = '';
                        $menu_product_list_item10_mobile = '';

                        $rowen_menu_product_list_first = mysql_fetch_array($retvalen_menu_product_list_first, MYSQL_ASSOC);
                            $category_idx_first = $rowen_menu_product_list_first['idx'];
                            $menu_product_list_entext1_first = $rowen_menu_product_list_first['text1'];
                            $test_id = $menu_product_list_entext1_first;
                            $menu_product_list .= '<li role="presentation" class="active"><a href="#'.$category_idx_first.'" aria-controls="profile" role="tab" data-toggle="tab">'.$menu_product_list_entext1_first.'</a></li>';

                        while($rowen_menu_product_list = mysql_fetch_array($retvalen_menu_product_list, MYSQL_ASSOC)) {
                                                    $category_idx = $rowen_menu_product_list['idx'];
                                                    $menu_product_list_entext1 = $rowen_menu_product_list['text1'];      
                                                
                                                //$menu_product_list .= '<li><a href="/Products/Product/'.$url.'">'.$menu_product_list_entext4.'</a></li>';    
                                                 $menu_product_list .= '<li role="presentation" class="bunch"><a href="#'.$category_idx.'" aria-controls="profile" role="tab" data-toggle="tab">'.$menu_product_list_entext1.'</a></li>';

                                                

                                                 $menu_product_list_mobile .= '<div class="panel panel-default"> 
                                                                                    <div class="panel-heading" role="tab" id="heading'.$category_idx.'">
                                                                                      <h4 class="panel-title">
                                                                                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse'.$category_idx.'" aria-expanded="false" aria-controls="collapseOne">
                                                                                          '.$menu_product_list_entext1.'
                                                                                        </a>
                                                                                      </h4>
                                                                                    </div>

                                                                                    <div id="collapse1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading1">
                                                                                          <div class="panel-body">
                                                                                          '.$menu_product_list_item1_mobile .'
                                                                                          </div>
                                                                                    </div>

                                                                                    <div id="collapse2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading2">
                                                                                          <div class="panel-body">
                                                                                          '.$menu_product_list_item2_mobile.'
                                                                                          </div>
                                                                                    </div>
                                                                                </div>';




                                            
                                            if($category_idx == '1'){                       

                                                $sqlen_menu_product_list_id = 'select text1 from think_tag where idx = "'.$category_idx.'" ';
                                                $retvalen_menu_product_list_id = mysql_query( $sqlen_menu_product_list_id, $conn );
                                                     if(! $retvalen_menu_product_list_id )
                                                     {
                                                        die('Could not get data: ' . mysql_error());
                                                     }
                                                $rowen_menu_product_list_id = mysql_fetch_array($retvalen_menu_product_list_id, MYSQL_ASSOC);
                                                $text1_id = $rowen_menu_product_list_id['text1'];                        
                                            }

                                            if($category_idx == '2'){                       

                                                $sqlen_menu_product_list_id = 'select text1 from think_tag where idx = "'.$category_idx.'" ';
                                                $retvalen_menu_product_list_id = mysql_query( $sqlen_menu_product_list_id, $conn );
                                                     if(! $retvalen_menu_product_list_id )
                                                     {
                                                        die('Could not get data: ' . mysql_error());
                                                     }
                                                $rowen_menu_product_list_id = mysql_fetch_array($retvalen_menu_product_list_id, MYSQL_ASSOC);
                                                $text2_id = $rowen_menu_product_list_id['text1'];
                                            }

                                             if($category_idx == '3'){                       

                                                $sqlen_menu_product_list_id = 'select text1 from think_tag where idx = "'.$category_idx.'" ';
                                                $retvalen_menu_product_list_id = mysql_query( $sqlen_menu_product_list_id, $conn );
                                                     if(! $retvalen_menu_product_list_id )
                                                     {
                                                        die('Could not get data: ' . mysql_error());
                                                     }
                                                $rowen_menu_product_list_id = mysql_fetch_array($retvalen_menu_product_list_id, MYSQL_ASSOC);
                                                $text3_id = $rowen_menu_product_list_id['text1'];
                                            }

                                             if($category_idx == '4'){                       

                                                $sqlen_menu_product_list_id = 'select text1 from think_tag where idx = "'.$category_idx.'" ';
                                                $retvalen_menu_product_list_id = mysql_query( $sqlen_menu_product_list_id, $conn );
                                                     if(! $retvalen_menu_product_list_id )
                                                     {
                                                        die('Could not get data: ' . mysql_error());
                                                     }
                                                $rowen_menu_product_list_id = mysql_fetch_array($retvalen_menu_product_list_id, MYSQL_ASSOC);
                                                $text4_id = $rowen_menu_product_list_id['text1'];
                                            }

                                             if($category_idx == '5'){                       

                                                $sqlen_menu_product_list_id = 'select text1 from think_tag where idx = "'.$category_idx.'" ';
                                                $retvalen_menu_product_list_id = mysql_query( $sqlen_menu_product_list_id, $conn );
                                                     if(! $retvalen_menu_product_list_id )
                                                     {
                                                        die('Could not get data: ' . mysql_error());
                                                     }
                                                $rowen_menu_product_list_id = mysql_fetch_array($retvalen_menu_product_list_id, MYSQL_ASSOC);
                                                $text5_id = $rowen_menu_product_list_id['text1'];
                                            }

                                             if($category_idx == '6'){                       

                                                $sqlen_menu_product_list_id = 'select text1 from think_tag where idx = "'.$category_idx.'" ';
                                                $retvalen_menu_product_list_id = mysql_query( $sqlen_menu_product_list_id, $conn );
                                                     if(! $retvalen_menu_product_list_id )
                                                     {
                                                        die('Could not get data: ' . mysql_error());
                                                     }
                                                $rowen_menu_product_list_id = mysql_fetch_array($retvalen_menu_product_list_id, MYSQL_ASSOC);
                                                $text6_id = $rowen_menu_product_list_id['text1'];
                                            }

                                             if($category_idx == '7'){                       

                                                $sqlen_menu_product_list_id = 'select text1 from think_tag where idx = "'.$category_idx.'" ';
                                                $retvalen_menu_product_list_id = mysql_query( $sqlen_menu_product_list_id, $conn );
                                                     if(! $retvalen_menu_product_list_id )
                                                     {
                                                        die('Could not get data: ' . mysql_error());
                                                     }
                                                $rowen_menu_product_list_id = mysql_fetch_array($retvalen_menu_product_list_id, MYSQL_ASSOC);
                                                $text7_id = $rowen_menu_product_list_id['text1'];
                                            }

                                             if($category_idx == '8'){                       

                                                $sqlen_menu_product_list_id = 'select text1 from think_tag where idx = "'.$category_idx.'" ';
                                                $retvalen_menu_product_list_id = mysql_query( $sqlen_menu_product_list_id, $conn );
                                                     if(! $retvalen_menu_product_list_id )
                                                     {
                                                        die('Could not get data: ' . mysql_error());
                                                     }
                                                $rowen_menu_product_list_id = mysql_fetch_array($retvalen_menu_product_list_id, MYSQL_ASSOC);
                                                $text8_id = $rowen_menu_product_list_id['text1'];
                                            }

                                             if($category_idx == '9'){                       

                                                $sqlen_menu_product_list_id = 'select text1 from think_tag where idx = "'.$category_idx.'" ';
                                                $retvalen_menu_product_list_id = mysql_query( $sqlen_menu_product_list_id, $conn );
                                                     if(! $retvalen_menu_product_list_id )
                                                     {
                                                        die('Could not get data: ' . mysql_error());
                                                     }
                                                $rowen_menu_product_list_id = mysql_fetch_array($retvalen_menu_product_list_id, MYSQL_ASSOC);
                                                $text9_id = $rowen_menu_product_list_id['text1'];
                                            }

                                             if($category_idx == '10'){                       

                                                $sqlen_menu_product_list_id = 'select text1 from think_tag where idx = "'.$category_idx.'" ';
                                                $retvalen_menu_product_list_id = mysql_query( $sqlen_menu_product_list_id, $conn );
                                                     if(! $retvalen_menu_product_list_id )
                                                     {
                                                        die('Could not get data: ' . mysql_error());
                                                     }
                                                $rowen_menu_product_list_id = mysql_fetch_array($retvalen_menu_product_list_id, MYSQL_ASSOC);
                                                $text10_id = $rowen_menu_product_list_id['text1'];
                                            }
                                                //$sqlen_menu_product_list_item = 'select * from digisurf_product where category1 = "'.$text1_id.'" AND category2 = "'.$text1_id.'" AND category3 = "'.$text1_id.'" AND category4 = "'.$text1_id.'" AND category5 = "'.$text1_id.'" AND category6 = "'.$text1_id.'" AND category7 = "'.$text1_id.'" AND category8 = "'.$text1_id.'" AND category9 = "'.$text1_id.'" AND category10 = "'.$text1_id.'" ';
                                                
                                    }



                                                $sqlen_menu_product_list_item1 = 'select * from digisurf_product where category1 = "'.$test_id.'" OR category2 = "'.$test_id.'" OR category3 = "'.$test_id.'" OR category4 = "'.$test_id.'" OR category5 = "'.$test_id.'" OR category6 = "'.$test_id.'" OR category7 = "'.$test_id.'" OR category8 = "'.$test_id.'" OR category9 = "'.$test_id.'" OR category10 = "'.$test_id.'" ';
                                                $retvalen_menu_product_list_item1 = mysql_query( $sqlen_menu_product_list_item1, $conn );
                                                     if(! $retvalen_menu_product_list_item1 )
                                                     {
                                                        die('Could not get data: ' . mysql_error());
                                                     }
                                                while($rowen_menu_product_list_item1 = mysql_fetch_array($retvalen_menu_product_list_item1, MYSQL_ASSOC)) {
                                                    $text4 = $rowen_menu_product_list_item1['text4'];
                                                    $image1 = $rowen_menu_product_list_item1['image1'];
                                                    $url = $rowen_menu_product_list_item1['url'];
                                                    $category1 = $rowen_menu_product_list_item1['category1'];
                                                                                
                                                        $menu_product_list_item1 .= '<div class="nav-product">
                                                                                            <a href="/Products/Product/'.$url.'">
                                                                                                <div class="nav-product-image">
                                                                                                    <img src="'.$image1.'"/>
                                                                                                </div>
                                                                                                <div class="nav-product-title">
                                                                                                    '.$text4.'
                                                                                                </div>
                                                                                            </a>
                                                                                        </div>';   


                                                        $menu_product_list_item1_mobile .= '<div class="nav-product">
                                                                                                <a href="/Products/Product/'.$url.'">
                                                                                                    <div class="nav-product-image">
                                                                                                        <img src="'.$image1.'"/>
                                                                                                    </div>
                                                                                                    <div class="nav-product-title">
                                                                                                        '.$text4.'
                                                                                                    </div>
                                                                                                </a>
                                                                                            </div>';                               
                                                }

                                                /*$sqlen_menu_product_list_item1 = 'select * from digisurf_product where category1 = "'.$text1_id.'" OR category2 = "'.$text1_id.'" OR category3 = "'.$text1_id.'" OR category4 = "'.$text1_id.'" OR category5 = "'.$text1_id.'" OR category6 = "'.$text1_id.'" OR category7 = "'.$text1_id.'" OR category8 = "'.$text1_id.'" OR category9 = "'.$text1_id.'" OR category10 = "'.$text1_id.'" ';
                                                $retvalen_menu_product_list_item1 = mysql_query( $sqlen_menu_product_list_item1, $conn );
                                                     if(! $retvalen_menu_product_list_item1 )
                                                     {
                                                        die('Could not get data: ' . mysql_error());
                                                     }
                                                while($rowen_menu_product_list_item1 = mysql_fetch_array($retvalen_menu_product_list_item1, MYSQL_ASSOC)) {
                                                    $text4 = $rowen_menu_product_list_item1['text4'];
                                                    $image1 = $rowen_menu_product_list_item1['image1'];
                                                    $url = $rowen_menu_product_list_item1['url'];
                                                    $category1 = $rowen_menu_product_list_item1['category1'];
                                                                                
                                                        $menu_product_list_item1 .= '<div class="nav-product">
                                                                                            <a href="/Products/Product/'.$url.'">
                                                                                                <div class="nav-product-image">
                                                                                                    <img src="'.$image1.'"/>
                                                                                                </div>
                                                                                                <div class="nav-product-title">
                                                                                                    '.$text4.'
                                                                                                </div>
                                                                                            </a>
                                                                                        </div>';   


                                                        $menu_product_list_item1_mobile .= '<div class="nav-product">
                                                                                                <a href="/Products/Product/'.$url.'">
                                                                                                    <div class="nav-product-image">
                                                                                                        <img src="'.$image1.'"/>
                                                                                                    </div>
                                                                                                    <div class="nav-product-title">
                                                                                                        '.$text4.'
                                                                                                    </div>
                                                                                                </a>
                                                                                            </div>';              
                                                }*/

                                                $sqlen_menu_product_list_item2 = 'select * from digisurf_product where category1 = "'.$text2_id.'" OR category2 = "'.$text2_id.'" OR category3 = "'.$text2_id.'" OR category4 = "'.$text2_id.'" OR category5 = "'.$text2_id.'" OR category6 = "'.$text2_id.'" OR category7 = "'.$text2_id.'" OR category8 = "'.$text2_id.'" OR category9 = "'.$text2_id.'" OR category10 = "'.$text2_id.'" ';
                                                $retvalen_menu_product_list_item2 = mysql_query( $sqlen_menu_product_list_item2, $conn );
                                                     if(! $retvalen_menu_product_list_item2 )
                                                     {
                                                        die('Could not get data: ' . mysql_error());
                                                     }
                                                while($rowen_menu_product_list_item2 = mysql_fetch_array($retvalen_menu_product_list_item2, MYSQL_ASSOC)) {
                                                    $text4 = $rowen_menu_product_list_item2['text4'];
                                                    $image1 = $rowen_menu_product_list_item2['image1'];
                                                    $url = $rowen_menu_product_list_item2['url'];
                                                    $category2 = $rowen_menu_product_list_item2['category2'];
                                                                                
                                                        $menu_product_list_item2 .= '<div class="nav-product">
                                                                                            <a href="/Products/Product/'.$url.'">
                                                                                                <div class="nav-product-image">
                                                                                                    <img src="'.$image1.'"/>
                                                                                                </div>
                                                                                                <div class="nav-product-title">
                                                                                                    '.$text4.'
                                                                                                </div>
                                                                                            </a>
                                                                                        </div>';                            
                                                }

                                                $sqlen_menu_product_list_item3 = 'select * from digisurf_product where category1 = "'.$text3_id.'" OR category2 = "'.$text3_id.'" OR category3 = "'.$text3_id.'" OR category4 = "'.$text3_id.'" OR category5 = "'.$text3_id.'" OR category6 = "'.$text3_id.'" OR category7 = "'.$text3_id.'" OR category8 = "'.$text3_id.'" OR category9 = "'.$text3_id.'" OR category10 = "'.$text3_id.'" ';
                                                $retvalen_menu_product_list_item3 = mysql_query( $sqlen_menu_product_list_item3, $conn );
                                                     if(! $retvalen_menu_product_list_item3 )
                                                     {
                                                        die('Could not get data: ' . mysql_error());
                                                     }
                                                while($rowen_menu_product_list_item3 = mysql_fetch_array($retvalen_menu_product_list_item3, MYSQL_ASSOC)) {
                                                    $text4 = $rowen_menu_product_list_item3['text4'];
                                                    $image1 = $rowen_menu_product_list_item3['image1'];
                                                    $url = $rowen_menu_product_list_item3['url'];
                                                    $category3 = $rowen_menu_product_list_item3['category3'];
                                                                                
                                                        $menu_product_list_item3 .= '<div class="nav-product">
                                                                                            <a href="/Products/Product/'.$url.'">
                                                                                                <div class="nav-product-image">
                                                                                                    <img src="'.$image1.'"/>
                                                                                                </div>
                                                                                                <div class="nav-product-title">
                                                                                                    '.$text4.'
                                                                                                </div>
                                                                                            </a>
                                                                                        </div>';                            
                                                }


                                                $sqlen_menu_product_list_item4 = 'select * from digisurf_product where category1 = "'.$text4_id.'" OR category2 = "'.$text4_id.'" OR category3 = "'.$text4_id.'" OR category4 = "'.$text4_id.'" OR category5 = "'.$text4_id.'" OR category6 = "'.$text4_id.'" OR category7 = "'.$text4_id.'" OR category8 = "'.$text4_id.'" OR category9 = "'.$text4_id.'" OR category10 = "'.$text4_id.'" ';
                                                $retvalen_menu_product_list_item4 = mysql_query( $sqlen_menu_product_list_item4, $conn );
                                                     if(! $retvalen_menu_product_list_item4 )
                                                     {
                                                        die('Could not get data: ' . mysql_error());
                                                     }
                                                while($rowen_menu_product_list_item4 = mysql_fetch_array($retvalen_menu_product_list_item4, MYSQL_ASSOC)) {
                                                    $text4 = $rowen_menu_product_list_item4['text4'];
                                                    $image1 = $rowen_menu_product_list_item4['image1'];
                                                    $url = $rowen_menu_product_list_item4['url'];
                                                    $category4 = $rowen_menu_product_list_item4['category4'];
                                                                                
                                                        $menu_product_list_item4 .= '<div class="nav-product">
                                                                                            <a href="/Products/Product/'.$url.'">
                                                                                                <div class="nav-product-image">
                                                                                                    <img src="'.$image1.'"/>
                                                                                                </div>
                                                                                                <div class="nav-product-title">
                                                                                                    '.$text4.'
                                                                                                </div>
                                                                                            </a>
                                                                                        </div>';                            
                                                }



                                                $sqlen_menu_product_list_item5 = 'select * from digisurf_product where category1 = "'.$text5_id.'" OR category2 = "'.$text5_id.'" OR category3 = "'.$text5_id.'" OR category4 = "'.$text5_id.'" OR category5 = "'.$text5_id.'" OR category6 = "'.$text5_id.'" OR category7 = "'.$text5_id.'" OR category8 = "'.$text5_id.'" OR category9 = "'.$text5_id.'" OR category10 = "'.$text5_id.'" ';
                                                $retvalen_menu_product_list_item5 = mysql_query( $sqlen_menu_product_list_item5, $conn );
                                                     if(! $retvalen_menu_product_list_item5 )
                                                     {
                                                        die('Could not get data: ' . mysql_error());
                                                     }
                                                while($rowen_menu_product_list_item5 = mysql_fetch_array($retvalen_menu_product_list_item5, MYSQL_ASSOC)) {
                                                    $text4 = $rowen_menu_product_list_item5['text4'];
                                                    $image1 = $rowen_menu_product_list_item5['image1'];
                                                    $url = $rowen_menu_product_list_item5['url'];
                                                    $category5 = $rowen_menu_product_list_item5['category5'];
                                                                                
                                                        $menu_product_list_item5 .= '<div class="nav-product">
                                                                                            <a href="/Products/Product/'.$url.'">
                                                                                                <div class="nav-product-image">
                                                                                                    <img src="'.$image1.'"/>
                                                                                                </div>
                                                                                                <div class="nav-product-title">
                                                                                                    '.$text4.'
                                                                                                </div>
                                                                                            </a>
                                                                                        </div>';                            
                                                }





                                                $sqlen_menu_product_list_item6 = 'select * from digisurf_product where category1 = "'.$text6_id.'" OR category2 = "'.$text6_id.'" OR category3 = "'.$text6_id.'" OR category4 = "'.$text6_id.'" OR category5 = "'.$text6_id.'" OR category6 = "'.$text6_id.'" OR category7 = "'.$text6_id.'" OR category8 = "'.$text6_id.'" OR category9 = "'.$text6_id.'" OR category10 = "'.$text6_id.'" ';
                                                $retvalen_menu_product_list_item6 = mysql_query( $sqlen_menu_product_list_item6, $conn );
                                                     if(! $retvalen_menu_product_list_item6 )
                                                     {
                                                        die('Could not get data: ' . mysql_error());
                                                     }
                                                while($rowen_menu_product_list_item6 = mysql_fetch_array($retvalen_menu_product_list_item6, MYSQL_ASSOC)) {
                                                    $text4 = $rowen_menu_product_list_item6['text4'];
                                                    $image1 = $rowen_menu_product_list_item6['image1'];
                                                    $url = $rowen_menu_product_list_item6['url'];
                                                    $category6 = $rowen_menu_product_list_item6['category6'];
                                                                                
                                                        $menu_product_list_item6 .= '<div class="nav-product">
                                                                                            <a href="/Products/Product/'.$url.'">
                                                                                                <div class="nav-product-image">
                                                                                                    <img src="'.$image1.'"/>
                                                                                                </div>
                                                                                                <div class="nav-product-title">
                                                                                                    '.$text4.'
                                                                                                </div>
                                                                                            </a>
                                                                                        </div>';                            
                                                }




                                                $sqlen_menu_product_list_item7 = 'select * from digisurf_product where category1 = "'.$text7_id.'" OR category2 = "'.$text7_id.'" OR category3 = "'.$text7_id.'" OR category4 = "'.$text7_id.'" OR category5 = "'.$text7_id.'" OR category6 = "'.$text7_id.'" OR category7 = "'.$text7_id.'" OR category8 = "'.$text7_id.'" OR category9 = "'.$text7_id.'" OR category10 = "'.$text7_id.'" ';
                                                $retvalen_menu_product_list_item7 = mysql_query( $sqlen_menu_product_list_item7, $conn );
                                                     if(! $retvalen_menu_product_list_item7 )
                                                     {
                                                        die('Could not get data: ' . mysql_error());
                                                     }
                                                while($rowen_menu_product_list_item7 = mysql_fetch_array($retvalen_menu_product_list_item7, MYSQL_ASSOC)) {
                                                    $text4 = $rowen_menu_product_list_item7['text4'];
                                                    $image1 = $rowen_menu_product_list_item7['image1'];
                                                    $url = $rowen_menu_product_list_item7['url'];
                                                    $category7 = $rowen_menu_product_list_item7['category7'];
                                                                                
                                                        $menu_product_list_item7 .= '<div class="nav-product">
                                                                                            <a href="/Products/Product/'.$url.'">
                                                                                                <div class="nav-product-image">
                                                                                                    <img src="'.$image1.'"/>
                                                                                                </div>
                                                                                                <div class="nav-product-title">
                                                                                                    '.$text4.'
                                                                                                </div>
                                                                                            </a>
                                                                                        </div>';                            
                                                }




                                                $sqlen_menu_product_list_item8 = 'select * from digisurf_product where category1 = "'.$text8_id.'" OR category2 = "'.$text8_id.'" OR category3 = "'.$text8_id.'" OR category4 = "'.$text8_id.'" OR category5 = "'.$text8_id.'" OR category6 = "'.$text8_id.'" OR category7 = "'.$text8_id.'" OR category8 = "'.$text8_id.'" OR category9 = "'.$text8_id.'" OR category10 = "'.$text8_id.'" ';
                                                $retvalen_menu_product_list_item8 = mysql_query( $sqlen_menu_product_list_item8, $conn );
                                                     if(! $retvalen_menu_product_list_item8 )
                                                     {
                                                        die('Could not get data: ' . mysql_error());
                                                     }
                                                while($rowen_menu_product_list_item8 = mysql_fetch_array($retvalen_menu_product_list_item8, MYSQL_ASSOC)) {
                                                    $text4 = $rowen_menu_product_list_item8['text4'];
                                                    $image1 = $rowen_menu_product_list_item8['image1'];
                                                    $url = $rowen_menu_product_list_item8['url'];
                                                    $category8 = $rowen_menu_product_list_item8['category8'];
                                                                                
                                                        $menu_product_list_item8 .= '<div class="nav-product">
                                                                                            <a href="/Products/Product/'.$url.'">
                                                                                                <div class="nav-product-image">
                                                                                                    <img src="'.$image1.'"/>
                                                                                                </div>
                                                                                                <div class="nav-product-title">
                                                                                                    '.$text4.'
                                                                                                </div>
                                                                                            </a>
                                                                                        </div>';                            
                                                }




                                                $sqlen_menu_product_list_item9 = 'select * from digisurf_product where category1 = "'.$text9_id.'" OR category2 = "'.$text9_id.'" OR category3 = "'.$text9_id.'" OR category4 = "'.$text9_id.'" OR category5 = "'.$text9_id.'" OR category6 = "'.$text9_id.'" OR category7 = "'.$text9_id.'" OR category8 = "'.$text9_id.'" OR category9 = "'.$text9_id.'" OR category10 = "'.$text9_id.'" ';
                                                $retvalen_menu_product_list_item9 = mysql_query( $sqlen_menu_product_list_item9, $conn );
                                                     if(! $retvalen_menu_product_list_item9 )
                                                     {
                                                        die('Could not get data: ' . mysql_error());
                                                     }
                                                while($rowen_menu_product_list_item9 = mysql_fetch_array($retvalen_menu_product_list_item9, MYSQL_ASSOC)) {
                                                    $text4 = $rowen_menu_product_list_item9['text4'];
                                                    $image1 = $rowen_menu_product_list_item9['image1'];
                                                    $url = $rowen_menu_product_list_item9['url'];
                                                    $category9 = $rowen_menu_product_list_item9['category9'];
                                                                                
                                                        $menu_product_list_item9 .= '<div class="nav-product">
                                                                                            <a href="/Products/Product/'.$url.'">
                                                                                                <div class="nav-product-image">
                                                                                                    <img src="'.$image1.'"/>
                                                                                                </div>
                                                                                                <div class="nav-product-title">
                                                                                                    '.$text4.'
                                                                                                </div>
                                                                                            </a>
                                                                                        </div>';                            
                                                }




                                                $sqlen_menu_product_list_item10 = 'select * from digisurf_product where category1 = "'.$text10_id.'" OR category2 = "'.$text10_id.'" OR category3 = "'.$text10_id.'" OR category4 = "'.$text10_id.'" OR category5 = "'.$text10_id.'" OR category6 = "'.$text10_id.'" OR category7 = "'.$text10_id.'" OR category8 = "'.$text10_id.'" OR category9 = "'.$text10_id.'" OR category10 = "'.$text10_id.'" ';
                                                $retvalen_menu_product_list_item10 = mysql_query( $sqlen_menu_product_list_item10, $conn );
                                                     if(! $retvalen_menu_product_list_item10 )
                                                     {
                                                        die('Could not get data: ' . mysql_error());
                                                     }
                                                while($rowen_menu_product_list_item10 = mysql_fetch_array($retvalen_menu_product_list_item10, MYSQL_ASSOC)) {
                                                    $text4 = $rowen_menu_product_list_item10['text4'];
                                                    $image1 = $rowen_menu_product_list_item10['image1'];
                                                    $url = $rowen_menu_product_list_item10['url'];
                                                    $category10 = $rowen_menu_product_list_item10['category10'];
                                                                                
                                                        $menu_product_list_item10 .= '<div class="nav-product">
                                                                                            <a href="/Products/Product/'.$url.'">
                                                                                                <div class="nav-product-image">
                                                                                                    <img src="'.$image1.'"/>
                                                                                                </div>
                                                                                                <div class="nav-product-title">
                                                                                                    '.$text4.'
                                                                                                </div>
                                                                                            </a>
                                                                                        </div>';                            
                                                }




                        $menu_product_list = $menu_product_list;
                        $menu_product_list_item1 = $menu_product_list_item1;
                        $menu_product_list_item2 = $menu_product_list_item2;
                        $menu_product_list_item3 = $menu_product_list_item3;
                        $menu_product_list_item4 = $menu_product_list_item4;
                        $menu_product_list_item5 = $menu_product_list_item5;
                        $menu_product_list_item6 = $menu_product_list_item6;
                        $menu_product_list_item7 = $menu_product_list_item7;
                        $menu_product_list_item8 = $menu_product_list_item8;
                        $menu_product_list_item9 = $menu_product_list_item9;
                        $menu_product_list_item10 = $menu_product_list_item10;
                        $menu_product_list_mobile = $menu_product_list_mobile;
                        $menu_product_list_item1_mobile = $menu_product_list_item1_mobile;
                        $menu_product_list_item2_mobile = $menu_product_list_item2_mobile;
                        $menu_product_list_item3_mobile = $menu_product_list_item3_mobile;
                        $menu_product_list_item4_mobile = $menu_product_list_item4_mobile;
                        $menu_product_list_item5_mobile = $menu_product_list_item5_mobile;
                        $menu_product_list_item6_mobile = $menu_product_list_item6_mobile;
                        $menu_product_list_item7_mobile = $menu_product_list_item7_mobile;
                        $menu_product_list_item8_mobile = $menu_product_list_item8_mobile;
                        $menu_product_list_item9_mobile = $menu_product_list_item9_mobile;
                        $menu_product_list_item10_mobile = $menu_product_list_item10_mobile;















   
   //print_r(crypt("12345"));
                        /*
   if(isset($_POST['login_submit'])){


    if(!empty($_POST['username']) && !empty($_POST['password']) ){

      $myusername=mysql_real_escape_string($_POST['username'],$conn);
      $mypassword=mysql_real_escape_string($_POST['password'],$conn);

      //$hash_sql="SELECT password FROM cormember  WHERE ct_Email='$myusername' or ct_Phone='$myusername' ";
      $hash_sql="SELECT ct_WebPassword FROM cormember  WHERE ct_Mobile='$myusername' ";     
      $hash_result=mysql_query($hash_sql, $conn);
      
      $hashed_row = mysql_fetch_array($hash_result, MYSQL_ASSOC);
      //$hashed_password = $hashed_row['password'];
      $pw = $hashed_row['ct_WebPassword'];

      //if(crypt($mypassword, $hashed_password) === $hashed_password) { 
    if($pw === $mypassword) {
      
      //$sql="SELECT * FROM cormember WHERE ct_Email='$myusername' or ct_Phone='$myusername' and password='$hashed_password'"; 
      $sql="SELECT * FROM cormember WHERE ct_Mobile='$myusername' and ct_WebPassword='$pw'";      
      $result=mysql_query($sql, $conn);
      
      $count=mysql_num_rows($result);

      if(! $result )
          {
            die('Could not confirm user: ' . mysql_error());
          }
      $row_customer = mysql_fetch_array($result, MYSQL_ASSOC);
       $customer_phone = $row_customer['ct_Mobile'];
       $customer_name = $row_customer['ct_Name'];
        
      if($count==1) {
        $_SESSION['login_visitor']=$customer_phone;
        $_SESSION['login_name']=$customer_name;  

         
           header("location: /Booking");
         }

   } else{
      $error = 'Wrong Phone Number Or PassWord'; ?>
        <script type="text/javascript">
            $('#myLoginError').modal('show'); 
        </script>  
<?php   } 


 } else {
  $error = 'input error';  
 }

 }
 */




?>

<?php
if(!empty($class_rating) || $class_rating != ''){

$rating_script = "<script type=\"text/javascript\">
                   $('#myReview').modal('show'); 
                </script>";
}
?>