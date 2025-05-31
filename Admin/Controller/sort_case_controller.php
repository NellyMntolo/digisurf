<?php
include '../Model/dbconfig.php';
mysql_set_charset("utf8");
session_start();
$current_lang = $_SESSION['lang'];

$array = $_POST['projectList'];

  $x=1;
  foreach ($array as $key => $value) {
    # code...
    $query = "UPDATE digisurf_project SET sortable_order = ".$x." WHERE idx = ". $value;
    mysql_query($query) or die (mysql_error());

    $x ++;
  }


/*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/

                        $sqlprojecten = 'select * from digisurf_project where code ="'.$current_lang.'" ORDER BY sortable_order ASC';
                        $retvalprojecten = mysql_query( $sqlprojecten, $conn );                 
                             if(! $retvalprojecten )
                             {
                                die('Could not get data: ' . mysql_error());
                             } 

$result = '';

                    while($rowprojecten = mysql_fetch_array($retvalprojecten, MYSQL_ASSOC)){
                      $images = $rowprojecten['image1'];
                      $titles = $rowprojecten['text5'];
                      $idx = $rowprojecten['idx'];
                      $sortable_order = $rowprojecten['sortable_order'];
                              
                              $result .= "<div id=\"projectList_$idx\" class=\"project-list\">";
                              $result .= "<form action=\"/Admin/EditEvent\" method=\"GET\" enctype=\"multipart/form-data\" accept-charset=\"utf-8\">";
                              $result .= '<img src="'.$rowprojecten['image1'].'"/>';
                              $result .= "<input type=\"hidden\" value=\"$idx\" name=\"event_id\">";
                              $result .= "<input type=\"submit\" value=\"Edit\" class=\"btn-success extra-btn\">";
                              $result .= "</form></div>";
                         }
                         
echo $result;    
?>