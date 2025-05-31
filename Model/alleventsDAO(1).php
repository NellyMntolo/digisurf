<?php
include '../lang/lang.php';
mysql_set_charset("utf8");

include 'menuDAO.php';
include 'footerDAO.php';

$current_lang = $_SESSION['lang'];


$all_events = '';
$category = '';
$all_events_catag = '';
$all_recent_events = '';

                        $sql_all_events = 'select * from digisurf_event where code ="'.$current_lang.'" ORDER BY sortable_order ASC LIMIT 3';
                        $retval_all_events = mysql_query( $sql_all_events, $conn );                 
                             if(! $retval_all_events )
                             {
                                die('Could not get data: ' . mysql_error());
                             } 

                        while($all_events_all = mysql_fetch_array($retval_all_events, MYSQL_ASSOC)){
                            $all_events_text1 = $all_events_all['text1'];
                            $all_events_text2 = $all_events_all['text2'];
                            $all_events_entext3 = $all_events_all['text3'];
                            $all_events_image1 = $all_events_all['image1'];
                            $all_events_url = $all_events_all['url'];
                            $all_events_misc_id = $all_events_all['misc_id'];
                            $all_events_creation_date = $all_events_all['creation_date'];

                            $all_events_trimmedtext3 = nl2br($all_events_entext3); 
                            $all_events_one_text3 = $all_events_trimmedtext3; 
                            $all_events_text3 = $all_events_one_text3;

                            $the_event_date = date_create($all_events_creation_date);
                            $Some_eventDate = date_format($the_event_date, 'M. d, Y');

                            $all_events .= '<a class="all_events col-md-8" href="/Single/event/'.$all_events_url.'">
                                                <img class="all_events_image" src="'.$all_events_image1.'">
                                                <span class="all_events_date">'.$Some_eventDate.'</span>
                                                <h2 class="all_events_title">'.$all_events_text1.'</h2>
                                                <p class="all_events_p">'.$all_events_text2.'</p>
                                              </a>';                                                 
                        


                        $sqlcat_list = 'select * from digisurf_category_list WHERE text1="'.$all_events_misc_id.'" and code="'.$current_lang.'" ';
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
 


                                         $all_events_catag .= '<li class="filtr-item-fix the-blogs" >
                                                        <a href="/Single/event/'.$all_events_url.'">
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




                        $sqlmain_projecten = 'select * from digisurf_event where code ="'.$current_lang.'"';
                        $retvalmain_projecten = mysql_query( $sqlmain_projecten, $conn );                 
                             if(! $retvalmain_projecten )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

                        $rowmain_projecten = mysql_fetch_array($retvalmain_projecten, MYSQL_ASSOC);
                            $main_event_text1 = $rowmain_projecten['text1'];
                            $main_event_text2 = $rowmain_projecten['text2'];
                            $main_event_text3 = $rowmain_projecten['text3'];
                            $main_event_text4 = $rowmain_projecten['text4'];
                            $main_event_image1 = $rowmain_projecten['image1'];    

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
                        //         <li data-tokens="/event_Studies" ><option><a href="/event_Studies" class="">'.$main_event_text6.'</a></option></li>
                        //         '.$category.'
                        //   </select>
                        // </form>';


                        $sql_all_recent_events = 'select * from digisurf_event where code ="'.$current_lang.'" ORDER BY sortable_order DESC LIMIT 3';
                        $retval_all_recent_events = mysql_query( $sql_all_recent_events, $conn );                 
                             if(! $retval_all_recent_events )
                             {
                                die('Could not get data: ' . mysql_error());
                             } 

                        while($all_recent_events_all = mysql_fetch_array($retval_all_recent_events, MYSQL_ASSOC)){
                            $all_recent_events_text1 = $all_recent_events_all['text1'];
                            $all_recent_events_text2 = $all_recent_events_all['text2'];
                            $all_recent_events_entext3 = $all_recent_events_all['text3'];
                            $all_recent_events_image1 = $all_recent_events_all['image1'];
                            $all_recent_events_url = $all_recent_events_all['url'];
                            $all_recent_events_misc_id = $all_recent_events_all['misc_id'];
                            $all_recent_events_creation_date = $all_recent_events_all['creation_date'];

                            $all_recent_events .= '<a href="/Single/event/'.$all_recent_events_url.'" >'.$all_recent_events_text1.'</a><br><br>';
                        }

?>