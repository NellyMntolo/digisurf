<?php
include '../lang/lang.php';
mysql_set_charset("utf8");

include 'menuDAO.php';
include 'footerDAO.php';

$current_lang = $_SESSION['lang'];

$solutionid = mysql_real_escape_string($_GET['workshop_id'],$conn);
//$solutionid = $_SESSION["solution_session"];

//$getName = explode("/",$_SERVER['REQUEST_URI']);


                        $sqlsolutionen = 'select * from digisurf_solution WHERE url="'.$solutionid.'" AND code ="'.$current_lang.'" LIMIT 1';
                        $retval_singlesolutionen = mysql_query( $sqlsolutionen, $conn );                 
                             if(! $retval_singlesolutionen )
                             {
                                die('Could not get data: ' . mysql_error());
                             }



                        $row_singlesolutionen = mysql_fetch_array($retval_singlesolutionen, MYSQL_ASSOC);
                        $workshop_idx = $row_singlesolutionen['idx']; 
                        $solution_text1 = $row_singlesolutionen['text1'];
                        $solution_text2 = $row_singlesolutionen['text2'];
                        $solution_text3 = $row_singlesolutionen['text3'];
                        $solution_text4 = $row_singlesolutionen['text4'];
                        $solution_text5 = $row_singlesolutionen['text5'];
                        $solution_text6 = $row_singlesolutionen['text6'];
                        $solution_text7 = $row_singlesolutionen['text7'];
                        $solution_text8 = $row_singlesolutionen['text8'];
                        $solution_text9 = $row_singlesolutionen['text9'];
                        $solution_text10 = $row_singlesolutionen['text10'];
                        $solution_text11 = $row_singlesolutionen['text11'];
                        $solution_text12 = $row_singlesolutionen['text12'];
                        $solution_text13 = $row_singlesolutionen['text13'];
                        $solution_text14 = $row_singlesolutionen['text14'];
                        $solution_text15 = $row_singlesolutionen['text15'];
                        $solution_image1 = $row_singlesolutionen['image1'];
                        $solution_image2 = $row_singlesolutionen['image2'];
                        $solution_image3 = $row_singlesolutionen['image3'];
                        $solution_image4 = $row_singlesolutionen['image4'];
                        $solution_image5 = $row_singlesolutionen['image5'];


                        $single_solution_text1 = $solution_text1;
                        $single_solution_text2 = $solution_text2;
                        $single_solution_text3 = $solution_text3;
                        $single_solution_text4 = $solution_text4;
                        $single_solution_text5 = $solution_text5;
                        $solution_textparagraph6 = trim($solution_text6);
                        $solution_trimmedtext6 = nl2br($solution_textparagraph6); 
                        $single_solution_text6 = $solution_trimmedtext6;
                        $single_solution_text7 = $solution_text7;
                        $solution_textparagraph8 = trim($solution_text8);
                        $solution_trimmedtext8 = nl2br($solution_textparagraph8); 
                        $single_solution_text8 = $solution_trimmedtext8;
                        $single_solution_text9 = $solution_text9;

                        /*
                        $solution_textparagraph10 = trim($solution_text10);
                        $solution_trimmedtext10 = nl2br($solution_textparagraph10); 
                        $single_solution_text10 = $solution_trimmedtext10;
                        */

                        $newstring10 = '';
                        if ($solution_text10 != null) {
                        $solution_textparagraph10 = trim($solution_text10);

                        $bits10 = explode("\r\n", $solution_textparagraph10);
                        foreach($bits10 as $bit10)
                        {
                          $newstring10.= "<li>" . $bit10 . "</li>";
                        }
                        }
                        $single_solution_text10 = $newstring10;



                        $single_solution_text11 = $solution_text11;
                        $single_solution_text12 = $solution_text12;
                        $single_solution_text13 = $solution_text13;
                        $single_solution_text14 = $solution_text14;
                        $single_solution_text15 = $solution_text15;
                        $single_solution_image1 = $solution_image1;
                        $single_solution_image2 = $solution_image2;
                        $single_solution_image3 = $solution_image3;
                        $single_solution_image4 = $solution_image4;
                        $single_solution_image5 = $solution_image5;
         


                        $sqlurlen = 'select * from digisurf_solution WHERE url="'.$solutionid.'" AND code ="'.$current_lang.'" LIMIT 1';
                        $retval_urlen = mysql_query( $sqlurlen, $conn );                 
                             if(! $retval_urlen )
                             {
                                die('Could not get data: ' . mysql_error());
                             }  
                             $rowurlen = mysql_fetch_array($retval_urlen, MYSQL_ASSOC);
                             $linkurlen = $rowurlen['sortable_order'];





                        /*
                        $sqlview_solutionview = 'select solutions from popular';
                        $retvalview_solution = mysql_query( $sqlview_solutionview, $conn );
                             if(! $retvalview_solution )
                             {
                                die('Could not get data: ' . mysql_error());
                             }
                        $rowview_solution = mysql_fetch_array($retvalview_solution, MYSQL_ASSOC);
                            $solution_views = $rowview_solution['solutions'];


                            $view_update_solution = $solution_views+1;


                            $sql_viewssolutions="UPDATE popular SET views='".$view_update_solution."' LIMIT 1 ";              
                               $retval_viewssolutions = mysql_query( $sql_viewssolutions, $conn );
                               if(! $retval_viewssolutions )
                                   {
                                      die('Could not viewter data: ' . mysql_error());
                                   }
                        */

                                  // echo $_SERVER['REMOTE_ADDR'];

                                   

                             
