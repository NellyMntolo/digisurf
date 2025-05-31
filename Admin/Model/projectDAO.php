<?php
include 'dbconfig.php';
mysql_set_charset("utf8");

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
?>