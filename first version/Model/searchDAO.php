<?php
include '../lang/lang.php';
mysql_set_charset("utf8");

include 'menuDAO.php';
include 'footerDAO.php';

$current_lang = $_SESSION['lang'];
$result = '';

if(isset($_GET['query'])){
  $keyword = mysql_real_escape_string($_GET['query']);

//faq,products,packages,news,case studies, technology
  $sql_search = "(SELECT text4, text7, url, image1, search_type FROM digisurf_project WHERE (text4 LIKE '%".$keyword."%' OR text7 LIKE '%".$keyword."%') AND code='".$current_lang."')";  
     $retval_search = mysql_query( $sql_search, $conn );     
     if(! $retval_search )
     {
        die('Could not get data: ' . mysql_error());
     }

     while($row_search = mysql_fetch_array($retval_search, MYSQL_ASSOC)){
            $caseidx = $row_search['idx'];
            $titles = $row_search['text4'];
            $descriptions = $row_search['text5'];
            $url = $row_search['url'];
            $search_type = $row_search['search_type'];
            $image = $row_search['image1'];


                        $sqlcat_list = 'select * from digisurf_category_list WHERE text1="'.$caseidx.'" and code="'.$current_lang.'" ';
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

            if($search_type == "faq"){
                         $result .= '<a class="search-item" href="/FAQ/Info/'.$url.'">
                                        <div class="search-item-in">
                                          <h4>'.$titles.'</h4>
                                            <p>'.$descriptions.'</p>
                                        </div>
                                    </a>';
            }

            if($search_type == "product"){
                         $result .= '<a class="search-item" href="/Products/Product/'.$url.'">
                                        <div class="search-item-in">
                                          <h4>'.$titles.'</h4>
                                            <p>'.$descriptions.'</p>
                                        </div>
                                    </a>';
            }

            if($search_type == "package"){
                         $result .= '<a class="search-item" href="/SinglePackage/'.$url.'">
                                        <div class="search-item-in">
                                          <h4>'.$titles.'</h4>
                                            <p>'.$descriptions.'</p>
                                        </div>
                                    </a>';
            }

            if($search_type == "blog"){
                         $result .= '<a class="search-item" href="/News/Articles/'.$url.'">
                                        <div class="search-item-in">
                                          <h4>'.$titles.'</h4>
                                            <p>'.$descriptions.'</p>
                                        </div>
                                    </a>';
            }

            if($search_type == "project"){
                         $result .= '<a class="search-item" href="/Case_Studies/projects/'.$url.'">
                                        <div class="search-item-in">
                                          <h4>'.$titles.'</h4>
                                            <p>'.$descriptions.'</p>
                                        </div>
                                    </a>


                                    <div class="col-md-4 nellyboot-animate fadeInUp nellyboot-animated">
                                                        <div class="nellyboot-card with-hover">
                                                          <div class="nellyboot-card-media">
                                                            <a href="/Case_Studies/projects/'.$url.'"><img src="'.$image.'" class="img-responsive img-border" alt="'.$image.'"></a>
                                                          </div>
                                                          <div class="nellyboot-card-text">
                                                            <h2 class="nellyboot-card-heading mb0">'.$text4.'</h2>
                                                            <p class="category">'.$cat_name_text1.'</p>
                                                            <p><a href="/Case_Studies/projects/'.$url.'">View details</a></p>
                                                          </div>
                                                        </div>
                                                      </div>
                                                      ';
            }

            if($search_type == "solution"){
                         $result .= '<a class="search-item" href="/Technologies/Technology/'.$url.'">
                                        <div class="search-item-in">
                                          <h4>'.$titles.'</h4>
                                            <p>'.$descriptions.'</p>
                                        </div>
                                    </a>';
            }
        }
     
}

?>