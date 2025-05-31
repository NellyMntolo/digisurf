<?php
include '../lang/lang.php';
mysql_set_charset("utf8");

include 'menuDAO.php';
include 'footerDAO.php';

$current_lang = $_SESSION['lang'];
$site_search_result = '';
$all_recent_articles = '';

//echo $_POST['search'];

if(isset($_POST['search'])){ 
  $keyword = mysql_real_escape_string($_POST['search']);

//articles, events
  $sql_search = "(SELECT text1, text2, text3, image1, url, search_type, creation_date FROM digisurf_blog WHERE (text1 LIKE '%".$keyword."%' OR text2 LIKE '%".$keyword."%') AND code='".$current_lang."')
                      UNION
                      (SELECT text1, text2, text3, image1, url, search_type, creation_date FROM digisurf_event WHERE (text4 LIKE '%".$keyword."%' OR text6 LIKE '%".$keyword."%') AND code='".$current_lang."')";  
     $retval_search = mysql_query( $sql_search, $conn );     
     if(! $retval_search )
     {
        die('Could not get data: ' . mysql_error());
     }

     while($row_search = mysql_fetch_array($retval_search, MYSQL_ASSOC)){
            $titles = $row_search['text1'];
            $descriptions = $row_search['text2'];
            $content = $row_search['text3'];
            $image1 = $row_search['image1'];
            $url = $row_search['url'];
            $search_type = $row_search['search_type'];
            $creation_date = $row_search['creation_date'];

            

            if($search_type == "blog"){
                         $site_search_result .= '<form class="all_articles col-md-8 search-item" action="/Single/Article/'.$url.'" method="post">
                                        <div class="search-item-in">
                                            <img class="all_articles_image" src="'.$image1.'">
                                            <span class="all_articles_date">'.$creation_date.'</span>
                                            <h2 class="all_articles_title">'.$titles.'</h2>
                                            <p class="all_articles_p">'.$descriptions.'</p>
                                        </div>
                                        <input type="hidden" name="myarticle" value="'.$url.'">
                                        <input type="submit" class="article_sub">
                                    </form>';
            }

            if($search_type == "event"){
                         $site_search_result .= '<form class="all_articles col-md-8 search-item" action="/Single/Events/'.$url.'" method="post">
                                        <div class="search-item-in">
                                            <img class="all_articles_image" src="'.$image1.'">
                                            <span class="all_articles_date">'.$creation_date.'</span>
                                            <h2 class="all_articles_title">'.$titles.'</h2>
                                            <p class="all_articles_p">'.$descriptions.'</p>
                                        </div>
                                        <input type="hidden" name="myarticle" value="'.$url.'">
                                        <input type="submit" class="article_sub">
                                    </form>';
            }
        }


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
     
}

?>