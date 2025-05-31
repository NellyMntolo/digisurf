<?php
include '../lang/lang.php';
mysql_set_charset("utf8");

include 'menuDAO.php';
include 'footerDAO.php';
$current_lang = $_SESSION['lang'];
$slides = '';
                    //CONTENT
                        $sqlen_about = 'select * from digisurf_about where code ="'.$current_lang.'"';
                        $retvalen_about = mysql_query( $sqlen_about, $conn );
                             if(! $retvalen_about )
                             {
                                die('Could not get data: ' . mysql_error());
                             }
                        $rowen_about = mysql_fetch_array($retvalen_about, MYSQL_ASSOC);
                            $about_text1 = $rowen_about['text1'];
                            $about_text2 = $rowen_about['text2'];
                            $about_text3 = $rowen_about['text3'];
                            $about_text4 = $rowen_about['text4'];
                            $about_video_name = $rowen_about['text5'];
                            $about_video_url = $rowen_about['text6'];
                            $about_text7 = $rowen_about['text7'];
                            $about_text8 = $rowen_about['text8'];
                            $about_image1 = $rowen_about['image1'];
                            $about_image2 = $rowen_about['image2'];
                            $about_image3 = $rowen_about['image3'];
                            $about_image4 = $rowen_about['image4'];

                            $about_trimmedtext4 = nl2br($about_text4); 
                            $all_about_text4 = $about_trimmedtext4; 

                        $sqlen_about_sliders = 'select * from about_sliders';
                        $retvalen_about_sliders = mysql_query( $sqlen_about_sliders, $conn );
                             if(! $retvalen_about_sliders )
                             {
                                die('Could not get data: ' . mysql_error());
                             }
                        while($rowen_about_sliders = mysql_fetch_array($retvalen_about_sliders, MYSQL_ASSOC)){
                            $about_sliders_text1 = $rowen_about_sliders['text1'];
                            $about_sliders_text2 = $rowen_about_sliders['text2'];
                            $about_sliders_image1 = $rowen_about_sliders['image1'];

                            $slides .= '<div class="swiper-slide">
                                            <div class="banner">
                                                <img src="'.$about_sliders_image1.'"/>
                                            </div>
                                            <div class="info">
                                                <div class="text-block">
                                                    <h2>'.$about_sliders_text1.'</h2>
                                                    <p>'.$about_sliders_text2.'</p>
                                                </div>
                                            </div>
                                        </div>';
                        }

                        $sqlen_about_steps = 'select * from about_steps order by sortable_order asc';
                        $retvalen_about_steps = mysql_query( $sqlen_about_steps, $conn );
                             if(! $retvalen_about_steps )
                             {
                                die('Could not get data: ' . mysql_error());
                             }
                        $all_steps = '';
                        while($rowen_about_steps = mysql_fetch_array($retvalen_about_steps, MYSQL_ASSOC)){
                            $about_steps_text1 = $rowen_about_steps['text1'];
                            $about_steps_text2 = $rowen_about_steps['text2'];
                            $about_steps_image1 = $rowen_about_steps['image1'];
                            $sortable_order = $rowen_about_steps['sortable_order'];

                            if ($sortable_order < 10){
                                $id = sprintf("%02d", $sortable_order);
                            } else {
                                $id = $sortable_order;
                            }

                            if ($sortable_order % 2 == 0) {
                                          $all_steps .= '<div class="content-box different animation-element slide-bottom">
                                                    <div class="right-box">
                                                        <div class="word special">
                                                            <p class="sub-title">'.$about_steps_text1.'</p>
                                                            <p class="title">'.$id.'</p>
                                                        </div>
                                                        <div class="info">
                                                            <p>'.$about_steps_text2.'</p>
                                                        </div>
                                                    </div>
                                                    <div class="left-box">
                                                        <img src="'.$about_steps_image1.'" alt="">
                                                    </div>
                                                </div>';
                                        } else {
                                            $all_steps .= '<div class="content-box animation-element slide-bottom">
                                                        <div class="left-box">
                                                            <div class="word">
                                                                <p class="title">'.$id.'</p>
                                                                <p class="sub-title">'.$about_steps_text1.'</p>
                                                            </div>
                                                            <div class="info">
                                                                <p>'.$about_steps_text2.'</p>
                                                            </div>
                                                        </div>
                                                        <div class="right-box">
                                                            <img src="'.$about_steps_image1.'" alt="">
                                                        </div>
                                                    </div>';
                                        }
                        }



                        


                            
?>