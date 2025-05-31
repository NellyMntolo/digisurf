<?php
include '../lang/lang.php';
mysql_set_charset("utf8");
session_start();
error_reporting(E_ALL);


include 'menuDAO.php';
include 'footerDAO.php';

$current_lang = $_SESSION['lang'];


$event_url = mysql_real_escape_string($_POST['myevent'],$conn);
//$eventid = $_SESSION["event_session"];

//$getName = explode("/",$_SERVER['REQUEST_URI']);

$event_content = '';
$more_events_all = '';
$all_recent_single_events = '';

                        $sqleventen = 'select * from digisurf_project WHERE url="'.$event_url.'" AND code ="'.$current_lang.'" LIMIT 1';
                        $retval_singleeventen = mysql_query( $sqleventen, $conn );                 
                             if(! $retval_singleeventen )
                             {
                                die('Could not get data: ' . mysql_error());
                             }  

                        $row_singleevent = mysql_fetch_array($retval_singleeventen, MYSQL_ASSOC);
                        $event_text1 = $row_singleevent['text1'];
                        $event_text2 = $row_singleevent['text2'];
                        $event_text3 = $row_singleevent['text3'];
                        $event_text4 = $row_singleevent['text4'];
                        $event_texten5 = $row_singleevent['text5'];
                        $event_texten6 = $row_singleevent['text6'];
                        $all_events_url = $row_singleevent['url'];
                        $single_event_image1 = $row_singleevent['image1'];

                        $event_date = date('M d - Y');

                        $more_events_trimmedtext5 = nl2br($event_texten5); 
                        $more_events_one_text5 = $more_events_trimmedtext5; 
                        $event_text5 = $more_events_one_text5;

                        $more_events_trimmedtext6 = nl2br($event_texten6); 
                        $more_events_one_text6 = $more_events_trimmedtext6; 
                        $event_text6 = $more_events_one_text6;

                        $event_content = '<div class="word-container event-section col-md-12 main-event-content">
                                                <ul class="word-events">
                                                  <li class="word-event-image"><img src="'.$single_event_image1.'"></li>
                                                  <li class="word-event-title"><a href="/Single/event/'.$all_events_url.'">'.$event_text1.'</a></li>
                                                  <li class="word-event-title">'.$event_text1.'</li>
                                                  <!--<li class="word-excerpt">'.$event_text2.'</li>-->
                                                  <!--<li class="word-excerpt">'.$event_text3.'</li>-->
                                                  <!--<li class="word-excerpt">'.$event_text4.'</li>-->
                                                  <!--<li class="word-excerpt">'.$event_text5.'</li>-->
                                                  <li class="event-all-content">'.$event_text6.'</li>
                                                </ul>
                                              </div>';

                        $sql_more_events = 'select * from digisurf_project WHERE url !="'.$event_url.'" AND code ="'.$current_lang.'" LIMIT 3';
                        $retval_more_events = mysql_query( $sql_more_events, $conn );                 
                             if(! $retval_more_events )
                             {
                                die('Could not get data: ' . mysql_error());
                             }   

                        
                        while($more_events_db = mysql_fetch_array($retval_more_events, MYSQL_ASSOC)){
                            $more_events_entext4 = $more_events_db['text4'];
                            $more_events_entext5 = $more_events_db['text5'];
                            $more_events_image1 = $more_events_db['image1'];
                            $more_events_url = $more_events_db['url'];

                            $more_events_trimmedtext2 = nl2br($more_events_entext2); 
                            $more_events_one_text2 = $more_events_trimmedtext2; 
                            $more_events_text2 = $more_events_one_text2;

                                      // $more_events_all .= '<figure class="effect-events">
                                      //                             <img src="'.$more_events_image1.'" alt="'.$more_events_image1.'"/>
                                      //                             <figcaption>
                                      //                                 <span class="event-date">Sep. 08, 2019</span>
                                      //                                 <h2><span>'.$more_events_text1.'</span></h2>
                                      //                                 <p>'.$more_events_entext3.'</p>
                                      //                                 <a href="/Single/event/'.$more_events_url.'">View more</a>
                                      //                             </figcaption>           
                                      //                         </figure>';
                            $more_events_all .= '<form action="/Single/Events/'.$more_events_url.'" method="post" class="digisurf-grid1-3">
                                                                  <div class="event-item">
                                                                      <div class="event-item-in">
                                                                          <div class="event-item-top">
                                                                              <img src="'.$more_events_image1.'"/>
                                                                          </div>
                                                                          <div class="event-item-bottom">
                                                                              <div class="">
                                                                                  <p class="event-date">'.date('M d - Y').'</p>
                                                                                  <h4>'.$more_events_entext4.'</h4>
                                                                                  <p>'.$more_events_entext5.'</p>
                                                                                  <span>(read more)</span>
                                                                              </div>
                                                                          </div>
                                                                      </div>
                                                                      <input type="hidden" name="myevent" value="'.$more_events_url.'">
                                                                      <input type="submit" class="event_sub">
                                                                  </div>                                                                  
                                                              </form>';



                        }   
                        //$more_events = $more_events;

                        $sql_all_recent_single_events = 'select * from digisurf_project where code ="'.$current_lang.'" ORDER BY sortable_order DESC LIMIT 3';
                        $retval_all_recent_single_events = mysql_query( $sql_all_recent_single_events, $conn );                 
                             if(! $retval_all_recent_single_events )
                             {
                                die('Could not get data: ' . mysql_error());
                             } 

                        while($all_recent_single_events_all = mysql_fetch_array($retval_all_recent_single_events, MYSQL_ASSOC)){
                            $all_recent_single_events_text1 = $all_recent_single_events_all['text1'];
                            $all_recent_single_events_text2 = $all_recent_single_events_all['text2'];
                            $all_recent_single_events_entext3 = $all_recent_single_events_all['text3'];
                            $all_recent_single_events_image1 = $all_recent_single_events_all['image1'];
                            $all_recent_single_events_url = $all_recent_single_events_all['url'];
                            $all_recent_single_events_misc_id = $all_recent_single_events_all['misc_id'];
                            $all_recent_single_events_creation_date = $all_recent_single_events_all['creation_date'];

                            // $all_recent_single_events .= '<a href="/Single/event/'.$all_recent_single_events_url.'" >'.$all_recent_single_events_text1.'</a><br><br>';

                            $all_recent_single_events .= '<form action="/Single/event/'.$all_recent_single_events_url.'" method="post">'.$all_recent_single_events_text1.'
                            <input type="hidden" name="myevent" value="'.$all_recent_single_events_url.'"><input type="submit" class="event_sub"></form><br>';
                        }

?>