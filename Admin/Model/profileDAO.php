<?php
include 'dbconfig.php';
mysql_set_charset("utf8");

$new_language = '';
$existing_code [] = '';
                        $sqllogin_bannerzh = 'select * from dashboard';
                        $retvallogin_bannerzh = mysql_query( $sqllogin_bannerzh, $conn );
                             if(! $retvallogin_bannerzh )
                             {
                                die('Could not get data: ' . mysql_error());
                             }
                        $rowlogin_bannerzh = mysql_fetch_array($retvallogin_bannerzh, MYSQL_ASSOC);
                            $login_banner = $rowlogin_bannerzh['image1'];






                        $sqlexisting_language = 'select code from digisurf_index';
                        $retvalexisting_language = mysql_query( $sqlexisting_language, $conn );                 
                             if(! $retvalexisting_language )
                             {
                                die('Could not get data: ' . mysql_error());
                             }                        


                        while($rowexisting_language = mysql_fetch_array($retvalexisting_language, MYSQL_ASSOC)){
                        $existing_code[] .= $rowexisting_language['code'];                        
                            }




                            $sqlnew_language = 'select * from lang ';
                            $retvalnew_language = mysql_query( $sqlnew_language, $conn );                 
                                 if(! $retvalnew_language )
                                 {
                                    die('Could not get data: ' . mysql_error());
                                 }

                            while($rownew_language = mysql_fetch_array($retvalnew_language, MYSQL_ASSOC)){
                            $new_code = $rownew_language['code']; 
                            $new_name = $rownew_language['name'];  
                            $new_language .= '<option value="'.$new_code.'" class="names">'.$new_name.'</option>'; 
                               
/*
                            
                        foreach ($existing_code as $key => $value) {
                            # code...
                            //$val = implode(",", $existing_code);
                            $sqlnew_language = 'select code, name from lang WHERE code != "'.$value.'" ';
                            $retvalnew_language = mysql_query( $sqlnew_language, $conn );                 
                                 if(! $retvalnew_language )
                                 {
                                    die('Could not get data: ' . mysql_error());
                                 }

                            while($rownew_language = mysql_fetch_array($retvalnew_language, MYSQL_ASSOC)){
                            $new_code = $rownew_language['code']; 
                            $new_name = $rownew_language['name'];  
                            $new_language .= '<option value="'.$new_code.'" class="names">'.$new_name.'</option>'; 
                               } */

                               
                        //$array = array($val);
                        //$comma_separated = implode(",", $array);
                        //echo $comma_separated;
                        //echo $val;
                        }
                            $available_lang = 'yes';
                            $available_language = '';
                            $sqlavailable_language = 'select * from lang where status ="'.$available_lang.'" ';
                            $retvalavailable_language = mysql_query( $sqlavailable_language, $conn );                 
                                 if(! $retvalavailable_language )
                                 {
                                    die('Could not get data: ' . mysql_error());
                                 }

                            while($rowavailable_language = mysql_fetch_array($retvalavailable_language, MYSQL_ASSOC)){
                            $new_code = $rowavailable_language['code']; 
                            $new_name = $rowavailable_language['name'];  
                            $available_language .= '<option value="'.$new_code.'" class="names">'.$new_name.'</option>'; 
                               

                        }

                            $avail_info_lang_swap = '';
                            $avail_info_lang = 'yes';
                            $avail_info_lang_en = 'en';
                            $avail_info_language = '';
                            $sqlavail_info_language = 'select * from lang where status ="'.$avail_info_lang.'" and code !="'.$avail_info_lang_en.'" ';
                            $retvalavail_info_language = mysql_query( $sqlavail_info_language, $conn );                 
                                 if(! $retvalavail_info_language )
                                 {
                                    die('Could not get data: ' . mysql_error());
                                 }

                            while($rowavail_info_language = mysql_fetch_array($retvalavail_info_language, MYSQL_ASSOC)){
                                $avail_idx = $rowavail_info_language['idx']; 
                                $avail_code = $rowavail_info_language['code']; 
                                $avail_name = $rowavail_info_language['name']; 
                                $avail_default_lang = $rowavail_info_language['default_lang']; 
                                $avail_active_lang = $rowavail_info_language['active_lang'];  
                                $avail_info_language .= '<tr>
                                                            <td><form method="get" action="/Admin/AllProfile" style="width:40%; float:left;"><button type="submit" class="btn btn-danger btn-flat" title="Remove This Language" data-toggle="tooltip"><i class="fa fa-unlink"></i></button><input type="hidden" name="remove_lang" value="'.$avail_idx.'"></form><form method="get" action="/Admin/AllProfile" style="width:40%; float:left;"><button type="submit" class="btn btn-warning btn-flat" title="Change Active Status"><i class="fa fa-unlink"></i></button><input type="hidden" name="deactivate_lang" value="'.$avail_idx.'"></form></td>
                                                            <td>'.$avail_code.'</td>
                                                            <td>'.$avail_name.'</td>
                                                            <td>'.$avail_default_lang.'</td>
                                                            <td>'.$avail_active_lang.'</td>
                                                          </tr>'; 
                               
                                                          if($avail_default_lang != null){
                                                            $avail_info_lang_swap = '';
                                                          } else{
                                                            $avail_info_lang_swap = 'en';
                                                          }
                        }
                        
                         


                        

                        


?>