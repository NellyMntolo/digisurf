<?php

                    //CONTENT
                        $sqlen_booking = 'select * from digisurf_booking where code ="'.$current_lang.'"';
                        $retvalen_booking = mysql_query( $sqlen_booking, $conn );
                             if(! $retvalen_booking )
                             {
                                die('Could not get data: ' . mysql_error());
                             }
                        $rowen_booking = mysql_fetch_array($retvalen_booking, MYSQL_ASSOC);
                            $booking_text1 = $rowen_booking['text1'];
                            $booking_text2 = $rowen_booking['text2'];
                            $booking_text3 = $rowen_booking['text3'];
                            $booking_text4 = $rowen_booking['text4'];
                            $booking_video_name = $rowen_booking['text5'];
                            $booking_video_url = $rowen_booking['text6'];
                            $booking_text7 = $rowen_booking['text7'];
                            $booking_text8 = $rowen_booking['text8'];
                            $booking_image1 = $rowen_booking['image1'];
                            $booking_image2 = $rowen_booking['image2'];
                            $booking_image3 = $rowen_booking['image3'];
                            $booking_image4 = $rowen_booking['image4'];

                            $booking_trimmedtext4 = nl2br($booking_text4); 
                            $all_booking_text4 = $booking_trimmedtext4; 
                        


                            
?>