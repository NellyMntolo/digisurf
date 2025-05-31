<?php
//session_start();
header('Cache-control: private'); // IE 6 FIX
error_reporting(0);
 
 $lang = '';

$sqlget_default = 'select * from lang where default_lang is not null limit 1';
$retvalget_default = mysql_query( $sqlget_default, $conn );                 
      if(! $retvalget_default )
      {
        die('Could not get data: ' . mysql_error());
      }

$rowget_default = mysql_fetch_array($retvalget_default, MYSQL_ASSOC);
$default_lang = $rowget_default['default_lang'];


if (!isset($_SESSION['lang']) ) {
        $_SESSION['lang'] = $default_lang;
        setcookie('lang', $default_lang, time() + (3600 * 24 * 30));
   }


if(isSet($_GET['lang'])) {
$lang = $_GET['lang'];               


// register the session and set the cookie
$_SESSION['lang'] = $lang;
 
setcookie('lang', $lang, time() + (3600 * 24 * 30));
}
else if(isSet($_SESSION['lang']))
{
$lang = $_SESSION['lang'];
}
else if(isSet($_COOKIE['lang']))
{
$lang = $_COOKIE['lang'];
}
else
{
$lang = $default_lang;
}

$sqlget_lang = 'select * from lang where code = "'.$lang.'" limit 1';
$retvalget_lang = mysql_query( $sqlget_lang, $conn );                 
      if(! $retvalget_lang )
      {
        die('Could not get data: ' . mysql_error());
      }

$rowget_lang = mysql_fetch_array($retvalget_lang, MYSQL_ASSOC);
$lang_result = $rowget_lang['name']; 


  $currwebsite = 'SELECT website, company_name FROM dashboard';
  $retvalwebsiteen = mysql_query( $currwebsite, $conn );                 
                             if(! $retvalwebsiteen )
                             {
                                die('Could not get data: ' . mysql_error());
                             }
  $rowwebsiteen = mysql_fetch_array($retvalwebsiteen, MYSQL_ASSOC);
  $current_website = $rowwebsiteen['website'];
  $company_name = $rowwebsiteen['company_name'];
/* 
switch ($lang) {
  case $lang_result:
  $lang_file = 'lang.en.php';
  break;
 
  case 'zh':
  $lang_file = 'lang.zh.php';
  break;
 
  default:
  $lang_file = 'lang.zh.php';
 
}
 
include_once ''.$lang_file;
*/

$hovver_icons = '<!-- FAVS -->
<link rel="shortcut icon" href="/assets/favs/favicon.ico.png" type="image/x-icon" />
<link rel="apple-touch-icon" sizes="57x57" href="/assets/favs/apple-touch-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="/assets/favs/apple-touch-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="/assets/favs/apple-touch-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="/assets/favs/apple-touch-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="/assets/favs/apple-touch-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="/assets/favs/apple-touch-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="/assets/favs/apple-touch-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="/assets/favs/apple-touch-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="/assets/favs/apple-touch-icon-180x180.png">
<link rel="icon" type="image/png" href="/assets/favs/favicon-16x16.png" sizes="16x16">
<link rel="icon" type="image/png" href="/assets/favs/favicon-32x32.png" sizes="32x32">
<link rel="icon" type="image/png" href="/assets/favs/favicon-96x96.png" sizes="96x96">
<link rel="icon" type="image/png" href="/assets/favs/android-chrome-192x192.png" sizes="192x192">
<meta name="msapplication-square70x70logo" content="smalltile.png" />
<meta name="msapplication-square150x150logo" content="/mediumtile.png" />
<meta name="msapplication-wide310x150logo" content="/widetile.png" />
<meta name="msapplication-square310x310logo" content="/largetile.png" />
<!-- /FAVS -->';

