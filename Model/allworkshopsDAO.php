<?php
include '../lang/lang.php';
mysql_set_charset("utf8");
session_start();

include 'menuDAO.php';
include 'footerDAO.php';

$current_lang = $_SESSION['lang'];


$all_workshops = '';
$category = '';
$all_workshops_catag = '';
$all_recent_workshops = '';

                        $sql_all_workshops = 'select * from digisurf_solution where code ="'.$current_lang.'" ORDER BY sortable_order ASC';
                        $retval_all_workshops = mysql_query( $sql_all_workshops, $conn );                 
                             if(! $retval_all_workshops )
                             {
                                die('Could not get data: ' . mysql_error());
                             } 

                        while($all_workshops_all = mysql_fetch_array($retval_all_workshops, MYSQL_ASSOC)){
                            $all_workshops_text1 = $all_workshops_all['text1'];
                            $all_workshops_text2 = $all_workshops_all['text2'];
                            $all_workshops_entext3 = $all_workshops_all['text3'];
                            $all_workshops_entext4 = $all_workshops_all['text4'];
                            $all_workshops_entext5 = $all_workshops_all['text5'];
                            $all_workshops_entext6 = $all_workshops_all['text6'];
                            $all_workshops_entext7 = $all_workshops_all['text7'];
                            $all_workshops_image1 = $all_workshops_all['image1'];
                            $all_workshops_url = $all_workshops_all['url'];
                            $all_workshops_misc_id = $all_workshops_all['misc_id'];
                            $all_workshops_creation_date = $all_workshops_all['creation_date'];

                            $all_workshops_trimmedtext3 = nl2br($all_workshops_entext3); 
                            $all_workshops_one_text3 = $all_workshops_trimmedtext3; 
                            $all_workshops_text3 = $all_workshops_one_text3;

                            // $the_workshop_date = date_create($all_workshops_creation_date);
                            // $Some_workshopDate = date_format($the_workshop_date, 'M. d, Y');

                            $the_workshop_date = date_create($all_workshops_entext4);
                            $Some_workshopDate = date_format($the_workshop_date, 'M. d, Y');

                            $_SESSION['url_workshop'] .= $all_workshops_url;

                            $all_workshops .= '<section class="workshop-section">
                                                  <div class="container">
                                                    <div class="row">
                                                      <div class="col-md-4">
                                                        <div class="row work-date">'.$Some_workshopDate.'</div>
                                                        <div class="row workshop-title"><h1>'.$all_workshops_entext5.'</h1></div>
                                                        <div class="row workshop-p"><p>'.$all_workshops_entext6.'</p></div>
                                                        <div class="row workshop-btn"><button onclick="/JoinUs">Join</button></div>              
                                                      </div>
                                                      <div class="col-md-8">
                                                        <div class="workshop-img"><img src="'.$all_workshops_image1.'" style="filter: brightness(50%);"></div>                 
                                                      </div>
                                                    </div>
                                                  </div>
                                              </section>';                                                 
                        


                        $sqlcat_list = 'select * from digisurf_category_list WHERE text1="'.$all_workshops_misc_id.'" and code="'.$current_lang.'" ';
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
 


                                         $all_workshops_catag .= '<li class="filtr-item-fix the-blogs" >
                                                        <a href="/Single/workshop/'.$all_workshops_url.'">
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




                        $sqlmain_projecten = 'select * from digisurf_solution where code ="'.$current_lang.'"';
                        $retvalmain_projecten = mysql_query( $sqlmain_projecten, $conn );                 
                             if(! $retvalmain_projecten )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

                        $rowmain_projecten = mysql_fetch_array($retvalmain_projecten, MYSQL_ASSOC);
                            $main_workshop_text1 = $rowmain_projecten['text1'];
                            $main_workshop_text2 = $rowmain_projecten['text2'];
                            $main_workshop_text3 = $rowmain_projecten['text3'];
                            $main_workshop_text4 = $rowmain_projecten['text4'];

                        $sqlcategory = 'select * from digisurf_categories WHERE code="'.$current_lang.'" ORDER BY sortable_order ASC';
                        $retvalcategory = mysql_query( $sqlcategory, $conn );                 
                             if(! $retvalcategory )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

                        
                        while($rowcategory = mysql_fetch_array($retvalcategory, MYSQL_ASSOC)){
                                $category_idx = $rowcategory['idx'];
                                $category_text1 = $rowcategory['text1'];
                                $category_text2 = $rowcategory['text2'];
                                //$category .= '<li><option name="category_name" value="'.$idx.'" class="names">'.$category_text1.'</option></li>';  <li class="categories event_filter" data-filter="'.$category_text2.'">'.$category_text1.'</li>
                                $category .= '<li class="categories"><input class="event_filter" type="button" value="'.$category_text2.'">'.$category_text1.'</li>';
                             }

                        // $all_categories = '<form id="categ-form-en" accept-charset="UTF-8">
                        //   <select class="selectpicker" name="selected_category" id="form-select">
                        //         <li data-tokens="/workshop_Studies" ><option><a href="/workshop_Studies" class="">'.$main_workshop_text6.'</a></option></li>
                        //         '.$category.'
                        //   </select>
                        // </form>';


                        $sql_all_recent_workshops = 'select * from digisurf_solution where code ="'.$current_lang.'" ORDER BY sortable_order DESC LIMIT 3';
                        $retval_all_recent_workshops = mysql_query( $sql_all_recent_workshops, $conn );                 
                             if(! $retval_all_recent_workshops )
                             {
                                die('Could not get data: ' . mysql_error());
                             } 

                        while($all_recent_workshops_all = mysql_fetch_array($retval_all_recent_workshops, MYSQL_ASSOC)){
                            $all_recent_workshops_text1 = $all_recent_workshops_all['text1'];
                            $all_recent_workshops_text2 = $all_recent_workshops_all['text2'];
                            $all_recent_workshops_entext3 = $all_recent_workshops_all['text3'];
                            $all_recent_workshops_image1 = $all_recent_workshops_all['image1'];
                            $all_recent_workshops_url = $all_recent_workshops_all['url'];
                            $all_recent_workshops_misc_id = $all_recent_workshops_all['misc_id'];
                            $all_recent_workshops_creation_date = $all_recent_workshops_all['creation_date'];

                            $all_recent_workshops .= '<a href="/Single/workshop/'.$all_recent_workshops_url.'" >'.$all_recent_workshops_text1.'</a><br><br>';
                        }

?>