<?php
include '../Model/dbconfig.php';
mysql_set_charset("utf8");
session_start();

$array = $_POST['projectList'];

  $x=1;
  foreach ($array as $key => $value) {
    # code...
    $query = "UPDATE think_project_en SET sortable_order = ".$x." WHERE idx = ". $value;
    mysql_query($query) or die (mysql_error());
    $queryzh = "UPDATE think_project_zh SET sortable_order = ".$x." WHERE idx = ". $value;
    mysql_query($queryzh) or die (mysql_error());

    $x ++;
  }


/*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/

                        $sqlprojecten = 'select * from think_project_en ORDER BY sortable_order ASC';
                        $retvalprojecten = mysql_query( $sqlprojecten, $conn );                 
                             if(! $retvalprojecten )
                             {
                                die('Could not get data: ' . mysql_error());
                             }      

                        $sqlprojectzh = 'select * from think_project_zh ORDER BY sortable_order ASC';
                        $retvalprojectzh = mysql_query( $sqlprojectzh, $conn );                 
                             if(! $retvalprojectzh )
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
                              $result .= "<form action=\"/Admin/ProjectEdit\" method=\"GET\" enctype=\"multipart/form-data\" accept-charset=\"utf-8\">";
                              $result .= '<img src="'.$rowprojecten['image1'].'"/>';
                              $result .= "<input type=\"hidden\" value=\"$idx\" name=\"project_id\">";
                              $result .= "<input type=\"submit\" value=\"Edit\" class=\"btn-success extra-btn\">";
                              $result .= "</form></div>";
                         }
                         
echo $result;    
?>