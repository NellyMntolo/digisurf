<?php  
include '../Model/dbconfig.php';
mysql_set_charset("utf8");
session_start();
unset($_SESSION['promo_text']);
$_SESSION['promo_dead'] = 0;
setcookie('promo_dead', $_SESSION['promo_dead'], time() + (3600 * 24 * 7));
header('Location: ' . $_SERVER['HTTP_REFERER']);
?>