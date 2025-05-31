<?php
include '../Model/dbconfig.php';
mysql_set_charset("utf8");
session_start();
$current_lang = $_SESSION['lang'];


if(isset($_POST['create_project_submit'])){

  $max_misc = 'SELECT group_id FROM shop_digisurf_group ORDER BY group_id DESC';
  $retvalmax_miscen = mysql_query( $max_misc, $conn );                 
                             if(! $retvalmax_miscen )
                             {
                                die('Could not get data: ' . mysql_error());
                             }
  $rowmax_miscen = mysql_fetch_array($retvalmax_miscen, MYSQL_ASSOC);
  $large_misc = $rowmax_miscen['group_id'];

  $themisc = $large_misc+1;
  

  $entext1 = mysql_real_escape_string($_POST['content_text1'],$conn);
  $entext2 = mysql_real_escape_string($_POST['content_text2'],$conn);
  $entext3 = mysql_real_escape_string($_POST['content_text3'],$conn);


$vowels = array(" ", "&", "?", "/");
$enurl = str_replace($vowels, '_', $entext1);
  $sqla = 'INSERT INTO shop_digisurf_group (group_id, group_name, group_discount, group_theme, group_url, group_start_date) VALUES ( "'.$themisc.'", "'.$entext1.'", "'.$entext2.'", "'.$entext3.'", "'.$enurl.'", now() )';

  $retvala = mysql_query( $sqla, $conn );
    if(! $retvala ) {  
        die('Could not enter data: ' . mysql_error());
      }



      header("Refresh:0; url=/Admin/AllGroups");

}


if(isset($_POST['edit_project_submit'])){

  $groupid = mysql_real_escape_string($_POST['group_id'],$conn);


	$entext1 = mysql_real_escape_string($_POST['content_text1'],$conn);
  $entext2 = mysql_real_escape_string($_POST['content_text2'],$conn);
  $entext3 = mysql_real_escape_string($_POST['content_text3'],$conn);

$vowels = array(" ", "&", "?", "/");
$enurl = str_replace($vowels, '_', $entext1);

 $sql="UPDATE shop_digisurf_group SET group_name='".$entext1."', group_discount='".$entext2."', group_theme='".$entext3."', group_url='".$enurl."', group_update_date=now()  WHERE group_id='".$groupid."' LIMIT 1 ";              
                   $retval = mysql_query( $sql, $conn );
                   if(! $retval )
                       {
                          die('Could not enter data: ' . mysql_error());
                       }


              header("Refresh:0; url=/Admin/AllGroups");
}


if(isset($_POST['delete_project_submit'])){
  $groupid = mysql_real_escape_string($_POST['group_id'],$conn);



        $sqlin = 'DELETE FROM shop_digisurf_group WHERE group_id ="'.$groupid.'" LIMIT 1';
                 $retvalin = mysql_query( $sqlin, $conn );
                   if(! $retvalin )
                       {
                          die('Could not enter data: ' . mysql_error());
                       }                      


        $sqlreseten1 = "ALTER TABLE shop_digisurf_group DROP idx; ";
        $sqlreseten2 = "ALTER TABLE shop_digisurf_group AUTO_INCREMENT = 1; ";
        $sqlreseten3 = "ALTER TABLE shop_digisurf_group ADD idx int UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST; ";

        $retvalreseten1 = mysql_query( $sqlreseten1, $conn );
        $retvalreseten2 = mysql_query( $sqlreseten2, $conn );
        $retvalreseten3 = mysql_query( $sqlreseten3, $conn );
                  if(! $retvalreseten1 )
                       {
                          die('Could not alter group data: ' . mysql_error());
                       }

                       if(! $retvalreseten2 )
                       {
                          die('Could not alter group data: ' . mysql_error());
                       }

                       if(! $retvalreseten3 )
                       {
                          die('Could not alter group data: ' . mysql_error());
                       }

                       header("Refresh:0; url=/Admin/AllGroups");

}
?>