<?php
include '../lang/lang.php';
mysql_set_charset("utf8");
session_start();
// error_reporting(E_ALL);


include 'menuDAO.php';
include 'footerDAO.php';

$current_lang = $_SESSION['lang'];


$article_url = mysql_real_escape_string($_POST['myarticle'],$conn);
//$articleid = $_SESSION["article_session"];

//$getName = explode("/",$_SERVER['REQUEST_URI']);

$article_content = '';
$all_recent_single_articles = '';

                        $sqlarticleen = 'select * from digisurf_blog WHERE url="'.$article_url.'" AND code ="'.$current_lang.'" LIMIT 1';
                        $retval_singlearticleen = mysql_query( $sqlarticleen, $conn );                 
                             if(! $retval_singlearticleen )
                             {
                                die('Could not get data: ' . mysql_error());
                             }  

                        $row_singlearticle = mysql_fetch_array($retval_singlearticleen, MYSQL_ASSOC);
                        $article_idx = $row_singlearticle['idx']; 
                        $article_text1 = $row_singlearticle['text1'];
                        $article_text2 = $row_singlearticle['text2'];
                        $article_text3 = $row_singlearticle['text3'];
                        $all_articles_url = $row_singlearticle['url'];
                        $single_article_image1 = $row_singlearticle['image1'];

                        $article_content = '<div class="word-container article-section col-md-4">
                                                <ul class="word-articles">
                                                  <li class="word-article-image"><img src="'.$single_article_image1.'"></li>
                                                  <!--<li class="word-article-title"><a href="/Single/Article/'.$all_articles_url.'">'.$article_text1.'</a></li>-->
                                                  <li class="word-article-title">'.$article_text1.'</li>
                                                  <!--<li class="word-excerpt">'.$article_text2.'</li>-->
                                                  <li class="word-excerpt">'.$article_text3.'</li>
                                                </ul>
                                              </div>';

                        $sql_more_articles = 'select * from digisurf_blog WHERE url !="'.$articleid.'" AND code ="'.$current_lang.'" LIMIT 2';
                        $retval_more_articles = mysql_query( $sql_more_articles, $conn );                 
                             if(! $retval_more_articles )
                             {
                                die('Could not get data: ' . mysql_error());
                             }   

                        $more_articles_all = '';
                        while($more_articles_db = mysql_fetch_array($retval_more_articles_db, MYSQL_ASSOC)){
                            $more_articles_text1 = $more_articles_db['text1'];
                            $more_articles_entext2 = $more_articles_db['text2'];
                            $more_articles_entext3 = $more_articles_db['text3'];
                            $more_articles_image1 = $more_articles_db['image1'];
                            $more_articles_url = $more_articles_db['url'];

                            $more_articles_trimmedtext2 = nl2br($more_articles_entext2); 
                            $more_articles_one_text2 = $more_articles_trimmedtext2; 
                            $more_articles_text2 = $more_articles_one_text2;

                                      $more_articles_all .= '<figure class="effect-articles">
                                                                  <img src="'.$more_articles_image1.'" alt="'.$more_articles_image1.'"/>
                                                                  <figcaption>
                                                                      <span class="article-date">Sep. 08, 2019</span>
                                                                      <h2><span>'.$more_articles_text1.'</span></h2>
                                                                      <p>'.$more_articles_entext3.'</p>
                                                                      <a href="/Single/Article/'.$more_articles_url.'">View more</a>
                                                                  </figcaption>           
                                                              </figure>';                                                 
                        }   
                        //$more_articles = $more_articles;

                        $sql_all_recent_single_articles = 'select * from digisurf_blog where code ="'.$current_lang.'" ORDER BY sortable_order DESC LIMIT 3';
                        $retval_all_recent_single_articles = mysql_query( $sql_all_recent_single_articles, $conn );                 
                             if(! $retval_all_recent_single_articles )
                             {
                                die('Could not get data: ' . mysql_error());
                             } 

                        while($all_recent_single_articles_all = mysql_fetch_array($retval_all_recent_single_articles, MYSQL_ASSOC)){
                            $all_recent_single_articles_text1 = $all_recent_single_articles_all['text1'];
                            $all_recent_single_articles_text2 = $all_recent_single_articles_all['text2'];
                            $all_recent_single_articles_entext3 = $all_recent_single_articles_all['text3'];
                            $all_recent_single_articles_image1 = $all_recent_single_articles_all['image1'];
                            $all_recent_single_articles_url = $all_recent_single_articles_all['url'];
                            $all_recent_single_articles_misc_id = $all_recent_single_articles_all['misc_id'];
                            $all_recent_single_articles_creation_date = $all_recent_single_articles_all['creation_date'];

                            // $all_recent_single_articles .= '<a href="/Single/Article/'.$all_recent_single_articles_url.'" >'.$all_recent_single_articles_text1.'</a><br><br>';

                            $all_recent_single_articles .= '<form action="/Single/Article/'.$all_recent_single_articles_url.'" method="post">'.$all_recent_single_articles_text1.'
                            <input type="hidden" name="myarticle" value="'.$all_recent_single_articles_url.'"><input type="submit" class="article_sub"></form><br>';
                        }

?>