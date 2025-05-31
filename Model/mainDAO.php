<?php
include 'lang/lang.php';
mysql_set_charset("utf8");
error_reporting(E_ALL);

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
                            $index_text1 = $rowen_index['text1'];
                            $index_text2 = $rowen_index['text2'];
                            $index_text3 = $rowen_index['text3'];
                            $index_text4 = $rowen_index['text4'];
                            $index_text5 = $rowen_index['text5'];
                            $index_text6 = $rowen_index['text6'];
                            $index_text7 = $rowen_index['text7'];
                            $index_entext8 = $rowen_index['text8'];
                            $index_text9 = $rowen_index['text9'];
                            $index_text10 = $rowen_index['text10'];
                            $index_text11 = $rowen_index['text11'];
                            $index_entext12 = $rowen_index['text12'];
                            $index_text13 = $rowen_index['text13'];
                            $index_text14 = $rowen_index['text14'];
                            $index_text15 = $rowen_index['text15'];
                            $index_entext16 = $rowen_index['text16'];
                            $index_text17 = $rowen_index['text17'];
                            $index_text18 = $rowen_index['text18'];
                            $index_text19 = $rowen_index['text19'];
                            $index_entext20 = $rowen_index['text20'];
                            $index_text21 = $rowen_index['text21'];
                            $index_text22 = $rowen_index['text22'];
                            $index_text23 = $rowen_index['text23'];
                            $index_text23 = $rowen_index['text23'];
                            $index_entext24 = $rowen_index['text24'];
                            $index_text24 = $rowen_index['text24'];
                            $index_text25 = $rowen_index['text25'];
                            $index_text26 = $rowen_index['text26'];
                            $index_text27 = $rowen_index['text27'];
                            $index_text28 = $rowen_index['text28'];
                            $index_entext29 = $rowen_index['text29'];
                            $index_text30 = $rowen_index['text30'];
                            $index_text31 = $rowen_index['text31'];
                            $index_entext32 = $rowen_index['text32'];
                            $index_text33 = $rowen_index['text33'];
                            $index_entext34 = $rowen_index['text34'];
                            $index_text35 = $rowen_index['text35'];
                            $index_entext36 = $rowen_index['text36'];
                            $index_text37 = $rowen_index['text37'];
                            $index_entext38 = $rowen_index['text38'];
                            $index_text39 = $rowen_index['text39'];
                            $index_entext40 = $rowen_index['text40'];
                            $index_text41 = $rowen_index['text41'];
                            $index_text42 = $rowen_index['text42'];
                            $index_image1 = $rowen_index['image1'];
                            $index_image2 = $rowen_index['image2'];
                            $index_image3 = $rowen_index['image3'];
                            $index_image4 = $rowen_index['image4'];
                            $index_image5 = $rowen_index['image5'];
                            $index_image6 = $rowen_index['image6'];
                            $index_image7 = $rowen_index['image7'];
                            $index_image8 = $rowen_index['image8'];
                            $index_image9 = $rowen_index['image9'];
                            $index_image10 = $rowen_index['image10'];
                            $index_views = $rowen_index['views'];

                            $view_update = $index_views+1;


                            $index_text1 = $index_text1;
                            $index_text2 = $index_text2;
                            $index_text3 = $index_text3;
                            $index_textparagraph8 = trim($index_entext8);
                            $index_trimmedtext8 = nl2br($index_textparagraph8); 
                            $index_text8 = $index_trimmedtext8; 
                            $index_textparagraph12 = trim($index_entext12);
                            $index_trimmedtext12 = nl2br($index_textparagraph12); 
                            $index_text12 = $index_trimmedtext12; 
                            $index_textparagraph16 = trim($index_entext16);
                            $index_trimmedtext16 = nl2br($index_textparagraph16); 
                            $index_text16 = $index_trimmedtext16; 
                            $index_textparagraph20 = trim($index_entext20);
                            $index_trimmedtext20 = nl2br($index_textparagraph20); 
                            $index_text20 = $index_trimmedtext20; 
                            $index_textparagraph24 = trim($index_entext24);
                            $index_trimmedtext24 = nl2br($index_textparagraph24); 
                            $index_text24 = $index_trimmedtext24;
                            $index_textparagraph29 = trim($index_entext29);
                            $index_trimmedtext29 = nl2br($index_textparagraph29); 
                            $index_text29 = $index_trimmedtext29; 
                            $index_textparagraph32 = trim($index_entext32);
                            $index_trimmedtext32 = nl2br($index_textparagraph32); 
                            $index_text32 = $index_trimmedtext32; 
                            $index_textparagraph34 = trim($index_entext34);
                            $index_trimmedtext34 = nl2br($index_textparagraph34); 
                            $index_text34 = $index_trimmedtext34; 
                            $index_textparagraph36 = trim($index_entext36);
                            $index_trimmedtext36 = nl2br($index_textparagraph36); 
                            $index_text36 = $index_trimmedtext36; 
                            $index_textparagraph38 = trim($index_entext38);
                            $index_trimmedtext38 = nl2br($index_textparagraph38); 
                            $index_text38 = $index_trimmedtext38; 
                            $index_textparagraph40 = trim($index_entext40);
                            $index_trimmedtext40 = nl2br($index_textparagraph40); 
                            $index_text40 = $index_trimmedtext40; 
                            $index_image1 = $index_image1;




                        $sqlpackage_categories = 'select * from digisurf_package_categories where code="'.$current_lang.'" order by idx DESC';
                        $retvalpackage_categories = mysql_query( $sqlpackage_categories, $conn );                 
                             if(! $retvalpackage_categories )
                             {
                                die('Could not get data: ' . mysql_error());
                             }
                        $all_package_categories = '';     
                        while($rowpackage_categories = mysql_fetch_array($retvalpackage_categories, MYSQL_ASSOC)){
                          $cat_idx = $rowpackage_categories['idx'];
                          $category_name = $rowpackage_categories['category_name'];
                          $category_id = $rowpackage_categories['category_id'];
                          $image1 = $rowpackage_categories['image1'];
                          $url = $rowpackage_categories['url'];
                          $all_package_categories .= '<a href="Package/Category/'.$url.'" class="lvn-grid1-6">
                                                        <div class="lvn-cat">
                                                            <div class="lvn-cat-in">
                                                              <div class="lvn-cat-top">
                                                                  <img src="'.$image1.'"/>
                                                                </div>
                                                                <div class="lvn-cat-bottom">
                                                                  <h4>'.$category_name.'</h4>
                                                                    <p>This is a test</p>
                                                                    <p>This is a test</p>
                                                                    <p>Thisg is a gtest</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>'; 
                        }

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
                        //Index Solutions
                        $sql_mainprojecten = 'select * from digisurf_solution where code ="'.$current_lang.'" ORDER BY sortable_order ASC LIMIT 3';
                        $retval_mainprojecten = mysql_query( $sql_mainprojecten, $conn );                 
                             if(! $retval_mainprojecten )
                             {
                                die('Could not get data: ' . mysql_error());
                             }    




                        //Index Articles
                        $sql_index_articles = 'select text1, text2, text3, text4, url, image1 from digisurf_blog where code ="'.$current_lang.'" ORDER BY sortable_order ASC Limit 2';
                        $retval_index_articles_db = mysql_query( $sql_index_articles, $conn );                 
                             if(! $retval_index_articles_db )
                             {
                                die('Could not get data: ' . mysql_error());
                             }



                        //Index All Solutions
                        $sql_mainprojecten = 'select * from digisurf_solution where code ="'.$current_lang.'" ORDER BY sortable_order ASC';
                        $retval_index_all_solutions = mysql_query( $sql_mainprojecten, $conn );                 
                             if(! $retval_index_all_solutions )
                             {
                                die('Could not get data: ' . mysql_error());
                             } 

                        //Index Case Studies first
                        $sql_maincaseen = 'select * from digisurf_project where code ="'.$current_lang.'" ORDER BY sortable_order ASC';
                        $retval_index_cases = mysql_query( $sql_maincaseen, $conn );                 
                             if(! $retval_index_cases )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

                        //Index Case Studies More
                        $sql_index_cases_moreen = 'select * from digisurf_project where code ="'.$current_lang.'" ORDER BY sortable_order ASC Limit 2 offset 1';
                        $retval_index_cases_moreen = mysql_query( $sql_index_cases_moreen, $conn );                 
                             if(! $retval_index_cases_moreen )
                             {
                                die('Could not get data: ' . mysql_error());
                             }


                        $sql_index_cases_all = 'select * from digisurf_project where code ="'.$current_lang.'" ORDER BY sortable_order ASC Limit 3';
                        $retval_index_cases_all = mysql_query( $sql_index_cases_all, $conn );                 
                             if(! $retval_index_cases_all )
                             {
                                die('Could not get data: ' . mysql_error());
                             }


                        $sql_first_slider = 'select * from index_first_slider ORDER BY idx DESC';
                        $retval_first_slider = mysql_query( $sql_first_slider, $conn );                 
                             if(! $retval_first_slider )
                             {
                                die('Could not get data: ' . mysql_error());
                             } 

                        $index_articles_all = '';
                        while($index_articles_db = mysql_fetch_array($retval_index_articles_db, MYSQL_ASSOC)) {
                            $index_articles_text1 = $index_articles_db['text1'];
                            $index_articles_entext2 = $index_articles_db['text2'];
                            $index_articles_entext3 = $index_articles_db['text3'];
                            $index_articles_image1 = $index_articles_db['image1'];
                            $index_articles_url = $index_articles_db['url'];
                            $index_articles_creation_date = $index_articles_db['creation_date'];

                            // $index_articles_trimmedtext2 = nl2br($index_articles_entext2); 
                            // $index_articles_one_text2 = $index_articles_trimmedtext2; 
                            // $index_articles_text2 = $index_articles_one_text2;

                            $index_article_date = date_create($index_articles_creation_date);
                            $index_articleDate = date_format($index_article_date, 'M. d, Y');

                                      $index_articles_all .= '<figure class="effect-articles">
                                                                  <img src="'.$index_articles_image1.'" alt="'.$index_articles_image1.'"/>
                                                                  <figcaption>
                                                                      <span class="article-date">'.$index_articleDate.'</span>
                                                                      <h2 class="article-title"><span>'.$index_articles_text1.'</span></h2>
                                                                      <p class="article-p"><div>'.$index_articles_entext2.'</div></p>
                                                                      <!--<p class="article-p">'.$index_articles_entext3.'</p>-->
                                                                      <a href="/Single/Article/'.$index_articles_url.'">View more</a>
                                                                  </figcaption>           
                                                              </figure>';                                                 
                        }   


                        $first_slides = '';
                        while($first_slider = mysql_fetch_array($retval_first_slider, MYSQL_ASSOC)){
                            $text1 = $first_slider['text1'];
                            $text2 = $first_slider['text2'];
                            $text3 = $first_slider['text3'];
                            $text4 = $first_slider['text4'];
                            $text5 = $first_slider['text5'];
                            $text6 = $first_slider['text6'];
                            $image1 = $first_slider['image1'];

                                      $first_slides .= '<div class="swiper-slide">
                                                          <div class="info">
                                                              <h1>'.$text1.'</h1>
                                                              <p>'.$text2.'</p>
                                                              <!--<a href="'.$text4.'" class="btn">'.$text3.'</a>
                                                              <a href="'.$text6.'" class="btn">'.$text5.'</a>-->
                                                              <a href="/Location_Explore" class="btn">'.$text3.'</a>
                                                              <!--<a href="'.$text6.'" class="btn">'.$text5.'</a>-->
                                                              <a href="/Location_Explore" class="btn">'.$text5.'</a>
                                                          </div>
                                                          <div class="background">
                                                              <!--<img src="/assets/images/img-home.svg" alt="">-->
                                                              <img src="'.$image1.'" alt="" style="filter: brightness(50%);">
                                                          </div>
                                                      </div>';                                                 
                        }

                        $sql_second_slider = 'select * from index_second_slider ORDER BY idx DESC';
                        $retval_second_slider = mysql_query( $sql_second_slider, $conn );                 
                             if(! $retval_second_slider )
                             {
                                die('Could not get data: ' . mysql_error());
                             }    


                        $second_slides = '';
                        while($second_slider = mysql_fetch_array($retval_second_slider, MYSQL_ASSOC)){
                            $secong_slider_text1 = $second_slider['text1'];
                            $secong_slider_text2 = $second_slider['text2'];
                            $secong_slider_text3 = $second_slider['text3'];
                            $image1 = $second_slider['image1'];

                                      $second_slides .= '<div class="swiper-slide">
                                                            <div class="info">
                                                                <h1>'.$secong_slider_text1.'</h1>
                                                                <a href="'.$secong_slider_text3.'" class="btn">'.$secong_slider_text2.'</a>
                                                            </div>
                                                            <div class="background">
                                                                <img src="'.$image1.'" alt="">
                                                            </div>
                                                        </div>';                                                     
                        }


                        $sqlAllWorkshopsen = 'select * from digisurf_solution where code ="'.$current_lang.'" ORDER BY sortable_order ASC';
                        $retval_AllWorkshops_en = mysql_query( $sqlAllWorkshopsen, $conn );                 
                             if(! $retval_AllWorkshops_en )
                             {
                                die('Could not get data: ' . mysql_error());
                             }  

                        $index_allworkshops = '';
                        while($row_AllWorkshops_en = mysql_fetch_array($retval_AllWorkshops_en, MYSQL_ASSOC)){
                            $idx = $row_AllWorkshops_en['idx'];
                            $text_en4 = $row_AllWorkshops_en['text4'];
                            $text_en5 = $row_AllWorkshops_en['text5'];
                            $image = $row_AllWorkshops_en['image1']; 
                            $icon = $row_AllWorkshops_en['image4']; 
                            $url = $row_AllWorkshops_en['url'];
                            $sortable_order = $row_AllWorkshops_en['sortable_order'];

                            if ($sortable_order < 10){
                                $id = sprintf("%02d", $sortable_order);
                            } else {
                                $id = $sortable_order;
                            }

                            $index_textparagraph5 = trim($text_en5);
                            $index_trimmedtext5 = nl2br($index_textparagraph5); 
                            $index_text5 = $index_trimmedtext5;

                            $index_the_workshop_date = date_create($text_en4);
                            $index_text4 = date_format($index_the_workshop_date, 'M. d, Y');

                           $index_allworkshops .= '<div class="swiper-slide">
                                                      <div class="info">
                                                          <h1>'.$index_text4.'</h1>
                                                          <p>'.$index_text5.'</p>
                                                          <a href="#" class="btn">Join Now</a>
                                                      </div>
                                                      <div class="background">
                                                          <img src="'.$image.'" alt="" style="filter: brightness(50%);">
                                                      </div>
                                                  </div>';                

                                          
                        }


                        $sql_index_events = 'select * from digisurf_project ORDER BY sortable_order ASC';
                        $retval_index_events = mysql_query( $sql_index_events, $conn );                 
                             if(! $retval_index_events )
                             {
                                die('Could not get data: ' . mysql_error());
                             } 


                        $index_events_all = '';
                        while($index_events = mysql_fetch_array($retval_index_events, MYSQL_ASSOC)){
                            $index_events_text1 = $index_events['text1'];
                            $index_events_entext4 = $index_events['text4'];
                            $index_events_entext5 = $index_events['text5'];
                            $index_events_image1 = $index_events['image1'];
                            $index_events_url = $index_events['url'];

                            // $index_events_trimmedtext6 = nl2br($index_events_entext6); 
                            // $index_events_one_text6 = $index_events_trimmedtext6; 
                            // $index_events_text6 = $index_events_one_text6;

                                      $index_events_all .= '<a href="/Events/'.$index_events_url.'" class="digisurf-grid1-3">
                                                                  <div class="event-item">
                                                                      <div class="event-item-in">
                                                                          <div class="event-item-top">
                                                                              <img src="'.$index_events_image1.'"/>
                                                                          </div>
                                                                          <div class="event-item-bottom">
                                                                              <div class="">
                                                                                  <p class="event-date">'.date('M d - Y').'</p>
                                                                                  <h4>'.$index_events_entext4.'</h4>
                                                                                  <p>'.$index_events_entext5.'</p>
                                                                                  <span>(read more)</span>
                                                                              </div>
                                                                          </div>
                                                                      </div>
                                                                  </div>
                                                              </a>';                                                 
                        }


?>