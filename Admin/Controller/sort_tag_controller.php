<?php
include '../Model/dbconfig.php';
mysql_set_charset("utf8");
session_start();


$array = $_POST['projectLis'];

  $x=1;
  foreach ($array as $key => $value) {
    # code...
    $query = "UPDATE think_tag SET sortable_order = ".$x." WHERE idx = ". $value;
    mysql_query($query) or die (mysql_error());

    $x ++;
  }


/*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/

                        $sqlprojecten = 'select * from think_tag ORDER BY sortable_order ASC';
                        $retvalprojecten = mysql_query( $sqlprojecten, $conn );                 
                             if(! $retvalprojecten )
                             {
                                die('Could not get data: ' . mysql_error());
                             }      

$result = '';

                    while($rowprojecten = mysql_fetch_array($retvalprojecten, MYSQL_ASSOC)){
                      $idx = $rowprojecten['idx']; 
                        $text1 = $rowprojecten['text1'];  
                        
                          $result .= '<a class="btn btn-block btn-social btn-default project-list" id="projectLis_'.$idx.'" style="width: 100%; margin-left: 0%;cursor:move;">
                                        <i class="fa fa-arrows-alt"></i> '.$text1.'
                                    </a>';
                         }
                         
echo $result;    
?>