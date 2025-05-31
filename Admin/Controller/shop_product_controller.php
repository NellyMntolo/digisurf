<?php
include '../Model/dbconfig.php';
mysql_set_charset("utf8");
error_reporting(0);
session_start();
$current_lang = $_SESSION['lang'];
$secret = md5(uniqid(rand()));

if(isset($_POST['category_test'])){
    $project_id = mysql_real_escape_string($_POST['project_id'],$conn);
    $selected_option = mysql_real_escape_string($_POST['selected_option'],$conn);
    $selected_category = mysql_real_escape_string($_POST['selected_category'],$conn); 


    $sqlcatzh = 'SELECT * FROM shop_digisurf_product_categories WHERE category_name = "'.$selected_category.'" ';
     
     $retvalcatzh = mysql_query( $sqlcatzh, $conn );     
     if(! $retvalcatzh )
     {
        die('Could not get data: ' . mysql_error());
     }
     $rowcatzh = mysql_fetch_array($retvalcatzh, MYSQL_ASSOC);
     $zhcategory =$rowcatzh['category_id'];


    $sqlb = 'SELECT * FROM shop_digisurf_product WHERE product_id = "'.$project_id.'" ';
     
     $retvalb = mysql_query( $sqlb, $conn );     
     if(! $retvalb )
     {
        die('Could not get data: ' . mysql_error());
     }

      $row1 = mysql_fetch_array($retvalb, MYSQL_ASSOC);
      $themisc =$row1['product_id'];
    
if ($selected_option == "0") {

            $sqlb_in = 'INSERT INTO shop_digisurf_product_category_list (product_id, category_id) VALUES ( "'.$themisc.'", "'.$selected_category.'")';

            $retvalb_in = mysql_query( $sqlb_in, $conn );
              if(! $retvalb_in ) {  
                  die('Could not enter data: ' . mysql_error());
                }

                header('Location: ' . $_SERVER['HTTP_REFERER']);
    
} else {

    $sqlin = 'DELETE FROM shop_digisurf_product_category_list WHERE product_id ="'.$themisc.'" and category_id ="'.$selected_category.'" LIMIT 1';
                 $retvalin = mysql_query( $sqlin, $conn );
                   if(! $retvalin )
                       {
                          die('Could not enter data: ' . mysql_error());
                       }


        $sqlreseten1 = "ALTER TABLE shop_digisurf_product_category_list DROP idx; ";
        $sqlreseten2 = "ALTER TABLE shop_digisurf_product_category_list AUTO_INCREMENT = 1; ";
        $sqlreseten3 = "ALTER TABLE shop_digisurf_product_category_list ADD idx int UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST; ";

        $retvalreseten1 = mysql_query( $sqlreseten1, $conn );
        $retvalreseten2 = mysql_query( $sqlreseten2, $conn );
        $retvalreseten3 = mysql_query( $sqlreseten3, $conn );
                  if(! $retvalreseten1 )
                       {
                          die('Could not alter english data: ' . mysql_error());
                       }

                       if(! $retvalreseten2 )
                       {
                          die('Could not alter english data: ' . mysql_error());
                       }

                       if(! $retvalreseten3 )
                       {
                          die('Could not alter english data: ' . mysql_error());
                       }

                       header('Location: ' . $_SERVER['HTTP_REFERER']);

}

}
  

