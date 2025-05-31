
<?php
error_reporting(0);
/*
------------------
Language: Chinese
Author: @Nelly Mntolo
------------------
*/

include 'Model/mainDAO.php';
include '../Model/mainDAO.php';
include '../Model/weareDAO.php';
include '../Model/wethinkDAO.php';
include 'Model/projectDAO.php';
include '../Model/projectDAO.php';
include 'Model/footerDAO.php';
include '../Model/footerDAO.php';
include 'Model/menuDAO.php';
include '../Model/menuDAO.php';
include '../Model/mainprojectDAO.php';
include '../Model/maindownloadsDAO.php';
include '../Model/contactDAO.php';
include 'Model/blogDAO.php';
include '../Model/blogDAO.php';
include '../Model/categoryDAO.php';
include '../Model/tagDAO.php';
include '../Model/allnewsDAO.php';
include '../Model/allcasesDAO.php';
include 'Model/allproductsDAO.php';
include '../Model/allproductsDAO.php';
include '../Model/productDAO.php';
include 'Model/AllWorkshopsDAO.php';
include '../Model/AllWorkshopsDAO.php';
include '../Model/solutionDAO.php';

$lang = array();

//Global
$lang['logo'] = '';

//Menu
$lang['menu_text1'] = $menu_zhtext1;
$lang['menu_text2'] = $menu_zhtext2;
$lang['menu_text3'] = $menu_zhtext3;
$lang['menu_text4'] = $menu_zhtext4;
$lang['menu_text5'] = $menu_zhtext5;
$lang['menu_text6'] = $menu_zhtext6;
$lang['menu_text7'] = $menu_zhtext7;


//Main
$lang['index_text1'] = $index_zhtext1;
$lang['index_text2'] = $index_zhtext2;
$lang['index_text3'] = $index_zhtext3;
$index_textparagraph4 = trim($index_zhtext4);
$index_trimmedtext4 = nl2br($index_textparagraph4); 
$lang['index_text4'] = $index_trimmedtext4; 
$index_textparagraph5 = trim($index_zhtext5);
$index_trimmedtext5 = nl2br($index_textparagraph5); 
$lang['index_text5'] = $index_trimmedtext5; 
$index_textparagraph6 = trim($index_zhtext6);
$index_trimmedtext6 = nl2br($index_textparagraph6); 
$lang['index_text6'] = $index_trimmedtext6; 
$index_textparagraph7 = trim($index_zhtext7);
$index_trimmedtext7 = nl2br($index_textparagraph7); 
$lang['index_text7'] = $index_trimmedtext7; 
$index_textparagraph8 = trim($index_zhtext8);
$index_trimmedtext8 = nl2br($index_textparagraph8); 
$lang['index_text8'] = $index_trimmedtext8; 
$index_textparagraph9 = trim($index_zhtext9);
$index_trimmedtext9 = nl2br($index_textparagraph9); 
$lang['index_text9'] = $index_trimmedtext9; 
$index_textparagraph10 = trim($index_zhtext10);
$index_trimmedtext10 = nl2br($index_textparagraph10); 
$lang['index_text10'] = $index_trimmedtext10; 
$index_textparagraph11 = trim($index_zhtext11);
$index_trimmedtext11 = nl2br($index_textparagraph11); 
$lang['index_text11'] = $index_trimmedtext11; 
$lang['index_image1'] = $index_zhimage1;


$main_solutions = '';
while($row_mainprojectzh = mysql_fetch_array($retval_mainprojectzh, MYSQL_ASSOC)){
	$idx = $row_mainprojectzh['sortable_order'];
    $title = $row_mainprojectzh['text4'];
	$desc = $row_mainprojectzh['text6'];
	$image = $row_mainprojectzh['image1']; 
    $url = $row_mainprojectzh['url']; 

            $main_solutions .= '<div class="swiper-slide" style="background-image:url('.$image.')!important;">
                                    <div class="main-slider">
                                        <h1>'.$title.'</h1>
                                        <p>'.$desc.'</p>
                                        <div class="hm-slider-btn">
                                        <button class="btn btn-info" onclick="window.location=\'/Solutions/Solution/'.$url.'\'" >Discover</button>
                                        </div>
                                    </div>
                                </div>';
/*
            $main_solutions .= '<section id="section1" class="cd-section" style="background-image:url('.$image.')!important;">
                                    <div class="main-slider">
                                        <h1>'.$title.'</h1>
                                        <p>'.$desc.'</p>
                                        <div class="hm-slider-btn">
                                        <button class="btn btn-info" onclick="window.location=\'/Solutions/Solution/'.$url.'\'" >Discover</button>
                                        </div>
                                    </div>
                                    <a href="#section2" class="cd-scroll-down cd-img-replace hidden-xs">scroll down</a>
                                </section>';*/
			                   
}
$lang['index_solutions'] = $main_solutions;
$main_indexblogs = '';
while($row_indexblogs_zh = mysql_fetch_array($retval_indexblogs_zh, MYSQL_ASSOC)){
    $idx = $row_indexblogs_zh['idx'];
    $text4 = $row_indexblogs_zh['text4'];
    $text5 = $row_indexblogs_zh['text5'];
    $text7 = $row_indexblogs_zh['text7'];
    $image = $row_indexblogs_zh['image1']; 
    $url = $row_indexblogs_zh['url'];
    
            $main_indexblogs .= '<a href="/News/Articles/'.$url.'"  class="swiper-slide">
                                        <div class="gm-new-item">
                                            <div class="gm-new-item-img">
                                                <div class="gm-new-item-date">
                                                    '.$text7.'
                                                </div>
                                                <div class="gm-new-item-title">
                                                    <h3>'.$text4.'</h3>
                                                </div>
                                                <div class="cover"></div>
                                                <img src="'.$image.'"/>
                                            </div>
                                            <div class="gm-new-item-content">
                                                <p>'.$text5.'</p>
                                            </div>
                                        </div>
                                    </a>';              

                  
}
$lang['indexblogs_projects'] = $main_indexblogs;

$lang['index_all_solutions'] = $main_solutions;

$main_index_case_studies_first = '';
while($row_index_all_solutions_zh = mysql_fetch_array($retval_index_all_solutions_zh, MYSQL_ASSOC)){
    $idx = $row_index_all_solutions_zh['idx'];
    $text4 = $row_index_all_solutions_zh['text4'];
    $text6 = $row_index_all_solutions_zh['text6'];
    $image = $row_index_all_solutions_zh['image4']; 
    $url = $row_index_all_solutions_zh['url'];

                $main_index_all_solutions .= '<a href="/Solutions/Solution/'.$url.'" class="swiper-slide">
                                                <div class="solution-pre">
                                                    <div class="solution-pre-content">
                                                        <h3>'.$text4.'</h3>
                                                        <p>'.$text6.'</p>
                                                        <div class="solution-pre-button">
                                                           <!--<button class="btn btn-info">View</button>-->
                                                        </div>
                                                    </div>
                                                    <img src="'.$image.'"/>
                                                </div>
                                            </a>';                         

                  
}
$lang['index_all_solutions'] = $main_index_all_solutions;

$lang['index_case_studies'] = $main_case_studies;
$row_index_case_studies_zh = mysql_fetch_array($retval_index_cases_zh, MYSQL_ASSOC);
    $idx = $row_index_case_studies_zh['idx'];
    $text4 = $row_index_case_studies_zh['text4'];
    $text5 = $row_index_case_studies_zh['text5'];
    $image = $row_index_case_studies_zh['image1']; 
    $url = $row_index_case_studies_zh['url'];

                $main_index_case_studies_first .= '<div class="grid1">
                                        <div class="cases">
                                            <input type="submit" value="" name="Submit" id="frm1_submit" onclick="window.location=\'/Case_Studies/projects/'.$url.'\'" />
                                            <div class="cases-in">
                                                <div class="cases-in-cont">
                                                    <h3>'.$text4.'</h3>
                                                    <p>'.$text5.'</p>
                                                    <div class="cases-in-btn">
                                                        <!--<button class="btn btn-info" onclick="window.location=\'/Case_Studies/projects/'.$url.'\'">View case</button>-->
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="cases-img-alt">
                                                <div class="cover"></div>
                                                <img src="'.$image.'"/>
                                            </div>
                                        </div>
                                    </div>';                     

