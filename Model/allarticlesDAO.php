<?php
include '../lang/lang.php';
mysql_set_charset("utf8");
session_start();

include 'menuDAO.php';
include 'footerDAO.php';

$current_lang = $_SESSION['lang'];


$all_articles = '';
$category = '';
$all_articles_catag = '';
$all_recent_articles = '';

                        $sql_all_articles = 'select * from digisurf_blog where code ="'.$current_lang.'" ORDER BY sortable_order ASC';
                        $retval_all_articles = mysql_query( $sql_all_articles, $conn );                 
                             if(! $retval_all_articles )
                             {
                                die('Could not get data: ' . mysql_error());
                             } 

                        while($all_articles_all = mysql_fetch_array($retval_all_articles, MYSQL_ASSOC)){
                            $all_articles_text1 = $all_articles_all['text1'];
                            $all_articles_text2 = $all_articles_all['text2'];
                            $all_articles_entext3 = $all_articles_all['text3'];
                            $all_articles_image1 = $all_articles_all['image1'];
                            $all_articles_url = $all_articles_all['url'];
                            $all_articles_misc_id = $all_articles_all['misc_id'];
                            $all_articles_creation_date = $all_articles_all['creation_date'];

                            $all_articles_trimmedtext3 = nl2br($all_articles_entext3); 
                            $all_articles_one_text3 = $all_articles_trimmedtext3; 
                            $all_articles_text3 = $all_articles_one_text3;

                            $the_article_date = date_create($all_articles_creation_date);
                            $Some_articleDate = date_format($the_article_date, 'M. d, Y');

                            $_SESSION['url_article'] .= $all_articles_url;

                            $all_articles .= '<form class="all_articles col-md-8 search-item" action="/Single/Article/'.$all_articles_url.'" method="post">
                                                  <div class="search-item-in">
                                                      <img class="all_articles_image" src="'.$all_articles_image1.'">
                                                      <span class="all_articles_date">'.$Some_articleDate.'</span>
                                                      <h2 class="all_articles_title">'.$all_articles_text1.'</h2>
                                                      <p class="all_articles_p">'.$all_articles_text2.'</p>
                                                  </div>
                                                  <input type="hidden" name="myarticle" value="'.$all_articles_url.'">
                                                  <input type="submit" class="article_sub">
                                              </form>';


                        $sqlcat_list = 'select * from digisurf_category_list WHERE text1="'.$all_articles_misc_id.'" and code="'.$current_lang.'" ';
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
 


                                         $all_articles_catag .= '<li class="filtr-item-fix the-blogs" >
                                                        <a href="/Single/Article/'.$all_articles_url.'">
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




                        $sqlmain_projecten = 'select * from digisurf_blog where code ="'.$current_lang.'"';
                        $retvalmain_projecten = mysql_query( $sqlmain_projecten, $conn );                 
                             if(! $retvalmain_projecten )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

                        $rowmain_projecten = mysql_fetch_array($retvalmain_projecten, MYSQL_ASSOC);
                            $main_article_text1 = $rowmain_projecten['text1'];
                            $main_article_text2 = $rowmain_projecten['text2'];
                            $main_article_text3 = $rowmain_projecten['text3'];
                            $main_article_text4 = $rowmain_projecten['text4'];
                            $main_article_image1 = $rowmain_projecten['image1'];    

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
                        //         <li data-tokens="/article_Studies" ><option><a href="/article_Studies" class="">'.$main_article_text6.'</a></option></li>
                        //         '.$category.'
                        //   </select>
                        // </form>';


                        $sql_all_recent_articles = 'select * from digisurf_blog where code ="'.$current_lang.'" ORDER BY sortable_order DESC LIMIT 3';
                        $retval_all_recent_articles = mysql_query( $sql_all_recent_articles, $conn );                 
                             if(! $retval_all_recent_articles )
                             {
                                die('Could not get data: ' . mysql_error());
                             } 

                        while($all_recent_articles_all = mysql_fetch_array($retval_all_recent_articles, MYSQL_ASSOC)){
                            $all_recent_articles_text1 = $all_recent_articles_all['text1'];
                            $all_recent_articles_text2 = $all_recent_articles_all['text2'];
                            $all_recent_articles_entext3 = $all_recent_articles_all['text3'];
                            $all_recent_articles_image1 = $all_recent_articles_all['image1'];
                            $all_recent_articles_url = $all_recent_articles_all['url'];
                            $all_recent_articles_misc_id = $all_recent_articles_all['misc_id'];
                            $all_recent_articles_creation_date = $all_recent_articles_all['creation_date'];

                            $all_recent_articles .= '<form action="/Single/Article/'.$all_recent_articles_url.'" method="POST">'.$all_recent_articles_text1.'
                            <input type="hidden" name="myarticle" value="'.$all_recent_articles_url.'"><input type="submit" class="article_sub"></form><br>';

                            


                        }

?>