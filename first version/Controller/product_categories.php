<?php
include '../Model/dbconfig.php';
mysql_set_charset("utf8");
session_start();
error_reporting(0);
include '../Model/menuDAO.php';
$result = '';
//if(isset($_POST['selected_category'])){ 
  $categoryid = mysql_real_escape_string($_POST['selected_category'],$conn);
  
//$_SESSION['product_category_session'] = $categoryid;                        

                        $sqlcategories = 'select * from shop_digisurf_product_category_list where category_id="'.$categoryid.'" order by idx DESC';
                        $retvalcategories = mysql_query( $sqlcategories, $conn );                 
                             if(! $retvalcategories )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

                        while($rowcategories = mysql_fetch_array($retvalcategories, MYSQL_ASSOC)){
                          $cat_product_id = $rowcategories['product_id'];                     



                        $sqlweareen = 'select * from shop_digisurf_product where product_status="Y" and product_id="'.$cat_product_id.'" order by idx DESC';
                        $retvalweareen = mysql_query( $sqlweareen, $conn );                 
                             if(! $retvalweareen )
                             {
                                die('Could not get data: ' . mysql_error());
                             }

                        
                        while($rowweareen = mysql_fetch_array($retvalweareen, MYSQL_ASSOC)){
                            $product_id = $rowweareen['product_id']; 
                            $product_name = $rowweareen['product_name'];
                            $product_sku = $rowweareen['product_sku'];
                            $product_barcode = $rowweareen['product_barcode'];
                            $product_status = $rowweareen['product_status'];
                            $product_price = $rowweareen['product_price'];
                            $product_quantity = $rowweareen['product_quantity'];
                            $product_discount_id = $rowweareen['product_discount_id'];
                            $product_url = $rowweareen['product_url'];
                            $product_image = $rowweareen['product_image'];
                            $product_unique = $rowweareen['product_unique'];

                            $currency_input = $product_price;
                            $currencyproduct = currencyConverter($currency_from,$currency_to,$currency_input);
                            $round = round($currencyproduct);
                            //print_r($currencyproduct);

                            
                            $result .= '<form method="post" action="?action=add&product_unique='.$product_unique.'&product_type=product">
                                                <div class="lvn-grid1-6">
                                                    <div class="product-item">
                                                          <a href="/Products/Product/'.$product_url.'" class="product-item-in">
                                                              <div class="product-item-image">
                                                                  <img src="'.$product_image.'"/>
                                                              </div>
                                                              <div class="product-item-bottom">
                                                                <h4>'.$product_name.'</h4>
                                                                  <p>'.$_SESSION['currency_symbol'].''.$round.'</p>
                                                                  <input type="hidden" name="quantity" value="1" size="2" />
                                                                <button type="submit" class=" btn btn-primary sqr cd-add-to-car" data-price="2599.00">Add</button>
                                                              </div>
                                                          </a>
                                                      </div>
                                                  </div></form>';           
                            }
                        }


if(!empty($result)){
    echo $result;
} else{
    echo '<div class"lvn-grid1">WHOOPS: No Products Found For This Category</div>';    
}


?>