$lang['index_case_studies_first'] = $main_index_case_studies_first;

$main_index_case_studies_more = '';
while($row_index_case_studies_morezh = mysql_fetch_array($retval_index_cases_morezh, MYSQL_ASSOC)){
    $idx = $row_index_case_studies_morezh['idx'];
    $text4 = $row_index_case_studies_morezh['text4'];
    $text5 = $row_index_case_studies_morezh['text5'];
    $image = $row_index_case_studies_morezh['image1']; 
    $url = $row_index_case_studies_morezh['url'];


        $main_index_case_studies_more .= '<div class="grid1-2">
                                        <div class="cases">
                                            <input type="submit" value="" name="Submit" id="frm1_submit" onclick="window.location=\'/Case_Studies/projects/'.$url.'\'" />
                                            <div class="cases-in">
                                                <div class="cases-in-cont">
                                                    <h3>'.$text4.'</h3>
                                                    <p>'.$text5.'</p>
                                                    <div class="cases-in-btn">
                                                        <!--<button class="btn btn-info" onclick="window.location=\'/Case_Studies/projects/'.$url.'\'">View case</button>-->
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="cases-img-alt">
                                                <div class="cover"></div>
                                                <img src="'.$image.'"/>
                                            </div>
                                        </div>
                                    </div>';                
}          
$lang['index_case_studies_more'] = $main_index_case_studies_more;

//Main Case Studies
$lang['main_case_text1'] = $main_project_zhtext1;
$lang['main_case_text2'] = $main_project_zhtext2;
$lang['main_case_text3'] = $main_project_zhtext3;
$lang['main_case_text4'] = $main_project_zhtext4;
$lang['main_case_text5'] = $main_project_zhtext5;
$lang['main_case_text6'] = $main_project_zhtext6;
$lang['main_case_text7'] = $main_project_zhtext7;

//Main Downloads
$lang['main_downloads_text1'] = $main_downloads_zhtext1;
$lang['main_downloads_text2'] = $main_downloads_zhtext2;
$lang['main_downloads_text3'] = $main_downloads_zhtext3;
$lang['main_downloads_text4'] = $main_downloads_zhtext4;

//Main News
$lang['main_news_text1'] = $news_zhtext1;
$lang['main_news_text2'] = $news_zhtext2;
$lang['main_news_text3'] = $news_zhtext3;
$lang['main_news_text4'] = $news_zhtext4;

//Contact
$lang['contact_text1'] = $contact_zhtext1;
$lang['contact_text2'] = $contact_zhtext2;
$lang['contact_text3'] = $contact_zhtext3;
$lang['contact_text4'] = $contact_zhtext4;
$contact_textparagraph5 = trim($contact_zhtext5);
$contact_trimmedtext5 = nl2br($contact_textparagraph5); 
$lang['contact_text5'] = $contact_trimmedtext5; 
$contact_textparagraph6 = trim($contact_zhtext6);
$contact_trimmedtext6 = nl2br($contact_textparagraph6); 
$lang['contact_text6'] = $contact_trimmedtext6; 
$contact_textparagraph7 = trim($contact_zhtext7);
$contact_trimmedtext7 = nl2br($contact_textparagraph7); 
$lang['contact_text7'] = $contact_trimmedtext7; 
$lang['contact_text8'] = $contact_zhtext8;
$lang['contact_text9'] = $contact_zhtext9;
$lang['contact_text10'] = $contact_zhtext10;
$lang['contact_text11'] = $contact_zhtext11;
$lang['contact_text12'] = $contact_zhtext12;
$lang['contact_text13'] = $contact_zhtext13;
$lang['contact_text14'] = $contact_zhtext14;
$lang['contact_text15'] = $contact_zhtext15;
$lang['contact_text16'] = $contact_zhtext16;
$lang['contact_text17'] = $contact_zhtext17;
$lang['contact_text18'] = $contact_zhtext18;
$lang['contact_text19'] = $contact_zhtext19;
$lang['contact_text20'] = $contact_zhtext20;
$lang['contact_text21'] = $contact_zhtext21;
$lang['contact_text22'] = $contact_zhtext22;
$lang['contact_text23'] = $contact_zhtext23;
$lang['contact_text24'] = $contact_zhtext24;
$lang['contact_text25'] = $contact_zhtext25;
$lang['contact_text26'] = $contact_zhtext26;
$lang['contact_text27'] = $contact_zhtext27;
$lang['contact_text28'] = $contact_zhtext28;
$lang['contact_text29'] = $contact_zhtext29;
$lang['contact_text30'] = $contact_zhtext30;
$lang['contact_text31'] = $contact_zhtext31;
$lang['contact_text32'] = $contact_zhtext32;
$lang['contact_text33'] = $contact_zhtext33;
$lang['contact_text34'] = $contact_zhtext34;

//About
$lang['about_text1'] = $about_zhtext1;
$lang['about_text2'] = $about_zhtext2;
$lang['about_text3'] = $about_zhtext3;
$lang['about_text4'] = $about_zhtext4;
$lang['about_text5'] = $about_zhtext5;

//Product
$lang['main_product_text1'] = $main_products_all_zhtext1;
$lang['main_product_text2'] = $main_products_all_zhtext2;
$lang['main_product_text3'] = $main_products_all_zhtext3;
$lang['main_product_text4'] = $main_products_all_zhtext4;
$lang['main_product_text5'] = $main_products_all_zhtext5;
$lang['main_product_text6'] = $main_products_all_zhtext6;
$lang['main_product_text7'] = $main_products_all_zhtext7;

//Solution
$lang['main_solution_text1'] = $main_solutions_all_zhtext1;
$lang['main_solution_text2'] = $main_solutions_all_zhtext2;
$lang['main_solution_text3'] = $main_solutions_all_zhtext3;
$lang['main_solution_text4'] = $main_solutions_all_zhtext4;

$allnews = '';
while($row_allnews_zh = mysql_fetch_array($retval_allnews_zh, MYSQL_ASSOC)){
    $idx = $row_allnews_zh['idx'];
    $text4 = $row_allnews_zh['text4'];
    $text5 = $row_allnews_zh['text5'];
    $text7 = $row_allnews_zh['text7'];
    $image = $row_allnews_zh['image1']; 
    $url = $row_allnews_zh['url'];

                 $allnews .= '<a href="/News/Articles/'.$url.'" class="all-item">
                                    <div class="gm-new-item">
                                        <div class="gm-new-item-img">
                                            <div class="gm-new-item-date">
                                                '.$text7.'
                                            </div>
                                            <div class="gm-new-item-title">
                                                <h3>'.$text4.'</h3>
                                            </div>
                                            <div class="cover"></div>
                                            <img src="'.$image.'"/>
                                        </div>
                                        <div class="gm-new-item-content">
                                            <p>'.$text5.'</p>
                                        </div>
                                    </div>
                                    </a>';                     

                  
}
$lang['allnews'] = $allnews;


$morenews = '';
while($row_morenews_zh = mysql_fetch_array($retval_morenews_zh, MYSQL_ASSOC)){
    $idx = $row_morenews_zh['idx'];
    $text4 = $row_morenews_zh['text4'];
    $text5 = $row_morenews_zh['text5'];
    $text7 = $row_morenews_zh['text7'];
    $image = $row_morenews_zh['image1']; 
    $url = $row_morenews_zh['url'];

                 $morenews .= '<a href="/News/Articles/'.$url.'" class="swiper-slide">
                                    <div class="gm-new-item">
                                        <div class="gm-new-item-img">
                                            <div class="gm-new-item-date">
                                                '.$text7.'
                                            </div>
                                            <div class="gm-new-item-title">
                                                <h3>'.$text4.'</h3>
                                            </div>
                                            <div class="cover"></div>
                                            <img src="'.$image.'"/>
                                        </div>
                                        <div class="gm-new-item-content">
                                            <p>'.$text5.'</p>
                                        </div>
                                    </div>
                                    </a>';                     

                  
}
$lang['morenews'] = $morenews;


