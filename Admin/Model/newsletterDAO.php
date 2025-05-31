<?php
include 'dbconfig.php';
mysql_set_charset("utf8");
$current_lang = $_SESSION['lang'];
                        $sql_newsletter = 'select * from digisurf_newsletter where code ="'.$current_lang.'"';
                        $retval_newsletter = mysql_query( $sql_newsletter, $conn );                 
                             if(! $retval_newsletter )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

                        $row_newsletter = mysql_fetch_array($retval_newsletter, MYSQL_ASSOC);
                            $idx = $row_newsletter['idx']; 
                            $entext1 = $row_newsletter['newsletter_id'];
                            $entext2 = $row_newsletter['newsletter_info'];
                            $entext3 = $row_newsletter['newsletter_url'];
                            $entext4 = $row_newsletter['newsletter_slogan'];
                            $enimage1 = $row_newsletter['image1'];

                            $all_single_slides = '';
                        
                        $sqlspecialzh = 'select * from digisurf_newsletter ORDER BY idx DESC ';
                        $retval_specialzh = mysql_query( $sqlspecialzh, $conn );
                             if(! $retval_specialzh )
                             {
                                die('Could not get data: ' . mysql_error());
                             }
                        /*$row_specialzh = mysql_fetch_array($retval_specialzh, MYSQL_ASSOC);
                            $special_zhtext1 = $row_specialzh['text1'];
                            $special_zhtext2 = $row_specialzh['text2'];*/

                            $all_single_specials = '';
                            while($row_special = mysql_fetch_array($retval_specialzh, MYSQL_ASSOC)) {
                                $special_idx = $row_special['idx'];
                                $special_entext1 = $row_special['newsletter_info'];
                                $special_entext2 = $row_special['newsletter_url'];
                                $special_enimage1 = $row_special['image1'];

                                $all_single_slides .= '<!-- Content Settings -->
                                  <div class="box box-warning">
                                    <div class="box-header">
                                      <h3 class="box-title">Edit Special Settings</h3>
                                          <div class="pull-right box-tools">
                                            <button class="btn btn-warning btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                                            <!--<button class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>-->
                                          </div><!-- /. tools -->
                                    </div><!-- /.box-header -->
                                    <div class="box-body pad">




                                <form action="/Admin/AllAbout" method="POST" enctype="multipart/form-data" accept-charset="utf-8">
                                <hr class="hrs">     


                                              <h2>Edit a Slide</h2>
                                              
                                              <div class="form-group" style="width: 95%;">
                                                <label>Slides Image </label>
                                                <input type="file" name="edit_special_image1">
                                                <img src="'.$special_enimage1.'">
                                              </div>

                                              
                                              <div class="form-group">
                                                <label>Slide Title</label>
                                                <div class="input-group">
                                                <div class="input-group-addon">
                                                  <i class="fa fa-pencil-square-o text-aqua faa-wrench animated faa-slow"></i>
                                                </div>
                                                <input id="text1" name="content_text1" class="form-control" type="text" placeholder="Slide Title" value="'.$special_entext1.'">
                                              </div><!-- /.input group -->                       
                                              </div>

                                              <div class="form-group">
                                                <label>Slide Description</label>
                                                <div class="input-group">
                                                <div class="input-group-addon">
                                                  <i class="fa fa-keyboard-o text-aqua"></i>
                                                </div>
                                                <textarea class="form-control" rows="3" name="content_text2" placeholder="Slide Description">'.$special_entext2.'</textarea>
                                              </div><!-- /.input group -->                      
                                              </div>


                                              <div class="form-group" style="">
                                                <div class="input-group">
                                                <input type="hidden" value="'.$special_idx.'" name="edit_special_id">
                                                <input name="edit_special" class="form-control extra-btn btn-success" type="submit" value="Edit Slide" style="width: 30%; margin-left: 0%;">
                                              </div><!-- /.input group -->                       
                                              </div>

                                              <div class="form-group" style="">
                                                <div class="input-group">
                                                <input type="hidden" value="'.$special_idx.'" name="delete_special_id">
                                                <input name="delete_special" class="form-control extra-btn btn-danger" type="submit" value="Delete Slide" style="width: 30%; margin-left: 0%;">
                                              </div><!-- /.input group -->                       
                                              </div></form>

                                                    </div><!-- box-body -->
            
                                                  </div><!-- /.box -->
                                                  <!-- Content Settings -->';
                            }

?>