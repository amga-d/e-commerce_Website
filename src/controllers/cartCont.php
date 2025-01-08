<?php 
require_once __DIR__ ."/../Models/cartModel.php";
$myCart =getCartItems();


if($_SERVER['REQUEST_METHOD'] =="POST"){
    if(isset($_POST["action"]) && $_POST["action"] == "remove-item" && isset($_POST["product_id"]) ){
        deleteCartItem($_POST["product_id"]);
        header("location: /cart");  
    }
}
// print_r($_POST) 
?>