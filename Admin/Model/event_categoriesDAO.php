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

                        $sql_lang = 'select * from lang WHERE code= "'.$current_lang.'" ';
                            $retval_lang = mysql_query( $sql_lang, $conn );                 
                                 if(! $retval_lang )
                                 {
                                    die('Could not get data: ' . mysql_error());
                                 }

                            $row_lang = mysql_fetch_array($retval_lang, MYSQL_ASSOC);
                            $lang_name = $row_lang['name'];
                        
                        while($rowcategory = mysql_fetch_array($retvalcategory, MYSQL_ASSOC)){
                        $category_idx = $rowcategory['text2']; 
                        $category_name = $rowcategory['text1'];
                        $category_image = $rowcategory['image1']; 
                        //$categories .= '<option name="category_name" value="'.$idx.'" class="names">'.$text1.'</option>';

                        $all_categories .= '<tr class="color-palette text-center product-list">
                                              <!--<td><img src="'.$category_image.'"></td>-->
                                              <td>'.$category_name.'</td>
                                              <td>'.$lang_name.'</td>
                                              <td><button type="button" class="btn btn-primary btn-flat" onclick="window.location=\'/Admin/EditEventCategories/'.$category_idx.'\';"><i class="fa fa-edit"></i></button></td>
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