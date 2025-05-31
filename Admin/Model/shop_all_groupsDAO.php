<?php
include 'dbconfig.php';
mysql_set_charset("utf8");
$current_lang = $_SESSION['lang'];
                        $sqlweareen = 'select * from shop_digisurf_group order by idx DESC';
                        $retvalweareen = mysql_query( $sqlweareen, $conn );                 
                             if(! $retvalweareen )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

                        $total_groups =mysql_num_rows($retvalweareen);

                        $all_groups_other = '';
                        $all_groups = '';
                        while($rowweareen = mysql_fetch_array($retvalweareen, MYSQL_ASSOC)){
                            $group_id = $rowweareen['group_id']; 
                            $group_name = $rowweareen['group_name'];
                            $group_discount = $rowweareen['group_discount'];
                            $group_theme = $rowweareen['group_theme'];
                            $group_url = $rowweareen['group_url'];
                            $group_start_date = $rowweareen['group_start_date'];
                            $group_update_date = $rowweareen['group_update_date'];

                            $sqlmembers = 'select * from shop_digisurf_group_members where group_id = "'.$group_id.'"';
                            $retvalmembers = mysql_query( $sqlmembers, $conn );                 
                             if(! $retvalmembers )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

                             $total_members =mysql_num_rows($retvalmembers);

                             $all_groups_other .= '<option value="'.$group_id.'">'.$group_name.'</option>';

                            if($group_theme == 1){
                            $all_groups .= '<tr class="text-teal text-center">
                                              <td>'.$group_name.'</td>
                                              <td>'.$group_discount.'%</td>
                                              <td>'.$total_members.'</td>
                                              <td>'.$group_start_date.'</td>
                                              <td>'.$group_update_date.'</td>
                                              <td><a href="/Admin/ViewGroup/'.$group_url.'" class="btn bg-teal btn-flat"><i class="fa fa-pencil" style="width: 20px;"></i></a></td>
                                            </tr>';
                                }

                            if($group_theme == 2){
                            $all_groups .= '<tr class="text-aqua text-center">
                                              <td>'.$group_name.'</td>
                                              <td>'.$group_discount.'%</td>
                                              <td>'.$total_members.'</td>
                                              <td>'.$group_start_date.'</td>
                                              <td>'.$group_update_date.'</td>
                                              <td><a href="/Admin/ViewGroup/'.$group_url.'" class="btn bg-aqua btn-flat"><i class="fa fa-pencil" style="width: 20px;"></i></a></td>
                                            </tr>';
                                }


                            if($group_theme == 3){
                            $all_groups .= '<tr class="text-light-blue text-center">
                                              <td>'.$group_name.'</td>
                                              <td>'.$group_discount.'%</td>
                                              <td>'.$total_members.'</td>
                                              <td>'.$group_start_date.'</td>
                                              <td>'.$group_update_date.'</td>
                                              <td><a href="/Admin/ViewGroup/'.$group_url.'" class="btn bg-light-blue btn-flat"><i class="fa fa-pencil" style="width: 20px;"></i></a></td>
                                            </tr>';
                                }

                            if($group_theme == 4){
                            $all_groups .= '<tr class="text-navy text-center">
                                              <td>'.$group_name.'</td>
                                              <td>'.$group_discount.'%</td>
                                              <td>'.$total_members.'</td>
                                              <td>'.$group_start_date.'</td>
                                              <td>'.$group_update_date.'</td>
                                              <td><a href="/Admin/ViewGroup/'.$group_url.'" class="btn bg-navy btn-flat"><i class="fa fa-pencil" style="width: 20px;"></i></a></td>
                                            </tr>';
                                }






                        }

?>