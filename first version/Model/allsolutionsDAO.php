<?php
include '../lang/lang.php';
mysql_set_charset("utf8");

include 'menuDAO.php';
include 'footerDAO.php';

$current_lang = $_SESSION['lang'];
 


                        $sqlAllWorkshopsen = 'select * from digisurf_solution where code ="'.$current_lang.'" ORDER BY sortable_order ASC';
                        $retval_AllWorkshops_en = mysql_query( $sqlAllWorkshopsen, $conn );                 
                             if(! $retval_AllWorkshops_en )
                             {
                                die('Could not get data: ' . mysql_error());
                             }  

                        $AllWorkshops = '';
                        while($row_AllWorkshops_en = mysql_fetch_array($retval_AllWorkshops_en, MYSQL_ASSOC)){
                            $idx = $row_AllWorkshops_en['idx'];
                            $text4 = $row_AllWorkshops_en['text4'];
                            $text5 = $row_AllWorkshops_en['text5'];
                            $image = $row_AllWorkshops_en['image1']; 
                            $icon = $row_AllWorkshops_en['text6']; 
                            $url = $row_AllWorkshops_en['url'];

                                           $AllWorkshops .= '<div class="col-md-4">
                                                              <div class="service left-icon nellyboot-animate">

                                                                <div class="icon">
                                                                  <i class="'.$icon.'"></i>
                                                                </div>
                                                                <div class="text">
                                                                  <h3 class="heading">'.$text4.'</h3>
                                                                  <p>'.$text5.'</p>
                                                                  <!--<p><a href="/Capabilities/Capability/'.$url.'">Learn more</a></p>-->
                                                                </div>

                                                              </div>
                                                            </div>';                  

                                          
                        }
                        //$lang['AllWorkshops'] = $AllWorkshops;

                        $sqlen_all_solution = 'select * from digisurf_all_solution where code ="'.$current_lang.'"';
                        $retvalen_all_solution = mysql_query( $sqlen_all_solution, $conn );
                             if(! $retvalen_all_solution )
                             {
                                die('Could not get data: ' . mysql_error());
                             }
                        $rowen_all_solution = mysql_fetch_array($retvalen_all_solution, MYSQL_ASSOC);
                            $main_solution_text1 = $rowen_all_solution['text1'];
                            $main_solution_text2 = $rowen_all_solution['text2'];
                            $main_solution_text3 = $rowen_all_solution['text3'];
                            $main_solution_text4 = $rowen_all_solution['text4'];
                            $main_solution_text5 = $rowen_all_solution['text5'];
                            $main_solution_text6 = $rowen_all_solution['text6'];
                            $main_solution_image1 = $rowen_all_solution['image1'];
?>