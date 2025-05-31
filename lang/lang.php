<?php
error_reporting(0);
include('../Model/dbconfig.php');
include('Model/dbconfig.php');
mysql_set_charset("utf8");
session_start();

//session_start();
//header('Cache-control: private'); // IE 6 FIX
 
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

                        $active_languages = 'yes';
                        $active_language = '';
                        $sqlactive_language = 'select * from lang WHERE active_lang = "'.$active_languages.'" ';
                            $retvalactive_language = mysql_query( $sqlactive_language, $conn );                 
                                 if(! $retvalactive_language )
                                 {
                                    die('Could not get data: ' . mysql_error());
                                 }

                            while($rowactive_language = mysql_fetch_array($retvalactive_language, MYSQL_ASSOC)){
                            $new_code = $rowactive_language['code']; 
                            $new_name = $rowactive_language['name'];  
                            $active_language .= '<div class="lvn-grid1-3 pad-lr10"><form method="GET" action="?'.$new_code.'" class="lvn-container-alt"><button type="submit" class="lang-btn btn btn-primary btn-block">'.$new_name.'</button><input type="hidden" value="'.$new_code.'" name="lang"></form></div>'; 
                               } 

                        $active_languages_footer = 'yes';
                        $active_language_footer = '';
                        $sqlactive_language_footer = 'select * from lang WHERE active_lang = "'.$active_languages_footer.'" ';
                            $retvalactive_language_footer = mysql_query( $sqlactive_language_footer, $conn );                 
                                 if(! $retvalactive_language_footer )
                                 {
                                    die('Could not get data: ' . mysql_error());
                                 }

                            while($rowactive_language_footer = mysql_fetch_array($retvalactive_language_footer, MYSQL_ASSOC)){
                            $new_code_footer = $rowactive_language_footer['code']; 
                            $new_name_footer = $rowactive_language_footer['name'];  
                            $active_language_footer .= '<option name="lang" value="'.$new_code_footer.'">'.$new_name_footer.'</option>'; 
                               } 


                        $active_language_solutions = 'yes';
                        $active_language_solution = '';
                        $sqlactive_language_solution = 'select * from lang WHERE active_lang = "'.$active_language_solutions.'" ';
                            $retvalactive_language_solution = mysql_query( $sqlactive_language_solution, $conn );                 
                                 if(! $retvalactive_language_solution )
                                 {
                                    die('Could not get data: ' . mysql_error());
                                 }

                            while($rowactive_language_solution = mysql_fetch_array($retvalactive_language_solution, MYSQL_ASSOC)){
                            $new_code = $rowactive_language_solution['code']; 
                            $new_name = $rowactive_language_solution['name'];  
                            $active_language_solution .= '<form action="/Solutions/Translate/" method="POST"><button type="submit" name="lang" value="'.$new_code.'" class="lang-nav lang-btn">'.$new_name.'</button><input type="hidden" name="the_id" class="the_id"></form>'; 
                               }

                        $active_language_products = 'yes';
                        $active_language_product = '';
                        $sqlactive_language_product = 'select * from lang WHERE active_lang = "'.$active_language_products.'" ';
                            $retvalactive_language_product = mysql_query( $sqlactive_language_product, $conn );                 
                                 if(! $retvalactive_language_product )
                                 {
                                    die('Could not get data: ' . mysql_error());
                                 }

                            while($rowactive_language_product = mysql_fetch_array($retvalactive_language_product, MYSQL_ASSOC)){
                            $new_code = $rowactive_language_product['code']; 
                            $new_name = $rowactive_language_product['name'];  
                            $active_language_product .= '<form action="/Products/Translate/" method="POST"><button type="submit" name="lang" value="'.$new_code.'" class="lang-nav lang-btn">'.$new_name.'</button><input type="hidden" name="the_id" class="the_id"></form>'; 
                               }


                        $active_language_events = 'yes';
                        $active_language_event = '';
                        $sqlactive_language_event = 'select * from lang WHERE active_lang = "'.$active_language_events.'" ';
                            $retvalactive_language_event = mysql_query( $sqlactive_language_event, $conn );                 
                                 if(! $retvalactive_language_event )
                                 {
                                    die('Could not get data: ' . mysql_error());
                                 }

                            while($rowactive_language_event = mysql_fetch_array($retvalactive_language_event, MYSQL_ASSOC)){
                            $new_code = $rowactive_language_event['code']; 
                            $new_name = $rowactive_language_event['name'];  
                            $active_language_event .= '<form action="/Case_Studies/Translate/" method="POST"><button type="submit" name="lang" value="'.$new_code.'" class="lang-nav lang-btn">'.$new_name.'</button><input type="hidden" name="the_id" class="the_id"></form>'; 
                               }

                        $active_language_newss = 'yes';
                        $active_language_news = '';
                        $sqlactive_language_news = 'select * from lang WHERE active_lang = "'.$active_language_newss.'" ';
                            $retvalactive_language_news = mysql_query( $sqlactive_language_news, $conn );                 
                                 if(! $retvalactive_language_news )
                                 {
                                    die('Could not get data: ' . mysql_error());
                                 }

                            while($rowactive_language_news = mysql_fetch_array($retvalactive_language_news, MYSQL_ASSOC)){
                            $new_code = $rowactive_language_news['code']; 
                            $new_name = $rowactive_language_news['name'];  
                            $active_language_news .= '<form action="/News/Translate/" method="POST"><button type="submit" name="lang" value="'.$new_code.'" class="lang-nav lang-btn">'.$new_name.'</button><input type="hidden" name="the_id" class="the_id"></form>'; 
                               }


                        $currency_status = 'Y';
                        $all_currencies = '';
                        if(!isset($_SESSION['currency_symbol'])){$_SESSION['currency_symbol'] = '$';} 
                        $sqlcurrency_all = 'select * from shop_digisurf_currency WHERE currency_status = "'.$currency_status.'" ';
                            $retvalcurrency_all = mysql_query( $sqlcurrency_all, $conn );                 
                                 if(! $retvalcurrency_all )
                                 {
                                    die('Could not get data: ' . mysql_error());
                                 }

                            while($rowcurrency_all = mysql_fetch_array($retvalcurrency_all, MYSQL_ASSOC)){
                            $currency_iso_code = $rowcurrency_all['currency_iso_code']; 
                            $currency_name = $rowcurrency_all['currency_name'];  
                            $all_currencies .= '<option value="'.$currency_iso_code.'">'.$currency_name.' ('.$currency_iso_code.')</option>'; 
                               }

                               $current_symbol = '';
                               if (isSet($_GET['currency'])) {
                                  # code...
                                  $_SESSION['currency_session'] = $_GET['currency'];

                                $sqlsymbol = 'select currency_sign from shop_digisurf_currency WHERE currency_iso_code = "'.$_GET['currency'].'" ';
                                $retvalsymbol = mysql_query( $sqlsymbol, $conn );                 
                                     if(! $retvalsymbol )
                                     {
                                        die('Could not get data: ' . mysql_error());
                                     }

                                $rowsymbol = mysql_fetch_array($retvalsymbol, MYSQL_ASSOC);
                                $_SESSION['currency_symbol'] = $rowsymbol['currency_sign'];
                               }


