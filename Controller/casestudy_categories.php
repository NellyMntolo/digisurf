<?php
include '../Model/dbconfig.php';
mysql_set_charset("utf8");
session_start();
error_reporting(0);
include '../Model/menuDAO.php';

$current_lang = $_SESSION['lang'];
$result = '';
//if(isset($_POST['selected_category'])){ 
  $categoryid = mysql_real_escape_string($_POST['selected_category'],$conn);
  
//$_SESSION['product_category_session'] = $categoryid;

  if($categoryid != 'All'){

                        $sqlcategories = 'select * from digisurf_category_list where text2="'.$categoryid.'"order by idx DESC';
                        $retvalcategories = mysql_query( $sqlcategories, $conn );                 
                             if(! $retvalcategories )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

                        while($rowcategories = mysql_fetch_array($retvalcategories, MYSQL_ASSOC)){
                          $cat_product_id = $rowcategories['text1'];                     



                        $sqlcats = 'select * from digisurf_project where misc_id="'.$cat_product_id.'" and code ="'.$current_lang.'" order by idx ASC';
                        $retvalcats = mysql_query( $sqlcats, $conn );                 
                             if(! $retvalcats )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

                        $allnews2 = '';
                        while($rowcats = mysql_fetch_array($retvalcats, MYSQL_ASSOC)){
                            $text4 = $rowcats['text4'];
                            $text5 = $rowcats['text5'];
                            $image = $rowcats['image1']; 
                            $misc_id = $rowcats['misc_id']; 
                            $url = $rowcats['url'];

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


                                                    $result .= '<div class="page-item">
                                                                <div class="page-item-img">
                                                                  <img src="'.$image.'"/>
                                                                </div>
                                                                <div class="page-item-detail">
                                                                  <div class="left">
                                                                    <h3>'.$text4.'</h3>
                                                                    <h4>'.$text5.'</h4>
                                                                     <h4>'.$cat_name_text1.'</h4>
                                                                  </div>
                                                                  <div class="right">
                                                                    <a href="/News/Articles/'.$url.'" class="btn btn-primary">View<span></span></a>
                                                                  </div>
                                                                </div>
                                                              </div>';          
                            }
                        }

                      } else {
                        $sqlallcasesen = 'select * from digisurf_project where code ="'.$current_lang.'" ORDER BY sortable_order ASC';
                        $retval_allcases_en = mysql_query( $sqlallcasesen, $conn );                 
                             if(! $retval_allcases_en )
                             {
                                die('Could not get data: ' . mysql_error());
                             } 

                        while($row_allcases_en = mysql_fetch_array($retval_allcases_en, MYSQL_ASSOC)){
                            $caseidx = $row_allcases_en['idx'];
                            $text4 = $row_allcases_en['text4'];
                            $text5 = $row_allcases_en['text5'];
                            $image = $row_allcases_en['image1']; 
                            $misc_id = $row_allcases_en['misc_id'];
                            $url = $row_allcases_en['url'];

                            $case_textparagraph5 = trim($text5);
                            $case_trimmedtext5 = nl2br($case_textparagraph5); 
                            $case_text5 = $case_trimmedtext5;


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
 


                                         $result .= '<div class="page-item">
                                                                <div class="page-item-img">
                                                                  <img src="'.$image.'"/>
                                                                </div>
                                                                <div class="page-item-detail">
                                                                  <div class="left">
                                                                    <h3>'.$text4.'</h3>
                                                                    <h4>'.$text5.'</h4>
                                                                     <h4>'.$cat_name_text1.'</h4>
                                                                  </div>
                                                                  <div class="right">
                                                                    <a href="/News/Articles/'.$url.'" class="btn btn-primary">View<span></span></a>
                                                                  </div>
                                                                </div>
                                                              </div>';
                                   
                                          
                        } 
                      }

//echo "hello";
if(!empty($result)){
    echo $result;
} else{
    echo '<div class"lvn-grid1"找不到任何文章</div>';    
}


?>