$row_singleblogzh = mysql_fetch_array($retval_singleblogzh, MYSQL_ASSOC);
    $blog_idx = $row_singleblogzh['idx']; 
    $blog_text1 = $row_singleblogzh['text1'];
    $blog_text2 = $row_singleblogzh['text2'];
    $blog_text3 = $row_singleblogzh['text3'];
    $blog_text4 = $row_singleblogzh['text4'];
    $blog_text5 = $row_singleblogzh['text5'];
    $blog_text6 = $row_singleblogzh['text6'];
    $blog_image1 = $row_singleblogzh['image1'];


$lang['single_news_text1'] = $blog_text1;
$lang['single_news_text2'] = $blog_text2;
$lang['single_news_text3'] = $blog_text3;
$lang['single_news_text4'] = $blog_text4;
$lang['single_news_text5'] = $blog_text5;
$lang['single_news_text6'] = $blog_text6;
$lang['single_news_image1'] = $blog_image1;


$allcases = '';
while($row_allcases_zh = mysql_fetch_array($retval_allcases_zh, MYSQL_ASSOC)){
    $idx = $row_allcases_zh['idx'];
    $text4 = $row_allcases_zh['text4'];
    $text5 = $row_allcases_zh['text5'];
    $image = $row_allcases_zh['image1']; 
    $url = $row_allcases_zh['url'];

                 $allcases .= '<a href="/Case_Studies/projects/'.$url.'" class="all-item">
                                    <div class="case-pre">
                                        <div class="case-pre-content">
                                            <div class="case-pre-content-img">
                                                <img src="'.$image.'"/>
                                            </div>
                                            <h3>'.$text4.'</h3>
                                        </div>
                                    </div>
                                    </a>';                     

                  
}
$lang['allcases'] = $allcases;


$row_singlecasezh = mysql_fetch_array($retval_singlecasezh, MYSQL_ASSOC);
    $event_idx = $row_singlecasezh['idx']; 
    $case_text1 = $row_singlecasezh['text1'];
    $case_text2 = $row_singlecasezh['text2'];
    $case_text3 = $row_singlecasezh['text3'];
    $case_text4 = $row_singlecasezh['text4'];
    $case_text5 = $row_singlecasezh['text5'];
    $case_text6 = $row_singlecasezh['text6'];
    $case_image1 = $row_singlecasezh['image1'];


$lang['single_case_text1'] = $case_text1;
$lang['single_case_text2'] = $case_text2;
$lang['single_case_text3'] = $case_text3;
$lang['single_case_text4'] = $case_text4;
$lang['single_case_text5'] = $case_text5;
$lang['single_case_text6'] = $case_text6;
$lang['single_case_image1'] = $case_image1;


$allproducts = '';
while($row_allproducts_zh = mysql_fetch_array($retval_allproducts_zh, MYSQL_ASSOC)){
    $idx = $row_allproducts_zh['idx'];
    $text4 = $row_allproducts_zh['text4'];
    $text5 = $row_allproducts_zh['text5'];
    $image = $row_allproducts_zh['image1']; 
    $url = $row_allproducts_zh['url'];

                 $allproducts .= '<a href="/Products/Product/'.$url.'" class="all-item">
                                    <div class="case-pre grid-item">
                                        <div class="case-pre-content">
                                            <div class="case-pre-content-img">
                                                <img src="'.$image.'"/>
                                            </div>
                                            <h3>'.$text4.'</h3>
                                        </div>
                                    </div>
                                    </a>';                     

                  
}
$lang['allproducts'] = $allproducts;


$row_singleproductzh = mysql_fetch_array($retval_singleproductzh, MYSQL_ASSOC);
    $product_idx = $row_singleproductzh['idx']; 
    $product_text1 = $row_singleproductzh['text1'];
    $product_text2 = $row_singleproductzh['text2'];
    $product_text3 = $row_singleproductzh['text3'];
    $product_text4 = $row_singleproductzh['text4'];
    $product_text5 = $row_singleproductzh['text5'];
    $product_text6 = $row_singleproductzh['text6'];


    $product_image1 = $row_singleproductzh['image1'];
    $product_image2 = $row_singleproductzh['image2'];
    $product_image3 = $row_singleproductzh['image3'];
    $product_image4 = $row_singleproductzh['image4'];
    $product_image5 = $row_singleproductzh['image5'];
    $product_image6 = $row_singleproductzh['image6'];

$product_images = '';

if ($product_image1 != null) {
    # code...
    $product_images .= '<div class="swiper-slide"><img src="'.$product_image1.'"/></div>';
}
if ($product_image2 != null) {
    # code...
    $product_images .= '<div class="swiper-slide"><img src="'.$product_image2.'"/></div>';
}

if ($product_image3 != null) {
    # code...
    $product_images .= '<div class="swiper-slide"><img src="'.$product_image3.'"/></div>';
}
if ($product_image4 != null) {
    # code...
    $product_images .= '<div class="swiper-slide"><img src="'.$product_image4.'"/></div>';
}
if ($product_image5 != null) {
    # code...
    $product_images .= '<div class="swiper-slide"><img src="'.$product_image5.'"/></div>';
}
if ($product_image6 != null) {
    # code...
    $product_images .= '<div class="swiper-slide"><img src="'.$product_image6.'"/></div>';
}

$lang['product_images'] = $product_images;

$lang['single_product_text1'] = $product_text1;
$lang['single_product_text2'] = $product_text2;
$lang['single_product_text3'] = $product_text3;
$lang['single_product_text4'] = $product_text4;
$lang['single_product_text5'] = $product_text5;
$lang['single_product_text6'] = $product_text6;


$AllWorkshops = '';
while($row_AllWorkshops_zh = mysql_fetch_array($retval_AllWorkshops_zh, MYSQL_ASSOC)){
    $idx = $row_AllWorkshops_zh['idx'];
    $text4 = $row_AllWorkshops_zh['text4'];
    $text6 = $row_AllWorkshops_zh['text6'];
    $image = $row_AllWorkshops_zh['image4']; 
    $url = $row_AllWorkshops_zh['url'];

                 $AllWorkshops .= '<a href="/Solutions/Solution/'.$url.'" class="all-item">
                                        <div class="solution-pre2">
                                            <div class="solution-pre-content solu-up1">
                                                <h3>'.$text4.'</h3>
                                                <p>'.$text6.'</p>
                                                <div class="solution-pre-button">
                                                    <!--<button class="btn btn-info">View</button>-->
                                                </div>
                                            </div>
                                            <img src="'.$image.'"/>
                                        </div>
                                        </a>';                     

                  
}
$lang['AllWorkshops'] = $AllWorkshops;


$row_singlesolutionzh = mysql_fetch_array($retval_singlesolutionzh, MYSQL_ASSOC);
    $workshop_idx = $row_singlesolutionzh['idx']; 
    $solution_text1 = $row_singlesolutionzh['text1'];
    $solution_text2 = $row_singlesolutionzh['text2'];
    $solution_text3 = $row_singlesolutionzh['text3'];
    $solution_text4 = $row_singlesolutionzh['text4'];
    $solution_text5 = $row_singlesolutionzh['text5'];
    $solution_text6 = $row_singlesolutionzh['text6'];
    $solution_text7 = $row_singlesolutionzh['text7'];
    $solution_text8 = $row_singlesolutionzh['text8'];
    $solution_text9 = $row_singlesolutionzh['text9'];
    $solution_text10 = $row_singlesolutionzh['text10'];
    $solution_text11 = $row_singlesolutionzh['text11'];
    $solution_text12 = $row_singlesolutionzh['text12'];
    $solution_text13 = $row_singlesolutionzh['text13'];
    $solution_text14 = $row_singlesolutionzh['text14'];
    $solution_text15 = $row_singlesolutionzh['text15'];
    $solution_image1 = $row_singlesolutionzh['image1'];
    $solution_image2 = $row_singlesolutionzh['image2'];
    $solution_image3 = $row_singlesolutionzh['image3'];
    $solution_image5 = $row_singlesolutionzh['image5'];


