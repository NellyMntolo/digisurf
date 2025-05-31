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


    $sqlcatzh = 'SELECT * FROM digisurf_package_categories WHERE category_name = "'.$selected_category.'" ';
     
     $retvalcatzh = mysql_query( $sqlcatzh, $conn );     
     if(! $retvalcatzh )
     {
        die('Could not get data: ' . mysql_error());
     }
     $rowcatzh = mysql_fetch_array($retvalcatzh, MYSQL_ASSOC);
     $zhcategory =$rowcatzh['category_id'];


    $sqlb = 'SELECT * FROM shop_digisurf_package WHERE package_id = "'.$project_id.'" ';
     
     $retvalb = mysql_query( $sqlb, $conn );     
     if(! $retvalb )
     {
        die('Could not get data: ' . mysql_error());
     }

      $row1 = mysql_fetch_array($retvalb, MYSQL_ASSOC);
      $themisc =$row1['package_id'];
    
if ($selected_option == "0") {

            $sqlb_in = 'INSERT INTO digisurf_package_category_list (package_id, category_id) VALUES ( "'.$themisc.'", "'.$selected_category.'")';

            $retvalb_in = mysql_query( $sqlb_in, $conn );
              if(! $retvalb_in ) {  
                  die('Could not enter data: ' . mysql_error());
                }

                header('Location: ' . $_SERVER['HTTP_REFERER']);
    
} else {

    $sqlin = 'DELETE FROM digisurf_package_category_list WHERE package_id ="'.$themisc.'" and category_id ="'.$selected_category.'" LIMIT 1';
                 $retvalin = mysql_query( $sqlin, $conn );
                   if(! $retvalin )
                       {
                          die('Could not enter data: ' . mysql_error());
                       }


        $sqlreseten1 = "ALTER TABLE digisurf_package_category_list DROP idx; ";
        $sqlreseten2 = "ALTER TABLE digisurf_package_category_list AUTO_INCREMENT = 1; ";
        $sqlreseten3 = "ALTER TABLE digisurf_package_category_list ADD idx int UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST; ";

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


if(isset($_POST['create_project_submit'])){

  $max_misc = 'SELECT package_id FROM shop_digisurf_package ORDER BY package_id DESC';
  $retvalmax_miscen = mysql_query( $max_misc, $conn );                 
                             if(! $retvalmax_miscen )
                             {
                                die('Could not get data: ' . mysql_error());
                             }
  $rowmax_miscen = mysql_fetch_array($retvalmax_miscen, MYSQL_ASSOC);
  $large_misc = $rowmax_miscen['package_id'];

  $themisc = $large_misc+1;
  

  $entext1 = mysql_real_escape_string($_POST['content_text1'],$conn);
  $entext2 = mysql_real_escape_string($_POST['content_text2'],$conn);
  $entext4 = $_POST['content_text4'];
  $entext6 = mysql_real_escape_string($_POST['content_text6'],$conn);
  $entext22 = mysql_real_escape_string($_POST['content_text22'],$conn);

  $image1 = $_FILES['package_image1']['name'];
  $uploaded_image1 = '';

  if($image1 != null) {
    $file_tmp =$_FILES['package_image1']['tmp_name'];
      move_uploaded_file($file_tmp, getcwd()."/../../../../../../uploads/".$image1);
    $uploaded_image1 = "/uploads/".$image1;
  }


$vowels = array(" ", "&", "?", "/");
$enurl = str_replace($vowels, '_', $entext1);
  $sqla = 'INSERT INTO shop_digisurf_package (package_id, package_name, package_price, package_start_date, package_url, package_image, package_description, package_related_case_study, package_unique, package_points) VALUES ( "'.$themisc.'", "'.$entext1.'", "'.$entext2.'", now(), "'.$enurl.'", "'.$uploaded_image1.'", "'.$entext4.'", "'.$entext6.'", "'.$secret.'", "'.$entext22.'")';

  $retvala = mysql_query( $sqla, $conn );
    if(! $retvala ) {  
        die('Could not enter data: ' . mysql_error());
      }
      


  foreach ($_POST['content_text3'] as $key) {

    $sqlb = 'INSERT INTO shop_digisurf_package_list (package_id, product_id) VALUES ("'.$themisc.'", "'.$key.'")';

    $retvalb = mysql_query( $sqlb, $conn );
    if(! $retvalb ) {  
        die('Could not enter data: ' . mysql_error());
      }
  }


  foreach ($_POST['content_text5'] as $key) {

    $sqlb = 'INSERT INTO shop_digisurf_related_packages (package_id, all_package_id) VALUES ("'.$themisc.'", "'.$key.'")';

    $retvalb = mysql_query( $sqlb, $conn );
    if(! $retvalb ) {  
        die('Could not enter data: ' . mysql_error());
      }
  }



      header("Refresh:0; url=/Admin/AllProducts");

}


if(isset($_POST['edit_project_submit'])){

  $packageid = mysql_real_escape_string($_POST['package_id'],$conn);


	$entext1 = mysql_real_escape_string($_POST['content_text1'],$conn);
  $entext2 = mysql_real_escape_string($_POST['content_text2'],$conn);
  $entext4 = $_POST['content_text4'];
  $entext6 = mysql_real_escape_string($_POST['content_text6'],$conn);
  $entext7 = mysql_real_escape_string($_POST['content_text7'],$conn);
  $entext8 = $_POST['content_text8'];
  $entext9 = mysql_real_escape_string($_POST['content_text9'],$conn);
  $entext10 = mysql_real_escape_string($_POST['content_text10'],$conn);
  $entext11 = $_POST['content_text11'];
  $entext12 = mysql_real_escape_string($_POST['content_text12'],$conn);
  $entext13 = $_POST['content_text13'];
  $entext22 = mysql_real_escape_string($_POST['content_text22'],$conn);

  $entext23 = mysql_real_escape_string($_POST['content_text23'],$conn);
  $entext24 = $_POST['content_text24'];
  

  //seo
  $entext14 = mysql_real_escape_string($_POST['content_text14'],$conn);
  $entext15 = mysql_real_escape_string($_POST['content_text15'],$conn);
  $entext16 = mysql_real_escape_string($_POST['content_text16'],$conn);

  //shipping
  $entext17 = mysql_real_escape_string($_POST['content_text17'],$conn);
  $entext18 = mysql_real_escape_string($_POST['content_text18'],$conn);
  $entext19 = mysql_real_escape_string($_POST['content_text19'],$conn);
  $entext20 = mysql_real_escape_string($_POST['content_text20'],$conn);
  $entext21 = mysql_real_escape_string($_POST['content_text21'],$conn);

  $image1 = $_FILES['package_image1']['name'];

$vowels = array(" ", "&", "?", "/");
$enurl = str_replace($vowels, '_', $entext1);

 $sql_change="UPDATE shop_digisurf_package SET package_name='".$entext1."', package_price='".$entext2."', package_url='".$enurl."', package_update_date=now(), package_description='".$entext4."', package_related_case_study='".$entext6."', package_text7='".$entext7."', package_text8='".$entext8."', package_text9='".$entext9."', package_text10='".$entext10."', package_text11='".$entext11."', package_text12='".$entext12."', package_text13='".$entext13."', package_unique='".$secret."', package_meta_title='".$entext14."', package_meta_key='".$entext15."', package_meta_desc='".$entext16."', package_points='".$entext22."', package_shipping_price='".$entext21."', package_text23='".$entext23."', package_text24='".$entext24."'  WHERE package_id='".$packageid."' LIMIT 1 ";              
                   $retval_change = mysql_query( $sql_change, $conn );
                   if(! $retval_change )
                       {
                          die('Could not enter data: ' . mysql_error());
                       }

   $sql_ship = 'SELECT package_id FROM shop_digisurf_package_shipping WHERE package_id = "'.$packageid.'" ';
    $retval_ship = mysql_query( $sql_ship, $conn );                 
                               if(! $retval_ship )
                               {
                                  die('Could not get data: ' . mysql_error());
                               }
    $row_ship = mysql_fetch_array($retval_ship, MYSQL_ASSOC);
    $shipping_id = $row_ship['package_id'];



    if(empty($shipping_id)){
    $sql_shipping = 'INSERT INTO shop_digisurf_package_shipping (package_id, text1, text2, text3, text4, text5) VALUES ("'.$packageid.'", "'.$entext17.'", "'.$entext18.'", "'.$entext19.'", "'.$entext20.'", "'.$entext21.'")';

    $retval_shipping = mysql_query( $sql_shipping, $conn );
      if(! $retval_shipping ) {  
          die('Could not enter data: ' . mysql_error());
        }
      } else {
         $sql_update_shipping="UPDATE shop_digisurf_package_shipping SET text1='".$entext17."', text2='".$entext18."', text3='".$entext19."', text4='".$entext20."', text5='".$entext21."' WHERE package_id='".$packageid."' LIMIT 1 ";              
                   $retval_update_shipping = mysql_query( $sql_update_shipping, $conn );
                   if(! $retval_update_shipping )
                       {
                          die('Could not enter data: ' . mysql_error());
                       }
      }


if($image1 != null) {
      $file_tmp1 =$_FILES['package_image1']['tmp_name'];
      move_uploaded_file($file_tmp1, getcwd()."/../../../../../../uploads/".$image1);
      $filename = "/uploads/".$image1;
      $sql1="UPDATE shop_digisurf_package SET package_image='".$filename."' WHERE package_id ='".$packageid."' ";
      $retval1 = mysql_query( $sql1, $conn );
                   if(! $retval1 )
                       {
                          die('Could not enter image: ' . mysql_error());
                       }
    }

$sqlin = 'DELETE FROM shop_digisurf_package_list WHERE package_id ="'.$packageid.'" ';
                 $retvalin = mysql_query( $sqlin, $conn );
                   if(! $retvalin )
                       {
                          die('Could not enter data: ' . mysql_error());
                       }                      


        $sqlreseten1 = "ALTER TABLE shop_digisurf_package_list DROP idx; ";
        $sqlreseten2 = "ALTER TABLE shop_digisurf_package_list AUTO_INCREMENT = 1; ";
        $sqlreseten3 = "ALTER TABLE shop_digisurf_package_list ADD idx int UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST; ";

        $retvalreseten1 = mysql_query( $sqlreseten1, $conn );
        $retvalreseten2 = mysql_query( $sqlreseten2, $conn );
        $retvalreseten3 = mysql_query( $sqlreseten3, $conn );
                  if(! $retvalreseten1 )
                       {
                          die('Could not alter package data: ' . mysql_error());
                       }

                       if(! $retvalreseten2 )
                       {
                          die('Could not alter package data: ' . mysql_error());
                       }

                       if(! $retvalreseten3 )
                       {
                          die('Could not alter package data: ' . mysql_error());
                       }


foreach ($_POST['content_text3'] as $key) {

    $sqlb = 'INSERT INTO shop_digisurf_package_list (package_id, product_id) VALUES ("'.$packageid.'", "'.$key.'")';

    $retvalb = mysql_query( $sqlb, $conn );
    if(! $retvalb ) {  
        die('Could not enter data: ' . mysql_error());
      }
  }



  $sqlout = 'DELETE FROM shop_digisurf_related_packages WHERE package_id ="'.$packageid.'" ';
                 $retvalout = mysql_query( $sqlout, $conn );
                   if(! $retvalout )
                       {
                          die('Could not enter data: ' . mysql_error());
                       }                      


        $sqlresetout1 = "ALTER TABLE shop_digisurf_related_packages DROP idx; ";
        $sqlresetout2 = "ALTER TABLE shop_digisurf_related_packages AUTO_INCREMENT = 1; ";
        $sqlresetout3 = "ALTER TABLE shop_digisurf_related_packages ADD idx int UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST; ";

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



foreach ($_POST['content_text5'] as $key) {

    $sqlb = 'INSERT INTO shop_digisurf_related_packages (package_id, all_package_id) VALUES ("'.$packageid.'", "'.$key.'")';

    $retvalb = mysql_query( $sqlb, $conn );
    if(! $retvalb ) {  
        die('Could not enter data: ' . mysql_error());
      }
  }





//Images
$my_upload_files = $_FILES['multiple_uploaded_files']['name'];
$firstitem =  reset($my_upload_files);
                    
                if ($firstitem != null) { 
                $sqlin = 'DELETE FROM shop_digisurf_package_images WHERE package_id ="'.$packageid.'"';
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
                            $sqla = 'INSERT INTO shop_digisurf_package_images (package_id, package_images) VALUES ("'.$packageid.'", "'.$uploaded_images.'")';  
                               $retvalimages = mysql_query( $sqla, $conn );
                               if(! $retvalimages )
                                   {
                                      die('Could not enter data: ' . mysql_error());
                                   }
                        }
                      }
                
                  }



              header("Refresh:0; url=/Admin/AllProducts");
}


