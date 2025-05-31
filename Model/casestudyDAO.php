<?php
include '../lang/lang.php';
mysql_set_charset("utf8");

include 'menuDAO.php';
include 'footerDAO.php';

$current_lang = $_SESSION['lang'];


$projectid = mysql_real_escape_string($_GET['blog_id'],$conn);
//$projectid = $_SESSION["project_session"];

//$getName = explode("/",$_SERVER['REQUEST_URI']);
$retval_singlecasezh = '';

                        $sqlprojecten = 'select * from digisurf_project WHERE url="'.$projectid.'" and code ="'.$current_lang.'" LIMIT 1';
                        $retval_singlecaseen = mysql_query( $sqlprojecten, $conn );                 
                             if(! $retval_singlecaseen )
                             {
                                die('Could not get data: ' . mysql_error());
                             }  


                        $row_singlecaseen = mysql_fetch_array($retval_singlecaseen, MYSQL_ASSOC);
                        $event_idx = $row_singlecaseen['idx']; 
                        $case_text1 = $row_singlecaseen['text1'];
                        $case_text2 = $row_singlecaseen['text2'];
                        $case_text3 = $row_singlecaseen['text3'];
                        $case_text4 = $row_singlecaseen['text4'];
                        $case_text5 = $row_singlecaseen['text5'];
                        $case_text6 = $row_singlecaseen['text6'];
                        $case_text7 = $row_singlecaseen['text7'];
                        $case_text8 = $row_singlecaseen['text8'];
                        $case_text9 = $row_singlecaseen['text9'];
                        $case_text10 = $row_singlecaseen['text10'];
                        $case_image1 = $row_singlecaseen['image1'];
                        $case_image2 = $row_singlecaseen['image2'];
                        $case_misc_id = $row_singlecaseen['misc_id'];
                        $case_url = $row_singlecaseen['url'];


                        $sqlcat_list_single = 'select * from digisurf_category_list WHERE text1="'.$case_misc_id.'" and code="'.$current_lang.'" ';
                        $retvalcat_list_single = mysql_query( $sqlcat_list_single, $conn );                 
                             if(! $retvalcat_list_single )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

                              $rowcat_list_single = mysql_fetch_array($retvalcat_list_single, MYSQL_ASSOC);
                              $cat_list_text2_single = $rowcat_list_single['text2'];


                        $sqlcat_name_single = 'select * from digisurf_categories WHERE text2="'.$cat_list_text2_single.'" and code="'.$current_lang.'" ';
                        $retvalcat_name_single = mysql_query( $sqlcat_name_single, $conn );                 
                             if(! $retvalcat_name_single )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

                              $rowcat_name_single = mysql_fetch_array($retvalcat_name_single, MYSQL_ASSOC);
                              $cat_name_text1_single = $rowcat_name_single['text1'];


                        $single_case_text1 = $case_text1;
                        $single_case_text2 = $case_text2;
                        $single_case_text3 = $case_text3;
                        $single_case_text4 = $case_text4;
                        $single_case_text5 = $case_text5;
                        $single_case_text6 = $case_text6;
                        $single_case_image1 = $case_image1;

                            $case_textparagraph5 = trim($case_text5);
                            $case_trimmedtext5 = nl2br($case_textparagraph5); 
                            $single_case_text5 = $case_trimmedtext5;



                        
                        $sqlprojecten_link = 'select * from digisurf_project WHERE url="'.$projectid.'" and code ="'.$current_lang.'" LIMIT 1';
                        $retval_singlecaseen_link = mysql_query( $sqlprojecten_link, $conn );                 
                             if(! $retval_singlecaseen_link )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

                                $row_singlecaseen_link = mysql_fetch_array($retval_singlecaseen_link, MYSQL_ASSOC);
                                $case_url_en = $row_singlecaseen_link['url'];
        





                        //Case Study Page Bottom
                        $sqlmorenewsen = 'select * from digisurf_project WHERE url !="'.$projectid.'" and code ="'.$current_lang.'" ORDER BY idx ASC';
                        $retval_morenews_en = mysql_query( $sqlmorenewsen, $conn );                 
                             if(! $retval_morenews_en )
                             {
                                die('Could not get data: ' . mysql_error());
                             } 


                        $morenews = '';
                        while($row_morenews_en = mysql_fetch_array($retval_morenews_en, MYSQL_ASSOC)){
                            $idx = $row_morenews_en['idx'];
                            $text4 = $row_morenews_en['text4'];
                            $text5 = $row_morenews_en['text5'];
                            $image = $row_morenews_en['image1']; 
                            $url = $row_morenews_en['url'];
                            $misc_id = $row_morenews_en['misc_id'];


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

                                         $morenews .= '<div class="swiper-slide">
                                                            <a href="/News/Articles/'.$url.'">
                                                                <div class="box">
                                                                    <div class="img">
                                                                        <img src="'.$image.'" alt="">
                                                                    </div>
                                                                    <div class="category">
                                                                        <p>'.$cat_name_text1.'</p>
                                                                    </div>
																	<div class="info">
                                                                    <p class="title">'.$text4.'</p>
																	</div>
                                                                </div>
                                                                </a>
                                                            </div>';
                                          
                        }

?>