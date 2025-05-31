<?php
include '../Model/dbconfig.php';
mysql_set_charset("utf8");
session_start();

if (isset($_GET['project_id'])) {
  # code...
$projectid = mysql_real_escape_string($_GET['project_id'],$conn);
                        $sqlprojecten = 'select * from think_project_en WHERE sortable_order="'.$projectid.'" LIMIT 1';
                        $retval_singleprojecten = mysql_query( $sqlprojecten, $conn );                 
                             if(! $retval_singleprojecten )
                             {
                                die('Could not get data: ' . mysql_error());
                             }
                        

                        $sqlprojectzh = 'select * from think_project_zh WHERE sortable_order="'.$projectid.'" LIMIT 1';
                        $retval_singleprojectzh = mysql_query( $sqlprojectzh, $conn );                 
                             if(! $retval_singleprojectzh )
                             {
                                die('Could not get data: ' . mysql_error());
                             }   


$url = '';

if($_SESSION['lang'] = 'en'){
  $row_singleprojecten = mysql_fetch_array($retval_singleprojecten, MYSQL_ASSOC);
  $url = $row_singleprojecten['text5'];
}

if($_SESSION['lang'] = 'ch') {
  $row_singleprojectzh = mysql_fetch_array($retval_singleprojectzh, MYSQL_ASSOC);
  $url = $row_singleprojectzh['text5'];
}

else{
  $url = '';
}



/*

//NEXT PREV ENG


                        $firstrow = 'SELECT * FROM think_project_en ORDER BY idx ASC LIMIT 1';
                        $retfirst = mysql_query( $firstrow, $conn );               
                        if(! $retfirst )
                        {
                           die('Could not get data: ' . mysql_error());
                        }
                        $rowfirst = mysql_fetch_array($retfirst, MYSQL_ASSOC);
                           $firstid =$rowfirst['idx'];


                        if ($projectid == $firstid){
                             $sql = 'SELECT * FROM think_project_en where idx = "'.$firstid.'" LIMIT 1'; //OFFSET
                                $retval = mysql_query( $sql, $conn );                                  
                                if(! $retval )
                                {
                                   die('Could not get data: ' . mysql_error());
                                }
                                $rowfirsts = mysql_fetch_array($retval, MYSQL_ASSOC);
                                $prev_id_en = $rowfirsts['idx'];
                          } elseif ($projectid != $firstid){
                              $sql = 'SELECT * FROM think_project_en where idx = "'.$projectid.'" -1 LIMIT 1'; //OFFSET
                                    $retval = mysql_query( $sql, $conn );                                      
                                    if(! $retval )
                                    {
                                       die('Could not get data: ' . mysql_error());
                                    }
                                    $rowfirsts = mysql_fetch_array($retval, MYSQL_ASSOC);
                                    $prev_id_en = $rowfirsts['idx'];
                            }



                        $lastrow = 'SELECT * FROM think_project_en ORDER BY idx DESC LIMIT 1';
                        $retlast = mysql_query( $lastrow, $conn );               
                        if(! $retlast )
                        {
                           die('Could not get data: ' . mysql_error());
                        }
                        $rowlast = mysql_fetch_array($retlast, MYSQL_ASSOC);
                           $lastid =$rowlast['idx'];
                          
                        

                          if ($projectid == $lastid){
                             $sql = 'SELECT * FROM think_project_en where idx = "'.$lastid.'" LIMIT 1'; //OFFSET
                                $retval = mysql_query( $sql, $conn );                                  
                                if(! $retval )
                                {
                                   die('Could not get data: ' . mysql_error());
                                }
                                $rowlasts = mysql_fetch_array($retval, MYSQL_ASSOC);
                                $next_id_en = $rowlasts['idx'];   
                          } elseif ($projectid != $lastid){
                          $sql = 'SELECT * FROM think_project_en where idx = "'.$projectid.'"+1 LIMIT 1'; //OFFSET
                                $retval = mysql_query( $sql, $conn );                                  
                                if(! $retval )
                                {
                                   die('Could not get data: ' . mysql_error());
                                }
                                $rowlasts = mysql_fetch_array($retval, MYSQL_ASSOC);
                                $next_id_en = $rowlasts['idx'];

                                
                             } 
//NEXT PREV ENG

//NEXT PREV ZH
                        $firstrowzh = 'SELECT * FROM think_project_zh ORDER BY idx ASC LIMIT 1';
                        $retfirstzh = mysql_query( $firstrowzh, $conn );               
                        if(! $retfirstzh )
                        {
                           die('Could not get data: ' . mysql_error());
                        }
                        $rowfirstzh = mysql_fetch_array($retfirstzh, MYSQL_ASSOC);
                           $firstidzh =$rowfirstzh['idx'];


                        if ($projectid == $firstidzh){
                             $sql = 'SELECT * FROM think_project_zh where idx = "'.$firstidzh.'" LIMIT 1'; //OFFSET
                                $retval = mysql_query( $sql, $conn );                                  
                                if(! $retval )
                                {
                                   die('Could not get data: ' . mysql_error());
                                }
                                $rowfirsts = mysql_fetch_array($retval, MYSQL_ASSOC);
                                $prev_id_zh = $rowfirsts['idx'];
                          } elseif ($projectid != $firstidzh){
                              $sql = 'SELECT * FROM think_project_zh where idx = "'.$projectid.'"-1 LIMIT 1'; //OFFSET
                                    $retval = mysql_query( $sql, $conn );                                      
                                    if(! $retval )
                                    {
                                       die('Could not get data: ' . mysql_error());
                                    }
                                    $rowfirsts = mysql_fetch_array($retval, MYSQL_ASSOC);
                                    $prev_id_zh = $rowfirsts['idx'];                              
                                 } 



                        $lastrowzh = 'SELECT * FROM think_project_zh ORDER BY idx DESC LIMIT 1';
                        $retlastzh = mysql_query( $lastrowzh, $conn );               
                        if(! $retlastzh )
                        {
                           die('Could not get data: ' . mysql_error());
                        }
                        $rowlastzh = mysql_fetch_array($retlastzh, MYSQL_ASSOC);
                           $lastidzh =$rowlastzh['idx'];                          
                        

                          if ($projectid == $lastidzh){
                             $sql = 'SELECT * FROM think_project_zh where idx = "'.$lastidzh.'" LIMIT 1'; //OFFSET
                                $retval = mysql_query( $sql, $conn );                                  
                                if(! $retval )
                                {
                                   die('Could not get data: ' . mysql_error());
                                }
                                $rowlasts = mysql_fetch_array($retval, MYSQL_ASSOC);
                                $next_id_zh = $rowlasts['idx'];                
                          } elseif ($projectid != $lastidzh){
                          $sql = 'SELECT * FROM think_project_zh where idx = "'.$projectid.'"+1 LIMIT 1'; //OFFSET
                                $retval = mysql_query( $sql, $conn );                                  
                                if(! $retval )
                                {
                                   die('Could not get data: ' . mysql_error());
                                }
                                $rowlasts = mysql_fetch_array($retval, MYSQL_ASSOC);
                                $next_id_zh = $rowlasts['idx'];
                             } 
//NEXT PREV ZH                             
*/

        $_SESSION["project_session"] = $projectid;
        $_SESSION["url_session"] = urlencode($url);
        header('Content-Type: text/html; charset=utf-8');
        header("Refresh:0; url=/we_create/projects/?".urlencode($url)); 

        }
?>