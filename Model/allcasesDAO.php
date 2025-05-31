<?php
include '../lang/lang.php';
mysql_set_charset("utf8");

include 'menuDAO.php';
include 'footerDAO.php';

$current_lang = $_SESSION['lang'];

                        $sqlallcasesen = 'select * from digisurf_project where code ="'.$current_lang.'" ORDER BY sortable_order ASC';
                        $retval_allcases_en = mysql_query( $sqlallcasesen, $conn );                 
                             if(! $retval_allcases_en )
                             {
                                die('Could not get data: ' . mysql_error());
                             } 

                        $allcases = '';
                        while($row_allcases_en = mysql_fetch_array($retval_allcases_en, MYSQL_ASSOC)){
                            $caseidx = $row_allcases_en['idx'];
                            $text4 = $row_allcases_en['text4'];
                            $text5 = $row_allcases_en['text5'];
                            $image = $row_allcases_en['image1']; 
                            $misc_id = $row_allcases_en['misc_id'];
                            $url = $row_allcases_en['url'];

                            $case_textparagraph5 = trim($text5);
                            $case_trimmedtext5 = nl2br($case_textparagraph5); 
                            $case_text5 = $case_trimmedtext5;


                        $sqlcat_list = 'select * from digisurf_category_list WHERE text1="'.$misc_id.'" and code="'.$current_lang.'" ';
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
 


                                         $allcases .= '<li class="filtr-item-fix the-blogs" >
                                                        <a href="/News/Articles/'.$url.'">
                                                          <div class="img">
                                                            <img src="'.$image.'" alt="">
                                                          </div>
                                                          <div class="category">
                                                            <p>'.$cat_name_text1.'</p>
                                                          </div>
                                                          <div class="title">
                                                            <h3>'.$text4.'</h3>
                                                          </div>
                                                          <div class="info">
                                                            <p>'.$text5.'</p><span>(Read More)</span>
                                                          </div>
                                                        </a>
                                                    </li>';
                                   
                                          
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
                            $main_case_image1 = $rowmain_projecten['image1'];    

                        $sqlcategory = 'select * from digisurf_categories WHERE code="'.$current_lang.'" ORDER BY sortable_order ASC';
                        $retvalcategory = mysql_query( $sqlcategory, $conn );                 
                             if(! $retvalcategory )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

                        $category = '';
                        while($rowcategory = mysql_fetch_array($retvalcategory, MYSQL_ASSOC)){
                                $category_idx = $rowcategory['idx'];
                                $category_text1 = $rowcategory['text1'];
                                $category_text2 = $rowcategory['text2'];
                                //$category .= '<li><option name="category_name" value="'.$idx.'" class="names">'.$category_text1.'</option></li>';  <li class="categories event_filter" data-filter="'.$category_text2.'">'.$category_text1.'</li>
                                $category .= '<li class="categories"><input class="event_filter" type="button" value="'.$category_text2.'">'.$category_text1.'</li>';
                                                }

                        // $all_categories = '<form id="categ-form-en" accept-charset="UTF-8">
                        //   <select class="selectpicker" name="selected_category" id="form-select">
                        //         <li data-tokens="/Case_Studies" ><option><a href="/Case_Studies" class="">'.$main_case_text6.'</a></option></li>
                        //         '.$category.'
                        //   </select>
                        // </form>';

?>