$lang['single_solution_text1'] = $solution_text1;
$lang['single_solution_text2'] = $solution_text2;
$lang['single_solution_text3'] = $solution_text3;
$lang['single_solution_text4'] = $solution_text4;
$lang['single_solution_text5'] = $solution_text5;
$solution_textparagraph6 = trim($solution_text6);
$solution_trimmedtext6 = nl2br($solution_textparagraph6); 
$lang['single_solution_text6'] = $solution_trimmedtext6;
$lang['single_solution_text7'] = $solution_text7;
$solution_textparagraph8 = trim($solution_text8);
$solution_trimmedtext8 = nl2br($solution_textparagraph8); 
$lang['single_solution_text8'] = $solution_trimmedtext8;
$lang['single_solution_text9'] = $solution_text9;

/*
$solution_textparagraph10 = trim($solution_text10);
$solution_trimmedtext10 = nl2br($solution_textparagraph10); 
$lang['single_solution_text10'] = $solution_trimmedtext10;
*/

$newstring10 = '';
if ($solution_text10 != null) {
$solution_textparagraph10 = trim($solution_text10);

$bits10 = explode("\r\n", $solution_textparagraph10);
foreach($bits10 as $bit10)
{
  $newstring10.= "<li>" . $bit10 . "</li>";
}
}
$lang['single_solution_text10'] = $newstring10;


$lang['single_solution_text11'] = $solution_text11;
$lang['single_solution_text12'] = $solution_text12;
$lang['single_solution_text13'] = $solution_text13;
$lang['single_solution_text14'] = $solution_text14;
$lang['single_solution_text15'] = $solution_text15;
$lang['single_solution_image1'] = $solution_image1;
$lang['single_solution_image2'] = $solution_image2;
$lang['single_solution_image3'] = $solution_image3;
$lang['single_solution_image5'] = $solution_image5;

//$lang['project_prev_id'] = $prev_id_zh;
$lang['solution_next_id'] = $next_id_zh;
$lang['solution_next_title'] = $next_title_zh;
$lang['solution_next_image'] = $next_image_zh;

$menu_solutions = '';
while($rowzh_menu_solutions = mysql_fetch_array($retvalzh_menu_solutions, MYSQL_ASSOC)) {
                            $menu_solutions_zhtext4 = $rowzh_menu_solutions['text4'];  
                            $url = $rowzh_menu_solutions['url'];

                            $menu_solutions .= '<li><a href="/Solutions/Solution/'.$url.'">'.$menu_solutions_zhtext4.'</a></li>';                      
                        }
$lang['menu_solutions'] = $menu_solutions;

$menu_products = '';
while($rowzh_menu_products = mysql_fetch_array($retvalzh_menu_products, MYSQL_ASSOC)) {
                            $menu_products_zhtext4 = $rowzh_menu_products['text4'];  
                            $url = $rowzh_menu_products['url'];

                            $menu_products .= '<li><a href="/Products/Product/'.$url.'">'.$menu_products_zhtext4.'</a></li>';                      
                        }
$lang['menu_products'] = $menu_products;


$menu_product_list = '';
$menu_product_list_item1 = '';
$menu_product_list_item2 = '';
$menu_product_list_item3 = '';
$menu_product_list_item4 = '';
$menu_product_list_item5 = '';
$menu_product_list_item6 = '';
$menu_product_list_item7 = '';
$menu_product_list_item8 = '';
$menu_product_list_item9 = '';
$menu_product_list_item10 = '';
$text1_id = '';
$text2_id = '';
$text3_id = '';
$text4_id = '';
$text5_id = '';
$text6_id = '';
$text7_id = '';
$text8_id = '';
$text9_id = '';
$text10_id = '';
$menu_product_list_mobile = '';
$menu_product_list_item1_mobile = '';
$menu_product_list_item2_mobile = '';
$menu_product_list_item3_mobile = '';
$menu_product_list_item4_mobile = '';
$menu_product_list_item5_mobile = '';
$menu_product_list_item6_mobile = '';
$menu_product_list_item7_mobile = '';
$menu_product_list_item8_mobile = '';
$menu_product_list_item9_mobile = '';
$menu_product_list_item10_mobile = '';

$rowzh_menu_product_list_first = mysql_fetch_array($retvalzh_menu_product_list_first, MYSQL_ASSOC);
    $category_idx_first = $rowzh_menu_product_list_first['idx'];
    $menu_product_list_entext1_first = $rowzh_menu_product_list_first['text2'];
    $test_id = $menu_product_list_entext1_first;
    $menu_product_list .= '<li role="presentation" class="active"><a href="#'.$category_idx_first.'" aria-controls="profile" role="tab" data-toggle="tab">'.$menu_product_list_entext1_first.'</a></li>';


