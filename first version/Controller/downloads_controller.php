<?php
include '../Model/dbconfig.php';
$bohanfile = "../Downloads/".mysql_real_escape_string($_GET['downloads'],$conn);
$downloads_realname = mysql_real_escape_string($_GET['real_name'],$conn);
if (file_exists($bohanfile)) {
    header("Cache-Control: public");
	header("Content-Description: File Transfer");
	header("Content-Length: ". filesize("$bohanfile").";");
	header("Content-Disposition: attachment; filename=$downloads_realname");
	header("Content-Type: application/octet-stream; "); 
	header("Content-Transfer-Encoding: binary");	
	readfile($bohanfile);
	//header("Refresh:0; url=/Downloads");
} else {
    echo "File Not Found";
}

?>