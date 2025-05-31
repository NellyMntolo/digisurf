<?php
include '../Model/dbconfig.php';
mysql_set_charset("utf8");
session_start();
$current_lang = $_SESSION['lang'];


if(isset($_POST['create_project_submit'])){

  $max_misc = 'SELECT customer_id FROM shop_digisurf_customer ORDER BY customer_id DESC';
  $retvalmax_miscen = mysql_query( $max_misc, $conn );                 
                             if(! $retvalmax_miscen )
                             {
                                die('Could not get data: ' . mysql_error());
                             }
  $rowmax_miscen = mysql_fetch_array($retvalmax_miscen, MYSQL_ASSOC);
  $large_misc = $rowmax_miscen['customer_id'];

  $themisc = $large_misc+1;
  
//group customer
  $entext1 = mysql_real_escape_string($_POST['content_text1'],$conn);
  $entext2 = mysql_real_escape_string($_POST['content_text2'],$conn);
  $entext3 = mysql_real_escape_string($_POST['content_text3'],$conn);
  $entext4 = mysql_real_escape_string($_POST['content_text4'],$conn);
  $entext5 = mysql_real_escape_string($_POST['content_text5'],$conn);
  $entext6 = mysql_real_escape_string($_POST['content_text6'],$conn);
  $entext7 = mysql_real_escape_string($_POST['content_text7'],$conn);

  $entext8 = mysql_real_escape_string($_POST['content_text8'],$conn);
  $entext9 = mysql_real_escape_string($_POST['content_text9'],$conn);
  $entext10 = mysql_real_escape_string($_POST['content_text10'],$conn);
  $entext11 = mysql_real_escape_string($_POST['content_text11'],$conn);
  $entext12 = mysql_real_escape_string($_POST['content_text12'],$conn);
  $entext13 = mysql_real_escape_string($_POST['content_text13'],$conn);
  $entext14 = mysql_real_escape_string($_POST['content_text14'],$conn);
  $entext15 = mysql_real_escape_string($_POST['content_text15'],$conn);
  $entext16 = mysql_real_escape_string($_POST['content_text16'],$conn);
  $entext17 = mysql_real_escape_string($_POST['content_text17'],$conn);

  $seed = str_split('1234567890'); // and any other characters
  shuffle($seed); // probably optional since array_is randomized; this may be redundant
  $rand = '';
  foreach (array_rand($seed, 10) as $k) $rand .= $seed[$k];


$vowels = array(" ", "&", "?", "/");
$enurl = str_replace($vowels, '_', $entext2);
  $sqla = 'INSERT INTO shop_digisurf_customer (customer_id, customer_gender, customer_first_name, customer_last_name, customer_email, customer_password, customer_dob, customer_reg_date, customer_url, customer_type, customer_approve, customer_member_id, customer_sponsor) VALUES ( "'.$themisc.'", "'.$entext1.'", "'.$entext2.'", "'.$entext3.'", "'.$entext4.'", "'.$entext5.'", "'.$entext6.'", now(), "'.$enurl.'", "'.$entext15.'", "'.$entext16.'", "'.$rand.'", "'.$entext17.'" )';

  $retvala = mysql_query( $sqla, $conn );
    if(! $retvala ) {  
        die('Could not enter data: ' . mysql_error());
      }

$sqlb = 'INSERT INTO shop_digisurf_address (customer_id, address_city, address_country, address_one, address_two, address_three, address_landline, address_mobile) VALUES ( "'.$themisc.'", "'.$entext8.'", "'.$entext9.'", "'.$entext10.'", "'.$entext11.'", "'.$entext12.'", "'.$entext13.'", "'.$entext14.'")';

  $retvalb = mysql_query( $sqlb, $conn );
    if(! $retvalb ) {  
        die('Could not enter data: ' . mysql_error());
      }

$sqlc = 'INSERT INTO shop_digisurf_group_members (customer_id, group_id) VALUES ( "'.$themisc.'", "'.$entext7.'")';

  $retvalc = mysql_query( $sqlc, $conn );
    if(! $retvalc ) {  
        die('Could not enter data: ' . mysql_error());
      }


      header("Refresh:0; url=/Admin/AllCustomers");

}


