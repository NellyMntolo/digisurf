<?php
include '../lang/lang.php';
mysql_set_charset("utf8");


$current_lang = $_SESSION['lang'];
function theUrl($link) {
        $uri = $_SERVER['REQUEST_URI'];
        if($link==$uri) {
            return 'class="logo color-text-flow"';
            //return 'class="color-text-flow"';
        }
    }




                        $sqlcart = 'select * from digisurf_cart_module where code ="'.$current_lang.'"';
                        $retvalcart = mysql_query( $sqlcart, $conn );                 
                             if(! $retvalcart )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

                        $rowcart = mysql_fetch_array($retvalcart, MYSQL_ASSOC);
                            $idx = $rowcart['idx']; 
                            $cart_text1 = $rowcart['text1'];
                            $cart_text2 = $rowcart['text2'];
                            $cart_text3 = $rowcart['text3'];
                            $cart_text4 = $rowcart['text4'];
                            $cart_text5 = $rowcart['text5'];
                            $cart_text6 = $rowcart['text6'];
                            $cart_text7 = $rowcart['text7'];
                            $cart_text8 = $rowcart['text8'];


                            

                        $sqlmenuen = 'select * from digisurf_menu where code ="'.$current_lang.'"';
                        $retvalmenuen = mysql_query( $sqlmenuen, $conn );                 
                             if(! $retvalmenuen )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

                        $rowmenuen = mysql_fetch_array($retvalmenuen, MYSQL_ASSOC);
                            $menu_text1 = $rowmenuen['text1'];
                            $menu_text2 = $rowmenuen['text2'];
                            $menu_text3 = $rowmenuen['text3'];
                            $menu_text4 = $rowmenuen['text4'];
                            $menu_text5 = $rowmenuen['text5'];
                            $menu_text6 = $rowmenuen['text6'];
                            $menu_text7 = $rowmenuen['text7']; 
                            $menu_text8 = $rowmenuen['text8']; 
                            $menu_text9 = $rowmenuen['text9']; 
                            $menu_text10 = $rowmenuen['text10']; 
                            $menu_text11 = $rowmenuen['text11']; 
                            $menu_text12 = $rowmenuen['text12'];
                            $menu_text13 = $rowmenuen['text13'];
                            $menu_text14 = $rowmenuen['text14'];
                            $menu_text15 = $rowmenuen['text15'];
                            $menu_text16 = $rowmenuen['text16'];
                            $menu_text17 = $rowmenuen['text17'];
                            $menu_text18 = $rowmenuen['text18'];
                            $menu_text19 = $rowmenuen['text19'];
                            $menu_text20 = $rowmenuen['text20'];
                            $menu_text21 = $rowmenuen['text21'];
                            $menu_text22 = $rowmenuen['text22'];
                            $menu_text23 = $rowmenuen['text23'];
                            $music = $rowmenuen['text7'];


//$current_user = $_SESSION['login_visitor'];
$menu_account = '';

if(isset($_SESSION['login_visitor']) && $_SESSION['customer_type']=="SWD"){
    $menu_account = '<li><div class="account-img"><img src="/Assets/icons/LivenIcons-03.svg"/></div><a href="/Invite">'.$menu_text18.'</a></li>
    <li><div class="account-img"><img src="/Assets/icons/LivenIcons-02.svg"/></div><a href="/Accounts/Sales">'.$menu_text22.'</a></li>
                    <li><div class="account-img"><img src="/Assets/icons/LivenIcons-03.svg"/></div><a href="/LogoutAccount">'.$menu_text23.'</a></li>'; 

} elseif(isset($_SESSION['login_visitor']) && $_SESSION['customer_type']!="SWD"){
    $menu_account = '<li><div class="account-img"><img src="/Assets/icons/LivenIcons-03.svg"/></div><a href="/Invite">'.$menu_text18.'</a></li>
    <li><div class="account-img"><img src="/Assets/icons/LivenIcons-02.svg"/></div><a href="/Accounts/Member">'.$menu_text22.'</a></li>
                    <li><div class="account-img"><img src="/Assets/icons/LivenIcons-03.svg"/></div><a href="/LogoutAccount">'.$menu_text23.'</a></li>'; 
} else {
    $menu_account = '<li><div class="account-img"><img src="/Assets/icons/LivenIcons-03.svg"/></div><a href="/Login">'.$menu_text19.'</a></li>
                    <li><div class="account-img"><img src="/Assets/icons/LivenIcons-03.svg"/></div><a href="/SignUp">'.$menu_text20.'</a></li>'; 
}



function currencyConverter($currency_from,$currency_to,$currency_input){
    $yql_base_url = "http://query.yahooapis.com/v1/public/yql";
    $yql_query = 'select * from yahoo.finance.xchange where pair in ("'.$currency_from.$currency_to.'")';
    $yql_query_url = $yql_base_url . "?q=" . urlencode($yql_query);
    $yql_query_url .= "&format=json&env=store%3A%2F%2Fdatatables.org%2Falltableswithkeys";
    $yql_session = file_get_contents($yql_query_url);
    $yql_json =  json_decode($yql_session,true);
    $currency_output = (float) $currency_input*$yql_json['query']['results']['rate']['Rate'];

    return $currency_output;
}



//$currency_input = 30.00;
$currency_input = '';
//$currency_to = $_SESSION['currency_session']; 
$currency_from = "USD"; //currency codes : http://en.wikipedia.org/wiki/ISO_4217
 //$currency_to = "TWD";
 //$currency = currencyConverter($currency_from,$currency_to,$currency_input);
 //echo $currency_input.' '.$currency_from.' = '.$currency.' '.$currency_to.'<br>';