if(isset($_POST['delete_project_submit'])){
  $packageid = mysql_real_escape_string($_POST['package_id'],$conn);



        $sqlin = 'DELETE FROM shop_digisurf_package WHERE package_id ="'.$packageid.'" LIMIT 1';
                 $retvalin = mysql_query( $sqlin, $conn );
                   if(! $retvalin )
                       {
                          die('Could not enter data: ' . mysql_error());
                       }                      


        $sqlreseten1 = "ALTER TABLE shop_digisurf_package DROP idx; ";
        $sqlreseten2 = "ALTER TABLE shop_digisurf_package AUTO_INCREMENT = 1; ";
        $sqlreseten3 = "ALTER TABLE shop_digisurf_package ADD idx int UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST; ";

        $retvalreseten1 = mysql_query( $sqlreseten1, $conn );
        $retvalreseten2 = mysql_query( $sqlreseten2, $conn );
        $retvalreseten3 = mysql_query( $sqlreseten3, $conn );
                  if(! $retvalreseten1 )
                       {
                          die('Could not alter package data: ' . mysql_error());
                       }

                       if(! $retvalreseten2 )
                       {
                          die('Could not alter package data: ' . mysql_error());
                       }

                       if(! $retvalreseten3 )
                       {
                          die('Could not alter package data: ' . mysql_error());
                       }




        $sqlin_package = 'DELETE FROM shop_digisurf_package_list WHERE package_id ="'.$packageid.'" ';
                 $retvalin_package = mysql_query( $sqlin_package, $conn );
                   if(! $retvalin_package )
                       {
                          die('Could not enter data: ' . mysql_error());
                       }                      


        $sqlreseten1_package = "ALTER TABLE shop_digisurf_package_list DROP idx; ";
        $sqlreseten2_package = "ALTER TABLE shop_digisurf_package_list AUTO_INCREMENT = 1; ";
        $sqlreseten3_package = "ALTER TABLE shop_digisurf_package_list ADD idx int UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST; ";

        $retvalreseten1_package = mysql_query( $sqlreseten1_package, $conn );
        $retvalreseten2_package = mysql_query( $sqlreseten2_package, $conn );
        $retvalreseten3_package = mysql_query( $sqlreseten3_package, $conn );
                  if(! $retvalreseten1_package )
                       {
                          die('Could not alter package data: ' . mysql_error());
                       }

                       if(! $retvalreseten2_package )
                       {
                          die('Could not alter package data: ' . mysql_error());
                       }

                       if(! $retvalreseten3_package )
                       {
                          die('Could not alter package data: ' . mysql_error());
                       }

                       header("Refresh:0; url=/Admin/AllProducts");

}
?>