if(isset($_POST['edit_project_submit'])){

  $customerid = mysql_real_escape_string($_POST['customer_id'],$conn);

	$entext1 = mysql_real_escape_string($_POST['content_text1'],$conn);
  $entext2 = mysql_real_escape_string($_POST['content_text2'],$conn);
  $entext3 = mysql_real_escape_string($_POST['content_text3'],$conn);
  $entext4 = mysql_real_escape_string($_POST['content_text4'],$conn);
  $entext5 = mysql_real_escape_string($_POST['content_text5'],$conn);
  $entext6 = mysql_real_escape_string($_POST['content_text6'],$conn);
  $entext7 = mysql_real_escape_string($_POST['content_text7'],$conn);

  $entext8 = mysql_real_escape_string($_POST['content_text8'],$conn);
  $entext9 = mysql_real_escape_string($_POST['content_text9'],$conn);
  $entext10 = mysql_real_escape_string($_POST['content_text10'],$conn);
  $entext11 = mysql_real_escape_string($_POST['content_text11'],$conn);
  $entext12 = mysql_real_escape_string($_POST['content_text12'],$conn);
  $entext13 = mysql_real_escape_string($_POST['content_text13'],$conn);
  $entext14 = mysql_real_escape_string($_POST['content_text14'],$conn);
  $entext15 = mysql_real_escape_string($_POST['content_text15'],$conn);
  $entext16 = mysql_real_escape_string($_POST['content_text16'],$conn);
  $entext17 = mysql_real_escape_string($_POST['content_text17'],$conn);

$vowels = array(" ", "&", "?", "/");
$enurl = str_replace($vowels, '_', $entext2);

 $sqla="UPDATE shop_digisurf_customer SET customer_gender='".$entext1."', customer_first_name='".$entext2."', customer_last_name='".$entext3."', customer_email='".$entext4."', customer_password='".$entext5."', customer_dob='".$entext6."', customer_url='".$enurl."', customer_last_update=now(), customer_type='".$entext15."', customer_approve='".$entext16."', customer_sponsor='".$entext17."' WHERE customer_id='".$customerid."' LIMIT 1 ";              
                   $retvala = mysql_query( $sqla, $conn );
                   if(! $retvala )
                       {
                          die('Could not enter data: ' . mysql_error());
                       }

  $sqlb="UPDATE shop_digisurf_address SET address_city='".$entext8."', address_country='".$entext9."', address_one='".$entext10."', address_two='".$entext11."', address_three='".$entext12."', address_landline='".$entext13."', address_mobile='".$entext14."' WHERE customer_id='".$customerid."' LIMIT 1 ";              
                   $retvalb = mysql_query( $sqlb, $conn );
                   if(! $retvalb )
                       {
                          die('Could not enter data: ' . mysql_error());
                       }

  $sqlc="UPDATE shop_digisurf_group_members SET group_id='".$entext7."' WHERE customer_id='".$customerid."' LIMIT 1 ";              
                   $retvalc = mysql_query( $sqlc, $conn );
                   if(! $retvalc )
                       {
                          die('Could not enter data: ' . mysql_error());
                       }


              header("Refresh:0; url=/Admin/AllCustomers");
}