if(isset($_POST['create_product_submit'])){

  $max = 'SELECT sortable_order FROM digisurf_project ORDER BY sortable_order DESC';
  $retvalmaxen = mysql_query( $max, $conn );                 
                             if(! $retvalmaxen )
                             {
                                die('Could not get data: ' . mysql_error());
                             }
  $rowmaxen = mysql_fetch_array($retvalmaxen, MYSQL_ASSOC);
  $large = $rowmaxen['sortable_order'];
  //echo $large;

  $max_misc = 'SELECT product_id FROM shop_digisurf_product ORDER BY product_id DESC';
  $retvalmax_miscen = mysql_query( $max_misc, $conn );                 
                             if(! $retvalmax_miscen )
                             {
                                die('Could not get data: ' . mysql_error());
                             }
  $rowmax_miscen = mysql_fetch_array($retvalmax_miscen, MYSQL_ASSOC);
  $large_misc = $rowmax_miscen['product_id'];


$themisc = $large_misc+1;

  $entext1 = mysql_real_escape_string($_POST['content_text1'],$conn);
  $entext2 = mysql_real_escape_string($_POST['content_text2'],$conn);
  $entext3 = mysql_real_escape_string($_POST['content_text3'],$conn);
  $entext4 = mysql_real_escape_string($_POST['content_text4'],$conn);
  $entext5 = mysql_real_escape_string($_POST['content_text5'],$conn);
  $entext6 = mysql_real_escape_string($_POST['content_text6'],$conn);
  $entext7 = $_POST['content_text7'];
  $entext8 = mysql_real_escape_string($_POST['content_text8'],$conn);
  $entext25 = mysql_real_escape_string($_POST['content_text25'],$conn);


  $image1 = $_FILES['product_image1']['name'];
  $uploaded_image1 = '';

  if($image1 != null) {
    $file_tmp =$_FILES['product_image1']['tmp_name'];
      move_uploaded_file($file_tmp, getcwd()."/../../../../../../uploads/".$image1);
    $uploaded_image1 = "/uploads/".$image1;
  }


$vowels = array(" ", "&", "?", "/");
$enurl = str_replace($vowels, '_', $entext1);
  $sqla = 'INSERT INTO shop_digisurf_product (product_id,product_name,product_sku,product_barcode,product_status,product_price,product_quantity,product_description,product_image,product_url,product_unique,product_points) VALUES ( "'.$themisc.'", "'.$entext1.'", "'.$entext2.'", "'.$entext3.'", "'.$entext4.'", "'.$entext5.'", "'.$entext6.'", "'.$entext7.'", "'.$uploaded_image1.'", "'.$enurl.'", "'.$secret.'", "'.$entext25.'")';

  $retvala = mysql_query( $sqla, $conn );
    if(! $retvala ) {  
        die('Could not enter data: ' . mysql_error());
      }

  $tags = explode(',',$entext8);
  //print_r($tags);
  foreach ($tags as $key => $value) {
    # code...

    $sqlb = 'INSERT INTO shop_digisurf_tags (product_id, product_tag) VALUES ("'.$themisc.'", "'.$value.'")';

  $retvalb = mysql_query( $sqlb, $conn );
    if(! $retvalb ) {  
        die('Could not enter data: ' . mysql_error());
      }
  }




      header("Refresh:0; url=/Admin/NewProduct/");

}


