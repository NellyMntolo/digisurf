<?php
include '../lang/lang.php';
mysql_set_charset("utf8");

include 'menuDAO.php';
include 'footerDAO.php';
$current_lang = $_SESSION['lang'];

$menu_account = '';

$redirect = '';

if(!isset($_SESSION['login_visitor'])){
    //header("Location: /Booking"); 
      //exit;
    $redirect = '<script>window.location.href = "/Booking";</script>';
} else{
$current_user = $_SESSION['login_visitor'];

$myaccount_link = '';

                    //CONTENT
                        $sql_cormember = 'select * from cormember where ct_Mobile="'.$current_user.'" ';
                        $retval_cormember = mysql_query( $sql_cormember, $conn );                 
                             if(! $retval_cormember )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

                            $row_cormember = mysql_fetch_array($retval_cormember, MYSQL_ASSOC);
                            $ct_Gender = $row_cormember['ct_Gender'];
                            //$ct_Student_id = $row_cormember['ct_Student_id'];
                            $ct_Birthday = $row_cormember['ct_Birthday'];
                            $ct_Phone = $row_cormember['ct_Phone'];
                            $ct_Mobile = $row_cormember['ct_Mobile'];
                            $ct_Email = $row_cormember['ct_Email'];
                            $ct_Address = $row_cormember['ct_Address'];
                            $ct_No = $row_cormember['ct_No'];

                            $birth = date_create($ct_Birthday);
                            $bd = date_format($birth, 'Y-m-d');

                            $info = '<div class="info">
                                        <div class="row">
                                            <div class="col-xs-3">
                                                性別
                                            </div>
                                            <div class="col-xs-9">
                                                '.$ct_Gender.'
                                            </div>
                                        </div>
                                       <div class="row">
                                            <div class="col-xs-3">
                                                <!--學員-->編號
                                            </div>
                                            <div class="col-xs-9">
                                                '.$ct_No.'
                                            </div>
                                        </div>
                                       <div class="row">
                                            <div class="col-xs-3">
                                                生日
                                            </div>
                                            <div class="col-xs-9">
                                                '.$bd.'
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-3">
                                                電話
                                            </div>
                                            <div class="col-xs-9">
                                                <!-- 02-2839-9405 -->'.$ct_Phone.'
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-3">
                                                手機
                                            </div>
                                            <div class="col-xs-9">
                                                '.$ct_Mobile.'
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-3">
                                                Email
                                            </div>
                                            <div class="col-xs-9">
                                                '.$ct_Email.'
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-3">
                                                地址
                                            </div>
                                            <div class="col-xs-9">
                                                <!-- 新北市三峽區學成路398號4樓 -->'.$ct_Address.'
                                            </div>
                                        </div>
                                    </div>';





            }//else                
?>