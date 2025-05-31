<?php
include '../lang/lang.php';
mysql_set_charset("utf8");


include 'menuDAO.php';
include 'footerDAO.php';
$current_lang = $_SESSION['lang'];
$current_user = $_SESSION['login_visitor'];

//edit
                        $category_types_Short = array();
                        $sqlcategory_types = 'SELECT * FROM _types where Short != ""';
                        $retvalcategory_types = mysql_query( $sqlcategory_types, $conn );                 
                             if(! $retvalcategory_types )
                             {
                                die('Could not get data: ' . mysql_error());
                             } 

                        while($rowcategory_types = mysql_fetch_array($retvalcategory_types, MYSQL_ASSOC)){
                        $category_types_Short[] = $rowcategory_types['Short']; 
                        }


$theModal = '';
$phone_number = '';
date_default_timezone_set("Asia/Taipei");
$thedd = date('Y-m-d H:i:s',strtotime('now'));

if(isset($_POST['week'])){
$week = $_POST['week'];
                        $sqlprojecten = 'SELECT * FROM tktimetable WHERE WEEKOFYEAR(tt_Date) = WEEKOFYEAR('.$week.') AND MONTH('.$week.')=MONTH('.$week.') AND tt_Teacher like "%D%" ORDER BY tt_Date ASC ';
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

                            if($tt_Delete != 1){

                            $startdate = date_create($rowprojecten['tt_Date']);
                            $the_date = date_format($startdate, 'Y-m-d');                          
                            $the_time = date_format($startdate, 'H:i:s');
                            if($the_time != '00:00:00'){
                            $starttime = date_format($startdate, 'Y-m-d H:i:s');
                            $startting_time = date_format($startdate, 'H:i');
                            //$startting_time = date_format($startdate, 'Y-m-d H:i:s');
                            }


                        $sqlmember = 'SELECT * FROM cormember WHERE ct_No ="'.$member.'" AND ct_Type=02 ';
                        $retvalmember = mysql_query( $sqlmember, $conn );                 
                             if(! $retvalmember )
                             {
                                die('Could not get data: ' . mysql_error());
                             }
                        $rowmember = mysql_fetch_array($retvalmember, MYSQL_ASSOC);
                        $memberName = $rowmember['ct_Name'];

                        $sqlstudent = 'SELECT * FROM cormember WHERE ct_Mobile="'.$current_user.'" AND ct_Type=01 ';//
                        $retvalstudent = mysql_query( $sqlstudent, $conn );                 
                             if(! $retvalstudent )
                             {
                                die('Could not get data: ' . mysql_error());
                             }
                        $rowstudent = mysql_fetch_array($retvalstudent, MYSQL_ASSOC);
                        $studentNum = $rowstudent['ct_No'];

                        $sqlclasses = 'SELECT * FROM corclasses WHERE cc_No ="'.$classnumber.'" AND cc_Type IN ('.implode($category_types_Short,',').')  ';
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
                        $cc_No = $rowclasses['cc_No'];

                        $endtime = strtotime('+'.$classtime.' minutes', strtotime($starttime));
                        $added_minutes = date('Y-m-d H:i:s', $endtime);
                        $added_minutes_time = date('h:i', $endtime);






                        $sqlcormembercancel = 'SELECT ct_No, ct_Guid FROM cormember WHERE ct_Type=01 AND ct_Mobile="'.$_SESSION['login_visitor'].'" ';
                        $retvalcormember_cancel = mysql_query( $sqlcormembercancel, $conn );                 
                             if(! $retvalcormember_cancel )
                             {
                                die('Could not get data: ' . mysql_error());
                             }
                        $rowcormember_cancel = mysql_fetch_array($retvalcormember_cancel, MYSQL_ASSOC);
                        $cormemberNum_cancel = $rowcormember_cancel['ct_No'];
                        $ct_Guid_cancel = $rowcormember_cancel['ct_Guid'];

                        $sqlcancelled = 'SELECT timetable_guid, member_giud, created_at FROM cancel_list WHERE WEEKOFYEAR(created_at) = WEEKOFYEAR('.$week.') AND member_giud="'.$ct_Guid.'" ';
                        $retvalcancelled = mysql_query( $sqlcancelled, $conn );                 
                             if(! $retvalcancelled )
                             {
                                die('Could not get data: ' . mysql_error());
                             }
                            $rowcancelled = mysql_fetch_array($retvalcancelled, MYSQL_ASSOC);
                            $timetable_guid = $rowcancelled['timetable_guid'];
                            $member_giud = $rowcancelled['member_giud'];
                            $created_at = $rowcancelled['created_at'];

                            $seven_days = strtotime('+7 days', strtotime($created_at));

                            $cancelled = date('Y-m-d H:i:s',$seven_days);

                            //echo $member_giud.'<br>'.$ct_Guid.'<br><br><br>';

                        

                            $theModal .= '<!-- for second block before conflict -->
                                    <div class="modal fade myBookingModal" id="myBooking'.$tt_Guid.'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">                                        
                                            <button type="button" class="btn modal-close" data-dismiss="modal" aria-label="Close"></button>
                                            <div class="modal-content-in">
                                                <div class="modal-title">
                                                    <h3>是否確定預約訂課？</h3>
                                                </div>
                                                <div class="modal-cont">
                                                '.$_SESSION['booking'.$tt_Guid].'
                                                    <!-- <div class="modal-fix">
                                                        <p><span>日期:</span><span>date - time</span></p>
                                                        <p><span>時間:</span><span>--</span></p>
                                                        <p><span>課程:</span><span>--</span></p>
                                                        <p><span>老師:</span><span>--</span></p>
                                                    </div> -->
                                                </div>
                                                <div class="modal-button">
                                                    <button type="button" class="btn btn-default2" data-dismiss="modal">取消</button>
                                                    <button type="submit" class="btn btn-default makebooking">確定</button>
                                                    <input type="hidden" class="studentNum" name="studentNum" value="'.$studentNum.'">
                                                    <input type="hidden" class="tt_Guid" name="tt_Guid" value="'.$tt_Guid.'">  
                                                    <input type="hidden" class="tc_Second" name="tc_Second" value="0">
                                                    <input type="hidden" class="phone_number" name="phone_number" value="'.$_SESSION['login_visitor'].'">                                            
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </div>';




                        $sqlcormember = 'SELECT ct_No FROM cormember WHERE ct_Type=01 AND ct_Mobile="'.$_SESSION['login_visitor'].'" OR ct_Phone="'.$_SESSION['login_visitor'].'" ';
                        $retvalcormember = mysql_query( $sqlcormember, $conn );                 
                             if(! $retvalcormember )
                             {
                                die('Could not get data: ' . mysql_error());
                             }
                        $rowcormember = mysql_fetch_array($retvalcormember, MYSQL_ASSOC);
                        $cormemberNum = $rowcormember['ct_No'];
                        $ct_Mobile = $rowcormember['ct_Mobile'];
                        $ct_Phone = $rowcormember['ct_Phone'];

                        if($ct_Mobile != ''){
                            $phone_number = $ct_Mobile;
                        } else{
                            $phone_number = $ct_Phone;
                        }

                        $sqlwaiting_list = 'select tc_Second,tc_Member,@rn:=@rn+1 as row_num from tkclassbooking,(select @rn:=0) as r where tc_TimeTable_Guid="'.$tt_Guid.'" and tc_Second=1 order by tc_ID desc';
                        $retvalwaiting_list = mysql_query( $sqlwaiting_list, $conn );                 
                             if(! $retvalwaiting_list )
                             {
                                die('Could not get data: ' . mysql_error());
                             }
                            while($rowwaiting_list = mysql_fetch_array($retvalwaiting_list, MYSQL_ASSOC)){
                            $row_num = $rowwaiting_list['row_num'];
                            $tc_Member = $rowwaiting_list['tc_Member'];
                            $tc_Second = $rowwaiting_list['tc_Second'];
                            //$_SESSION['overbooked'] = $row_num; 
                            echo $tc_Member.' '.$cormemberNum;
                            if($tc_Member == $cormemberNum){
                              if ($row_num < 10){
                                  //$_SESSION['overbooked'] = sprintf("%02d", $row_num);
                                  $theModal .= '<!-- for first block -->
                                    <div class="modal fade" id="myAlreadyFull" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <button type="button" class="btn modal-close" data-dismiss="modal" aria-label="Close"></button>
                                            <div class="modal-content-in">
                                                <div class="modal-title">
                                                    <h2>GOT IT</h2>
                                                    <h3>您已候補成功！</h3>
                                                </div>
                                                <div class="modal-cont">
                                                    <p class="text-center">候補為第<span class="green">'.sprintf("%02d", $row_num).'</span>位，<br>
                                    如有名額將為您直接訂課</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </div>';
                              } else {
                                  //$_SESSION['overbooked'] = $row_num;
                                  $theModal .= '<!-- for first block -->
                                    <div class="modal fade" id="myAlreadyFull" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <button type="button" class="btn modal-close" data-dismiss="modal" aria-label="Close"></button>
                                            <div class="modal-content-in">
                                                <div class="modal-title">
                                                    <h2>GOT IT</h2>
                                                    <h3>您已候補成功！</h3>
                                                </div>
                                                <div class="modal-cont">
                                                    <p class="text-center">候補為第<span class="green">'.$row_num.'</span>位，<br>
                                    如有名額將為您直接訂課</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </div>';
                              }
                            } else {
                                $theModal .= '<div class="modal fade myBookingModal" id="myOverBooking'.$tt_Guid.'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <button type="button" class="btn modal-close" data-dismiss="modal" aria-label="Close"></button>
                                                        <div class="modal-content-in">
                                                            <div class="modal-title">
                                                                <h3>目前人數已滿<br>
                                                                    是否要預約候補？</h3>
                                                            </div>
                                                            <div class="modal-buttons">
                                                                <button type="button" class="btn btn-default2" data-dismiss="modal">取消</button>
                                                                <button type="button" class="btn btn-default makebooking">確定</button>
                                                                <input type="hidden" class="studentNum" name="studentNum" value="'.$studentNum.'">
                                                                <input type="hidden" class="tt_Guid" name="tt_Guid" value="'.$tt_Guid.'">
                                                                <input type="hidden" class="tc_Second" name="tc_Second" value="'.$tc_Second.'">
                                                                <input type="hidden" class="phone_number" name="phone_number" value="'.$phone_number.'">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                </div>';
                            }
                        }//while waiting









                        




                        }//if delete

                    }//timetable
}//week

echo $theModal;
?>