$favs = '
<link rel="apple-touch-icon" sizes="57x57" href="/assets/favs/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="/assets/favs/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="/assets/favs/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="/assets/favs/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="/assets/favs/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="/assets/favs/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="/assets/favs/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="/assets/favs/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="/assets/favs/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="/assets/favs/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="/assets/favs/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="/assets/favs/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="/assets/favs/favicon-16x16.png">
<link rel="manifest" href="/assets/favs/manifest.json">
<meta name="msapplication-TileColor" content="#128E75">
<meta name="msapplication-TileImage" content="/assets/favs/ms-icon-144x144.png">
<meta name="theme-color" content="#128E75">
<META NAME="ROBOTS" CONTENT="INDEX, FOLLOW, ARCHIVE" />';

$css = '<link rel="stylesheet" type="text/css" href="/assets/css/bootstrap.css">
    <!-- <link rel="stylesheet" type="text/css" href="/assets/css/animsition.min.css"> -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/animsition/4.0.2/css/animsition.min.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/bootstrap-select.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/datepicker3.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/fontawesome.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/swiper.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/main.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/fullpage.css">
    <!--<link type="text/css" rel="stylesheet" href="//fast.fonts.net/cssapi/95f47e94-aa49-435b-9ae7-f0bb7e8d7fac.css"/> -->

    <!-- ADsense -->
    <!--<script data-ad-client="ca-pub-4605094500413163" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>-->

    <!-- Global site tag (gtag.js) - Google Ads: 692335510 -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=GTM-PPN2XRH"></script> <script> window.dataLayer = window.dataLayer || []; function gtag(){dataLayer.push(arguments);} gtag(\'js\', new Date()); gtag(\'config\', \'GTM-PPN2XRH\'); </script>

    <!-- Global site tag (gtag.js) - Google Analytics New Update 1 -->
    <!-- <script async src="https://www.googletagmanager.com/gtag/js?id=GTM-PPN2XRH"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag(\'js\', new Date());

      gtag(\'config\', \'GTM-PPN2XRH\');
    </script> -->';

$google_tags_analytics = '<!-- Global site tag (gtag.js) - Google Analytics New Update 2 -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=GTM-PPN2XRH"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag(\'js\', new Date());

      gtag(\'config\', \'GTM-PPN2XRH\');
    </script>';

$scripts = '
<script src="/assets/js/jquery.js"></script>
<script src="/assets/js/jquery.mobile.custom.min.js"></script>
<!-- <script src="/assets/js/animsition.min.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/animsition/4.0.2/js/animsition.min.js"></script>
<script src="/assets/js/jspagination.js"></script>
<script src="/assets/js/modernizr.js"></script>
<script src="/assets/js/bootstrap.min.js"></script>
<script src="/assets/js/bootstrap-select.min.js"></script>
<script src="/assets/js/bootstrap-autocomplete.min.js"></script>
<script src="/assets/js/moment.js"></script>
<script src="/assets/js/bootstrap-datepicker.js"></script>
<script src="/assets/js/swiper.min.js"></script>
<script src="/assets/js/typed.js"></script>
<script src="/assets/js/main.js"></script>
<!--<script src="/assets/js/clipboard.min.js"></script>
<script src="https://f.vimeocdn.com/js/froogaloop2.min.js"></script>

<script async custom-element = "amp-analytics" src = "https://cdn.ampproject.org/v0/amp-analytics-0.1.js"> </ script> -->

<!--<script src="/assets/js/jspagination.js"></script>-->';

?>


