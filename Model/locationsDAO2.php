<?php
error_reporting(E_ALL);
include '../lang/lang.php';
mysql_set_charset("utf8");


include 'menuDAO.php';
include 'footerDAO.php';
$current_lang = $_SESSION['lang'];

// Start XML file, create parent node
$doc = domxml_new_doc("1.0");
$node = $doc->create_element("markers");
$parnode = $doc->append_child($node);

                        $sqlen_marker = 'select * from digisurf_stores order by idx asc';
                        $retvalen_marker = mysql_query( $sqlen_marker, $conn );
                             if(! $retvalen_marker )
                             {
                                die('Could not get data: ' . mysql_error());
                             }
                        $all_markers = '';




                        // function parseToXML($htmlStr)
                        //     {
                        //     $xmlStr=str_replace('<','&lt;',$htmlStr);
                        //     $xmlStr=str_replace('>','&gt;',$xmlStr);
                        //     $xmlStr=str_replace('"','&quot;',$xmlStr);
                        //     $xmlStr=str_replace("'",'&#39;',$xmlStr);
                        //     $xmlStr=str_replace("&",'&amp;',$xmlStr);
                        //     return $xmlStr;
                        //     }





                       // header("Content-type: text/xml");

                            // Start XML file, echo parent node
                            

                        while($rowen_marker = mysql_fetch_array($retvalen_marker, MYSQL_ASSOC)) {
                            $marker_store_id = $rowen_marker['store_id'];
                            $marker_store_name = $rowen_marker['store_name'];
                            $marker_store_address = $rowen_marker['store_address'];
                            $marker_store_lat = $rowen_marker['store_lat'];
                            $marker_store_lng = $rowen_marker['store_lng'];
                            $marker_store_type = $rowen_marker['store_type'];

                            $marker_store_url = $rowen_marker['store_url'];
                            $marker_store_image1 = $rowen_marker['store_image1'];

}



// header("Content-type: text/xml");

//   // Add to XML document node
//   $node = $doc->create_element("marker");
//   $newnode = $parnode->append_child($node);

//   $newnode->set_attribute("store_id", $rowen_marker['store_id']);
//   $newnode->set_attribute("store_name", $rowen_marker['store_name']);
//   $newnode->set_attribute("store_address", $rowen_marker['store_address']);
//   $newnode->set_attribute("store_lat", $rowen_marker['store_lat']);
//   $newnode->set_attribute("store_lng", $rowen_marker['store_lng']);
//   $newnode->set_attribute("store_type", $rowen_marker['store_type']);
// }

// $xmlfile = $doc->dump_mem();
// echo $xmlfile;

?>