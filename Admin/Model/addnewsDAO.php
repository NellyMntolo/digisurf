<?php
include 'dbconfig.php';
mysql_set_charset("utf8");
$current_lang = $_SESSION['lang'];

$miscid = mysql_real_escape_string($_GET['miscid'],$conn);
?>