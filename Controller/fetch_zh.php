<?php
include '../Model/dbconfig.php';
mysql_set_charset("utf8");
                        
$no = $_POST['getresult'];
$yes = 'yes';

                        $sqlwethink_zh = 'select * from think_blog_zh WHERE publish = "'.$yes.'" ORDER BY idx DESC Limit '.$no.',4';
                        $retval_wethink_zh = mysql_query( $sqlwethink_zh, $conn );                 
                             if(! $retval_wethink_zh )
                             {
                                die('Could not get data: ' . mysql_error());
                             }  

                                while($row_wethink_zh = mysql_fetch_array($retval_wethink_zh, MYSQL_ASSOC)){
                                    $idx = $row_wethink_zh['idx'];
                                    $text5 = $row_wethink_zh['text5'];
                                    $text6 = $row_wethink_zh['text6'];
                                    $text7 = $row_wethink_zh['text7'];
                                    $image = $row_wethink_zh['image2']; 
                                    
                                            echo '<div class="thnk-blog-in" style="position:relative;">
                                                                <form action="/we_think/Blogs/">
                                                                    <div class="think-blog-img-cont">
                                                                        <div class="thnk-blog-img"><img src="'.$image.'"/></div>
                                                                    </div>
                                                                    <div class="thnk-blog-text">
                                                                        <div class="thnk-date">
                                                                            <p>'.$text5.'</p>
                                                                        </div>
                                                                        <h2 class="alt">'.$text6.'</h2>
                                                                    </div>
                                                                    <div class="thnk-blog-para hidden-xs">
                                                                        <div class="thnk-blog-para-in">
                                                                            <p>'.$text7.'</p>
                                                                            <p>(Read More)</p>
                                                                        </div>
                                                                    </div>
                                                                    <input type="hidden" value="'.$idx.'" name="blog_id">
                                                                    <button type="submit" value=" " class="projSubmit-next">
                                                                </form>
                                                            </div> '; 
                                                        }
?>