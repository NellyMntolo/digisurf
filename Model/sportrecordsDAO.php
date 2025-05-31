<?php
include '../lang/lang.php';
mysql_set_charset("utf8");

include 'menuDAO.php';
include 'footerDAO.php';
$current_lang = $_SESSION['lang'];


date_default_timezone_set("Asia/Taipei");
$thedd = date('Y-m-d H:i:s',strtotime('now'));
$menu_account = '';
//
$sport_records_info = '';
$workout_records = '';
$sport_type = '';
$d3_Script = '';
$mycount = '';
$chart_records = '';


    $JS_RUNNING = '';//跑步
    $JS_BIKING = '';//騎車
    $JS_WALKING = '';//健行
    $JS_CLIMBING = '';//登山
    $JS_AEROBICS = '';//有氧
    $JS_BALL_PLAYING = '';//打球
    $JS_INDOOR_YOGA = '';//室內運動
    $JS_STEPING = '';//登階
    $JS_SPINNING_BIKE = '';//飛輪
    $JS_SWIMMING = '';//游泳
    $JS_Strength = '';//肌力訓練
    $JS_Stretching = '';//伸展運動
    $JS_INDOOR_RUN = '';//室內跑步

    $JS_RUNNING_PERCENT = '0';//跑步
    $JS_BIKING_PERCENT = '0';//騎車
    $JS_WALKING_PERCENT = '0';//健行
    $JS_CLIMBING_PERCENT = '0';//登山
    $JS_AEROBICS_PERCENT = '0';//有氧
    $JS_BALL_PLAYING_PERCENT = '0';//打球
    $JS_INDOOR_YOGA_PERCENT = '0';//室內運動
    $JS_STEPING_PERCENT = '0';//登階
    $JS_SPINNING_BIKE_PERCENT = '0';//飛輪
    $JS_SWIMMING_PERCENT = '0';//游泳
    $JS_Strength_PERCENT = '0';//肌力訓練
    $JS_Stretching_PERCENT = '0';//伸展運動
    $JS_INDOOR_RUN_PERCENT = '0';//室內跑步


    $zone1HRRatio_num = '';
    $zone25HRRatio_num = '';
    $zone2HRRatio_num = '';
    $zone3HRRatio_num = '';
    $zone4HRRatio_num = '';

    $redirect = '';

