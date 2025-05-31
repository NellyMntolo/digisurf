<?php
include 'lang/lang.php';
mysql_set_charset("utf8");

include 'menuDAO.php';
include 'footerDAO.php';

$current_lang = $_SESSION['lang'];

                        //CONTENT
                        $sqlen_index = 'select * from digisurf_index where code ="'.$current_lang.'"';
                        $retvalen_index = mysql_query( $sqlen_index, $conn );
                             if(! $retvalen_index )
                             {
                                die('Could not get data: ' . mysql_error());
                             }
                        $rowen_index = mysql_fetch_array($retvalen_index, MYSQL_ASSOC);
                            $index_entext1 = $rowen_index['text1'];
                            $index_entext2 = $rowen_index['text2'];
                            $index_entext3 = $rowen_index['text3'];
                            $index_entext4 = $rowen_index['text4'];
                            $index_entext5 = $rowen_index['text5'];
                            $index_entext6 = $rowen_index['text6'];
                            $index_entext7 = $rowen_index['text7'];
                            $index_entext8 = $rowen_index['text8'];
                            $index_entext9 = $rowen_index['text9'];
                            $index_entext10 = $rowen_index['text10'];
                            $index_entext11 = $rowen_index['text11'];
                            $index_entext12 = $rowen_index['text12'];
                            $index_entext13 = $rowen_index['text13'];
                            $index_entext14 = $rowen_index['text14'];
                            $index_entext15 = $rowen_index['text15'];
                            $index_entext16 = $rowen_index['text16'];
                            $index_entext17 = $rowen_index['text17'];
                            $index_entext18 = $rowen_index['text18'];
                            $index_entext19 = $rowen_index['text19'];
                            $index_entext20 = $rowen_index['text20'];
                            $index_entext21 = $rowen_index['text21'];
                            $index_entext22 = $rowen_index['text22'];
                            $index_entext23 = $rowen_index['text23'];
                            $index_enimage1 = $rowen_index['image1'];
                            $index_enimage2 = $rowen_index['image2'];
                            $index_enimage3 = $rowen_index['image3'];
                            $index_enimage4 = $rowen_index['image4'];
                            $index_enimage5 = $rowen_index['image5'];
                            $index_enimage6 = $rowen_index['image6'];
                            $index_enimage7 = $rowen_index['image7'];
                            $index_enimage8 = $rowen_index['image8'];
                            $index_enimage9 = $rowen_index['image9'];
                            $index_enimage10 = $rowen_index['image10'];
                            $index_views = $rowen_index['views'];

                            $view_update = $index_views+1;


                            $index_text1 = $index_entext1;
                            $index_text2 = $index_entext2;
                            $index_text3 = $index_entext3;
                            $index_textparagraph4 = trim($index_entext4);
                            $index_trimmedtext4 = nl2br($index_textparagraph4); 
                            $index_text4 = $index_trimmedtext4; 
                            $index_textparagraph5 = trim($index_entext5);
                            $index_trimmedtext5 = nl2br($index_textparagraph5); 
                            $index_text5 = $index_trimmedtext5; 
                            $index_textparagraph6 = trim($index_entext6);
                            $index_trimmedtext6 = nl2br($index_textparagraph6); 
                            $index_text6 = $index_trimmedtext6; 
                            $index_textparagraph7 = trim($index_entext7);
                            $index_trimmedtext7 = nl2br($index_textparagraph7); 
                            $index_text7 = $index_trimmedtext7; 
                            $index_textparagraph8 = trim($index_entext8);
                            $index_trimmedtext8 = nl2br($index_textparagraph8); 
                            $index_text8 = $index_trimmedtext8; 
                            $index_textparagraph9 = trim($index_entext9);
                            $index_trimmedtext9 = nl2br($index_textparagraph9); 
                            $index_text9 = $index_trimmedtext9; 
                            $index_textparagraph10 = trim($index_entext10);
                            $index_trimmedtext10 = nl2br($index_textparagraph10); 
                            $index_text10 = $index_trimmedtext10; 
                            $index_textparagraph11 = trim($index_entext11);
                            $index_trimmedtext11 = nl2br($index_textparagraph11); 
                            $index_text11 = $index_trimmedtext11; 
                            $index_textparagraph12 = trim($index_entext12);
                            $index_trimmedtext12 = nl2br($index_textparagraph12); 
                            $index_text12 = $index_trimmedtext12;
                            $index_text13 = $index_entext13;
                            $index_text14 = $index_entext14;
                            $index_text15 = $index_entext15;
                            $index_text16 = $index_entext16;

