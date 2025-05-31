<?php
include '../lang/lang.php';
mysql_set_charset("utf8");


include 'menuDAO.php';
include 'footerDAO.php';
$current_lang = $_SESSION['lang'];
$courseType = '';
$teachers = '';
$catcc_type = array();
                    //CONTENT
                        
                        $sql_catcc_types = 'select * from corclasses';
                        $retval_catcc_types = mysql_query( $sql_catcc_types, $conn );
                             if(! $retval_catcc_types )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

                        while($row_catcc_types = mysql_fetch_array($retval_catcc_types, MYSQL_ASSOC)){
                            $catcc_type[] = $row_catcc_types['cc_Type'];
                        }
                        

                        $sql_cattypes = 'select * from _types where Short IN ('.implode($catcc_type,',').') and Parent= 1';
                        $retval_cattypes = mysql_query( $sql_cattypes, $conn );
                             if(! $retval_cattypes )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

                        while($row_cattypes = mysql_fetch_array($retval_cattypes, MYSQL_ASSOC)){
                        $cattype = $row_cattypes['Type'];
                        $catshort = $row_cattypes['Short'];

                            $courseType .= '<option value="'.$catshort.'">'.$cattype.'</option>';

                        }

                        $sqlen_teachers = 'select * from cormember where ct_Type=02 and ct_No like "%D%"';
                        $retvalen_teachers = mysql_query( $sqlen_teachers, $conn );
                             if(! $retvalen_teachers )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

                        while($rowen_teachers = mysql_fetch_array($retvalen_teachers, MYSQL_ASSOC)){
                            $teachers_id = $rowen_teachers['ct_No'];
                            $teachers_name = $rowen_teachers['ct_Name'];

                            $teachers .= '<option value="'.$teachers_id.'">'.$teachers_name.'</option>';                         

                        }
                        
?>
