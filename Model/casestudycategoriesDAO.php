<?php
include '../lang/lang.php';
mysql_set_charset("utf8");

include 'menuDAO.php';
include 'footerDAO.php';

$current_lang = $_SESSION['lang'];
$categoryid = mysql_real_escape_string($_GET['category_id'],$conn);

                        $sqlall_categoriesen = 'select * from digisurf_category_list where code ="'.$current_lang.'" and text2="'.$categoryid.'" order by idx desc';
                        $retval_all_categories_en = mysql_query( $sqlall_categoriesen, $conn );                 
                             if(! $retval_all_categories_en )
                             {
                                die('Could not get data: ' . mysql_error());
                             } 

                        $allcactegories = '';
                        while($row_all_categories_en = mysql_fetch_array($retval_all_categories_en, MYSQL_ASSOC)){
                            $text1 = $row_all_categories_en['text1'];

                        $sqlacategorycases= 'select * from digisurf_project where code ="'.$current_lang.'" and idx="'.$text1.'" order by idx desc';
                        $retval_acategorycases = mysql_query( $sqlacategorycases, $conn );                 
                             if(! $retval_acategorycases )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

                        while($row_all_categories = mysql_fetch_array($retval_acategorycases, MYSQL_ASSOC)){
                          $idx = $row_all_categories['idx'];
                            $text8 = $row_all_categories['text8'];
                            $text9 = $row_all_categories['text9'];
                            $image = $row_all_categories['image1']; 
                            $url = $row_all_categories['url'];

                            $case_textparagraph8 = trim($text8);
                            $case_trimmedtext8 = nl2br($case_textparagraph8); 
                            $case_text8 = $case_trimmedtext8; 

                                         $allcactegories .= '<a href="/Case_Studies/projects/'.$url.'" class="lvn-grid1-3">
                                                                <div class="case-item">
                                                                    <div class="case-item-in">
                                                                        <div class="case-item-person">
                                                                            <img src="'.$image.'"/>
                                                                          </div>
                                                                          <div class="case-item-name">
                                                                            <h4>'.$case_text8.'</h4>
                                                                          </div>
                                                                          <div class="case-item-desc">
                                                                            <p>'.$text9.'</p>
                                                                          </div>
                                                                      </div>
                                                                  </div>
                                                              </a>';                     
                                                            }
                                          
                        }





                        $sqlmain_projecten = 'select * from digisurf_case where code ="'.$current_lang.'"';
                        $retvalmain_projecten = mysql_query( $sqlmain_projecten, $conn );                 
                             if(! $retvalmain_projecten )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

                        $rowmain_projecten = mysql_fetch_array($retvalmain_projecten, MYSQL_ASSOC);
                            $main_case_text1 = $rowmain_projecten['text1'];
                            $main_case_text2 = $rowmain_projecten['text2'];
                            $main_case_text3 = $rowmain_projecten['text3'];
                            $main_case_text4 = $rowmain_projecten['text4'];
                            $main_case_text5 = $rowmain_projecten['text5'];
                            $main_case_text6 = $rowmain_projecten['text6'];
                            $main_case_text7 = $rowmain_projecten['text7']; 

?>