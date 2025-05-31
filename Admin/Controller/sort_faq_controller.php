<?php
include '../Model/dbconfig.php';
mysql_set_charset("utf8");
session_start();
$current_lang = $_SESSION['lang'];


$array = $_POST['projectList'];
/*
  $x=1;
  foreach ($array as $key => $value) {
    # code...
    $query = "UPDATE green_product_en SET sortable_order = ".$x." WHERE idx = ". $value;
    mysql_query($query) or die (mysql_error());
    $queryzh = "UPDATE green_product_zh SET sortable_order = ".$x." WHERE idx = ". $value;
    mysql_query($queryzh) or die (mysql_error());

    $x ++;
  }
  */

  $x=1;
  foreach ($array as $key => $value) {
    # code...
    $query = "UPDATE digisurf_faq SET sortable_order = ".$x." where idx ='".$value."' ";
    mysql_query($query) or die (mysql_error());   
    $x ++;
  }

 

/*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/

                        $sqlprojecten = 'select * from digisurf_faq where code ="'.$current_lang.'" ORDER BY sortable_order ASC';
                        $retvalprojecten = mysql_query( $sqlprojecten, $conn );                 
                             if(! $retvalprojecten )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

$result = '';

                    while($rowprojecten = mysql_fetch_array($retvalprojecten, MYSQL_ASSOC)){
                      $images = $rowprojecten['image1'];
                      $idx = $rowprojecten['idx'];
                      $text1 = $rowprojecten['text1'];
                      $misc_id = $rowprojecten['misc_id'];
                              
                              $result .= "<div id=\"projectList_$idx\" class=\"project-list\">";
                              $result .= "<form action=\"/Admin/EditFAQ\" method=\"GET\" enctype=\"multipart/form-data\" accept-charset=\"utf-8\">";
                              //$result .= '<img src="'.$rowprojecten['image1'].'"/>';
                              $result .= "<input type=\"hidden\" value=\"$idx\" name=\"faq_id\">";
                              $result .=  "<span style=\"display:inline-block; padding:20px; position:relative; width:100%;\">".$text1."</span>";
                              $result .= "<input type=\"submit\" value=\"Edit\" class=\"btn-success extra-btn\">";
                              $result .= "</form></div>";
                         }                       
echo $result;    
?>