<?php
include '../Model/dbconfig.php';
mysql_set_charset("utf8");
session_start();
$current_lang = $_SESSION['lang'];

$array = $_POST['blogList'];

  $x=1;
  foreach ($array as $key => $value) {
    # code...
    $query = "UPDATE digisurf_blog SET sortable_order = ".$x." WHERE idx = ". $value;
    mysql_query($query) or die (mysql_error());

    $x ++;
  }


/*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/

                        $sqlblogen = 'select * from digisurf_blog where code ="'.$current_lang.'" ORDER BY sortable_order ASC';
                        $retvalblogen = mysql_query( $sqlblogen, $conn );                 
                             if(! $retvalblogen )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

$result = '';

                    while($rowblogen = mysql_fetch_array($retvalblogen, MYSQL_ASSOC)){
                      $images = $rowblogen['image1'];
                      $titles = $rowblogen['text5'];
                      $idx = $rowblogen['idx'];
                      $misc_id = $rowblogen['misc_id'];
                              
                              $result .= "<div id=\"blogList_$idx\" class=\"project-list\">";
                              $result .= "<form action=\"/Admin/EditArticles\" method=\"GET\" enctype=\"multipart/form-data\" accept-charset=\"utf-8\">";
                              $result .= '<img src="'.$rowblogen['image1'].'"/>';
                              $result .= "<input type=\"hidden\" value=\"$idx\" name=\"blog_id\">";
                              $result .= "<input type=\"submit\" value=\"Edit\" class=\"btn-success extra-btn\">";
                              $result .= "</form></div>";
                         }
                         
echo $result;    
?>