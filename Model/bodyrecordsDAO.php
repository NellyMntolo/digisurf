<?php
include '../lang/lang.php';
mysql_set_charset("utf8");

include 'menuDAO.php';
include 'footerDAO.php';
$current_lang = $_SESSION['lang'];

$body_records = '';

date_default_timezone_set("Asia/Taipei");
$thedd = date('Y-m-d H:i:s',strtotime('now'));

$menu_account = '';
//
$body_records_info = '';
$body_history_script_data = '';
$body_history = '';

$body_history_script_weight = '';
$body_history_script_body_mass_index = '';
$body_percent_body_fat = '';
$body_history_script_data_fat = '';
$body_history_script_data_Skeletal = '';
$body_history_script_total_body_water = '';
$body_history_script_basal_metabolic_rate = '';
$body_history_script_visceral_fat_level = '';
$body_history_script_inbody_score = '';

$body_history_script = '';

//echo $chart_data = substr($chart_data, 0, -2);

$redirect = '';

if(!isset($_SESSION['login_visitor'])){
    //header("Location: /Booking"); 
      //exit;
    $redirect = '<script>window.location.href = "/Booking";</script>';
} else{
$current_user = $_SESSION['login_visitor'];

                        $sql_bodyrecords = 'select * from digisurf_bodyrecords where code="'.$current_lang.'" ';
                        $retval_bodyrecords = mysql_query( $sql_bodyrecords, $conn );                 
                             if(! $retval_bodyrecords )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

                            $row_bodyrecords = mysql_fetch_array($retval_bodyrecords, MYSQL_ASSOC);                            
                            $bodyrecords_text1 = $row_bodyrecords['text1'];
                            $bodyrecords_text2 = $row_bodyrecords['text2'];
                            $bodyrecords_text3 = $row_bodyrecords['text3'];
                            $bodyrecords_text4 = $row_bodyrecords['text4'];
                            $bodyrecords_text5 = $row_bodyrecords['text5'];
                            $bodyrecords_text6 = $row_bodyrecords['text6'];
                            $bodyrecords_text7 = $row_bodyrecords['text7'];
                            $bodyrecords_text8 = $row_bodyrecords['text8'];
                            $bodyrecords_text9 = $row_bodyrecords['text9'];
                            $bodyrecords_text10 = $row_bodyrecords['text10'];


                    //CONTENT
                        $sql_cormember = 'select * from cormember where ct_Mobile="'.$current_user.'" or ct_Phone="'.$current_user.'" ';
                        $retval_cormember = mysql_query( $sql_cormember, $conn );                 
                             if(! $retval_cormember )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

                            $row_cormember = mysql_fetch_array($retval_cormember, MYSQL_ASSOC);                            
                            $ct_No = $row_cormember['ct_No'];
//echo $ct_No;

                        //$sql_tkclassbooking = 'select * from tkclassbooking where tc_Member="'.$ct_No.'" order by tc_ID asc';// and tc_Delete != 1 //
                        //$sql_tkclassbooking = 'select *, tt_Date, tt_Guid from tkclassbooking, tktimetable where tc_Member="'.$ct_No.'" and tc_TimeTable_Guid = tt_Guid order by tt_Date asc limit 1';// and tc_Delete != 1 //
                        $sql_tkclassbooking = 'SELECT tc_ID, tc_TimeTable_Guid, tc_Delete, tt_Date, tt_Class, tt_Guid FROM tkclassbooking, tktimetable WHERE tc_Member="'.$ct_No.'" AND tt_Guid=tc_TimeTable_Guid AND tt_Date >= "'.$thedd.'" AND tc_Delete!=1 ORDER BY tt_Date ASC, tc_ID DESC LIMIT 1';
                        $retval_tkclassbooking = mysql_query( $sql_tkclassbooking, $conn );                 
                             if(! $retval_tkclassbooking )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

                        $row_tkclassbooking = mysql_fetch_array($retval_tkclassbooking, MYSQL_ASSOC); 
                        //while($row_tkclassbooking = mysql_fetch_array($retval_tkclassbooking, MYSQL_ASSOC)){
                        $tc_TimeTable_Guid = $row_tkclassbooking['tc_TimeTable_Guid'];
                        $tc_Delete = $row_tkclassbooking['tc_Delete'];
                        $tt_Date = $row_tkclassbooking['tt_Date'];
                        $tt_Class = $row_tkclassbooking['tt_Class'];
                        //echo $tc_Delete;
//echo $tc_TimeTable_Guid;
//echo $tc_Gtimer.'<br>';
                        //echo $tt_Date;
                        // $sql_tktimetable = 'select * from tktimetable where tt_Guid="'.$tc_TimeTable_Guid.'" and tt_Date >= CURDATE() ORDER BY DAYOFMONTH(tt_Date) DESC limit 1';// and tt_Date >= CURDATE() order by tt_Date
                        // $retval_tktimetable = mysql_query( $sql_tktimetable, $conn );                 
                        //      if(! $retval_tktimetable )
                        //      {
                        //         die('Could not get data: ' . mysql_error());
                        //      }

                        //     $row_tktimetable = mysql_fetch_array($retval_tktimetable, MYSQL_ASSOC);
                        //     $tt_Date = $row_tktimetable['tt_Date'];                           
                        //     $tt_Class = $row_tktimetable['tt_Class'];

//echo $$tt_Date.'<br>';

                        $sql_corclasses = 'select * from corclasses where cc_No="'.$tt_Class.'" ';
                        $retval_corclasses = mysql_query( $sql_corclasses, $conn );                 
                             if(! $retval_corclasses )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

                            $row_corclasses = mysql_fetch_array($retval_corclasses, MYSQL_ASSOC);                            
                            $cc_Name = $row_corclasses['cc_Name'];
                            $cc_Times = $row_corclasses['cc_Times'];

                            $the_date = date_create($tt_Date);
                            $Class_date = date_format($the_date, 'Y-m-d');
                            $SomeDate = date_format($the_date, 'Y-m-d H:i:s');
                            $the_time = date_create($tt_Date);
                            $Class_time = date_format($the_time, 'H:i');

                            // $endtime = strtotime('+'.$cc_Times.' minutes', strtotime($the_date));
                            // $added_minutes = date('Y-m-d h:i:s', $endtime);
                            // $/added_minutes_time = date('h:i', $endtime);
//echo 'local time = '.$thedd.'<br>';
//echo 'next class = '.$Class_date.' '.$Class_time.' '.$cc_Name.'<br>';
//echo $Class_date;
                           
                                if(!empty($Class_date) && !empty($Class_time) && !empty($cc_Name) && $SomeDate > $thedd){
                                    if($tc_Delete != 1){
                                    $body_records_info = '<p>提醒您於<span>'.$Class_date.'</span><span>'.$Class_time.'</span>有<span>'.$cc_Name.'</span>課程！</p>';
                                    }
                                } else {
                                  $body_records_info = '<p>規律的運動習慣，將幫助您達到健康目標！</p>';
                                }
//}//while


                        
                        // Joiisports body records
                        // $sqluser_userprofile = 'SELECT * FROM userprofile WHERE phone="'.$current_user.'" ';
                        // $retvaluser_userprofile = mysql_query( $sqluser_userprofile, $conn );                 
                        //      if(! $retvaluser_userprofile )
                        //      {
                        //         die('Could not get data: ' . mysql_error());
                        //      }

                        // $rowuser_userprofile = mysql_fetch_array($retvaluser_userprofile, MYSQL_ASSOC); 
                        // $userprofile_userUuid = $rowuser_userprofile['userUuid'];

                        // $sqluser_bodyFat = 'SELECT * FROM userfat WHERE userUuid="'.$userprofile_userUuid.'" order by idx desc';
                        // $retvaluser_bodyFat = mysql_query( $sqluser_bodyFat, $conn );                 
                        //      if(! $retvaluser_bodyFat )
                        //      {
                        //         die('Could not get data: ' . mysql_error());
                        //      }

                        // $rowuser_bodyFat = mysql_fetch_array($retvaluser_bodyFat, MYSQL_ASSOC); 
                        // $body_userUuid = $rowuser_bodyFat['userUuid'];
                        // $body_recordTimeStr = $rowuser_bodyFat['recordTimeStr'];                       
                        // $body_weight = $rowuser_bodyFat['weight'];
                        // $body_bfp = $rowuser_bodyFat['bfp'];
                        // $body_Age = $rowuser_bodyFat['bodyAge'];
                        // $body_visceralBfp = $rowuser_bodyFat['visceralBfp'];
                        // $body_skeleton = $rowuser_bodyFat['skeleton']; 
                        // $body_bmi = $rowuser_bodyFat['bmi'];
                        // $body_bmr = $rowuser_bodyFat['bmr'];
                        

                        // $body_records = '<div class="col-sm-4 body-rec">
                        //             <div id="chart1" class="chart">
                        //                 <img src="/assets/images/bod1.svg"/>
                        //             </div>
                        //             <!-- Old Structure 
                        //             <div class="row">
                        //                 <div class="col-xs-6 bord-right">
                        //                     <h4 class="green">55</h4>
                        //                     <p>KG</p>
                        //                 </div>
                        //                 <div class="col-xs-6">
                        //                     <p>體重</p>
                        //                     <p class="green"><span>減少</span><span>0.4kg</span></p>
                        //                 </div>
                        //             </div>
                        //             -->
                        //             <div class="row">
                        //                 <div class="col-xs-12 text-center">
                        //                     <h4 class="green">'.$bodyrecords_text5.'</h4>
                        //                     <h2>'.$body_weight.' <span><h4>kg</h4></span></h2>
                        //                 </div>
                        //             </div>
                        //         </div>
                        //         <div class="col-sm-4 body-rec">
                        //             <div id="chart2" class="chart">
                        //                 <img src="/assets/images/bod2.svg"/>
                        //             </div>
                        //             <div class="row">
                        //                 <div class="col-xs-12 text-center">
                        //                     <h4 class="green">'.$bodyrecords_text6.'</h4>
                        //                     <h2>'.$body_bfp.' <span><h4>％</h4></span></h2>
                        //                 </div>
                        //             </div>
                        //         </div>
                        //         <div class="col-sm-4 body-rec">
                        //             <div id="chart3" class="chart">
                        //                 <img src="/assets/images/bod3.svg"/>
                        //             </div>
                        //             <div class="row">
                        //                 <div class="col-xs-12 text-center">
                        //                     <h4 class="green">'.$bodyrecords_text7.'</h4>
                        //                     <h2>'.$body_visceralBfp.'<span><h4>level</h4></span></h2>
                        //                 </div>
                        //             </div>
                        //         </div>
                        //     </div>
                        //     <div class="row">
                        //         <div class="col-sm-4 body-rec">
                        //             <div id="chart4" class="chart">
                        //                 <img src="/assets/images/bod4.svg"/>
                        //             </div>
                        //             <div class="row">
                        //                 <div class="col-xs-12 text-center">
                        //                     <h4 class="green">'.$bodyrecords_text8.'</h4>
                        //                     <h2>'.$body_skeleton.'<span><h4>%</h4></span></h2>
                        //                 </div>
                        //             </div>
                        //         </div>
                        //         <div class="col-sm-4 body-rec">
                        //             <div id="chart5" class="chart">
                        //                 <img src="/assets/images/bod5.svg"/>
                        //             </div>
                        //             <div class="row">
                        //                 <div class="col-xs-12 text-center">
                        //                     <h4 class="green">'.$bodyrecords_text9.'</h4>
                        //                     <h2><span>'.$body_Age.'</span><span><h4>歲</h4></span></h2>
                        //                 </div>
                        //             </div>
                        //         </div>
                        //         <div class="col-sm-4 body-rec">
                        //             <div id="chart6" class="chart">
                        //                 <img src="/assets/images/bod6.svg"/>
                        //             </div>
                        //             <div class="row">
                        //                 <div class="col-xs-12 text-center">
                        //                     <h4 class="green">'.$bodyrecords_text10.'</h4>
                        //                     <h2>'.$body_bmi.'</h2>
                        //                 </div>
                        //             </div>
                        //         </div>';

//echo $ct_No; for testing
                        // NEw Design
                        $sqluser_inBody = 'SELECT * FROM inBody WHERE id="'.$ct_No.'" order by idx desc';
                        $retvaluser_inBody = mysql_query( $sqluser_inBody, $conn );                 
                             if(! $retvaluser_inBody )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

                        $rowuser_inBody = mysql_fetch_array($retvaluser_inBody, MYSQL_ASSOC); 
                        $body_name = $rowuser_inBody['name'];
                        $body_id = $rowuser_inBody['id'];                       
                        $body_date_of_registration = $rowuser_inBody['date_of_registration'];
                        $body_weight = $rowuser_inBody['weight'];
                        $body_total_body_water = $rowuser_inBody['total_body_water'];
                        $body_protein = $rowuser_inBody['protein'];
                        $body_minerals = $rowuser_inBody['minerals']; 
                        $body_body_fat_mass = $rowuser_inBody['body_fat_mass'];
                        $body_skeletal_muscle_mass = $rowuser_inBody['skeletal_muscle_mass'];
                        $body_body_mass_index = $rowuser_inBody['body_mass_index'];
                        $body_percent_body_fat = $rowuser_inBody['percent_body_fat'];
                        $body_inbody_score = $rowuser_inBody['inbody_score'];
                        $body_basal_metabolic_rate = $rowuser_inBody['basal_metabolic_rate'];
                        $body_visceral_fat_level = $rowuser_inBody['visceral_fat_level'];
                        
                        $body_weight_loss = $rowuser_inBody['weight_loss'];
                        $body_target_weight = $rowuser_inBody['target_weight'];
                        $body_weight_control = $rowuser_inBody['weight_control'];
                        $body_fat_free_mass = $rowuser_inBody['fat_free_mass'];

                        



                            
                                $body_records = '<div class="col-sm-4 body-rec">
                                    <div id="char1" class="chart">
                                        <img src="/assets/images/2h_icon1.svg"/>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-12 text-center">
                                            <h4 class="green">'.$bodyrecords_text2.'</h4>
                                            <h2>'.$body_weight.' <span><h4>kg</h4></span></h2>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-4 body-rec">
                                    <div id="chart6" class="chart">
                                         <img src="/assets/images/2h_icon2.svg"/> 
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-12 text-center">
                                            <h4 class="green">'.$bodyrecords_text3.'</h4>
                                            <h2>'.$body_body_mass_index.'</h2>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-4 body-rec">
                                    <div id="char2" class="chart">
                                        <img src="/assets/images/2h_icon3.svg"/>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-12 text-center">
                                            <h4 class="green">'.$bodyrecords_text4.'</h4>
                                            <h2>'.$body_percent_body_fat.' <span><h4>％</h4></span></h2>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-4 body-rec">
                                    <div id="char2" class="chart">
                                        <img src="/assets/images/2h_icon4.svg"/>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-12 text-center">
                                            <h4 class="green">'.$bodyrecords_text5.'</h4>
                                            <h2>'.$body_body_fat_mass.'<span><h4>kg</h4></span></h2>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-4 body-rec">
                                    <div id="char2" class="chart">
                                        <img src="/assets/images/2h_icon5.svg"/>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-12 text-center">
                                            <h4 class="green">'.$bodyrecords_text6.'</h4>
                                            <h2>'.$body_skeletal_muscle_mass.'<span><h4>%</h4></span></h2>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-4 body-rec">
                                    <div id="char2" class="chart">
                                        <img src="/assets/images/2h_icon6.svg"/>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-12 text-center">
                                            <h4 class="green">'.$bodyrecords_text7.'</h4>
                                            <h2>'.$body_total_body_water.'<span><h4>.oL</h4></span></h2>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-4 body-rec">
                                    <div id="char2" class="chart">
                                        <img src="/assets/images/2h_icon7.svg"/>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-12 text-center">
                                            <h4 class="green">'.$bodyrecords_text8.'</h4>
                                            <h2>'.$body_basal_metabolic_rate.' <span><h4>kcal</h4></span></h2>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-4 body-rec">
                                    <div id="char2" class="chart">
                                        <img src="/assets/images/2h_icon8.svg"/>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-12 text-center">
                                            <h4 class="green">'.$bodyrecords_text9.'</h4>
                                            <h2>'.$body_visceral_fat_level.'<span><h4>level</h4></span></h2>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-4 body-rec">
                                    <div id="char2" class="chart">
                                        <img src="/assets/images/2h_icon9.svg"/>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-12 text-center">
                                            <h4 class="green">'.$bodyrecords_text10.'</h4>
                                            <h2>'.$body_inbody_score.' <span><h4></h4></span></h2>
                                        </div>
                                    </div>
                                </div>';

                                $sqluser_inBody_history = 'SELECT * FROM inBody WHERE id="'.$ct_No.'" order by idx desc';
                                $retvaluser_inBody_history = mysql_query( $sqluser_inBody_history, $conn );                 
                                     if(! $retvaluser_inBody_history )
                                     {
                                        die('Could not get data: ' . mysql_error());
                                     }

                                $body_history = '<div class="multiple-charts">
                                                    <div class="multiple-charts-in">
                                                        <div class="record-slider">
                                                            <div class="arrow-all">
                                                                <p>歷史記錄</p>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-12">

                                                                <div class="arrow-all">
                                                                    <p>'.$bodyrecords_text2.'</p>
                                                                </div>
                                                                    <div class="chart" id="line-chart-weight" style="height: 150px; width: 100%"></div>

                                                                <div class="arrow-all">
                                                                    <p>'.$bodyrecords_text3.'</p>
                                                                </div>
                                                                    <div class="chart" id="line-chart-bmi" style="height: 150px; width: 100%"></div>

                                                                <div class="arrow-all">
                                                                    <p>'.$bodyrecords_text4.'</p>
                                                                </div>
                                                                    <div class="chart" id="line-chart-percent" style="height: 150px; width: 100%"></div>

                                                                <div class="arrow-all">
                                                                    <p>'.$bodyrecords_text5.'</p>
                                                                </div>
                                                                    <div class="chart" id="line-chart-fat" style="height: 150px; width: 100%"></div>

                                                                <div class="arrow-all">
                                                                    <p>'.$bodyrecords_text6.'</p>
                                                                </div>
                                                                    <div class="chart" id="line-chart-Skeletal" style="height: 150px; width: 100%"></div>

                                                                <div class="arrow-all">
                                                                    <p>'.$bodyrecords_text7.'</p>
                                                                </div>
                                                                    <div class="chart" id="line-chart-water" style="height: 150px; width: 100%"></div>

                                                                <div class="arrow-all">
                                                                    <p>'.$bodyrecords_text8.'</p>
                                                                </div>
                                                                    <div class="chart" id="line-chart-metabolic" style="height: 150px; width: 100%"></div>

                                                                <div class="arrow-all">
                                                                    <p>'.$bodyrecords_text9.'</p>
                                                                </div>
                                                                    <div class="chart" id="line-chart-visceral" style="height: 150px; width: 100%"></div>

                                                                <div class="arrow-all">
                                                                    <p>'.$bodyrecords_text10.'</p>
                                                                </div>
                                                                    <div class="chart" id="line-chart-score" style="height: 150px; width: 100%"></div>

                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>';

                                while($rowuser_inBody_history = mysql_fetch_array($retvaluser_inBody_history, MYSQL_ASSOC)){                       
                                //$body_date_of_registration_history = $rowuser_inBody_history['date_of_registration'];
                                $body_date_of_registration_history = $rowuser_inBody_history['test_time'];

                                $body_weight_history = $rowuser_inBody_history['weight'];
                                $body_body_mass_index_history = $rowuser_inBody_history['body_mass_index'];
                                $body_percent_body_fat_history = $rowuser_inBody_history['percent_body_fat'];
                                $body_body_fat_mass_history = $rowuser_inBody_history['body_fat_mass'];
                                $body_skeletal_muscle_mass_history = $rowuser_inBody_history['skeletal_muscle_mass']; //5
                                $body_total_body_water_history = $rowuser_inBody_history['total_body_water'];
                                $body_basal_metabolic_rate_history = $rowuser_inBody_history['basal_metabolic_rate'];
                                $body_visceral_fat_level_history = $rowuser_inBody_history['visceral_fat_level'];
                                $body_inbody_score_history = $rowuser_inBody_history['inbody_score'];

                                $testdate = date_create($body_date_of_registration_history);
                                $test_time = date_format($testdate, 'Y-m-d H:i');

                                // $body_history_script_data_weight .= "{ year: '".$body_date_of_registration_history."', value: ".$body_weight_history." }, ";
                                // $body_history_script_data_Skeletal .= "{ year: '".$body_date_of_registration_history."', value: ".$body_weight_history." }, ";
                                // $body_history_script_data_fat .= "{ year: '".$body_date_of_registration_history."', value: ".$body_weight_history." }, ";
                                //echo $body_date_of_registration_history;

                                $body_history_script_data_weight .= "{ year: '".$test_time."', value: ".$body_weight_history." }, ";
                                $body_history_script_data_body_mass_index .= "{ year: '".$test_time."', value: ".$body_body_mass_index_history." }, ";
                                $body_history_script_data_percent_body_fat .= "{ year: '".$test_time."', value: ".$body_percent_body_fat_history." }, ";
                                $body_history_script_data_fat .= "{ year: '".$test_time."', value: ".$body_body_fat_mass_history." }, ";                                
                                $body_history_script_data_Skeletal .= "{ year: '".$test_time."', value: ".$body_skeletal_muscle_mass_history." }, "; // 5th one
                                $body_history_script_data_total_body_water .= "{ year: '".$test_time."', value: ".$body_total_body_water_history." }, ";
                                $body_history_script_data_basal_metabolic_rate .= "{ year: '".$test_time."', value: ".$body_basal_metabolic_rate_history." }, ";
                                $body_history_script_data_visceral_fat_level .= "{ year: '".$test_time."', value: ".$body_visceral_fat_level_history." }, ";
                                $body_history_script_data_inbody_score .= "{ year: '".$test_time."', value: ".$body_inbody_score_history." }, ";
                                

                                } //while

                                $body_history_script_data_weight = substr($body_history_script_data_weight, 0, -2);
                                $body_history_script_data_body_mass_index = substr($body_history_script_data_body_mass_index, 0, -2);
                                $body_history_script_data_percent_body_fat = substr($body_history_script_data_percent_body_fat, 0, -2);
                                $body_history_script_data_fat = substr($body_history_script_data_fat, 0, -2);
                                $body_history_script_data_Skeletal = substr($body_history_script_data_Skeletal, 0, -2); // 5
                                $body_history_script_data_total_body_water = substr($body_history_script_data_total_body_water, 0, -2);
                                $body_history_script_data_basal_metabolic_rate = substr($body_history_script_data_basal_metabolic_rate, 0, -2);
                                $body_history_script_data_visceral_fat_level = substr($body_history_script_data_visceral_fat_level, 0, -2);
                                $body_history_script_data_inbody_score = substr($body_history_script_data_inbody_score, 0, -2);
                                $body_history_script_weight = "new Morris.Line({
                                  element: 'line-chart-weight',
                                  resize: true,
                                  data: [
                                    // { year: '2017-07-25 06:12:01', value: 20 },
                                    // { year: '2017-07-25 07:12:02', value: 10 },
                                    // { year: '2017-07-25 08:12:03', value: 5 },
                                    // { year: '2017-07-25 09:12:04', value: 5 },
                                    // { year: '2017-07-25 10:12:05', value: 20 }

                                    // { year: '2017-11-25', value: 20 },
                                    // { year: '2017-11-26', value: 10 },
                                    // { year: '2017-11-27', value: 5 },
                                    // { year: '2017-11-28', value: 5 },
                                    // { year: '2017-11-29', value: 20 },
                                    ".$body_history_script_data_weight."
                                  ],
                                  xkey: 'year',
                                  ykeys: ['value'],
                                  labels: ['".$bodyrecords_text2."'],
                                  lineColors: ['#00bab2'],
                                  hideHover: 'auto'
                                });";

                                $body_history_script_body_mass_index = "new Morris.Line({
                                  element: 'line-chart-bmi',
                                  resize: true,
                                  data: [
                                    ".$body_history_script_data_body_mass_index."
                                  ],
                                  xkey: 'year',
                                  ykeys: ['value'],
                                  labels: ['".$bodyrecords_text3."'],
                                  lineColors: ['#00bab2'],
                                  hideHover: 'auto'
                                });";

                                $body_percent_body_fat = "new Morris.Line({
                                  element: 'line-chart-percent',
                                  resize: true,
                                  data: [
                                    ".$body_history_script_data_percent_body_fat."
                                  ],
                                  xkey: 'year',
                                  ykeys: ['value'],
                                  labels: ['".$bodyrecords_text4."'],
                                  lineColors: ['#00bab2'],
                                  hideHover: 'auto'
                                });";

                                $body_history_script_data_fat = "new Morris.Line({
                                  element: 'line-chart-fat',
                                  resize: true,
                                  data: [
                                    ".$body_history_script_data_fat."
                                  ],
                                  xkey: 'year',
                                  ykeys: ['value'],
                                  labels: ['".$bodyrecords_text5."'],
                                  lineColors: ['#00bab2'],
                                  hideHover: 'auto'
                                });";

                                $body_history_script_data_Skeletal = "new Morris.Line({
                                  element: 'line-chart-Skeletal',
                                  resize: true,
                                  data: [
                                    ".$body_history_script_data_Skeletal."
                                  ],
                                  xkey: 'year',
                                  ykeys: ['value'],
                                  labels: ['".$bodyrecords_text6."'],
                                  lineColors: ['#00bab2'],
                                  hideHover: 'auto'
                                });";

                                $body_history_script_total_body_water = "new Morris.Line({
                                  element: 'line-chart-water',
                                  resize: true,
                                  data: [
                                    ".$body_history_script_data_total_body_water."
                                  ],
                                  xkey: 'year',
                                  ykeys: ['value'],
                                  labels: ['".$bodyrecords_text7."'],
                                  lineColors: ['#00bab2'],
                                  hideHover: 'auto'
                                });";

                                $body_history_script_basal_metabolic_rate = "new Morris.Line({
                                  element: 'line-chart-metabolic',
                                  resize: true,
                                  data: [
                                    ".$body_history_script_data_basal_metabolic_rate."
                                  ],
                                  xkey: 'year',
                                  ykeys: ['value'],
                                  labels: ['".$bodyrecords_text8."'],
                                  lineColors: ['#00bab2'],
                                  hideHover: 'auto'
                                });";

                                $body_history_script_visceral_fat_level = "new Morris.Line({
                                  element: 'line-chart-visceral',
                                  resize: true,
                                  data: [
                                    ".$body_history_script_data_visceral_fat_level."
                                  ],
                                  xkey: 'year',
                                  ykeys: ['value'],
                                  labels: ['".$bodyrecords_text9."'],
                                  lineColors: ['#00bab2'],
                                  hideHover: 'auto'
                                });";

                                $body_history_script_inbody_score = "new Morris.Line({
                                  element: 'line-chart-score',
                                  resize: true,
                                  data: [
                                    ".$body_history_script_data_inbody_score."
                                  ],
                                  xkey: 'year',
                                  ykeys: ['value'],
                                  labels: ['".$bodyrecords_text10."'],
                                  lineColors: ['#00bab2'],
                                  hideHover: 'auto'
                                });";

            }//else       D00025          
?>