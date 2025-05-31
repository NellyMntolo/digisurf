<?php
include 'dbconfig.php';
mysql_set_charset("utf8");
//session_start();
$current_lang = $_SESSION['lang'];

                        $sqlcategory = 'select * from digisurf_categories WHERE code="'.$current_lang.'" ORDER BY sortable_order ASC';
                        $retvalcategory = mysql_query( $sqlcategory, $conn );                 
                             if(! $retvalcategory )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

                        $categories = '';
                        $all_categories = '';
                        
                        while($rowcategory = mysql_fetch_array($retvalcategory, MYSQL_ASSOC)){
                        $idx = $rowcategory['idx']; 
                        $text1 = $rowcategory['text1'];
                        $image1 = $rowcategory['image1']; 
                        $categories .= '<option name="category_name" value="'.$idx.'" class="names">'.$text1.'</option>';

                        $all_categories .= '<tr class="color-palette text-center product-list">
                                              <td><img src="'.$image1.'"></td>
                                              <td>'.$text1.'</td>
                                            </tr>'; 
                           }
                        


                        $sqlcategory_order = 'select * from digisurf_categories WHERE code="'.$current_lang.'" ORDER BY sortable_order ASC';
                        $retvalcategory_order = mysql_query( $sqlcategory_order, $conn );                 
                             if(! $retvalcategory_order )
                             {
                                die('Could not get data: ' . mysql_error());
                             }


                        $catag_langs = 'yes';
                        $catag_lang = '';
                        $sqlcatag_lang = 'select * from lang WHERE status = "'.$catag_langs.'" AND code != "'.$current_lang.'" ';
                            $retvalcatag_lang = mysql_query( $sqlcatag_lang, $conn );                 
                                 if(! $retvalcatag_lang )
                                 {
                                    die('Could not get data: ' . mysql_error());
                                 }

                            while($rowcatag_lang = mysql_fetch_array($retvalcatag_lang, MYSQL_ASSOC)){
                            $new_code = $rowcatag_lang['code']; 
                            $new_name = $rowcatag_lang['name'];  
                            $catag_lang .= '<option value="'.$new_code.'">'.$new_name.'</option>'; 
                               } 
?>