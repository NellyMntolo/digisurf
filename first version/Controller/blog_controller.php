<?php
include '../Model/dbconfig.php';
mysql_set_charset("utf8");
session_start();

if (isset($_GET['blog_id'])) {
  # code...
$blogid = mysql_real_escape_string($_GET['blog_id'],$conn);
                        $sqlblogen = 'select * from think_blog_en WHERE sortable_order="'.$blogid.'" LIMIT 1';
                        $retval_singleblogen = mysql_query( $sqlblogen, $conn );                 
                             if(! $retval_singleblogen )
                             {
                                die('Could not get data: ' . mysql_error());
                             }
                        

                        $sqlblogzh = 'select * from think_blog_zh WHERE sortable_order="'.$blogid.'" LIMIT 1';
                        $retval_singleblogzh = mysql_query( $sqlblogzh, $conn );                 
                             if(! $retval_singleblogzh )
                             {
                                die('Could not get data: ' . mysql_error());
                             }   


$url = '';

if($_SESSION['lang'] = 'en'){
  $row_singleblogen = mysql_fetch_array($retval_singleblogen, MYSQL_ASSOC);
  $url = $row_singleblogen['text5'];
}

if($_SESSION['lang'] = 'ch') {
  $row_singleblogzh = mysql_fetch_array($retval_singleblogzh, MYSQL_ASSOC);
  $url = $row_singleblogzh['text5'];
}

else{
  $url = '';
}



/*

//NEXT PREV ENG


                        $firstrow = 'SELECT * FROM think_blog_en ORDER BY idx ASC LIMIT 1';
                        $retfirst = mysql_query( $firstrow, $conn );               
                        if(! $retfirst )
                        {
                           die('Could not get data: ' . mysql_error());
                        }
                        $rowfirst = mysql_fetch_array($retfirst, MYSQL_ASSOC);
                           $firstid =$rowfirst['idx'];


                        if ($blogid == $firstid){
                             $sql = 'SELECT * FROM think_blog_en where idx = "'.$firstid.'" LIMIT 1'; //OFFSET
                                $retval = mysql_query( $sql, $conn );                                  
                                if(! $retval )
                                {
                                   die('Could not get data: ' . mysql_error());
                                }
                                $rowfirsts = mysql_fetch_array($retval, MYSQL_ASSOC);
                                $prev_id_en = $rowfirsts['idx'];
                          } elseif ($blogid != $firstid){
                              $sql = 'SELECT * FROM think_blog_en where idx = "'.$blogid.'" -1 LIMIT 1'; //OFFSET
                                    $retval = mysql_query( $sql, $conn );                                      
                                    if(! $retval )
                                    {
                                       die('Could not get data: ' . mysql_error());
                                    }
                                    $rowfirsts = mysql_fetch_array($retval, MYSQL_ASSOC);
                                    $prev_id_en = $rowfirsts['idx'];
                            }



                        $lastrow = 'SELECT * FROM think_blog_en ORDER BY idx DESC LIMIT 1';
                        $retlast = mysql_query( $lastrow, $conn );               
                        if(! $retlast )
                        {
                           die('Could not get data: ' . mysql_error());
                        }
                        $rowlast = mysql_fetch_array($retlast, MYSQL_ASSOC);
                           $lastid =$rowlast['idx'];
                          
                        

                          if ($blogid == $lastid){
                             $sql = 'SELECT * FROM think_blog_en where idx = "'.$lastid.'" LIMIT 1'; //OFFSET
                                $retval = mysql_query( $sql, $conn );                                  
                                if(! $retval )
                                {
                                   die('Could not get data: ' . mysql_error());
                                }
                                $rowlasts = mysql_fetch_array($retval, MYSQL_ASSOC);
                                $next_id_en = $rowlasts['idx'];   
                          } elseif ($blogid != $lastid){
                          $sql = 'SELECT * FROM think_blog_en where idx = "'.$blogid.'"+1 LIMIT 1'; //OFFSET
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
                        $firstrowzh = 'SELECT * FROM think_blog_zh ORDER BY idx ASC LIMIT 1';
                        $retfirstzh = mysql_query( $firstrowzh, $conn );               
                        if(! $retfirstzh )
                        {
                           die('Could not get data: ' . mysql_error());
                        }
                        $rowfirstzh = mysql_fetch_array($retfirstzh, MYSQL_ASSOC);
                           $firstidzh =$rowfirstzh['idx'];


                        if ($blogid == $firstidzh){
                             $sql = 'SELECT * FROM think_blog_zh where idx = "'.$firstidzh.'" LIMIT 1'; //OFFSET
                                $retval = mysql_query( $sql, $conn );                                  
                                if(! $retval )
                                {
                                   die('Could not get data: ' . mysql_error());
                                }
                                $rowfirsts = mysql_fetch_array($retval, MYSQL_ASSOC);
                                $prev_id_zh = $rowfirsts['idx'];
                          } elseif ($blogid != $firstidzh){
                              $sql = 'SELECT * FROM think_blog_zh where idx = "'.$blogid.'"-1 LIMIT 1'; //OFFSET
                                    $retval = mysql_query( $sql, $conn );                                      
                                    if(! $retval )
                                    {
                                       die('Could not get data: ' . mysql_error());
                                    }
                                    $rowfirsts = mysql_fetch_array($retval, MYSQL_ASSOC);
                                    $prev_id_zh = $rowfirsts['idx'];                              
                                 } 



                        $lastrowzh = 'SELECT * FROM think_blog_zh ORDER BY idx DESC LIMIT 1';
                        $retlastzh = mysql_query( $lastrowzh, $conn );               
                        if(! $retlastzh )
                        {
                           die('Could not get data: ' . mysql_error());
                        }
                        $rowlastzh = mysql_fetch_array($retlastzh, MYSQL_ASSOC);
                           $lastidzh =$rowlastzh['idx'];                          
                        

                          if ($blogid == $lastidzh){
                             $sql = 'SELECT * FROM think_blog_zh where idx = "'.$lastidzh.'" LIMIT 1'; //OFFSET
                                $retval = mysql_query( $sql, $conn );                                  
                                if(! $retval )
                                {
                                   die('Could not get data: ' . mysql_error());
                                }
                                $rowlasts = mysql_fetch_array($retval, MYSQL_ASSOC);
                                $next_id_zh = $rowlasts['idx'];                
                          } elseif ($blogid != $lastidzh){
                          $sql = 'SELECT * FROM think_blog_zh where idx = "'.$blogid.'"+1 LIMIT 1'; //OFFSET
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

        $_SESSION["blog_session"] = $blogid;
        $_SESSION["url_session"] = urlencode($url);
        header('Content-Type: text/html; charset=utf-8');
        header("Refresh:0; url=/we_think/Articles/?".urlencode($url)); 

        }
?>