while($rowzh_menu_product_list = mysql_fetch_array($retvalzh_menu_product_list, MYSQL_ASSOC)) {
                            $category_idx = $rowzh_menu_product_list['idx'];
                            $menu_product_list_zhtext2 = $rowzh_menu_product_list['text2'];  
                            

                        //$menu_product_list .= '<li><a href="/Products/Product/'.$url.'">'.$menu_product_list_zhtext4.'</a></li>';      
                        $menu_product_list .= '<li role="presentation" class="bunch"><a href="#'.$category_idx.'" aria-controls="profile" role="tab" data-toggle="tab">'.$menu_product_list_zhtext2.'</a></li>';


                        $menu_product_list_mobile .= '<div class="panel panel-default"> 
                                                            <div class="panel-heading" role="tab" id="heading'.$category_idx.'">
                                                              <h4 class="panel-title">
                                                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse'.$category_idx.'" aria-expanded="false" aria-controls="collapseOne">
                                                                  '.$menu_product_list_zhtext2.'
                                                                </a>
                                                              </h4>
                                                            </div>

                                                            <div id="collapse1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading1">
                                                                  <div class="panel-body">
                                                                  '.$menu_product_list_item1_mobile.'
                                                                  </div>
                                                            </div>


                                                            <div id="collapse2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading2">
                                                                  <div class="panel-body">
                                                                  '.$menu_product_list_item2_mobile.'
                                                                  </div>
                                                            </div>
                                                        </div>';

                    if($category_idx == '1'){                       

                        $sqlzh_menu_product_list_id = 'select text2 from think_tag where idx = "'.$category_idx.'" ';
                        $retvalzh_menu_product_list_id = mysql_query( $sqlzh_menu_product_list_id, $conn );
                             if(! $retvalzh_menu_product_list_id )
                             {
                                die('Could not get data: ' . mysql_error());
                             }
                        $rowzh_menu_product_list_id = mysql_fetch_array($retvalzh_menu_product_list_id, MYSQL_ASSOC);
                        $text1_id = $rowzh_menu_product_list_id['text2'];                        
                    }

                    if($category_idx == '2'){                       

                        $sqlzh_menu_product_list_id = 'select text2 from think_tag where idx = "'.$category_idx.'" ';
                        $retvalzh_menu_product_list_id = mysql_query( $sqlzh_menu_product_list_id, $conn );
                             if(! $retvalzh_menu_product_list_id )
                             {
                                die('Could not get data: ' . mysql_error());
                             }
                        $rowzh_menu_product_list_id = mysql_fetch_array($retvalzh_menu_product_list_id, MYSQL_ASSOC);
                        $text2_id = $rowzh_menu_product_list_id['text2'];
                    }

                     if($category_idx == '3'){                       

                        $sqlzh_menu_product_list_id = 'select text2 from think_tag where idx = "'.$category_idx.'" ';
                        $retvalzh_menu_product_list_id = mysql_query( $sqlzh_menu_product_list_id, $conn );
                             if(! $retvalzh_menu_product_list_id )
                             {
                                die('Could not get data: ' . mysql_error());
                             }
                        $rowzh_menu_product_list_id = mysql_fetch_array($retvalzh_menu_product_list_id, MYSQL_ASSOC);
                        $text3_id = $rowzh_menu_product_list_id['text2'];
                    }

                     if($category_idx == '4'){                       

                        $sqlzh_menu_product_list_id = 'select text2 from think_tag where idx = "'.$category_idx.'" ';
                        $retvalzh_menu_product_list_id = mysql_query( $sqlzh_menu_product_list_id, $conn );
                             if(! $retvalzh_menu_product_list_id )
                             {
                                die('Could not get data: ' . mysql_error());
                             }
                        $rowzh_menu_product_list_id = mysql_fetch_array($retvalzh_menu_product_list_id, MYSQL_ASSOC);
                        $text4_id = $rowzh_menu_product_list_id['text2'];
                    }

                     if($category_idx == '5'){                       

                        $sqlzh_menu_product_list_id = 'select text2 from think_tag where idx = "'.$category_idx.'" ';
                        $retvalzh_menu_product_list_id = mysql_query( $sqlzh_menu_product_list_id, $conn );
                             if(! $retvalzh_menu_product_list_id )
                             {
                                die('Could not get data: ' . mysql_error());
                             }
                        $rowzh_menu_product_list_id = mysql_fetch_array($retvalzh_menu_product_list_id, MYSQL_ASSOC);
                        $text5_id = $rowzh_menu_product_list_id['text2'];
                    }

                     if($category_idx == '6'){                       

                        $sqlzh_menu_product_list_id = 'select text2 from think_tag where idx = "'.$category_idx.'" ';
                        $retvalzh_menu_product_list_id = mysql_query( $sqlzh_menu_product_list_id, $conn );
                             if(! $retvalzh_menu_product_list_id )
                             {
                                die('Could not get data: ' . mysql_error());
                             }
                        $rowzh_menu_product_list_id = mysql_fetch_array($retvalzh_menu_product_list_id, MYSQL_ASSOC);
                        $text6_id = $rowzh_menu_product_list_id['text2'];
                    }

                     if($category_idx == '7'){                       

                        $sqlzh_menu_product_list_id = 'select text2 from think_tag where idx = "'.$category_idx.'" ';
                        $retvalzh_menu_product_list_id = mysql_query( $sqlzh_menu_product_list_id, $conn );
                             if(! $retvalzh_menu_product_list_id )
                             {
                                die('Could not get data: ' . mysql_error());
                             }
                        $rowzh_menu_product_list_id = mysql_fetch_array($retvalzh_menu_product_list_id, MYSQL_ASSOC);
                        $text7_id = $rowzh_menu_product_list_id['text2'];
                    }

                     if($category_idx == '8'){                       

                        $sqlzh_menu_product_list_id = 'select text2 from think_tag where idx = "'.$category_idx.'" ';
                        $retvalzh_menu_product_list_id = mysql_query( $sqlzh_menu_product_list_id, $conn );
                             if(! $retvalzh_menu_product_list_id )
                             {
                                die('Could not get data: ' . mysql_error());
                             }
                        $rowzh_menu_product_list_id = mysql_fetch_array($retvalzh_menu_product_list_id, MYSQL_ASSOC);
                        $text8_id = $rowzh_menu_product_list_id['text2'];
                    }

                     if($category_idx == '9'){                       

                        $sqlzh_menu_product_list_id = 'select text2 from think_tag where idx = "'.$category_idx.'" ';
                        $retvalzh_menu_product_list_id = mysql_query( $sqlzh_menu_product_list_id, $conn );
                             if(! $retvalzh_menu_product_list_id )
                             {
                                die('Could not get data: ' . mysql_error());
                             }
                        $rowzh_menu_product_list_id = mysql_fetch_array($retvalzh_menu_product_list_id, MYSQL_ASSOC);
                        $text9_id = $rowzh_menu_product_list_id['text2'];
                    }

                     if($category_idx == '10'){                       

                        $sqlzh_menu_product_list_id = 'select text2 from think_tag where idx = "'.$category_idx.'" ';
                        $retvalzh_menu_product_list_id = mysql_query( $sqlzh_menu_product_list_id, $conn );
                             if(! $retvalzh_menu_product_list_id )
                             {
                                die('Could not get data: ' . mysql_error());
                             }
                        $rowzh_menu_product_list_id = mysql_fetch_array($retvalzh_menu_product_list_id, MYSQL_ASSOC);
                        $text10_id = $rowzh_menu_product_list_id['text2'];
                    }

                }


                $sqlen_menu_product_list_item1 = 'select * from green_product_zh where category1 = "'.$test_id.'" OR category2 = "'.$test_id.'" OR category3 = "'.$test_id.'" OR category4 = "'.$test_id.'" OR category5 = "'.$test_id.'" OR category6 = "'.$test_id.'" OR category7 = "'.$test_id.'" OR category8 = "'.$test_id.'" OR category9 = "'.$test_id.'" OR category10 = "'.$test_id.'" ';
                        $retvalen_menu_product_list_item1 = mysql_query( $sqlen_menu_product_list_item1, $conn );
                             if(! $retvalen_menu_product_list_item1 )
                             {
                                die('Could not get data: ' . mysql_error());
                             }
                        while($rowen_menu_product_list_item1 = mysql_fetch_array($retvalen_menu_product_list_item1, MYSQL_ASSOC)) {
                            $text4 = $rowen_menu_product_list_item1['text4'];
                            $image1 = $rowen_menu_product_list_item1['image1'];
                            $url = $rowen_menu_product_list_item1['url'];
                            $category1 = $rowen_menu_product_list_item1['category1'];
                                                        
                                $menu_product_list_item1 .= '<div class="nav-product">
                                                                    <a href="/Products/Product/'.$url.'">
                                                                        <div class="nav-product-image">
                                                                            <img src="'.$image1.'"/>
                                                                        </div>
                                                                        <div class="nav-product-title">
                                                                            '.$text4.'
                                                                        </div>
                                                                    </a>
                                                                </div>';   

           
                        }

                /*$sqlen_menu_product_list_item1 = 'select * from green_product_zh where category1 = "'.$text1_id.'" OR category2 = "'.$text1_id.'" OR category3 = "'.$text1_id.'" OR category4 = "'.$text1_id.'" OR category5 = "'.$text1_id.'" OR category6 = "'.$text1_id.'" OR category7 = "'.$text1_id.'" OR category8 = "'.$text1_id.'" OR category9 = "'.$text1_id.'" OR category10 = "'.$text1_id.'" ';
                        $retvalen_menu_product_list_item1 = mysql_query( $sqlen_menu_product_list_item1, $conn );
                             if(! $retvalen_menu_product_list_item1 )
                             {
                                die('Could not get data: ' . mysql_error());
                             }
                        while($rowen_menu_product_list_item1 = mysql_fetch_array($retvalen_menu_product_list_item1, MYSQL_ASSOC)) {
                            $text4 = $rowen_menu_product_list_item1['text4'];
                            $image1 = $rowen_menu_product_list_item1['image1'];
                            $url = $rowen_menu_product_list_item1['url'];
                            $category1 = $rowen_menu_product_list_item1['category1'];
                                                        
                                $menu_product_list_item1 .= '<div class="nav-product">
                                                                    <a href="/Products/Product/'.$url.'">
                                                                        <div class="nav-product-image">
                                                                            <img src="'.$image1.'"/>
                                                                        </div>
                                                                        <div class="nav-product-title">
                                                                            '.$text4.'
                                                                        </div>
                                                                    </a>
                                                                </div>';                            
                        }*/

                        $sqlen_menu_product_list_item2 = 'select * from green_product_zh where category1 = "'.$text2_id.'" OR category2 = "'.$text2_id.'" OR category3 = "'.$text2_id.'" OR category4 = "'.$text2_id.'" OR category5 = "'.$text2_id.'" OR category6 = "'.$text2_id.'" OR category7 = "'.$text2_id.'" OR category8 = "'.$text2_id.'" OR category9 = "'.$text2_id.'" OR category10 = "'.$text2_id.'" ';
                        $retvalen_menu_product_list_item2 = mysql_query( $sqlen_menu_product_list_item2, $conn );
                             if(! $retvalen_menu_product_list_item2 )
                             {
                                die('Could not get data: ' . mysql_error());
                             }
                        while($rowen_menu_product_list_item2 = mysql_fetch_array($retvalen_menu_product_list_item2, MYSQL_ASSOC)) {
                            $text4 = $rowen_menu_product_list_item2['text4'];
                            $image1 = $rowen_menu_product_list_item2['image1'];
                            $url = $rowen_menu_product_list_item2['url'];
                            $category2 = $rowen_menu_product_list_item2['category2'];
                                                        
                                $menu_product_list_item2 .= '<div class="nav-product">
                                                                    <a href="/Products/Product/'.$url.'">
                                                                        <div class="nav-product-image">
                                                                            <img src="'.$image1.'"/>
                                                                        </div>
                                                                        <div class="nav-product-title">
                                                                            '.$text4.'
                                                                        </div>
                                                                    </a>
                                                                </div>';                            
                        }

                        $sqlen_menu_product_list_item3 = 'select * from green_product_zh where category1 = "'.$text3_id.'" OR category2 = "'.$text3_id.'" OR category3 = "'.$text3_id.'" OR category4 = "'.$text3_id.'" OR category5 = "'.$text3_id.'" OR category6 = "'.$text3_id.'" OR category7 = "'.$text3_id.'" OR category8 = "'.$text3_id.'" OR category9 = "'.$text3_id.'" OR category10 = "'.$text3_id.'" ';
                        $retvalen_menu_product_list_item3 = mysql_query( $sqlen_menu_product_list_item3, $conn );
                             if(! $retvalen_menu_product_list_item3 )
                             {
                                die('Could not get data: ' . mysql_error());
                             }
                        while($rowen_menu_product_list_item3 = mysql_fetch_array($retvalen_menu_product_list_item3, MYSQL_ASSOC)) {
                            $text4 = $rowen_menu_product_list_item3['text4'];
                            $image1 = $rowen_menu_product_list_item3['image1'];
                            $url = $rowen_menu_product_list_item3['url'];
                            $category3 = $rowen_menu_product_list_item3['category3'];
                                                        
                                $menu_product_list_item3 .= '<div class="nav-product">
                                                                    <a href="/Products/Product/'.$url.'">
                                                                        <div class="nav-product-image">
                                                                            <img src="'.$image1.'"/>
                                                                        </div>
                                                                        <div class="nav-product-title">
                                                                            '.$text4.'
                                                                        </div>
                                                                    </a>
                                                                </div>';                            
                        }


                        $sqlen_menu_product_list_item4 = 'select * from green_product_zh where category1 = "'.$text4_id.'" OR category2 = "'.$text4_id.'" OR category3 = "'.$text4_id.'" OR category4 = "'.$text4_id.'" OR category5 = "'.$text4_id.'" OR category6 = "'.$text4_id.'" OR category7 = "'.$text4_id.'" OR category8 = "'.$text4_id.'" OR category9 = "'.$text4_id.'" OR category10 = "'.$text4_id.'" ';
                        $retvalen_menu_product_list_item4 = mysql_query( $sqlen_menu_product_list_item4, $conn );
                             if(! $retvalen_menu_product_list_item4 )
                             {
                                die('Could not get data: ' . mysql_error());
                             }
                        while($rowen_menu_product_list_item4 = mysql_fetch_array($retvalen_menu_product_list_item4, MYSQL_ASSOC)) {
                            $text4 = $rowen_menu_product_list_item4['text4'];
                            $image1 = $rowen_menu_product_list_item4['image1'];
                            $url = $rowen_menu_product_list_item4['url'];
                            $category4 = $rowen_menu_product_list_item4['category4'];
                                                        
                                $menu_product_list_item4 .= '<div class="nav-product">
                                                                    <a href="/Products/Product/'.$url.'">
                                                                        <div class="nav-product-image">
                                                                            <img src="'.$image1.'"/>
                                                                        </div>
                                                                        <div class="nav-product-title">
                                                                            '.$text4.'
                                                                        </div>
                                                                    </a>
                                                                </div>';                            
                        }



                        $sqlen_menu_product_list_item5 = 'select * from green_product_zh where category1 = "'.$text5_id.'" OR category2 = "'.$text5_id.'" OR category3 = "'.$text5_id.'" OR category4 = "'.$text5_id.'" OR category5 = "'.$text5_id.'" OR category6 = "'.$text5_id.'" OR category7 = "'.$text5_id.'" OR category8 = "'.$text5_id.'" OR category9 = "'.$text5_id.'" OR category10 = "'.$text5_id.'" ';
                        $retvalen_menu_product_list_item5 = mysql_query( $sqlen_menu_product_list_item5, $conn );
                             if(! $retvalen_menu_product_list_item5 )
                             {
                                die('Could not get data: ' . mysql_error());
                             }
                        while($rowen_menu_product_list_item5 = mysql_fetch_array($retvalen_menu_product_list_item5, MYSQL_ASSOC)) {
                            $text4 = $rowen_menu_product_list_item5['text4'];
                            $image1 = $rowen_menu_product_list_item5['image1'];
                            $url = $rowen_menu_product_list_item5['url'];
                            $category5 = $rowen_menu_product_list_item5['category5'];
                                                        
                                $menu_product_list_item5 .= '<div class="nav-product">
                                                                    <a href="/Products/Product/'.$url.'">
                                                                        <div class="nav-product-image">
                                                                            <img src="'.$image1.'"/>
                                                                        </div>
                                                                        <div class="nav-product-title">
                                                                            '.$text4.'
                                                                        </div>
                                                                    </a>
                                                                </div>';                            
                        }





                        $sqlen_menu_product_list_item6 = 'select * from green_product_zh where category1 = "'.$text6_id.'" OR category2 = "'.$text6_id.'" OR category3 = "'.$text6_id.'" OR category4 = "'.$text6_id.'" OR category5 = "'.$text6_id.'" OR category6 = "'.$text6_id.'" OR category7 = "'.$text6_id.'" OR category8 = "'.$text6_id.'" OR category9 = "'.$text6_id.'" OR category10 = "'.$text6_id.'" ';
                        $retvalen_menu_product_list_item6 = mysql_query( $sqlen_menu_product_list_item6, $conn );
                             if(! $retvalen_menu_product_list_item6 )
                             {
                                die('Could not get data: ' . mysql_error());
                             }
                        while($rowen_menu_product_list_item6 = mysql_fetch_array($retvalen_menu_product_list_item6, MYSQL_ASSOC)) {
                            $text4 = $rowen_menu_product_list_item6['text4'];
                            $image1 = $rowen_menu_product_list_item6['image1'];
                            $url = $rowen_menu_product_list_item6['url'];
                            $category6 = $rowen_menu_product_list_item6['category6'];
                                                        
                                $menu_product_list_item6 .= '<div class="nav-product">
                                                                    <a href="/Products/Product/'.$url.'">
                                                                        <div class="nav-product-image">
                                                                            <img src="'.$image1.'"/>
                                                                        </div>
                                                                        <div class="nav-product-title">
                                                                            '.$text4.'
                                                                        </div>
                                                                    </a>
                                                                </div>';                            
                        }




                        $sqlen_menu_product_list_item7 = 'select * from green_product_zh where category1 = "'.$text7_id.'" OR category2 = "'.$text7_id.'" OR category3 = "'.$text7_id.'" OR category4 = "'.$text7_id.'" OR category5 = "'.$text7_id.'" OR category6 = "'.$text7_id.'" OR category7 = "'.$text7_id.'" OR category8 = "'.$text7_id.'" OR category9 = "'.$text7_id.'" OR category10 = "'.$text7_id.'" ';
                        $retvalen_menu_product_list_item7 = mysql_query( $sqlen_menu_product_list_item7, $conn );
                             if(! $retvalen_menu_product_list_item7 )
                             {
                                die('Could not get data: ' . mysql_error());
                             }
                        while($rowen_menu_product_list_item7 = mysql_fetch_array($retvalen_menu_product_list_item7, MYSQL_ASSOC)) {
                            $text4 = $rowen_menu_product_list_item7['text4'];
                            $image1 = $rowen_menu_product_list_item7['image1'];
                            $url = $rowen_menu_product_list_item7['url'];
                            $category7 = $rowen_menu_product_list_item7['category7'];
                                                        
                                $menu_product_list_item7 .= '<div class="nav-product">
                                                                    <a href="/Products/Product/'.$url.'">
                                                                        <div class="nav-product-image">
                                                                            <img src="'.$image1.'"/>
                                                                        </div>
                                                                        <div class="nav-product-title">
                                                                            '.$text4.'
                                                                        </div>
                                                                    </a>
                                                                </div>';                            
                        }




                        $sqlen_menu_product_list_item8 = 'select * from green_product_zh where category1 = "'.$text8_id.'" OR category2 = "'.$text8_id.'" OR category3 = "'.$text8_id.'" OR category4 = "'.$text8_id.'" OR category5 = "'.$text8_id.'" OR category6 = "'.$text8_id.'" OR category7 = "'.$text8_id.'" OR category8 = "'.$text8_id.'" OR category9 = "'.$text8_id.'" OR category10 = "'.$text8_id.'" ';
                        $retvalen_menu_product_list_item8 = mysql_query( $sqlen_menu_product_list_item8, $conn );
                             if(! $retvalen_menu_product_list_item8 )
                             {
                                die('Could not get data: ' . mysql_error());
                             }
                        while($rowen_menu_product_list_item8 = mysql_fetch_array($retvalen_menu_product_list_item8, MYSQL_ASSOC)) {
                            $text4 = $rowen_menu_product_list_item8['text4'];
                            $image1 = $rowen_menu_product_list_item8['image1'];
                            $url = $rowen_menu_product_list_item8['url'];
                            $category8 = $rowen_menu_product_list_item8['category8'];
                                                        
                                $menu_product_list_item8 .= '<div class="nav-product">
                                                                    <a href="/Products/Product/'.$url.'">
                                                                        <div class="nav-product-image">
                                                                            <img src="'.$image1.'"/>
                                                                        </div>
                                                                        <div class="nav-product-title">
                                                                            '.$text4.'
                                                                        </div>
                                                                    </a>
                                                                </div>';                            
                        }




                        $sqlen_menu_product_list_item9 = 'select * from green_product_zh where category1 = "'.$text9_id.'" OR category2 = "'.$text9_id.'" OR category3 = "'.$text9_id.'" OR category4 = "'.$text9_id.'" OR category5 = "'.$text9_id.'" OR category6 = "'.$text9_id.'" OR category7 = "'.$text9_id.'" OR category8 = "'.$text9_id.'" OR category9 = "'.$text9_id.'" OR category10 = "'.$text9_id.'" ';
                        $retvalen_menu_product_list_item9 = mysql_query( $sqlen_menu_product_list_item9, $conn );
                             if(! $retvalen_menu_product_list_item9 )
                             {
                                die('Could not get data: ' . mysql_error());
                             }
                        while($rowen_menu_product_list_item9 = mysql_fetch_array($retvalen_menu_product_list_item9, MYSQL_ASSOC)) {
                            $text4 = $rowen_menu_product_list_item9['text4'];
                            $image1 = $rowen_menu_product_list_item9['image1'];
                            $url = $rowen_menu_product_list_item9['url'];
                            $category9 = $rowen_menu_product_list_item9['category9'];
                                                        
                                $menu_product_list_item9 .= '<div class="nav-product">
                                                                    <a href="/Products/Product/'.$url.'">
                                                                        <div class="nav-product-image">
                                                                            <img src="'.$image1.'"/>
                                                                        </div>
                                                                        <div class="nav-product-title">
                                                                            '.$text4.'
                                                                        </div>
                                                                    </a>
                                                                </div>';                            
                        }




                        $sqlen_menu_product_list_item10 = 'select * from green_product_zh where category1 = "'.$text10_id.'" OR category2 = "'.$text10_id.'" OR category3 = "'.$text10_id.'" OR category4 = "'.$text10_id.'" OR category5 = "'.$text10_id.'" OR category6 = "'.$text10_id.'" OR category7 = "'.$text10_id.'" OR category8 = "'.$text10_id.'" OR category9 = "'.$text10_id.'" OR category10 = "'.$text10_id.'" ';
                        $retvalen_menu_product_list_item10 = mysql_query( $sqlen_menu_product_list_item10, $conn );
                             if(! $retvalen_menu_product_list_item10 )
                             {
                                die('Could not get data: ' . mysql_error());
                             }
                        while($rowen_menu_product_list_item10 = mysql_fetch_array($retvalen_menu_product_list_item10, MYSQL_ASSOC)) {
                            $text4 = $rowen_menu_product_list_item10['text4'];
                            $image1 = $rowen_menu_product_list_item10['image1'];
                            $url = $rowen_menu_product_list_item10['url'];
                            $category10 = $rowen_menu_product_list_item10['category10'];
                                                        
                                $menu_product_list_item10 .= '<div class="nav-product">
                                                                    <a href="/Products/Product/'.$url.'">
                                                                        <div class="nav-product-image">
                                                                            <img src="'.$image1.'"/>
                                                                        </div>
                                                                        <div class="nav-product-title">
                                                                            '.$text4.'
                                                                        </div>
                                                                    </a>
                                                                </div>';                            
                        }



