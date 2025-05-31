<?php
include '../lang/lang.php';
mysql_set_charset("utf8");

include 'menuDAO.php';
include 'footerDAO.php';
// error_reporting(E_ALL);

$current_lang = $_SESSION['lang'];
$all_events = '';
                        //CONTENT
                        $sql_events = 'select * from digisurf_project ORDER BY sortable_order ASC';
                        $retval_events = mysql_query( $sql_events, $conn );                 
                             if(! $retval_events )
                             {
                                die('Could not get data: ' . mysql_error());
                             } 


                        $events_all = '';
                        while($events = mysql_fetch_array($retval_events, MYSQL_ASSOC)){
                            $events_text1 = $events['text1'];
                            $events_entext4 = $events['text4'];
                            $events_entext5 = $events['text5'];
                            $events_image1 = $events['image1'];
                            $events_url = $events['url'];

                            // $events_trimmedtext6 = nl2br($events_entext6); 
                            // $events_one_text6 = $events_trimmedtext6; 
                            // $events_text6 = $events_one_text6;

                                      $all_events .= '<form action="/Single/Events/'.$events_url.'" method="post" class="digisurf-grid1-3">
                                                                  <div class="event-item">
                                                                      <div class="event-item-in">
                                                                          <div class="event-item-top">
                                                                              <img src="'.$events_image1.'"/>
                                                                          </div>
                                                                          <div class="event-item-bottom">
                                                                              <div class="">
                                                                                  <p class="event-date">'.date('M d - Y').'</p>
                                                                                  <h4>'.$events_entext4.'</h4>
                                                                                  <p>'.$events_entext5.'</p>
                                                                                  <span>(read more)</span>
                                                                              </div>
                                                                          </div>
                                                                      </div>
                                                                      <input type="hidden" name="myevent" value="'.$events_url.'">
                                                                      <input type="submit" class="event_sub">
                                                                  </div>                                                                  
                                                              </form>';                                                 
                        }


?>