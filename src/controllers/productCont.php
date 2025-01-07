<?php 
require_once __DIR__ ."/../config/db_conn.php";

if (isset($_GET['action']) && ($_GET['action']) ==="view" && isset(($_GET['product_id']) )){
    $product_id = intval($_GET['product_id']);


    
    $product = getProduct($product_id);
    if ($product) {
        // Render the product view dynamically
        require_once __DIR__."/../view/product.php";
    } else {
        echo "Product not found.";
    }
}


function getProduct($product_id){
    return true;
}
?>