$lang['menu_product_list'] = $menu_product_list;
$lang['menu_product_list_item1'] = $menu_product_list_item1;
$lang['menu_product_list_item2'] = $menu_product_list_item2;
$lang['menu_product_list_item3'] = $menu_product_list_item3;
$lang['menu_product_list_item4'] = $menu_product_list_item4;
$lang['menu_product_list_item5'] = $menu_product_list_item5;
$lang['menu_product_list_item6'] = $menu_product_list_item6;
$lang['menu_product_list_item7'] = $menu_product_list_item7;
$lang['menu_product_list_item8'] = $menu_product_list_item8;
$lang['menu_product_list_item9'] = $menu_product_list_item9;
$lang['menu_product_list_item10'] = $menu_product_list_item10;
$lang['menu_product_list_mobile'] = $menu_product_list_mobile;
$lang['menu_product_list_item1_mobile'] = $menu_product_list_item1_mobile;
$lang['menu_product_list_item2_mobile'] = $menu_product_list_item2_mobile;
$lang['menu_product_list_item3_mobile'] = $menu_product_list_item3_mobile;
$lang['menu_product_list_item4_mobile'] = $menu_product_list_item4_mobile;
$lang['menu_product_list_item5_mobile'] = $menu_product_list_item5_mobile;
$lang['menu_product_list_item6_mobile'] = $menu_product_list_item6_mobile;
$lang['menu_product_list_item7_mobile'] = $menu_product_list_item7_mobile;
$lang['menu_product_list_item8_mobile'] = $menu_product_list_item8_mobile;
$lang['menu_product_list_item9_mobile'] = $menu_product_list_item9_mobile;
$lang['menu_product_list_item10_mobile'] = $menu_product_list_item10_mobile;



