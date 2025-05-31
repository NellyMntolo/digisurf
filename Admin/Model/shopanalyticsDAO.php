<?php
include 'dbconfig.php';
mysql_set_charset("utf8");
$current_lang = $_SESSION['lang'];
                        $sqlweareen = 'select * from shop_notification ';
                        //$sqlweareen = 'SELECT YEAR(y) AS year, QUARTER(y) AS quarter, COUNT(item1) AS jobcount FROM shop_notification WHERE contactid = "19249"  GROUP BY YEAR(y) ';
                        $retvalweareen = mysql_query( $sqlweareen, $conn );                 
                             if(! $retvalweareen )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

                        /*while($row = mysql_fetch_array($retvalweareen, MYSQL_ASSOC)){
                            $test .= $row['idx'];
                        }*/

                        $rows = array();
                        while($row = mysql_fetch_array($retvalweareen, MYSQL_ASSOC)){
                          array_push($rows, $row);
                        }


                             
                        
                        

?>