/*
                        $sqlen_hits = 'select * from hits';
                        $retvalen_hits = mysql_query( $sqlen_hits, $conn );
                             if(! $retvalen_hits )
                             {
                                die('Could not get data: ' . mysql_error());
                             }
                        while($rowen_hits = mysql_fetch_array($retvalen_hits, MYSQL_ASSOC)){
                          $all_hits = $rowen_hits['hits'];
                          $string=implode("," , $all_hits);
                          echo $string;

                                if (in_array($_SERVER['REMOTE_ADDR'], $all_hits)) {
                                    echo "yes";
                                } else {

                                $sqla = 'INSERT INTO hits (hits) VALUES ( "'.$_SERVER['REMOTE_ADDR'].'")';

                                      $retvala = mysql_query( $sqla, $conn );
                                        if(! $retvala ) {  
                                            die('Could not enter data: ' . mysql_error());
                                          }


                            $sql_views="UPDATE digisurf_index SET views='".$view_update."' LIMIT 1 ";              
                               $retval_views = mysql_query( $sql_views, $conn );
                               if(! $retval_views )
                                   {
                                      die('Could not enter data: ' . mysql_error());
                                   }
                            $sql_views_zh="UPDATE digisurf_index_zh SET views='".$view_update."' LIMIT 1 ";              
                               $retval_views_zh = mysql_query( $sql_views_zh, $conn );
                               if(! $retval_views_zh )
                                   {
                                      die('Could not enter data: ' . mysql_error());
                                   }

                                }
                        }


                            */

                            

                            

                        $yes = 'yes';



                        //Index All Solutions
                        $sql_mainprojecten = 'select * from digisurf_solution where code ="'.$current_lang.'" ORDER BY sortable_order ASC Limit 1';
                        $retval_index_all_solutions = mysql_query( $sql_mainprojecten, $conn );                 
                             if(! $retval_index_all_solutions )
                             {
                                die('Could not get data: ' . mysql_error());
                             } 

                        //Index Case Studies first
                        $sql_maincaseen = 'select * from digisurf_project where code ="'.$current_lang.'" and publish = "yes" ORDER BY sortable_order ASC Limit 6';
                        $retval_index_cases = mysql_query( $sql_maincaseen, $conn );                 
                             if(! $retval_index_cases )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

                        //Index Case Studies More
                        $sql_index_cases_moreen = 'select * from digisurf_solution where code ="'.$current_lang.'" ORDER BY sortable_order ASC Limit 2 offset 1';
                        $retval_index_solutions_moreen = mysql_query( $sql_index_cases_moreen, $conn );                 
                             if(! $retval_index_solutions_moreen )
                             {
                                die('Could not get data: ' . mysql_error());
                             }


                    $index_all_solutions = $main_solutions;
                    $main_index_all_solutions = '';
                    while($row_index_all_solutions_en = mysql_fetch_array($retval_index_all_solutions, MYSQL_ASSOC)){
                        $idx = $row_index_all_solutions_en['idx'];
                        $text4 = $row_index_all_solutions_en['text4'];
                        $entext5 = $row_index_all_solutions_en['text5'];
                        $image = $row_index_all_solutions_en['image4']; 
                        $url = $row_index_all_solutions_en['url'];
                        $sortable_order = $row_index_all_solutions_en['sortable_order'];

                        $index_solutions_textparagraph5 = trim($entext5);
                        $index_solutions_trimmedtext5 = nl2br($index_solutions_textparagraph5); 
                        $text5 = $index_solutions_trimmedtext5;

                                    $main_index_all_solutions .= '<div class="panel panel-default">
                                                                  <div class="panel-heading" role="tab" id="heading'.$sortable_order.'">
                                                                    <h3 class="panel-title">
                                                                      <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse'.$sortable_order.'" aria-expanded="true" aria-controls="collapse'.$sortable_order.'">

                                                                        '.$text4.'
                                                                      </a>
                                                                    </h3>
                                                                  </div>
                                                                  <div id="collapse'.$sortable_order.'" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading'.$sortable_order.'">
                                                                    <div class="panel-body">
                                                                      <p>'.$text5.'</p>

                                                                      
                                                                    </div>
                                                                  </div>
                                                                </div>';

                                      
                    }
                    $index_all_solutions = $main_index_all_solutions;


                    $main_index_solutions_moreen = '';
                    while($row_index_solutions_moreen = mysql_fetch_array($retval_index_solutions_moreen, MYSQL_ASSOC)){
                        $idx = $row_index_solutions_moreen['idx'];
                        $text4 = $row_index_solutions_moreen['text4'];
                        $entext5 = $row_index_solutions_moreen['text5'];
                        $image = $row_index_solutions_moreen['image1']; 
                        $url = $row_index_solutions_moreen['url'];
                        $sortable_order = $row_index_solutions_moreen['sortable_order'];

                        $index_solutions_textparagraph5 = trim($entext5);
                        $index_solutions_trimmedtext5 = nl2br($index_solutions_textparagraph5); 
                        $text5 = $index_solutions_trimmedtext5;


                            $main_index_solutions_moreen .= '<div class="panel panel-default">
                                                                  <div class="panel-heading" role="tab" id="heading'.$sortable_order.'">
                                                                    <h3 class="panel-title">
                                                                      <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse'.$sortable_order.'" aria-expanded="false" aria-controls="collapse'.$sortable_order.'">

                                                                        '.$text4.'
                                                                      </a>
                                                                    </h3>
                                                                  </div>
                                                                  <div id="collapse'.$sortable_order.'" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading'.$sortable_order.'">
                                                                    <div class="panel-body">
                                                                      <p>'.$text5.'</p>

                                                                      
                                                                    </div>
                                                                  </div>
                                                                </div>';                
                    } 
                    $index_case_studies_more = $main_index_solutions_moreen;

                    $index_case_studies = $main_case_studies;
                    $main_index_case_studies_first = '';
                    while($row_index_case_studies_en = mysql_fetch_array($retval_index_cases, MYSQL_ASSOC)){
                        $caseidx = $row_index_case_studies_en['idx'];
                        $text4 = $row_index_case_studies_en['text4'];
                        $text5 = $row_index_case_studies_en['text5'];
                        $image = $row_index_case_studies_en['image1']; 
                        $url = $row_index_case_studies_en['url'];

                        $sqlcat_list = 'select * from digisurf_category_list WHERE text1="'.$caseidx.'" and code="'.$current_lang.'" ';
                        $retvalcat_list = mysql_query( $sqlcat_list, $conn );                 
                             if(! $retvalcat_list )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

                              $rowcat_list = mysql_fetch_array($retvalcat_list, MYSQL_ASSOC);
                              $cat_list_text2 = $rowcat_list['text2'];


                        $sqlcat_name = 'select * from digisurf_categories WHERE text2="'.$cat_list_text2.'" and code="'.$current_lang.'" ';
                        $retvalcat_name = mysql_query( $sqlcat_name, $conn );                 
                             if(! $retvalcat_name )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

                              $rowcat_name = mysql_fetch_array($retvalcat_name, MYSQL_ASSOC);
                              $cat_name_text1 = $rowcat_name['text1'];


                            $main_index_case_studies_first .= '<div class="col-md-4 nellyboot-animate">
                                                                  <div class="nellyboot-card with-hover">
                                                                    <div class="nellyboot-card-media">
                                                                      <a href="/Case_Studies/projects/'.$url.'"><img src="'.$image.'" class="img-responsive img-border" alt="'.$image.'"></a>
                                                                    </div>
                                                                    <div class="nellyboot-card-text">
                                                                      <h2 class="nellyboot-card-heading mb0">'.$text4.'</h2>
                                                                      <p class="category">'.$cat_name_text1.'</p>
                                                                      <p><a href="/Case_Studies/projects/'.$url.'">View details</a></p>
                                                                    </div>
                                                                  </div>
                                                                </div>';
                                                              }

                                      
                    $index_case_studies_first = $main_index_case_studies_first;


?>