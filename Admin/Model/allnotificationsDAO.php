<?php
include 'dbconfig.php';
mysql_set_charset("utf8");
session_start();
$current_lang_now = $_SESSION['lang'];

                        //ALL THINKERS
                        $sql_allthinkers = 'select * from digisurf_solution where code ="'.$current_lang_now.'" ';
                        $retval_allthinkers = mysql_query( $sql_allthinkers, $conn );                 
                             if(! $retval_allthinkers )
                             {
                                die('Could not get data: ' . mysql_error());
                             }
                        $row_allthinkers = mysql_fetch_array($retval_allthinkers, MYSQL_ASSOC);                      
                        $allthinkers_idx = mysql_num_rows($retval_allthinkers);

                        //ALL PARTNERS
                        $sql_allpartners = 'select * from digisurf_faq where code ="'.$current_lang_now.'" ';
                        $retval_allpartners = mysql_query( $sql_allpartners, $conn );                 
                             if(! $retval_allpartners )
                             {
                                die('Could not get data: ' . mysql_error());
                             }
                        $row_allpartners = mysql_fetch_array($retval_allpartners, MYSQL_ASSOC);                    
                        $allpartners_idx = mysql_num_rows($retval_allpartners);

                        //ALL BLOGS
                        $sql_allblogs = 'select * from digisurf_blog where code ="'.$current_lang_now.'" ';
                        $retval_allblogs = mysql_query( $sql_allblogs, $conn );                 
                             if(! $retval_allblogs )
                             {
                                die('Could not get data: ' . mysql_error());
                             }
                        $row_allblogs = mysql_fetch_array($retval_allblogs, MYSQL_ASSOC);                      
                        $allblogs_idx = mysql_num_rows($retval_allblogs);

                        //ALL PAPERS
                        $sql_allpapers = 'select * from digisurf_white_papers where code ="'.$current_lang_now.'" ';
                        $retval_allpapers = mysql_query( $sql_allpapers, $conn );                 
                             if(! $retval_allpapers )
                             {
                                die('Could not get data: ' . mysql_error());
                             }
                        $row_allpapers = mysql_fetch_array($retval_allpapers, MYSQL_ASSOC);                      
                        $allpapers_idx = mysql_num_rows($retval_allpapers);

                        //ALL PROJECTS
                        $sql_allprojects = 'select * from digisurf_project where code ="'.$current_lang_now.'" ';
                        $retval_allprojects = mysql_query( $sql_allprojects, $conn );                 
                             if(! $retval_allprojects )
                             {
                                die('Could not get data: ' . mysql_error());
                             }
                        $row_allprojects = mysql_fetch_array($retval_allprojects, MYSQL_ASSOC);                      
                        $allprojects_idx = mysql_num_rows($retval_allprojects);



                        //ALL DEMO
                        $sql_all_demo = 'select * from digisurf_demo where code ="'.$current_lang_now.'" Limit 3';
                        $retval_all_demo = mysql_query( $sql_all_demo, $conn );                 
                             if(! $retval_all_demo )
                             {
                                die('Could not get data: ' . mysql_error());
                             }
                        $row_all_demo = mysql_fetch_array($retval_all_demo, MYSQL_ASSOC);                    
                        $all_demo_idx = mysql_num_rows($retval_all_demo);

                        //ALL CATEGORIES
                        //ALL TAGS

                        //Menu
                        $sql_allmenu = 'select * from digisurf_menu where code ="'.$current_lang_now.'" ';
                        $retval_allmenu = mysql_query( $sql_allmenu, $conn );                 
                             if(! $retval_allmenu )
                             {
                                die('Could not get data: ' . mysql_error());
                             }
                        $row_allmenu = mysql_fetch_array($retval_allmenu, MYSQL_ASSOC);
                        $allmenu_text1 = $row_allmenu['text1'];
                        $allmenu_text2 = $row_allmenu['text2'];
                        $allmenu_text3 = $row_allmenu['text3'];
                        $allmenu_text4 = $row_allmenu['text4'];
                        $allmenu_text5 = $row_allmenu['text5'];
                        $allmenu_text6 = $row_allmenu['text6'];
                        $allmenu_text7 = $row_allmenu['text7'];

                        $active_languages = 'yes';
                        $active_language = '';
                        $sqlactive_language = 'select * from lang WHERE status = "'.$active_languages.'" ';
                            $retvalactive_language = mysql_query( $sqlactive_language, $conn );                 
                                 if(! $retvalactive_language )
                                 {
                                    die('Could not get data: ' . mysql_error());
                                 }

                            while($rowactive_language = mysql_fetch_array($retvalactive_language, MYSQL_ASSOC)){
                            $new_code = $rowactive_language['code']; 
                            $new_name = $rowactive_language['name'];  
                            $active_language .= '<li><form method="GET" action="?'.$new_code.'"><button type="submit" class="lang-btn">'.$new_name.'</button><input type="hidden" value="'.$new_code.'" name="lang"></form></li>'; 
                               } 

                        $news_group_active_languages = 'yes';
                        $news_group_active_language = '';
                        $sqlnews_group_active_language = 'select * from lang WHERE status = "'.$news_group_active_languages.'" ';
                            $retvalnews_group_active_language = mysql_query( $sqlnews_group_active_language, $conn );                 
                                 if(! $retvalnews_group_active_language )
                                 {
                                    die('Could not get data: ' . mysql_error());
                                 }

                            while($rownews_group_active_language = mysql_fetch_array($retvalnews_group_active_language, MYSQL_ASSOC)){
                            $new_code = $rownews_group_active_language['code']; 
                            $new_name = $rownews_group_active_language['name'];  
                            $news_group_active_language .= '<li><form method="GET" action="/Admin/AddArticles/"><button type="submit" class="lang-btn">'.$new_name.'</button><input type="hidden" value="'.$new_code.'" name="lang"><input type="hidden" class="second_misc" name="miscid"></form></li>'; 
                               } 



                        $case_group_active_languages = 'yes';
                        $case_group_active_language = '';
                        $sqlcase_group_active_language = 'select * from lang WHERE status = "'.$case_group_active_languages.'" ';
                            $retvalcase_group_active_language = mysql_query( $sqlcase_group_active_language, $conn );                 
                                 if(! $retvalcase_group_active_language )
                                 {
                                    die('Could not get data: ' . mysql_error());
                                 }

                            while($rowcase_group_active_language = mysql_fetch_array($retvalcase_group_active_language, MYSQL_ASSOC)){
                            $new_code = $rowcase_group_active_language['code']; 
                            $new_name = $rowcase_group_active_language['name'];  
                            $case_group_active_language .= '<li><form method="GET" action="/Admin/AddEvent/"><button type="submit" class="lang-btn">'.$new_name.'</button><input type="hidden" value="'.$new_code.'" name="lang"><input type="hidden" class="second_misc" name="miscid"></form></li>'; 
                               } 

                        $solution_group_active_languages = 'yes';
                        $solution_group_active_language = '';
                        $sqlsolution_group_active_language = 'select * from lang WHERE status = "'.$solution_group_active_languages.'" ';
                            $retvalsolution_group_active_language = mysql_query( $sqlsolution_group_active_language, $conn );                 
                                 if(! $retvalsolution_group_active_language )
                                 {
                                    die('Could not get data: ' . mysql_error());
                                 }

                            while($rowsolution_group_active_language = mysql_fetch_array($retvalsolution_group_active_language, MYSQL_ASSOC)){
                            $new_code = $rowsolution_group_active_language['code']; 
                            $new_name = $rowsolution_group_active_language['name'];  
                            $solution_group_active_language .= '<li><form method="GET" action="/Admin/AddWorkshop/"><button type="submit" class="lang-btn">'.$new_name.'</button><input type="hidden" value="'.$new_code.'" name="lang"><input type="hidden" class="second_misc" name="miscid"></form></li>'; 
                               } 


                        $product_group_active_languages = 'yes';
                        $product_group_active_language = '';
                        $sqlproduct_group_active_language = 'select * from lang WHERE status = "'.$product_group_active_languages.'" ';
                            $retvalproduct_group_active_language = mysql_query( $sqlproduct_group_active_language, $conn );                 
                                 if(! $retvalproduct_group_active_language )
                                 {
                                    die('Could not get data: ' . mysql_error());
                                 }

                            while($rowproduct_group_active_language = mysql_fetch_array($retvalproduct_group_active_language, MYSQL_ASSOC)){
                            $new_code = $rowproduct_group_active_language['code']; 
                            $new_name = $rowproduct_group_active_language['name'];  
                            $product_group_active_language .= '<li><form method="GET" action="/Admin/AddFAQ/"><button type="submit" class="lang-btn">'.$new_name.'</button><input type="hidden" value="'.$new_code.'" name="lang"><input type="hidden" class="second_misc" name="miscid"></form></li>'; 
                               } 

                        


?>