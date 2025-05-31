<?php
include 'dbconfig.php';
mysql_set_charset("utf8");

                        $sqlblogen = 'select * from think_blog_en ORDER BY idx DESC';
                        $retvalblogen = mysql_query( $sqlblogen, $conn );                 
                             if(! $retvalblogen )
                             {
                                die('Could not get data: ' . mysql_error());
                             }      

                        $sqlblogzh = 'select * from think_blog_zh ORDER BY idx DESC';
                        $retvalblogzh = mysql_query( $sqlblogzh, $conn );                 
                             if(! $retvalblogzh )
                             {
                                die('Could not get data: ' . mysql_error());
                             } 
?>