<?php
include 'dbconfig.php';
mysql_set_charset("utf8");
$current_lang = $_SESSION['lang'];
                        $sqlweareen = 'select * from digisurf_about where code ="'.$current_lang.'"';
                        $retvalweareen = mysql_query( $sqlweareen, $conn );                 
                             if(! $retvalweareen )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

                        $rowweareen = mysql_fetch_array($retvalweareen, MYSQL_ASSOC);
                            $idx = $rowweareen['idx']; 
                            $entext1 = $rowweareen['text1'];
                            $entext2 = $rowweareen['text2'];
                            $entext3 = $rowweareen['text3'];
                            $entext4 = $rowweareen['text4'];
                            $entext5 = $rowweareen['text5'];
                            $enimage1 = $rowweareen['image1'];
                            $entext6 = $rowweareen['text6'];
                            $entext7 = $rowweareen['text7'];
                            $entext8 = $rowweareen['text8'];
                            $entext9 = $rowweareen['text9'];
                            $entext10 = $rowweareen['text10'];
                            $enimage2 = $rowweareen['image2'];
                            $enimage3 = $rowweareen['image3'];
                            $enimage4 = $rowweareen['image4'];

                            $all_single_slides = '';
                        
                        $sqlspecialzh = 'select * from about_sliders ORDER BY idx DESC ';
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
                                $special_entext1 = $row_special['text1'];
                                $special_entext2 = $row_special['text2'];
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



                        $sqllocationen = 'select * from about_steps ORDER BY idx ASC';
                        $retvallocationen = mysql_query( $sqllocationen, $conn );                 
                             if(! $retvallocationen )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

?>