<?php
include '../lang/lang.php';
mysql_set_charset("utf8");

include 'menuDAO.php';
include 'footerDAO.php';
$current_lang = $_SESSION['lang'];
                    //CONTENT
                        $sqlen_marker = 'select * from digisurf_stores order by idx asc';
                        $retvalen_marker = mysql_query( $sqlen_marker, $conn );
                             if(! $retvalen_marker )
                             {
                                die('Could not get data: ' . mysql_error());
                             }
                        $all_markers = '';
                        while($rowen_marker = mysql_fetch_array($retvalen_marker, MYSQL_ASSOC)) {
                            $marker_store_id = $rowen_marker['idx'];
                            $marker_store_name = $rowen_marker['store_name'];
                            $marker_store_address = $rowen_marker['store_address'];
                            $marker_store_lat = $rowen_marker['store_lat'];
                            $marker_store_lng = $rowen_marker['store_lng'];
                            $marker_store_type = $rowen_marker['store_type'];

                            $marker_store_url = $rowen_marker['store_url'];
                            $marker_store_image1 = $rowen_marker['store_image1'];

                            // $marker_textparagraph6 = trim($marker_entext6);
                            // $marker_trimmedtext6 = nl2br($marker_textparagraph6); 
                            // $marker_text6 = $marker_trimmedtext6;

                            // $marker_textparagraph5 = trim($marker_entext5);
                            // $marker_trimmedtext5 = nl2br($marker_textparagraph5); 
                            // $marker_text5 = $marker_trimmedtext5;

                            $all_markers ="<?xml version='1.0' encoding='UTF-8'?>
                            <markers>
                                <marker id='$marker_store_id' name='$marker_store_name' address='$marker_store_address' lat='$marker_store_lat' lng='$marker_store_lng' type='$marker_store_type'/>
                            </markers>";

$xml=simplexml_load_string($all_markers) or die("Error: Cannot create object");
print_r($xml);
//echo $xml;

// $myjsontest = $xml;

// echo "<br><br> Json below: <br><br>".json_decode($myjsontest);

}


?>