// $hovver_icons = '<link rel="shortcut icon" href="/Admin/assets/img/favicon.ico.png" type="image/x-icon" />
// <link rel="apple-touch-icon" sizes="57x57" href="/Admin/assets/img/apple-touch-icon-57x57.png">
// <link rel="apple-touch-icon" sizes="60x60" href="/Admin/assets/img/apple-touch-icon-60x60.png">
// <link rel="apple-touch-icon" sizes="72x72" href="/Admin/assets/img/apple-touch-icon-72x72.png">
// <link rel="apple-touch-icon" sizes="76x76" href="/Admin/assets/img/apple-touch-icon-76x76.png">
// <link rel="apple-touch-icon" sizes="114x114" href="/Admin/assets/img/apple-touch-icon-114x114.png">
// <link rel="apple-touch-icon" sizes="120x120" href="/Admin/assets/img/apple-touch-icon-120x120.png">
// <link rel="apple-touch-icon" sizes="144x144" href="/Admin/assets/img/apple-touch-icon-144x144.png">
// <link rel="apple-touch-icon" sizes="152x152" href="/Admin/assets/img/apple-touch-icon-152x152.png">
// <link rel="apple-touch-icon" sizes="180x180" href="/Admin/assets/img/apple-touch-icon-180x180.png">
// <link rel="icon" type="image/png" href="/Admin/assets/img/favicon-16x16.png" sizes="16x16">
// <link rel="icon" type="image/png" href="/Admin/assets/img/favicon-32x32.png" sizes="32x32">
// <link rel="icon" type="image/png" href="/Admin/assets/img/favicon-96x96.png" sizes="96x96">
// <link rel="icon" type="image/png" href="/Admin/assets/img/android-chrome-192x192.png" sizes="192x192">
// <meta name="msapplication-square70x70logo" content="smalltile.png" />
// <meta name="msapplication-square150x150logo" content="/mediumtile.png" />
// <meta name="msapplication-wide310x150logo" content="/widetile.png" />
// <meta name="msapplication-square310x310logo" content="/largetile.png" />';

$animate = 'animated fadeIn';

$shop_notifications = '';
// $shop_notifications = '<ul class="nav navbar-nav" style="height: 50px!important;">
//               <li class="dropdown notifications-menu" style="height: 50px!important;">
//                 <a href="#" class="dropdown-toggle notification_reset" data-toggle="dropdown">
//                   <i class="fa fa-users"></i>
//                   <span class="label label-success total_customer_notifications"></span>
//                 </a>
//                 <ul class="dropdown-menu">
//                   <li class="header">You have <span class="total_customer_notifications"></span> notifications</li>
//                   <li>
//                     <!-- inner menu: contains the actual data -->
//                     <ul class="menu customer_notification">
//                     </ul>
//                   </li>
//                   <li class="footer"><a href="/Admin/CustomerNotifications/">View all</a></li>
//                 </ul>
//               </li>


//               <li class="dropdown notifications-menu" style="height: 50px!important;">
//                 <a href="#" class="dropdown-toggle notification_reset" data-toggle="dropdown">
//                   <i class="fa fa-bell text-white"></i>
//                   <span class="label label-info total_order_notifications"></span>
//                 </a>
//                 <ul class="dropdown-menu">
//                   <li class="header">You have <span class="total_order_notifications"></span> notifications</li>
//                   <li>
//                     <!-- inner menu: contains the actual data -->
//                     <ul class="menu order_notification">
//                     </ul>
//                   </li>
//                   <li class="footer"><a href="/Admin/OrderNotifications/">View all</a></li>
//                 </ul>
//               </li>


//               <li class="dropdown notifications-menu" style="height: 50px!important;">
//                 <a href="#" class="dropdown-toggle notification_reset" data-toggle="dropdown">
//                   <i class="fa fa-tags"></i>
//                   <span class="label label-warning total_product_notifications"></span>
//                 </a>
//                 <ul class="dropdown-menu">
//                   <li class="header">You have <span class="total_product_notifications"></span> notifications</li>
//                   <li>
//                     <!-- inner menu: contains the actual data -->
//                     <ul class="menu product_notification">
//                     </ul>
//                   </li>
//                   <li class="footer"><a href="/Admin/AllProducts/">View all</a></li>
//                 </ul>
//               </li>


//               <li class="dropdown notifications-menu" style="height: 50px!important;">
//                 <a href="#" class="dropdown-toggle notification_reset" data-toggle="dropdown">
//                   <i class="fa fa-sitemap text-white"></i>
//                   <span class="label label-danger total_package_notifications"></span>
//                 </a>
//                 <ul class="dropdown-menu">
//                   <li class="header">You have <span class="total_package_notifications"></span> notifications</li>
//                   <li>
//                     <!-- inner menu: contains the actual data -->
//                     <ul class="menu package_notification">
//                     </ul>
//                   </li>
//                   <li class="footer"><a href="/Admin/AllProducts/">View all</a></li>
//                 </ul>
//               </li>
//               </ul>';
?>

