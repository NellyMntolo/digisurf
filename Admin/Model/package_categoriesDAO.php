<?php
include 'dbconfig.php';
mysql_set_charset("utf8");
$current_lang = $_SESSION['lang'];

                        $sqltag = 'select * from digisurf_package_categories WHERE code="'.$current_lang.'" ORDER BY sortable_order ASC';
                        $retvaltag = mysql_query( $sqltag, $conn );                 
                             if(! $retvaltag )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

                        $tags = '';
                        $all_categories = '';

                        $sql_lang = 'select * from lang WHERE code= "'.$current_lang.'" ';
                            $retval_lang = mysql_query( $sql_lang, $conn );                 
                                 if(! $retval_lang )
                                 {
                                    die('Could not get data: ' . mysql_error());
                                 }

                            $row_lang = mysql_fetch_array($retval_lang, MYSQL_ASSOC);
                            $lang_name = $row_lang['name'];   
                               
                        
                        while($rowtag = mysql_fetch_array($retvaltag, MYSQL_ASSOC)){
                        $category_idx = $rowtag['category_id']; 
                        $category_name = $rowtag['category_name'];
                        $category_image = $rowtag['image1'];
                        $category_url = $rowtag['url'];
                        $all_categories .= '<tr class="color-palette text-center product-list">
                                              <td><img src="'.$category_image.'"></td>
                                              <td>'.$category_name.'</td>
                                              <td>'.$lang_name.'</td>
                                              <td><button type="button" class="btn btn-primary btn-flat" onclick="window.location=\'/Admin/EditPackageCategories/'.$category_idx.'\';"><i class="fa fa-edit"></i></button></td>
                                            </tr>';
                           }




                        $sqltag_order = 'select * from digisurf_package_categories WHERE code="'.$current_lang.'" ORDER BY sortable_order ASC';
                        $retvaltag_order = mysql_query( $sqltag_order, $conn );                 
                             if(! $retvaltag_order )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

                        $tag_order = '';
                        while($rowtag_order = mysql_fetch_array($retvaltag_order, MYSQL_ASSOC)){
                        $idx = $rowtag_order['idx']; 
                        $text1 = $rowtag_order['category_name'];  
                        $tag_order .= '<a class="btn btn-block btn-social btn-default project-list" id="projectLis_'.$idx.'" style="width: 100%; margin-left: 0%;cursor:move;">
                                            <i class="fa fa-arrows-alt"></i> '.$text1.'
                                        </a>';
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