<?php
require_once __DIR__ . "/../Models/productModel.php";
require_once __DIR__ . "/../Models/userModel.php";

require_once __DIR__ . "/../config/db_conn.php";
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['action']) && ($_GET['action']) === "view" && isset(($_GET['product_id']))) {
        $product_id = intval($_GET['product_id']);

        $relatedProducts = getRelatedProducts();
        $product = getProductPreview($product_id);

        if ($product) {
            // Render the product view dynamically
            require_once __DIR__ . "/../view/product.php";
        } else {
            echo "Product not found.";
        }
    }
} else if ($_SERVER['REQUEST_METHOD'] === 'POST') {


    if (isset($_POST['action']) && ($_POST['action']) === "addToCart" && isset($_POST['product_id']) && isset($_POST['quantity'])) {
        $meesage = addToCart($_POST['product_id'], $_POST['quantity']);

        if ($meesage == true) {
            header("Location: /cart");
            exit();
        } 
    }
    
}
     
    


// function displayMessage($message)
// {
//     echo "<script>";
//     echo "alert('" . addslashes($message) . "');";
//     echo "</script>";
// }