if(!isset($_SESSION['login_visitor'])){
    //echo "hi";
    //header("Location: /Logout");
    //header("Refresh:0; url=/Logout/");
    //exit;
    $redirect = '<script>window.location.href = "/Booking";</script>';
} else{
$current_user = $_SESSION['login_visitor'];


                    //CONTENT
                        $sql_cormember = 'select * from cormember where ct_Mobile="'.$current_user.'" or ct_Phone="'.$current_user.'" ';
                        $retval_cormember = mysql_query( $sql_cormember, $conn );                 
                             if(! $retval_cormember )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

                            $row_cormember = mysql_fetch_array($retval_cormember, MYSQL_ASSOC);                            
                            $ct_No = $row_cormember['ct_No'];


                        //$sql_tkclassbooking = 'select * from tkclassbooking where tc_Member="'.$ct_No.'" order by tc_ID asc ';// and tc_Delete != 1 //
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
                        //echo $tc_TimeTable_Guid;
//echo $tc_Delete.'<br>';
                        // $sql_tktimetable = 'select * from tktimetable where tt_Guid="'.$tc_TimeTable_Guid.'" and tt_Date >= CURDATE() ORDER BY DAYOFMONTH(tt_Date) DESC limit 1';
                        // $retval_tktimetable = mysql_query( $sql_tktimetable, $conn );                 
                        //      if(! $retval_tktimetable )
                        //      {
                        //         die('Could not get data: ' . mysql_error());
                        //      }

                        //     $row_tktimetable = mysql_fetch_array($retval_tktimetable, MYSQL_ASSOC);
                        //     $tt_Date = $row_tktimetable['tt_Date'];                           
                        //     $tt_Class = $row_tktimetable['tt_Class'];
                            //echo $tt_Class;


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
                            // $added_minutes_time = date('h:i', $endtime);

                          // echo $Class_date.'<br>';
                                if(!empty($Class_date) && !empty($Class_time) && !empty($cc_Name) && $SomeDate > $thedd){
                                    if($tc_Delete != 1){
                                    $sport_records_info = '<p>提醒您於<span>'.$Class_date.'</span><span>'.$Class_time.'</span>有<span>'.$cc_Name.'</span>課程！</p>';
                                    }
                                } else {
                                  $sport_records_info = '<p>規律的運動習慣，將幫助您達到健康目標！</p>';
                                }


//}//while


                        //Workout Records
                        $sqluser_userprofile = 'SELECT * FROM userprofile WHERE phone="'.$current_user.'" ';
                        $retvaluser_userprofile = mysql_query( $sqluser_userprofile, $conn );                 
                             if(! $retvaluser_userprofile )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

                        $rowuser_userprofile = mysql_fetch_array($retvaluser_userprofile, MYSQL_ASSOC); 
                        $userprofile_userUuid = $rowuser_userprofile['userUuid'];


                        $sqluser_workout_records = 'SELECT * FROM user_sports_record WHERE userUuid="'.$userprofile_userUuid.'" and pushContentType="1" order by startTime desc';
                        $retvaluser_workout_records = mysql_query( $sqluser_workout_records, $conn );                 
                             if(! $retvaluser_workout_records )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

                        while($rowuser_workout_records = mysql_fetch_array($retvaluser_workout_records, MYSQL_ASSOC)){
                        $sport_idx = $rowuser_workout_records['idx'];
                        $userUuid = $rowuser_workout_records['userUuid'];
                        $accessToken = $rowuser_workout_records['accessToken'];
                        $oauthUserExercisePushRecordId = $rowuser_workout_records['oauthUserExercisePushRecordId'];
                        $effectTime = $rowuser_workout_records['effectTime'];
                        $endTime = $rowuser_workout_records['endTime'];
                        $calorie = $rowuser_workout_records['calorie'];
                        $startTime = $rowuser_workout_records['startTime'];
                        $startTimeLong = $rowuser_workout_records['startTimeLong'];
                        $endTimeLong = $rowuser_workout_records['endTimeLong'];
                        $duration = $rowuser_workout_records['duration'];
                        $exerciseClassId = $rowuser_workout_records['exerciseClassId'];
                        $timeZone = $rowuser_workout_records['timeZone'];
                        $latitude = $rowuser_workout_records['latitude'];
                        $longitude = $rowuser_workout_records['longitude'];
                        $isQualify333150 = $rowuser_workout_records['isQualify333150'];
                        $isMeetLeastEffectTime = $rowuser_workout_records['isMeetLeastEffectTime'];
                        $failReason333150 = $rowuser_workout_records['failReason333150'];
                        $uploadTime = $rowuser_workout_records['uploadTime'];
                        $avgHR = $rowuser_workout_records['avgHR'];
                        $effectCalorie = $rowuser_workout_records['effectCalorie'];
                        $velocity = $rowuser_workout_records['velocity'];
                        $zone3HRRatio = $rowuser_workout_records['zone3HRRatio'];
                        $maxHR = $rowuser_workout_records['maxHR'];
                        $zone2HRRatio = $rowuser_workout_records['zone2HRRatio'];
                        $zone25HRRatio = $rowuser_workout_records['zone25HRRatio'];
                        $zone4HRRatio = $rowuser_workout_records['zone4HRRatio'];
                        $zone1HRRatio = $rowuser_workout_records['zone1HRRatio'];
                        $isUseHRDevice = $rowuser_workout_records['isUseHRDevice'];
                        $zone2LowerBound = $rowuser_workout_records['zone2LowerBound'];
                        $zone25LowerBound = $rowuser_workout_records['zone25LowerBound'];
                        $zone3LowerBound = $rowuser_workout_records['zone3LowerBound'];
                        $zone4LowerBound = $rowuser_workout_records['zone4LowerBound'];
                        $distance = $rowuser_workout_records['distance'];
                        $isDataFromHRDevice = $rowuser_workout_records['isDataFromHRDevice'];
                        $validHRTime = $rowuser_workout_records['validHRTime'];
                        $isValid = $rowuser_workout_records['isValid'];
                        $invalidReason = $rowuser_workout_records['invalidReason'];
                        $created_at = $rowuser_workout_records['created_at'];
                        $minHR = $rowuser_workout_records['minHR'];

                        $mycount = mysql_num_rows($retvaluser_workout_records);

                        $efficiency = $effectTime / $duration;

                        $workout_the_date = date_create($startTime);
                        $workout_date = date_format($workout_the_date, 'Y-m-d  H:i:s');
                        $workout_the_time = date_create($workout_date);
                        $workout_day = date_format($workout_the_time, 'Y-m-d');
                        $workout_time = date_format($workout_the_time, 'H:i');
                        //echo $workout_day.' ('.strtoupper(date_format($workout_the_date, 'D')).') '.$workout_time;

                        //echo gmdate("H:i:s", 685);

                        if($exerciseClassId == 1){
                                $sport_type = '跑步';
                            } elseif ($exerciseClassId == 2) {
                                $sport_type = '騎車';
                            } elseif ($exerciseClassId == 4) {
                                $sport_type = '健行';
                            } elseif ($exerciseClassId == 5) {
                                $sport_type = '登山';
                            } elseif ($exerciseClassId == 7) {
                                $sport_type = '有氧';
                            } elseif ($exerciseClassId == 8) {
                                $sport_type = '打球';
                            } elseif ($exerciseClassId == 9) {
                                $sport_type = '室內運動';
                            } elseif ($exerciseClassId == 10) {
                                $sport_type = '登階';
                            } elseif ($exerciseClassId == 12) {
                                $sport_type = '飛輪';
                            } elseif ($exerciseClassId == 13) {
                                $sport_type = '游泳';
                            } elseif ($exerciseClassId == 23) {
                                $sport_type = '肌力訓練';
                            } elseif ($exerciseClassId == 26) {
                                $sport_type = '伸展運動';
                            } elseif ($exerciseClassId == 28) {
                                $sport_type = '室內跑步';
                            }


                            if($zone1HRRatio != 0) {
                                $zone1HRRatio_num = '1';
                            }
                            if($zone25HRRatio != 0) {
                                $zone25HRRatio_num = '2';
                            }
                            if($zone2HRRatio != 0) {
                                $zone2HRRatio_num = '3';
                            }
                            if($zone3HRRatio != 0) {
                                $zone3HRRatio_num = '4';
                            }
                            if($zone4HRRatio != 0) {
                                $zone4HRRatio_num = '5';
                            }

                            
                        $workout_records .= '

                            <!-- PANEL -->
                            <div class="panel-container">
                            <div class="accordion">
                                <div class="panel-heading" role="tab" id="headingOne">
                                  <div class="heading">
                                      <div class="arrow"></div>
                                  </div>
                                </div>
                            </div>
                            
                            <div class="panel">
                              <div class="body">
                                  <div class="row">
                                        <div class="col-sm-6">
                                            <div class="lit-info-chart">
                                                <p><span>'.$workout_day.'</span><span>('.strtoupper(date_format($workout_the_date, 'D')).')</span><span>'.$workout_time.'</span></p>
                                                <div id="sport_type'.$sport_idx.'" class="daily"> <h3>'.$sport_type.'</h3></div>

                                                <div id="donut-chart'.$sport_idx.'" style="height: 200px;"></div>

                                                <ul>
                                                    <li>
                                                        <div></div>
                                                        <p>'.$zone1HRRatio.'%</p>
                                                    </li>
                                                    <li>
                                                        <div></div>
                                                        <p>'.$zone2HRRatio.'%</p><!-- dark green swap -->
                                                    </li>
                                                    <li>
                                                        <div></div>
                                                        <p>'.$zone25HRRatio.'%</p><!-- light green swap -->
                                                    </li>
                                                    <li>
                                                        <div></div>
                                                        <p>'.$zone3HRRatio.'%</p>
                                                    </li>
                                                    <li>
                                                        <div></div>
                                                        <p>'.$zone4HRRatio.'%</p>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <!-- Zhen the first 3 are only visible on mobile -->
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <div class="lit-info">
                                                        <div class="hidden-lg hidden-md hidden-sm">
                                                            <img src="/assets/images/chart-1.svg" alt="">
                                                        </div>
                                                        <p class="hidden-lg hidden-md hidden-sm">有效卡路里</p>
                                                        <p>'.$effectCalorie.'卡</p>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="lit-info">
                                                        <div class="hidden-lg hidden-md hidden-sm">
                                                            <img src="/assets/images/chart-2.svg" alt="">
                                                        </div>
                                                        <p class="hidden-lg hidden-md hidden-sm">里程</p>
                                                        <p>'.$distance.'公里</p>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="lit-info">
                                                        <div class="hidden-lg hidden-md hidden-sm">
                                                            <img src="/assets/images/chart-3.svg" alt="">
                                                        </div>
                                                        <p class="hidden-lg hidden-md hidden-sm">有效運動時間</p>
                                                        <p>'.gmdate("H:i:s", $effectTime).'</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End of Mobile only -->
                                            <div class="row">
                                                <div class="col-sm-4 ">
                                                    <div class="lit-info">
                                                        <div>
                                                            <img src="/assets/images/chart-4.svg" alt="">
                                                        </div>
                                                        <p class="lined">卡路里</p>
                                                        <p>'.$calorie.'卡</p>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="lit-info">
                                                        <div>
                                                            <img src="/assets/images/chart-5.svg" alt="">
                                                        </div>
                                                        <p class="lined">運動時間</p>
                                                        <p>'.gmdate("H:i:s", $duration).'</p>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="lit-info">
                                                        <div>
                                                            <img src="/assets/images/chart-6.svg" alt="">
                                                        </div>
                                                        <p class="lined">效率</p>
                                                        <p>'.substr($efficiency,0,4).'%</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row ">
                                                <div class="col-sm-4">
                                                    <div class="lit-info">
                                                        <div>
                                                            <img src="/assets/images/chart-7.svg" alt="">
                                                        </div>
                                                        <p class="lined">最高心跳</p>
                                                        <p>'.$maxHR.' 次/分</p>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="lit-info">
                                                        <div>
                                                            <img src="/assets/images/chart-8.svg" alt="">
                                                        </div>
                                                        <p class="lined">最低心跳</p>
                                                        <p>'.$minHR.' 次/分</p>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="lit-info">
                                                        <div>
                                                            <img src="/assets/images/chart-9.svg" alt="">
                                                        </div>
                                                        <p class="lined">平均心跳</p>
                                                        <p>'.$avgHR.' 次/分</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                  </div>
                            </div>
                            </div>
                            <!-- END -->';

                            //echo count($workout_records);

                            $arrayName = array('zone4HRRatio' => $zone1HRRatio_num,
                                                'zone3HRRatio' => $zone25HRRatio_num ,
                                                'zone25HRRatio' => $zone2HRRatio_num ,
                                                'zone2HRRatio' => $zone3HRRatio_num,
                                                'zone1HRRatio' => $zone4HRRatio_num
                                            );

                            //print_r($arrayName);
                           // print_r(array_keys(array_filter($arrayName)));
                            $my_percents = array_values(array_filter($arrayName));
                            //print_r(count($my_percents));
                            //echo count($my_percents, COUNT_RECURSIVE); 
                            $test = implode(',', $my_percents);
                            //echo $test;
                            //echo implode(',', $my_percents);

                            $arrayName1 = array('zone4HRRatio' => $zone1HRRatio,
                                                'zone3HRRatio' => $zone25HRRatio ,
                                                'zone25HRRatio' => $zone2HRRatio ,
                                                'zone2HRRatio' => $zone3HRRatio,
                                                'zone1HRRatio' => $zone4HRRatio
                                            );

                            $d3_Script .='<script type="text/javascript">
                                // var sports_list = ['.implode(",", $my_percents).'];
                                // //console.log(sports_list);

                                // var sports_list = ['.implode(",", $my_percents).'];
                                // var name_sports_list = ["跑步","自行車","健行","登山","有氧運動"];

                                // var my_numOftime = ['.implode(",", $my_percents).'];
                                // var result = [];

                                // sports_list.forEach(function(sport_id,i) {
                                //     var count = 0;
                                //     my_numOftime.forEach(function(d, i) {
                                //         if(d == sport_id){
                                //             count++;
                                //         }
                                //     });
                                //     result.push(count);
                                // })

                                // var width = 200,
                                //     height = 200,
                                //     radius = Math.min(width, height) / 2;

                                // var color = d3.scale.ordinal()
                                // .domain([0, d3.max(sports_list)])
                                // .range(["#cacaca", "#00bab2", "#00ff00", "#f6b84a", "#fa813d"]);

                                // var pie = d3.layout.pie()
                                //     .value(function (d) {
                                //         return d;
                                //     });

                                // var arc = d3.svg.arc()
                                //     .innerRadius(radius - 0)
                                //     .outerRadius(radius - 5);

                                // var svg = d3.select("#sport_type'.$sport_idx.'").append("svg")
                                //     .attr("width", width)
                                //     .attr("height", height)
                                //     .append("g")
                                //     .attr("transform", "translate(" + width / 2 + "," + height / 2 + ")");

                                // var formatter = d3.format(".0%");
                                // var sum = d3.sum(result);

                                // var path = svg.selectAll("path")
                                //     .data(pie(result))
                                //     .enter().append("path")
                                //     .attr("fill", function(d, i) { return color(i); })
                                //     .text(function (d) {
                                //         return formatter(d.data / sum);
                                //     })
                                //     .attr("d", arc);


                            /*
                             * DONUT CHART
                             * -----------
                             */

                            var donutData = [
                              {label: "Series1", data: '.$zone1HRRatio.', color: "#cacaca"},
                              {label: "Series2", data: '.$zone2HRRatio.', color: "#00ff00"},
                              {label: "Series3", data: '.$zone25HRRatio.', color: "#00bab2"},
                              {label: "Series4", data: '.$zone3HRRatio.', color: "#f6b84a"},
                              {label: "Series5", data: '.$zone4HRRatio.', color: "#fa813d"}
                            ];
                            $.plot("#donut-chart'.$sport_idx.'", donutData, {
                              series: {
                                pie: {
                                  show: true,
                                  radius: 1,
                                  innerRadius: 0.95,
                                  label: {
                                    show: false,
                                    radius: 2 / 3,
                                    formatter: labelFormatter,
                                    threshold: 0.1
                                  }

                                }
                              },
                              legend: {
                                show: false
                              }
                            });
                            /*
                             * END DONUT CHART
                             */

                            /*
                               * Custom Label formatter
                               * ----------------------
                               */
                              function labelFormatter(label, series) {
                                return \'<div style="font-size:13px; text-align:center; padding:2px; color: #fff; font-weight: 600;">\'
                                    + label
                                    + "<br>"
                                    + Math.round(series.percent) + "%</div>";
                              }
                            </script>';


                        } //while


                         $sqlsports_total_user = 'SELECT COUNT(exerciseClassId) as myTotal FROM user_sports_record WHERE userUuid="'.$userprofile_userUuid.'" and pushContentType="1" ';
                        $retvalsports_total_user = mysql_query( $sqlsports_total_user, $conn );                 
                             if(! $retvalsports_total_user )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

                        $rowsports_total_user = mysql_fetch_array($retvalsports_total_user, MYSQL_ASSOC);
                        $exerciseTotal = $rowsports_total_user['myTotal'];


                        $exerciseClassId_array = array();$count = '';
                        $sqluser_all_sports = 'SELECT * FROM user_sports_record WHERE userUuid="'.$userprofile_userUuid.'" and pushContentType="1" ';
                        $retvaluser_all_sports = mysql_query( $sqluser_all_sports, $conn );                 
                             if(! $retvaluser_all_sports )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

                        while($rowuser_all_sports = mysql_fetch_array($retvaluser_all_sports, MYSQL_ASSOC)){
                        	$exerciseClassId = $rowuser_all_sports['exerciseClassId'];
                        	$all_Type = $rowuser_all_sports['exerciseClassId'];
                            $exerciseClassId_array[] = $rowuser_all_sports['exerciseClassId'];

                        	// if($exerciseClassId == 1){
                         //        $JS_RUNNING = count($exerciseClassId);
                         //        $JS_RUNNING_PERCENT = count($exerciseClassId) / count($all_Type);
                         //    } elseif ($exerciseClassId == 2) {
                         //        $JS_BIKING = count($exerciseClassId);
                         //        $JS_BIKING_PERCENT = count($exerciseClassId) / count($all_Type);
                         //    } elseif ($exerciseClassId == 4) {
                         //        $JS_WALKING = count($exerciseClassId);
                         //        $JS_WALKING_PERCENT = count($exerciseClassId) / count($all_Type);
                         //    } elseif ($exerciseClassId == 5) {
                         //        $JS_CLIMBING = count($exerciseClassId);
                         //        $JS_CLIMBING_PERCENT = count($exerciseClassId) / count($all_Type);
                         //    } elseif ($exerciseClassId == 7) {
                         //        $JS_AEROBICS = count($exerciseClassId);
                         //        $JS_AEROBICS_PERCENT = count($exerciseClassId) / count($all_Type);
                         //    } elseif ($exerciseClassId == 8) {
                         //        $JS_BALL_PLAYING = count($exerciseClassId);
                         //        $JS_BALL_PLAYING_PERCENT = count($exerciseClassId) / count($all_Type);
                         //    } elseif ($exerciseClassId == 9) {
                         //        $JS_INDOOR_YOGA = count($exerciseClassId);
                         //        $JS_INDOOR_YOGA_PERCENT = count($exerciseClassId) / count($all_Type);
                         //        $sqlJS_INDOOR_YOGA = 'SELECT exerciseClassId FROM user_sports_record WHERE userUuid="'.$userprofile_userUuid.'" and pushContentType="1" and exerciseClassId=9 ';
                         //        $retvalJS_INDOOR_YOGA = mysql_query( $sqlJS_INDOOR_YOGA, $conn );
                         //        //echo mysql_num_rows($retvalJS_INDOOR_YOGA);
                         //    } elseif ($exerciseClassId == 10) {
                         //        $JS_STEPING = count($exerciseClassId);
                         //        $JS_STEPING_PERCENT = count($exerciseClassId) / count($all_Type);
                         //    } elseif ($exerciseClassId == 12) {
                         //        $JS_SPINNING_BIKE = count($exerciseClassId);
                         //        $JS_SPINNING_BIKE_PERCENT = count($exerciseClassId) / count($all_Type);
                         //    } elseif ($exerciseClassId == 13) {
                         //        $JS_SWIMMING = count($exerciseClassId);
                         //        $JS_SWIMMING_PERCENT = count($exerciseClassId) / count($all_Type);
                         //    } elseif ($exerciseClassId == 23) {
                         //        $JS_Strength = count($exerciseClassId);
                         //        $JS_Strength_PERCENT = count($exerciseClassId) / count($all_Type);
                         //    } elseif ($exerciseClassId == 26) {
                         //        $JS_Stretching = count($exerciseClassId);
                         //        $JS_Stretching_PERCENT = count($exerciseClassId) / count($all_Type);
                         //    } elseif ($exerciseClassId == 28) {
                         //        $JS_INDOOR_RUN = count($exerciseClassId);
                         //        $JS_INDOOR_RUN_PERCENT = count($exerciseClassId) / count($all_Type);
                         //    }




                            if(in_array(1, $exerciseClassId_array)){
                                $sqlJS_RUNNING = 'SELECT exerciseClassId FROM user_sports_record WHERE userUuid="'.$userprofile_userUuid.'" and pushContentType="1" and exerciseClassId=1 ';
                                $retvalJS_RUNNING = mysql_query( $sqlJS_RUNNING, $conn );
                                $JS_RUNNING = mysql_num_rows($retvalJS_RUNNING);
                                $JS_RUNNING_PERCENT_old = mysql_num_rows($retvalJS_RUNNING) / $exerciseTotal;
                                $JS_RUNNING_PERCENT = ltrim(ltrim($JS_RUNNING_PERCENT_old, '0'), '.');
                            } elseif (in_array(2, $exerciseClassId_array)) {
                                $sqlJS_BIKING = 'SELECT exerciseClassId FROM user_sports_record WHERE userUuid="'.$userprofile_userUuid.'" and pushContentType="1" and exerciseClassId=2 ';
                                $retvalJS_BIKING = mysql_query( $sqlJS_BIKING, $conn );
                                $JS_BIKING = mysql_num_rows($retvalJS_BIKING);
                                $JS_BIKING_PERCENT_old = mysql_num_rows($retvalJS_BIKING) / $exerciseTotal;
                                $JS_BIKING_PERCENT = ltrim(ltrim($JS_BIKING_PERCENT_old, '0'), '.');
                            } elseif (in_array(4, $exerciseClassId_array)) {
                                $sqlJS_WALKING = 'SELECT exerciseClassId FROM user_sports_record WHERE userUuid="'.$userprofile_userUuid.'" and pushContentType="1" and exerciseClassId=4 ';
                                $retvalJS_WALKING = mysql_query( $sqlJS_WALKING, $conn );
                                $JS_WALKING = mysql_num_rows($retvalJS_WALKING);
                                $JS_WALKING_PERCENT_old = mysql_num_rows($retvalJS_WALKING) / $exerciseTotal;
                                $JS_WALKING_PERCENT = ltrim(ltrim($JS_WALKING_PERCENT_old, '0'), '.');
                            } elseif (in_array(5, $exerciseClassId_array)) {
                                $sqlJS_CLIMBING = 'SELECT exerciseClassId FROM user_sports_record WHERE userUuid="'.$userprofile_userUuid.'" and pushContentType="1" and exerciseClassId=5 ';
                                $retvalJS_CLIMBING = mysql_query( $sqlJS_CLIMBING, $conn );
                                $JS_CLIMBING = mysql_num_rows($retvalJS_CLIMBING);
                                $JS_CLIMBING_PERCENT_old = mysql_num_rows($retvalJS_CLIMBING) / $exerciseTotal;
                                $JS_CLIMBING_PERCENT = ltrim(ltrim($JS_CLIMBING_PERCENT_old, '0'), '.');
                            } elseif (in_array(7, $exerciseClassId_array)) {
                                $sqlJS_AEROBICS = 'SELECT exerciseClassId FROM user_sports_record WHERE userUuid="'.$userprofile_userUuid.'" and pushContentType="1" and exerciseClassId=7 ';
                                $retvalJS_AEROBICS = mysql_query( $sqlJS_AEROBICS, $conn );
                                $JS_AEROBICS = mysql_num_rows($retvalJS_AEROBICS);
                                $JS_AEROBICS_PERCENT_old = mysql_num_rows($retvalJS_AEROBICS) / $exerciseTotal;
                                $JS_AEROBICS_PERCENT = ltrim(ltrim($JS_AEROBICS_PERCENT_old, '0'), '.');
                            } elseif (in_array(8, $exerciseClassId_array)) {
                                $sqlJS_BALL_PLAYING = 'SELECT exerciseClassId FROM user_sports_record WHERE userUuid="'.$userprofile_userUuid.'" and pushContentType="1" and exerciseClassId=8 ';
                                $retvalJS_BALL_PLAYING = mysql_query( $sqlJS_BALL_PLAYING, $conn );
                                $JS_BALL_PLAYING = mysql_num_rows($retvalJS_BALL_PLAYING);
                                $JS_BALL_PLAYING_PERCENT_old = mysql_num_rows($retvalJS_BALL_PLAYING) / $exerciseTotal;
                                $JS_BALL_PLAYING_PERCENT = ltrim(ltrim($JS_BALL_PLAYING_PERCENT_old, '0'), '.');
                            } elseif (in_array(9, $exerciseClassId_array)) {                                
                                $sqlJS_INDOOR_YOGA = 'SELECT exerciseClassId FROM user_sports_record WHERE userUuid="'.$userprofile_userUuid.'" and pushContentType="1" and exerciseClassId=9 ';
                                $retvalJS_INDOOR_YOGA = mysql_query( $sqlJS_INDOOR_YOGA, $conn );
                                $JS_INDOOR_YOGA = mysql_num_rows($retvalJS_INDOOR_YOGA);
                                $JS_INDOOR_YOGA_PERCENT_old = mysql_num_rows($retvalJS_INDOOR_YOGA) / $exerciseTotal;
                                $JS_INDOOR_YOGA_PERCENT = ltrim(ltrim($JS_INDOOR_YOGA_PERCENT_old, '0'), '.');
                            } elseif (in_array(10, $exerciseClassId_array)) {
                                $sqlJS_STEPING = 'SELECT exerciseClassId FROM user_sports_record WHERE userUuid="'.$userprofile_userUuid.'" and pushContentType="1" and exerciseClassId=10 ';
                                $retvalJS_STEPING = mysql_query( $sqlJS_STEPING, $conn );
                                $JS_STEPING = mysql_num_rows($retvalJS_STEPING);
                                $JS_STEPING_PERCENT_old = mysql_num_rows($retvalJS_STEPING) / $exerciseTotal;
                                $JS_STEPING_PERCENT = ltrim(ltrim($JS_STEPING_PERCENT_old, '0'), '.');
                            } elseif (in_array(12, $exerciseClassId_array)) {
                                $sqlJS_SPINNING_BIKE = 'SELECT exerciseClassId FROM user_sports_record WHERE userUuid="'.$userprofile_userUuid.'" and pushContentType="1" and exerciseClassId=12 ';
                                $retvalJS_SPINNING_BIKE = mysql_query( $sqlJS_SPINNING_BIKE, $conn );
                                $JS_SPINNING_BIKE = mysql_num_rows($retvalJS_SPINNING_BIKE);
                                $JS_SPINNING_BIKE_PERCENT_old = mysql_num_rows($retvalJS_SPINNING_BIKE) / $exerciseTotal;
                                $JS_SPINNING_BIKE_PERCENT = ltrim(ltrim($JS_SPINNING_BIKE_PERCENT_old, '0'), '.');
                            } elseif (in_array(13, $exerciseClassId_array)) {
                                $sqlJS_SWIMMING = 'SELECT exerciseClassId FROM user_sports_record WHERE userUuid="'.$userprofile_userUuid.'" and pushContentType="1" and exerciseClassId=13 ';
                                $retvalJS_SWIMMING = mysql_query( $sqlJS_SWIMMING, $conn );
                                $JS_SWIMMING = mysql_num_rows($retvalJS_SWIMMING);
                                $JS_SWIMMING_PERCENT_old = mysql_num_rows($retvalJS_SWIMMING) / $exerciseTotal;
                                $JS_SWIMMING_PERCENT = ltrim(ltrim($JS_SWIMMING_PERCENT_old, '0'), '.');
                            } elseif (in_array(23, $exerciseClassId_array)) {
                                $sqlJS_Strength = 'SELECT exerciseClassId FROM user_sports_record WHERE userUuid="'.$userprofile_userUuid.'" and pushContentType="1" and exerciseClassId=23 ';
                                $retvalJS_Strength = mysql_query( $sqlJS_Strength, $conn );
                                $JS_Strength = mysql_num_rows($retvalJS_Strength);
                                $JS_Strength_PERCENT_old = mysql_num_rows($retvalJS_Strength) / $exerciseTotal;
                                $JS_Strength_PERCENT = ltrim(ltrim($JS_Strength_PERCENT_old, '0'), '.');
                            } elseif (in_array(26, $exerciseClassId_array)) {
                                $sqlJS_Stretching = 'SELECT exerciseClassId FROM user_sports_record WHERE userUuid="'.$userprofile_userUuid.'" and pushContentType="1" and exerciseClassId=26 ';
                                $retvalJS_Stretching = mysql_query( $sqlJS_Stretching, $conn );
                                $JS_Stretching = mysql_num_rows($retvalJS_Stretching);
                                $JS_Stretching_PERCENT_old = mysql_num_rows($retvalJS_Stretching) / $exerciseTotal;
                                $JS_Stretching_PERCENT = ltrim(ltrim($JS_Stretching_PERCENT_old, '0'), '.');
                            } elseif (in_array(28, $exerciseClassId_array)) {
                                $sqlJS_INDOOR_RUN = 'SELECT exerciseClassId FROM user_sports_record WHERE userUuid="'.$userprofile_userUuid.'" and pushContentType="1" and exerciseClassId=28 ';
                                $retvalJS_INDOOR_RUN = mysql_query( $sqlJS_INDOOR_RUN, $conn );
                                $JS_INDOOR_RUN = mysql_num_rows($retvalJS_INDOOR_RUN);
                                $JS_INDOOR_RUN_PERCENT_old = mysql_num_rows($retvalJS_INDOOR_RUN) / $exerciseTotal;
                                $JS_INDOOR_RUN_PERCENT = ltrim(ltrim($JS_INDOOR_RUN_PERCENT_old, '0'), '.');
                            }

                        }//while
                        //print_r(array_count_values($exerciseClassId_array));





                        $chart_records = '<div class="record-chart">
                        <p class="title">最新統計資料</p>
                        <ul class="">
                            <li class="page">運動種類</li>
                            <!--
                            <li class="dropdown ">
                                <a class=" dropdown-toggle btn btn-black" data-toggle="dropdown" href="#">
                                    全部<span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu pull-left">
                                    <li><a href="#">種類</a></li>
                                    <li><a href="#">種類</a></li>
                                    <li><a href="#">種類</a></li>
                                </ul>
                            </li>
                            -->
                        </ul>
                        <div class="tab-content">
                            <div id="cate1" class=" big-chart-group">
                                <div class="chart-left big-chart text-center">
                                   <div class="details ">
                                       <p>運動項目</p>
                                       <h1>'.$exerciseTotal.'</h1>
                                       <h4><span>/</span>13</h4>
                                    </div>
                                    <div id="home" style="height: 350px;"></div>
                                </div>
                                <div class="chart-right">
                                    <table>
                                        <tr>
                                            <td><span class="dock" style="background: #00bcaa"></span></td>
                                            <td>跑步</td>
                                            <td>'.$JS_RUNNING.'</td>
                                            <td>'.substr($JS_RUNNING_PERCENT,0,2).'%</td>
                                        </tr>
                                        <tr>
                                            <td><span class="dock" style="background: #03b9b0"></span></td>
                                            <td>騎車</td>
                                            <td>'.$JS_BIKING.'</td>
                                            <td>'.substr($JS_BIKING_PERCENT,0,2).'%</td>
                                        </tr>
                                        <tr>
                                            <td><span class="dock" style="background: #f9f000"></span></td>
                                            <td>健行</td>
                                            <td>'.$JS_WALKING.'</td>
                                            <td>'.substr($JS_WALKING_PERCENT,0,2).'%</td>
                                        </tr>
                                        <tr>
                                            <td><span class="dock" style="background: #09bbb9"></span></td>
                                            <td>登山</td>
                                            <td>'.$JS_CLIMBING.'</td>
                                            <td>'.substr($JS_CLIMBING_PERCENT,0,2).'%</td>
                                        </tr>
                                        <tr>
                                            <td><span class="dock" style="background: #066db8"></span></td>
                                            <td>有氧</td>
                                            <td>'.$JS_AEROBICS.'</td>
                                            <td>'.substr($JS_AEROBICS_PERCENT,0,2).'%</td>
                                        </tr>
                                        <tr>
                                            <td><span class="dock" style="background: #172a86"></span></td>
                                            <td>打球</td>
                                            <td>'.$JS_BALL_PLAYING.'</td>
                                            <td>'.substr($JS_BALL_PLAYING_PERCENT,0,2).'%</td>
                                        </tr>
                                        <tr>
                                            <td><span class="dock" style="background: #8742a0"></span></td>
                                            <td>室內運動</td>
                                            <td>'.$JS_INDOOR_YOGA.'</td>
                                            <td>'.substr($JS_INDOOR_YOGA_PERCENT,0,2).'%</td>
                                        </tr>
                                        <tr>
                                            <td><span class="dock" style="background: #89409f"></span></td>
                                            <td>登階</td>
                                            <td>'.$JS_STEPING.'</td>
                                            <td>'.substr($JS_STEPING_PERCENT,0,2).'%</td>
                                        </tr>
                                        <tr>
                                            <td><span class="dock" style="background: #f0469a"></span></td>
                                            <td>飛輪</td>
                                            <td>'.$JS_SPINNING_BIKE.'</td>
                                            <td>'.substr($JS_SPINNING_BIKE_PERCENT,0,2).'%</td>
                                        </tr>
                                        <tr>
                                            <td><span class="dock" style="background: #e95e4b"></span></td>
                                            <td>游泳</td>
                                            <td>'.$JS_SWIMMING.'</td>
                                            <td>'.substr($JS_SWIMMING_PERCENT,0,2).'%</td>
                                        </tr>
                                        <tr>
                                            <td><span class="dock" style="background: #f39803"></span></td>
                                            <td>肌力訓練</td>
                                            <td>'.$JS_Strength.'</td>
                                            <td>'.substr($JS_Strength_PERCENT,0,2).'%</td>
                                        </tr>
                                        <tr>
                                            <td><span class="dock" style="background: #8fc727"></span></td>
                                            <td>伸展運動</td>
                                            <td>'.$JS_Stretching.'</td>
                                            <td>'.substr($JS_Stretching_PERCENT,0,2).'%</td>
                                        </tr>
                                        <tr>
                                            <td><span class="dock" style="background: #8fc727"></span></td>
                                            <td>室內跑步</td>
                                            <td>'.$JS_INDOOR_RUN.'</td>
                                            <td>'.substr($JS_INDOOR_RUN_PERCENT,0,2).'%</td>
                                        </tr>
                                        
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>';

            }//else D00025  

// "zone4HRRatio": red
// "zone3HRRatio": yellow
// zone25HRRatio":dark green
// zone2HRRatio":light green
// "zone1HRRatio": gray        


    //         JS_RUNNING = 1,//跑步
    // JS_BIKING = 2,//騎車
    // JS_WALKING = 4,//健行
    // JS_CLIMBING = 5,//登山
    // JS_AEROBICS = 7,//有氧
    // JS_BALL_PLAYING = 8,//打球
    // JS_INDOOR_YOGA = 9,//室內運動
    // JS_STEPING = 10,//登階
    // JS_SPINNING_BIKE = 12,//飛輪
    // JS_SWIMMING = 13,//游泳
    // JS_Strength = 23,//肌力訓練
    // JS_Stretching = 26,//伸展運動
    // JS_INDOOR_RUN = 28,//室內跑步


?>