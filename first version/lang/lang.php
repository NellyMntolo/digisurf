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
                            // $active_language .= '<div class="lvn-grid1-3 pad-lr10"><form method="GET" action="?'.$new_code.'" class="lvn-container-alt"><button type="submit" class="lang-btn btn btn-primary btn-block">'.$new_name.'</button><input type="hidden" value="'.$new_code.'" name="lang"></form></div>'; 

                            $active_language .= '<li><form method="GET" action="?'.$new_code.'" accept-charset="utf-8"><button type="submit" class="lang-btn">'.$new_name.'</button><input type="hidden" value="'.$new_code.'" name="lang"></form></li>';
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
                               

$favs = '<!-- FAVS -->
<!-- <link rel="shortcut icon" href="/Assets/favs/favicon.ico.png" type="image/x-icon" /> -->
<link rel="apple-touch-icon" sizes="57x57" href="/Assets/favs/apple-touch-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="/Assets/favs/apple-touch-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="/Assets/favs/apple-touch-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="/Assets/favs/apple-touch-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="/Assets/favs/apple-touch-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="/Assets/favs/apple-touch-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="/Assets/favs/apple-touch-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="/Assets/favs/apple-touch-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="/Assets/favs/apple-touch-icon-180x180.png">
<link rel="icon" type="image/png" href="/Assets/favs/favicon-16x16.png" sizes="16x16">
<link rel="icon" type="image/png" href="/Assets/favs/favicon-32x32.png" sizes="32x32">
<link rel="icon" type="image/png" href="/Assets/favs/favicon-96x96.png" sizes="96x96">
<link rel="icon" type="image/png" href="/Assets/favs/android-chrome-192x192.png" sizes="192x192">
<meta name="msapplication-square70x70logo" content="smalltile.png" />
<meta name="msapplication-square150x150logo" content="/mediumtile.png" />
<meta name="msapplication-wide310x150logo" content="/widetile.png" />
<meta name="msapplication-square310x310logo" content="/largetile.png" />
<!-- /FAVS -->

<link rel="search" type="application/opensearchdescription+xml" title="Nelly Mntolo" href="/opensearch.xml" />

<!-- Android Theme ======================================= -->
<!-- Chrome, Firefox OS and Opera -->
<meta name="theme-color" content="#9bc3e6">
<!-- Windows Phone -->
<meta name="msapplication-navbutton-color" content="#9bc3e6">
<!-- iOS Safari -->
<meta name="apple-mobile-web-app-status-bar-style" content="#9bc3e6">
<!-- allow full screen apple devices -->
<meta name="apple-mobile-web-app-capable" content="yes">



<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-72053080-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag("js", new Date());

  gtag("config", "UA-72053080-1");
</script>
';


$scripts = '
  <script src="/Assets/js/scripts.min.js"></script>
  <script src="/Assets/js/swiper.min.js"></script>
  <script src="/Assets/js/typed.js"></script>
  <script src="/Assets/js/main.js"></script>
  <script src="/Assets/js/custom.js"></script>
  <script src="/Assets/js/jquery.ripples-min.js"></script>
  <script>
      $(document).ready(function() {
          $(".nellyboot-slider").ripples();

          // $(".nellyboot-slider").ripples({
          //     resolution: 256,
          //     perturbance: 0.04
          // });
      });
  </script>';

?>