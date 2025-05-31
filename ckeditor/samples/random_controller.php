<?php 
$dbhost = 'localhost';
	   	//$dbuser = 'ispot_blog'; //ispot_blog GODADDY //root LOCAL
	   	//$dbpass = '12345nelly'; //12345nelly GODADDY //123456 LOCAL
	   	$dbname = "ispot_main";

	   	$dbuser = 'root'; 
	   	$dbpass = '123456';
	   $conn = mysql_connect($dbhost, $dbuser, $dbpass,$dbname);
	   	mysql_select_db('ispot_main');
	   	mysql_set_charset("utf8");
	   	mysql_query("SET NAMES 'utf8'");
	   	mysql_query("SET CHARACTER SET utf8", $conn); 

	   	if(! $conn )
	   {
	      die('Could not connect: ' . mysql_error());
	   }



if(isset($_POST['create_submit'])){
	$title = $_POST['title'];
	$text1 = mysql_real_escape_string($_POST['editor1'],$conn);
	$text =  $_POST['editor1'];

	$myfile = fopen("newfile.php", "w") or die("Unable to open file!");
	$txt = $title."\n";
	fwrite($myfile, $txt);
	echo $txt;
	$txt = $text."\n";
	fwrite($myfile, $txt);
	fclose($myfile);
	echo $txt;

	$sql = 'INSERT INTO ckeditor (alltext) VALUES ("'.$text1.'")';
                   $retval = mysql_query( $sql, $conn );

                   if(! $retval )
                       {
                          die('Could not enter data: ' . mysql_error());
                       }

	echo "<a href=\"newfile.php\">created file</a>";
}


?>