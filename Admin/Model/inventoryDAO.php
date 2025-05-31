<?php
include 'dbconfig.php';
mysql_set_charset("utf8");
$current_lang = $_SESSION['lang'];
                        $sqlinventory = 'select * from shop_digisurf_inventory order by idx desc';
                        $retvalinventory = mysql_query( $sqlinventory, $conn );                 
                             if(! $retvalinventory )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

                        $all_inventory = '';
                        while($rowinventory = mysql_fetch_array($retvalinventory, MYSQL_ASSOC)){
                            $idx = $rowinventory['idx']; 
                            $inventory_name = $rowinventory['inventory_name'];
                            $inventory_spec_number = $rowinventory['inventory_spec_number'];
                            $inventory_quantity = $rowinventory['inventory_quantity'];
                            $inventory_points = $rowinventory['inventory_points'];
                            $inventory_date = $rowinventory['inventory_date'];

                            $all_inventory .= '<tr class="text-center">
                                                  <th>'.$inventory_name.'</th>
                                                  <th>'.$inventory_spec_number.'</th>
                                                  <th>'.$inventory_quantity.'</th>
                                                  <th>'.$inventory_points.'</th>
                                                  <th>'.$inventory_date.'</th>
                                                </tr>';
                        }

?>