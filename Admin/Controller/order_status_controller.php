<?php
include '../Model/dbconfig.php';
mysql_set_charset("utf8");
session_start();
$current_lang = $_SESSION['lang'];

$current_order_id = $_POST['order_id'];
$current_order_status = $_POST['order_status'];

$sql="UPDATE shop_digisurf_order SET order_status='".$current_order_status."' WHERE order_id='".$current_order_id."' ";              
                   $retval = mysql_query( $sql, $conn );
                   if(! $retval )
                       {
                          die('Could not enter data: ' . mysql_error());
                       }



                    if($_POST['order_status'] == "D") {

                    	//GENERAL INFO
                    	$sqlgeneral_info = 'SELECT order_date, customer_id, order_points FROM shop_digisurf_order WHERE order_id="'.$current_order_id.'" ';
	                    $retvalgeneral_info = mysql_query( $sqlgeneral_info, $conn );                 
	                                             if(! $retvalgeneral_info )
	                                             {
	                                                die('Could not get data: ' . mysql_error());
	                                             }
	                    $rowgeneral_info = mysql_fetch_array($retvalgeneral_info, MYSQL_ASSOC);
	                    $general_info_order_date = $rowgeneral_info['order_date'];
	                    $general_info_customer_id = $rowgeneral_info['customer_id'];
	                    $general_info_order_points = $rowgeneral_info['order_points'];

	                    //OLD CUSTOMER POINTS
	                    $sqlold_customer_points = 'SELECT customer_points, customer_type FROM shop_digisurf_customer WHERE customer_id="'.$general_info_customer_id.'" ';
	                    $retvalold_customer_points = mysql_query( $sqlold_customer_points, $conn );                 
	                                             if(! $retvalold_customer_points )
	                                             {
	                                                die('Could not get data: ' . mysql_error());
	                                             }
	                    $rowold_customer_points = mysql_fetch_array($retvalold_customer_points, MYSQL_ASSOC);
	                    $old_customer_points = $rowold_customer_points['customer_points'];
	                    $old_customer_type = $rowold_customer_points['customer_type'];

	                    //UPDATE CUSTOMER POINTS - FRONT-END
	                    /*$customer_point_update = $old_customer_points + $general_info_order_points;                  
	                    $sql_user_points="UPDATE shop_digisurf_customer SET customer_points='".$customer_point_update."'  WHERE customer_id='".$general_info_customer_id."' LIMIT 1 ";              
	                    $retval_user_points = mysql_query( $sql_user_points, $conn );
	                    if(! $retval_user_points )
	                       {
	                          die('Could not enter data: ' . mysql_error());
	                       }
	                       */


	                    //NEW CUSTOMER POINTS/TYPE
	                    $sqlnew_customer_points = 'SELECT customer_points, customer_type, customer_member_id FROM shop_digisurf_customer WHERE customer_id="'.$general_info_customer_id.'" ';
	                    $retvalnew_customer_points = mysql_query( $sqlnew_customer_points, $conn );                 
	                                             if(! $retvalnew_customer_points )
	                                             {
	                                                die('Could not get data: ' . mysql_error());
	                                             }
	                    $rownew_customer_points = mysql_fetch_array($retvalnew_customer_points, MYSQL_ASSOC);
	                    $new_customer_points = $rownew_customer_points['customer_points'];
	                    $new_customer_type = $rownew_customer_points['customer_type'];
	                    $new_customer_member_id = $rownew_customer_points['customer_member_id'];


	                    //LAST PURCHASE
	                    $sqllast_purchase = 'SELECT * FROM shop_digisurf_order WHERE customer_id="'.$general_info_customer_id.'" AND order_date < NOW() + INTERVAL 180 DAY';
                  		$retvallast_purchase = mysql_query( $sqllast_purchase, $conn );                 
                                             if(! $retvallast_purchase )
                                             {
                                                die('Could not get data: ' . mysql_error());
                                             }
                  		$rowlast_purchase = mysql_fetch_array($retvallast_purchase, MYSQL_ASSOC);
                  		$last_purchase_date = $rowlast_purchase['order_date'];
                  		$last_purchase_customer_id = $rowlast_purchase['customer_id'];
                  		$any_last_purchase=mysql_num_rows($retvallast_purchase);

                  		//PREVIOUS PURCHASES
                  		$sqlprevious_purchases = 'SELECT * FROM shop_digisurf_order WHERE customer_id="'.$general_info_customer_id.'"';
                  		$retvalprevious_purchases = mysql_query( $sqlprevious_purchases, $conn );                 
                                             if(! $retvalprevious_purchases )
                                             {
                                                die('Could not get data: ' . mysql_error());
                                             }
                  		$rowprevious_purchases = mysql_fetch_array($retvalprevious_purchases, MYSQL_ASSOC);
                  		$any_previous_purchases=mysql_num_rows($retvalprevious_purchases);



                  		//MONTHLY ORDERS
                  		$sqlmonthly = 'SELECT * FROM shop_digisurf_order WHERE YEAR(order_date) = YEAR(NOW()) AND MONTH(order_date) = MONTH(NOW()) ORDER BY idx DESC ';
                        $retvalmonthly = mysql_query( $sqlmonthly, $conn );                 
                             if(! $retvalmonthly )
                             {
                                die('Could not get data: ' . mysql_error());
                             }
                        $any_monthly_purchases=mysql_num_rows($retvalmonthly);
                        $monthly_order_points = '';
                        while ($rowmonthly = mysql_fetch_array($retvalmonthly, MYSQL_ASSOC)) {
                        	$monthly_order_points .= $rowmonthly['order_points'];
                        }

	                    //CHECK USER TYPE
	                if($any_last_purchase >= 1){

	                	//RC
		            	if($new_customer_points >= "500" && $new_customer_type == "R"){
		                $sql_user_rc="UPDATE shop_digisurf_customer SET customer_type='M', customer_discount='15' WHERE customer_id='".$general_info_customer_id."' LIMIT 1 ";              
		                $retval_user_rc = mysql_query( $sql_user_rc, $conn );
		                if(! $retval_user_rc )
		                       {
		                          die('Could not enter data: ' . mysql_error());
		                       }
		                }

		                //DM PLAN A
		            	if($new_customer_points >= "2000" && $new_customer_type == "M" ){
		                $sql_user_dm_plan_a="UPDATE shop_digisurf_customer SET customer_type='V', customer_discount='15' WHERE customer_id='".$general_info_customer_id."' LIMIT 1 ";              
		                $retval_user_dm_plan_a = mysql_query( $sql_user_dm_plan_a, $conn );
		                if(! $retval_user_dm_plan_a )
		                       {
		                          die('Could not enter data: ' . mysql_error());
		                       }
		                }

		                //DM PLAN B
		                if($new_customer_points >= "1500" && $new_customer_type == "M" ){
		                $sql_user_dm_plan_b="UPDATE shop_digisurf_customer SET customer_type='V', customer_discount='15' WHERE customer_id='".$general_info_customer_id."' LIMIT 1 ";              
		                $retval_user_dm_plan_b = mysql_query( $sql_user_dm_plan_b, $conn );
		                if(! $retval_user_dm_plan_b )
		                       {
		                          die('Could not enter data: ' . mysql_error());
		                       }
		                }

		                if($any_monthly_purchases >= 1 && $monthly_order_points >= "500" ){
		                $percentage = 5;
						$totalp = $monthly_order_points;
						$new_p = ($percentage / 100) * $totalp;

						if($new_customer_type == "V" || $new_customer_type == "SWD"){
		                $sql_user_monthly = 'INSERT INTO shop_digisurf_team (customer_id, team_a, team_b, team_c, team_d, team_date, team_points) VALUES ("'.$general_info_customer_id.'", "'.$new_p.'", "'.$new_p.'", "'.$new_p.'", "'.$new_p.'", NOW(), "'.$new_p.'")';  
                               $retval_user_monthly = mysql_query( $sql_user_monthly, $conn );
                               if(! $retval_user_monthly )
                                   {
                                      die('Could not enter data: ' . mysql_error());
                                   }
                               }
                            }
	                	

		            } elseif ($any_last_purchase == 0 && $any_previous_purchases == 1) {
		            	# code...
		            } else{ //FIRST TIME PURCHASE
		            	
		            	//DM PLAN A
		            	if($new_customer_points >= "500" && $new_customer_points <= "2000" ){
		                $sql_user_dm_plan_a="UPDATE shop_digisurf_customer SET customer_type='M', customer_discount='15' WHERE customer_id='".$general_info_customer_id."' LIMIT 1 ";              
		                $retval_user_dm_plan_a = mysql_query( $sql_user_dm_plan_a, $conn );
		                if(! $retval_user_dm_plan_a )
		                       {
		                          die('Could not enter data: ' . mysql_error());
		                       }
		                }

		                //DM PLAN B
		                if($new_customer_points >= "1000" && $new_customer_points <= "1500" ){
		                $sql_user_dm_plan_b="UPDATE shop_digisurf_customer SET customer_type='M', customer_discount='15' WHERE customer_id='".$general_info_customer_id."' LIMIT 1 ";              
		                $retval_user_dm_plan_b = mysql_query( $sql_user_dm_plan_b, $conn );
		                if(! $retval_user_dm_plan_b )
		                       {
		                          die('Could not enter data: ' . mysql_error());
		                       }
		                }

		                //RC
		            	if($new_customer_points >= "500" && $new_customer_type == "R"){
		                $sql_user_rc="UPDATE shop_digisurf_customer SET customer_type='M', customer_discount='15' WHERE customer_id='".$general_info_customer_id."' LIMIT 1 ";              
		                $retval_user_rc = mysql_query( $sql_user_rc, $conn );
		                if(! $retval_user_rc )
		                       {
		                          die('Could not enter data: ' . mysql_error());
		                       }
		                }

		                //VIP
		            	if($new_customer_points >= "2500" && $new_customer_type != "V" && $new_customer_type != "SWD"){
		                $sql_user_vip="UPDATE shop_digisurf_customer SET customer_type='V' WHERE customer_id='".$general_info_customer_id."' LIMIT 1 ";              
		                $retval_user_vip = mysql_query( $sql_user_vip, $conn );
		                if(! $retval_user_vip )
		                       {
		                          die('Could not enter data: ' . mysql_error());
		                       }
		                }


		                //SWD
		                if($new_customer_points >= "2500" && $new_customer_type == "V" && $new_customer_type != "SWD"){
		                $sql_user_swd="UPDATE shop_digisurf_customer SET customer_type='SWD' WHERE customer_id='".$general_info_customer_id."' LIMIT 1 ";              
		                $retval_user_swd = mysql_query( $sql_user_swd, $conn );
		                if(! $retval_user_swd )
		                       {
		                          die('Could not enter data: ' . mysql_error());
		                       }
		                }
		            } //$any_last_purchase, else first time purchases{}

		            	//for testing purposes in case #CHECK USER TYPE doesn't work
	                    //if(strtotime($last_purchase_date) < strtotime('-180 days')) {
						     // this is true
						//}$new_customer_member_id

		            $bonus_rewards = $general_info_order_points / 1.2;
		            $sql_bonus_points = 'INSERT INTO shop_digisurf_bonus (customer_id, customer_member_id, bonus_date, bonus_points, bonus_rewards) VALUES ("'.$general_info_customer_id.'", "'.$new_customer_member_id.'", "'.$general_info_order_date.'", "'.$general_info_order_points.'", "'.$bonus_rewards.'")';  
                               $retval_bonus_points = mysql_query( $sql_bonus_points, $conn );
                               if(! $retval_bonus_points )
                                   {
                                      die('Could not enter data: ' . mysql_error());
                                   }  

                    }








echo '<img src="/Admin/Assets/img/correct.gif">';
?>