if(isset($_POST['edit_product_submit'])){

  $productid = mysql_real_escape_string($_POST['product_id'],$conn);

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
  //$entext18 = mysql_real_escape_string($_POST['content_text18'],$conn);
  $entext18 = $_POST['content_text18'];
  $entext19 = mysql_real_escape_string($_POST['content_text19'],$conn);
  $entext20 = mysql_real_escape_string($_POST['content_text20'],$conn);
  $entext21 = $_POST['content_text21'];
  $entext22 = mysql_real_escape_string($_POST['content_text22'],$conn);
  $entext23 = $_POST['content_text23'];
  $entext25 = mysql_real_escape_string($_POST['content_text25'],$conn);



  $image1 = $_FILES['product_image1']['name'];

$vowels = array(" ", "&", "?", "/");
$enurl = str_replace($vowels, '_', $entext1);

 $sql="UPDATE shop_digisurf_product SET product_name='".$entext1."', product_sku='".$entext2."', product_barcode='".$entext3."', product_status='".$entext4."', product_price='".$entext5."', product_quantity='".$entext6."', product_description='".$entext7."', product_meta_title='".$entext9."', product_meta_key='".$entext10."', product_meta_desc='".$entext11."', product_url='".$enurl."', product_unique='".$secret."', product_text7='".$entext17."', product_text8='".$entext18."', product_text9='".$entext19."', product_text10='".$entext20."', product_text11='".$entext21."', product_text12='".$entext22."', product_text13='".$entext23."', product_points='".$entext25."', product_shipping_price='".$entext16."'  WHERE product_id='".$productid."' LIMIT 1 ";              
                   $retval = mysql_query( $sql, $conn );
                   if(! $retval )
                       {
                          die('Could not enter data: ' . mysql_error());
                       }

    if($image1 != null) {
      $file_tmp1 =$_FILES['product_image1']['tmp_name'];
      move_uploaded_file($file_tmp1, getcwd()."/../../../../../../uploads/".$image1);
      $filename = "/uploads/".$image1;
      $sql1="UPDATE shop_digisurf_product SET product_image='".$filename."' WHERE product_id ='".$productid."' ";
      $retval1 = mysql_query( $sql1, $conn );
                   if(! $retval1 )
                       {
                          die('Could not enter image: ' . mysql_error());
                       }
    }


    $sql_ship = 'SELECT product_id FROM shop_digisurf_shipping WHERE product_id = "'.$productid.'" ';
    $retval_ship = mysql_query( $sql_ship, $conn );                 
                               if(! $retval_ship )
                               {
                                  die('Could not get data: ' . mysql_error());
                               }
    $row_ship = mysql_fetch_array($retval_ship, MYSQL_ASSOC);
    $shipping_id = $row_ship['product_id'];



    if(empty($shipping_id)){
    $sql_shipping = 'INSERT INTO shop_digisurf_shipping (product_id, text1, text2, text3, text4, text5) VALUES ("'.$productid.'", "'.$entext12.'", "'.$entext13.'", "'.$entext14.'", "'.$entext15.'", "'.$entext16.'")';

    $retval_shipping = mysql_query( $sql_shipping, $conn );
      if(! $retval_shipping ) {  
          die('Could not enter data: ' . mysql_error());
        }
      } else {
         $sql_update_shipping="UPDATE shop_digisurf_shipping SET text1='".$entext12."', text2='".$entext13."', text3='".$entext14."', text4='".$entext15."', text5='".$entext16."' WHERE product_id='".$productid."' LIMIT 1 ";              
                   $retval_update_shipping = mysql_query( $sql_update_shipping, $conn );
                   if(! $retval_update_shipping )
                       {
                          die('Could not enter data: ' . mysql_error());
                       }
      }

  $sql_tags = 'DELETE FROM shop_digisurf_tags WHERE product_id ="'.$productid.'" ';
                 $retval_tags = mysql_query( $sql_tags, $conn );
                   if(! $retval_tags )
                       {
                          die('Could not enter data: ' . mysql_error());
                       } 

        $sqlreseten1 = "ALTER TABLE shop_digisurf_tags DROP idx; ";
        $sqlreseten2 = "ALTER TABLE shop_digisurf_tags AUTO_INCREMENT = 1; ";
        $sqlreseten3 = "ALTER TABLE shop_digisurf_tags ADD idx int UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST; ";

        $retvalreseten1 = mysql_query( $sqlreseten1, $conn );
        $retvalreseten2 = mysql_query( $sqlreseten2, $conn );
        $retvalreseten3 = mysql_query( $sqlreseten3, $conn );
                  if(! $retvalreseten1 )
                       {
                          die('Could not alter tag data: ' . mysql_error());
                       }

                       if(! $retvalreseten2 )
                       {
                          die('Could not alter tag data: ' . mysql_error());
                       }

                       if(! $retvalreseten3 )
                       {
                          die('Could not alter tag data: ' . mysql_error());
                       } 

  $tags = explode(',',$entext8);
  //print_r($tags);
  foreach ($tags as $key => $value) {
    # code...

    $sqlb = 'INSERT INTO shop_digisurf_tags (product_id, product_tag) VALUES ("'.$productid.'", "'.$value.'")';

  $retvalb = mysql_query( $sqlb, $conn );
    if(! $retvalb ) {  
        die('Could not enter data: ' . mysql_error());
      }
  }



  //Related
   $sqlout = 'DELETE FROM shop_digisurf_related_products WHERE product_id ="'.$productid.'" ';
                 $retvalout = mysql_query( $sqlout, $conn );
                   if(! $retvalout )
                       {
                          die('Could not enter data: ' . mysql_error());
                       }                      


        $sqlresetout1 = "ALTER TABLE shop_digisurf_related_products DROP idx; ";
        $sqlresetout2 = "ALTER TABLE shop_digisurf_related_products AUTO_INCREMENT = 1; ";
        $sqlresetout3 = "ALTER TABLE shop_digisurf_related_products ADD idx int UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST; ";

        $retvalresetout1 = mysql_query( $sqlresetout1, $conn );
        $retvalresetout2 = mysql_query( $sqlresetout2, $conn );
        $retvalresetout3 = mysql_query( $sqlresetout3, $conn );
                  if(! $retvalresetout1 )
                       {
                          die('Could not alter package data: ' . mysql_error());
                       }

                       if(! $retvalresetout2 )
                       {
                          die('Could not alter package data: ' . mysql_error());
                       }

                       if(! $retvalresetout3 )
                       {
                          die('Could not alter package data: ' . mysql_error());
                       }


foreach ($_POST['content_text24'] as $key) {

    $sql_related = 'INSERT INTO shop_digisurf_related_products (product_id, all_product_id) VALUES ("'.$productid.'", "'.$key.'")';

    $retval_related = mysql_query( $sql_related, $conn );
    if(! $retval_related ) {  
        die('Could not enter data: ' . mysql_error());
      }
  }




//Images
$my_upload_files = $_FILES['multiple_uploaded_files']['name'];
$firstitem =  reset($my_upload_files);



                if ($firstitem != null) { 
                $sqlin = 'DELETE FROM shop_digisurf_images WHERE product_id ="'.$productid.'"';
                 $retvalin = mysql_query( $sqlin, $conn );
                   if(! $retvalin )
                       {
                          die('Could not enter data: ' . mysql_error());
                       }


                    if($_FILES['multiple_uploaded_files']['name'] != null){
                      //foreach ($_FILES['multiple_uploaded_files']['tmp_name'] as $file => $thenames)
                      foreach ($_FILES['multiple_uploaded_files']['name'] as $file => $thenames)
                        {   
                            $images = $_FILES['multiple_uploaded_files']['tmp_name'][$file];
                            move_uploaded_file($images, getcwd()."/../../../../../../uploads/".$thenames); 
                            $uploaded_images = "/uploads/".$thenames; 
                            //echo $uploaded_images.'<br>';               
                            $sqla = 'INSERT INTO shop_digisurf_images (product_id, product_images) VALUES ("'.$productid.'", "'.$uploaded_images.'")';  
                               $retval = mysql_query( $sqla, $conn );
                               if(! $retval )
                                   {
                                      die('Could not enter data: ' . mysql_error());
                                   }
                        }
                      }
                
                  }


              header("Refresh:0; url=/Admin/AllProducts/");
}