//NEXT PREV ENG
                        $firstrow = 'SELECT * FROM digisurf_solution WHERE code ="'.$current_lang.'" ORDER BY sortable_order ASC LIMIT 1';
                        $retfirst = mysql_query( $firstrow, $conn );               
                        if(! $retfirst )
                        {
                           die('Could not get data: ' . mysql_error());
                        }
                        $rowfirst = mysql_fetch_array($retfirst, MYSQL_ASSOC);
                           $firstid =$rowfirst['sortable_order'];

                        $lastrow = 'SELECT * FROM digisurf_solution WHERE code ="'.$current_lang.'" ORDER BY sortable_order DESC LIMIT 1';
                        $retlast = mysql_query( $lastrow, $conn );               
                        if(! $retlast )
                        {
                           die('Could not get data: ' . mysql_error());
                        }
                        $rowlast = mysql_fetch_array($retlast, MYSQL_ASSOC);
                           $lastid =$rowlast['sortable_order'];



                        if ($linkurlen == $firstid){
                             $sql = 'SELECT * FROM digisurf_solution where sortable_order = "'.$lastid.'" AND code ="'.$current_lang.'" LIMIT 1'; //OFFSET
                                $retval = mysql_query( $sql, $conn );                                  
                                if(! $retval )
                                {
                                   die('Could not get data: ' . mysql_error());
                                }
                                $rowfirsts = mysql_fetch_array($retval, MYSQL_ASSOC);
                                $prev_id_en = $rowfirsts['url'];
                          } elseif ($linkurlen != $firstid){
                              $sql = 'SELECT * FROM digisurf_solution where sortable_order = "'.$linkurlen.'"-1 AND code ="'.$current_lang.'" LIMIT 1'; //OFFSET
                                    $retval = mysql_query( $sql, $conn );                                      
                                    if(! $retval )
                                    {
                                       die('Could not get data: ' . mysql_error());
                                    }
                                    $rowfirsts = mysql_fetch_array($retval, MYSQL_ASSOC);
                                    $prev_id_en = $rowfirsts['url'];
                            }                          
                        

                          if ($linkurlen == $lastid){
                             $sql = 'SELECT * FROM digisurf_solution where sortable_order = "'.$firstid.'" AND code ="'.$current_lang.'" LIMIT 1'; //OFFSET
                                $retval = mysql_query( $sql, $conn );                                  
                                if(! $retval )
                                {
                                   die('Could not get data: ' . mysql_error());
                                }
                                $rowlasts = mysql_fetch_array($retval, MYSQL_ASSOC);
                                $next_id_en = $rowlasts['url'];   
                                $next_title_en = $rowlasts['text4']; 
                                $next_image_en = $rowlasts['image1']; 
                          } elseif ($linkurlen != $lastid){
                          $sql = 'SELECT * FROM digisurf_solution where sortable_order = "'.$linkurlen.'"+1 AND code ="'.$current_lang.'" LIMIT 1'; //OFFSET
                                $retval = mysql_query( $sql, $conn );                                  
                                if(! $retval )
                                {
                                   die('Could not get data: ' . mysql_error());
                                }
                                $rowlasts = mysql_fetch_array($retval, MYSQL_ASSOC);
                                $next_id_en = $rowlasts['url'];
                                $next_title_en = $rowlasts['text4']; 
                                $next_image_en = $rowlasts['image1']; 
                             } 


                                $solution_next_id = $next_id_en;
                                $solution_next_title = $next_title_en;
                                $solution_next_image = $next_image_en;
