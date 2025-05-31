<?php
include '../lang/lang.php';
mysql_set_charset("utf8");

include 'menuDAO.php';
include 'footerDAO.php';

$current_lang = $_SESSION['lang'];
$downloadcode = $_SESSION['download'];


$filedownloads = '';

if(isset($_POST['download_pass']) && $_POST['download_pass'] != ''){

$downloadpass = mysql_real_escape_string($_POST['download_pass'],$conn);

                        $sqlmain_confirmdownload = 'select * from digisurf_downloads_en where passcode ="'.$downloadpass.'"';
                        $retvalmain_confirmdownload = mysql_query( $sqlmain_confirmdownload, $conn );                 
                             if(! $retvalmain_confirmdownload )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

                        $rowmain_confirmdownload = mysql_fetch_array($retvalmain_confirmdownload, MYSQL_ASSOC);
                        $passcode = $rowmain_confirmdownload['passcode'];

                        if($downloadpass == $passcode && $downloadpass !=''){
                        $sqlmain_downloadsen = 'select * from digisurf_downloads_en where code ="'.$current_lang.'"';
                        $retvalmain_downloadsen = mysql_query( $sqlmain_downloadsen, $conn );                 
                             if(! $retvalmain_downloadsen )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

                        $rowmain_downloadsen = mysql_fetch_array($retvalmain_downloadsen, MYSQL_ASSOC);
                            $main_downloads_entext1 = $rowmain_downloadsen['text1'];
                            $main_downloads_entext2 = $rowmain_downloadsen['text2'];
                            $main_downloads_entext3 = $rowmain_downloadsen['text3'];
                            $main_downloads_entext4 = $rowmain_downloadsen['text4'];
                            $main_downloads_enimage1 = $rowmain_downloadsen['image1'];

                            $main_downloads_text1 = $main_downloads_entext1;
                            $main_downloads_text2 = $main_downloads_entext2;
                            $main_downloads_text3 = $main_downloads_entext3;
                            $main_downloads_text4 = $main_downloads_entext4;
                            $main_downloads_image1 = $main_downloads_enimage1;

                        
                        //ALL DOWNLOADS
                        $sqlmain_downloads = 'select * from green_downloads ORDER BY idx DESC';
                        $retvalmain_downloads = mysql_query( $sqlmain_downloads, $conn );                 
                             if(! $retvalmain_downloads )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

                        while($rowmain_downloads = mysql_fetch_array($retvalmain_downloads, MYSQL_ASSOC)){
                            $idx = $rowmain_downloads['idx'];
                            $text1 = $rowmain_downloads['text1'];
                            $text2 = $rowmain_downloads['text2'];
                            $text3 = $rowmain_downloads['text3'];

                        $filedownloads .= '<form action="/FileDownload" class="lvn-grid1-5 downloadform" style="cursor: pointer;">
                                                <input type="hidden" name="real_name" value="'.$text1.'">
                                                <input type="hidden" name="downloads" value="'.$text3.'">

                                                <div class="downloads-item">
                                                    <div class="downloads-item-in">
                                                        <button style="width:100%;">
                                                            <div class="downloads-item-top">
                                                                <img src="/Assets/icons/LivenIcons-18.svg"/>
                                                            </div>
                                                            <div class="downloads-item-bottom">
                                                                <h4>'.$text1.'</h4>
                                                            </div>
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>';

                        }

                        $sqldownload_videos_en = 'select * from green_videos ORDER BY idx DESC';
                        $retval_download_videos_en = mysql_query( $sqldownload_videos_en, $conn );                 
                             if(! $retval_download_videos_en )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

                        $download_videos = '';
                        while($row_download_videos_en = mysql_fetch_array($retval_download_videos_en, MYSQL_ASSOC)){
                                    $idx = $row_download_videos_en['idx'];
                                    $text1 = $row_download_videos_en['text1'];

                                                 $download_videos .= '<a href="#" class="all-item">
                                                                        <div class="solution-download">
                                                                            <iframe width="560" height="315" src="'.$text1.'" frameborder="0" allowfullscreen></iframe>
                                                                        </div>
                                                                        </a>';                     

                                                  
                                }
                        //$download_videos = $download_videos;
                            }
                        } else {

                        $sqlmain_downloadsen = 'select * from digisurf_downloads_en where code ="'.$current_lang.'"';
                        $retvalmain_downloadsen = mysql_query( $sqlmain_downloadsen, $conn );                 
                             if(! $retvalmain_downloadsen )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

                        $rowmain_downloadsen = mysql_fetch_array($retvalmain_downloadsen, MYSQL_ASSOC);
                            $main_downloads_entext1 = $rowmain_downloadsen['text1'];
                            $main_downloads_entext2 = $rowmain_downloadsen['text2'];
                            $main_downloads_entext3 = $rowmain_downloadsen['text3'];
                            $main_downloads_entext4 = $rowmain_downloadsen['text4'];
                            $main_downloads_enimage1 = $rowmain_downloadsen['image1'];

                            $main_downloads_text1 = $main_downloads_entext1;
                            $main_downloads_text2 = $main_downloads_entext2;
                            $main_downloads_text3 = $main_downloads_entext3;
                            $main_downloads_text4 = $main_downloads_entext4;
                            $main_downloads_image1 = $main_downloads_enimage1;


                        //ALL DOWNLOADS
                        $sqlmain_downloads = 'select * from green_downloads ORDER BY idx DESC';
                        $retvalmain_downloads = mysql_query( $sqlmain_downloads, $conn );                 
                             if(! $retvalmain_downloads )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

                        while($rowmain_downloads = mysql_fetch_array($retvalmain_downloads, MYSQL_ASSOC)){
                            $idx = $rowmain_downloads['idx'];
                            $text1 = $rowmain_downloads['text1'];
                            $text2 = $rowmain_downloads['text2'];
                            $text3 = $rowmain_downloads['text3'];

                        $filedownloads .= '<div class="lvn-grid1-5 downloadform" style="cursor: pointer;"><div class="downloads-item">
                                                    <div class="downloads-item-in">
                                                        <button style="width:100%;" data-toggle="modal" data-target="#myModal">
                                                            <div class="downloads-item-top">
                                                                <img src="/Assets/icons/LivenIcons-18.svg"/>
                                                            </div>
                                                            <div class="downloads-item-bottom">
                                                                <h4>'.$text1.'</h4>
                                                            </div>
                                                        </button>
                                                    </div>
                                                </div></div>';

                        }

                        }
// else {
//     header('Location: ' . $_SERVER['HTTP_REFERER']);
// }

?>