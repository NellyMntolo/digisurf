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

                        $allworkshops = '';
                        while($row_AllWorkshops_en = mysql_fetch_array($retval_AllWorkshops_en, MYSQL_ASSOC)){
                            $idx = $row_AllWorkshops_en['idx'];
                            $text4 = $row_AllWorkshops_en['text4'];
                            $text9 = $row_AllWorkshops_en['text9'];
                            $image = $row_AllWorkshops_en['image3']; 
                            $icon = $row_AllWorkshops_en['image4']; 
                            $url = $row_AllWorkshops_en['url'];
                            $sortable_order = $row_AllWorkshops_en['sortable_order'];

                            if ($sortable_order < 10){
                                $id = sprintf("%02d", $sortable_order);
                            } else {
                                $id = $sortable_order;
                            }
							

                                           $allworkshops .= '<div class="class-box animation-element slide-bottom">
										   						<a href="/Class/'.$url.'">
                                                                <div class="inner">
                                                                    <h3 class="title">'.$id.'</h3>
                                                                    <h1 >'.$text4.'</h1>
                                                                    <p class="info hidden-xs">'.$text9.'</p>
                                                                    <div class="button">
                                                                        <img class="circle" src="/assets/images/2h_class_1.svg" alt="">
                                                                        <img class="arrow" src="/assets/images/2h_class_2.svg" alt="">
                                                                    </div>
                                                                </div>
                                                                <img class="background" src="'.$image.'" alt="">
																</a>
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
                            $main_solutions_all_entext1 = $rowen_all_solution['text1'];
                            $main_solutions_all_entext2 = $rowen_all_solution['text2'];
                            $main_solutions_all_entext3 = $rowen_all_solution['text3'];
                            $main_solutions_all_entext4 = $rowen_all_solution['text4'];
                            $main_solutions_all_entext5 = $rowen_all_solution['text5'];
                            $main_solutions_all_text6 = $rowen_all_solution['text6'];
                            $main_solutions_all_entext7 = $rowen_all_solution['text7'];
                            $main_solutions_all_entext8 = $rowen_all_solution['text8'];
                            $main_solutions_all_enimage1 = $rowen_all_solution['image1'];

                            $sol_trimmedtext6 = nl2br($main_solutions_all_text6); 
                            $main_solutions_all_entext6 = $sol_trimmedtext6;

                            $main_solution_text1 = $main_solutions_all_entext1;
                            $main_solution_text2 = $main_solutions_all_entext2;
                            $main_solution_text3 = $main_solutions_all_entext3;
                            $main_solution_text4 = $main_solutions_all_entext4;
                            $main_solution_text5 = $main_solutions_all_entext5;
                            $main_solution_text6 = $main_solutions_all_entext6;
                            $main_solution_text7 = $main_solutions_all_entext7;
                            $main_solution_text8 = $main_solutions_all_entext8;
                            $main_solution_image1 = $main_solutions_all_enimage1;


                            $sqlnewsen = 'select * from digisurf_blog where code ="'.$current_lang.'" ORDER BY sortable_order ASC';
                            $retval_allnews_en = mysql_query( $sqlnewsen, $conn );                 
                                 if(! $retval_allnews_en )
                                 {
                                    die('Could not get data: ' . mysql_error());
                                 }  


                            $allteachers = '';
                            $job_desc = '';
                            while($row_allnews_en = mysql_fetch_array($retval_allnews_en, MYSQL_ASSOC)){
                                $teacheridx = $row_allnews_en['idx'];
                                $text1 = $row_allnews_en['text1'];
                                $text2 = $row_allnews_en['text2'];
                                $text3 = $row_allnews_en['text3'];
                                $image = $row_allnews_en['image1']; 
                                $url = $row_allnews_en['url'];

                            $teacher_trimmedtext6 = nl2br($text3); 
                            $main_teacher_all_entext6 = $teacher_trimmedtext6;

                                    $allteachers .= '<li class="gridder-list" data-griddercontent="#gridder-content-'.$teacheridx.'">
                                                        <div class="profile">
                                                            <img src="'.$image.'"/>
                                                        </div>
                                                        <p class="title">'.$text1.'</p>
                                                    </li>';

                                    $job_desc .= '<div id="gridder-content-'.$teacheridx.'" class="gridder-content">
                                                        <div class="gridder-wrapper alt-color">
                                                            <div class="thnk-container gridder-show-in">
                                                                <h2>'.$text2.'</h2>
                                                                <p>'.$main_teacher_all_entext6.'</p>
                                                            </div>
                                                        </div>
                                                    </div>';

                                                                
                                              
                            }
?>