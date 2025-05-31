<?php
include '../Model/dbconfig.php';
mysql_set_charset("utf8");
session_start();

$from_id = $_POST['from_id'];
$to_id = $_POST['to_id'];
//pending above

$result = '';

                    //MESSAGES
                        //$sqlmessages_en = 'select * from messages';
                        $sqlmessages_en = 'SELECT h.id AS header_id, h.subject, h.status, m.id AS message_id, m.content, m.time, m.image,  IF(m.is_from_sender, x.name, y.name) AS written_by FROM (SELECT * FROM header WHERE (id = "'.$from_id.'") or (id = "'.$to_id.'") ) h INNER JOIN message m ON (h.id = m.header_id) INNER JOIN user x ON (h.from_id = x.id) INNER JOIN user y ON (h.to_id = y.id) ORDER BY message_id ASC;';
                        $retval_messages_en = mysql_query( $sqlmessages_en, $conn );                 
                             if(! $retval_messages_en )
                             {
                                die('Could not get data select: ' . mysql_error());
                             }
                        while($row_messages_en = mysql_fetch_array($retval_messages_en, MYSQL_ASSOC)){
                            $all_chat_content = $row_messages_en['content'];
                            $chat_message_by = $row_messages_en['written_by'];
                            $chat_message_time = $row_messages_en['time'];
                            $chat_message_image = $row_messages_en['image'];

                            $header_id = $row_messages_en['header_id'];

                            if ($header_id == $_SESSION['chat']) {
                                # code...

                                    $result .= '<!-- Message to the right -->
                                                <div class="direct-chat-msg right">
                                                  <div class="direct-chat-warning clearfix">
                                                    <span class="direct-chat-name pull-right">'.$chat_message_by.'-'.$header_id.'</span>
                                                    <span class="direct-chat-timestamp pull-left">'.$chat_message_time.'</span>
                                                  </div><!-- /.direct-chat-info -->
                                                  <img class="direct-chat-img" src="'.$chat_message_image.'" alt="message user image"><!-- /.direct-chat-img -->
                                                  <div class="direct-chat-text">
                                                    '.$all_chat_content.'
                                                  </div><!-- /.direct-chat-text -->
                                                </div><!-- /.direct-chat-msg -->';

                            } else {
                                $result .= '<div class="direct-chat-msg">
                                                  <div class="direct-chat-warning clearfix">
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

echo $result;    
?>