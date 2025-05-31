<?php
include '../Model/dbconfig.php';
mysql_set_charset("utf8");
session_start();
error_reporting(0);
$current_lang = $_SESSION['lang'];


if(isset($_POST['participate'])){

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
  $entext1 = mysql_real_escape_string($_POST['text1'],$conn);//customer_last_name
  $entext2 = mysql_real_escape_string($_POST['text2'],$conn);//customer_first_name
  $entext3 = mysql_real_escape_string($_POST['text3'],$conn);//address_mobile
  $entext4 = mysql_real_escape_string($_POST['text4'],$conn);//address_country
  $entext5 = mysql_real_escape_string($_POST['text5'],$conn);//customer_time
  $entext6 = mysql_real_escape_string($_POST['text6'],$conn);//customer_email
  $entext7 = mysql_real_escape_string($_POST['text7'],$conn);//address_one

  $entext8 = mysql_real_escape_string($_POST['text8'],$conn);//address_two
  $entext9 = mysql_real_escape_string($_POST['text9'],$conn);//address_three
  $entext10 = mysql_real_escape_string($_POST['text10'],$conn);//customer_gender
  $entext11 = mysql_real_escape_string($_POST['text11'],$conn);//customer_dob
  $entext12 = mysql_real_escape_string($_POST['text12'],$conn);
  $entext13 = mysql_real_escape_string($_POST['text13'],$conn);
  $entext14 = mysql_real_escape_string($_POST['text14'],$conn);
  $entext15 = mysql_real_escape_string($_POST['text15'],$conn);
  $entext16 = mysql_real_escape_string($_POST['text16'],$conn);

  $seed = str_split('1234567890'); // and any other characters
  shuffle($seed); // probably optional since array_is randomized; this may be redundant
  $rand = '';
  foreach (array_rand($seed, 10) as $k) $rand .= $seed[$k];

$vowels = array(" ", "&", "?", "/");
$enurl = str_replace($vowels, '_', $entext2);
  $sqla = 'INSERT INTO shop_digisurf_customer (customer_id, customer_first_name, customer_last_name, customer_time, customer_email, customer_gender, customer_dob, customer_reg_date, customer_url, customer_type, customer_lang1, customer_lang2, customer_lang3, customer_lang4, customer_lang5, customer_approve, customer_member_id ) VALUES ( "'.$themisc.'", "'.$entext1.'", "'.$entext2.'", "'.$entext5.'", "'.$entext6.'", "'.$entext10.'", "'.$entext11.'", now(), "'.$enurl.'", "R", "'.$entext12.'", "'.$entext13.'", "'.$entext14.'", "'.$entext15.'", "'.$entext16.'", "N", "'.$rand.'" )';

  $retvala = mysql_query( $sqla, $conn );
    if(! $retvala ) {  
        die('Could not enter data: ' . mysql_error());
      }

$sqlb = 'INSERT INTO shop_digisurf_address (customer_id, address_mobile, address_country, address_one, address_two, address_three) VALUES ( "'.$themisc.'", "'.$entext3.'", "'.$entext4.'", "'.$entext7.'", "'.$entext8.'", "'.$entext9.'")';

  $retvalb = mysql_query( $sqlb, $conn );
    if(! $retvalb ) {  
        die('Could not enter data: ' . mysql_error());
      }

$sqlc = 'INSERT INTO shop_digisurf_group_members (customer_id) VALUES ( "'.$themisc.'")';

  $retvalc = mysql_query( $sqlc, $conn );
    if(! $retvalc ) {  
        die('Could not enter data: ' . mysql_error());
      }


      header("Refresh:0; url=/Login");

}


if(isset($_POST['edit_account'])){

  $customerid = mysql_real_escape_string($_POST['customer_id'],$conn);

  $entext1 = mysql_real_escape_string($_POST['text1'],$conn);
  $entext2 = mysql_real_escape_string($_POST['text2'],$conn);
  $entext3 = mysql_real_escape_string($_POST['text3'],$conn);
  $entext4 = mysql_real_escape_string($_POST['text4'],$conn);
  $entext5 = mysql_real_escape_string($_POST['text5'],$conn);

  $entext6 = mysql_real_escape_string($_POST['text6'],$conn);
  $entext7 = mysql_real_escape_string($_POST['text7'],$conn);
  $entext8 = mysql_real_escape_string($_POST['text8'],$conn);
  $entext9 = mysql_real_escape_string($_POST['text9'],$conn);
  $entext10 = mysql_real_escape_string($_POST['text10'],$conn);
  $entext11 = mysql_real_escape_string($_POST['text11'],$conn);
  $entext12 = mysql_real_escape_string($_POST['text12'],$conn);
  $entext13 = mysql_real_escape_string($_POST['text13'],$conn);

$vowels = array(" ", "&", "?", "/");
$enurl = str_replace($vowels, '_', $entext1);

 $sqla="UPDATE shop_digisurf_customer SET customer_first_name='".$entext1."', customer_last_name='".$entext2."', customer_email='".$entext3."', customer_dob='".$entext4."',customer_gender='".$entext5."', customer_password='".$entext13."', customer_url='".$enurl."', customer_last_update=now() WHERE customer_id='".$customerid."' LIMIT 1 ";              
                   $retvala = mysql_query( $sqla, $conn );
                   if(! $retvala )
                       {
                          die('Could not enter data: ' . mysql_error());
                       }

  $sqlb="UPDATE shop_digisurf_address SET address_one='".$entext6."', address_two='".$entext7."', address_three='".$entext8."', address_landline='".$entext9."', address_mobile='".$entext10."', address_city='".$entext11."', address_country='".$entext12."'  WHERE customer_id='".$customerid."' LIMIT 1 ";
                   $retvalb = mysql_query( $sqlb, $conn );
                   if(! $retvalb )
                       {
                          die('Could not enter data: ' . mysql_error());
                       }


              header("Refresh:0; url=/Accounts/Sales/Settings");
}


if(isset($_POST['delete_project_submit'])){
  $customerid = mysql_real_escape_string($_POST['product_id'],$conn);



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