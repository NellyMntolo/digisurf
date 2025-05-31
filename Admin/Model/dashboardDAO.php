<?php
include 'dbconfig.php';
mysql_set_charset("utf8");
                        $current_lang = $_SESSION['lang'];

                        //recent Solutions ///events
                        $sqlrecentsolutions_en1 = 'select * from digisurf_project where code ="'.$current_lang.'" ORDER BY idx DESC Limit 1';
                        $retval_recentsolutions_en1 = mysql_query( $sqlrecentsolutions_en1, $conn );                 
                             if(! $retval_recentsolutions_en1 )
                             {
                                die('Could not get data: ' . mysql_error());
                             }
                        $sqlrecentsolutions_en = 'select * from digisurf_project where code ="'.$current_lang.'" ORDER BY idx DESC Limit 2 offset 1';
                        $retval_recentsolutions_en = mysql_query( $sqlrecentsolutions_en, $conn );                 
                             if(! $retval_recentsolutions_en )
                             {
                                die('Could not get data: ' . mysql_error());
                             }



                        //recent products
                        $sqlrecentproducts_en1 = 'select * from digisurf_product where code ="'.$current_lang.'" ORDER BY idx DESC Limit 1';
                        $retval_recentproducts_en1 = mysql_query( $sqlrecentproducts_en1, $conn );                 
                             if(! $retval_recentproducts_en1 )
                             {
                                die('Could not get data: ' . mysql_error());
                             }
                        $sqlrecentproducts_en = 'select * from digisurf_product where code ="'.$current_lang.'" ORDER BY idx DESC Limit 2 offset 1';
                        $retval_recentproducts_en = mysql_query( $sqlrecentproducts_en, $conn );                 
                             if(! $retval_recentproducts_en )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

                        
                        //recent Case Studies ///workdshops
                        $sqlrecentprojects_en1 = 'select * from digisurf_solution where code ="'.$current_lang.'" ORDER BY sortable_order ASC Limit 1';
                        $retval_recentprojects_en1 = mysql_query( $sqlrecentprojects_en1, $conn );                 
                             if(! $retval_recentprojects_en1 )
                             {
                                die('Could not get data: ' . mysql_error());
                             }
                        $sqlrecentprojects_en = 'select * from digisurf_solution where code ="'.$current_lang.'" ORDER BY sortable_order ASC Limit 2 offset 1';
                        $retval_recentprojects_en = mysql_query( $sqlrecentprojects_en, $conn );                 
                             if(! $retval_recentprojects_en )
                             {
                                die('Could not get data: ' . mysql_error());
                             }


                        //recent news ///articles
                        $sqlrecentnews_en1 = 'select * from digisurf_blog where code ="'.$current_lang.'" ORDER BY sortable_order ASC Limit 1';
                        $retval_recentnews_en1 = mysql_query( $sqlrecentnews_en1, $conn );                 
                             if(! $retval_recentnews_en1 )
                             {
                                die('Could not get data: ' . mysql_error());
                             }
                        $sqlrecentnews_en = 'select * from digisurf_blog where code ="'.$current_lang.'" ORDER BY sortable_order ASC Limit 2 offset 1';
                        $retval_recentnews_en = mysql_query( $sqlrecentnews_en, $conn );                 
                             if(! $retval_recentnews_en )
                             {
                                die('Could not get data: ' . mysql_error());
                             }



                        //Website Views
                        $sqlviews_en = 'select views from digisurf_index';
                        $retval_views_en = mysql_query( $sqlviews_en, $conn );                 
                             if(! $retval_views_en )
                             {
                                die('Could not get data: ' . mysql_error());
                             }
                        $row_views_en = mysql_fetch_array($retval_views_en, MYSQL_ASSOC);
                        $views = $row_views_en['views'];

                        

                        //Published Projects
                        $yes = 'yes';
                        $sqlpublished_en = 'select * from digisurf_project where publish = "'.$yes.'"';
                        $retval_published_en = mysql_query( $sqlpublished_en, $conn );                 
                             if(! $retval_published_en )
                             {
                                die('Could not get data: ' . mysql_error());
                             }
                        $row_published_en = mysql_fetch_array($retval_published_en, MYSQL_ASSOC);
                        $published_projects = mysql_num_rows($retval_published_en);

                        $sqltotal_en = 'select * from digisurf_project';
                        $retval_total_en = mysql_query( $sqltotal_en, $conn );                 
                             if(! $retval_total_en )
                             {
                                die('Could not get data: ' . mysql_error());
                             }
                        $row_total_en = mysql_fetch_array($retval_total_en, MYSQL_ASSOC);
                        $total_projects = mysql_num_rows($retval_total_en);
                        //Published Projects

                        //Published blogs
                        $sqlpublishedblogs_en = 'select * from digisurf_blog where publish = "'.$yes.'"';
                        $retval_publishedblogs_en = mysql_query( $sqlpublishedblogs_en, $conn );                 
                             if(! $retval_publishedblogs_en )
                             {
                                die('Could not get data: ' . mysql_error());
                             }
                        $row_publishedblogs_en = mysql_fetch_array($retval_publishedblogs_en, MYSQL_ASSOC);
                        $publishedblogs_projects = mysql_num_rows($retval_publishedblogs_en);

                        $sqltotalblogs_en = 'select * from digisurf_blog';
                        $retval_totalblogs_en = mysql_query( $sqltotalblogs_en, $conn );                 
                             if(! $retval_totalblogs_en )
                             {
                                die('Could not get data: ' . mysql_error());
                             }
                        $row_totalblogs_en = mysql_fetch_array($retval_totalblogs_en, MYSQL_ASSOC);
                        $totalblogs_projects = mysql_num_rows($retval_totalblogs_en);
                        //Published blogs



                        //CHAT USERS
                        $all_chat_contacts = '';
                        $sqlchats_en = 'select * from user where name !="'.$login_session.'" ';
                        $retval_chats_en = mysql_query( $sqlchats_en, $conn );                 
                             if(! $retval_chats_en )
                             {
                                die('Could not get data: ' . mysql_error());
                             }
                        while($row_chats_en = mysql_fetch_array($retval_chats_en, MYSQL_ASSOC)){
                        $chat_name = $row_chats_en['name'];
                        $chat_id = $row_chats_en['id'];
                        $user_status = $row_chats_en['status'];
                        $online_user = '';
                        if ($user_status == "online") {
                            # code...
                            $online_user = '<i class="fa fa-circle text-green"></i> Online';
                        } else {
                            $online_user = '<i class="fa fa-circle text-orange"></i> Offline';
                        }


                        $sqlchats_image_en = 'select * from think_master where idx ="'.$chat_id.'" ';
                        $retval_chats_image_en = mysql_query( $sqlchats_image_en, $conn );                 
                             if(! $retval_chats_image_en )
                             {
                                die('Could not get data: ' . mysql_error());
                             }
                        $row_chats_image_en = mysql_fetch_array($retval_chats_image_en, MYSQL_ASSOC);
                        $chat_image = $row_chats_image_en['image1'];


                        $all_chat_contacts .= '<li>
                                                <a data-widget="chat-pane-toggle">
                                                  <img class="contacts-list-img" src="'.$chat_image.'">
                                                  <div class="contacts-list-info">
                                                    <span class="contacts-list-name">
                                                      '.$chat_name.'
                                                      <small class="contacts-list-date pull-right">'.$online_user.'</small>
                                                    </span>
                                                    <!--<span class="contacts-list-msg">How have you been? I was...</span>-->
                                                  </div><!-- /.contacts-list-info -->
                                                  <input type="hidden" name="contact_chat_id" value="'.$chat_id.'">
                                                  <input type="radio" name="chat_radios" value="'.$chat_id.'" class="chat_radios">
                                                </a>
                                              </li><!-- End Contact Item -->';
                        }
                        /*
                        //MESSAGES
                        $all_chat_messages = '';
                        $to_id = '3';
                        //$sqlmessages_en = 'select * from messages';
                        $sqlmessages_en = 'SELECT h.id AS header_id, h.subject, h.status, m.id AS message_id, m.content, m.time, m.image,  IF(m.is_from_sender, x.name, y.name) AS written_by FROM (SELECT * FROM header WHERE (id = "'.$_SESSION['chat'].'") or (id = "'.$to_id.'") ) h INNER JOIN message m ON (h.id = m.header_id) INNER JOIN user x ON (h.from_id = x.id) INNER JOIN user y ON (h.to_id = y.id) ORDER BY message_id ASC;';
                        $retval_messages_en = mysql_query( $sqlmessages_en, $conn );                 
                             if(! $retval_messages_en )
                             {
                                die('Could not get data: ' . mysql_error());
                             }
                        while($row_messages_en = mysql_fetch_array($retval_messages_en, MYSQL_ASSOC)){
                            $all_chat_content = $row_messages_en['content'];
                            $chat_message_by = $row_messages_en['written_by'];
                            $chat_message_time = $row_messages_en['time'];
                            $chat_message_image = $row_messages_en['image'];

                            $header_id = $row_messages_en['header_id'];

                            if ($header_id == $_SESSION['chat']) {
                                # code...
                                    $all_chat_messages .= '<!-- Message to the right -->
                                                <div class="direct-chat-msg right">
                                                  <div class="direct-chat-info clearfix">
                                                    <span class="direct-chat-name pull-right">'.$chat_message_by.'-'.$header_id.'</span>
                                                    <span class="direct-chat-timestamp pull-left">'.$chat_message_time.'</span>
                                                  </div><!-- /.direct-chat-info -->
                                                  <img class="direct-chat-img" src="'.$chat_message_image.'" alt="message user image"><!-- /.direct-chat-img -->
                                                  <div class="direct-chat-text">
                                                    '.$all_chat_content.'
                                                  </div><!-- /.direct-chat-text -->
                                                </div><!-- /.direct-chat-msg -->';

                            } else {
                                $all_chat_messages .= '<div class="direct-chat-msg">
                                                  <div class="direct-chat-info clearfix">
                                                    <span class="direct-chat-name pull-left">'.$chat_message_by.'-'.$header_id.'</span>
                                                    <span class="direct-chat-timestamp pull-right">'.$chat_message_time.'</span>
                                                  </div><!-- /.direct-chat-info -->
                                                  <img class="direct-chat-img" src="'.$chat_message_image.'" alt="message user image"><!-- /.direct-chat-img -->
                                                  <div class="direct-chat-text">
                                                    '.$all_chat_content.'
                                                  </div><!-- /.direct-chat-text -->
                                                </div><!-- /.direct-chat-msg -->';
                            }

                            
                        }
                        */

                        //CURRENT USER
                        $sqlcurrent_user_en = 'select * from think_master where user_n ="'.$login_session.'" ';
                        $retval_current_user_en = mysql_query( $sqlcurrent_user_en, $conn );                 
                             if(! $retval_current_user_en )
                             {
                                die('Could not get data: ' . mysql_error());
                             }
                        $row_current_user_en = mysql_fetch_array($retval_current_user_en, MYSQL_ASSOC);
                        $current_user_id = $row_current_user_en['idx'];
                        //CURRENT USER
                        
                        
?>