$oldcases = '';
while($row_oldcases_zh = mysql_fetch_array($retval_oldcases_zh, MYSQL_ASSOC)){
    $idx = $row_oldcases_zh['idx'];
    $text4 = $row_oldcases_zh['text4'];
    $text5 = $row_oldcases_zh['text5'];
    $image = $row_oldcases_zh['image1']; 
    $url = $row_oldcases_zh['url'];

                 $oldcases .= '<div class="swiper-slide">
                                        <a href="/Case_Studies/projects/'.$url.'">
                                        <div class="case-pre">
                                            <div class="case-pre-content">
                                                <div class="case-pre-content-img">
                                                    <img src="'.$image.'"/>
                                                </div>
                                                <h3>'.$text4.'</h3>
                                            </div>
                                        </div>
                                        </a>
                                    </div>';                     

                  
}
$lang['oldcases'] = $oldcases;


$newcases = '';
while($row_newcases_zh = mysql_fetch_array($retval_newcases_zh, MYSQL_ASSOC)){
    $idx = $row_newcases_zh['idx'];
    $text4 = $row_newcases_zh['text4'];
    $text5 = $row_newcases_zh['text5'];
    $image = $row_newcases_zh['image1']; 
    $url = $row_newcases_zh['url'];

                 $newcases .= '<div class="swiper-slide">
                                        <a href="/Case_Studies/projects/'.$url.'">
                                        <div class="case-pre">
                                            <div class="case-pre-content">
                                                <div class="case-pre-content-img">
                                                    <img src="'.$image.'"/>
                                                </div>
                                                <h3>'.$text4.'</h3>
                                            </div>
                                        </div>
                                        </a>
                                    </div>';                     

                  
}
$lang['newcases'] = $newcases;