//NEXT PREV ENG

//NEXT PREV ZH
                             /*
                        $firstrowzh = 'SELECT * FROM green_solution_zh ORDER BY sortable_order ASC LIMIT 1';
                        $retfirstzh = mysql_query( $firstrowzh, $conn );               
                        if(! $retfirstzh )
                        {
                           die('Could not get data: ' . mysql_error());
                        }
                        $rowfirstzh = mysql_fetch_array($retfirstzh, MYSQL_ASSOC);
                           $firstidzh =$rowfirstzh['sortable_order'];


                        $lastrowzh = 'SELECT * FROM green_solution_zh ORDER BY sortable_order DESC LIMIT 1';
                        $retlastzh = mysql_query( $lastrowzh, $conn );               
                        if(! $retlastzh )
                        {
                           die('Could not get data: ' . mysql_error());
                        }
                        $rowlastzh = mysql_fetch_array($retlastzh, MYSQL_ASSOC);
                           $lastidzh =$rowlastzh['sortable_order']; 


                        if ($linkurlzh == $firstidzh){
                             $sql = 'SELECT * FROM green_solution_zh where sortable_order = "'.$lastidzh.'" LIMIT 1'; //OFFSET
                                $retval = mysql_query( $sql, $conn );                                  
                                if(! $retval )
                                {
                                   die('Could not get data: ' . mysql_error());
                                }
                                $rowfirsts = mysql_fetch_array($retval, MYSQL_ASSOC);
                                $prev_id_zh = $rowfirsts['url'];
                          } elseif ($linkurlzh != $firstidzh){
                              $sql = 'SELECT * FROM green_solution_zh where sortable_order = "'.$linkurlzh.'"-1 LIMIT 1'; //OFFSET
                                    $retval = mysql_query( $sql, $conn );                                      
                                    if(! $retval )
                                    {
                                       die('Could not get data: ' . mysql_error());
                                    }
                                    $rowfirsts = mysql_fetch_array($retval, MYSQL_ASSOC);
                                    $prev_id_zh = $rowfirsts['url'];                              
                                 }                                                  
                        

                          if ($linkurlzh == $lastidzh){
                             $sql = 'SELECT * FROM green_solution_zh where sortable_order = "'.$firstidzh.'" LIMIT 1'; //OFFSET
                                $retval = mysql_query( $sql, $conn );                                  
                                if(! $retval )
                                {
                                   die('Could not get data: ' . mysql_error());
                                }
                                $rowlasts = mysql_fetch_array($retval, MYSQL_ASSOC);
                                $next_id_zh = $rowlasts['url'];      
                                $next_title_zh = $rowlasts['text4']; 
                                $next_image_zh = $rowlasts['image1'];           
                          } elseif ($linkurlzh != $lastidzh){
                          $sql = 'SELECT * FROM green_solution_zh where sortable_order = "'.$linkurlzh.'"+1 LIMIT 1'; //OFFSET
                                $retval = mysql_query( $sql, $conn );                                  
                                if(! $retval )
                                {
                                   die('Could not get data: ' . mysql_error());
                                }
                                $rowlasts = mysql_fetch_array($retval, MYSQL_ASSOC);
                                $next_id_zh = $rowlasts['url'];
                                $next_title_zh = $rowlasts['text4'];
                                $next_image_zh = $rowlasts['image1'];
                             } 

*/





                        $sqlcase_solution_relateden = 'select * from digisurf_solution WHERE url="'.$solutionid.'" AND code ="'.$current_lang.'" LIMIT 1';
                        $retval_case_solution_relateden = mysql_query( $sqlcase_solution_relateden, $conn );                 
                             if(! $retval_case_solution_relateden )
                             {
                                die('Could not get data: ' . mysql_error());
                             } 

                            $row_case_solution_relateden = mysql_fetch_array($retval_case_solution_relateden, MYSQL_ASSOC);
                            $case_solution_encategory1 = $row_case_solution_relateden['category1'];
                            $case_solution_encategory2 = $row_case_solution_relateden['category2'];
                            $case_solution_encategory3 = $row_case_solution_relateden['category3'];
                            $case_solution_encategory4 = $row_case_solution_relateden['category4'];
                            $case_solution_encategory5 = $row_case_solution_relateden['category5'];
                            $case_solution_encategory6 = $row_case_solution_relateden['category6'];
                            $case_solution_encategory7 = $row_case_solution_relateden['category7'];
                            $case_solution_encategory8 = $row_case_solution_relateden['category8'];
                            $case_solution_encategory9 = $row_case_solution_relateden['category9'];
                            $case_solution_encategory10 = $row_case_solution_relateden['category10'];


                        //$related_case_solution_name = mysql_real_escape_string($_POST['category1'],$conn);

                        if( $case_solution_encategory1 != null || $case_solution_encategory2 != null || $case_solution_encategory3 != null || $case_solution_encategory4 != null || $case_solution_encategory5 != null || $case_solution_encategory6 != null || $case_solution_encategory7 != null || $case_solution_encategory8 != null || $case_solution_encategory9 != null || $case_solution_encategory10 != null ){

                        $sql_related_case_solution_name = 'select * from digisurf_project  WHERE text4 = "'.$case_solution_encategory1.'" OR text4 = "'.$case_solution_encategory2.'" OR text4 = "'.$case_solution_encategory3.'" OR text4 = "'.$case_solution_encategory4.'" OR text4 = "'.$case_solution_encategory5.'" OR text4 = "'.$case_solution_encategory6.'" OR text4 = "'.$case_solution_encategory7.'" OR text4 = "'.$case_solution_encategory8.'" OR text4 = "'.$case_solution_encategory9.'" OR text4 = "'.$case_solution_encategory10.'" ORDER BY idx DESC';  

                             $retval_related_case_solution_name = mysql_query( $sql_related_case_solution_name, $conn );     
                             if(! $retval_related_case_solution_name )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

                         }


                            $related_case_solutions = '';
                            while($row_related_case_solution_en = mysql_fetch_array($retval_related_case_solution_name, MYSQL_ASSOC)){
                                        $idx = $row_related_case_solution_en['idx'];
                                        $text4 = $row_related_case_solution_en['text4'];
                                        $text5 = $row_related_case_solution_en['text5'];
                                        $image = $row_related_case_solution_en['image1']; 
                                        $url = $row_related_case_solution_en['url'];


                                                     $related_case_solutions .= '<div class="swiper-slide">
                                                                                    <a href="/Case_Studies/projects/'.$url.'">
                                                                                    <div class="case-pre">
                                                                                        <div class="case-pre-content">
                                                                                            <div class="case-pre-content-img">
                                                                                                <img src="'.$image.'"/>
                                                                                            </div>
                                                                                            <h3>'.$text4.'</h3>
                                                                                        </div>
                                                                                    </div>
                                                                                    </a>
                                                                                </div>';   
                                                                                                  

                                                      
                                    }
                            //$related_case_solutions = $related_case_solutions;


?>