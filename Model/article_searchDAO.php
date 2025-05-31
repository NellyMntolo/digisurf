<?php
include '../lang/lang.php';
mysql_set_charset("utf8");
error_reporting(E_ALL);

include 'menuDAO.php';
include 'footerDAO.php';

$current_lang = $_SESSION['lang'];
$seach_results = '';
$all_recent_articles = '';

//echo "searched = ".$_POST['article_search'];

if(isset($_POST['article_search'])){

  // $article_search_keyword = mysql_real_escape_string($_POST['article_search']);
  $article_search_keyword = $_POST['article_search'];

  //echo $article_search_keyword;

  //$sql_search_article = "SELECT text1, text2, text3, image1, url, search_type FROM digisurf_blog WHERE text1 LIKE '%".$article_search_keyword."%' OR text2 LIKE '%".$article_search_keyword."%' AND code='".$current_lang."'";

  $sql_search_article = "SELECT text1, text2, text3, image1, url, search_type, creation_date FROM digisurf_blog WHERE text1 LIKE '%".$article_search_keyword."%' OR text2 LIKE '%".$article_search_keyword."%' AND code='".$current_lang."' ";

     $retval_search_article = mysql_query( $sql_search_article, $conn );
     if(! $retval_search_article )
     {
        die('Could not get data: ' . mysql_error());
     }

     while($row_search_article = mysql_fetch_array($retval_search_article, MYSQL_ASSOC)) {
            $art_test1 = $row_search_article['text1'];
            $art_text2= $row_search_article['text2'];
            $art_text3= $row_search_article['text3'];
            $art_image1= $row_search_article['image1'];
            $art_url = $row_search_article['url'];
            $search_article_type = $row_search_article['blog'];
            $all_articles_creation_date = $row_search_article['creation_date'];

            $the_article_date = date_create($all_articles_creation_date);
            $Some_articleDate = date_format($the_article_date, 'M. d, Y');

            //if($search_article_type == "blog"){
                         $seach_results .= '<form class="all_articles col-md-8 search-item" action="/Single/Article/'.$art_url.'" method="post">
                                                  <div class="search-item-in">
                                                      <img class="all_articles_image" src="'.$art_image1.'">
                                                      <span class="all_articles_date">'.$Some_articleDate.'</span>
                                                      <h2 class="all_articles_title">'.$art_test1.'</h2>
                                                      <p class="all_articles_p">'.$art_text2.'</p>
                                                  </div>
                                                  <input type="hidden" name="myarticle" value="'.$art_url.'">
                                                  <input type="submit" class="article_sub">
                                              </form>';
            //}
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