/*
if(isset($_SESSION['currency_session'])){
     $currency_to = $_SESSION['currency_session']
}*/
//echo $currency_to;



                        $sqlcasecategory = 'select * from digisurf_categories WHERE code="'.$current_lang.'" ORDER BY sortable_order ASC';
                        $retvalcasecategory = mysql_query( $sqlcasecategory, $conn );                 
                             if(! $retvalcasecategory )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

                        $casecategories = '';
                        
                        while($rowcasecategory = mysql_fetch_array($retvalcasecategory, MYSQL_ASSOC)){
                        $caseidx = $rowcasecategory['idx']; 
                        $casetext1 = $rowcasecategory['text1']; 
                        $casetext2 = $rowcasecategory['text2']; 
                        $caseimage1 = $rowcasecategory['image1']; 
                        //$casecategories .= '<option name="category_name" value="'.$idx.'" class="names">'.$text1.'</option>'; 

                        $casecategories .= '<a href="/event/Categories/'.$caseidx.'" class="lvn-grid1-6">
                                                <div class="lvn-cat">
                                                    <div class="lvn-cat-in">
                                                        <div class="lvn-cat-top">
                                                            <img src="'.$caseimage1.'"/>
                                                        </div>
                                                        <div class="lvn-cat-bottom">
                                                            <h4>'.$casetext1.'</h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>';
                           }



                        $sqlmenu_latest_news = 'select * from  digisurf_blog where code ="'.$current_lang.'" order by idx desc limit 3';
                        $retvalmenu_latest_news = mysql_query( $sqlmenu_latest_news, $conn );                 
                             if(! $retvalmenuen )
                             {
                                die('Could not get data: ' . mysql_error());
                             }
                        $latest_news = '';
                        while($rowmenu_latest_news = mysql_fetch_array($retvalmenu_latest_news, MYSQL_ASSOC)){
                            $idx = $rowmenu_latest_news['idx'];
                            $text4 = $rowmenu_latest_news['text4'];
                            $text5 = $rowmenu_latest_news['text5'];
                            $text7 = $rowmenu_latest_news['text7'];
                            $image = $rowmenu_latest_news['image1']; 
                            $url = $rowmenu_latest_news['url'];

                            $latest_news .= '<a href="/News/Articles/'.$url.'" class="lvn-grid1-3">
                                                <div class="news-item">
                                                    <div class="news-item-date">
                                                        <p>'.$text7.'</p>
                                                    </div>
                                                    <div class="news-item-title">
                                                        <h4>'.$text4.'</h4>
                                                    </div>
                                                    <div class="news-item-desc">
                                                        <p>'.$text5.'</p>
                                                    </div>
                                                </div>
                                            </a>';
                        }
                        
                    //}

                        //MENU Solutions
                        $sqlen_menu_solutions = 'select * from digisurf_solution where code ="'.$current_lang.'" ORDER BY sortable_order ASC';
                        $retvalen_menu_solutions = mysql_query( $sqlen_menu_solutions, $conn );
                             if(! $retvalen_menu_solutions )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

                        $menu_solutions = '';
                        while($rowen_menu_solutions = mysql_fetch_array($retvalen_menu_solutions, MYSQL_ASSOC)) {
                                                    $menu_solutions_entext4 = $rowen_menu_solutions['text4'];        
                                                    $url = $rowen_menu_solutions['url'];

                                                 $menu_solutions .= '<li><a href="/Solutions/Solution/'.$url.'">'.$menu_solutions_entext4.'</a></li>';                   
                                                }
                        //$menu_solutions = $menu_solutions;


                        //MENU Product Categories FIRST
                        $sqlzh_menu_product_list_first = 'select * from think_tag ORDER BY sortable_order ASC LIMIT 1';
                        $retvalzh_menu_product_list_first = mysql_query( $sqlzh_menu_product_list_first, $conn );
                             if(! $retvalzh_menu_product_list_first )
                             {
                                die('Could not get data: ' . mysql_error());
                             }
                        

                        $sqlen_menu_product_list_first = 'select * from think_tag ORDER BY sortable_order ASC LIMIT 1';
                        $retvalen_menu_product_list_first = mysql_query( $sqlen_menu_product_list_first, $conn );
                             if(! $retvalen_menu_product_list_first )
                             {
                                die('Could not get data: ' . mysql_error());
                             }



                        //MENU Product Categories    
                        $sqlzh_menu_product_list = 'select * from think_tag ORDER BY sortable_order ASC LIMIT 500 OFFSET 1';
                        $retvalzh_menu_product_list = mysql_query( $sqlzh_menu_product_list, $conn );
                             if(! $retvalzh_menu_product_list )
                             {
                                die('Could not get data: ' . mysql_error());
                             }
                        

                        $sqlen_menu_product_list = 'select * from think_tag ORDER BY sortable_order ASC LIMIT 500 OFFSET 1';
                        $retvalen_menu_product_list = mysql_query( $sqlen_menu_product_list, $conn );
                             if(! $retvalen_menu_product_list )
                             {
                                die('Could not get data: ' . mysql_error());
                             }



                        //MENU Product Categories MOBILE
                        $sqlzh_menu_product_list_mobile = 'select * from think_tag ORDER BY sortable_order ASC';
                        $retvalzh_menu_product_list_mobile = mysql_query( $sqlzh_menu_product_list_mobile, $conn );
                             if(! $retvalzh_menu_product_list_mobile )
                             {
                                die('Could not get data: ' . mysql_error());
                             }
                        

                        $sqlen_menu_product_list_mobile = 'select * from think_tag ORDER BY sortable_order ASC';
                        $retvalen_menu_product_list_mobile = mysql_query( $sqlen_menu_product_list_mobile, $conn );
                             if(! $retvalen_menu_product_list_mobile )
                             {
                                die('Could not get data: ' . mysql_error());
                             }
?>