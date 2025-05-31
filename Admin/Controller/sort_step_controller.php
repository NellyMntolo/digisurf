<?php
include '../Model/dbconfig.php';
mysql_set_charset("utf8");
session_start();
$current_lang = $_SESSION['lang'];


$array = $_POST['projectList'];

  $x=1;
  foreach ($array as $key => $value) {
    # code...
    $query = "UPDATE about_steps SET sortable_order = ".$x." WHERE idx = ". $value;
    mysql_query($query) or die (mysql_error());

    $x ++;
  }


/*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/

                        $sqlprojecten = 'select * from about_steps ORDER BY sortable_order ASC';
                        $retvalprojecten = mysql_query( $sqlprojecten, $conn );                 
                             if(! $retvalprojecten )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

$result = '';

                    while($rowprojecten = mysql_fetch_array($retvalprojecten, MYSQL_ASSOC)){
                      $idx = $rowprojecten['idx']; 
                            $entext1 = $rowprojecten['text1'];
                            $entext2 = $rowprojecten['text2'];
                            $enimage1 = $rowprojecten['image1'];
                              
                              $result .= "<div id=\"projectList_$idx\" class=\"project-list\">";
                              $result .= "<form action=\"/Admin/StepEdit\" method=\"GET\" enctype=\"multipart/form-data\" accept-charset=\"utf-8\">";
                              $result .= '<img src="'.$enimage1.'"/>';
                              $result .= "<input type=\"hidden\" value=\"$idx\" name=\"step_id\">";
                              $result .= "<input type=\"submit\" value=\"Edit\" class=\"btn-success extra-btn\"></form>";
                              $result .= "</div>";
                         }                        
echo $result;    
?>