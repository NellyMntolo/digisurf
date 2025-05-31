<?php
include '../lang/lang.php';
mysql_set_charset("utf8");

include 'menuDAO.php';
include 'footerDAO.php';

$current_lang = $_SESSION['lang'];

$blogid = mysql_real_escape_string($_GET['blog_id'],$conn);
//$blogid = $_SESSION["blog_session"];

//$getName = explode("/",$_SERVER['REQUEST_URI']);

                        $sqlblogen = 'select * from digisurf_blog WHERE url="'.$blogid.'" AND code ="'.$current_lang.'" LIMIT 1';
                        $retval_singleblogen = mysql_query( $sqlblogen, $conn );                 
                             if(! $retval_singleblogen )
                             {
                                die('Could not get data: ' . mysql_error());
                             }  

                        $row_singleblogen = mysql_fetch_array($retval_singleblogen, MYSQL_ASSOC);
                        $blog_idx = $row_singleblogen['idx']; 
                        $blog_text1 = $row_singleblogen['text1'];
                        $blog_text2 = $row_singleblogen['text2'];
                        $blog_text3 = $row_singleblogen['text3'];
                        $blog_text4 = $row_singleblogen['text4'];
                        $blog_text5 = $row_singleblogen['text5'];
                        $blog_text6 = $row_singleblogen['text6'];
                        $blog_image1 = $row_singleblogen['image1'];

                        $single_news_text1 = $blog_text1;
                        $single_news_text2 = $blog_text2;
                        $single_news_text3 = $blog_text3;
                        $single_news_text4 = $blog_text4;
                        $single_news_text5 = $blog_text5;
                        $single_news_text6 = $blog_text6;
                        $single_news_image1 = $blog_image1;

                        $sql_more_articles = 'select * from digisurf_blog WHERE url !="'.$blogid.'" AND code ="'.$current_lang.'" LIMIT 2';
                        $retval_more_articles = mysql_query( $sql_more_articles, $conn );                 
                             if(! $retval_more_articles )
                             {
                                die('Could not get data: ' . mysql_error());
                             }   

                        $more_articles = '';
                        while($row_more_articles = mysql_fetch_array($retval_more_articles, MYSQL_ASSOC)){
                            $idx = $row_more_articles['idx'];
                            $text4 = $row_more_articles['text4'];
                            $text5 = $row_more_articles['text5'];
                            $text7 = $row_more_articles['text7'];
                            $image = $row_more_articles['image1']; 
                            $url = $row_more_articles['url'];

                                         $more_articles .= '<a href="/News/Articles/'.$url.'" class="swiper-slide">
                                                            <div class="gm-new-item">
                                                                <div class="gm-new-item-img">
                                                                    <div class="gm-new-item-date">
                                                                        '.$text7.'
                                                                    </div>
                                                                    <div class="gm-new-item-title">
                                                                        <h3>'.$text4.'</h3>
                                                                    </div>
                                                                    <div class="cover"></div>
                                                                    <img src="'.$image.'"/>
                                                                </div>
                                                                <div class="gm-new-item-content">
                                                                    <p>'.$text5.'</p>
                                                                </div>
                                                            </div>
                                                            </a>';                     

                                          
                        }
                        //$more_articles = $more_articles;

?>