if(isset($_POST['delete_project_submit'])){
  $customerid = mysql_real_escape_string($_POST['product_id'],$conn);


        $sqlorder_list = 'DELETE FROM shop_digisurf_order_list WHERE customer_id ="'.$customerid.'" ';
                 $retvalorder_list = mysql_query( $sqlorder_list, $conn );
                   if(! $retvalorder_list )
                       {
                          die('Could not enter data: ' . mysql_error());
                       }                      


        $sqlresetorder_list1 = "ALTER TABLE shop_digisurf_order_list DROP idx; ";
        $sqlresetorder_list2 = "ALTER TABLE shop_digisurf_order_list AUTO_INCREMENT = 1; ";
        $sqlresetorder_list3 = "ALTER TABLE shop_digisurf_order_list ADD idx int UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST; ";

        $retvalresetorder_list1 = mysql_query( $sqlresetorder_list1, $conn );
        $retvalresetorder_list2 = mysql_query( $sqlresetorder_list2, $conn );
        $retvalresetorder_list3 = mysql_query( $sqlresetorder_list3, $conn );
                  if(! $retvalresetorder_list1 )
                       {
                          die('Could not alter customer data: ' . mysql_error());
                       }

                       if(! $retvalresetorder_list2 )
                       {
                          die('Could not alter customer data: ' . mysql_error());
                       }

                       if(! $retvalresetorder_list3 )
                       {
                          die('Could not alter customer data: ' . mysql_error());
                       }

        $sqlorder = 'DELETE FROM shop_digisurf_order WHERE customer_id ="'.$customerid.'" ';
                 $retvalorder = mysql_query( $sqlorder, $conn );
                   if(! $retvalorder )
                       {
                          die('Could not enter data: ' . mysql_error());
                       }                      


        $sqlresetorder1 = "ALTER TABLE shop_digisurf_order DROP idx; ";
        $sqlresetorder2 = "ALTER TABLE shop_digisurf_order AUTO_INCREMENT = 1; ";
        $sqlresetorder3 = "ALTER TABLE shop_digisurf_order ADD idx int UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST; ";

        $retvalresetorder1 = mysql_query( $sqlresetorder1, $conn );
        $retvalresetorder2 = mysql_query( $sqlresetorder2, $conn );
        $retvalresetorder3 = mysql_query( $sqlresetorder3, $conn );
                  if(! $retvalresetorder1 )
                       {
                          die('Could not alter customer data: ' . mysql_error());
                       }

                       if(! $retvalresetorder2 )
                       {
                          die('Could not alter customer data: ' . mysql_error());
                       }

                       if(! $retvalresetorder3 )
                       {
                          die('Could not alter customer data: ' . mysql_error());
                       }


        $sqladdress = 'DELETE FROM shop_digisurf_address WHERE customer_id ="'.$customerid.'" ';
                 $retvaladdress = mysql_query( $sqladdress, $conn );
                   if(! $retvaladdress )
                       {
                          die('Could not enter data: ' . mysql_error());
                       }                      


        $sqlresetaddress1 = "ALTER TABLE shop_digisurf_address DROP idx; ";
        $sqlresetaddress2 = "ALTER TABLE shop_digisurf_address AUTO_INCREMENT = 1; ";
        $sqlresetaddress3 = "ALTER TABLE shop_digisurf_address ADD idx int UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST; ";

        $retvalresetaddress1 = mysql_query( $sqlresetaddress1, $conn );
        $retvalresetaddress2 = mysql_query( $sqlresetaddress2, $conn );
        $retvalresetaddress3 = mysql_query( $sqlresetaddress3, $conn );
                  if(! $retvalresetaddress1 )
                       {
                          die('Could not alter customer data: ' . mysql_error());
                       }

                       if(! $retvalresetaddress2 )
                       {
                          die('Could not alter customer data: ' . mysql_error());
                       }

                       if(! $retvalresetaddress3 )
                       {
                          die('Could not alter customer data: ' . mysql_error());
                       }

        $sqlvisits = 'DELETE FROM shop_digisurf_customer_visits WHERE customer_id ="'.$customerid.'" ';
                 $retvalvisits = mysql_query( $sqlvisits, $conn );
                   if(! $retvalvisits )
                       {
                          die('Could not enter data: ' . mysql_error());
                       }                      


        $sqlresetvisits1 = "ALTER TABLE shop_digisurf_customer_visits DROP idx; ";
        $sqlresetvisits2 = "ALTER TABLE shop_digisurf_customer_visits AUTO_INCREMENT = 1; ";
        $sqlresetvisits3 = "ALTER TABLE shop_digisurf_customer_visits ADD idx int UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST; ";

        $retvalresetvisits1 = mysql_query( $sqlresetvisits1, $conn );
        $retvalresetvisits2 = mysql_query( $sqlresetvisits2, $conn );
        $retvalresetvisits3 = mysql_query( $sqlresetvisits3, $conn );
                  if(! $retvalresetvisits1 )
                       {
                          die('Could not alter customer data: ' . mysql_error());
                       }

                       if(! $retvalresetvisits2 )
                       {
                          die('Could not alter customer data: ' . mysql_error());
                       }

                       if(! $retvalresetvisits3 )
                       {
                          die('Could not alter customer data: ' . mysql_error());
                       }

        $sqldiscount = 'DELETE FROM shop_digisurf_discount WHERE customer_id ="'.$customerid.'" ';
                 $retvaldiscount = mysql_query( $sqldiscount, $conn );
                   if(! $retvaldiscount )
                       {
                          die('Could not enter data: ' . mysql_error());
                       }                      


        $sqlresetdiscount1 = "ALTER TABLE shop_digisurf_discount DROP idx; ";
        $sqlresetdiscount2 = "ALTER TABLE shop_digisurf_discount AUTO_INCREMENT = 1; ";
        $sqlresetdiscount3 = "ALTER TABLE shop_digisurf_discount ADD idx int UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST; ";

        $retvalresetdiscount1 = mysql_query( $sqlresetdiscount1, $conn );
        $retvalresetdiscount2 = mysql_query( $sqlresetdiscount2, $conn );
        $retvalresetdiscount3 = mysql_query( $sqlresetdiscount3, $conn );
                  if(! $retvalresetdiscount1 )
                       {
                          die('Could not alter customer data: ' . mysql_error());
                       }

                       if(! $retvalresetdiscount2 )
                       {
                          die('Could not alter customer data: ' . mysql_error());
                       }

                       if(! $retvalresetdiscount3 )
                       {
                          die('Could not alter customer data: ' . mysql_error());
                       }


        $sqlgroup_members = 'DELETE FROM shop_digisurf_group_members WHERE customer_id ="'.$customerid.'" ';
                 $retvalgroup_members = mysql_query( $sqlgroup_members, $conn );
                   if(! $retvalgroup_members )
                       {
                          die('Could not enter data: ' . mysql_error());
                       }                      


        $sqlresetgroup_members1 = "ALTER TABLE shop_digisurf_group_members DROP idx; ";
        $sqlresetgroup_members2 = "ALTER TABLE shop_digisurf_group_members AUTO_INCREMENT = 1; ";
        $sqlresetgroup_members3 = "ALTER TABLE shop_digisurf_group_members ADD idx int UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST; ";

        $retvalresetgroup_members1 = mysql_query( $sqlresetgroup_members1, $conn );
        $retvalresetgroup_members2 = mysql_query( $sqlresetgroup_members2, $conn );
        $retvalresetgroup_members3 = mysql_query( $sqlresetgroup_members3, $conn );
                  if(! $retvalresetgroup_members1 )
                       {
                          die('Could not alter customer data: ' . mysql_error());
                       }

                       if(! $retvalresetgroup_members2 )
                       {
                          die('Could not alter customer data: ' . mysql_error());
                       }

                       if(! $retvalresetgroup_members3 )
                       {
                          die('Could not alter customer data: ' . mysql_error());
                       }



        $sqlin = 'DELETE FROM shop_digisurf_customer WHERE customer_id ="'.$customerid.'" LIMIT 1';
                 $retvalin = mysql_query( $sqlin, $conn );
                   if(! $retvalin )
                       {
                          die('Could not enter data: ' . mysql_error());
                       }                      


        $sqlreseten1 = "ALTER TABLE shop_digisurf_customer DROP idx; ";
        $sqlreseten2 = "ALTER TABLE shop_digisurf_customer AUTO_INCREMENT = 1; ";
        $sqlreseten3 = "ALTER TABLE shop_digisurf_customer ADD idx int UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST; ";

        $retvalreseten1 = mysql_query( $sqlreseten1, $conn );
        $retvalreseten2 = mysql_query( $sqlreseten2, $conn );
        $retvalreseten3 = mysql_query( $sqlreseten3, $conn );
                  if(! $retvalreseten1 )
                       {
                          die('Could not alter customer data: ' . mysql_error());
                       }

                       if(! $retvalreseten2 )
                       {
                          die('Could not alter customer data: ' . mysql_error());
                       }

                       if(! $retvalreseten3 )
                       {
                          die('Could not alter customer data: ' . mysql_error());
                       }

                       header("Refresh:0; url=/Admin/AllCustomers");

}
?>