if(isset($_POST['delete_project_submit'])){
  $productid = mysql_real_escape_string($_POST['product_id'],$conn);

        $sqlin = 'DELETE FROM shop_digisurf_product WHERE product_id ="'.$productid.'" LIMIT 1';
                 $retvalin = mysql_query( $sqlin, $conn );
                   if(! $retvalin )
                       {
                          die('Could not enter data: ' . mysql_error());
                       }                       


        $sqlreseten1 = "ALTER TABLE shop_digisurf_product DROP idx; ";
        $sqlreseten2 = "ALTER TABLE shop_digisurf_product AUTO_INCREMENT = 1; ";
        $sqlreseten3 = "ALTER TABLE shop_digisurf_product ADD idx int UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST; ";

        $retvalreseten1 = mysql_query( $sqlreseten1, $conn );
        $retvalreseten2 = mysql_query( $sqlreseten2, $conn );
        $retvalreseten3 = mysql_query( $sqlreseten3, $conn );
                  if(! $retvalreseten1 )
                       {
                          die('Could not alter english data: ' . mysql_error());
                       }

                       if(! $retvalreseten2 )
                       {
                          die('Could not alter english data: ' . mysql_error());
                       }

                       if(! $retvalreseten3 )
                       {
                          die('Could not alter english data: ' . mysql_error());
                       }
                       
                       header("Refresh:0; url=/Admin/AllProducts/");

}


if(isset($_POST['page_submit'])){

  $entext1 = mysql_real_escape_string($_POST['general_entext1'],$conn);
  $entext2 = mysql_real_escape_string($_POST['general_entext2'],$conn);
  $entext3 = mysql_real_escape_string($_POST['general_entext3'],$conn);
  $entext4 = mysql_real_escape_string($_POST['general_entext4'],$conn);

  $entext5 = mysql_real_escape_string($_POST['content_entext1'],$conn);
  $entext6 = mysql_real_escape_string($_POST['content_entext2'],$conn);
  $entext7 = mysql_real_escape_string($_POST['content_entext3'],$conn);


 $sql="UPDATE digisurf_case SET text1='".$entext1."', text2='".$entext2."', text3='".$entext3."', text4='".$entext4."', text5='".$entext5."', text6='".$entext6."', text7='".$entext7."' where code ='".$current_lang."' ";
                   $retval = mysql_query( $sql, $conn );
                   if(! $retval )
                       {
                          die('Could not enter data: ' . mysql_error());
                       }
    


                       header("Refresh:0; url=/Admin/AllProducts/");
}


