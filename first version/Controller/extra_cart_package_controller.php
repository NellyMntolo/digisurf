<?php
// Send noindex to avoid ghost carts by bots
header('X-Robots-Tag: noindex, nofollow', true);
error_reporting(0);
session_start();

require_once("dbcontroller.php");
$db_handle = new DBController();
if(!empty($_GET["action"])) {
switch($_GET["action"]) {
    case "add":
        if($_GET["product_type"] == "product"){
        if(!empty($_POST["quantity"])) {
            $productByCode = $db_handle->runQuery("SELECT * FROM shop_digisurf_product WHERE product_unique='" . $_GET["product_unique"] . "'");
            $itemArray = array($productByCode[0]["product_unique"]=>array('product_name'=>$productByCode[0]["product_name"],'product_unique'=>$productByCode[0]["product_unique"],'quantity'=>$_POST["quantity"],'product_price'=>$productByCode[0]["product_price"],'product_image'=>$productByCode[0]["product_image"],'product_type'=>$_GET["product_type"],'product_shipping_price'=>$productByCode[0]["product_shipping_price"],'product_points'=>$productByCode[0]["product_points"],'product_id'=>$productByCode[0]["product_id"]));
            
            if(!empty($_SESSION["cart_item"])) {
                if(in_array($productByCode[0]["product_unique"],$_SESSION["cart_item"])) {
                    foreach($_SESSION["cart_item"] as $k => $v) {
                            if($productByCode[0]["product_unique"] == $k)
                                $_SESSION["cart_item"][$k]["quantity"] = $_POST["quantity"];
                    }
                } else {
                    $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
                }
            } else {
                $_SESSION["cart_item"] = $itemArray;
            }
        }
        }//product type
        if($_GET["product_type"] == "package"){
        if(!empty($_POST["quantity"])) {
            $packageByCode = $db_handle->runQuery("SELECT * FROM shop_digisurf_package WHERE package_unique='" . $_GET["product_unique"] . "'");
            $itemArray = array($packageByCode[0]["package_unique"]=>array('product_name'=>$packageByCode[0]["package_name"],'product_unique'=>$packageByCode[0]["package_unique"],'quantity'=>$_POST["quantity"],'product_price'=>$packageByCode[0]["package_price"],'product_image'=>$packageByCode[0]["package_image"],'product_type'=>$_GET["product_type"],'product_shipping_price'=>$packageByCode[0]["package_shipping_price"],'product_points'=>$packageByCode[0]["package_points"],'product_id'=>$packageByCode[0]["package_id"]));
            
            if(!empty($_SESSION["cart_item"])) {
                if(in_array($packageByCode[0]["package_unique"],$_SESSION["cart_item"])) {
                    foreach($_SESSION["cart_item"] as $k => $v) {
                            if($packageByCode[0]["package_unique"] == $k)
                                $_SESSION["cart_item"][$k]["quantity"] = $_POST["quantity"];
                    }
                } else {
                    $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
                }
            } else {
                $_SESSION["cart_item"] = $itemArray;
            }
        }
    }//product type
    break;
    case "remove":
        if(!empty($_SESSION["cart_item"])) {
            foreach($_SESSION["cart_item"] as $k => $v) {
                    if($_GET["package_unique"] == $k)
                        unset($_SESSION["cart_item"][$k]);
                    if($_GET["product_unique"] == $k)
                        unset($_SESSION["cart_item"][$k]);             
                    if(empty($_SESSION["cart_item"]))
                        unset($_SESSION["cart_item"]);
            }
        }
    break;
    case "empty":
        unset($_SESSION["cart_item"]);
    break;  
}
}

header('Location: ' . $_SERVER['HTTP_REFERER']);
/*
$incart = '';
$checkout_package = '';
$total = '';
$item_items = 0;
$cart = '';

if(isset($_SESSION["cart_item"])){
    $item_total = 0;

    


    foreach ($_SESSION["cart_item"] as $item){

        $currency_input = $item["package_price"];
        $currency = currencyConverter($currency_from,$currency_to,$currency_input);
        $round = round($currency);
    
    $item_items += ($item["quantity"]);
    $incart .= '<li class="package">
                        <div class="package-image">
                            <a href="">
                                <img src="'.$item["package_image"].'" alt="placeholder">
                            </a>
                        </div>
                        <div class="package-details">
                        <h4>
                            <a href="">'.$item["package_name"].'</a>
                        </h4>
                        <span class="price">'.$_SESSION['currency_symbol'].''.$round.'</span>
                        <div class="actions">
                            <a href="?action=remove&package_unique='.$item["package_unique"].'" class="elete-item">Delete</a>
                            <div class="quantity">
                                <label for="cd-package-'.$item["package_unique"].'">Qty</label>
                                <div class="btn-group" role="group" aria-label="...">
                                    <div class="adder">
                                    <form method="post" action="?action=add&package_unique='.$item["package_unique"].'">
                                        <input class="btn btn-sm btn-primary sqr minus" type="button" value="-" />
                                        <input class="btn btn-sm quant" type="text" name="quantity" value="'.$item["quantity"].'" maxlength="6" max="19" size="7" id="number" />
                                        <input class="btn btn-sm btn-primary sqr plus" type="button" value="+" />
                                    </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>                        
                        </li>';




        $checkout_package .= '<div class="cart-package">
                                <div class="image">
                                    <img src="'.$item["package_image"].'"/>
                                </div>
                                <div class="item">
                                    <h4>'.$item["package_name"].'</h4>
                                    <div class="item-remove">
                                        <a class="btn btn-sm btn-default sqr" href="?action=remove&package_unique='.$item["package_unique"].'">Delete</a>
                                    </div>
                                    <div class="item-calculator">
                                        <div class="btn-group" role="group" aria-label="...">
                                        <form method="post" action="?action=add&package_unique='.$item["package_unique"].'">
                                            <input class="btn btn-sm btn-primary sqr minus" type="button" value="-" />
                                            <input class="btn btn-sm quant" type="text" name="quantity" value="'.$item["quantity"].'" maxlength="6" max="19" size="7" id="number" />
                                            <input class="btn btn-sm btn-primary sqr plus" type="button" value="+" />
                                        </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="item-price">
                                    <h4>$'.$round.'</h4>
                                </div>
                            </div>';  


        $item_total += ($round*$item["quantity"]);
        //$item_items += ($item["quantity"]);

        
        
        }

$total = $item_total;


$cart = ' <!-- THIS IS FOR THE CART ADD IT HERE -->
            <div class="cd-cart-container empty">
                    <div class="cd-cart">
                        <div class="wrapper">
                            <header>
                                <h4>'.$cart_text1.'</h4>
                                <span class="und"><a href="?action=empty">'.$cart_text3.'</a></span>
                            </header>
                            
                            <div class="body">
                                <ul>
                                    '.$incart.'
                                </ul>
                            </div>
                
                            <footer>
                                <a href="/CartReview" class="checkout btn">'.$cart_text2.' - '.$_SESSION['currency_symbol'].'<span>'.$total.'</span></a>
                            </footer>
                        </div>
                    </div> <!-- .cd-cart -->
            </div> <!-- cd-cart-container -->
            <!-- /THIS IS FOR THE CART ADD IT HERE END --> ';
    }*/

    //print_r($_SESSION["cart_item"]);
?>