$lang['footer_text3'] = $footer_zhtext3;

$social = '';
while($rowsocial = mysql_fetch_array($retvalsocial, MYSQL_ASSOC)){
                            $idx = $rowsocial['idx'];
                            $socialtext1 = $rowsocial['text1'];     
                            $socialtext2 = $rowsocial['text2']; 
                            $socialimage = $rowsocial['image1']; 

                            $social .= '<a href="'.$socialtext1.'" target="'.$socialtext2.'"><img src="'.$socialimage.'"/></a>';
                }
$lang['social'] = $social;


//id="category_'.$idx.'"
$category = '';
 while($rowcategory = mysql_fetch_array($retvalcategory, MYSQL_ASSOC)){
        $idx = $rowcategory['idx'];
        $category_text1 = $rowcategory['text1'];
        $category_text2 = $rowcategory['text2'];
       // $category .= '<li><a class="test"><input type="hidden" id="category" name="category[]" value="'.$category_text2.'">'.$category_text2.'</a></li>';
        $category .= '<li><option name="category_name" value="'.$idx.'" class="names">'.$category_text2.'</option></li>';
                        }
$lang['categories'] = $category;


$tag = '';
 while($rowtag = mysql_fetch_array($retvaltag, MYSQL_ASSOC)){
        $idx = $rowtag['idx'];
        $tag_text1 = $rowtag['text1'];
        $tag_text2 = $rowtag['text2'];
       // $tag .= '<li><a class="test"><input type="hidden" id="tag" name="tag[]" value="'.$tag_text2.'">'.$tag_text2.'</a></li>';
        $tag .= '<li><option name="category_name" value="'.$idx.'" class="names">'.$tag_text2.'</option></li>';
                        }
$lang['tags'] = $tag;


$lang['categories_list'] = "Category";
$lang['articles_list'] = "Category";
//$lang['articles_list'] = "文章分類";

$lang['form'] = '<form id="categ-form-zh" accept-charset="UTF-8">
                          <select class="selectpicker" name="selected_category" id="form-select">
                                <li><option><a href="/Case_Studies" class="">'.$lang['main_case_text6'].'</a></option></li>
                                '.$lang['categories'].'
                          </select>
                        </form>';

$lang['think_form'] = '<form id="categ-form-zh" accept-charset="UTF-8">
                          <select class="selectpicker" name="selected_category" id="form-select">   
                                <li><option><a href="/Products" class="">'.$lang['main_product_text6'].'</a></option></li>                             
                                '.$lang['tags'].'
                          </select>
                        </form>';

$lang['script'] = '$("#form-select :selected").text();';




$related_cases = '';
while($row_related_case_zh = mysql_fetch_array($retval_related_case_name_zh, MYSQL_ASSOC)){
            $idx = $row_related_case_zh['idx'];
            $text4 = $row_related_case_zh['text4'];
            $text5 = $row_related_case_zh['text5'];
            $image = $row_related_case_zh['image1']; 
            $url = $row_related_case_zh['url'];


                         $related_cases .= '<div class="swiper-slide">
                                                <a href="/Case_Studies/projects/'.$url.'">
                                                <div class="case-pre">
                                                    <div class="case-pre-content">
                                                        <div class="case-pre-content-img">
                                                            <img src="'.$image.'"/>
                                                        </div>
                                                        <h3>'.$text4.'</h3>
                                                    </div>
                                                </div>
                                                </a>
                                            </div>';                     

                          
        }
$lang['related_cases'] = $related_cases;






$related_case_solutions = '';
while($row_related_case_solution_zh = mysql_fetch_array($retval_related_case_solution_name_zh, MYSQL_ASSOC)){
            $idx = $row_related_case_solution_zh['idx'];
            $text4 = $row_related_case_solution_zh['text4'];
            $text5 = $row_related_case_solution_zh['text5'];
            $image = $row_related_case_solution_zh['image1']; 
            $url = $row_related_case_solution_zh['url'];


                         $related_case_solutions .= '<div class="swiper-slide">
                                                        <a href="/Case_Studies/projects/'.$url.'">
                                                        <div class="case-pre">
                                                            <div class="case-pre-content">
                                                                <div class="case-pre-content-img">
                                                                    <img src="'.$image.'"/>
                                                                </div>
                                                                <h3>'.$text4.'</h3>
                                                            </div>
                                                        </div>
                                                        </a>
                                                    </div>';                     

                          
        }
$lang['related_case_solutions'] = $related_case_solutions;

$download_videos = '';
while($row_download_videos_zh = mysql_fetch_array($retval_download_videos_zh, MYSQL_ASSOC)){
            $idx = $row_download_videos_zh['idx'];
            $text1 = $row_download_videos_zh['text1'];

                         $download_videos .= '<a href="#" class="all-item">
                                                <div class="solution-download">
                                                    <iframe width="560" height="315" src="'.$text1.'" frameborder="0" allowfullscreen></iframe>
                                                </div>
                                                </a>';                     

                          
        }
$lang['download_videos'] = $download_videos;












/*
$sqlurl_idx_blogen = 'select * from green_blog_zh WHERE url="'.$blogid.'" LIMIT 1';
                        $retval_url_idx_blogen = mysql_query( $sqlurl_idx_blogen, $conn );                 
                             if(! $retval_url_idx_blogen )
                             {
                                die('Could not get data: ' . mysql_error());
                             }


                             $row_url_idx_blogen = mysql_fetch_array($retval_url_idx_blogen, MYSQL_ASSOC);
                             $url_blog_idx_en = $row_url_idx_blogen['idx']; 




                        $sqlurlblogen = 'select * from green_blog_en WHERE idx="'.$url_blog_idx_en.'" LIMIT 1';
                        $retval_urlblogen = mysql_query( $sqlurlblogen, $conn );                 
                             if(! $retval_urlblogen )
                             {
                                die('Could not get data: ' . mysql_error());
                             }


                             $row_urlblogen = mysql_fetch_array($retval_urlblogen, MYSQL_ASSOC);
                             $url_blog_en = $row_urlblogen['url']; 

                        $sqlurlblogzh = 'select * from green_blog_zh WHERE idx="'.$url_blog_idx_en.'" LIMIT 1';
                        $retval_urlblogzh = mysql_query( $sqlurlblogzh, $conn );                 
                             if(! $retval_urlblogzh )
                             {
                                die('Could not get data: ' . mysql_error());
                             }   
                             

                             $row_urlblogzh = mysql_fetch_array($retval_urlblogzh, MYSQL_ASSOC);
                             $url_blog_zh = $row_urlblogzh['url']; 

                   */          
?>