if(isset($_POST['delete_images'])){

  $idx= mysql_real_escape_string($_POST['case_id'],$conn);
  $check_image1 = mysql_real_escape_string($_POST['check_image1'],$conn);
 

if($check_image1 == 'yes'){

 $sql="UPDATE digisurf_project SET image1 = NULL WHERE idx = '".$idx."' AND code='".$current_lang."' ";              
                   $retval = mysql_query( $sql, $conn );
                   if(! $retval )
                       {
                          die('Could not enter data: ' . mysql_error());
                       }
      header('Location: ' . $_SERVER['HTTP_REFERER']);
    } else {
      echo '<h1 style="width: 100%; height: auto; position: relative; margin: o auto; margin-top: 20%; display: inline-block; font-style: italic; color: #71af4a;">no image selected</h1>';
      header('Refresh:3;' . $_SERVER['HTTP_REFERER']);
    }


                       //header("Refresh:0; url=/Admin/ViewAllCaseStudies/");
    //
}




if(isset($_POST['discount_save'])){

  $d_text1 = mysql_real_escape_string($_POST['discount_groups'],$conn);
  $d_text2 = mysql_real_escape_string($_POST['discount_customers'],$conn);
  $d_text3 = mysql_real_escape_string($_POST['discount_p_id'],$conn);
  $d_text4 = mysql_real_escape_string($_POST['discount_price'],$conn);

    $re = '[-]';
    $str = mysql_real_escape_string($_POST['discount_dates'],$conn);
    preg_match_all($re, $str, $matches);

    $start_date = '';
    $end_date = '';
    $val []= split('[-]', $str);
    foreach ($val as $key => $value) {
      $times = array("AM", " PM", "  ");
      $endates = str_replace($times, '', $value);
      $start_date = $endates[0];
      $end_date = $endates[1];      
    }
      //echo $start_date;
      //echo "<br>";
      //echo $end_date;
  $sqla = 'INSERT INTO shop_digisurf_discount (group_id, customer_id, product_id, amount, start_date, end_date) VALUES ("'.$d_text1.'", "'.$d_text2.'", "'.$d_text3.'", "'.$d_text4.'", "'.$start_date.'", "'.$end_date.'")';

  $retvala = mysql_query( $sqla, $conn );
    if(! $retvala ) {  
        die('Could not enter data: ' . mysql_error());
      }

    header('Refresh:3;' . $_SERVER['HTTP_REFERER']);

}


if(isset($_POST['delete_discount'])){

  $idx= mysql_real_escape_string($_POST['delete_discount_id'],$conn);

 $sqlin = 'DELETE FROM shop_digisurf_discount WHERE idx ="'.$idx.'" LIMIT 1';
                 $retvalin = mysql_query( $sqlin, $conn );
                   if(! $retvalin )
                       {
                          die('Could not enter data: ' . mysql_error());
                       }


        $sqlreseten1 = "ALTER TABLE shop_digisurf_discount DROP idx; ";
        $sqlreseten2 = "ALTER TABLE shop_digisurf_discount AUTO_INCREMENT = 1; ";
        $sqlreseten3 = "ALTER TABLE shop_digisurf_discount ADD idx int UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST; ";

        $retvalreseten1 = mysql_query( $sqlreseten1, $conn );
        $retvalreseten2 = mysql_query( $sqlreseten2, $conn );
        $retvalreseten3 = mysql_query( $sqlreseten3, $conn );
                  if(! $retvalreseten1 )
                       {
                          die('Could not alter english data: ' . mysql_error());
                       }

                       if(! $retvalreseten2 )
                       {
                          die('Could not alter english data: ' . mysql_error());
                       }

                       if(! $retvalreseten3 )
                       {
                          die('Could not alter english data: ' . mysql_error());
                       }

                       header('Location: ' . $_SERVER['HTTP_REFERER']);
}
?>