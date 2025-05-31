<?php
include '../lang/lang.php';
mysql_set_charset("utf8");

include 'menuDAO.php';
include 'footerDAO.php';

$current_lang = $_SESSION['lang'];


$projectid = mysql_real_escape_string($_GET['project_id'],$conn);
//$projectid = $_SESSION["project_session"];

//$getName = explode("/",$_SERVER['REQUEST_URI']);
$retval_singlecasezh = '';

                        $sqlprojecten = 'select * from digisurf_project WHERE url="'.$projectid.'" and code ="'.$current_lang.'" LIMIT 1';
                        $retval_singlecaseen = mysql_query( $sqlprojecten, $conn );                 
                             if(! $retval_singlecaseen )
                             {
                                die('Could not get data: ' . mysql_error());
                             }  


                        $row_singlecaseen = mysql_fetch_array($retval_singlecaseen, MYSQL_ASSOC);
                        $event_idx = $row_singlecaseen['idx']; 
                        $case_text1 = $row_singlecaseen['text1'];
                        $case_text2 = $row_singlecaseen['text2'];
                        $case_text3 = $row_singlecaseen['text3'];
                        $case_text4 = $row_singlecaseen['text4'];
                        $case_entext5 = $row_singlecaseen['text5'];
                        $case_text6 = $row_singlecaseen['text6'];
                        $case_entext7 = $row_singlecaseen['text7'];
                        $case_text8 = $row_singlecaseen['text8'];
                        $case_text9 = $row_singlecaseen['text9'];
                        $case_text10 = $row_singlecaseen['text10'];
                        $case_text11 = $row_singlecaseen['text11'];
                        $case_text12 = $row_singlecaseen['text12'];
                        $case_text13 = $row_singlecaseen['text13'];
                        $case_entext14 = $row_singlecaseen['text14'];
                        $case_text15 = $row_singlecaseen['text15'];
                        $case_entext16 = $row_singlecaseen['text16'];
                        $case_text17 = $row_singlecaseen['text17'];
                        $case_text18 = $row_singlecaseen['text18'];
                        $case_image1 = $row_singlecaseen['image1'];
                        $case_image2 = $row_singlecaseen['image2'];
                        $case_image3 = $row_singlecaseen['image3'];


                        $single_case_text1 = $case_text1;
                        $single_case_text2 = $case_text2;
                        $single_case_text3 = $case_text3;
                        //$single_case_text4 = $case_text4;
                        $single_case_text5 = $case_text5;
                        $single_case_text6 = $case_text6;
                        $single_case_image1 = $case_image1;

                            $case_textparagraph5 = trim($case_entext5);
                            $case_trimmedtext5 = nl2br($case_textparagraph5); 
                            $case_text5 = $case_trimmedtext5; 

                            $case_textparagraph7 = trim($case_entext7);
                            $case_trimmedtext7 = nl2br($case_textparagraph7); 
                            $case_text7 = $case_trimmedtext7; 

                            $case_textparagraph14 = trim($case_entext14);
                            $case_trimmedtext14 = nl2br($case_textparagraph14); 
                            $case_text14 = $case_trimmedtext14; 

                            $case_textparagraph16 = trim($case_entext16);
                            $case_trimmedtext16 = nl2br($case_textparagraph16); 
                            $case_text16 = $case_trimmedtext16; 



                        
                        $sqlprojecten_link = 'select * from digisurf_project WHERE url="'.$projectid.'" and code ="'.$current_lang.'" LIMIT 1';
                        $retval_singlecaseen_link = mysql_query( $sqlprojecten_link, $conn );                 
                             if(! $retval_singlecaseen_link )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

                                $row_singlecaseen_link = mysql_fetch_array($retval_singlecaseen_link, MYSQL_ASSOC);
                                $case_url_en = $row_singlecaseen_link['url'];
        





                        //Case Study Page Bottom
                        $sqloldcasesen = 'select * from digisurf_project WHERE url !="'.$projectid.'" and code ="'.$current_lang.'" ORDER BY idx ASC';
                        $retval_oldcases_en = mysql_query( $sqloldcasesen, $conn );                 
                             if(! $retval_oldcases_en )
                             {
                                die('Could not get data: ' . mysql_error());
                             } 


                        $oldcases = '';
                        while($row_oldcases_en = mysql_fetch_array($retval_oldcases_en, MYSQL_ASSOC)){
                            $idx = $row_oldcases_en['idx'];
                            $text4 = $row_oldcases_en['text4'];
                            $text5 = $row_oldcases_en['text5'];
                            $image = $row_oldcases_en['image1']; 
                            $url = $row_oldcases_en['url'];

                                         $oldcases .= '<div class="swiper-slide">
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
                        //$lang['oldcases'] = $oldcases;
                    






                        $sqlcase_relateden = 'select * from digisurf_project WHERE url="'.$projectid.'" and code ="'.$current_lang.'" LIMIT 1';
                        $retval_case_relateden = mysql_query( $sqlcase_relateden, $conn );                 
                             if(! $retval_case_relateden )
                             {
                                die('Could not get data: ' . mysql_error());
                             }


                            $row_case_relateden = mysql_fetch_array($retval_case_relateden, MYSQL_ASSOC);
                            $case_encategory1 = $row_case_relateden['category1'];
                            $case_encategory2 = $row_case_relateden['category2'];
                            $case_encategory3 = $row_case_relateden['category3'];
                            $case_encategory4 = $row_case_relateden['category4'];
                            $case_encategory5 = $row_case_relateden['category5'];
                            $case_encategory6 = $row_case_relateden['category6'];
                            $case_encategory7 = $row_case_relateden['category7'];
                            $case_encategory8 = $row_case_relateden['category8'];
                            $case_encategory9 = $row_case_relateden['category9'];
                            $case_encategory10 = $row_case_relateden['category10'];


                        //$related_case_name = mysql_real_escape_string($_POST['category1'],$conn);

                        if( $case_encategory1 != null || $case_encategory2 != null || $case_encategory3 != null || $case_encategory4 != null || $case_encategory5 != null || $case_encategory6 != null || $case_encategory7 != null || $case_encategory8 != null || $case_encategory9 != null || $case_encategory10 != null ){

                        $sql_related_case_name = 'select * from (select * from digisurf_project  WHERE category1 = "'.$case_encategory1.'" OR category2 = "'.$case_encategory2.'" OR category3 = "'.$case_encategory3.'" OR category4 = "'.$case_encategory4.'" OR category5 = "'.$case_encategory5.'" OR category6 = "'.$case_encategory6.'" OR category7 = "'.$case_encategory7.'" OR category8 = "'.$case_encategory8.'" OR category9 = "'.$case_encategory9.'" OR category10 = "'.$case_encategory10.'") As T1 Where T1.url !="'.$projectid.'" and code ="'.$current_lang.'" ORDER BY idx DESC';  

                             $retval_related_case_name = mysql_query( $sql_related_case_name, $conn );     
                             if(! $retval_related_case_name )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

                         }


                         $related_cases = '';
                        while($row_related_case_en = mysql_fetch_array($retval_related_case_name, MYSQL_ASSOC)){
                                    $idx = $row_related_case_en['idx'];
                                    $text4 = $row_related_case_en['text4'];
                                    $text5 = $row_related_case_en['text5'];
                                    $image = $row_related_case_en['image1']; 
                                    $url = $row_related_case_en['url'];


                                                 $related_cases .= '<div class="swiper-slide">
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
                        //$lang['related_cases'] = $related_cases;

?>