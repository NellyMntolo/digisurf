<?php
include 'dbconfig.php';
mysql_set_charset("utf8");
$current_lang = $_SESSION['lang'];

$all_stores = '';
$all_markers = '';
                    //CONTENT
                        $sqlen_marker = 'select * from digisurf_stores order by idx asc';
                        $retvalen_marker = mysql_query( $sqlen_marker, $conn );
                             if(! $retvalen_marker )
                             {
                                die('Could not get data: ' . mysql_error());
                             }
                        
                        while($rowen_marker = mysql_fetch_array($retvalen_marker, MYSQL_ASSOC)){
                            $marker_store_idx = $rowen_marker['idx'];
                            $marker_store_id = $rowen_marker['store_id'];
                            $marker_store_name = $rowen_marker['store_name'];
                            $marker_store_desc = $rowen_marker['store_description'];
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

                            $all_stores .= '<tr class="color-palette text-center">
                                                  <td>'.$marker_store_idx.'</td>
                                                  <td>'.$marker_store_name.'</td>
                                                  <td>'.$marker_store_desc.'</td>
                                                  <td>'.$marker_store_address.'</td>
                                                  <td>'.$marker_store_lat.'</td>
                                                  <td>'.$marker_store_lng.'</td>
                                                  <td>'.$marker_store_type.'</td>
                                                  <!-- <td>'.$marker_store_url.'</td>
                                                  <td>'.$marker_store_image1.'</td> -->
                                                  <td>
                                                  <div class="input-group input-group-lg">
                                                    <div class="input-group-btn">
                                                      <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"><i class="fa fa-pencil" style="width: 20px;"></i></button>
                                                      <ul class="dropdown-menu" style="margin-left: -100px;">
                                                        <li><form action="/Admin/Allstores" method="POST"><button type="submit" style="width:80%; background:transparent;" class="text-red" title="Cannot Undo" name="delete_store"><i class="fa fa-trash text-red"></i><input type="hidden" value="'.$marker_store_idx.'" name="delete_store"> Delete Store</button></form>
                                                        </li>
                                                      </ul>
                                                    </div><!-- /btn-group -->
                                                  </div><!-- /input-group -->
                                                  </td>
                                                </tr>';

                            $all_markers .= '<markers>
<marker id="'.$marker_store_id.'" name="'.$marker_store_name.'" address="'.$marker_store_address.'" lat="'.$marker_store_lat.'" lng="'.$marker_store_lng.'" type="'.$marker_store_type.'"/></markers>';
}

echo $all_markers;
?>